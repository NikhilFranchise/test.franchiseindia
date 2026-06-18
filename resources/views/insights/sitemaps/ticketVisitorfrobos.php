<?php
ob_start();
error_reporting(0);
include_once("../../config/dbConfig.php");
//include_once("../../../mailer/class.phpmailer.php"); 
#----------------------------------------GENERATE QRCODE-----------------------------------START--------------------------------#
$show_details = array(
	'Visakhapatnam19thOct2024' => 'Visakhapatnam, 19th October 2024',
	'' => 'Visakhapatnam, 19th October 2024'
);

if(isset($_REQUEST['txnid'])) {
	$select = "SELECT * FROM fro_insta_register WHERE rid = '".base64_decode($_REQUEST['txnid'])."' AND (`payment_status` = 'Y' OR reg_type = 'Visit the Expo - Exhibitor Invitation' OR reg_type = 'Visit the Expo - Paid Ticket' OR reg_type = 'Attend Registration - Exhibitor Visitor Pass' OR reg_type = 'Attend Registration - Exhibitor Pass' OR reg_type = 'Attend Registration - VIP Guest') AND (`event_year` LIKE '%Bhubaneswar, 28th December 2024%' OR `event_year` LIKE '%Indore, 28th December 2024%' OR `event_year` LIKE '%Patna, 22nd March 2025%' OR `event_year` LIKE '%Coimbatore, 22-23rd February 2025%' OR `event_year` LIKE '%Chandigarh, 14-15th February 2025%' OR `event_year` LIKE '%Pune, 18-19 January 2025%' OR `event_year` LIKE '%Jaipur, July 2025%')";	
	$result = mysqli_query($link, $select) or die(mysqli_error());
	$rowcount = mysqli_num_rows($result);
	if($rowcount > 0){
		$value = mysqli_fetch_array($result);
		$txnid = $value['rid'];
		$name = $value['name'];
		$designation = $value['designation'];
		$company = $value['company'];
		$phone = $value['telephone'];
		$address = $value['address'];
		$email = $value['email'];
		$ticket_type = $value['ticket_type'];
		$venue       = $value['visit_type'];
		$venuePlace = '';
		if($venue == 'Franchise Expo Visakhapatnam') {
			$venuePlace = 'Hotel Green Park';
		}
		$package = $value['package'];
		if($package == "Expo entry with lunch"){
			$reg_type = "Lunch Included";
		}else{
			$reg_type = "";		
		}
		if($ticket_type == "Chandigarh14thFeb2025withLunch" || $ticket_type == "Chandigarh15thFeb2025withLunch"){
			$reg_type = "Lunch Included";
		}
		if($value['reg_type'] == 'Attend Registration - Exhibitor Visitor Pass'){
			$reg_type = "Exhibitor Visitor Pass";
		}
		if($value['reg_type'] == 'Attend Registration - Exhibitor Pass'){
			$reg_type = "Exhibitor Pass";
		}		
		if($value['reg_type'] == 'Attend Registration - VIP Guest'){
			$reg_type = "Guest Invitation";
		}		

		$uniqueID = $txnid;
		$userID = $value['userID'];
		$event_year = $value['event_year'];
		$visit_date = $show_details[$value['ticket_type']];	
		if($event_year == "Bhubaneswar, 28th December 2024"){
			$header_image = "https://www.franchiseindia.net/fro-bos/images/ticket-header-bhubaneswar.png";
		}elseif($event_year == "Indore, 28th December 2024"){
			$header_image = "https://www.franchiseindia.net/fro-bos/images/ticket-header-indore.png";		
		}elseif($event_year == "Patna, 22nd March 2025"){
			$header_image = "https://www.franchiseindia.net/fro-bos/images/ticket-header-patna.png";		
		}elseif($event_year == "Coimbatore, 22-23rd February 2025"){
			$header_image = "https://www.franchiseindia.net/fro-bos/images/ticket-header-coimbatore.png";		
		}elseif($event_year == "Chandigarh, 14-15th February 2025"){
			$header_image = "https://www.franchiseindia.net/fro-bos/images/ticket-header-chandigarh.png";		
		}elseif($event_year == "Pune, 18-19 January 2025"){
			$header_image = "https://www.franchiseindia.net/fro-bos/images/ticket-header-pune.png";		
		}elseif($event_year == "Jaipur, July 2025"){
			$header_image = "https://www.franchiseindia.net/fro-bos/images/ticket-header-bhubaneswar.png";		
		}elseif($event_year == "Indore, 21st December 2024"){
			$header_image = "https://www.franchiseindia.net/fro-bos/images/ticket-header-bhubaneswar.png";		
		}else{
			$header_image = "https://www.franchiseindia.net/fro-bos/images/ticket-header-chandigarh.png";
		}
		$footer_image = "https://www.franchiseindia.net/fro-bos/images/ticket-footer.png";
		
		$registrationDATA = $txnid;
		$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
		$PNG_WEB_DIR = 'temp/';
		require_once("../../phpqrcode/qrlib.php");
		if (!file_exists($PNG_TEMP_DIR))
		mkdir($PNG_TEMP_DIR);
		
		$filename = $PNG_TEMP_DIR.'test.png';
		
		QRcode::png($registrationDATA, $filename);
		
		$qr_code_image = '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';
		#----------------------------------------GENERATE QRCODE-----------------------------------START--------------------------------#
		// Include the main TCPDF library (search for installation path).
		require_once('tcpdf_include.php');
		
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->SetFont('dejavusans', '', 10);
		$pdf->SetMargins(45,10, 10, true);
		$pdf->AddPage();
		//$html = '<img src="'.PATH.'images/fibranding.jpg" style="display:block;"/>';
		
		$pdf->setCellPaddings(1,1,1,0);
		$pdf->SetFont('helvetica', '', 24);
		//$pdf->writeHTMLCell(120, 0, '', '', $html, 'LRT', 1, 0, false, 'L', false);
		
		// set text shadow effect
		$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
		
		// Set some content to print
		$html = '<table width="341" cellspacing="0" cellpadding="2" border="0" style="border-top:0.5px solid #e8e8e8;border-left:0.5px solid #e8e8e8;border-right:0.5px solid #e8e8e8;">
		<tr>
		<td style="line-height:2px;">
		<img src="'.$header_image.'" style="display:block;"/>
		</td>
		</tr>
		</table>
		<table bgcolor="#0d56a6" style="font-size:12px;color:#fff;border-left:0.5px solid #000;border-right:0.5px solid #000; margin:0 auto;padding-bottom:10px;" cellpadding="0" width="341">
		<tr>
		<td height="5" bgcolor="#0d56a6"></td>
		</tr>
		<tr>
		<td width="20">&nbsp;</td>
		<td width="60" height="50" valign="middle" align="left" valign="middle"><img src="'.$PNG_WEB_DIR.basename($filename).'" width="50" /></td>
		<td width="50%" align="left">
		<table width="100%">
		<tr>
		<td style="font-size:12px;">'.strtoupper($name).'<br>
		'.$phone.'<br>Registration No. - 
		'.$txnid.'<br><strong>'.$reg_type.'</strong></td>
		</tr>
		</table> 
		</td>
		</tr>
		<tr>
		<td height="5" bgcolor="#0d56a6"></td>
		</tr>
		</table>
		<table width="341" style="border:0.5px solid #000;" cellspacing="0" cellpadding="0" border="0">
		<tr style="line-height:20%;">
		<td></td>
		</tr>
		<tr>
		<td align="center"><img src="'.$footer_image.'" width="338"/></td>
		</tr>
		</table>';
		
		// Print text using writeHTMLCell()
		$pdf->setCellPaddings(1,1,1,0);
		$pdf->writeHTML($html,true,false,false,false,'');
		// ---------------------------------------------------------
		
		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output($txnid.'.pdf', 'D');
		
		//============================================================+
		// END OF FILE
		//============================================================+
	}
}
?>