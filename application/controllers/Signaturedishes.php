<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signaturedishes extends CI_Controller {

    public function __construct()
	{
	    parent::__construct();

		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
			redirect(base_url()."admin/");
		$this->load->model('Productsmodel');
	}
	
	public function index()
	{
		$data["selectedTab"] = "signature";
		$data["products"] = $this->Productsmodel->get_signature();
		$this->layout->view("products",$data);
	}


	public function gettinpack()
	{
		$data["selectedTab"] = "tinpack";
		$data["products"] = $this->Productsmodel->get_tinpack();
		$this->layout->view("products",$data);
	}

	public function create_signature(){

		$data["selectedTab"] = "signature";
		if((count_($_POST) > 0) || (count_($_FILES) > 0)){
			$reponse = $this->Productsmodel->set_record();
			if($reponse !== false){
				redirect(base_url()."/signaturedishes");
			}
			else{
				$data["msg"] = "Unknow Error";
			}
		}
		$this->layout->view("products_form",$data);
	}

	public function create_tinpack(){

		$data["selectedTab"] = "tinpack";
		if((count_($_POST) > 0) || (count_($_FILES) > 0)){
			$reponse = $this->Productsmodel->set_record();
			if($reponse !== false){
				redirect(base_url()."/signaturedishes/gettinpack");
			}
			else{
				$data["msg"] = "Unknow Error";
			}
		}
		$this->layout->view("products_form",$data);
	}

	public function edit_signature($id){
		$data["selectedTab"] = "signature";

		if(intval($id) > 0 ){
			$response = $this->Productsmodel->get_record($id,"signature");
			$data["id"] = $id;
			$data["data"] = $response[0];
		}else{
			redirect(base_url()."/signaturedishes");
			return;
		}

		if(count_($_POST) > 0){
			$reponse = $this->Productsmodel->update_record($id);
			if($response == true){
				$data["success"] = true;
			}else{
				$data["msg"] = "error";
			}
		}
		$this->layout->view("products_form",$data);
	}

	public function edit_tinpack($id){
		$data["selectedTab"] = "tinpack";
		if(intval($id) > 0 ){
			$response = $this->Productsmodel->get_record($id,"tinpack");
			$data["id"] = $id;
			$data["data"] = $response[0];
		}else{
			redirect(base_url()."/signaturedishes/gettinpack");
			return;
		}

		if(count_($_POST) > 0){
			$reponse = $this->Productsmodel->update_record($id);
			if($response == true){
				$data["success"] = true;
			}else{
				$data["msg"] = "error";
			}
		}
		$this->layout->view("products_form",$data);
	}	

	public function delete($id){
		$data["selectedTab"] = "tinpack";
		$reponse = $this->Productsmodel->delete_record($id);
		redirect(base_url()."/signaturedishes");
	}
}
