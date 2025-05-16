<?php
$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibm';
if (!isset($_GET['__token']) || $_GET['__token'] != $token) {
echo 'You are not authorized to perform this action';
exit;
}
date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d H:i:s");
$url = 'https://franchiseindia-ltd.myfreshworks.com/crm/sales/contacts';
$headers = array(
    'Authorization: Token token=eqfKIhyAK1lMAb04mgtuvA',
    'Content-Type: application/json',
);
include_once("../configpg/configMINew.php"); 

// visitor registration
$yesterday = new DateTime('yesterday');
$yesterdayDate = $yesterday->format('Y-m-d');
$sqlQuery = "SELECT fbd.brand_name, fbd.company_name, efia.name, efia.lname, efia.email, efia.phone, efia.city, efia.state, efia.address, efia.investment, efia.pincode, efia.category, efia.create_date FROM user_accounts as fa INNER JOIN franchisor_business_details as fbd ON fa.profile_str=fbd.franchisor_id INNER JOIN express_fran_insta_apply as efia ON efia.franchisor_id= fa.profile_str  where  fa.profile_type =1 AND fa.email='fiblbrands@franchiseindia.in' AND efia.`create_date` LIKE '". $yesterdayDate ."%'";

$queryData = mysqli_query($link, $sqlQuery);

while ($row = mysqli_fetch_assoc($queryData)) {
    
	if($row['brand_name'] == ""){
		$brand_name = $row['company_name'];
	}else{
		$brand_name = $row['brand_name'];	
	}
		
	$instaData =  array(
        'first_name' => cleanSpecialChar($row['name']),
		'last_name' => '',
        'email' => cleanSpecialChar($row['email']),
        'mobile_number' => cleanSpecialChar($row['phone']),
        //'cf_domain_name' => cleanSpecialChar($row['company_name']),
        'country' => 'India',
        'state' => cleanSpecialChar($row['state']),
        'city' => cleanSpecialChar($row['city']),
		'first_medium' => cleanSpecialChar($brand_name),
        'lead_source_id' => '402002631943',
        //'sales_accounts' => '{"name":cleanSpecialChar($brand_name)}',
		"custom_field"=> array("cf_brand_names"=> cleanSpecialChar($brand_name)),
		'cf_event_date' => $row['create_date'],
   );
  
	$payload = json_encode($instaData);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	curl_setopt($ch, CURLOPT_POST, true);
	$response = curl_exec($ch);
	if(curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}

	echo $response;
	echo "<br>";
	curl_close($ch);
}


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

?>