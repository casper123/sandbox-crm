<?php

class Jvmodel extends CI_Model {

    private $tablename = "`journal_voucher`";
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function getJvList()
    {
        $data  = array();
        $query = $this->db->query("SELECT * from journal_voucher ORDER by jv_id DESC");
        return $query->result();
    }

    public function getSingleJv($id = 0)
    {
        $query = $this->db->query("SELECT * FROM journal_voucher WHERE jv_id = $id");
        return $query->result();
    }

    public function createJv($data = array())
    {
        $this->db->insert("journal_voucher", $data);
        $jvId = $this->db->insert_id();

        $this->Datalogmodel->set_record(array("	details" => "Jv record inserted for ID: $jvId", "sql_query" =>  $this->db->last_query()));
        return $jvId;
    }

    public function updateJv($data = array(), $jvId)
    {
        $this->db->where('jv_id', $jvId);
        $this->db->update("journal_voucher", $data);

        $this->Datalogmodel->set_record(array("	details" => "Jv record updated for ID: $jvId", "sql_query" =>  $this->db->last_query()));
        return $jvId;
    }

    public function deleteJv($jvId)
    {
        $this->db->delete('journal_voucher', array('jv_id' => $jvId));

        $this->Datalogmodel->set_record(array("	details" => "Jv record deleted for ID: $jvId", "sql_query" =>  $this->db->last_query()));
        return; 

    }
}
?>