<style type="text/css">#myModal .modal-body {
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
        color: #fa8416!important;
        opacity: 1
    }

    .sec:-ms-input-placeholder {
        color: #fa8416!important
    }

    .sec:-ms-input-placeholder {
        color: #fa8416!important
    }

    .fi-bg-expo {
        height: 675px;
        width: 600px;
        margin: 0 auto;
        background: url("https://www.franchiseindia.com/images/popup/expoback2019-back.jpg") no-repeat center top
    }

    .logoblk {
        text-align: center;
        padding-top: 30px;
        padding-bottom: 0px
    }

    .sec .f1 .form-control,
    .sec .f3 .form-control {
        background: transparent!important;
        border: 1px solid #fa8416;
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
        font-size: 26px;
        color: #fa8416;
        font-family: 'Open Sans Bold';
        padding: 25px 0 0 0;
        line-height: 30px;
        text-transform: uppercase
    }

    .expo-submitnew {
        padding: 8px 14px;
        background: #fa8416;
        text-transform: uppercase;
        color: #333;
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
        font-family: 'Open Sans Light';
        font-size: 19px;
        line-height: 20px;
        clear: both;
        color: #fff;
        margin-bottom: 10px
    }

    .valtxtx span {
        color: #fff;
        font-family: 'Open Sans Bold'
    }

    .valtxtx #novisitShow {
        background: transparent!important;
        width: 23%!important;
        font-family: 'Open Sans Bold';
        border: none!important;
        float: left;
        height: 28px;
        color: #fff;
        padding: 2px
    }
.logoblk { background: #fff; padding: 10px 0;}
.headtag { height: 28px;}
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
                    <div class="fi-bg-expo">
                        <div class="headtag">
                            <img src="https://www.franchiseindia.com/images/popup/popupheadbg2019.jpg" /></a>
                        </div>

                        <div class="logoblk">
                            <a href="https://expo.franchiseindia.com/" target="_blank"><img src="https://www.franchiseindia.com/images/popup/logounit2019-5.jpg" /></a>
                        </div>
                        <div class="fblk">
                            <div class="fi-expotest">Want to start your own Business ?</div>
                            <div class="tsha">Meet 500+ National & International Brands.</div>
                        </div>
                        <div class="boxblk">
                            <form class="form registration-form align-center" action="https://master.franchiseindia.com/expo/register_update.php" method="post" name="frmConferenceReg" id="frmConferenceReg">
                                <input type="hidden" name="ref" value="Expo-Visitor-Registration-LP">
                                <input type="hidden" name="reg_type" value="Delhi Expo Visitor Registration Paid">
                                <input type="hidden" name="event_year" value="Delhi October 2019">
								<input type="hidden" class="check" value="Paytm" name="mop" id="mop">							
                                <input type="hidden" name="src" value="Popup">
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
                                        <select type="text" id="eventdays" name="eventdays" class="form-control" accesskey="" onchange="checkNumbers()" required>
                                            <option value="Sunday13thoctober">Select Date</option>
                                            <option value="Saturday12thoctober">Saturday, 12th October</option>
                                            <option value="Sunday13thoctober">Sunday, 13th October</option>
                                            <option value="Bothdays">Both days, 12-13th October</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="sec">
                                    <div class="f1">
                                        <select name="state" onchange="getcitypopup(this)" class="form-control" id="txtState" required="">
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
                                <input class="form-control" type="hidden" value="1" id="txtDelegates" name="txtDelegates" readonly>
                                <input class="form-control" type="hidden" value="1000" id="txtAmount" readonly>
                                <div class="sec" style="text-align:center">
                                    <input type="submit" value="Get Your Entry Pass" name="btnSubmitReg" class="expo-submitnew">
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
    function checkNumbers(){var amt=1000;var eventdays=$("#eventdays :selected").val();var visitVal=$("#txtDelegates :selected").val();if(eventdays=="Saturday12thoctober")
    {amt=1000;$('#txtAmount').val(amt);}
    else if(eventdays=="Sunday13thoctober")
    {amt=1000;$('#txtAmount').val(amt);}
    else if(eventdays=="Bothdays")
    {amt=1500;$('#txtAmount').val(amt);}
    else{amt=1000;$('#txtAmount').val(amt);}
        total=visitVal*amt;$('#txtAmount').val(total);}
    /*<![CDATA[*/if(screen.width>767)
    {$(document).ready(function(){$('#myModal').modal('show');});}
    function isNumber(evt){evt=(evt)?evt:window.event;var charCode=(evt.which)?evt.which:evt.keyCode;return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }
    function getcitypopup(value){value=$(value).find(':selected').attr('data-id');$.ajax({type:'GET',url:'/getcitylist',data:{state:value},success:function(data){$("#popupcity").html(data);}});}/*]]>*/
</script>
