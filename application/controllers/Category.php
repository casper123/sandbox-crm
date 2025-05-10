<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct(){
	    parent::__construct();

 		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
			redirect(base_url()."admin/"); 
	}
	
	public function index(){
		$data["selectedTab"] = "view_category";
		$data["category"] = $this->Categorymodel->get_record();
		$this->layout->view("category",$data);
	}

	public function create(){
		$data["selectedTab"] = "create_team";
		if(count_($_POST) > 0 || count_($_FILES) > 0){
			$reponse = $this->Categorymodel->set_record();
			if($reponse !== false){
				$data["success"] = true;
			}
			else{
				$data["msg"] = "Unknow Error";
			}
		}
		$this->layout->view("category_form",$data);
	}

	public function edit($id){
		$data["selectedTab"] = "view_category";
		
		if(intval($id) > 0 ){
			$response = $this->Categorymodel->get_record($id);
			$data["id"] = $id;
			$data["record"] = $response[0];
		}else{
			redirect(base_url()."/category");
			return;
		}

		if(count_($_POST) > 0){
			$reponse = $this->Categorymodel->update_record($id);
			if($response == true){
				$data["updated"] = true;
				$response = $this->Categorymodel->get_record($id);
				$data["id"] = $id;
				$data["record"] = $response[0];
			}else{
				$data->msg = "error";
			}
		}
		$this->layout->view("category_form",$data);
	}	

	public function delete($id){
		$data["selectedTab"] = "view_category";
		$reponse = $this->Categorymodel->delete_record($id);
		redirect(base_url()."category/");
		return;
	}
}
