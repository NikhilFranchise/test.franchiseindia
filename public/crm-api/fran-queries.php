<?php

include ('connection-file.php');

// visitor registration
if (!empty($date)) {
    $sql = "SELECT name, email, mobile, country, state, city, address, pincode, created_at  FROM ask_franchisor where `created_at` >= '".$date."'  limit " . $offset . "," . $limit;
}else{
    $sql = "SELECT name, email, mobile, country, state, city, address, pincode, created_at  FROM ask_franchisor limit " . $offset . "," . $limit;
}

$query = mysqli_query($link, $sql);

$stateArr = [""];
$rowData = [];
while ($row = mysqli_fetch_assoc($query)) {
    $_franchisor = [
        'name'=>replaceChar($row['name']),
        'email'=>replaceChar($row['email']),
        'mobile'=>replaceChar($row['mobile']),
        'company'=>"",
        'designation'=>"",
        'country'=>replaceChar($row['country']),
        'state'=> replaceChar((array_search($row['state'], $stateArr) ? array_search($row['state'], $stateArr) : $row['state'])),
        'city'=>replaceChar($row['city']),
        'address'=>replaceChar($row['address']),
        'pincode'=>replaceChar($row['pincode']),
        'min_investment'=>"",
        'max_investment'=>"",
        'lead_type'=>22,
        'payment_history'=>"",
        'category_interested' => "",
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