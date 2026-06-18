@php
    setcookie('fidelhi', 'FI2017');
@endphp
 <style type="text/css">
#myModal .modal-body{padding:0px!important;}
#myModal .modal-dialog{width:607px!important;}
#myModal .bcs{position: absolute;
right: 68px!important;
top: 0px!important;
background:transparent!important;
box-shadow:none!important;
z-index: 999;
height: 33px;
width: 33px;
display:block;
opacity: 1;
cursor: pointer;
}

#popup_entry1 input.errorInput {
	border:1px solid yellow;
	background:yellow;
}


/*delhi-expo-popup*/
.my_modal_close{ position:absolute;}
#update input.errorInput {
border:1px solid #FF0000;
background:yellow;
}
.modal-content{border:none!important;}
.modal-dialog{height:310px; background:#fff;width:606px!important;}
.well {background-color: #FFFFFF;margin-bottom: 20px;min-height: 20px;position: relative;}
.popup_leftsec{ float:left; padding: 25px; width:380px;}
.fi-wel-pop-ri8 {background: none repeat scroll 0 0 #EDEDF0;padding: 30px;position: relative;width: 225px; float:left; height:310px;}
.fi-wel-pop-ri8 a.fi-subsc {background: none repeat scroll 0 0 #000;color: #FFFFFF;display: block;font-family:Arial, Helvetica, sans-serif;height: 25px;line-height: 25px;margin-top: -2px;text-align: center;text-transform: uppercase; font-size:13px; font-weight:bold;}
h2.new-1{font-family:Arial, Helvetica, sans-serif;font-size:27px; text-transform:uppercase; color:#000; margin-top:0px;}
h2.new-1 span{color:#000}
h6.new-2{font-family:Arial, Helvetica, sans-serif; font-size:15px; margin-bottom:10px; text-transform:none; color:#999;}
.grn-txt {color:#026537 !important;}
#update input[type="email"] {border: 1px solid #CCCCCC;margin-bottom: 15px;padding: 9px;width: 300px;}
.newsletter-btn {background: none repeat scroll 0 0 #026537;color: #FFFFFF;cursor: pointer;font-family:Arial, Helvetica, sans-serif;font-size: 15px;height: 30px;margin-right: 10px;text-transform: uppercase;width: 150px; font-weight:bold; border:none;}

.newsletter-btn-d {background: none repeat scroll 0 0 #770000;color: #FFFFFF;cursor: pointer;font-family:Arial, Helvetica, sans-serif;font-size: 15px;height: 30px;margin-right: 10px;text-transform: uppercase;width: 150px; font-weight:bold;}
.maru-txt {color:#770000 !important;}

.dot-bod{border-top: 1px dashed #eaeaea; margin-top:20px;}
.sp10{height:10px; clear:both;}
.pop-txt{ line-height:15px; color:#666; font-size:15px; }
.oflow {
overflow: hidden;
}
.lh15 {
line-height: 15px !important;
}
.newsletter-btn {
background: none repeat scroll 0 0 #000;
color: #FFFFFF;
cursor: pointer;
font-family: "Open Sans Light";
font-size: 15px;
height: 30px;
margin-right: 10px;
text-transform: uppercase;
width: 150px;
font-weight: bold;
}
.fl {
float: left;
}
.modal .close{right:0px!important; top:-5px!important;}
/* End popup start */

</style>

<div id="myModal" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">		
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

<div class="modal-body">


<div id="my_modal" class="model_top" style="width:607px!important;"> 

<div class="popup_leftsec"> 
<h2 class="new-1">Get noticeable shift </h2>
<h6 class="new-2">News, Case Studies, Insights & more 

<br />on franchise & retail and industry </h6>

<div class="dot-bod"></div>
<div class="sp10"></div>


    <form id="update" method="post" action="{{Config::get('constants.MainDomain')}}/newslettersignup">
    <input type="hidden" name="site_type" value="fi">
    <input id="email" name="email"   value="" placeholder="Enter your Email Id" type="email" required>
    <input type="submit" value="Subscribe Now" class="newsletter-btn fl"  id="btnupdate"/>
    
    
    <div id="newslettermsgs_pop" class="oflow lh15">
    <strong>Get insights on the Franchise Industry & much more for free.</strong></div>
    </form>



<div class="dot-bod"></div>
<div class="sp10"></div>
<img src="http://www.franchiseindia.com/images/icons/lock-icon.gif" class="fl" style="margin-right:8px;" /><p class="pop-txt">We value your privacy.<br />
You can unsubscribe anytime</p>
</div>
<div class="fi-wel-pop-ri8">
<!--<img src="http://www.franchiseindia.com/images/50-off.png" style="position:absolute; left:0; top:0; z-index:99999" />-->
<a href="https://master.franchiseindia.com/emagazine/shop/" target="_blank"><img src="http://www.franchiseindia.com/images/magazine/tfw-165x225.gif" /></a>
<a href="https://master.franchiseindia.com/emagazine/shop/" class="fi-subsc" target="_blank">Subscribe Magazine</a>
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


</script>




