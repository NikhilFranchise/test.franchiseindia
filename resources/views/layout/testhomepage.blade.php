<!DOCTYPE html>
<html>
<head>
    @include('layout.newhomepage.testhead')
</head>
<body>
{{-- @mobile --}}
@if ($agent->isMobile())

@include('layout.newhomepage.mobile.topsearch')
@endif
{{-- @endmobile --}}
@include('layout.newhomepage.topsearch');
@php
use Illuminate\Support\Str;
@endphp
@php
    $TopInternationalOpportunities = array(

        "0" => array(
            'url' => 'https://www.franchiseindia.com/brands/REMAX-INDIA.25791',
            'image' => 'https://www.franchiseindia.com/images/remax(199x81).gif',
            'category' => 'Real Estate Sub',
            'title' => 'REMAX INDIA',
            'description' => 'World’s largest network of Real Estate Brokerage',
            'bgcolor' => '0,78,153'
        ),

        "1" => array(
            'url' => 'https://www.franglobal.com/fatburger/',
            'image' => 'https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/fatburger_tbo_gold.gif',
            'category' => 'Ice Cream Chain',
            'title' => 'Fatburger',
            'description' => 'America’s Iconic Burger Chain, Now Franchising in India',
            'bgcolor' => '226,56,63'
        ),
        "2" => array(
            'url' => 'https://www.franglobal.com/otwc/',
            'image' => 'https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/oldtown_tbo_gold.gif',
            'category' => 'Ice Cream Chain',
            'title' => 'Potato Hut',
            'description' => 'Partner with Malaysia’s Authentic White Coffee Specialty Chain',
            'bgcolor' => '253,197,12'
        ),
        "3" => array(
            'url' => 'https://www.franglobal.com/engage-and-grow/',
            'image' => 'https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/engage_199x81.png',
            'category' => 'Education',
            'title' => 'Enage &amp; Grow',
            'description' => 'Become A Certified Engage &amp; Grow Franchise in your Region &amp; Grow Your Business',
            'bgcolor' => '15,117,189'
        ),
    );
@endphp
<!-- Login/ Registration Model -->
<div class="modal fade lg-panel formsection in" id="login-pnl"
     tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <div class="frgt-pwd" id="frg-pnl" style="display:none">
                    <div class="ttl">Forgot Password</div>
                    <div class="desc">
                        Enter your email address associated with your
                        Franchiseindia account and we'll send you a link
                        to reset your password.
                    </div>
                    <div class="frm-pnl">
                        <form class="form-horizontal" method="POST"
                              action="https://www.franchiseindia.com/password/email">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <div
                                         class="usersprite"></div>
                              </span>
                                <input type="hidden" name="_token"
                                       value="{{csrf_token()}}">
                                <input id="email" type="email" class="form-control
                                 blur" name="email" placeholder="Enter Email-Id"
                                       value="" required="">
                            </div>
                            <button type="submit" class="btn btn-default btn-gry
                              btn-prop">Reset Password</button> <span
                                    class="pipe">|</span> <a class="frg-link" href="#"
                                                             onclick="lg_panel()">Login</a>
                        </form>
                    </div>
                </div>
                <div id="lg-pnl" style="display:block">
                    <ul class="nav nav-tabs" role="tablist">
                        <li id="loginactiveopen"><a href="#login"
                                                    aria-controls="login" role="tab" data-toggle="tab"
                                                    id="loginactive">LOGIN</a></li>
                        <li id="registeractiveopen" class="active"><a
                                    href="#register" aria-controls="register"
                                    role="tab" data-toggle="tab" id="registeractive"
                                    aria-expanded="true">REGISTER</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane" id="login">
                            <form method="post"
                                  action="https://www.franchiseindia.com/loginform">
                                <input type="hidden" name="_token"
                                       value="{{csrf_token()}}">
                                <div class="frm-pnl">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                       <div
                                               class="usersprite"></div>
                                    </span>
                                        <input type="email" class="form-control
                                       blur" required="" name="email"
                                               placeholder="Enter Your User ID">
                                    </div>
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                       <div
                                               class="pwdsprite"></div>
                                    </span>
                                        <input type="password" required=""
                                               name="password" class="form-control blur"
                                               placeholder="Enter Your Password">
                                    </div>
                                    <button type="submit" class="btn btn-default
                                    btn-gry btn-prop">SIGN IN</button>
                                    <span class="pipe">|</span> <a class="frg-link"
                                                                   href="#" onclick="frg_panel()">Forgot
                                        Password</a>
                                </div>
                            </form>
                            <div class="popfi">
                                <div class="signpop"></div>
                                <div class="popleft">
                                    <span>or Sign in With</span>
                                    <ul class="socl">
                                        <li><a
                                                    href="https://www.franchiseindia.com/auth/facebook">
                                                <img src="{{url('newhomepage/assets/img/facebook-login.svg')}}" class=""/></a>
                                        </li>
                                        <li><a
                                                    href="https://www.franchiseindia.com/auth/google"><img src="{{url('newhomepage/assets/img/google.svg')}}" class=""/></a></li>
                                    </ul>
                                </div>
                                <div class="popright">New User <a href="#"
                                                                  id="loginselect1">Click here</a></div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane active"
                             id="register">
                            <form class="form-horizontal" id="registration">
                                <div class="frm-pnl">
                                    <div style="text-align:center">
                                        <div><a
                                                    href="https://www.franchiseindia.com/investor/create"
                                                    class="btn btn-large btn-default
                                       btn-gry btn-prop"> Start A Business
                                                Today <br/><span>(Investor
                                       Registration) </span> </a>
                                        </div>
                                        <br>
                                        <div><a
                                                    href="https://www.franchiseindia.com/franchisorregistration"
                                                    class="btn btn-large btn-default
                                       btn-gry btn-prop">Appoint Channel
                                                Partners <br/><span> (Franchisor
                                       Registration) </span></a>
                                        </div>
                                        <br>
                                        <div><a target="_blank"
                                                href="https://www.franchiseindia.com/property-loan"
                                                class="btn btn- large
                                       btn-default btn-gry btn-prop">Loan
                                                Against Property </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="popfi regspace">
                                <div class="signpop"></div>
                                Registered User <a href="#"
                                                   id="registerselect1">Login here</a>
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
<!-- Login/ Registration Model End-->

<div class="wrapper">
    <!-- Sidebar  -->
@include('layout.newhomepage.sidemenu')
<!-- Sidebar End -->
{{-- @notmobile --}}
@if ($agent->isDesktop() || $agent->isTablet())

<!-- Page Content  -->
    <div id="content">
    @include('layout.newhomepage.header')
    <!-- HERO SECTION STARTS -->
    @include('layout.newhomepage.herosection')
    <!-- HERO SECTION EMDS -->
        <main class="main" id="main">
            <!-- CARD SECTION START  -->
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
                                                    <a href="{{url('investor/create')}}">
                                                        Start A Business Today <span class="smallimp">(Investor
                                             Registration)</span>
                                                        <i class="fas fa-chevron-right float-right
                                                icon-bar-main-fihl" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                <div class="business-a">
                                                    <a href="{{url('franchisor/registration/step/1')}}">
                                                        Appoint Channel partners <span class="smallimp">(Franchisor
                                             Registration)</span>
                                                        <i class="fas fa-chevron-right float-right
                                                icon-bar-main-fihl" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-30">
                                                <h4> Why Should I Register ?</h4>
                                                To get access to over 10000+ Franchise Business
                                                Opportunities.<br><br>
                                                Network with the growing Business Community to get
                                                expert
                                                interventions
                                                to let you learn to Grow &amp;
                                                Expand your Business with Franchising.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-ask-experts">
                                            <h4>Ask Our Experts</h4>
                                            <form id="homepage" name="homepage" method="post">
                                                <div class="raido-main-section">
                                                    <ul class="radio-main">
                                                        <li>
                                                            <div class="radio">
                                                                <label><input type="radio" name="optionsRadios" id="optionsRadios3" checked value="franchisor"> Expand My Brand </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="radio">
                                                                <label><input type="radio" name="optionsRadios" id="optionsRadios1"  value="investor"> Buy a Franchise</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="input-group mb-15">
                                             <span class="input-group-addon">
                                                <div class="icon-section-main"><img src="{{url('newhomepage/assets/img/email.png')}}" alt="email-icon">
                                                </div>
                                             </span>
                                                    <input type="email" class="form-control blur" required="" name="emailfreeadvice" id="emailfreeadvice" class="form-control" placeholder="Enter Email">
                                                </div>
                                                <div class="input-group mb-15">
                                             <span class="input-group-addon">
                                                <div class="icon-section-main"><img src="{{url('newhomepage/assets/img/phone.png')}}" alt="phone-icon">
                                                </div>
                                             </span>
                                                    <input type="text" class="form-control blur" maxlength="10" name="mobilefreeadvice" id="mobilefreeadvice" placeholder="Enter Mobile No" required="">
                                                </div>
                                                <div id="askMsg" style="display:none;">
                                                    <div class="green">
                                                        {{ (Request::segment(1) == 'hi') ? 'नि: शुल्क सलाह के लिए जानकारी जमा करने के लिए धन्यवाद!' : 'Thank You for Submitting information for Free Advice!' }}
                                                    </div>
                                                </div>
                                                <button type="button" class="btn
                                             btn-main" id="btnhome">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- CARD SECTION ENDS HERE -->
            <!-- COVID PROOF BUSINESS OPPORTUNITIES START  -->
            <section class="bg-sectionwize covidproof section-30"
                     id="covidproof">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="modified-col col-md-12">
                            <div class="section-ptb">
                                <h2>Covid Proof Business Opportunities</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        @php
                            $pageType = (request()->segment(1) == 'premiumbrand' || request()->segment(2) == 'premiumbrand') ? 2 : 1;
                        @endphp
                        @foreach ($brands->where('brand_section', 2)->where('page_type', $pageType)->take(4)->shuffle() as $logoDetail)
                            @php
                                $brandUrl = Config('constants.MainDomain').$logoDetail['brand_link'];
                                if(isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans))
                                $brandUrl = Config('constants.MainDomain').'/hi'.$logoDetail['brand_link'];
                            @endphp
                            <div class="modified-col col-xs-6 col-sm-6 col-md-3 col-lg-3
                           col-xl-3">
                                <div class="overlay-card"></div>
                                <div class="card card-m card-p-10">
                                    <div class="brand-image-section">
                                        <div class="brand-main-section">
                                            <a href="{{ $brandUrl }}" target="_blank"><img src="{{ $logoDetail['brand_img'] }}" alt="{{$logoDetail['brand_heading']}}"></a>
                                        </div>
                                    </div>
                                    <div class="card-body-section">
                                        @php
                                            $cat_url = "/business-opportunities/".strtolower(str_replace(' ', '-', $logoDetail['brand_category'])).".m". $logoDetail['brand_category_id'];
                                        @endphp
                                        <p>
                                            <a href="{{url('').$cat_url}}" target="_blank">{{$logoDetail['brand_category']}}</a>
                                        </p>
                                        <h2><a href="{{ $brandUrl }}" target="_blank">{{$logoDetail['brand_heading']}}</a> </h2>
                                        <div class="d-flex">
                                            <div class="card-info">
                                                Investment range
                                            </div>
                                            <div class="card-info-amt">
                                                ₹{{$logoDetail['investment_range_new']}}
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="card-info">
                                                Area Required
                                            </div>
                                            <div class="card-info-amt">
                                                {{$logoDetail['area_required']}}
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="card-info">
                                                Franchise Outlets
                                            </div>
                                            <div class="card-info-amt">
                                                {{$logoDetail['franchise_outlets']}}
                                            </div>
                                        </div>
                                        <div class="link-section">
                                            <a href="{{ $brandUrl }}" target="_blank">Know More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- COVID PROOF BUSINESS OPPORTUNITIES ENDS -->
            <!-- Best Franchise Opportunity starts -->
            <section class="bg-sectionwize best-franchise-opportunity section-30"
                     id="best-franchise-opportunity">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="modified-col col-md-12">
                            <div class="section-ptb">
                                <h2>Best Franchise Opportunity</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        @php
                            $brandLogo3 = $brands->where('brand_section', 3)->where('page_type', $pageType)->take(8)->shuffle();
                        @endphp

                        @foreach($brandLogo3 as $logoDetail)
                            @php
                                $brandUrl = Config('constants.MainDomain').$logoDetail['brand_link'];
                            @endphp

                            @if($loop->index < 8)
                                @php
                                    $cat_url = "/business-opportunities/".strtolower(str_replace(' ', '-', $logoDetail['brand_category'])).".m". $logoDetail['brand_category_id'];
                                @endphp
                                <div class="modified-col col-xs-6 col-sm-6 col-md-3 col-lg-3
                           col-xl-3">
                                    <div class="overlay-card"></div>
                                    <div class="card card-m card-p-10">
                                        <div class="brand-image-section">
                                            <div class="brand-main-section">
                                                <a href="{{ $brandUrl }}" target="_blank"> <img src="{{$logoDetail['brand_img'] }}" alt="{{$logoDetail['brand_heading']}}"></a>
                                            </div>
                                        </div>
                                        <div class="card-body-section">
                                            <p>
                                                <a href="{{url('').$cat_url}}" target="_blank">{{$logoDetail['brand_category']}}</a>
                                            </p>
                                            <h2><a href="{{ $brandUrl }}" target="_blank">{{$logoDetail['brand_heading']}} </a></h2>
                                            <div class="d-flex">
                                                <div class="card-info">
                                                    Investment range
                                                </div>
                                                <div class="card-info-amt">
                                                    ₹{{$logoDetail['investment_range_new']}}
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="card-info">
                                                    Area Required
                                                </div>
                                                <div class="card-info-amt">
                                                    {{$logoDetail['area_required']}}
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="card-info">
                                                    Franchise Outlets
                                                </div>
                                                <div class="card-info-amt">
                                                    {{$logoDetail['franchise_outlets']}}
                                                </div>
                                            </div>
                                            <div class="link-section">
                                                <a href="{{ $brandUrl }}" target="_blank">Know More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- Best Franchise Opportunity ends -->
            <!-- Upcoming Events starts -->
            <section class="bg-sectionwize upcomingevents section-30" id="upcomingevents">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="modified-col col-md-12">
                            <div class="section-ptb">
                                <h2>Upcoming Events</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="modified-col col-xs-6 col-sm-6
                           col-md-4
                           col-lg-4
                           col-xl-4">
                            <div class="overlay-card"></div>
                            <div class="card card-m card-p-10">
                                <div class="brand-image-section-events">
                                    <div class="brand-main-section">
                                        <a href="http://www.globalfranchiseleaders.com/" target="_blank">
                                            <img src="https://www.franchiseindia.com/images/events/gflfbg.jpg" class="img-fluid" alt="Global Franchise Leaders">
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body-section">
                                    <h2>Global Franchise Leaders Forum</h2>
                                    <p>
                                        06TH NOVEMBER 2020 VIRTUAL CONFERENCE | 05:30 PM
                                    </p>
                                    <div class="link-section text-capitalize">
                                        <a href="http://www.globalfranchiseleaders.com/" target="_blank">Registration</a>
                                    </div>
                                    <div class="eventhotline text-capitalize">
                                        Hotline: <span>+91 8588898248</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modified-col col-xs-6 col-sm-6
                           col-md-4
                           col-lg-4
                           col-xl-4">
                            <div class="overlay-card"></div>
                            <div class="card card-m card-p-10">
                                <div class="brand-image-section-events">
                                    <div class="brand-main-section">
                                        <a href="https://www.franchiseindia.com/franchise-show-west/" target="_blank">
                                            <img src="https://www.franchiseindia.com/images/events/westfs.jpg" class="img-fluid" alt="Franchise Show West">
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body-section">
                                    <h2>Franchise Show - West Region</h2>
                                    <p>
                                        29TH NOVEMBER 2020 | 10:00 AM VIRTUAL
                                    </p>
                                    <div class="link-section  text-capitalize">
                                        <a href="https://www.franchiseindia.com/franchise-show-west/" target="_blank">Registration</a>
                                    </div>
                                    <div class="eventhotline  text-capitalize">
                                        Hotline: <span>+91 9582181817</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modified-col col-xs-6 col-sm-6
                           col-md-4
                           col-lg-4
                           col-xl-4">
                            <div class="overlay-card"></div>
                            <div class="card card-m card-p-10">
                                <div class="brand-image-section-events">
                                    <div class="brand-main-section">
                                        <a href="https://www.franchiseindia.com/franchise-show-south/" target="_blank">
                                            <img src="https://www.franchiseindia.com/images/events/southfs.jpg" class="img-fluid" alt="Franchise Show South">
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body-section">
                                    <h2>Franchise Show - South Region</h2>
                                    <p>
                                        07TH NOVEMBER 2020 | 10:00 AM
                                        VIRTUAL
                                    </p>
                                    <div class="link-section  text-capitalize">
                                        <a href="https://www.franchiseindia.com/franchise-show-south/" target="_blank">Registration</a>
                                    </div>
                                    <div class="eventhotline  text-capitalize">
                                        Hotline: <span>+91 9582181817</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Upcoming Events ends -->
            <!-- Top International Opportunities starts -->
            <section class="bg-sectionwize top-international-opportunities
         section-30" id="top-international-opportunities">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="modified-col col-md-12">
                            <div class="section-ptb">
                                <h2>Top International Opportunities</h2>
                            </div>
                        </div>
                    </div>
                    @foreach($TopInternationalOpportunities as $top)

                        <div class="row justify-content-center">
                            <div class="modified-col col-xs-6 col-sm-6 col-md-3 col-lg-3
                  col-xl-3">
                                <div class="overlay-card"></div>
                                <div class="card card-m card-p-10" style=" background-color: rgba({{$top['bgcolor']}},0.1); box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgb({{$top['bgcolor']}}, 0.36);">
                                    <div class="brand-image-section">
                                        <div class="brand-main-section">
                                            <a href="{{$top['url']}}"> <img src="{{$top['image']}}" class="" alt="{{$top['title']}}"></a>
                                        </div>
                                    </div>
                                    <div class="card-body-section">

                                        <p>
                                            {{$top['category']}}
                                        </p>
                                        <h2><a href="{{ $top['url'] }}" target="_blank">{{$top['title']}}</a></h2>
                                        <div class="card-info-summry">
                                            {{$top['description']}}
                                        </div>

                                        <a href="{{$top['url']}}">
                                            <div class="link-section-main" style="    color: #000;
                                 border: 1px solid #000;
                                 padding: 5px;
                                 border-radius: 4px;
                                 font-weight: 600;
                                 text-align: center;
                                 margin-top: 11px;">Know More</div>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                </div>
            </section>
            <!-- Top International Opportunities ends -->
            <!-- Ads code ATF -->

            <section class="bg-sectionwize google-ads-banner section-30
                  pt-30" id="google-ads-banner">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="modified-col col-md-12">
                            <p class="advertisement">Advertisement</p>
                            <!-- /1057625/FIHL/Desktop_HP_970x90_ATF-->
                            <div id='adslot970x90_ATF' class="img-b ads-main-center">
                                <script>
                                    googletag.cmd.push(function() { googletag.display('adslot970x90_ATF'); });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Ads code ATF End-->
            <!-- Top Franchise Opportunities starts -->
            <section class="bg-sectionwize top-franchise-opportunities section-30"
                     id="top-franchise-opportunities">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="modified-col col-md-12">
                            <div class="section-ptb">
                                <h2>Top Franchise Opportunities </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        @foreach ($brands->where('brand_section', 4)->where('page_type', $pageType)->take(24)->shuffle() as $logoDetail)
                            @php
                                $brandUrl = Config('constants.MainDomain').$logoDetail['brand_link'];
                                if(isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans))
                                $brandUrl = Config('constants.MainDomain').'/hi'.$logoDetail['brand_link'];

                                $cat_url = "/business-opportunities/".strtolower(str_replace(' ', '-', $logoDetail['brand_category'])).".m". $logoDetail['brand_category_id'];
                            @endphp
                            <div class="modified-col col-xs-6 col-sm-6 col-md-3 col-lg-3
                           col-xl-3">
                                <div class="overlay-card"></div>
                                <div class="card card-m card-p-10">
                                    <div class="brand-md-image-section">
                                        <div class="brand-main-section">
                                            <a href="{{ $brandUrl }}" target="_blank"><img src="{{$logoDetail['brand_img']}}" alt="{{$logoDetail['brand_alt']}}" class="img-b
                                       img-border"></a>
                                        </div>
                                    </div>
                                    <div class="card-body-section">
                                        <p>
                                            <a href="{{url('').$cat_url}}" target="_blank">{{$logoDetail['brand_category']}}</a>
                                        </p>
                                        <h2><a href="{{ $brandUrl }}" target="_blank">{{$logoDetail['brand_heading']}} </a></h2>
                                        <div class="d-flex">
                                            <div class="card-info">
                                                Investment range
                                            </div>
                                            <div class="card-info-amt">
                                                ₹{{$logoDetail['investment_range_new']}}
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="card-info">
                                                Area Required
                                            </div>
                                            <div class="card-info-amt">
                                                {{$logoDetail['area_required']}}
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="card-info">
                                                Franchise Outlets
                                            </div>
                                            <div class="card-info-amt">
                                                {{$logoDetail['franchise_outlets']}}
                                            </div>
                                        </div>
                                        <div class="link-section">
                                            <a href="{{ $brandUrl }}" target="_blank">Know More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- Top Franchise Opportunities ends -->
            <!-- Featured Franchise Companies starts -->
            <section class="bg-sectionwize feature-franchise-companies section-30
                  w-bg-main" id="feature-franchise-companies">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="modified-col col-md-12">
                            <div class="section-ptb">
                                <h2>Featured Franchise Companies </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        @foreach($brands->where('brand_section', 5)->take(48)->shuffle() as $logoDetail)
                            @php
                                $brandUrl = Config('constants.MainDomain').$logoDetail['brand_link'];
                                if(isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans))
                                $brandUrl = Config('constants.MainDomain').'/hi'.$logoDetail['brand_link'];


                            @endphp
                            <div class="modified-col col-xs-3 col-sm-3
                           col-md-2
                           col-lg-2
                           col-xl-2 mt-2 mb-2">
                                <div class="overlay-card"></div>
                                <div class="card-fihl card-m card-p-10">
                                    <div class="brand-ffc-image-section">
                                        <div class="brand-main-section">
                                            <a href="{{$brandUrl}}"><img src="{{$logoDetail['brand_img']}}" alt="{{$logoDetail['brand_alt']}}" class="img-b
                                       img-border" ></a>
                                        </div>
                                    </div>
                                    <div class="card-body-section">
                                        <p>
                                            Investment range
                                        </p>
                                        <div class="card-info-amount">
                                            ₹{{$logoDetail['investment_range_new']}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- Featured Franchise Companies ends -->
            <!-- Ads code MID 1 -->

            <section class="bg-sectionwize google-ads-banner section-30
                  pt-30" id="google-ads-banner">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="modified-col col-md-12">
                            <p class="advertisement">Advertisement</p>
                            <!-- /1057625/FIHL/Desktop_HP_970x90_Mid_1-->
                            <div id='adslot970x90_Mid_1' class="img-b ads-main-center">
                                <script>
                                    googletag.cmd.push(function() { googletag.display('adslot970x90_Mid_1'); });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Ads code MID 1 End-->
            <!-- News section starts -->
            <section class="newssection section-30"
                     id="newssection">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="modified-col col-xs-12 col-sm-12
                              col-md-6
                              col-xl-6
                              col-lg-6">
                            <div class="section-ptb">
                                <h2>Frachise Insight </h2>
                                <div class="view-all-main-section">
                                    <a href="{{url('content')}}">View All</a>
                                </div>
                                @php
                                    $articless = array();
                                @endphp
                                @foreach($articles as $article)
                                    @php
                                        $siteType   = Config('constants.articleArr.'.$article['site_type']);
                                        $imagePath  = Config('constants.MainDomain').str_replace('uploads/content/', 'uploads/thumbnails/', $article['image']);
                                        $kickerUrl  = '/content/'.$article['urlKicker'];
                                        $articleUrl = '/'.$siteType.'/'.$article['slug'].'.'.$article['content_id'];
                                        if( $siteType == "gallery") {
                                        $sourcePhoto       = public_path($article['image']);
                                        $imagename         = pathinfo($sourcePhoto)['basename'];
                                        $imagePath         = Config('constants.MainDomain')."/uploads/thumbnails/ga/".$imagename;
                                        $kickerUrl         = '/gallery/'.Str::slug($article['kicker']).'/'.$article['kicker_id'];
                                        }
                                        $content = ($article['homeTitle']) ? $article['homeTitle'] : $article['title'];
                                        $articless[] = array(
                                        'image' => $imagePath,
                                        'url' => $articleUrl,
                                        'title' => $article['kicker'],
                                        'content' => $content,
                                        'auther' => $article['author'],
                                        )
                                    @endphp
                                @endforeach
                                <div class="card card-m card-ptb-20">
                                    <div class="row justify-content-center">
                                        <div class="modified-col col-xs-12
                                          col-sm-12
                                          col-md-6
                                          col-lg-6 col-xl-6">
                                            <div class="card-news-info">
                                                <div class="news-overlay">
                                                    <img
                                                            src="{{$articless[0]['image']}}"
                                                            class="img-b" alt="">
                                                </div>
                                                <div class="card-news-summry">
                                                    <h3>{{$articless[0]['title']}}
                                                    </h3>
                                                    <p>{{mb_strimwidth($articless[0]['content'], 0, 50, "...")}}</p>
                                                    <a href="{{$articless[0]['url']}}">Know More</a>
                                                    <div class="d-flex
                                                   author-section">
                                                        <div class="author-info">
                                                            <ul
                                                                    class="author-share">
                                                                <li>
                                                                    <a href="http://www.facebook.com/sharer.php?u={{url($articless[0]['url'])}}">
                                                                        <img src="{{url('newhomepage/assets/img/facebookx2.png')}}"
                                                                             alt="Facebook">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="https://twitter.com/share?url={{url($articless[0]['url'])}}">
                                                                        <img src="{{url('newhomepage/assets/img/twitterx2.png')}}"
                                                                             alt="twitter">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="http://www.linkedin.com/shareArticle?mini=true&url={{url($articless[0]['url'])}}">
                                                                        <img src="{{url('newhomepage/assets/img/linkedinx2.png')}}"
                                                                             alt="linkedin">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="author-info">
                                                            -{{$articless[0]['auther']}}
                                                            <br>Article Editor
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modified-col col-xs-12
                                          col-sm-12
                                          col-md-6
                                          col-lg-6 col-xl-6">
                                            <div class="news-min-section">
                                                <ul
                                                        class="news-min-section-info">
                                                    @for($i=1; $i<5;$i++)
                                                        <li >
                                                            <div class="row
                                                      justify-content-center">
                                                                <div
                                                                        class="modified-col
                                                         col-xs-4 col-sm-4
                                                         col-md-4 col-lg-4
                                                         col-xl-4">
                                                                    <img
                                                                            src="{{$articless[$i]['image']}}"
                                                                            class="img-z-fluid"
                                                                            alt="">
                                                                </div>
                                                                <div
                                                                        class="modified-col
                                                         col-xs-8 col-sm-8
                                                         col-md-8 col-lg-8
                                                         col-xl-8">
                                                                    <div
                                                                            class="post-news-text">
                                                                        <p>{{$articless[$i]['title']}}
                                                                        </p>
                                                                        <a href="{{$articless[$i]['url']}}"
                                                                           class="read-more">Know
                                                                            More</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endfor
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modified-col col-xs-12 col-sm-12
                              col-md-6
                              col-xl-6
                              col-lg-6">
                            <div class="section-ptb">
                                <h2>News</h2>
                                <div class="view-all-main-section">
                                    <a href="https://news.franchiseindia.com/">View All</a>
                                </div>
                                <div class="card card-m card-ptb-20">
                                    <div class="row justify-content-center">
                                        <div class="modified-col col-xs-12
                                          col-sm-12
                                          col-md-6
                                          col-lg-6 col-xl-6">
                                            <div class="card-news-info">
                                                <div class="news-overlay">
                                                    <img
                                                            src="{{$news[0]['image']}}"
                                                            class="img-b" alt="">
                                                </div>
                                                <div class="card-news-summry">
                                                    <h3>{{$news[0]['title']}}
                                                    </h3>
                                                    <p>{{mb_strimwidth($news[0]['content'], 0, 50, "...")}}
                                                    </p>
                                                    <a href="{{$news[0]['url']}}">Know More</a>
                                                    <div class="d-flex
                                                   author-section">
                                                        <div class="author-info">
                                                            <ul
                                                                    class="author-share">
                                                                <li>
                                                                    <a href="http://www.facebook.com/sharer.php?u={{url($news[0]['url'])}}">
                                                                        <img src="{{url('newhomepage/assets/img/facebookx2.png')}}"
                                                                             alt="Facebook">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="https://twitter.com/share?url={{url($news[0]['url'])}}">
                                                                        <img src="{{url('newhomepage/assets/img/twitterx2.png')}}"
                                                                             alt="twitter">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="http://www.linkedin.com/shareArticle?mini=true&url={{url($news[0]['url'])}}">
                                                                        <img src="{{url('newhomepage/assets/img/linkedinx2.png')}}"
                                                                             alt="linkedin">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="author-info">
                                                            -{{$news[0]['auther']}}<br>News
                                                            Editor
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modified-col col-xs-12
                                          col-sm-12
                                          col-md-6
                                          col-lg-6 col-xl-6">
                                            <div class="news-min-section">
                                                <ul
                                                        class="news-min-section-info">
                                                    @for($i = 1; $i< 5; $i++)
                                                        <li>
                                                            <div class="row
                                                      justify-content-center">
                                                                <div
                                                                        class="modified-col
                                                         col-xs-4 col-sm-4
                                                         col-md-4 col-lg-4
                                                         col-xl-4">
                                                                    <img
                                                                            src="{{$news[$i]['image']}}"
                                                                            class="img-z-fluid"
                                                                            alt="">
                                                                </div>
                                                                <div
                                                                        class="modified-col
                                                         col-xs-8 col-sm-8
                                                         col-md-8 col-lg-8
                                                         col-xl-8">
                                                                    <div
                                                                            class="post-news-text">
                                                                        <p>{{$news[$i]['title']}}
                                                                        </p>
                                                                        <a href="{{$news[$i]['url']}}"
                                                                           class="read-more">Know
                                                                            More</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endfor
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- News section ends -->
            <!-- Testimonial section starts -->
            <section class="testimonia-section section-30"
                     id="testimonia-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="modified-col col-md-9">
                            <!-- Swiper -->
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="testimonial-main">
                                            <div class="testimonial-brand-section">
                                                <img src="https://www.franchiseindia.com/images/testimonials/remax-home.gif" class="img-b-fluid" alt="Remax">
                                            </div>
                                            <div class="testimonial-brand-summury">
                                                <div class="open-quotes">
                                                    <img src="{{url('newhomepage/assets/img/open-qoutes.svg')}}" alt="quotes-open">
                                                </div>
                                                <p>  We partnered with FranchiseIndia.com to scale our business and it has been a great experience. With their zeal to actually take out time for their clients and understand their business needs, they were able to generate the best leads for us. The team at FranchiseIndia.com is also quick to respond to your queries and their service is impeccable.</p>
                                                <div class="textimonial-brand-section">
                                                    REMAX INDIA
                                                </div>
                                                <div class="close-quotes">
                                                    <img src="{{url('newhomepage/assets/img/close-quotes.svg')}}" alt="quotes-close">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testimonial-main">
                                            <div class="testimonial-brand-section">
                                                <img src="https://www.franchiseindia.com/images/fnp.gif" class="img-b-fluid" alt="fnp">
                                            </div>
                                            <div class="testimonial-brand-summury">
                                                <div class="open-quotes">
                                                    <img src="{{url('newhomepage/assets/img/open-qoutes.svg')}}" alt="quotes-open">
                                                </div>
                                                <p> It is indeed an ideal platform to expand any brand PAN India. Our long association has helped us to grow our network & establish 270 outlets in 98 cities"</p>
                                                <div class="textimonial-brand-section">
                                                    Ferns N Petals
                                                </div>
                                                <div class="close-quotes">
                                                    <img src="{{url('newhomepage/assets/img/close-quotes.svg')}}" alt="quotes-close">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testimonial-main">
                                            <div class="testimonial-brand-section">
                                                <img src="https://www.franchiseindia.com/images/testimonials/home/liberty.gif" class="img-b-fluid" alt="Liberty">
                                            </div>
                                            <div class="testimonial-brand-summury">
                                                <div class="open-quotes">
                                                    <img src="{{url('newhomepage/assets/img/open-qoutes.svg')}}" alt="quotes-open">
                                                </div>
                                                <p> As a trusted Trade magazine Franchise India is great tool to spread your message to the Franchise Community and our experience in this effort has been excellent with the magazine</p>
                                                <div class="textimonial-brand-section">
                                                    Liberty Shoes Ltd
                                                </div>
                                                <div class="close-quotes">
                                                    <img src="{{url('newhomepage/assets/img/close-quotes.svg')}}" alt="quotes-close">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testimonial-main">
                                            <div class="testimonial-brand-section">
                                                <img src="https://www.franchiseindia.com/images/testimonials/ims-home.gif" class="img-b-fluid" alt="Ims Home">
                                            </div>
                                            <div class="testimonial-brand-summury">
                                                <div class="open-quotes">
                                                    <img src="{{url('newhomepage/assets/img/open-qoutes.svg')}}" alt="quotes-open">
                                                </div>
                                                <p> We have been using Franchise India website services for a very long time. And we have been able to create some very successful franchisee partners. The quality and flow of leads is really very good. Our association with Franchise India has been a great experience and we will not only continue this relationship but also recommend others to take their expert services and advisory.</p>
                                                <div class="textimonial-brand-section">
                                                    IMS Learning Resources pvt ltd
                                                </div>
                                                <div class="close-quotes">
                                                    <img src="{{url('newhomepage/assets/img/close-quotes.svg')}}" alt="quotes-close">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add Pagination -->
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        <div class="modified-col col-md-3">
                            <div class="testimonial-ads-section">
                                <p class="advertisement">Advertisement</p>
                                <!-- /1057625/FIHL/Desktop_HP_300x250-->
                                <div id='adslot300x250' class="img-b ads-main-center">
                                    <script>
                                        googletag.cmd.push(function() { googletag.display('adslot300x250'); });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Testimonial section ends -->
            <!-- BTF -->

            <section class="bg-sectionwize google-ads-banner section-30
                            pt-30" id="google-ads-banner">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="modified-col col-md-12">
                            <p class="advertisement">Advertisement</p>
                            <!-- /1057625/FIHL/Desktop_HP_970x90_BTF-->
                            <div id='adslot728x90_BTF' class="img-b ads-main-center">
                                <script>
                                    googletag.cmd.push(function() { googletag.display('adslot728x90_BTF'); });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- BTF Ends -->
            <!-- newsletter section starts -->
            <section class="newslettersection section-30 bg-b-main"
                     id="newslettersection">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="modified-col col-md-6">
                            <p>Share your email address to get latest update from the industry</p>
                            <h2>Newsletter Signup</h2>
                            <div class="main-newsletter">
                                <form id="update" method="post" action="{{url('newslettersignup')}}">
                                    <ul class="newsletter">
                                        <li>
                                            <input type="hidden" name="site_type" value="fi">
                                            <input type="email" class="form-control
                                                    emailer-main"
                                                   aria-label="Enter Mail"
                                                   aria-describedby="button-addon2" name="email" required="">
                                        </li>
                                        <li><button class="btn btn-main" type="submit"
                                                    id="button-addon2">SignUp</button></li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <div class="modified-col col-md-6 text-right
                                     socail-newsletter-section">
                            <p>Stay tuned &amp; get updated</p>
                            <h2>Follow Franchise India</h2>
                            <div class="main-newsletter">
                                <form action="">
                                    <ul class="newsletter-social">
                                        <li><a
                                                    href="https://www.facebook.com/FranchiseIndiaMedia"
                                                    target="_blank"><img src="{{url('newhomepage/assets/img/fb-icon.svg')}}"
                                                                         alt="facebook"></a></li>
                                        <li><a href="https://www.instagram.com/franchiseindia_/"
                                               target="_blank"><img
                                                        src="{{url('newhomepage/assets/img/instagram-icon.svg')}}" alt=""></a></li>
                                        <li><a href="https://twitter.com/FranchiseIndia"
                                               target="_blank"><img
                                                        src="{{url('newhomepage/assets/img/twitter-icon.svg')}}"
                                                        alt="twitter"></a></li>
                                        <li><a
                                                    href="https://www.youtube.com/user/FranchiseIndia"
                                                    target="_blank"><img
                                                        src="{{url('newhomepage/assets/img/you-tube-icon.svg')}}"
                                                        alt="youtube"></a></li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- newsletter section ends -->
            <!-- about us -->
            <section class="about-us" id="about-us">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="modified-col col-md-12">
                            <p class="section-th">About Franchise India</p>
                            <div class="about-text-section">
                                Franchiseindia.com is world’s # 1 franchise website and an Entrepreneur’s daily dose. Under the aegis of Franchise India Holdings Ltd - Asia’s largest integrated franchise solutions company, the website provides every minute detail to entrepreneurs on aspects of franchising, franchise opportunities, business opportunities, partnerships, dealers, manufacturing, distribution, retail and much more. Being the world leaders in franchising, investors and franchisors can always count on Franchiseindia.com for rich, competent and millions of fruitful leads and sales. The website is the favourite destination for franchisors, start-ups, franchisees, dealers, distributors, retailers and franchise prospect seekers.<br/> <br/>

                                Franchiseindia.com has unique business opportunities in Premium, Domestic and International domain. For our readers who seek opportunities, we have segregated various spectrum of sections like What’s New for Industry articles and stories, Interviews section for Company/People profile and the news section which offers a daily dose of what’s happening in franchising across the world.<br/> <br/>

                                Our investors and opportunity seekers even get an opportunity to get featured in the weekly Franchiseindia.com newsletter that goes straight into the inbox of thousands of brands & investors. Franchiseindia.com also provides a chance to promote the brand directly on the social network websites like Twitter, Facebook, LinkedIn, and more.<br/>

                                Here’s why your brand should be there on <b>
                                    <a href="www.franchiseindia.com">franchiseindia.com</a>
                                </b>
                                <br/> <br/>

                                Besides, the abundance of business and franchise opportunities, Franchiseindia.com also has regular updates of the upcoming events in the franchise industry like India’s largest franchise show, FRO (National Franchise Retail and SME show), BOS (Business Opportunity Shows) and also all the franchise and retail award shows by Franchise India.
                                Visitors can start a new business by just registering on the website and that too for FREE. Franchiseindia.com users can browse through thousands of brands and choose the ideal opportunity.<br/> <br/>
                                Franchiseindia.com also updates you with a stable stream of inward traffic and visitors on the website.<br/>
                                Advertisers can also take benefits of the books and reports on Franchise India by clicking on the Bookstore section.<br/>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- about us ends -->
            @include('layout.newhomepage.footersection')
        </main>
        @include('layout.newhomepage.footer')
    </div>
</div>
{{-- @endnotmobile --}}
@endif
<!-- mobile section start -->
@if ($agent->isMobile())
{{-- @mobile --}}
<div id="content">
    <header class="header" id="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="d-flex">
                        <div class="p-2">
                            <div id="sidebarCollapse" class="menu-bar">
                                <img src="{{url('newhomepage/assets/img/menu-icon.svg')}}" alt="Menu" />

                            </div>
                        </div>
                        <div class="p-2 logo"> <a href="{{url('')}}"><img
                                        src="{{url('newhomepage/assets/img/Logo.svg')}}" alt="Home Logo"></a></div>
                        <div class="ml-auto d-flex">
                                        <span class="login-text-right text-right"
                                              data-toggle="modal" data-target="#search">
                                        <img src="{{url('newhomepage/assets/img/Search.svg')}}" alt="Home Search">
                                        </span>
                            @if(Auth::check())
                                <span class="login-text-right text-right" id="sidebarCollapse-main-login">
                                           <img src="{{url('newhomepage/assets/img/Login.svg')}}" alt="Login">
                                          </span>

                            @else
                                <span class="login-text-right text-right"
                                      data-toggle="modal" data-target="#login-pnl" id="loginselect">
                                        <img src="{{url('newhomepage/assets/img/Login.svg')}}" alt="Login">
                                        </span>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HERO SECTION STARTS -->
    <section class="hero-moblie" id="hero-mobile">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        Start a franchise in 30 Days
                    </h1>
                    <h2>So why wait, 1000+ Business Options</h2>
                    <a href="{{url('investor/create')}}">
                        <div class="btn-main btn-franchise" data-toggle="modal" data-target="#start-franchise">Start a Franchise Business
                            Today
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- HERO SECTION EMDS -->
    <main class="main" id="main">
        <!-- COVID PROOF BUSINESS OPPORTUNITIES START  -->
        <section class="covidproof section-30" id="covidproof">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-ptb">
                            <h2>Covid Proof Business Opportunities</h2>
                        </div>
                    </div>
                </div>
                <!-- Swiper -->
                <div class="swiper-container">

                    <div class="swiper-wrapper">
                        @php
                            $pageType = (request()->segment(1) == 'premiumbrand' || request()->segment(2) == 'premiumbrand') ? 2 : 1;
                        @endphp
                        @foreach ($brands->where('brand_section', 2)->where('page_type', $pageType)->take(4)->shuffle() as $logoDetail)
                            @php
                                $brandUrl = Config('constants.MainDomain').$logoDetail['brand_link'];
                                if(isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans))
                                $brandUrl = Config('constants.MainDomain').'/hi'.$logoDetail['brand_link'];
                              $cat_url = "/business-opportunities/".strtolower(str_replace(' ', '-', $logoDetail['brand_category'])).".m". $logoDetail['brand_category_id'];
                            @endphp
                            <div class="swiper-slide">
                                <div class="overlaybg"></div>
                                <div class="swiper-slide-section-main">
                                    <div class="overlay-card"></div>
                                    <div class="card card-m card-p-10">
                                        <div class="brand-img">
                                            <div class="brand-img-section">
                                                <a href="{{ $brandUrl }}">
                                                    <a href="{{ $brandUrl }}" target="_blank"><img src="{{ $logoDetail['brand_img'] }}" alt="{{$logoDetail['brand_heading']}}"></a>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body-section">
                                            <p>
                                                <a href="{{url('').$cat_url}}" target="_blank">{{$logoDetail['brand_category']}}</a>
                                            </p>
                                            <h2>{{$logoDetail['brand_heading']}} </h2>
                                            <div class="d-flex">
                                                <div class="card-info">
                                                    Investment range
                                                </div>
                                                <div class="card-info-amt">
                                                    ₹{{$logoDetail['investment_range_new']}}
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="card-info">
                                                    Area Required
                                                </div>
                                                <div class="card-info-amt">
                                                    {{$logoDetail['area_required']}}
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="card-info">
                                                    Franchise Outlets
                                                </div>
                                                <div class="card-info-amt">
                                                    {{$logoDetail['franchise_outlets']}}
                                                </div>
                                            </div>
                                            <div class="link-section">
                                                <a href="{{ $brandUrl }}"><div class="">
                                                        Know More
                                                    </div></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- COVID PROOF BUSINESS OPPORTUNITIES ENDS -->

        <section class="top-franchise-opportunities section-30"
                 id="top-franchise-opportunities">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="brand-img-google">
                            <div class="brand-img-section">

                                <!-- /1057625/FIHL/WAP_HP_300x250_ATF-->
                                <div id='adslot300x250_ATF'>
                                    <script>
                                        googletag.cmd.push(function() { googletag.display('adslot300x250_ATF'); });
                                    </script>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Best Franchise Opportunity starts -->
        <section class="best-franchise-opportunity section-30"
                 id="best-franchise-opportunity">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-ptb">
                            <h2>Best Franchise Opportunity</h2>
                        </div>
                    </div>
                </div>
                <!-- Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @php
                            $brandLogo3 = $brands->where('brand_section', 3)->where('page_type', $pageType)->take(8)->shuffle();
                        @endphp

                        @foreach($brandLogo3 as $logoDetail)
                            @php
                                $brandUrl = Config('constants.MainDomain').$logoDetail['brand_link'];
                            $cat_url = "/business-opportunities/".strtolower(str_replace(' ', '-', $logoDetail['brand_category'])).".m". $logoDetail['brand_category_id'];
                            @endphp
                            {{--@if($loop->index < 8)--}}

                            <div class="swiper-slide">
                                <div class="overlaybg"></div>
                                <div class="swiper-slide-franchise-opportunity">

                                    <div class="card card-m card-p-10">
                                        <div class="brand-img-dfa">
                                            <div class="brand-img-section">
                                                <a href="{{ $brandUrl }}">
                                                    <img src="{{$logoDetail['brand_img'] }}" alt="{{$logoDetail['brand_heading']}}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body-section">
                                            <p>
                                                <a href="{{url('').$cat_url}}" target="_blank">{{$logoDetail['brand_category']}}</a>
                                            </p>
                                            <h2><a href="{{ $brandUrl }}" target="_blank">{{$logoDetail['brand_heading']}}</a></h2>
                                            <div class="d-flex">
                                                <div class="card-info">
                                                    Investment range
                                                </div>
                                                <div class="card-info-amt">
                                                    ₹{{$logoDetail['investment_range_new']}}
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="card-info">
                                                    Area Required
                                                </div>
                                                <div class="card-info-amt">
                                                    {{$logoDetail['area_required']}}
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="card-info">
                                                    Franchise Outlets
                                                </div>
                                                <div class="card-info-amt">
                                                    {{$logoDetail['franchise_outlets']}}
                                                </div>
                                            </div>
                                            <div class="link-section">
                                                <a href="{{ $brandUrl }}"><div class="">
                                                        Know More
                                                    </div></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--@endif--}}
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- Best Franchise Opportunity ends -->
        <!-- Upcoming Events starts -->
        <section class="upcomingevents section-30" id="upcomingevents">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-ptb">
                            <h2>Upcoming Events</h2>
                        </div>
                    </div>
                </div>
                <!-- Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="swiper-slide-events-main">
                                <div class="overlay-card"></div>
                                <div class="card card-m card-p-10">
                                    <div class="brand-image-section-events">
                                        <div class="brand-main-section">
                                            <a href="http://www.globalfranchiseleaders.com/" target="_blank">
                                                <img src="https://www.franchiseindia.com/images/events/gflfbg.jpg" class="img-fluid" alt="Global Franchise Leaders">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body-section">
                                        <h2>Global Franchise Leaders Forum</h2>
                                        <p>
                                            06TH NOVEMBER 2020 VIRTUAL CONFERENCE | 05:30 PM
                                        </p>
                                        <div class="link-section text-capitalize">
                                            <a href="http://www.globalfranchiseleaders.com/" target="_blank">Registration</a>
                                        </div>
                                        <div class="eventhotline text-capitalize">
                                            Hotline: <span>+91 8588898248</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-slide-events-main">
                                <div class="overlay-card"></div>
                                <div class="card card-m card-p-10">
                                    <div class="brand-image-section-events">
                                        <div class="brand-main-section">
                                            <a href="https://www.franchiseindia.com/franchise-show-south/" target="_blank">
                                                <img src="https://www.franchiseindia.com/images/events/southfs.jpg" class="img-fluid" alt="Franchise Show South">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body-section">
                                        <h2>Franchise Show - South Region</h2>
                                        <p>
                                            07TH NOVEMBER 2020 | 10:00 AM
                                            VIRTUAL
                                        </p>
                                        <div class="link-section  text-capitalize">
                                            <a href="https://www.franchiseindia.com/franchise-show-south/" target="_blank">Registration</a>
                                        </div>
                                        <div class="eventhotline  text-capitalize">
                                            Hotline: <span>+91 9582181817</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-slide-events-main">
                                <div class="overlay-card"></div>
                                <div class="card card-m card-p-10">
                                    <div class="brand-image-section-events">
                                        <div class="brand-main-section">
                                            <a href="https://www.franchiseindia.com/franchise-show-west/" target="_blank">
                                                <img src="https://www.franchiseindia.com/images/events/westfs.jpg" class="img-fluid" alt="Franchise Show West">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body-section">
                                        <h2>Franchise Show - West Region</h2>
                                        <p>
                                            29TH NOVEMBER 2020 | 10:00 AM VIRTUAL
                                        </p>
                                        <div class="link-section  text-capitalize">
                                            <a href="https://www.franchiseindia.com/franchise-show-west/" target="_blank">Registration</a>
                                        </div>
                                        <div class="eventhotline  text-capitalize">
                                            Hotline: <span>+91 9582181817</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- Upcoming Events ends -->
        <!-- Top International Opportunities starts -->
        <section class="top-international-opportunities section-30" id="top-international-opportunities">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-ptb">
                            <h2>Top International Opportunities</h2>
                        </div>
                    </div>
                </div>
                <!-- Swiper -->
                <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
                    <div class="swiper-wrapper" style="transform: translate3d(-2340px, 0px, 0px); transition: all 0ms ease 0s;">
                        @foreach($TopInternationalOpportunities as $top)
                            <div class="swiper-slide">
                                <div class="overlaybg"></div>
                                <div class="swiper-slide-international-opportunities">

                                    <div class="card card-m card-p-10" style=" background-color: rgba({{$top['bgcolor']}},0.1); box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgb({{$top['bgcolor']}}, 0.36);">
                                        <div class="brand-img">
                                            <div class="brand-img-section">
                                                <a href="{{$top['url']}}">
                                                    <img src="{{$top['image']}}" class="" alt="{{$top['title']}}" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body-section">
                                            <p>
                                                <a href="#">{{$top['category']}}</a>
                                            </p>
                                            <h2> <a href="{{$top['url']}}">{{$top['title']}}</a> </h2>
                                            <div class="card-info-summry">
                                                {{$top['description']}}
                                            </div>
                                            <div class="link-section">
                                                <a href="{{$top['url']}}" style="
                              padding: 5px;
                              border-radius: 4px;
                              font-weight: 600;
                              ">Know More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span></div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>
        </section>
        <!-- Top International Opportunities ends -->
        <section class="top-franchise-opportunities section-30"
                 id="top-franchise-opportunities">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="brand-img-google">
                            <div class="brand-img-section">
                                <!-- /1057625/FIHL/WAP_HP_300x250_Mid_1-->
                                <div id='adslot300x250_Mid_1'>
                                    <script>
                                        googletag.cmd.push(function() { googletag.display('adslot300x250_Mid_1'); });
                                    </script>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Top Franchise Opportunities starts -->
        <section class="top-franchise-opportunities section-30"
                 id="top-franchise-opportunities">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-ptb">
                            <h2>Top Franchise Opportunities </h2>
                        </div>
                    </div>
                </div>
                <!-- Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($brands->where('brand_section', 4)->where('page_type', $pageType)->take(24)->shuffle() as $logoDetail)
                            @php
                                $brandUrl = Config('constants.MainDomain').$logoDetail['brand_link'];
                                if(isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans))
                                $brandUrl = Config('constants.MainDomain').'/hi'.$logoDetail['brand_link'];
                            $cat_url = "/business-opportunities/".strtolower(str_replace(' ', '-', $logoDetail['brand_category'])).".m". $logoDetail['brand_category_id'];
                            @endphp
                            <div class="swiper-slide">
                                <div class="overlaybg"></div>
                                <div class="swiper-slide-top-franchise-opportunities">

                                    <div class="card card-m card-p-10">
                                        <div class="brand-img">
                                            <div class="brand-img-section">
                                                <a href="{{ $brandUrl }}">
                                                    <img src="{{$logoDetail['brand_img']}}" alt="{{$logoDetail['brand_alt']}}" class="img-b
                                       img-border">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body-section">
                                            <p>
                                                <a href="{{url('').$cat_url}}" target="_blank">{{$logoDetail['brand_category']}}</a>
                                            </p>
                                            <h2><a href="{{ $brandUrl }}" target="_blank">{{$logoDetail['brand_heading']}}</a></h2>
                                            <div class="d-flex">
                                                <div class="card-info">
                                                    Investment range
                                                </div>
                                                <div class="card-info-amt">
                                                    ₹{{$logoDetail['investment_range_new']}}
                                                </div>
                                            </div>
                                            <div class="link-section">
                                                <a href="{{ $brandUrl }}" class="know-more">Know More</a>
                                            </div>
                                            {{--<div class="custom-tags-main">--}}
                                            {{--<ul class="custom-tags">--}}
                                            {{--<li>--}}
                                            {{--clinics--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                            {{--nursing homes--}}
                                            {{--</li>--}}
                                            {{--</ul>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- Top Franchise Opportunities ends -->
        <!-- Featured Franchise Companies starts -->
        <section class="top-franchise-opportunities section-30 w-bg-main"
                 id="top-franchise-opportunities">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-ptb">
                            <h2>Featured Franchise Companies </h2>
                        </div>
                    </div>
                </div>
                <!-- Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($brands->where('brand_section', 5)->take(48)->shuffle() as $logoDetail)
                            @php
                                $brandUrl = Config('constants.MainDomain').$logoDetail['brand_link'];
                                if(isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans))
                                $brandUrl = Config('constants.MainDomain').'/hi'.$logoDetail['brand_link'];
                            @endphp
                            <div class="swiper-slide">
                                <div class="overlaybg"></div>
                                <div class="swiper-slide-top-franchise-opportunities">

                                    <div class="card-fihl card-m card-p-10">
                                        <div class="brand-img-fcc">
                                            <div class="brand-img-section">
                                                <a href="{{$brandUrl}}"><img src="{{$logoDetail['brand_img']}}" alt="{{$logoDetail['brand_alt']}}" ></a>
                                            </div>
                                        </div>
                                        <div class="card-body-section">
                                            <p>
                                                Investment range
                                            </p>
                                            <div class="card-info-amount">
                                                ₹{{$logoDetail['investment_range_new']}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- Featured Franchise Companies ends -->

        <section class="top-franchise-opportunities section-30"
                 id="top-franchise-opportunities">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="brand-img-google">
                            <div class="brand-img-section">
                                <!-- /1057625/FIHL/WAP_HP_300x250_Mid_2-->
                                <div id='adslot300x250_Mid_2' >
                                    <script>
                                        googletag.cmd.push(function() { googletag.display('adslot300x250_Mid_2'); });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- News section starts -->
        <section class="franchise-news section-30"
                 id="franchise-news">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 col-lg-6">
                        <div class="news-section-main-insight">
                            <div class="section-ptb">
                                <h2>
                                    Franchise Insights
                                </h2>
                                <div class="view-all-main-section">
                                    <a href="{{url('content')}}">View All</a>
                                </div>
                            </div>
                            @php
                                $articless = array();
                            @endphp
                            @foreach($articles as $article)
                                @php
                                    $siteType   = Config('constants.articleArr.'.$article['site_type']);
                                    $imagePath  = Config('constants.MainDomain').str_replace('uploads/content/', 'uploads/thumbnails/', $article['image']);
                                    $kickerUrl  = '/content/'.$article['urlKicker'];
                                    $articleUrl = '/'.$siteType.'/'.$article['slug'].'.'.$article['content_id'];
                                    if( $siteType == "gallery") {
                                    $sourcePhoto       = public_path($article['image']);
                                    $imagename         = pathinfo($sourcePhoto)['basename'];
                                    $imagePath         = Config('constants.MainDomain')."/uploads/thumbnails/ga/".$imagename;
                                    $kickerUrl         = '/gallery/'.Str::slug($article['kicker']).'/'.$article['kicker_id'];
                                    }
                                    $content = ($article['homeTitle']) ? $article['homeTitle'] : $article['title'];
                                    $articless[] = array(
                                    'image' => $imagePath,
                                    'url' => $articleUrl,
                                    'title' => $article['kicker'],
                                    'content' => $content,
                                    'auther' => $article['author'],
                                    )
                                @endphp
                            @endforeach
                            <div class="card">
                                <div class="row">
                                    <div class="modified-col col-xs-12
                                          col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                        <div
                                                class="brand-newsx-image-section">
                                            <div class="brand-main-section">
                                                <a href="{{$articless[0]['url']}}">
                                                    <img src="{{$articless[0]['image']}}"
                                                         class="img-b
                                                      img-border" alt="{{$articless[0]['title']}}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="newsx-main-bg">

                                            <div class="news-headin-section">
                                                <a href="{{$articless[0]['url']}}">
                                                    <h2>{{$articless[0]['title']}}</h2>
                                                </a>
                                                <p>{{mb_strimwidth($articless[0]['content'], 0, 50, "...")}}</p>
                                                <div class="news-konwmore">
                                                    <a href="{{$articless[0]['url']}}">
                                                        Know More
                                                    </a>
                                                </div>
                                                <div class="d-flex
                                                   author-section">
                                                    <div class="author-info">
                                                        <ul
                                                                class="author-share">
                                                            <li>
                                                                <a href="http://www.facebook.com/sharer.php?u={{url($articless[0]['url'])}}">
                                                                    <img src="{{url('newhomepage/assets/img/facebookx2.png')}}"
                                                                         alt="Facebook">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="https://twitter.com/share?url={{url($articless[0]['url'])}}">
                                                                    <img src="{{url('newhomepage/assets/img/twitterx2.png')}}"
                                                                         alt="twitter">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="http://www.linkedin.com/shareArticle?mini=true&url={{url($articless[0]['url'])}}">
                                                                    <img src="{{url('newhomepage/assets/img/linkedinx2.png')}}"
                                                                         alt="linkedin">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="author-info-main">
                                                        <a href="{{$articless[0]['url']}}">-{{$articless[0]['auther']}}
                                                            <br>Article Editor</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modified-col col-xs-12
                                          col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                        <div class="small-newsx-post">
                                            <ul class="small-newsx-post-main">
                                                @for($i=1; $i<4;$i++)
                                                    <li>
                                                        <div
                                                                class="newx-post-smalli">
                                                            <div class="d-flex">
                                                                <div
                                                                        class="brand-newsx-small-image-section">
                                                                    <div
                                                                            class="brand-main-section">
                                                                        <a href="{{$articless[$i]['url']}}">
                                                                            <img src="{{$articless[$i]['image']}}"}}
                                                                                 alt="{{$articless[$i]['title']}}" class="img-b
                                                                    img-border">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                        class="newsx-samll-post-summry">
                                                                    <a href="#">
                                                                        <h3>{{$articless[$i]['title']}}</h3>
                                                                    </a>
                                                                    <div
                                                                            class="know-more-smallpost">
                                                                        <a href="{{$articless[$i]['url']}}">
                                                                            Know More
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 col-lg-6">
                        <div class="news-section-main-insight">
                            <div class="section-ptb">
                                <h2>
                                    News
                                </h2>
                                <div class="view-all-main-section">
                                    <a href="https://news.franchiseindia.com/">View All</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="row">
                                    <div class="modified-col col-xs-12
                                                    col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                        <div
                                                class="brand-newsx-image-section">
                                            <div class="brand-main-section">
                                                <a href="{{$news[0]['url']}}">
                                                    <img
                                                            src="{{url($news[0]['image'])}}"
                                                            class="img-b
                                                                img-border" alt="{{$news[0]['title']}}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="newsx-main-bg">

                                            <div class="news-headin-section">
                                                <a href="{{$news[0]['url']}}">
                                                    <h2>
                                                        {{$news[0]['title']}}
                                                    </h2>
                                                </a>
                                                <p>{{mb_strimwidth($news[0]['content'], 0, 50, "...")}}</p>
                                                <div class="news-konwmore">
                                                    <a href="{{$news[0]['url']}}">
                                                        Know More
                                                    </a>
                                                </div>
                                                <div class="d-flex
                                                             author-section">
                                                    <div class="author-info">
                                                        <ul
                                                                class="author-share">
                                                            <li>
                                                                <a href="http://www.facebook.com/sharer.php?u={{url($news[0]['url'])}}">
                                                                    <img src="{{url('newhomepage/assets/img/facebookx2.png')}}"
                                                                         alt="Facebook">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="https://twitter.com/share?url={{url($news[0]['url'])}}">
                                                                    <img src="{{url('newhomepage/assets/img/twitterx2.png')}}"
                                                                         alt="twitter">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="http://www.linkedin.com/shareArticle?mini=true&url={{url($news[0]['url'])}}">
                                                                    <img src="{{url('newhomepage/assets/img/linkedinx2.png')}}"
                                                                         alt="linkedin">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                            class="author-info-main">
                                                        <a href="#">-{{$news[0]['auther']}}<br>News</a>
                                                        Editor
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modified-col col-xs-12
                                                    col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                        <div class="small-newsx-post">
                                            <ul class="small-newsx-post-main">
                                                @for($i = 1; $i< 4; $i++)
                                                    <li>
                                                        <div
                                                                class="newx-post-smalli">
                                                            <div class="d-flex">
                                                                <div
                                                                        class="brand-newsx-small-image-section">
                                                                    <div
                                                                            class="brand-main-section">
                                                                        <a href="{{$news[$i]['url']}}">
                                                                            <img
                                                                                    src="{{$news[$i]['image']}}"
                                                                                    class="img-b
                                                                               img-border"
                                                                                    alt="{{$news[$i]['title']}}">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                        class="newsx-samll-post-summry">
                                                                    <a href="{{$news[$i]['url']}}">
                                                                        <h3>
                                                                            {{$news[$i]['title']}}
                                                                        </h3>
                                                                    </a>
                                                                    <div
                                                                            class="know-more-smallpost">
                                                                        <a href="{{$news[$i]['url']}}">
                                                                            Know More
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- News section ends -->
        <!-- Testimonial section starts -->
        <section class="testimonia-section section-30"
                 id="testimonia-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div id="testimonial-carousel" class="owl-carousel owl-arrow">
                            <div class="carousel-item-a">
                                <div class="testimonial-main">
                                    <div class="testimonial-brand-section">
                                        <img src="https://www.franchiseindia.com/images/testimonials/remax-home.gif"
                                             class="img-b-fluid" alt="remax">
                                    </div>
                                    <div class="testimonial-brand-summury">
                                        <div class="open-quotes">
                                            <img src="{{url('newhomepage/assets/img/open-qoutes.svg')}}" alt="quotes-open" />
                                        </div>
                                        <p>   We partnered with FranchiseIndia.com to scale our business and it has been a great experience. With their zeal to actually take out time for their clients and understand their business needs, they were able to generate the best leads for us. The team at FranchiseIndia.com is also quick to respond to your queries and their service is impeccable.
                                        </p>
                                        <div class="textimonial-brand-section">
                                            REMAX INDIA
                                        </div>
                                        <div class="close-quotes">
                                            <img src="{{url('newhomepage/assets/img/close-quotes.svg')}}" alt="quotes-close" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item-a">
                                <div class="testimonial-main">
                                    <div class="testimonial-brand-section">
                                        <img src="https://www.franchiseindia.com/images/fnp.gif"
                                             class="img-b-fluid" alt="Fnp">
                                    </div>
                                    <div class="testimonial-brand-summury">
                                        <div class="open-quotes">
                                            <img src="{{url('newhomepage/assets/img/open-qoutes.svg')}}" alt="quotes-open">
                                        </div>
                                        <p> It is indeed an ideal platform to expand any brand PAN India. Our long association has helped us to grow our network & establish 270 outlets in 98 cities"
                                        </p>
                                        <div class="textimonial-brand-section">
                                            Ferns N Petals
                                        </div>
                                        <div class="close-quotes">
                                            <img src="{{url('newhomepage/assets/img/close-quotes.svg')}}" alt="quotes-close" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item-a">
                                <div class="testimonial-main">
                                    <div class="testimonial-brand-section">
                                        <img src="https://www.franchiseindia.com/images/testimonials/home/liberty.gif"
                                             class="img-b-fluid" alt="Liberty">
                                    </div>
                                    <div class="testimonial-brand-summury">
                                        <div class="open-quotes">
                                            <img src="{{url('newhomepage/assets/img/open-qoutes.svg')}}" alt="quotes-open" />
                                        </div>
                                        <p> We have been using Franchise India website services for a very long time. And we have been able to create some very successful franchisee partners. The quality and flow of leads is really very good. Our association with Franchise India has been a great experience and we will not only continue this relationship but also recommend others to take their expert services and advisory.
                                        </p>
                                        <div class="textimonial-brand-section">
                                            Liberty Shoes Ltd
                                        </div>
                                        <div class="close-quotes">
                                            <img src="{{url('newhomepage/assets/img/close-quotes.svg')}}" alt="quotes-close" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item-a">
                                <div class="testimonial-main">
                                    <div class="testimonial-brand-section">
                                        <img src="https://www.franchiseindia.com/images/testimonials/ims-home.gif"
                                             class="img-b-fluid" alt="ims Home">
                                    </div>
                                    <div class="testimonial-brand-summury">
                                        <div class="open-quotes">
                                            <img src="{{url('newhomepage/assets/img/open-qoutes.svg')}}" alt="quotes-open" />
                                        </div>
                                        <p>  We have been using Franchise India website services for a very long time. And we have been able to create some very successful franchisee partners. The quality and flow of leads is really very good. Our association with Franchise India has been a great experience and we will not only continue this relationship but also recommend others to take their expert services and advisory.
                                        </p>
                                        <div class="textimonial-brand-section">
                                            IMS Learning Resources pvt ltd
                                        </div>
                                        <div class="close-quotes">
                                            <img src="{{url('newhomepage/assets/img/close-quotes.svg')}}" alt="quotes-close" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="testimonial-ads-section">
                            <div class="brand-img-google">
                                <div class="brand-img-section">
                                    <!-- /1057625/FIHL/WAP_HP_300x250_BTF-->
                                    <div id='adslot300x250_BTF' >
                                        <script>
                                            googletag.cmd.push(function() { googletag.display('adslot300x250_BTF'); });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial section ends -->
        <!-- newsletter section starts -->
        <section class="newslettersection text-center section-30 bg-b-main"
                 id="newslettersection">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>Share your email address to get latest updates from the industry-</p>
                        <h2>Newsletter Signup</h2>
                        <div class="main-newsletter">
                            <form id="update" method="post" action="{{url('newslettersignup')}}">
                                <ul class="newsletter">
                                    <li>
                                        <input type="hidden" name="site_type" value="fi">
                                        <input type="email" class="form-control
                                          emailer-main"
                                               aria-label="Enter Mail"
                                               aria-describedby="button-addon2" name="email" required="">
                                    </li>
                                    <li><button class="btn btn-main" type="submit"
                                                id="button-addon2">SignUp</button></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 text-center socail-newsletter-section">
                        <p>Stay tuned &amp; get updated</p>
                        <h2>Follow Franchise India</h2>
                        <div class="main-newsletter">
                            <form action="">
                                <ul class="newsletter-social">
                                    <li><a
                                                href="https://www.facebook.com/FranchiseIndiaMedia"
                                                target="_blank"><img src="{{url('newhomepage/assets/img/fb-icon.svg')}}"
                                                                     alt="Facebook"></a></li>
                                    <li><a href="https://www.instagram.com/franchiseindia_/"
                                           target="_blank"><img
                                                    src="{{url('newhomepage/assets/img/instagram-icon.svg')}}" alt=""></a></li>
                                    <li><a href="https://twitter.com/FranchiseIndia"
                                           target="_blank"><img
                                                    src="{{url('newhomepage/assets/img/twitter-icon.svg')}}"
                                                    alt="twitter"></a></li>
                                    <li><a
                                                href="https://www.youtube.com/user/FranchiseIndia"
                                                target="_blank"><img
                                                    src="{{url('newhomepage/assets/img/you-tube-icon.svg')}}"
                                                    alt="youtube"></a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- newsletter section ends -->
        <!-- about us -->
        <section class="about-us" id="about-us">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="modified-col col-md-12">
                        <p class="section-th">About Franchise India</p>
                        <div class="about-text-section">
                            Franchiseindia.com is world’s # 1 franchise website and an Entrepreneur’s daily dose. Under the aegis of Franchise India Holdings Ltd - Asia’s largest integrated franchise solutions company, the website provides every minute detail to entrepreneurs on aspects of franchising, franchise opportunities, business opportunities, partnerships, dealers, manufacturing, distribution, retail and much more. Being the world leaders in franchising, investors and franchisors can always count on Franchiseindia.com for rich, competent and millions of fruitful leads and sales. The website is the favourite destination for franchisors, start-ups, franchisees, dealers, distributors, retailers and franchise prospect seekers.<br/> <br/>

                            Franchiseindia.com has unique business opportunities in Premium, Domestic and International domain. For our readers who seek opportunities, we have segregated various spectrum of sections like What’s New for Industry articles and stories, Interviews section for Company/People profile and the news section which offers a daily dose of what’s happening in franchising across the world.<br/> <br/>

                            Our investors and opportunity seekers even get an opportunity to get featured in the weekly Franchiseindia.com newsletter that goes straight into the inbox of thousands of brands & investors. Franchiseindia.com also provides a chance to promote the brand directly on the social network websites like Twitter, Facebook, LinkedIn, and more.<br/>

                            Here’s why your brand should be there on <b>
                                <a href="www.franchiseindia.com">franchiseindia.com</a>
                            </b>
                            <br/> <br/>

                            Besides, the abundance of business and franchise opportunities, Franchiseindia.com also has regular updates of the upcoming events in the franchise industry like India’s largest franchise show, FRO (National Franchise Retail and SME show), BOS (Business Opportunity Shows) and also all the franchise and retail award shows by Franchise India.
                            Visitors can start a new business by just registering on the website and that too for FREE. Franchiseindia.com users can browse through thousands of brands and choose the ideal opportunity.<br/> <br/>
                            Franchiseindia.com also updates you with a stable stream of inward traffic and visitors on the website.<br/>
                            Advertisers can also take benefits of the books and reports on Franchise India by clicking on the Bookstore section.<br/>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about us ends -->
        @include('layout.newhomepage.footersection')

    </main>
    @include('layout.newhomepage.footer')
</div>
@endif
{{-- @endmobile --}}
<!-- mobile section end -->
@include('layout.newhomepage.popupfranchiseshowmain')
<div class="overlay"></div>
<script src="https://www.franchiseindia.com/js/jquery-3.1.1.min.js"></script>
<!-- Popper.JS -->
<script src="{{url('newhomepage/assets/vendor/popper/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{url('newhomepage/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="{{url('newhomepage/assets/vendor/mCustomScrollbar/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- Font Awesome JS -->
<script defer src="{{url('newhomepage/assets/vendor/fontawesome/js/solid.js')}}"></script>
<script defer src="{{url('newhomepage/assets/vendor/fontawesome/js/fontawesome.js')}}"></script>
<!-- swiper@6.2.0 JS -->
<script src="{{url('newhomepage/assets/vendor/swiper/js/swiper-bundle.min.js')}}"></script>
<!-- Owl carousel -->
<script src="{{url('newhomepage/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<!-- Custom JS -->
{{-- @notmobile --}}
@if ($agent->isDesktop())

<script src="{{url('newhomepage/assets/js/app.js')}}"></script>
{{-- @endnotmobile --}}
@elseif ($agent->isTablet())

{{-- @tablet --}}
<script src="{{url('newhomepage/assets/js/app.mobile.js')}}"></script>
{{-- @endtablet --}}
@elseif ($agent->isMobile())
{{-- @mobile --}}
<script src="{{url('newhomepage/assets/js/app.mobile.js')}}"></script>
@endif
{{-- @endmobile --}}
<script type="text/javascript" src="{{url('awesomplete/awesomplete.js') }}"></script>
<script>function frg_panel(){$("#lg-pnl").hide(),$("#frg-pnl").show()}function lg_panel(){$("#lg-pnl").show(),$("#loginactive").click(),$("#frg-pnl").hide()}$("#exampleFormControlSelect1").change(function(){window.location=$(this).val()}),$("#exampleFormControlSelect2").change(function(){window.location=$(this).val()}),$(document).ready(function(){$("#btnhome").click(function(){var e=$("input[name='optionsRadios']:checked").val(),i=document.getElementById("emailfreeadvice").value,n=document.getElementById("mobilefreeadvice").value;$.ajax({type:"post",url:"/freeadvice",data:{optionsRadios:e,name:"abc",pincode:"000000",email:i,mobile:n,details:"test",is_newsletter:1},success:function(e){alert(e),window.location="/thanks-advice-form"}})})}),$("#registerselect").click(function(){$("#registeractive").click()}),$("#loginselect").click(function(){$("#loginactive").click()}),$("#mobilereg").click(function(){$("#registeractive").click()}),$("#registerselect1").click(function(){$("#login").addClass("active"),$("#register").removeClass("active"),$("#loginactiveopen").addClass("active"),$("#registeractiveopen").removeClass("active")}),$("#loginselect1").click(function(){$("#login").removeClass("active"),$("#register").addClass("active"),$("#loginactiveopen").removeClass("active"),$("#registeractiveopen").addClass("active")});const input=document.getElementById("dealer-bar-search"),awesomplete=new Awesomplete(input),navBarSearch=$("#dealer-bar-search");function prepareList(e){var i=[];e.forEach(e=>{i.push(e.name)}),awesomplete.list=i}function setCookie(){document.cookie="accept_cookie=ok",$("#cookie").hide()}function getCookie(){return checkCookie("accept_cookie")}function checkCookie(e){for(var i=e+"=",n=document.cookie.split(";"),a=0;a<n.length;a++){for(var o=n[a];" "==o.charAt(0);)o=o.substring(1);if(0==o.indexOf(i))return o.substring(i.length,o.length)}return""}navBarSearch.on("keypress keyup keypress blur change",function(){var e=$(this).val();e.length>=2&&$.ajax({url:"/dealers-search/"+e,type:"GET",dataType:"json",success:function(e){prepareList(JSON.parse(JSON.stringify(e)))},error:function(e){console.log(e)}})}),navBarSearch.on("awesomplete-selectcomplete",function(){if(""!=$("#dealer-bar-search").val()){var e=$("#dealer-bar-search").val(),i=e.split(" - <strong> in");i.length>1&&(e=i[0]),window.location.href="/dealers-india/search/"+e}}),$("#textcompany").on("click",function(){if(""!=$("#dealer-bar-search").val()){var e=$("#dealer-bar-search").val(),i=e.split(" - <strong> in");i.length>1&&(e=i[0]),window.location.href="/dealers-india/search/"+e}}),$(document).ready(function(){"ok"==getCookie()?$("#cookie").hide():$("#cookie").show()});</script>
@if( !(!empty(request()->segment(2)) && request()->segment(1) == "brands" && isset(explode('.', request()->segment(2))[1]) && in_array(explode('.', request()->segment(2))[1], Config('constants.popupBrands')) ))

@if ($agent->isTablet() || $agent->isDesktop)

    {{-- @notmobile --}}
    @php
        $expoPopup = 0;
        if (empty(Cookie::get('expoppoup17'))) {
            $expoPopup = 1;
			Cookie::queue("expoppoup17", 'RI2017', 120);
        }

        $ip    = $_SERVER['REMOTE_ADDR'];
        $query = "";
        $query = App\Http\Controllers\CommonController::getIpLocationState($ip);
        if(!empty($query))
          $query = strtolower($query);

        $southCodes = ['andhra pradesh','telangana','karnataka','kerala'];
        $eastCodes = ['west bengal', 'bihar', 'jharkhand', 'odisha', 'nepal'];
        $westCodes  = ['maharashtra', 'goa', 'madhya pradesh'];
		$gujaratCodes  = ['gujarat', 'goa'];
        $northCodes  = ['haryana', 'delhi', 'uttar pradesh', 'punjab', 'jammu and kashmir', 'jammu', 'kashmir', 'himachal pradesh', 'chandigarh', 'uttarakhand'];
        $rajasthan  = ['rajasthan'];
        $indiaCodes  = ['andhra pradesh','karnataka','kerala','lakshadweep','pondicherry','telangana','tamil nadu', 'tamilnadu','uttar pradesh','rajasthan','haryana','delhi'];
        $haryanaCodes  = ['haryana'];
		$otherCodes  = ['maharashtra','tamil nadu', 'tamilnadu'];
        $jammuCodes  = ['punjab', 'jammu and kashmir', 'jammu', 'kashmir'];
        $upCodes  = ['uttar pradesh'];
        $rajasthanCodes  = ['rajasthan'];

        App\Http\Controllers\CommonController::checkCampaignUrl();
    @endphp

    @if($expoPopup == 1 && request()->segment(1) != 'property-loan' && request()->segment(1) != 'myaccount' && request()->segment(1) != 'payment' && request()->segment(1) != 'mailer' && empty(request()->openpopup) && empty(request()->popup_lead))
        @if(in_array($query, $rajasthan))
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 0)
                    @include('includes.banners.popupfranchiseshowmain')
                @endif
            @else
                @include('includes.banners.popupfranchiseshowmain')
            @endif
        @elseif(in_array($query, $southCodes))
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 0)
                    @include('includes.banners.popupfranchiseshowmain')
                @endif
            @else
                @include('includes.banners.popupfranchiseshowmain')
            @endif
        @elseif(in_array($query, $westCodes))
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 0)
                    @include('includes.banners.popupfranchiseshowmain')
                @endif
            @else
                @include('includes.banners.popupfranchiseshowmain')
            @endif
        @elseif(in_array($query, $eastCodes))
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 0)
                    @include('includes.banners.popupfranchiseshowmain')
                @endif
            @else
                @include('includes.banners.popupfranchiseshowmain')
            @endif
        @else
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 0)
                    @include('includes.banners.popupfranchiseshowmain')
                @endif
            @else
                @include('includes.banners.popupfranchiseshowmain')
            @endif
        @endif
    @endif
    <!-- popupmag Start of franchiseindia Zendesk Widget script  popupmag -->
    @endif
    {{-- @endnotmobile --}}

@endif
<script>function submitCategory(){var a=$("#getSubCatCategoryDataHeader").val(),t=$("#getSubCategoryDataHeader").val(),e=$("#getMainCategoryDataHeader").val(),n="/business-opportunities/";return a?n=n+$("option:selected",$("#getSubCatCategoryDataHeader")).attr("slug")+".ssc"+a+"?catTab=1":t?n=n+$("option:selected",$("#getSubCategoryDataHeader")).attr("slug")+".sc"+t+"?catTab=1":e&&void 0!==$("option:selected",$("#getMainCategoryDataHeader")).attr("slug")?n=n+$("option:selected",$("#getMainCategoryDataHeader")).attr("slug")+".m"+e+"?catTab=1":n+="all/all",window.open(n,"_blank"),!1}function submitLocation(){var a=$("#getMainCategoryDataHeaderLoc").val(),t=$("#headercity").val(),e=$("#stateHeader").val(),n=$("option:selected",$("#getMainCategoryDataHeaderLoc")).attr("slug"),o=$("option:selected",$("#headercity")).attr("slug"),i=$("option:selected",$("#stateHeader")).attr("slug"),r="/business-opportunities/";return""!=a&&""!=e&&""!=t?r=r+n+"-in-"+i+"/mc-"+a+"/loc-"+e+"/ct-"+o:""!=a&&""!=e?r=r+n+"-in-"+i+"/mc-"+a+"/loc-"+e:""!=e&&""!=t?r=r+"business-in-"+i+"/loc-"+e+"/ct-"+o:""!=e?r=r+i+".LOC"+e:(r+="all/all",window.open(r,"_blank")),window.open(r+"?locTab=1","_blank"),!1}function submitInvestment(){var a=$("#getMainCategoryDataHeaderInv").val(),t=$("#minAmount").val(),e=$("#maxAmount").val(),n=$("option:selected",$("#getMainCategoryDataHeaderInv")).attr("slug"),o=$("option:selected",$("#minAmount")).attr("slug"),i=$("option:selected",$("#maxAmount")).attr("slug"),r="/business-opportunities/";return""!=a&&""!=t&&""!=e?r=r+n+"-in-india/mc-"+a+"/range-"+o+"-"+i:""!=a&&""!=t?r=r+n+"-in-india/mc-"+a+"/range-"+o:""!=t&&""!=e?r=r+"business/range-"+o+"-"+i:window.open(r+"all/all?invTab=1","_blank"),window.open(r+"?invTab=1","_blank"),!1}function submitCategory1(){var a=$("#getSubCatCategoryDataHeader1").val(),t=$("#getSubCategoryDataHeader1").val(),e=$("#getMainCategoryDataHeader1").val(),n="/business-opportunities/";return a?n=n+$("option:selected",$("#getSubCatCategoryDataHeader1")).attr("slug")+".ssc"+a+"?catTab=1":t?n=n+$("option:selected",$("#getSubCategoryDataHeader1")).attr("slug")+".sc"+t+"?catTab=1":e&&void 0!==$("option:selected",$("#getMainCategoryDataHeader1")).attr("slug")?n=n+$("option:selected",$("#getMainCategoryDataHeader1")).attr("slug")+".m"+e+"?catTab=1":n+="all/all",window.open(n,"_blank"),!1}function submitLocation1(){var a=$("#getMainCategoryDataHeaderLoc1").val(),t=$("#headercity1").val(),e=$("#stateHeader1").val(),n=$("option:selected",$("#getMainCategoryDataHeaderLoc1")).attr("slug"),o=$("option:selected",$("#headercity1")).attr("slug"),i=$("option:selected",$("#stateHeader1")).attr("slug"),r="/business-opportunities/";return""!=a&&""!=e&&""!=t?r=r+n+"-in-"+i+"/mc-"+a+"/loc-"+e+"/ct-"+o:""!=a&&""!=e?r=r+n+"-in-"+i+"/mc-"+a+"/loc-"+e:""!=e&&""!=t?r=r+"business-in-"+i+"/loc-"+e+"/ct-"+o:""!=e?r=r+i+".LOC"+e:(r+="all/all",window.open(r,"_blank")),window.open(r+"?locTab=1","_blank"),!1}function submitInvestment1(){var a=$("#getMainCategoryDataHeaderInv1").val(),t=$("#minAmount1").val(),e=$("#maxAmount1").val(),n=$("option:selected",$("#getMainCategoryDataHeaderInv1")).attr("slug"),o=$("option:selected",$("#minAmount1")).attr("slug"),i=$("option:selected",$("#maxAmount1")).attr("slug"),r="/business-opportunities/";return""!=a&&""!=t&&""!=e?r=r+n+"-in-india/mc-"+a+"/range-"+o+"-"+i:""!=a&&""!=t?r=r+n+"-in-india/mc-"+a+"/range-"+o:""!=t&&""!=e?r=r+"business/range-"+o+"-"+i:window.open(r+"all/all?invTab=1","_blank"),window.open(r+"?invTab=1","_blank"),!1}</script>

{{--<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=a76a1630-c68b-4165-b6f1-ef96b178c0c3"></script>--}}
</body>
</html>