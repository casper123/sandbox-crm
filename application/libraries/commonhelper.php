<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Commonhelper {

    protected $dropboxkey = "z9ef60ppot8rkva";
    protected $dropbox_secreate = "2ktijz3zkvlbkdi";
    protected $app_name = "sandbox-wahab";

    public function send_sms($to, $message_type = "invoice", $mask="SandBox", $sms_data){
        
        //echo $val;continue;
        $to = preg_replace('/\s+/', '', $to);

        
        $to = str_replace(" ", "", $to);

        $to = str_replace("-", "", $to);
        
        //$to = intval($to);

        if(strpos($to, '0') === false)
        {
            if(strpos($to, '9') == 0)
                $to = $to;
            else
                $to = "92".$to;
        }
        elseif(strpos($to, '0') == 0)
            $to = "92".substr($to, 1);
        elseif(strpos($to, '3') == 0)
        {   
            $to = "92".$to;
        }
        else
            $to = $to;

        if(strlen($to) != 12)
            return;

        // Confedential Configuration Variables / Mandatory Variables
        $email = "wahabkotwal@yahoo.com";
        $key = "046d5eb458e68828432ad909458d8799b4";
        $message = $this->get_message_content($message_type,$sms_data);

        // echo $message;;
        // die;

        // Preparing Data to POST Request / DO NOT TOUCH BELOW
        $mask = urlencode($mask);
        $message = urlencode($message);
        $data = "email=".$email."&key=".$key."&mask=".$mask."&to=".$to."&message=".$message;

        // Sending the POST Request with cURL to Branded SMS Pakistan Server
        $ch = curl_init('https://secure.h3techs.com/sms/api/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch); // Result from Branded SMS Pakistan including Return ID
        curl_close($ch);
    }

    public function get_message_content($type,$data){
        $message = "";
        switch ($type) {

            case 'team_creation':
                $message = "Dear ".$data['team_owner'].", Welcome to Sand Box. We hope you'll have a great time with fellow co-workers. Please check your email for details of few other things to get started. In case of any any questions/queries, call us at 0304-0445341. Thank you for joining Sand Box.";
                break;

            case 'team_creation_broadcast':
                $message = "Dear ".$data['team_owner'].", We have a new member at Sand Box. ".$data['new_team_owner']." runs a ".$data['new_team_owner_bussiness']." services. You may reach out him at ".$data['new_team_owner_email'].".";
                break;

            case 'old_team_activated':
                $message = "Dear ".$data['team_owner'].", Welcome back at Sand Box. We hope you'll have a great time once again. Please use this calender link for booking meeting room https://teamup.com/ks8kjeu7kaudwhogz8 . In case of any any questions/queries, call us at 0304-0445341. Thank you for joining Sand Box.";
                break;

            case "team_deactivated":
                $message = "Dear ".$data['team_owner'].", We will miss you at Sand Box but like we always say you are forever part of this amazing community. Thus, we ask you to take a moment to complete the following brief survey, it would help us to identify ways in which we can improve our services and correct any deficiencies. https://forms.gle/Z2k8yQaWARtNEv51A.";
                break;

            case 'new_team_member_created':
                $message = "Dear ".$data['team_member'].", Welcome aboard! We hope you'll have great time at Sand Box with fellow co-workers. Please submit a copy of you CNIC at reception desk. You can let us know directly or call us at 0304-0445341 if you have any queries or questions.";
                break;

            case 'invoice_generated':
                $message = "Dear ".$data['team_owner'].", The invoice of Rs.".number_format($data["amount"])." has been generated against invoice number ".$data['reciept_no']." for the month of ".$data['generated_for_month']." ".date("Y", strtotime("now")).". A copy of invoice has been sent to your email. We'd appreciate your timely payment.";
                break;

            case 'daily_pending_invoice':
                $message = "Dear ".$data['team_owner'].", This is to infrom you that your invoice for ".$data['reciept_no']." ".$data['generated_for_month']." is overdue. Kindly pay your invoice asap to avoid cancelation of membership. Thank You  ";
                break;

            case 'inovice_paid':
                $message = "Dear ".$data['team_owner'].", we have received your payment of Rs.".number_format($data["amount"])." for invoice ".$data['reciept_no'].". A recepit of payment has been sent to your email. Thank You";
                break;

            case 'membership_request':
                $message = "Dear ".$data['team_owner'].", we have received your payment of Rs.".number_format($data["amount"])." for invoice ".$data['reciept_no'].". A recepit of payment has been sent to your email address. Thank You";
                break;

            case 'application_submit_owner':
                $message = "Dear ".$data['team_owner'].", thank you for taking the time to complete our membership application. Our team will send you copy for contract for esign along with the invoice in next 48 hours";
                break;

            case 'application_submit_admin':
                $message = $data['team_owner']." -  ".$data['team_name']." has submitted his application. Please complete the application and send contract and invoice.";
                break;

            case 'team_invite_new':
                $message = $data['msg'];
                break;

            case 'request_update':
                $message = $data['msg'];
                break;
            
            default:
                $message = "Test Sms For SendBox User";
                break;
        }
        return $message;
    }
}
?>