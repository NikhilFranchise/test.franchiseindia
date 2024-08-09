@php
    $auth = new \Illuminate\Support\Facades\Auth();
    $catTab = 'active';
    $locTab = '';
    $invTab = '';
    if (isset($catTabResult)) {
        if ($locTabResult != 0 || $invTabResult != 0) {
            $catTab = '';
        }
    }
    if (isset($locTabResult)) {
        if ($locTabResult != 0) {
            $locTab = 'active';
        }
    }
    if (isset($invTabResult)) {
        if ($invTabResult != 0) {
            $invTab = 'active';
        }
    }
    $catArr = Config('constants.CategoryArr');
    asort($catArr);
    if (isset($mc)) {
        $subCat = Config('constants.subCategoryArr.' . $mc);
        if (!empty($subCat)) {
            asort($subCat);
        }
    }
    if (isset($mc) && !empty($mc) && !empty($sc)) {
        $subSubcat = Config('constants.subSubCategoryArr.' . $sc);
        if (!empty($subSubcat)) {
            asort($subSubcat);
        }
    }
    $states = Config('location.stateArr');
    asort($states);
    if (
        isset($loc[0]) &&
        is_array($loc) &&
        is_numeric($loc[0]) &&
        array_key_exists($loc[0], Config('location.cityArr'))
    ) {
        $cities = Config('location.cityArr.' . $loc[0]);
        asort($cities);
    }
    $loginUrl = Config('constants.MainDomain') . '/loginform';
    $loginName = 'Login';
    $class = '';
    $regName = 'Register';
    $regUrl = '#';
    $modelWindow = 'data-toggle=modal data-target=#login-pnl';
    if ($auth::check()) {
        $loginUrl = Config('constants.MainDomain') . '/logoutprofile';
        if (request()->user()->profile_type === config('constants.ProfileType.Franchisor')) {
            $regUrl = Config('constants.MainDomain') . '/franchisor/myaccount/dashboard';
        }
        if (request()->user()->profile_type === config('constants.ProfileType.Investor')) {
            $regUrl = Config('constants.MainDomain') . '/investor/myaccount/dashboard';
        }
        $loginName = 'Logout';
        $regName = 'My Account';
        $modelWindow = '';
        $class = 'mybtn';
    }
    $barndStick = 0;
    $googleSearchTop = 0;
    $gcodeurl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if (request()->segment(1) === 'brands' || (request()->segment(1) === 'hi' && request()->segment(2) === 'brands')) {
        $barndStick = 1;
    }
    $eduUrlSelected = '';
    $wellUrlSelected = '';
    $dotUrlSelected = '';
    $logo = 'logo-black.svg';
    $menuicon = 'menu-iconei.png';
    $logoClass = 'logo';
    $mainUrl = '';
    $webtitleUrl = request()->segment(1);
    $mangecls = '';
    if ($webtitleUrl == 'content') {
        $dotUrlSelected = 'class=dropactive';
    }
    if ($webtitleUrl == 'education') {
        $eduUrlSelected = 'class=dropactive';
        $logo = 'education-logo-black.svg';
        $menuicon = 'menu-iconei.png';
        $logoClass = 'logo wiei';
        $mainUrl = 'education';
        $mangecls = 'wiei';
    }
    if ($webtitleUrl == 'wellness') {
        $wellUrlSelected = 'class=dropactive';
        $logo = 'wellness-logo-black.svg';
        $menuicon = 'menu-iconwi.png';
        $logoClass = 'logo wiei';
        $mainUrl = 'wellness';
        $mangecls = 'wiei';
    }
    if (
        request()->segment(1) == 'franchisor' &&
        request()->segment(2) == 'registration' &&
        !empty(request()->session()->get('dealerForm')) &&
        request()->session()->get('dealerForm') == 'yes'
    ) {
        $menuicon = 'menu-iconei.png';
        $logo = '/dealers-india/dealer-logo.png';
    }
@endphp

@mobile
    @include('layout.newhomepage.mobile.header')
@endmobile
@notmobile
    @include('layout.newhomepage.header')
@endnotmobile
<div class="modal fade lg-panel formsection" id="login-pnl" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
                <div class="frgt-pwd" id="frg-pnl" style="display:none">
                    <div class="ttl">Forgot Password</div>
                    <div class="desc">
                        Enter your email address associated with your Franchiseindia account and we&apos;ll send you a
                        link
                        to reset your password.
                    </div>
                    <div class="frm-pnl">
                        <form class="form-horizontal" method="POST"
                            action="{{ Config('constants.MainDomain') }}/password/email">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <div class="usersprite"></div>
                                </span>
                                @csrf
                                <input id="email" type="email" class="form-control" name="email"
                                    placeholder="Enter Email-Id" value="" required>
                            </div>
                            <button type="submit" class="btn btn-default btn-gry btn-prop">Reset Password</button>
                            <span class="pipe">|</span> <a class="frg-link" href="#"
                                onclick="lg_panel()">Login</a>
                        </form>
                    </div>
                </div>
                <div id="lg-pnl" style="display:block">
                    <ul class="nav nav-tabs" role="tablist">
                        <li id="loginactiveopen"><a href="#login" aria-controls="login" role="tab"
                                data-toggle="tab" id="loginactive">LOGIN</a></li>
                        <li id="registeractiveopen"><a href="#register" aria-controls="register" role="tab"
                                data-toggle="tab" id="registeractive">REGISTER</a></li>
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
                                        <div style="display:none; color:red;" id="mismatch-mob" class="login-pnl-error">This mobile number
                                            is not registered.</div>
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
                                        <li><a href="{{ Config('constants.MainDomain') }}/auth/google"><i
                                                    class="fa fa-google fa-lg" aria-hidden="true"></i></a></li>
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
                                        <div><a href="{{ Config('constants.MainDomain') }}/investor/create"
                                                class="btn btn-large btn-default btn-gry btn-prop"> Start A Business
                                                Today <span>(Investor Registration) </span> </a></div>
                                        <br>
                                        <div><a href="{{ Config('constants.MainDomain') }}/franchisor/registration/step/1"
                                                class="btn btn-large btn-default btn-gry btn-prop">Appoint Channel
                                                Partners <span> (Franchisor Registration) </span></a></div>
                                        <br>
                                        <div><a href="{{ Config('constants.MainDomain') }}/franchisor/international-registration"
                                                class="btn btn-large btn-default btn-gry btn-prop">Appoint Channel
                                                Partners <span> (International Franchisor Registration) </span></a>
                                        </div>
                                        <br />
                                        <div><a target="_blank"
                                                href="{{ Config('constants.MainDomain') }}/property-loan"
                                                class="btn btn- large btn-default btn-gry btn-prop">Loan Against
                                                Property </a></div>
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
                    <p>To get access to over 10000+ Franchise Business Opportunities.</p>
                    <p>Network with the growing Business Community to get expert interventions to let you learn to Grow
                        & Expand your Business with Franchising.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@if ($_SERVER['REQUEST_URI'] != '/')
    <!--     <div class="banhsow">
        <span id="clickhidebtn" class="hide-cat-search" style="display:none"> Search Business Opportunities <i class="fa fa-plus-square-o" aria-hidden="true"></i></span>
        <span id="clickshowbtn" class="show-cat-search">Search Business Opportunities <i class="fa fa-minus-square-o" aria-hidden="true"></i></span>
    </div> -->
    <script language="javascript">
        /*<![CDATA[*/
        if (screen.width < 767) {
            $(document).ready(function() {
                setTimeout(function() {
                    $("#searchblk").slideUp(800);
                    $('#clickhidebtn').show();
                    $('#clickshowbtn').hide();
                }, 3000);
                $("#clickhidebtn").click(function() {
                    $("#searchblk").slideDown("slow");
                    $('#clickhidebtn').hide();
                    $('#clickshowbtn').show();
                });
                $("#clickshowbtn").click(function() {
                    $("#searchblk").slideUp("slow");
                    $('#clickhidebtn').show();
                    $('#clickshowbtn').hide();
                });
            });
        } /*]]>*/
    </script>
@endif
<script language="javascript">
    /*<![CDATA[*/
    function selectMax(selectmaxheaderval) {
        let amountConfigArr = {!! json_encode(Config('constants.investRangeInWordsSingle')) !!};
        let maxAmount = $('#maxAmount');
        let getSlugAmount = {!! json_encode(Config('constants.InvestRange')) !!};
        maxAmount.html("");
        selectmaxheaderval = parseInt(selectmaxheaderval);
        $.each(amountConfigArr, function(key, value) {
            if (key > selectmaxheaderval)
                $('#maxAmount').append($("<option></option>").attr({
                    "value": key,
                    "slug": getSlugAmount[key]['min']
                }).text(value));
        });
        if (selectmaxheaderval === 21)
            maxAmount.append($("<option></option>").attr("value", 21).text("Above"));
    }
    $(document).ready(function() {
        $('#searchoptnew').click(function() {
            $('.searchblknew').show(400);
            $('.searchspace').hide(400);
        });
        $('#closegsearch').click(function() {
            $('.searchspace').show(400);
            $('.searchblknew').hide(400);
        });
        if (screen.width > 1199 && screen.height <= 768)
            $(".gsc-wrapper").css({
                "max-height": "340px",
                "overflow": "auto"
            });
        $('#searchopt').click(function() {
            $('.open').click();
            $('.searchoption').toggle(400);
            return false;
        });
        $('#searchopt2').click(function() {
            $('.searchoption').hide(400);
        });
        $('.dropdown-toggle').click(function() {
            $('.searchoption').hide(400);
        });
    });
    $('#registerselect').click(function() {
        $('#registeractive').click();
    });
    $('#loginselect').click(function() {
        $('#loginactive').click();
    });
    $('#mobilereg').click(function() {
        $('#registeractive').click();
    });
    $('#registerselect1').click(function() {
        $('#login').addClass("active");
        $('#register').removeClass("active");
        $('#loginactiveopen').addClass("active");
        $('#registeractiveopen').removeClass("active");
    });
    $('#loginselect1').click(function() {
        $('#login').removeClass("active");
        $('#register').addClass("active");
        $('#loginactiveopen').removeClass("active");
        $('#registeractiveopen').addClass("active");
    });

    function getSubCategoryHeader(value) {
        $.ajax({
            type: 'GET',
            url: '/getsubcategory',
            data: {
                categoryID: value
            },
            success: function(data) {
                $("#getSubCategoryDataHeader").html(data);
            }
        });
    }

    function getSubCatCategoryHeader(value) {
        $.ajax({
            type: 'GET',
            url: '/getsubcatcategory',
            data: {
                subcategoryID: value
            },
            success: function(data) {
                $("#getSubCatCategoryDataHeader").html(data);
            }
        });
    }

    function getcity(value) {
        $.ajax({
            type: 'GET',
            url: '/getcitylist',
            data: {
                state: value
            },
            success: function(data) {
                $("#headercity").html(data);
            }
        });
    } /*]]>*/
</script>
<script>
    $(function() {
        // bind change event to select
        $('#language-changer').on('change', function() {
            var url = $(this).val(); // get selected value
            if (url) { // require a URL
                window.location = url; // redirect
            }
            return false;
        });
    });
</script>
{{--  <script>
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
                    $("#email_or_mobile").prop("readonly", true);
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
        alert('hello');
        $("#email_or_mobile").prop("readonly", false);
        $("#edit-mobile-wider").hide();
        $("#mismatch-mob").hide();
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
</script>  --}}

