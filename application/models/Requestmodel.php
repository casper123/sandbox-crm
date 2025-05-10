<?php

class Requestmodel extends CI_Model {

    private $tablename = "`sandbox_request`";
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function getList()
    {
        $data  = array();
        $query = $this->db->query("SELECT * from sandbox_request ORDER by request_id DESC");
        $res = $query->result();
        foreach ($res as $key => $value) {
            $lastFollowUp = $this->Followupstatusmodel->getLast(2, $value->request_id);
            $value->followup = $lastFollowUp[0];
            $res[$key] = $value;
        }

        return $res;
    }

    public function getPendingList()
    {
        $data  = array();
        $query = $this->db->query("SELECT * from sandbox_request WHERE current_status = 'PENDING' ORDER by request_id DESC");
        return $query->result();
    }

    public function getTodayFollowup()
    {
        $date = date("Y-m-d", strtotime("now"));
        $data  = array();
        $query = $this->db->query("SELECT * from sandbox_request WHERE DATE(next_followup) = '$date'  ORDER by request_id DESC");
        return $query->result();
    }

    public function getMissingFollowup()
    {
        $data  = array();
        $query = $this->db->query('SELECT * FROM `sandbox_request` WHERE DATE(next_followup) < DATE(CURRENT_DATE) AND current_status NOT IN ("NOT INTERESTED", "CONFIRMED") ORDER by request_id DESC');
        return $query->result();
    }

    public function getSingle($id = 0)
    {
        $query = $this->db->query("SELECT * FROM sandbox_request WHERE request_id = $id");
        return $query->result();
    }

    public function create($data = array())
    {
        $insertData = array();
        $insertData["full_name"] = $data["full_name"];

        if ($data["email_address"] != "")
            $insertData["email_address"] = $data["email_address"];
        else
            $insertData["email_address"] = "NOT AVAILABLE";

        $insertData["contact_number"] = $data["contact_number"];
        $insertData["current_status"] = $data["current_status"];
        $insertData["interested_in"] = $data["interested_in"];
        $insertData["next_followup"] = $data["next_followup"];
        $insertData["notes"] = $data["notes"];
    
        $this->db->insert("sandbox_request", $insertData);
        $jvId = $this->db->insert_id();

        $this->Datalogmodel->set_record(array("	details" => "Record record inserted for ID: $jvId", "sql_query" =>  $this->db->last_query()));
        return $jvId;
    }

    public function update($data = array(), $jvId)
    {
        $this->db->where('request_id', $jvId);
        $this->db->update("sandbox_request", $data);

        $this->Datalogmodel->set_record(array("	details" => "Request record updated for ID: $jvId", "sql_query" =>  $this->db->last_query()));
        return $jvId;
    }

    public function delete($jvId)
    {
        $this->db->delete('sandbox_request', array('request_id' => $jvId));

        $this->Datalogmodel->set_record(array("	details" => "Request record deleted for ID: $jvId", "sql_query" =>  $this->db->last_query()));
        return; 
    }

    public function sendMessage($data)
    {
        # code...
    }
}
?>