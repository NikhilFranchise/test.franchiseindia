<?php
$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibm';
if (!isset($_GET['__token']) || $_GET['__token'] != $token) {
echo 'You are not authorized to perform this action';
exit;
}
ob_start();
ini_set("display_errors",1);
include_once("configpg/configMINew.php");         //Database Connectivity
/*
$sql = "SELECT franchisor_id FROM `franchisor_business_details` WHERE `profile_status` = 1 LIMIT 20000, 5000";
$rs = mysqli_query($link, $sql);
while($resArr = mysqli_fetch_array($rs)){
	$franchisor_id = $resArr['franchisor_id'];
	
	$sql1 = "SELECT DISTINCT(`state`) FROM `franchisor_loc_states` WHERE `franchisor_id` = '".$franchisor_id."'";
	$rs1 = mysqli_query($link, $sql1);
	if(mysqli_num_rows($rs1) > 0){
		$tempState1 = "";
		while($resArr1 = mysqli_fetch_array($rs1)){
			//$tempState = $resArr1['state'];
			$tempState1 .= $resArr1['state'].", ";
		}
		$tempState = rtrim($tempState1, ', ');
		echo $sqlu = "UPDATE `franchisor_business_details` SET  expansion_location = '".$tempState."' WHERE `franchisor_id` = '".$franchisor_id."' LIMIT 1";
		echo "<br>";
		$rsu = mysqli_query($link, $sqlu);
	}
}
*/
$yesterday_date = date("Y-m-d", strtotime("-1 day"));
$sql1 = "SELECT DISTINCT(`franchisor_id`) FROM `franchisor_loc_states` WHERE `updated_at` LIKE '".$yesterday_date."%' AND state IS NOT NULL";
$rs1 = mysqli_query($link, $sql1);
if(mysqli_num_rows($rs1) > 0){
	$tempState1 = "";
	while($resArr1 = mysqli_fetch_array($rs1)){

		$franchisor_id = $resArr1['franchisor_id'];
		//$tempState = $resArr1['state'];
		//$tempState1 .= $resArr1['state'].", ";

		$sql11 = "SELECT DISTINCT(`state`) FROM `franchisor_loc_states` WHERE `franchisor_id` = '".$franchisor_id."'";
		$rs11 = mysqli_query($link, $sql11);
		if(mysqli_num_rows($rs1) > 0){
			$tempState1 = "";
			while($resArr11 = mysqli_fetch_array($rs11)){
				//$tempState = $resArr1['state'];
				$tempState1 .= $resArr11['state'].", ";
			}
			$tempState = rtrim($tempState1, ', ');
			$sqlu = "UPDATE `franchisor_business_details` SET  expansion_location = '".$tempState."' WHERE `franchisor_id` = '".$franchisor_id."' LIMIT 1";
			//echo "<br><br>";
			$rsu = mysqli_query($link, $sqlu);
		}
	}
	//$tempState = rtrim($tempState1, ', ');
	//echo $sqlu = "UPDATE `franchisor_business_details` SET  expansion_location = '".$tempState."' WHERE `franchisor_id` = '".$franchisor_id."' LIMIT 1";
	//echo "<br>";
	//$rsu = mysqli_query($link, $sqlu);
}

?>