<? 

session_start();

$emailid = isset($_POST['email_id']) ? $_POST['email_id'] : $_SESSION['email_id'];

$password = isset($_POST['pass_word']) ? $_POST['pass_word'] : $_SESSION['pass_word'];

//if(!isset($emailid))

{



}

/*echo"function chk(){";

if(strcmp($usertype,"investor")==0)

{



echo"form1.email_ad.disabled=true;";

echo"form1.password_ad.disabled=true;";

}

echo"}";*/

?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
<title>FranchiseIndia.com - India's first name in franchising | online franchise 
solutions.</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<SCRIPT language=javascript> 
<!--Swaping images on refresh index.php-->
function swapimage()
{ 
theimages = new Array("images/mainpicture.jpg","images/mainpicture2.jpg"); 
whichimage = Math.floor(Math.random()*theimages.length); 
document.write('<td width="376" rowspan="2" valign="top" class="mainpicture" BACKGROUND="' +theimages[whichimage]+ '">'); 
} 
<!--End of Swaping images on refresh index.php-->

</SCRIPT>
<script language="JavaScript" type="text/JavaScript">

<!--

/*

function MM_openBrWindow(theURL,winName,features) { //v2.0

  window.open(theURL,winName,features);

}



function popUp(URL) {

day = new Date();

id = day.getTime();

eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=yes,location=0,statusbar=0,menubar=no,resizable=0,width=500,height=460,left = 200,top = 150');");

}



function popUp1(URL) {

day = new Date();

id = day.getTime();

eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=yes,location=0,statusbar=0,menubar=no,resizable=0,width=582,height=412');");

}

*/

//-->

</script>
<style type="text/css">

<!--

BODY {	FONT-SIZE: 11px; 	FONT-FAMILY: verdana; 

SCROLLBAR-FACE-COLOR: #E9E9EA; SCROLLBAR-SHADOW-COLOR: #B6B6B6; SCROLLBAR-3DLIGHT-COLOR: #B6B6B6; SCROLLBAR-ARROW-COLOR: #6e7e88; SCROLLBAR-DARKSHADOW-COLOR: #E9E9EA; SCROLLBAR-TRACK-COLOR: #EBEBEC;

}



/*--------------------------------------------------------------------------------------------------------*/

/* Basic link CSS starts here*/

A:link {

	font-family: verdana;

	color: #000000;

	text-decoration: none;

}

A:visited {

	font-family: verdana;

	color: #000000;

	text-decoration: none;

}

A:hover {

	font-family: verdana;

	color: RED;

	text-decoration: underline;

}

A:active {

	font-family: verdana;

	color: #000000;

	text-decoration: none;

}





.topnavigation {

	font-family: verdana;

	font-size: 11px;

	color: #646464;

	text-align: right;

	padding-right: 10px;

}

.welcomeinve{

	font-family: verdana;

	font-size: 11px;

	color: #646464;

	text-align: right;



}

#topnavigation { font-family: verdana; font-size: 10px;	color: #646464;	text-align: right;	padding-bottom: 10px; 	padding-top: 1px;}

#topnavigation a:link, #topnavigation a:visited { color: #646464; text-decoration:none}

#topnavigation a:active { color: #000000; text-decoration:underline;}

#topnavigation a:hover { color: #000000; text-decoration:underline;}







a.tpn,a.tpn:visited { color: #646464; text-decoration:none}

a.tpn:active { color: #000000; text-decoration:underline;}

a.tpn:hover { color: #000000; text-decoration:underline;}

.greenbg { background-color: #A3CC28; width: 398px; height: 12px;	}

.color-1 {

	background-color: #505F93;

	height: 12px;

}



.search {

	font-family: verdana;

	font-size: 11px;

	background-color: #EBEBEB;

	height: 31px;

}

#search {

	font-family: verdana;

	font-size: 11px;

	background-color: #EBEBEB;

	height: 31px;

}



.searchfield {

	font-family: verdana;

	font-size: 11px;

	padding-left: 2px;

	border: 1px solid #999999;

	width: 200px;

	color: #333333;







}

.google-logo {

	padding-top: 7px;

	padding-left: 5px;

}

.radio-butons {

	padding-top: 3px;

}





.search-button {

	padding-top: 3px;

}

.search-bc {

	background-color: #7694BF;

}

.graycolor {

	background-color: #C0C1C3;

}



.toplogos {

	padding-top: 10px;

}



.findout {

	padding-left: 10px;

	padding-top: 8px;

}

.top15 {

	font-family: verdana;

	font-size: 12px;

	font-weight: bold;

	color: #F7FAFD;

	background-image: url(images/top15_bg.gif);

	background-color: #7694BF;

	padding-left: 17px;

	padding-top: 2px;

}

.top15-text {

	font-family: arial;

	font-size: 11px;

	background-color: #F3F3F3;

	vertical-align: top;

	padding-top: 5px;

	padding-bottom: 5px;

}

#top15-text a.link, top15-text a:visited { color: #646464; text-decoration:none}

#top15-text a:active {

	color: #000000;

	text-decoration:none;

}

#top15-text a:hover {

	color: #1E4172;

	text-decoration:underline;

}



#franchisor-cate-link a.link, #franchisor-cate-link a:visited { 

color: #646464; text-decoration:none

}

#franchisor-cate-link a:active {

	color: #000000;

	text-decoration:none;

}

#franchisor-cate-link a:hover {

	color: #FF0000;

	text-decoration:underline;

}





.top15-bg {

	font-family: arial;

	font-size: 11px;

	background-color: #F3F3F3;

	/*padding-left: 10px;

	vertical-align: top;

	padding-top: 7px;

	line-height: 17px;*/

}









.newline {

	font-weight: normal;

	background-color: #9EA772;

	height: 3px;

}





.news {

	font-weight: normal;

	background-color: #dedede;

	font-family: verdana;

	font-size: 11px;

	color: 000000;

	padding-left: 0px;

	padding-top: 5px;

	padding-bottom: 5px;

	line-height: normal;

	background-repeat: no-repeat;

	background-position: -6px 6px;

}



.logo {

	background-color: #dedede;

	font-family: verdana;

	font-size: 11px;

}

.free-regis {

	background-color: #7694BF;

	padding-top: 10px;

	padding-left: 2px;

}

.free-regis-text {

	font-family: arial;

	font-size: 11px;

	color: #FFFFFF;

}



.free-regis-left {

	font-family: arial;

	font-size: 11px;

	color: #FFFFFF;

	float:left;

	padding-top: 15px;

	padding-bottom: 5px;

	text-align: right;

	

}





.free-regis-field{

	font-family: arial;

	font-size: 11px;

	color: #FFFFFF;

	float:left;

	padding-top: 10px;

	padding-bottom: 10px;

	

}



.free-regis-right {

	font-family: arial;

	font-size: 11px;

	color: #FFFFFF;

	float: right;

	text-align: left;

	padding-top: 35px;

}





.free-login-field {

	font-family: verdana;

	font-size: 11px;

	height: 18px;

	width: 95px;

	margin-bottom: 2px;

	margin-top: 2px;

}





.fr-interviews {

	font-family: verdana;

	font-size: 11px;

	font-weight: bold;

	color: #1E4172;

}

.fr-inter-text {

	font-family: verdana;

	font-size: 11px;

	padding-left: 12px;

	line-height: 17px;

	padding-top: 15px;

	padding-right: 2px;

}

.latest-issue {

	font-family: verdana;

	font-size: 11px;

	font-weight: bold;

	color: #595959;

}

#latest-issue a:link,latest-issue a:visited {	color: #595959; text-decoration: none;}

#latest-issue a:active{	color: #000000;	text-decoration:none;}

#latest-issue a:hover{	color: #000000;	text-decoration:underline;}



.color-red {

	color: #FF0000;

}

.color-white {

	background-color: #FFFFFF;

	background-attachment: scroll;

	background-image: url(images/benefits_bg.gif);

	background-repeat: repeat-x;

	text-align: center;

	padding-left: 50px;

}

.find-a-franchise {

	font-family: verdana;

	font-size: 10px;

	font-weight: normal;

	color: #000000;

	background-color: #A3CC28;

	padding-top: 6px;

	padding-left: 5px;

}



.categories-field {

	font-family: arial;

	font-size: 11px;

	height: 20px;

	width: 160px;

	color: #333333;

	margin-top: 2px;

}

.categories-menu {

	font-family: arial;

	font-size: 11px;

	height: 20px;

	width: 160px;

	color: #333333;

	margin-top: 3px;

}



.findbutton {

	font-family: Arial;

	font-size: 10px;

	color: #333333;

	padding-left: 20px;

	width: 100px;

	padding-bottom: 5px;

}

.findbutton-text {

	font-family: Arial;

	font-size: 11px;

	color: #333333;

	height: 23px;

}



.gray-light {

	background-color: #E1E1E1;

}



.category-text {

	font-family: verdana;

	font-size: 11px;

	color: #333333;

	padding-left: 5px;

	padding-top: 3px;

	padding-bottom: 3px;

}



.category-underline {

	background-color: #E1E1E1;

}

.franchisor-bg {

background-color: #A3CC28;

}

.category-headings {

	font-family: verdana;

	font-size: 11px;

	font-weight: bold;

	color: #2A340A;

	background-color: #F3F3F3;

	padding-left: 5px;

	padding-top: 2px;

	padding-bottom: 2px;

}

.categorywise-textlinks {

	font-family: verdana;

	font-size: 11px;

	background-color: #F3F3F3;

	padding-top: 5px;

	padding-bottom: 10px;

	padding-left: 14px;

}

.footer {

	background-color: #505F93;

	padding: 5px;

	font-family: verdana;

	font-size: 11px;

	color: #FFFFFF;

}

#footer-links a:link,#footer-links a:visited {

	font-family: verdana;

	font-size: 11px;

	color: #FFFFFF;

}



#footer-links a:active{

	font-family: verdana;

	font-size: 11px;

	color: #000000;

}

#footer-links a:hover{

	font-family: verdana;

	font-size: 11px;

	color: #FFFF00;

}





/*

.footer {

	background-color: #7694BF;

	padding: 5px;

	font-family: verdana;

	font-size: 11px;

	color: #FFFFFF;

}



*/

.frach-res-text {

	font-family: verdana;

	font-size: 11px;

	font-weight: normal;

	text-align: left;

	vertical-align: top;

	background-color: #F3EDE0;

	padding: 5px 5px 2px;

}



.franchise-resources {

	font-weight: bold;

	font-family: verdana;

	font-size: 13px;

	vertical-align: top;

	background-color: #D9D3C7;

	padding-left: 10px;

	color: #375784;

}



.choosing-right {

	font-weight: bold;

	font-family: verdana;

	font-size: 12px;

	color: #093EB7;

	padding-left: 15px;

	padding-top: 5px;

}





.choosing {

	font-family: verdana;

	font-size: 10px;

	padding-left: 10px;

	font-weight: normal;

	vertical-align: middle;

	padding-right: 15px;

	padding-bottom: 1px;

	text-align: justify;



}



.cathrline {

	font-weight: normal;

	background-color: #C3C3C3;

}



.memberline {

	font-weight: normal;

	background-color: #ED6F08;

}

.have-ques {

	font-weight: bold;

	font-family: verdana;

	font-size: 11px;

	color: #093EB7;

	padding-left: 8px;

	padding-right: 2px;

	padding-top: 0px;





}



.askan-field {

	font-weight: normal;

	font-family: verdana;

	font-size: 11px;

	padding-left: 15px;

	padding-top: 0px;



}



.askan-online {

	font-weight: bold;

	font-family: verdana;

	font-size: 11px;

	padding-left: 8px;

	color: #272727;

}

.askan-text {

	font-weight: normal;

	font-family: verdana;

	font-size: 11px;

	padding-left: 13px;

	padding-top: 0px;

	width: 50px;

	padding-right: 0px;

	padding-bottom: 0px;



}



.fieldstyle {

	font-family: verdana;

	font-size: 10px;

	width: 110px;

	padding-left: 1px;

	border: 1px solid #333333;

	color: #333333;

	padding-top: 1px;

}



.ask {

	font-weight: normal;

	font-family: verdana;

	font-size: 11px;

	padding-left: 40px;

	padding-top: 4px;

	padding-bottom: 5px;

	

}



.text-area {

	font-family: verdana;

	font-size: 10px;

	width: 110px;

	padding-left: 1px;

	border: 1px solid #333333;

	color: #333333;

	height: 40px;

}



.looking-for {

	font-weight: bold;

	font-family: verdana;

	font-size: 11px;

	color: #093EB7;

	padding-left: 8px;

}





.submit-oppor {

	font-weight: bold;

	padding-left: 10px;

	font-family: verdana;

	font-size: 13px;

	color: #F1F1F1;

	background-color: #848382;

}



.submit-oppor-email {

	font-weight: normal;

	font-family: verdana;

	font-size: 11px;

	padding-left: 15px;

	width: 120px;

	background-position: right;

	text-align: right;

}



.submit-oppor-field {

	font-weight: normal;

	font-family: verdana;

	font-size: 11px;

	padding-left: 15px;

	width: 100px;

	background-position: right;

	text-align: right;

	padding-right: 15px;

	padding-top: 2px;



}



.submit-button {

	font-weight: normal;

	font-family: verdana;

	font-size: 11px;

	padding-left: 120px;

	width: 120px;

	background-position: right;

	padding-top: 5px;



}





.newsletter {



	font-weight: bold;

	padding-left: 10px;

	font-family: verdana;

	font-size: 13px;

	color: #E80A04;



}



A.newsletter{

	font-family: verdana;

	font-size: 11px;

	color: #E80A04;

	text-decoration: underline;

}



A.newsletter:visited {

  	font-family: verdana;

	font-size: 11px;

	color: #E80A04;

	text-decoration: underline;

}



A.newsletter:hover {

	color: #ff0000;

	text-decoration: none;

}



A.newsletter:active {

  color: #000000;

}



.newsletterbutton {

	font-family: verdana;

	font-size: 11px;

	padding-left: 35px;

	font-weight: normal;

	padding-bottom: 5px;

}





.weekly {

	font-weight: bold;

	padding-left: 30px;

	font-family: verdana;

	font-size: 13px;

	padding-top: 15px;

	width: 157px;

}

.weeklyemail {

	font-family: verdana;

	font-size: 11px;

	padding-top: 10px;

	padding-left: 25px;

	font-weight: bold;

}



.weeklyfield {

	font-family: verdana;

	font-size: 11px;

	padding-top: 3px;

	font-weight: bold;

	text-align: center;

	padding-bottom: 7px;



}



.weekly-rightbg {



	font-family: verdana;

	font-size: 11px;

	background-color: #A4D466;

	text-align: center;

	font-weight: bold;

}



.weeklybg {

	font-family: verdana;

	font-size: 10px;

	padding-left: 7px;

}

.tbl-border {

	border-right: 1px solid #D3DDEB;

	border-left: 1px solid #D3DDEB;

}





.top15-list {

	font-family: arial;

	font-size: 11px;

	background-color: #F3F3F3;

	list-style-position: outside;

	list-style-image: url(images/arrows.gif);

	list-style-type: square;

	margin-left: 11px;

	padding-left: 9px;

	padding-top: 0px;

	padding-right: 0px;

	padding-bottom: 0px;

	margin-right: 0px;

	margin-bottom: 5px;

	letter-spacing: -0.1em;

	line-height: 17px;

}



.color-white-right {

	background-color: #FFFFFF;

	background-attachment: scroll;

	background-image: url(images/benefits_bg.gif);

	background-repeat: repeat-x;

	text-align: left;

	padding-left: 76px;

	float: left;

	padding-right: 20px;

}







.benefits-text-left {

	background-color: #7694BF;

	font-family: arial;

	font-size: 11px;

	color: #FFFFFF;

	float: left;

	padding-left: 50px;

}

a.benefits,a.benefits:visited {font-family: arial; color: #FFFFFF;	text-decoration:none;}

a.benefitsactive {font-family: arial; color: #FFFFFF;	text-decoration:none;}

a.benefits:hover {font-family: arial; color: #FFFCCC;	text-decoration:underline;}



.benefits-text-right {

	background-color: #7694BF;

	font-family: arial;

	font-size: 11px;

	color: #FFFFFF;

	float: left;

	margin-left: 60px;

}







.topwel {

	color: #DA251C;

	padding-top: 2px;

	padding-bottom: 4px;

}



a.click-here-reg,a.click-here-reg:visited{

color:#1E4172;

text-decoration: none;

}

a.click-here-reg:hover{

color:#2D61A8;

text-decoration: underline;

}



.border {

	border-right-width: 1px;

	border-left-width: 1px;

	border-right-style: solid;

	border-left-style: solid;

	border-right-color: #999999;

	border-left-color: #999999;

}

.adver-textfield {

	font-family: verdana;

	font-size: 11px;

	height: 15px;

	width: 100px;

	border: 1px solid #999999;

	margin-right: 2px;

	margin-bottom: 2px;

	margin-top: 2px;

}



.adver-login {

	vertical-align: bottom;

}



.pipe-size {

	font-family: verdana;

	font-size: 10px;

}

.free-regis-select {

	font-family: arial;

	font-size: 11px;

	color: #FFFFFF;

}

.free-inves-text {

	font-family: arial;

	font-size: 11px;

	color: #FFFFFF;

	padding-left: 8px;

}

.free-investor-head {

	font-family: arial;

	font-size: 11px;

	color: #FFFFFF;

	padding-top: 8px;

}



.top-navi {

	vertical-align: top;

}

.advertise-login {

	background-color: #606060;

	font-family: verdana;

	font-size: 11px;

	color: #FFFFFF;

	font-weight: bold;

	vertical-align: top;

	padding-bottom: 1px;

}

.gobutton {

	font-family: arial;

	font-size: 11px;

	color: #000000;

	background-color: #ACC2E4;

	border: 1px solid #000000;

	font-weight: bold;

	width: 23px;

	height: 17px;

	text-align: center;

	vertical-align: middle;

	margin-top: 0px;

	margin-bottom: 2px;

}

.date {

	font-family: arial;

	font-size: 11px;

	color: #666666;

	text-align: right;

	padding-top: 4px;

	letter-spacing: normal;

	padding-left: 5px;

	vertical-align: top;

}

.findianame {

	padding-top: 5px;

}

.jumpmenu {

	font-family: arial;

	font-size: 11px;

	color: #666666;

}

.othercompanies {

	font-family: arial;

	font-size: 11px;

	color: #666666;

	height: 15px;

	width: 160px;

	margin-top:1px;

	margin-right:10px;

}



.latest-issue-text {

	font-family: arial;

	font-size: 11px;

	color: #333333;

}

.knowmore {

	font-family: arial;

	font-size: 11px;

	font-weight: bold;

	color: #DA251C;

}

#knowmorelink a:link, #knowmorelink a:visited {

	color: #DA251C;

	text-decoration:none;	

}

#knowmorelink a:active{

	color: #DA251C;

	text-decoration:none;

}

#knowmorelink a:hover {

	color: #DA251C;

	text-decoration:underline;

}

.mainpicture {

	padding-top: 5px;

	padding-right: 5px;

	border-bottom-width: 1px;

	border-left-width: 1.5px;

	border-bottom-style: solid;

	border-left-style: solid;

	border-bottom-color: #333333;

	border-left-color: #333333;

}

.registeredmember {

	font-family: arial;

	font-size: 12px;

	color: #FFFFFF;

	text-align: right;

	padding-bottom: 5px;

}







.logintext {

	font-family: arial;

	font-size: 11px;

	color: #FFFFFF;

	font-weight: bold;

	text-align: right;

}



#forgotpassword-link a:link, #forgotpassword-link a:visited {

	font-weight: normal;

	color: #FFFFFF;

	text-decoration:none;



}

#forgotpassword-link a:active{

	font-weight: normal;

	color: #FFFFFF;

	text-decoration:none;



}



#forgotpassword-link a:hover{

	font-weight: normal;

	color: #FFFFFF;

	text-decoration:underline;



}

.forgotpassword {

	font-family: verdana;

	font-size: 11px;

	color: #FFFFFF;

	padding-bottom: 2px;

}

.selectregi {

	font-family: arial;

	font-size: 11px;

	color: #333333;

	height: 18px;

	width: 120px;

	margin-right: 1px;

	margin-bottom: 2px;

	font-weight: bold;

}

table {

	font-family: verdana;

	font-size: 11px;

}

.memberlogin {

	padding-bottom: 5px;

}

.weeklynewsletter {

	font-family: arial;

	font-size: 11px;

	padding-top: 15px;

	padding-right: 10px;

	padding-bottom: 10px;

	padding-left: 15px;

	background-attachment: scroll;

	background-image: url(images/newsletterbg.gif);

	background-repeat: repeat-x;

	border-top-width: 1px;

	border-right-width: 1px;

	border-top-style: solid;

	border-right-style: solid;

	border-top-color: #CCCCCC;

	border-right-color: #A3A3A3;

}







.subscribe-button {

	padding-left: 80px;

}

.subscribe-textfield {

	font-family: arial;

	font-size: 11px;

	padding-top: 10px;

	padding-bottom: 2px;

}

.subscribe-field {

	font-family: verdana;

	font-size: 11px;

	padding-left: 1px;

	border: 1px solid #333333;

}

.franchi-loginhead {

	font-family: arial;

	font-size: 13px;

	color: #EFEFEF;

	padding-left: 10px;

	padding-top: 3px;

	padding-right: 10px;

	padding-bottom: 2px;

}



.franchisor-cat-head {

	font-family: arial;

	font-size: 17px;

	color: #000000;

	padding-left: 10px;

	padding-top: 3px;

	padding-right: 10px;

	padding-bottom: 2px;

	font-weight: bold;

}



.franchisor-cate {

	font-family: arial;

	font-size: 11px;

	background-color: #F3F3F3;

	list-style-position: outside;

	list-style-image: url(images/arrows.gif);

	list-style-type: square;

	margin-left: 5px;

	padding-left: 5px;

	padding-top: 0px;

	padding-right: 0px;

	padding-bottom: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

	margin-top: 0px;

}

#howiuse a:link, #howiuse a:visited{

	font-family: arial;

	font-size: 11px;

	color:#061C8D;

	text-decoration:underline;

}

#howiuse a:active{

	font-family: arial;

	font-size: 11px;

}

#howiuse a:hover{

	font-family: arial;

	font-size: 11px;

	color:red;

	text-decoration:underline;

}

.login-error-home{

	padding-top: 70px;

	font-family: arial;

	font-size: 12px;

	width: 300;

	color:#FFFFFF;



}

.login-error-signupnow{

	padding-top: 70px;

	padding-left:50px;;

}

.againlogin-home{

	font-family: arial;

	font-size: 12px;

	padding-top:15px;

	

}

#againlogin-link a:link, #againlogin-link a:visited{

	color:#FFFFFF;

	font-weight: bold;

	text-decoration:none;

}

#againlogin-link a:active{

	color:#FFFFFF;

	font-weight: bold;

	text-decoration:none;

}

#againlogin-link a:hover{

	color:#FFFF00;

	font-weight: bold;

	text-decoration:underline;

}

.welcome-paid{

	color:#FFFFFF;

	font-family:verdana; 

	font-weight:bold;

	padding-bottom:5px;

	margin-left:40px;

	align: left;



}

.welcome-paid-text{

	color:#FFFFFF;

	font-family:verdana; 

	font-weight:bold;

	line-height: 15px;	

	padding-bottom:5px;

	margin-left:40px;

	align: left;



}

.welcome-signup{

	padding-right: 22px;

}



.fmember-welno-index {

	font-family: verdana;

	font-size: 11px;

	color: #FFF32D;

	font-weight: bold;

}



.fmember-nocom-index-a {

	font-family: verdana;

	font-size: 11px;

	color: #FFFFFF;

}



.fmember-nocom-index {

	font-family: verdana;

	font-size: 11px;

	color: #FFF32D;

}

#fmember-nocom-index a:link, #fmember-nocom-index a:visited {

	font-family: verdana;

	font-size: 11px;

	color: #FFF32D;

	text-decoration:none;

}

#fmember-nocom-index a:active {

	font-family: verdana;

	font-size: 11px;

	color: #FFF32D;

	text-decoration:none;	

}

#fmember-nocom-index a:hover {

	font-family: verdana;

	font-size: 11px;

	color: #FFF32D;

	text-decoration:underline;	

}

.fmember-wel-lastlogin-index {

	font-family: verdana;

	font-size: 11px;

	padding-right: 10px;

	line-height: 16px;

	color: #FFFFFF;

	text-align: right;

}

.fmember-wel-text-index {

	font-family: verdana;

	font-size: 11px;

	padding-right: 10px;

	line-height: 16px;

	color: #FFFFFF;

	padding-top: 50px;

	text-align: right;

	width: 280px;

	padding-bottom: 5px;





}

.premium-member{

	font-family: verdana;

	font-size: 11px;

	color: #FFFFFF;

}

.platinum-member{

	font-family: verdana;

	font-size: 11px;

	color: #FFFFFF;

}



#premium-link a:link, #premium-link a:visited{

	color: #FFFFFF;

	text-decoration:none;

}

#premium-link a:active, #premium-link a:hover{

	color: #FFFFFF;

	text-decoration:underline;

}

#platinum-link a:link, #platinum-link a:visited{

	color: #FFFFFF;

	text-decoration:none;

}

#platinum-link a:active, #platinum-link a:hover{

	color: #FFFFFF;

	text-decoration:underline;

}





-->

</style>
</head>



<body link="#646464" vlink="#646464" alink="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >

<table width="777" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="border">

<tr> 

    <td width="310" align="center" class="findianame"><img src="images/franchiseindia_index.gif" alt="FranchiseIndia.com | INDIA'S FIRST NAME IN FRANCHISING" width="386" height="67" hspace="8" vspace="2" border="0" usemap="#Map"></td>

      <td width="467" align="right" valign="top" class="topnavigation" > 



<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">

        <tr> 

          <td class="date" id="howiuse"><form name="frmSendFrm"></form> 

            <?



echo date("l d M Y h:i:s A");



 ?>

            &nbsp;|&nbsp;<a href="#" language="VBSCRIPT" onClick="window.open'howiuse1.html','','height=529, width=739,noscrollbars'">How I use this site?</a></td>

        </tr>

        <tr> 

          <td height="55" align="right" valign="bottom" class="welcomeinve"> <br> 
            <? if(!isset($emailid))

{

//ad_form();

}

else

{

//if(strcmp($usertype,"investor")==0)

{

include "include/configure.php";

$query_my="Select * from investor_account where email='".$emailid."' and password='".$password."' and confirmation='yes'";

	$rs_my=mysql_query($query_my) or die (mysql_error());

	if(mysql_num_rows($rs_my)==0)

	{

		unset($_SESSION['email_id']);

		unset($_SESSION['pass_word']);

		//ad_form();

	}

	else

	{

	

	$row_my=mysql_fetch_array($rs_my);

$_SESSION["investor_id"]=$row_my["investor_id"];

 echo "<a href='member.php?'".SID."  ><img src='images/adver_myaccount.gif' alt='MY ACCOUNT' width='74' height='15' border='0'></a> <a href='redirect.php?'".SID."  > <img src='images/signout.gif' alt='SIGN OUT' width='57' height='15' border='0'></a>";

	}

	}

}

?>
            <? if(!isset($emailid))

{

echo "<div class='topwel'><strong>Welcome, Guest User.</strong> </div>";

ad_form();

}

else

{

include "include/configure.php";

$query_my_1="Select * from investor_account where email='".$emailid."'and password='".$password."' and confirmation='yes'";

	$rs_my_1=mysql_query($query_my_1) or die (mysql_error());

	if(mysql_num_rows($rs_my_1)==0)

	{

		unset($_SESSION['email_id']);

		unset($_SESSION['pass_word']);

		ad_form();

	}

	else

	{

	

	$_SESSION['email_id']=$emailid;

	$_SESSION['pass_word']=$password;

	

	$row_my_1=mysql_fetch_array($rs_my_1);

	$query21="Select * from investor_business_details where investor_id='".$row_my_1["investor_id"]."'";

		$rs21=mysql_query($query21) or die (mysql_error());

		$row21=mysql_fetch_array($rs21);

echo "<div class='topwel'><strong>Welcome, ".$row21["investor_name"]." as a ".$row_my_1["investor_type"]." investor.</strong> </div>";

$_SESSION["investor_type"]=$row_my_1["investor_type"];

	}

}

function ad_form()

{

?>
          </td>

        </tr>

        <? } ?>

      </table>

		

		</td>

  </tr>

</table>

<table width="777" border="0" align="center" cellpadding="0" cellspacing="0" class="border">

  <tr> 

    <td class="greenbg"><img src="images/spacer.gif" width="1" height="1"><spacer></td>

    <td class="color-1"><img src="images/spacer.gif" width="1" height="1"><spacer></td>

  </tr>

  <tr> 

    <td height="1" colspan="2"><img src="images/spacer.gif" width="1" height="1"><img src="images/spacer.gif" width="1" height="1"><spacer></td>

  </tr>

</table>

<table width="777" border="0" align="center" cellpadding="0" cellspacing="0" class="border" id="search" bgcolor="#FFFFFF">

  <tr> 

    <form method=GET action="http://www.google.com/custom">

      <td width="72" align="right" valign="top" class="google-logo"><img src="images/google_logo.gif" alt="Google" width="49" height="18" hspace="5"> 

      </td>

      <td width="202"> <INPUT name=q  TYPE=text class="searchfield" value=""  size=31 maxlength=255> 

      </td>

      <td width="56" class="search-button"> <INPUT name=sa  type="image" VALUE="Search" src="images/search.gif" alt="Search" width="56" height="17"> 

        <input type=hidden name=cof value="S:http://www.franchiseindia.com/;AH:center;LH:35;L:http://www.franchiseindia.com/images/franchiseindia.gif;LW:390;AWFID:46a615f16db47976;"> 

        <input type=hidden name=domains value="www.franchiseindia.com"></td>

      <td width="273" valign="top" class="radio-butons"> <input type=radio name=sitesearch value="">

        Search Web 

        <input type=radio name=sitesearch value="www.franchiseindia.com" checked>

        Franchiseindia.com </td>

      <td width="172" align="right" valign="top" class="radio-butons"> 
	  <select name="select"  class="othercompanies" onChange="window.open(this.options[this.selectedIndex].value,'_blank')">
          <option selected value="#">Other Companies</option>
          <option value="http://www.franchiseguru.com">www.franchiseguru.com</option>
          <option value="http://www.clubcity.in">www.clubcity.in</option>
          <option value="http://www.indianretailer.com">www.indianretailer.com</option>
        </select></td>

    </form>

  </tr>

  <tr> 

    <td height="2" colspan="5" align="right" valign="top" class="search-bc"><img src="images/spacer.gif" width="1" height="1"><spacer><img src="images/spacer.gif" width="2" height="2"></td>

  </tr>

</table>

<table width="777" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="border">

  <tr> 

    <td width="400" valign="top" class="findout"><a href="businessopp.php"><img src="images/findoutindia.gif" alt="FIND OUT INDIA&#8217;S TOP BUSINESS OPPORTUNITIES" width="334" height="14" vspace="5" border="0"></a> 

      <table width="99%" border="0" cellspacing="0" cellpadding="0">

        <tr> 

          <td class="toplogos"> 

            <? 

			 include "include/configure.php";

$query="Select * from advertisement where ad_cat='TF' and clicks_pending>0";

$rs=mysql_query($query) or die (mysql_error());

$records=mysql_num_rows($rs);

$countrow=0;

while($row=mysql_fetch_array($rs))

{

if(!isset($emailid))

{

$link="href='franchisordetailsshow.php?id=".$row["franchisor_id"]."&ad_id=".$row["ID"]."' target='_blank'";//"href='#' onClick=MM_openBrWindow('error.html','popup','width=400,height=400')";

}

else

{

//include "include/configure.php";

$query_11="Select * from investor_account where email='".$emailid."' and password='".$password."' and confirmation='yes'";

	$rs11=mysql_query($query_11) or die (mysql_error());

	if(mysql_num_rows($rs11)==0)

	{

		unset($_SESSION['email_id']);

		unset($_SESSION['pass_word']);

		$link="href='franchisordetailsshow.php?id=".$row["franchisor_id"]."&ad_id=".$row["ID"]."' target='_blank'";//"href='#' onClick=MM_openBrWindow('error.html','popup','width=400,height=400')";

	}

	else

	{

$link="href='franchisordetailsshow.php?id=".$row["franchisor_id"]."&ad_id=".$row["ID"]."&email_ID=".$emailid."' target='_blank' ";



//"href='franchisordetailsshow.php?id=".$row["franchisor_id"]."' target='_blank'"; 

	}





}

if($countrow%5==0)

{

printf(" </tr><tr align='center'>");

}



 printf("<a %s><img src='logos/%s' hspace='2' border='0'></a>",$link,$row["ad_image"]);

//printf("<option >%s</option><br>",$row["ad_content"]);

$countrow++;

}?>

          </td>

        </tr>

      </table></td>
<SCRIPT language=javascript>swapimage();</SCRIPT>
    <!--<td width="376" rowspan="2" valign="top" background="images/mainpicture.jpg" bgcolor="#546398" class="mainpicture">-->

      <table width="100%" border="0" cellpadding="0" cellspacing="0">

        <form name="form1" method="post" action="<?=$_SERVER['PHP_SELF']?>">

          <tr> 

            <td align="right" valign="top" > <img src="images/an_enterpreneur.gif" alt="(HERE) AN ENTERPRENEUR IS BORN ONLINE" width="323" height="52"></td>

          </tr><?

		  

if(!isset($emailid))

{

		  ?>

          <tr> 

            <td height="55" align="right" valign="bottom" class="registeredmember">Dear 

              Registered investor. <br>

              Please login. 

              <!-- 

			Registered 

              Investor please enter your<br>

              login password to view your account-->

            </td>

          </tr>

          <tr> 

            <td height="80" align="right" class="logintext"> 

              

              LOGIN: 

              <input name="email_id" type="text" class="free-login-field"> <br>

              PASSWORD: 

              <input name="pass_word" type="password" class="free-login-field"> 

              <br> 

              <input name="imageField" type="image" src="images/signin.gif" alt="SIGN IN" width="98" height="27" border="0" vspace="2"> 

                          

            </td>

          </tr>

		  </form>

          <tr> 

            

          <td height="37" align="right" valign="top" class="forgotpassword" id="forgotpassword-link"><a href="#" onClick="javascript:popUp('forgotpassword.php')">Forgot 

            password?<br>

            <br>

            </a></td>

          </tr>

		   <script language="JavaScript" type="text/JavaScript">



function in_chk()

{

if(document.form_reg.register_option[0].checked == false && document.form_reg.register_option[1].checked == false )

		{	

			alert("Please select the type of registration");	

			return false;

			

		}

}

</script>

		   <!-- <FORM METHOD=POST ACTION="investordetails.php"name="form_reg" onSubmit="return in_chk()">-->

          <tr> 

		 

            

          <td height="20" align="right" valign="top" id="forgotpassword-link"><br>

            <img src="images/availbenefits.gif" alt="AVAIL BENEFITS" width="105" height="13"> 

            <!-- 

			<a href="#" onClick="javascript:popUp1('benefits.html')">

			<img src="images/benefits_popup.gif" alt="BENEFITS" width="63" height="12" border="0"></a>

			<INPUT TYPE="radio" NAME="register_option" value ="Free">

              <A href="#" language="VBSCRIPT" onClick="window.open'benefits.html','','height=412, width=582,noscrollbars'"><img src="images/free.gif" alt="FREE" width="33" height="12" border="0"></a> 

              <INPUT TYPE="radio" NAME="register_option" value ="Paid">

              <A href="#" language="VBSCRIPT" onClick="window.open'benefits.html','','height=412, width=582,noscrollbars'"><img src="images/paid.gif" alt="PAID" width="28" height="12" border="0"></a>

			

			

			-->

          </td>

          </tr>

          <tr> 

            

          <td align="right" valign="bottom" class="memberlogin" id="forgotpassword-link"><a href="benefits.php"> 

            <!-- <a href="javascript:document.form_reg.submit()"> <input title=Submit                                  

                                type=image alt=Submit src="images/memberregister.gif" 

                                border=0 name=submit22><img src="images/memberregister.gif" alt="MEMBER REGISTER NOW!" width="168" height="25" border="0">

                      </a> -->

            <img src="images/memberregister.gif" alt="REGISTER NOW!" width="126" height="18" border="0"></a> 

            <?

		  }

else

{

echo '  <td align="right" class="memberlogin" id="forgotpassword-link">';

echo"<div class='free-regis-text'>";

include "include/configure.php";

$query="Select * from investor_account where email='".$emailid."' and password='".$password."' and confirmation='yes'";

	$rs=mysql_query($query) or die (mysql_error());

	if(mysql_num_rows($rs)==0)

	{

		unset($_SESSION['email_id']);

		unset($_SESSION['pass_word']);

		printf("<div class='login-error-home'>Your user ID or password is <b>incorrect</b>,</div>or you are not a registered user on this site.<div class='againlogin-home' id='againlogin-link'><a href='index_1.php']'>Click here</a> to login again</div>"); 

	}

	else

	{

		$row=mysql_fetch_array($rs);

		$query21="insert into userlogin values('".$row["investor_id"]."','".date("d-M-Y")."')";

		$rs21=mysql_query($query21) or die (mysql_error());

	

		$query2="Select * from investor_business_details where investor_id='".$row["investor_id"]."'";

		$rs2=mysql_query($query2) or die (mysql_error());

		$row2=mysql_fetch_array($rs2);

		if(strcmp($row["investor_type"],"free")==0|| strcmp($row["investor_type"],"Standard")==0)

		{

		echo '<table width="95%" border="0" cellpadding="0" cellspacing="0" border="1">

                <tr> 

                  <td height="1"  align="right" valign="top"><spacer></td>

                </tr>

                <tr> 

                  <td  align="right" valign="top"> 

				  <table width="220" border="0" cellspacing="0" cellpadding="0" class="premium-member" id="premium-link">

                      <tr> 

                        <td height="88" valign="top"> <p><font color="#FDFED3" size="2" face="arial"><strong>Platinum 

                            Benefits</strong></font><br>

<strong>&raquo;</strong> View/contact directly hundred of companies<br>

<strong>&raquo;</strong> 30 mins session with the consultant<br>
<strong>&raquo;</strong> Free subscription of Retail, The Franchising World and a book<br>


                            <a href="benefits.php?investor_id='.$_SESSION["investor_id"].'"><font color="#FDFED3"><strong>&#8230;more</strong></font></a></p></td>

                      </tr>

                    </table>

                    <table width="220" border="0" cellspacing="0" cellpadding="0" class="platinum-member" id="platinum-link">

                      <tr> 

                        <td height="95" valign="top"><font color="#FDFED3" size="2" face="Arial"><strong>Premium 

                          Benefits</strong></font><br> 
<strong>&raquo; </strong> View/contact 200 companies listed<br>
<strong>&raquo; </strong>My Account<br>
<strong>&raquo; </strong>Newsletter Fortnightly<br>
<strong>&raquo; </strong>Email alerts <br>
<strong>&raquo; </strong>Free subscription fo The Franchising World <br> 

                          <a href="benefits.php?investor_id='.$_SESSION["investor_id"].'"><font color="#FDFED3"><strong>&#8230;more</strong></font></a></td>

                      </tr>

                    </table></td>

                </tr>

                <tr>

                  <td  align="right"><a href="benefits.php?investor_id='.$_SESSION["investor_id"].'" target="_parent"><img src="images/upgradenow_index.gif" alt="UPGRADE NOW!"border="0" align="right"></a></td>

                </tr>

              </table>';

			/*echo"<table cellspacing='0' cellpadding='0' border='0' align='right' valign='top'><tr><td valign=top'>";

			echo"<img src='images/benefites_paid_inve_home.gif' width='202' height='25' border='0'>";

			echo"<div class='welcome-paid-text'>Premium Member Benefits <br>&raquo; View/contact 200 Companies listed<br>&raquo; My Account<br> &raquo; Newsletter Fortnightly<br> &raquo; 6 mnth subscription to TWF<br>&raquo; Email alerts<br><a href='benefits.php'>…more</a></div></td></tr>";

			echo"<tr><td class='welcome-signup' align='right' valign='top'><a href='memberpayment.php'><img src='images/signupnow.gif' width='137' height='34' border='0'></a></td><tr></table>";*/

			}

		if(strcmp($row["investor_type"],"Premium")==0)

		{

		echo '<table width="95%" border="0" cellpadding="0" cellspacing="0">

                <tr> 

                  <td height="40"  align="right" valign="top"><spacer></td>

                </tr>

                <tr> 

                  <td  align="right" valign="top"> 

				  <table width="220" border="0" cellspacing="0" cellpadding="0" class="premium-member" id="premium-link">

                      <tr> 

                        <td height="88" valign="top"> <p><font color="#FDFED3" size="2" face="arial"><strong>Platinum 

                            Benefits</strong></font><br>

                            <strong>&raquo;</strong> View/contact 500 companies<br>

                            <strong>&raquo;</strong> Free entry to Franchise India Events<br>

                            <strong>&raquo;</strong> 30 mins session with the 

                            consultant<br>

                            <strong>&raquo;</strong> Subscribe to Retailer Magazine<br>

                            <a href="benefits.php?investor_id='.$_SESSION["investor_id"].'"><font color="#FDFED3"><strong>&#8230;more</strong></font></a></p></td>

                      

                    </table>

                   </td>

                </tr>

                <tr> 

                  <td height="55"  align="right" valign="top"><spacer></td>

                </tr>

                <tr>

                  <td  align="right" >

				  <a href="benefits.php?investor_id='.$_SESSION["investor_id"].'" target="_parent"><img src="images/upgradenow_index.gif" alt="UPGRADE NOW!" border="0" align="right"></a></td>

                </tr>

              </table>';

		}

		/*

		 <table width="215" border="0" cellspacing="0" cellpadding="0" class="platinum-member" id="platinum-link">

                       

                        <td height="102" valign="top"><font color="#FDFED3" size="2" face="Arial"><strong></strong></font><br> <strong> </strong> 

                          <br> <strong> 

                          </strong><br> <strong></strong>

                          <br> <strong> </strong><br> 

                          <strong><font color="#FDFED3"></font></strong></td>

                      </tr>

                    </table>

		*/

		

				if(strcmp($row["investor_type"],"Platinum")==0)

		{

		

		echo $row1["investor_name"];

		 

		 $query_cn="Select * from investor_business_details where investor_id='".$_SESSION["investor_id"]."'";

		$rs_cn=mysql_query($query_cn) or die (mysql_error());

		$row_cn=mysql_fetch_array($rs_cn);

		$company=explode(",",$row_cn["fran_ind_int"]);

		$ran_c=rand ("0","2");

		//echo $company[$ran_c] ;

		

		$query1="Select * from category where catname='".$company[$ran_c]."'";

		$rs1=mysql_query($query1) or die (mysql_error());

		$row1=mysql_fetch_array($rs1);

	

		$query_cn="Select * from advertisement where catid='".$row_cn["catid"]."'";

		$rs_cn=mysql_query($query_cn) or die (mysql_error());

		

		$data=mysql_num_rows($rs_cn)-1;

		

		$NoR=mysql_num_rows($rs_cn);



		$data1=rand ("0",$data);



		if ($data1>1)

		{

		mysql_data_seek($rs_cn,$data1);

		$row_cn= mysql_fetch_assoc($rs_cn);

		//mysql_data_seek($rs_cn,$data1+1);

			$row2 = mysql_fetch_assoc($rs_cn);



		}

		

if($NoR==1)

		{

			$row_cn=mysql_fetch_array($rs_cn);

		}



		

			 $query_id="Select * from userlogin where investor_id='".$_SESSION["investor_id"]."' and logindate<>'".date("d-M-Y")."' order by logindate Desc";

 			$rs_id=mysql_query($query_id) or die (mysql_error());

 			if(mysql_num_rows($rs_id)==0)

				 {	

				 echo date("d-M-Y");

				 }else

 				{ 

 					$row_id=mysql_fetch_array($rs_id);

				}

				

				 echo'<div class="fmember-nocom-index-a">';

				 echo'We have identified <span class="fmember-welno-index">2NEW</span> 

              opportunities <br>that match your profile.<br></div>

              <span class="fmember-nocom-index" id="fmember-nocom-index"> <strong>&raquo;</strong>';

			  echo "<a href='franchisordetailsshow.php?id=".$row_cn["franchisor_id"]."&email_ID=".$emailid."&ad_id=".$row_cn["ID"]."' target='_blank'>".$row_cn["ad_content"]."</a>";

            echo '  <strong>&raquo;</strong>';

			   echo "<a href='franchisordetailsshow.php?id=".$row2["franchisor_id"]."&email_ID=".$emailid."&ad_id=".$row2["ID"]."' target='_blank'>".$row2["ad_content"]."</a>";

			   echo '</span></p>';

			   echo '<span class="fmember-wel-lastlogin-index"><strong >Last Login:  </strong>'.$row_id["logindate"];

			   echo "</span>";

			//echo"<b style='font-family:verdana; '> Welcome ".$row2["investor_name"]."</b>";

		}

		



		

	}



}



echo"</div>";

?>

          </td>

			

          </tr>

	      </form>

      </table>

       

    </td>

  </tr>

  <tr> 

    <td width="406" valign="top"> 

      <table width="100%" border="0" cellpadding="0" cellspacing="0" >

        <tr> 

          <td height="21" ><table border="0" cellpadding="0" cellspacing="0" >

              <tr> 

                <td height="21" class="logo"><a href="http://www.shaadi.com/shaadipoint/" target="_blank"><img src="images/shaadipoint_striplogo70.gif" alt="Shaadi Point" width="70" height="25" border="0"></a></td>

                <td width="606" height="21" class="news"> 

                  <?php require "include/shaadipointnews.htm"; ?>

                </td>

              </tr>

            </table></td>

        </tr>

      </table>

      <table width="100%" height="165" border="0" cellpadding="0" cellspacing="0">

        <tr> <script language="JavaScript" type="text/JavaScript">



function Check_inv()

{

if(document.form.category.options[document.form.category.options.selectedIndex].text=="Categories...")

		{	

			alert("Please select the category");	

			return false;

			

		}

}

</script>

          <form name="form" method="post" action="dir_search_result.php" onSubmit="return Check_inv()">

            <td width="170" class="find-a-franchise"><img src="images/find_a_franchise.gif" width="164" height="14"><br>

              Use the search options below to view franchises suited to you.<br> 

              <select name="category" class="categories-menu" >

                <option selected>Categories...</option>

                <? include "include/configure.php";

		$query11="Select * from category";

			$rs11=mysql_query($query11) or die (mysql_error());

			while($row11=mysql_fetch_array($rs11))

			{

			echo "<option>".$row11["catname"]."</option>";

			}

			?>

              </select>

              <select name="investment" class="categories-menu" >

                <option selected>Personal Investment...</option>

                 <option selected>Personal Investment...</option>

                <option>Rs. 10,000 - Rs. 50,000</option>

          <option>Rs. 50,000 - Rs. 2,00,000</option>

          <option>Rs. 2,00,000 - Rs.5,00,000</option>

          <option>Rs. 5,00,000 - Rs. 10,00,000</option>

          <option>Rs. 10,00,000 - Rs. 20,00,000</option>

          <option>Rs. 20,00,000 - Rs. 30,00,000</option>

          <option>Rs. 30,00,000 - Rs. 50,00,000</option>

          <option>Rs. 50,00,000 - Rs. 1 Cr.</option>

          <option>Rs. 1 Cr. and above</option>

              </select> <br> <!--<input name="textfield322" type="text" class="categories-field"> -->

              <br> <div class="findbutton"> 

                <input name="Submit22" type="submit" class="findbutton-text" value="Find a Franchise">

              </div></td>

          </form>

          <td width="238"><table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
                <td><a href="subscribe.php"><img src="images/magazine.jpg" alt="Avail 50% Discount" width="95" height="134" vspace="1" border="0" ></a></td>
                <td width="1"> <table width="100" height="90" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td height="20" class="latest-issue"><img src="images/latestissue.gif" alt="LATEST ISSUE" width="86" height="12"></td>
                    </tr>
                    <tr> 
                      <td class="latest-issue-text" id="latest-issue">Reliance 
                        has set up a network of 400 retail outlets which are owned, 
                        built operated </td>
                    </tr>
                    <tr> 
                      <td class="knowmore" id="knowmorelink"><a href="http://www.franchiseindia.com/articles.php?action=fullnews&showcomments=1&id=23">...Know 
                        more</a></td>
                    </tr>
                    <tr> 
                      <td width="100" height="35" valign="bottom" >&nbsp;</td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>

        </tr>

      </table></td>

  </tr>

</table>

<table width="777" border="0" align="center" cellpadding="0" cellspacing="0" class="border">

  <tr> 

    <td width="153" valign="top"> 

      <? include "leftbar.php"; ?>

    </td>

    <td width="624" valign="top">

<table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr> 

          <td width="38%" valign="top"><? echo "<iframe src=weeklynewsletter.php scrolling=no width=227 height=123 frameborder=0> </iframe>";?></td>

          <td width="600" align="right" valign="top"> <table width="375" border="0" align="left" cellpadding="0" cellspacing="0">

              <tr> 

                <td colspan="2" valign="top" class='top15-bg'> <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#A3CC28">

                    <tr> 

                      <td height="20"><img src="images/top15cate.gif" width="242" height="12" hspace="8" vspace="5"></td>

                    </tr>

                  </table>

                  <table width="100%" border="0" cellpadding="0" cellspacing="0">

                    <tr> 

                      <td height="91" class="top15-text" > <ul class="top15-list" id='top15-text'>

                          <? include "include/configure.php";

$query="Select * from advertisement where ad_cat='PT'  and clicks_pending>0";

$rs=mysql_query($query) or die (mysql_error());

$records=mysql_num_rows($rs);

$countrow=0;

while($row=mysql_fetch_array($rs))

{	

if(!isset($emailid))

{

$link="href='franchisordetailsshow.php?id=".$row["franchisor_id"]."&ad_id=".$row["ID"]."' target='_blank' ";//"&email_ID=".$emailid."' target='_blank'";



//$link="href='#' onClick=MM_openBrWindow('franchisordetailsshow.php?id=".$row["franchisor_id"]."&ad_id=".$row["ID"]."' ','popup','width=400,height=400')";

}

else

{

$query22="Select * from investor_account where email='".$emailid."' and password='".$password."' and confirmation='yes'";

	$rs22=mysql_query($query22) or die (mysql_error());

	if(mysql_num_rows($rs22)==0)

	{

		unset($_SESSION['email_id']);

		unset($_SESSION['pass_word']);

		$link="href='franchisordetailsshow.php?id=".$row["franchisor_id"]."&ad_id=".$row["ID"]."' target='_blank'";//"href='#' onClick=MM_openBrWindow('error.html','popup','width=400,height=400')";

	}

	else

	{

$link="href='franchisordetailsshow.php?id=".$row["franchisor_id"]."&ad_id=".$row["ID"]."&email_ID=".$emailid."' target='_blank' ";

//"href='franchisordetailsshow.php?id=".$row["franchisor_id"]."' target='_blank'";//"href='user_update.php?id=".$row["ID"]."&email_ID=".$emailid."' target='_blank'";

	}





}

if($countrow%5==0 && $countrow!=$records && $countrow!=0)

{printf("</ul></td><td class='top15-text'> <ul class='top15-list' id='top15-text'>");

}

 //printf("<img src='images/arrows.gif' width='10' height='5' hspace='2' vspace='1'>");

printf("<li><a %s>%s</a><br></li>",$link,$row["ad_content"]);

$countrow++;

} ?>

                        </ul></td>

                    </tr>

                  </table> </table></td>

        </tr>

      </table> <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="advertise-login">

        <form name="form11" method="post"  action="advertisormember.php">

          <tr> 

            <td width="17%" height="22" valign="top" class="franchi-loginhead">FRANCHISOR</td>

            <td width="62%" >Email Id: 

              <input name="email_ad" type="text" class="adver-textfield" id="email_ad7">

              Password: 

              <input name="password_ad" type="password" class="adver-textfield" id="password_ad7"> 

              <input name="Submit" type="submit" class="gobutton" value="Go" onmouseover="this.style.backgroundColor='#FFFFFF'; this.style.color='#000000'; this.style.cursor = 'hand'"  onmouseout="this.style.backgroundColor=''; this.style.color='#000000';" title="Go"> 

            </td>

            <td width="21%" class="forgotpassword" id="forgotpassword-link"> <a href="franchisordetails.php">Submit 
              Opportunity</a></td>

          </tr>

        </form>

      </table><?
	  if(!isset($emailid))
{
$email_ID="";//"href='#' onClick=MM_openBrWindow('error.html','popup','width=400,height=400')";
}
else
{
//include "include/configure.php";
$query_11="Select * from investor_account where email='".$emailid."' and password='".$password."' and confirmation='yes'";
	$rs11=mysql_query($query_11) or die (mysql_error());
	if(mysql_num_rows($rs11)==0)
	{
		unset($_SESSION['email_id']);
		unset($_SESSION['pass_word']);
		$email_ID="";//"href='#' onClick=MM_openBrWindow('error.html','popup','width=400,height=400')";
	}
	else
	{
	$email_ID="&email_ID=".$emailid."'";
//"href='franchisordetailsshow.php?id=".$row["franchisor_id"]."' target='_blank'"; 
	}
}
	  
	  ?> <table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr> 

          <td width="71%" align="center" valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="2">
              <tr> 
                <td colspan="4"><img src="images/hotfranchises.gif" width="307" height="18" vspace="5"></td>
              </tr>
              <tr> 
                <td><a href="franchisordetailsshow.php?id=FIHL885812&ad_id=273<?=$email_ID?>" target="_blank"><img src="logos/banner_01.gif" width="79" height="54" border="0"></a></td>
                <td colspan="2"><a href="http://www.excalibur.franchiseindia.com" target="_blank"><img src="logos/banner_15.gif" width="164" height="54" border="0"></a></td>
                <td><a href="franchisordetailsshow.php?id=FIHL806796&ad_id=274<?=$email_ID?>" target="_blank"><img src="logos/banner_02.gif" width="164" height="54" border="0"></a></td>
              </tr>
              <tr> 
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr> 
                <td rowspan="2"><a href="franchisordetailsshow.php?id=FIHL2027741&ad_id=275<?=$email_ID?>" target="_blank"><img src="logos/banner_03.gif" width="80" height="108" border="0"></a></td>
                <td rowspan="2"><a href="franchisordetailsshow.php?id=FIHL3788114&ad_id=276<?=$email_ID?>" target="_blank"><img src="logos/banner_04.gif" width="80" height="108" border="0"></a></td>
                <td rowspan="2"><a href="franchisordetailsshow.php?id=FIHL9114577&ad_id=277<?=$email_ID?>" target="_blank"><img src="logos/banner_05.gif" width="78" height="107" border="0"></a></td>
                <td><a href="franchisordetailsshow.php?id=FIHL1389391&ad_id=278<?=$email_ID?>" target="_blank"><img src="logos/banner_06.gif" width="164" height="54" border="0"></a></td>
              </tr>
              <tr> 
                <td><a href="franchisordetailsshow.php?id=FIHL5838418&ad_id=279<?=$email_ID?>" target="_blank"><img src="logos/banner_07.gif" width="164" height="54" border="0"></a></td>
              </tr>
              <tr> 
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr> 
                <td colspan="2"><a href="franchisordetailsshow.php?id=FIHL115779&ad_id=280<?=$email_ID?>" target="_blank"><img src="logos/banner_10.gif" width="164" height="54" border="0"></a></td>
                <td><a href="franchisordetailsshow.php?id=FIHL5886084&ad_id=28<?=$email_ID?>" target="_blank"><img src="logos/banner_09.gif" width="79" height="54" border="0"></a></td>
                <td><a href="franchisordetailsshow.php?id=FIHL9328308&ad_id=282<?=$email_ID?>" target="_blank"><img src="logos/banner_08.gif" width="164" height="54" border="0"></a></td>
              </tr>
              <tr> 
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr> 
                <td colspan="2"><a href="franchisordetailsshow.php?id=FIHL9121877&ad_id=283<?=$email_ID?>" target="_blank"><img src="logos/banner_11.gif" width="164" height="54" border="0"></a></td>
                <td colspan="2"><a href="franchisordetailsshow.php?id=FIHL9389997&ad_id=284<?=$email_ID?>" target="_blank"><img src="logos/banner_12.gif" width="164" height="54" border="0"></a></td>
              </tr>
              <tr> 
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr> 
                <td colspan="2"><a href="franchisordetailsshow.php?id=FIHL1762401&ad_id=285<?=$email_ID?>" target="_blank"><img src="logos/banner_13.gif" width="164" height="54" border="0"></a></td>
                <td colspan="2"><a href="franchisordetailsshow.php?id=FIHL4656028&ad_id=286<?=$email_ID?>" target="_blank"><img src="logos/banner_14.gif" width="166" height="54" border="0"></a></td>
              </tr>
              <tr> 
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr> 
                <td colspan="2"><!--<img src="logos/banner_16.gif" width="164" height="54">--></td>
                <td colspan="2">&nbsp;</td>
              </tr>
            </table> 
            <!--
			<table width="410" border="0" align="center" cellpadding="0" cellspacing="0">

              <tr> 

                <td width="410" colspan="2"><img src="images/hotfranchises.gif" width="307" height="18" vspace="5"></td>

              </tr>

              <tr> 

                <td height="5" colspan="2"> <table width="100%" border="0">

                    <tr align="center"> 

                      <?
/*
 include "include/configure.php";

 $query="Select * from advertisement where ad_cat='PL'  and clicks_pending>0  order by ID";

  

$rs=mysql_query($query) or die (mysql_error());

$records=mysql_num_rows($rs);

$countcol=0;

$pos=5;



$nflag=0;

$flag=0;

$p=5;

while($row=mysql_fetch_array($rs))

{	

	



 $query2="Select * from pl_matrix where ID='PL-".$row["ID"]."'";

 $rs2=mysql_query($query2) or die (mysql_error());

if(!isset($emailid))

{

$link="href='franchisordetailsshow.php?id=".$row["franchisor_id"]."&ad_id=".$row["ID"]."' target='_blank'";//"href='#' onClick=MM_openBrWindow('error.html','popup','width=400,height=400')";

}

else

{

$query33="Select * from investor_account where email='".$emailid."' and password='".$password."' and confirmation='yes'";

	$rs33=mysql_query($query33) or die (mysql_error());

	if(mysql_num_rows($rs33)==0)

	{

		unset($_SESSION['email_id']);

		unset($_SESSION['pass_word']);

$link="href='franchisordetailsshow.php?id=".$row["franchisor_id"]."&ad_id=".$row["ID"]."' target='_blank'";

	}

	else

	{

$link="href='franchisordetailsshow.php?id=".$row["franchisor_id"]."&ad_id=".$row["ID"]."&email_ID=".$emailid."' target='_blank' ";

//"href='franchisordetailsshow.php?id=".$row["franchisor_id"]."' target='_blank'";//"href='user_update.php?id=".$row["ID"]."&email_ID=".$emailid."'  target='_blank' ";

	}



}



 while($row2=mysql_fetch_array($rs2))

	{



	  if($countcol%5==0)

		 {



		///if($flag==1)

		{	 //echo $countcol;

			$countcol=$countcol+$nflag;

			$flag=0;

			$nflag=0;

			///echo $countcol;

			//printf(" </tr><tr align='center'> ");

		}

		//else

			 {

		 printf(" </tr><tr align='center'>");

			 }

		}

	 if($row2["rows"]=="1"&&$row2["columns"]=="1")

		{

		  printf("<td><a %s><img src='logos/%s' border='0'></a></td>",$link,$row["ad_image"]);

	}

		

		if(intval($row2["rows"])>1&&$row2["columns"]=="1")

		{

		 printf("<td  rowspan='%s'><a %s><img src='logos/%s' border='0'></a></td>",$row2['rows'],$link,$row["ad_image"]);

		 $flag=1;

		 }

		

	if(intval($row2["columns"])>1&& $row2["rows"]=="1")

		{

			 printf("<td colspan='%s' ><a %s><img src='logos/%s' border='0'></a></td>",$row2['columns'],$link,$row["ad_image"]);

			 $countcol=$countcol+intval($row2["columns"])-1;

//			 	 echo $countcol;

		}		



	/*	if(intval($row2["columns"]) >1 && intval($row2["rows"])>1)

		{

		printf("<td colspan='%s' rowspan='%s'> <a %s> <img src='logos/%s' border='0'></a>%s</td> ",$row2['columns'],$row2['rows'],$link,$row["ad_image"],$countcol);

		}*//*



if($flag==1)

		{

			$nflag++;

			$flag=0;

		//	echo $nflag;

		}

			$countcol++;

	

		

	}

}
*/
?>

                    </tr>

                  </table></td>

              </tr>

            </table>
			--> </td>

          <td width="29%" align="right" valign="top"><table width="100%" height="588" border="0" cellpadding="0" cellspacing="0" bgcolor="#F3F3F3">

              <tr> 

                <td valign="top"><TABLE width=180 

      border=0 cellPadding=0 cellSpacing=0 >

                    <TBODY>

                      <TR> 

                        <TD width=1 height="20" class="franchisor-bg"><img src="images/franchisor_category.gif" width="79" height="12" hspace="8"></TD>

                      </TR>

                      <?  

  include "include/configure1.php";

  		include "include/configure.php";

  $query="Select * from advertisement where ad_cat='ST' group by catid";	

			$rs=mysql_query($query) or die (mysql_error());

			while($row=mysql_fetch_array($rs))

				{include "include/configure1.php";

				$query1="Select * from category where catid=".$row["catid"];

				$rs1=mysql_query($query1) or die (mysql_error());

				$row1=mysql_fetch_array($rs1);

				printf("<tr><td class=category-headings>%s</td></tr>",$row1["catname"]);

				//printf("<tr><td width='1' height='1'><img src='images/spacer.gif' width='1' height='1'><spacer></td></tr>");

				printf("<tr> <td class='categorywise-textlinks' ><ul class='franchisor-cate' id='franchisor-cate-link'>");

				include "include/configure.php";

				$query2="Select * from advertisement where ad_cat='ST' and catid=".$row["catid"]." and clicks_pending>0";	

				$rs2=mysql_query($query2) or die (mysql_error());

			while($row2=mysql_fetch_array($rs2))

			{

			if(!isset($emailid))

				{

$link="href='franchisordetailsshow.php?id=".$row2["franchisor_id"]."&ad_id=".$row2["ID"]."' target='_blank'";//"href='#' onClick=MM_openBrWindow('error.html','popup','width=400,height=400')";

				}

			else

			{$query44="Select * from investor_account where email='".$emailid."' and password='".$password."' and confirmation='yes'";

	$rs44=mysql_query($query44) or die (mysql_error());

	if(mysql_num_rows($rs44)==0)

	{

		unset($_SESSION['emailid']);

		unset($_SESSION['password']);

		$link="href='franchisordetailsshow.php?id=".$row2["franchisor_id"]."&ad_id=".$row2["ID"]."' target='_blank'";///"href='#' onClick=MM_openBrWindow('error.html','popup','width=400,height=400')";

	}

	else

	{

$link="href='franchisordetailsshow.php?id=".$row2["franchisor_id"]."&ad_id=".$row2["ID"]."&email_ID=".$emailid."' target='_blank' ";

"href='franchisordetailsshow.php?id=".$row2["franchisor_id"]."' target='_blank'";//"href='user_update.php?id=".$row2["ID"]."&email_ID=".$emailid."' target='_blank'";



	}





				

			}

			printf("<li><a %s  >%s</a></li>",$link,$row2["ad_content"]);

			//printf("%s",$link);

			

			}

				printf("</td></tr>");

						

				}

		?>

                    </TBODY>

                  </TABLE></td>

              </tr>

            </table> </td>

        </tr>

      </table></td>

  </tr>

</table>

<? include "include/footer.php";?>
<map name="Map">
  <area shape="rect" coords="1,49,350,66" href="http://www.franchiseindia.com/indexold.php?=101101axy=ababab0101010120050606606060606060606" target="_self" alt="">
</map>
</body>

</html>

