<?php
$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibm';
if (!isset($_GET['__token']) || $_GET['__token'] != $token) {
echo 'You are not authorized to perform this action';
exit;
}
include("configpg/configMINew.php");
date_default_timezone_set("Asia/Calcutta");
//echo $yesterday_date = date("Y-m-d h:i:sa", strtotime("-1 day"));
$yesterday_date = date("Y-m-d", strtotime("-1 day"));
$Selectquery8 = "SELECT COUNT(DISTINCT `email`) as total, `visibility` FROM `express_fran_insta_apply` WHERE `create_date` LIKE '".$yesterday_date."%' GROUP BY `visibility`";

$Selectresult8 = mysqli_query($link,$Selectquery8);
$SelectCount8 = mysqli_num_rows($Selectresult8);
if($SelectCount8 > 0){
	$body8='<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Insta Apply Leads</title>
	</head>
	<style type="text/css">
	.brdr{border:#999 solid 1px; font-family: Verdana, Geneva, sans-serif; font-size: 12px;color: #333;}
	</style>
	<body>';
	$body8 .= '<table width="100%" border="1" cellpadding="2" cellspacing="0">
	<tr bgcolor="#CCCCCC"><td colspan="3" align="center" class="brdr"><strong>'.$yesterday_date.' Insta Apply Leads</strong></td></tr>
	<tr bgcolor="#CCCCCC">
	<td width="50%" class="brdr"><strong>Total</strong></td>
	<td width="50%" class="brdr"><strong>visibility</strong></td>
	</tr>';
	$i = 1;
	while($Srow8 = mysqli_fetch_assoc($Selectresult8)) {
		if($Srow8['visibility'] == 0){
			$visibility = 'UnPaid Brands Leads';
		}elseif($Srow8['visibility'] == 1){
			$visibility = 'Paid Brands Leads';	
		}
		$body8 .= "<tr class='brdr'><td>".$Srow8['total']."</td><td>".$visibility."</td></tr>";
		$i++;
	}
	$body8 .= '</table><p>&nbsp;</p>';
	echo $body8;
}

$Selectquery9 = "SELECT COUNT(DISTINCT `email`) as total, `visibility` FROM `useractivity` WHERE `visit_date` LIKE '".$yesterday_date."%' GROUP BY `visibility`";

$Selectresult9 = mysqli_query($link,$Selectquery9);
$SelectCount9 = mysqli_num_rows($Selectresult9);
if($SelectCount9 > 0){
	$body9='<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Insta Apply Leads</title>
	</head>
	<style type="text/css">
	.brdr{border:#999 solid 1px; font-family: Verdana, Geneva, sans-serif; font-size: 12px;color: #333;}
	</style>
	<body>';
	$body9 .= '<table width="100%" border="1" cellpadding="2" cellspacing="0">
	<tr bgcolor="#CCCCCC"><td colspan="3" align="center" class="brdr"><strong>'.$yesterday_date.' Expression of Interest Leads</strong></td></tr>
	<tr bgcolor="#CCCCCC">
	<td width="50%" class="brdr"><strong>Total</strong></td>
	<td width="50%" class="brdr"><strong>visibility</strong></td>
	</tr>';
	$i = 1;
	while($Srow9 = mysqli_fetch_assoc($Selectresult9)) {
		if($Srow9['visibility'] == 0){
			$visibility = 'UnPaid Brands Leads';
		}elseif($Srow9['visibility'] == 1){
			$visibility = 'Paid Brands Leads';	
		}
		$body9 .= "<tr class='brdr'><td>".$Srow9['total']."</td><td>".$visibility."</td></tr>";
		$i++;
	}
	$body9 .= '</table><p>&nbsp;</p>';
	echo $body9;
}

$Selectquery10 = "SELECT count(`user_id`) as total, `profile_status` FROM `user_accounts` WHERE `profile_type` = 2 AND `created_at` LIKE '".$yesterday_date."%' GROUP BY `profile_status`";

$Selectresult10 = mysqli_query($link,$Selectquery10);
$SelectCount10 = mysqli_num_rows($Selectresult10);
if($SelectCount10 > 0){
	$body10='<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Insta Apply Leads</title>
	</head>
	<style type="text/css">
	.brdr{border:#999 solid 1px; font-family: Verdana, Geneva, sans-serif; font-size: 12px;color: #333;}
	</style>
	<body>';
	$body10 .= '<table width="100%" border="1" cellpadding="2" cellspacing="0">
	<tr bgcolor="#CCCCCC"><td colspan="3" align="center" class="brdr"><strong>'.$yesterday_date.' Investor Leads</strong></td></tr>
	<tr bgcolor="#CCCCCC">
	<td width="50%" class="brdr"><strong>Total</strong></td>
	<td width="50%" class="brdr"><strong>Type</strong></td>
	</tr>';
	$i = 1;
	while($Srow10 = mysqli_fetch_assoc($Selectresult10)) {
		if($Srow10['profile_status'] == 1){
			$membership_type = 'Active';
		}else{
			$membership_type = 'In Active';	
		}
		$body10 .= "<tr class='brdr'><td>".$Srow10['total']."</td><td>".$membership_type."</td></tr>";
		$i++;
	}
	$body10 .= '</table><p>&nbsp;</p>';
	echo $body10;
}

$Selectquery11 = "SELECT * FROM `pg_investor_payments` WHERE `payment_status` = 1 AND `pay_date` LIKE '".$yesterday_date."%'";

$Selectresult11 = mysqli_query($link,$Selectquery11);
$SelectCount11 = mysqli_num_rows($Selectresult11);
if($SelectCount11 > 0){
	$body11='<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Insta Apply Leads</title>
	</head>
	<style type="text/css">
	.brdr{border:#999 solid 1px; font-family: Verdana, Geneva, sans-serif; font-size: 12px;color: #333;}
	</style>
	<body>';
	$body11 .= '<table width="100%" border="1" cellpadding="2" cellspacing="0">
	<tr bgcolor="#CCCCCC"><td colspan="3" align="center" class="brdr"><strong>'.$yesterday_date.' Investor Payment Details</strong></td></tr>
	<tr bgcolor="#CCCCCC">
	<td width="33%" class="brdr"><strong>Name</strong></td>
	<td width="33%" class="brdr"><strong>Amount</strong></td>
	<td width="34%" class="brdr"><strong>Type</strong></td>
	</tr>';
	$i = 1;
	while($Srow11 = mysqli_fetch_assoc($Selectresult11)) {
		if($Srow11['payment_notes'] == "Success"){
			$paid_type = 'Direct';
		}else{
			$paid_type = 'Team';	
		}
		$body11 .= "<tr class='brdr'><td>".$Srow11['name']."</td><td>".$Srow11['amount']."</td><td>".$paid_type."</td></tr>";
		$i++;
	}
	$body11 .= '</table><p>&nbsp;</p>';
	echo $body11;
}


$sql = "SELECT franchisor_id FROM franchisor_business_details where profile_status = 1 AND membership_type = 0 AND created_at >= '2023-10-01 00:00:00'";
$result = $link->query($sql);
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$franchisor_id = $row['franchisor_id'];
		$sql2 = "SELECT id, franchisor_id, visibility FROM express_fran_insta_apply where franchisor_id = '$franchisor_id' order by id ASC LIMIT 5";
		$result2 = $link->query($sql2);
		while($row2 = $result2->fetch_assoc()) {
			if($row2['visibility'] == 1) {
				continue;
			}
			$id = $row2['id'];
			$sql3 = "UPDATE express_fran_insta_apply SET visibility = 1, visibility_date = '".date("Y-m-d H:i:s")."' WHERE id = $id AND franchisor_id = '$franchisor_id' LIMIT 1";
			$link->query($sql3);
		}
	}
}

//Franchisor Leads//Copy below
$Selectquery12 = "SELECT count(`user_id`) as total, `profile_status` FROM `user_accounts` WHERE `profile_type` = 1 AND `created_at` LIKE '".$yesterday_date."%' GROUP BY `profile_status`";

$Selectresult12 = mysqli_query($link,$Selectquery12);
$SelectCount12 = mysqli_num_rows($Selectresult12);
if($SelectCount12 > 0){
	$body12='<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Franchisor Leads</title>
	</head>
	<style type="text/css">
	.brdr{border:#999 solid 1px; font-family: Verdana, Geneva, sans-serif; font-size: 12px;color: #333;}
	</style>
	<body>';
	$body12 .= '<table width="100%" border="1" cellpadding="2" cellspacing="0">
	<tr bgcolor="#CCCCCC"><td colspan="3" align="center" class="brdr"><strong>'.$yesterday_date.' Franchisor Leads</strong></td></tr>
	<tr bgcolor="#CCCCCC">
	<td width="50%" class="brdr"><strong>Total</strong></td>
	<td width="50%" class="brdr"><strong>Type</strong></td>
	</tr>';
	$i = 1;
	while($Srow12 = mysqli_fetch_assoc($Selectresult12)) {
		if($Srow12['profile_status'] == 1){
			$membership_type = 'Active';
		}else{
			$membership_type = 'In Active';	
		}
		$body12 .= "<tr class='brdr'><td>".$Srow12['total']."</td><td>".$membership_type."</td></tr>";
		$i++;
	}
	$body12 .= '</table><p>&nbsp;</p>';
	echo $body12;
}
?>