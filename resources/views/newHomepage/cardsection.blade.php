<style>
.error-message{color:red;font-size:13px;font-weight:400;display:block;text-align:left;text-align:left;margin-top:-10px;margin-bottom:10px}.input-error{border:1px solid red}
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
                                    <div class="business-a"><a
                                            href="{{ url('investor/create') }}">
                                            @if (request()->segment(1) == 'hi')
                                            आज ही बिजनेस शुरू करें <span class="smallimp">(इन्वेस्टर
                                                पंजीकरण)</span>
                                        @else
                                            Start A Business Today <span class="smallimp">(Investor
                                                Registration)</span>
                                        @endif
                                            <img src="{{url('cvw/images/rarrow.png')}}" class="icon-bar-main-fihl" width="16" height="19" alt="Arrow"></a></div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6">
                                    <div class="business-a"><a
                                            href="{{ url('franchisor/registration/step/1') }}">
                                            @if (request()->segment(1) == 'hi')
                                                चैनल पार्टनर नियुक्त करें <span class="smallimp">(फ्रैंचाइज़र
                                                    रजिस्ट्रेशन)</span>
                                            @else
                                                Appoint Channel partners <span class="smallimp">(Franchisor
                                                    Registration)</span>
                                            @endif
                                            <img src="{{url('cvw/images/rarrow.png')}}" class="icon-bar-main-fihl" width="16" height="19" alt="Arrow"></a></div>
                                </div>
                                <div class="col-md-12 pt-30">
                                    @if (request()->segment(1) == 'hi')
                                        <h4>हमें रजिस्टर क्यों करना चाहिए ? </h4>
                                        बीस हजार से अधिक फ्रैंचाइज बिजनेस अवसरों तक पहुंच हो जाएगी। <br> <br>
                                        तेजी से विकास कर रहे कारोबारी समुदाय से नेटवर्किंग का मौका मिलेगा। इससे
                                        फ्रेंचाइजिंग के माध्यम से सीखने और कारोबार बढ़ाने के लिए विशेषज्ञों की राय मिल
                                        सकेगी।
                                    @else
                                        <h3> Why Should I Register ?</h3>
                                        To get access to over 20000+ Franchise Business
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
                                <form id="homepage" name="homepage" method="post">
                                    @csrf
                                    {{-- <input type="hidden" name="_token" value="99h71cGQGBzeEVUK02rQy5q5Yxm0vpYPxEcKy5VK" autocomplete="off"> --}}
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
                                    <div class="input-group mb-15"><span class="input-group-addon">
                                            <div class="icon-section-main"><img
                                                    src="https://www.franchiseindia.com/newhomepage/assets/img/email.png"
                                                    width="20" height="20" alt="email-icon"></div>
                                        </span><input type="email" class="form-control blur" required=""
                                            name="emailfreeadvice" id="emailfreeadvice"
                                            placeholder="{{ Request::segment(1) == 'hi' ? 'ईमेल दर्ज करें' : 'Enter Email' }}">
                                    </div>
                                    <span id="email-error" class="error-message"></span>
                                    <div class="input-group mb-15"><span class="input-group-addon">
                                            <div class="icon-section-main"><img
                                                    src="https://www.franchiseindia.com/newhomepage/assets/img/phone.png"
                                                    width="20" height="20" alt="phone-icon"></div>
                                        </span><input type="text" class="form-control blur" maxlength="10"
                                            name="mobilefreeadvice" id="mobilefreeadvice"
                                            placeholder="{{ Request::segment(1) == 'hi' ? 'मोबाइल नंबर दर्ज करें' : 'Enter Mobile No' }}"
                                            required=""></div>
                                            <span id="mobile-error" class="error-message"></span>
                                    <div id="askMsg" style="display:none">
                                        <div class="green">
                                            {{ Request::segment(1) == 'hi' ? 'नि: शुल्क सलाह के लिए जानकारी जमा करने के लिए धन्यवाद!' : 'Thank You for Submitting information for Free Advice!' }}
                                        </div>
                                    </div><button type="button" class="btn btn-main" id="btnhome">Submit</button>
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
    $("#btnhome").click(function () {
        var mobile = $('#mobilefreeadvice').val().trim();
        var email = $('#emailfreeadvice').val().trim();
        var csrf_token = $("input[name='_token']").val();
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
                name: '--',
                pincode: '000000',
                email: email,
                mobile: mobile,
                details: '--',
                is_newsletter: 1
            };
            $.ajax({
                type: 'POST',
                url: '/freeadvice',
                data: data,
                beforeSend: function () {
                    $('#btnhome').html('Please wait..');
                },
                success: function (data) {
                    // Assuming the server returns a URL to redirect to
                    window.location.href = data.redirect_url || "/thanks-advice-form";
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.error('Error:', errorThrown);
                    // Handle error condition, e.g., display an error message
                    alert('Error occurred. Please try again.');
                }
            });
    });
});
</script>
