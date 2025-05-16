<?php

include ('connection-file.php');
include ('constants.php');

$rowData = [];
// visitor registration
if (!empty($date)) {
    //$sql   = "SELECT * FROM property_loans where `source` NOT LIKE '%INSTA%' AND `created_at` >='".$date."' limit ".$limit." offset " . $offset ;
    $sql   = "SELECT name, email, mobile, company_name, designation, address, city, pincode, amount, created_at FROM property_loans where `created_at` >='".$date."' limit ".$limit." offset " . $offset ;	
}else{
   // $sql   = "SELECT * FROM property_loans where `source` NOT LIKE '%INSTA%' limit ".$limit." offset " . $offset ;
   $sql   = "SELECT name, email, mobile, company_name, designation, address, city, pincode, amount, created_at FROM property_loans limit ".$limit." offset " . $offset ;   
}

$query = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($query)) {
    $_franchisor = [
        'name'=>replaceChar($row['name']),
        'email'=>replaceChar($row['email']),
        'mobile'=>replaceChar($row['mobile']),
        'company'=>replaceChar($row['company_name']),
        'designation'=>replaceChar($row['designation']),
        'country'=>"India",
        'address'=>replaceChar($row['address']),
        'city'=>replaceChar($row['city']),
        'pincode'=>replaceChar($row['pincode']),
        'min_investment'=>"0",
        'max_investment'=>replaceChar($row['amount']),
        'lead_type'=>36,
        'payment_history'=>"",
        'category_interested' => "",
        'lead_source' => 4,
        'ip_address'=>'',
        'register_date'=>$row['created_at'],
        'status'=>1,
    ];
    array_push($rowData, $_franchisor);
}

//echo json_encode($rowData);


// Advertise
if (!empty($date)) {
    $sqlA   = "SELECT * FROM `advertise` WHERE `created_at` >='".$date."' limit ".$limit." offset " . $offset ;	
}else{
    $sqlA   = "SELECT * FROM `advertise` WHERE limit ".$limit." offset " . $offset ;   
}
//$sqlA   = "SELECT * FROM `advertise` WHERE `reg_type` LIKE '%Business Expansion India%'" ;	
$queryA = mysqli_query($link, $sqlA);

while ($rowA = mysqli_fetch_assoc($queryA)) {
    $_Advertise = [
        'name'=>replaceChar($rowA['name']),
        'email'=>replaceChar($rowA['email']),
        'mobile'=>replaceChar($rowA['mobile']),
        'company'=>replaceChar($rowA['company_name']),
        'designation'=>replaceChar($rowA['designation']),
        'country'=>"India",
        'state'=>replaceChar($rowA['state']),
        'address'=>replaceChar($rowA['address']),
        'city'=>replaceChar($rowA['city']),
        'pincode'=>replaceChar($rowA['pincode']),
        'min_investment'=>replaceChar($rowA['txtInvestment']),
        'max_investment'=>replaceChar($rowA['amount']),
        'lead_type'=>getLeadType($rowA['reg_type']),
        'campaign_source' => !empty(getCampaignSource()[strtolower($row['src'])]) ? getCampaignSource()[strtolower($row['src'])] : 1,		
        'payment_history'=>"",
        'category_interested' => replaceChar($rowA['txtIndustry']),
        'lead_source' => 4,
        'ip_address'=>'',
        'register_date'=>$rowA['created_at'],
        'status'=>1,
    ];
    array_push($rowData, $_Advertise);
}

//echo json_encode($rowData);



// visitor look_for_fran
if (!empty($date)) {
	//$sqlL   = "SELECT * FROM `look_for_fran` WHERE `event_name` = 'JumoKing-Food' AND `date` >='".$date."' limit ".$limit." offset " . $offset ;
}else{
	//$sqlL   = "SELECT * FROM `look_for_fran` WHERE `event_name` = 'JumoKing-Food' AND `date` > '2021-08-01' limit ".$limit." offset " . $offset ;
}
$sqlL   = "SELECT * FROM `look_for_fran` WHERE `event_name` = 'JumoKing-Food' AND `date` > '2021-08-01'" ; 
$queryL = mysqli_query($link, $sqlL);

while ($rowL = mysqli_fetch_assoc($queryL)) {
    $_look_for_fran = [
        'name'=>replaceChar($rowL['name']),
        'email'=>replaceChar($rowL['email']),
        'mobile'=>replaceChar($rowL['phone']),
        'company'=>replaceChar($rowL['company']),
        'designation'=>'',
        'country'=>"India",
        'address'=>replaceChar($rowL['address']),
        'city'=>replaceChar($rowL['city']),
        'pincode'=>'',
        'min_investment'=>"0",
        'max_investment'=>replaceChar($rowL['investment']),
        'lead_type'=>49,
        'payment_history'=>"",
        'category_interested' => replaceChar($rowL['business']),
        'remarks' => replaceChar($rowL['details']),		
        'lead_source' => 4,
        'ip_address'=>'',
        'register_date'=>$rowL['date'],
        'status'=>1,
    ];
    array_push($rowData, $_look_for_fran);
}

function getLeadType($visitType)
{
    $sources = [
        'Business Expansion India' => 52,
        'Business Expansion Across South Asia' => 52,
        'Get Featured Professionals' => 13,
        'Nominate as Franchise' => 13,
        'THE-FRANCHISING-WORLD' => 13,		
        'TheFranchisingWorld' => 13,
        'Get Featured Leaders' => 13,		
    ];

    if(array_key_exists($visitType, $sources)){
        return $sources[$visitType];
    }
    return 13; //default is visitor as per rakesh
}

echo json_encode($rowData);
die;

?>