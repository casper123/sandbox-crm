<?php

class Categorymodel extends CI_Model {

    private $tablename = "`categories`";

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
        $query = $this->db->query("SELECT * FROM  " . $this->tablename." ".$where. " ORDER BY id DESC ");
        return $query->result();
    }

    public function getInvoiceCategory($value='')
    {
        $query = $this->db->query("SELECT * FROM  " . $this->tablename." "."WHERE category_type = 2 ORDER BY name");
        return $query->result();
    }

    public function getExpenseCategory($value='')
    {
        $query = $this->db->query("SELECT * FROM  " . $this->tablename." "."WHERE category_type = 1 ORDER BY name");
        return $query->result();
    }

    function set_record(){
        $data   = array();
        $data   = $this->getPostedParams();
        $this->db->insert($this->tablename, $data);
        return $this->db->insert_id();
    }

    function update_record($id){
        $data = array();
        $data = $this->getPostedParams();
        $this->db->where('id', $id);
        return $this->db->update($this->tablename, $data);
    }

    function delete_record($id){
        return $this->db->delete($this->tablename, array('id' => $id));
    }

    function getPostedParams(){
        $data["name"]       = $this->input->post('name');
        $data["spending_limit"]       = floatval($this->input->post('spending_limit'));
        $data["description"]       = $this->input->post('description');
        $data["category_type"] = $this->input->post('category_type');
        return $data;
    }
}

?>