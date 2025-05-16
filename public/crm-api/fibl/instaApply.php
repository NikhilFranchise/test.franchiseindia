<?php
$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibm';
if (!isset($_GET['__token']) || $_GET['__token'] != $token) {
echo 'You are not authorized to perform this action';
exit;
}
include_once("../configpg/configMINew.php"); 

// visitor registration

$yesterday = new DateTime('yesterday');
$yesterdayDate = $yesterday->format('Y-m-d');
$sqlQuery = "SELECT fbd.fibl_brands, efia.name, efia.lname, efia.email, efia.phone, efia.city, efia.state, efia.address, efia.investment, efia.pincode, efia.category, efia.create_date FROM user_accounts as fa INNER JOIN franchisor_business_details as fbd ON fa.profile_str=fbd.franchisor_id INNER JOIN express_fran_insta_apply as efia ON efia.franchisor_id= fa.profile_str  where  fa.profile_type =1 AND fa.email='fiblbrands@franchiseindia.in' AND efia.`create_date` LIKE '". $yesterdayDate ."%' AND fbd.fibl_brands IS NOT NULL GROUP BY efia.phone";

$queryData = mysqli_query($link, $sqlQuery);
$rowData = [];
while ($row = mysqli_fetch_assoc($queryData)) {
   	$instaData = [
 		'full_name' => cleanSpecialChar($row['name']),
        'email_id' => cleanSpecialChar($row['email']),
        'phone_no' => cleanSpecialChar($row['phone']),
        'company' => cleanSpecialChar($row['company']),
        'description' => cleanSpecialChar($row['investment_location']),
        'state' => cleanSpecialChar($row['state']),
        'city' => cleanSpecialChar($row['city']),
        'address' => cleanSpecialChar($row['address']),
        'pincode' => cleanSpecialChar($row['pincode']),
        'range_of_investment' => "",
        'have_commercial_space' => "",
        'brand_name' => $row['fibl_brands'],
        'product_name' => $row['fibl_brands'],
        'client_type' => "",
        'lead_source' =>"DOTCOM",
        "when_to_start"=> ""
    ];
    array_push($rowData, $instaData);
}
echo json_encode($rowData);
die;

/*$payload = json_encode($rowData);

// API URL
$url = 'https://aim.abacaaim.com/ords/as/bulk-lead-api/lead-in?access_token=747911cf25bfcf68711c822d5547bbe2';

// Create a new cURL resource
$ch = curl_init($url);

// Attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

// Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

// Return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the POST request
$result = curl_exec($ch);
echo $result;

// Close cURL resource
curl_close($ch);

die;
*/
function cleanSpecialChar($string)
{
    $string = preg_replace('/[^^a-zA-Z0-9#@&-+:_(),.!@"\/ ]/', '', $string);
    $string = preg_replace('!\s+!', ' ', $string);
    return $string;
}

function connectToDb($bdUser, $dbPassword, $dbName)
{
    $link = mysqli_connect('localhost', $bdUser, $dbPassword, $dbName);
    if (!$link) {
        die('Network Problem.... Kindly try after 15 mins!');
    }
    return $link;
}