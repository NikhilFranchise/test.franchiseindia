<?php
include_once("../configpg/configMINew.php");         //Database Connectivity
include_once("../configpg/hdfcpg.config.eimpl.php");    //HDFC settings page
include_once('../configpg/Crypto.php');
//include_once("../mailer/class.phpmailer.php");

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
//$order_id = "MagazineEIWeb-21110";
//$amount = "5400";
$txnid_temp = explode("-",$order_id);
$txnid = $txnid_temp[1];
//$order_status ="Success";
if($order_status==="Success"){
	$qry = "SELECT * FROM magazine_subscribe WHERE sub_id = $txnid";
	$sql1 = mysqli_query($link, $qry);
	$resArr = mysqli_fetch_array($sql1);
	if($amount == $resArr['amount']){
		$query = "UPDATE magazine_subscribe SET payment_status = 'Y', pgresponse = '".$order_status."', saltkey = '".$tracking_id."', comments = '".$bank_ref_no."' WHERE  sub_id = $txnid";
		$result = mysqli_query($link,$query);
		$affected_rows = mysqli_affected_rows($link);
		//echo "<b>Payment received</b><br/><br/>";		
		if($affected_rows > 0){
			$qry = "SELECT * FROM magazine_subscribe WHERE sub_id = $txnid";
			$sql1 = mysqli_query($link,$qry);
			$resArr = mysqli_fetch_array($sql1);
			$paymethod = $resArr['ccode'];					
			/*$mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch 
			include_once("./mailertemplates/entrepreneursubscribe.mailer.php");
			try {
				//$mail->AddAddress('jrekha@franchiseindia.net');	
				if($resArr['campaign'] == "dijen"){
					$mail->AddCC('aamit@franchiseindia.net');
				}
				//$mail->AddCC('accounts@franchiseindia.com');
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
			}	*/
			$txnid = base64_encode($txnid);
			header('Location:https://www.entrepreneurindia.com/entrepreneur-subscription/thanks.php?txnid='.$txnid.'&message=PAYMENT SUCCESSFUL');				
			exit;		
					
		}
	}else{
		//echo "<b>Payment failed</b><br/><br/>";
		$query = "UPDATE magazine_subscribe SET payment_status = 'F', pgresponse = 'Amount Mismatch', saltkey = '".$tracking_id."', comments = '".$bank_ref_no."' WHERE  sub_id = $txnid";
		$result = mysqli_query($link,$query);
		//$txnid = base64_encode($txnid);
		header('Location:https://www.entrepreneurindia.com/entrepreneur-subscription/thanks.php?message=Payment Failed');				
		exit;		
	}
}else if($order_status==="Aborted"){
		//echo "<b>Payment failed</b><br/><br/>";
	$query = "UPDATE magazine_subscribe SET payment_status = 'A', pgresponse = '".$order_status."', saltkey = '".$tracking_id."', comments = '".$bank_ref_no."' WHERE  sub_id = $txnid";
	$result = mysqli_query($link,$query);
	//$txnid = base64_encode($txnid);
	header('Location:https://www.entrepreneurindia.com/entrepreneur-subscription/thanks.php?message=Payment Failed');				
	exit;		
}else if($order_status==="Failure"){
		//echo "<b>Payment failed</b><br/><br/>";
	$query = "UPDATE magazine_subscribe SET payment_status = 'F', pgresponse = '".$order_status."', saltkey = '".$tracking_id."', comments = '".$bank_ref_no."' WHERE  sub_id = $txnid";
	$result = mysqli_query($link,$query);
	//$txnid = base64_encode($txnid);
	header('Location:https://www.entrepreneurindia.com/entrepreneur-subscription/thanks.php?message=Payment Failed');				
	exit;		
}else{
		//echo "<b>Payment failed</b><br/><br/>";
	$query = "UPDATE magazine_subscribe SET payment_status = 'N', pgresponse = '".$order_status."', saltkey = '".$tracking_id."', comments = '".$bank_ref_no."' WHERE  sub_id = $txnid";
	//$result = mysqli_query($link,$query);
	//$txnid = base64_encode($txnid);
	header('Location:https://www.entrepreneurindia.com/entrepreneur-subscription/thanks.php?message=Payment Failed');				
	exit;		
}

?>