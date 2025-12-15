
<style>
    .mmb {
    background: #e60023;
    color: #fff;
    font-size: 16px;
    padding: 12px 25px;
    border-radius: 8px;
    font-weight: bold;
    border: none;
    animation: heartbeat 1.2s infinite;
}

@keyframes heartbeat {
    0% {
        transform: scale(1);
        box-shadow: 0 0 0 rgba(230, 0, 35, 0.4);
    }
    50% {
        transform: scale(1.08);
        box-shadow: 0 0 12px rgba(230, 0, 35, 0.8);
    }
    100% {
        transform: scale(1);
        box-shadow: 0 0 0 rgba(230, 0, 35, 0.4);
    }
}


        .popup-btn-head {
                border: none;
                background: #911922;
                color: #fff;
                text-transform: uppercase; font-size: 12px;
                padding: 5px 20px;
                border-radius: 25px;
                margin-right: 10px;
    border:#fce9f1 1px solid;
}
.popup-btn-head:hover {
                background: #fff;
                color: #ed1c24;
                border:#ed1c24 1px solid;
}

.modal-backdrop{z-index: 0 !important;}
.search span {
    margin-left: 2px !important;;
}
.header-slider2 .modal-body {
                padding: 0px;
}

.header-slider2 .modal-dialog{margin: 10% auto; width: 460px;}


.header-slider2 button.close {
                background: #fff !important;
                padding: 6px 10px;
                position: absolute;
                right: -8px;
                top: -15px;
}

.header-slider2 .close{
                text-shadow: none;
                opacity: 1;
                color: #000;
}

.header-slider2 .modal-content{
                border-radius: 0px;
                box-shadow: none;
}

.header-slider2 .modal-content .col-sm-12{
                text-align: left;
}

.header-slider2 .modal-content .col-sm-12 h3{
                font-size: 18px;
                font-weight: 500;
                color: #303133;
                margin-bottom: 25px;
}

.header-slider2 .modal-content .col-sm-12 .form-control{
                border:none; box-shadow: 1px 11px 10px #eee !important;
                letter-spacing:0.2px; color: #666 !important;
                font-size:13px;
                border-radius: 0px;
                min-height: 45px;
}

.header-slider2 .modal-content .col-sm-12 select{color:555;}
.header-slider2.form-group, .header-slider.form-group{margin-bottom:13px;}

.header-slider2 .modal-content .col-sm-12{
                min-height: 600px; padding: 20px 35px;
}

.header-slider2 .modal-content .col-sm-12:nth-child {
                padding: 5px 35px 15px;
}

.header-slider2 .modal-content .col-sm-12 .btn-danger{
                border: none;
                background: #ed1c24;
                color: #fff;
                text-transform: uppercase;
                padding: 10px 30px;
                border-radius: 25px;
                margin-top: 30px;
}

.header-slider2 .modal-content .col-sm-12 .btn-danger .fa{font-size: 14px; margin-left: 5px;}

.header-slider-tab2 .nav-tabs{border:none; margin:24px 0 50px 0;}
.header-slider-tab2 .panel-group{margin-top: 35px;}
.header-slider-tab2 .nav-tabs > li{border-radius: 0px;}
.header-slider-tab2 .nav-tabs > li > a{font-size:14px; background:#fff; color:#222; margin-right:0px; padding:10px 31px; text-transform:uppercase; border-radius: 0px; border:#666 1px solid;}
.header-slider-tab2 .nav-tabs > li.active > a, .header-slider-tab2 .nav-tabs > li.active > a:focus, .header-slider-tab2 .nav-tabs > li.active > a:hover {border:#666 1px solid; background: #666; color: #fff !important}
.popup-btn-mb{position:fixed; right: 50px; bottom: 80px; z-index: 9999; display:none;}
.header-slider2 .modal-content .col-sm-12 input::placeholder,
.header-slider2 .modal-content .col-sm-12 textarea::placeholder {
    color: #777 !important; /* Placeholder visible */}
		.popup-btn-mb{position:fixed; right: 50px; bottom: 80px; z-index: 9999; display:none !important;}
@media (min-width:120px) and (max-width:767px)
{
    .header-slider2 .modal-dialog{width: auto;}
    .header-slider-tab2 .nav-tabs > li > a{font-size: 12.5px; padding: 10px 18px;}
    .header-slider-tab2 .nav-tabs > li.active > a, .header-slider-tab2 .nav-tabs > li.active > a:focus, .header-slider-tab2 .nav-tabs > li.active > a:hover{padding: 10px 8px;}
    .header-slider2 .modal-dialog{margin: 35% auto; width: 90%;}
    .popup-btn-head{display: none;}
    .header-slider2 button.close{right: -12px; top: -13px;}
    .popup-btn-mb{position:fixed; right: -24px; bottom: 40px; z-index: 9999; display:block !important;}
}  

.box1{
    margin-top:70px;
        margin-right: -11px;
    margin-left: 11px;


}



</style>
</head>
<div class="modal fade header-slider2 box1" id="Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-sm-12">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="responsive-tabs header-slider-tab2">

                        <!-- TABS -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Expand My Brand</a>
                            </li>
                            <li role="presentation">
                                <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Buy a Franchise</a>
                            </li>
                        </ul>

                        <div id="tabs-content" class="tab-content panel-group">

                            <!-- TAB 1 FORM -->
                            <div id="tab1" role="tabpanel" class="tab-pane active panel-collapse collapse in">

                                <form action="{{ route('submit.enquiry') }}" method="POST" id="form1">
                                    @csrf

                                    <input type="hidden" name="user" value="franchisor">

                                                                    <!-- NAME -->
                                   <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required>
                                     
                                    </div>


                                    <!-- MOBILE + VERIFY BUTTONS -->
                                    <div class="form-group" style="position: relative;">

                                        <input type="tel" id="mobile1" name="mobile" maxlength="10"
                                            class="form-control" placeholder="Enter Mobile No"
                                            onkeyup="validateMobileField(1)" required>


                                        <!-- VERIFY BUTTON -->
                                        <button type="button" id="verifybutton1"
                                                onclick="verifyMobile(1)"
                                                class="btn btn-sm btn-primary"
                                                style="position:absolute; right:90px; top:6px; display:none;">
                                            Verify
                                        </button>

                                        <!-- EDIT BUTTON -->
                                        <button type="button" id="editmobile1"
                                                onclick="editMobile(1)"
                                                class="btn btn-sm btn-warning"
                                                style="position:absolute; right:90px; top:6px; display:none;">
                                            Edit
                                        </button>

                                        <!-- VERIFIED TICK -->
                                        <span id="verifiedTick1"
                                            style="position:absolute; right:20px; top:10px; color:green; font-size:16px; display:none;">
                                            ✓ Verified
                                        </span>

                                       

                                    </div>

                                    <!-- OTP BLOCK -->
                                    <div class="form-group" id="otpBlock1" style="display:none; position: relative;">

                                        <input type="text" id="otp1" maxlength="4"
                                            class="form-control" placeholder="Enter OTP">

                                        <button type="button" onclick="verifyOtp(1)"
                                                class="btn btn-sm btn-success"
                                                style="position:absolute; right:20px; top:6px;">
                                            Verify OTP
                                        </button>

                                        <span id="otpError1" style="color:red; display:none; margin-top:8px; font-size:13px;">
                                            <!-- Error message injected by JS -->
                                        </span>

                                    </div>

                                    <input type="hidden" id="isMobileVerified1" value="0">

                                    <!-- EMAIL -->
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email ID" required>
                                        
                                    </div>

                                    <!-- MESSAGE -->
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" placeholder="Message" required></textarea>
                                         
                                    </div>



                                    <div class="form-group">
                                        @php
                                            $stateArr = config('location.stateArr');
                                            $cityArr = config('location.cityArr');
                                        @endphp
                                       <select class="form-control" name="state" onchange="getcitypopup(this)">
                                            <option value="">Select State</option>
                                            @foreach($stateArr as $id => $state)
                                                <option value="{{ $id }}" data-id="{{ $id }}">{{ $state }}</option>
                                            @endforeach
                                        </select>
                                       
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" id="popupcity" name="city">
                                            <option value="">Select City</option>
                                        </select>
                                      
                                    </div>

                                    <div class="form-group">
                                    <button type="submit" id="submitBtn1" class="btn btn-danger" disabled> Submit</button>
                                    </div>
                                </form>

                            </div>

                            <!-- TAB 2 FORM -->
                        <div id="tab2" role="tabpanel" class="tab-pane panel-collapse collapse">

                            <form action="{{ route('submit.enquiry2') }}" method="POST" id="form2">
                                @csrf

                                <input type="hidden" name="user" value="investor">

                                <!-- NAME -->
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name2" placeholder="Name" required>
                                </div>

                                <!-- MOBILE + OTP -->
                                <div class="form-group" style="position: relative;">

                                    <input type="tel" id="mobile2" name="mobile" maxlength="10"
                                        class="form-control" placeholder="Enter Mobile No"
                                        onkeyup="validateMobileField(2)" required>

                                    <!-- VERIFY BUTTON -->
                                    <button type="button" id="verifybutton2"
                                            onclick="verifyMobile(2)"
                                            class="btn btn-sm btn-primary"
                                            style="position:absolute; right:90px; top:6px; display:none;">
                                        Verify
                                    </button>

                                    <!-- EDIT BUTTON -->
                                    <button type="button" id="editmobile2"
                                            onclick="editMobile(2)"
                                            class="btn btn-sm btn-warning"
                                            style="position:absolute; right:90px; top:6px; display:none;">
                                        Edit
                                    </button>

                                    <!-- VERIFIED TICK -->
                                    <span id="verifiedTick2"
                                        style="position:absolute; right:20px; top:10px; color:green; font-size:16px; display:none;">
                                        ✓ Verified
                                    </span>

                                </div>

                                <!-- OTP BLOCK -->
                                <div class="form-group" id="otpBlock2" style="display:none; position:relative;">

                                    <input type="text" id="otp2" maxlength="4" class="form-control" placeholder="Enter OTP">

                                    <button type="button" onclick="verifyOtp(2)"
                                            class="btn btn-sm btn-success"
                                            style="position:absolute; right:20px; top:6px;">
                                        Verify OTP
                                    </button>

                                    <span id="otpError2" style="color:red; display:none; margin-top:8px; font-size:13px;"></span>

                                </div>

                                <!-- HIDDEN VERIFIED FLAG -->
                                <input type="hidden" id="isMobileVerified2" value="0">

                                <!-- EMAIL -->
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email2" placeholder="Email ID" required>
                                </div>

                                <!-- BRAND NAME -->
                                <div class="form-group">
                                    <input type="text" class="form-control" name="brand_name" id="brand2" placeholder="Brand Name" required>
                                </div>

                                <!-- MESSAGE -->
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message2" placeholder="Message" required></textarea>
                                </div>

                                <!-- STATE -->
                                <div class="form-group">
                                    <select class="form-control" name="state" id="state2" onchange="getcitypopup2(this)" required>
                                        <option value="">Select State</option>
                                        @foreach($stateArr as $id => $state)
                                              <option value="{{ $id }}" data-id="{{ $id }}">{{ $state }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- CITY -->
                                <div class="form-group">
                                    <select class="form-control" id="popupcity2" name="city" required>
                                        <option value="">Select City</option>
                                    </select>
                                </div>

                                <!-- SUBMIT -->
                                <div class="form-group">
                                    <button type="submit" id="submitBtn2" class="btn btn-danger" disabled>Submit</button>

                                </div>

                            </form>

                        </div>


                        </div>

                    </div>
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
    </div>
</div>

<body>
<button class="btn popup-btn-head popup-btn-mb mmb" data-toggle="modal" data-target="#Modal">
    ENQUIRE NOW
</button>

</body>

<script>
    let cityData = @json($cityArr);

    function getcitypopup(value) {
        let stateId = $(value).find(':selected').attr('data-id');
        let cityDropdown = $("#popupcity");

        cityDropdown.html('<option value="">Select City</option>');

        // Load from local array instead of API
        if (stateId && cityData[stateId]) {
            cityData[stateId].forEach(function(city) {
                cityDropdown.append('<option value="'+city+'">'+city+'</option>');
            });
        }
    }

     function getcitypopup2(value) {
        let stateId = $(value).find(':selected').attr('data-id');
        let cityDropdown = $("#popupcity2");

        cityDropdown.html('<option value="">Select City</option>');

        // Load from local array instead of API
        if (stateId && cityData[stateId]) {
            cityData[stateId].forEach(function(city) {
                cityDropdown.append('<option value="'+city+'">'+city+'</option>');
            });
        }
    }
</script>

    {{-- <script src="https://code.jquery.com/jquery-2.4.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>

// =======================================================
// UNIVERSAL OTP VERIFICATION SYSTEM (Reusable for all forms)
// =======================================================

// Validate mobile number format
function validateMobileField(formId) {
    let mobile = $(`#mobile${formId}`).val().trim();
    if (mobile.length === 10 && $.isNumeric(mobile)) {
        $(`#verifybutton${formId}`).show();
    } else {
        $(`#verifybutton${formId}`).hide();
    }
}

// Start OTP process
function verifyMobile(formId) {
    const mobile = $(`#mobile${formId}`).val().trim();

    if (mobile === '' || mobile.length !== 10 || !$.isNumeric(mobile)) {
        alert('Please enter a valid 10-digit mobile number.');
        return;
    }

    $.ajax({
        type: 'GET',
        url: '/verify',
        data: { mobile },
        success: function (response) {

            // CASE 1: Number exists -> treat as verified
            if (response === 'numexists' || response === 'numExists') {

                $(`#mobile${formId}`).css("border", "");
                $('#otpBlock' + formId).hide();
                $('#verifybutton' + formId).hide();
                $('#editmobile' + formId).hide();

                $('#mobile' + formId).prop('readonly', true);
                $('#verifiedTick' + formId).show();

                $('#isMobileVerified' + formId).val("1");

                toggleSubmitButton(formId);
                return;
            }

            // CASE 2: New number -> show OTP box
            $('#otpBlock' + formId).show();
            $('#verifybutton' + formId).hide();
            $('#editmobile' + formId).show();
            $('#mobile' + formId).prop('readonly', true);
        },
        error: function () {
            alert('Something went wrong during mobile verification.');
        }
    });
}

// Edit mobile number
function editMobile(formId) {
    $(`#otpBlock${formId}`).hide();
    $(`#verifybutton${formId}`).show();
    $(`#editmobile${formId}`).hide();
    $(`#verifiedTick${formId}`).hide();

    $(`#mobile${formId}`).prop("readonly", false);
    $(`#otp${formId}`).val("");
    $(`#otpError${formId}`).hide();

    $(`#isMobileVerified${formId}`).val("0");
    toggleSubmitButton(formId);
}

// Verify OTP
function verifyOtp(formId) {
    const otp = $(`#otp${formId}`).val().trim();
    const mobile = $(`#mobile${formId}`).val().trim();

    if (otp === '' || otp.length !== 4 || !$.isNumeric(otp)) {
        $(`#otpError${formId}`).text("Please enter a valid 4-digit OTP").show();
        return;
    }

    $.ajax({
        type: "GET",
        url: "/check",
        data: { otpNo: otp, mobileNo: mobile },
        success: function (response) {

            if (response.toLowerCase() === "notexists") {
                $(`#otpError${formId}`).text("Invalid OTP. Please try again.").show();
            } else {
                $(`#otpError${formId}`).hide();
                $(`#otpBlock${formId}`).hide();
                $(`#verifiedTick${formId}`).show();
                $(`#editmobile${formId}`).hide();

                $('#isMobileVerified' + formId).val("1");

                toggleSubmitButton(formId);
            }
        },
        error: function () {
            $(`#otpError${formId}`).text("Something went wrong. Please try again.").show();
        }
    });
}

// Enable submit when verified + filled
function toggleSubmitButton(formId) {

    let allFilled = true;

    $(`#form${formId} [required]`).each(function () {
        if ($(this).val().trim() === "") {
            allFilled = false;
        }
    });

    let isVerified = $(`#isMobileVerified${formId}`).val() === "1";

    if (allFilled && isVerified) {
        $(`#submitBtn${formId}`).prop("disabled", false);
    } else {
        $(`#submitBtn${formId}`).prop("disabled", true);
    }
}


$(document).on("input", "input, textarea, select", function () {
    toggleSubmitButton(1);
    toggleSubmitButton(2);
});

// =======================================================
// AJAX FORM SUBMISSION (NO PAGE REFRESH / NO MODAL CLOSE)
// =======================================================

$(document).on("submit", "#form1, #form2", function (e) {
    e.preventDefault(); // stop Laravel redirect
//  console.log("AJAX fired for", this.id); 
    let form = $(this);
    let formId = form.attr("id") === "form1" ? 1 : 2;

    let submitBtn = form.find("button[type=submit]");
    submitBtn.prop("disabled", true);

    // Remove old errors
    form.find(".error-text").remove();

    $.ajax({
        url: form.attr("action"),
        method: "POST",
        data: form.serialize(),
        success: function (res) {
            if (res.status === "success") {
                alert(res.message);

                form[0].reset();
                resetOtpUI(formId);

                $('#Modal').modal('hide');
            }
        },
        error: function (xhr) {
            submitBtn.prop("disabled", false);

            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;

                $.each(errors, function (field, msg) {
                    let input = form.find(`[name="${field}"]`);
                    input.after(`<span class="error-text" style="color:red;font-size:12px;">${msg[0]}</span>`);
                });
            }
        }
    });
});

// Reset OTP section after successful submit
function resetOtpUI(formId) {
    $(`#mobile${formId}`).prop("readonly", false);
    $(`#verifybutton${formId}`).show();
    $(`#editmobile${formId}`).hide();
    $(`#verifiedTick${formId}`).hide();
    $(`#otpBlock${formId}`).hide();
    $(`#otp${formId}`).val('');

    $(`#isMobileVerified${formId}`).val("0");
    toggleSubmitButton(formId);
}

</script>


</html>