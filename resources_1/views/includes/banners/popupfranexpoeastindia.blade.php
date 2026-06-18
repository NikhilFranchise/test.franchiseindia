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
        margin-bottom: 10px
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
        height:446px;
        width: 600px;
        margin: 0 auto;
        background: url("https://www.franchiseindia.com/images/popup/popupbackfranexpo.jpg") no-repeat center top
    }



    .sec .f1 .form-control,
    .sec .f3 .form-control {
        background: #fff!important;
        border: 1px solid #767677;
        color: #333!important
    }

    .sec:placeholder-shown {
        color: #333!important
    }

    .sec .form-control::placeholder {
        color: #333!important;
        opacity: 1
    }

    .sec .form-control:-ms-input-placeholder {
        color: #333!important
    }

    .fi-expotest {
        font-size: 27px;
        color: #fff;
        font-family: 'Open Sans Regular';
        padding: 15px 0 5px 0;
        line-height: 27px;
        text-transform: uppercase
    }
    .fi-expotest span { color: #ffcb08;         font-family: 'Open Sans Semibold';}

    .expo-submitnew {
        padding: 8px 14px;
        background: #333;
        text-transform: uppercase;
        color: #ffcb08;
        font-size: 18px;
        font-family: 'Open Sans Bold';
        cursor: pointer;
        margin: 22px auto 0 0;
        border: 0;
        display: inline-block
    }

    .boxblk {
        padding: 15px 30px 0;
    }

    .fblk {
        text-align: center
    }

    .tsha {
        font-family: 'Open Sans Semibold';
        font-size: 20px;
        line-height: 20px;
        clear: both;
        color: #fff;
        margin-bottom: 10px;
        padding: 0 0 0 36px;
        text-align: left;
        width: 56%;
    }
    .tsha span { color: #ffcb08;}
    .valtxtx span {
        color: #fff;
        font-family: 'Open Sans Bold'
    }
.btrg { background: #ffcb08;     padding-bottom: 10px;}

.headtag { height: 171px; overflow: hidden;}
.ftrbg {     width: 600px; background: #fff; color: #333;  padding: 5px; text-align: center;  font-family: 'Open Sans Regular'; font-size: 16px; line-height: 22px;}
    .ftrbg a  {color: #000;}
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
                        <img src="https://www.franchiseindia.com/images/popup/popup-franexpoapril.jpg?id=1" /></a>
                    </div>


                        <form class="form registration-form align-center" action="https://master.franchiseindia.com/fro/register_update.php" method="post">
                            <input id="ref" name="ref" type="hidden" value="FRO-Insta-Paid">
                            <!--<input id="eventdays" name="eventdays" type="hidden" value="Kolkatasunday12thapril">-->
                            <input id="lp_type" name="lp_type" type="hidden" value="FRO-BOS">
                            <input id="source" name="source" type="hidden" value="Website">
                            <input id="want" name="tfw_interest" type="hidden" value="Visit the Expo - Paid">
                            <input type="hidden" class="check" value="Paytm" name="mop" id="mop">

                            <div class="fi-bg-expo">


                        <div class="fblk">
                            <div class="fi-expotest">Want to <span>Start your own Business ?</span> </div>

                            <div class="tsha">Leading brands offering
                                Exclusive Business Options
                                in <span>East India</span></div>
                        </div>

                        <div class="boxblk">




                                <div class="sec">
                                    <div class="f1">
                                        <input name="txtName" type="text" class="form-control" placeholder="Name" required="">
                                    </div>

                                </div>

                                <div class="sec">
                                    <div class="f1">
                                        <input name="txtEmail" type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" class="form-control" placeholder="Email" required="">
                                    </div>

                                </div>
                                <div class="sec">
                                <div class="f1">
                                    <input name="txtPhone" type="tel" placeholder="Contact" class="form-control" pattern="[789][0-9]{9}" minlength="10" maxlength="10" onkeypress="return isNumber(event)" required="">
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

                                </div>

                                <div class="sec">
                                <div class="f1">
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

                                </div>

                                <div class="sec">
                                    <div class="f1">
                                        <select type="text" id="eventdays" name="eventdays" class="form-control" accesskey="" onchange="checkNumbers()" required>
                                            <option value="Kolkatasunday12thapril" selected="selected">Kolkata, Sunday, 12th April 2020</option>
                                        </select>
                                    </div>
                                </div>



                        </div>


                    </div>
                        <div class="btrg">
                            <input class="form-control" type="hidden" value="500" id="txtAmount" readonly>
                            <div class="sec" style="text-align:center">
                                <input type="submit" value="Get Your Entry Pass" name="btnSubmitReg" class="expo-submitnew">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="ftrbg"><a href="https://www.franchisexpo.in/"> www.franchisexpo.in</a></div>
            </div>
        </div>
    </div>
</div>

<script language="javascript">
    function checkNumbers(){var amt=500;var eventdays=$("#eventdays :selected").val();var visitVal=$("#txtDelegates :selected").val();
    if(eventdays=="Kolkatasunday12thapril")
    {amt=500;$('#txtAmount').val(amt);}
    else if(eventdays=="Kolkatasunday12thapril")
    {amt=500;$('#txtAmount').val(amt);}

    else{amt=500;$('#txtAmount').val(amt);}
        total=visitVal*amt;$('#txtAmount').val(total);}
    /*<![CDATA[*/if(screen.width>767)
    {$(document).ready(function(){$('#myModal').modal('show');});}
    function isNumber(evt){evt=(evt)?evt:window.event;var charCode=(evt.which)?evt.which:evt.keyCode;return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }
    function getcitypopup(value){value=$(value).find(':selected').attr('data-id');$.ajax({type:'GET',url:'/getcitylist',data:{state:value},success:function(data){$("#popupcity").html(data);}});}/*]]>*/
</script>
