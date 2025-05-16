<?php
/*
$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibm';
if (!isset($_POST['__token']) || $_POST['__token'] != $token) {
echo 'You are not authorized to perform this action';
exit;
}
include_once("../configpg/configMINew.php"); 

$date1 = date('Y-m-d', strtotime(' -30 days'));

include 'getLeadBrandType.php';
include 'common.php';
$BxData = [];
$sqlQuery = "SELECT franchisor_id, name, lname, email, phone, city, state, address, investment, pincode, category, create_date FROM express_fran_insta_apply WHERE `create_date` LIKE '". $date1 ."%' GROUP BY phone";

$queryData = mysqli_query($link, $sqlQuery);
$SelectCount = mysqli_num_rows($queryData);	
if($SelectCount > 0){
	while ($row = mysqli_fetch_assoc($queryData)) {
	
		$sqlQueryTemp = "SELECT fibl_brands FROM franchisor_business_details WHERE `franchisor_id` = '". $row['franchisor_id']."' AND fibl_brands IS NOT NULL AND fibl_brands != ''";
		$queryDataTemp = mysqli_query($link, $sqlQueryTemp);
		$SelectCountTemp = mysqli_num_rows($queryDataTemp);	
		if($SelectCountTemp == 0){
			$fibl_brands = 2059;
			$lead_source = 6;	
	
		   $instaData = [
				'name' => cleanSpecialChar($row['name']),
				'email' => cleanSpecialChar($row['email']),
				'mobile' => cleanSpecialChar($row['phone']),
				'company' => cleanSpecialChar($row['company']),
				'designation' => cleanSpecialChar($row['designation']),
				'country' => 'India',
				'state' => cleanSpecialChar($row['state']),
				'city' => cleanSpecialChar($row['city']),
				'address' => cleanSpecialChar($row['address']),
				'pincode' => cleanSpecialChar($row['pincode']),
				'min_investment' => cleanSpecialChar($row['investment']),
				'max_investment' => 0,
				'campaign_source' => !empty(getCampaignSource()[strtolower($row['campaign_source'])]) ? getCampaignSource()[strtolower($row['campaign_source'])] : 7,
				'lead_type' => $fibl_brands,
		//        'lead_type' => 14,
				'payment_history' => ($row['payment_status'] === 'Y') ? 1 : 0,
				'category_interested' => cleanSpecialChar($row['category']),
				'gst' => NULL,
				'amount' => NULL,		
				'lead_source' =>$lead_source,
				'ip_address' => $row['ip_address'],
				'register_date' => $row['create_date'],
				'status' => 1,
			];	
			 array_push($BxData, $instaData);

		}			 
	}
}
echo json_encode($BxData);
die;

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

function getLeadSourceBx($visitType) {
    $sources =  [
        'BusinessEx Loan' => 1,
        'Events' => 2,	
        'Actioncoach' => 3,	
        'Brands' => 4,	
        'FI.COM' => 5,										
    ];
    if(array_key_exists($visitType, $sources)){
        return $sources[$visitType];
    }
    return 4;
}

*/
?>