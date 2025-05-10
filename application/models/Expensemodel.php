<?php

class Expensemodel extends CI_Model {
    
    private $tablename = "`expense`";
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function expenseToday()
    {
        $date = date("Y-m-d", strtotime("now"));

        $query = $this->db->query( "SELECT 
        expense.*,
        categories.`name` as category_name 
        FROM
        `expense` 
        LEFT JOIN `categories` 
        ON expense.`category_id` = categories.`id` WHERE DATE(expense.create_date) = '$date' ORDER BY id DESC");

        return $query->result();

    }

    public function yearly_expense_categories()
    {
        for ($i = 0; $i <= 12; $i++) {
            $months[] = array(
                            "title" => date("M-y", strtotime( date( 'Y-m-01' )." -$i months")), 
                            "date" => date("Y-m-d", strtotime( date( 'Y-m-01' )." -$i months"))
            );
        }

        $months = array_reverse($months);

        $data = array();
        $category = $this->Categorymodel->getExpenseCategory();

        foreach ($category as $k => $v) 
        {
            $result = array();
            $data[$k] = array();
            $data[$k]["category_name"] = $v->name;
            $data[$k]["color"] = "#".str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);

            foreach ($months as $key => $value) 
            {
                $obj = [];
                $obj["month"] = $value["title"];

                $date_start = $this->firstDay(date('m', strtotime($value['date'])), date('Y', strtotime($value['date'])));
                $date_end = $this->lastDay(date('m', strtotime($value['date'])), date('Y', strtotime($value['date'])));

                $category_id = $v->id;

                $query = $this->db->query("SELECT SUM(expense.amount) AS sumAmount FROM `expense` WHERE expense.create_date BETWEEN '$date_start' AND '$date_end' AND expense.category_id = $category_id")->result();

                $obj["amount"] = intval($query[0]->sumAmount);
                
                
                $result[] = $obj;
            }

            $data[$k]["data_set"] = $result;
        }

        $res = array("months" => $months, "data" => $data);
        //echo "<pre>";
        //print_r($res);die;

        return $res;
        //return $data;
    }

    public function yearly_expense($fmp = 0)
    {
        for ($i = 0; $i <= 12; $i++) {
            $months[] = array(
                            "title" => date("M-y", strtotime( date( 'Y-m-01' )." -$i months")), 
                            "date" => date("Y-m-d", strtotime( date( 'Y-m-01' )." -$i months"))
            );
        }

        $months = array_reverse($months);
        $result = array();
        foreach ($months as $key => $value) {
            
            $obj = [];
            $obj["month"] = $value["title"];

            $date_start = $this->firstDay(date('m', strtotime($value['date'])), date('Y', strtotime($value['date'])));
            $date_end = $this->lastDay(date('m', strtotime($value['date'])), date('Y', strtotime($value['date'])));

            if($fmp == 0)
                $query = $this->db->query("SELECT SUM(expense.amount) AS sumAmount FROM `expense` WHERE expense.create_date BETWEEN '$date_start' AND '$date_end'")->result();
            else
            $query = $this->db->query("SELECT SUM(expense.amount) AS sumAmount FROM `expense` WHERE expense.category_id = 7 AND expense.create_date BETWEEN '$date_start' AND '$date_end'")->result();
            
            $obj["amount"] = intval($query[0]->sumAmount);
            $obj["color"] = "#".str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);

            $result[] = $obj;
        }
        
        return $result;
    }
    
    public function monthly_expense()
    {
        $date_start = $this->firstDay();
        $date_end = $this->lastDay();

        $data = [];
        $category = $this->Categorymodel->getExpenseCategory();

        foreach ($category as $key => $value) 
        {
            $obj = array();
            $obj["category"] = $value->name;
            $obj["spending_limit"] = $value->spending_limit;

            $query = $this->db->query("SELECT SUM(expense.amount) AS sumAmount FROM `expense` WHERE expense_type = 'MONTHLY' AND category_id = ".$value->id." AND expense.create_date BETWEEN '$date_start' AND '$date_end'")->result();
            $obj["amount"] = intval($query[0]->sumAmount);
            $obj["color"] = "#".str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
            
            $data[] = $obj;
        }
        
        return $data;
    }

    public function monthlyExpenseThreshold()
    {
        $date_start = $this->firstDay();
        $date_end = $this->lastDay();

        $query = $this->db->query("SELECT categories.name, categories.spending_limit, SUM(expense.amount) as totalSepnt FROM expense LEFT JOIN categories ON categories.id = expense.category_id WHERE expense.create_date BETWEEN '$date_start' AND '$date_end' GROUP BY expense.category_id");
        return $query->result();
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
        if (empty($month)) {
            $month = date('m');
        }
        if (empty($year)) {
            $year = date('Y');
        }
        $result = strtotime("{$year}-{$month}-01");
        return date('Y-m-d 00:00:00', $result);
    } 
    
    
    function get_record($id = ""){
        $where = "";
        
        if($id > 0){
            $where = " where ".$this->tablename.".id = $id";
        }
        
        $query = $this->db->query( "SELECT 
        expense.*,
        categories.`name` as category_name 
        FROM
        `expense` 
        LEFT JOIN `categories` 
        ON expense.`category_id` = categories.`id` ".$where." ORDER BY id DESC");
        return $query->result();
    }
    
    function set_record(){
        $data   = array();
        $data   = $this->getPostedParams();
        
        //$data["create_date"]         = date("Y-m-d H:i:s", strtotime("now"));
        $data["update_date"]         = date("Y-m-d H:i:s", strtotime("now"));
        
        $this->db->insert($this->tablename, $data);
        $id = $this->db->insert_id();

        $this->Datalogmodel->set_record(array("	details" => "Expense record inserted for ID: $id", "sql_query" =>  $this->db->last_query()));
        return $id;
    }
    
    function update_record($id){
        $data = array();
        $data = $this->getPostedParams();
        
        $data["update_date"] = date("Y-m-d H:i:s", strtotime("now"));
        $this->db->where('id', $id);
        $this->db->update($this->tablename, $data);

        $this->Datalogmodel->set_record(array("	details" => "Expense record updated for ID: $id", "sql_query" =>  $this->db->last_query()));
        return  true;

    }
    
    function delete_record($id){
        $this->db->delete($this->tablename, array('id' => $id));
        $this->Datalogmodel->set_record(array("	details" => "Expense record delete for ID: $id", "sql_query" =>  $this->db->last_query()));
        return true;
    }
    
    function getPostedParams(){
        $data["category_id"]     = $this->input->post('category_id');
        $data["description"]     = $this->input->post("description");
        $data["amount"]          = $this->input->post("amount");
        $data["expense_method"]  = $this->input->post("expense_method");
        $data["expense_type"]  = $this->input->post("expense_type");
        

        if($this->input->post("create_date") != "")
            $data["create_date"]    = date("Y-m-d 00:00:00",strtotime($this->input->post("create_date")));
        else
            $data["create_date"]    = date("Y-m-d h:i:s",strtotime("now"));

        return $data;
    }

    public function total_expense_categories()
    {
        $data = array();
        $category = $this->Categorymodel->getExpenseCategory();

        $date_end = date("Y-m-d", strtotime("now"));
        foreach ($category as $k => $v) 
        {
            $data[$k] = array();
            $data[$k]["category_name"] = $v->name;
            $data[$k]["color"] = "#".str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);

            $category_id = $v->id;

            $query = $this->db->query("SELECT SUM(expense.amount) AS sumAmount FROM `expense` WHERE expense.create_date BETWEEN '01-10-2020' AND '$date_end' AND expense.category_id = $category_id")->result();
            $data[$k]["amount"] = intval($query[0]->sumAmount);
        }

        $res = array("category" => $category, "data" => $data);
        return $res;
    }

    public function report_center() 
    {
        /**
         * New Office Making Cost	cost oct 2019 onwards
         *   Upgrades Cost	cost oct 2019 onwards      
         *   Cost of running	cost nov 2019 onwards
         *   Total income	oct 2019 onwards
         *   Total expense	oct 2019 onwards      
         *   Total running expense	nov 2019 onwards
         *   total development expense	oct 2019 onwards
         */

        $data = array();
        $date_end = date("Y-m-d", strtotime("now"));

        /** New Office Making cost oct 2019 onwards  */
        $query = $this->db->query("SELECT SUM(expense.amount) AS sumAmount FROM `expense` WHERE expense.create_date BETWEEN '2019-10-01' AND '$date_end' AND expense.category_id = 20")->result();
        $data["new_office_making"] = intval($query[0]->sumAmount);

        /** Upgrades cost oct 2019 onwards  */
        $query = $this->db->query("SELECT SUM(expense.amount) AS sumAmount FROM `expense` WHERE expense.create_date BETWEEN '2019-10-01' AND '$date_end' AND expense.category_id = 18")->result();
        $data["upgrades"] = intval($query[0]->sumAmount);

        /**  total development expense	oct 2019 onwards */
        $data["developmnet_cost"] = $data["new_office_making"] + $data["upgrades"];

        /** Total expense oct 2019 onwards  */
        $query = $this->db->query("SELECT SUM(expense.amount) AS sumAmount FROM `expense` WHERE expense.expense_type = 'MONTHLY' AND expense.create_date BETWEEN '2019-10-01' AND '$date_end'")->result();
        $data["total_expense_monthly"] = intval($query[0]->sumAmount);

        $query = $this->db->query("SELECT SUM(expense.amount) AS sumAmount FROM `expense` WHERE expense.expense_type = 'ACCOUNTS_RECEIVABLE' AND expense.create_date BETWEEN '2019-10-01' AND '$date_end'")->result();
        $data["total_expense_payable"] = intval($query[0]->sumAmount);

        /** Total income nov 2019 onwards */
        $query = $this->db->query("SELECT SUM(payment.amount) AS sumAmount FROM `payment` WHERE payment.create_date BETWEEN '2019-11-01' AND '$date_end' AND payment.payment_type = 'MONTHLY'")->result();
        $data["total_income_monthly"] = intval($query[0]->sumAmount);

        /** Total income nov 2019 onwards */
        $query = $this->db->query("SELECT SUM(payment.amount) AS sumAmount FROM `payment` WHERE payment.create_date BETWEEN '2019-11-01' AND '$date_end' AND payment.payment_type = 'ACCOUNTS_PAYABLE'")->result();
        $data["total_income_payable"] = intval($query[0]->sumAmount);

        /** Cost of running	cost nov 2019 onwards */
        $query = $this->db->query("SELECT SUM(expense.amount) AS sumAmount FROM `expense` WHERE expense.create_date BETWEEN '2019-11-01' AND '$date_end' AND expense.category_id NOT IN (20,18) AND expense.expense_type = 'MONTHLY'")->result();
        $data["running_cost"] = intval($query[0]->sumAmount);

        /** gross_profit (minus development cost) */
        $data["gross_profit"] = $data["total_income_monthly"] - $data["running_cost"];

        /** total income */
        $data["net_income"] = $data["total_income_monthly"] + $data["total_income_payable"];

        /** total expense */
        $data["net_expense"] = $data["total_expense_monthly"] + $data["total_expense_payable"];

        /** unpaid invoices */
        $query = $this->db->query("SELECT SUM((price * quantity)) AS sumAmount FROM `invoiceDetail` INNER JOIN invoice ON invoice.invoiceId = invoiceDetail.invoiceId WHERE invoice.isPaid = 0")->result();
        $data["unpaid_invoice"] = intval($query[0]->sumAmount);

        $query = $this->db->query("SELECT * FROM `user` LIMIT 1");
        $openingData = $query->result();

        $data["receivable"] = $openingData[0]->accounts_receivable + $data["unpaid_invoice"];
        $data["payable"] = ($openingData[0]->accounts_payable + $data["total_income_payable"]) - $data["total_expense_payable"];

        $data["opening_receivable"] = $openingData[0]->accounts_receivable;
        $data["opening_payable"] = $openingData[0]->accounts_payable;
        
        /** net profit */
        $data["net_profit"] = ($data["net_income"] + $data["receivable"]) - ($data["net_expense"] + $data["payable"]);

        return $data;
    }
}

?>