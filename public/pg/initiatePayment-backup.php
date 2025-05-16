<?php
// print_r($_POST);
// return;
$amt = $_POST["amount"];
$phone = $_POST["phone"];
$name = $_POST["name"];
$email = $_POST["email"];
$currency = $_POST["currency"];
$membership = $_POST["membership"];		

use PaymentHandler\APIException;
require_once realpath("./PaymentHandler.php");
use PaymentHandler\PaymentHandler;
 
$paymentHandler = new PaymentHandler("resources/config.json");


if($membership == "Gold"){
	$amount = 2999;
}elseif($membership == "Premium"){
	$amount = 3999;
}elseif($membership == "Silver"){
	$amount = 1999;
}else{
	$amount = 3999;
	$membership = "Premium";
}
include_once("../crm-api/configpg/configMINew.php");


$sqlQuery = "INSERT INTO `payment_general`(`rid`, `name`, `email`, `create_date`, comment, `amount`, `mobile`, `currency`) VALUES
 (Null,'$name','$email', '".date("Y-m-d h:i:s")."', '$membership', '$amount','$phone','$currency')";

$queryData = mysqli_query($link, $sqlQuery);
$track_id = mysqli_insert_id($link);
/*
if ($conn->query($sql) === TRUE) {
    // echo "payment record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
 $conn->close();
*/
// block:start:session-function
$orderId = "FIG-".$track_id;
$customerId = $track_id;;
$params = json_decode("{\n\"amount\":\"$amount\",\n\"order_id\":\"$orderId\",\n\"customer_id\":\"$customerId\",\n\"action\":\"paymentPage\",\n\"return_url\": \"https://www.franchiseindia.com/pg/handlePaymentResponse.php\"\n}", true);
try {
    $session = $paymentHandler->orderSession($params);
    // block:end:session-function
    $redirect = $session["payment_links"]["web"];
    header("Location: {$redirect}");
    exit;

} catch (APIException $e ) {
    http_response_code(500);
    $error = json_encode(["message" => $e->getErrorMessage(), "error_code" => $e->getErrorCode(), "http_response_code" => $e->getHttpResponseCode()]);
    echo "<p> Payment server threw a non-2xx error. Error message: {$error} </p>";
    exit;
 } catch (Exception $e) {
    http_response_code(500);
    echo " <p> Unexpected error occurred, Error message:  {$e->getMessage()} </p>";
    exit;
}

?>
