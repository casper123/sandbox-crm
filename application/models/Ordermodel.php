<?php
class Ordermodel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function insertOrder()
    {
        $existingCart = $this->session->userdata();
        
        $insertData["market"] = $existingCart["marketName"];
        $insertData["order_state"] = 1;
        $insertData["order_type"] = 1;
        $insertData["order_validaity_date"] = date("Y-m-d H:i:s", strtotime("+2 day"));
        $insertData["order_amount"] = $existingCart["total"];
        $insertData["create_date"] = date("Y-m-d H:i:s", strtotime("now"));
        $insertData["user_id"] = 1;
        $insertData["order_id"] = time()."-".mt_rand(5, 15);

        $this->db->insert("orders", $insertData);
        
        $ordersId["orderNumber"] = $insertData["order_id"];
        $this->session->set_userdata($ordersId); 
        $this->insertOrderItem();
        return;
    }

    public function get_last_ten_entries()
    {
        $query = $this->db->get('orders', 10);
        return $query->result();
    }
}
?>