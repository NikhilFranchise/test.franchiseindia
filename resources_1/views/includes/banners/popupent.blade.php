<style type="text/css">
#myModal .modal-body{padding:0px!important;}
#myModal .modal-dialog{width:620px!important;}
#myModal .bcs{position: absolute;
right: 46px!important;
top: -30px!important;
background:transparent!important;
box-shadow:none!important;
z-index: 999;
height: 33px;
width: 33px;
display:block;
opacity: 1;
cursor: pointer;
}

#myModal .close {
   right: -19px!important;
    top: -19px!important;
    box-shadow: 0px 0px 15px 8px rgba(0, 0, 0, 0.35)!important;
}

#popup_entry1 input.errorInput {
	border:1px solid yellow;
	background:yellow;
}
/*delhi-expo-popup*/
#myModal .my_modal_close{ position:absolute;}
#myModal .modal-content { margin-top:70px;}
.clear{clear:both;}
.sec{overflow: hidden;width: 100%;margin-bottom: 11px; }

.f3{ float:left; width:98%; color:#fff;}
.fro-bg-expo{height:514px; width:620px; margin:0 auto;

 background:url("https://www.franchiseindia.com/images/popup/entbg.jpg") no-repeat center top; text-align:left;}
 
 .formwidt { width:370px; float:left; padding:20px 30px;}
 
.topimg{height:189px; width:620px; margin:0 auto; background:url("https://www.franchiseindia.com/images/popup/entheaderpopup.jpg") no-repeat center top; }
.fro-expo-form{overflow:hidden; margin:0px auto;  padding:30px; }




.fro-expo-form  input[type="text"], .fro-expo-form  input[type="tel"], .fro-expo-form input[type="email"]{width:100%;  padding:7px 0 7px 10px; color:#333; float:left; background:#fbfbfb; border:1px solid #ececec; border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px; color:#666666; font-size:14px; }
.fro-expo-form  input[placeholder]{color:#666;}
.fro-expo-form select{width:100%;background:#fbfbfb; padding:7px 0 7px 10px!important; border:1px solid #dfdfdf;  color:#666;
border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px; color:#666666;    margin-bottom: 8px;
}
.bottbg { background:#f58634; font-family:'Open Sans Regular'; color:#fff; text-align:center; font-size:17px; line-height:17px; padding:7px 0; }
.fro-expo-form label.error{display:none!important}
.fro-expo-form input.error, .fro-business-form select.error {background: none repeat scroll 0 0 #ffa312 !important; color:#fff !important; border:1px solid #fff !important;}
.ri-bgcolor { background:#810081; color:#fff; font-family:'Open Sans Regular'; font-size:18px; text-align:center; width:600px; padding:3px 0;}
.fi-expotest{font-size:28px; color:#fff; font-family:'Open Sans Bold'; padding: 13px 0 0px 30px; line-height:22px; text-transform:uppercase;}
.fi-expotest span{color:#fff200;}
.expo-submitnew{background:url("https://www.franchiseindia.com/images/popup/entsubmit.png") no-repeat; width:200px;
height:45px;cursor:pointer;  margin:10px auto 0; border:none; text-align:center;}
.expo-submitnew:focus{  border:none; box-shadow: none;}
.text-ce{ text-align:center;}

.boxblktop { height:152px; clear:both;}
.boxblk {width:291px; margin-left:30px; background:#fff; clear:both; border-top-right-radius:4px; border-top-left-radius:4px; height:403px; overflow:hidden;} 
.boxblkbottom { height:44px; clear:both;}
.tsha  {font-family:'Open Sans Light'; font-size:16px; line-height:15px; clear:both; color:#000; text-transform:capitalize;}
.tsha span { font-family:'Open Sans Bold'; font-size:16px;}
.expo-bgcolor{ background: #654235;color:#fff; text-align: center; font-size: 18px;padding-bottom:5px;}
.frmhead { font-family:'Open Sans Light'; font-size:24px; line-height:24px; color:#000; text-transform:capitalize; text-align:left;     padding-top: 10px; margin-left:6px;}
.frmheadnew {color:#000000; font-family:'Open Sans Bold'; font-size:24px; line-height:27px; } 

.frmheadsub{ font-family:'Open Sans Bold'; font-size:24px; line-height:24px; color:#4b5320; margin-bottom:15px;text-align:left;margin-left:0px; }
.sec .f3 .form-control { height:38px!important;}
.popblkdiv { float:left; width:393px; height:189px;}
.popdatediv { padding-top:56px; height:189px;}
/* End popup start */

</style>

<div  id="myModal" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<div class="modal-body">
<div id="my_modal" class="model_top" style="width:620px;"> 


<div class="topimg">
<div class="popblkdiv"> &nbsp;</div>
<div class="popdatediv"> <img src="https://www.franchiseindia.com/images/popup/{{date('d')}}-days.png" alt="Days" /></div>
</div>

<div class="fro-bg-expo">

<div class="formwidt">
<form class="form registration-form align-center" action="https://www.entrepreneurindia.com/congress/register_update.php" method="post">
			<input id="ref" name="ref" type="hidden" value="EI-Insta">
			<input id="event_year" name="event_year" type="hidden" value="Delhi July 2018">						
			<input id="event_city" name="event_city" type="hidden" value="Delhi">									
			<input id="src" name="src" type="hidden" value="Popup">				
			<input id="ref" name="hideType" type="hidden" value="Entrepreneur India Congress 2018 - Insta Register">		


<div class="frmhead">Join the Biggest</div>
<div class="frmheadnew">Annual Gathering of</div>

<div class="frmheadsub">Entrepreneurs & Startups
</div>

<div class="sec">
<div class="f3">
<select id="want" name="want"  class="form-control myselectclasscat" required>
    <option value="">I want to</option>
    <option value="Attend the congress">Attend the congress</option>
    <option value="Self nominate for the awards">Nominate for Awards</option>
    <option value="Exhibit at the congress">Exhibit at the show</option>
    <option value="Sponsor of event">Sponsor the event</option>
</select>
</div>
</div>

<div class="sec">
<div class="f3">
<input id="txtname" name="txtname"  type="text" class="form-control" placeholder="Name" maxlength="50" required="">
</div>
</div>

<div class="sec">

<div class="f3">
<input id="txtemail" name="txtemail" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" type="email" class="form-control" placeholder="Email" required="">
</div>
</div>

<div class="sec">

<div class="f3">
<input id="txtphone" name="txtphone" pattern="[789][0-9]{9}" minlength="10" maxlength="10"   type="tel" placeholder="Mobile" class="form-control"  oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" onkeypress="return isNumber(event)" required="">
</div>
</div>
<div class="sec">

<div class="f3">
<input id="txtcompany" name="txtcompany" type="text" class="form-control" placeholder="Company" required="">
</div>
</div>









<div class="sec text-ce">
<input type="submit" value="" name="btnSubmitReg" class="expo-submitnew">
</div>



</form>
</div>
</div>


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
		
		
		      /*****************Only Number input function */
      function isNumber(evt) {
          evt = (evt) ? evt : window.event;
          var charCode = (evt.which) ? evt.which : evt.keyCode;    
          if (charCode > 31 && (charCode < 48 || charCode > 57)) {
              return false;        
          }
          return true;
      }

		
		
		
		
   $("#novisit").change(function() {
            total = $('#novisit :selected').val() * 500;
            $("#novisitAmountt").val(total);	
        });


</script>



