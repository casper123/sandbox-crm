<?php

(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) && die('Abey Ohhh Chootiye...........!');

class Sbcrons extends CI_Controller {
    public function daily()
    {
    	echo "======== FETCHING DATA ============= <br>";
    	$this->Cronsmodel->get_pending_invoices();
    	echo "======== END CRON ============= <br>";
    }
}