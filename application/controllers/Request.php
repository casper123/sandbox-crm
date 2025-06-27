<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

    public function __construct(){
	    parent::__construct();

 		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
			redirect(base_url()."admin/"); 
	}
	
	public function index(){
		$data["selectedTab"] = "view_category";
		$data["category"] = $this->Requestmodel->getList();

		foreach ($data["category"] as $key => $value) {
            $value->followups = $this->Followupstatusmodel->getAll(2, $value->request_id);
            $data["category"][$key] = $value;   
		}
		
		$this->layout->view("requestlist", $data);
	}

	public function create(){
		$data["selectedTab"] = "create_team";
        if(count_($_POST) > 0)
        {
			$reponse = $this->Requestmodel->create($_POST);
			if (strlen($_POST["followup"]) > 0) {
				$data = array();
				$data["followup"] = $_POST["followup"];
				$data["type_id"] = $reponse;
				$data["followup_type"] = 2;
				$this->Followupstatusmodel->create($data);
			}

            if($response == true) {
                if ($_POST["current_status_old"] != $_POST["current_status"]) {
                    switch ($_POST["current_status"]) {

                        case 'VISIT TOMORROW':
                            $_POST["msg"] = "Hey there! Thank you for your inquiry. We'll be looking forward seeing you tomorrow.";
                            break;

                        case 'VISIT LATER':
                            $_POST["msg"] = "Howdy! Thank you for your inquiry. We'll be looking forward seeing you soon.";
                            break;

                        case 'NOT PICKUP':
                            $_POST["msg"] = "Hey there! We called you but unfortunately your number was not reachable. Please call us at 0304-0445341 at your convinience";
                            break;

                        case 'NOT INTERESTED':
                            $_POST["msg"] = "Thank you for gettting in touch with SandBox. We'll be looking forward to hear from you soon.";
                            break;

                        default:
                            $_POST["msg"] = "Thank you for gettting in touch with SandBox. We'll be looking forward to hear from you soon.";
                            break;
                    }
                    $this->commonhelper->send_sms($_POST["contact_number"], "request_update", "SandBox", $_POST);
                }
			}
			if($reponse !== false){
				redirect(base_url()."/request");
				exit;
			}
			else{
				$data["msg"] = "Unknow Error";
			}
		}

		$this->layout->view("requestform",$data);
	}

	public function edit($id){
		$data["selectedTab"] = "view_category";
		
        if(intval($id) > 0 )
        {
			$response = $this->Requestmodel->getSingle($id);
			$data["followup"] = $this->Followupstatusmodel->getAll(2, $id);
			$data["id"] = $id;
			$data["record"] = $response[0];
        }
        else
        {
			redirect(base_url()."/request");
			return;
		}

        if(count_($_POST) > 0)
        {
            $data = array();
            $data["full_name"] = $_POST["full_name"];
            $data["email_address"] = $_POST["email_address"];
            $data["contact_number"] = $_POST["contact_number"];
            $data["current_status"] = $_POST["current_status"];
            $data["interested_in"] = $_POST["interested_in"];
			
			if($_POST["next_followup"] != "") {
				$data["next_followup"] = date("Y-m-d h:i:s", strtotime($this->input->post("next_followup")));
			}

			$reponse = $this->Requestmodel->update($data, $id);

			if (strlen($_POST["followup"]) > 0) {
				$data = array();
				$data["followup"] = $_POST["followup"];
				$data["type_id"] = $id;
				$data["followup_type"] = 2;
				$this->Followupstatusmodel->create($data);
			}

            if($response == true) {
                if ($_POST["current_status_old"] != $_POST["current_status"]) {
                    switch ($_POST["current_status"]) {

						case 'VISIT TODAY':
                            $_POST["msg"] = "Hey there! Thank you for your inquiry. We'll be looking forward seeing you today at SandBox.";
							break;

						case 'VISIT DONE':
							$_POST["msg"] = "Hey there! Thank you for visitng us today. In case of any other queries; please get back to us at 0304-0445341";
							break;
							
                        case 'VISIT TOMORROW':
                            $_POST["msg"] = "Hey there! Thank you for your inquiry. We'll be looking forward seeing you tomorrow.";
                            break;

                        case 'VISIT LATER':
                            $_POST["msg"] = "Howdy! Thank you for your inquiry. We'll be looking forward seeing you soon.";
                            break;

                        case 'NOT PICKUP':
                            $_POST["msg"] = "Hey there! We called you but unfortunately your number was not reachable. Please call us at 0304-0445341 at your convinience";
                            break;

                        case 'NOT INTERESTED':
                            $_POST["msg"] = "Thank you for gettting in touch with SandBox. We'll be looking forward to hear from you soon.";
                            break;

                        default:
                            $_POST["msg"] = "Thank you for gettting in touch with SandBox. We'll be looking forward to hear from you soon.";
                            break;
                    }
                    $this->commonhelper->send_sms($_POST["contact_number"], "request_update", "SandBox", $_POST);
                }
				redirect(base_url()."/request");
			} else {
				$data->msg = "error";
			}
		}
		$this->layout->view("requestform",$data);
	}	

	public function delete($id){
		$data["selectedTab"] = "view_category";
		$reponse = $this->Requestmodel->delete($id);
		redirect(base_url()."request/");
	}

	public function followup() {
		$list = $this->Requestmodel->getList();	

		foreach ($list as $key => $value) {

			if ($value->invite_sent == 1 || strlen($value->email_address) == 0 || strpos($value->email_address, "@") <= 0) {
				continue;
			}

			/** send confirmation email */
			$subject = "Still any interest in our service?";
			$message = "Dear ".$value->full_name.",
			<br/><br/>
			I’m sorry we haven’t been able to connect.<br/><br/> Last time we spoke, you seemed very interested in becoming a part of SandBox. I know how hectic things can get between work and personal life but just in case you'd like me schedule a visit of SandBox; please reply to this email or call me at 0304-0445341. 
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
				'smtp_user' => $this->config->item("smtp_user"),
                'smtp_pass' => $this->config->item("smtp_password"),
				'mailtype'  => 'html', 
				'charset' => 'utf-8',
				'wordwrap' => TRUE
			);

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from($this->config->item("smtp_user"), 'Abdul Wahab Kotwal');
			$list = array($value->email_address);
			$this->email->to($list);
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->send();
		}
		redirect(base_url()."request/");
	}

	public function send_invite($id = 0)
	{
		$response = $this->Requestmodel->getSingle($id);
		$data = array();
		$data["full_name"] = $response[0]->full_name;
		$data["email_adress"] = $response[0]->email_address;
		$data["contact_number"] = $response[0]->contact_number;
		$data["membership_type"] = "1";
		$data["price"] = "0.00";

		$invite = $this->Invitationmodel->create_invite($data);

		$data = array();
		$data["invite_sent"] = 1;
		$reponse = $this->Requestmodel->update($data, $id);

		if($invite !== false)
        {
            $name = $response[0]->full_name;
            $email = $response[0]->email_address;
            $phone = $response[0]->contact_number;
            $url = $this->config->item("base_url")."apply/".base64_encode($invite);

            $message = "Hi $name, Thank you for your inquiry. If you do decide to proceed with membership with us, please fill-out the application form here $url";
            $sms_data["msg"] = $message;
            $this->commonhelper->send_sms($phone, "team_invite_new", "SandBox", $sms_data);

            $subject = "Invitation To Join Sand Box";
            $message = "Hello $name,
            <br/><br/>
            Thank you for your inquiry. 
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
                'smtp_user' => $this->config->item("smtp_user"),
            	'smtp_pass' => $this->config->item("smtp_password"),
                'mailtype'  => 'html', 
                'charset' => 'utf-8',
                'wordwrap' => TRUE

            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($this->config->item("smtp_user"), 'Abdul Wahab Kotwal');
            $list = array($email);
            $this->email->to($list);
            $this->email->subject($subject);
            $this->email->message($message);
            if($this->email->send()){
                //send sms
                redirect(base_url()."/request");
                return;
            }else {
                print_r($this->email->print_debugger());
                die;
            }	        
        }
        else{
            $data["msg"] = "Unknow Error";
        }
	}
}
