<?php
$eid = trim($_GET["eid"]);
$bid = trim($_GET["bid"]);
$decbrandid = base64_decode($bid);
$apply = $_REQUEST["apply"];
header("location: https://www.franchiseindia.com/mailer?apply=$apply&bid=$bid");
exit;
?>
