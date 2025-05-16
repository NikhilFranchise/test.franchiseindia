<?php

include ('connection-file.php');
include ('constants.php');

// visitor registration

if (!empty($date)) {
    $sql   = "SELECT name, email, phone, time FROM feedback_list limit where `time` >='".$date."' " . $offset . "," . $limit;
}else{
    $sql   = "SELECT name, email, phone, time FROM feedback_list limit  " . $offset . "," . $limit;
}

$query = mysqli_query($link, $sql);

$stateArr = $statesIndia;
$rowData = [];
while ($row = mysqli_fetch_assoc($query)) {
    $sitecode = 4;
    if($row['site_type'] == "edu")
        $sitecode = 11;
    if($row['site_type'] == "wi")
        $sitecode = 22;
    if($row['site_type'] == "ri")
        $sitecode = 8;


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
        'pincode'=>$row['pincode'],
        'min_investment'=>"",
        'max_investment'=>"",
        'lead_type'=>11,
        'payment_history'=>"",
        'category_interested' => "",
        'lead_source' => $sitecode,
        'ip_address'=>'',
        'register_date'=>$row['time'],
        'status'=>1,
    ];
    array_push($rowData, $_franchisor);
}

echo json_encode($rowData);


die;

?>