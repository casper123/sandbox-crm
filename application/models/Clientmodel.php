<?php

class Clientmodel extends CI_Model {

    private $token = "";
    private $apiKey = "270f9a50fb20edffe344ac0f44206617";

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->token = $this->getToken();
    }

    public function getClientList()
    {
		$options = array(
            'http' => array(
                'method'  => 'GET',
                'header'=>  "Content-Type: application/json\r\n" .
                            "Accept: application/json\r\n" .
                            "Authorization: Bearer $this->token\r\n"
                )
            );
    
        $context  = stream_context_create( $options );
        $result = file_get_contents( 'https://api.invoice.ng/v1/client/all', false, $context );
        $response = json_decode( $result );
        return $response->data;
    }

    public function getClient($client_id) {

        $options = array(
            'http' => array(
                'method'  => 'GET',
                'header'=>  "Content-Type: application/json\r\n" .
                            "Accept: application/json\r\n" .
                            "Authorization: Bearer $this->token\r\n"
                )
            );
    
        $context  = stream_context_create( $options );
        $result = file_get_contents( 'https://api.invoice.ng/v1/client/'.$client_id, false, $context );
        $response = json_decode( $result );

        return $response->data[0];

    }

    public function createClient($client = array()) {

        $options = array(
            'http' => array(
                'method'  => 'POST',
                'content' => json_encode( $client ),
                'header'=>  "Content-Type: application/json\r\n" .
                            "Accept: application/json\r\n" .
                            "Authorization: Bearer $this->token\r\n"
                )
            );

        $context  = stream_context_create( $options );
        $result = file_get_contents( 'https://api.getinvoice.co/v1/client/add', false, $context );
        $response = json_decode( $result );

        return $response;
    }

    public function updateClient($invoice, $invoice_id) {

        $options = array(
            'http' => array(
                'method'  => 'PUT',
                'content' => json_encode( $invoice ),
                'header'=>  "Content-Type: application/json\r\n" .
                            "Accept: application/json\r\n" .
                            "Authorization: Bearer $token\r\n"
                )
        );

        $context  = stream_context_create( $options );
        $result = file_get_contents( 'https://api.getinvoice.co/v1/invoice/'.$invoice_id, false, $context );
        $response = json_decode( $result );

    }

    public function deleteInvoice() {

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