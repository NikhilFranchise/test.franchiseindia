<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conn = mysqli_connect("localhost", "root", '$Z|d!$1:Dvsl>8E9n;c!', "franchis_franchisnewcopy");
if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
if ($_POST['name'] != "" && $_POST['email'] != "" && $_POST['mobile'] !="") { //if condition to check brand & valid email address

$ip = $_SERVER['REMOTE_ADDR'];

$qry = "INSERT INTO ask_investor (`name`, `email`, `mobile`, `ip`,  `reg_source`, `created_at`,  `updated_at`)
      VALUES ('".$_POST['name']."', '".$_POST['email']."', '".$_POST['mobile']."', '$ip', 'DI', NOW(), NOW())";

$rs = mysqli_query($conn, $qry);
	header('location: https://www.franchiseindia.com/mailermessage');
	exit;
}else{
	header('location: https://www.franchiseindia.com/mailermessage');
	exit;
}
?>
