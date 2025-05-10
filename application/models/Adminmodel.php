<?php
class Adminmodel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    
    function login_check($data)
    {
        $email    = $data["email"];
        $password = md5($data["password"]);
        
        $query = $this->db->query("SELECT * FROM ".USER." WHERE email = '$email' AND password = '$password'");        
        
        if(intval($query->num_rows()) > 0)
        {
            $adminDetails = $query->result();           
            $sessionData = array();
            
            $sessionData["user_id"] = $adminDetails[0]->user_id;
            $sessionData["name"] = $adminDetails[0]->name;
            $sessionData["email"] = $adminDetails[0]->email;
            $sessionData["phone"] = $adminDetails[0]->phone;
            
            $this->session->set_userdata($sessionData);
            return $sessionData;
        }
        else
            return false;
    }
    
    function insertUser($data)
    {
        $is_exist = $this->check_exist($data["email"]);
        if($is_exist == true)
            return false;

        $this->db->insert(USER, $data);
        return $this->db->insert_id();
    }

    function check_exist($email)
    {        
        $email    = $email;
        $query = $this->db->query("SELECT * FROM ".USER." WHERE email = '$email'");
        if(intval($query->num_rows()) > 0)
            return true;
        else
            return false;
    }


    function admin_check()
    {
        $name    = $this->input->post('name');
        $password = md5($this->input->post('inputPass'));
        
        $query = $this->db->query("SELECT * FROM `user` WHERE user_name = '$name' AND password = '$password'");        
        $adminDetails = $query->result();
        if(count_($adminDetails) > 0)
        {
            $sessionData = array();   
            $sessionData["id"] = 1;
            $sessionData["name"] = $adminDetails[0]->user_name;            
            $sessionData["user_type"] = $adminDetails[0]->user_type;
            $this->session->set_userdata($sessionData);
            $this->session->set_userdata('id', 1);
            return $sessionData;
        }
        else
            return false;
    }


    public function getMoney()
    {
        // first get opening balances
        $query = $this->db->query("SELECT * FROM `user` LIMIT 1");
        $openingData = $query->result();

        $date_start = $this->firstDay();
        $date_end = $this->lastDay();

        //now get all payments for this month
        $openingCash = $openingData[0]->opening_cash;
        $openingMCB = $openingData[0]->opening_mcb;
        $openingSCB = $openingData[0]->opening_scb;
        $openingForeign = $openingData[0]->opening_foreign;

        $paymentCash = $paymentSCB = $paymentMCB = $paymentForeign = 0;
        $query = $this->db->query("SELECT payment_method, SUM(amount) as totalAmount FROM `payment` WHERE create_date BETWEEN '$date_start' AND '$date_end' GROUP BY payment_method  ORDER by payment_method");
        $payments = $query->result();

        foreach ($payments as $key => $value) {
            if ($value->payment_method == "Cash"){
                $paymentCash = $value->totalAmount;
            } elseif ($value->payment_method == "MCB") {
                $paymentMCB = $value->totalAmount;
            } elseif ($value->payment_method == "SCB") {
                $paymentSCB = $value->totalAmount;
            } elseif ($value->payment_method == "Foreign") {
                $paymentForeign = $value->totalAmount;
            }
        }

        //now get all expenses for this month
        $expenseCash = $expenseMCB = $expenseSCB = $expenseForeign =  0;
        $query = $this->db->query("SELECT expense_method, SUM(amount) as totalAmount FROM `expense` WHERE create_date BETWEEN '$date_start' AND '$date_end' GROUP BY expense_method  ORDER by expense_method");
        $expense = $query->result();

        foreach ($expense as $key => $value) {
            if ($value->expense_method == "Cash"){
                $expenseCash = $value->totalAmount;
            } elseif ($value->expense_method == "MCB") {
                $expenseMCB = $value->totalAmount;
            } elseif ($value->expense_method == "SCB") {
                $expenseSCB = $value->totalAmount;
            }  elseif ($value->expense_method == "Foreign") {
                $expenseForeign = $value->totalAmount;
            }
        }

        // now get all jv for each
        $query = $this->db->query("SELECT from_account, SUM(amount) as totalAmount FROM `journal_voucher` GROUP BY from_account  ORDER by from_account");
        $fromAccount = $query->result();
        $jvFromCash = $jvFromMCB = $jvFromSCB = $jvFromForeign = 0;

        foreach ($fromAccount as $key => $value) {
            if ($value->from_account == "Cash"){
                $jvFromCash = $value->totalAmount;
            } elseif ($value->from_account == "MCB") {
                $jvFromMCB = $value->totalAmount;
            } elseif ($value->from_account == "SCB") {
                $jvFromSCB = $value->totalAmount;
            }  elseif ($value->from_account == "Foreign") {
                $jvFromForeign = $value->totalAmount;
            }
        }

        $query = $this->db->query("SELECT to_account, SUM(amount) as totalAmount FROM `journal_voucher` GROUP BY to_account  ORDER by to_account");
        $toAccount = $query->result();
        $jvToCash = $jvToMCB = $jvToSCB = $jvToForeign = 0;
        
        foreach ($toAccount as $key => $value) {
            if ($value->to_account == "Cash"){
                $jvToCash = $value->totalAmount;
            } elseif ($value->to_account == "MCB") {
                $jvToMCB = $value->totalAmount;
            } elseif ($value->to_account == "SCB") {
                $jvToSCB = $value->totalAmount;
            }  elseif ($value->to_account == "SCB") {
                $jvToSCB = $value->totalAmount;
            }   elseif ($value->to_account == "Foreign") {
                $jvToForeign = $value->totalAmount;
            }
        }

        //now calculate avaiable amount for each
        $result = array();

        $incCash = $openingCash + $paymentCash + $jvToCash;
        $expCash = $expenseCash + $jvFromCash;

        $incMcb = $openingMCB + $paymentMCB + $jvToMCB;
        $expMcb = $expenseMCB + $jvFromMCB;

        $incScb = $openingSCB + $paymentSCB + $jvToSCB;
        $expScb = $expenseSCB + $jvFromSCB;

        $incForeign = $openingForeign + $paymentForeign + $jvToForeign;
        $expForeign = $expenseForeign + $jvFromForeign;

        $result["cash"] = $incCash - $expCash;
        $result["mcb"] = $incMcb - $expMcb;
        $result["scb"] = $incScb - $expScb;
        $result["foreign"] = $incForeign - $expForeign;

        return $result;
    }


    function lastDay($month = '', $year = '') {
        if (empty($month)) {
            $month = date('m');
        }
        if (empty($year)) {
            $year = date('Y');
        }
        $result = strtotime("{$year}-{$month}-01");
        $result = strtotime('-1 second', strtotime('+1 month', $result));
        return date('Y-m-d 23:59:59', $result);
    }
    
    function firstDay($month = '', $year = '')
    {
        return "2020-02-01 00:00:00";
        // if (empty($month)) {
        //     $month = date('m');
        // }
        // if (empty($year)) {
        //     $year = date('Y');
        // }
        // $result = strtotime("{$year}-{$month}-01");
        // return date('Y-m-d 00:00:00', $result);
    }

}
?>