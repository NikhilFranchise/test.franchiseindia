@php
    $auth = new \Illuminate\Support\Facades\Auth();
    $catTab = "active";
    $locTab = "";
    $invTab = "";
    if(isset($catTabResult)){
    if($locTabResult != 0 || $invTabResult != 0)
    $catTab = "";
    }
    if(isset($locTabResult)){
    if($locTabResult != 0)
    $locTab = "active";
    }
    if(isset($invTabResult)){
    if($invTabResult != 0)
    $invTab = "active";
    }
    $catArr = Config('constants.CategoryArr');
    asort($catArr);
    if(isset($mc)) {
    $subCat = Config('constants.subCategoryArr.'.$mc);
    if(!empty($subCat))
    asort($subCat);
    }
    if( isset($mc) && !empty($mc) && !empty($sc)) {
    $subSubcat = Config('constants.subSubCategoryArr.'.$sc);
    if(!empty($subSubcat))
    asort($subSubcat);
    }
    $states = Config('location.stateArr');
    asort($states);
    if(isset($loc[0]) && is_array($loc) && is_numeric($loc[0]) && array_key_exists($loc[0], Config('location.cityArr'))) {
    $cities = Config('location.cityArr.'.$loc[0]);
    asort($cities);
    }
    $loginUrl = Config('constants.MainDomain') . '/loginform';
    $loginName = 'Login';
    $class = '';
    $regName = 'Register';
    $regUrl = '#';
    $modelWindow = "data-toggle=modal data-target=#login-pnl";
    if ($auth::check()) {
    $loginUrl = Config('constants.MainDomain') . '/logoutprofile';
    if ( request()->user()->profile_type === config('constants.ProfileType.Franchisor') )
    $regUrl = Config('constants.MainDomain') . '/franchisor/myaccount/dashboard';
    if ( request()->user()->profile_type === config('constants.ProfileType.Investor') )
    $regUrl = Config('constants.MainDomain') . '/investor/myaccount/dashboard';
    $loginName = 'Logout';
    $regName = 'My Account';
    $modelWindow = '';
    $class = 'mybtn';
    }
    $barndStick = 0;
    $googleSearchTop = 0;
    $gcodeurl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if(request()->segment(1) === 'brands' || (request()->segment(1) === 'hi' && request()->segment(2) === 'brands'))
    $barndStick = 1;
    $eduUrlSelected = '';
    $wellUrlSelected = '';
    $dotUrlSelected = '';
    $logo = "logo-black.svg";
    $menuicon = "menu-iconei.png";
    $logoClass = "logo";
    $mainUrl = "";
    $webtitleUrl = request()->segment(1);
    $mangecls = "";
    if ($webtitleUrl == 'content')
    $dotUrlSelected = 'class=dropactive';
    if ($webtitleUrl == 'education') {
    $eduUrlSelected = 'class=dropactive';
    $logo = "education-logo-black.svg";
    $menuicon = "menu-iconei.png";
    $logoClass = "logo wiei";
    $mainUrl = "education";
    $mangecls = "wiei";
    }
    if ($webtitleUrl == 'wellness') {
    $wellUrlSelected = 'class=dropactive';
    $logo = "wellness-logo-black.svg";
    $menuicon = "menu-iconwi.png";
    $logoClass = "logo wiei";
    $mainUrl = "wellness";
    $mangecls = "wiei";
    }
    if(request()->segment(1) == 'franchisor' && request()->segment(2) == 'registration' && !empty(request()->session()->get('dealerForm')) && request()->session()->get('dealerForm') == 'yes') {
    $menuicon = "menu-iconei.png";
    $logo = "/dealers-india/dealer-logo.png";
    }
@endphp
{{--@if($barndStick === 0)--}}
    {{--<style type="text/css">.bothheadnew{top:0!important;position:fixed!important;z-index:4!important;margin-top:0!important;margin-bottom:0!important;padding-top:0!important;padding-bottom:0!important;-webkit-box-shadow:0 6px 12px rgba(0,0,0,.175);box-shadow:0 6px 12px rgba(0,0,0,.175);width:100%;animation:slide-down .7s}@keyframes slide-down{0%{opacity:0;transform:translateY(-100%)}100%{opacity:.9;transform:translateY(10)}} </style>--}}
    {{--<script language="javascript">if(screen.width>1199){$(window).scroll(function(){if($(this).scrollTop()>1)--}}
            {{--$('#headsticknew').addClass("bothheadnew");else--}}
            {{--$('#headsticknew').removeClass("bothheadnew");});}</script>--}}
{{--@endif--}}
{{--<div class="newheader" id="headsticknew">--}}
    {{--<div class="tolfree">Hotline: 1800 102 2007</div>--}}
    {{--<div class="newstickly">--}}
        {{--<div class="headerblack {{ request()->segment(1) == 'restaurant' ? 'ri' : '' }}">--}}
            {{--<div class="container">--}}
                {{--<div class="navb"><span id="c-button--slide-left"><img src="{{url('images/'. $menuicon)}}" alt="icon"></span></div>--}}
                {{--<div class="{{$logoClass}}"><a href="{{Config('constants.MainDomain')}}/{{ $mainUrl }}"><img src="{{ url('images/'. $logo) }}" alt="logo"></a></div>--}}
                {{--<div class="headrightblk {{$mangecls}}">--}}
                    {{--<div class="searchfixrightblk">--}}
                        {{--<div class="searchspace">--}}
                            {{--<ul class="headersublink">--}}
                                {{--<li><a href="https://www.businessex.com/" target="_blank"><strong>Buy/Sell An Existing Business</strong></a></li>--}}
                                {{--<li>|</li>--}}
                                {{--<li><a href="https://www.franchiseindia.com/#expandFranchise"><strong>Expand Your Franchise</strong></a></li>--}}
                                {{--<li>|</li>--}}
                                {{--<li><a href="https://www.franchiseindia.com/advertise-with-us-payment" target="_blank">Advertise</a></li>--}}
                                {{--<li>|</li>--}}
                                {{--<li><a href="https://master.franchiseindia.com/emagazine/" target="_blank">Subscribe Magazine</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
						{{--@notmobile--}}
                        {{--@if($__env->yieldContent('hindiUrl'))--}}
                        {{--<!--web site url end here-->--}}
                            {{--<div class="mainrighthindi toppa" id="changeLang1">--}}
                                {{--<div class="rigarthindi">अ / A <i class="fa fa-chevron-down" aria-hidden="true"></i></div>--}}
                                {{--<div class="contwid" id="langType1">--}}
                                    {{--<div class="linkdrop"><a href="@yield('hindiUrl')">हिंदी</a></div>--}}
                                    {{--<div class="linkdrop"><a href="@yield('englishUrl')">English</a></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endif--}}
						{{--@endnotmobile--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="imgff ftanimated bouncenew">--}}
{{--<!--<a href="https://ievents.6connex.com/event/FROExpo/login" target="_blank"><img src="https://www.franchiseindia.com/fro/frovirtual/assets/imgs/vl.gif"></a>-->--}}
				{{----}}
{{--<a href="http://www.equityindia.com/contact.php" target="_blank"><img src="{{Config('constants.MainDomain')}}/images/topright.gif" alt="top right"></a>--}}
				{{--<!--<a href="https://docs.google.com/forms/d/e/1FAIpQLScKrFGHoi-fkNtnZO1UnyEVTA2JOCTK0oQwGBTk6RlTjx3wqg/viewform" target="_blank"><img src="{{Config('constants.MainDomain')}}/images/franchise100.jpg"></a>--> </div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="headerbright">--}}
            {{--<div class="container">--}}
                {{--<div class="hotlineblk">--}}
                    {{--<div class="numblknew"><span>Hotline-1:</span> 1800 102 2007 </div>--}}
                    {{--<div class="numberline"></div>--}}
                    {{--<ul class="social">--}}
                        {{--<li><a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i class="fa fa-facebook"></i></a></li>--}}
                        {{--<li><a href="https://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a></li>--}}
                        {{--<li><a href="https://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i class="fa fa-linkedin"></i></a></li>--}}
                        {{--<li><a href="https://www.youtube.com/user/FranchiseIndia" target="_blank"><i class="fa fa-youtube-play"></i></a></li>--}}
                        {{--<li><a href="https://www.instagram.com/franchiseindia_/" target="_blank"><i class="fa fa-instagram"></i></a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="searchright">--}}
                    {{--<div class="sear" id="searchblk">--}}
                        {{--<div class="simptestloanmob text animated pulse"><a href="{{ url('property-loan') }}">Loan Against Property</a></div>--}}
                        {{--<ul class="nav nav-tabs" role="tablist">--}}
                            {{--<li class="simptest"> Search for Business Opportunities </li>--}}
                            {{--<li class="{{$catTab}}"><a href="#categories" aria-controls="categories" role="tab" data-toggle="tab">Categories</a></li>--}}
                            {{--<li class="{{$locTab}}"><a href="#location" aria-controls="location" role="tab" data-toggle="tab">Location</a></li>--}}
                            {{--<li class="{{$invTab}}"><a href="#investment" aria-controls="investment" role="tab" data-toggle="tab">Investment</a></li>--}}
                            {{--<li class="simptestloan text animated pulse"><a href="{{ url('property-loan') }}">Loan Against Property</a></li>--}}
                        {{--</ul>--}}
                        {{--<div class="tab-content">--}}
                            {{--<div role="tabpanel" class="tab-pane {{$catTab}}" id="categories">--}}
                                {{--<form class="form-horizontal" method="get" action="{{Config('constants.MainDomain')}}/category/searchby" onsubmit="return submitCategory()">--}}
                                    {{--<input type="hidden" name="catTab" value="1">--}}
                                    {{--<ul class="searblk">--}}
                                        {{--<li>--}}
                                            {{--<select name="mc" class="form-control myselectclasssearch" id="getMainCategoryDataHeader" required onchange="getSubCategoryHeader(this.value)">--}}
                                                {{--<option>Select Industry</option>--}}
                                                {{--@foreach($catArr as $index => $value)--}}
                                                    {{--<option value="{{ $index }}" slug="{{Config('category.SeoCategoryArr.'.$index)}}" @if(isset($mc) && $index==$mc) selected @endif>{!! $value !!}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<select class="form-control myselectclasssearch" name="sc" id="getSubCategoryDataHeader" onchange="getSubCatCategoryHeader(this.value)">--}}
                                                {{--<option value="">Select Sector</option>--}}
                                                {{--@if(!empty($subCat) && is_array($subCat))--}}
                                                    {{--@foreach($subCat as $index => $value)--}}
                                                        {{--<option value="{{ $index }}" slug="{{Config('category.SeoSubCategoryArr.'.$index)}}" @if(isset($sc) && $index==$sc) selected @endif>{!! $value !!}</option>--}}
                                                    {{--@endforeach--}}
                                                {{--@endif--}}
                                            {{--</select>--}}
                                        {{--</li>--}}
                                        {{--<li class="rdi">--}}
                                            {{--<select name="ssc" id="getSubCatCategoryDataHeader" class="form-control myselectclasssearch">--}}
                                                {{--<option value="">Select Service/Product</option>--}}
                                                {{--@if(isset($subSubcat) && isset($ssc))--}}
                                                    {{--@foreach($subSubcat as $index => $value)--}}
                                                        {{--<option value="{{ $index }}" slug="{{str_slug($value)}}" @if($index==$ssc) selected @endif>{!! $value !!}</option>--}}
                                                    {{--@endforeach--}}
                                                {{--@endif--}}
                                            {{--</select>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i><span class="searchmhide">Search</span></button>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                            {{--<div role="tabpanel" class="tab-pane {{$locTab}}" id="location">--}}
                                {{--<form class="form-horizontal" method="get" action="{{Config('constants.MainDomain')}}/category/searchby" onsubmit="return submitLocation()">--}}
                                    {{--<input type="hidden" name="locTab" value="1">--}}
                                    {{--<ul class="searblk">--}}
                                        {{--<li>--}}
                                            {{--<select name="mc" id="getMainCategoryDataHeaderLoc" class="form-control myselectclasssearch">--}}
                                                {{--<option value="">Select Industry</option>--}}
                                                {{--@foreach($catArr as $index => $value)--}}
                                                    {{--<option value="{{ $index }}" slug="{{Config('category.SeoCategoryArr.'.$index)}}" @if(isset($mc) && $index==$mc) selected @endif>{!! $value !!}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<select name="loc" id="stateHeader" class="form-control myselectclasssearch" required onchange="getcity(this.value)">--}}
                                                {{--<option value="">Select a State</option>--}}
                                                {{--@foreach($states as $index => $value)--}}
                                                    {{--<option value="{{ $index }}" slug="{{strtolower(str_slug($value))}}" @if(isset($loc[0]) && $loc[0]==$index) selected @endif>{!! $value !!}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                        {{--</li>--}}
                                        {{--<li class="rdi">--}}
                                            {{--<select name="city" class="form-control myselectclasssearch" id="headercity">--}}
                                                {{--<option value="">Select a City</option>--}}
                                                {{--@if(isset($cities))--}}
                                                    {{--@foreach($cities as $value)--}}
                                                        {{--<option value="{!! $value !!}" slug="{!! strtolower(str_slug($value)) !!}" @if (isset($city) && $city==strtolower($value)) selected @endif>{!! $value !!} </option>--}}
                                                    {{--@endforeach--}}
                                                {{--@endif--}}
                                            {{--</select>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i><span class="searchmhide">Search</span></button>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                            {{--<div role="tabpanel" class="tab-pane {{$invTab}}" id="investment">--}}
                                {{--<form class="form-horizontal" method="get" action="{{Config('constants.MainDomain')}}/category/searchby" onsubmit="return submitInvestment()">--}}
                                    {{--<input type="hidden" name="invTab" value="1">--}}
                                    {{--<ul class="searblk">--}}
                                        {{--<li>--}}
                                            {{--<select name="mc" id="getMainCategoryDataHeaderInv" class="form-control myselectclasssearch">--}}
                                                {{--<option value="">Select Industry</option>--}}
                                                {{--@foreach($catArr as $index => $value)--}}
                                                    {{--<option value="{{ $index }}" slug="{{Config('category.SeoCategoryArr.'.$index)}}" @if(isset($mc) && $index==$mc) selected @endif>{!! $value !!}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<select name="min_cost" class="form-control myselectclasssearch" id="minAmount" required onchange="selectMax(this.value)">--}}
                                                {{--<option value=""> Select Min Investment </option>--}}
                                                {{--@foreach(Config('constants.investRangeInWordsSingle') as $index => $value)--}}
                                                    {{--<option slug="{{Config('constants.InvestRange')[$index]['min']}}" @if(isset($minCost)) @if($minCost==$index) selected @endif @endif value="{{ $index }}">{!! $value !!}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                        {{--</li>--}}
                                        {{--<li class="rdi">--}}
                                            {{--<select name="max_cost" class="form-control myselectclasssearch" id="maxAmount">--}}
                                                {{--<option value=""> Select Max Investment </option>--}}
                                                {{--@foreach(Config('constants.investRangeInWordsSingle') as $index => $value)--}}
                                                    {{--<option slug="{{Config('constants.InvestRange')[$index]['min']}}" @if(isset($maxCost)) @if($maxCost==$index) selected @endif @endif value="{{ $index }}">{{ ($value == 21) ? "above" : $value }}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i><span class="searchmhide">Search</span></button>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="ltrright">--}}
                        {{--<ul class="righlink">--}}
                            {{--<li class="hidemobilemenu"><a href="{{$regUrl}}" {{$modelWindow}} class="btn btn-default {{$class}}" id="registerselect">{{$regName}}</a></li>--}}
                            {{--@if ($auth::check())--}}
                                {{--<li class="hidedesktopmenu"><span id="c-button--slide-right" class="btn btn-default myaccount {{$class}}">My Account</span></li>--}}
                                {{--<li><a href="{{$loginUrl}}" class="btn btn-default {{$class}}" id="loginselect">{{$loginName}}</a></li>--}}
                            {{--@endif--}}
                            {{--@if (!$auth::check())--}}
                                {{--<li class="hidedesktopmenu"><a href="{{$regUrl}}" {{$modelWindow}} class="btn btn-default {{$class}}" id="mobilereg">Register</a></li>--}}
                                {{--<li><a href="{{$regUrl}}" {{$modelWindow}} class="btn btn-default {{$class}}" id="loginselect">{{$loginName}}</a></li>--}}
                            {{--@endif--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@mobile
@include('layout.newhomepage.mobile.header')
@endmobile
@notmobile
@include('layout.newhomepage.header')
@endnotmobile
<div class="modal fade lg-panel formsection" id="login-pnl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <div class="frgt-pwd" id="frg-pnl" style="display:none">
                    <div class="ttl">Forgot Password</div>
                    <div class="desc">
                        Enter your email address associated with your Franchiseindia account and we'll send you a link
                        to reset your password.
                    </div>
                    <div class="frm-pnl">
                        <form class="form-horizontal" method="POST" action="{{Config('constants.MainDomain')}}/password/email">
                            <div class="input-group">
                                <span class="input-group-addon"><div class="usersprite"></div></span>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input id="email" type="email" class="form-control" name="email" placeholder="Enter Email-Id" value="" required>
                            </div>
                            <button type="submit" class="btn btn-default btn-gry btn-prop">Reset Password</button> <span class="pipe">|</span> <a class="frg-link" href="#" onclick="lg_panel()">Login</a>
                        </form>
                    </div>
                </div>
                <div id="lg-pnl" style="display:block">
                    <ul class="nav nav-tabs" role="tablist">
                        <li id="loginactiveopen"><a href="#login" aria-controls="login" role="tab" data-toggle="tab" id="loginactive">LOGIN</a></li>
                        <li id="registeractiveopen"><a href="#register" aria-controls="register" role="tab" data-toggle="tab" id="registeractive">REGISTER</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane" id="login">
                            <form method="post" action="{{Config('constants.MainDomain')}}/loginform">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="frm-pnl">
                                    <div class="input-group">
                                        <span class="input-group-addon"><div class="usersprite"></div></span>
                                        <input type="email" class="form-control" required name="email" placeholder="Enter Your User ID">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><div class="pwdsprite"></div></span>
                                        <input type="password" required name="password" class="form-control" placeholder="Enter Your Password">
                                    </div>
                                    <button type="submit" class="btn btn-default btn-gry btn-prop">SIGN IN</button>
                                    <span class="pipe">|</span> <a class="frg-link" href="#" onclick="frg_panel()">Forgot
                                        Password</a>
                                </div>
                            </form>
                            <div class="popfi">
                                <div class="signpop"></div>
                                <div class="popleft">
                                    <span>or Sign in With</span>
                                    <ul class="socl">
                                        {{--<li><a href="{{Config('constants.MainDomain')}}/auth/facebook"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a></li>--}}
                                        <li><a href="{{Config('constants.MainDomain')}}/auth/google"><i class="fa fa-google fa-lg" aria-hidden="true"></i></a></li>
                                        {{--<li><a href="{{Config('constants.MainDomain')}}/auth/linkedin"><i class="fa fa-linkedin fa-lg" aria-hidden="true"></i></a></li>--}}
                                    </ul>
                                </div>
                                <div class='popright'>New User <a href="#" id="loginselect1">Click here</a></div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="register">
                            <form class="form-horizontal" id="registration">
                                <div class="frm-pnl">
                                    <div style="text-align:center">
                                        <div><a href="{{Config('constants.MainDomain')}}/investor/create" class="btn btn-large btn-default btn-gry btn-prop"> Start A Business Today <span>(Investor Registration) </span> </a></div>
                                        <br>
                                        <div><a href="{{Config('constants.MainDomain')}}/franchisor/registration/step/1" class="btn btn-large btn-default btn-gry btn-prop">Appoint Channel Partners <span> (Franchisor Registration) </span></a></div>
										<br/>
										<div><a target="_blank"
href="{{Config('constants.MainDomain')}}/property-loan" class="btn btn- large btn-default btn-gry btn-prop">Loan Against Property </a></div>
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
                    <p>Network with the growing Business Community to get expert interventions to let you learn to Grow & Expand your Business with Franchising.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@if($_SERVER['REQUEST_URI'] != '/')
<!--     <div class="banhsow">
        <span id="clickhidebtn" class="hide-cat-search" style="display:none"> Search Business Opportunities <i class="fa fa-plus-square-o" aria-hidden="true"></i></span>
        <span id="clickshowbtn" class="show-cat-search">Search Business Opportunities <i class="fa fa-minus-square-o" aria-hidden="true"></i></span>
    </div> -->
    <script language="javascript">/*<![CDATA[*/if(screen.width<767){$(document).ready(function(){setTimeout(function(){$("#searchblk").slideUp(800);$('#clickhidebtn').show();$('#clickshowbtn').hide();},3000);$("#clickhidebtn").click(function(){$("#searchblk").slideDown("slow");$('#clickhidebtn').hide();$('#clickshowbtn').show();});$("#clickshowbtn").click(function(){$("#searchblk").slideUp("slow");$('#clickhidebtn').show();$('#clickshowbtn').hide();});});}/*]]>*/</script>
@endif
<script language="javascript">/*<![CDATA[*/function selectMax(selectmaxheaderval){let amountConfigArr={!!json_encode(Config('constants.investRangeInWordsSingle'))!!};let maxAmount=$('#maxAmount');let getSlugAmount={!!json_encode(Config('constants.InvestRange'))!!};maxAmount.html("");selectmaxheaderval=parseInt(selectmaxheaderval);$.each(amountConfigArr,function(key,value){if(key>selectmaxheaderval)
        $('#maxAmount').append($("<option></option>").attr({"value":key,"slug":getSlugAmount[key]['min']}).text(value));});if(selectmaxheaderval===21)
        maxAmount.append($("<option></option>").attr("value",21).text("Above"));}
    $(document).ready(function(){$('#searchoptnew').click(function(){$('.searchblknew').show(400);$('.searchspace').hide(400);});$('#closegsearch').click(function(){$('.searchspace').show(400);$('.searchblknew').hide(400);});if(screen.width>1199&&screen.height<=768)
        $(".gsc-wrapper").css({"max-height":"340px","overflow":"auto"});$('#searchopt').click(function(){$('.open').click();$('.searchoption').toggle(400);return false;});$('#searchopt2').click(function(){$('.searchoption').hide(400);});$('.dropdown-toggle').click(function(){$('.searchoption').hide(400);});});$('#registerselect').click(function(){$('#registeractive').click();});$('#loginselect').click(function(){$('#loginactive').click();});$('#mobilereg').click(function(){$('#registeractive').click();});$('#registerselect1').click(function(){$('#login').addClass("active");$('#register').removeClass("active");$('#loginactiveopen').addClass("active");$('#registeractiveopen').removeClass("active");});$('#loginselect1').click(function(){$('#login').removeClass("active");$('#register').addClass("active");$('#loginactiveopen').removeClass("active");$('#registeractiveopen').addClass("active");});function getSubCategoryHeader(value){$.ajax({type:'GET',url:'/getsubcategory',data:{categoryID:value},success:function(data){$("#getSubCategoryDataHeader").html(data);}});}
    function getSubCatCategoryHeader(value){$.ajax({type:'GET',url:'/getsubcatcategory',data:{subcategoryID:value},success:function(data){$("#getSubCatCategoryDataHeader").html(data);}});}
    function getcity(value){$.ajax({type:'GET',url:'/getcitylist',data:{state:value},success:function(data){$("#headercity").html(data);}});}/*]]>*/</script>
<script>
    $(function(){
        // bind change event to select
        $('#language-changer').on('change', function () {
            var url = $(this).val(); // get selected value
            if (url) { // require a URL
                window.location = url; // redirect
            }
            return false;
        });
    });
</script>