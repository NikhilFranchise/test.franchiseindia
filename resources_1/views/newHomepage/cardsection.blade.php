<style>
    .error-message {
        color: red;
        font-size: 13px;
        font-weight: 400;
        display: block;
        text-align: left;
        text-align: left;
        margin-top: -10px;
        margin-bottom: 10px
    }

    .input-error {
        border: 1px solid red
    }
    .slct{width: 60px; height: 34px; float: left; border: #eee 1px solid;}
    .inpt{width: 80% !important;}
    .ab{width: 40% !important ; float: left}
    .ab img{width: 80px !important; height: 32px} 
    .cp-inp2{width: 35% !important; float: left; position: relative !important; right: -7px; margin-right: 12px;}
</style>
<style>
	.form-ask-experts .lb-icon{width:45px !important; height:34px!important; float:left!important; margin-bottom:5px!important;}
	.form-ask-experts .lb-icon2{width:45px !important; height:34px!important; float:left!important; margin-top:1px!important; border:none; margin-right: 5px; border: #c1c1c1 1px solid !important;}
	.form-ask-experts .ip-fl{width:86%!important; height:34px!important; float:left!important; display:block!important; margin-bottom:5px!important; border: #c1c1c1 1px solid !important;}
	.form-ask-experts .ip-fl2{width:71%!important; position: relative; top:1px; height:34px!important; float:left!important; display:block!important; margin-bottom:5px!important;}
	.form-ask-experts ul.radio-main li{padding: 0px 6px 6px!important;}
    .form-ask-experts .input-group .form-control{border: #c1c1c1 1px solid !important;}
	.form-ask-experts h4{margin: 2px 0 0 0 !important;}	
    .ctc{width: 100% !important;}
    .input-group-addon2{padding: 7px 12px !important; float: left; width: 45px; height: 34px; position: relative; top:1px;}
</style>
<section class="card-section section-30" id="card-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-m card-p-20">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6">
                                    <div class="business-a"><a href="{{ url('investor/create') }}">
                                            @if (request()->segment(1) == 'hi')
                                                आज ही बिजनेस शुरू करें <span class="smallimp">(इन्वेस्टर
                                                    पंजीकरण)</span>
                                            @else
                                                Start A Business Today <span class="smallimp">(Investor
                                                    Registration)</span>
                                            @endif
                                            <img src="{{ url('cvw/images/rarrow.png') }}" class="icon-bar-main-fihl"
                                                width="16" height="19" alt="Arrow">
                                        </a></div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6">
                                    <div class="business-a"><a href="{{ url('franchisor/registration/step/1') }}">
                                            @if (request()->segment(1) == 'hi')
                                                चैनल पार्टनर नियुक्त करें <span class="smallimp">(फ्रैंचाइज़र
                                                    रजिस्ट्रेशन)</span>
                                            @else
                                                Appoint Channel partners <span class="smallimp">(Franchisor
                                                    Registration)</span>
                                            @endif
                                            <img src="{{ url('cvw/images/rarrow.png') }}" class="icon-bar-main-fihl"
                                                width="16" height="19" alt="Arrow">
                                        </a></div>
                                </div>
                                <div class="col-md-12 pt-30">
                                    @if (request()->segment(1) == 'hi')
                                        <h4>हमें रजिस्टर क्यों करना चाहिए ? </h4>
                                        पन्द्रह हजार से अधिक फ्रैंचाइज बिजनेस अवसरों तक पहुंच हो जाएगी। <br> <br>
                                        तेजी से विकास कर रहे कारोबारी समुदाय से नेटवर्किंग का मौका मिलेगा। इससे
                                        फ्रेंचाइजिंग के माध्यम से सीखने और कारोबार बढ़ाने के लिए विशेषज्ञों की राय मिल
                                        सकेगी।
                                    @else
                                        <h3> Why Should I Register ?</h3>
                                        To get access to over 15000+ Franchise Business
                                        Opportunities.<br><br>
                                        Network with the growing Business Community to get
                                        expert
                                        interventions
                                        to let you learn to Grow &amp;
                                        Expand your Business with Franchising.
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-ask-experts">
                                <h4>{{ Request::segment(1) == 'hi' ? 'हमारे विशेषज्ञों से पूछें' : 'Ask our Experts' }}
                                </h4>
                                {{-- <form id="homepage" name="homepage" method="post">
                                    @csrf
                                    <div class="raido-main-section">
                                        <ul class="radio-main">
                                            <li>
                                                <div class="radio"><label><input type="radio" name="optionsRadios"
                                                            id="optionsRadios3" checked="" value="franchisor">
                                                        {{ Request::segment(1) == 'hi' ? 'अपने ब्रांड का विस्तार करें' : 'Expand My Brand' }}</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="radio"><label><input type="radio" name="optionsRadios"
                                                            id="optionsRadios1" value="investor">
                                                        {{ Request::segment(1) == 'hi' ? 'फ्रैंचाइज़ खरीदें' : 'Buy a Franchise' }}</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="input-group mb-15" id="brandField">
                                        <span class="input-group-addon lb-icon">
                                            <div class="icon-section-main"><img src="newhomepage/assets/img/brands.png"  width="20" height="20" alt="brand-icon"></div>
                                        </span>
                                        <input type="text" class="form-control blur ip-fl" required="" name="brandfreeadvice" id="brandfreeadvice" placeholder="{{ Request::segment(1) == 'hi' ? 'ईमेल दर्ज करें' : 'Enter Brand Name' }}">
										
                                    </div>
									
                                    <div class="input-group mb-15" id="nameField" style="display:none;">
                                        <span class="input-group-addon lb-icon">
                                            <div class="icon-section-main">
                                                <img src="newhomepage/assets/img/user.png" width="20" height="20">
                                            </div>
                                        </span>
                                        <input type="text" class="form-control blur ip-fl" name="namefreeadvice" id="namefreeadvice" placeholder="Enter Your Name">
                                    </div>
									
                                    <div class="input-group mb-15">
                                        <span class="input-group-addon">
                                            <div class="icon-section-main"><img src="https://www.franchiseindia.com/newhomepage/assets/img/email.png" width="20" height="20" alt="email-icon"></div>
                                        </span>
                                        <input type="email" class="form-control blur" required="" name="emailfreeadvice" id="emailfreeadvice" placeholder="{{ Request::segment(1) == 'hi' ? 'ईमेल दर्ज करें' : 'Enter Email' }}">
                                    </div>
                                    <span id="mobile-error" class="error-message"></span>
                                    <div id="askMsg" style="display:none">
                                        <div class="green">
                                            {{ Request::segment(1) == 'hi' ? 'नि: शुल्क सलाह के लिए जानकारी जमा करने के लिए धन्यवाद!' : 'Thank You for Submitting information for Free Advice!' }}
                                        </div>
                                    </div><button type="button" class="btn btn-main" id="btnhome">Submit</button>
                                </form> --}}

                                
                                <form id="homepage" name="homepage" method="post">
                                    @csrf  
                                    <div>                           
                                            <ul class="radio-main">
                                            <li>
                                                <div class="radio"><label><input type="radio" name="optionsRadios"
                                                            id="optionsRadios3" checked="" value="franchisor">
                                                        Expand My Brand</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="radio"><label><input type="radio" name="optionsRadios"
                                                            id="optionsRadios1" value="investor">
                                                        Buy a Franchise</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
									
									
                                    <div class="input-group mb-3" style="width: 100%">
                                        <span class="input-group-addon lb-icon">
                                            <div class="icon-section-main">
                                                <img src="https://www.franchiseindia.com/images/user.png" width="20" height="20">
                                            </div>
                                        </span>
                                        <input type="text" class="form-control blur ip-fl" name="namefreeadvice" id="namefreeadvice" placeholder="Enter Your Name">
                                    </div>
									
                                    <div class="input-group mb-15">
										<span class="input-group-addon">
                                            <div class="icon-section-main"><img src="https://www.franchiseindia.com/newhomepage/assets/img/email.png" width="20" height="20" alt="email-icon"></div>
                                        </span>
										<input type="email" class="form-control blur" required="" name="emailfreeadvice" id="emailfreeadvice" placeholder="{{ Request::segment(1) == 'hi' ? 'ईमेल दर्ज करें' : 'Enter Email' }}">
                                    </div>
                                    <span id="email-error" class="error-message"></span>
									
                                   <div class="input-group mb-15 ctc">
                                        <span class="input-group-addon input-group-addon2">
                                            <div class="icon-section-main">
                                                <img src="https://www.franchiseindia.com/newhomepage/assets/img/phone.png"
                                                    width="20" height="20" alt="phone-icon">
                                            </div>
                                        </span>

                                        <select class="lb-icon2 slct" name="country_code" id="country_code" >
                                            @foreach(config('country_codes') as $country)
                                                <option value="{{ $country['code'] }}"
                                                    {{ $country['code'] == '+91' ? 'selected' : '' }}>
                                                     {{ $country['code'] }} 
                                                </option>
                                            @endforeach
                                        </select>

                                        <input type="text"
                                            class="form-control blur ip-fl2 inpt"
                                            
                                            name="mobilefreeadvice"
                                            id="mobilefreeadvice"
                                            placeholder="{{ Request::segment(1) == 'hi' ? 'मोबाइल नंबर दर्ज करें' : 'Enter Mobile No' }}"
                                            required>
                                    </div>
                                    <span id="mobile-error" class="error-message"></span>



                                     <div class="input-group mb-15">
                                       <div style="width: 40% !important ; float: left" class="captcha ab">
                                            <span >{!! captcha_img() !!}</span>
                                            <button type="button" class="btn btn-danger" class="reload" id="reload">
                                                &#x21bb;
                                            </button>
                                        </div>

                                        <input id="captcha" type="text" class="form-control cp-inp2"
                                            placeholder="Enter Captcha" name="captcha">

                                    <button type="button" class="btn btn-main" id="btnhomelatest">Submit</button>
                                      

                                    </div>
                                            <span id="captcha-error" class="error-message"></span>


                                    <div id="askMsg" style="display:none">
                                        <div class="green">
                                            Thank You for Submitting information for Free Advice!
                                        </div>
                                    </div>
                                     

                                    
                                    {{-- <div class="form-group mb-4">
                                        <input id="captcha" type="text" class="form-control"
                                            placeholder="Enter Captcha" name="captcha">
                                        <span class="text-danger" id="captcha-error"></span>
                                    </div> --}}

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
 <script>
$(document).ready(function () {

    // 🔁 Set maxlength based on country code (UX improvement)
    function updateMobileMaxLength() {
        var countryCode = $('#country_code').val();
        if (countryCode === '+91') {
            $('#mobilefreeadvice').attr('maxlength', 10);
        } else {
            $('#mobilefreeadvice').attr('maxlength', 15);
        }
    }

    // Run on page load & country change
    updateMobileMaxLength();
    $('#country_code').on('change', updateMobileMaxLength);

    $("#btnhomelatest").click(function () {

        var mobile = $('#mobilefreeadvice').val().trim();
        var email  = $('#emailfreeadvice').val().trim();
        var name   = $('#namefreeadvice').val().trim();

        var csrf_token = $("input[name='_token']").val();
        var countryCode = $('#country_code').val();

        // Clear previous errors
        $('#mobile-error').text('');
        $('#email-error').text('');
        $('#mobilefreeadvice, #emailfreeadvice').removeClass('input-error');

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        /* ================= MOBILE VALIDATION ================= */

        if (mobile === '') {
            $('#mobile-error').text('Mobile number is required.');
            $('#mobilefreeadvice').addClass('input-error').focus();
            return;
        }

        if (!/^\d+$/.test(mobile)) {
            $('#mobile-error').text('Mobile number must contain digits only.');
            $('#mobilefreeadvice').addClass('input-error').focus();
            return;
        }

        // India (+91) → exactly 10 digits
        if (countryCode === '+91') {
            if (mobile.length !== 10) {
                $('#mobile-error').text('Indian mobile numbers must be exactly 10 digits.');
                $('#mobilefreeadvice').addClass('input-error').focus();
                return;
            }
        }
        // Other countries → 5 to 15 digits
        else {
            if (mobile.length < 5 || mobile.length > 15) {
                $('#mobile-error').text('Mobile number must be between 5 and 15 digits.');
                $('#mobilefreeadvice').addClass('input-error').focus();
                return;
            }
        }

        /* ================= EMAIL VALIDATION ================= */

        if (email === '') {
            $('#email-error').text('Email is required.');
            $('#emailfreeadvice').addClass('input-error').focus();
            return;
        }

        if (!emailRegex.test(email)) {
            $('#email-error').text('Please enter a valid email address.');
            $('#emailfreeadvice').addClass('input-error').focus();
            return;
        }

        /* ================= AJAX SUBMIT ================= */

        var type = $("input[name='optionsRadios']:checked").val();

        var data = {
            _token: csrf_token,
            optionsRadios: type,
            name: name,
            pincode: '--',
            email: email,
            mobile: mobile,
            details: '--',
            is_newsletter: 1,
            country_code: countryCode,
            captcha: $('#captcha').val()
        };

        $.ajax({
            type: 'POST',
            url: '/freeadvice',
            data: data,
            beforeSend: function () {
                $('#btnhomelatest').html('Please wait..').prop('disabled', true);
            },
            success: function (data) {
                window.location.href = data.redirect_url || "/thanks-advice-form";
            },
            error: function (xhr, textStatus, errorThrown) {
                console.error('Error:', errorThrown);
                $('#btnhomelatest').html('Submit').prop('disabled', false);

                    // Clear old errors
                    $('.text-danger').text('');

                    // Check if it's a validation error (422)
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;

                        // Show captcha error
                       if (errors.captcha) {
                            const captchaError = errors.captcha[0];

                            if (captchaError === 'validation.captcha') {
                                $('#captcha-error').text('Invalid captcha');
                            } else {
                                $('#captcha-error').text(captchaError);
                            }
                        }

                        // Example for other fields (optional)
                        if (errors.email) {
                            $('#email-error').text(errors.email[0]);
                        }
                    } else {
                        alert('Something went wrong. Please try again.');
                    }
            }
        });
    });
});
</script>

{{-- <script>
    $(document).ready(function() {
        $("#btnhomelatest").click(function() {
            var mobile = $('#mobilefreeadvice').val().trim();
            var email = $('#emailfreeadvice').val().trim();
            var name = $('#namefreeadvice').val().trim();

            var csrf_token = $("input[name='_token']").val();
            var countryCode = $('#country_code').val();

            // Clear previous error messages
            $('#mobile-error').text('');
            $('#email-error').text('');
            $('#mobilefreeadvice').removeClass('input-error');
            $('#emailfreeadvice').removeClass('input-error');
            // Basic validation
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var mobileRegex = /^\d{10}$/;
            var isValid = true;
            if (mobile === '') {
                $('#mobile-error').text('Mobile number is required.');
                $('#mobilefreeadvice').addClass('input-error').focus();
                isValid = false;
            } else if (!/^\d+$/.test(mobile)) {
                $('#mobile-error').text('Mobile number must be numeric.');
                $('#mobilefreeadvice').addClass('input-error').focus();
                isValid = false;
            } else if (!mobileRegex.test(mobile)) {
                $('#mobile-error').text('Please enter a valid 10-digit mobile number.');
                $('#mobilefreeadvice').addClass('input-error').focus();
                isValid = false;
            }
            if (email === '') {
                $('#email-error').text('Email is required.');
                $('#emailfreeadvice').addClass('input-error').focus();
                isValid = false;
            } else if (!emailRegex.test(email)) {
                $('#email-error').text('Please enter a valid email address.');
                $('#emailfreeadvice').addClass('input-error').focus();
                isValid = false;
            }
            if (!isValid) {
                return; // Stop the form submission if validation fails
            }
            var type = $("input[name='optionsRadios']:checked").val();
            var data = {
                _token: csrf_token, // Add CSRF token
                optionsRadios: type,
                name: name,
                pincode: '--',
                email: email,
                mobile: mobile,
                details: '--',
                is_newsletter: 1,
                country_code: countryCode, 

            };
            $.ajax({
                type: 'POST',
                url: '/freeadvice',
                data: data,
                beforeSend: function() {
                    $('#btnhomelatest').html('Please wait..');
                },
                success: function(data) {
                    // alert('ues');
                    // Assuming the server returns a URL to redirect to
                    window.location.href = data.redirect_url || "/thanks-advice-form";
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.error('Error:', errorThrown);
                    // Handle error condition, e.g., display an error message
                    // alert('Error occurred. Please try again.');
                }
            });
        });
    });
</script>  --}}
<script>

    $(document).ready(function () {

    function updateNamePlaceholder() {
        var selectedType = $("input[name='optionsRadios']:checked").val();

        if (selectedType === 'franchisor') {
            $('#namefreeadvice').attr('placeholder', 'Enter Brand Name');
        } else {
            $('#namefreeadvice').attr('placeholder', 'Enter Your Name');
        }
    }

    // Run on page load (important)
    updateNamePlaceholder();

    // Run on radio change
    $("input[name='optionsRadios']").on('change', function () {
        updateNamePlaceholder();
    });

});


document.addEventListener("DOMContentLoaded", function () {

    const radios = document.querySelectorAll('input[name="optionsRadios"]');
    const brandField = document.getElementById("brandField");
    const nameField = document.getElementById("nameField");

    function toggleFields() {
        const selected = document.querySelector('input[name="optionsRadios"]:checked').value;

        if (selected === "franchisor") {
            brandField.style.display = "block";
            nameField.style.display = "none";
        } else {
            brandField.style.display = "none";
            nameField.style.display = "block";
        }
    }

    radios.forEach(radio => {
        radio.addEventListener("change", toggleFields);
    });

    // page load default
    toggleFields();
});
</script>