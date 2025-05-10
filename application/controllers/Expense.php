<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends CI_Controller {

    public function __construct()
	{
	    parent::__construct();

 		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
			redirect(base_url()."admin/"); 
	}
	
	public function index()
	{
		$data["selectedTab"] = "view_expense";
		$data["expense"] = $this->Expensemodel->get_record();
		$this->layout->view("expense",$data);
	}

	public function create()
	{
		$data["selectedTab"] = "view_expense";
		$data["category"] = $this->Categorymodel->getExpenseCategory();
		if(count_($_POST) > 0){
			$reponse = $this->Expensemodel->set_record();
			if($reponse !== false){
				$data["success"] = true;
				redirect(base_url()."/expense");
				return;
			}
			else{
				$data["msg"] = "Unknow Error";
			}
		}
		$this->layout->view("expense_form",$data);
	}

	public function edit($id)
	{
		$data["selectedTab"] = "view_expense";
		
		if(intval($id) > 0 ){
			$response = $this->Expensemodel->get_record($id);
			$data["id"] = $id;
			$data["record"] = $response[0];
		}else{
			redirect(base_url()."/expense");
			return;
		}

		if(count_($_POST) > 0){
			$reponse = $this->Expensemodel->update_record($id);
			if($response == true){
				$data["updated"] = true;
				$response = $this->Expensemodel->get_record($id);
				$data["id"] = $id;
				$data["record"] = $response[0];
			}else{
				$data->msg = "error";
			}
		}

		$data["category"] = $this->Categorymodel->getExpenseCategory();
		$this->layout->view("expense_form",$data);
	}	

	public function delete($id)
	{
		$data["selectedTab"] = "view_expense";
		$reponse = $this->Expensemodel->delete_record($id);
		redirect(base_url()."expense/");
		return;
	}
}
