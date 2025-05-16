<?php

include ('connection-file.php');

// visitor registration
if (!empty($date)) {
    $sql   = "SELECT name, email, mobile, basedIn, statename, cityname, address, pincode, want, create_date FROM contact_us where `create_date` >= '".$date."' limit " . $offset . "," . $limit;
}else{
    $sql   = "SELECT name, email, mobile, basedIn, statename, cityname, address, pincode, want, create_date FROM contact_us limit " . $offset . "," . $limit;
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
        'country'=>replaceChar($row['basedIn']),
        'state'=> replaceChar((array_search($row['statename'], $stateArr) ? array_search($row['statename'], $stateArr) : $row['statename'])),
        'city'=>replaceChar($row['cityname']),
        'address'=>replaceChar($row['address']),
        'pincode'=>replaceChar($row['pincode']),
        'min_investment'=>"",
        'max_investment'=>"",
        'lead_type'=>12,
        'payment_history'=>"",
        'category_interested' => replaceChar($row['want']),
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