<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jv extends CI_Controller {

    public function __construct(){
	    parent::__construct();

 		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
			redirect(base_url()."admin/"); 
	}
	
	public function index(){
		$data["selectedTab"] = "view_category";
		$data["category"] = $this->Jvmodel->getJvList();
		$this->layout->view("jvlist",$data);
	}

	public function create(){
		$data["selectedTab"] = "create_team";
        if(count_($_POST) > 0)
        {
			$reponse = $this->Jvmodel->createJv($_POST);
			if($reponse !== false){
				redirect(base_url()."/jv");
			}
			else{
				$data["msg"] = "Unknow Error";
			}
		}
		$this->layout->view("jvform",$data);
	}

	public function edit($id){
		$data["selectedTab"] = "view_category";
		
        if(intval($id) > 0 )
        {
			$response = $this->Jvmodel->getSingleJv($id);
			$data["id"] = $id;
			$data["record"] = $response[0];
        }
        else
        {
			redirect(base_url()."/jv");
			return;
		}

        if(count_($_POST) > 0)
        {
			$reponse = $this->Jvmodel->updateJv($_POST, $id);
            if($response == true) {
				redirect(base_url()."/jv");
			} else {
				$data->msg = "error";
			}
		}
		$this->layout->view("jvform",$data);
	}	

	public function delete($id){
		$data["selectedTab"] = "view_category";
		$reponse = $this->Jvmodel->deleteJv($id);
		redirect(base_url()."jv/");
	}
}
