<?php
ob_start();
ini_set("display_errors",1);
include_once("../configpg/configMINew.php");         //Database Connectivity
include_once("../configpg/hdfcpg.config.eimpl.php");     //HDFC settings page
include_once('../configpg/Crypto.php');
//require_once("../configpg/paytm_fi_config.php");
//require_once("../configpg/paytm_fi_encdec.php");
//include_once("../mailer/class.phpmailer.php");
$post_value = array_map(array($link, 'real_escape_string'), $_POST);
@extract($post_value);
$ip = $_SERVER['REMOTE_ADDR'];

/*if(empty($first_name) || empty($last_name) || empty($email) || empty($telephone) || empty($company_address)  || empty($delivery_address) || 
	empty($city) || empty($pincode)) {
	header("Location: https://master.franchiseindia.com/emagazine/"); 
    exit;
}
if(!is_numeric($magazinePrice)) {
	header("Location: https://master.franchiseindia.com/emagazine/"); 
    exit;
}

if($email=='dharmendra@franchiseindia.net'){
		$magazinePrice = 1;
}
*/
$email_validation = filter_var(strtolower($email), FILTER_VALIDATE_EMAIL);
if($email_validation != "" && $email != "" && $telephone != ""){ 

		if($magazineType == "3 MONTHS"){
			$magazine = "SME-3";
			$magazinePrice = 500;
		}elseif($magazineType == "6 MONTHS"){
			$magazine = "SME-6";
			$magazinePrice = 1000;			
		}elseif($magazineType == "1 Year"){
			$magazine = "SME-12";
			$magazinePrice = 3200;				
		}elseif($magazineType == "2 Years"){
			$magazine = "SME-24";
			$magazinePrice = 5600;				
		}elseif($magazineType == "3 Years"){
			$magazine = "SME-36";
			$magazinePrice = 8400;				
		}elseif($magazineType == "Combo"){
			$magazine = "( TFW 1 Year Plan ) ( Entrepreneur 1 Year Plan ) ( Retailer 1 Year Plan )";
			$magazinePrice = 4200;					
		}else{
			$magazineType == "1 Year";
			$magazine = "SME-12";
			$magazinePrice = 3200;				
		}		
		if($txtpromo == "ICICI20"){
			$discount = $magazinePrice * 20/100;
			$magazinePrice = $magazinePrice - $discount;
		}
		if(!array_key_exists($payment_mode, $Charges)){
			$payment_mode = "OPTUPI";	
		}
		$charges = round($magazinePrice * $Charges[$payment_mode]/100);
		$magazinePrice = round($magazinePrice + $charges);

		if(!is_numeric($magazinePrice)) {
			header("Location: https://www.entrepreneurindia.com/entrepreneur-subscription/"); 
			exit;
		}
		
		if(!is_numeric($telephone)) {
			header("Location: https://www.entrepreneurindia.com/entrepreneur-subscription/"); 
			exit;
		}
		if($email == "testing@example.com" || $ip == "185.46.46.85" || $city == "San Francisco" || $telephone == "987-65-4329") {
			header("Location: https://www.entrepreneurindia.com/entrepreneur-subscription/thanks.php"); 
			exit;
		}


		$sql = "INSERT INTO magazine_subscribe (`name`, `email`, `company`, `address`, `country`, `city`, `state`, `pincode`, `telephone`, `magazine`, `magazine_offer`, `comments`, `cid`, `amount`, `payment_mode`, `payment_status`, `pgresponse`, `saltkey`, `order_type`, `campaign`, `submitted_date`) VALUES ('".$title." ".$first_name." ".$last_name."', '".$email."', '".$company_address."', '".$delivery_address."', '".$country."', '".$city."', '".$state."', '".$pincode."', '".$telephone."', '".$magazine."', '".$magazineType."', '".$txtpromo."', '".$ip."', '".$magazinePrice."', '".$payment_mode."', 'N', '', '', '".$order_type."', '".$source."', NOW())";
		
		$rs = mysqli_query($link, $sql);
$track_id = mysqli_insert_id($link);

	/*$sql = "INSERT INTO magazine_campaign_subscribe(sub_id,title,first_name,last_name,email,telephone,company_address,delivery_address,country,city,state,pincode,magazine,magazine_offer,amount,cid,payment_mode,payment_status,campaign,order_type,submitted_date) 
	VALUES('','$title','$first_name','$last_name','$email','$telephone','$company_address','$delivery_address','$country','$city','$state','$pincode','$magazine','$magazineType','$magazinePrice','$ip','$payment_mode','N','$source','$order_type',NOW())";

	$rs = mysqli_query($link, $sql);
	$track_id = mysqli_insert_id($link);*/
	/*$Subject = "Entrepreneur Magazine Subscription Campaign";
	$mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch 
	include_once("./mailertemplates/entrepreneur_subscribe_mailer.php");
	try {
	  //$mail->AddAddress('jrekha@franchiseindia.net');	
		if($source == "Amit"){
			$mail->AddCC('aamit@franchiseindia.net');
		}
	  $mail->AddBCC('techsupport@franchiseindia.com');
	  $mail->SetFrom('no-reply@entrepreneurindia.com', 'EI Admin');
  	  $mail->Subject = $Subject;
	  $mail->MsgHTML($body);
	  $mail->Send();
	  //echo "Step3</br>";
	} catch (phpmailerException $e) {
	  echo $e->errorMessage(); //Pretty error messages from PHPMailer
	} catch (Exception $e) {
	  echo $e->getMessage(); //Boring error messages from anything else!
	}*/


	if($payment_mode == "Paytm"){
		$checkSum = "";
		$paramList = array();
		$ORDER_ID = "MagazineEIWeb-".$track_id;
		$CUST_ID = "MagazineEIWeb-".$track_id;
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
		
		$paramList["CALLBACK_URL"] = "https://www.franchiseindia.com/crm-api/emagazine/StatusTRANPaytm.php";
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
	
		$order_id = "order_id=".urlencode("MagazineEIWeb-".$track_id);
		$tid = "tid=".urlencode(rand().$track_id);
		$merchant_id = "merchant_id=".urlencode($merchant_key_new);
		$amount = "amount=".urlencode($magazinePrice);
		$currency = "currency=".urlencode("INR");		
		$redirect_url = "redirect_url=".urlencode("https://www.franchiseindia.com/crm-api/emagazine/StatusTRAN.php");
		$cancel_url = "cancel_url=".urlencode("https://www.franchiseindia.com/crm-api/emagazine/StatusTRAN.php");
		$language = "language=".urlencode("EN");
		$billing_name = "billing_name=".urlencode($first_name);
		$billing_address = "billing_address=".urlencode($address);
		$billing_city= "billing_city=".urlencode($city);
		$billing_state= "billing_state=".urlencode($state);
		$billing_zip= "billing_zip=".urlencode($txtPincode);
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
}else{
	header("location: ".$_SERVER['HTTP_REFERER']."");
	exit;
}
ob_end_flush();

?>