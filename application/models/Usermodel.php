<?php
class Usermodel extends CI_Model {
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    function insert_entry()
    {
        $this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

    function get_user_by_id($id){
        $query = $this->db->query("SELECT * FROM users where user_id = ".$id);
        $user = $query->result();
        return $user;
    }
	
	
	function get_address_details(){
		 $query = $this->db->get('address_with_fare');
        return $query->result();
	}
	
}
?>