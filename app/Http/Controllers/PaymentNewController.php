<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralPayment;
use App\Mail\GeneralPaymentMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http; // For making HTTP requests (Laravel's HTTP client)
use Illuminate\Support\Facades\Log; // Add this line
class PaymentNewController extends Controller
{
    //
    public function paymentnew()
    {
        return view('site/paymentnew');
    }

    public function initiatePayment(Request $request)
    {
        // dd($request);
      // Extract data from the incoming request
      $cphone =  $request->input('mobile');  // This is hardcoded, change if dynamic data is required
      $cname = $request->input('name');
      $email = $request->input('email');
      $currency = $request->input('currency');
      $membership = $request->input('membership');
      $paymentMethodType = $request->input('paymentMethodType');
      $mopt  = $request->input('mop'); 
      $amount =  $request->input('camount');
      $caddress = $request->input('address');
      $ccountry  = config('location.countryName.' . $request->input('country'));
      $pincode = $request->input('pincode');
      $cdetails = $request->input('details');
      $pgateway = 'HDFC';
      $userIp   = $request->ip();
      
    // Default values for payment filters
    $paymentMethodType = "CARD"; // Default to "CARD" for CREDIT/DEBIT
    $cardTypes = []; // This will dynamically hold the card type for CREDIT/DEBIT
    $paymentFilterOptions = [];  // This will hold the filter options dynamically

     // Charges based on payment method (CREDIT, DEBIT, and NETBANK)
    $Charges = array(
        "CREDIT" => 3.5,  // Credit Card charge percentage
        "DEBIT" => 3.5,      // Debit Card charge percentage (no extra charge)
        "UPI" => 0,        // UPI charge percentage (no extra charge)
        "NB" => 3.5       // Net Banking charge percentage
    );

    // Set paymentMethodType and cardTypes based on the selected mode of payment (CREDIT, DEBIT, UPI)
    if ($mopt === 'CREDIT') {
        $paymentMethodType = "CARD";  // Set paymentMethodType to "CARD" for CREDIT
        $cardTypes = ['CREDIT'];      // Set cardTypes to ["CREDIT"]
    } elseif ($mopt === 'DEBIT') {
        $paymentMethodType = "CARD";  // Set paymentMethodType to "CARD" for DEBIT
        $cardTypes = ['DEBIT'];       // Set cardTypes to ["DEBIT"]
    } elseif ($mopt === 'UPI') {
        $paymentMethodType = "UPI";   // Set paymentMethodType to "UPI" for UPI
    }elseif($mopt === 'NB'){
        $paymentMethodType = "NB";
    }

	$currencyOpt = "";
    if ($currency != 'USD') {
        $currencyOpt = "";  // Set paymentMethodType to "CARD" for CREDIT
    }else{
		$currencyOpt = $currency;
	}
		
    // If cardTypes are defined (for CREDIT/DEBIT), build the card filters
    if (!empty($cardTypes)) {
        $paymentFilterOptions = [
            "enable" => true,
            "cardFilters" => [
                [
                    "enable" => true,
                    "cardTypes" => $cardTypes  // Dynamic card types based on CREDIT or DEBIT selection
                ]
            ]
        ];
    } else {
        // No cardFilters for UPI, so just enable the payment method
        $paymentFilterOptions = [
            "enable" => true
        ];
    }
    // Calculate extra charge based on the selected payment method (CREDIT, DEBIT, UPI, NETBANK)
    if (isset($Charges[$mopt])) {
        // Calculate the charge percentage and add it to the amount
        $extraCharge = round($amount * $Charges[$mopt] / 100, 2);  // Calculate extra charge
        $amount = round($amount + $extraCharge, 2);  // Add the extra charge to the total amount
    }

  // dd($cdetails);
      // Insert payment details into the database
      $payment = DB::table('general_payments')->insertGetId([
          'cname' => $cname,  // Update column name to 'cname' instead of 'name'
          'cemail' => $email,  // Update column name to 'cemail' instead of 'email'
          'created_at' => now(),
          'cdetail' => $membership,
          'camount' => $amount,  // Update column name to 'camount' instead of 'amount'
          'cphone' => $cphone,  // Update column name to 'cphone' instead of 'mobile'
          'currency' => $currency,
          'payment_mode' => $mopt,  
          'caddress' =>$caddress,
          'ccountry' => $ccountry,
          'pincode' => $pincode,
          'cdetail' => $cdetails,
          'pgateway' =>$pgateway,
          'client_ip' => $userIp,
      ]);

    $orderId = "FIG-" . $payment;
    $customerId = (string)$payment;

    // Fetch the redirect and cancel URLs from the config file


    // Prepare the data to be sent in the API request
    $data = [
        "order_id" => $orderId,
        "amount" => $amount,
        "customer_id" => $customerId,
        "customer_email" => $email,
        "customer_phone" => $cphone,  // Correct column for phone
        "payment_page_client_id" => "37770",
        "action" => "paymentPage",
        "currency" => $currency,
		"metadata.JUSPAY:gateway_reference_id" => $currencyOpt,
        "return_url" => url('handlePaymentResponse'), // Use route to generate the URL dynamically
        "cancel_url" => url('handlePaymentResponse'),
        // "return_url" => "http://127.0.0.1:8000/pg/handlePaymentResponse.php",
        "description" => "Complete your payment",
        "first_name" => $cname,  // Corrected column name for name
        "last_name" => "",
        
        "payment_filter" => [
            "allowDefaultOptions" => false,
            "options" => [
                [
                    "paymentMethodType" => $paymentMethodType,  // "CARD" for both Credit/Debit, "UPI" if selected
                    "enable" => true,
                    "cardFilters" => $paymentFilterOptions['cardFilters'] ?? []  // Dynamically set card filters only if needed
                ]
            ]
        ],

    ];

    // Initialize CURL for the API request
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://smartgateway.hdfc.bank.in/session',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => [
          'Content-Type: application/json',
          'x-merchantid: 37770',
          'x-customerid: dhar42324',
          'Authorization: Basic QzdFQTI1N0M0OUI0REMzQTg3RTc3Qzg0QzlFRjU1Og=='
        ],
    ]);

    $response = curl_exec($curl);
    curl_close($curl);

    // Handle the API response
    $responseData = json_decode($response, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        // Log::error('JSON decode error: ' . json_last_error_msg());
        return response()->json(['error' => 'Payment initiation failed.'], 500);
    }

    if (isset($responseData['payment_links']['web'])) {
        $paymentUrl = $responseData['payment_links']['web'];
        return redirect($paymentUrl);
    } else {
        return response()->json(['error' => 'Payment link not found in the response.'], 500);
    }
    }


 
    public function handlePaymentResponse(Request $request)
    {
        $orderId = $request->input('order_id');
        $status = $request->input('status');
        $paymentId = str_replace("FIG-", "", $orderId);
    
        Log::info('Raw Payment Response:', [
            'order_id' => $orderId,
            'status' => $status,
            'params' => $request->all()
        ]);
    
        // Always attempt to update payment_status
        $statusCode = ($status === "CHARGED") ? 1 : 0;
        // dd($request->all());
        try {
            $params = [
                "order_id" => $orderId,
                "status" => $status,
                "signature" => $request->input('signature'),
                "status_id" => $request->input('status_id'),
            ];
            
            $order = $this->getOrder($params);
            Log::info('Order Details:', (array)$order);
    
        } catch (\Exception $e) {
            Log::error("Payment Processing Error: " . $e->getMessage());
        }
    
        // Update payment_status regardless of validation
        DB::table('general_payments')
            ->where('pay_id', $paymentId)
            ->update(['payment_status' => $statusCode]);
    
        Log::info("Payment Status Updated", [
            'pay_id' => $paymentId,
            'status' => $statusCode
        ]);
    
        return ($status === "CHARGED") 
            ? redirect()->route('payment.success', ['order_id' => $orderId])
            : redirect()->route('payment.cancel', ['order_id' => $orderId]);
    }

    private function getOrder($params){

        require_once public_path('pg/PaymentHandler.php');
        // Use absolute filesystem path (not URL)
        $configPath = base_path('pg/resources/config.json'); 
        try {
            $paymentHandler = new \PaymentHandler\PaymentHandler($configPath);
            
            if (!$paymentHandler->validateHMAC_SHA256($params)) {
                throw new \Exception("Signature verification failed");
            }
            return $paymentHandler->orderStatus($params["order_id"]);
        } catch (\Exception $e) {
            Log::error("Order Validation Error: " . $e->getMessage());
            return null; // Allow payment_status update to proceed
        }
    }
 
// PaymentNewController.php
        public function showCancelPage(Request $request)
        {
            $orderId = $request->query('order_id');

            if (!$orderId) {
                abort(404, 'Order ID not provided');
            }

            $paymentId = str_replace("FIG-", "", $orderId);

            // Explicitly query using pay_id
            $payment = DB::table('general_payments')
                        ->where('pay_id', $paymentId)  // <-- Use pay_id here
                        ->first();

            if (!$payment) {
                abort(404, 'Order not found');
            }

            return view('payment.cancel', ['payment' => $payment]);
        }
      /**
     * Failed Payment
     */


}
