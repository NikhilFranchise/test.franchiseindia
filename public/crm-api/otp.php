<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>OTP Check</title>
<style type="text/css">
.brdr{border:#999 solid 1px; font-family: Verdana, Geneva, sans-serif; font-size: 12px;color: #333;}
</style>
</head>
<body>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
<table width="30%" border="1" cellpadding="10" cellspacing="0" align="center">
<tr bgcolor="#CCCCCC"><td colspan="8" align="center" class="brdr"><strong>Check OTP</strong></td></tr>
<tr bgcolor="#CCCCCC">
<td width="50%" class="brdr"><strong>Enter Mobile No</strong></td>
<td width="50%" class="brdr"><input type="text" name="mobile" maxlength="10" /></td>
</tr>
<tr bgcolor="#CCCCCC">
<td colspan="2" width="10%" class="brdr" align="center"><input type="submit" name="Search" value="Search" /></td>
</tr>
</table>
</form>

<?php
if(isset($_POST['Search'])){
	include("configpg/configMINew.php");
	//OTP
	if($_POST['mobile'] != ""){
		$Selectquery7 = "SELECT `otp_code` FROM `mobile_verification` WHERE `mobile_no` = '".$_POST['mobile']."'";
		
		$Selectresult7 = mysqli_query($link,$Selectquery7);
		$SelectCount7 = mysqli_num_rows($Selectresult7);
		if($SelectCount7 > 0){
			$Srow7 = mysqli_fetch_assoc($Selectresult7);
			echo '<table width=30%" border="1" cellpadding="10" cellspacing="0" align="center"><tr><td class="brdr" align="center"><strong>'.$_POST['mobile']." -> ".$Srow7['otp_code'].'</td></tr></table>';	
		}
	}
	
}
?>
</body>
</html>