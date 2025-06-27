<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public $apiKey = "270f9a50fb20edffe344ac0f44206617";
    public function __construct()
	{
	    parent::__construct();
	}

	public function invoiceList()
	{
		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
		{
			redirect(base_url()."admin/"); 
			exit;
		}

		$data["selectedTab"] = "invoice";
		$data["teamslist"]   = $this->Teamsmodel->get_record();
		$data["invoices"] = $this->Invoicemodel->_getInvoiceList();
		$this->layout->view("_invoice_list", $data);
	}

	public function saveInvoice($invoice_id = 0)
	{
		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
		{
			redirect(base_url()."admin/"); 
			exit;
		}

		if(count_($_POST) > 0) 
		{
			// echo "<pre>";
			// print_r($_POST);

			$iData = array();
			if (intval($_POST["teamId"]) > 0)
				$iData["teamId"] = intval($_POST["teamId"]);
			else {
				$iData["customerName"] = xss_clean($_POST["customerName"]);
				$iData["customerEmail"] = xss_clean($_POST["customerEmail"]);
				$iData["customerPhone"] = xss_clean($_POST["customerPhone"]);
				$iData["customerAddress"] = xss_clean($_POST["customerAddress"]);
			}

			$iData["invoiceNumber"] = $_POST["invoiceNumber"];
			$iData["invoiceDate"] = $_POST["invoiceDate"];
			$iData["invoiceDue"] = $_POST["invoiceDue"];
			
			$iDetail = array();
			foreach ($_POST["description"] as $key => $value) {

				if (intval($_POST["quantity"][$key]) > 0)
				{
					$obj = array();

					$obj["description"] = $_POST["description"][$key];
					$obj["quantity"] = $_POST["quantity"][$key];
					$obj["price"] = $_POST["price"][$key];
					$iDetail[] = $obj;
				}	
			}
			
			//print_r($iData);
			//print_r($iDetail);
			
			if(intval($_POST["invoiceId"]) > 0) {
				$id = $this->Invoicemodel->_updateInvoice($iData, $iDetail, $_POST["invoiceId"]);
			} else {
				$id = $this->Invoicemodel->_createInvoice($iData, $iDetail);
			}

			if (intval($_POST["sendInvoice"]) == 1) {
				$this->sendInvoice($id);
			} else {
				redirect(base_url()."invoice/invoiceList?success=1");
				exit;
			}
			

		}

		$data = array();
		$data["selectedTab"] = "invoice";
		$data["category"] = $this->Categorymodel->getInvoiceCategory();
		$data["teamslist"]   = $this->Teamsmodel->get_record();
		$data["invoice_items"] = array();

		//get invoice data in case of edit
		if (intval($invoice_id) > 0) {

			$response = $this->Invoicemodel->_getSingleInvoice($invoice_id);
			$data["invoice"] = $response;

		} else {
			$data["invoice_id"] = 0;
		}

		$this->layout->view("createInvoice",$data);
	}

	public function deleteInvoice($invoiceId = 0)
	{
		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
		{
			redirect(base_url()."admin/"); 
			exit;
		}

		$this->Invoicemodel->deleteInvoice($invoiceId);
		redirect(base_url()."invoice/invoiceList?success=4");
	}

	public function pdfInvoice($invoiceId = 0)
	{
		$id = base64_decode($invoiceId);
		$id = openssl_decrypt($id,"AES-128-ECB","Walkman550@");
		
		$response = $this->Invoicemodel->_getSingleInvoice($id);
		$this->load->view("email_templates/invoice_template", $response);
	}

	public function sendInvoice($invoiceId = 0)
	{
		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
		{
			redirect(base_url()."admin/"); 
			exit;
		}
			

		$invoice = $this->Invoicemodel->_getSingleInvoice($invoiceId);

		$smsData = array(
			"amount" => $invoice->totalAmount,
			"reciept_no" => $invoice->invoiceNumber,
			"generated_for_month" => date("F", strtotime($invoice->invoiceDue))
		);

		if ($invoice->teamId > 0) {
			$smsData["team_owner"] = $invoice->team_name;
			$number = $invoice->owner_contact;
			$email = $invoice->owner_email;
		} else {
			$smsData["team_owner"] = $invoice->customerName;
			$number = $invoice->customerPhone;
			$email = $invoice->customerEmail;
		}
		
		$this->commonhelper->send_sms($number, "invoice_generated", "SandBox", $smsData);
		$subject = "You have an invoice from Sand Box";
		$html = $this->load->view("email_templates/invoice", $invoice, true);

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.zoho.com',
			'smtp_port' => 465,
			'smtp_user' => $this->config->item("smtp_user"),
            'smtp_pass' => $this->config->item("smtp_password"),
			'mailtype'  => 'html', 
			'charset' => 'utf-8',
			'wordwrap' => TRUE

		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from($this->config->item("smtp_user"), 'Abdul Wahab Kotwal');
		$list = explode(",", $email);
		$this->email->to($list);
		$this->email->subject($subject);
		$this->email->message($html);
		if($this->email->send()){
			redirect(base_url()."invoice/invoiceList?success=3");
			exit;
		}else {
			print_r($this->email->print_debugger());
			die;
		}
	}

}
