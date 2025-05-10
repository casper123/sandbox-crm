<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invitation extends CI_Controller {

    public function __construct()
	{
	    parent::__construct();

 		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
			redirect(base_url()."admin/"); 
	}
	
	public function index()
	{
		$data["selectedTab"] = "view_team_members";
        $data["invites"] = $this->Invitationmodel->get_record();
        
        foreach ($data["invites"] as $key => $value) {
            $value->followups = $this->Followupstatusmodel->getAll(1, $value->invitation_id);
            $data["invites"][$key] = $value;   
        }
        
		$this->layout->view("invitation",$data);
	}

	public function create($id = 0)
	{
		$data["selectedTab"] = "view_team_members";
        $data["membership_type"] = $this->Membershipmodel->get_record();
        
        if (count_($_POST) == 0)
		{
            if ($id > 0) {
                $data["followup"] = $this->Followupstatusmodel->getAll(1, $id);
                $invite = $this->Invitationmodel->get_record($id);
                if (count_($invite) > 0) {
                    $data["invitation"] = $invite[0]; 
                }
            }
            
			$this->layout->view("invite_team", $data);
			return;
        }
        
        $reponse = $this->Invitationmodel->set_record();
        if($reponse !== false && intval($_POST["invitation_id"]) == 0) 
        {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $url = $this->config->item("base_url")."apply/".base64_encode($reponse);

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
                //send sms
                redirect(base_url()."/invitation");
                return;
            }else {
                print_r($this->email->print_debugger());
                die;
            }	        
        }
        else{
            redirect(base_url()."/invitation");
            return;
        }
	}

	public function delete($id)
	{
		$data["selectedTab"] = "view_team_members";
		$reponse = $this->Invitationmodel->delete_record($id);
		redirect(base_url()."/invitation");
    }
    
    public function followup() {
        $list = $this->Invitationmodel->get_record();	
       
		foreach ($list as $key => $value) {

            if ($value->is_accepted != 0) {
                continue;
            }
			/** send confirmation email */
            $subject = "Let's cut to the chase!";
            $url = $this->config->item("base_url")."apply/".base64_encode($value->invitation_id);
			$message = "Dear ".$value->full_name.",
			<br/><br/>
			I’m sorry we haven’t been able to connect.<br/><br/> Last time we spoke, you seemed very interested in becoming a part of SandBox. I know how hectic things can get between work and personal life but if you do decide to proceed with membership with us, please fill-out the application form <a href='$url'>here</a>. 
			<Br/><br/>
			Regards,
			<br/>
			Muhammad Aamir
			<br/>
            Community Manager";
            
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
			$list = array($value->email_adress);
			$this->email->to($list);
			$this->email->subject($subject);
			$this->email->message($message);
            $this->email->send();
        }
        redirect(base_url()."/invitation");
	}
}
