<?php

include ('connection-file.php');
include ('constants.php');

// visitor registration
if (!empty($date)) {
    $sql = "SELECT name, email, telephone, campaign, company, country, state, city, address, pincode, magazine, payment_status, created_at FROM magazine_subscribe where `created_at` >= '".$date."'  limit " . $offset . "," . $limit;
}else{
    $sql = "SELECT name, email, telephone, campaign, company, country, state, city, address, pincode, magazine, payment_status, created_at FROM magazine_subscribe limit " . $offset . "," . $limit;
}

$query = mysqli_query($link, $sql);

$rowData = [];
while ($row = mysqli_fetch_assoc($query)) {
    $_franchisor = [
        'name'=>replaceChar($row['name']),
        'email'=>replaceChar($row['email']),
        'mobile'=>replaceChar($row['telephone']),
        'company'=>replaceChar($row['company']),
        'designation'=>"",
        'country'=>replaceChar($row['country']),
        'state'=> replaceChar($row['state']),
        'city'=>replaceChar($row['city']),
        'address'=>replaceChar($row['address']),
        'pincode'=>replaceChar($row['pincode']),
        'min_investment'=>"",
        'max_investment'=>"",
        'lead_type'=>24,
		'campaign_source' => !empty(getCampaignSource()[strtolower($row['campaign'])]) ? getCampaignSource()[strtolower($row['campaign'])] : 1,		
        'payment_history'=> ($row['payment_status'] == 'Y' ? 1 : 0),
        'category_interested' => replaceChar($row['magazine']),
        'lead_source' => 4,
        'ip_address'=>'',
        'register_date'=>$row['created_at'],
        'status'=>1,
    ];
    array_push($rowData, $_franchisor);
}

echo json_encode($rowData);


die;

?>