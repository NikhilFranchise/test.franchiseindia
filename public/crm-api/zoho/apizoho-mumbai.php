<?php
require('ZohoClientClass.php');
include_once("../configpg/configMINew.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Franchise India 2022</title>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
<style type="text/css">
	body{background-color: #f1f1f1!important;}
h2.title{margin-bottom:30px;text-transform: uppercase;}
.mainFrm {
    width: 900px!important;overflow: auto;
    margin: 0 auto!important;
    float: none!important;
    max-width: 78%!important;
    background-color: #ffffff;
    padding: 32px;
}
.login-form{margin: 10px auto 30px auto;
    min-width: 320px;
    max-width: 320px;}
.form-horizontal .control-label{text-align:left!important;}
.btn { border:#283c7c solid 1px!important; color:#283c7c!important; border-radius: 4px; box-shadow: 0 65px 0 transparent inset; font-size: 18px!important; font-weight: 100; line-height: 1; margin: 0 7px; max-width: 100%; min-width: 154px; overflow: hidden; padding: 19px 25px 19px!important; position: relative; text-align: center; text-decoration: none; text-transform: uppercase; transition: color 0.2s ease 0s, border 0.2s ease 0s, background 0.25s ease 0s, box-shadow 0.2s ease 0s; vertical-align: middle; background:transparent;}
.btn, .btn:hover { border:#283c7c solid 1px!important; color:#fff!important; background:#283c7c!important;}
.login-form .form-control {
  background: #f7f7f7 none repeat scroll 0 0;
  border: 1px solid #d4d4d4;
  border-radius: 4px;
  font-size: 14px;
}
.mytable{background-color: transparent;
width: 900px;
max-width: 100%;
margin: auto;}
.mytable td, .mytable th{padding: 12px;}
.mytable .btn{min-width: 187px!important;font-size: 18px!important;}
.main-div {
    background: #ffffff none repeat scroll 0 0;
    border-radius: 2px;
    margin: 10px auto 30px auto;
    min-width: 320px;
    max-width: 320px;
    padding: 7px 20px 18px 21px;
}
.main-div h2.title {
    margin-bottom: 6px;
    font-weight: initial;
    font-size: 23px;
}
.btn{padding: 11px!important;}
.main-div .btn{width: 184px!important;padding: 11px!important;display: block;margin:auto;}
.login-form .form-group {
  margin-bottom:10px;
}
.login-form{ text-align:center;}
.forgot a {
  color: #777777;
  font-size: 14px;
  text-decoration: underline;
}
.login-form  .btn.btn-primary {
  background: #f0ad4e none repeat scroll 0 0;
  border-color: #f0ad4e;
  color: #ffffff;
  font-size: 14px;
  width: 100%;
  padding: 0;
}
.forgot {
  text-align: left; margin-bottom:30px;
}
.botto-text {
  color: #ffffff;
  font-size: 14px;
  margin: auto;
}
.login-form .btn.btn-primary.reset {
  background: #ff9900 none repeat scroll 0 0;
}
.back { text-align: left; margin-top:10px;}
.back a {color: #444444; font-size: 13px;text-decoration: none;}
@media screen and (max-width: 767px){
	.main-div{max-width: 71%;}
	.mainFrm {
    
    margin: 0 auto!important;
    float: none!important;
    max-width:314px!important;overflow: auto;
    background-color: #ffffff;
    padding: 24px 10px;
}
	.mytable {
    background-color: transparent;
    width: 100%;
    max-width: 100%;
    margin: auto;
    overflow: auto;
    font-size: 10px;
}
.mytable td, .mytable th {
    padding: 3px;
    width: 100%;
}
.mytable .btn {
    min-width: 58px!important;
    font-size: 9px!important;
}
.has-feedback{padding: 0px 13px!important;}
tbody{width: 100%;}
.btn {
    padding: 8px!important;
}
}

.verifyotpwrap {
    text-align: center;
    color: #f27777;
    font-size: 14px;
    display: inline-block;
    background: #cc3737;cursor: pointer;
    color: #ffffff;
    padding: 7px 0px;
}
.verifyottxt{
   	text-align : right;
	font-size : 14px;
	display: block;
	cursor: pointer;
}
.ofield{display: flex;}

</style>
<link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<!-- Body Part -->
<div class="bdy-height gry-bg">
    <div class="container">
	


<?php

$MagCode = array(
                "TFW-1-Top100"=>"TFW-1-Top100-PC",
                "(TFW-6)(TFW-1-Top100)"=>"TFW-YS-TOP100-PC",
                "(SME-12)(TFW-1-Top100)"=>"ENT-YS-TOP100-PC",
                "(Retailer 1 Year Plan)(TFW-1-Top100)"=>"RTL-YS-TOP100-PC",
                "(SME-12)(Retailer 1 Year Plan)(TFW-1-Top100)"=>"ENT-RTL-YS-TOP100-PC",					
                "SME-12)(Retailer 1 Year Plan)(TFW-1-Top100)"=>"ENT-RTL-YS-TOP100-PC",									
                "TFW-1"=>"TFW-MS-PC",
                "TFW-2"=>"TFW-MS-PC-2",
                "TFW-3"=>"TFW-MS-PC-3",				
                "( Entrepreneur 1 Year Plan )"=>"ENT-YS-PC",
                "Entrepreneur 1 Year Plan"=>"ENT-YS-PC",
                "( Entrepreneur 1 Year Plan By Courier)"=>"ENT-YS-PC-CR",				
                "Entrepreneur 1 Year Plan By Courier"=>"ENT-YS-PC-CR",				
                "( TFW 1 Year Plan )"=>"TFW-YS-PC",
                "TFW 1 Year"=>"TFW-YS-PC",				
                "TFW 1 Year Plan"=>"TFW-YS-PC",
                "( TFW 2 Year Plan )"=>"TFW-YS-PC-2",
                "TFW 2 Year Plan"=>"TFW-YS-PC-2",
                "( TFW 3 Year Plan )"=>"TFW-YS-PC-3",
                "TFW 3 Year Plan"=>"TFW-YS-PC-3",
                "TFW-YS-PC-CR"=>"TFW-YS-PC-CR",								
                "( TFW 1 Year Plan By Courier)"=>"TFW-YS-PC-CR",				
                "TFW 1 Year Plan By Courier"=>"TFW-YS-PC-CR",				
                "( TFW 2 Year Plan By Courier)"=>"TFW-YS-PC-CR-2",				
                "TFW 2 Year Plan By Courier"=>"TFW-YS-PC-CR-2",				
                "( TFW 3 Year Plan By Courier)"=>"TFW-YS-PC-CR-3",				
                "TFW 3 Year Plan By Courier"=>"TFW-YS-PC-CR-3",				
                "( Entrepreneur 3 Year Plan )"=>"ENT-YS-PC-3",				
                "Entrepreneur 3 Year Plan"=>"ENT-YS-PC-3",				
                "( Entrepreneur 3 Year Plan By Courier)"=>"ENT-YS-PC-CR-3",								
                "Entrepreneur 3 Year Plan By Courier"=>"ENT-YS-PC-CR-3",								
                "( Entrepreneur 2 Year Plan )"=>"ENT-YS-PC-2",								
                "Entrepreneur 2 Year Plan"=>"ENT-YS-PC-2",
                "SME-32"=>"ENT-YS-PC-2",												
                "( Entrepreneur 2 Year Plan By Courier)"=>"ENT-YS-PC-CR-2",												
                "Entrepreneur 2 Year Plan By Courier"=>"ENT-YS-PC-CR-2",												
                "( TFW 1 Year Plan ) ( Entrepreneur 1 Year Plan )"=>"TFW-ENT-YS-PC",
                "( TFW 1 Year Plan ) ( Retailer 1 Year Plan )"=>"TFW-RTL-YS-PC",				
                "( TFW 1 Year Plan ) ( Entrepreneur 1 Year Plan ) By Courier"=>"TFW-ENT-YS-PC-CR",				
                "( TFW 2 Year Plan ) ( Entrepreneur 2 Year Plan )"=>"TFW-ENT-YS-PC-2",				
                "( TFW 2 Year Plan ) ( Entrepreneur 2 Year Plan ) By Courier"=>"TFW-ENT-YS-PC-CR-2",
                "( TFW 3 Year Plan ) ( Entrepreneur 3 Year Plan )"=>"TFW-ENT-YS-PC-3",				
                "( TFW 3 Year Plan ) ( Entrepreneur 3 Year Plan ) By Courier"=>"TFW-ENT-YS-PC-CR-3",								
                "( TFW 1 Year Plan ) ( Entrepreneur 1 Year Plan ) ( Retailer 1 Year Plan )"=>"TFW-RTL-ENT-YS-PC",
                "( TFW 2 Year Plan ) ( Entrepreneur 2 Year Plan ) ( Retailer 2 Year Plan )"=>"TFW-RTL-ENT-YS-PC-2",
                "( TFW 3 Year Plan ) ( Entrepreneur 3 Year Plan ) ( Retailer 3 Year Plan )"=>"TFW-RTL-ENT-YS-PC-3",
                "( TFW 1 Year Plan By Courier ) ( Entrepreneur 1 Year Plan By Courier ) ( Retailer 1 Year Plan By Courier )"=>"TFW-RTL-ENT-YS-PC-CR",
                "( TFW 2 Year Plan By Courier ) ( Entrepreneur 2 Year Plan By Courier ) ( Retailer 2 Year Plan By Courier )"=>"TFW-RTL-ENT-YS-PC-CR-2",				
                "( TFW 3 Year Plan By Courier ) ( Entrepreneur 3 Year Plan By Courier ) ( Retailer 3 Year Plan By Courier )"=>"TFW-RTL-ENT-YS-PC-CR-3",
                "( Entrepreneur 1 Year Plan ) ( Retailer 1 Year Plan )"=>"ENT-RTL-YS-PC",
                "( TFW 3 Year Plan ) ( Retailer 3 Year Plan )"=>"TFW-RTL-YS-PC-3",		
                "( TFW 2 Year Plan ) ( Retailer 2 Year Plan )"=>"TFW-RTL-YS-PC-2",						
                "( Entrepreneur 2 Year Plan ) ( Retailer 2 Year Plan )"=>"ENT-RTL-YS-PC-2",	
                "( Entrepreneur 3 Year Plan ) ( Retailer 3 Year Plan )"=>"ENT-RTL-YS-PC-3",					
                "( Retailer 1 Year Plan )"=>"RTL-YS-PC",				
                "Retailer 1 Year Plan"=>"RTL-YS-PC",				
                "( Retailer 1 Year Plan By Courier )"=>"RTL-YS-PC-CR",								
                "Retailer 1 Year Plan By Courier"=>"RTL-YS-PC-CR",								
                "Retailer 2 Year Plan By Courier"=>"RTL-YS-PC-CR-2",								
                "Retailer 3 Year Plan By Courier"=>"RTL-YS-PC-CR-3",								
                "( Retailer 2 Year Plan )"=>"RTL-YS-PC-2",				
                "Retailer 2 Year Plan"=>"RTL-YS-PC-2",				
                "Retailer 3 Year Plan"=>"RTL-YS-PC-3",				
                "SME-1"=>"ENT-MS-PC",
                "SME-12"=>"ENT-YS-PC",
                "(SME-12)"=>"ENT-YS-PC",				
                "SME-24"=>"ENT-YS-PC-2",				
                "Retailer-4 By Courier"=>"RTL-YS-PC-CR",
                "Retailer-6 By Courier"=>"RTL-YS-PC-CR",								
                "Retailer-4"=>"RTL-YS-PC",								
                "Retailer-6"=>"RTL-YS-PC",
                "Retailer-8"=>"RTL-YS-PC-2",
                "Retailer-8 By Courier"=>"RTL-YS-PC-CR-2",													
                "Retailer-12"=>"RTL-YS-PC-2",							
                "Retailer-12 By Courier"=>"RTL-YS-PC-CR-2",													
                "Retailer-18"=>"RTL-YS-PC-3",							
                "Retailer-18 By Courier"=>"RTL-YS-PC-CR-3",													
                "TFW-24"=>"TFW-YS-PC-2",
                "SME-12 By Courier"=>"ENT-YS-PC-CR",
                "SME-4"=>"ENT-MS-PC",
                "SME-3"=>"ENT-MS-PC",
                "SME-6"=>"ENT-HYS-PC",				
                "TFW-1 Digital Copy" =>"TFW-MS-DC",
                "TFW-12"=>"TFW-YS-PC",
                "TFW-36"=>"TFW-YS-PC-3",
                "SME-36"=>"ENT-YS-PC-3",				
                "TFW-12 By Courier" =>"TFW-YS-PC-CR",
                "TFW-4" =>"TFW-YS-PC",	
                "TFW-4 By Courier" =>"TFW-YS-PC-CR",				
                "TFW-8" =>"TFW-YS-PC-2",	
                "TFW-8 By Courier" =>"TFW-YS-PC-CR-2",				
                "TFW-12 By Courier Retailer-4 By Courier" =>"TFW-RTL-YS-PC-CR",
                "TFW-12 Digital Copy" =>"TFW-YS-DC",
                "TFW-24 Digital Copy" =>"TFW-YS-DC-2",				
                "TFW-36 Digital Copy" =>"TFW-YS-DC-3",								
                "TFW-HYS-PC-CR" =>"TFW-HYS-PC-CR",
                "TFW-HYS-PC" =>"TFW-HYS-PC",					
                "ENT-HYS-PC-CR" =>"ENT-HYS-PC",
                "ENT-YS-PC-CR" =>"ENT-YS-PC-CR",					
                "MH-YS-PC" =>"MH-YS-PC",				
                "MH-YS-PC-2" =>"MH-YS-PC-2",
                "MH-YS-PC-3" =>"MH-YS-PC-3",				
                "MH-YS-DC" =>"MH-YS-DC",				
                "MH-YS-DC-2" =>"MH-YS-DC-2",				
                "MH-YS-DC-3" =>"MH-YS-DC-3",				
                "MH-YS-PDC" =>"MH-YS-PDC",				
                "MH-YS-PDC-2" =>"MH-YS-PDC-2",				
                "MH-YS-PDC-3" =>"MH-YS-PDC-3",				
                "MH-MS-PC" =>"MH-MS-PC",					
                "TFW-YS-DC" =>"TFW-YS-DC",																																
                "TFW-HYS-DC" =>"TFW-HYS-DC",																																
                "TFW-MS-DC-3" =>"TFW-MS-DC-3",																																								
                "SME-12 Digital Copy" =>"ENT-YS-DC",				
                "SME-24 Digital Copy" =>"ENT-YS-DC-2",				
                "SME-36 Digital Copy" =>"ENT-YS-DC-3",	
                "SME-24 By Courier"=>"ENT-YS-PC-CR-2",																							
                "SME-36 By Courier"=>"ENT-YS-PC-CR-3",																											
                "TFW-1 Print + Digital Copy"=>"TFW-MS-PDC",
                "TFW-12 Print + Digital Copy"=>"TFW-YS-PDC",	
                "TFW-24 Print + Digital Copy"=>"TFW-YS-PDC-2",					
                "SME-12 Print + Digital Copy"=>"ENT-YS-PDC",					
                "SME-12 Print + Digital Copy By Courier"=>"ENT-YS-PC-CR-2",								
                "TFW-12 Print + Digital Copy By Courier"=>"TFW-YS-PC-CR-2",								
                "TFW-36 Print + Digital Copy By Courier"=>"TFW-YS-PC-CR-3",	
                "SME-36 Print + Digital Copy By Courier"=>"ENT-YS-PC-CR-3",
				"The Science of Reproducing Success"=>"TSRS"																
            );

      $zohoClient = new ZohoClientClass;
      $urlCreateSubscription  = "https://subscriptions.zoho.com/api/v1/subscriptions";
      $from = 0;
      $perPage = 100;
	  
//$qry = "SELECT `instaID`, `pid`, `reg_type`, `name`, `email`, phone, visitors, amount, city, company, address, state, city, pincode FROM fievent_insta_reg_10August2023 WHERE `event_year` LIKE '%Delhi July 2023%' AND (`payment_status` = 'Y' OR reg_type = 'Visit the Expo - Paid Ticket') AND amount > 1 AND amount < 10000 AND reg_type != 'Attend Registration - Magazine' GROUP BY email ORDER BY amount DESC LIMIT 3850, 50";

// done 619

//$qry = "SELECT * FROM `fievent_insta_reg` WHERE `instaID` > 1";
$qry = "SELECT * FROM `fievent_insta_reg` WHERE `instaID` > 88 and `instaID` < 91"; 

//$qry = "SELECT `instaID`, `pid`, `reg_type`, `name`, `email`, phone, visitors, amount, company, address, state, city, pincode FROM `fievent_insta_reg` WHERE `payment_status` = 'Y' AND `amount` > 1 AND (`visit_type` IS NULL OR `visit_type` LIKE '%both%') ORDER BY `instaID` ASC LIMIT 619, 0"; 

//$qry = "SELECT `instaID`, `pid`, `reg_type`, `name`, `email`, phone, visitors, amount, city, company, address, state, city, pincode FROM `fievent_insta_reg` WHERE `payment_status` = 'Y' AND `amount` > 1 AND (`visit_type` IS NULL OR `visit_type` LIKE '%both%') AND `instaID` = 5801"; 

	  
//$qry = "SELECT `instaID`, `pid`, `reg_type`, `name`, `email`, phone, visitors, amount, city, pincode, company, address, state, city, pincode FROM fievent_insta_reg_10August2023 WHERE `event_year` LIKE '%Delhi July 2023%' AND (`payment_status` = 'Y' OR reg_type = 'Visit the Expo - Paid Ticket') AND amount > 1 AND amount < 10000 AND reg_type != 'Attend Registration - Magazine' GROUP BY email ORDER BY amount DESC LIMIT 50"; 
	  
//$qry = "SELECT `instaID`, `pid`, `reg_type`, `name`, `email`, phone, visitors, amount, city, pincode FROM fievent_insta_reg_10August2023 WHERE `event_year` LIKE '%Delhi July 2023%' AND (`payment_status` = 'Y' OR reg_type = 'Visit the Expo - Paid Ticket') AND amount > 0 AND amount < 10000 AND reg_type != 'Attend Registration - Magazine'"; 

//$qry = "SELECT `instaID`, `pid`, `reg_type`, `name`, `email`, phone, visitors, amount, city, pincode, company, address, state, city, pincode FROM fievent_insta_reg_10August2023 WHERE `event_year` LIKE '%Delhi July 2023%' AND (`payment_status` = 'Y' OR reg_type = 'Visit the Expo - Paid Ticket') AND amount > 1 AND amount < 10000 AND reg_type != 'Attend Registration - Magazine' AND email = 'wildfilmsrk@gmail.com' GROUP BY email ORDER BY amount DESC"; 

//$qry = "SELECT `email`, COUNT(email) as total, phone FROM fievent_insta_reg_10August2023 WHERE `event_year` LIKE '%Delhi July 2023%' AND (`payment_status` = 'Y' OR reg_type = 'Visit the Expo - Paid Ticket') AND amount > 1 AND amount < 10000 AND reg_type != 'Attend Registration - Magazine' GROUP BY email HAVING COUNT(email) > 1 ORDER BY total DESC"; 


//Single Issue
//$qry = "SELECT `instaID`, `pid`, `reg_type`, `name`, `email`, phone, visitors, amount, city, pincode FROM fievent_insta_reg_10August2023 WHERE `event_year` LIKE '%Delhi July 2023%' AND (`payment_status` = 'Y' OR reg_type = 'Visit the Expo - Paid Ticket') AND amount > 600 AND amount < 1000 AND visitors = 1 AND reg_type != 'Attend Registration - Magazine'"; 

//Double Issue
//$qry = "SELECT `instaID`, `pid`, `reg_type`, `name`, `email`, phone, visitors, amount, city, pincode FROM fievent_insta_reg_10August2023 WHERE `event_year` LIKE '%Delhi July 2023%' AND (`payment_status` = 'Y' OR reg_type = 'Visit the Expo - Paid Ticket') AND amount > 1000 AND amount < 1510 AND visitors = 1 AND reg_type != 'Attend Registration - Magazine'"; 

//Three Issue
//$qry = "SELECT `instaID`, `pid`, `reg_type`, `name`, `email`, phone, visitors, amount, city, pincode FROM fievent_insta_reg_10August2023 WHERE `event_year` LIKE '%Delhi July 2023%' AND (`payment_status` = 'Y' OR reg_type = 'Visit the Expo - Paid Ticket') AND amount > 1500 AND amount < 2010 AND visitors = 1 AND reg_type != 'Attend Registration - Magazine'"; 

$sql1 = mysqli_query($link,$qry);
if(mysqli_num_rows($sql1) > 0){
?>
<table border="1" class="mytable">
<tr>
<td colspan="5" align="center"><strong>Details Found</strong></td>
</tr>
<tr>
<td width="10%"><strong>SR No</strong></td>
<td width="10%"><strong>ID</strong></td>
<td width="10%"><strong>email</strong></td>
<td width="20%"><strong>Name</strong></td>
<td width="20%"><strong>Phone</strong></td>
<td width="20%"><strong>Visitors</strong></td>
<td width="20%"><strong>Amount</strong></td>
</tr>


<?php
	$i = 1;
	while($resArr = mysqli_fetch_array($sql1)){ // print_r($resArr); exit;
		$txnid = base64_encode($resArr['instaID']);
		
		
		if($resArr['package'] == "Entreprenuer" ) {
			$quantity = "SME-12";
		}elseif($resArr['package'] == "Retailer" ) {
			$quantity = "Retailer 1 Year Plan";
		}else{
			$quantity = "TFW-12";
		}		
		
		

    // api for check customer using email id
        $url        = "https://subscriptions.zoho.com/api/v1/customers?email=".trim($resArr['email']);
        $customer   = $zohoClient->get($url);
        $customerID = json_decode($customer, TRUE);
   // if customer not in zoho crm create new customer // 
    if(empty($customerID['customers'])){
		   $submitted_date = explode(" ","2024-03-18 15:01:01");
           $key = $MagCode[trim($quantity)];
           // if mag code found in array
            if(!empty($key)){
                    $dataSubscriptions = array(
                        "customer" => array(
                            "display_name"  =>$resArr['name'],
                            "salutation"    =>"",
                            "first_name"    =>$resArr['name'],
                            "last_name"     =>"",
                            "email"         =>trim($resArr['email']),
                            "company_name"  =>$resArr['company'],
                            "mobile"        =>$resArr['phone'],
                        "billing_address" => array(
                            "street"  =>$resArr['address'],
                            "city"    =>$resArr['city'],
                            "state"   =>$resArr['state'],
                            "country" =>"India",
                            "zip"     =>$resArr['pincode'],
                            "fax"     =>""
                        ),
                        "shipping_address" => array(
                            "street"  =>$resArr['address'],
                            "city"    =>$resArr['city'],
                            "state"   =>$resArr['state'],
                            "country" =>"India",
                            "zip"     =>$resArr['pincode'],
                            "fax"       =>  ""
                           )
                        ),
                    "auto_collect"=>false,
                    "gst_treatment"=>"consumer",
                    "is_taxable"=>false,
                    "starts_at" => $submitted_date[0],
                    "plan"=>array(
                            "plan_code" =>$key,
                            "plan_description"=>$quantity,
                            "price"           =>0,
                            "quantity" =>'1'
                       ),
                    "create_backdated_invoice"=> true, 
                  );

                  $data    = json_encode($dataSubscriptions);
				           
				//	print_r($data);
				//	print_r($zohoClient); exit;
                  $message = $zohoClient->post($urlCreateSubscription, $data);
				  //print_r($message); exit;
				 // echo $message."Ritu";
					//print_r($message);
					//echo "hi";
                  $message = json_decode($message, TRUE);
                 if(!empty($message)){                       
                      // create payment
                         $urlpaymentCreate = "https://subscriptions.zoho.com/api/v1/payments";
                         $paymentSubscriptions = array(
                              "customer_id"=>$message['subscription']['customer']['customer_id'],
                              "amount"=>$message['subscription']['amount'],
                              "invoices" => array(array(
                                  "invoice_id"    =>$message['subscription']['child_invoice_id'],
                                  "amount_applied"=>$message['subscription']['amount']
                              ))
                          );
                          $paymentdata   = json_encode($paymentSubscriptions);  
                          $paymentmesage = $zohoClient->post($urlpaymentCreate, $paymentdata);                         

                  echo $message['message'].'cust-id'.$message['subscription']['customer']['customer_id'].'invo-id'.$message['subscription']['child_invoice_id'].'amount'.$message['subscription']['amount'];        
                  echo '<br/>';
				  // end payment   
                   }else{
                        echo "<br><strong>some problem in Subscriptions data1</strong><br>";
                   }
                }else{
			       //      $mag_code = explode("*", $fetch_details[$i]['magazine']);
				   //      for($j = 0; $j < count($mag_code); $j++){
                  //Mukesh
							$submitted_date = explode(" ","2024-03-18 15:01:01");
				            //$product_id     = array_search(substr($mag_code[$j],0,1), $ProdCode);
					        $plan_code      = $MagCode[trim($quantity)];
                   
            				$dataSubscriptions = array(
                                "customer" => array(
                                   "display_name"  =>$resArr['name'],
                                   "salutation"    =>"",
                                   "first_name"    =>$resArr['name'],
                                   "last_name"     =>"",
                                   "email"         =>trim($resArr['email']),
                                   "company_name"  =>$resArr['company'],
                                   "mobile"        =>$resArr['phone'],
                                   "billing_address" => array(
                                       "street"  =>$resArr['address'],
                                       "city"    =>$resArr['city'],
                                       "state"   =>$resArr['state'],
                                       "country" =>'India',
                                       "zip"     =>$resArr['pincode'],
                                       "fax"     =>""
                                   ),
                                   "shipping_address" => array(
                                       "street"    => $resArr['address'],
                                       "city"      => $resArr['city'],
                                       "state"     => $resArr['state'],
                                       "country"   => 'India',
                                       "zip"       => $resArr['pincode'],
                                       "fax"       =>  ""
                                   )
                               ),
                                    "auto_collect"=>false,
                                    "gst_treatment"=>"consumer",
                                    "is_taxable"=>false,
                                    "starts_at" =>$submitted_date[0],
                                    "plan" => array(
                                       "plan_code" => $plan_code,
                                       "plan_description" =>  $quantity,
                                       "price" => 0,
                                       "quantity" => '1'
                                ),
                              "create_backdated_invoice"=> true,      
                            );
			        echo $data    = json_encode($dataSubscriptions);
				      echo "<br><br>* New<br><br>";
              $message = $zohoClient->post($urlCreateSubscription, $data);
              $message = json_decode($message, TRUE);
            if(!empty($message)){

                        $urlpaymentCreate = "https://subscriptions.zoho.com/api/v1/payments";

                        $paymentSubscriptions = array(
                              "customer_id"=>$message['subscription']['customer']['customer_id'],
                              "amount"=>$message['subscription']['amount'],
                              "invoices" => array(array(
                                  "invoice_id"    =>$message['subscription']['child_invoice_id'],
                                  "amount_applied"=>$message['subscription']['amount']
                              ))
                          );
                          $paymentdata   = json_encode($paymentSubscriptions);  
                          $paymentmesage = $zohoClient->post($urlpaymentCreate, $paymentdata);

                     echo $message['message'].'cust-id'.$message['subscription']['customer']['customer_id'].'invo-id'.$message['subscription']['child_invoice_id'].'amount'.$message['subscription']['amount'];        
                  echo '<br/>';
				  // end payment               
          
  
               }else{
                        echo "<br><strong>some problem in Subscriptions data2</strong><br>";
               }					
	    	//  }
	    }
       // if customer in zoho crm create Subscriptions // 
    }else if(!empty($customerID['customers']) && $customerID['customers'][0]['customer_id']!=''){
		    $key = $MagCode[trim($quantity)];
        $submitted_date = explode(" ","2024-03-18 15:01:01");

        if(!empty($key)){
                $dataSubscriptions = array(
                    "customer_id" =>$customerID['customers'][0]['customer_id'],
                    "auto_collect"=>false,
                    "starts_at" =>$submitted_date[0],
                    "plan" => array(
                        "plan_code"=>$key,
                        "plan_description"=>$quantity,
                        "price"=>0,
                        "quantity"=> '1'
                    ),
                     "create_backdated_invoice"=> true, 
                );
              echo $data  = json_encode($dataSubscriptions);
				      echo "<br><br>Already<br><br>";
              $message    = $zohoClient->post($urlCreateSubscription, $data);
              $message    = json_decode($message, TRUE);
                if(!empty($message)){  
                   
                       // create payment
                        $urlpaymentCreate = "https://subscriptions.zoho.com/api/v1/payments";
                        $paymentSubscriptions = array(
                              "customer_id"=>$message['subscription']['customer']['customer_id'],
                              "amount"=>$message['subscription']['amount'],
                              "invoices" => array(array(
                                  "invoice_id"    =>$message['subscription']['child_invoice_id'],
                                  "amount_applied"=>$message['subscription']['amount']
                              ))
                          );
                          $paymentdata   = json_encode($paymentSubscriptions);  
                          $paymentmesage = $zohoClient->post($urlpaymentCreate, $paymentdata);

                   echo $message['message'].'cust-id'.$subDatafinal['subscription']['customer']['customer_id'].'invo-id'.$subDatafinal['subscription']['child_invoice_id'].'amount'.$message['subscription']['amount']; ;        
echo '<br/>';                 
				 // end payment    

                }else{
                    echo "some problem in Subscriptions data3";
                }
        }else{

	   //  $mag_code = explode("*", $fetch_details[$i]['magazine']);
    	//	for($j = 0; $j < count($mag_code); $j++){

         $submitted_date = explode(" ","2024-03-18 15:01:01");
			 //  $product_id     = array_search(substr($mag_code[$j],0,1), $ProdCode);
			   $plan_code      = $MagCode[trim($quantity)];
			  			
				$dataSubscriptions = array(
                    "customer_id" =>$customerID['customers'][0]['customer_id'],
                    "auto_collect"=>false,
                    "starts_at" =>$submitted_date[0],
                    "plan" => array(
                        "plan_code"=>$plan_code,
                        "plan_description"=>$quantity,
                        "price"=>0,
                        "quantity"=> '1'
                    ),
                   "create_backdated_invoice"=> true,   
                );
              echo $data  = json_encode($dataSubscriptions);
				      echo "<br><br>Already<br><br>";
              $message    = $zohoClient->post($urlCreateSubscription, $data);
              $message    = json_decode($message, TRUE);
              if(!empty($message)){
                    
                      // create payment 
                        $urlpaymentCreate = "https://subscriptions.zoho.com/api/v1/payments";
                        $paymentSubscriptions = array(
                              "customer_id"=>$message['subscription']['customer']['customer_id'],
                              "amount"=>$message['subscription']['amount'],
                              "invoices" => array(array(
                                  "invoice_id"    =>$message['subscription']['child_invoice_id'],
                                  "amount_applied"=>$message['subscription']['amount']
                              ))
                          );
                          $paymentdata   = json_encode($paymentSubscriptions);  
                          $paymentmesage = $zohoClient->post($urlpaymentCreate, $paymentdata);

                echo  $message['message'].'cust-id'.$message['subscription']['customer']['customer_id'].'invo-id'.$message['subscription']['child_invoice_id'].'amount'.$message['subscription']['amount'];       
                  echo '<br/>';
				  // end payment               

                }else{
                    echo "some problem in Subscriptions data";
                }
				     echo "<br><br>* Already<br><br>";			  
	    	//  }
		     }
       }
    		
		
		
		
		
		
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $resArr['instaID']; ?></td>
<td><?php echo $resArr['email']; ?></td>
<td><?php echo $resArr['name']; ?></td>
<td><?php echo $resArr['phone']; ?></td>
<td><?php echo $resArr['visitors']; ?></td>
<td><?php echo $resArr['amount']; ?></td>
</tr>
<?php
/*
		$qry1 = "SELECT `instaID`, `pid`, `reg_type`, `name`, `email`, phone, visitors, amount, visit_status, velast_email, `saltkey` FROM fievent_insta_reg_10August2023 WHERE `event_year` LIKE '%Delhi July 2023%' AND `payment_status` = 'Y' AND pid = '".$resArr['instaID']."' ORDER BY instaID ";
		$sql11 = mysqli_query($link,$qry1);
		if(mysqli_num_rows($sql11) > 0){
			while($resArr1 = mysqli_fetch_array($sql11)){*/
?>
<!--<tr>
<td><?php //echo $i; ?></td>
<td><?php //echo $resArr1['instaID'].' - '.$resArr1['pid']; ?></td>
<td><?php //echo $resArr1['name']; ?></td>
<td><?php //echo $resArr1['phone']; ?></td>
<td><?php //echo $resArr1['visitors']; ?></td>
<td><?php //echo $resArr1['amount']; ?></td>
</tr>-->
<?php			
/*			}
		
		}*/
		$i++;
	}
?>
</table>
<?php
}
?>	
			</div>
        </div>
	</div>
</div>


<div></div>
</body>
</html>