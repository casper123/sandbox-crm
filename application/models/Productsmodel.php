<?php

class Productsmodel extends CI_Model {

    private $tablename = "`products`";

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_record($id = "",$product_type  = 'normal'){
        $where = "where product_type  = '".$product_type."' ";
        
        if($id > 0){
            $where .= "  AND id = $id";
        }

        $query = $this->db->query("SELECT *, (SELECT `name` FROM `menu` WHERE `menu`.`id` = `products`.`menu_id` )  AS menu_name FROM  " . $this->tablename." ".$where);
        return $query->result();
    }

    function set_record(){

        $image = $this->upload_image();
        if($image["success"] !== false){
             $data["product_image"]    = $image["product_image"];
        }else{
            $data["product_image"]    = "";
        }
        $data["menu_id"]        = intval($_POST["menu_id"]);
        $data["product_name"]   = $_POST["product_name"];
        $data["price"]          = isset($_POST["price"]) ? $_POST["price"] : 0;
        $data["description"]    = $_POST["description"];
        $data["product_type"]   = $_POST["product_type"];
        $data["product_image"]  = $image["product_image"];

        $data["half_price"]         = isset($_POST["half_price"]) ? $_POST["half_price"] : null;
        $data["full_price"]         = isset($_POST["full_price"]) ? $_POST["full_price"] : null;
        $data["family_pack_price"]  = isset($_POST["family_pack_price"]) ? $_POST["family_pack_price"] : null;
        $data["tinpack_435_grams_price"] = isset($_POST["tinpack_435_grams_price"]) ? $_POST["tinpack_435_grams_price"] : null;
        $data["tinpack_850_grams_price"] = isset($_POST["tinpack_850_grams_price"]) ? $_POST["tinpack_850_grams_price"] : null;

        $this->db->insert($this->tablename, $data);
        return $this->db->insert_id();
    }

    function update_record($id){
        
        $image = $this->upload_image();
        if($image["success"] !== false){
             $data["product_image"]    = $image["product_image"];
        }
		
        $data["menu_id"]        = intval($_POST["menu_id"]);
        $data["product_name"]   = $_POST["product_name"];
        $data["price"]          = isset($_POST["price"]) ? $_POST["price"] : 0;
        $data["description"]    = $_POST["description"];
        $data["product_type"]   = $_POST["product_type"];


        $data["half_price"]         = isset($_POST["half_price"]) ? $_POST["half_price"] : null;
        $data["full_price"]         = isset($_POST["full_price"]) ? $_POST["full_price"] : null;
        $data["family_pack_price"]  = isset($_POST["family_pack_price"]) ? $_POST["family_pack_price"] : null;
        $data["tinpack_435_grams_price"] = isset($_POST["tinpack_435_grams_price"]) ? $_POST["tinpack_435_grams_price"] : null;
        $data["tinpack_850_grams_price"] = isset($_POST["tinpack_850_grams_price"]) ? $_POST["tinpack_850_grams_price"] : null;

        $this->db->where('id', $id);
        return $this->db->update($this->tablename, $data);
    }

    function delete_record($id){
        return $this->db->delete($this->tablename, array('id' => $id));
    }
	
    function upload_image(){
        $returnarray["success"] = false;

        if(count_($_FILES) > 0 && $_FILES["product_image"]["name"] != ""){
			
			$directory = __DIR__;
			$target_dir = substr($directory, 0, strpos($directory, "restaurant"))."/restaurant/assets/products_images/";
			$target_file = $target_dir .'/'.time(). "-". basename($_FILES["product_image"]["name"]);
            $file_name = time(). "-". basename($_FILES["product_image"]["name"]);
            $uploadOk = 1;
            
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check file size
            if ($_FILES["product_image"]["size"] > 500000) {
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
               if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
                   $returnarray["success"] = true;
                   $returnarray["product_image"] = $file_name;
                } else {
                    $returnarray["success"] = false;
                    $returnarray["product_image"] = "Sorry, there was an error uploading your file.";
                }
            }
        }
        return $returnarray;
    }

    function get_signature(){
        $query = $this->db->query("SELECT * FROM  " . $this->tablename. " WHERE product_type = 'signature' order by id DESC");
        return $query->result();
    }   
    
    function get_tinpack(){
       $query = $this->db->query("SELECT * FROM  " . $this->tablename. " WHERE product_type = 'tinpack' order by id DESC");
        return $query->result();
    }

    function get_record_page_wise($currentpage = 1, $menu_id = ""){

        if($menu_id != "" && intval($menu_id) > 0){
            $concate = " AND menu_id = ".intval($menu_id);
        }else
            $concate = "";

         $query = $this->db->query("SELECT *, (SELECT `name` FROM `menu` WHERE `menu`.`id` = `products`.`menu_id` )  AS menu_name FROM  " . $this->tablename." WHERE products.`product_type` != 'tinpack' AND products.`product_type` != 'signature'  ".$concate);

         $total = $query->num_rows();

        $record_per_page = 9;
        
        if($currentpage <= 0){
            $currentpage = 1;
        }
        
        if($currentpage == 1){
            $offset = 0;
            $limit = $record_per_page;
        }

        if($currentpage > 1){
            $offset = $currentpage * $record_per_page;
            $limit = $record_per_page;
        }

        $query = $this->db->query("SELECT *, (SELECT `name` FROM `menu` WHERE `menu`.`id` = `products`.`menu_id` )  AS menu_name FROM  " . $this->tablename." WHERE products.`product_type` != 'tinpack' AND products.`product_type` != 'signature' ".$concate."   Limit ".$offset.",".$limit);
        $returnarray["total_record"] = $total;
        $returnarray["normal_dishes"] = $query->result();
        return $returnarray;
    }

    function get_tinpack_record_page_wise($currentpage = 1){

         $query = $this->db->query("SELECT *, (SELECT `name` FROM `menu` WHERE `menu`.`id` = `products`.`menu_id` )  AS menu_name FROM  " . $this->tablename." WHERE products.`product_type` = 'tinpack' ");

         $total = $query->num_rows();

        $record_per_page = 9;
        
        if($currentpage <= 0){
            $currentpage = 1;
        }
        
        if($currentpage == 1){
            $offset = 0;
            $limit = $record_per_page;
        }

        if($currentpage > 1){
            $offset = $currentpage * $record_per_page;
            $limit = $record_per_page;
        }

        $query = $this->db->query("SELECT * FROM  " . $this->tablename." WHERE products.`product_type` = 'tinpack' ORDER BY id DESC  Limit ".$offset.",".$limit);

        $returnarray["total_record"] = $total;
        $returnarray["tinpack"] = $query->result();
        return $returnarray;
    }

    function get_product_price_and_img($prod_id){
        $query = $this->db->query("SELECT * FROM  " . $this->tablename." WHERE id=".intval($prod_id));
        $response = $query->result();
        return $response[0];
    }

}

?>