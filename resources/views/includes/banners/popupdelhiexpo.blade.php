@php
    setcookie('fidelhi', 'FI2017');
@endphp

<style type="text/css">
#myModal .modal-body{padding:0px!important;border-radius:0px!important;}
#myModal .modal-content {border-radius:0px!important; border: 0px;}
#myModal .modal-dialog{width:660px!important; border-radius:0px!important;}
#myModal .bcs{position: absolute;
right: 48px!important;
top: 0px!important;
background:transparent!important;
box-shadow:none!important;
z-index: 999;
height: 31px;
width: 33px;
display:block;
opacity: 1;
    border-left: 1px solid #fff;
cursor: pointer;
}

#popup_entry1 input.errorInput {
	border:1px solid yellow;
	background:yellow;
}


/*delhi-expo-popup*/
.my_modal_close{ position:absolute;}
.fi-HeadCont-expo{width:660px;  margin:0 auto; padding:0; background:#fff;}
.clear{clear:both;}
.sec{overflow: hidden;
width: 100%;
margin-bottom: 15px;}
.newheader{z-index:1;}
.show-header{margin-right:42px; width:538px;}
.expo-header{  margin:13px auto 15px; width:595px; overflow: hidden;}
.expo-logo{  width:375px; float:left; padding-top:13px;}
.expo-venue{margin-left:13px; float:left; width:198px;  padding-top: 4px; padding-bottom: 0px; vertical-align:top; border-left:1px dotted #b2b2b2; padding-left: 15px; color:#000;}
.expo-venue p{ border-bottom:1px dotted #b2b2b2;padding-bottom:15px; text-transform:uppercase; font-size:11px; margin-bottom:9px; margin-top:0px;}
.expo-venue p span{padding:0px 1px;}
.expo-date{margin-top:0px; font-size:18px; line-height:23px; text-transform:uppercase;}
.expo-date strong{ display:block;font-family:'Open Sans Black'; font-size:32px; text-transform:uppercase; color:#e21b0e; line-height:23px; }
.expo-date span{ font-size:16px; line-height:17px; text-transform:capitalize; color:#000;     margin-top: 4px; display:block;     margin-bottom: 5px;}
.expo-strip{width:100%; height:5px; margin-top:0px;}
.logo-banner{width:590px; margin:0 auto; padding-top:15px;}
.logo-banner li{ float:left; margin-right:25px;}

.fi-bg-expo{height:520px; width:660px; margin:0 auto; background:#fff;margin-top: 1px;}
.bg-expo-left{width:372px; float:left; background:#0d56a6;height:493px;}
.bg-expo-right{width:288px; float:right; height:493px;}
.fro-expo-form{overflow:hidden; margin:0px auto; width:293px; padding:0; }
.fro-expo-form label{width:180px; font-size:14px; font-family:Arial, Helvetica, sans-serif; margin-right:10px; float:left; color:#000; padding-top:3px; padding-right:10px; text-align:left; background: url("https://www.franchiseindia.com/images/label-bg-new-wh.gif") no-repeat right 8px;} 
.fro-expo-form  input[type="text"], .fro-expo-form input[type="tel"], .fro-expo-form input[type="email"]{width:292px;  padding:10px 0 10px 10px; color:#333; float:left; background:white; border:1px solid #dfdfdf; border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px; font-size:15px;}
.fro-expo-form  input[placeholder]{color:#666;}
.fro-expo-form select{width:290px;background:white; padding:4px !important; border:1px solid #dfdfdf; line-height:28px !important; color:#666;}

.fro-expo-form label.error{display:none!important}
.fro-expo-form input.error, .fro-business-form select.error {background: none repeat scroll 0 0 #ffa312 !important; color:#fff !important; border:1px solid #fff !important;}


.fi-expotest{font-size:30px; color:#fff; font-family:'Open Sans Bold'; padding: 30px 0 10px 40px; line-height:22px; text-transform:uppercase;}
.fi-expotest span{color:#fff;font-size:22px; line-height:17px;}
.fi-expotest strong{ font-weight:normal; color:#ffda0e;}
.fro-expo-form .expo-submitnew{ background:transparent; display:inline-block; padding:13px 30px;cursor:pointer;  margin:5px auto; border:none; text-align:center; border-radius:4px; border:1px solid #fff;  font-family:'Open Sans Bold'; font-size:15px; line-height:20px; text-transform:uppercase; color:#fff;}
.fro-expo-form .expo-submitnew:focus{border:0px;box-shadow:none; border-color:none;}
/* End popup start */
.themeline { height:5px; background: url("https://www.franchiseindia.com/images/popup/themeline.jpg") no-repeat; width:660px;}
.disamt { background:#fff; border-radius:4px; width:292px; padding: 10px 0 10px 10px;     border: 1px solid #dfdfdf; font-family:'Open Sans Bold'; font-size:15px;}
</style>


<div id="myModal" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
		
      <div class="bcs" data-dismiss="modal"><img src="https://www.franchiseindia.com/images/popup/expoclose.png" /></div>
      <div class="modal-body">
       
<script type="text/javascript">
	function closePopup() {
		//alert('FRO POPUP');
		$('#my_modal').hide();
		$('#my_modal_background').hide();
	}
	
	
</script>
<div id="my_modal" class="model_top" style="width:660px;"> 
	<!--<img src="https://www.franchiseindia.com/images/popup/close.gif" class="my_modal_close" onclick="closepop();" style="right: -2px;"/>-->
  <div class="fi-HeadCont-expo">
  <div class="show-header">
	  <img src="https://www.franchiseindia.com/images/popup/topstrip.jpg" />
  </div>
  <div class="expo-header">
  	<div class="expo-logo">
	<a href="https://expo.franchiseindia.com/"><img src="https://www.franchiseindia.com/images/popup/expologo-6.jpg" alt="Expo Logo 2018" /></a>
	</div>
	<div class="expo-venue">
	<p>Exhibition<span>|</span>Conference<span>|</span>Awards</p>
	<div class="expo-date">
    October
	<strong>21-22, 2018</strong>
    <span>Pragati Maidan, <br /> New Delhi, India</span>
	</div>
	</div>
  </div>
  </div>
  <div class="themeline"></div>
  <div class="fi-bg-expo">
   <div class="bg-expo-left">
    <p class="fi-expotest">Start & Grow<br />
<span>your <strong>Franchise, Retail<br />
& SME</strong> Business</span></p>
        

<form method="post" id="form1-stall" name="form1-stall" class="fro-expo-form" action="https://expo.franchiseindia.com/register_update.php">
<input type="hidden" name="ref" value="Expo-Visitor-Registration-LP">
<input type="hidden" name="reg_type" value="Delhi Expo 2018 Visitor Registration Paid Popup">						  
<input type="hidden" name="event_year" value="Delhi October 2018">						  
<input type="hidden" name="src" value="Popup">
      <div class="sec">
               <input type="text" name="txtName" id="txtName2" placeholder="Name" required>
      </div>
      <div class="sec">
        <input name="txtEmail" id="txtEmail3" placeholder="Email address"  pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" type="email" required >
      </div>
      
      <div class="sec">
   
		 <input type="text" placeholder="Mobile" id="txtPhone" pattern="[789][0-9]{9}" minlength="10" maxlength="10" name="txtPhone" onkeypress="return isNumber(event)"  required>
		
		
      </div>
  
      <div class="sec">
        <input type="text" name="txtAddress" id="txtAddress3" maxlength="100" placeholder="Address" required>
      </div>
      
        <div class="sec">
       <div class="disamt">Total Amount: Rs. 1000</div>
       <input type="hidden" name="txtDelegates" id="txtDelegates" value="1">       
       <input type="hidden" id="txtAmount" value="1000">
      </div>
           <div class="sec" style="text-align:center;">
      <input type="submit" value="Buy Ticket" name="btnSubmitReg" class="expo-submitnew">
         </div>
    </form>
  </div>
  
  <div class="bg-expo-right">
  <img src="https://www.franchiseindia.com/images/popup/popright.jpg" />
  </div>
  <div class="clr"></div>
  <div class="expo-strip">
    <img src="https://www.franchiseindia.com/images/popup/pop-bottom-footers.jpg" />
  </div>
  <div class="clr"></div>
  </div>
</div>
      </div>
     
    </div>

  </div>
</div>




<script language="javascript">
	 if(screen.width>767)  
        {
$(document).ready(function(){
$('#myModal').modal('show');
});
		}
 function isNumber(evt) {
          evt = (evt) ? evt : window.event;
          var charCode = (evt.which) ? evt.which : evt.keyCode;    
          if (charCode > 31 && (charCode < 48 || charCode > 57)) {
              return false;        
          }
          return true;
      }

</script>