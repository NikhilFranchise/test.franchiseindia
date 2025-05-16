<?php

include ('connection-file.php');
include ('constants.php');

// visitor registration

if (!empty($date)) {
    $sql      = "select `franchisor_business_details`.franchisor_id, `user_accounts`.email, `user_accounts`.mobile, `user_accounts`.verified_at, `franchisor_business_details`.fran_manager, `franchisor_business_details`.ceo_name, `franchisor_business_details`.company_name, `franchisor_business_details`.country, `franchisor_business_details`.state, `franchisor_business_details`.city, `franchisor_business_details`.fran_address, `franchisor_business_details`.pincode, `franchisor_business_details`.unit_inv_min, `franchisor_business_details`.unit_inv_max, `franchisor_business_details`.ind_main_cat from `user_accounts` inner join `franchisor_business_details` on `user_accounts`.`profile_str` = `franchisor_business_details`.`franchisor_id` where `user_accounts`.`profile_type` = 1 and `user_accounts`.`profile_status` = 1 and `user_accounts`.email != 'fiblbrands@franchiseindia.in' AND `user_accounts`.email != 'info@opportunityindia.com' and `user_accounts`.`created_at` >= '".$date."' limit ".$limit." offset " . $offset ;

}else{
    $sql      = "select `franchisor_business_details`.franchisor_id, `user_accounts`.email, `user_accounts`.mobile, `user_accounts`.verified_at, `franchisor_business_details`.fran_manager, `franchisor_business_details`.ceo_name, `franchisor_business_details`.company_name, `franchisor_business_details`.country, `franchisor_business_details`.state, `franchisor_business_details`.city, `franchisor_business_details`.fran_address, `franchisor_business_details`.pincode, `franchisor_business_details`.unit_inv_min, `franchisor_business_details`.unit_inv_max, `franchisor_business_details`.ind_main_cat from `user_accounts` inner join `franchisor_business_details` on `user_accounts`.`profile_str` = `franchisor_business_details`.`franchisor_id` where `user_accounts`.`profile_type` = 1 and `user_accounts`.`profile_status` = 1 and `user_accounts`.email != 'fiblbrands@franchiseindia.in' AND `user_accounts`.email != 'info@opportunityindia.com' limit ".$limit." offset " . $offset ;
}


$query    = mysqli_query($link, $sql);
$stateArr = $statesIndia;
$mainCat  = $CategoryArr;
$rowData  = [];

while ($row = mysqli_fetch_assoc($query)) {
    $_franchisor = [
        'id' => $row['franchisor_id'],
        'name'=>replaceChar(($row['fran_manager'] ? $row['fran_manager'] : $row['ceo_name'])),
        'email'=>replaceChar($row['email']),
        'mobile'=>replaceChar($row['mobile']),
        'company'=> replaceChar($row['company_name']),
        'designation'=> "",
        'country'=>replaceChar($row['country']),
        'state'=> replaceChar(array_search($row['state'], $stateArr) ? array_search($row['state'], $stateArr) : $row['state']),
        'city'=>replaceChar($row['city']),
        'address'=>replaceChar($row['fran_address']),
        'pincode'=>replaceChar($row['pincode']),
        'min_investment'=>replaceChar($row['unit_inv_min']),
        'max_investment'=>replaceChar($row['unit_inv_max']),
        'lead_type'=>8,
        'payment_history'=>$row['membership_type'],
        'category_interested' => replaceChar($mainCat[$row['ind_main_cat']]),
        'lead_source' => 4,
        'ip_address'=>'',
        'register_date'=>$row['verified_at'],
        'status'=>1,
    ];
    array_push($rowData, $_franchisor);
}

if (!empty($date)) {
    $sqlhidden      = "select `franchisor_business_details`.franchisor_id, `user_accounts`.email, `user_accounts`.mobile, `user_accounts`.verified_at, `franchisor_business_details`.fran_manager, `franchisor_business_details`.ceo_name, `franchisor_business_details`.company_name, `franchisor_business_details`.country, `franchisor_business_details`.state, `franchisor_business_details`.city, `franchisor_business_details`.fran_address, `franchisor_business_details`.pincode, `franchisor_business_details`.unit_inv_min, `franchisor_business_details`.unit_inv_max, `franchisor_business_details`.ind_main_cat from `user_accounts` inner join `franchisor_business_details` on `user_accounts`.`profile_str` = `franchisor_business_details`.`franchisor_id` where `user_accounts`.`profile_type` = 1 and `user_accounts`.`profile_status` != 1 and `user_accounts`.email != 'fiblbrands@franchiseindia.in' AND `user_accounts`.email != 'info@opportunityindia.com' and `user_accounts`.`created_at` >= '".$date."' limit ".$limit." offset " . $offset ;

}else{
    $sqlhidden      = "select `franchisor_business_details`.franchisor_id, `user_accounts`.email, `user_accounts`.mobile, `user_accounts`.verified_at, `franchisor_business_details`.fran_manager, `franchisor_business_details`.ceo_name, `franchisor_business_details`.company_name, `franchisor_business_details`.country, `franchisor_business_details`.state, `franchisor_business_details`.city, `franchisor_business_details`.fran_address, `franchisor_business_details`.pincode, `franchisor_business_details`.unit_inv_min, `franchisor_business_details`.unit_inv_max, `franchisor_business_details`.ind_main_cat from `user_accounts` inner join `franchisor_business_details` on `user_accounts`.`profile_str` = `franchisor_business_details`.`franchisor_id` where `user_accounts`.`profile_type` = 1 and `user_accounts`.`profile_status` != 1 and `user_accounts`.email != 'fiblbrands@franchiseindia.in' AND `user_accounts`.email != 'info@opportunityindia.com' limit ".$limit." offset " . $offset ;
}

//  $sqlhidden      = "select * from `user_accounts` inner join `franchisor_business_details` on `user_accounts`.`profile_str` = `franchisor_business_details`.`franchisor_id` where `user_accounts`.`profile_type` = 1 and `user_accounts`.`profile_status` != 1 and `user_accounts`.email != 'fiblbrands@franchiseindia.in' AND `user_accounts`.email != 'info@opportunityindia.com' AND `user_accounts`.created_at >= '2021-06-01'";
  
$queryhidden    = mysqli_query($link, $sqlhidden);
while ($rowhidden = mysqli_fetch_assoc($queryhidden)) {
    $_franchisorhidden = [
        'id' => $rowhidden['franchisor_id'],
        'name'=>replaceChar(($rowhidden['fran_manager'] ? $rowhidden['fran_manager'] : $rowhidden['ceo_name'])),
        'email'=>replaceChar($rowhidden['email']),
        'mobile'=>replaceChar($rowhidden['mobile']),
        'company'=> replaceChar($rowhidden['company_name']),
        'designation'=>replaceChar($rowhidden['occupation']),
        'country'=>replaceChar($rowhidden['country']),
        'state'=> replaceChar(array_search($rowhidden['state'], $stateArr) ? array_search($rowhidden['state'], $stateArr) : $rowhidden['state']),
        'city'=>replaceChar($rowhidden['city']),
        'address'=>replaceChar($rowhidden['fran_address']),
        'pincode'=>replaceChar($rowhidden['pincode']),
        'min_investment'=>replaceChar($rowhidden['unit_inv_min']),
        'max_investment'=>replaceChar($rowhidden['unit_inv_max']),
        'lead_type'=>48,
        'payment_history'=>$rowhidden['membership_type'],
        'category_interested' => replaceChar($mainCat[$rowhidden['ind_main_cat']]),
        'lead_source' => 4,
        'ip_address'=>'',
        'register_date'=>$rowhidden['verified_at'],
        'status'=>1,
    ];
    array_push($rowData, $_franchisorhidden);
}


echo json_encode($rowData);
die;
