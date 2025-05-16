<?php
ob_start();
//ini_set("display_errors",1);
include_once("../configpg/configMINew.php");         //Database Connectivity
include_once("../configpg/hdfcpg.config.fil.php");    //HDFC settings page
include_once('../configpg/Crypto.php');
//require_once("../configpg/paytm_fi_config.php");
//require_once("../configpg/paytm_fi_encdec.php");

//include_once("../mailer/class.phpmailer.php"); 
$post_value = array_map(array($link, 'real_escape_string'), $_POST);
@extract($post_value);

$ip = $_SERVER['REMOTE_ADDR'];

//////////////////////////// State With Brand & State Name ////////////////////////////////
	if($txtstate ==1){ $state = "Andhra Pradesh"; } 
	elseif($txtstate ==2){	$state = "Arunachal Pradesh"; }
	elseif($txtstate ==3){	$state = "Assam"; }
	elseif($txtstate ==4){	$state = "Bihar"; }
	elseif($txtstate ==6){	$state = "Chhattisgarh"; }
	elseif($txtstate ==25){	$state = "Delhi/NCR"; }
	elseif($txtstate ==9){	$state = "Goa"; }
	elseif($txtstate ==10){	$state = "Gujarat"; }
	elseif($txtstate ==11){	$state = "Haryana"; }
	elseif($txtstate ==12){	$state = "Himachal Pradesh"; }
	elseif($txtstate ==13){	$state = "Jammu &amp Kashmir"; }
	elseif($txtstate ==14){	$state = "Jharkhand"; }
	elseif($txtstate ==15){	$state = "Karnataka"; }
	elseif($txtstate ==16){	$state = "Kerala"; }
	elseif($txtstate ==18){	$state = "Madhya Pradesh"; }
	elseif($txtstate ==20){	$state = "Manipur"; }
	elseif($txtstate ==21){	$state = "Meghalaya"; }
	elseif($txtstate ==22){	$state = "Mizoram"; }
	elseif($txtstate ==23){	$state = "Nagaland"; }
	elseif($txtstate ==26){	$state = "Orissa"; }
	elseif($txtstate ==27){	$state = "Pondicherry"; }
	elseif($txtstate ==28){	$state = "Punjab"; }
	elseif($txtstate ==29){	$state = "Rajasthan"; }
	elseif($txtstate ==30){	$state = "Sikkim"; }
	elseif($txtstate ==35){	$state = "Tamil Nadu"; }
	elseif($txtstate ==36){	$state = "Telangana"; }
	elseif($txtstate ==31){ $state = "Tripura"; }
	elseif($txtstate ==33){ $state = "Uttar Pardesh"; }
	elseif($txtstate ==32){ $state = "Uttaranchal"; }
	elseif($txtstate ==34){ $state = "West Bengal"; }
	elseif($txtstate ==19){ $state = "Maharashtra"; }

	if($recipient_txtstate ==1){ 		$recipientstate = "Andhra Pradesh"; } 
	elseif($recipient_txtstate ==2){	$recipientstate = "Arunachal Pradesh"; }
	elseif($recipient_txtstate ==3){	$recipientstate = "Assam"; }
	elseif($recipient_txtstate ==4){	$recipientstate = "Bihar"; }
	elseif($recipient_txtstate ==6){	$recipientstate = "Chhattisgarh"; }
	elseif($recipient_txtstate ==25){	$recipientstate = "Delhi/NCR"; }
	elseif($recipient_txtstate ==9){	$recipientstate = "Goa"; }
	elseif($recipient_txtstate ==10){	$recipientstate = "Gujarat"; }
	elseif($recipient_txtstate ==11){	$recipientstate = "Haryana"; }
	elseif($recipient_txtstate ==12){	$recipientstate = "Himachal Pradesh"; }
	elseif($recipient_txtstate ==13){	$recipientstate = "Jammu &amp Kashmir"; }
	elseif($recipient_txtstate ==14){	$recipientstate = "Jharkhand"; }
	elseif($recipient_txtstate ==15){	$recipientstate = "Karnataka"; }
	elseif($recipient_txtstate ==16){	$recipientstate = "Kerala"; }
	elseif($recipient_txtstate ==18){	$recipientstate = "Madhya Pradesh"; }
	elseif($recipient_txtstate ==20){	$recipientstate = "Manipur"; }
	elseif($recipient_txtstate ==21){	$recipientstate = "Meghalaya"; }
	elseif($recipient_txtstate ==22){	$recipientstate = "Mizoram"; }
	elseif($recipient_txtstate ==23){	$recipientstate = "Nagaland"; }
	elseif($recipient_txtstate ==26){	$recipientstate = "Orissa"; }
	elseif($recipient_txtstate ==27){	$recipientstate = "Pondicherry"; }
	elseif($recipient_txtstate ==28){	$recipientstate = "Punjab"; }
	elseif($recipient_txtstate ==29){	$recipientstate = "Rajasthan"; }
	elseif($recipient_txtstate ==30){	$recipientstate = "Sikkim"; }
	elseif($recipient_txtstate ==35){	$recipientstate = "Tamil Nadu"; }
	elseif($recipient_txtstate ==36){	$recipientstate = "Telangana"; }
	elseif($recipient_txtstate ==31){ 	$recipientstate = "Tripura"; }
	elseif($recipient_txtstate ==33){ 	$recipientstate = "Uttar Pardesh"; }
	elseif($recipient_txtstate ==32){ 	$recipientstate = "Uttaranchal"; }
	elseif($recipient_txtstate ==34){ 	$recipientstate = "West Bengal"; }
	elseif($recipient_txtstate ==19){ 	$recipientstate = "Maharashtra"; }
//////////////// State Name End /////////////////////

//print_r($post_value);
//die;

if(empty($name) || empty($email) || empty($telephone) || empty($company) || empty($delivery_address) || 
	empty($txtstate)  || empty($city) || empty($pincode) || empty($subscription) || 
	empty($delivery_mode)) {
	header("Location: https://master.franchiseindia.com/magazine-subscribe/"); 
    exit;
}

if(!preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/", $email)){
	header("Location: https://master.franchiseindia.com/magazine-subscribe/");   
    exit; 
}

if(!is_numeric($magazinePrice)) {
	header("Location: https://master.franchiseindia.com/magazine-subscribe/"); 
    exit;
}

if(!is_numeric($telephone)) {
	header("Location: https://master.franchiseindia.com/magazine-subscribe/"); 
    exit;
}

if($email == "testing@example.com" || $ip == "185.46.46.85" || $city == "San Francisco" || $telephone == "987-65-4329") {
	header("Location: https://master.franchiseindia.com/magazine-subscribe/thanks.php"); 
	exit;
}

$email_validation = filter_var(strtolower($email), FILTER_VALIDATE_EMAIL);
$mobile_validation = preg_match("#^[56789]\d{9}$#",trim($telephone));	
$magazinePriceTemp = 0;
$magazineTemp = "";



if(!empty($_POST['TFW'])){
	//header("Location: https://master.franchiseindia.com/magazine-subscribe/");
    //exit;
	$magazine = $_POST['TFW'];
	$magazineType = "( TFW )";
	if($magazinePrice < 1200) {
		$magazinePrice = 1200;
	}
	
	if($_POST['delivery_mode'] == "Post"){
		if($_POST['TFW'] == "TFW 1 Year Plan"){
			$magazinePrice = 1200;
		}elseif($_POST['TFW'] == "TFW 2 Year Plan"){
			$magazinePrice = 2300;
		}elseif($_POST['TFW'] == "TFW 3 Year Plan"){
			$magazinePrice = 3400;
		}else{
			$magazine = "TFW 1 Year Plan";
			$magazinePrice = 1200;
			$magazineType = "( TFW )";
		}
	}else{
		if($_POST['TFW'] == "TFW 1 Year Plan"){
			$magazine = "TFW 1 Year Plan By Courier";
			$magazinePrice = 1600;
		}elseif($_POST['TFW'] == "TFW 2 Year Plan"){
			$magazine = "TFW 2 Year Plan By Courier";		
			$magazinePrice = 3100;
		}elseif($_POST['TFW'] == "TFW 3 Year Plan"){
			$magazine = "TFW 3 Year Plan By Courier";		
			$magazinePrice = 4600;
		}else{
			$magazine = "TFW 1 Year Plan By Courier";
			$magazinePrice = 1600;
			$magazineType = "( TFW )";
		}
	}


	if($email_validation != "" && $email != "" && $telephone != ""){ 
		
		 $sql = "INSERT INTO magazine_subscribe (name, email, telephone, company, address, country, state, city, pincode, magazine, magazine_offer, subscription, amount, cid, payment_mode, delivery_mode, payment_status, campaign, order_type, emp_name, submitted_date) 	VALUES ('$name', '$email', '$telephone', '$company', '$delivery_address', '$country', '$state', '$city', '$pincode', '$magazine', '$magazineType', '$subscription', '$magazinePrice', '$ip', '$payment_mode', '$delivery_mode', 'N', '$source', 'Magazine', '$agent', NOW())";
		$rs = mysqli_query($link, $sql);
		$track_id = mysqli_insert_id($link);
	}
	$magazinePriceTemp = $magazinePrice;
	$magazineTemp = $magazine;		
}
if(!empty($_POST['Entrepreneur'])){
	$magazine = $_POST['Entrepreneur'];
	$magazineType = "( Entrepreneur )";
	if($magazinePrice < 3200){
		$magazinePrice = 3200;
	}
	if($_POST['delivery_mode'] == "Post"){
		if($_POST['Entrepreneur'] == "Entrepreneur 1 Year Plan"){
			$magazinePrice = 3200;
		}elseif($_POST['Entrepreneur'] == "Entrepreneur 2 Year Plan"){
			$magazinePrice = 5600;
		}elseif($_POST['Entrepreneur'] == "Entrepreneur 3 Year Plan"){
			$magazinePrice = 7200;
		}else{
			$magazine = "Entrepreneur 1 Year Plan";
			$magazinePrice = 3200;
			$magazineType = "( Entrepreneur )";
		}
	}else{
		if($_POST['Entrepreneur'] == "Entrepreneur 1 Year Plan"){
			$magazine = "Entrepreneur 1 Year Plan By Courier";		
			$magazinePrice = 4000;
		}elseif($_POST['Entrepreneur'] == "Entrepreneur 2 Year Plan"){
			$magazine = "Entrepreneur 2 Year Plan By Courier";		
			$magazinePrice = 7200;
		}elseif($_POST['Entrepreneur'] == "Entrepreneur 3 Year Plan"){
			$magazine = "Entrepreneur 3 Year Plan By Courier";		
			$magazinePrice = 9600;
		}else{
			$magazine = "Entrepreneur 1 Year Plan By Courier";
			$magazinePrice = 4000;
			$magazineType = "( Entrepreneur )";
		}
	}


	if($email_validation != "" && $email != "" && $telephone != ""){ 
	if($track_id < 1){
		$track_id = 0;
	}	
	$sql = "INSERT INTO magazine_subscribe (sub_sub_id, name, email, telephone, company, address, country, state, city, pincode, magazine, magazine_offer, subscription, amount, cid, payment_mode, delivery_mode, payment_status, campaign, order_type, emp_name, submitted_date) 	VALUES ('$track_id', '$name', '$email', '$telephone', '$company', '$delivery_address', '$country', '$state', '$city', '$pincode', '$magazine', '$magazineType', '$subscription', '$magazinePrice', '$ip', '$payment_mode', '$delivery_mode', 'N', '$source', 'Magazine', '$agent', NOW())";
		$rs = mysqli_query($link, $sql);
		if($track_id < 1){
			$track_id = mysqli_insert_id($link);		
		}
	}
	$magazinePriceTemp += $magazinePrice;
	$magazineTemp = $magazineTemp.", ".$magazine;
}
if(!empty($_POST['Retailer'])){
	//header("Location: https://master.franchiseindia.com/magazine-subscribe/");   
   // exit; 
	$magazine = $_POST['Retailer'];
	$magazineType = "( Retailer )";	
	if($magazinePrice < 1500) {
		$magazinePrice = 1500;
	}
	
	if($_POST['delivery_mode'] == "Post"){
		if($_POST['Retailer'] == "Retailer 1 Year Plan"){
			$magazine = "Retailer-6";
			$magazinePrice = 1500;
		}elseif($_POST['Retailer'] == "Retailer 2 Year Plan"){
			$magazine = "Retailer-12";
			$magazinePrice = 3000;
		}elseif($_POST['Retailer'] == "Retailer 3 Year Plan"){
			$magazine = "Retailer-18";
			$magazinePrice = 4400;
		}else{
			$magazine = "Retailer-6";
			$magazinePrice = 1500;
			$magazineType = "( Retailer )";
		}
	}else{
		if($_POST['Retailer'] == "Retailer 1 Year Plan"){
			$magazine = "Retailer-6 By Courier";
			$magazinePrice = 1800;
		}elseif($_POST['Retailer'] == "Retailer 2 Year Plan"){
			$magazine = "Retailer-12 By Courier";		
			$magazinePrice = 3600;
		}elseif($_POST['Retailer'] == "Retailer 3 Year Plan"){
			$magazine = "Retailer-18 By Courier";		
			$magazinePrice = 5300;
		}else{
			$magazine = "Retailer-6 By Courier";
			$magazinePrice = 2100;
			$magazineType = "( Retailer )";
		}
	}
	if($email_validation != "" && $email != "" && $telephone != ""){ 
		if($track_id < 1){
			$track_id = 0;
		}	
		$sql = "INSERT INTO magazine_subscribe (sub_sub_id, name, email, telephone, company, address, country, state, city, pincode, magazine, magazine_offer, subscription, amount, cid, payment_mode, delivery_mode, payment_status, campaign, order_type, emp_name, submitted_date) 	VALUES ('$track_id', '$name', '$email', '$telephone', '$company', '$delivery_address', '$country', '$state', '$city', '$pincode', '$magazine', '$magazineType', '$subscription', '$magazinePrice', '$ip', '$payment_mode', '$delivery_mode', 'N', '$source', 'Magazine', '$agent', NOW())";
		$rs = mysqli_query($link, $sql);
		if($track_id < 1){
			$track_id = mysqli_insert_id($link);		
		}
		
	}	
	$magazinePriceTemp = $magazinePriceTemp + $magazinePrice;
	$magazineTemp = $magazineTemp.", ".$magazine;			
}

if($subscription == "Gifting" && $recipient_name != "" && $recipient_email != "" && $recipient_telephone != ""){
	$sql1 = "INSERT INTO magazine_recipient_subscribe(mgz_id,name,email,telephone,company,delivery,state,city,pincode,submitted_date) 
	VALUES('$track_id', '$recipient_name', '$recipient_email', '$recipient_telephone', '$recipient_company', '$recipient_delivery_address', '$recipientstate', '$recipient_city', '$recipient_pincode',NOW())";
	$rs1 = mysqli_query($link, $sql1);
}

$magazinePrice = $magazinePriceTemp;
$magazine = $magazineTemp;


if($email=='dharmendra@franchiseindia.net'){
		$magazinePrice = 1;
}

if(!empty($txtothercity) && $city == "Other"){
	$city = $txtothercity;
}
if(!empty($recipient_txtothercity) && $recipient_city == "Other"){
	$recipient_city = $recipient_txtothercity;
}
if(!array_key_exists($payment_mode, $Charges)){
	$payment_mode = "OPTCRDC";	
}
$charges = round($magazinePrice * $Charges[$payment_mode]/100);
$magazinePrice = $magazinePrice + $charges;

$queryUpdate = "UPDATE magazine_subscribe SET amountfinal = '".$magazinePrice."', magazine_offer = '".$magazine."' WHERE  sub_id = $track_id";
$result = mysqli_query($link,$queryUpdate);

/*$Subject = 'Magazine Subscription Offer - www.FranchiseIndia.com';
$mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch 
include_once("./includes/Subscribe_mailer.php");
try {
 // $mail->AddAddress('bpreetima@franchiseindia.net');
  if($agent != "" || $source == "Amit"){		
	  $mail->AddCC('aamit@franchiseindia.net');
	}
  $mail->AddBCC('techsupport@franchiseindia.com');
  $mail->SetFrom('no-reply@franchiseindia.com', 'FI Admin');
  $mail->Subject = $Subject;
  $mail->MsgHTML($body); 
  $mail->Send();
  //echo "Step3</br>";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}
*/
if($payment_mode == "Paytm-del"){
	$checkSum = "";
	$paramList = array();
	$ORDER_ID = "MagSubMasterTFWENETRET-".$track_id;
	$CUST_ID = "MagSubMasterTFWENETRET-".$track_id;
	$INDUSTRY_TYPE_ID = PAYTM_INDUSTRY_TYPE_ID;
	$CHANNEL_ID = "WEB";
	$TXN_AMOUNT = $magazinePrice;
	
	// Create an array having all required parameters for creating checksum.
	$paramList["REQUEST_TYPE"] = 'DEFAULT';
	$paramList["MID"] = PAYTM_MERCHANT_MID;
	$paramList["ORDER_ID"] = $ORDER_ID;
	$paramList["CUST_ID"] = $CUST_ID;
	$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
	$paramList["CHANNEL_ID"] = $CHANNEL_ID;
	$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
	$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
	
	$paramList["CALLBACK_URL"] = "https://www.franchiseindia.com/crm-api/magazine-subscribe/GetTFWRegPaytm.php";
	$paramList["MSISDN"] = $telephone; //Mobile number of customer
	$paramList["EMAIL"] = $email; //Email ID of customer
	//$paramList["VERIFIED_BY"] = ""; //
	//$paramList["IS_USER_VERIFIED"] = ""; //
	
	//Here checksum string will return by getChecksumFromArray() function.
	$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
	?>
	<html>
	<head>
	<title>Merchant Check Out Page</title>
	</head>
	<body>
	<center>
	<h1>Please do not refresh this page...</h1>
	</center>
	<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
	<table border="1">
	<tbody>
	<?php
	foreach($paramList as $name => $value) {
		echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
	}
	?>
	<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
	</tbody>
	
	</table>
	<script type="text/javascript">
	document.f1.submit();
	</script>
	</form>
	</body>
	</html>
<?php	
}else{

	$order_id = "order_id=".urlencode("MagSubMasterTFWENETRET-".$track_id);
	$tid = "tid=".urlencode(rand().$track_id);
	$merchant_id = "merchant_id=".urlencode($merchant_key_new);
	$amount = "amount=".urlencode($magazinePrice);
	$currency = "currency=".urlencode("INR");		
	$redirect_url = "redirect_url=".urlencode("https://www.franchiseindia.com/crm-api/magazine-subscribe/GetTFWReg.php");
	$cancel_url = "cancel_url=".urlencode("https://www.franchiseindia.com/crm-api/magazine-subscribe/GetTFWReg.php");
	$language = "language=".urlencode("EN");
	$billing_name = "billing_name=".urlencode($name);
	$billing_address = "billing_address=".urlencode($delivery_address);
	$billing_city= "billing_city=".urlencode($city);
	$billing_state= "billing_state=".urlencode($state);
	$billing_zip= "billing_zip=".urlencode($pincode);
	$billing_country= "billing_country=".urlencode("India");
	$billing_tel= "billing_tel=".urlencode($telephone);
	$billing_email= "billing_email=".urlencode($email);		
	$payment_option = "payment_option=".urlencode($payment_mode);
	$card_type = "card_type=".urlencode(str_replace("OPT","",$payment_mode));			
	
	$merchant_data = $tid."&".$merchant_id."&".$order_id."&".$amount."&".$currency."&".$redirect_url."&".$cancel_url."&".$language."&".$billing_name."&".$billing_address."&".$billing_city."&".$billing_state."&".$billing_zip."&".$billing_country."&".$billing_tel."&".$billing_email."&".$payment_option."&".$card_type;

	$encrypted_data=encrypt($merchant_data,$working_key_new); // Method for encrypting the data.
?>
<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code_new>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
<?php
}


ob_end_flush();
?>