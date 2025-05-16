<?php

include ('connection-file.php');
include ('constants.php');

// visitor registration
if (!empty($date)) {
   // $sql   = "select * from `user_accounts` where  `profile_type` = 2 and `profile_status` = 1 and `created_at` >='".$date."' limit ".$limit." offset " . $offset ;
	$sql   = "select name, email, mobile, membership_type, profile_str, created_at, updated_at from `user_accounts` where  `profile_type` = 2 AND `mobile` != '' AND (`created_at` >='".$date."' OR `updated_at` >='".$date."') limit ".$limit." offset " . $offset ;   
}else{
   $sql   = "select email, mobile, membership_type, profile_str, created_at, updated_at from `user_accounts` where  `profile_type` = 2 AND `mobile` != '' limit ".$limit." offset " . $offset ;	
}
//$sql   = "select email, mobile, membership_type, profile_str, created_at, updated_at from `user_accounts` where  `profile_type` = 2 AND `mobile` != '' AND `created_at` > '2024-07-17'" ;
$query = mysqli_query($link, $sql);
$stateArr = $statesIndia;
$mainCat = $CategoryArr;
$rowData = [];

while ($row = mysqli_fetch_assoc($query)) {



    $investorSql = "select `investor_id`, `industry_business`, `occupation`, `inv_country`, `inv_state`, `inv_city`, `inv_address`, `inv_pincode`, `investment_min`, `investment_max` from `investor_details` where `investor_id` = '".$row['profile_str']."' AND (`source_type` = '' OR `source_type` IS NULL) limit 1" ;
    $invquery    = mysqli_query($link, $investorSql);
	$numrows = mysqli_num_rows($invquery);
    $invRow      = mysqli_fetch_row($invquery);
	if($numrows > 0){

        $industries = "";
        $sql1       = "SELECT * FROM investor_industries WHERE `investor_id` = '" . $row['profile_str'] . "'";
        $query1     = mysqli_query($link, $sql1);

        while ($row1 = mysqli_fetch_assoc($query1)) {
            $industries .= $mainCat[$row1['ind_main_cat']] . ",";
            $industries = rtrim($industries, ',');
        }

        $_investor = [
            'name' => replaceChar($row['name']),
            'email' => replaceChar($row['email']),
            'mobile' => replaceChar($row['mobile']),
            'company' => replaceChar($invRow[1]),
            'designation' => replaceChar($invRow[2]),
            'country' => replaceChar($invRow[3]),
            'state' => replaceChar((array_search($invRow[4], $stateArr) ? array_search($invRow[4], $stateArr) : $invRow[4])),
            'city' => replaceChar($invRow[5]),
            'address' => replaceChar($invRow[6]),
            'pincode' => replaceChar($invRow[7]),
            'min_investment' => replaceChar($invRow[8]),
            'max_investment' => replaceChar($invRow[9]),
            'lead_type' => 2,
            'payment_history' => $row['membership_type'],
            'category_interested' => replaceChar($industries),
            'lead_source' => 4,
            'ip_address' => '',
            'register_date' => $row['updated_at'],
            'status' => 1,
        ];
        array_push($rowData, $_investor);
    }
}

echo json_encode($rowData);
die;

?>