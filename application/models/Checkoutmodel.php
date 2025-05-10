<?php

class Checkoutmodel extends CI_Model {

    private $tablename = "`checkout`";

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_record($user_id){
        $query = $this->db->query("SELECT * FROM  " . $this->tablename." where user_id = ".$user_id);
        return $query->result();
    }

    function set_record(){
        $orderdata = false;

        $data = $_POST;
        if(count_($data) <= 0)
            return false;

        $user_id = isset($data["user"]["user_id"]) ? $data["user"]["user_id"] : 1;
        $grand_total = isset($data["grand_total"]) ? $data["grand_total"] : "";
        $c_address = isset($data["c_address"]) ? $data["c_address"] : "";
        
        $k_foods = isset($data["k_foods"]) ? json_encode($data["k_foods"]) : "";
        $address_id = isset($data["address"]["address_id"]) ? $data["address"]["address_id"] : 0;

         if(count_($k_foods) == "")
            return false;


        // delete pending orders of this user 

        //$this->delete_existing_cart($user_id);

        $insert_data["user_id"]            = $user_id;
        $insert_data["order_details"]      = $k_foods;
        $insert_data["status"]             = 'proceed';
        $insert_data["address_id"]         = $address_id;
        $insert_data["total_amount"]       = $grand_total;
        $insert_data["c_address"]          = $c_address;
        $this->db->insert($this->tablename, $insert_data);
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

    function getCheckoutDetailsbyUser($user_id){
        $query = $this->db->query("SELECT order_details,id,address_id FROM  " . $this->tablename." where `status` = 'pending' AND user_id = ".$user_id);

        $data = $query->result();
        $order_arr = array();
        if($data){
            $count = 0;
            foreach ($data as $key1 => $value1) {
                $address_id = $value1->address_id;
                if(isset($value1->order_details)){
                    $explode = json_decode($value1->order_details);
                    if(count_($explode) > 0){
                        foreach ($explode as $key => $value) {
                           $product = $this->get_product_name_by_id($value->product_id);
                           $order_arr[$count]["item_name"] = $product->product_name;
                           $order_arr[$count]["img"] = $product->product_image;
                           $order_arr[$count]["price"] = $product->price;
                           $order_arr[$count]["quantity"] = $value->quantity;
                           $order_arr[$count]["checkout_id"] = $value1->id;
                           $count++;
                        }
                    }
                }
            }
        }
        if(intval($address_id) > 0){
            $returnarr["address_fare"] = $this->get_address_fare($address_id)->fair;
        }
        $returnarr["order_arr"] = $order_arr;
        return $returnarr;
    }

    function get_product_name_by_id($id){
        $query = $this->db->query("SELECT product_name,product_image,price FROM products where id = ".$id);
        $pro = $query->result();
        return $pro[0];
    }

     function get_address_fare($address_id){
        $query = $this->db->query("SELECT fair FROM address_with_fare where id = ".$address_id);
        $result = $query->result();
        return $result[0];
    }


    function delete_existing_cart($user_id){
        return $this->db->delete($this->tablename, array('user_id' => $user_id, 'status' => 'pending'));
    }

    function update_order_status(){
         $data = array(
            'status' => "proceed",        
            'total_amount' => intval($_POST["grand_total"])        
        );

        $this->db->where('user_id', intval($_POST["user_id"]));
        $this->db->update($this->tablename, $data);
        return true;
    }

     function get_all_records(){
        $query = $this->db->query('SELECT 
                                      checkout.`id`,
                                      users.`name`,
                                      users.`phone`,
                                      users.`email`,
                                      address_with_fare.`address`,
                                      checkout.`order_details`,
                                      checkout.`total_amount`,
                                      checkout.`c_address`,
                                      checkout.`status`
                                    FROM
                                      `checkout` 
                                      INNER JOIN users 
                                        ON checkout.`user_id` = users.`user_id` 
                                      LEFT JOIN address_with_fare 
                                        ON checkout.`address_id` = address_with_fare.`id`
                                        ORDER BY checkout.`id` DESC
                                ');
        return $query->result();
    }
}

?>