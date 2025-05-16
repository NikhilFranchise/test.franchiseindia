<?php
$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibm';
if (!isset($_GET['__token']) || $_GET['__token'] != $token) {
echo 'You are not authorized to perform this action';
exit;
}
include("configpg/configMINew.php");
$date = date('Y-m-d H:i:s', strtotime(' -65 minute'));
$Selectquery8 = "SELECT name, magazine, payment_mode, payment_status, saltkey, emp_name, amount, amountfinal, created_at FROM `magazine_subscribe` WHERE `created_at` >= '".$date."' AND emp_name != '' ";
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
	<tr bgcolor="#CCCCCC"><td colspan="7" align="center" class="brdr"><strong>Magazine Leads</strong></td></tr>
	<tr bgcolor="#CCCCCC">
	<td width="15%" class="brdr"><strong>Name</strong></td>
	<td width="15%" class="brdr"><strong>Magazine</strong></td>
	<td width="15%" class="brdr"><strong>Payment Mode</strong></td>
	<td width="10%" class="brdr"><strong>Payment Status</strong></td>
	<td width="15%" class="brdr"><strong>Saltkey</strong></td>
	<td width="15%" class="brdr"><strong>emp_name</strong></td>				
	<td width="15%" class="brdr"><strong>Date</strong></td>					
	</tr>';
	$i = 1;
	while($Srow8 = mysqli_fetch_assoc($Selectresult8)) {
		if($Srow8['amountfinal'] != ""){
			$amountfinal = "(".$Srow8['amountfinal'].")";
		}else{
			$amountfinal = "";
		}
		$body8 .= "<tr class='brdr'><td>".$Srow8['name']."</td><td>".$Srow8['magazine']."</td><td>".$Srow8['payment_mode']."</td><td>".$Srow8['payment_status']." - ".$Srow8['amount'].$amountfinal."</td><td>".$Srow8['saltkey']."</td><td>".$Srow8['emp_name']."</td><td>".$Srow8['created_at']."</td></tr>";
		$i++;
	}
	$body8 .= '</table>';
	echo $body8;
}else{
	echo "No Lead";
}
?>