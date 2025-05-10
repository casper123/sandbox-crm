 <?php 
	
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
	{
	    parent::__construct();
	}

	public function index()
	{
		
	}

	public function signup($id = "")
	{
		if (count_($_POST) == 0) {

			$invite_id = intval(base64_decode($id));
			$data = $this->Invitationmodel->get_record($invite_id);
			$this->load->view("signup", $data[0]);
			return;
		}
		
		// check for validation
		if (strlen(trim($this->input->post('team_name'))) == 0 || 
		strlen(trim($this->input->post('team_name'))) == 0 ||
		strlen(trim($this->input->post('owner_email'))) == 0 ||
		strlen(trim($this->input->post('owner_email'))) == 0 ||
		strlen(trim($this->input->post('owner_contact'))) == 0 ||
		strlen(trim($this->input->post('emergencyPerson'))) == 0 ||
		strlen(trim($this->input->post('emergencyContact'))) == 0) {
			$invite_id = intval(base64_decode($id));
			$data = $this->Invitationmodel->get_record($invite_id);
			$this->load->view("signup", $data[0]);
			return;
		}

		$res = $this->Teamsmodel->acceptInvitation();
		if (intval($res) > 0) {

			$this->Invitationmodel->update_status(1, $_POST["how_hear"], intval($_POST["invitation_id"]));
			/** send confirmation email */
            $subject = "Thank you for your Application!";
            $message = "Dear ".$this->input->post("team_owner").",
			<br/><br/>
			Welcome to SandBox Community! We are thrilled to have you and we hope we can support you to the best we can.
			<Br/><br/>
			You will receive your membership agreement in next 2 days for your esignature. Once signed, please come and collect your welcome kit from Saad at the Reception. Lastly, please send us a copy of your CNIC if you haven't uploaded it already.
			<Br/><br/>
			Again, welcome, let me know if you have any questions.
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
            $this->email->from('info@sandbox.com.pk', 'SandBox Team');
            $list = array($this->input->post("owner_email"));
            $this->email->to($list);
            $this->email->subject($subject);
            $this->email->message($message);
			$this->email->send();

			/** send sms */
			$sms_data["team_owner"] = $this->input->post("team_owner");
			$sms_data["team_name"] = $this->input->post("team_name");
			$this->commonhelper->send_sms($this->input->post("owner_contact"), "application_submit_owner", "SandBox", $sms_data);
			$this->commonhelper->send_sms("03040445341", "application_submit_admin","SandBox", $sms_data);
			$this->commonhelper->send_sms("03218651457", "application_submit_admin","SandBox", $sms_data);
			
			$this->load->view("signup_success");
			return;
		}
		
	}

	private function send_email($to_email)
	{
		
	}

	public function easypaisa($id) 
	{
		$invoice_id = intval(base64_decode($id));
		$invoice = $this->Invoicemodel->_getSingleInvoice($id);

		$email = $name = $contact = "";
		if ($invoice->owner_contact == "") 
		{
			$email = $invoice->customerEmail;
			$name = $invoice->customerName;
			$contact = $invoice->customerPhone;
		} 
		else 
		{
			$email = $invoice->owner_email;
			$name = $invoice->team_name;
			$contact = $invoice->owner_contact;
		}

		$paramMap = array();
		$paramMap['amount']  = $invoice->totalAmount.".0";
		$paramMap['autoRedirect']  = 0;
		$paramMap['emailAddr']  = $email;
		$paramMap['mobileNum'] = $contact;
		$paramMap['orderRefNum']  = $invoice->invoiceNumber;
		$paramMap['paymentMethod']  = "CC_PAYMENT_METHOD";
		$paramMap['postBackURL'] = $this->config->item("base_url")."/home/pay";
		$paramMap['storeId']  = "10695";
		//$paramMap['storeId']  = "53624";
		
		foreach ($paramMap as $key => $val) 
			$mapString .=  $key.'='.$val.'&';
		
		$mapString  = substr($mapString , 0, -1);
		//echo $mapString;die;
		//$hash = "7L4OSV6W6U9BTEH7";
		$hash = "CZ978XOKMNVTDP5M";

		$ivlen = openssl_cipher_iv_length($cipher="AES-128-ECB");
		$iv = openssl_random_pseudo_bytes($ivlen);
		$crypttext = openssl_encrypt($mapString, $cipher, $hash,OPENSSL_RAW_DATA, $iv);
		$hashRequest = base64_encode($crypttext);
	
		$viewData = $paramMap;
		$viewData["hashkey"] = $hashRequest;

		$this->load->view("easypaisa", $viewData);
	}

	public function pay()
	{
		$this->load->view("pay");
	}

	public function confirmpayment()
	{
		echo "<PRE>";
		print_r($_REQUEST);die;
	}

	public function ipn()
	{
		echo "<PRE>";
		print_r($_REQUEST);die;
	}

	public function profile($encId)
	{
		$id = base64_decode($encId);
		$id = openssl_decrypt($id,"AES-128-ECB","Walkman550@");
		
		if (count_($_POST) == 0) {
			$team = $this->Teamsmodel->get_record($id);
			$members = $this->Teammembersmodel->getTeamMembers($id);
			$data = array("team" => $team[0], "members" => $members);
			$this->load->view("profile", $data);
			return;
		}
	}
}
