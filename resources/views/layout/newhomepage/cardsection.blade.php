<style>
    .error-border {
        border: 2px solid red;
    }

    .error-placeholder::placeholder {
        color: red;
    }
</style>
<section class="card-section section-30" id="card-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-m card-p-20">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="business-a">
                                        <a href="{{ url('investor/create') }}">
                                            @if (request()->segment(1) == 'hi')
                                                आज ही बिजनेस शुरू करें <span class="smallimp">(इन्वेस्टर
                                                    पंजीकरण)</span>
                                            @else
                                                Start A Business Today <span class="smallimp">(Investor
                                                    Registration)</span>
                                            @endif
                                            <i class="fas fa-chevron-right float-right
                                                icon-bar-main-fihl"
                                                aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="business-a">
                                        <a href="{{ url('franchisor/registration/step/1') }}">
                                            @if (request()->segment(1) == 'hi')
                                                चैनल पार्टनर नियुक्त करें <span class="smallimp">(फ्रैंचाइज़र
                                                    रजिस्ट्रेशन)</span>
                                            @else
                                                Appoint Channel partners <span class="smallimp">(Franchisor
                                                    Registration)</span>
                                            @endif
                                            <i class="fas fa-chevron-right float-right
                                                icon-bar-main-fihl"
                                                aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-12 pt-30">
                                    @if (request()->segment(1) == 'hi')
                                        <h4>हमें रजिस्टर क्यों करना चाहिए ? </h4>
                                        दस हजार से अधिक फ्रैंचाइज बिजनेस अवसरों तक पहुंच हो जाएगी। <br> <br>
                                        तेजी से विकास कर रहे कारोबारी समुदाय से नेटवर्किंग का मौका मिलेगा। इससे
                                        फ्रेंचाइजिंग के माध्यम से सीखने और कारोबार बढ़ाने के लिए विशेषज्ञों की राय मिल
                                        सकेगी।
                                    @else
                                        <h4> Why Should I Register ?</h4>
                                        To get access to over 10000+ Franchise Business
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
                                    <div class="raido-main-section">
                                        <ul class="radio-main">
                                            <li>
                                                <div class="radio">
                                                    <label><input type="radio" name="optionsRadios"
                                                            id="optionsRadios3" checked value="franchisor">
                                                        {{ Request::segment(1) == 'hi' ? 'अपने ब्रांड का विस्तार करें' : 'Expand My Brand' }}
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="radio">
                                                    <label><input type="radio" name="optionsRadios"
                                                            id="optionsRadios1" value="investor">
                                                        {{ Request::segment(1) == 'hi' ? 'फ्रैंचाइज़ खरीदें' : 'Buy a Franchise' }}</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="input-group mb-15">
                                        <span class="input-group-addon">
                                            <div class="icon-section-main"><img
                                                    src="{{ url('newhomepage/assets/img/email.png') }}"
                                                    alt="email-icon">
                                            </div>
                                        </span>
                                        <input type="email" class="form-control blur" required=""
                                            name="emailfreeadvice" id="emailfreeadvice" class="form-control"
                                            placeholder="{{ Request::segment(1) == 'hi' ? 'ईमेल दर्ज करें' : 'Enter Email' }}">
                                    </div>
                                    <div class="input-group mb-15">
                                        <span class="input-group-addon">
                                            <div class="icon-section-main"><img
                                                    src="{{ url('newhomepage/assets/img/phone.png') }}"
                                                    alt="phone-icon">
                                            </div>
                                        </span>
                                        <input type="text" class="form-control blur" maxlength="10"
                                            name="mobilefreeadvice" id="mobilefreeadvice"
                                            placeholder="{{ Request::segment(1) == 'hi' ? 'मोबाइल नंबर दर्ज करें' : 'Enter Mobile No' }}"
                                            required="">
                                    </div>
                                    <div id="askMsg" style="display:none;">
                                        <div class="green">
                                            {{ Request::segment(1) == 'hi' ? 'नि: शुल्क सलाह के लिए जानकारी जमा करने के लिए धन्यवाद!' : 'Thank You for Submitting information for Free Advice!' }}
                                        </div>
                                    </div>
                                    <button type="button"
                                        class="btn
                                             btn-main"
                                        id="btnhome">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
