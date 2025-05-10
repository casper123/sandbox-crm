<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teammembers extends CI_Controller {

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
		$data["members"] = $this->Teammembersmodel->get_record();
		$this->layout->view("team_members",$data);
	}

	public function create()
	{
		$data["selectedTab"] = "view_team_members";
		$data["teamslist"]   = $this->Teamsmodel->get_record();
		
		if(count_($_POST) > 0 || count_($_FILES) > 0){
			$reponse = $this->Teammembersmodel->set_record();
			if($reponse !== false){
				// send sms to new team member
				if($reponse["contact_no"] != ""){
					$sms_data["team_member"] = $reponse["name"];
					$this->commonhelper->send_sms($reponse["contact_no"], "new_team_member_created","SandBox", $sms_data);					
				}		
				redirect(base_url()."/teammembers");
				return;
			}
			else{
				$data["msg"] = "Unknow Error";
			}
		}

		$this->layout->view("team_members_form",$data);
	}

	public function edit($id)
	{
		$data["selectedTab"] = "view_team_members";

		if(intval($id) > 0 ){
			$response = $this->Teammembersmodel->get_record($id);
			$data["record"] = $response[0];
			$data["id"] = $id;
		}else{
			redirect(base_url()."/teammembers");
			return;
		}

		if(count_($_POST) > 0){
			$reponse = $this->Teammembersmodel->update_record($id);
			if($response == true){
				redirect(base_url()."/teammembers");
				return;
			}else{
				$data->msg = "error";
			}
		}
		$data["teamslist"]   = $this->Teamsmodel->get_record();
		$this->layout->view("team_members_form",$data);
	}	

	public function delete($id)
	{
		$data["selectedTab"] = "view_team_members";
		$reponse = $this->Teammembersmodel->delete_record($id);
		redirect(base_url()."/teammembers");
	}

	public function change_status($id)
	{
		$data["selectedTab"] = "view_team";
		$reponse = $this->Teammembersmodel->update_status($id);

		redirect(base_url()."teammembers/");
		return;
	}
}
