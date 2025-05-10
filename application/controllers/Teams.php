<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teams extends CI_Controller {

    public function __construct()
	{
	    parent::__construct();

 		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
			redirect(base_url()."admin/"); 
	}
	
	public function index()
	{
		$data["selectedTab"] = "view_team";
		$data["teams"] = $this->Teamsmodel->get_teams_records();
		$this->layout->view("teams",$data);
	}

	public function invite()
	{
		$data["selectedTab"] = "create_team";
		$data["membership_type"] = $this->Membershipmodel->get_record();

		if (count_($_POST) == 0)
		{
			$this->layout->view("invite_team", $data);
			return;
		}

		$name = $_POST["name"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$url = $this->config->item("base_url")."apply";

		//send sms
		$message = "Hi $name, Thank you for your inquiry. If you do decide to proceed with membership with us, please fill-out the application form here $url";
		$sms_data["msg"] = $message;
		$this->commonhelper->send_sms($phone, "team_invite_new", "SandBox", $sms_data);

		$subject = "Invitation To Join Sand Box";
		$message = "Hello $name,
		<br/><br/>
		Thank you for your inquiry  
		<br/><br/>
		If you do decide to proceed with membership with us, please fill-out the application form <a href='$url'>here</a>
		<br/><br/>
		Sand Box is a co-working space created specifically for freelancers, startups, small business owners, telecommuters and other independent professionals. We’re not in the business of selling tables & chairs, we’re in the business of happiness! Spreading happiness across our community & making sure you get predictability of services (Wifi, Power, Cooling, Design, App, Community, Health Food etc.)
		<br/><br/>
		You can check our website <a href='https://sandbox.com.pk'>sandbox.com.pk</a> for overview of our services. Any questions just reply to this email.
		<br/><br/>
		Regards,
		<br/>
		Muhammad Aamir
		<br/>
		Operations Coordinator";

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.zoho.com',
			'smtp_port' => 465,
			'smtp_user' => 'info@sandbox.com.pk',
			'smtp_pass' => 'bnex2w%J',
			'mailtype'  => 'html', 
			'charset' => 'utf-8',
			'wordwrap' => TRUE

		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('info@sandbox.com.pk', 'Muhammad Aamir');
		$list = array($email);
		$this->email->to($list);
		$this->email->subject($subject);
		$this->email->message($message);
		if($this->email->send()){
			redirect(base_url()."/teams");
			exit;
		}else {
			print_r($this->email->print_debugger());
			die;
		}	
	}

	public function create()
	{
		$data["selectedTab"] = "create_team";
		$data["membership_type"] = $this->Membershipmodel->get_record();
		if(count_($_POST) > 0 || count_($_FILES) > 0)
		{
			$response = $this->Teamsmodel->set_record();
			if($response !== false)
			{
				// send SMS on team creation
				$sms_data["team_owner"] = $response["team_owner"];
				$this->commonhelper->send_sms($data["owner_contact"], "team_creation","SandBox", $sms_data);

				//broad cast all teams owner messages
				$teams = $this->Teamsmodel->get_teams_records(1);

				foreach ($teams as $key => $value) 
				{
					$sms_data["team_owner"] = $value->team_owner;
					$sms_data["new_team_owner"] = $response["team_owner"];
					$sms_data["new_team_owner_bussiness"] = $response["bussiness"];
					$sms_data["new_team_owner_email"] = $response["owner_email"];
					
					$this->commonhelper->send_sms($value->owner_contact, "team_creation_broadcast","SandBox", $sms_data);
				}
				
				redirect(base_url()."/teams");
			}
			else{
				$data["msg"] = "Unknow Error";
			}
		}
		$this->layout->view("teams_form",$data);
	}

	public function edit($id)
	{
		$data["selectedTab"] = "view_team";
		
		if(intval($id) > 0 ){
			$response = $this->Teamsmodel->get_record($id);
			$data["id"] = $id;
			$data["record"] = $response[0];
		}else{
			redirect(base_url()."/teams");
			return;
		}

		if(count_($_POST) > 0){
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

	public function delete($id)
	{
		$data["selectedTab"] = "view_team";
		$reponse = $this->Teamsmodel->delete_record($id);
		redirect(base_url()."teams/");
		return;
	}

	public function change_status($id)
	{
		$data["selectedTab"] = "view_team";
		$reponse = $this->Teamsmodel->update_status($id);

		// send SMS on team creation
		if($reponse !== false && $reponse->is_active == 1)
		{
			$sms_data["team_owner"] = $reponse->team_owner;
			$this->commonhelper->send_sms($reponse->owner_contact, "old_team_activated","SandBox", $sms_data);			
		}
		elseif($reponse !== false && $reponse->is_active == 0)
		{
			//deactiveate team members as well
			$members = $this->Teammembersmodel->getTeamMembers($id);
			foreach ($members as $key => $value) {
				 $this->Teammembersmodel->update_status($value->id);
			}

			$sms_data["team_owner"] = $reponse->team_owner;
			$this->commonhelper->send_sms($reponse->owner_contact, "team_deactivated","SandBox", $sms_data);			
			$this->send_email_inactive($reponse->owner_email);
		}

		redirect(base_url()."teams/");
		return;
	}

	private function send_email_inactive($to_email)
	{
		$subject = "Help us be a better space & community. Complete the Sand Box Member Exit Survey!";
		$message = "Sand Box Member Exit Survey! 
		<br/><br/>
		Sand Box is constantly seeking ways to improve the community and its members’ experience. We greatly missed you in the space but like we always say you are forever part of this amazing community. Thus, we want to go back to you and get your insights how to better shape and support the existing community.
		<br/><br/>
		We ask you to take a moment to complete the following brief questionnaire, it would help us to identify ways in which we can improve our services and correct any deficiencies.
		<br/><br/>
		Much love and thank you in advance for your support.
		<br/><br/>
		<a href='https://forms.gle/Z2k8yQaWARtNEv51A'>Start Your 60 Seconds Survey Here</a>
		<br/><br/>
		We look forward to seeing you at Sand Box.
		<br/><br/>
		Sincerely,
		<br/><br/>
		Abdul Wahab Kotwal<br/>
		Founder & CEO<br/>
		Sand Box";

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.zoho.com',
			'smtp_port' => 465,
			'smtp_user' => 'abdul.wahab@sandbox.com.pk',
			'smtp_pass' => 'EightClub550@',
			'mailtype'  => 'html', 
			'charset' => 'utf-8',
			'wordwrap' => TRUE

		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('abdul.wahab@sandbox.com.pk', 'Abdul Wahab Kotwal');
		$list = explode(",", $to_email);
		$this->email->to($list);
		$this->email->subject($subject);
		$this->email->message($message);
		 if($this->email->send()){
			 return true;
		 }else {
			 print_r($this->email->print_debugger());
			 die;
		 }
	}
}
