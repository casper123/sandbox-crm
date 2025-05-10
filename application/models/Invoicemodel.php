<?php

class Invoicemodel extends CI_Model {

    private $tablename = "`invoice`";
    private $token = "";
    private $apiKey = "270f9a50fb20edffe344ac0f44206617";

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->token = $this->getToken();
    }

    public function _getInvoiceList()
    {
        $data  = array();
        $query = $this->db->query("SELECT invoice.*, teams.team_name FROM invoice LEFT JOIN teams ON invoice.teamId = teams.id ORDER by invoiceId DESC");
        $res = $query->result();

        foreach ($res as $key => $value) {
            $id = $value->invoiceId;

            //get total amount
            $query = $this->db->query("SELECT SUM((price * quantity)) as totalAmount FROM invoiceDetail WHERE invoiceId = $id");
            $sum = $query->result();

            //get total paid
            $query = $this->db->query("SELECT SUM(amount) as totalPaid FROM  payment WHERE sb_invoiceId = $id");
            $paid = $query->result();

            $obj = $value;
            $obj->totalAmount = floatval($sum[0]->totalAmount);
            $obj->totalPaid = floatval($paid[0]->totalPaid);

            $data[] = $obj;
        }

        return $data;
    }

    public function _getSingleInvoice($id = 0)
    {
        $query = $this->db->query("SELECT invoice.*, teams.team_name, teams.owner_email, teams.owner_contact FROM invoice LEFT JOIN teams ON invoice.teamId = teams.id WHERE invoice.invoiceId = $id");
        $res = $query->result();

        $data = $res[0];
        $id = $data->invoiceId;

        //get total amount
        $query = $this->db->query("SELECT * FROM invoiceDetail WHERE invoiceId = $id");
        $detail = $query->result();
        $toal = 0;
        foreach ($detail as $key => $value) {
            $toal = $toal + ($value->price * $value->quantity);
        }

        //get total paid
        $query = $this->db->query("SELECT SUM(amount) as totalPaid FROM payment WHERE sb_invoiceId = $id");
        $paid = $query->result();

        $data->totalAmount = floatval($toal);
        $data->totalPaid = floatval($paid[0]->totalPaid);
        $data->detail = $detail;

        return $data;
    }

    public function _createInvoice($data = array(), $details = array())
    {
        $data["createDate"] = date("Y-m-d h:i:s", strtotime("now"));
        $this->db->insert("invoice", $data);

        $invoiceId = $this->db->insert_id();

        foreach ($details as $key => $value) {
            $value["createDate"] = date("Y-m-d h:i:s", strtotime("now"));
            $value["invoiceId"] = $invoiceId;
            $this->db->insert("invoiceDetail", $value);
        }

        return $invoiceId;
    }

    public function _updateInvoice($data = array(), $details = array(), $invoiceId)
    {
        $this->db->where('invoiceId', $invoiceId);
        $this->db->update("invoice", $data);

        $this->db->delete("invoiceDetail", array('invoiceId' => $invoiceId));

        foreach ($details as $key => $value) {
            $value["createDate"] = date("Y-m-d h:i:s", strtotime("now"));
            $value["invoiceId"] = $invoiceId;
            $this->db->insert("invoiceDetail", $value);
        }

        return $invoiceId;
    }

    public function markAsPaid($invoiceId)
    {
        $this->db->where('invoiceId', $invoiceId);
        $this->db->update("invoice", array("isPaid" => 1));
        return true;
    }

    public function generatePdf($invoiceId = 0)
    {
        $invoice = $this->_getSingleInvoice($invoiceId);
    }

    public function getInvoiceList()
    {
		$data = array();
		$data["api_key"] = $this->apiKey;

		$options = array(
		'http' => array(
			'method'  => 'GET',
			'header'=>  "Content-Type: application/json\r\n" .
						"Accept: application/json\r\n" .
						"Authorization: Bearer $this->token\r\n"
			)
		);

		$context  = stream_context_create( $options );
		$result = file_get_contents( 'https://api.invoice.ng/v1/invoice/all', false, $context );
        $response = json_decode( $result );
        
        return $response->data;
    }

    public function getInvoice($invoice_id) {

        $token = $this->getToken();

        $options = array(
			'http' => array(
				'method'  => 'GET',
				'header'=>  "Content-Type: application/json\r\n" .
							"Accept: application/json\r\n" .
							"Authorization: Bearer $token\r\n"
				)
			);

        $context  = stream_context_create( $options );
        $result = file_get_contents( 'https://api.invoice.ng/v1/invoice/'.$invoice_id, false, $context );
        $response = json_decode( $result );

        return $response;
            
    }

    public function createInvoice($invoice = array()) {

        $options = array(
            'http' => array(
                'method'  => 'POST',
                'content' => json_encode( $invoice ),
                'header'=>  "Content-Type: application/json\r\n" .
                            "Accept: application/json\r\n" .
                            "Authorization: Bearer $this->token\r\n"
                )
        );

        $context  = stream_context_create( $options );
        $result = file_get_contents( 'https://api.getinvoice.co/v1/invoice/add', false, $context );
        $response = json_decode( $result );

        return $response;
    }

    public function updateInvoice($invoice, $invoice_id) {

        $options = array(
            'http' => array(
                'method'  => 'PUT',
                'content' => json_encode( $invoice ),
                'header'=>  "Content-Type: application/json\r\n" .
                            "Accept: application/json\r\n" .
                            "Authorization: Bearer $this->token\r\n"
                )
        );

        $context  = stream_context_create( $options );
        $result = file_get_contents( 'https://api.getinvoice.co/v1/invoice/'.$invoice_id, false, $context );
        $response = json_decode( $result );

        return $response;

    }

    public function deleteInvoice($invoiceId = 0) {

        $this->db->delete("invoice", array('invoiceId' => $invoiceId));
        $this->db->delete("invoiceDetail", array('invoiceId' => $invoiceId));

    }

    public function sendInvoice($invoice_id, $email, $customer_phone, $smsData, $type = "invoice_generated") {

        $send["id"] = $invoice_id;
        $send["email"] = $email;

        $options = array(
        	'http' => array(
        		'method'  => 'POST',
        		'content' => json_encode( $send ),
        		'header'=>  "Content-Type: application/json\r\n" .
        					"Accept: application/json\r\n" .
        					"Authorization: Bearer $this->token\r\n"
        		)
        );

        // $context  = stream_context_create( $options );
        // $result = file_get_contents( 'https://api.getinvoice.co/v1/invoice/send', false, $context );
        // $emailResponse = json_decode( $result );
        
        echo $customer_phone."/".$type;
        $this->commonhelper->send_sms($customer_phone, $type, "SandBox", $smsData);
        
    }

    public function getToken()
	{
		$data = array();
		$data["api_key"] = $this->apiKey;

		$options = array(
		'http' => array(
			'method'  => 'POST',
			'content' => json_encode( $data ),
			'header'=>  "Content-Type: application/json\r\n" .
						"Accept: application/json\r\n"
			)
		);

		$context  = stream_context_create( $options );
		$result = file_get_contents( 'https://api.getinvoice.co/v1/authenticate', false, $context );
		$response = json_decode( $result );

		return $response->token;
	}
}
?>