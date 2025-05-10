<?php

class Blogmodel extends CI_Model {

    private $tablename = "`blog_content`";

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all(){
        $query = $this->db->query("SELECT blog_content.* FROM blog_content ORDER BY id DESC");
        return $query->result();
    }

    public function getLatestBlogs($count = 8)
    {
        $query = $this->db->query("SELECT blog_content.* FROM blog_content DESC LIMIT $count");
        return  $query->result();
    }


    public function getCategoryBlogs($siteID = 1, $categoryID= 0, $count = 5)
    {
        $query = $this->db->query("SELECT blog_content.*, category.title as category_title, category.category_url AS category_url, site.site_name as siteName FROM blog_content LEFT JOIN category ON category.category_id = blog_content.category_id INNER JOIN site ON site.site_id = blog_content.site_id WHERE blog_content.site_id = $siteID AND blog_content.category_id = $categoryID ORDER BY blog_content.id DESC LIMIT $count");
        return  $query->result();
    }

    function get($id = 0) {

        $query = $this->db->query("SELECT blog_content.* FROM blog_content WHERE blog_content.id = $id");
        $res =  $query->result();
        return $res[0];
    }

    function getByUrl($url = "", $siteID = 1) {

        $query = $this->db->query("SELECT blog_content.* FROM blog_content WHERE blog_content.url = '$url'");
        $res =  $query->result();
        return $res[0];
    }

    function save($data)
    {
        $names = array(
            "Alan Yang", 
            "Alan Gorekem", 
            "Paul Sailes", 
            "Dean Goodwin", 
            "Merve Yildiz",
            "Andrew Kitchen",
            "Ryan",
            "Jeff Callahan",
            "Ricopoulos",
            "Eric Lespesgon",
            "Karen Donaldson",
            "Sarah Anderson",
            "Eden Footes",
            "Amanda Steadman");

        $obj = array();
        $obj["title"] = $data["title"];
        $obj["content"] = $data["content"];
        $obj["is_active"] = $data["is_active"];
        $obj["is_featured"] = $data["is_featured"];
        $obj["meta_title"] = $data["meta_title"];
        $obj["meta_description"] = $data["meta_description"];
        $obj["is_homepage"] = $data["is_homepage"];

        if ($data["url"] == "") {
            $obj["url"] = clean_url($data["title"]);
        } else {
            $obj["url"] = clean_url($data["url"]);
        }
        

        if (isset($_FILES["thumb"]) && $_FILES["thumb"]["name"] != "") {
            $thumb = $this->imageuploader($_FILES["thumb"]);
            $obj["featured_image"] = $thumb["location"];
        }
        
        if (intval($data["id"]) > 0) {
            $this->db->where('id', $data["id"]);
            $this->db->update("blog_content", $obj);
        } else {
            $obj["created_by_name"] = $names[rand(0,13)];
            $this->db->insert($this->tablename, $obj);
            return $this->db->insert_id();
        }
    }

    public function imageuploader($file)
    {        
        $imageFolder = "/var/www/sandbox.com.pk/public_html/images/";
        if (is_uploaded_file($file['tmp_name'])){
            
            // Sanitize input
            if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $file['name'])) {
                header("HTTP/1.1 400 Invalid file name.");
                return;
            }
        
            // Verify extension
            if (!in_array(strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
                header("HTTP/1.1 400 Invalid `extension`.");
                return;
            }
        
            $n = strrpos($file['name'],".");
            $ext = substr($file['name'],$n+1);
            $fileName = strtotime("now").".".$ext;
            // Accept upload if there was no origin, or if it is an accepted origin
            $filetowrite = $imageFolder . $fileName;
            move_uploaded_file($file['tmp_name'], $filetowrite);
            return array('location' => "https://sandbox.com.pk/images/$fileName");
          } else {
            // Notify editor that the upload failed
            header("HTTP/1.1 500 Server Error");
          }
    }
}

?>