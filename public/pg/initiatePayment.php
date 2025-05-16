<?php
// print_r($_POST);
// return;
error_reporting(E_ALL);
ini_set('display_errors', 1);
//$amt = $_POST["amount"];
$phone = "9899811050";
$name = $_POST["name"];
$email = $_POST["email"];
$currency = $_POST["currency"];
$membership = $_POST["membership"];
$paymentMethodType = $_POST["paymentMethodType"];		

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
$orderId = "FIG-".$track_id;
$customerId = (string)$track_id;
// block:start:session-function
// $params = json_decode("{\n\"amount\":\"$amt\",\n\"allowDefaultOptions\":\"false\",\n\"enable\":\"true\",\n\"paymentMethodType\":\"UPI\",\n\"currency\":\"$currency\",\n\"order_id\":\"$orderId\",\n\"customer_id\":\"$customerId\",\n\"action\":\"paymentPage\",\n\"return_url\": \"https://www.franchiseindia.com/pg/handlePaymentResponse.php\"\n}", true);
// try {
//     $session = $paymentHandler->orderSession($params);
//     // block:end:session-function
//     $redirect = $session["payment_links"]["web"];
//     header("Location: {$redirect}");
//     exit;

// } catch (APIException $e ) {
//     http_response_code(500);
//     $error = json_encode(["message" => $e->getErrorMessage(), "error_code" => $e->getErrorCode(), "http_response_code" => $e->getHttpResponseCode()]);
//     echo "<p> Payment server threw a non-2xx error. Error message: {$error} </p>";
//     exit;
//  } catch (Exception $e) {
//     http_response_code(500);
//     echo " <p> Unexpected error occurred, Error message:  {$e->getMessage()} </p>";
//     exit;
// }
	
	if($currency != "INR"){
		$currency1 = $currency;
	}else{
		$currency1 = "";
	}


 //new code
 $customerId = (string)$track_id; // Cast to string

 $data = [
    "order_id" => $orderId,
    "amount" => $amount,
    "customer_id" => $customerId,
    "customer_email" => $email,
    "customer_phone" => $phone,
    "payment_page_client_id" => "37770",
    "action" => "paymentPage",
    "currency" => $currency,
	"metadata.JUSPAY:gateway_reference_id" => $currency1,	
    "return_url" => "https://www.franchiseindia.com/pg/handlePaymentResponse.php",
    "description" => "Complete your payment",
    "first_name" => $name,  // Assuming the name contains first and last
    "last_name" => "",  // You can add a way to separate first and last name if needed

"payment_filter" => {
       "allowDefaultOptions" => true,
       "options" => [
         {
           "paymentMethodType" => "CARD",
           "enable" => true,
     "cardFilters" => [
             {
               "enable" => false,
               "cardTypes" => "CREDIT"
             }
           ]
         }
       ]
     }


    




];


 $curl = curl_init();
 
 curl_setopt_array($curl, array(
 
   CURLOPT_URL => 'https://smartgateway.hdfcbank.com/session',
 
   CURLOPT_RETURNTRANSFER => true,
 
   CURLOPT_ENCODING => '',
 
   CURLOPT_MAXREDIRS => 10,
 
   CURLOPT_TIMEOUT => 0,
 
   CURLOPT_FOLLOWLOCATION => true,
 
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 
   CURLOPT_CUSTOMREQUEST => 'POST',
 
   CURLOPT_POSTFIELDS => json_encode($data),
 
   CURLOPT_HTTPHEADER => array(
 
     'Content-Type: application/json',
 
     'x-merchantid: 37770',
 
     'x-customerid: dhar42324',
 
     'Authorization: Basic QzdFQTI1N0M0OUI0REMzQTg3RTc3Qzg0QzlFRjU1Og=='
 
   ),
 
 ));
  
 $response = curl_exec($curl);
  
 curl_close($curl);
 
 echo $response;
 
//  $paymentUrl = $response['payment_links']['web'];
//  echo $paymentUrl;


// Decode the JSON response as an associative array
$responseData = json_decode($response, true);

// Check if decoding was successful
if (json_last_error() !== JSON_ERROR_NONE) {
    // If there's a problem decoding, output the error
    die("JSON decode error: " . json_last_error_msg());
}

// Ensure the payment_links key exists before accessing
if (isset($responseData['payment_links']['web'])) {
    // Extract the payment URL
    $paymentUrl = $responseData['payment_links']['web'];
} else {
    die("Payment link not found in the response.");
}

?>

<script type="text/javascript">
    // Redirect to the payment URL
    window.location.href = "<?php echo $paymentUrl; ?>";
</script>






