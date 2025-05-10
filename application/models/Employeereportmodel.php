<?php

class Employeereportmodel extends CI_Model {

    private $tablename = "`employee_report`";

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

    function set_record(){
        $data = array();
        $data = $this->getPostedParams();
        $this->db->insert($this->tablename, $data);
        $id = $this->db->insert_id();
        if($id)
        {
            return $data;
            $this->Datalogmodel->set_record(array("	details" => "Record record inserted for ID: $id", "sql_query" =>  $this->db->last_query()));
        }
        else
            return false;
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
        $data["employee_name"] = $this->input->post('employee_name');
        $data["work_done"]     = $this->input->post('work_done');
        $data["time_in"]     = $this->input->post('time_in');
        $data["time_out"]     = $this->input->post('time_out');
        return $data;
    }

}

?>