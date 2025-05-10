<?php
class Brandsmodel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    
    function getData($id = "")
    {
		if($id > 0)
		{
			$where = " where id = $id";
		}
		else
		{
			$where = "";
		}
		$query = $this->db->query("SELECT * FROM brand".$where." ORDER BY RAND()");
		return $query->result();
    }
}
?>