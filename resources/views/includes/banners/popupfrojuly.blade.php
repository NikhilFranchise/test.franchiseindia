<style type="text/css">
#myModal .modal-body{padding:0px!important;}
#myModal .modal-dialog{width:600px!important;}
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
.sec{overflow: hidden;width: 100%;margin-bottom: 7px; }
.f1{ float:left; width:40%; color:#fff; font-size:14px; font-family:'Open Sans Light';}
.f2{ float:left; width:5%; color:#fff; padding-top: 6px;}
.f3{ float:left; width:55%; color:#fff;}
.fro-bg-expo{height:447px; width:600px; margin:0 auto;
padding:0 30px;
 background:url("https://www.franchiseindia.com/images/popup/fropopupjulyback.jpg") no-repeat center top;}
.topimg{height:255px; width:600px; margin:0 auto; background:url("https://www.franchiseindia.com/images/popup/fropopupjuly.jpg") no-repeat center top; }
.fro-expo-form{overflow:hidden; margin:0px auto;  padding:30px; }
.fro-expo-form .form-control { height:auto;}
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
.expo-submitnew{background:url("https://www.franchiseindia.com/images/popup/frosubmit.gif") no-repeat; width:123px;
height:35px;cursor:pointer;  margin:10px auto 0; border:none; text-align:center;}
.expo-submitnew:focus{  border:none; box-shadow: none;}
.text-ce{ text-align:center;}

.boxblktop { height:152px; clear:both;}
.boxblk {width:291px; margin-left:30px; background:#fff; clear:both; border-top-right-radius:4px; border-top-left-radius:4px; height:403px; overflow:hidden;} 
.boxblkbottom { height:44px; clear:both;}
.tsha  {font-family:'Open Sans Light'; font-size:16px; line-height:15px; clear:both; color:#fff;}
.tsha span { font-family:'Open Sans Bold'; font-size:16px;}
.expo-bgcolor{ background: #654235;color:#fff; text-align: center; font-size: 18px;padding-bottom:5px;}
.frmhead { font-family:'Open Sans Bold'; font-size:30px; line-height:26px; color:#ffffff; text-transform:uppercase; text-align:center;     padding-top: 20px;}
.frmhead span{color:#fff200; } 

.frmheadsub{ font-family:'Open Sans Light'; font-size:17px; line-height:18px; color:#fff; margin-bottom:15px;text-align:center; margin-top:5px;}
.frmheadsub span{ font-family:'Open Sans Semibold';   }

/* End popup start */

</style>

<div  id="myModal" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<div class="modal-body">
<div id="my_modal" class="model_top" style="width:600px;"> 
<div class="topimg"></div>
<div class="fro-bg-expo">


<form id="form1-new" class="form registration-form align-center" action="https://master.franchiseindia.com/fro/register_update.php" method="post">
<input id="ref" name="ref" type="hidden" value="FRO-Insta-Paid">
<input type="hidden" value="Pune July 2018" name="event_year" id="event_year">  
<input type="hidden" value="FRO 2018 Pune" name="event_title" id="event_title">  
<input type="hidden" value="Pune" name="event_city" id="event_city">  							
<input id="source" name="source" type="hidden" value="popup">	
<input type="hidden" value="Visit the Expo - Paid" name="tfw_interest" id="want">


<div class="frmhead">
Want to <span>Start</span><br />
<span>your own business</span>
</div>
<div class="frmheadsub">Explore from <span>200+ Business options</span> at India's Biggest
Franchise & Retail Show
</div>



<div class="sec">
 <div class="f1">
            <label>Name *</label>
            </div>
            <div class="f2">:</div>
<div class="f3">
<input id="txtname" name="txtName" type="text" class="form-control" placeholder="" maxlength="50" required="">
</div>
</div>

<div class="sec">
      <div class="f1">
            <label>Email *</label>
            </div>
            <div class="f2">:</div>
<div class="f3">
<input name="txtEmail"  id="txtemail" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" type="email" class="form-control" placeholder="" required="">
</div>
</div>

<div class="sec">
      <div class="f1">
            <label>Phone *</label>
            </div>
            <div class="f2">:</div>
<div class="f3">
<input id="txtphone" pattern="[789][0-9]{9}" minlength="10" maxlength="10"  name="txtPhone" type="tel" placeholder="" class="form-control"  oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" onkeypress="return isNumber(event)" required="">
</div>
</div>
<div class="sec">
      <div class="f1">
            <label>City *</label>
            </div>
            <div class="f2">:</div>
<div class="f3">
<input name="txtCity" id="txtCity" type="text" class="form-control" placeholder="" required="">
</div>
</div>


<div class="sec">
      <div class="f1">
            <label>No. of Visitors *</label>
            </div>
            <div class="f2">:</div>
<div class="f3">
 <select id="novisit" name="txtDelegates" class="form-control myselectclass">
                                       <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>

</div>
</div>

<div class="sec">
      <div class="f1">
            <label>Amount (INR) *</label>
            </div>
            <div class="f2">:</div>
<div class="f3">
<input class="form-control"  type="text" value="500" id="novisitAmountt" name="txtAmount" readonly>


</div>
</div>




<div class="sec text-ce">
<input type="submit" value="" name="btnSubmitReg" class="expo-submitnew">
</div>



</form>
</div>

<div class="bottbg">The Biggest Meeting Place for Investors Seeking Franchise</div>
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



