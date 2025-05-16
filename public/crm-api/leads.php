<?php

include ('connection-file.php');
include ('constants.php');

// visitor registration
if (!empty($date)) {
    $sql = "SELECT name, email, phone, country, state, city, address, pincode, category, create_date  FROM express_fran_insta_apply where `create_date` >= '".$date."'  limit " . $offset . "," . $limit;
}else{
    $sql = "SELECT name, email, phone, country, state, city, address, pincode, category, create_date  FROM express_fran_insta_apply limit " . $offset . "," . $limit;
}

$query = mysqli_query($link, $sql);

$stateArr = $statesIndia;
$rowData = [];

while ($row = mysqli_fetch_assoc($query)) {
    
    $_franchisor = [
        'name'=>replaceChar($row['name']),
        'email'=>replaceChar($row['email']),
        'mobile'=>replaceChar($row['phone']),
        'company'=>"",
        'designation'=>"",
        'country'=>replaceChar($row['country']),
        'state'=> replaceChar((array_search($row['state'], $stateArr) ? array_search($row['state'], $stateArr) : $row['state'])),
        'city'=>replaceChar($row['city']),
        'address'=>replaceChar($row['address']),
        'pincode'=>replaceChar($row['pincode']),
        'min_investment'=>"",
        'max_investment'=>"",
        'lead_type'=>9,
        'payment_history'=>"",
        'category_interested' => replaceChar($row['category']),
        'lead_source' => 4,
        'ip_address'=>'',
        'register_date'=>$row['create_date'],
        'status'=>1,
    ];
    
    array_push($rowData, $_franchisor);
}
echo json_encode($rowData);
die;

?>