
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
                font-size: 13px; min-height: 45px;
              padding: 13px 12px;
              background: #fbfbfb;
              box-shadow: inset 0 5px 5px 0 rgba(0, 0, 0, .05)!important;
              border:#ccc 1px solid !important;

}
.header-slider2 .modal-content .col-sm-12 textarea, .header-slider2 .modal-content .col-sm-12 select{height: 45px;}

.header-slider2 .modal-content .col-sm-12 select{color:555;}
.header-slider2.form-group, .header-slider.form-group{margin-bottom:13px;}

.header-slider2 .modal-content .col-sm-12{
                min-height: 600px; padding: 20px 35px;
}

.header-slider2 .modal-content .col-sm-12:nth-child {
                padding: 5px 35px 15px;
}

.header-slider2 .modal-content .col-sm-12 .btn-danger{
              color:#dc3322; 
              border-color:#dc3322; 
              font-size:18px; 
              padding:8px 25px; 
              background:transparent;}
.header-slider2 .modal-content .col-sm-12 .btn-danger:hover{
              color:#fff; 
              background-color:#dc3322s;
}

.header-slider2 .modal-content .col-sm-12 .btn-danger .fa{font-size: 14px; margin-left: 5px;}

.header-slider-tab2 .nav-tabs{border:none; margin:24px 0 50px 0;}
.header-slider-tab2 .panel-group{margin-top: 35px;}
.header-slider-tab2 .nav-tabs > li{border-radius: 0px;}
.header-slider-tab2 .nav-tabs > li > a{font-size:14px; background:#fff; color:#222; margin-right:-1px; padding:10px 31px; text-transform:uppercase; border-radius: 0px; border:#666 1px solid;}
.header-slider-tab2 .nav-tabs > li.active > a, .header-slider-tab2 .nav-tabs > li.active > a:focus, .header-slider-tab2 .nav-tabs > li.active > a:hover {border:#666 1px solid; background: #666; color: #000 !important}
	
.header-slider2 .modal-content .col-sm-12 .btn-danger.disabled.focus, .header-slider2 .modal-content .col-sm-12 .btn-danger.disabled:focus, .header-slider2 .modal-content .col-sm-12 .btn-danger.disabled:hover, .header-slider2 .modal-content .col-sm-12 .btn-danger[disabled].focus, .header-slider2 .modal-content .col-sm-12 .btn-danger[disabled]:focus, .header-slider2 .modal-content .col-sm-12 .btn-danger[disabled]:hover, .header-slider2 .modal-content .col-sm-12 fieldset[disabled] .btn-danger.focus, .header-slider2 .modal-content .col-sm-12 fieldset[disabled] .btn-danger:focus, .header-slider2 .modal-content .col-sm-12 fieldset[disabled] .btn-danger:hover{color: #000 !important;}
	
.popup-btn-mb{position:fixed; right: 50px; bottom: 80px; z-index: 9999; display:none;}
.header-slider2 .modal-content .col-sm-12 input::placeholder,
.header-slider2 .modal-content .col-sm-12 textarea::placeholder {
    color: #777 !important; /* Placeholder visible */}
		.popup-btn-mb{position:fixed; right: 50px; bottom: 80px; z-index: 9999; display:none !important;}
@media (min-width:120px) and (max-width:767px)
{
    .header-slider2 .modal-dialog{width: auto;}
	.header-slider-tab2 .nav-tabs > li{float: none; text-align: center;}
    .header-slider-tab2 .nav-tabs > li > a{font-size: 12.5px; padding: 10px 24px;}
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
  @php
                                            $stateArr = config('location.stateArr');
                                            $cityArr = config('location.cityArr');
                                        @endphp

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
<form action="{{ route('submit.enquiry') }}" method="POST" id="form2">
@csrf

<input type="hidden" name="user" value="franchisor">
<input type="hidden" id="countryCode2" name="country_code" value="+91">
<input type="hidden" id="isMobileVerified2" value="0">

<!-- NAME -->
<div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Name" required>
    <span class="error-message" data-error="name"></span>
</div>

<!-- COUNTRY -->
<div class="form-group">
    <select class="form-control" name="country" id="country2" required>
        <option value="">Select Country</option>
    </select>
    <span class="error-message" data-error="country"></span>
</div>

<!-- MOBILE -->
<div class="form-group" style="display:flex; gap:6px; position:relative;">

    <span id="mobilePrefix2"
          style="padding:10px;background:#eee;">
        +91
    </span>

    <input type="tel"
           id="mobile2"
           name="mobile"
           class="form-control"
           placeholder="Enter Mobile No"
           onkeyup="validateMobileField(2)"
           required>

    <button type="button"
            id="verifybutton2"
            onclick="verifyMobile(2)"
            class="btn btn-sm btn-primary"
            style="position:absolute; right:13px; top:9px; display:none;">
        Verify
    </button>

    <span id="verifiedTick2"
          style="position:absolute; right:20px; top:10px; color:green; display:none;">
        ✓ Verified
    </span>

</div>
<span class="error-message" data-error="mobile"></span>

<!-- OTP -->
<div class="form-group" id="otpBlock2" style="display:none;">
    <input type="text" id="otp2" maxlength="4" class="form-control" placeholder="Enter OTP">
</div>

<!-- EMAIL -->
<div class="form-group">
    <input type="email" class="form-control" name="email" placeholder="Email ID" required>
    <span class="error-message" data-error="email"></span>
</div>

<!-- BRAND -->
<div class="form-group">
    <input type="text" class="form-control" name="brand_name" placeholder="Brand Name" required>
    <span class="error-message" data-error="brand_name"></span>
</div>

<!-- MESSAGE -->
<div class="form-group">
    <textarea class="form-control" name="message" placeholder="Message" required></textarea>
    <span class="error-message" data-error="message"></span>
</div>

<!-- STATE -->
<div class="form-group">
    <select class="form-control" name="state" id="state2" required>
        <option value="">Select State</option>
    </select>
    <span class="error-message" data-error="state"></span>
</div>

<!-- CITY -->
<div class="form-group">
    <select class="form-control" name="city" id="city2" required>
        <option value="">Select City</option>
    </select>
    <span class="error-message" data-error="city"></span>
</div>

<!-- PINCODE -->
<div class="form-group">
    <input type="text" class="form-control" name="pincode" placeholder="Pincode" required>
    <span class="error-message" data-error="pincode"></span>
</div>

<!-- CAPTCHA -->
<div class="form-group">

    <div style="display:flex; gap:10px;">
        <span id="captchaImg2">{!! captcha_img() !!}</span>

        <button type="button" id="reloadCaptcha2">↻</button>
    </div>

    <input type="text" name="captcha" class="form-control" placeholder="Enter Captcha" required>
    <span class="error-message" data-error="captcha"></span>

</div>

<button type="submit" class="btn btn-danger">Submit</button>

</form>


                            </div>

                            <!-- TAB 2 FORM -->
                        <div id="tab2" role="tabpanel" class="tab-pane panel-collapse collapse">

                         
<form action="{{ route('submit.enquiry') }}" method="POST" id="form1">
@csrf

<input type="hidden" name="user" value="investor">
<input type="hidden" id="countryCode1" name="country_code" value="+91">
<input type="hidden" id="isMobileVerified1" value="0">

<!-- NAME -->
<div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Name" required>
    <span class="error-message" data-error="name"></span>
</div>

<!-- COUNTRY -->
<div class="form-group">
    <select class="form-control" name="country" id="country1" required>
        <option value="">Select Country</option>
    </select>
    <span class="error-message" data-error="country"></span>
</div>

<!-- MOBILE -->
<div class="form-group" style="display:flex; gap:6px; position:relative;">

    <span id="mobilePrefix1"
          style="padding:10px;background:#eee;border-radius:4px;">
        +91
    </span>

    <input type="tel"
           id="mobile1"
           name="mobile"
           class="form-control"
           placeholder="Enter Mobile No"
           onkeyup="validateMobileField(1)"
           required>

    <!-- VERIFY BUTTON -->
    <button type="button"
            id="verifybutton1"
            onclick="verifyMobile(1)"
            class="btn btn-sm btn-primary"
            style="position:absolute; right:13px; top:9px; display:none;">
        Verify
    </button>

    <!-- VERIFIED -->
    <span id="verifiedTick1"
          style="position:absolute; right:20px; top:10px; color:green; display:none;">
        ✓ Verified
    </span>

</div>
<span class="error-message" data-error="mobile"></span>

<!-- OTP -->
<div class="form-group" id="otpBlock1" style="display:none; position:relative;">

    <input type="text" id="otp1" maxlength="4"
           class="form-control"
           placeholder="Enter OTP">

    <button type="button"
            onclick="verifyOtp(1)"
            class="btn btn-sm btn-success"
            style="position:absolute; right:13px; top:9px;">
        Verify OTP
    </button>

    <span id="otpError1" style="color:red; display:none;"></span>

</div>

<!-- EMAIL -->
<div class="form-group">
    <input type="email" class="form-control" name="email" placeholder="Email ID" required>
    <span class="error-message" data-error="email"></span>
</div>

<!-- MESSAGE -->
<div class="form-group">
    <textarea class="form-control" name="message" placeholder="Message" required></textarea>
    <span class="error-message" data-error="message"></span>
</div>

<!-- STATE -->
<div class="form-group">
    <select class="form-control" name="state" id="state1" required>
        <option value="">Select State</option>
    </select>
    <span class="error-message" data-error="state"></span>
</div>

<!-- CITY -->
<div class="form-group">
    <select class="form-control" name="city" id="popupcity1" required>
        <option value="">Select City</option>
    </select>
    <span class="error-message" data-error="city"></span>
</div>

<!-- PINCODE -->
<div class="form-group">
    <input type="text"
           class="form-control"
           name="pincode"
           placeholder="Pincode"
           maxlength="10"
           required>
    <span class="error-message" data-error="pincode"></span>
</div>

<!-- CAPTCHA -->
<div class="form-group">

    <div style="display:flex; gap:10px;">
        <span id="captchaImg1">{!! captcha_img() !!}</span>

        <button type="button"
                id="reloadCaptcha1"
                class="btn btn-danger">
            ↻
        </button>
    </div>

    <input type="text"
           class="form-control"
           name="captcha"
           placeholder="Enter Captcha"
           required>

    <span class="error-message" data-error="captcha"></span>

</div>
<!-- SUBMIT -->
<div class="form-group">
    <button type="submit" id="submitBtn1" class="btn btn-danger" disabled>
        Submit
    </button>
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
 /* ================= GLOBAL DATA ================= */

let COUNTRIES = [];
let STATES = [];
let STATE_CITIES = [];

/* ================= LOAD JSON ================= */

document.addEventListener('DOMContentLoaded', () => {

    Promise.all([
        fetch('./json/countries.json').then(r => r.json()),
        fetch('./json/states.json').then(r => r.json()),
        fetch('./json/state_cities.json').then(r => r.json())
    ])
    .then(([countries, states, cities]) => {

        if (!Array.isArray(countries) || !Array.isArray(states) || !Array.isArray(cities)) {
            console.error('❌ Invalid JSON format');
            return;
        }

        COUNTRIES = countries;
        STATES = states;
        STATE_CITIES = cities;

        /* ===== INIT BOTH FORMS ===== */

        initForm(1);
        initForm(2);

    })
    .catch(err => console.error('❌ JSON load error:', err));

});


/* ================= INIT FORM ================= */

function initForm(formId){

    populateCountries(formId);

    /* Attach Listeners FIRST */
    document.getElementById('country'+formId)
        ?.addEventListener('change', () => handleCountry(formId));

    document.getElementById('state'+formId)
        ?.addEventListener('change', () => handleState(formId));

    /* THEN Set Default */
    setDefaultCountry(formId, 'India');

    /* 🔥 Force Load States */
    handleCountry(formId);
}


/* ================= POPULATE COUNTRIES ================= */

function populateCountries(formId){

    let dropdown = document.getElementById('country'+formId);

    if(!dropdown) return;

    dropdown.innerHTML = '<option value="">Select Country</option>';

    COUNTRIES.forEach(country => {

        let option = document.createElement('option');
        option.value = country.name;
        option.textContent = country.name;

        dropdown.appendChild(option);
    });
}


/* ================= SET DEFAULT COUNTRY ================= */

function setDefaultCountry(formId, countryName){

    let dropdown = document.getElementById('country'+formId);

    if(!dropdown) return;

    dropdown.value = countryName;

    dropdown.dispatchEvent(new Event('change'));
}


/* ================= HANDLE COUNTRY CHANGE ================= */

function handleCountry(formId){

    let countryName = document.getElementById('country'+formId)?.value;

    let stateDropdown = document.getElementById('state'+formId);
    let cityDropdown =
        document.getElementById('popupcity'+formId) ||
        document.getElementById('city'+formId);

    if(stateDropdown) stateDropdown.innerHTML = '<option value="">Select State</option>';
    if(cityDropdown) cityDropdown.innerHTML = '<option value="">Select City</option>';

    /* ===== SET MOBILE PREFIX ===== */

    let country = COUNTRIES.find(c => c.name === countryName);

    if(country){

        let dialCode = '+' + country.phonecode;

        let codeInput = document.getElementById('countryCode'+formId);
        let prefixSpan = document.getElementById('mobilePrefix'+formId);

        if(codeInput) codeInput.value = dialCode;
        if(prefixSpan) prefixSpan.innerText = dialCode;

        resetMobileVerification(formId);
    }

    /* ===== LOAD STATES ===== */

  
if(stateDropdown){

    STATES
        .filter(s => s.country_name === countryName)
        .forEach(state => {

            let option = document.createElement('option');
            option.value = state.name;
            option.textContent = state.name;

            stateDropdown.appendChild(option);
        });

    /* ✅ Add Static Others Option */
    let othersOption = document.createElement('option');
    othersOption.value = 'Others';
    othersOption.textContent = 'Others';

    stateDropdown.appendChild(othersOption);
}
}


/* ================= HANDLE STATE CHANGE ================= */
function handleState(formId){

    let stateName = document.getElementById('state'+formId)?.value;

    let cityDropdown =
        document.getElementById('popupcity'+formId) ||
        document.getElementById('city'+formId);

    if(!cityDropdown) return;

    cityDropdown.innerHTML = '<option value="">Select City</option>';

    /* ✅ Find State Object */
    let selectedState = STATE_CITIES.find(
        s => s.name === stateName
    );

    /* ✅ Load Cities */
    if(selectedState && selectedState.cities){

        selectedState.cities.forEach(city => {

            let option = document.createElement('option');
            option.value = city.name;
            option.textContent = city.name;

            cityDropdown.appendChild(option);
        });
    }

    /* Others Option */
    let othersOption = document.createElement('option');
    othersOption.value = 'Others';
    othersOption.textContent = 'Others';

    cityDropdown.appendChild(othersOption);
}


/* ================= RESET MOBILE VERIFICATION ================= */

function resetMobileVerification(formId){

    let mobile = document.getElementById('mobile'+formId);
    let tick = document.getElementById('verifiedTick'+formId);
    let verifyBtn = document.getElementById('verifybutton'+formId);
    let verifiedFlag = document.getElementById('isMobileVerified'+formId);

    if(mobile) mobile.value = '';
    if(tick) tick.style.display = 'none';
    if(verifyBtn) verifyBtn.style.display = 'none';
    if(verifiedFlag) verifiedFlag.value = 0;
}


/* ================= CAPTCHA RELOAD (FORM 2) ================= */

document.getElementById('reloadCaptcha2')?.addEventListener('click', () => {

    fetch('/reload-captcha')
        .then(r => r.json())
        .then(data => {

            let captchaBox = document.getElementById('captchaImg2');

            if(captchaBox) captchaBox.innerHTML = data.captcha;
        });

});

document.getElementById('reloadCaptcha1')?.addEventListener('click', () => {

    fetch('/reload-captcha')
        .then(r => r.json())
        .then(data => {

            let captchaBox = document.getElementById('captchaImg1');

            if(captchaBox) captchaBox.innerHTML = data.captcha;
        });

});


</script>

    {{-- <script src="https://code.jquery.com/jquery-2.4.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>

// =======================================================
// UNIVERSAL OTP VERIFICATION SYSTEM (Reusable for all forms)
// =======================================================

// Validate mobile number format
// function validateMobileField(formId) {
//     let mobile = $(`#mobile${formId}`).val().trim();
//     if (mobile.length === 10 && $.isNumeric(mobile)) {
//         $(`#verifybutton${formId}`).show();
//     } else {
//         $(`#verifybutton${formId}`).hide();
//     }
// }

function validateMobileField(formId) {
// console.log(formId);
    let mobile = $(`#mobile${formId}`).val().trim();
    let countryCode = $(`#countryCode${formId}`).val(); // +91, +1, etc.
console.log(countryCode);
    // India (+91): strictly 10 digits
    if (countryCode === '+91') {
        if (mobile.length === 10 && $.isNumeric(mobile)) {
            $(`#verifybutton${formId}`).show();
        } else {
            $(`#verifybutton${formId}`).hide();
        }
    }
    // Other countries: relaxed validation
    else {
        if (mobile.length >= 6 && $.isNumeric(mobile)) {
            $(`#verifybutton${formId}`).show();
        } else {
            $(`#verifybutton${formId}`).hide();
        }
    }
}

// Start OTP process
function verifyMobile(formId) {

    const mobile = $(`#mobile${formId}`).val().trim();
    const countryCode = $(`#countryCode${formId}`).val(); // NEW
    console.log('Country Code:', countryCode);

    //  NON-INDIA → AUTO VERIFY
    if (countryCode !== '+91') {

        if (mobile === '' || !$.isNumeric(mobile)) {
            alert('Please enter a valid mobile number.');
            return;
        }

        $('#otpBlock' + formId).hide();
        $('#verifybutton' + formId).hide();
        $('#editmobile' + formId).hide();

        $('#mobile' + formId).prop('readonly', true);
        $('#verifiedTick' + formId).show();
        $('#isMobileVerified' + formId).val("1");

        toggleSubmitButton(formId);
        return;
    }

    // 🇮🇳 INDIA → STRICT 10-DIGIT VALIDATION
    if (mobile === '' || mobile.length !== 10 || !$.isNumeric(mobile)) {
        alert('Please enter a valid 10-digit mobile number.');
        return;
    }

    // 🇮🇳 INDIA → EXISTING OTP FLOW
    $.ajax({
        type: 'GET',
        url: '/verify',
        data: { mobile },
        success: function (response) {

            // CASE 1: Number already exists → verified
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

            // CASE 2: New number → OTP
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
                // alert(res.message);
                window.location.href = res.redirect;

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