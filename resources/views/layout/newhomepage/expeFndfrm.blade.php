<!-- Login/ Registration Model -->
@if (request()->segment(1) == 'hi')
    <div class="modal fade lg-panel formsection in" id="expandFranchisenew" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                    <div class="frm-sec">
                        <div id="askMsg" style="display:none;">
                            <div class="green">
                                मुफ्त सलाह के लिए जानकारी प्रस्तुत करने के लिए धन्यवाद!!
                            </div>
                        </div>
                        <div class="frm-container" id="askForm">
                            <form id="homepage" name="homepage" method="post">
                                @csrf
                                <h2 class="ttl">मुफ्त सलाह - हमारे विशेषज्ञों से पूछें</h2>
                                <div id="errMsg1" style="display:none;">
                                    <font color="red"> कृपया फॉर्म भरे! </font>
                                </div>
                                <div class="frm-type">
                                    <div class="radio">
                                        <label><input type="radio" name="optionsRadios1" id="optionsRadios3"
                                                checked="" value="franchisor"> मेरा ब्रांड का विस्तार करें </label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="optionsRadios1" id="optionsRadios1"
                                                value="investor"> एक फ्रैंचाइज़ खरीदें</label>
                                    </div>

                                </div>
                                <div class="frm-input">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="usersprite"></div>
                                        </span>
                                        <input type="text" class="form-control blur" name="namefreeadvice1"
                                            id="namefreeadvice1" placeholder="नाम दर्ज करें" required="required">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="emailsprite"></div>
                                        </span>
                                        <input type="text" name="emailfreeadvice" id="emailfreeadvice1"
                                            class="form-control blur" placeholder="ईमेल दर्ज करें" required>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="usersprite"></div>
                                        </span>
                                        <input type="text" class="form-control blur" maxlength="10"
                                            name="mobilefreeadvice1" id="mobilefreeadvice1"
                                            placeholder="मोबाइल नंबर दर्ज करें" required>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                src="https://www.franchiseindia.com/images/pincode.png"
                                                alt="pincode"></span>
                                        <input type="text" name="pincodefreeadvice1" id="pincodefreeadvice1"
                                            class="form-control blur" maxlength="6" placeholder="पिनकोड दर्ज करें">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon height80">
                                            <div class="addreesssprite"></div>
                                        </span>
                                        <textarea class="form-control height80 blur" name="detailsfreeadvice1" id="detailsfreeadvice1"
                                            placeholder="विवरण दर्ज करें"></textarea>
                                    </div>
                                    <div class="checkbox rm-prop">
                                        <label>
                                            <input type="checkbox" name="is_newsletterfreeadvice1"
                                                id="is_newsletterfreeadvice1" value="1" checked=""> हां, मैं
                                            साप्ताहिक न्यूज़लेटर का ग्राहक बनना चाहूंगा
                                        </label>
                                    </div>
                                    <div class="checkbox rm-prop">
                                        <label>
                                            <input type="checkbox" name="is_termsagree1" id="is_termsagree1"
                                                value="1" checked="">
                                            मैं सहमत हुॅं <a href="https://www.franchiseindia.com/terms"
                                                target="_blank">नियमों और शर्तों से</a>
                                        </label>
                                    </div>
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-12 txt-center" id="sub">
                                            <input type="submit" id="btnhome1" class="btn btn-default btn-red"
                                                value="हमारे विशेषज्ञों से पूछें">
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
@else
    <div class="modal fade lg-panel formsection in" id="expandFranchisenew" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                    <div class="frm-sec">
                        <div id="askMsg" style="display:none;">
                            <div class="green">
                                Thank You for Submitting information for Free Advice!
                            </div>
                        </div>
                        <div class="frm-container" id="askForm">
                            {{-- <form id="homepage" name="homepage" method="post">
                                @csrf
                                <h2 class="ttl">Free Advice - Ask Our Experts</h2>
                                <div id="errMsg1" style="display:none;">
                                    <font color="red"> Please Fill The form! </font>
                                </div>
                                <div class="frm-type">
                                    <div class="radio">
                                        <label><input type="radio" name="optionsRadios1" id="optionsRadios3"
                                                checked="" value="franchisor"> Expand My Brand </label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="optionsRadios1" id="optionsRadios1"
                                                value="investor"> Buy a Franchise</label>
                                    </div>

                                </div>
                                <div class="frm-input">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="usersprite"></div>
                                        </span>
                                        <input type="text" class="form-control blur" name="namefreeadvice1"
                                            id="namefreeadvice1" placeholder="Enter Name" required="required">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="emailsprite"></div>
                                        </span>
                                        <input type="text" name="emailfreeadvice" id="emailfreeadvice1"
                                            class="form-control blur" placeholder="Enter Email" required>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="usersprite"></div>
                                        </span>
                                        <input type="text" class="form-control blur" maxlength="10"
                                            name="mobilefreeadvice1" id="mobilefreeadvice1"
                                            placeholder="Enter Mobile No" required>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                src="https://www.franchiseindia.com/images/pincode.png"
                                                alt="pincode"></span>
                                        <input type="text" name="pincodefreeadvice1" id="pincodefreeadvice1"
                                            class="form-control blur" maxlength="6" placeholder="Enter Pincode">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon height80">
                                            <div class="addreesssprite"></div>
                                        </span>
                                        <textarea class="form-control height80 blur" name="detailsfreeadvice1" id="detailsfreeadvice1"
                                            placeholder="Enter Details"></textarea>
                                    </div>
                                    <div class="checkbox rm-prop">
                                        <label>
                                            <input type="checkbox" name="is_newsletterfreeadvice1"
                                                id="is_newsletterfreeadvice1" value="1" checked=""> Yes, i
                                            want to subscribe for weekly Newsletter
                                        </label>
                                    </div>
                                    <div class="checkbox rm-prop">
                                        <label>
                                            <input type="checkbox" name="is_termsagree1" id="is_termsagree1"
                                                value="1" checked="">
                                            I agree to the <a href="https://www.franchiseindia.com/terms"
                                                target="_blank">Terms &amp; Conditions</a>
                                        </label>
                                    </div>
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-12 txt-center" id="sub">
                                            <input type="submit" id="btnhome1" class="btn btn-default btn-red"
                                                value="Ask Our Experts">
                                        </div>

                                    </div>
                                </div>
                            </form> --}}

                            <form id="catpagepopup" method="post">
                            @csrf
                            <h2 class="ttl">Free Advice - Ask Our Experts</h2>
                            <div id="errMsg1" style="display:none;">
                                <font color="red"> Please Fill The form! </font>
                            </div>
                            <div class="frm-type">
                                <div class="radio">
                                    <label><input type="radio" name="optionsRadios1" id="optionsRadios3"
                                            checked="" value="franchisor"> Expand My Brand </label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="optionsRadios1" id="optionsRadios1"
                                            value="investor">Buy a Franchise</label>
                                </div>
                            </div>
                            <div class="frm-input">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <div class="usersprite"></div>
                                    </span>
                                    <input type="text" class="form-control blur" name="namefreeadvice1"
                                        id="namefreeadvice1" placeholder="Enter Name" required="required">
                                    <span class="error-message text-danger" id="namefreeadvice1-error"></span>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <img src="https://www.franchiseindia.com/images/email.png" alt="email">
                                    </span>
                                    <input type="text" name="emailfreeadvice1" id="emailfreeadvice1"
                                        class="form-control blur" placeholder="Enter Email" required="">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <img src="https://www.franchiseindia.com/images/mobile.png" alt="mobile">
                                    </span>
                                    <input type="text" class="form-control blur" maxlength="10"
                                        name="mobilefreeadvice1" id="mobilefreeadvice1" placeholder="Enter Mobile No"
                                        {{-- required="" --}} required pattern="[6-9]{1}[0-9]{9}">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <img src="https://www.franchiseindia.com/images/pincode.png"
                                            alt="pincode"></span>
                                    <input type="text" name="pincodefreeadvice1" id="pincodefreeadvice1"
                                        class="form-control blur" maxlength="6" placeholder="Enter Pincode">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon height80">
                                        <img src="https://www.franchiseindia.com/images/addreess.png" alt="address">
                                    </span>
                                    <textarea class="form-control height80 blur" name="detailsfreeadvice1" id="detailsfreeadvice1"
                                        placeholder="Enter Details"></textarea>
                                </div>
                                <div class="form-group mt-4 mb-4">
                                    <div class="captcha">
                                        <span>{!! captcha_img() !!}</span>
                                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                                            &#x21bb;
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <input id="captcha" type="text" class="form-control"
                                        placeholder="Enter Captcha" name="captcha">
                                  <span class="text-danger" id="captcha-error"></span>
                                    {{-- <br> --}}
                                    {{-- <span class="text-danger">hello</span> --}}
                                </div>


                                <div class="checkbox rm-prop">
                                    <label>
                                        <input type="checkbox" name="is_newsletterfreeadvice1"
                                            id="is_newsletterfreeadvice1" value="1" checked=""> Yes, i
                                        want to subscribe for weekly Newsletter
                                    </label>
                                </div>
                                <div class="checkbox rm-prop">
                                    <label>
                                        <input type="checkbox" name="is_termsagree1" id="is_termsagree1"
                                            value="1" checked="">
                                        I agree to the <a href="https://www.franchiseindia.com/terms"
                                            target="_blank">Terms &amp; Conditions</a>
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 txt-center" id="sub">
                                        <input type="submit" class="btn btn-default btn-red"
                                            value="Ask Our Experts">
                                    </div>

                                     {{-- <div class="col-xs-12 col-sm-12 col-md-12 txt-center" id="wait" style="display: none">
                                        <input type="submit" class="btn btn-default btn-red"
                                            value="Please wait...">
                                    </div> --}}
                                    
                                </div>
                            </div>
                        </form>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
@endif
<!-- Login/ Registration Model End-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
 <!--  above jquery version is affecting jquery 3.1 and causing error on price range slider  -->

<script type="text/javascript">
    $('#reload').click(function() {
        // console.log('called');
        var endpoint = '/reload-captcha';
        var baseUrl = '{{ Config('constants.MainDomain') }}';
        // console.log(baseUrl);
        // Construct the full URL
        var fullUrl = baseUrl + endpoint;
        $.ajax({
            type: 'GET',
            url: fullUrl,
            success: function(data) {
                // console.log('yes');
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#catpagepopup').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submit
            $('#sub input[type="submit"]').val('Please wait...');
            var formData = $(this).serialize(); // Collect all form inputs
       
            $.ajax({
                type: 'POST',
                url: '{{ route('form.submithome2') }}',
                data: formData,
                success: function(response) {
                    // alert("Form submitted successfully!");
                    $('#catpagepopup')[0].reset();
                    $('#reload').click(); // reload captcha
                    $('.error-message').text(''); // clear all errors
                     window.location = "/thanks-advice-form";
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $('.error-message').text(''); // clear old errors

                        $.each(errors, function(key, value) {
                            $('#' + key + '-error').text(value[
                                0]); // show error below each field
                        });
                        $('#sub input[type="submit"]').val('Ask Expert');
                      
                    } else {
                        alert("An unexpected error occurred.");
                        $('#sub input[type="submit"]').val('Ask Expert');
                        
                    }
                }
            });

        });

        // Reload CAPTCHA image
        $('#reload').click(function() {  
            $.ajax({
                type: 'GET',
                url: '/reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    });
</script>