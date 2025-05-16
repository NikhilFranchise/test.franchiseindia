<?php

include ('connection-file.php');
include ('constants.php');

// visitor registration
$yesterday = new DateTime('yesterday');
$yesterdayDate = $yesterday->format('Y-m-d');
/*
if (!empty($date)) {
   $sql      = "select `franchisor_business_details`.franchisor_id, `user_accounts`.email, `user_accounts`.mobile, `user_accounts`.verified_at, `franchisor_business_details`.fran_manager, `franchisor_business_details`.ceo_name, `franchisor_business_details`.company_name, `franchisor_business_details`.country, `franchisor_business_details`.state, `franchisor_business_details`.city, `franchisor_business_details`.fran_address, `franchisor_business_details`.pincode, `franchisor_business_details`.unit_inv_min, `franchisor_business_details`.unit_inv_max, `franchisor_business_details`.ind_main_cat, `franchisor_business_details`.fran_manager, `franchisor_business_details`.`franchisor_id`, `franchisor_business_details`.`no_fran_outlets`, `franchisor_business_details`.`operations_start_year`, `franchisor_business_details`.`franchise_start_year`, `franchisor_business_details`.`unit_investment`, `franchisor_business_details`.`prop_area_min` from `user_accounts` inner join `franchisor_business_details` on `user_accounts`.`profile_str` = `franchisor_business_details`.`franchisor_id` where `user_accounts`.`profile_type` = 1 and `user_accounts`.`profile_status` = 1 and `user_accounts`.email != 'fiblbrands@franchiseindia.in' AND `user_accounts`.email != 'info@opportunityindia.com' and `user_accounts`.`created_at` >= '".$date."' limit ".$limit." offset " . $offset ;

}else{
  //  $sql      = "select `franchisor_business_details`.franchisor_id, `user_accounts`.email, `user_accounts`.mobile, `user_accounts`.verified_at, `franchisor_business_details`.fran_manager, `franchisor_business_details`.ceo_name, `franchisor_business_details`.company_name, `franchisor_business_details`.country, `franchisor_business_details`.state, `franchisor_business_details`.city, `franchisor_business_details`.fran_address, `franchisor_business_details`.pincode, `franchisor_business_details`.unit_inv_min, `franchisor_business_details`.unit_inv_max, `franchisor_business_details`.ind_main_cat, `franchisor_business_details`.fran_manager, `franchisor_business_details`.`franchisor_id`, `franchisor_business_details`.`no_fran_outlets`, `franchisor_business_details`.`operations_start_year`, `franchisor_business_details`.`franchise_start_year`, `franchisor_business_details`.`unit_investment`, `franchisor_business_details`.`prop_area_min` from `user_accounts` inner join `franchisor_business_details` on `user_accounts`.`profile_str` = `franchisor_business_details`.`franchisor_id` where `user_accounts`.`profile_type` = 1 and `user_accounts`.`profile_status` = 1 and `user_accounts`.email != 'fiblbrands@franchiseindia.in' AND `user_accounts`.email != 'info@opportunityindia.com' limit ".$limit." offset " . $offset ;
}
  // $sql      = "select `franchisor_business_details`.franchisor_id, `user_accounts`.email, `user_accounts`.mobile, `franchisor_business_details`.created_at,  `franchisor_business_details`.updated_at, `franchisor_business_details`.fran_manager, `franchisor_business_details`.ceo_name, `franchisor_business_details`.company_name, `franchisor_business_details`.country, `franchisor_business_details`.state, `franchisor_business_details`.city, `franchisor_business_details`.fran_address, `franchisor_business_details`.pincode, `franchisor_business_details`.unit_inv_min, `franchisor_business_details`.unit_inv_max, `franchisor_business_details`.ind_main_cat, `franchisor_business_details`.fran_manager, `franchisor_business_details`.`franchisor_id`, `franchisor_business_details`.`no_fran_outlets`, `franchisor_business_details`.`operations_start_year`, `franchisor_business_details`.`franchise_start_year`, `franchisor_business_details`.`unit_investment`, `franchisor_business_details`.`prop_area_min` from `user_accounts` inner join `franchisor_business_details` on `user_accounts`.`profile_str` = `franchisor_business_details`.`franchisor_id` where `user_accounts`.`profile_type` = 1 and `user_accounts`.`profile_status` = 1 and `user_accounts`.email != 'fiblbrands@franchiseindia.in' AND `user_accounts`.email != 'info@opportunityindia.com'";


$query    = mysqli_query($link, $sql);
$stateArr = $statesIndia;
$mainCat  = $CategoryArr;
$rowData  = [];

while ($row = mysqli_fetch_assoc($query)) {
	if($row['created_at'] == '0000-00-00 00:00:00'){
		$reg_date = $row['updated_at'];
	}else{
		$reg_date = $row['created_at'];
	}
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
        'payment_history'=>replaceChar($row['membership_type']),
        'concern_person'=>replaceChar($row['fran_manager']),
        'fihl_id'=>$row['franchisor_id'],
        'outlets'=>replaceChar($row['no_fran_outlets']),
        'establishment'=>replaceChar($row['operations_start_year']),	
        'started_years'=>replaceChar($row['franchise_start_year']),								
        'investment_range'=>replaceChar($row['unit_investment']),
        'area'=>replaceChar($row['prop_area_min']),												
        'category_interested' => replaceChar($mainCat[$row['ind_main_cat']]),
        'lead_source' => 5,
        'ip_address'=>'',
        'register_date'=>$reg_date,
        'status'=>1,
    ];
    array_push($rowData, $_franchisor);
}
*/
if (!empty($date)) {
  //  $sqlhidden      = "select `franchisor_business_details`.franchisor_id, `user_accounts`.email, `user_accounts`.mobile, `user_accounts`.verified_at, `franchisor_business_details`.fran_manager, `franchisor_business_details`.ceo_name, `franchisor_business_details`.company_name, `franchisor_business_details`.country, `franchisor_business_details`.state, `franchisor_business_details`.city, `franchisor_business_details`.fran_address, `franchisor_business_details`.pincode, `franchisor_business_details`.unit_inv_min, `franchisor_business_details`.unit_inv_max, `franchisor_business_details`.ind_main_cat from `user_accounts` inner join `franchisor_business_details` on `user_accounts`.`profile_str` = `franchisor_business_details`.`franchisor_id` where `user_accounts`.`profile_type` = 1 and `user_accounts`.`profile_status` != 1 and `user_accounts`.email != 'fiblbrands@franchiseindia.in' AND `user_accounts`.email != 'info@opportunityindia.com' and `user_accounts`.`created_at` >= '".$date."' limit ".$limit." offset " . $offset ;

}else{
   // $sqlhidden      = "select `franchisor_business_details`.franchisor_id, `user_accounts`.email, `user_accounts`.mobile, `user_accounts`.verified_at, `franchisor_business_details`.fran_manager, `franchisor_business_details`.ceo_name, `franchisor_business_details`.company_name, `franchisor_business_details`.country, `franchisor_business_details`.state, `franchisor_business_details`.city, `franchisor_business_details`.fran_address, `franchisor_business_details`.pincode, `franchisor_business_details`.unit_inv_min, `franchisor_business_details`.unit_inv_max, `franchisor_business_details`.ind_main_cat from `user_accounts` inner join `franchisor_business_details` on `user_accounts`.`profile_str` = `franchisor_business_details`.`franchisor_id` where `user_accounts`.`profile_type` = 1 and `user_accounts`.`profile_status` != 1 and `user_accounts`.email != 'fiblbrands@franchiseindia.in' AND `user_accounts`.email != 'info@opportunityindia.com' limit ".$limit." offset " . $offset ;
}

  $sqlhidden      = "select `franchisor_business_details`.franchisor_id, `user_accounts`.email, `user_accounts`.mobile, `user_accounts`.verified_at, `franchisor_business_details`.fran_manager, `franchisor_business_details`.ceo_name, `franchisor_business_details`.company_name, `franchisor_business_details`.country, `franchisor_business_details`.state, `franchisor_business_details`.city, `franchisor_business_details`.fran_address, `franchisor_business_details`.pincode, `franchisor_business_details`.unit_inv_min, `franchisor_business_details`.unit_inv_max, `franchisor_business_details`.ind_main_cat from `user_accounts` inner join `franchisor_business_details` on `user_accounts`.`profile_str` = `franchisor_business_details`.`franchisor_id` where `user_accounts`.`profile_type` = 1 and `user_accounts`.`profile_status` != 1 and `user_accounts`.email != 'fiblbrands@franchiseindia.in' AND `user_accounts`.email != 'info@opportunityindia.com' AND `user_accounts`.created_at LIKE '". $yesterdayDate ."%'";
  
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
        'lead_source' => 5,
        'ip_address'=>'',
        'register_date'=>$rowhidden['verified_at'],
        'status'=>1,
    ];
    array_push($rowData, $_franchisorhidden);
}


echo json_encode($rowData);
die;
