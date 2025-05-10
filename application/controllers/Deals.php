<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deals extends CI_Controller {

    public function __construct()
	{
	    parent::__construct();

 		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
			redirect(base_url()."admin/");

		$this->load->model('Dealsmodel');
	}
	
	public function index()
	{
		$data["selectedTab"] = "deals";
		$data["deals"] = $this->Dealsmodel->get_record();
		$this->layout->view("deals",$data);
	}

	public function create()
	{
		$data["selectedTab"] = "deals";
		if(count_($_POST) > 0){
			$reponse = $this->Dealsmodel->set_record();
			if($reponse !== false){
				redirect(base_url()."/deals");
			}
			else{
				$data["msg"] = "Unknow Error";
			}
		}


		$this->layout->view("deals_form",$data);
	}

	public function edit($id)
	{
		$data["selectedTab"] = "deals";
		if(intval($id) > 0 ){
			$response = $this->Dealsmodel->get_record($id);
			$data["id"] = $id;
			$data["data"] = $response[0];
		}else{
			redirect(base_url()."/deals");
			return;
		}

		if(count_($_POST) > 0){
			$reponse = $this->Dealsmodel->update_record($id);
			if($response == true){
				$data["success"] = true;
			}else{
				$data["msg"] = "error";
			}
		}
		$this->layout->view("deals_form",$data);
	}	

	public function delete($id)
	{
		$data["selectedTab"] = "deals";
		$reponse = $this->Dealsmodel->delete_record($id);
		redirect(base_url()."/deals");
	}
}
