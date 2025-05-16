<?php
error_reporting(0);
ob_start();	
//session_start();
$eid = trim($_GET["eid"]);
$apply = $_REQUEST["apply"];
header("location: https://www.franchiseindia.com/advertisement/feedbackmailer.php?apply=$apply");	
exit;	
?>
