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
.fi-HeadCont-expo{width:600px;  margin:0 auto; padding:0; background:#fff;}
.clear{clear:both;}
.sec{overflow: hidden;width: 100%;margin-bottom: 7px; }
.f1{ float:left; width:45%;}
.f2{ float:left; width:5%; color:#fff;}
.f3{ float:right; width:50%;}
.newheader{z-index:1;}
.show-header{margin-right:42px; width:538px;}
.expo-header{ height:255px; width:600px; background:url("images/popup/popup-header.gif") no-repeat center top;}
.fi-bg-expo{height:447px; width:600px; margin:0 auto; background:url("images/popup//popup-bg.jpg") no-repeat center top;}
.fro-expo-form{overflow:hidden; margin:0px auto;  padding:0; }
.registration-form  label{width:180px; font-size:14px; font-family:Open Sans Regular; margin-right:10px; float:left; color:#fff; padding-top:3px; padding-right:10px; text-align:left; background: url("https://www.franchiseindia.com/images/label-bg-new-wh.gif") no-repeat right 8px; font-weight:400;} 
.fro-expo-form  input[type="text"], .fro-business-form input[type="tel"], .fro-business-form input[type="email"]{width:100%;  padding:6px 0 6px 10px; color:#333; float:left; background:white; border:1px solid #dfdfdf; border-radius:0px;-moz-border-radius:0px;-webkit-border-radius:0px;}
.fro-expo-form  input[placeholder]{color:#666;}
.fro-expo-form select{width:100%;background:white; padding:4px !important; border:1px solid #dfdfdf; line-height:28px !important; color:#666;}

.fro-expo-form label.error{display:none!important}
.fro-expo-form input.error, .fro-business-form select.error {background: none repeat scroll 0 0 #ffa312 !important; color:#fff !important; border:1px solid #fff !important;}
.ri-bgcolor { background:#810081; color:#fff; font-family:'Open Sans Regular'; font-size:18px; text-align:center; width:600px; padding:3px 0;}

.fi-expotest{font-size:30px; color:#fff; font-family:'Open Sans Bold'; padding: 13px 0 0px 30px; line-height:28px; text-transform:uppercase;}
.fi-expotest span{color:#fff200;}
/*.fi-expotest strong{ font-family:'Open Sans Regular'; line-height:20px; color:#fff200;}*/

.expo-submitnew{background:url("images/popup/submit-btn.gif") no-repeat; width:200px;
height:35px;cursor:pointer;  margin:10px auto 0 0px; border:none; margin:0 auto; text-align:center;}
.boxblk { padding:0px 30px;}
.fleft { float:none; text-align:center;}  
.fright { float:right; margin-top: 10px;} 
.tsha  {font-family:'Open Sans Light'; font-size:16px; line-height:15px; clear:both; color:#fff;     margin-bottom: 20px; text-align:center; padding:0px;}
.tsha span { font-family:'Open Sans Bold'; font-size:16px;}
.expo-bgcolor{ background: #215da9;color:#fff; text-align: center; font-size: 18px;padding-bottom:5px;}

.btn.btn-outline-black { background:#fff;border-color: #fff;   color: #333;}
.btn.btn-outline-black:hover {background-color: #fff;color: #333;}
.btn.btn-outline-black:focus {background-color: #fff; color: #333;}
.regNow{z-index: 9;    position: absolute;
    bottom: 50px;left: 230px;
    text-transform: uppercase;}
#myModal .modal-content{background-color:#000!important;}
/* End popup start */

</style>

<div id="myModal" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
		
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <div class="modal-body" id="yt-player">
       
<script type="text/javascript">
	function closePopup() {
		//alert('FRO POPUP');
		
		$('#my_modal').hide();
		$('#my_modal_background').hide();
	}

</script>



    <a href="https://www.franchiseindia.com/franchise-india-show/#registration" target="_blank"> <button type="submit" class="btn btn-outline-black btn-medium margin-6-5 no-margin-bottom regNow no-margin-rl" >Register Now</button></a>
    <iframe width="100%" height="400" src="https://www.youtube.com/embed/rDgV5hNOTaE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen id="YourIFrameID"></iframe>

</div>      </div>
     
    </div>

  </div>
</div>



<script type="text/javascript">
   $('.close').click(function() {
   //First get the  iframe URL
var url = $('#YourIFrameID').attr('src');

//Then assign the src to null, this then stops the video been playing
$('#YourIFrameID').attr('src', '');

// Finally you reasign the URL back to your iframe, so when you hide and load it again you still have the link
$('#YourIFrameID').attr('src', url);
});

   $('#myModal').click(function() {
   //First get the  iframe URL
var url = $('#YourIFrameID').attr('src');

//Then assign the src to null, this then stops the video been playing
$('#YourIFrameID').attr('src', '');

// Finally you reasign the URL back to your iframe, so when you hide and load it again you still have the link
$('#YourIFrameID').attr('src', url);
});



</script>

<script language="javascript">
	 if(screen.width>767)  
        {
$(document).ready(function(){
$('#myModal').modal('show');
});
		}


</script>



