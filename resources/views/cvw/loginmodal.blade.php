@if  (request()->segment(1) == 'hi')
<div class="modal fade lg-panel formsection" id="login-pnl" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span>
            </button>

            <!-- Nav tabs -->
            <div class="frgt-pwd" id="frg-pnl" style="display:none;">
                <div class="ttl singlehindi">पासवर्ड भूल गए</div>
                <div class="desc singlehindi">
                    अपने फ्रेंचाइजीडिया खाते से जुड़े अपना ईमेल पता दर्ज करें और हम आपको एक लिंक भेजेंगे अपना
                    पासवर्ड रीसेट करने के लिए।
                </div>
                <div class="frm-pnl">
                    <form class="form-horizontal" method="POST"
                        action="{{ Config('constants.MainDomain') }}/password/email">
                        <input type ="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <div class="usersprite"></div>
                            </span>

                            <input id="email" type="email" class="form-control" name="email"
                                placeholder="Enter Email-Id" value="" required>
                        </div>
                        <button type="submit" class="btn btn-default btn-gry btn-prop">पासवर्ड रीसेट</button>
                        <span class="pipe">|</span> <a class="frg-link" href="#"
                            onclick="lg_panel()">लॉगिन </a>
                    </form>

                </div>
            </div>
            <div id="lg-pnl" style="display:block;">
                <ul class="nav nav-tabs" role="tablist">
                    <li id="loginactiveopen"><a href="#login" aria-controls="login" role="tab"
                            data-toggle="tab" id="loginactive">लॉगिन </a></li>
                    <li id="registeractiveopen"><a href="#register" aria-controls="register" role="tab"
                            data-toggle="tab" id="registeractive">रजिस्टर </a></li>
                </ul>
                <!-- Tab panes -->
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
                                        style="display:none">एडिट</span>
                                    <span class="vrfy" onclick="validateLoginMobileOTP()" id="get_otp_btn"
                                        style="display:none">ओटीपी भेजें</span>
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
                                <div class="input-group" id="otp-block-wider" style="display: none;width:100%;">
                                    <input type="text" name="otp" id="otp-insta-wider" maxlength="4"
                                        class="form-control blur" placeholder="ओटीपी दर्ज करें">

                                    <span class="vrfy" id="resend_otp" onclick="resendOTP()"
                                        style="display:none">ओटीपी पुनः भेजें</span>
                                    <span class="vrfy" id="otp_timer"></span>
                                </div>
                                <button type="submit" id="sign_in_btn"
                                    class="btn btn-default btn-gry btn-prop">साइन
                                    इन </button>
                                <span class="pipe">|</span> <a class="frg-link" href="#"
                                    onClick="frg_panel()">पासवर्ड भूल गए</a>
                            </div>
                        </form>

                        <div class="popfi">
                            <div class="signpop"></div>
                            <div class="popleft">
                                <span>या सोशल मीडिया के साथ साइन इन करें</span>
                                <ul class="socl">
                                    {{-- <li><a href="{{ Config('constants.MainDomain') }}/auth/facebook"><i
                                                class="fa fa-facebook fa-lg" aria-hidden="true"></i></a></li> --}}
                                    <li><a href="{{ Config('constants.MainDomain') }}/auth/google"><i
                                               aria-hidden="true"></i>
                                                <img src="https://www.franchiseindia.com/newhomepage/assets/img/google.svg" alt="google" class="">
                                            </a></li>

                                </ul>
                            </div>
                            <div class='popright'>नया उपयोगकर्ता <a href="#" id="loginselect1">यहां क्लिक
                                    करे</a></div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="register">
                        <form class="form-horizontal" id="registration">
                            <div class="frm-pnl">
                                <div style="text-align:center">
                                    <div><a href="https://www.franchiseindia.com/investor/create" class="btn btn-large btn-default btn-gry btn-prop">Start A Business Today<br><span>(Investor Registration)</span></a></div><br>
                                    <div><a href="https://www.franchiseindia.com/franchisor/registration/step/1" class="btn btn-large btn-default btn-gry btn-prop">Appoint Channel Partners<br><span>(Franchisor Registration)</span></a></div><br>
                                    <div><a href="https://www.franchiseindia.com/franchisor/international-registration" class="btn btn-large btn-default btn-gry btn-prop">Appoint Channel Partners<br><span>(International Franchisor Registration)</span></a></div><br>
                                    <div><a target="_blank" href="https://www.franchiseindia.com/property-loan" class="btn btn- large btn-default btn-gry btn-prop">Loan Against Property</a></div>
                                </div>
                            </div>
                        </form>
                        <div class="popfi regspace">
                            <div class="signpop"></div>Registered User<a href="#" id="registerselect1">Login here</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="footer-ttl singlehindi">मुझे पंजीकरण क्यों करना चाहिए?</div>
            <div class="footer-desc singlehindi">
                <p>10000 से अधिक फ़्रैंचाइज़ी व्यापार अवसरों तक पहुंच प्राप्त करने के लिए।</p>
                <p>फ्रैंचाइजींग के साथ अपने व्यवसाय को बढ़ाना और विस्तार करना सीखने के लिए विशेषज्ञ हस्तक्षेप
                    प्राप्त करने के लिए बढ़ते व्यापार समुदाय के साथ नेटवर्क।</p>
            </div>
        </div>
    </div>
</div>
</div>


@else
<div class="modal fade lg-panel formsection" id="login-pnl" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span>
        </button>

        <!-- Nav tabs -->
        <div class="frgt-pwd" id="frg-pnl" style="display:none;">
            <div class="ttl">Forgot Password</div>
            <div class="desc">
                Enter your email address associated with your Franchiseindia account and we will send you a
                link
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

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input id="email" type="email" class="form-control" name="email"
                            placeholder="Enter Email-Id" value="" required>
                    </div>
                    <button type="submit" class="btn btn-default btn-gry btn-prop">Reset
                        Password</button> <span class="pipe">|</span> <a class="frg-link"
                        href="#" onClick="lg_panel()">Login</a>
                </form>

            </div>
        </div>
        <div id="lg-pnl" style="display:block;">
            <ul class="nav nav-tabs" role="tablist">
                <li id="loginactiveopen"><a href="#login" aria-controls="login" role="tab"
                        data-toggle="tab" id="loginactive">LOGIN</a></li>
                <li id="registeractiveopen"><a href="#register" aria-controls="register" role="tab"
                        data-toggle="tab" id="registeractive">REGISTER</a></li>
            </ul>
            <!-- Tab panes -->
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
                                </div>
                                <div style="display:none; color:red;" id="mismatch-mob" class="login-pnl-error">This mobile number
                                    is not registered.</div>
                            <div class="input-group" id="password_group">
                                <span class="input-group-addon">
                                    <div class="pwdsprite"></div>
                                </span>
                                <input type="password" name="password" class="form-control blur"
                                    placeholder="Enter Your Password">
                            </div>

                            <div class="input-group" id="otp-block-wider" style="display: none;width:100%;">
                                <input type="text" name="otp" id="otp-insta-wider" maxlength="4"
                                    class="form-control blur" placeholder="Enter OTP" style="width:100%;">
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
                                {{-- <li><a href="{{ Config('constants.MainDomain') }}/auth/facebook"><i
                                            class="fa fa-facebook fa-lg" aria-hidden="true"></i></a></li> --}}
                                <li><a href="{{ Config('constants.MainDomain') }}/auth/google"><i
                                           aria-hidden="true"></i>
                                            <img src="https://www.franchiseindia.com/newhomepage/assets/img/google.svg" alt="google" class="">
                                        </a></li>
                                {{-- <li><a href="{{Config('constants.MainDomain')}}/auth/linkedin"><i class="fa fa-linkedin fa-lg" aria-hidden="true"></i></a></li> --}}
                            </ul>
                        </div>
                        <div class='popright'>New User <a href="#" id="loginselect1">Click here</a>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="register">
                    <form class="form-horizontal" id="registration">
                        <div class="frm-pnl">
                            <div style="text-align:center">
                                <div><a href="https://www.franchiseindia.com/investor/create" class="btn btn-large btn-default btn-gry btn-prop">Start A Business Today<br><span>(Investor Registration)</span></a></div><br>
                                <div><a href="https://www.franchiseindia.com/franchisor/registration/step/1" class="btn btn-large btn-default btn-gry btn-prop">Appoint Channel Partners<br><span>(Franchisor Registration)</span></a></div><br>
                                <div><a href="https://www.franchiseindia.com/franchisor/international-registration" class="btn btn-large btn-default btn-gry btn-prop">Appoint Channel Partners<br><span>(International Franchisor Registration)</span></a></div><br>
                                <div><a target="_blank" href="https://www.franchiseindia.com/property-loan" class="btn btn- large btn-default btn-gry btn-prop">Loan Against Property</a></div>
                            </div>
                        </div>
                    </form>
                    <div class="popfi regspace">
                        <div class="signpop"></div>Registered User<a href="#" id="registerselect1">Login here</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <div class="footer-ttl">Why should I register?</div>
        <div class="footer-desc">
            <p>To get access to over 10000+ Franchise Business Opportunities.</p>
            <p>Network with the growing Business Community to get expert interventions to let you learn to
                Grow
                & Expand your Business with Franchising.</p>
        </div>
    </div>
</div>
</div>
</div>
@endif



{{-- <div class="modal fade lg-panel formsection in" id="login-pnl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <div class="frgt-pwd" id="frg-pnl" style="display:none">
                    <div class="ttl">Forgot Password</div>
                    <div class="desc">Enter your email address associated with your Franchiseindia account and we'll send you a link to reset your password.</div>
                    <div class="frm-pnl">
                        <form class="form-horizontal" method="POST" action="{{ Config('constants.MainDomain') }}/password/email">
                            @csrf
                            <div class="input-group"><span class="input-group-addon"><div class="usersprite"></div></span>
                            <input id="email" type="email" class="form-control blur"
                                    name="email" placeholder="Enter Email-Id" value="" required=""></div><button type="submit" class="btn btn-default btn-gry btn-prop">Reset Password</button><span class="pipe">|</span><a class="frg-link" href="#" onclick="lg_panel()">Login</a></form>
                    </div>
                </div>
                <div id="lg-pnl" style="display:block">
                    <ul class="nav nav-tabs" role="tablist">
                        <li id="loginactiveopen" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab" id="loginactive" aria-expanded="true">LOGIN</a></li>
                        <li id="registeractiveopen" class=""><a href="#register" aria-controls="register" role="tab" data-toggle="tab" id="registeractive" aria-expanded="false">REGISTER</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="login">
                            <form method="post" action="{{ Config('constants.MainDomain') }}/loginform">
                                @csrf
                                <div class="frm-pnl">
                                    <div class="input-group"><span class="input-group-addon"><div class="usersprite"></div></span><input type="email" class="form-control blur" required="" name="email" placeholder="Enter Your User ID"></div>
                                    <div class="input-group"><span class="input-group-addon"><div class="pwdsprite"></div></span><input type="password" required="" name="password" class="form-control blur" placeholder="Enter Your Password"></div><button type="submit" class="btn btn-default btn-gry btn-prop">SIGN IN</button>
                                    <span
                                        class="pipe">|</span><a class="frg-link" href="#" onclick="frg_panel()">Forgot Password</a></div>
                            </form>
                            <div class="popfi">
                                <div class="signpop"></div>
                                <div class="popleft"><span>or Sign in With</span>
                                    <ul class="socl">
                                        <li><a href="https://www.franchiseindia.com/auth/google"><img src="https://www.franchiseindia.com/newhomepage/assets/img/google.svg" alt="google" class=""></a></li>
                                    </ul>
                                </div>
                                <div class="popright">New User<a href="#" id="loginselect1">Click here</a></div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="register">
                            <form class="form-horizontal" id="registration">
                                <div class="frm-pnl">
                                    <div style="text-align:center">
                                        <div><a href="https://www.franchiseindia.com/investor/create" class="btn btn-large btn-default btn-gry btn-prop">Start A Business Today<br><span>(Investor Registration)</span></a></div><br>
                                        <div><a href="https://www.franchiseindia.com/franchisor/registration/step/1" class="btn btn-large btn-default btn-gry btn-prop">Appoint Channel Partners<br><span>(Franchisor Registration)</span></a></div><br>
                                        <div><a href="https://www.franchiseindia.com/franchisor/international-registration" class="btn btn-large btn-default btn-gry btn-prop">Appoint Channel Partners<br><span>(International Franchisor Registration)</span></a></div><br>
                                        <div><a target="_blank" href="https://www.franchiseindia.com/property-loan" class="btn btn- large btn-default btn-gry btn-prop">Loan Against Property</a></div>
                                    </div>
                                </div>
                            </form>
                            <div class="popfi regspace">
                                <div class="signpop"></div>Registered User<a href="#" id="registerselect1">Login here</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="footer-ttl">Why should I register?</div>
                <div class="footer-desc">
                    <p>To get access to over 20000+ Franchise Business Opportunities.</p>
                    <p>Network with the growing Business Community to get expert interventions to let you learn to Grow &amp; Expand your Business with Franchising.</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}
