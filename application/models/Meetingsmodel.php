<?php

class Meetingsmodel extends CI_Model {

    private $tablename = "`meeting_room_booking`";

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
        $data["membership_type_id"]  = $this->input->post('membership_type_id');
        $data["client_name"]         = $this->input->post('client_name');
        $data["client_email"]        = $this->input->post('client_email');
        $data["client_contact"]      = $this->input->post('client_contact');
        $data["client_address"]      = $this->input->post('client_address');
        $data["meeting_time_start"]  = $this->input->post('meeting_time_start');
        $data["total_members"]       = $this->input->post('total_members');
        $data["meeting_purpose"]     = $this->input->post('meeting_purpose');
        return $data;
    }

}

?>