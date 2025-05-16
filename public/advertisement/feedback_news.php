<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('./../sparkpostphpcurl/sparkpost-api.php');
$conn = mysqli_connect("localhost", "root", '$Z|d!$1:Dvsl>8E9n;c!', "franchis_franchisnewcopy");


if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
/*
function saveAPI($fullname,$email_id,$mobile_no,$lead_source,$business_vertical,$category,$brand_id,$city,$state,$investment_range,$event_lead_flag,$txtothercity,$lead_type) {
	## service section start ##
	$requestParamList=array();
	$createLongUrl="";
	$requestParamList['fullname']=trim($fullname);
	$requestParamList['email_id']=trim($email_id);
	$requestParamList['mobile_no']=trim($mobile_no);
	$requestParamList['city']=trim($city);
	$requestParamList['state']=trim($state);
	// Source //
	$requestParamList['lead_source']=trim($lead_source);
	// Business Vertical //
	$requestParamList['business_vertical']=trim($business_vertical);
	// CategoryFranchise//
	$requestParamList['category']=trim($category);
	// Brand //
	$requestParamList['brand_id']=trim($brand_id);
	// Investment Range//
	$requestParamList['investment_range']=trim($investment_range);
	// Event Flag //
	$requestParamList['event_lead_flag']=trim($event_lead_flag);
	// if lead coming from brand landing page then this//
	$requestParamList['lead_type_name']="2";
	// else if lead coming for IA then //
	//$requestParamList['lead_type_name']="1";
	$paramjson=json_encode($requestParamList,true);
	//echo $paramjson;die;
	$curl = curl_init();
	curl_setopt_array($curl, array(
	CURLOPT_URL => "http://fiblcrm.franchiseindia.in/api_new_lead",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => $paramjson,
	CURLOPT_HTTPHEADER => array(
	"cache-control: no-cache",
	"content-type: application/json",
	"postman-token: 480d2213-c7a2-5625-2fca-887ed3438c1e"
	),
	));
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $response;
	}
}*/
// Initialize varibales
$franSendName  = '';
$franSendAdd   = '';
$City          = '';
$franSendEmail = '';
$franSendPhone = '';
$apply         = '';
$source        = '';
$timeframe     = '';
$bbackground   = '';
$propertype    = '';
$investment    = '';
$business      = '';
$industry      = '';
$franSendDet   = '';

if (isset($_POST['franSendName']))
    $franSendName = $_POST['franSendName'];
if (isset($_POST['franSendAdd']))
    $franSendAdd = $_POST['franSendAdd'];
if (isset($_POST['city']))
    $City = $_POST['city'];
if (isset($_POST['franSendEmail']))
    $franSendEmail = $_POST['franSendEmail'];
if (isset($_POST['franSendPhone']))
    $franSendPhone = $_POST['franSendPhone'];
if (isset($_POST['apply']))
    $apply = $_POST['apply'];
if (isset($_POST['source']))
    $source = $_POST['source'];


if (isset($_POST['timeframe']))
  $timeframe = $_POST['timeframe'];
if (isset($_POST['bbackground']))
  $bbackground = $_POST['bbackground'];
if (isset($_POST['propertype']))
  $propertype = $_POST['propertype'];
if (isset($_POST['investment']))
  $investment = $_POST['investment'];
if (isset($_POST['business']))
  $business = $_POST['business'];
if (isset($_POST['industry']))
  $industry = $_POST['industry'];
if (isset($_POST['franSendDet']))
  $franSendDet = $_POST['franSendDet'];
if (isset($_POST['company_name']))
  $company_name = $_POST['company_name'];

$apply1 = $apply." : "."$franSendDet";
$email_validation = 1;


if ($apply != "" && $franSendEmail != "" && $email_validation==1) { //if condition to check brand & valid email address

/*
$qry = "INSERT INTO `look_for_fran` SET 
					`name`			= $franSendName, 
					`add`			= $franSendAdd,
					`city`			= $City,
					`email`		    = $franSendEmail,
					`phone`			= $franSendPhone,
					`details`		= $apply1,
					`event_name`	= $apply,
					`ref_source`	= $source,
					`time_frame`	= $timeframe,
					`business_background`	= $bbackground,
					`property`		= $propertype,
					`investment`	= $investment,
					`business`		= $business,
					`industry`		= $industry,
					`date`      	= now()";*/
$qry = "INSERT INTO look_for_fran (`name`, `add`, `city`, `email`, `phone`, `details`, `event_name`, `company`, `ref_source`, `time_frame`, `business_background`, `property`, `investment`, `business`, `industry`, `date`)
      VALUES ('$franSendName', '$franSendAdd', '$City', '$franSendEmail', '$franSendPhone', '$apply1', '$apply', '$company_name', '$source', '$timeframe', '$bbackground', '$propertype', '$investment', '$business', '$industry', NOW())";

$rs = mysqli_query($conn, $qry);

if(strcmp($apply,"Estate-Subscription")==0 || strcmp($apply,"SME-Subscription")==0 || strcmp($apply,"TFW-EW-Subscription")==0 || strcmp($apply,"Retailer-SME-Subscription")==0 || strcmp($apply,"TFW-Subscription")==0 || strcmp($apply,"Retailer-Subscription")==0 || strcmp($apply,"TFW-Retailer-Subscription")==0 || strcmp($apply,"TFW-SME-Subscription")==0 || strcmp($apply,"TFW-SME-Retailer-Subscription")==0 || strcmp($apply,"Diwali-Subscription")==0 || strcmp($apply,"Valentine-Subscription")==0)
{
$query1="INSERT INTO magazine_subscribe(sub_id,name,email,company,address,country,telephone,magazine,amount,payment_mode,payment_status,order_type,submitted_date,
lead_source) VALUES('','$franSendName','$franSendEmail','$apply1','$franSendAdd','$City-India','$franSendPhone','$apply','$investment','CHEQUE','N','Magazine',
NOW(),'E')"; 
$result1 = mysqli_query($conn,$query1);
}
mysqli_close($conn);

/*
// create database connection for fiblcrm
$conn1 = mysqli_connect("103.35.121.234", "franchin_fibl_cr", "[+Lv5s0u(YSk", "franchin_fibl_crm");

 
    $query = " select bid, uid from fiblcrm_brand where brand = '".trim($apply)."' LIMIT 1 ";
     $result = mysqli_query($conn1,$query);

	 while($row = mysqli_fetch_assoc($result)) {
		  $details[] = $row;
      }

     if(count($details) > 0) {  // brand already exists, then assign lead to FIBL_CRM
	         //get user details
             $queryUser = " select * from fiblcrm_user where uid = '".$details[0]['uid']."' ";
             $resultUser = mysqli_query($conn1,$queryUser);
			 while($row = mysqli_fetch_assoc($resultUser)) {
				  $detailsUser[] = $row;
			  }
		if($source == "SMS"){
			$lsource = 20;
		}else{
			$lsource = 8;
		}
   		//saveAPI($franSendName, $franSendEmail, $franSendPhone, $lsource, $detailsUser[0]['user_vertical'], $industry, $details[0]['bid'], $City, '', $investment, $event_lead_flag, $City, '1');
   
        $queryInsertLead  = " INSERT INTO fiblcrm_lead (`client`, `desc`, `mobile`, `email`, `sid`, `stage`, `rating`, `vid`, `bid`, `state`, ";
        $queryInsertLead .= " `city`, `address`, `pincode`, `investment`, `profession`, `industry`, `remarks`, `assign_to`, `assign_by`, `created_by`, `open_date`, `follow_up`, `create_date`, `status`) ";
        $queryInsertLead .=	"  values('".$franSendName."', '".$apply."', '".$franSendPhone."', '".$franSendEmail."', '".$lsource."', '9', '', '".$detailsUser[0]['user_vertical']."', ";
        $queryInsertLead .=	" '".$details[0]['bid']."', '', '".$City."', '".$franSendAdd."', '', '".$investment."', '".$business."', '".$industry."', '".$franSendDet."', '".$details[0]['uid']."', ";
        $queryInsertLead .=	" '0', '0', now(), '', now(), 'A') "  ;
		mysqli_query($conn1,$queryInsertLead);  // insert new lead


       // if brand exists in FIBLCRM, then fetch user details and assign leads to him

    $title="Lead inserted in FIBLCRM";
	$fromText="feedback@franchiseindia.com";
	$subjectText='Lead inserted in FIBLCRM';
	$toText = 'fihlbounce@gmail.com'; //','.$detailsUser[0]['uemail'];  // add email id's need to add here

$msgText="<table width=50% border=0 align=center cellpadding=2 cellspacing=2 style='font-family:verdana; color:#FF0000; border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC;'>
  <tr> 
    <td colspan=2><h5 style='margin: 0px;	padding: 0px;'>      ".$apply." </h5></td>
  </tr>
  <tr> 
    <td width=32% valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'>Assigned to:</td>
    <td width=68% valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$detailsUser[0]['uname']."</td>
  </tr>
</table>";

$msgTextfull="<table width=50% border=0 align=center cellpadding=2 cellspacing=2 style='font-family:verdana; color:#FF0000; border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC;'>
  <tr> 
    <td colspan=2><h5 style='margin: 0px;	padding: 0px;'>      ".$apply." </h5></td>
  </tr>
  <tr> 
    <td width=32% valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'>Name:</td>
    <td width=68% valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["franSendName"]."</td>
  </tr>
  <tr> 
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'>Address:<br> </td>
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["franSendAdd"]."</td>
  </tr>
  <tr> 
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'> 
      City: </td>
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["city"]."</td>
  </tr>
  <tr> 
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'>Email:<br> </td>
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["franSendEmail"]."</td>
  </tr>
  <tr> 
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'>Phone:</td>
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["franSendPhone"]."</td>
  </tr>
  <tr> 
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'>Investment Capacity:</td>
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["investment"]."</td>
  </tr>
  <tr> 
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'>Business/Profession:</td>
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["business"]."</td>
  </tr>
  <tr> 
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'>Industry Interest:</td>
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["industry"]."</td>
  </tr>
  <tr> 
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'> 
      Details: </td>
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["apply"]."<br> ".$_POST["franSendDet"]."</td>
  </tr></table>";

} else {  // in not a brand in CRM
if(strcmp($apply,"Test")==0)
{
$gp="techsupport@franchiseindia.com";
}
*/
if(strcmp($apply,"ISE-MAPP")==0 || strcmp($apply,"ISE-Seacret")==0 || strcmp($apply,"ISE-Ment-e-Soul")==0 || strcmp($apply,"ISE-Wig-O-Mania")==0 || strcmp($apply,"ISE-Hocky-Pockey")==0 || strcmp($apply,"ISE-Yogurberry")==0 || strcmp($apply,"ISE-Buzz")==0 || strcmp($apply,"ISE-San-Churro")==0 || strcmp($apply,"ISE-Grescasa-Ceremics")==0 || strcmp($apply,"ISE-Ritu-Kumar")==0 || strcmp($apply,"ISE-Safira")==0 || strcmp($apply,"ISE-Addons")==0 || strcmp($apply,"ISE-Dial-Desk")==0 || strcmp($apply,"ISE-Moti-Mahal")==0 || strcmp($apply,"ISE-YoChina")==0 || strcmp($apply,"ISE-CookieMan")==0 || strcmp($apply,"ISE-Gelato")==0 || strcmp($apply,"ISE-FrameBoxx")==0 || strcmp($apply,"ISE-Dentistree")==0 || strcmp($apply,"ISE-Mystic-Spa")==0 || strcmp($apply,"ISE-Tatha")==0 || strcmp($apply,"ISE-CookScape")==0 || strcmp($apply,"ISE-Levoon")==0 || strcmp($apply,"ISE-Sky-Deelz")==0 || strcmp($apply,"ISE-Main-Khadi-Hoon")==0 || strcmp($apply,"ISE-D-ZA")==0 || strcmp($apply,"ISE-Beebay-Kids")==0 || strcmp($apply,"ISE-Titan-Eye-Plus")==0 || strcmp($apply,"ISE-Kent")==0 || strcmp($apply,"ISE-Coffee-Bean")==0 || strcmp($apply,"ISE-Bionic-Hospitality")==0 || strcmp($apply,"ISE-La-Salle")==0 || strcmp($apply,"ISE-Juice-Salon")==0 || strcmp($apply,"ISE-786-Dance-School")==0 || strcmp($apply,"ISE-MRV")==0 || strcmp($apply,"ISE-Stat-Varsity")==0 || strcmp($apply,"IAQ-Hocky-Pockey")==0 || strcmp($apply,"IAQ-Pizza-Vito")==0 || strcmp($apply,"IAQ-YoChina")==0 || strcmp($apply,"IAQ-Yogurberry")==0 || strcmp($apply,"IAQ-Coffee-Bean")==0 || strcmp($apply,"IAQ-Franmatch")==0) 
{
$gp="kunal@franchiseindia.in";
}
if(strcmp($apply,"FIBL-LAHS")==0 || strcmp($apply,"FIBL-Skyline-Business-School")==0 || strcmp($apply,"FIBL-Mothers-Touch")==0 || strcmp($apply,"FIBL-Apollo")==0 || strcmp($apply,"FIBL-Spinx-Body-Studio")==0)
{
$gp="tsanchita@franchiseindia.in";
}
if(strcmp($apply,"Sportybeans")==0)
{
$gp="franchising@sportybeans.com";
}
if(strcmp($apply,"IGMPI")==0)
{
$gp="info@igmpiindia.org";
}
if(strcmp($apply,"Frontier-Biscuit")==0)
{
$gp="connect@frontierbiscuit.com";
}
if(strcmp($apply,"AcadGild")==0)
{
$gp="rohit@acadgild.com,madhukar@acadgild.com";
}
if(strcmp($apply,"Contentmart")==0)
{
$gp="vikas@contentmart.com, rahul@contentmart.com";
}
if(strcmp($apply,"3M-Car-Care")==0)
{
$gp="3mcarcare.in@mmm.com";
}
if(strcmp($apply,"Krishna-Consultants")==0)
{
$gp="krishnabd@studies-overseas.com";
}
if(strcmp($apply,"PC-Jeweller")==0)
{
$gp="neeraj.nagpal@pcjeweller.com";
}
if(strcmp($apply,"Punjabi-Chaap-Corner")==0)
{
$gp="info.punjabichaapcorner@gmail.com";
}
if(strcmp($apply,"Dr-Paul-Multispecialty-Clinic")==0)
{
$gp="franchise@drpaulsonline.com";
}
if(strcmp($apply,"PayU-Money")==0)
{
$gp="arun.pandit@payu.in";
}
if(strcmp($apply,"Soles-Fashion")==0)
{
$gp="deepika@solesshoes.com";
}
if(strcmp($apply,"Junior-Delhi-Public-School")==0)
{
$gp="Sara@juniordps.com";
}
if(strcmp($apply,"Franchise-India-Videos")==0)
{
$gp="schandrashekhar@franchiseIndia.net";
}
if(strcmp($apply,"Team-Indianink")==0)
{
$gp="prashant@suditi.in";
}
if(strcmp($apply,"Starcentres")==0)
{
$gp="contact@starcentres.com";
}
if(strcmp($apply,"Shanti-Hopskotch")==0)
{
$gp="amit.malik@shantihopskotch.com";
}
if(strcmp($apply,"LXL-Ideas-Pvt-Ltd")==0)
{
$gp="chironjit@lxl.in";
}
if(strcmp($apply,"I-Love-Baby-Cakes")==0)
{
$gp="Ilovebabycakes09@yahoo.com";
}
if(strcmp($apply,"Wurfel-Kuche")==0)
{
$gp="expansion@wurfel.in ";
}
if(strcmp($apply,"Zero-Reality-VR")==0)
{
$gp="prash@zerorealityvr.com";
}
if(strcmp($apply,"American-Kidz-Play-School")==0)
{
$gp="amodaiel365@gmail.com";
}
if(strcmp($apply,"Manhattan-Review")==0)
{
$gp="support@indiamr.com";
}
if(strcmp($apply,"JSB-Health")==0)
{
$gp="sales@jsbhealthcare.com";
}
if(strcmp($apply,"The-American-Connection-Diner")==0)
{
$gp="info.twinchefs@gmail.com";
}
if(strcmp($apply,"Clarks-India")==0)
{
$gp="manish.rana@clarks.in";
}
if(strcmp($apply,"Manipal-ProLearn")==0)
{
$gp="partners@manipalprolearn.com";
}
if(strcmp($apply,"BOS-C-Main-Frame-Energy-Solutions")==0)
{
$gp="info@mfenergysolutions.com";
}
if(strcmp($apply,"Free-Food")==0)
{
$gp="info@freefood.co.in";
}
if(strcmp($apply,"Ferns-N-Petals-Bangalore")==0)
{
$gp="anil@fnp.com";
}
if(strcmp($apply,"Wonder-Education")==0)
{
$gp="info@wondereducation.com";
}
if(strcmp($apply,"Paathshala-Learning-Solutions")==0)
{
$gp="info@paathshala.biz";
}
if(strcmp($apply,"Ferns-N-Petals-Mumbai")==0)
{
$gp="anil@fnp.com";
}
if(strcmp($apply,"ISIRI-Agro-Private-Limited")==0)
{
$gp="udaykumar@isiriagro.com";
}
if(strcmp($apply,"Manya-Education-Pvt-Ltd")==0)
{
$gp="himanshu.matta@manyagroup.com,franchise@manyagroup.com";
}
if(strcmp($apply,"Cafe-Chocolicious")==0)
{
$gp="franchise@cafechocolicious.com";
}
if(strcmp($apply,"Vidyamandir-Classes")==0)
{
$gp="nitin.duseja@vidyamandir.com";
}
if(strcmp($apply,"Drama-Salon")==0)
{
$gp="info@dramasalon.co.in";
}
if(strcmp($apply,"TRRAIN")==0)
{
$gp="pallavi.nagesh@trrain.org";
}
if(strcmp($apply,"British-Academy-for-English-Language")==0)
{
$gp="info@bafel.co.in";
}
if(strcmp($apply,"Professional-Marketing-Group")==0)
{
$gp="ravimittal@pmgbangalore.com";
}
if(strcmp($apply,"IMS-India")==0)
{
$gp="franchise@imsindia.com,dwijbs@gmail.com";
}
if(strcmp($apply,"Meritnation")==0)
{
$gp=" franchise@meritnation.com";
}
if(strcmp($apply,"NIIT-Limited")==0)
{
$gp="kapil.sharma@niit.com";
}
if(strcmp($apply,"SQAC-CERTIFICATION")==0)
{
$gp=" franchise@sqac.in";
}
if(strcmp($apply,"Starcentres")==0)
{
$gp=" contact@starcentres.com";
}
if(strcmp($apply,"Jaybhavani-Vadapav")==0)
{
$gp="jbfranchisee@gmail.com";
}
if(strcmp($apply,"Kids-Age")==0)
{
$gp="info@kidsage.in";
}
if(strcmp($apply,"Oriental-Cuisines")==0)
{
$gp="techsupport@franchiseindia.com";
}
if(strcmp($apply,"The-British-Institutes")==0)
{
$gp="franchisee@thebritishinstitutes.com";
}
if(strcmp($apply,"Cliniminds")==0)
{
$gp="info@cliniminds.com";
}
if(strcmp($apply,"DN-Regalia-Beyondsquarefeet")==0)
{
$gp="leasing@beyondsquarefeet.com";
}
if(strcmp($apply,"Tea-Trails")==0)
{
$gp="vishal@tea-trails.com";
}
if(strcmp($apply,"Taj-Eduglobe-Ltd")==0)
{
$gp="leads@tajeduglobe.com";
}
if(strcmp($apply,"Span-Apparel")==0)
{
$gp="bd.span@hotmail.com; franchisee.span@hotmail.com";
}
if(strcmp($apply,"MAX-Academy")==0)
{
$gp="info@maxbeautywrite.com";
}
if(strcmp($apply,"The-Brew-Tribe")==0)
{
$gp="cmo.brewtribe@gmail.com";
}
if(strcmp($apply,"Hicare-Services")==0)
{
$gp="sameer.khurana@hicare.in";
}
if(strcmp($apply,"Garden-Vareli")==0)
{
$gp="depot.bangalore@gardenvareli.com, depot.madurai@gardenvareli.com, nagendra@gardenvareli.com";
}
if(strcmp($apply,"Stammering-Cure")==0)
{
$gp="parthabagchiscc@gmail.com,rmeenakshi@franchiseindia.com";
}
if(strcmp($apply,"WOW-Vada-Pav")==0)
{
$gp="infowowvadapav@gmail.com";
}
if(strcmp($apply,"Richfeel-Trichology-Centre")==0)
{
$gp="mauleshthakkar@richfeel.com";
}
if(strcmp($apply,"MAKOONS-PRE-SCHOOL")==0)
{
$gp="info@makoons.com";
}
if(strcmp($apply,"Cubical-Labs")==0)
{
$gp="tarun@cubical.in";
}
if(strcmp($apply,"Career-Pont-Placement-Service")==0)
{
$gp="ramesh.w@cppsjobs.com";
}
if(strcmp($apply,"RoboGenius-Academy")==0)
{
$gp="franchise@robogenius.in";
}
if(strcmp($apply,"Ascent-Abacus-Brain-Gym")==0)
{
$gp="info@ascentabacus.com";
}
if(strcmp($apply,"Black-Orchid-Rollacosta")==0)
{
$gp="cc@blackorchids.in";
}
if(strcmp($apply,"Iris-Florets-The-Happy-Play-School")==0)
{
$gp="franchise.irisflorets@gmail.com";
}
if(strcmp($apply,"Strands-Salon-And-Spa")==0)
{
$gp="amit@strands.in";
}
if(strcmp($apply,"Sumitra-ASSOCHAM")==0)
{
$gp="sumita.srivastava@assocham.com";
}
if(strcmp($apply,"BOS-C-Brain-Child")==0)
{
$gp="bclindiaho@gmail.com";
}
if(strcmp($apply,"BOS-C-Airwheel-Technology-LLP")==0)
{
$gp="india.airwheel@hotmail.com";
}
if(strcmp($apply,"BOS-C-Little-Elly")==0)
{
$gp="franchise@littleelly.com";
}
if(strcmp($apply,"Apollo-Medskills")==0)
{
$gp="murali_c@apollomedskills.com";
}
if(strcmp($apply,"Leaflet")==0)
{
$gp="wealthbuildersorg@gmail.com";
}
if(strcmp($apply,"D-Cot-Donear")==0)
{
$gp="akash@donear.com";
}
if(strcmp($apply,"Carzonrent")==0)
{
$gp="franchise@carzonrent.com";
}
if(strcmp($apply,"BOS-C-ShadiMaker")==0)
{
$gp="franchisee@shadimaker.com";
}
if(strcmp($apply,"SSP-Advantage")==0)
{
$gp="khanjan@sspadvantage.com";
}
if(strcmp($apply,"FIAptech")==0)
{
$gp="ashokc@aptech.ac.in";
}
if(strcmp($apply,"The-Brand-Saloon")==0)
{
$gp="contact@thebrandsalon.com";
}
if(strcmp($apply,"Gyan-Ganga-Play-School")==0)
{
$gp="gyangangajabalpur@gmail.com";
}
if(strcmp($apply,"Sanjeevani-Organics")==0)
{
$gp="info@sanjeevaniorganics.in";
}
if(strcmp($apply,"IndiaOnline")==0)
{
$gp="partner@panindia.in";
}
if(strcmp($apply,"Happybees")==0)
{
$gp="info@happybees.in";
}
if(strcmp($apply,"CANTER-CADD-India")==0)
{
$gp="info@cantercadd.com";
}
if(strcmp($apply,"IFF-Sheru-Classic")==0)
{
$gp="info@iff.world, info@sheruclassic.com";
}
if(strcmp($apply,"Little-Millennium-Educomp")==0)
{
$gp="arshad.naim@educomp.com";
}
if(strcmp($apply,"Lenskart")==0)
{
$gp="shivangis@valyoo.in";
}
if(strcmp($apply,"Strategum-s-PlayShaala")==0)
{
$gp="partner@strategum.in";
}
if(strcmp($apply,"Titan-Company-Limited")==0)
{
$gp="manishs@titan.co.in";
}
if(strcmp($apply,"Kanvar-Corporation")==0)
{
$gp="fini@kanvargroup.com";
}
if(strcmp($apply,"Aircal-Logistics-Limited")==0)
{
$gp="franchiseaircal@gmail.com";
}
if(strcmp($apply,"Nature-Nurture")==0)
{
$gp="herbalsavy@yahoo.com";
}
if(strcmp($apply,"BANKEDGE")==0)
{
$gp="santosh.joshi@bankedge.in";
}
if(strcmp($apply,"Adara-Ayurveda")==0)
{
$gp="md@adaraayurveda.com";
}
if(strcmp($apply,"My-Mobile-Payments-Limited")==0)
{
$gp="aakash.wangnoo@pbpayments.com";
}
if(strcmp($apply,"Aakash-Digital")==0)
{
$gp="simranjeetsingh@aesl.in";
}
if(strcmp($apply,"World-Edumart")==0)
{
$gp="franchise@worldedumart.com";
}
if(strcmp($apply,"BlueStone")==0)
{
$gp="sales@bluestone.com";
}
if(strcmp($apply,"Life-Architects-India")==0)
{
$gp="lifeprint@lifearchitectsindia.com";
}
if(strcmp($apply,"Stepping-Stones-Play-School")==0)
{
$gp="ajaybhat09@gmail.com";
}
if(strcmp($apply,"Rangoli-Group-of-Institutes")==0)
{
$gp="bd@rangolischool.co.in";
}
if(strcmp($apply,"Vindhya-Herbals")==0)
{
$gp="franchise.mfpparc@gmail.com";
}
if(strcmp($apply,"Inani-Securities-Limited")==0)
{
$gp="rohitg@inanisec.in";
}
if(strcmp($apply,"WayGeNext")==0)
{
$gp="info@waygenext.com";
}
if(strcmp($apply,"Foster-Kids")==0)
{
$gp="franchise@fosterkids.in";
}
if(strcmp($apply,"The-Poly-Kids")==0)
{
$gp="operations@thepolykids.com";
}
if(strcmp($apply,"Foster-Genius")==0)
{
$gp="ucc@ihtindia.com";
}
if(strcmp($apply,"Anytime-Fitness")==0)
{
$gp="info@anytimefitness.in";
}
if(strcmp($apply,"e-Merchant-Digital")==0)
{
$gp="franchise@emerchantdigital.com";
}
if(strcmp($apply,"Classic-Polo")==0)
{
$gp="ramesh.svp@rcg.in";
}	
if(strcmp($apply,"Orane-Institute-Beauty-Wellness")==0)
{
$gp="ak@orane.co";
}
if(strcmp($apply,"Entrepreneur.com")==0)
{
$gp="marketing@entrepreneurindia.com";
}
if(strcmp($apply,"Attica-Gold-Company")==0)
{
$gp="dayanand.ramesh@atticagoldcompany.com,md@atticagoldcompany.com";
}
if(strcmp($apply,"Shanti-Juniors")==0)
{
$gp="jay@shantijuniors.com";
}
if(strcmp($apply,"Big-Chick-Fried-Chicken")==0)
{
$gp="bigchickindia@yahoo.com";
}
if(strcmp($apply,"FIBL-C-Brain-Child")==0)
{
$gp="franchise@brainchildlearning.in";
}
if(strcmp($apply,"Chicago-Crust")==0)
{
$gp="franchise@chicagocrust.com";
}
if(strcmp($apply,"ChickBlast")==0)
{
$gp="Chickblast@gmail.com";
}
if(strcmp($apply,"Talent-Corner")==0)
{
$gp="snehal.kadu@talentcorner.in";
}
if(strcmp($apply,"KGC-ProEducation")==0)
{
$gp="prashant.pathak@proeducation.in";
}
if(strcmp($apply,"ModiRevlon")==0)
{
$gp="aswini@modirevlon.com";
}
if(strcmp($apply,"Little-Millennium")==0)
{
$gp="enquiry@littlemillennium.com";
}
if(strcmp($apply,"TIE")==0)
{
$gp="shradha@tienewdelhi.org";
}
if(strcmp($apply,"Cambridge-Montessori-PreSchool")==0)
{
$gp="info@cambridgemontessoriglobal.org";
}
if(strcmp($apply,"Neopolitan-Pizza")==0)
{
$gp="saameer@scoreplus.co.in";
}
if(strcmp($apply,"Enjoy-a-Ball")==0)
{
$gp="info.india@enjoy-a-ball.com";
}
if(strcmp($apply,"THE-GATE-ACADEMY")==0)
{
$gp="partnerwithus@thgateacademy.com";
}
if(strcmp($apply,"BrainGin-Academy")==0)
{
$gp="academy.braingin@gmail.com";
}
if(strcmp($apply,"ROI-Consulting")==0)
{
$gp="intro@roic.in,franchise.channel@roic.in";
}
if(strcmp($apply,"Apollo-Health-Lifestyle-Ltd")==0)
{
$gp="prashanthi.ch@apollohl.com";
}
if(strcmp($apply,"Kangaroo-Kids-Education-Ltd")==0)
{
$gp="sandeep.pawar@kkel.com,sdivya@franchiseindia.net";
}
if(strcmp($apply,"Toni-and-Guy")==0)
{
$gp="ceo@paulsons.in";
}
if(strcmp($apply,"Ashtral-Biotech-Pvt-Ltd")==0)
{
$gp="zerocalzdealer@gmail.com";
}
if(strcmp($apply,"CMS-Systems")==0)
{
$gp="santosh.titre@cmsitservices.com";
}
if(strcmp($apply,"Pal-India-Computer-Education")==0)
{
$gp="pranav_badheka@hotmail.com";
}
if(strcmp($apply,"Tender-Steps-Preschool")==0)
{
$gp="baner@tendersteps.org";
}
if(strcmp($apply,"Tansen-Indian-Idol-Training-Academy")==0)
{
$gp="sirisha@tansensangeet.com";
}
if(strcmp($apply,"FIBL-C-Big-Fat-Wedding")==0)
{
$gp="info@bigfatwedding.org";
}
if(strcmp($apply,"FIBL-C-Rohit-Heritage")==0)
{
$gp="reemarohit@yahoo.com";
}
if(strcmp($apply,"Taskbob")==0)
{
$gp="akhil@taskbob.com; abhiroop@taskbob.com";
}
if(strcmp($apply,"upGrad")==0)
{
$gp="franchise@upgrad.com";
}
if(strcmp($apply,"FIBL-C-FoodJockeys")==0)
{
$gp="crccfranchise@foodjockeys.in";
}
if(strcmp($apply,"Brain-Wonders")==0)
{
$gp="niting.agg@brainwonders.in";
}
if(strcmp($apply,"ECO-Rent-a-Car")==0)
{
$gp="inderpal.singh@ecorentacar.com";
}
if(strcmp($apply,"GOGOLA-India")==0)
{
$gp="sales@gogolaindia.com";
}
if(strcmp($apply,"Parentsalarm")==0)
{
$gp="md@infogem.in";
}
if(strcmp($apply,"VermillionLoan")==0)
{
$gp="techsupport@franchiseindia.com";
}
if(strcmp($apply,"VermillionFranchise")==0)
{
$gp="techsupport@franchiseindia.com";
}

if(strcmp($apply,"LibertyShoes")==0)
{
$gp="anupam@libertyshoes.com";
}
if(strcmp($apply,"Vidm")==0)
{
$gp="garima@vidm.in";
}
if(strcmp($apply,"Meera-Jewelz")==0)
{
$gp="meerajewelz@gmail.com,jigs551@gmail.com";
}
if(strcmp($apply,"Burgers-More")==0)
{
$gp="burgersnmoreindia@gmail.com";
}
if(strcmp($apply,"MOI-Retail-Menchie")==0)
{
$gp="franchise@moiretail.com";
}
if(strcmp($apply,"F-TEC-SKILL-DEVELOPMENT")==0)
{
$gp="coo@f-tec.net.in";
}
if(strcmp($apply,"My-Apple-School")==0)
{
$gp="franchisemyapple@gmail.com";
}
if(strcmp($apply,"Moh-Spa")==0)
{
$gp="sherman@mwhspl.com";
}
if(strcmp($apply,"Simply-Sizzl")==0)
{
$gp="neeraj.sharma@simplysizzl.in";
}
if(strcmp($apply,"Inquirly-Technologies")==0)
{
$gp="anjan@inquirly.com";
}
if(strcmp($apply,"Sonar-Bangla")==0)
{
$gp="das.sumit1956@gmail.com";
}
if(strcmp($apply,"DTDC")==0)
{
$gp="mission10K@dtdc.com";
}
if(strcmp($apply,"International-School-Design")==0)
{
$gp="insdschool@gmail.com";
}
if(strcmp($apply,"Royal-Enfield")==0)
{
$gp="dd@royalenfield.com";
}
if(strcmp($apply,"Foxyeve-Designs")==0)
{
$gp="apsr@foxyeve.com";
}
if(strcmp($apply,"Brisk-Infrastructure-Developers")==0)
{
$gp="sales@brisk.in";
}
if(strcmp($apply,"Ameya-Group")==0)
{
$gp="sales@ameyagroup.in";
}
if(strcmp($apply,"Jan-Jagran-Samiti")==0)
{
$gp="jjs69000@gmail.com";
}
if(strcmp($apply,"Tally-Institute-Learning")==0)
{
$gp="franchise@tallyeducation.com";
}
if(strcmp($apply,"Spacetrek-Eucation")==0)
{
$gp="sales@spacetrekplanetarium.com";
}
if(strcmp($apply,"I-Genie")==0)
{
$gp="sales@i-genie.in";
}
if(strcmp($apply,"CEAT-Shoppe")==0)
{
$gp="ceatshoppe.enquiry@ceat.in";
}
if(strcmp($apply,"SFL-Fitness")==0)
{
$gp="franchise@sflfpl.com";
}
if(strcmp($apply,"DANZ")==0)
{
$gp="info@danzbread.com";
}
if(strcmp($apply,"JumoKing-Food")==0)
{
$gp="tfw@franchiseindia.com";
}
if(strcmp($apply,"CKT-Pvt-Ltd")==0)
{
$gp="bmalhotra@outlook.com";
}
if(strcmp($apply,"Client-Siyaram")==0)
{
$gp="jasvinder.arora@siyaram.com";
}
if(strcmp($apply,"The-Arvind-Store")==0)
{
$gp="franchiseinfo@arvind.in";
}
if(strcmp($apply,"Jeevan-George")==0)
{
$gp="jeevan@contoursindia.in";
}
if(strcmp($apply,"Baby-Spa-India")==0)
{
$gp="info@yourbabyspa.co.in";
}
if(strcmp($apply,"Unidus-Services")==0)
{
$gp="ajit@unidusservices.com";
}
if(strcmp($apply,"DAMS-Delhi")==0)
{
$gp="franchise@damsdelhi.com";
}
if(strcmp($apply,"INPHYNYT-Batteries")==0)
{
$gp="info@inphynyt.com";
}
if(strcmp($apply,"F-TEC")==0)
{
$gp="edp@f-tec.net.in";
}
if(strcmp($apply,"VIHAN")==0)
{
$gp="pankajkulkarni111@gmail.com";
}
if(strcmp($apply,"School-Cinema")==0)
{
$gp="mihir@edumedia.in";
}
if(strcmp($apply,"CANADIAN-PLAY-SCHOOL")==0)
{
$gp="info@canadianplayschool.com";
}
if(strcmp($apply,"Naturals-Salon-Spa")==0)
{
$gp="rahul@naturals.in";
}
if(strcmp($apply,"Oxyfit")==0)
{
$gp="franchise@oxyfit.co.in";
}
if(strcmp($apply,"Telematics4U")==0)
{
$gp="ndgindia@telematics4u.com";
}
if(strcmp($apply,"Sparkling-Mindz")==0)
{
$gp="franchisee@sparklingmindz.in";
}
if(strcmp($apply,"PlayMart")==0)
{
$gp="surbhi@playmart.in";
}
if(strcmp($apply,"Sparkling-Stone")==0)
{
$gp="info@sparklingstone.co.in";
}
if(strcmp($apply,"LUXUS-Sliding-Door")==0)
{
$gp="info@luxusindia.net";
}
if(strcmp($apply,"Laziz-Pizza")==0)
{
$gp="lazizfranchise@gmail.com";
}
if(strcmp($apply,"Brats-n-Cuties")==0)
{
$gp="franchise@bratsandcuties.com";
}
if(strcmp($apply,"WCF-Hospitals")==0)
{
$gp="franchise@wcfhospitals.in";
}
if(strcmp($apply,"Kalorex-Preschool")==0)
{
$gp="bd@kalorex.org";
}
if(strcmp($apply,"Vishesh-College")==0)
{
$gp="vishesheducationtrust@gmail.com";
}
if(strcmp($apply,"NIMSR")==0)
{
$gp="nimsr.rahulgupta@gmail.com";
}
if(strcmp($apply,"SmartQ-Education")==0)
{
$gp="himani.sata@smartq.co.in";
}
if(strcmp($apply,"JodiyanMatrimony-Franchise")==0)
{
$gp="jodiyanmatrimony@yahoo.in";
}
if(strcmp($apply,"Igniva-Eduvent-Group")==0)
{
$gp="info@ieduvent.com";
}
if(strcmp($apply,"FIBL-C-Techcart-Solutions")==0)
{
$gp="sripathiraj51@gmail.com";
}
if(strcmp($apply,"FIBL-C-Chaat-Bazaar")==0)
{
$gp="amit@maysfoods.net,monika.gupta@franchiseindia.in";
}
if(strcmp($apply,"FIBL-C-Sunshine-School")==0)
{
$gp="raj@satnavpreschools.com";
}
if(strcmp($apply,"Siliceous-Technologies")==0)
{
$gp="apply@siliceous.in";
}
if(strcmp($apply,"Jamun-Tree")==0)
{
$gp="rejevmohan@gmail.com";
}
if(strcmp($apply,"Trinity-Group")==0)
{
$gp="trinity.cmd@gmail.com";
}
if(strcmp($apply,"Notion")==0)
{
$gp="p.mandal@notion.net.in";
}
if(strcmp($apply,"Notion-Exotic-Decor")==0)
{
$gp="akash@exotic-decor.com";
}
if(strcmp($apply,"Indian-Ads-Online")==0)
{
$gp="indianadsonline@gmail.com";
}
if(strcmp($apply,"AIIA-Dehradun")==0)
{
$gp="aiiadoon21@yahoo.com";
}
if(strcmp($apply,"Kewalkiran-K-LOUNGE")==0)
{
$gp="dattatray.marathe@kewalkiran.com";
}
if(strcmp($apply,"Roman-Island")==0)
{
$gp="franchise@romanisland.com";
}
if(strcmp($apply,"Estelle-Kitchen")==0)
{
$gp="dsaxena2002@yahoo.com";
}
if(strcmp($apply,"Global-Discovery-Academy")==0)
{
$gp="franchise@globaldiscoveryacademy.com";
}
if(strcmp($apply,"Aspire-Human-Capital")==0)
{
$gp="channel@aspireindia.org";
}
if(strcmp($apply,"Vidyalankar")==0)
{
$gp="franchisee@vidyalankar.org";
}
if(strcmp($apply,"IIMR-India")==0)
{
$gp="sk@iimrindia.com";
}
if(strcmp($apply,"FIBL-C-ClubMahindra")==0)
{
$gp="rajendra.kakade@mahindraholidays.com";
}
if(strcmp($apply,"FIBL-C-Happily-Unmarried")==0)
{
$gp="rajat@happilyunmarried.com";
}
if(strcmp($apply,"SONI-GROUP")==0)
{
$gp="tushar@soniindia.in";
}
if(strcmp($apply,"RainBow-Dealership")==0 || strcmp($apply,"RainBow-Distributors")==0)
{
$gp="kparas@lifestylefranchising.in";
}
if(strcmp($apply,"RainBow-Cleaning-System")==0)
{
$gp="sricha@lifestylefranchising.in";
}
if(strcmp($apply,"Gaap-Bright")==0)
{
$gp="franchisee.support@gaapbright.com";
}
if(strcmp($apply,"Starkes-India")==0)
{
$gp="info@starkesindia.com";
}
if(strcmp($apply,"Dream-Food")==0)
{
$gp="cmd@dfipl.com";
}
if(strcmp($apply,"BEX-BusinessEx.com")==0)
{
$gp="tanushree.datta@franchiseindia.in";
}
if(strcmp($apply,"FI-Venture-Reliance-Footprints")==0 || strcmp($apply,"FI-Venture-Lifestyle-Brand")==0)
{
$gp="surbhi.chawla@franchiseindia.in";
}
if(strcmp($apply,"FI-Venture-Aurum")==0)
{
$gp="shikha.gulati@franchiseindia.in";
}
if(strcmp($apply,"Times-Luxury-Lifestyle")==0)
{
$gp="harish@infairs.com";
}
if(strcmp($apply,"FisixWorld")==0)
{
$gp="raajverma@fisixworld.com";
}
if(strcmp($apply,"Toys-on-rent")==0)
{
$gp="franchise@toys-on-rent.com";
}
if(strcmp($apply,"Private-Label-India")==0)
{
$gp="dimple@channelexhibitions.com";
}
if(strcmp($apply,"Four-Fountains-Spa")==0)
{
$gp="ninad.mundhe@thefourfountains.in";
$bcc=",mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"Meghdoot-Pharma")==0)
{
$gp="info@meghdoot-bedo.com";
$bcc=",mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"Magic-Holidays")==0)
{
$gp="bhavna.ailani@panoramicworld.biz";
$bcc=",mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"Primmero-Jewels")==0)
{
$gp="ramrawat@primmerojewels.com";
}
if(strcmp($apply,"FIBL-Kifahari")==0)
{
$gp="franchise@kifahari.com,info@kifahari.com";
}
if(strcmp($apply,"HughesNet-FUSION")==0)
{
$gp="pmdas@hughes.in";
}
if(strcmp($apply,"Pidilite-Industry")==0)
{
$gp="prakash.anchan@gmail.com";
$bcc=",mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"Khilonewala-Library")==0)
{
$gp="pratiksharmaji354@gmail.com";
}
if(strcmp($apply,"MORPH-MATERNITY")==0)
{
$gp="partner@morphmaternity.com";
}
if(strcmp($apply,"Health-Zone")==0)
{
$gp="franchise@healthzoneindia.com";
$bcc=",mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"Times-Globacom")==0)
{
$gp="franchise@timtsindia.com";
}
if(strcmp($apply,"Beyond-Petal")==0)
{
$gp="amitabh.banerji@beyondpetals.in";
$bcc=",mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"Business-Resale")==0)
{
$gp="priyanka.sachdeva@franchiseindia.in";
}
if(strcmp($apply,"VR-Innovation-Academy")==0)
{
$gp="info@veative.com";
}
if(strcmp($apply,"InvestorAquisition")==0)
{
$gp="saliil.arakkal@yahoo.in";
}
if(strcmp($apply,"BOS-Safari-Kid")==0)
{
$gp="info@safarikidindia.com";
}
if(strcmp($apply,"BOS-SubWay")==0 || strcmp($apply,"BOS-Aura-Thai-Spa")==0 || strcmp($apply,"BOS-Goli-VadaPav")==0 || strcmp($apply,"BOS-Sesame-Street")==0 || strcmp($apply,"BOS-Colonels-Kababz")==0 || strcmp($apply,"BOS-Cafe-Desire")==0 || strcmp($apply,"BOS-Presta")==0 || strcmp($apply,"BOS-Century21")==0)
{
$gp="bos@franchiseindia.com";
}
if(strcmp($apply,"BOS-Exhibitor")==0)
{
$gp="services@franchiseindia.net, ashita@franchiseindia.com, pvijay@franchiseindia.net";
}
if(strcmp($apply,"SQTL")==0)
{
$gp="netwkng@sqtl.com";
}
if(strcmp($apply,"E-Speed-Ganesh")==0)
{
$gp="franchisee@seyongroup.in";
}
if(strcmp($apply,"Talwalkars-Hi-Fi")==0)
{
$gp="vijayaP@talwalkars.net";
}
if(strcmp($apply,"SANFORT-Schools")==0)
{
$gp="franchise@sanfortschools.com";
}
if(strcmp($apply,"Francorp-Workshop-Training")==0)
{
$gp="traininginfo@entrepreneurindia.org";
}
if(strcmp($apply,"Smarttalk-Netcom")==0)
{
$gp="sanjay@smarttalk.in";
}
if(strcmp($apply,"Career-Cafe")==0)
{
$gp="careercafeindia@gmail.com";
}
if(strcmp($apply,"Fat-Reduction")==0)
{
$gp="fiwest@franchiseindia.com";
$bcc=",mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"Fantastic-Foods")==0)
{
$gp="partners@fantasticfoods.in";
$bcc=",mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"Fashion-TV")==0)
{
$gp="akhil.singh@bradfordlicenseindia.com";
}
if(strcmp($apply,"BLI-Liverpool")==0 || strcmp($apply,"BLI-NBA")==0 || strcmp($apply,"BLI-SATC")==0 || strcmp($apply,"BLI-Guinness-World-Records")==0 || strcmp($apply,"BLI-Teletubbies")==0 || strcmp($apply,"BLI-Asterix")==0 || strcmp($apply,"BLI-Chacha-Choudhary")==0 || strcmp($apply,"BLI-WhatEverItTakes")==0 || strcmp($apply,"BLI-Sidney-Maurer")==0 || strcmp($apply,"BLI-Chhota-Bheem")==0 || strcmp($apply,"BLI-UVX")==0)
{
$gp="chitra.johri@bradfordlicenseindia.com,anubhav.singhal@bradfordlicenseindia.com";
}
if(strcmp($apply,"Hafele")==0)
{
$gp="customercare@hafeleindia.com";
}
if(strcmp($apply,"Oi-Playschool")==0)
{
$gp="franchise@oiplayschool.com";
}
if(strcmp($apply,"Kwality-walls")==0)
{
$gp="walls.parlours@unilever.com";
}
if(strcmp($apply,"Advanced-Institute-Digital-Marketing")==0)
{
$gp="info@aidm.in";
}
if(strcmp($apply,"Aarya")==0)
{
$gp="aarya24kt@gmail.com";
}
if(strcmp($apply,"Brewberry")==0)
{
$gp="franchise@brewberrys.com";
}
if(strcmp($apply,"Big-V-Telecom")==0)
{
$gp="bigvtelecom1@gmail.com";
}
if(strcmp($apply,"Organic-Garden")==0)
{
$gp="info@organicgarden.co.in";
$bcc=",mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"Startup-Gujarat")==0)
{
$gp="nitin.anand@franchiseindia.in,priti.nalwaya@franchiseindia.in,mehul.singh@franchiseindia.in";
}
if(strcmp($apply,"Baskin-Robbins")==0)
{
$gp="rajesh.mahadas@gravissgroup.com";
$bcc=",mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"HCL-Learning-Centre")==0)
{
$gp="marcom.learning@hcl.com";
}
if(strcmp($apply,"Bachpan-Global")==0)
{
$gp="kasupport@bachpanglobal.com";
}
if(strcmp($apply,"Leading-Brands")==0)
{
$gp="mohit@networxx.in";
$bcc=",mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"FIBL-Karmik")==0)
{
$gp="franchising@karmik.in,retail@franchiseindia.in";
}
if(strcmp($apply,"FIBL-Bighdey-Nawab")==0)
{
$gp="srinivasprasad66@gmail.com,anshit.chandra@franchiseindia.in";
}
if(strcmp($apply,"UAE-PlanAheadEvent")==0)
{
$gp="tiptons@sarhg.com";
}
if(strcmp($apply,"Forun-Express")==0)
{
$gp="info@forunexpress.com";
}
if(strcmp($apply,"iScholar-Education")==0)
{
$gp="sunil@ischolareducation.com";
}
if(strcmp($apply,"Kathi-Junction")==0)
{
$gp="kathijunction@gmail.com";
}
if(strcmp($apply,"Savya-Jewels")==0)
{
$gp="info@savyajewels.com";
}
if(strcmp($apply,"Shriram-Vyapar")==0)
{
$gp="sales@shriramvyapar.com";
$bcc=",mediachennai1@franchiseindia.net";
}
if(strcmp($apply,"HeatWave")==0)
{
$gp="deepika.sharma@franchiseindia.net";
}
if(strcmp($apply,"Ti-Cycles-of-India")==0)
{
$gp="radhakrishnanpt@tii.murugappa.com";
}
if(strcmp($apply,"OfficeYes")==0)
{
$gp="reseller@officeyes.com";
}
if(strcmp($apply,"Auto-Safe")==0)
{
$gp="ankur.malhotra@acubepro.com";
}
if(strcmp($apply,"Gobol")==0)
{
$gp="franchisee@gobol.in";
}
if(strcmp($apply,"Rp-Corporate-Management")==0)
{
$gp="ershad@corporatecare.co.in";
}
if(strcmp($apply,"FIBL-Doctor-Ajax")==0)
{
$gp="anirudh@pipedreamlabs.com,anshit.chandra@franchiseindia.in";
}
if(strcmp($apply,"Astha-City-Center")==0)
{
$gp="info@asthacity.com";
}
if(strcmp($apply,"Vision-Media-Cal")==0)
{
$gp="amitava@visionmediaonline.in";
}
if(strcmp($apply,"Mexus-Education")==0)
{
$gp="helloiken@gmail.com";
$bcc=",mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"Reach-Tax")==0)
{
$gp="sumathi@reachtax.com";
}
if(strcmp($apply,"RechargeSeva")==0)
{
$gp="info@infogem.in";
$bcc=",mediachennai2@franchiseindia.net";
}
if(strcmp($apply,"Green-Trends")==0)
{
$gp="franchisee@cktrends.in";
}
if(strcmp($apply,"Beehive-Preschools")==0)
{
$gp="franchise@beehive.org.in";
//$bcc=",mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"Mandar-Education")==0)
{
$gp="info@mandareducation.com";
}
if(strcmp($apply,"Women-Wear-Teaser")==0)
{
$gp="anuj.dawar@franchiseindia.in";
}
if(strcmp($apply,"Cafe-Teaser")==0 || strcmp($apply,"Restaurant-Teaser")==0 || strcmp($apply,"FI-Venture-Gourmet-Food-Sale")==0)
{
$gp="jkomal@franchiseindia.in";
}
if(strcmp($apply,"VU-LED-TVs")==0)
{
$gp="ceo@technologies.vu";
}
if(strcmp($apply,"Medicine-Bazaar")==0)
{
$gp="info@medicinebazaar.in";
}
if(strcmp($apply,"Thebe-Exhibitions")==0)
{
$gp="sarah@tepg.co.za,clare@tepg.co.za";
}
if(strcmp($apply,"TakeCharge")==0)
{
$gp="takecharge@gauravmarya.com";
}
if(strcmp($apply,"FIBL-Wedding-Weaves")==0)
{
$gp="himanshu.dhapola@franchiseindia.org";
}
if(strcmp($apply,"FIBL-Tea-Lounge")==0)
{
$gp="tsanchita@franchiseindia.in";
}
if(strcmp($apply,"Zardozi")==0)
{
$gp="pranavdhody19@gmail.com,dhodysunil@yahoo.in";
}
if(strcmp($apply,"Rising-Stars")==0)
{
$gp="vivek@risingstars.in";
}
if(strcmp($apply,"Immense-Power")==0)
{
$gp="sales@immense.in";
}
if(strcmp($apply,"FIBL-Diva")==0)
{
$gp="retail@franchiseindia.in,varun.wilson@franchiseindia.in";
}
if(strcmp($apply,"FIBL-Kidz-Paradise")==0)
{
$gp="education@franchiseindia.in,a.gowthami@franchiseindia.in";
}
if(strcmp($apply,"Sunflower")==0)
{
$gp="marketing@sunflowerbroking.com,info@sunflowerbroking.com";
$bcc=",mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"Kinderpillar")==0)
{
$gp="franchise@kinderpillar.com";
}
if(strcmp($apply,"Thali")==0)
{
$gp="vishal.agarwal@franchiseindia.net";
}

if(strcmp($apply,"Pasta-Bar-Client")==0)
{
$gp="franchise@thepastabarveneto.com";
}
if(strcmp($apply,"Shani-Corporation")==0)
{
$gp="retail@franchiseindia.in,raman.biswash@franchiseindia.in";
}
if(strcmp($apply,"Leena-Mogre")==0)
{
$gp="nikhil59@yahoo.com,nikhil@leenamogre.in";
$bcc=",mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"B-Blunt")==0)
{
$gp="satyathakur@bblunt.com";
$bcc=",mumaccounts@franchiseindia.net,fimum@franchiseindia.com";
}
if(strcmp($apply,"HR-Pixels")==0)
{
$gp="services@franchiseindia.in,vinit.singh@franchiseindia.in";
}
if(strcmp($apply,"Progressive-Management-Client")==0)
{
$gp="info@isogoa.com";
}
if(strcmp($apply,"Cnergyis")==0)
{
$gp="vineeta.sharma@cnergyis.com";
}
if(strcmp($apply,"SS-College")==0)
{
$gp="panchaliji@gmail.com";
}
if(strcmp($apply,"SSEC-Group-College")==0)
{
$gp="chairman@ssgroupofcolleges.com";
$bcc=",member@franchiseindia.com";
}
if(strcmp($apply,"Education-Training")==0)
{
$gp="director@ssgroupofcolleges.com";
$bcc=",member@franchiseindia.com";
}
if(strcmp($apply,"SmartSchool")==0)
{
$gp="contactus@smartschoolonline.in";
}
if(strcmp($apply,"SmartSchool-Junior")==0)
{
$gp="contactus@smartschoolonline.in";
}
if(strcmp($apply,"Funz-Buzzyy5D")==0)
{
 $gp="bhaskar@funzinfinitum.com";
}
if(strcmp($apply,"Sesame-Street")==0)
{
$gp="info_india@sesame.org";
}
if(strcmp($apply,"Success-Achievers")==0)
{
$gp="education@franchiseindia.in,qrashid@franchiseindia.in";
}
if(strcmp($apply,"Startup-Chandigarh")==0 || strcmp($apply,"FIB-Premium-Services-Chandigarh")==0)
{
$gp="ba@franchiseindia.in,manish.dogra@franchiseindia.in";
}
if(strcmp($apply,"Startup-Chennai")==0 || strcmp($apply,"FIB-Premium-Services-Chennai")==0)
{
$gp="investor@franchiseindia.in,kelvin@franchiseindia.in";
}
if(strcmp($apply,"Startup-Delhi")==0 || strcmp($apply,"FIB-Premium-Services-Delhi")==0)
{
$gp="investor@franchiseindia.in,ssandeep@franchiseindia.in";
}
if(strcmp($apply,"Startup-Kolkata")==0 || strcmp($apply,"FIB-Premium-Services-Kolkata")==0)
{
$gp="investor@franchiseindia.in,manisha.agarwal@franchiseindia.in";
}
if(strcmp($apply,"Startup-Pune")==0 || strcmp($apply,"FIB-Premium-Services-Pune")==0)
{
$gp="investor@franchiseindia.in,leena.patil@franchiseindia.in";
}
if(strcmp($apply,"Main-Khadi-Hoon")==0)
{
$gp="retail@franchiseindia.in,kawaljeet.kaur@franchiseindia.in";
}
if(strcmp($apply,"EUROCLEAN")==0)
{
$gp="info@simtech.in";
}
if(strcmp($apply,"FastClean")==0)
{
$gp="manoj@fastcleanindia.in";
}
if(strcmp($apply,"ICON-Nurturing-Innocence")==0)
{
$gp="franchise@iconschools.in";
}
if(strcmp($apply,"Artdinox")==0)
{
$gp="retail@franchiseindia.in,cvipin@franchiseindia.in";
}
if(strcmp($apply,"Sykes-and-Ray-Equities")==0)
{
$gp="marketing@sre.co.in";
//$bcc=",mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"BurnGym-Spa")==0)
{
$gp="pankaj@burngym.com";
}
if(strcmp($apply,"Green-Dust")==0)
{
$gp="franchise@greendust.com";
}
if(strcmp($apply,"Thulir")==0)
{
$gp="ts.ganesh@thulir.com,cmo@thulir.com";
}
if(strcmp($apply,"Grescasa-Ceremics")==0)
{
$gp="srikant.agarwal@franchiseindia.in,retail@franchiseindia.in";
}
if(strcmp($apply,"Mad")==0)
{
$gp="pogo@chettinad.org";
}
if(strcmp($apply,"Aero-Balloon")==0)
{
$gp="kdaneja@gmail.com,info@aeroballoon.in";
}
if(strcmp($apply,"Miraya")==0)
{
$gp="retail@franchiseindia.in,prateek.sharma@franchiseindia.in";
}
if(strcmp($apply,"Kidology")==0)
{
$gp="retail@franchiseindia.in,rahul.bhagat@franchiseindia.in";
}
if(strcmp($apply,"Mangosuites")==0)
{
$gp="info@intellistayhotels.com";
}
if(strcmp($apply,"Wig-O-Mania")==0)
{
$gp="ealth@franchiseindia.in,tnishant@franchiseindia.in";
}
if(strcmp($apply,"Chrysaalis")==0)
{
$gp="sudhakar@chrysaalis.com";
}
if(strcmp($apply,"Cafe-Desire")==0)
{
$gp="fah@cafedesire.co.in";
}
if(strcmp($apply,"Bawree")==0)
{
$gp="ankit.rousha@franchiseindia.in,retail@franchiseindia.in";
}
if(strcmp($apply,"Bawree")==0)
{
$gp="gaurav.manchanda@franchiseindia.in,retail@franchiseindia.in";
}
if(strcmp($apply,"Stat-Varsity")==0)
{
$gp="ashar.khan@franchiseindia.in";
}
if(strcmp($apply,"MovenPick")==0 || strcmp($apply,"Pizza-Vito")==0 || strcmp($apply,"Pabrais")==0 || strcmp($apply,"Kent")==0)
{
$gp="shivi.bindra@franchiseindia.in,fnb@franchiseindia.in";
}
if(strcmp($apply,"HotDeal-Food")==0)
{
$gp="tnishant@franchiseindia.in,clubcity@franchiseindia.in,fnb@franchiseindia.in";
}
if(strcmp($apply,"Yogurberry")==0 || strcmp($apply,"Crazy-Noodle")==0)
{
$gp="priyanka.singh@franchiseindia.net,fnb@franchiseindia.in";
}
if(strcmp($apply,"HotDeal-Food2")==0)
{
$gp="shivendu.shirivastava@franchiseindia.in,fnb@franchiseindia.in";
}
if(strcmp($apply,"HotDeal-Food3")==0)
{
$gp="mohammad@franchiseindia.net,fnb@franchiseindia.in";
}
if(strcmp($apply,"HotDeal-Food4")==0)
{
$gp="priyanka.singh@franchiseindia.net,fnb@franchiseindia.in";
}
if(strcmp($apply,"BodySpa")==0)
{
$gp="priyanka.jakhar@franchiseindia.in,health@franchiseindia.in";
}
if(strcmp($apply,"Procase")==0)
{
$gp="synergycorporation12@gmail.com,a.synergy@rediffmail.com,mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"Diet-Mantra")==0)
{
$gp="info@dietmantra.in";
}
if(strcmp($apply,"Indiacan")==0)
{
$gp="ashwini.vashishth@indiacan.com";
}
if(strcmp($apply,"Cigusta")==0)
{
$gp="fnb@franchiseindia.in,mohit.aggarwal@franchiseindia.net";
}
if(strcmp($apply,"Sanda-Group")==0)
{
$gp="indrajit@sandawellbeing.com";
}
if(strcmp($apply,"IFA-TrainingCourse")==0)
{
$gp="ashutosh.dikshit@franchiseindia.org";
}
if(strcmp($apply,"IFA-Membership")==0 || strcmp($apply,"IFA-Advertising")==0)
{
$gp="kanika.gupta@franchiseindia.org";
}
if(strcmp($apply,"Titan-Eye-Plus")==0)
{
$gp="retail@franchiseindia.in,sangitha@franchiseindia.in";
}
if(strcmp($apply,"bg-cleaning")==0)
{
$gp="sherry@bgt.is,gwinona@franchiseuae.com";
}
if(strcmp($apply,"Sell-Your-Business")==0 || strcmp($apply,"Endeavour-Careers")==0 || strcmp($apply,"Luxury-Swim-Spa")==0 || strcmp($apply,"Preschool-Brand-Franchise")==0)
{
$gp="fiwest@franchiseindia.com";
}
if(strcmp($apply,"Santosh-IIHT")==0)
{
$gp="partner@iiht.com";
}
if(strcmp($apply,"IIHT")==0)
{
$gp="ahmed.b@iiht.com";
}
if(strcmp($apply,"IT-Education")==0 || strcmp($apply,"Preschool-Franchise")==0)
{
$gp="fiwest@franchiseindia.com";
$bcc=",member@franchiseindia.com,ashita@franchiseindia.com";
}
if(strcmp($apply,"WatsonFitness")==0)
{
$gp="richa.gupta@franchiseindia.net";
}
if(strcmp($apply,"SnapFitness")==0)
{
$gp="info@snapfitnessindia.com";
}
if(strcmp($apply,"MyET-MyHT")==0)
{
$gp="anuj.dawar@franchiseindia.in";
}
if(strcmp($apply,"Life-Book-2014")==0)
{
$gp="info@entrepreneurindia.org,magazine@franchiseindia.net";
}
if(strcmp($apply,"AC-Systems-Teaser")==0 || strcmp($apply,"Animation-Teaser")==0 || strcmp($apply,"Vijay-Teaser")==0)
{
$gp="tsanchita@franchiseindia.in";
}
if(strcmp($apply,"Bionic-Hospitality")==0 || strcmp($apply,"Merry-Brwon")==0 || strcmp($apply,"Yogoshack")==0)
{
$gp="info@bionichospitality.com,fnb@franchiseindia.in";
}
if(strcmp($apply,"Express-Registration")==0)
{
$gp="callcenter@franchiseindia.in";
}
if(strcmp($apply,"BA-Camp")==0)
{
$gp="ba@franchiseindia.in,mehul.singh@franchiseindia.in,nitin.anand@franchiseindia.in,anshit.chandra@franchiseindia.in";
}
if(strcmp($apply,"Kinder-Dance")==0)
{
$gp="rasween.kaur@franchiseindia.in,education@franchiseindia.in";
}
if(strcmp($apply,"Dentistree")==0)
{
$gp="rajkumar@franchiseindia.in,health@franchiseindia.in";
}
if(strcmp($apply,"Hoffmen")==0)
{
$gp="rahul.bhagat@franchiseindia.in,retail@franchiseindia.in";
}
if(strcmp($apply,"D-ZA")==0 || strcmp($apply,"Addons")==0)
{
$gp="retail@franchiseindia.in,kawaljeet.kaur@franchiseindia.in";
}
if(strcmp($apply,"FI-Venture-Advaya")==0)
{
$gp="harshit.garg@franchiseindia.in";
}
if(strcmp($apply,"FI-Venture-FNB")==0 || strcmp($apply,"FIB-Capital")==0 || strcmp($apply,"FIB-Satkar-Resell")==0 || strcmp($apply,"FI-Venture-eRetail")==0 || strcmp($apply,"FI-Venture-Education")==0 || strcmp($apply,"FI-Venture-Delhi-Daredevils")==0 || strcmp($apply,"FI-Venture-LC")==0)
{
$gp="tsanchita@franchiseindia.in";
}
if(strcmp($apply,"FI-Venture-Zoomol")==0 || strcmp($apply,"FI-Venture-Food")==0 || strcmp($apply,"FI-Venture-Herbal")==0 || strcmp($apply,"FI-Venture-Ethnic")==0 || strcmp($apply,"FI-Venture-CTC")==0 || strcmp($apply,"FI-Venture-Cottinfab")==0)
{
$gp="tsanchita@franchiseindia.in";
}
if(strcmp($apply,"FI-Property")==0)
{
$gp="property@franchiseindia.com,anis.siddiqui@franchiseindia.in";
}
if(strcmp($apply,"Arabian-Night")==0)
{
$gp="alfia@thearabiannights.com";
}
if(strcmp($apply,"HotDeal-Health")==0)
{
$gp="tnishant@franchiseindia.in,clubcity@franchiseindia.in,health@franchiseindia.in";
}
if(strcmp($apply,"HotDeal-Health1")==0)
{
$gp="vinit.singh@franchiseindia.in,health@franchiseindia.in";
}
if(strcmp($apply,"HotDeal-Health2")==0)
{
$gp="rajkumar@franchiseindia.in,health@franchiseindia.in";
}
if(strcmp($apply,"HotDeal-Health3")==0)
{
$gp="cvipin@franchiseindia.in,health@franchiseindia.in";
}
if(strcmp($apply,"HotDeal-Health4")==0)
{
$gp="tprakriti@franchiseindia.net,health@franchiseindia.in";
}
if(strcmp($apply,"HotDeal-Retail")==0 || strcmp($apply,"HotDeal-Luxury")==0)
{
$gp="gaurav.manchanda@franchiseindia.in,retail@franchiseindia.in";
}
if(strcmp($apply,"HotDeal-Retail1")==0)
{
$gp="kawaljeet.kaur@franchiseindia.in,retail@franchiseindia.in";
}
if(strcmp($apply,"HotDeal-Retail2")==0)
{
$gp="sdivya@franchiseindia.in,retail@franchiseindia.in";
}
if(strcmp($apply,"HotDeal-Retail3")==0)
{
$gp="kawaljeet.kaur@franchiseindia.in,retail@franchiseindia.in";
}
if(strcmp($apply,"HotDeal-Education1")==0)
{
$gp="rachit.gupta@franchiseindia.in,education@franchiseindia.in";
}
if(strcmp($apply,"HotDeal-Education2")==0)
{
$gp="madhukar.gupta@franchiseindia.in,education@franchiseindia.in";
}
if(strcmp($apply,"Get-Richer")==0)
{
$gp="info@bigv.in";
}
if(strcmp($apply,"yocc-bigv")==0)
{
$gp="franchise.bigv@gmail.com";
}
if(strcmp($apply,"FI-Consult")==0)
{
$gp="bsonu@franchiseindia.net";
}
if(strcmp($apply,"Ment-e-Soul")==0)
{
$gp="shubham.jha@franchiseindia.in,health@franchiseindia.in";
}
if(strcmp($apply,"Aaho-Express")==0)
{
$gp="priyesh.sharma@franchiseindia.in,fnb@franchiseindia.in";
}
if(strcmp($apply,"Sky-Comm-Medias-Pvt-Ltd")==0)
{
$gp="adgameoffers@gmail.com";
}
if(strcmp($apply,"Sky-Deelz")==0)
{
$gp="info@skydeelz.com";
}
if(strcmp($apply,"Hot-Bitez")==0)
{
$gp="fnb@franchiseindia.in,shivi.bindra@franchiseindia.in";
}
if(strcmp($apply,"Golden-Bells")==0)
{
$gp="contact@goldenbellsdelhi.com";
}
if(strcmp($apply,"Iosis-Spa")==0 || strcmp($apply,"UnI-Spa")==0)
{
$gp="qrashid@franchiseindia.in,health@franchiseindia.in";
}
if(strcmp($apply,"Mystic-Spa")==0)
{
$gp="health@franchiseindia.in";
}
if(strcmp($apply,"Evana")==0)
{
$gp="naveen.bhuker@franchiseindia.in,health@franchiseindia.in";
}
if(strcmp($apply,"Pari")==0)
{
$gp="sdivya@franchiseindia.in,retail@franchiseindia.in";
}
if(strcmp($apply,"Madhuri-Solar")==0)
{
$gp="priyanka.jakhar@franchiseindia.in,retail@franchiseindia.in";
}
if(strcmp($apply,"Discount-Pandit")==0)
{
$gp="gankit@franchiseindia.in,retail@franchiseindia.in";
}
if(strcmp($apply,"Lenbitz")==0)
{
$gp="priyanka.jhakar@franchiseindia.in,retail@franchiseindia.in";
}
if(strcmp($apply,"Nirmal")==0)
{
$gp="info@nirmalayurlife.com";
}
if(strcmp($apply,"Reebok22")==0 ||strcmp($apply,"Everonn")==0)
{
$gp="mrahul@franchiseindia.net";
}
if(strcmp($apply,"Luxury-Brands")==0)
{
$gp="luxury@franchiseindia.in";
}
if(strcmp($apply,"Kitsch")==0 || strcmp($apply,"Oasis-Dreams")==0 || strcmp($apply,"Mini-Monster-India")==0 || strcmp($apply,"Shawarma-Express")==0 || strcmp($apply,"Maid2Clean")==0)
{
$gp="niharika.rajput@franchiseindia.in";
}
if(strcmp($apply,"Shawarma-Express-UAE")==0)
{
$gp="vshilpa@franchiseuae.com";
}
if(strcmp($apply,"GoFoodiezz")==0)
{
$gp="anair@yihspl.com";
}
if(strcmp($apply,"DR-MAHESH-HUKMANI")==0)
{
$gp="voicescan@yahoo.com";
}
if(strcmp($apply,"Careerfutura")==0)
{
$gp="girija.nair@careerfutura.com";
}
if(strcmp($apply,"PCG")==0)
{
$gp="sak@yihspl.com";
}
if(strcmp($apply,"GoChaatz")==0)
{
$gp="sak@yihspl.com,vikramsood@gochaatzz.com";
}
if(strcmp($apply,"MakeMyTrip")==0)
{
$gp="chirag.goyal@makemytrip.com";
}
if(strcmp($apply,"FIBrands-Category")==0)
{
$gp="fnb@franchiseindia.in";
}
if(strcmp($apply,"FIBrands-NCR2")==0)
{
$gp="amit.kapoor@franchiseindia.in";
}
if(strcmp($apply,"FIBrands-NCR3")==0)
{
$gp="sahil.arya@franchiseindia.in,anshit.chandra@franchiseindia.in";
}
if(strcmp($apply,"Channel-Partner")==0)
{
$gp="abhinav.gupta@franchiseindia.in,csonya@franchiseindia.in,brands@franchiseindia.in";
}
if(strcmp($apply,"BD-East")==0)
{
$gp="debalina.moitra@franchiseindia.in";
}
if(strcmp($apply,"BD-West")==0)
{
$gp="jitendra.shreshthi@franchiseindia.in";
}
if(strcmp($apply,"BD-North")==0)
{
$gp="abhinav.gupta@franchiseindia.in";
}
if(strcmp($apply,"BD-South")==0)
{
$gp="mayank.vahisth@franchiseindia.in";
}
if(strcmp($apply,"FI-BD")==0)
{
$gp="ishank.sahani@franchiseindia.in,feedback@franchiseindia.in";
}
if(strcmp($apply,"InvestorAq-NCR")==0 || strcmp($apply,"FIBrands-NCR1")==0 || strcmp($apply,"IR-EDM")==0 || strcmp($apply,"BD-EDM")==0)
{
$gp="abhinav.gupta@franchiseindia.in,mayank.vashisth@franchiseindia.in,jitendra.shreshthi@franchiseindia.in,gaurav.sharma@franchiseindia.in,shweta.baluja@franchiseindia.in,vvinodh@franchiseindia.in,naveen.kumar@franchiseindia.in";
}
if(strcmp($apply,"InvestorAq-Chandigarh")==0 || strcmp($apply,"FIBrands-Chandigarh")==0)
{
$gp="ashish.mittal@franchiseindia.in,investor@franchiseindia.in,investorpathshala@franchiseindia.in";
}
if(strcmp($apply,"Startup-Hyderabad")==0)
{
$gp="bd@franchiseindia.in,investor@franchiseindia.in";
}
if(strcmp($apply,"Startup-Kochi")==0)
{
$gp="rajesh.varma@franchiseindia.in,investor@franchiseindia.in";
}
if(strcmp($apply,"Startup-Mumbai")==0)
{
$gp="karan.sheth@franchiseindia.in,investor@franchiseindia.in";
}
if(strcmp($apply,"Investor-Pathshala-Jammu")==0)
{
$gp="mahajananshul@yahoo.co.uk,aanchal_global@yahoo.com";
}
if(strcmp($apply,"Startup-Bangalore")==0)
{
$gp="investor@franchiseindia.in,dayanand.ramesh@franchiseindia.in";
}
if(strcmp($apply,"InvestorAq-Chennai")==0 || strcmp($apply,"FIBrands-Chennai")==0)
{
$gp="vvinodh@franchiseindia.in,fnb@franchiseindia.in";
}
if(strcmp($apply,"InvestorAq-Pune")==0 || strcmp($apply,"FIBrands-Pune")==0)
{
$gp="gaurav.sharma@franchiseindia.in";
}
if(strcmp($apply,"InvestorAq-Mumbai")==0 || strcmp($apply,"FIBrands-Mumbai")==0)
{
$gp="jitendra.shreshthi@franchiseindia.in";
}
if(strcmp($apply,"InvestorAq-Bangalore")==0 || strcmp($apply,"FIBrands-Bangalore")==0)
{
$gp="mayank.vashisth@franchiseindia.in";
}
if(strcmp($apply,"InvestorAq-Kolkata")==0 || strcmp($apply,"FIBrands-Kolkata")==0)
{
$gp="shweta.baluja@franchiseindia.in";
}
if(strcmp($apply,"InvestorAq-Hyderabad")==0 || strcmp($apply,"FIBrands-Hyderabad")==0)
{
$gp="naveen.kumar@franchiseindia.in";
}
if(strcmp($apply,"Zinc-n-Rock")==0)
{
$gp="fnb@franchiseindia.in,kvamshi@franchiseindia.in,clubcity@franchiseindia.com,brands@franchiseindia.in";
}
if(strcmp($apply,"FE2011-Nashik")==0)
{
$gp="gpranjalika@franchiseindia.net";
}
if(strcmp($apply,"KattiZone")==0)
{
$gp="sandosh.kumar@kaatizone.com";
}
if(strcmp($apply,"Platinum-World")==0)
{
$gp="arpan.ambastha@franchiseindia.in,retail@franchiseindia.in";
}
if(strcmp($apply,"Shoe-Laundry")==0)
{
$gp="franchise@shoelaundry.com";
$bcc=",mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"Green-People")==0)
{
$gp="nora.adil@franchiseuae.com,gpankaj@franchiseuae.com";
}
if(strcmp($apply,"Mini-Monster-UAE")==0)
{
$gp="gpankaj@franchiseuae.com,nora.adil@franchiseuae.com";
}
if(strcmp($apply,"Blossom-International")==0)
{
$gp="franchise@blossomsplayschool.com";
}
if(strcmp($apply,"Blossom")==0)
{
$gp="franchise@blossomsplayschool.com";
}
if(strcmp($apply,"Blossom-Kochhar-Aroma-Magic")==0)
{
$gp="virender.bisht@aromamagic.com";
}
if(strcmp($apply,"DesertChill")==0)
{
$gp="nathen.furlong@desertchill.ae";
}
if(strcmp($apply,"IronyHome")==0)
{
$gp="office@ironyhomelifestyle.com";
}
if(strcmp($apply,"Firstcry")==0)
{
$gp="shwetank@firstcry.com";
}
if(strcmp($apply,"La-Feasta")==0)
{
$gp="bkaushik@franchiseindia.in,fnb@franchiseindia.in,clubcity@franchiseindia.com,brands@franchiseindia.in";
}
if(strcmp($apply,"Instant-Skin")==0 || strcmp($apply,"Colombiano")==0 || strcmp($apply,"Loontao")==0 || strcmp($apply,"Japengo-Cafe")==0)
{
$gp="jaba.borgohain@franchiseindia.in";
}
if(strcmp($apply,"Jan-Pro")==0)
{
$gp="amitabh.singh@franchiseindia.net";
}
if(strcmp($apply,"Concept-1010")==0)
{
$gp="akanksha.rais@franchiseindia.net";
}
if(strcmp($apply,"Cool-De-Sac")==0)
{
$gp="niharika.rajput@franchiseindia.in";
}
if(strcmp($apply,"BritishOrchard")==0)
{
$gp="education@franchiseindia.in,sumit.mathur@franchiseindia.in";
}
if(strcmp($apply,"Franmatch")==0)
{
$gp="babhishek@franchiseindia.in,retail@franchiseindia.in";
}
if(strcmp($apply,"Mebaz")==0 || strcmp($apply,"Guardian")==0 || strcmp($apply,"Dr-Garg")==0 || strcmp($apply,"Vasari")==0)
{
$gp="retail@franchiseindia.in,clubcity@franchiseindia.com,brands@franchiseindia.in";
}
if(strcmp($apply,"Sparket")==0)
{
$gp="sparket@sparket.in";
}
if(strcmp($apply,"Juice-Salon")==0)
{
$gp="health@franchiseindia.in";
}
if(strcmp($apply,"Animation-Live")==0)
{
$gp="adarsh.vijayan@franchiseindia.in,education@franchiseindia.in";
}
if(strcmp($apply,"Skipper")==0)
{
$gp="franchise@skipperfurnishings.com";
}
if(strcmp($apply,"Simba-Toys")==0)
{
$gp="mohammad@franchiseindia.net,retail@franchiseindia.in";
}
if(strcmp($apply,"Yoko-Sizzlers")==0)
{
$gp="nsachin@franchiseindia.in,fnb@franchiseindia.in,clubcity@franchiseindia.com,brands@franchiseindia.in";
}
if(strcmp($apply,"Coffee-nu")==0 || strcmp($apply,"YaYa")==0 || strcmp($apply,"Keen-clean")==0 || strcmp($apply,"Barista")==0 || strcmp($apply,"IFB")==0 || strcmp($apply,"FIB-PInvII")==0)
{
$gp="mohammad@franchiseindia.net,fnb@franchiseindia.in,brands@franchiseindia.in,clubcity@franchiseindia.in";
}
if(strcmp($apply,"FIB-Discover")==0||strcmp($apply,"FIB-Brokerage")==0||strcmp($apply,"Booster")==0||strcmp($apply,"IMentors")==0 ||strcmp($apply,"MCFIB-Sbarro")==0 ||strcmp($apply,"MCFIB-Reebok")==0 ||strcmp($apply,"MCFIB-Cafejubilee")==0 ||strcmp($apply,"MCFIB-PWellness")==0 ||strcmp($apply,"FIB-PInvI")==0)
{
$gp="nsachin@franchiseindia.in,fnb@franchiseindia.in";
}
if(strcmp($apply,"MCFIB-Chhabra")==0||strcmp($apply,"MCFIB-DHI")==0||strcmp($apply,"MCFIB-SignaRama")==0||strcmp($apply,"MCFIB-Barista")==0||strcmp($apply,"MCFIB-Safal")==0||strcmp($apply,"FIB-DHI")==0||strcmp($apply,"FIB-FBrands")==0)
{
$gp="vanubhav@franchiseindia.in";
}
if(strcmp($apply,"SignARama")==0)
{
$gp="tiptons@sarhg.com";
}
if(strcmp($apply,"Agrimart")==0)
{
$gp="bkaushik@franchiseindia.in";
}
if(strcmp($apply,"FIB-SYOB")==0)
{
$gp="investor@franchiseindia.in,sanjay.vats@franchiseindia.in";
}
if(strcmp($apply,"Centre-for-Management")==0 || strcmp($apply,"Shahani")==0)
{
$gp="akhil.shahani@centreformanagement.com";
}
if(strcmp($apply,"FIP-Intl")==0 || strcmp($apply,"Intl-Canada")==0 || strcmp($apply,"FIIS")==0 || strcmp($apply,"Fastfix")==0 || strcmp($apply,"PopLanguages")==0)
{
$gp="international@franchiseindia.com";
} 
if(strcmp($apply,"FIB-SYOBII")==0)
{
$gp="anitin@franchiseindia.in,fnb@franchiseindia.in,clubcity@franchiseindia.com,brands@franchiseindia.in";
}
if(strcmp($apply,"TFW-Anniversary2012")==0 || strcmp($apply,"TFW-Education")==0 || strcmp($apply,"TFW-WealthWelness")==0 || strcmp($apply,"Retailer-Subscription")==0 || strcmp($apply,"FICOM-Membership")==0 || strcmp($apply,"Indian-Restaurant-Report-2012")==0 || strcmp($apply,"Indian-eRetail-Report-2013")==0 || strcmp($apply,"Google-Adwords")==0 || strcmp($apply,"Indian-Salon-Report-2013")==0)
{
$gp="bpreetima@franchiseindia.net";
}
if(strcmp($apply,"Diwali-Subscription")==0 || strcmp($apply,"Diwali-Christmas")==0 || strcmp($apply,"Valentine-Subscription")==0)
{
$gp="subscribe@franchiseindia.net";
}
if(strcmp($apply,"Estate-Subscription")==0 || strcmp($apply,"SME-Subscription")==0 || strcmp($apply,"TFW-EW-Subscription")==0 || strcmp($apply,"Retailer-SME-Subscription")==0 || strcmp($apply,"TFW-Subscription")==0 || strcmp($apply,"TFW-Retailer-Subscription")==0 || strcmp($apply,"TFW-SME-Subscription")==0 || strcmp($apply,"TFW-SME-Retailer-Subscription")==0)
{
$gp="bpreetima@franchiseindia.net,magazine@franchiseindia.net";
}
if(strcmp($apply,"Estate-Advertise")==0)
{
$gp="bpreetima@franchiseindia.net,daman@franchiseindia.net";
}
if(strcmp($apply,"Entrepreneur-Advertise")==0)
{
$gp="marketing@entrepreneurindia.com";
}
if(strcmp($apply,"SME-Advertise")==0)
{
$gp="bpreetima@franchiseindia.net,sanjay@entrepreneurindia.org";
}
if(strcmp($apply,"TFW-Advertise")==0)
{
$gp="advertise@franchiseindia.com";
}
if(strcmp($apply,"Lullaby")==0)
{
$gp="kdarshan@franchiseindia.in";
}
if(strcmp($apply,"Lolipop")==0)
{
$gp="franchisee@lolipopindia.com";
}
if(strcmp($apply,"Agarwal-packers")==0 || strcmp($apply,"FIB-NIPS")==0 || strcmp($apply,"Gtec")==0 || strcmp($apply,"Boost-Plus")==0)
{
$gp="rgaurav@franchiseindia.in";
}
if(strcmp($apply,"BSL-Franchise")==0)
{
$gp="response@bsltraining.co.in";
}
if(strcmp($apply,"Discounted-Flats")==0)
{
$gp="retail@franchiseindia.in,aakansha.sharan@franchiseindia.in";
}
if(strcmp($apply,"Phonecare")==0)
{
$gp="retail@franchiseindia.in,vinit.singh@franchiseindia.in";
}
if(strcmp($apply,"Edible")==0)
{
$gp="fnb@franchiseindia.in,priyanka.singh@franchiseindia.net";
}
if(strcmp($apply,"Piebee")==0)
{
$gp="anshumaan@gempro.in";
}
if(strcmp($apply,"YLG-Salon")==0 || strcmp($apply,"FIB-BglreSpa")==0)
{
$gp="tsakshi@franchiseindia.in,kvamshi@franchiseindia.in";
}
if(strcmp($apply,"SYoB")==0)
{
$gp="bkaushik@franchiseindia.in,ssandeep@franchiseindia.in";
}
if(strcmp($apply,"FI-Int")==0)
{
$gp="mike@franchiseindia.in,ksonali@franchiseindia.net,international@franchiseindia.com";
}
if(strcmp($apply,"Specsmaker")==0)
{
$gp="info@specsmakers.in";
}
if(strcmp($apply,"TheEBClub")==0)
{
$gp="kgunjan@franchiseindia.in";
}
if(strcmp($apply,"Aloha")==0)
{
$gp="franchise@alohaindia.com";
}
if(strcmp($apply,"Aisect")==0)
{
$gp="newcentre@aisect.org";
}
if(strcmp($apply,"Entrepreneur-India")==0)
{
$gp="marketing@entrepreneurindia.com";
}
if(strcmp($apply,"Women-Entrepreneur")==0 || strcmp($apply,"FIBL-Republic-Day")==0)
{
$gp="investor@franchiseindia.in";
}
if(strcmp($apply,"FIB-Opportunities")==0)
{
$gp="feedback@franchiseindia.in,csonya@franchiseindia.in";
}
if(strcmp($apply,"PerfumeStation")==0 || strcmp($apply,"Attero")==0)
{
$gp="cvipin@franchiseindia.in, anitin@franchiseindia.in";
}
if(strcmp($apply,"Sona")==0)
{
$gp="cvipin@franchiseindia.in,health@franchiseindia.in";
}
if(strcmp($apply,"FIPS-Sunny")==0)
{
$gp="rohit.sachdeva@franchiseindia.net";
}
if(strcmp($apply,"FME-EFS")==0)
{
$gp="gwinona@franchiseuae.com,expo@franchiseindia.com";
}
if(strcmp($apply,"FIUAEI")==0)
{
$gp="gwinona@franchiseuae.com";
}
if(strcmp($apply,"FI-UAE")==0)
{
$gp="gwinona@franchiseuae.com";
}
if(strcmp($apply,"Franchisor-Services")==0)
{
$gp="nikhil.sareen@franchiseindia.in,anshit.chandra@franchiseindia.in";
}
if(strcmp($apply,"FIB-aiTeaser")==0)
{
$gp="bsimran@franchiseindia.in,fnb@franchiseindia.in,clubcity@franchiseindia.com,brands@franchiseindia.in";
}
if(strcmp($apply,"Ideal")==0)
{
$gp="elive@idealclasses.com, pm@idealclasses.com, idealelive@ymail.com";
}
if(strcmp($apply,"Whirlpool")==0)
{
$gp="vipul_goel@whirlpool.com";
}
if(strcmp($apply,"Frankfinn-FI")==0)
{
$gp="info@firstimpressionfrankfinn.com";
}
if(strcmp($apply,"FIBL2010")==0)
{
$gp="kprashant@franchiseindia.in";
}
if(strcmp($apply,"FRO2010")==0)
{
$gp="expo@franchiseindia.com";
}
if(strcmp($apply,"FRO2012-Delhi")==0)
{
$gp="ankit.gupta@franchiseindia.in, investor@franchiseindia.in";
}
if(strcmp($apply,"ChampionIndustries")==0)
{
$gp="aloksurana@championmesh.in";
}
if(strcmp($apply,"FICCI")==0)
{
$gp="surabhi.pant@ficci.com";
}
if(strcmp($apply,"Starkids")==0)
{
$gp="franchise@starkids.in";
} 
if(strcmp($apply,"Strands")==0)
{
$gp="ppankaj@franchiseindia.in";
}
if(strcmp($apply,"Maharishi")==0)
{
$gp="hc@maharishiayurvedaindia.com";
} 
if(strcmp($apply,"Baidyanath")==0)
{
$gp="dr.srini@baidyanathlifesciences.com,info@baidyanathlifesciences.com";
} 
if(strcmp($apply,"DPMI")==0)
{
$gp="gourav.mahajan@dpmiindia.com";
} 
if(strcmp($apply,"Safal-ncr")==0)
{
$gp="ssushant@franchiseindia.net";
}
if(strcmp($apply,"FIBL-C-Sportybeans")==0)
{
$gp="franchising@sportybeans.com";
}
if(strcmp($apply,"Labour-Day")==0 || strcmp($apply,"Happy-Mothers-Day")==0 || strcmp($apply,"FIB-Marwar")==0 || strcmp($apply,"Happy-Fathers-Day")==0 || strcmp($apply,"FIB-Startup-Services")==0 || strcmp($apply,"Veterans")==0 || strcmp($apply,"Happy-Independence-Day")==0)
{
$gp="investor@franchiseindia.in,anshit.chandra@franchiseindia.in";
}
if(strcmp($apply,"Safal-Bangalore")==0)
{
$gp="ssushant@franchiseindia.in";
}
if(strcmp($apply,"USPizza")==0)
{
$gp="Sheeja@uspizza.in";
}
if(strcmp($apply,"Focus-Educare")==0 || strcmp($apply,"Perfect-Wellness")==0 || strcmp($apply,"FIB-GFA")==0 || strcmp($apply,"Derby")==0 || strcmp($apply,"PizzaCorner")==0 || strcmp($apply,"Sanjeev-Kapoor")==0 || strcmp($apply,"YoChina")==0)
{
$gp="aanshu@franchiseindia.net,fnb@franchiseindia.in";
}
if(strcmp($apply,"Pasta-Bar")==0 || strcmp($apply,"Bizzy-B")==0)
{
$gp="priyanka.singh@franchiseindia.net,fnb@franchiseindia.in";
}
if(strcmp($apply,"Brainworks")==0)
{
$gp="education@franchiseindia.in";
}
if(strcmp($apply,"FrameBoxx")==0)
{
$gp="sdivya@franchiseindia.in,education@franchiseindia.in";
}
if(strcmp($apply,"Leevon")==0 || strcmp($apply,"F-Studio")==0)
{
$gp="madhukar.gupta@franchiseindia.in,retail@franchiseindia.in";
}
if(strcmp($apply,"FirstStep")==0)
{
$gp="rasweee.kaur@franchiseindia.in,education@franchiseindia.in";
}
if(strcmp($apply,"Arcot-Narrain")==0)
{
$gp="infinity@ukn.co.in";
} 
if(strcmp($apply,"Wellness-Pathcare")==0)
{
$gp="info@wholebodycheckup.com";
} 
if(strcmp($apply,"FocusSoftnet")==0)
{
$gp="rgaurav@franchiseindia.in,services@franchiseindia.in";
}
if(strcmp($apply,"FIB-fb")==0 || strcmp($apply,"FIB-Services")==0 || strcmp($apply,"FIB-Retail")==0)
{
$gp="feedback@franchiseindia.in";
}
if(strcmp($apply,"FranLegal-FI")==0 || strcmp($apply,"FranLegal")==0)
{
$gp="legal@franchiseindia.com,serena.satheesan@franchiseindia.net";
}
if(strcmp($apply,"FranLegal-IP")==0)
{
$gp="serena.satheesan@franchiseindia.net"; 
} 
if(strcmp($apply,"StrategyAcademy")==0 || strcmp($apply,"Rockport")==0 || strcmp($apply,"FIB-SYOBI")==0 || strcmp($apply,"IceCube")==0)
{
$gp="msomya@franchiseindia.in";
}
if(strcmp($apply,"CharmingApparel")==0)
{
$gp="ishank.sahani@franchiseindia.in,retail@franchiseindia";
} 
if(strcmp($apply,"Treasure-Eduplex")==0)
{
$gp="kjaspreet@franchiseindia.in";
}
if(strcmp($apply,"FIB-FGC")==0)
{
$gp="capitalservices@franchiseindia.in";
}
if(strcmp($apply,"Sbarro")==0)
{
$gp="rshweta@franchiseindia.in";
}
if(strcmp($apply,"Jetking")==0)
{
$gp="franchise@jetking.com";
}
if(strcmp($apply,"BOS-Jetking")==0)
{
$gp="franchise@jetking.com";
}
if(strcmp($apply,"FI-PEM2010")==0 || strcmp($apply,"Successguru")==0 || strcmp($apply,"MCFIB-BOEDU")==0 || strcmp($apply,"MCFIB-BOFOOD")==0 || strcmp($apply,"MCFIB-FREDU")==0 || strcmp($apply,"MCFIB-FRSPA")==0)
{
$gp="sanantjit@franchiseindia.in";
}
if(strcmp($apply,"Satyapaul")==0 || strcmp($apply,"Tierack-London")==0 || strcmp($apply,"Bwitch")==0 || strcmp($apply,"Edify")==0)
{
$gp="bvijay@franchiseindia.net";
} 
if(strcmp($apply,"ChocolateHeaven")==0)
{
$gp="shivendu.shirivastava@franchiseindia.in,fnb@franchiseindia.in";
}
if(strcmp($apply,"TheChocolateRoom")==0)
{
$gp="kumaryogola@gmail.com";
}
if(strcmp($apply,"FIB-AAL")==0)
{
$gp="farozan@franchiseindia.in";
}
if(strcmp($apply,"Dial-Desk")==0)
{
$gp="services@franchiseindia.in,priyesh.sharma@franchiseindia.in";
}
if(strcmp($apply,"MRB-Retail")==0)
{
$gp="bvijay@franchiseindia.net";
}
if(strcmp($apply,"FranRecruit")==0)
{
$gp="ranjeeta.kaul@franchiseindia.org";
}
if(strcmp($apply,"Annapoorna")==0)
{
$gp="pswati@franchiseindia.org";
}
if(strcmp($apply,"Decoding")==0 || strcmp($apply,"FI-Education")==0 || strcmp($apply,"FI-EduCongress")==0 || strcmp($apply,"FI-Education08")==0)
{
$gp="contact@franchiseindia.com";
}  
if(strcmp($apply,"yocc")==0)
{
$gp="info.bigv@gmail.com";
}
if(strcmp($apply,"Funland")==0 || strcmp($apply,"Colonels-kababz")==0)
{
$gp="kvikram@franchiseindia.in";
}
if(strcmp($apply,"Cache-Furniture")==0)
{
$gp="mak@cachefurnitures.net,divesh@cachefurnitures.net";
}
if(strcmp($apply,"FI-AccessIndia")==0)
{
$gp="international@franchiseindia.com";
} 
if(strcmp($apply,"IndusLeague")==0)
{
$gp="kawaljeet.kaur@franchiseindia.in,retail@franchiseindia.in";
}
if(strcmp($apply,"FI-Awards2010")==0)
{
$gp="awards@franchiseindia.com";
}
if(strcmp($apply,"Retail-Awards2010")==0)
{
$gp="awards@franchiseindia.com";
}
if(strcmp($apply,"FIB-Treasure")==0)
{
$gp="rentfree@franchiseindia.in";
}
if(strcmp($apply,"Godrej-Interio")==0)
{
$gp="interiofranchise@godrej.com,fimum@franchiseindia.com";
}
if(strcmp($apply,"NetAmbit")==0)
{
$gp="cvikas@franchiseindia.net";
}
if(strcmp($apply,"RemaxFI")==0)
{
$gp="sunny@franchiseindia.in";
}
if(strcmp($apply,"Kinderstand")==0)
{
$gp="ssaket@franchiseindia.net";
}  
if(strcmp($apply,"BluueMango")==0)
{
$gp="aditee@francorp.in";
}
if(strcmp($apply,"BlueMantra")==0 || strcmp($apply,"Senorita")==0)
{
$gp="qrashid@franchiseindia.in,retail@franchiseindia.in";
}
if(strcmp($apply,"ColourLounge")==0 || strcmp($apply,"CookieMan")==0)
{
$gp="neha.singh@franchiseindia.in,fnb@franchiseindia.in";
}
if(strcmp($apply,"FIBL-Galito")==0 || strcmp($apply,"Jymka")==0)
{
$gp="niharika.rajput@franchiseindia.in";
}
if(strcmp($apply,"Kaysons-Education")==0)
{
$gp="support@kaysonseducation.co.in,manaskapoor@kaysonseducation.co.in";
}
if(strcmp($apply,"Blue-Water-Mall")==0 || strcmp($apply,"TDI-Mall")==0 || strcmp($apply,"TriCity")==0)
{
$gp="property@franchiseindia.com";
}
if(strcmp($apply,"Champion")==0 || strcmp($apply,"Wardrobe")==0 || strcmp($apply,"Bata")==0)
{
$gp="jparag@franchieindia.net";
}
if(strcmp($apply,"Peninsula-Mall")==0)
{
    $gp="aabhishek@franchiseindia.net";
}
if(strcmp($apply,"Remax")==0)
{
    $gp="aaggarwal@remax.in";
}
if(strcmp($apply,"Pragati")==0)
{
    $gp="gautam.gupte@pragatileadership.com";
}
if(strcmp($apply,"GV-Mall")==0 || strcmp($apply,"Omaxe")==0 || strcmp($apply,"FIPS-HyperMarketChain")==0)
{
    $gp="propertyservices@franchiseindia.com";
}
if(strcmp($apply,"Veta")==0)
{
$gp="premj@vetaglobal.com, franchisee@vetaglobal.com";
}
if(strcmp($apply,"Francorp-Preschool")==0 || strcmp($apply,"Francorp-Communication")==0)
{
$gp="consulting@franchiseindia.com";
}
if(strcmp($apply,"Francorp-Divani")==0)
{
$gp="surbhi.chawla@franchiseindia.in";
}
if(strcmp($apply,"Francorp")==0 || strcmp($apply,"Francorp-One-To-Many")==0 || strcmp($apply,"Francorp-Food")==0 || strcmp($apply,"Francorp-Education")==0 || strcmp($apply,"Francorp-Beauty")==0 || strcmp($apply,"Francorp-Retail")==0 || strcmp($apply,"Francorp-Consult-with-Gaurav-Marya")==0)
{
$gp="info@francorp.in";
}
if(strcmp($apply,"Francorp-Delhi")==0)
{
$gp="consulting@franchiseindia.com,vgaurav@francorp.in";
}
if(strcmp($apply,"Francorp-North")==0)
{
$gp="ramanpreet.kaur@francorp.in";
}
if(strcmp($apply,"Francorp-West")==0)
{
$gp="consulting@franchiseindia.com";
}
if(strcmp($apply,"Francorp-South")==0)
{
$gp="consulting@franchiseindia.com,anoop.wadhwa@francorp.in";
}
if(strcmp($apply,"kindercare")==0)
{
$gp="enquiry@kindercareschools.com";
}
if(strcmp($apply,"FI-Investor")==0)
{
$gp="svaishali@franchiseindia.com";
}
if(strcmp($apply,"Franchise-Meet")==0)
{
$gp="retailservices@franchiseindia.com,property@franchiseindia.com";
}
if(strcmp($apply,"FI-Meet")==0 || strcmp($apply,"Middle-East")==0)
{
$gp="nkrisha@franchiseuae.com";
}
if(strcmp($apply,"FICOM-MUM")==0 || strcmp($apply,"FI2012-Expo-MUM")==0)
{
$gp="fimum@franchiseindia.com";
}
if(strcmp($apply,"The-Learning-Centre")==0)
{
$gp="pswati@franchiseindia.org";
}
if(strcmp($apply,"Brand-Licensing")==0)
{
$gp="contact@licenseindia.com";
}
if(strcmp($apply,"BradfordLI")==0 || strcmp($apply,"Polaroid")==0 || strcmp($apply,"DeniseRichards")==0 || strcmp($apply,"BLI-Aspen")==0 || strcmp($apply,"BLI-MelsDriveIn")==0 || strcmp($apply,"BLI-BritishMotorHeritage")==0 || strcmp($apply,"TIN-TIN")==0 || strcmp($apply,"BLI-Pepsi")==0 || strcmp($apply,"BLI-MenInBlack")==0 || strcmp($apply,"BLI-GWR")==0 || strcmp($apply,"BLI-DelhiDaredevils")==0 || strcmp($apply,"PemperedGirls")==0 || strcmp($apply,"OxfordUniversity")==0 || strcmp($apply,"KingsXIPunjab")==0 || strcmp($apply,"MeToYou")==0 || strcmp($apply,"BLI-HappyHouse")==0)
{
$gp="chitra.johri@bradfordlicenseindia.com";
}
if(strcmp($apply,"FI-Solutions")==0||strcmp($apply,"Koochie-Play")==0)
{
$gp="tatul@franchiseindia.net,mrahul@franchiseindia.net";
}
if(strcmp($apply,"Samdariya-Mall")==0 || strcmp($apply,"Combined-Mall")==0 || strcmp($apply,"PropertyLease")==0)
{
$gp="retailservices@franchiseindia.com,fips@franchiseindia.com";
}
if(strcmp($apply,"D-Mall")==0)
{
$gp="retailservices@franchiseindia.com,fips@franchiseindia.com, zever_international@yahoo.com";
}
if(strcmp($apply,"PlanetM")==0)
{
$gp="mrohit@franchiseindia.net";
}
if(strcmp($apply,"Snakart")==0)
{
$gp="mohammed@franchiseindia.in,hmohit@franchiseindia.in";
}
if(strcmp($apply,"Sir-Speedy")==0 || strcmp($apply,"GGI-Entertainment")==0)
{
$gp="abhishek.mittal@franchiseindia.in,pshashwat@franchiseindia.net";
}
if(strcmp($apply,"FIB-Dsalon")==0 || strcmp($apply,"FIB-Edufood")==0)
{
$gp="bsimran@franchiseindia.in";
}
if(strcmp($apply,"Lake-City")==0 || strcmp($apply,"FIP-MansarovarPlaza")==0)
{
$gp="property@franchiseindia.com,rohit.sachdeva@franchiseindia.net";
}
if(strcmp($apply,"Iken-Scientifica")==0)
{
$gp="info@iken.in";
$bcc=",mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"FIB-CoffeeChain")==0)
{
$gp="vvikram@franchiseindia.net";
}
if(strcmp($apply,"Iken")==0)
{
$gp="franchise@mexuseducation.com";
}
if(strcmp($apply,"Plus-Vending")==0)
{
$gp="pulin@plusbeverages.com";
}
if(strcmp($apply,"Everonn-Education")==0)
{
$gp="naveenkumar@everonn.com";
}
if(strcmp($apply,"FI_Consulting")==0)
{
$gp="opportunities@franchiseindia.com";
}

if(strcmp($apply,"FI-Brand")==0)
{
$gp="response@franchiseindia.in";
}

if(strcmp($apply,"FRO10-Ahmedabad")==0)
{
$gp="expo@franchiseindia.com";
}

if(strcmp($apply,"BOS-C-Lenskart-Jamnagar")==0 || strcmp($apply,"BOS-C-Lenskart-Rajkot")==0 || strcmp($apply,"BOS-C-Lenskart-Surat")==0 || strcmp($apply,"BOS-C-Lenskart-Vadodara")==0 || strcmp($apply,"BOS-C-Lenskart-Ahmedabad")==0)
{
$gp="sdivya@franchiseindia.net;utpal.panda@franchiseindia.net";
}
/*if(strcmp($apply,"Ashika")==0)
{
$gp="saurabh.agarwal@ashika.com,member@franchiseindia.com";
}*/

if(strcmp($apply,"TOI-Lenskart")==0)
{
$gp="beafranchise@lenskart.in";
}
if(strcmp($apply,"TOI-Career-Launchers")==0)
{
$gp="bp@careerlauncher.com,manoj.chandra@careerlauncher.com";
}
if(strcmp($apply,"TOI-EduCADD-Learning")==0)
{
$gp="jaspreet@educadd.net";
}
if(strcmp($apply,"TOI-Red-Moments")==0)
{
$gp="franchise@redmoments.in";
}
if(strcmp($apply,"TOI-CHICK-BLAST")==0)
{
$gp="info@chickblast.com";
}
if(strcmp($apply,"TOI-Unidus-Services")==0)
{
$gp="sanjit@unidusservices.com";
}
if(strcmp($apply,"TOI-Anytime-Fitness")==0)
{
$gp="mohit.verma@franchiseindia.in";
}
if(strcmp($apply,"TOI-Tenacious-Techies")==0)
{
$gp="contact@tenacioustechies.com";
}
if(strcmp($apply,"TOI-Broaster-Chicken")==0)
{
$gp="manish.kumar@franchiseindia.in";
}
if(strcmp($apply,"TOI-Rod-Anker")==0)
{
$gp="neha.chawla@franchiseindia.in";
}
if(strcmp($apply,"TOI-Sporty-Beans")==0)
{
$gp="tanya.chowdhry@sportybeans.com";
}
if(strcmp($apply,"TOI-UVX")==0)
{
$gp="jkapoor@franchiseindia.in";
}

if(strcmp($apply,"FranchiseGuru")==0)
{
$gp="marketing@franchiseindia.net";
}
if(strcmp($apply,"re-STORE")==0)
{
$gp="franchisee@re-store.co.in";
}
if(strcmp($apply,"London-Institute")==0)
{
$gp="danny@londoninstituteworld.com,member@franchiseindia.com";
}
if(strcmp($apply,"Advertise[RETAILER]")==0)
{
$gp="support@indianretailer.com";
}
if(strcmp($apply,"BBX")==0)
{
$gp="snisha@franchiseindia.net";
}
if(strcmp($apply,"Gitanjali-Jewels")==0)
{
$gp="karthikeyan@gitanjaligroup.com";
}
if(strcmp($apply,"Hauck")==0)
{
$gp="ifarozan@franchiseindia.net";
}
if(strcmp($apply,"Castrol-BikeZone")==0)
{
$gp="tanya@franchiseindia.com";
}
if(strcmp($apply,"Masala-Country")==0)
{
$gp="clubcity@franchiseindia.com";
}
if(strcmp($apply,"Gitanjali")==0 || strcmp($apply,"Enamor")==0 || strcmp($apply,"Safal")==0 || strcmp($apply,"samsonite")==0 || strcmp($apply,"Siyaram")==0)
{
$gp="bvijay@franchiseindia.net";
}
if(strcmp($apply,"Ease-My-Trip")==0)
{
$gp="franchise@easemytrip.com,nishant@easemytrip.com";
}
if(strcmp($apply,"Kreative")==0)
{
$gp="ho@scsedu.com,srinivas@scsedu.com";
}
if(strcmp($apply,"ShanghaiPost")==0)
{
$gp="clubcity@franchiseindia.com";
}
if(strcmp($apply,"SpaSiam")==0)
{
$gp="lifestyle@franchiseindia.in";
}
if(strcmp($apply,"ClubCity")==0 || strcmp($apply,"Pizza-n-Co")==0 || strcmp($apply,"JustCuts")==0|| strcmp($apply,"MasalaCountry")==0)
{
$gp="clubcity@franchiseindia.com";
}
if(strcmp($apply,"Khyber")==0 || strcmp($apply,"Crestcom")==0 )
{
$gp="tatul@franchiseindia.com";
}
if(strcmp($apply,"Franchisor-Marketing")==0)
{
$gp="opportunities@franchiseindia.com";
}
if(strcmp($apply,"TIE-FRO")==0)
{
$gp="sarvind@franchiseindia.net";
}
if(strcmp($apply,"Cartridge-World")==0)
{
$gp="franchise@cartridgeworld.in";
}
if(strcmp($apply,"BonSouth")==0)
{
$gp="partner@bonsouth.com";
}
if(strcmp($apply,"Next")==0)
{
$gp="bvijay@franchiseindia.net";
}
if(strcmp($apply,"Entrepreneur-2011")==0)
{
$gp="vneeta@franchiseindia.com, mpooja@franchiseindia.net";
}
if(strcmp($apply,"Coffee-Republic")==0 || strcmp($apply,"MediTravels")==0|| strcmp($apply,"British2010")==0|| strcmp($apply,"CoffeeClub")==0||strcmp($apply,"FII-Fashion")==0|| strcmp($apply,"Mydestinationinfo")==0|| strcmp($apply,"Canada-Expo")==0 || strcmp($apply,"FII-IFE")==0)
{
$gp="international@franchiseindia.com";
}
if(strcmp($apply,"Cafe-Jubilee")==0 || strcmp($apply,"Jindal-ARC")==0)
{
$gp = ",hmohit@franchiseindia.in"; //$gp="cafejubilee@franchiseindia.net";
}
if(strcmp($apply,"Knowledge-Series")==0 ||strcmp($apply,"KS-FYB")==0 || strcmp($apply,"EI2011-YS")==0)
{
$gp="contact@franchiseindia.com";
}
if(strcmp($apply,"Store99")==0 ||strcmp($apply,"Fashion-n-I")==0 || strcmp($apply,"Castrol")==0)
{
$gp="bvenus@franchiseindia.com,consulting@franchiseindia.com";
}
if(strcmp($apply,"ABC-Montessori")==0)
{
$gp="info@abcmontessori.net";
}
if(strcmp($apply,"MAthnasium")==0)
{
$gp="andrej@mathnasium.com";
}
if(strcmp($apply,"Colors-Mall")==0)
{
$gp="vanshul@franchiseindia.net";
}
if(strcmp($apply,"BOAG")==0)
{
$gp="sachin@franchiseindia.com";
}
if(strcmp($apply,"Welhome")==0)
{
$gp="opportunities@franchiseindia.com";
}
if(strcmp($apply,"Aptech")==0)
{
$gp="sbthirtheswara@hotmail.com";
}
if(strcmp($apply,"Re-Feel")==0)
{
$gp="tabinda@re-feel.in";
}
if(strcmp($apply,"ThinkLink")==0)
{
$gp="SCM_Learning@ThinkLink-SCS.com,rrakesh@franchiseindia.com";
}
if(strcmp($apply,"Smart-Shop")==0 || strcmp($apply,"FI-Verified")==0 || strcmp($apply,"FI-Dotcom")==0 || strcmp($apply,"FI-Category")==0 || strcmp($apply,"FI-Diwali")==0 || strcmp($apply,"FI-Diwali-RoyalPack")==0 || strcmp($apply,"FI-Diwali-RoyalPack2")==0 || strcmp($apply,"FI-Diwali-SupremePack")==0 || strcmp($apply,"FI-Diwali-DeluxPack")==0 || strcmp($apply,"FI-Diwali-EarlyBirdPack")==0 || strcmp($apply,"FI-DOTCOM-Advertise")==0 || strcmp($apply,"FI-Christmas")==0 || strcmp($apply,"FIHL-Web-Launch")==0)
{
$gp="member@franchiseindia.com";
}
if(strcmp($apply,"OverniteExpress")==0)
{
$gp="joinus@overnite-mail.com";
}
if(strcmp($apply,"IndiaInfoline")==0)
{
$gp="ca@indiainfoline.com";
}
if(strcmp($apply,"Yum-Yum-Dimsum")==0)
{
$gp="puja@yumyumdimsum.com,unitasfoods@gmail.com";
}
if(strcmp($apply,"EMDI")==0)
{
$gp="marketing@franchiseindia.com";
}
if(strcmp($apply,"Tanclean")==0||strcmp($apply,"Sanskriti-2")==0)
{
$gp="cesha@franchiseindia.net";
}
if(strcmp($apply,"BananaMoon")==0 || strcmp($apply,"Change")==0)
{
$gp="lifestyle@franchiseindia.in";
}
if(strcmp($apply,"MBAGuru")==0)
{
$gp="pawandeepaneja@hotmail.com,member@franchiseindia.com";
}
if(strcmp($apply,"Impel")==0||strcmp($apply,"Impel-Overseas")==0)
{
$gp="member@franchiseindia.com";
}
if(strcmp($apply,"FI-Brands")==0)
{
$gp="response@franchiseindia.in";
}
if(strcmp($apply,"Meru-Plus")==0)
{
$gp="info@meruplus.com";
$bcc=",mumaccounts@franchiseindia.net";
}
if(strcmp($apply,"Smoothie")==0)
{
$gp="abhishek.mittal@franchiseindia.in";
}
if(strcmp($apply,"Global-Brands")==0 || strcmp($apply,"Voltz")==0 || strcmp($apply,"British2010")==0 || strcmp($apply,"Medi-Travels")==0)
{
$gp="international@franchiseindia.com";
}
if(strcmp($apply,"FG-UAE")==0)
{
$gp="internationalbrands@franchiseindia.net";
}
if(strcmp($apply,"FI-International")==0)
{
$gp="sumit.gupta@franchiseindia.in";
}
if(strcmp($apply,"Mkt-PEB")==0)
{
$gp="ashita@franchiseindia.com,member@franchiseindia.com";
}
if(strcmp($apply,"Indian-Franchise-Report-2012")==0 || strcmp($apply,"TFW-Diwali-Offer")==0)
{
$gp="ashita@franchiseindia.com";
}
if(strcmp($apply,"TFW-Advertise-Banner")==0)
{
$gp="ashita@franchiseindia.com";
}
if(strcmp($apply,"TFW-Subscribe-Banner")==0)
{
$gp="subscribe@franchiseindia.net";
}
if(strcmp($apply,"TFW-FBCampaign")==0)
{
$gp="ashita@franchiseindia.com,support@indianretailer.com";
  $bcc=",deepak@franchiseindia.net";
}

if(strcmp($apply,"Campaign-TFW")==0)
{
$gp="ashita@franchiseindia.com,sales@franchiseindia.com,kanamika@franchiseindia.net";
  $bcc=",deepak@franchiseindia.net";
}

if(strcmp($apply,"Franalyst")==0)
{
$gp="president@franchiseindia.com,ksonali@franchiseindia.net";
}
if(strcmp($apply,"ZICA")==0)
{
$gp="ritesh.anchan@zeelearn.com";
$bcc=",fimum@franchiseindia.com,mumaccounts@franchiseindia.net";
}
elseif(strcmp($apply,"KidsCamp")==0)
{
$gp="parvezkunda@hotmail.com";
	$bcc=",aditee@francorp.in";
}
elseif(strcmp($apply,"Optique")==0)
{
$gp="optique@vsnl.com";
$bcc=",dsrinivas@franchiseindia.net";
}
elseif(strcmp($apply,"STORM")==0)
{
$gp="satish@scsedu.com";
$bcc=",member@franchiseindia.com";
}
elseif(strcmp($apply,"Aartissan")==0)
{
$gp="gayatri@aartissananimation.com";
$bcc=",dsrinivas@franchiseindia.net";
}
elseif(strcmp($apply,"Eurokids")==0)
{
$gp="partner@eurokidsindia.com";
}
elseif(strcmp($apply,"Florista")==0)
{
$gp="rahul.bhuyan@florista.in";
$bcc=",mumbai@franchiseindia.com";
}
elseif(strcmp($apply,"LeapBridge")==0)
{
$gp="vanubhav@franchiseindia.in";
$bcc=",kjaspreet@franchiseindia.in";
}
elseif(strcmp($apply,"Lisahomesolutions")==0)
{
$gp="ratnesh@lisahomesolutions.com";
$bcc=",banshul@franchiseindia.net";
}
elseif(strcmp($apply,"Expjewelery")==0)
{
$gp="info@expjewelery.com";
$bcc=",member@franchiseindia.com";
}
elseif(strcmp($apply,"Toonz")==0)
{
$gp="rajni@toonz.in";
$bcc=",member@franchiseindia.com,mediabangalore@franchiseindia.com";
}

elseif(strcmp($apply,"Juice-Lounge")==0)
{
$gp="franchisee@juiceloungejuicebar.com,sumit@juiceloungejuicebar.com";
$bcc=",mumaccounts@franchiseindia.net,fimum@franchiseindia.com";
}

/*elseif(strcmp($apply,"REMAX")==0)
{
$gp="meenakshighosh@ymail.com";
$bcc=",member@franchiseindia.com";
}*/
elseif(strcmp($apply,"iProf")==0)
{
$gp="franchisee@iprofindia.com";
$bcc=",member@franchiseindia.com";
}
elseif(strcmp($apply,"KindleKare")==0)
{
$gp="info@kindlekare.in";
$bcc=",dsrinivas@franchiseindia.net";
}
elseif(strcmp($apply,"Kangaroo-Kids")==0)
{
	$gp="Ijlal@kkel.com";
	$bcc=",fimum@franchiseindia.com";
}
elseif(strcmp($apply,"Mahindra-First-Choice")==0)
{
	$gp="nagar.tarun@mahindra.com";
	//$bcc=",fimum@franchiseindia.com";
}
elseif(strcmp($apply,"ClubMahindra")==0)
{
	$gp="rajendra.kakade@mahindraholidays.com";
	$bcc=",mumaccounts@franchiseindia.net";
}
elseif(strcmp($apply,"ClubMahindra-Travel")==0)
{
	$gp="sangeet.chikhlikar@gmail.com";
	//$bcc=",mumaccounts@franchiseindia.net";
}
elseif(strcmp($apply,"Lakme-Salon")==0)
{
	$gp="rahul.chavan@lakmelever.com";
	$bcc=",fimum@franchiseindia.com";
}
elseif(strcmp($apply,"Clublaptop")==0)
{
	$gp="franchise@clublaptop.com";
	//$bcc=",member@franchiseindia.com";
}
elseif(strcmp($apply,"I360")==0)
{
	$gp="franchiseenquiry@i360training.in";
	$bcc=",kjaspreet@franchiseindia.in";
}
elseif(strcmp($apply,"Marshalls")==0)
{
	$gp="franchise@marshallswallpaper.com";
	$bcc=",fimum@franchiseindia.com";
}
elseif(strcmp($apply,"IndiaGames")==0)
{
	$gp="alok@indiagames.com, tejraj.parab@indiagames.com";
	$bcc=",fimum@franchiseindia.com";
}
elseif(strcmp($apply,"DailyBread")==0)
{
	$gp="shashidhar@dailybread.co.in";
	$bcc=",mediabangalore@franchiseindia.com";
}
elseif(strcmp($apply,"Aadyant")==0)
{
	$gp="hemakshi@aadyant.com, shaily.shah@aadyant.com";
	$bcc=",member@franchiseindia.com";
} 
elseif(strcmp($apply,"CG-Mantra")==0)
{
	$gp="ajayk@cgmantra.in";
	$bcc=",gyajur@franchiseindia.com";
}
elseif(strcmp($apply,"Slice-Italy")==0)
{
	$gp="atul@sliceofitaly.com";
	$bcc=",gyajur@franchiseindia.com";
}
elseif(strcmp($apply,"Vinil-Online")==0)
{
	$gp="info@committosuccess.com";
	$bcc=",member@franchiseindia.com";
}
elseif(strcmp($apply,"Promise")==0)
{
	$gp="info@promise-your-child.com";
	$bcc=",member@franchiseindia.com";
}
elseif(strcmp($apply,"Vcare")==0)
{
	$gp="franchise@vcaretrichology.com";
	$bcc=",dsrinivas@franchiseindia.net";
}
elseif(strcmp($apply,"FIB-Edu-T")==0)
{
	$gp="president@franchiseindia.com";
	$bcc=",csonya@franchiseindia.in,mvarun@franchiseindia.in";
}
elseif(strcmp($apply,"Geniusport")==0)
{
	$gp="franchises@geniusport.com";
	$bcc=",dsrinivas@franchiseindia.net";
}
elseif(strcmp($apply,"Kidsgurukul")==0)
{
    $gp="info@kidsgurukul.com";
	$bcc=",member@franchiseindia.com";
}
elseif(strcmp($apply,"NadiaHR")==0)
{
    $gp="recruitment@nadia-me.com";
	$bcc=",banshul@franchiseindia.net";
} 
elseif(strcmp($apply,"Serra")==0)
{
    $gp="franchise@serrapreschools.com";
	$bcc=",fimum@franchiseindia.com,mumaccounts@franchiseindia.net";
} 
elseif(strcmp($apply,"Ashika")==0)
{
    $gp="saurabh.agarwal@ashika.com";
	$bcc=",member@franchiseindia.com";
}
elseif(strcmp($apply,"Anshu")==0 || strcmp($apply,"Anshus-Lolipop")==0)
{
	$gp="anshusdesigns@gmail.com";
	$bcc=",member@franchiseindia.com";
}
elseif(strcmp($apply,"Prosper-Overseas")==0)
{
	$gp="dheeran.choudhary@prosperoverseas.com";
	$bcc=",member@franchiseindia.com";
}
elseif(strcmp($apply,"i-Prof")==0)
{
	$gp="franchisee@iprofindia.com";
	$bcc=",member@franchiseindia.com";
}
elseif(strcmp($apply,"AAG")==0)
{
	$gp="bhuwan@aag.edu.in";
	$bcc=",gyajur@franchiseindia.com";
}
elseif(strcmp($apply,"Intex-Square")==0)
{
	$gp="mkt.retail@intextechnologies.com";
	$bcc=",gyajur@franchiseindia.com";
}
elseif(strcmp($apply,"Contours")==0)
{
	$gp="chandra@contoursinternational.in";
	$bcc=",member@franchiseindia.com";
}
elseif(strcmp($apply,"PhonicKids")==0)
{
	$gp="info@phonickids.com";
	$bcc=",member@franchiseindia.com";
}
elseif(strcmp($apply,"KidsGurukul")==0)
{
	$gp="meenaljain@kidsgurukul.com";
	$bcc=",member@franchiseindia.com";
}
elseif(strcmp($apply,"UEI-Global")==0)
{
	$gp="franchise@uei-global.com";
	$bcc=",fimum@franchiseindia.com";
}
elseif(strcmp($apply,"MAAC-Aptech")==0)
{
	$gp="hitesh.mistry@aptech.ac.in";
}
elseif(strcmp($apply,"MAAC")==0)
{
	$gp="vikas@maacmail.com";
	$bcc=",fimum@franchiseindia.com";
}
elseif(strcmp($apply,"CartridgeCafe")==0)
{
	$gp="valerian@cartridgecafe.in";
	$bcc=",bheena@franchiseindia.com";
}
elseif(strcmp($apply,"BSL")==0)
{
	$gp="sumit.taxali@britishschooloflanguage.com";
	$bcc=",member@franchiseindia.com";
}
elseif(strcmp($apply,"New-Horizons")==0)
{
	$gp="ashish.malhotra@nhindia.com,deepak.malhotra@nhindia.com";
	$bcc=",member@franchiseindia.com";
}
elseif(strcmp($apply,"WhiteTiger")==0)
{
	$gp="maneesh.gupta@whitetigernet.com";
	$bcc=",maneesh.gupta@whitetigernet.com";
}
elseif(strcmp($apply,"Aptech")==0)
{
	$gp="nileshl@aptech.ac.in";
	$bcc=",fimum@franchiseindia.com";
}
elseif(strcmp($apply,"IndusWorld")==0)
{
	$gp="gopal.k@cleis.in,ashish.bahri@careerlauncher.com";
	$bcc=",ashita@franchiseindia.com,member@franchiseindia.com";
}
elseif(strcmp($apply,"Career-Launcher")==0)
{
	$gp="network@careerlauncher.com";
	$bcc=",mumaccounts@franchiseindia.net";
}
elseif(strcmp($apply,"Prosper-Overseas")==0)
{
	$gp="dheeran.choudhary@prosperoverseas.com";
	$bcc=",member@franchiseindia.com";
}
elseif(strcmp($apply,"Kidzee")==0)
{
	$gp="chandrashekhar.wagh@zeelearn.com";
	$bcc=",ashita@franchiseindia.com";
}
elseif(strcmp($apply,"Zee-Group")==0)
{
	$gp="chandrashekhar.wagh@zeelearn.com,pradeep@zeelearn.com";
	$bcc=",fimum@franchiseindia.com";
}
elseif(strcmp($apply,"ZeeSchools")==0)
{
	$gp="zeeschools@zils.esselgroup.com";
	$bcc=",fimum@franchiseindia.com,member@franchiseindia.com,ashita@franchiseindia.com";
}
elseif(strcmp($apply,"ClassOn")==0)
{
	$gp="shailesh_sardhara@rediffmail.com,s.shailesh@shreeharigroup.com";
	$bcc=",ashita@franchiseindia.com,member@franchiseindia.com";
}
elseif(strcmp($apply,"Antal")==0)
{
	$gp="jkacharia@antal.com";
	//$bcc=",member@franchiseindia.com";
}
elseif(strcmp($apply,"Dalimit")==0)
{
	$gp="direction:dushyant@dalimit.com,franchise@dalimit.com";
	$bcc=",ashita@franchiseindia.com,member@franchiseindia.com";
}
elseif((strcmp($apply,"GTT")==0))
{
$gp="alokb@gttconnect.com,partners@gttconnect.com";
	$bcc=",ashita@franchiseindia.com,member@franchiseindia.com";

}
elseif(strcmp($apply,"Multilink")==0)
{
	$gp="marketing@multilinkworld.com";
}
elseif(strcmp($apply,"Reliance-World")==0)
{
    $gp="mf@relianceworld.in";
	$bcc=",fimum@franchiseindia.com,mumbai@franchiseindia.com";
}
elseif(strcmp($apply,"MusicWorld")==0)
{
    $gp="swagat@rpg.in";
	$bcc=",member@franchiseindia.com";
}
elseif(strcmp($apply,"Wlounge")==0)
{
    $gp="fimum@franchiseindia.com";
	$bcc=",fihl.mumbai@gmail.com";
}
elseif(strcmp($apply,"Francorp-Jewellery")==0)
{
    $gp="consulting@franchiseindia.com";
	$bcc=",bvenus@franchiseindia.com";
}
elseif(strcmp($apply,"Donald-Trump")==0)
{
    $gp="info@bradfordlicenseindia.com";
	$bcc=",aditi.vohra@bradfordlicenseindia.com,kartikeya.a@bradfordlicenseindia.com";
}
else
{
$root1=$gp;
//$bcc="";
}

$title="Feedback";
	$fromText="feedback@franchiseindia.com";
	$subjectText=$apply;
	$toText =$gp;




$msgText="<table width=50% border=0 align=center cellpadding=2 cellspacing=2 style='font-family:verdana; color:#FF0000; border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC;'>
  <tr> 
    <td colspan=2><h5 style='margin: 0px;	padding: 0px;'>      ".$apply." </h5></td>
  </tr>
  <tr> 
    <td width=32% valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'>Name:</td>
    <td width=68% valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["franSendName"]."</td>
  </tr>
  <tr> 
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'>Address:<br> </td>
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["franSendAdd"]."</td>
  </tr>
  <tr> 
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'> 
      City: </td>
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["city"]."</td>
  </tr>
  <tr> 
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'>Email:<br> </td>
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["franSendEmail"]."</td>
  </tr>
  <tr> 
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'>Phone:</td>
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["franSendPhone"]."</td>
  </tr>
  <tr> 
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'>Investment Capacity:</td>
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["investment"]."</td>
  </tr>
  <tr> 
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'>Profession/Business:</td>
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["business"]."</td>
  </tr>
  <tr> 
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'>Industry Interest:</td>
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["industry"]."</td>
  </tr>

  <tr> 
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'> 
      Details: </td>
    <td valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["apply"]."<br> ".$_POST["franSendDet"]."</td>
  </tr>";

	if($timeframe != "" || $bbackground != ""){
		$msgText .= "<tr> 
		<td width=32% valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'>Time frame to Start:</td>
		<td width=68% valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["timeframe"]."</td>
		</tr>
		<tr> 
		<td width=32% valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:bold; font-family:verdana; font-size:11px; color:#0066FF;'>Business Background:</td>
		<td width=68% valign=top style='border-top: 1px solid #CCCCCC;	border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #CCCCCC; font-weight:normal; font-family:verdana; font-size:11px; color:#0066FF;'>".$_POST["bbackground"]."</td>
		</tr>";
	}
$msgText .= "</table>";

//}  // non brand equations ends

if($apply == "FIBL-Branch-Employee"){
	//mail('mgaurav@franchiseindia.com', $subjectText, $msgTextfull,"From: $fromText \n"."MIME-Version: 1.0\n"."Content-type: text/html; charset=iso-8859-1\n"."Bcc: bounce.franchisor@gmail.com".$bcc);
}

//mail($toText, $subjectText, $msgText,"From: $fromText \n"."MIME-Version: 1.0\n"."Content-type: text/html; charset=iso-8859-1\n"."Bcc: bounce.franchisor@gmail.com".$bcc);
//mail($toText, $subjectText, $msgText,"From: $fromText \n"."MIME-Version: 1.0\n"."Content-type: text/html; charset=iso-8859-1\n");
$mail = new sparkPostApi('https://api.sparkpost.com/api/v1/transmissions','956f17baeb7e6df436023df847cba38802f93e14');

 $mail-> from(array('email' => 'feedback@franchiseindia.com','name' => 'FranchiseIndia Support'));
 $mail-> subject($subjectText);
 $mail-> html($msgText);
 $mail-> setTo(array($toText));
 $mail->setReplyTo('no-reply@franchiseindia.com');
 
 /* CC emails as array same as "seTo" */
 //$mail->setCc(array('person1@yourdomain.com','person2@yourdomain.com'));

 /* BCC emails as array same as "seTo" */
 //$mail->setBcc(array('vasanthmuthusamy@gmail.com'));
 $mail->setBcc(array('fihlbounce@gmail.com')); 

 try{
   $mail->send();
   print "Message Sent";
 } catch (Exception $e) {
   print $e; 
 }

 $mail->close();


if(isset($siteSrc) && $siteSrc == 'BLI'){
	header('location: http://www.bradfordlicenseindia.com/thank-you.php');
	exit;
}elseif( $apply == 'FIBL-Dr-Batra' || $apply == 'Mom-and-Me' || $apply == 'Mahindra-2-Wheelers' || $apply == 'FIBL-Car-Nation' || $apply == 'Ritu-Kumar' || $apply == 'FIBL-Naturals' || $apply == 'Burg' || $apply == 'San-Churro' || $apply == 'FIBL-5aSec' || $apply == 'FIBL-Johnson-Murphy' || $apply == 'FIBL-Oliva' || $apply == 'FIBL-OTO-Bodycare' ){
	header('location: http://www.franchiseindia.com/welcome?msg=67');
	exit;
}elseif( $apply == 'FIHL-Kraft-Maid' ){
	header('location: https://www.franchiseindia.com/mailermessage');
	exit;
}elseif( $apply == 'Nischal-Smart' ){
	header('location: https://www.franchiseindia.com/mailermessage');
	exit;
}elseif( $apply == 'FIBL-Oxyfit' ){
	header('location: https://www.franchiseindia.com/mailermessage');
	exit;
}elseif( $apply == 'Howard-Storage' ){
	header('location: https://www.franchiseindia.com/mailermessage');
	exit;
}elseif( $apply == 'Value-Vision' ){
	header('location: https://www.franchiseindia.com/mailermessage');
	exit;
}elseif( $apply == 'Waman-Hari-Pethe' ){
	header('location: https://www.franchiseindia.com/mailermessage');
	exit;
}elseif( $apply == 'TFW-FBCampaign' ){
  header('location: https://www.franchiseindia.com/magazine/');
  exit;
}elseif( $apply == 'SANFORT-Schools' ){
  header('location: https://www.franchiseindia.com/brands/Preschool.2399');
  exit;
}else{
	header('location: https://www.franchiseindia.com/mailermessage');
	exit;
}

}else{
	header('location: https://www.franchiseindia.com/mailermessage');
	exit;
}//first if condition end here
?>
