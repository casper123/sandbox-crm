<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

 public function __construct(){
    parent::__construct();

	$this->load->library('layout', 'layout_main');
	$this->layout->setLayout("layout_main");	
  }
	
	public function index()
	{
		$data = array();
		if(count_($_POST) > 0)
		{
			$response = $this->Adminmodel->admin_check();
			
			if($response > 0){
			    redirect(base_url()."admin/dashboard");
			    return;
			}
			else{
				$data["error"] = 1;
			}
			//redirect(base_url()."admin/dashboard");
			//exit;
		}
			$this->load->view("login",$data);
	}

	public function dashboard()
	{
		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
		{
			redirect(base_url()."admin/"); 
			exit;
		}
			
		$data["income_categories"] = $this->Paymentmodel->yearly_income_categories();

		$data["expense_categories"] = $this->Expensemodel->yearly_expense_categories();

		$data["upcoming_payments"] = $this->Teamsmodel->getUpcomingPayments();
		
		$data["selectedTab"] = "dashboard";
		$data['teams'] = $this->Teamsmodel->get_active_teams();
		$data['members'] = $this->Teamsmodel->get_active_members();
		$data['members_openspace'] = $this->Teamsmodel->get_open_space_active_members();
		
		$data['expense'] = $this->Expensemodel->monthly_expense();
		$data['income'] = $this->Paymentmodel->monthly_income();

		$data['yearly_income'] = $this->Paymentmodel->yearly_income();
		$data['yearly_expense'] = $this->Expensemodel->yearly_expense();

		$data['yearly_income_fmp'] = $this->Paymentmodel->yearly_income(1);
		$data['yearly_expense_fmp'] = $this->Expensemodel->yearly_expense(1);

		// pending request
		$data["pending_reqest"] = $this->Requestmodel->getPendingList();

		// today's followup invitation
		$data["followup_invitation"] = $this->Invitationmodel->getTodayFollowup();

		//today's followup requests
		$data["followup_reqest"] = $this->Requestmodel->getTodayFollowup();


		// pending followup invitation
		$data["followup_invitation_pending"] = $this->Invitationmodel->getMissingFollowup();

		// pending followup requests
		$data["followup_reqest_pending"] = $this->Requestmodel->getMissingFollowup();

		
		$profit = 0;
		foreach ($data['yearly_income'] as $key => $value) {
            $profit = $profit + intval($value["amount"]) - intval($data['yearly_expense'][$key]["amount"]);
		}

		$data["yearly_profit"] = $profit;
		
		$fmpProfit = 0;
		foreach ($data['yearly_income_fmp'] as $key => $value) {
            $fmpProfit = $fmpProfit + intval($value["amount"]) - intval($data['yearly_expense_fmp'][$key]["amount"]);
		}
		
		$data["payments_today"] = $this->Paymentmodel->paymentsToday();
		$data["expense_today"] = $this->Expensemodel->expenseToday();

		$data["money"] = $this->Adminmodel->getMoney();
	
		$totalExpense = 0;
		$totalFMPExpsense = 0;
		foreach ($data['expense'] as $key => $value) {

			if($value["category"] != "Fix My Phone")
				$totalExpense = $totalExpense + $value['amount'];
			else
				$totalFMPExpsense = $totalFMPExpsense + $value['amount'];
		}

		$totalIncome = 0;
		$totalFMPIncome = 0;
		foreach ($data['income'] as $key => $value) {

			if($value["category"] != "Fix My Phone")
				$totalIncome = $totalIncome + $value['amount'];
			else
				$totalFMPIncome = $totalFMPIncome + $value['amount'];
		}

		$data["member_counts"] = array();
		$data["member_counts"][] = array("name" => "Active Teams", "count" => $data['teams']["totalTeams"]);
		$data["member_counts"][] = array("name" => "Active Members", "count" => $data['members']);

		$data["counts"] = array();
		$data["counts"][] = array("name" => "Total Income", "count" => $totalIncome);
		$data["counts"][] = array("name" => "Total Expense", "count" => $totalExpense);
		$data["counts"][] = array("name" => "Profit", "count" => ($totalIncome - $totalExpense));
		$data["counts"][] = array("name" => "Expected Income", "count" => $this->Teamsmodel->getExpectedIncome());
		//print_r($data);

		$data["total_fmp_income"] = $totalFMPIncome;
		$data["total_fmp_expense"] = $totalFMPExpsense;

		// echo "<pre>";
		// print_r($data['expense']);die;
		$this->layout->view("dashboard", $data);
	}

	public function changeLog(Type $var = null)
	{
		$data["logs"] = $this->Datalogmodel->get_record();
		$this->layout->view("changelog", $data);
	}

	public function signupUser()
	{
		if(count_($_POST) > 0)
		{
			$data = array();
			$data["name"] = xss_clean($_POST["userName"]);
			$data["email"] = xss_clean($_POST["email"]);
			
			$response = $this->Adminmodel->insertUser($data);
			echo $response;
		}
		else
			$this->load->view("register");	
	}

	public function fmpRequest(){
		$data["selectedTab"] = "fmp_request";
		$this->layout->view("fmp_request");
	}

	public function sandboxMeetingRoom(){
		$data["selectedTab"] = "meeting_room";
		$this->layout->view("meeting_room");
	}


	public function logout()
	{
        $this->session->sess_destroy();
       	redirect(base_url()."admin/");
	}

	public function report_center()
	{
		$sess_id = $this->session->userdata('id');
		if(!$sess_id)
		{
			redirect(base_url()."admin/"); 
			exit;
		}
		
		$data = array();

		$data["stats"] = $this->Expensemodel->report_center();
		$data["expense_chart"] = $this->Expensemodel->total_expense_categories();
		$data["income_chart"] = $this->Paymentmodel->total_income_categories();

		// echo "<pre>";
		// print_r($data);

		$this->layout->view("report_center", $data);
	}

}
