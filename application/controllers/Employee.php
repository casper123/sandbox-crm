<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    public function __construct()
	{
	    parent::__construct();

 		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
			redirect(base_url()."admin/"); 
	}

	public function index()
	{
		$data["selectedTab"] = "employee";
		$data["employee"] = $this->Employeereportmodel->get_record();
		$this->layout->view("employee",$data);
	}

	public function create()
	{
		$data["selectedTab"] = "employee";		
		if(count_($_POST) > 0)
		{
			$reponse = $this->Employeereportmodel->set_record();
			if($reponse !== false)
			{
				redirect(base_url()."/employee");
				return;
			}
			else{
				echo "Error!";
				die;
			}
		}

		$this->layout->view("employee_form",$data);
	}
}
