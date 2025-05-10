<?php

class Reservationmodel extends CI_Model {

    private $tablename = "`images`";

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_table_reservation(){
        $query = $this->db->query("SELECT * FROM table_booking order by id DESC");
        return $query->result();
    }

    function get_event_reservation(){
        $query = $this->db->query("SELECT 
                                      er.`contact`,
                                      er.`date_of_event`,
                                      er.`email`,
                                      er.`event_type`,
                                      er.`name`,
                                      er.`special_notes`,
                                      er.`total_amount`,
                                      er.`start_time`,
                                      er.`end_time`,
                                      er.total_guest,
                                      d.name AS deal_name 
                                    FROM
                                      `event_reservation` er 
                                      LEFT JOIN deals d 
                                        ON er.`deal_id` = d.id 
                                    ORDER BY `er`.id DESC ");
        return $query->result();
    }

    function set_record($data){

        $image = $this->upload_image();
        if($image["success"] == false){
            return false;
        }
        $data["path"]    = $image["path"];
        $this->db->insert($this->tablename, $data);
    }

    function insert_reservation(){
        $data["name"]           = $_POST["name"];
        $data["email"]          = $_POST["email"];
        $data["contact"]        = $_POST["mobile"];
        $data["date_of_event"]  = $_POST["date"];
        $data["start_time"]     = $_POST["end_time"];
        $data["end_time"]       = $_POST["end_time"];
        $data["total_guest"]    = $_POST["total_guest"];
        $data["special_notes"]  = $_POST["notes"];
        $data["event_type"]     = $_POST["event_type"];
        $data["total_amount"]   = $_POST["total_amount"];
        $data["deal_id"]   = $_POST["deal_id"];
        $this->db->insert('event_reservation', $data);
        return $this->db->insert_id();
    }

     function insert_table_reservation(){
        $data["name"]           = $_POST["name"];
        $data["email"]          = $_POST["email"];
        $data["contact"]        = $_POST["mobile"];
        $data["date_of_reservation"]  = $_POST["date"];
        $data["total_guest"]     = $_POST["person"];
        //$data["start_time"]       = $_POST["start_time"];
        $data["special_notes"]  = $_POST["notes"];
        $data["floor"]          = $_POST["floor"];
        $data["time"]          = $_POST["start_time"];
        $this->db->insert('table_booking', $data);
        return $this->db->insert_id();
    }

     function get_address_fare($adress_id){
        $query = $this->db->query("SELECT fair FROM address_with_fare where id = ".$adress_id);
        $response = $query->result();
        return $response[0];
    }
}

?>