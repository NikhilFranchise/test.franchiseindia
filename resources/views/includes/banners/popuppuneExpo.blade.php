<style type="text/css">
    #myModal ::-webkit-input-placeholder {
        color: #000000 !important;
    }

    #myModal :-moz-placeholder {
        color: #000000 !important;
    }

    #myModal ::-moz-placeholder {
        color: #000000 !important;
    }

    /* For the future */
    #myModal :-ms-input-placeholder {
        color: #000000 !important;
    }

    #myModal .modal-body {
        padding: 0 !important
    }

    #myModal .modal-dialog {
        width: 600px !important
    }

    #myModal .close {
        right: -19px !important;
        top: -19px !important;
        box-shadow: 0 0 15px 8px rgba(0, 0, 0, 0.35) !important
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
        margin-bottom: 5px;
    }

    .f1 {
        float: left;
        width: 47%;
        margin-left: 14px;
    }

    .f3 {
        float: right;
        width: 44%;
        margin-right: 10px;
    }

    .fi-bg-expo {
        height: 244px;
        width: 600px;
        margin: 0 auto;
        background: url("images/popup/fro-expo-pune-popup-footer.webp") no-repeat center top;
    }

    #myModal .sec .f1 .form-control,
    #myModal .sec .f3 .form-control {
        background: #fff;
        color: #000000 !important;
        border-radius: 5px !important;
        height: 40px;
        border: 1px solid #000000 !important;
        margin-top: 6px;
    }

    .fi-expotest {
        font-size: 39px;
        color: #ea1519;
        font-family: 'Open Sans Semibold';
        padding: 25px 0 8px 0;
        line-height: 39px;
        text-transform: uppercase
    }

    .fi-expotest span {
        color: #fff;
    }

    .expo-submitnew {
        padding: 8px 19px;
        background: #ed1b24;
        text-transform: uppercase;
        color: #fff;
        font-size: 14px;
        margin: 10px auto 0 0;
        border: 0;
        display: inline-block;
        border-radius: 0px;
        font-weight: bold;
    }

    .boxblk {
        padding: 1px 30px 0px 30px;
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
        padding: 0 36px;
    }

    .valtxtx span {
        color: #fff;
        font-family: 'Open Sans Bold'
    }

    .headtag {
        height: 305px;
        overflow: hidden;
        width: 600px;
        background: url("images/popup/fro-expo-pune-popup-header.webp") no-repeat center top;
        overflow: hidden;
    }

    .ftrbg {
        background: #ea1519;
        color: #fff;
        padding: 5px;
        text-align: center;
        font-family: 'Open Sans Regular';
        font-size: 16px;
        line-height: 22px;
    }
</style>

@php
$states = Config('location.stateArr');
asort($states);
@endphp


<div id="myModal" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <div class="modal-body">
                <div id="my_modal" class="model_top" style="width:600px">
                    <div class="headtag">
                    </div>
                    <div class="fi-bg-expo">
                        <div class="boxblk">
                            <form class="form registration-form bg-black-transparent align-center" action="https://www.franchiseindia.net/maharashtra/fro/register_update.php" method="post">

                                <input id="ref" name="ref" type="hidden" value="FRO-Insta-Paid">
                                <input type="hidden" value="Pune January 2026" name="event_year" id="event_year">
                                <input type="hidden" value="FRO 2026 Pune" name="event_title" id="event_title">
                                <input type="hidden" value="Pune" name="event_city" id="event_city">
                                <input id="source" name="source" type="hidden" value="Popup" />
                                <input id="tfw_interest" name="tfw_interest" type="hidden" value="Visit the Expo - LP Paid">
                                <div class="sec">
                                    <div class="f1">
                                        <input name="txtName" type="text" class="form-control myselect" placeholder="Name" required="" style="color:#ffffff;">
                                    </div>
                                    <div class="f3">
                                        <input name="txtEmail" type="email"
                                            pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                            class="form-control myselect" placeholder="Email" required="">
                                    </div>
                                </div>
                                <div class="sec">
                                    <div class="f1">
                                        <input name="txtPhone" type="tel" placeholder="Contact No."
                                            class="form-control myselect" pattern="[789][0-9]{9}" minlength="10"
                                            maxlength="10" onkeypress="return isNumber(event)" required="">
                                    </div>
                                    <div class="f3">
                                        <select name="txtState" class="form-control myselect" id="txtState"
                                            onChange="getcitypopup(this)" required="">
                                            <option value="" data-id="">Select State</option>
                                            @foreach ($states as $index => $value)
                                            <option value="{{ $value }}" data-id="{{ $index }}">
                                                {{ $value }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="sec">
                                   <div class="f1">
                                        <select name="txtCity" class="form-control myselect" id="frp_popupcity" required>
                                            <option value="">Select City</option>
                                        </select>
                                    </div>

                                    <div class="f3">
                                        <select type="text" placeholder="Select event date" id="eventdays"
                                            name="eventdays" class="form-control myselectclass3" accesskey=""
                                            onchange="checkNumbers();">
                                            <option value="Saturday31stJanuary">Saturday, 31st January</option>
                                            <option value="Sunday1stFebruary">Sunday, 1st February</option>
                                            <option value="Bothdays311February" selected>Both Days, 31st-1st February</option>
                                            <option value="PremiumPass3101February" selected>Premium Pass</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="sec" style="text-align:center">
                                    <input type="submit" value="Register To Attend" name="btnSubmitReg"
                                        class="expo-submitnew">
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
    function checkNumbers() {
        var amt = 500;
        var eventdays = $("#eventdays :selected").val();
        var visitVal = $("#txtDelegates :selected").val();
        if (eventdays == "Sunday1stFebruary") {
            amt = 500;
            $('#txtAmount').val(amt);
        } else if (eventdays == "Sunday1stFebruary") {
            amt = 500;
            $('#txtAmount').val(amt);
        } else if (eventdays == "Bothdays311February") {
            amt = 1000;
            $('#txtAmount').val(amt);
        } else {
            amt = 500;
            $('#txtAmount').val(amt);
        }
        total = visitVal * amt;
        $('#txtAmount').val(total);
    }
    if (screen.width > 767) {
        $(document).ready(function() {
            $('#myModal').modal('show');
        });
    }

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        return !(charCode > 31 && (charCode < 48 || charCode > 57));
    }

  function getcitypopup(value) {
    var stateId = $(value).find(':selected').attr('data-id');

    if (!stateId) {
        $("#frp_popupcity").html('<option value="">Select City</option>');
        return;
    }

    $.ajax({
        type: 'GET',
        url: 'https://www.franchiseindia.com/getcitylist',
        data: { state: stateId },
        success: function (data) {
            // API returns ready-made <option> HTML
            $("#frp_popupcity").html('<option value="">Select City</option>' + data);
        },
        error: function () {
            alert("City list not loaded");
        }
    });
}


</script>