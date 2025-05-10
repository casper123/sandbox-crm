<?php

class Paymentmodel extends CI_Model {

    private $tablename = "`payment`";

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function paymentsToday()
    {
        $date = date("Y-m-d", strtotime("now"));
        $query = $this->db->query( "SELECT 
                                      payment.*,
                                      categories.`name` as category_name,
                                      teams.team_name as team_name
                                    FROM
                                      `payment` 
                                      LEFT JOIN `categories` 
                                        ON payment.`category_id` = categories.`id` 
                                        LEFT JOIN teams ON payment.team_id = teams.id WHERE DATE(payment.create_date) = '$date' ORDER BY payment_id DESC");

        return $query->result();
    }

    public function yearly_income($fmp = 0)
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
                $query = $this->db->query("SELECT SUM(payment.amount) AS sumAmount FROM `payment` WHERE payment.create_date BETWEEN '$date_start' AND '$date_end'")->result();
            else
            {
                $query = $this->db->query("SELECT SUM(payment.amount) AS sumAmount FROM `payment` WHERE payment.category_id = 16 AND payment.create_date BETWEEN '$date_start' AND '$date_end'")->result();
            }
                
            $obj["amount"] = intval($query[0]->sumAmount);
            $obj["color"] = "#".str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
            
            $result[] = $obj;
        }
        
        return $result;
    }


    public function yearly_income_categories()
    {
        for ($i = 0; $i <= 12; $i++) {
            $months[] = array(
                            "title" => date("M-y", strtotime( date( 'Y-m-01' )." -$i months")), 
                            "date" => date("Y-m-d", strtotime( date( 'Y-m-01' )." -$i months"))
            );
        }

        $months = array_reverse($months);

        $data = array();
        $category = $this->Categorymodel->getInvoiceCategory();

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

                $query = $this->db->query("SELECT SUM(payment.amount) AS sumAmount FROM `payment` WHERE payment.create_date BETWEEN '$date_start' AND '$date_end' AND payment.category_id = $category_id")->result();

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

    public function monthly_income()
    {
        $date_start = $this->firstDay();
        $date_end = $this->lastDay();

        $data = [];
        $category = $this->Categorymodel->getInvoiceCategory();

        foreach ($category as $key => $value) 
        {
            $obj = array();
            $obj["category"] = $value->name;

            $query = $this->db->query("SELECT SUM(payment.amount) AS sumAmount FROM `payment` WHERE  payment_type = 'MONTHLY' AND category_id = ".$value->id." AND payment.create_date BETWEEN '$date_start' AND '$date_end'")->result();
            $obj["amount"] = intval($query[0]->sumAmount);
            $obj["color"] = "#".str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
            $data[] = $obj;
        }
       
        return $data;
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
            $where = " where ".$this->tablename.".payment_id = $id";
        }

        $query = $this->db->query( "SELECT 
                                      payment.*,
                                      categories.`name` as category_name,
                                      teams.team_name as team_name,
                                      invoice.invoiceNumber
                                    FROM
                                      `payment` 
                                        LEFT JOIN `categories`  ON payment.`category_id` = categories.`id` 
                                        LEFT JOIN `invoice`  ON payment.`sb_invoiceId` = invoice.`invoiceId` 
                                        LEFT JOIN teams ON payment.team_id = teams.id ".$where." ORDER BY payment_id DESC");
        return $query->result();
    }

    public function set_record_invoice($postedData)
    {
        foreach ($postedData["amount"] as $key => $value) {
            
            if(intval($value) == 0)
                continue;

            $data = array();
            
            $data["category_id"] = intval($_POST["category_id"][$key]);
            $data["team_id"] = $this->input->post('team_id');
            $data["description"] = $_POST["description"][$key];
            $data["amount"] = intval($value);
            $data["gi_invoiceId"] = $this->input->post("invoice_id");

            if($this->input->post("create_date") != "")
                $data["create_date"] = date("Y-m-d 00:00:00",strtotime($this->input->post("create_date")));
            else
                $data["create_date"] = date("Y-m-d h:i:s",strtotime("now"));

            $data["update_date"]         = date("Y-m-d H:i:s", strtotime("now"));

            $this->db->insert($this->tablename, $data);
        }

        if ($this->input->post("invoice_id") != "")
        {
            //get previous payments
            $query = $this->db->query('SELECT SUM(amount) as total_amount from payment WHERE gi_invoiceId = "'.$this->input->post("invoice_id").'"');
            $total = $query->result();
            $this->updateInvoice($this->input->post("invoice_id"), floatval($total[0]->total_amount));
        }

        $invId = $this->input->post("invoice_id");
        $this->Datalogmodel->set_record(array("	details" => "Payment records inserted for Invoice with ID: $invId", "sql_query" =>  $this->db->last_query()));
    }

    public function setSbInvoiceRecord($postedData)
    {
        $pr = "PR" . strtotime("now");
        foreach ($postedData["amount"] as $key => $value) {
            
            if(intval($value) == 0)
                continue;

            $data = array();
            
            $data["category_id"] = intval($_POST["category_id"][$key]);
            $data["team_id"] = $this->input->post('team_id');
            $data["description"] = $_POST["description"][$key];
            $data["amount"] = intval($value);
            $data["sb_invoiceId"] = $this->input->post("invoice_id");
            $data["payment_number"] = $pr;
            $data["payment_method"] = $_POST["payment_method"];

            if($this->input->post("create_date") != "")
                $data["create_date"] = date("Y-m-d 00:00:00",strtotime($this->input->post("create_date")));
            else
                $data["create_date"] = date("Y-m-d h:i:s",strtotime("now"));

            $data["update_date"]         = date("Y-m-d H:i:s", strtotime("now"));

            $this->db->insert($this->tablename, $data);
        }

        $invID = $this->input->post("invoice_id");
        $this->Datalogmodel->set_record(array("	details" => "Payment records inserted for Invoice with ID: $invID", "sql_query" =>  $this->db->last_query()));

        //get payments data
        $query = $this->db->query( "SELECT payment.*, categories.`name` as category_name, teams.team_name as team_name FROM `payment`  LEFT JOIN `categories`  ON payment.`category_id` = categories.`id` LEFT JOIN teams ON payment.team_id = teams.id WHERE payment.payment_number = '$pr' ORDER BY payment_id ASC");
        return $query->result();
    }

    public function getInvoicePayments($invoiceId = 0)
    {
        //get payments data
        $query = $this->db->query( "SELECT payment.*, categories.`name` as category_name, teams.team_name as team_name FROM `payment`  LEFT JOIN `categories`  ON payment.`category_id` = categories.`id` LEFT JOIN teams ON payment.team_id = teams.id WHERE payment.sb_invoiceId = $invoiceId ORDER BY payment_id ASC");
        return $query->result();
    }

    public function getReceiptPayments($receiptNumber = "")
    {
        //get payments data
        $query = $this->db->query( "SELECT payment.*, categories.`name` as category_name, teams.team_name as team_name FROM `payment`  LEFT JOIN `categories`  ON payment.`category_id` = categories.`id` LEFT JOIN teams ON payment.team_id = teams.id WHERE payment.payment_number = '$receiptNumber' ORDER BY payment_id ASC");
        return $query->result();
    }

    public function setInvoiceRecord($postedData)
    {
        $pr = "PR" . strtotime("now");
        foreach ($postedData["amount"] as $key => $value) {
            
            if(intval($value) == 0)
                continue;

            $data = array();
            
            $data["category_id"] = intval($_POST["category_id"][$key]);
            $data["team_id"] = $this->input->post('team_id');
            $data["description"] = $_POST["description"][$key];
            $data["amount"] = intval($value);
            $data["sb_invoiceId"] = $this->input->post("invoice_id");
            $data["payment_number"] = $pr;

            if($this->input->post("create_date") != "")
                $data["create_date"] = date("Y-m-d 00:00:00",strtotime($this->input->post("create_date")));
            else
                $data["create_date"] = date("Y-m-d h:i:s",strtotime("now"));

            $data["update_date"]         = date("Y-m-d H:i:s", strtotime("now"));

            $this->db->insert($this->tablename, $data);
        }

        $invID = $this->input->post("invoice_id");
        $this->Datalogmodel->set_record(array("	details" => "Payment records inserted for Invoice with ID: $invID", "sql_query" =>  $this->db->last_query()));

        //get payments data
        $query = $this->db->query( "SELECT payment.*, categories.`name` as category_name, teams.team_name as team_name FROM `payment`  LEFT JOIN `categories`  ON payment.`category_id` = categories.`id` LEFT JOIN teams ON payment.team_id = teams.id WHERE payment.payment_number = '$pr' ORDER BY payment_id ASC");
        return $query->result();
    }

    function set_record(){
        $data   = array();
        $data   = $this->getPostedParams();

        //$data["create_date"]         = date("Y-m-d H:i:s", strtotime("now"));
        $data["update_date"]         = date("Y-m-d H:i:s", strtotime("now"));
        $data["payment_number"]         = $pr = "PR" . strtotime("now");
        $this->db->insert($this->tablename, $data);

        $id = $this->db->insert_id();

        $this->Datalogmodel->set_record(array("	details" => "Payment record with ID: $id", "sql_query" =>  $this->db->last_query()));
        return $id;
    }

    function update_record($id){
        $data = array();
        $data = $this->getPostedParams();

        $data["update_date"] = date("Y-m-d H:i:s", strtotime("now"));
        $this->db->where('payment_id', $id);
        $this->db->update($this->tablename, $data);

        $this->Datalogmodel->set_record(array("	details" => "Payment record updated having ID: $id", "sql_query" =>  $this->db->last_query()));
        return true;
    }

    function delete_record($id){
        $this->db->delete($this->tablename, array('payment_id' => $id));

        $this->Datalogmodel->set_record(array("	details" => "Payment record deleted having ID: $id", "sql_query" =>  $this->db->last_query()));
        return true;
    }

    function getPostedParams(){
        $data["category_id"]     = $this->input->post('category_id');
        $data["team_id"]     = $this->input->post('team_id');
        $data["description"]     = $this->input->post("description");
        $data["amount"]          = $this->input->post("amount");
        $data["gi_invoiceId"]          = $this->input->post("invoice_id");
        $data["payment_method"] = $_POST["payment_method"];
        $data["payment_type"] = $_POST["payment_type"];

        if($this->input->post("create_date") != "")
            $data["create_date"]    = date("Y-m-d 00:00:00",strtotime($this->input->post("create_date")));
        else
            $data["create_date"]    = date("Y-m-d h:i:s",strtotime("now"));

        return $data;
    }

    public function updateInvoice($invoiceId = 0, $paidAmount = 0)
    {
        $invoice = $this->Invoicemodel->getInvoice($invoiceId);   

        // send invoice
        $response = $this->Clientmodel->getClient($invoice->invoice[0]->customer_id);
        $email = $response->email;
        
        $smsData = array(
            "team_owner" => $invoice->invoice[0]->customer_name,
            "amount" => $invoice->invoice[0]->total,
            "reciept_no" => $invoice->invoice[0]->invoice_no
        );

        $this->Invoicemodel->sendInvoice($invoice->invoice[0]->id, $email, $invoice->invoice[0]->customer_phone, $smsData, "inovice_paid");
    }

    public function total_income_categories()
    {
        $data = array();
        $category = $this->Categorymodel->getInvoiceCategory();

        $date_end = date("Y-m-d", strtotime("now"));
        foreach ($category as $k => $v) 
        {
            $result = array();
            $data[$k] = array();
            $data[$k]["category_name"] = $v->name;
            $data[$k]["color"] = "#".str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);

            $category_id = $v->id;

            $query = $this->db->query("SELECT SUM(payment.amount) AS sumAmount FROM `payment` WHERE payment.create_date BETWEEN '01-11-2020' AND '$date_end' AND payment.category_id = $category_id")->result();
            $data[$k]["amount"] = intval($query[0]->sumAmount);
        }

        $res = array("category" => $category, "data" => $data);
        return $res;
    }
}

?>