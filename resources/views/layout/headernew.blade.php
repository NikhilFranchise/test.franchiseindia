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
                        Enter your email address associated with your Franchiseindia account and we'll send you a link
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
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="frm-pnl">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="usersprite"></div>
                                        </span>
                                        <input type="email" class="form-control" required name="email"
                                            placeholder="Enter Your User ID">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="pwdsprite"></div>
                                        </span>
                                        <input type="password" required name="password" class="form-control"
                                            placeholder="Enter Your Password">
                                    </div>
                                    <button type="submit" class="btn btn-default btn-gry btn-prop">SIGN IN</button>
                                    <span class="pipe">|</span> <a class="frg-link" href="#"
                                        onclick="frg_panel()">Forgot
                                        Password</a>
                                </div>
                            </form>
                            <div class="popfi">
                                <div class="signpop"></div>
                                <div class="popleft">
                                    <span>or Sign in With</span>
                                    <ul class="socl">
                                        {{-- <li><a href="{{Config('constants.MainDomain')}}/auth/facebook"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a></li> --}}
                                        <li><a href="{{ Config('constants.MainDomain') }}/auth/google"><i
                                                    class="fa fa-google fa-lg" aria-hidden="true"></i></a></li>
                                        {{-- <li><a href="{{Config('constants.MainDomain')}}/auth/linkedin"><i class="fa fa-linkedin fa-lg" aria-hidden="true"></i></a></li> --}}
                                    </ul>
                                </div>
                                <div class='popright'>New User <a href="#" id="loginselect1">Click here</a></div>
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
