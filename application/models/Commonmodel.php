<?php

class Commonmodel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function sendEmail($email_address){
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'm.hashamrudy123@gmail.com',
            'smtp_pass' => '03452489264',
            'mailtype'  => 'html', 
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
            
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $email_body ="<div>Well Come To SendBox</div>";
        $this->email->from('user@gmail.com', 'ddd');
        $list = array('user@gmail.com');
        $this->email->to($list);
        $this->email->subject('Testing Email');
        $this->email->message($email_body);
        $this->email->set_mailtype("html");
        $this->email->send();
    }
}

?>