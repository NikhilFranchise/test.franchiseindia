  <style>

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
	.ppm{padding-left:15px!important; padding-right:15px!important;}

.modal-backdrop{z-index: 0 !important;}
.search span {
    margin-left: 2px !important;;
}
.header-slider2 .modal-body {
                padding: 0px;
}

.header-slider2 .modal-dialog{margin: 10% auto; }


.header-slider2 button.close {
                background: #fff !important;
                padding: 6px 10px;
                position: absolute;
                right: -44px;
                top: -130px; border-radius: 25px;
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
.header-slider2 .modal-content .col-sm-12 textarea{height: 45px;}

.header-slider2 .modal-content .col-sm-12 select{color:555;}
.header-slider2.form-group, .header-slider.form-group{margin-bottom:13px;}

.header-slider2 .modal-content .col-sm-12{
                 padding: 20px 35px;
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
.header-slider2 .modal-content .col-sm-12 .col-sm-12{padding: 0 15px;}

.header-slider2 .modal-content .col-sm-12 .btn-danger .fa{font-size: 14px; margin-left: 5px;}

.header-slider-tab2 .nav-tabs{border:none; margin:24px 0 50px 15px;}
.header-slider-tab2 .panel-group{margin-top: 35px;}
.header-slider-tab2 .nav-tabs > li{border-radius: 0px; width:48.5%; text-align: center;}
.header-slider-tab2 .nav-tabs > li > a{font-size:14px; background:#fff; color:#222; margin-right:-1px; padding:10px 50px; text-transform:uppercase; border-radius: 0px; border:#666 1px solid;}
.header-slider-tab2 .nav-tabs > li.active > a, .header-slider-tab2 .nav-tabs > li.active > a:focus, .header-slider-tab2 .nav-tabs > li.active > a:hover {border:#666 1px solid; background: #666; color: #fff !important}
.header-slider2 .modal-content .col-sm-12 .btn-danger.disabled.focus, .header-slider2 .modal-content .col-sm-12 .btn-danger.disabled:focus, .header-slider2 .modal-content .col-sm-12 .btn-danger.disabled:hover, .header-slider2 .modal-content .col-sm-12 .btn-danger[disabled].focus, .header-slider2 .modal-content .col-sm-12 .btn-danger[disabled]:focus, .header-slider2 .modal-content .col-sm-12 .btn-danger[disabled]:hover, .header-slider2 .modal-content .col-sm-12 fieldset[disabled] .btn-danger.focus, .header-slider2 .modal-content .col-sm-12 fieldset[disabled] .btn-danger:focus, .header-slider2 .modal-content .col-sm-12 fieldset[disabled] .btn-danger:hover{color: #000 !important;}
.popup-btn-mb{position:fixed; right: 50px; bottom: 80px; z-index: 9999; display:none;}
.header-slider2 .modal-content .col-sm-12 input::placeholder,
.header-slider2 .modal-content .col-sm-12 textarea::placeholder {
    color: #777 !important; /* Placeholder visible */}
		.popup-btn-mb{position:fixed; right: 50px; bottom: 80px; z-index: 9999; display:none !important;}
.modal, .popup, .enquire-popup { z-index: 9999 !important;}			
.modal-backdrop, .popup-backdrop {z-index: 9998 !important; background: rgba(0,0,0,0.6) !important;}		
body.modal-open {overflow: hidden !important;}			
body.modal-open *:not(.modal):not(.modal *) {pointer-events: none;}
			
.modal, .modal * {
    pointer-events: auto;
}
@media (min-width:120px) and (max-width:767px)
{
    .header-slider2 .modal-dialog{width: auto;}
    .header-slider-tab2 .nav-tabs > li{float: none;}
    .header-slider-tab2 .nav-tabs > li > a{font-size: 12.5px; padding: 10px 18px;}
    .header-slider-tab2 .nav-tabs > li.active > a, .header-slider-tab2 .nav-tabs > li.active > a:focus, .header-slider-tab2 .nav-tabs > li.active > a:hover{padding: 10px 8px;}
    .header-slider2 .modal-dialog{margin: 35% auto 0 15px; width: 83%;}
    .popup-btn-head{display: none;}
    .header-slider2 button.close{right: -35px; top: -148px;}
    .popup-btn-mb{position:fixed; right: -24px; bottom: 40px; z-index: 9999; display:block !important;}
	.header-slider2 .modal-content .col-sm-12{padding: 20px 20px;}
}  


</style>
</head>
                                    @php
                                            $stateArr = config('location.stateArr');
                                            $cityArr = config('location.cityArr');
                                        @endphp


<div class="modal fade header-slider2" id="desktop_modal_homepage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-sm-12">
                    <div class="responsive-tabs header-slider-tab2">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Expand My Brand</a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Buy a Franchise</a>
                            </li>
                        </ul>
                        <div id="tabs-content" class="tab-content panel-group">
                           <div id="tab1" role="tabpanel" class="tab-pane active panel-collapse collapse in" aria-labelledby="heading1">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
 <form id="form2" action="/submit-enquiry" method="POST">
    @csrf

    <input type="hidden" name="user" value="franchisor">
    <input type="hidden" id="isMobileVerified2" value="0">

    <!-- Name -->
    <div class="col-sm-6">
        <div class="form-group">
            <input type="text" name="name" class="form-control"
                   placeholder="Name" required>
        </div>
    </div>

    <!-- Country -->
    <div class="col-sm-6">
        <div class="form-group">
            <select id="country2" name="country" class="form-control" required>
                <option value="">Select Country</option>
            </select>
        </div>
    </div>

    <!-- Mobile -->
    <div class="col-sm-6">
        <div class="form-group" style="position:relative;display:flex;gap:5px;">

            <select id="countryCode2"
                    name="country_code"
                    class="form-control"
                    style="max-width:90px;"
                    onchange="validateMobileField(2)">
                <option value="+91">+91</option>
            </select>

            <input type="tel"
                   id="mobile2"
                   name="mobile"
                   maxlength="15"
                   class="form-control"
                   placeholder="Mobile No"
                   onkeyup="validateMobileField(2)"
                   required>

            <button type="button"
                    id="verifybutton2"
                    onclick="verifyMobile(2)"
                    class="btn btn-xs btn-primary"
                    style="position:absolute; right:4px; top:13px;
                           background:#dc3322; border:#dc3322; display:none;">
                Verify
            </button>

            <span id="verifiedTick2"
                  style="position:absolute; right:20px; top:10px;
                         color:green; display:none;">✓</span>
        </div>
    </div>

    <!-- OTP -->
    <div class="col-sm-6" id="otpBlock2" style="display:none;">
        <div class="form-group" style="position:relative;">
            <input type="text"
                   id="otp2"
                   class="form-control"
                   placeholder="Enter OTP"
                   maxlength="4">

            <button type="button"
                    onclick="verifyOtp(2)"
                    class="btn btn-xs btn-success"
                    style="position:absolute; right:14px; top:12px;
                           background:#dc3322; border:#dc3322;">
                Verify OTP
            </button>

            <span id="otpError2"
                  style="color:red;font-size:12px;display:none;"></span>
        </div>
    </div>

    <!-- Email -->
    <div class="col-sm-6">
        <div class="form-group">
            <input type="email" name="email"
                   class="form-control"
                   placeholder="Email ID" required>
        </div>
    </div>

    <!-- State -->
    <div class="col-sm-6">
        <div class="form-group">
            <select id="state2" name="state"
                    class="form-control" required>
                <option value="">Select State</option>
            </select>
        </div>
    </div>

    <!-- City -->
    <div class="col-sm-6">
        <div class="form-group">
            <select id="city2" name="city"
                    class="form-control" required>
                <option value="">Select City</option>
            </select>
        </div>
    </div>

    <!-- Pincode -->
    <div class="col-sm-6">
        <div class="form-group">
            <input type="text" name="pincode"
                   class="form-control"
                   placeholder="Pincode / Zip Code"
                   maxlength="10" required>
        </div>
    </div>

    <!-- Brand -->
    <div class="col-sm-6">
        <div class="form-group">
            <input type="text" name="brand_name"
                   class="form-control"
                   placeholder="Brand Name" required>
        </div>
    </div>

    <!-- Message -->
    <div class="col-sm-12">
        <div class="form-group">
            <textarea name="message"
                      class="form-control"
                      placeholder="Message" required></textarea>
        </div>
    </div>
      <div class="col-sm-6">
                                       <div class="captcha">
                                            <span>{!! captcha_img() !!}</span>
                                            <button type="button" class="btn btn-danger" class="reload" id="reload">
                                                &#x21bb;
                                            </button>
                                        </div>

                                       
                                      

     </div>
      <div class="col-sm-6">
        <div class="form-group">
             <input id="captcha" type="text" class="form-control"
                                            placeholder="Enter Captcha" name="captcha">
        </div>
    </div>
                                            <span id="captcha-error" class="error-message"></span>

    <!-- Submit -->
    <div class="col-sm-6">
        <div class="form-group">
            <button type="submit"
                    class="btn btn-danger">
                Submit
            </button>
        </div>
    </div>

    <div class="clearfix"></div>
</form>

  
</div>


                        <div id="tab2" role="tabpanel" class="tab-pane panel-collapse collapse" aria-labelledby="heading2">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
 <form id="form1" action="/submit-enquiry" method="POST">
    @csrf
    <input type="hidden" name="user" value="investor">
    <input type="hidden" id="isMobileVerified1" value="0">

    <!-- Name -->
    <div class="col-sm-6">
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Name" required>
        </div>
    </div>

    <!-- Country -->
    <div class="col-sm-6">
        <div class="form-group">
            <select id="country1" class="form-control" name="country" required>
                <option value="">Select Country</option>
            </select>
        </div>
    </div>

    <!-- Mobile -->
    <div class="col-sm-6">
        <div class="form-group" style="position:relative;display:flex;gap:5px;">

            <select id="countryCode1"
                    class="form-control"
                    name="country_code"
                    style="max-width:90px;"
                    onchange="validateMobileField(1)">
                <option value="+91">+91</option>
            </select>

            <input type="tel"
                   id="mobile1"
                   name="mobile"
                   maxlength="15"
                   class="form-control"
                   placeholder="Mobile No"
                   onkeyup="validateMobileField(1)"
                   required>

            <button type="button"
                    id="verifybutton1"
                    onclick="verifyMobile(1)"
                    class="btn btn-xs btn-primary"
                    style="position:absolute; right:4px; top:13px;
                           background:#dc3322; border:#dc3322; display:none;">
                Verify
            </button>

            <span id="verifiedTick1"
                  style="position:absolute; right:20px; top:10px;
                         color:green; display:none;">✓</span>
        </div>
    </div>

    <!-- OTP -->
    <div class="col-sm-6" id="otpBlock1" style="display:none;">
        <div class="form-group" style="position:relative;">
            <input type="text" id="otp1" class="form-control"
                   placeholder="Enter OTP" maxlength="4">

            <button type="button"
                    onclick="verifyOtp(1)"
                    class="btn btn-xs btn-success"
                    style="position:absolute; right:14px; top:12px;
                           background:#dc3322; border:#dc3322;">
                Verify OTP
            </button>

            <span id="otpError1" style="color:red;font-size:12px;display:none;"></span>
        </div>
    </div>

    <!-- Email -->
    <div class="col-sm-6">
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email ID" required>
        </div>
    </div>

    <!-- State -->
    <div class="col-sm-6">
        <div class="form-group">
            <select id="state1" name="state" class="form-control" required>
                <option value="">Select State</option>
            </select>
        </div>
    </div>

    <!-- City -->
    <div class="col-sm-6">
        <div class="form-group">
            <select id="city1" name="city" class="form-control" required>
                <option value="">Select City</option>
            </select>
        </div>
    </div>

    <!-- Pincode -->
    <div class="col-sm-6">
        <div class="form-group">
            <input type="text" name="pincode" class="form-control"
                   placeholder="Pincode" maxlength="10" required>
        </div>
    </div>

    <!-- Message -->
    <div class="col-sm-6">
        <div class="form-group">
            <textarea name="message" class="form-control"
                      placeholder="Message" required></textarea>
        </div>
    </div>

     <div class="col-sm-6">
                                       <div class="captcha">
                                            <span>{!! captcha_img() !!}</span>
                                            <button type="button" class="btn btn-danger" class="reload" id="reload">
                                                &#x21bb;
                                            </button>
                                        </div>

                                       
                                      

     </div>
      <div class="col-sm-6">
        <div class="form-group">
             <input id="captcha" type="text" class="form-control"
                                            placeholder="Enter Captcha" name="captcha">
        </div>
    </div>
                                            <span id="captcha-error" class="error-message"></span>

    <!-- Submit -->
    <div class="col-sm-6">
        <div class="form-group">
            <button type="submit" id="submitBtn1"
                    class="btn btn-danger" disabled>
                Submit
            </button>
        </div>
    </div>

    <div class="clearfix"></div>
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

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
/* ================= FORM 1 DATA ================= */
let COUNTRIES_1 = [];
let STATES_1 = [];
let STATE_CITIES_1 = [];

document.addEventListener('DOMContentLoaded', () => {

    Promise.all([
        fetch('./json/countries.json').then(r => r.json()),
        fetch('./json/states.json').then(r => r.json()),
        fetch('./json/state_cities.json').then(r => r.json())
    ])
    .then(([countries, states, cities]) => {

        if (!Array.isArray(countries) || !Array.isArray(states) || !Array.isArray(cities)) {
            console.error('❌ Invalid JSON format for Form 1');
            return;
        }

        COUNTRIES_1 = countries;
        STATES_1 = states;
        STATE_CITIES_1 = cities;

        populateCountries1();
        setDefaultCountry1('India');
    })
    .catch(err => console.error('❌ Form1 load error:', err));

    document.getElementById('country1')?.addEventListener('change', handleCountry1);
    document.getElementById('state1')?.addEventListener('change', handleState1);
});

/* ================= COUNTRY ================= */

function populateCountries1() {
    const select = document.getElementById('country1');
    select.innerHTML = '<option value="">Select Country</option>';

    COUNTRIES_1.forEach(c => {
        if (!c.name) return;

        const opt = document.createElement('option');
        opt.value = c.name;
        opt.textContent = c.name;
        opt.dataset.phone = '+' + c.phonecode;
        select.appendChild(opt);
    });
}

function setDefaultCountry1(countryName) {
    const select = document.getElementById('country1');

    for (const option of select.options) {
        if (option.value === countryName) {
            option.selected = true;
            handleCountry1();
            break;
        }
    }
}

function handleCountry1() {
    const countryName = document.getElementById('country1').value;

    /* Country Code */
    const country = COUNTRIES_1.find(c => c.name === countryName);
    document.getElementById('countryCode1').innerHTML =
        country ? `<option value="+${country.phonecode}">+${country.phonecode}</option>` : '';

    /* States */
    const stateSelect = document.getElementById('state1');
    stateSelect.innerHTML = '<option value="">Select State</option>';

    STATES_1
        .filter(s => s.country_name === countryName)
        .forEach(s => {
            const opt = document.createElement('option');
            opt.value = s.name;
            opt.textContent = s.name;
            opt.dataset.stateId = s.id;
            stateSelect.appendChild(opt);
        });

    /* ✅ Static Others */
    stateSelect.innerHTML += `<option value="Others">Others</option>`;

    resetCity1();
}

/* ================= STATE → CITY ================= */

function handleState1() {
    const stateSelect = document.getElementById('state1');
    const selectedValue = stateSelect.value;
    const stateId = stateSelect.selectedOptions[0]?.dataset.stateId;

    const citySelect = document.getElementById('city1');
    citySelect.innerHTML = '<option value="">Select City</option>';

    /* ✅ If State = Others */
    if (selectedValue === 'Others') {
        citySelect.innerHTML += `<option value="Others">Others</option>`;
        return;
    }

    if (!stateId) return;

    const block = STATE_CITIES_1.find(
        c => String(c.id) === String(stateId)
    );

    if (!block || !Array.isArray(block.cities)) {
        citySelect.innerHTML += `<option value="Others">Others</option>`;
        return;
    }

    block.cities.forEach(city => {
        const opt = document.createElement('option');
        opt.value = city.name;
        opt.textContent = city.name;
        citySelect.appendChild(opt);
    });

    /* ✅ Static Others */
    citySelect.innerHTML += `<option value="Others">Others</option>`;
}

function resetCity1() {
    document.getElementById('city1').innerHTML =
        '<option value="">Select City</option><option value="Others">Others</option>';
}
</script>

<script>
let COUNTRIES = [];
let STATES = [];
let STATE_CITIES = [];

document.addEventListener('DOMContentLoaded', () => {

    const countrySelect = document.getElementById('country2');
    const codeSelect    = document.getElementById('countryCode2');
    const stateSelect   = document.getElementById('state2');

    if (!countrySelect || !codeSelect || !stateSelect) {
        console.error('❌ Required select element missing');
        return;
    }

    Promise.all([
        fetch('./json/countries.json').then(r => r.json()),
        fetch('./json/states.json').then(r => r.json()),
        fetch('./json/state_cities.json').then(r => r.json()) // ✅ renamed
    ])
    .then(([countries, states, stateCities]) => {

        COUNTRIES = countries;
        STATES = states;
        STATE_CITIES = stateCities;

        populateCountries();
        setDefaultCountry('India');
    })
    .catch(err => {
        console.error('❌ Load error (JSON path issue):', err);
    });

    countrySelect.addEventListener('change', handleCountryChange);
});

/* ================= COUNTRIES ================= */

function populateCountries() {
    const countrySelect = document.getElementById('country2');
    countrySelect.innerHTML = '<option value="">Select Country</option>';

    COUNTRIES.forEach(country => {
        if (!country.name) return;

        const opt = document.createElement('option');
        opt.value = country.name;
        opt.textContent = country.name;
        countrySelect.appendChild(opt);
    });
}

function setDefaultCountry(countryName) {
    const select = document.getElementById('country2');

    for (let i = 0; i < select.options.length; i++) {
        if (select.options[i].value === countryName) {
            select.selectedIndex = i;
            handleCountryChange(); // trigger dependent logic
            break;
        }
    }
}

/* ================= COUNTRY CHANGE ================= */

function handleCountryChange() {
    const countryName = document.getElementById('country2').value;

    updateCountryCode(countryName);
    populateStates(countryName);
}

/* ================= COUNTRY CODE ================= */

function updateCountryCode(countryName) {
    const codeSelect = document.getElementById('countryCode2');
    codeSelect.innerHTML = '';

    const country = COUNTRIES.find(c => c.name === countryName);

    if (country && country.phonecode) {
        codeSelect.innerHTML =
            `<option value="${country.phonecode}">+${country.phonecode}</option>`;
    }
}

/* ================= STATES ================= */

function populateStates(countryName) {
    const stateSelect = document.getElementById('state2');
    stateSelect.innerHTML = '<option value="">Select State</option>';

    if (!countryName) return;

    STATES
        .filter(state => state.country_name === countryName)
        .forEach(state => {
            const opt = document.createElement('option');
            opt.value = state.name;
            opt.textContent = state.name;
            opt.dataset.stateId = state.id; // 🔑 for cities later
            stateSelect.appendChild(opt);
        });

    stateSelect.innerHTML += '<option value="Others">Others</option>';
}

document.getElementById('state2').addEventListener('change', handleStateChange);

function handleStateChange() {
    const stateSelect = document.getElementById('state2');
    const citySelect  = document.getElementById('city2');

    citySelect.innerHTML = '<option value="">Select City</option>';

    const stateId = stateSelect.selectedOptions[0]?.dataset.stateId;
    if (!stateId) {
        citySelect.innerHTML += '<option value="Others">Others</option>';
        return;
    }

    const stateBlock = STATE_CITIES.find(
        s => String(s.id) === String(stateId)
    );

    if (!stateBlock || !Array.isArray(stateBlock.cities)) {
        citySelect.innerHTML += '<option value="Others">Others</option>';
        return;
    }

    stateBlock.cities.forEach(city => {
        if (!city.name) return;

        const opt = document.createElement('option');
        opt.value = city.name;
        opt.textContent = city.name;
        citySelect.appendChild(opt);
    });

    citySelect.innerHTML += '<option value="Others">Others</option>';
}

</script>





   <script>


// ================= MOBILE VALIDATION =================
// function validateMobileField(id) {
//     let m = $('#mobile' + id).val();
//     if (m.length === 10 && $.isNumeric(m)) {
//         $('#verifybutton' + id).show();
//     } else {
//         $('#verifybutton' + id).hide();
//     }
// }
function validateMobileField(id) {
    // console.log(id);
    let mobile = $('#mobile' + id).val().trim();
     let countryCode = $('#countryCode' + id).val(); // e.g. +91, +1, +44

    // console.log(countryCode);
    // India (+91): exactly 10 digits
    if (countryCode === '+91' || countryCode === '91') {
        if (mobile.length === 10 && $.isNumeric(mobile)) {
            $('#verifybutton' + id).show();
        } else {
            $('#verifybutton' + id).hide();
        }
    } 
    // Other countries: skip 10-digit restriction
    else {
        if (mobile.length >= 6 && $.isNumeric(mobile)) {
            $('#verifybutton' + id).show();
        } else {
            $('#verifybutton' + id).hide();
        }
    }
}


function verifyMobile(id) {

    // alert('yes ');
    let mobile = $('#mobile' + id).val();
    let countryCode = $('#countryCode' + id).val(); // NEW
    // alert(countryCode);

    // ✅ NON-INDIA → auto verify (NO OTP)
    if (countryCode !== '91'  && countryCode !== '+91' ) {

        $('#verifiedTick' + id).show();
        $('#verifybutton' + id).hide();
        $('#editmobile' + id).hide();
        $('#otpBlock' + id).hide();
        $('#mobile' + id).prop('readonly', true);
        $('#isMobileVerified' + id).val(1);

        toggleSubmitButton(id);
        return;
    }

    // 🇮🇳 INDIA → existing OTP flow
    $.get('/verify', { mobile }, function (res) {

        // already exists → verified
        if (res === 'numexists' || res === 'numExists') {

            $('#verifiedTick' + id).show();
            $('#verifybutton' + id).hide();
            $('#editmobile' + id).hide();
            $('#otpBlock' + id).hide();
            $('#mobile' + id).prop('readonly', true);
            $('#isMobileVerified' + id).val(1);

            toggleSubmitButton(id);
            return;
        }

        // new number → OTP
        $('#otpBlock' + id).show();
        $('#verifybutton' + id).hide();
        $('#editmobile' + id).show();
        $('#mobile' + id).prop('readonly', true);
    });
}


// ================= VERIFY OTP =================
function verifyOtp(id) {
    let otp = $('#otp' + id).val();
    let mobile = $('#mobile' + id).val();

    if (otp.length !== 4) {
        $('#otpError' + id).text('Invalid OTP').show();
        return;
    }

    $.get('/check', { otpNo: otp, mobileNo: mobile }, function (res) {
        if (res === 'notexists') {
            $('#otpError' + id).text('Invalid OTP').show();
        } else {
            $('#otpError' + id).hide();
            $('#otpBlock' + id).hide();
            $('#verifiedTick' + id).show();
            $('#editmobile' + id).hide();
            $('#isMobileVerified' + id).val(1);
            toggleSubmitButton(id);
        }
    });
}

// ================= EDIT MOBILE =================
function editMobile(id) {
    $('#mobile' + id).prop('readonly', false);
    $('#otpBlock' + id).hide();
    $('#verifiedTick' + id).hide();
    $('#verifybutton' + id).show();
    $('#isMobileVerified' + id).val(0);
    toggleSubmitButton(id);
}

// ================= SUBMIT ENABLE LOGIC =================
function toggleSubmitButton(id) {
    let verified = $('#isMobileVerified' + id).val() == 1;
    let filled = true;

    $('#form' + id + ' [required]').each(function () {
        if (!$(this).val()) filled = false;
    });

    $('#form' + id + ' button[type=submit]')
        .prop('disabled', !(verified && filled));
}

// ================= AJAX FORM SUBMIT =================
// ================= AJAX FORM SUBMIT =================
$('#form1, #form2').on('submit', function (e) {
    e.preventDefault();

    let form = $(this);
    let btn = form.find('button[type=submit]');
    let captchaErrorEl = form.find('#captcha-error');

    btn.prop('disabled', true);
    captchaErrorEl.text(''); // clear old error

    $.ajax({
        url: form.attr('action'),
        method: 'POST',
        data: form.serialize(),
        success: function (res) {
            window.location.href = res.redirect;
            form[0].reset();
            $('#desktop_modal_homepage').modal('hide');
        },
        error: function (xhr) {
            btn.prop('disabled', false);

            if (xhr.responseJSON && xhr.responseJSON.errors) {
                const errors = xhr.responseJSON.errors;

                if (errors.captcha) {
                    const key = errors.captcha[0];

                    if (key === 'validation.captcha') {
                        captchaErrorEl.text('Invalid captcha');
                    } else {
                        captchaErrorEl.text(key);
                    }
                }
            }
        }
    });
});

// auto recheck
$(document).on('input change', 'input, textarea, select', function () {
    toggleSubmitButton(1);
    toggleSubmitButton(2);
});
</script>
