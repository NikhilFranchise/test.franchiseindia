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
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
        </div>

        <!-- Mobile -->
        <div class="col-sm-6">
            <div class="form-group" style="position:relative;">
                <input type="tel" id="mobile2" name="mobile" maxlength="10"
                       class="form-control" placeholder="Mobile No"
                       onkeyup="validateMobileField(2)" required>

                <button type="button" id="verifybutton2"
                        onclick="verifyMobile(2)"
                        class="btn btn-xs btn-primary"
                         style="position:absolute; right:42px; top:13px; background:#dc3322; border:#dc3322; display:none;">
                    Verify
                </button>

                {{-- <button type="button" id="editmobile2"
                        onclick="editMobile(2)"
                        class="btn btn-xs btn-warning"
                        style="position:absolute; right:85px; top:8px; display:none;">
                    Edit
                </button> --}}

                <span id="verifiedTick2"
                      style="position:absolute; right:20px; top:10px; color:green; display:none;">
                    ✓
                </span>
            </div>
        </div>

        <!-- OTP -->
        <div class="col-sm-6" id="otpBlock2" style="display:none;">
            <div class="form-group" style="position:relative;">
                <input type="text" id="otp2" class="form-control"
                       placeholder="Enter OTP" maxlength="4">

                <button type="button"
                        onclick="verifyOtp(2)"
                        class="btn btn-xs btn-success"
                         style="position:absolute; right:42px; top:13px; background:#dc3322; border:#dc3322;">
                    Verify OTP
                </button>

                

                <span id="otpError2" style="color:red;font-size:12px;display:none;"></span>
            </div>
        </div>

        <!-- Email -->
        <div class="col-sm-6">
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email ID" required>
            </div>
        </div>

        <!-- Brand -->
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" name="brand_name" class="form-control" placeholder="Brand Name" required>
            </div>
        </div>

        <!-- State -->
        <div class="col-sm-6">
            <div class="form-group">
                <select name="state" class="form-control" required onchange="getcitypopup4(this)">
                    <option value="">Select State</option>
                    @foreach($stateArr as $id => $state)
                        <option value="{{ $state }}" data-id="{{ $id }}">{{ $state }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- City -->
       
        <div class="col-sm-6">
            <div class="form-group">
                <select name="city" id="new_enquiry_popup_city2" class="form-control" required>
                    <option value="">Select City</option>
                </select>
            </div>
        </div>
        <!-- Message -->
        <div class="col-sm-12">
            <div class="form-group">
                <textarea name="message" class="form-control" placeholder="Message" required></textarea>
            </div>
        </div>

        <!-- Submit -->
        <div class="col-sm-6">
            <div class="form-group">
                <button type="submit" id="submitBtn2" class="btn btn-danger" disabled>
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

        <!-- Mobile -->
        <div class="col-sm-6">
            <div class="form-group" style="position:relative;">
                <input type="tel" id="mobile1" name="mobile" maxlength="10"
                       class="form-control" placeholder="Mobile No"
                       onkeyup="validateMobileField(1)" required>

                <button type="button" id="verifybutton1"
                        onclick="verifyMobile(1)"
                        class="btn btn-xs btn-primary"
                        style="position:absolute; right:42px; top:13px; background:#dc3322; border:#dc3322; display:none;">
                    Verify
                </button>

                {{-- <button type="button" id="editmobile1"
                        onclick="editMobile(1)"
                        class="btn btn-xs btn-warning"
                        style="position:absolute; right:85px; top:8px; display:none;">
                    Edit
                </button> --}}

                <span id="verifiedTick1"
                      style="position:absolute; right:20px; top:10px; color:green; display:none;">
                    ✓
                </span>
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
                        style="position:absolute; right:14px; top:12px; background:#dc3322; border:#dc3322;">
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
                <select name="state" class="form-control" required onchange="getcitypopup3(this)">
                    <option value="">Select State</option>
                    @foreach($stateArr as $id => $state)
                        <option value="{{ $id }}" data-id="{{ $id }}">{{ $state }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- City -->
       <div class="col-sm-6">
            <div class="form-group">
                <select name="city" id="new_enquiry_popup_city1" class="form-control" required>
                    <option value="">Select City</option>
                </select>
            </div>
        </div>

        <!-- Message -->
        <div class="col-sm-6">
            <div class="form-group">
                <textarea name="message" class="form-control" placeholder="Message" required></textarea>
            </div>
        </div>

        <!-- Submit -->
        <div class="col-sm-6">
            <div class="form-group">
                <button type="submit" id="submitBtn1" class="btn btn-danger" disabled>
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
let cityData = @json($cityArr);

function getcitypopup3(value) {
    let stateId = $(value).find(':selected').attr('data-id');
    let cityDropdown = $("#new_enquiry_popup_city1");

    cityDropdown.html('<option value="">Select City</option>');

    if (stateId && cityData[stateId]) {
        cityData[stateId].forEach(function(city) {
            cityDropdown.append('<option value="' + city + '">' + city + '</option>');
        });
    }
}

function getcitypopup4(value) {
    let stateId = $(value).find(':selected').attr('data-id');
    let cityDropdown = $("#new_enquiry_popup_city2");

    cityDropdown.html('<option value="">Select City</option>');

    if (stateId && cityData[stateId]) {
        cityData[stateId].forEach(function(city) {
            cityDropdown.append('<option value="' + city + '">' + city + '</option>');
        });
    }
}


// ================= MOBILE VALIDATION =================
function validateMobileField(id) {
    let m = $('#mobile' + id).val();
    if (m.length === 10 && $.isNumeric(m)) {
        $('#verifybutton' + id).show();
    } else {
        $('#verifybutton' + id).hide();
    }
}

// ================= VERIFY MOBILE =================
function verifyMobile(id) {
    let mobile = $('#mobile' + id).val();

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
$('#form1, #form2').on('submit', function (e) {
    e.preventDefault();

    let form = $(this);
    let btn = form.find('button[type=submit]');

    btn.prop('disabled', true);

    $.ajax({
        url: form.attr('action'),
        method: 'POST',
        data: form.serialize(),
        success: function (res) {
            window.location.href = res.redirect;
            // alert(res.redirect);
            form[0].reset();
            $('#desktop_modal_homepage').modal('hide');
        },
        error: function (xhr) {
            btn.prop('disabled', false);
            alert('Validation error');
        }
    });
});

// auto recheck
$(document).on('input change', 'input, textarea, select', function () {
    toggleSubmitButton(1);
    toggleSubmitButton(2);
});
</script>
