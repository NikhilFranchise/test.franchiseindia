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
    .sec{overflow: hidden;width: 100%;margin-bottom:10px; }
    .f1{ float:left; width:45%;}
    .f2{ float:left; width:5%; color:#fff;}
    .f3{ float:right; width:50%;}
    .newheader{z-index:1;}
    .show-header{margin-right:42px; width:538px;}
    .expo-header{ }
    .fi-bg-expo{height:476px; width:600px; margin:0 auto; background:url("https://www.franchiseindia.com/images/popup/wavebottom.jpg") no-repeat center top;}
    .fro-expo-form{overflow:hidden; margin:0px auto;  padding:0; }
    .fro-expo-form label{width:180px; color: #fff; font-size:14px; font-family:Open Sans Light; margin-right:10px; float:left; color:#fff; padding-top:3px; padding-right:10px; text-align:left; }
    .fro-expo-form  input[type="text"], .fro-business-form input[type="tel"], .fro-business-form input[type="email"]{width:100%;
        height: 33px;  padding:6px 0 6px 10px; color:#333; float:left; background:white; border:1px solid #dfdfdf; border-radius:0px;-moz-border-radius:0px;-webkit-border-radius:0px;}
    .fro-expo-form  input[placeholder]{color:#666;}
    .fro-expo-form select{width:100%;background:white; padding:4px !important; border:1px solid #dfdfdf; line-height:28px !important; color:#333; border-radius:0px;}

    .fro-expo-form label.error{display:none!important}
    .fro-expo-form input.error, .fro-business-form select.error {background: none repeat scroll 0 0 #ffa312 !important; color:#fff !important; border:1px solid #fff !important;}
    .fi-expotest{font-size:32px; color:#fff; font-family:'Open Sans Regular';  padding:22px 0 0px 0px; line-height:30px; text-transform:uppercase;}
    .fi-expotest span{color:#fff200; font-family:'Open Sans Bold';}
    .expo-submitnew{background:url("https://www.franchiseindia.com/images/popup/wavebtn.png") no-repeat; width:116px;
        height:43px;cursor:pointer;  margin:15px auto 0 0px; border:none; display:inline-block;}
    .boxblk { padding:130px 30px 0;}
    .fblk { text-align: center;}
    .tsha  {font-family:'Open Sans Light'; font-size:19px; line-height:19px; clear:both; color:#fff;     margin-top: 10px;}
    .tsha span { font-family:'Open Sans Semibold'; font-size:16px;}
    .expo-bgcolor{ background: #EA1519;color:#fff; text-align: center; font-size: 18px;padding-bottom:5px; padding-top: 2px;}
    /* End popup start */
    .valtxtx {font-family:'Open Sans Light'; font-size:20px; color:#fff;    padding-top: 10px;     margin: 0 auto;     width: 218px;}
    .valtxtx span{ color:#fff;       font-family: 'Open Sans Bold'; }
    .leftshow { float:left;}
    .valtxtx #novisitShow{    background: transparent!important;
        width: 23%!important;
        font-family: 'Open Sans Bold';
        border: none!important; float:left; height: 28px; color:#fff; padding:2px;}
</style>

<div id="myModal" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">


                <div id="my_modal" class="model_top" style="width:600px;">
                    <!--<img src="https://www.franchiseindia.com/images/popup/close.gif" class="my_modal_close" onclick="closepop();" style="right: -2px;"/>-->
                    <div class="fi-HeadCont-expo">

                        <div class="expo-header">
                            <a href="https://www.indianretailer.com/noida/" target="_blank">
                                <img class="lozad" data-src="https://www.franchiseindia.com/images/popup/waveheader.jpg" /></a>
                        </div>
                    </div>
                    <div class="fi-bg-expo">







                        <div class="boxblk">

                            <form method="post" id="form1-stall22" name="form1-stall" class="fro-expo-form" action="https://www.indianretailer.com/noida/register_update.php">
                                <input type="hidden" name="ref" value="Eretail-Insta-Registration">
                                <input type="hidden" name="hideType" value="Future of Noida Retail 2019">
                                <input type="hidden" name="event_year" value="Noida January 2019">
                                <input type="hidden" name="src" value="website Popup">
                                <input type="hidden" name="want" value="To Attend">

                                <div class="sec">
                                    <div class="f1">
                                        <label>Name *</label>
                                    </div>
                                    <div class="f2">:</div>
                                    <div class="f3">
                                        <input id="txtName" name="txtname" type="text" class="form-control" placeholder="Name" required="">
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                        <label>Email *</label>
                                    </div>
                                    <div class="f2">:</div>
                                    <div class="f3">
                                        <input id="txtEmail" name="txtemail" type="email"  pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" class="form-control" placeholder="Email" required="">
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                        <label>Contact *</label>
                                    </div>
                                    <div class="f2">:</div>
                                    <div class="f3">
                                        <input id="txtPhone" name="txtphone" type="tel" placeholder="Mobile" class="form-control"
                                               pattern="[789][0-9]{9}" minlength="10" maxlength="10" onkeypress="return isNumber(event)" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="">
                                    </div>
                                </div>
                                <div class="sec">
                                    <div class="f1">
                                        <label>Organisation *</label>
                                    </div>
                                    <div class="f2">:</div>
                                    <div class="f3">
                                        <input id="txtcompany" name="txtcompany" type="text" class="form-control" placeholder="Organisation" required="">
                                    </div>
                                </div>
                                <div class="sec">
                                    <div class="f1">
                                        <label>State *</label>
                                    </div>
                                    <div class="f2">:</div>
                                    <div class="f3">
                                        <select name="txtState" class="form-control myselectclasscat" id="txtState">
                                            <option value="">Select State</option>
                                            <option value="Andhra Pradesh" >Andhra Pradesh</option><option value="Arunachal Pradesh" >Arunachal Pradesh</option><option value="Assam" >Assam</option><option value="Bihar" >Bihar</option><option value="Chhattisgarh" >Chhattisgarh</option><option value="Goa" >Goa</option><option value="Gujarat" >Gujarat</option><option value="Haryana" >Haryana</option><option value="Himachal Pradesh" >Himachal Pradesh</option><option value="Jammu and Kashmir" >Jammu and Kashmir</option><option value="Jharkhand" >Jharkhand</option><option value="Karnataka" >Karnataka</option><option value="Kerala" >Kerala</option><option value="Madhya Pradesh" >Madhya Pradesh</option><option value="Maharashtra" >Maharashtra</option><option value="Manipur" >Manipur</option><option value="Meghalaya" >Meghalaya</option><option value="Mizoram" >Mizoram</option><option value="Nagaland" >Nagaland</option><option value="Delhi/NCR" >Delhi/NCR</option><option value="Orissa" >Orissa</option><option value="Pondicherry" >Pondicherry</option>
                                            <option value="Punjab">Punjab</option><option value="Rajasthan" >Rajasthan</option>
                                            <option value="Sikkim" >Sikkim</option><option value="Tripura" >Tripura</option>
                                            <option value="Uttaranchal" >Uttaranchal</option><option value="Uttar Pardesh" selected>Uttar Pardesh</option><option value="West Bengal" >West Bengal</option><option value="Tamil Nadu" >Tamil Nadu</option>
                                            <option value="Telangana" >Telangana</option>	</select>
                                    </div>
                                </div>






                                <div class="sec" style="text-align:center;">

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



