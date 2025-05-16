<?php

#OPI DATABASE 
$OPI_SERVER = "15.207.116.203";
$OPI_USER = "stgoppindb";
$OPI_PASSWORD = "FirstJava1157";
$DB_PORT = "3306";

#FI DATABASE
$FI_SERVER = "localhost";
$FI_USER = "franchis_copydba";
$FI_PASSWORD = "FR@c,Iai2Q74";

echo "<pre>";

$conn_fr = new mysqli($FI_SERVER, $FI_USER, $FI_PASSWORD, "franchis_franchisnewcopy");

// Check connection
if ($conn_fr->connect_error) {
  die("FI DB Connection failed: " . $conn_fr->connect_error);
}
echo "FI DB Connected successfully \n";
//$where="fran_detail_id ='10505'";

// Create connection

$conn_opi = new mysqli($OPI_SERVER, $OPI_USER, $OPI_PASSWORD, "opi", $DB_PORT);
if (!$conn_opi) {
    die('OPI DB Connect Error: ' . $conn_opi->connect_error);
}
echo "OPI DB Connected successfully \n";


$brands = $conn_opi->query("SELECT franchise_id,brand_id FROM brands");
while($brand = $brands->fetch_object()) {
	echo $sql = "SELECT * FROM express_fran_insta_apply WHERE franchisor_id ='".$brand->franchise_id."'";
	$results = $conn_fr->query($sql);
	if ($results->num_rows > 0) {
	  // output data of each row
	  while($row = $results->fetch_assoc()) {
	  	
	  	$is_exists=$conn_opi->query("SELECT * FROM leads WHERE fi_id ='".$row['id']."'");
	  	if($is_exists->num_rows>0){
	  		continue;
	  	}
	  	//print_r($row);
	  	//echo "SELECT * FROM users WHERE phone='".$row['phone']."'";
		$user_rs=$conn_opi->query("SELECT * FROM users WHERE mobile='".$row['phone']."'");
		if($user_rs->num_rows>0){
			$user=$user_rs->fetch_object();
			$userId=$user->id;
		}else{
			$conn_opi->query("INSERT into users SET 
				email='".$row['email']."',
				mobile='".$row['phone']."',
				name='".$row['name']."',
				user_type='buyer',
				is_active ='1',
				api_token='',
				activated_at='".$row['create_date']."',
				created_at='".$row['create_date']."',
				updated_at ='".$row['create_date']."'");
			$userId=mysqli_insert_id($conn_opi);
		}

		$insert="INSERT INTO leads SET 
			user_id='".$userId."',
			lead_type='direct',
			status='2',
			updated_at ='".$row['create_date']."',
			created_at='".$row['create_date']."',
			fi_id='".$row['id']."'";

		$conn_opi->query($insert);
		$leadId=mysqli_insert_id($conn_opi);
		
		$leadDetails=[
			'investement'=>$row['investment'],
			'city'=>$row['city'],
			'state'=>$row['state'],
			'pincode'=>$row['pincode'],
			'country'=>$row['country'],
			'address'=>$row['address'],
			'location'=>$row['investment_location'],
			'invest_timeframe'=>$row['invest_timeframe'],
		];

		foreach($leadDetails as $key=>$value){
			$sql="INSERT INTO leads_details SET lead_id='".$leadId."',attribute_name='".$key."',attribute_value='".$value."'";
			$conn_opi->query($sql);
		}
		
		$sql="INSERT INTO leads_supplier SET lead_id='".$leadId."',supplier_id='".$brand->brand_id."',mapping_timestamp=now()";
		$conn_opi->query($sql);
	  }
	} else {
	  //echo "0 results";
	}
}
$conn_fr->close();

echo "-------End------";

?>
