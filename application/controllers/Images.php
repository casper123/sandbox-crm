<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Images extends CI_Controller {

    public function __construct()
	{
	    parent::__construct();

		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
			redirect(base_url()."admin/");
		
		$this->load->model('Imagesmodel');
	}
	
	public function index()
	{
		$data["selectedTab"] = "images";
		$data["images"] = $this->Imagesmodel->get_record();
		$this->layout->view("images",$data);
	}

	public function create(){
		$data["selectedTab"] = "images";
		if((count_($_FILES) > 0)){
			$reponse = $this->Imagesmodel->set_record();
			if($reponse !== false){
				redirect(base_url()."/images");
			}
			else{
				$data["msg"] = "Unknow Error";
			}
		}
		$this->layout->view("images_form",$data);
	}
	public function edit($id){
		$data["selectedTab"] = "images";
	}	
	public function delete($id){
		$data["selectedTab"] = "images";
		$reponse = $this->Imagesmodel->delete_record($id);
		redirect(base_url()."/images");
	}
}
