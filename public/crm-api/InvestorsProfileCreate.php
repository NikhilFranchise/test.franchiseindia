<?php
/*
include ('constants.php');

$linkfi = mysqli_connect('localhost', 'root', '$Z|d!$1:Dvsl>8E9n;c!', 'franchis_franchisnewcopy');

//echo crypt("9329301269");
//echo $sqlQuery = "SELECT `name`, `email`, `telephone`, `company`, `address`, `state`, `city`, `pincode`, `designation`, `ip_address` FROM fro_insta_register LIMIT 4300, 100 ";
echo $sqlQuery = "SELECT `name`, `email`, `phone`, `company`, `address`, `state`, `city`, `pincode`, `designation` FROM fievent_insta_reg WHERE payment_status = 'Y' LIMIT 1700, 200"; //need to start

echo "<br><br>";
//$sqlQuery = "SELECT name, email, phone, company, designation, state, city, address, pincode, client_ip FROM fievent_insta_reg WHERE instaID = '29868' AND payment_status = 'Y'";


$queryData = mysqli_query($linkfi, $sqlQuery);

while ($row = mysqli_fetch_assoc($queryData)) {
	$count = 0;
	
	$phone 		= $row['phone'];
	$email 		= $row['email'];
	$name 		= $row['name'];
	$company 	= $row['company'];
	$address 	= $row['address'];
	$state 		= $row['state'];
	$city 		= $row['city'];
	$pincode 	= $row['pincode'];
	$date 		= "now()";
	$uniqueStr  = 'FIHL' . mt_rand(1000000, 9999999);
	$sqlfihl    = "select profile_str from `user_accounts` where `profile_str` = '".$uniqueStr."'";
	$sqlfihlq   = mysqli_query($linkfi, $sqlfihl);
	$count1 	= mysqli_num_rows($sqlfihlq);
	if($count1) {
	  $uniqueStr = 'FIHL' . mt_rand(1000000, 9999999);	
	}
	if(!empty($phone) && !empty($email)) {  
		echo $sql   = "select user_id from `user_accounts` where `mobile` = '".$phone."' OR `email` = '".$email."'"; 
		$query = mysqli_query($linkfi, $sql);
		echo $count = mysqli_num_rows($query);
	//echo "test1";
		if($count == '0'){
		
		//echo "test2";
			echo $sql = "INSERT INTO `user_accounts` (`email`, `password`, `mobile`, `title`, `name`, `membership_type`, `membership_plan`, `profile_type`, `profile_status`, `profile_str`, `verified_at`, `reg_source`, `created_at`, `updated_at`) VALUES ('$email', '".password_hash($phone, PASSWORD_DEFAULT)."', '$phone', '1', '$name', '0', '401', '2', '1', '$uniqueStr', CURRENT_TIMESTAMP, 'DelhiExpo2025', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
			
			echo "<br>";
			$rest = mysqli_query($linkfi, $sql);
			if($rest) {
				echo $sql1 = "INSERT INTO `investor_details` (`investor_id`, `service_company_name`, `inv_address`, `inv_state`, `inv_city`, `inv_pincode`, `membership_type`, `total_credits`, `credit_limit`, `membership_plan`, `created_at`, `updated_at`) VALUES ('$uniqueStr', '$company', '$address', '$state', '$city', '$pincode', 0, 5, 5, 401, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
			echo "<br><hr>";				
				mysqli_query($linkfi, $sql1);
			}
		}else{
			echo $sql   = "UPDATE `user_accounts` SET `profile_status` = 1 where (`mobile` = '".$phone."' OR `email` = '".$email."') AND `profile_type` = 2"; 
			echo "<br>";
			$query = mysqli_query($linkfi, $sql);

		}
	}
}
*/
/*echo $sqlQuery = "SELECT `profile_str`, `created_at` FROM `user_accounts` WHERE `user_id` > 1137607";
echo "<br><br>";

$queryData = mysqli_query($linkfi, $sqlQuery);

while ($row = mysqli_fetch_assoc($queryData)) {
	$profile_str 		= $row['profile_str'];
	$created_at 		= $row['created_at'];
	echo $sql   = "UPDATE `user_accounts` SET updated_at = '".$created_at."' WHERE `profile_str` = '".$profile_str."' AND `user_id` > 1137607 LIMIT 1 "; 
	echo "<br>";
	$query = mysqli_query($linkfi, $sql);
}
*/
/*$subject = "BE YOUR OWN BOSS | Complete Your Profile to get 5 FREE CREDITS";
				$body = "";
				$body  .= "Hey ".$name."<br /><br />";
				$body  .= "Happy Franchising!<br /><br />"; 
				$body  .= 'We trust that you are looking for a Franchise, as you have participated in our EXPO organised by Franchise India. It\'s time to "BE YOUR OWN BOSS".<br /><br />';
				$body  .= "To show our appreciation for your interest and to help you kickstart your franchise journey through our <a href='https://www.franchiseindia.com' target='_blank'>Online Platform</a>, we're excited to offer you an <b>exclusive opportunity</b>! Simply <b>complete your profile up to 60%, and you'll receive 5 FREE CREDITS</b>.<br /><br />";
				$body  .= 'These credits represent <b>"5 exciting franchise opportunities"</b> waiting for you to explore. Log in to your account today and complete your profile to claim your 5 free credits.<br /><br />';
				$body  .= "<b><em>Some of the KEY BENEFITS of Online Registration</em>:-</b><br /><br />";
				$body  .= "<ul>
				<li>Finish your 60% profile to view the contact information of five different brands with <b><em>5 FREE CREDITS</em></b>.</li>
				<li>Moreover, finish up to 80% of your profile and get the contact information for an additional 2 brands of your choice.</li>
				<li>FREE sign-up for our newsletter (2 lakh+ subscribers)</li>
				<li>Gain fast access to the <b>\"My Account\"</b> dashboard to monitor <b>VIEWED BRANDS</b> and <b>EXPRESSED INTEREST</b>.</li>
				<li>Access to over 10,000 franchise possibilities across all categories.</li>
				<li>View and enquire about brands.</li>
				<li>Get the opportunity to launch a franchise of your own.</li>
				</ul><br />";
				$body  .= "An <a href='https://www.youtube.com/watch?v=f6HYmKW5KAc&t=4s' target='_blank'>Investor's Guide</a> to Franchiseindia.com<br/><br />";
				$body  .= "Franchise India is dedicated for providing a diverse selection of franchises spanning various industries and sectors. Our <a href='https://www.franchiseindia.com' target='_blank'>Online Platform</a> is designed to be your ultimate guide in discovering the vast world of business opportunities.<br/><br />";
				$body  .= "If you have any questions or need assistance along the way, please feel free to reach out.<br/><br />"; 
				$body  .= "Thank you once again for your interest in Franchise India. We're excited to be part of your franchise journey!<br/><br/><br />";

				$body  .= "Your Login details are lsited below:<br/><br/><br />";
				$body  .= "<b>Warm Regards,</b><br/>";	
				$body  .= "<b>Franchise India</b><br/>";
				$body  .= "Helpline: +91 8586891020<br/>";
				$body  .= "Email: Support@franchiseindia.net<br/>";
				$body  .= "<a href='https://www.franchiseindia.com' target='_blank'>www.franchiseindia.com</a>";*/
				
				//echo $body;
				//echo "<br><hr>";
				/*$mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch 
				//include_once("mailertemplates/VisitorPay.mailer.php");
				try {
					//$mail->AddCC('preetima@entrepreneurapj.com');
					$mail->AddBCC('techsupport@franchiseindia.net');
					$mail->SetFrom('no-reply@franchiseindia.com', 'Expo Admin');
					$mail->Subject = $subject;
					$mail->MsgHTML($body);
					$mail->Send();
				} catch (phpmailerException $e) {
					echo $e->errorMessage(); //Pretty error messages from PHPMailer
				} catch (Exception $e) {
					echo $e->getMessage(); //Boring error messages from anything else!
				}*/

?>