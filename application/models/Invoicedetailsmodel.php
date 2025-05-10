<?php

class Invoicedetailsmodel extends CI_Model {

    private $tablename = "`invoice_details`";

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_record($id = ""){
        $where = "";
        
        if($id > 0){
            $where = " where id = $id";
        }

        $query = $this->db->query("SELECT * FROM  " . $this->tablename." ".$where);
        return $query->result();
    }

    function set_record($invoice_id)
    {

        $data = array();
        $json = $this->getPostedParams();
        
        foreach ($json as $key => $value) 
        {
            $value["invoice_id"] = $invoice_id;
            $value["data"] = json_encode($json);
            $value["create_date"] = date("Y-m-d H:i:s", strtotime("now"));
            $value["update_date"] = date("Y-m-d H:i:s", strtotime("now"));
            
            $this->db->insert($this->tablename, $value);
        }
        
        return $this->db->insert_id();
    }

    function update_record($id){
        $data = array();
        $json = $this->getPostedParams();
        if($json){
            $data["data"] = json_encode($json);
        }
        $data["update_date"]         = date("Y-m-d H:i:s", strtotime("now"));
        $this->db->where('invoice_id', $id);
        return $this->db->update($this->tablename, $data);
    }

    function delete_record($id){
        return $this->db->delete($this->tablename, array('id' => $id));
    }


    function getPostedParams()
    {
       if($this->input->post('invoice_details'))
       {
            $data = $this->input->post('invoice_details');

            foreach ($data as $key => $value) 
            {
                $json_obj[$key]["description"] = $value["product_name"];
                $json_obj[$key]["quantity"] = $value["quantity"];
                $json_obj[$key]["amount"] = $value["amount"];
                $json_obj[$key]["category_id"] = $value["category"];
            }
        }
        
        return $json_obj;
    }

}

?>