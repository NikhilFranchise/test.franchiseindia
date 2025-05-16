<?php
ob_start();
error_reporting(1);
include_once("../configpg/configMINew.php");         //Database Connectivity
include_once("../configpg/hdfcpg.config.fil.php");    //HDFC settings page
include_once('../configpg/Crypto.php');

$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
$rcvdString=decrypt($encResponse,$working_key_new);		//Crypto Decryption used as per the specified working key.
$order_status="";
$decryptValues=explode('&', $rcvdString);
$dataSize=sizeof($decryptValues);
for($i = 0; $i < $dataSize; $i++){
	$information=explode('=',$decryptValues[$i]);
	if($i==3)	$order_status=$information[1];
	if($i==0)	$order_id=$information[1];
	if($i==2)	$bank_ref_no=$information[1];		
	if($i==1)	$tracking_id=$information[1];
	if($i==5)	$payment_mode=$information[1];
	if($i==10)	$amount=$information[1];								
}
//$order_id = "MagSubMasterTFWENETRET-28438";
//$amount = "1";
//$order_status ="Success";
$txnid_temp = explode("-",$order_id);
$txnid = $txnid_temp[1];

if($order_status==="Success"){
	$qry = "SELECT * FROM magazine_subscribe WHERE sub_id = $txnid";
	$sql1 = mysqli_query($link, $qry);
	$resArr = mysqli_fetch_array($sql1);
	if($amount == $resArr['amount'] || $amount == $resArr['amountfinal']){
		$query = "UPDATE magazine_subscribe SET payment_status = 'Y', pgresponse = '".$order_status."', saltkey = '".$tracking_id."', comments = '".$bank_ref_no."' WHERE sub_id = $txnid";
		$result = mysqli_query($link,$query);
		$affected_rows = mysqli_affected_rows($link);

		$query = mysqli_query($link,"UPDATE magazine_subscribe SET payment_status = 'Y', pgresponse = '".$order_status."', saltkey = '".$tracking_id."', comments = '".$bank_ref_no."' WHERE sub_sub_id = $txnid");

		if($affected_rows > 0){
			$qry = "SELECT * FROM magazine_subscribe WHERE sub_id = $txnid";
			$sql1 = mysqli_query($link,$qry);
			$resArr = mysqli_fetch_array($sql1);
			$paymethod = $resArr['payment_mode'];
			/*$subject = 'Payment Received from Magazine Subscription Offer - www.FranchiseIndia.com';
			$mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch 
			include_once("./includes/Subscribe_Payment_mailer.php");
			try {
				//$mail->AddAddress('bpreetima@franchiseindia.net');
				if($resArr['emp_name'] != ""){
					$mail->AddCC('aamit@franchiseindia.net');				
				}
				//$mail->AddCC('accounts@franchiseindia.com');
				$mail->AddBCC('techsupport@franchiseindia.com');
				$mail->SetFrom('no-reply@franchiseindia.com', 'FI Admin');
				$mail->Subject = $subject;
				$mail->MsgHTML($body);
				$mail->Send();
		
			} catch (phpmailerException $e) {
				echo $e->errorMessage(); //Pretty error messages from PHPMailer
			} catch (Exception $e) {
				echo $e->getMessage(); //Boring error messages from anything else!
			}
		
		
			$mail1 = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch 
			include_once("./includes/Subscriber_paymentmailer.php");
			try {				  
			  $mail1->AddAddress($resArr['email']);	
			  $mail1->AddBCC('techsupport@franchiseindia.com');
			  $mail1->SetFrom('no-reply@franchiseindia.com', 'FI Magazine Admin');
			  $mail1->Subject = 'Magazine Subscription Offer Payment Alert - www.FranchiseIndia.com';
			  $mail1->MsgHTML($body);
			  $mail1->Send();
			} catch (phpmailerException $e) {
			  echo $e->errorMessage(); //Pretty error messages from PHPMailer
			} catch (Exception $e) {
			  echo $e->getMessage(); //Boring error messages from anything else!
			}*/
		}
		$txnid = base64_encode($txnid);
		header('Location:https://master.franchiseindia.com/magazine-subscribe/StatusTRAN.php?txnid='.$txnid.'&message=PAYMENT SUCESSFUL');
		exit;
		
	}else{
		$query = "UPDATE magazine_subscribe SET payment_status = 'F', pgresponse = 'Amount Mismatch', saltkey = '".$tracking_id."', comments = '".$bank_ref_no."' WHERE  sub_id = $txnid";
		$result = mysqli_query($link,$query);
		$txnid = base64_encode($txnid);
		header('Location:https://master.franchiseindia.com/magazine-subscribe/FailedTRAN.php');
		exit;
	}
}else if($order_status==="Aborted"){
	$query = "UPDATE magazine_subscribe SET payment_status = 'A', pgresponse = '".$order_status."', saltkey = '".$tracking_id."', comments = '".$bank_ref_no."' WHERE  sub_id = $txnid";
	$result = mysqli_query($link,$query);
	$txnid = base64_encode($txnid);
	header('Location:https://master.franchiseindia.com/magazine-subscribe/FailedTRAN.php');				
	exit;		
}else if($order_status==="Failure"){
	$query = "UPDATE magazine_subscribe SET payment_status = 'F', pgresponse = '".$order_status."', saltkey = '".$tracking_id."', comments = '".$bank_ref_no."' WHERE  sub_id = $txnid";
	$result = mysqli_query($link,$query);
	$txnid = base64_encode($txnid);
	header('Location:https://master.franchiseindia.com/magazine-subscribe/FailedTRAN.php');				
	exit;		
}else{
	$query = "UPDATE magazine_subscribe SET payment_status = 'N', pgresponse = '".$order_status."', saltkey = '".$tracking_id."', comments = '".$bank_ref_no."' WHERE  sub_id = $txnid";
	//$result = mysqli_query($link,$query);
	//$txnid = base64_encode($txnid);
	header('Location:https://master.franchiseindia.com/magazine-subscribe/FailedTRAN.php');				
	exit;		
}

?>	