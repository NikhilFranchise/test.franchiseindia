<?php
include_once("../configpg/configMINew.php");         //Database Connectivity
require_once("../configpg/paytm_fi_config.php");
require_once("../configpg/paytm_fi_encdec.php");
//include_once("../mailer/class.phpmailer.php");


$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";
//echo "<pre>";
//print_r($_POST);

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
if($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		//echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		//print_r($_POST);
		//foreach($_POST as $paramName => $paramValue) {
			//	echo "<br/>" . $paramName . " = " . $paramValue;
	//	}
		$checkSum = "";
		$paramList = array();
		$paramList["MID"] = $_POST["MID"];
		$paramList["ORDERID"] = $_POST["ORDERID"];
		
		//Here checksum string will return by getChecksumFromArray() function.
		$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
		$check=urlencode($checkSum);  
		$paramList["CHECKSUMHASH"]=$check;
		$data_string = json_encode($paramList); 
		
		$ch = curl_init();                    // initiate curl
		$url = "https://securegw.paytm.in/merchant-status/getTxnStatus?JsonData=".$data_string; // where you want to post data
		
		$headers = array('Content-Type:application/json');
		
		$ch = curl_init();  // initiate curl
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POST, 1);  // tell curl you want to post something
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string); // define what you want to post
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);     
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);    
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$output = curl_exec ($ch); // execute
		//$info = curl_getinfo($ch);
		//print_r($info)."<br />";
		//echo $output;
		//echo "<pre>";
		//$dumpvalue = var_dump(json_decode($output, true));
		$dumpvalue = json_decode($output, true);
		//print_r($dumpvalue);
		if ($dumpvalue['STATUS'] == "TXN_SUCCESS" && $dumpvalue['RESPCODE'] == 01){
			$txnid = $dumpvalue['ORDERID'];
			$txnid_temp = explode("-",$txnid);
			$txnidu = $txnid_temp[1];
			$qry = "SELECT * FROM magazine_subscribe WHERE sub_id = $txnidu";
			$sql1 = mysqli_query($link, $qry);
			$resArr = mysqli_fetch_array($sql1);
			if($dumpvalue['TXNAMOUNT'] == $resArr['amount']){
				//echo "<b>Payment received</b><br/><br/>";	
				//echo "<b>BANK TXNID</b> " .$dumpvalue['BANKTXNID']. "<br/>";	
				//echo "<b>Amount</b> " .$dumpvalue['TXNAMOUNT']. "<br/>";									
				$query = "UPDATE magazine_subscribe SET payment_status = 'Y', pgresponse = '".$dumpvalue['RESPMSG']."', saltkey = '".$dumpvalue['BANKTXNID']."' WHERE sub_id = $txnidu";
				$result = mysqli_query($link,$query);
				$affected_rows = mysqli_affected_rows($link);
				if($affected_rows > 0){
					$qry = "SELECT * FROM magazine_subscribe WHERE sub_id = $txnidu";
					$sql1 = mysqli_query($link,$qry);
					$resArr = mysqli_fetch_array($sql1);
					if($resArr['ccode'] == "Paytm"){
						$paymethod = "Paytm";
					}else{
						$paymethod = "Other";					
					}
					/*$mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch 
					include_once("./mailertemplates/entrepreneursubscribe.mailer.php");
					try {
					 // $mail->AddAddress('jrekha@franchiseindia.net');	
					 // $mail->AddCC('aamit@franchiseindia.net');
					 // $mail->AddCC('accounts@franchiseindia.com');
					  $mail->AddBCC('techsupport@franchiseindia.com');
					  $mail->SetFrom('no-reply@entrepreneurindia.com', 'EI Admin');
					  $mail->Subject = 'Payment Received from Entrepreneur Magazine Subscription Campaign - www.FranchiseIndia.com';
					  $mail->MsgHTML($body);
					  $mail->Send();
					  //echo "Step3</br>";
					} catch (phpmailerException $e) {
					  echo $e->errorMessage(); //Pretty error messages from PHPMailer
					} catch (Exception $e) {
					  echo $e->getMessage(); //Boring error messages from anything else!
					}
					
//Mail to Customer
			$mail1 = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch 
			$body1 = "Thank you for subscribing for Entrepreneur magazine. The magazine subscription is likely to start from 4-6 weeks from now. If you need any other details please feel free to write to us at support@entrepreneurindia.com 
<br /><br />Stay Safe, Stay Healthy
<br />Team Entrepreneur India";
			try {
			  $mail1->AddAddress($resArr['email']);	
			  $mail1->AddBCC('techsupport@franchiseindia.com');
			  $mail1->SetFrom('no-reply@entrepreneurindia.com', 'Entrepreneur India');
			  $mail1->Subject = 'Payment Received from Entrepreneur Magazine Subscription';
			  $mail1->MsgHTML($body1);
			  $mail1->Send();
			  //echo "Step3</br>";
			} catch (phpmailerException $e) {
			  echo $e->errorMessage(); //Pretty error messages from PHPMailer
			} catch (Exception $e) {
			  echo $e->getMessage(); //Boring error messages from anything else!
			}*/					
				}
				$txnid = base64_encode($txnidu);
				header('Location:https://www.entrepreneurindia.com/entrepreneur-subscription/thanks.php?txnid='.$txnid.'&message=PAYMENT SUCCESSFUL');				
				exit;		
			}else {
				echo "<b>Transaction status is failure due to amount mismatch</b>" . "<br/>";
				$txnid = $dumpvalue['ORDERID'];
				$txnid_temp = explode("-",$txnid);
				$txnidu = $txnid_temp[1];
				$query = "UPDATE magazine_subscribe SET payment_status = 'F', pgresponse = '".$dumpvalue['RESPMSG']."', saltkey = '".$dumpvalue['BANKTXNID']."' WHERE sub_id = $txnidu";
				$result = mysqli_query($link,$query);	
				$txnid = base64_encode($txnidu);
				header('Location:https://www.entrepreneurindia.com/entrepreneur-subscription/thanks.php?message=Payment Failed');				
				exit;		
			}

		}else {
			echo "<b>Transaction status is failure</b>" . "<br/>";
			$txnid = $dumpvalue['ORDERID'];
			$txnid_temp = explode("-",$txnid);
			$txnidu = $txnid_temp[1];
			$query = "UPDATE magazine_subscribe SET payment_status = 'F', pgresponse = '".$dumpvalue['RESPMSG']."', saltkey = '".$dumpvalue['BANKTXNID']."' WHERE sub_id = $txnidu";
			$result = mysqli_query($link,$query);		
			//$txnid = base64_encode($txnidu);
			header('Location:https://www.entrepreneurindia.com/entrepreneur-subscription/thanks.php?message=Payment Failed');				
			exit;		
		}
	}else {

		echo "<b>PAYMENT Failed.</b>";	
		$checkSum = "";
		$paramList = array();
		$paramList["MID"] = $_POST["MID"];
		$paramList["ORDERID"] = $_POST["ORDERID"];
		
		//Here checksum string will return by getChecksumFromArray() function.
		$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
		$check=urlencode($checkSum);  
		$paramList["CHECKSUMHASH"]=$check;
		$data_string = json_encode($paramList); 
		
		$ch = curl_init();                    // initiate curl
		$url = "https://securegw-stage.paytm.in/merchant-status/getTxnStatus?JsonData=".$data_string; // where you want to post data
		
		$headers = array('Content-Type:application/json');
		
		$ch = curl_init();  // initiate curl
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POST, 1);  // tell curl you want to post something
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string); // define what you want to post
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);     
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);    
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$output = curl_exec ($ch); // execute
		//$info = curl_getinfo($ch);
		//print_r($info)."<br />";
		//echo $output;
		//echo "<pre>";
		//$dumpvalue = var_dump(json_decode($output, true));
		$dumpvalue = json_decode($output, true);		
		$txnid = $dumpvalue['ORDERID'];
		$txnid_temp = explode("-",$txnid);
		$txnidu = $txnid_temp[1];
		$query = "UPDATE magazine_subscribe SET payment_status = 'F', pgresponse = '".$dumpvalue['RESPMSG']."', saltkey = '".$dumpvalue['BANKTXNID']."' WHERE sub_id = $txnidu";
		$result = mysqli_query($link,$query);		
		//$txnid = base64_encode($txnidu);
		header('Location:https://www.entrepreneurindia.com/entrepreneur-subscription/thanks.php?message=Payment Failed');				
		exit;		
	}

	/*if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				//echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
	*/
}else {
	//echo "<b>Checksum mismatched.</b>";
	header('Location:https://www.entrepreneurindia.com/entrepreneur-subscription/thanks.php?message=Payment Failed');				
	exit;		

}

?>