<?php

class Teamsmodel extends CI_Model {

    private $tablename = "`teams`";

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function getExpectedIncome($value='')
    {
        $query = $this->db->query("SELECT SUM(membership_amount) AS total_expected FROM `teams` WHERE is_active = 1");
        $res = $query->result();

        return intval($res[0]->total_expected);
    }

    function get_open_space_active_members(){
        
        $query = $this->db->query("SELECT SUM(total_members) AS total_open FROM  teams  WHERE teams.is_active = 1 AND teams.membership_type_id IN (1,2,5)");
        
        $rec = $query->result();
        return $rec[0]->total_open;
    }

    function get_active_members(){
        
        $query = $this->db->query("SELECT SUM(total_members) AS total_members FROM  teams  WHERE teams.is_active = 1");
        
        $rec = $query->result();
        return $rec[0]->total_members;
    }

    function get_active_teams(){
        
        $q =  $this->db->query("SELECT membership_type.name, COUNT(*) AS sum_teams FROM `teams` INNER JOIN membership_type ON membership_type.id = teams.membership_type_id WHERE is_active = 1 GROUP BY membership_type_id");

        $res = $q->result();

        $totalCount = 0;
        foreach ($res as $key => $value) {
            $totalCount = $totalCount + $value->sum_teams;            
        }

        return array("records" => $res, "totalTeams" => $totalCount);
    }

    function get_record($id = ""){
        $where = "";
        
        if($id > 0){
            $where = " where id = $id";
        }

        $query = $this->db->query("SELECT * FROM  " . $this->tablename." ".$where." ORDER by team_name");
        return $query->result();
    }

    function set_record()
    {
        $data   = array();
        $data   = $this->getPostedParams();
        $data["create_date"] = date("Y-m-d H:i:s", strtotime("now"));
        $data["update_date"] = date("Y-m-d H:i:s", strtotime("now"));

        $this->db->insert($this->tablename, $data);
        $id = $this->db->insert_id();
        if(intval($id) > 0)
        {
            $images = $this->get_upload_files_response($id, $data["team_name"]);

            $iData = array();
            $iData["ntn_front"] = (isset($images["ntn_front"]) && $images["ntn_front"] !== false)?  $images["ntn_front"] : "";
            $iData["ntn_back"] = (isset($images["ntn_back"]) && $images["ntn_back"] !== false) ?  $images["ntn_back"] : "";
            $iData["owner_cnic_front"] = (isset($images["owner_cnic_front"]) && $images["owner_cnic_front"] !== false)?  $images["owner_cnic_front"] : "";
            $iData["owner_cnic_back"] = (isset($images["owner_cnic_back"]) && $images["owner_cnic_back"] !== false) ?  $images["owner_cnic_back"] : "";
            $iData["form_page_1"] = (isset($images["form_page_1"]) && $images["form_page_1"] !== false) ?  $images["form_page_1"] : "";
            $iData["form_page_2"] = (isset($images["form_page_2"]) && $images["form_page_2"] !== false) ?  $images["form_page_2"] : "";
            $iData["team_logo"] = (isset($images["team_logo"]) && $images["team_logo"] !== false) ?  $images["team_logo"] : $data["team_logo"];

            $this->db->where('id', $id);
            $this->db->update($this->tablename, $iData);            
            return $data;
        }
        else
            return false;
    }

    function update_record($id){
        $data = array();
        $data = $this->getPostedParams();

        $images = $this->get_upload_files_response($id, $data["team_name"]);

        $data["update_date"] = date("Y-m-d H:i:s", strtotime("now"));

        if(isset($images["ntn_front"]) && $images["ntn_front"] !== false) 
            $data["ntn_front"] = $images["ntn_front"];

        if(isset($images["owner_cnic_front"]) && $images["owner_cnic_front"] !== false) 
            $data["owner_cnic_front"] = $images["owner_cnic_front"];

        if(isset($images["owner_cnic_back"]) && $images["owner_cnic_back"] !== false) 
            $data["owner_cnic_back"] = $images["owner_cnic_back"];
        
        if(isset($images["form_page_1"]) && $images["form_page_1"] !== false)
        {
            $data["form_page_1"] = $images["form_page_1"];
            $data["is_active"] = 1;
            $this->send_welcome_email($data["owner_email"]);
            $this->send_welcome_sms($data);
        }

        if(isset($images["form_page_2"]) && $images["form_page_2"] !== false) 
            $data["form_page_2"] = $images["form_page_2"];

        if(isset($images["team_logo"]) && $images["team_logo"] !== false)
            $data["team_logo"] = $images["team_logo"];

        $this->db->where('id', $id);
        return $this->db->update($this->tablename, $data);
    }

    function delete_record($id){
        return $this->db->delete($this->tablename, array('id' => $id));
    }

    function getPostedParams(){
        $data["team_name"]           = $this->input->post('team_name');
        $data["bussiness"]           = $this->input->post('bussiness');
        $data["team_owner"]          = $this->input->post("team_owner");
        $data["owner_cnic"]          = $this->input->post("owner_cnic");
        $data["owner_email"]         = $this->input->post("owner_email");
        $data["owner_contact"]       = $this->input->post("owner_contact");
        $data["skype_id"]            = $this->input->post("skype_id");
        $data["total_members"]            = $this->input->post("total_members");
        $data["membership_type_id"]  = $this->input->post("membership_type_id");
        $data["security_deposite"]   = $this->input->post("security_deposite");
        $data["is_locker_avail"]     = $this->input->post("is_locker_avail");
        $data["memebership_start_date"]  = date("Y-m-d",strtotime($this->input->post("memebership_start_date")));
        $data["membership_amount"]   = $this->input->post("membership_amount");
        $data["parking_avail"]       = $this->input->post("parking_avail");
        $data["is_active"]           = intval($this->input->post("is_active"));
        $data["emergencyPerson"] = $this->input->post("emergencyPerson");
        // $data["logo"] = $this->input->post("logo");
        // $data["intro"] = $this->input->post("intro");
        // $data["website"] = $this->input->post("website");
        // $data["upwork"] = $this->input->post("upwork");
        // $data["linkedin"] = $this->input->post("linkedin");
        // $data["display_on_site"] = $this->input->post("display_on_site");

        return $data;
    }

    function get_upload_files_response($id, $teamName){
        $image_path = array(); 
        if(count_($_FILES) > 0 )
        {
            foreach ($_FILES as $key => $value) 
            {
               $image_path[$key] =  $this->uploadImage($value, $key, $id, $teamName);
            }
        }
        return $image_path;
    }

    function checkLocalhost(){
        $whitelist = array('127.0.0.1', "::1");
        if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
            return false;
        }else{
            return true;
        }
    }


    function uploadImage($file, $fileType, $id, $teamName){
        if(count_($_FILES) > 0 && $file["name"] != "")
        {
            $imageFileType = strtolower(pathinfo($file["name"],PATHINFO_EXTENSION));
            $directory = __DIR__;

            $imageName = $fileType."-".str_replace(" ", "-", $teamName)."-".$id.".".$imageFileType;
            //$target_file = substr($directory, 0, strpos($directory, "sandbox"))."sandbox-system/assets/teams/$imageName";
            $target_file = substr($directory, 0, strpos($directory, "sandbox"))."sandbox/assets/teams/$imageName";
            
            $uploadOk = 1;
            
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                $this->uploadToDropBox($target_file);
                return $imageName;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function get_teams_records($isActive = 0){

        $q = "SELECT 
        tm.*,
        membership_type.`name` as membership_type,
        membership_type.`price` membership_price
      FROM
        `teams` tm
        LEFT JOIN `membership_type` 
        ON tm.`membership_type_id` = membership_type.`id` ";

        if ($isActive == 1)
            $q = $q." WHERE tm.is_active = 1 ";
        
        $q = $q." ORDER BY tm.`id` DESC";

        $query = $this->db->query($q);
        return $query->result();
    
    }

    function update_status($id){

        $query = $this->db->query("SELECT * FROM  " . $this->tablename." WHERE id =".intval($id));
        $result = $query->result();

        if(isset($result[0]))
        {
            if($result[0]->is_active == 1)
                $status = 0;
            else
                $status = 1;
        }

        $data["is_active"] = $status;
        $data["update_date"] = date("Y-m-d H:i:s", strtotime("now"));

        $this->db->where('id', $id);
        if($this->db->update($this->tablename, $data))
        {
            $query = $this->db->query("SELECT * FROM  " . $this->tablename." WHERE id =".intval($id));
            $result = $query->result();
            return $result[0];
        }
        else
            return false;
    }


    public function getUpcomingPayments()
    {
        $dayStart = date("d",strtotime("-3 days"));
        $dayEnd = strtolower(date("d",strtotime("+5 days")));

        if(intval($dayEnd) < intval($dayStart))
            $dayEnd = 30;
        
        $query = $this->db->query("SELECT * FROM `teams` where DAYOFMONTH(memebership_start_date) BETWEEN $dayStart AND $dayEnd AND is_active = 1 AND membership_amount > 0 ORDER BY memebership_start_date ASC");

        return $query->result();
    }

    public function acceptInvitation()
    {
        $data = array();
        $data["team_name"] = $this->input->post('team_name');
        $data["bussiness"] = $this->input->post('bussiness');
        $data["team_owner"] = $this->input->post("team_owner");
        $data["owner_email"] = $this->input->post("owner_email");
        $data["owner_contact"] = $this->input->post("owner_contact");
        $data["emergencyPerson"] = $this->input->post("emergencyPerson");
        $data["emergencyContact"] = $this->input->post("emergencyContact");
        $data["membership_type_id"]  = $this->input->post("membership_type_id");
        $data["create_date"] = date("Y-m-d H:i:s", strtotime("now"));
        $data["update_date"] = date("Y-m-d H:i:s", strtotime("now"));
        $data["is_active"] = 0;
        $data["how_hear"] = $this->input->post("how_hear");

        $this->db->insert($this->tablename, $data);
        if($this->db->insert_id())
        {
            $id = $this->db->insert_id();

            $pics = array();
            $pics["form_page_2"] = $this->saveImage($this->input->post("form_page_2"), "picture", $data["team_name"], $id);
            $pics["owner_cnic_front"] = $this->saveImage($this->input->post("owner_cnic_front"), "cnic-front", $data["team_name"], $id);
            $pics["owner_cnic_back"] = $this->saveImage($this->input->post("owner_cnic_back"), "cnic-back", $data["team_name"], $id);

            $this->db->where('id', $id);
            $this->db->update($this->tablename, $pics);            
            return $id;
        }

    }

    public function saveImage($data, $imageType, $name, $id)
	{
		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);

        $directory = __DIR__;
        $imageName = $imageType."-".str_replace(" ", "-", $name)."-".$id.".png";
        $target_dir = substr($directory, 0, strpos($directory, "sandbox"))."sandbox/assets/teams/$imageName";

        file_put_contents($target_dir, $data);
        //$this->uploadToDropBox($target_dir);
        return $imageName;
    }
    
    public function uploadToDropBox($target_dir)
	{
		$api_url = 'https://content.dropboxapi.com/2/files/upload'; //dropbox api url
		$token = 'HWv_o4xl3r4AAAAAAAASkDRgo4QnSiskz5Rgtwbtln4qn9thgL1ANV5UCU6gk3md'; // oauth token
		
        $headers = array('Authorization: Bearer '. $token,
            'Content-Type: application/octet-stream',
            'Dropbox-API-Arg: '.
            json_encode(
                array(
                    "path"=> $target_dir,
                    "mode" => "add",
                    "autorename" => true,
                    "mute" => false
                )
            )

        );

        $ch = curl_init($api_url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);

        $path = $target_dir;
        $fp = fopen($path, 'rb');
        $filesize = filesize($path);

        curl_setopt($ch, CURLOPT_POSTFIELDS, fread($fp, $filesize));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    }
    
    private function send_welcome_email($to_email)
	{
		$month = date("M", strtotime("now"));
		$year = date("Y", strtotime("now"));
		$subject = "It's good to see you at Sand Box!";
		$message = "Welcome Aboard! 
		<br/><br/>
		Thank you for becoming a part of Sand Box! We’re thrilled to have you on board and can’t wait to get to know you.
		<br/><br/>
		We want to make sure you’re taking full advantage of all the membership benefits available! Here are a few other things to get started with ASAP:
		<br/><br/>
		<b>Sand Box on WhatsApp:</b>Follow this link to join our WhatsApp group and stay updated on all the hustle at Sand Box: <a href='https://chat.whatsapp.com/CYVC8uBsskL2j982iFa17D'>https://chat.whatsapp.com/CYVC8uBsskL2j982iFa17D</a>
		<br/><br/>
		<b>Board Room Booking:</b> You can use this calendar link to book our board room whenever you need it <a href='https://teamup.com/ks8kjeu7kaudwhogz8'>https://teamup.com/ks8kjeu7kaudwhogz8</a>. In order to improve the usage and bookings of our board room, we have limited the usage of board room depending upon your level of subscription. Please consult with Aamir for your allocated hours.<b><u>Kindly mention your Team Name / Studio Name in booking calendar when you book</b></u>
		<br/><br/>
		<b>IBM Cloud:</b> You can get up to $120,000 in IBM Cloud credits to integrate your solutions with leading-edge technologies to deliver more innovation and value to your clients. Go to <a href='https://developer.ibm.com/startups/'>https://developer.ibm.com/startups/</a> and click <u>Get Free Credits Now</u>. In registration from select Sand Box from list of affiliates
		<br/><br/>
		<b>Google Cloud Platform for Startups:</b> Sand Box is Partner for Google Cloud for Startups Program, and we'd love to offer your startups our Start package, which includes $3K in credits! To have your startups redeem this offer, please have them fill out the form: <a href='https://gcpstartups.com/NZyT'>https://gcpstartups.com/NZyT</a>
		<br/><br/>
		<b>Hubspot for Startups:</b> We’re excited to partner with HubSpot for Startups to offer their program designed specifically to help startups grow and scale better, and faster - at a startup-friendly cost! Use this link for apply for Hubspot Startup Program <a href='https://www.hubspot.com/startups'>https://www.hubspot.com/startups</a>
		<br/><br/>
		<b>AWS Activate:</b> Sand Box is a Amazon Web Services partner which provides startups with low cost, easy to use infrastructure needed to scale and grow any size business. Visit the AWS Activate webpage <a href='https://aws.amazon.com/activate/portfolio-signup'>https://aws.amazon.com/activate/portfolio-signup</a> to apply using this Organization ID (case-sensitive) on your application form: <b>0urUh</b>
		<br/><br/>
		Sand Box also offers biometric based payroll and human resource management system, tax filing and company registration services at discounted price. If you'd like to avail these services, please talk to us so we can assist you for further processing.
		<br/><br/>
		We've also listed our code of conduct on our website here for your convenience <a href='https://sandbox.com.pk/code.php'>https://sandbox.com.pk/code.php</a>
		<br/><br/>
		Should you need any assistance or have any questions or comments about your membership or benefits, please feel free to contact us directly, or call us at 0304-0445341.
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
		$list = array($to_email);
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
    
    public function send_welcome_sms($data)
    {
        // send SMS on team creation
        $sms_data["team_owner"] = $data["team_owner"];
        $this->commonhelper->send_sms($data["owner_contact"], "team_creation","SandBox", $sms_data);

        //broad cast all teams owner messages
        $teams = $this->Teamsmodel->get_teams_records(1);

        foreach ($teams as $key => $value) 
        {
            $sms_data["team_owner"] = $value->team_owner;
            $sms_data["new_team_owner"] = $data["team_owner"];
            $sms_data["new_team_owner_bussiness"] = $data["bussiness"];
            $sms_data["new_team_owner_email"] = $data["owner_email"];
            
            $this->commonhelper->send_sms($value->owner_contact, "team_creation_broadcast","SandBox", $sms_data);
        }
    }

}

?>