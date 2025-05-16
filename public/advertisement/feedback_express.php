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
if ($_POST['txtName'] != "" && $_POST['txtEmail'] != "" && $_POST['txtMobile'] !="" && $_POST['franchisor_id']!="") { //if condition to check brand & valid email address

$qry = "INSERT INTO express_fran_insta_apply (`franchisor_id`, `name`, `email`, `phone`, `state`,  `city`, `category`,  `pincode`, `source`, `source_ref`, `mobile_status`, `visibility`, `visibility_date`, `create_date`)
      VALUES ('".$_POST['franchisor_id']."', '".$_POST['txtName']."', '".$_POST['txtEmail']."', '".$_POST['txtMobile']."',  '".$_POST['txtState']."', '".$_POST['txtCity']."', 'Beauty & Health', '".$_POST['txtPin']."', '".$_POST['source']."',  '".$_POST['source_ref']."', 'S', 1, NOW(), NOW())";

$rs = mysqli_query($conn, $qry);

	header('location: https://www.franchiseindia.com/mailermessage');
	exit;
}else{
	header('location: https://www.franchiseindia.com/mailermessage');
	exit;
}
?>
