<?php

class Employeemodel extends CI_Model {

    private $tablename = "`employee`";

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

        $images = $this->get_upload_files_response();
        $data["update_date"]         = date("Y-m-d H:i:s", strtotime("now"));
        $data["cnic_front"]           = (isset($images["cnic_front"]) && $images["cnic_front"] !== false) ?  $images["cnic_front"] : "";
        $data["cnic_back"]           = (isset($images["cnic_back"]) && $images["cnic_back"] !== false) ?  $images["cnic_back"] : "";

        $data["status"]              = "Active";
        $data["create_date"]         = date("Y-m-d H:i:s", strtotime("now"));
        $data["update_date"]         = date("Y-m-d H:i:s", strtotime("now"));

        $this->db->insert($this->tablename, $data);
        if($this->db->insert_id())
            return $data;
        else
            return false;
     }

    function update_record($id){
        $data = array();
        $data = $this->getPostedParams();
        $images = $this->get_upload_files_response();
        $data["update_date"]         = date("Y-m-d H:i:s", strtotime("now"));
        $data["cnic_front"]           = (isset($images["cnic_front"]) && $images["cnic_front"] !== false) ?  $images["cnic_front"] : $data["cnic_front"];
        $data["cnic_back"]           = (isset($images["cnic_back"]) && $images["cnic_back"] !== false) ?  $images["cnic_back"] : $data["cnic_back"];

        $this->db->where('id', $id);
        return $this->db->update($this->tablename, $data);
    }

    function delete_record($id){
        return $this->db->delete($this->tablename, array('id' => $id));
    }


    function getPostedParams(){
        $data["name"]            = $this->input->post('name');
        $data["father_name"]     = $this->input->post('father_name');
        $data["email"]           = $this->input->post("email");
        $data["cnic"]            = $this->input->post("cnic");
        $data["cnic_front"]      = $this->input->post("cnic_front");
        $data["cnic_back"]       = $this->input->post("cnic_back");
        $data["address"]         = $this->input->post("address");
        $data["contact_no"]      = $this->input->post("contact_no");
        $data["designation"]      = $this->input->post("designation");
        $data["description"]      = $this->input->post("description");
        $data["salary"]           = $this->input->post("salary");
        $data["joining_date"]       = date("Y-m-d",strtotime( $this->input->post("joining_date") ));
        return $data;
    }


    function get_upload_files_response(){
        $image_path = array(); 
        if(count_($_FILES) > 0 ){
            foreach ($_FILES as $key => $value) {
               $image_path[$key] =  $this->uploadImage($key);
            }
        }
        return $image_path;
    }

    function checkLocalhost(){
        $whitelist = array('127.0.0.1', "::1");
        if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
            return false;
        }else{
            return true;
        }
    }

    function update_status($id){
        $query = $this->db->query("SELECT * FROM  " . $this->tablename." WHERE id =".intval($id));
        $result = $query->result();
        if(isset($result[0])){
            if($result[0]->status == "Active")
                $status = "Deactive";
            else
                $status = "Active";
        }
        $data["status"] = $status;
        $this->db->where('id', $id);
        if($this->db->update($this->tablename, $data))
            return $result[0];
        else
            return false;
    }


    function uploadImage($file){
        if(count_($_FILES) > 0 && $_FILES[$file]["name"] != ""){
            
            if($this->checkLocalhost())
                $target_dir = EMPLOYEE_IMAGES_UPLOAD;
            else{
                $directory = __DIR__;
                $target_dir = substr($directory, 0, strpos($directory, "sandbox"))."/sandbox/assets/employee";
            }

            $target_file = $target_dir .'/'.time(). "-". basename($_FILES[$file]["name"]);
            $file_name = time(). "-". basename($_FILES[$file]["name"]);
            $uploadOk = 1;
            
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check file size
            if ($_FILES[$file]["size"] > 500000) {
                return false;
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                return false;
            // if everything is ok, try to upload file
            } else {
               if (move_uploaded_file($_FILES[$file]["tmp_name"], $target_file)) {
                    return $file_name;
                } else {
                    return false;
                }
            }
        }
    }


}

?>