<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

    public function __construct()
	{
	    parent::__construct();

 		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
			redirect(base_url()."admin/"); 
	}
	
	public function index()
	{
		$data["selectedTab"] = "invoice";
		$data["teams"] = $this->Teamsmodel->get_teams_records();
		$this->layout->view("invoice_list",$data);
	}

	public function create($team_id)
	{
		$data["selectedTab"] = "invoice";
		$data["records"]     = $this->Invoicemodel->generate_invoice($team_id);
		if(count($_POST) > 0){
			$reponse = $this->Teamsmodel->set_record();
			if($reponse !== false){
				$data["success"] = true;
			}
			else{
				$data["msg"] = "Unknow Error";
			}
		}
		//echo "<pre>";print_r($data);die();
		$this->layout->view("invoice",$data);
	}

	public function send($team_id)
	{
		if(count($_POST) > 0){
			$inovice_id = $this->Invoicemodel->set_record();
			if($inovice_id){
				$data["records"]     = $this->Invoicemodel->generate_invoice($team_id,$inovice_id);

				$to_email = isset($data["records"]["current_invoice"][0]->owner_email) ? $data["records"]["current_invoice"][0]->owner_email : false;

				$owner_contact = isset($data["records"]["current_invoice"][0]->owner_contact) ? $data["records"]["current_invoice"][0]->owner_contact : false;

				$emailsend = $this->send_email($to_email,$team_id,$data["records"]);
				
				if($emailsend == true){
					$receipt_no = isset($data["records"]["invoice_data"][0]->reciept_no) ? $data["records"]["invoice_data"][0]->reciept_no : $receipt_no = 'SAN-'.date('y').date('m').date('d')."-".$team_id;
					// send sms
					$sms_data["team_member"] 	= $reponse["name"];
					$sms_data["amount"] 		= $data["records"]["current_invoice"][0]->price + $data["records"]["current_invoice"][0]->remaining_amount;
					$sms_data["reciept_no"] 	= $receipt_no;
					$this->commonhelper->send_sms($owner_contact, "invoice_generated","SandBox", $sms_data);

					$response["success"] = true;
					$response["msg"] = "Email has been sent";
				}else{
					$response["success"] = false;
					$response["msg"] = $response;
				}
			}
		}
		echo json_encode($response);
		exit();
	}

	public function edit($id)
	{
		$data["selectedTab"] = "invoice";
		
		if(intval($id) > 0 ){
			$response = $this->Teamsmodel->get_record($id);
			$data["id"] = $id;
			$data["record"] = $response[0];
		}else{
			redirect(base_url()."/teams");
			return;
		}

		if(count($_POST) > 0){
			$reponse = $this->Teamsmodel->update_record($id);
			if($response == true){
				$data["updated"] = true;
				$response = $this->Teamsmodel->get_record($id);
				$data["id"] = $id;
				$data["record"] = $response[0];
			}else{
				$data->msg = "error";
			}
		}

		$data["membership_type"] = $this->Membershipmodel->get_record();
		$this->layout->view("teams_form",$data);
	}

	public function view_invoice($team_id){
		$team_id = 4;
		$pdf_path = $this->generate_pdf($team_id);
		return;
	}	

	public function delete($id)
	{
		$data["selectedTab"] = "invoice";
		$reponse = $this->Teamsmodel->delete_record($id);
		redirect(base_url()."teams/");
		return;
	}

	private function send_email($to_email,$team_id,$data){
		$pdf_path = $this->generate_pdf($team_id,$data);
		if($pdf_path !== false){
			$config = Array(
				'protocol' => 'smtp',
		        'smtp_host' => 'ssl://smtp.googlemail.com',
		        'smtp_port' => 465,
		        'smtp_user' => 'sandboxkhi@gmail.com',
		        'smtp_pass' => 'sandbox123',
		        'mailtype'  => 'html', 
		        'charset' => 'utf-8',
		        'wordwrap' => TRUE

		    );
		    $this->load->library('email', $config);
		    //$this->email->initialize($config);
		    $this->email->set_newline("\r\n");
		    $this->email->from('sandboxkhi@gmail.com', 'Invoice');
		    $list = array($to_email);
		    $this->email->to($list);
		    $this->email->subject('Sand Box Invoice');
		    $this->email->message("Please see the attached PDF.");
			$this->email->attach($pdf_path);
		     if($this->email->send()){
		         return true;
		     }else {
		         return $this->email->print_debugger();
		     }
		 }else{
		 	return false;
		 }
	}
	private function generate_pdf($team_id,$data){
		$data["records"] = $data["current_invoice"];
		$data["details"] = $data["invoice_data"];
		
		$this->load->view("email_templates/invoice_template",$data);
		$details = isset($data["records"][0]) ? $data["records"][0] : false;
        $html = $this->output->get_output();
        if($html){
	        $this->load->library('pdf');
	        $this->dompdf->loadHtml($html);
	        $this->dompdf->setPaper('A4', 'landscape');
	        $this->dompdf->render();
			$output = $this->dompdf->output();
			file_put_contents(PDF_UPLOAD_PATH.$details->team_name."-".date("d-m-Y",strtotime("now")).".pdf", $output); 
			return PDF_UPLOAD_PATH.$details->team_name."-".date("d-m-Y",strtotime("now")).".pdf";       	
        }
        else
        	return false;
	}
}
