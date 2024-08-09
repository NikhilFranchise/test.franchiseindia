@if (request()->segment(1) == 'hi')
    <div class="modal fade lg-panel formsection in" id="login-pnl" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                    <div class="frgt-pwd" id="frg-pnl" style="display:none">
                        <div class="ttl">पासवर्ड भूल गए</div>
                        <div class="desc">
                            अपना ईमेल पता दर्ज करें जो आपके साथ जुड़ा हो
                            फ्रेंचाइजी खाता और हम आपको एक लिंक भेजेंगे
                            अपना पासवर्ड रीसेट करने के लिए।
                        </div>
                        <div class="frm-pnl">
                            <form class="form-horizontal" method="POST"
                                action="https://www.franchiseindia.com/password/email">
                                @csrf
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <div class="usersprite"></div>
                                    </span>
                                    <input id="email" type="email" class="form-control blur" name="email"
                                        placeholder="ईमेल-आईडी दर्ज करें" value="" required="">
                                </div>
                                <button type="submit" class="btn btn-default btn-gry btn-prop">पासवर्ड
                                    रीसेट</button> <span class="pipe">|</span> <a class="frg-link" href="#"
                                    onclick="lg_panel()">लॉग इन</a>
                            </form>
                        </div>
                    </div>
                    <div id="lg-pnl" style="display:block">
                        <ul class="nav nav-tabs" role="tablist">
                            <li id="loginactiveopen"><a href="#login" aria-controls="login" role="tab"
                                    data-toggle="tab" id="loginactive">लॉग इन</a></li>
                            <li id="registeractiveopen" class="active"><a href="#register" aria-controls="register"
                                    role="tab" data-toggle="tab" id="registeractive"
                                    aria-expanded="true">रजिस्टर</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane" id="login">
                                <form method="post" action="{{ Config('constants.MainDomain') }}/loginform">
                                    @csrf
                                    <div class="frm-pnl">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <div class="usersprite"></div>
                                            </span>
                                            <input type="text" class="form-control blur" name="email_or_mobile"
                                                id="email_or_mobile" placeholder="ईमेल-आईडी या मोबाइल नंबर दर्ज करें"
                                                onkeyup="checkInputType()">

                                            <span class="vrfy" onclick="editMobileWider()" id="edit-mobile-wider"
                                                style="display:none">Edit</span>
                                            <span class="vrfy" onclick="validateLoginMobileOTP()" id="get_otp_btn"
                                                style="display:none">Get OTP</span>
                                            <div style="display:none; color:red;" id="mismatch-mob">यह मोबाइल नंबर
                                                पंजीकृत नहीं है|</div>
                                        </div>
                                        <div class="input-group" id="password_group">
                                            <span class="input-group-addon">
                                                <div class="pwdsprite"></div>
                                            </span>
                                            <input type="password" name="password" class="form-control blur"
                                                placeholder="पासवर्ड दर्ज करें">

                                        </div>
                                        <div class="input-group" id="otp-block-wider" style="display: none;">
                                            <span class="input-group-addon">
                                                <div class="otpsprite"></div>
                                            </span>
                                            <input type="text" name="otp" id="otp-insta-wider" maxlength="4"
                                                class="form-control blur" placeholder="Enter OTP">

                                            <div style="display:none; color:red;" id="mismatch-otp">Mismatch OTP</div>
                                            <span class="vrfy" id="resend_otp" onclick="resendOTP()"
                                                style="display:none">Resend
                                                OTP</span>
                                            <span class="vrfy" id="otp_timer"></span>
                                        </div>
                                        <button type="submit" id="sign_in_btn"
                                            class="btn btn-default
                              btn-gry btn-prop">साइन
                                            इन </button>
                                        <span class="pipe">|</span> <a class="frg-link" href="#"
                                            onClick="frg_panel()">पासवर्ड भूल गए</a>
                                    </div>
                                </form>
                                <div class="popfi">
                                    <div class="signpop"></div>
                                    <div class="popleft">
                                        <span>या साइन इन करें</span>
                                        <ul class="socl">
                                            <li><a href="{{ config('constants.MainDomain') }}/auth/google"><img
                                                        src="{{ url('newhomepage/assets/img/google.svg') }}"
                                                        alt="google" class="" /></a></li>
                                        </ul>
                                    </div>
                                    <div class="popright">नया उपयोगकर्ता <a href="#" id="loginselect1">यहाँ
                                            क्लिक करें</a>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane active" id="register">
                                <form class="form-horizontal" id="registration">
                                    <div class="frm-pnl">
                                        <div style="text-align:center">
                                            <div><a href="{{ Config('constants.MainDomain') }}/investor/create"
                                                    class="btn btn-large btn-default
                                 btn-gry btn-prop">आज
                                                    ही बिजनेस शुरू करें <br /><span>(इन्वेस्टर
                                                        पंजीकरण) </span> </a>
                                            </div>
                                            <br>
                                            <div><a href="{{ Config('constants.MainDomain') }}/franchisor/registration/step/1"
                                                    class="btn btn-large btn-default
                                 btn-gry btn-prop">चैनल
                                                    पार्टनर नियुक्त करें <br /><span> (फ्रैंचाइज़र
                                                        पंजीकरण)</span></a>
                                            </div>
                                            <br>
                                            <div><a href="{{ Config('constants.MainDomain') }}/franchisor/international-registration"
                                                    class="btn btn-large btn-default
                                 btn-gry btn-prop">चैनल
                                                    पार्टनर नियुक्त करें <br /><span> (अंतरराष्ट्रीय फ्रैंचाइज़र
                                                        पंजीकरण)</span></a>
                                            </div>
                                            <br>
                                            <div><a target="_blank"
                                                    href="{{ Config('constants.MainDomain') }}/property-loan"
                                                    class="btn btn- large
                                 btn-default btn-gry btn-prop">संपत्ति
                                                    के खिलाफ ऋण </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="popfi regspace">
                                    <div class="signpop"></div>
                                    पंजीकृत उपयोगकर्ता <a href="#" id="registerselect1">यहां लॉगिन करें</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="footer-ttl">हमें रजिस्टर क्यों करना चाहिए ?</div>
                    <div class="footer-desc">
                        <p>दस हजार से अधिक फ्रैंचाइज बिजनेस अवसरों तक पहुंच हो जाएगी।</p>
                        <p> तेजी से विकास कर रहे कारोबारी समुदाय से नेटवर्किंग का मौका मिलेगा। इससे फ्रेंचाइजिंग के
                            माध्यम से सीखने और कारोबार बढ़ाने के लिए विशेषज्ञों की राय मिल सकेगी।
                        </p>
                    </div>
                </div>
            </div>
            <div id="lg-pnl" style="display:block">
               <ul class="nav nav-tabs" role="tablist">
                  <li id="loginactiveopen"><a href="#login" aria-controls="login" role="tab"
                     data-toggle="tab" id="loginactive">लॉग इन</a></li>
                  <li id="registeractiveopen" class="active"><a href="#register" aria-controls="register"
                     role="tab" data-toggle="tab" id="registeractive"
                     aria-expanded="true">रजिस्टर</a></li>
               </ul>
               <div class="tab-content">
                  <div role="tabpanel" class="tab-pane" id="login">
                     <form method="post" action="{{ Config('constants.MainDomain') }}/loginform">
                        @csrf
                        {{--  <input type="hidden" name="_token" value="{{ csrf_token() }}">  --}}
                        <div class="frm-pnl">
                           <div class="input-group">
                              <span class="input-group-addon">
                                 <div class="usersprite"></div>
                              </span>
                              <input type="email"
                                 class="form-control
                                 blur"
                                 required="" name="email" placeholder="ईमेल-आईडी दर्ज करें">
                           </div>
                           <div class="input-group">
                              <span class="input-group-addon">
                                 <div class="pwdsprite"></div>
                              </span>
                              <input type="password" required="" name="password"
                                 class="form-control blur" placeholder="पासवर्ड दर्ज करें">
                           </div>
                           <button type="submit"
                              class="btn btn-default
                              btn-gry btn-prop">साइन
                           इन </button>
                           <span class="pipe">|</span> <a class="frg-link" href="#"
                              onClick="frg_panel()">पासवर्ड भूल गए</a>
                        </div>
                     </form>
                     <div class="popfi">
                        <div class="signpop"></div>
                        <div class="popleft">
                           <span>या साइन इन करें</span>
                           <ul class="socl">
                              <li><a href="{{ config('constants.MainDomain') }}/auth/google"><img
                                 src="{{ url('newhomepage/assets/img/google.svg') }}"
                                 alt="google" class="" /></a></li>
                           </ul>
                        </div>
                        <div class="popright">नया उपयोगकर्ता <a href="#" id="loginselect1">यहाँ
                           क्लिक करें</a>
                        </div>
                     </div>
                  </div>
                  <div role="tabpanel" class="tab-pane active" id="register">
                     <form class="form-horizontal" id="registration">
                        <div class="frm-pnl">
                           <div style="text-align:center">
                              <div><a href="{{ Config('constants.MainDomain') }}/investor/create"
                                 class="btn btn-large btn-default
                                 btn-gry btn-prop">आज
                                 ही बिजनेस शुरू करें <br /><span>(इन्वेस्टर
                                 पंजीकरण) </span> </a>
                              </div>
                              <br>
                              <div><a href="{{ Config('constants.MainDomain') }}/franchisor/registration/step/1"
                                 class="btn btn-large btn-default
                                 btn-gry btn-prop">चैनल
                                 पार्टनर नियुक्त करें <br /><span> (फ्रैंचाइज़र
                                 पंजीकरण)</span></a>
                              </div>
                              <br>
                              <div><a href="{{ Config('constants.MainDomain') }}/franchisor/international-registration"
                                 class="btn btn-large btn-default
                                 btn-gry btn-prop">चैनल
                                 पार्टनर नियुक्त करें <br /><span> (अंतरराष्ट्रीय फ्रैंचाइज़र
                                 पंजीकरण)</span></a>
                              </div>
                              <br>
                              <div><a target="_blank"
                                 href="{{ Config('constants.MainDomain') }}/property-loan"
                                 class="btn btn- large
                                 btn-default btn-gry btn-prop">संपत्ति
                                 के खिलाफ ऋण </a>
                              </div>
                           </div>
                        </div>
                     </form>
                     <div class="popfi regspace">
                        <div class="signpop"></div>
                        पंजीकृत उपयोगकर्ता <a href="#" id="registerselect1">यहां लॉगिन करें</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <div class="footer-ttl">हमें रजिस्टर क्यों करना चाहिए ?</div>
            <div class="footer-desc">
               <p>दस हजार से अधिक फ्रैंचाइज बिजनेस अवसरों तक पहुंच हो जाएगी।</p>
               <p> तेजी से विकास कर रहे कारोबारी समुदाय से नेटवर्किंग का मौका मिलेगा। इससे फ्रेंचाइजिंग के
                  माध्यम से सीखने और कारोबार बढ़ाने के लिए विशेषज्ञों की राय मिल सकेगी।
               </p>
            </div>
         </div>
      </div>
   </div>
</div>
@else
    <div class="modal fade lg-panel formsection in" id="login-pnl" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                    <div class="frgt-pwd" id="frg-pnl" style="display:none">
                        <div class="ttl">Forgot Password</div>
                        <div class="desc">
                            Enter your email address associated with your
                            Franchiseindia account and we will send you a link
                            to reset your password.
                        </div>
                        <div class="frm-pnl">
                            <form class="form-horizontal" method="POST"
                                action="{{ Config('constants.MainDomain') }}/password/email">
                                @csrf
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <div class="usersprite"></div>
                                    </span>
                                    <input id="email" type="email" class="form-control blur" name="email"
                                        placeholder="Enter Email-Id" value="" required="">
                                </div>
                                <button type="submit" class="btn btn-default btn-gry btn-prop">Reset
                                    Password</button> <span class="pipe">|</span> <a class="frg-link"
                                    href="#" onclick="lg_panel()">Login</a>
                            </form>
                        </div>
                    </div>
                    <div id="lg-pnl" style="display:block">
                        <ul class="nav nav-tabs" role="tablist">
                            <li id="loginactiveopen"><a href="#login" aria-controls="login" role="tab"
                                    data-toggle="tab" id="loginactive">LOGIN</a></li>
                            <li id="registeractiveopen" class="active"><a href="#register" aria-controls="register"
                                    role="tab" data-toggle="tab" id="registeractive"
                                    aria-expanded="true">REGISTER</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane" id="login">
                                <form method="post" action="{{ Config('constants.MainDomain') }}/loginform">
                                    @csrf
                                    <div class="frm-pnl">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <div class="usersprite"></div>
                                            </span>

                                            <input type="text" class="form-control blur" required=""
                                                name="email_or_mobile" id="email_or_mobile"
                                                placeholder="Enter Your User ID or Mobile Number"
                                                onkeyup="checkInputType()">

                                            <span class="vrfy" onclick="editMobileWider()" id="edit-mobile-wider"
                                                style="display:none">Edit</span>
                                            <span class="vrfy" onclick="validateLoginMobileOTP()" id="get_otp_btn"
                                                style="display:none">Get OTP</span>
                                            <div style="display:none; color:red;" id="mismatch-mob">This mobile number
                                                is not registered</div>
                                        </div>
                                        <div class="input-group" id="password_group">
                                            <span class="input-group-addon">
                                                <div class="pwdsprite"></div>
                                            </span>
                                            <input type="password" name="password" class="form-control blur"
                                                placeholder="Enter Your Password">
                                        </div>

                                        <div class="input-group" id="otp-block-wider" style="display: none;">
                                            <span class="input-group-addon">
                                                <div class="otpsprite"></div>
                                            </span>
                                            <input type="text" name="otp" id="otp-insta-wider" maxlength="4"
                                                class="form-control blur" placeholder="Enter OTP">

                                            <div style="display:none; color:red;" id="mismatch-otp">Mismatch OTP</div>
                                            <span class="vrfy" id="resend_otp" onclick="resendOTP()"
                                                style="display:none">Resend
                                                OTP</span>
                                            <span class="vrfy" id="otp_timer"></span>
                                        </div>

                                        <button type="submit" id="sign_in_btn"
                                            class="btn btn-default btn-gry btn-prop">SIGN IN</button>
                                        <span class="pipe">|</span> <a class="frg-link" href="#"
                                            onClick="frg_panel()">Forgot
                                            Password</a>
                                    </div>
                                </form>
                                <div class="popfi">
                                    <div class="signpop"></div>
                                    <div class="popleft">
                                        <span>or Sign in With</span>
                                        <ul class="socl">
                                            <li><a href="{{ config('constants.MainDomain') }}/auth/google"><img
                                                        src="{{ url('newhomepage/assets/img/google.svg') }}"
                                                        alt="google" class="" /></a></li>
                                        </ul>
                                    </div>
                                    <div class="popright">New User <a href="#" id="loginselect1">Click here</a>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane active" id="register">
                                <form class="form-horizontal" id="registration">
                                    <div class="frm-pnl">
                                        <div style="text-align:center">
                                            <div><a href="{{ Config('constants.MainDomain') }}/investor/create"
                                                    class="btn btn-large btn-default
                                 btn-gry btn-prop">
                                                    Start A Business
                                                    Today <br /><span>(Investor
                                                        Registration) </span> </a>
                                            </div>
                                            <br>
                                            <div><a href="{{ Config('constants.MainDomain') }}/franchisor/registration/step/1"
                                                    class="btn btn-large btn-default
                                 btn-gry btn-prop">Appoint
                                                    Channel
                                                    Partners <br /><span> (Franchisor
                                                        Registration) </span></a>
                                            </div>
                                            <br>
                                            <div><a href="{{ Config('constants.MainDomain') }}/franchisor/international-registration"
                                                    class="btn btn-large btn-default
                                 btn-gry btn-prop">Appoint
                                                    Channel
                                                    Partners <br /><span> (International Franchisor Registration)
                                                    </span></a>
                                            </div>
                                            <br>
                                            <div><a target="_blank"
                                                    href="{{ Config('constants.MainDomain') }}/property-loan"
                                                    class="btn btn- large
                                 btn-default btn-gry btn-prop">Loan
                                                    Against Property </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="popfi regspace">
                                    <div class="signpop"></div>
                                    Registered User <a href="#" id="registerselect1">Login here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="footer-ttl">Why should I register?</div>
                    <div class="footer-desc">
                        <p>To get access to over 10000+ Franchise Business
                            Opportunities.
                        </p>
                        <p>Network with the growing Business Community to get
                            expert interventions to let you learn to Grow
                            &amp; Expand your Business with Franchising.
                        </p>
                    </div>
                </div>
            </div>
            <div id="lg-pnl" style="display:block">
               <ul class="nav nav-tabs" role="tablist">
                  <li id="loginactiveopen"><a href="#login" aria-controls="login" role="tab"
                     data-toggle="tab" id="loginactive">LOGIN</a></li>
                  <li id="registeractiveopen" class="active"><a href="#register" aria-controls="register"
                     role="tab" data-toggle="tab" id="registeractive"
                     aria-expanded="true">REGISTER</a></li>
               </ul>
               <div class="tab-content">
                  <div role="tabpanel" class="tab-pane" id="login">
                     <form method="post" action="{{ Config('constants.MainDomain') }}/loginform">
                        @csrf
                        {{--  <input type="hidden" name="_token" value="{{ csrf_token() }}">  --}}
                        <div class="frm-pnl">
                           <div class="input-group">
                              <span class="input-group-addon">
                                 <div class="usersprite"></div>
                              </span>
                              {{-- <input type="email"   class="form-control blur" required="" name="email" placeholder="Enter Your User ID"> --}}
                              <input type="text" class="form-control blur" required=""
                                 name="email_or_mobile" id="email_or_mobile"
                                 placeholder="Enter Your User ID or Mobile Number"
                                 onkeyup="checkInputType()">
                                 {{-- <span class="vrfy" onclick="editMobileWider()" id="edit-mobile-wider"
                                style="display:none">edit</span>

                              <span class="btn btn-default btn-gry btn-prop"
                                 onclick="validateMobileOTP()" id="get_otp_btn"
                                 style="display:none">Get OTP</span> --}}
                                 <span class="vrfy" onclick="editMobileWider()" id="edit-mobile-wider"
                                style="display:none">edit</span>
                            <span class="vrfy" onclick="validateMobileWider()" id="validate-mobile-contact"
                                style="display:none">VERIFY</span>
                            <span id="success-mobile-wider" class="showhideright" style="display:none"><i
                                    class="fa fa-check fa-lg" aria-hidden="true"></i></span>
                           </div>
                           <div class="input-group" id="password_group">
                              <span class="input-group-addon">
                                 <div class="pwdsprite"></div>
                              </span>
                              <input type="password" required="" name="password"
                                 class="form-control blur" placeholder="Enter Your Password">
                           </div>
                           <div class="input-group" id="otp_group" style="display: none;">
                            <span class="input-group-addon">
                               <div class="otpsprite"></div>
                            </span>
                            <input type="number" required="" name="otp" id="otp"
                               class="form-control blur" placeholder="Enter Your OTP">
                               <span class="vrfy" onclick="validateMobileWider()" id="validate-mobile-contact"
                                style="display:none">VERIFY</span>
                         </div>
                           {{-- <button type="button" id="get_otp_btn" class="btn btn-default btn-gry btn-prop" style="display: none;">Get OTP</button> --}}
                           <button type="submit" id="sign_in_btn"
                              class="btn btn-default btn-gry btn-prop">SIGN IN</button>
                           {{-- <button type="submit" class="btn btn-default btn-gry btn-prop">SIGN IN</button> --}}
                           <span class="pipe">|</span> <a class="frg-link" href="#"
                              onClick="frg_panel()">Forgot
                           Password</a>
                        </div>
                     </form>
                     <div class="popfi">
                        <div class="signpop"></div>
                        <div class="popleft">
                           <span>or Sign in With</span>
                           <ul class="socl">
                              <li><a href="{{ config('constants.MainDomain') }}/auth/google"><img
                                 src="{{ url('newhomepage/assets/img/google.svg') }}"
                                 alt="google" class="" /></a></li>
                           </ul>
                        </div>
                        <div class="popright">New User <a href="#" id="loginselect1">Click here</a>
                        </div>
                     </div>
                  </div>
                  <div role="tabpanel" class="tab-pane active" id="register">
                     <form class="form-horizontal" id="registration">
                        <div class="frm-pnl">
                           <div style="text-align:center">
                              <div><a href="{{ Config('constants.MainDomain') }}/investor/create"
                                 class="btn btn-large btn-default
                                 btn-gry btn-prop">
                                 Start A Business
                                 Today <br /><span>(Investor
                                 Registration) </span> </a>
                              </div>
                              <br>
                              <div><a href="{{ Config('constants.MainDomain') }}/franchisor/registration/step/1"
                                 class="btn btn-large btn-default
                                 btn-gry btn-prop">Appoint
                                 Channel
                                 Partners <br /><span> (Franchisor
                                 Registration) </span></a>
                              </div>
                              <br>
                              <div><a href="{{ Config('constants.MainDomain') }}/franchisor/international-registration"
                                 class="btn btn-large btn-default
                                 btn-gry btn-prop">Appoint
                                 Channel
                                 Partners <br /><span> (International Franchisor Registration)
                                 </span></a>
                              </div>
                              <br>
                              <div><a target="_blank"
                                 href="{{ Config('constants.MainDomain') }}/property-loan"
                                 class="btn btn- large
                                 btn-default btn-gry btn-prop">Loan
                                 Against Property </a>
                              </div>
                           </div>
                        </div>
                     </form>
                     <div class="popfi regspace">
                        <div class="signpop"></div>
                        Registered User <a href="#" id="registerselect1">Login here</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <div class="footer-ttl">Why should I register?</div>
            <div class="footer-desc">
               <p>To get access to over 10000+ Franchise Business
                  Opportunities.
               </p>
               <p>Network with the growing Business Community to get
                  expert interventions to let you learn to Grow
                  &amp; Expand your Business with Franchising.
               </p>
            </div>
         </div>
      </div>
   </div>
</div>
@endif
<script>
    var otpInterval;

    function checkInputType() {
        var input = $('#email_or_mobile').val();
        var isEmail = validateEmail(input);

        if (isEmail) {
            $('#password_group').show();
            $('#get_otp_btn').hide();
            $('#sign_in_btn').prop('disabled', false);
        } else if (validateMobile(input)) {
            $('#password_group').hide();
            $('#get_otp_btn').show();
            $('#sign_in_btn').prop('disabled', true);
        } else {
            $('#password_group').show();
            $('#get_otp_btn').hide();
            $('#sign_in_btn').prop('disabled', false);
        }
    }

    function validateEmail(email) {
        var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    function validateMobile(mobile) {
        var re = /^\d{10}$/;
        return re.test(mobile);
    }

    function validateLoginMobileOTP() {
        var mobile = $('#email_or_mobile').val();
        $.ajax({
            type: 'get',
            url: '/login_verify_mobile',
            data: {
                mobile: mobile
            },
            success: function(data) {
                if (data.data == 0) {
                    $("#mismatch-mob").show();
                    $("#email_or_mobile").prop("readonly", true);
                    $("#sign_in_btn").prop("disabled", true);
                    $("#edit-mobile-wider").show();
                    $("#otp-block-wider").hide();
                    $("#get_otp_btn").hide();
                } else {
                    $("#mismatch-mob").hide();
                    $("#sign_in_btn").prop("disabled", false);
                    $("#edit-mobile-wider").show();
                    $("#otp-block-wider").show();
                    $("#get_otp_btn").hide();
                    startOTPTimer();
                }
            }
        });
    }

    function editMobileWider() {
        $("#email_or_mobile").prop("readonly", false);
        $("#edit-mobile-wider").hide();
        $("#otp-block-wider").hide();
        $("#sign_in_btn").prop("disabled", true);
        clearInterval(otpInterval);
        $('#otp_timer').hide();
        $('#resend_otp').hide();
    }

    function startOTPTimer() {
        var timer = 60;
        $('#resend_otp').hide();
        $('#otp_timer').show();

        otpInterval = setInterval(function() {
            if (timer > 0) {
                timer--;
                $('#otp_timer').text(timer + 's');
            } else {
                clearInterval(otpInterval);
                $('#otp_timer').hide();
                $('#resend_otp').show();
                $("#sign_in_btn").prop("disabled", true);
            }
        }, 1000);
    }

    function resendOTP() {
        clearInterval(otpInterval);
        var mobile = $('#email_or_mobile').val();
        startOTPTimer();
        validateLoginMobileOTP();
    }
</script>
