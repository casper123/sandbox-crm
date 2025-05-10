<?php

class Cronsmodel extends CI_Model {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_pending_invoices(){
        $query = $this->db->query("SELECT 
                                      `invoice`.id,
                                      teams.`team_owner`,
                                      teams.`owner_contact`,
                                      invoice.`billed_amount`,
                                      invoice.`reciept_no`,
                                      invoice.`generated_for_month`,
                                      SUM(invoice_reciept.`recieved_amount`) AS pending_amount  
                                    FROM
                                      invoice 
                                      LEFT JOIN teams
                                      ON invoice.`team_id` = teams.`id`
                                      LEFT JOIN invoice_reciept
                                      ON invoice.`id` = invoice_reciept.`invoice_id`
                                    WHERE `invoice`.`inovoice_status` = 'pending' 
                                      GROUP BY invoice.`id`");
        $data = $query->result();

        foreach ($data as $key => $value) {
            $current_date = strtotime("now");
            $due_date = strtotime($value->generated_for_month);
            if($due_date <= $current_date){
                $sms_data["team_owner"] = $value->team_owner;
                $sms_data["reciept_no"] = $value->reciept_no;
                $sms_data["generated_for_month"] = date("d-m-Y",strtotime($value->generated_for_month));
               
                echo "============ SENDING SMS TO ".$value->team_owner." ========== <br>";
               $this->commonhelper->send_sms($value->owner_contact, "daily_pending_invoice","SandBox", $sms_data);                
            }
        }
        return;
    }
}

?>