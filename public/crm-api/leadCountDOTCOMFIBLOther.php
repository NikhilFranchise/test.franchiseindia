<?php
$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibm';
if (!isset($_GET['__token']) || $_GET['__token'] != $token) {
echo 'You are not authorized to perform this action';
exit;
}
include("configpg/configMINew.php");
date_default_timezone_set("Asia/Calcutta");
$date = date("Y-m-d H:i:s", strtotime("-1 hour"));

$Selectquery6 = "SELECT name, address, email, phone, city, state, pincode, franchisor_id, create_date FROM `express_fran_insta_apply` WHERE `franchisor_id` IN ('FIHL657183', 'FIHL370754', 'FIHL399560', 'FIHL179752', 'FIHL124066', 'FIHL229427', 'FIHL710963', 'FIHL661851', 'FIHL641252', 'FIHL543253', 'FIHL465803', 'FIHL527614', 'FIHL608054', 'FIHL469835', 'FIHL433998', 'FIHL258528') AND `create_date` >= '".$date."'";
$arra = array('FIHL657183' => 'RED SchoolHouse', 'FIHL370754' => 'Business Kids', 'FIHL399560' => 'Bricks 4 Kidz', 'FIHL179752' => 'Croma', 'FIHL124066' => 'Relaxo Footwears', 'FIHL229427' => 'Fiona Diamonds', 'FIHL710963' => 'AGEOLOGY CLINIC', 'FIHL661851' => 'Tress Lounge Academy', 'FIHL641252' => 'Easy Build', 'FIHL543253' => 'KIRTILAL KALIDAS JEWELLERS', 'FIHL465803' => 'Farah Khan Fine Jewellery', 'FIHL527614' => 'Palmonas', 'FIHL608054' => 'Bay Window', 'FIHL469835' => 'Stree Cinema', 'FIHL258528' => 'The Burger Comnpany', 'FIHL433998' => 'Carlton London');

$Selectresult6 = mysqli_query($link,$Selectquery6);
$SelectCount6 = mysqli_num_rows($Selectresult6);
if($SelectCount6 > 0){
	$body6='<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>FI Expo Leads</title>
	</head>
	<style type="text/css">
	.brdr{border:#999 solid 1px; font-family: Verdana, Geneva, sans-serif; font-size: 12px;color: #333;}
	</style>
	<body><table width="60%" border="1" cellpadding="2" cellspacing="0">';
	$i = 1;
	while($Srow6 = mysqli_fetch_assoc($Selectresult6)) {
		$body6 .= "<tr class='brdr'><td>Brand Name : ".$arra[$Srow6['franchisor_id']]."</td></tr><tr class='brdr'><td>Name : ".$Srow6['name']."</td></tr><tr class='brdr'><td>Email : ".$Srow6['email']."</td></tr><tr class='brdr'><td>Phone : ".$Srow6['phone']."</td></tr><tr class='brdr'><td>Address : ".$Srow6['address']."</td></tr><tr class='brdr'><td>State : ".$Srow6['state']."</td></tr><tr class='brdr'><td>City : ".$Srow6['city']."</td></tr><tr class='brdr'><td>Pincode : ".$Srow6['pincode']."</td></tr><tr class='brdr'><td>Date : ".$Srow6['create_date']."</td></tr><tr bgcolor='#333333'><td></td></tr>";
		$i++;
	}
	$body6 .= '</table>';
	echo $body6;
}else{
	echo "No";
}

?>