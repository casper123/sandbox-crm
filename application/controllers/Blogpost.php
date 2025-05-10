<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blogpost extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $sess_id = $this->session->userdata('id');
		if(!$sess_id)
			redirect(base_url()."admin/");

        $this->load->library('layout', 'layout_main');
        $this->layout->setLayout("layout_main");	
    }
    
	public function index($storeId = 0)
	{
        $data = array();
        $data["blogs"] = $this->Blogmodel->get_all();
        $this->layout->view("blog/list", $data);
    }
    
    public function save($id = 0)
	{
        $data = array();        
        if (intval($id) > 0)
        {
            $data["blog"] = $this->Blogmodel->get($id);
        }
        
        if(count_($_POST) == 0) 
        {
            $this->layout->view("blog/form", $data);
            return;
        }

        $id = $this->Blogmodel->save($_POST);
        
        if (intval($id) > 0) {
            redirect(base_url()."blogpost/index?add=1"); 
        } else {
            redirect(base_url()."blogpost/index?add=2");
        }
    }

    public function imageuploader()
    {
        $response = $this->Blogmodel->imageuploader($_FILES["file"]);
        echo json_encode($response);
    }
}