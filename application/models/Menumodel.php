<?php

class Menumodel extends CI_Model {

    private $tablename = "`menu`";

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
        $data["name"]  = $_POST["name"];
        $this->db->insert($this->tablename, $data);
        return $this->db->insert_id();
    }

    function update_record($id){
        $data["name"]    = $_POST["name"];
        $this->db->where('id', $id);
        return $this->db->update($this->tablename, $data);
    }

    function delete_record($id){
        return $this->db->delete($this->tablename, array('id' => $id));
    }
}

?>