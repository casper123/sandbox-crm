<?php

class Invitationmodel extends CI_Model {

    private $tablename = "`invitation`";

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_active_invitations(){
        
        $query = $this->db->query("SELECT * FROM  teams  WHERE is_accepted = 0");
        
        $rec = $query->result();
        return $rec[0]->total_members;
    }

    public function getTodayFollowup()
    {
        $date = date("Y-m-d", strtotime("now"));
        $data  = array();
        $query = $this->db->query("SELECT * from invitation WHERE DATE(next_followup) = '$date'  ORDER by invitation_id DESC");
        return $query->result();
    }

    function get_record($id = ""){
        $where = "";
        
        if($id > 0){
            $where = " where invitation_id = $id";
        }

        $query = $this->db->query("SELECT * FROM  " . $this->tablename." ".$where);
        $res = $query->result();
        foreach ($res as $key => $value) {
            $lastFollowUp = $this->Followupstatusmodel->getLast(1, $value->invitation_id);
            $value->followup = $lastFollowUp[0];
            $res[$key] = $value;
        }

        return $res;
    }

    function set_record()
    {
        $data   = array();
        $data   = $this->getPostedParams();
        $data["update_date"] = date("Y-m-d H:i:s", strtotime("now"));

        if (intval($_POST["invitation_id"]) > 0) {
            $this->db->where('invitation_id', intval($_POST["invitation_id"]));
            $this->db->update($this->tablename, $data);
            $id = intval($_POST["invitation_id"]);
        } else {
            $this->db->insert($this->tablename, $data);
            $id = $this->db->insert_id();
        }

        if (strlen($_POST["followup"]) > 0) {
            $data = array();
            $data["followup"] = $_POST["followup"];
            $data["type_id"] = $id;
            $data["followup_type"] = 1;
            $this->Followupstatusmodel->create($data);
        }
    
        return $id;
    }

    function delete_record($id){
        return $this->db->delete($this->tablename, array('invitation_id' => $id));
    }

    function getPostedParams(){
        $data["full_name"]           = $this->input->post('name');
        $data["email_adress"]           = $this->input->post('email');
        $data["contact_number"]          = $this->input->post("phone");
        $data["membership_type"]          = intval($this->input->post("membership_type_id"));
        $data["price"]               = intval($this->input->post("price"));
        
        if($_POST["next_followup"] != "") {
            $data["next_followup"] = date("Y-m-d h:i:s", strtotime($this->input->post("next_followup")));
        }

        if (intval($this->input->post("notInterested")) == 2) {
            $data["is_accepted"] = 2;
        }

        return $data;
    }

    function update_status($is_accepted, $how_hear, $id){ 
        $data = array();
        $data["is_accepted"] = $is_accepted;
        $data["how_hear"] = $how_hear;
        $this->db->where('invitation_id', $id);
        $this->db->update($this->tablename, $data);
    }

    function create_invite($data)
    {
        $data["update_date"] = date("Y-m-d H:i:s", strtotime("now"));

        $this->db->insert($this->tablename, $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function getMissingFollowup()
    {
        $data  = array();
        $query = $this->db->query('SELECT * FROM `invitation` WHERE DATE(next_followup) < DATE(CURRENT_DATE) AND is_accepted = 0 ORDER by invitation_id DESC');
        return $query->result();
    }
}

?>