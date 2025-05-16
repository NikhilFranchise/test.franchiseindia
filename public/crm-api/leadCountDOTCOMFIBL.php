<?php
$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibm';
if (!isset($_GET['__token']) || $_GET['__token'] != $token) {
echo 'You are not authorized to perform this action';
exit;
}
include("configpg/configMINew.php");
date_default_timezone_set("Asia/Calcutta");
$date = date("Y-m-d", strtotime("-1 day"));

$Selectquery6 = "SELECT name, address, email, phone, city, state, pincode, franchisor_id, create_date FROM `express_fran_insta_apply` WHERE `franchisor_id` IN ('FIHL557776', 'FIHL864231', 'FIHL119355', 'FIHL632473', 'FIHL403634') AND `create_date` >= '".$date."'";
$arra = array('FIHL557776' => 'Figaros Pizza', 'FIHL864231' => 'Barcelos: Flamed Grilled Chicken', 'FIHL119355' => 'CARZSPA', 'FIHL632473' => 'Trip Factory', 'FIHL403634' => '90 Degree');

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
}

//$arra = array('FIHL657183' => 'Red SchoolHouse', 'FIHL399560' => 'Bricks 4 Kidz', 'FIHL456831' => 'BusinessKids');

/*$Selectquery7 = "SELECT name, address, email, phone, city, state, pincode, create_date FROM `express_fran_insta_apply` WHERE `franchisor_id` = 'FIHL479154' AND `create_date` >= '".$date."'";

//$Selectquery7 = "SELECT name, address, email, phone, city, state, pincode, create_date FROM `express_fran_insta_apply` WHERE `franchisor_id` = 'FIHL479154'";

$Selectresult7 = mysqli_query($link,$Selectquery7);
$SelectCount7 = mysqli_num_rows($Selectresult7);
if($SelectCount7 > 0){
	$body7='<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>FI Expo Leads</title>
	</head>
	<style type="text/css">
	.brdr{border:#999 solid 1px; font-family: Verdana, Geneva, sans-serif; font-size: 12px;color: #333;}
	</style>
	<body><table width="40%" border="1" cellpadding="2" cellspacing="0">';
	$i = 1;
	while($Srow7 = mysqli_fetch_assoc($Selectresult7)) {
		$body7 .= "<tr class='brdr'><td>Name : ".$Srow7['name']."</td></tr><tr class='brdr'><td>Email : ".$Srow7['email']."</td></tr><tr class='brdr'><td>Phone : ".$Srow7['phone']."</td></tr><tr class='brdr'><td>Address : ".$Srow7['address']."</td></tr><tr class='brdr'><td>State : ".$Srow7['state']."</td></tr><tr class='brdr'><td>City : ".$Srow7['city']."</td></tr><tr class='brdr'><td>Pincode : ".$Srow7['pincode']."</td></tr><tr class='brdr'><td>Date : ".$Srow7['create_date']."</td></tr><tr bgcolor='#333333'><td></td></tr>";
		$i++;
	}
	$body7 .= '</table>';
	echo $body7;
}
*/
?>