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
.fi-bg-expo{height:694px; width:600px; margin:0 auto; background:url("https://www.franchiseindia.com/images/popup/nepalpopup.jpg") no-repeat center top;}
.fro-expo-form{overflow:hidden; margin:0px auto;  padding:0; }
.fro-expo-form label{width:180px; color: #fff; font-size:14px; font-family:Open Sans Light; margin-right:10px; float:left; color:#fff; padding-top:3px; padding-right:10px; text-align:left; }
.fro-expo-form  input[type="text"], .fro-business-form input[type="tel"], .fro-business-form input[type="email"]{width:100%;
height: 38px;  padding:4px 0 6px 10px; color:#333; float:left; background:white; border:1px solid #dfdfdf; border-radius:0px;-moz-border-radius:0px;-webkit-border-radius:0px;}
.fro-expo-form  input[placeholder]{color:#666;}
.fro-expo-form select{width:100%;background:white; padding:4px 0 4px 10px!important; border:1px solid #dfdfdf; line-height:28px !important; height: 38px; color:#333; border-radius:0px;}

.fro-expo-form label.error{display:none!important}
.fro-expo-form input.error, .fro-business-form select.error {background: none repeat scroll 0 0 #ffa312 !important; color:#fff !important; border:1px solid #fff !important;}
.fi-expotest{font-size:32px; color:#fff; font-family:'Open Sans Regular';  padding:22px 0 0px 0px; line-height:30px; text-transform:uppercase;}
.fi-expotest span{color:#fff200; font-family:'Open Sans Bold';}
.expo-submitnew{background:url("https://www.franchiseindia.com/images/popup/submit-nepalbtn.png") no-repeat; width:118px;
height:41px;cursor:pointer;  margin:15px auto 0 0px; border:none; display:inline-block;}
.boxblk { padding:20px 30px 0;}
.fblk { text-align: center;}
.tsha  {font-family:'Open Sans Light'; font-size:19px; line-height:19px; clear:both; color:#fff;     margin-top: 10px;}
.tsha span { font-family:'Open Sans Semibold'; font-size:16px;}
.valtxtx span{ color:#fff;       font-family: 'Open Sans Bold'; }
.valtxtx #novisitShow{    background: transparent!important; width: 23%!important; font-family: 'Open Sans Bold';
border: none!important; float:left; height: 28px; color:#fff; padding:2px;}
.headerblk { overflow: hidden; height: 230px;}
.poplogblk { float: left; width: 355px; padding-left: 70px; padding-right: 60px; padding-top: 22px;}
.poptextblk { width: 230px; padding-right: 20px; padding-top:100px; text-align: right; float: left; }
.txtshowpop {font-family:'Open Sans Light'; font-size:27px; line-height:24px; color:#fff;     text-transform: uppercase;}
.txtshowpop span.popv1{font-family: 'Open Sans Bold'; font-size: 52px; line-height: 40px; color: #fff;
text-transform:uppercase;}
.txtshowpop span.popv2{font-family: 'Open Sans Bold'; font-size: 32px; line-height:32px; color: #feb807; text-transform:uppercase;}
.fleftblk { float: left; width: 250px; }
.frightblk { float: right; width:290px;}
ul.popfrmal { padding: 0px; margin: 0px;}
ul.popfrmal li{ display: block; margin-bottom: 10px; overflow: hidden;}
ul.popfrmal li.txtright { text-align: right;}
</style>

<div id="myModal" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">


                <div id="my_modal" class="model_top" style="width:600px;">
                  <div class="fi-bg-expo">

                    <div class="headerblk">
                        <div class="poplogblk">
                            <img class="lozad" data-src="https://www.franchiseindia.com/images/popup/nepal-logo-popup.png" /></a>
                        </div>
                        <div class="poptextblk">
                            <div class="txtshowpop">Register<br>
                            Now to
                                <span class="popv1">Expand</span>
                                <span class="popv2">in Nepal</span>
                            </div>
                        </div>

                    </div>





                        <div class="boxblk">
                                <div class="fleftblk">
&nbsp
                                </div>
                            <div class="frightblk">
                                <form method="post" id="form1-stall22" name="form1-stall" class="fro-expo-form" action="https://www.franchisenepal.com/register_update.php">
								<input type="hidden" name="ref" value="Visitors-Registration">
                                        <input type="hidden" name="visit_type" value="FRO 2019 Nepal">
                                    <input type="hidden" name="event_year" value="Nepal May 2019">
                                    <input type="hidden" name="event_city" value="Nepal">
                                    <input type="hidden" name="src" value="Popup">


                                    <ul class="popfrmal">
                                       <li><select name="reg_type" class="form-control myselectclasscat" id="reg_type">
                                    <option value="Become an Exhibitor">I want to be exhibitor</option>
                                               <option value="Visit the Expo">Visit the Expo</option>
                                               <option value="Attend the Conference">Attend the Conference</option>
                                    </select>
                                       </li>



                                       <li><input type="text" class="form-control" name="txtName" id="txtName" placeholder="Enter Name" required="">
                                       </li>


                                       <li><input type="text" class="form-control" maxlength="150" value="" id="txtEmail" name="txtEmail" placeholder="Enter Email" required="">
                                       </li>

                                       <li><input type="text" class="form-control" minlength="8" maxlength="15" id="txtMobile" name="txtMobile" placeholder="Enter Mobile" required="" >
                                       </li>

                                       <li>  <input type="text" class="form-control" maxlength="150" value="" id="txtOrg" name="txtOrg" placeholder="Enter Company" required="">
                                       </li>

                                       <li><input type="text" class="form-control" maxlength="150" value="" id="txtDesig" name="txtDesig" placeholder="Enter Designation" required="">
                                       </li>

                                       <li><input type="text" class="form-control" maxlength="150" value="" id="txtCity" name="txtCity" placeholder="Enter City" required="">
                                       </li>

                                       <li class="txtright">  <input type="submit" value="" name="btnSubmitReg" class="expo-submitnew"></li>






                                   </ul>



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
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

</script>



