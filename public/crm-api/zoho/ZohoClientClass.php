<?php
class ZohoClientClass {
     private $headerGetArray = array(
         "Content-Type: application/json;charset=UTF-8",
         "X-com-zoho-subscriptions-organizationid: 646481318",
        // "Authorization: Zoho-authtoken c61cdd966c355529a2c94fb64785cca2"
         "Authorization: Zoho-oauthtoken 1000.ba8ed92ab1b630f569949e259d2d5488.95e9e672cd454057bd367544d33eee40"
     );
     private $headerArray = array(
         "Content-Type: application/json;charset=UTF-8",
         "X-com-zoho-subscriptions-organizationid: 646481318",
     //    "Authorization: Zoho-authtoken c61cdd966c355529a2c94fb64785cca2"
         "Authorization: Zoho-oauthtoken 1000.ba8ed92ab1b630f569949e259d2d5488.95e9e672cd454057bd367544d33eee40"
     );
    /*private $headerGetArray = array(
        "Content-Type: application/json;charset=UTF-8",
        "X-com-zoho-subscriptions-organizationid: 645380176",
        "Authorization: Zoho-authtoken c61cdd966c355529a2c94fb64785cca2"
    );
    private $headerArray = array(
        "Content-Type: application/json;charset=UTF-8",
        "X-com-zoho-subscriptions-organizationid: 645380176",
        "Authorization: Zoho-authtoken c61cdd966c355529a2c94fb64785cca2"
    );
*/
	public function get($url){

		$ch = curl_init($url);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headerGetArray);
		$result = curl_exec($ch);
		return $result;
	}
	public function post($url, $data_string){

		$ch = curl_init($url);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
		curl_setopt($ch, CURLOPT_FAILONERROR, true);                                                                    
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headerArray);
		$result = curl_exec($ch);
		return $result;

	}

	public function put($url, $data_string){

		$ch = curl_init($url);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); 
		curl_setopt($ch, CURLOPT_FAILONERROR, true);                                                                    
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headerArray);
        $result = curl_exec($ch);
		return $result;
	}

	public function delete($url, $data_string){

		$ch = curl_init($url);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
		curl_setopt($ch, CURLOPT_FAILONERROR, true);                                                                    
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headerArray);
        $result = curl_exec($ch);
		return $result;
	}

}
?>