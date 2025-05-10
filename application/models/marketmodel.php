<?php
class Marketmodel extends CI_Model {

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
		$query = $this->db->query("SELECT * FROM campus".$where);
		return $query->result();
    }

    function getMarketList()
    {
		$query = $this->db->query("SELECT market_id,name,logo FROM market");
		return $query->result();
    }

	
	function getMarketBranchList()
    {
    	$marketName = $this->session->userdata("marketName");
		$query = $this->db->query('SELECT market_branch.market_branch_id,market_branch.name, market_branch.address FROM market_branch LEFT JOIN market ON market_branch.market_id = market.market_id WHERE market.name LIKE "%'.$marketName.'%"');
		return $query->result();
    }

}
?>