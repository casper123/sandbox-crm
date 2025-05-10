<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {

    public function __construct()
	{
	    parent::__construct();

		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
			redirect(base_url()."admin/");
		$this->load->model('Reservationmodel');
	}
	
	public function index()
	{
		$data["selectedTab"] = "event_reservation";
		$data["resrevation"] = $this->Reservationmodel->get_event_reservation();
		$this->layout->view("reservation",$data);
	}	

	public function table()
	{
		$data["selectedTab"] = "table_reservation";
		$data["resrevation"] = $this->Reservationmodel->get_table_reservation();
		$this->layout->view("reservation",$data);
	}

	/*public function delete($id){
		$data["selectedTab"] = "tinpack";
		$reponse = $this->Productsmodel->delete_record($id);
		redirect(base_url()."/signaturedishes");
	}*/
}
