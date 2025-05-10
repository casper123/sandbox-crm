<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct()
	{
	    parent::__construct();

		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
			redirect(base_url()."admin/");
		
		$this->load->model('Menumodel');
	}
	
	public function index()
	{
		$data["selectedTab"] = "menu";
		$data["menu"] = $this->Menumodel->get_record();
		$this->layout->view("menu",$data);
	}

	public function create()
	{
		$data["selectedTab"] = "menu";
		if(count_($_POST) > 0){
			$reponse = $this->Menumodel->set_record();
			if($reponse !== false){
				redirect(base_url()."/menu");
			}
			else{
				$data["msg"] = "Unknow Error";
			}
		}


		$this->layout->view("menu_form",$data);
	}

	public function edit($id)
	{
		$data["selectedTab"] = "menu";
		if(intval($id) > 0 ){
			$response = $this->Menumodel->get_record($id);
			$data["id"] = $id;
			$data["data"] = $response[0];
		}else{
			redirect(base_url()."/menu");
			return;
		}

		if(count_($_POST) > 0){
			$reponse = $this->Menumodel->update_record($id);
			if($response == true){
				$data["success"] = true;
			}else{
				$data["msg"] = "error";
			}
		}
		$this->layout->view("menu_form",$data);
	}	

	public function delete($id)
	{
		$data["selectedTab"] = "menu";
		$reponse = $this->Menumodel->delete_record($id);
		redirect(base_url()."/menu");
	}
}
