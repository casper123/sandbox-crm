<?php

class Datalogmodel extends CI_Model {

    private $tablename = "`data_log`";

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_record($id = ""){
        $where = "";
        if($id > 0){
            $where = " where logId = $id";
        }
        $query = $this->db->query("SELECT * FROM  " . $this->tablename." ".$where. " ORDER BY logId DESC ");
        return $query->result();
    }

    function set_record($data){

        $ip = $this->input->ip_address();
        $data["ip_address"] = $ip;

        $details = json_decode(file_get_contents("http://ipinfo.io/$ip/json"));
        if (isset($details->loc)) {
            $data["geolocation"] = $details->loc;
        }

        $this->db->insert($this->tablename, $data);
        return $this->db->insert_id();
    }
}

?>