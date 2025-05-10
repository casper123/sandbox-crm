<?php

class Followupstatusmodel extends CI_Model {

    private $tablename = "`followup_status`";
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function getAll($type = 0, $typeId = 0)
    {
        $data  = array();
        $query = $this->db->query("SELECT * from followup_status WHERE followup_type = $type AND type_id = $typeId");
        return $query->result();
    }

    public function getLast($type = 0, $typeId = 0)
    {
        $data  = array();
        $query = $this->db->query("SELECT * from followup_status WHERE followup_type = $type AND type_id = $typeId ORDER BY followup_id DESC LIMIT 1");
        return $query->result();
    }

    public function create($data = array())
    {
        $this->db->insert("followup_status", $data);
        $jvId = $this->db->insert_id();

        $this->Datalogmodel->set_record(array("	details" => "Followup record inserted for ID: $jvId", "sql_query" =>  $this->db->last_query()));
        return $jvId;
    }
}
?>