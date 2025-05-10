<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

    public function __construct()
	{
	    parent::__construct();
		$this->load->model('Checkoutmodel');
	}
	
	public function index()
	{
		$data["selectedTab"] = "orders";
		$data["orders"] = $this->Checkoutmodel->get_all_records();
		$this->layout->view("orders",$data);
	}
}
