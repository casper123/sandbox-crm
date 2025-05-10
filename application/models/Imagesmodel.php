<?php

class Imagesmodel extends CI_Model {

    private $tablename = "`images`";

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

        $query = $this->db->query("SELECT * FROM  " . $this->tablename." ORDER BY id DESC LIMIT 10 ");
        return $query->result();
    }

    function set_record(){

        $image = $this->upload_image();
        if($image["success"] == false){
            return false;
        }
        $data["path"]    = $image["path"];
        $this->db->insert($this->tablename, $data);
		return true;
    }

    function update_record($id,$data){
        $data = array(
            'title' => $title        
        );

        $this->db->where('id', $id);
        $this->db->update($this->tablename, $data);
    }

    function delete_record($id){
        return $this->db->delete($this->tablename, array('id' => $id));
    }

     function upload_image(){
        $returnarray["success"] = false;

        if(count_($_FILES) > 0 && $_FILES["path"]["name"] != ""){
			$directory = __DIR__;
			$target_dir = substr($directory, 0, strpos($directory, "restaurant"))."/restaurant/gallary_images/";
			
            $target_file = $target_dir .'/'.time(). "-". basename($_FILES["path"]["name"]);
            $file_name = time(). "-". basename($_FILES["path"]["name"]);
            $uploadOk = 1;
			
			if(file_exists($_FILES["path"]["tmp_name"])){}
			else
			{
			  $uploadOk = 0;
			}
			
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check file size
            if ($_FILES["path"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
               if (move_uploaded_file($_FILES["path"]["tmp_name"], $target_file)) {
                   $returnarray["success"] = true;
                   $returnarray["path"] = $file_name;
                } else {
                    $returnarray["success"] = false;
                    $returnarray["path"] = "Sorry, there was an error uploading your file.";
                }
            }
        }
        return $returnarray;
    }
}

?>