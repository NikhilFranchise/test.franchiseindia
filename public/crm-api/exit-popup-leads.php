<?php

include ('connection-file.php');
include ('constants.php');

// visitor registration
if (!empty($date)) {
    $sql   = "SELECT email, phone_no, created_at FROM popup_leads limit where `time` >='".$date."' " . $offset . "," . $limit;
}else{
    $sql   = "SELECT email, phone_no, created_at FROM popup_leads limit  " . $offset . "," . $limit;
}

$query = mysqli_query($link, $sql);

$rowData = [];
while ($row = mysqli_fetch_assoc($query)) {
    $_franchisor = [
        'name'=>replaceChar($row['name']),
        'email'=>replaceChar($row['email']),
        'mobile'=>replaceChar($row['phone_no']),
        'company'=>"",
        'designation'=>"",
        'country'=>"",
        'state'=> "",
        'city'=>"",
        'address'=>"",
        'pincode'=>"",
        'min_investment'=>"",
        'max_investment'=>"",
        'lead_type'=>32,
        'payment_history'=>"",
        'category_interested' => "",
        'lead_source' => 4,
        'ip_address'=>'',
        'register_date'=>replaceChar($row['created_at']),
        'status'=>1,
    ];
    array_push($rowData, $_franchisor);
}

echo json_encode($rowData);


die;

?>