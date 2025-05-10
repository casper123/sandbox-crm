<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

    public function __construct()
	{
	    parent::__construct();
	}
	
	public function index()
	{
		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
		{
			redirect(base_url()."admin/"); 
			exit;
		}

		$data["selectedTab"] = "view_payment";
		$data["payments"] = $this->Paymentmodel->get_record();
		$this->layout->view("payment",$data);
	}

	public function addInvoicePayment($invoiceId = 0)
	{
		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
		{
			redirect(base_url()."admin/"); 
			exit;
		}

		$data["selectedTab"] = "view_payment";
        $data["category"] = $this->Categorymodel->getInvoiceCategory();
		$data["teams"] = $this->Teamsmodel->get_record();
		$data["invoice_id"] = $invoiceId;

		if(count_($_POST) > 0)
        {
			$reponse = $this->Paymentmodel->setSbInvoiceRecord($_POST);

			//check if all payment is made
			$invoice = $this->Invoicemodel->_getSingleInvoice($_POST["invoice_id"]);
			if ($invoice->totalPaid >= $invoice->totalAmount) {
				//mark invocie as paid
				$this->Invoicemodel->markAsPaid($_POST["invoice_id"]);
			}

            if(count_($reponse) > 0)
            {
				$this->sendReceipt($_POST["invoice_id"], $reponse);
			}
			else{
				$data["msg"] = "Unknow Error";
			}
		}
		$this->layout->view("sb_payment_invoice_form",$data);
	}

	public function create_invoice_payment($invoice_id = 0)
	{
		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
		{
			redirect(base_url()."admin/"); 
			exit;
		}

		$data["selectedTab"] = "view_payment";
        $data["category"] = $this->Categorymodel->getInvoiceCategory();
		$data["teams"] = $this->Teamsmodel->get_record();
		//$data["invoice"] = $this->Invoicemodel->getInvoice($invoice_id);
		$data["invoice_id"] = $invoice_id;

        if(count_($_POST) > 0)
        {
			$reponse = $this->Paymentmodel->set_record_invoice($_POST);
            if($reponse !== false)
            {
				$data["success"] = true;
				redirect(base_url()."/payment");
				return;
			}
			else{
				$data["msg"] = "Unknow Error";
			}
		}
		$this->layout->view("payment_invoice_form",$data);
	}

	public function create($invoice_id = 0)
	{
		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
		{
			redirect(base_url()."admin/"); 
			exit;
		}

		$data["selectedTab"] = "view_payment";
        $data["category"] = $this->Categorymodel->getInvoiceCategory();
		$data["teams"] = $this->Teamsmodel->get_record();
		$data["invoice_id"] = $invoice_id;

        if(count_($_POST) > 0)
        {
			$reponse = $this->Paymentmodel->set_record();
            if($reponse !== false)
            {
				$data["success"] = true;
				redirect(base_url()."/payment");
				return;
			}
			else{
				$data["msg"] = "Unknow Error";
			}
		}
		$this->layout->view("payment_form",$data);
	}

	public function edit($id)
	{
		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
		{
			redirect(base_url()."admin/"); 
			exit;
		}

		$data["selectedTab"] = "view_payment";
		$data["category"] = $this->Categorymodel->getInvoiceCategory();
        $data["teams"] = $this->Teamsmodel->get_record();
        
		if(intval($id) > 0 ){
			
			$response = $this->Paymentmodel->get_record($id);
			$data["id"] = $id;
			$data["record"] = $response[0];
			$data["invoice_id"] = $response[0]->gi_invoiceId;

 		}else{
			redirect(base_url()."/payment");
			return;
		}

        if(count_($_POST) > 0)
        {
			$reponse = $this->Paymentmodel->update_record($id);
            if($response == true)
            {
				$data["updated"] = true;
				$response = $this->Paymentmodel->get_record($id);
				$data["id"] = $id;
				$data["record"] = $response[0];
			}else{
				$data->msg = "error";
			}
		}

		//$data["category"] = $this->Categorymodel->getInvoiceCategory();
		$this->layout->view("payment_form",$data);
	}	

	public function delete($id)
	{
		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
		{
			redirect(base_url()."admin/"); 
			exit;
		}

		$data["selectedTab"] = "view_payment";
		$reponse = $this->Paymentmodel->delete_record($id);
		redirect(base_url()."payment/");
		return;
	}

	public function sendReceipt($invoiceId = 0, $paymentData = array())
	{
		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
		{
			redirect(base_url()."admin/"); 
			exit;
		}

		$invoice = $this->Invoicemodel->_getSingleInvoice($invoiceId);

		if (count_($paymentData) == 0) {
			$paymentData = $this->Paymentmodel->getInvoicePayments($invoiceId);
		}
				
		$smsData = array(
			"amount" => $invoice->totalPaid,
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
		
		$this->commonhelper->send_sms($number, "inovice_paid", "SandBox", $smsData);

		$subject = "We have received your payment.";
		$data = array("invoice" => $invoice, "recepit" => $paymentData);
		$html = $this->load->view("email_templates/receipt", $data, true);

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.zoho.com',
			'smtp_port' => 465,
			'smtp_user' => 'finance@sandbox.com.pk',
			'smtp_pass' => 'Pn8mqnq&',
			'mailtype'  => 'html', 
			'charset' => 'utf-8',
			'wordwrap' => TRUE

		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('finance@sandbox.com.pk', 'Muhammad Aamir');
		$list = array($email);
		$this->email->to($list);
		$this->email->subject($subject);
		$this->email->message($html);
		if($this->email->send()){
			redirect(base_url()."payment?success=1");
			exit;
		}else {
			print_r($this->email->print_debugger());
			die;
		}
	}

	public function emailReceipt($receiptNumber = "")
	{
		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
		{
			redirect(base_url()."admin/"); 
			exit;
		}
		
		$payments = $this->Paymentmodel->getReceiptPayments($receiptNumber);
		$invoice = $this->Invoicemodel->_getSingleInvoice($payments[0]->sb_invoiceId);

		if ($invoice->teamId > 0) {
			$email = $invoice->owner_email;
		} else {
			$email = $invoice->customerEmail;
		}

		$data = array("invoice" => $invoice, "recepit" => $payments);
		$html = $this->load->view("email_templates/receipt", $data, true);

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.zoho.com',
			'smtp_port' => 465,
			'smtp_user' => 'finance@sandbox.com.pk',
			'smtp_pass' => 'Pn8mqnq&',
			'mailtype'  => 'html', 
			'charset' => 'utf-8',
			'wordwrap' => TRUE

		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('finance@sandbox.com.pk', 'Muhammad Aamir');
		$list = explode(",", $email);
		$this->email->to($list);
		$this->email->subject("We have received your payment.");
		$this->email->message($html);
		if($this->email->send()){
			redirect(base_url()."payment?success=1");
			exit;
		}else {
			print_r($this->email->print_debugger());
			die;
		}
	}

	public function downloadPDF($receiptNumber = "")
	{
		$payments = $this->Paymentmodel->getReceiptPayments($receiptNumber);
		$invoice = $this->Invoicemodel->_getSingleInvoice($payments[0]->sb_invoiceId);
		$data = array("invoice" => $invoice, "payments" => $payments);
		$this->load->view("email_templates/receipt_template", $data);
	}
}
