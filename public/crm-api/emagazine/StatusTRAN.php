<?php
include_once("../configpg/configMINew.php");         //Database Connectivity
include_once("../configpg/hdfcpg.config.php");    //HDFC settings page
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

//$order_id = "MagazineEIWeb-62630";
//$amount = "5600";
//$order_status ="Success";
//echo $order_id;
$txnid_temp = explode("-",$order_id);
$txnid = $txnid_temp[1];
if($order_status==="Success"){
	$qry = "SELECT * FROM magazine_subscribe WHERE sub_id = $txnid";
	$sql1 = mysqli_query($link, $qry);
	$resArr = mysqli_fetch_array($sql1);
	if($amount == $resArr['amount']){
		$query = "UPDATE magazine_subscribe SET payment_status = 'Y', pgresponse = '".$order_status."', saltkey = '".$tracking_id."', comments = '".$bank_ref_no."' WHERE  sub_id = $txnid";
		$result = mysqli_query($link,$query);
		$affected_rows = mysqli_affected_rows($link);
		//echo "<b>Payment received</b><br/><br/>";		
		//if($affected_rows > 0){
			/*$qry = "SELECT * FROM magazine_subscribe WHERE sub_id = $txnid";
			$sql1 = mysqli_query($link,$qry);
			$resArr = mysqli_fetch_array($sql1);
			if($resArr['ccode'] == "Paytm"){
				$paymethod = "Paytm";
			}else{
				$paymethod = "Other";					
			}
			*/
			$txnid = base64_encode($txnid);
			header('Location:https://www.entrepreneurindia.com/emagazine/thanks.php?txnid='.$txnid.'&message=PAYMENT SUCESSFUL');				
			exit;
			
		//}
	}else{
		echo "<b>Payment failed</b><br/><br/>";
		$query = "UPDATE magazine_subscribe SET payment_status = 'F', pgresponse = 'Amount Mismatch', saltkey = '".$tracking_id."', comments = '".$bank_ref_no."' WHERE  sub_id = $txnid";
		$result = mysqli_query($link,$query);
		//$txnid = base64_encode($txnid);
		header('Location:https://www.entrepreneurindia.com/emagazine/thanks.php?message=Payment Failed');				
		exit;
	}
}else if($order_status==="Aborted"){
	//	echo "<b>Payment failed</b><br/><br/>";
	$query = "UPDATE magazine_subscribe SET payment_status = 'A', pgresponse = '".$order_status."', saltkey = '".$tracking_id."', comments = '".$bank_ref_no."' WHERE  sub_id = $txnid";
	$result = mysqli_query($link,$query);
	//$txnid = base64_encode($txnid);
	header('Location:https://www.entrepreneurindia.com/emagazine/thanks.php?message=Payment Failed');				
	exit;
}else if($order_status==="Failure"){
		echo "<b>Payment failed</b><br/><br/>";
	$query = "UPDATE magazine_subscribe SET payment_status = 'F', pgresponse = '".$order_status."', saltkey = '".$tracking_id."', comments = '".$bank_ref_no."' WHERE  sub_id = $txnid";
	$result = mysqli_query($link,$query);
	//$txnid = base64_encode($txnid);
	header('Location:https://www.entrepreneurindia.com/emagazine/thanks.php?message=Payment Failed');				
	exit;
}else{
	//echo "<b>Payment failed</b><br/><br/>";
	//$query = "UPDATE magazine_subscribe SET payment_status = 'N', pgresponse = '".$order_status."', saltkey = '".$tracking_id."', comments = '".$bank_ref_no."' WHERE  sub_id = $txnid";
	//$result = mysqli_query($link,$query);
	//$txnid = base64_encode($txnid);
	header('Location:https://www.entrepreneurindia.com/emagazine/thanks.php?message=Payment Failed');				
	exit;
}

?>