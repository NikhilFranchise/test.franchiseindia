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
    .sec{overflow: hidden;width: 100%;margin-bottom: 13px; }
    .f1{ float:left; width:45%;}
    .f2{ float:left; width:5%; color:#fff;}
    .f3{ float:right; width:50%;}
    .newheader{z-index:1;}
    .show-header{margin-right:42px; width:538px;}
    .expo-header{ }
    .fi-bg-expo{height:577px; width:600px; margin:0 auto; background:url("https://www.franchiseindia.com/images/popup/footer-bos.jpg") no-repeat center top;}
    .fro-expo-form{overflow:hidden; margin:0px auto;  padding:0; }
    .fro-expo-form label{width:180px; font-size:14px; font-family:Open Sans Light; margin-right:10px; float:left; color:#fff; padding-top:3px; padding-right:10px; text-align:left; }
    .fro-expo-form  input[type="text"], .fro-expo-form input[type="tel"], .fro-expo-form input[type="email"]{ width:50%;     height: 32px;  padding:6px 0 6px 10px; color:#454545; float:left; background:white; border:1px solid #dfdfdf; border-radius:4px;}
    .fro-expo-form  input[placeholder]{color:#454545;}
    .fro-expo-form select{width:50%;background:white; padding:4px 4px 4px 10px !important; border:1px solid #dfdfdf; line-height:28px !important; color:#454545; border-radius:4px;}

    .fro-expo-form label.error{display:none!important}
    .fro-expo-form input.error, .fro-business-form select.error {background: none repeat scroll 0 0 #ffa312 !important; color:#fff !important; border:1px solid #fff !important;}
    .fi-expotest{font-size:32px; color:#fff; font-family:'Open Sans Bold'; padding:22px 0 0px 0px; line-height:30px; text-transform:uppercase;}
    .fi-expotest span{color:#fff200;}
    .expo-submitnew{background:url("https://www.franchiseindia.com/images/popup/bossubmitbtn.png") no-repeat; width:133px;
        height:45px;cursor:pointer;  margin:5px auto 0 0px; border:none;}
    .boxblk { padding:20px 30px;}
    .fblk {  padding-top: 25px; margin-left:30px;}
    .tsha  {font-family:'Open Sans Light'; font-size:19px; line-height:19px; clear:both; color:#fff;     margin-top: 10px;}
    .tsha span { font-family:'Open Sans Semibold'; font-size:16px;}
    .expo-bgcolor{ background: #fff;color:#000; text-align: center; font-size: 18px;padding-bottom:5px; padding-top: 2px;}
    /* End popup start */
    ul.bostxt { text-align:center;     margin: 9px 0px;}
    ul.bostxt li {font-size:21px; color:#000;font-family:'Open Sans Regular'; display:inline-block; margin-left:5px; }
    ul.bostxt li span{ font-size:27px; color:#ff7f1c; display:block; float:left;     margin-top: -4px;margin-right: 2px; }
    .valtxtx {font-family:'Open Sans Regular'; font-size:20px; color:#fff;    padding-top: 40px;}
    .valtxtx span{ color:#fff200; }
    .leftshow { float:left;}
    .valtxtx #novisitShow{    background: transparent!important;
        width: 23%!important;
        font-weight: bold;
        border: none!important; float:left; height: 28px; color:#fff200; padding:2px;}
</style>
@php
    $states = Config('location.stateArr');
        asort($states);
    $cities = Config('location.cityArr.18');
        asort($cities);
@endphp

<div id="myModal" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">

                <script type="text/javascript">

                    $(document).ready(function(){
                        $("#novisit").change(function() {
                            total = $('#novisit :selected').val() * 500;
                            $("#novisitAmountt").val(total);
                            $("#novisitShow").val(total);
                        });
                    });

                </script>
                <div id="my_modal" class="model_top" style="width:600px;">
                    <!--<img src="https://www.franchiseindia.com/images/popup/close.gif" class="my_modal_close" onclick="closepop();" style="right: -2px;"/>-->
                    <div class="fi-HeadCont-expo">

                        <div class="expo-header">
                            <a href="https://www.franchiseindia.com/bos/" target="_blank">
                                <img src="https://www.franchiseindia.com/images/popup/top-expo-header.jpg" /></a>
                        </div>
                    </div>
                    <div class="fi-bg-expo">

                        <div class="fblk">

                            <img src="https://www.franchiseindia.com/images/popup/start.png" />

                        </div>





                        <div class="boxblk">




                            <form id="form1-stall" name="form1-stall" method="post" action="https://master.franchiseindia.com/bos/insta_reg_ticket.php" class="fro-expo-form">
                                <input type="hidden" name="src" id="src" value="popup">
                                <input type="hidden" name="ref" id="ref" value="BOS-Insta">
                                <input type="hidden" name="reg_type" id="reg_type" value="BOS-Paid-Ticket">
                                <input type="hidden" name="want" id="want" value="Visit The Show">
                                <input type="hidden" name="event_year" id="event_year" value="East India November 2019">

                                <input type="hidden" class="check" value="Paytm" name="mop" id="mop">
                                <div class="sec">
                                    <select id="city" value="Guwahati" name="event_city" required><option value="" selected="selected">Select City to Attend</option><option value=Guwahati>Guwahati</option><option value=Kolkata>Kolkata</option><option value=Patna>Patna</option><option value=Ranchi>Ranchi</option><option value=Bhubaneswar>Bhubaneswar</option></select>

                                </div>


                                <div class="sec">
                                    <input id="name" name="name" type="text" class="form-control" placeholder="Name *" required="">

                                </div>

                                <div class="sec">

                                    <input id="email" name="email" type="email"  pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" class="form-control" placeholder="Email *" required="">

                                </div>

                                <div class="sec">

                                    <input id="phone" name="phone" type="tel" placeholder="Contact No. *" class="form-control"
                                           pattern="[789][0-9]{9}" minlength="10" maxlength="10" onkeypress="return isNumber(event)" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="">

                                </div>


                                <div class="sec">
                                    <select name="state" onchange="getcitypopup(this)"  class="form-control myselectclasscat"
                                            id="txtState" required="">
                                        <option value="" data-id="">Select State</option>
                                        @foreach($states as $index => $value)
                                            <option value="{{ $value }}" data-id="{{ $index }}">{!! $value !!}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="sec">



                                    <select name="city" class="form-control myselectclasssearch" id="popupcity" required="">
                                        <option value="">Select a City</option>
                                        @foreach($cities as $value)
                                            <option value="{!! $value !!}"  @if ( $value == "Kolkata") selected @endif>{!! $value !!} </option>
                                        @endforeach
                                    </select>


                                </div>






                                <div class="sec">


                                    <select placeholder="No. of Visitors" id="novisit" name="txtDelegates" class="form-control myselectclasscat" required>

                                        <option value="1" selected>1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>



                                </div>

                                <div class="sec">

                                    <input class="form-control"  type="hidden" value="500" id="novisitAmountt" name="txtAmount" readonly>

                                </div>


                                <div style="height:0px;"></div>
                                <div class="valtxtx" style="display: none;">

                                    <div class="leftshow">Total Amount : <span>Rs.</span></div><input type="text" id="novisitShow" value="500" class="valid">

                                </div>


                                <div class="sec">

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
    function getcitypopup(value){

        value = $(value).find(':selected').attr('data-id');

        $.ajax({
            type:'GET',
            url:'/getcitylist',
            data:{state : value},
            success:function(data){
                $("#popupcity").html(data);
            }
        });
    }
</script>



