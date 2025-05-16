<?php
$pdo1 = new mysqli("localhost", "root", '$Z|d!$1:Dvsl>8E9n;c!', "franchise_dealer_db");
if ($pdo1->connect_error) {
    die("Connection failed: " . $pdo1->connect_error);
}
echo "Connected successfully \n";
$pdo2 =new mysqli("localhost", "root", '$Z|d!$1:Dvsl>8E9n;c!', "franchis_franchisnewcopy");
if ($pdo2->connect_error) {
    die("Connection failed: " . $pdo2->connect_error);
}
$pdo2->query("SET sql_mode = ''");
echo "Connected successfully2 \n";

function _get_buyer_profile($email) {
    $pdo2 =new mysqli("localhost", "root", '$Z|d!$1:Dvsl>8E9n;c!', "franchis_franchisnewcopy");
    $bProfile = $pdo2->query("SELECT profile_str From user_accounts where email = '$email'");
    $buyer = $bProfile->fetch_object();
    $buyerProfile = $buyer->profile_str; 
    return $buyerProfile;

}

//$lead = $pdo1->query("SELECT u.email  From users as u INNER JOIN leads as l ON u.id = l.user_id INNER JOIN leads_supplier as ls ON l.lead_id = ls.lead_id INNER JOIN brands as b ON ls.supplier_id = b.brand_id WHERE u.id = 497902");
$leads = $pdo1->query("SELECT u.id, u.email, l.lead_id, l.is_hidden, l.created_at, ls.supplier_id, b.user_id as fuid, fu.email as fuid_email From users as u INNER JOIN leads as l ON u.id = l.user_id INNER JOIN leads_supplier as ls ON l.lead_id = ls.lead_id INNER JOIN brands as b ON ls.supplier_id = b.brand_id INNER JOIN users as fu ON b.user_id = fu.id WHERE u.id IN ('232986', '236157', '239108', '245643', '249357', '251970', '232834', '278471', '290283', '292346', '293067', '295675', '306067', '309255', '304900', '312986')");
while ($lead = $leads->fetch_object()) { print_r($lead);// exit;
    $hidden = $lead->is_hidden;
    if($hidden == 'Y') {
        $hid = 0;
    } else {
        $hid = 1;
    }
    echo $buyerProfile       = _get_buyer_profile($lead->email); //exit;
    echo $investorProfile    = _get_buyer_profile($lead->fuid_email);
    $email                                  =  $lead->email;
    $ad_ID                                  =  "";
    $investor_id                            =  $buyerProfile;
    $franchisor_id                          =  $investorProfile;
    $expressInt                             =  "Y";
    $visibility                             =  $hid;
    $franchisor_visibility                  =  $hid;
    $franchisor_visibility_date             =  $lead->created_at;
    $visit_date                             =  $lead->created_at;

	echo "INSERT INTO useractivity (email,ad_ID,investor_id,franchisor_id,expressInt,visibility,franchisor_visibility,franchisor_visibility_date,visit_date) VALUES ('$email','$ad_ID','$investor_id','$franchisor_id','$expressInt','$visibility','$franchisor_visibility','$franchisor_visibility_date','$visit_date')";
	
    $user_activity = $pdo2->query("INSERT INTO useractivity (email,ad_ID,investor_id,franchisor_id,expressInt,visibility,franchisor_visibility,franchisor_visibility_date,visit_date) VALUES ('$email','$ad_ID','$investor_id','$franchisor_id','$expressInt','$visibility','$franchisor_visibility','$franchisor_visibility_date','$visit_date')");
		
}
$pdo1->close();
$pdo2->close();
?>
