<style type="text/css">
    #myModal .modal-body {
        padding: 0!important
    }

    #myModal .modal-dialog {
        width: 600px!important
    }

    #myModal .close {
        right: -19px!important;
        top: -19px!important;
        box-shadow: 0 0 15px 8px rgba(0, 0, 0, 0.35)!important
    }

    #popup_entry1 input.errorInput {
        border: 1px solid yellow;
        background: yellow
    }

    #myModal .my_modal_close {
        position: absolute
    }

    #myModal .modal-content {
        margin-top: 70px
    }

    .sec {
        overflow: hidden;
        width: 100%;
        margin-bottom: 32px
    }

    .f1 {
        float: left;
        width: 48%
    }

    .f3 {
        float: right;
        width: 48%
    }

    .sec::placeholder {
        color: #fff!important;
        opacity: 1
    }

    .sec:-ms-input-placeholder {
        color: #fff!important
    }

    .sec:-ms-input-placeholder {
        color: #fff!important
    }

    .fi-bg-expo {
        height: 530px;
        width: 600px;
        margin: 0 auto;
        background: url("https://www.franchiseindia.com/images/popup/back-fro-dec2019.jpg") no-repeat center top
    }



    .sec .f1 .form-control,
    .sec .f3 .form-control {
        background: transparent!important;
        border: 1px solid #767677;
        color: #fff!important
    }

    .sec:placeholder-shown {
        color: #fff!important
    }

    .sec .form-control::placeholder {
        color: #fff!important;
        opacity: 1
    }

    .sec .form-control:-ms-input-placeholder {
        color: #fff!important
    }

    .fi-expotest {
        font-size: 39px;
        color: #ea1519;
        font-family: 'Open Sans Semibold';
        padding: 25px 0 8px 0;
        line-height: 39px;
        text-transform: uppercase
    }
    .fi-expotest span { color: #fff;}

    .expo-submitnew {
        padding: 8px 14px;
        background: #ea1519;
        text-transform: uppercase;
        color: #fff;
        font-size: 18px;
        font-family: 'Open Sans Bold';
        cursor: pointer;
        margin: 5px auto 0 0;
        border: 0;
        display: inline-block
    }

    .boxblk {
        padding: 20px 30px
    }

    .fblk {
        text-align: center
    }

    .tsha {
        font-family: 'Open Sans Semibold';
        font-size: 22px;
        line-height: 24px;
        clear: both;
        color: #fff;
        margin-bottom: 10px;
        padding:0 36px;
    }

    .valtxtx span {
        color: #fff;
        font-family: 'Open Sans Bold'
    }


.headtag { height: 157px; overflow: hidden;}
.ftrbg { background: #ea1519; color: #fff;  padding: 5px; text-align: center;  font-family: 'Open Sans Regular'; font-size: 16px; line-height: 22px;}
</style>


@php
    $states = Config('location.stateArr');
    asort($states);
@endphp
<div id="myModal" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">
                <div id="my_modal" class="model_top" style="width:600px">
                    <div class="headtag">
                        <img src="https://www.franchiseindia.com/images/popup/fro-popup-mumbai-2020.jpg" /></a>
                    </div>

                    <div class="fi-bg-expo">


                        <div class="fblk">
                            <div class="fi-expotest"><span>Want to</span> start <br> your own Business ?</div>
                            <div class="tsha">Explore from 200+ Business options at Asia's
                                Biggest Franchise & Retail Show</div>
                        </div>
                        <div class="boxblk">
                            <form method="post" id="form1-stall" name="form1-stall" class="top-reg" action="https://master.franchiseindia.com/fro/register_update_mumbai.php">
                                <input id="ref" name="ref" type="hidden" value="FRO-Insta-Paid">
                                <input type="hidden" value="Mumbai May 2020" name="event_year" id="event_year">
                                <input type="hidden" value="FRO 2020 Mumbai LP New" name="event_title" id="event_title">
                                <input type="hidden" value="Mumbai" name="event_city" id="event_city">
                                <input id="source" name="source" type="hidden" value="Popup">
                                <input id="tfw_interest" name="tfw_interest" type="hidden" value="Visit the Expo - LP Paid">
                                <input type="hidden" value="fro_event-registration" name="typeurl" id="typeurl">
                                <input type="hidden" value="Paytm" name="mop" id="mop">


                                <div class="sec">
                                    <div class="f1">
                                        <input name="txtName" type="text" class="form-control" placeholder="Name" required="">
                                    </div>
                                    <div class="f3">
                                        <input name="txtEmail" type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" class="form-control" placeholder="Email" required="">
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                        <input name="txtPhone" type="tel" placeholder="Contact" class="form-control" pattern="[789][0-9]{9}" minlength="10" maxlength="10" onkeypress="return isNumber(event)" required="">
                                    </div>
                                    <div class="f3">
                                        <input name="txtAddress" type="text" class="form-control" placeholder="Address" required="">
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                        <select name="txtState" onchange="getcitypopup(this)" class="form-control" id="txtState" required="">
                                            <option value="" data-id="">Select State</option>
                                            @foreach($states as $index => $value)
                                                <option value="{{ $value }}" data-id="{{ $index }}">{!! $value !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="f3">
                                        <select name="txtCity" class="form-control" id="popupcity" required="">
                                            <option value="">Select City</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                        <select id="txtDelegates" name="txtDelegates" class="form-control myselectclass3"  onChange="checkNumbers();" >
                                            <option value="1"  selected>Select No. of Visitors</option>
                                            <option value="1">1</option>
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
                                    <div class="f3">
                                        <select type="text" id="eventdays" name="eventdays" class="form-control" accesskey="" onchange="checkNumbers()" required>
                                            <option value="Friday22may">Select Date</option>
                                            <option value="Friday22may">Friday, 22nd May</option>
                                            <option value="Saturday23may">Saturday, 23rd May</option>
                                            <option value="Bothdays2223may">Both days, 22nd-23rd May</option>
                                        </select>
                                    </div>
                                </div>


                                <input class="form-control" type="hidden" value="500" id="txtAmount" readonly>
                                <div class="sec" style="text-align:center">
                                    <input type="submit" value="Get Your Entry Pass" name="btnSubmitReg" class="expo-submitnew">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="ftrbg">The Biggest Meeting Place for Investors Seeking Franchise</div>
            </div>
        </div>
    </div>
</div>

<script language="javascript">
    function checkNumbers(){var amt=500;var eventdays=$("#eventdays :selected").val();var visitVal=$("#txtDelegates :selected").val();if(eventdays=="Friday22may")
    {amt=500;$('#txtAmount').val(amt);}
    else if(eventdays=="Saturday23may")
    {amt=500;$('#txtAmount').val(amt);}
    else if(eventdays=="Bothdays2223may")
    {amt=1000;$('#txtAmount').val(amt);}
    else{amt=500;$('#txtAmount').val(amt);}
        total=visitVal*amt;$('#txtAmount').val(total);}
    /*<![CDATA[*/if(screen.width>767)
    {$(document).ready(function(){$('#myModal').modal('show');});}
    function isNumber(evt){evt=(evt)?evt:window.event;var charCode=(evt.which)?evt.which:evt.keyCode;return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }
    function getcitypopup(value){value=$(value).find(':selected').attr('data-id');$.ajax({type:'GET',url:'/getcitylist',data:{state:value},success:function(data){$("#popupcity").html(data);}});}/*]]>*/
</script>
