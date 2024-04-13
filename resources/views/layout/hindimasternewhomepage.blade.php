<!DOCTYPE html>
<html>
<head>
    @include('layout.hindinewhomepage.head')
</head>
<body>
@mobile
@include('layout.hindinewhomepage.mobile.topsearch')
@endmobile
@include('layout.hindinewhomepage.topsearch');
@php
    $TopInternationalOpportunities = array(

        "0" => array(
            'url' => 'https://www.franchiseindia.com/brands/REMAX-INDIA.25791',
            'image' => 'https://www.franchiseindia.com/images/remax(199x81).gif',
            'category' => 'Real Estate Sub',
            'title' => 'REMAX INDIA',
            'description' => 'World’s largest network of Real Estate Brokerage',
            'bgcolor' => '#004e99'
        ),

        "1" => array(
            'url' => 'https://www.franglobal.com/fatburger/',
            'image' => 'https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/fatburger_tbo_gold.gif',
            'category' => 'Ice Cream Chain',
            'title' => 'Fatburger',
            'description' => 'America’s Iconic Burger Chain, Now Franchising in India',
            'bgcolor' => '#e2383f'
        ),
        "2" => array(
            'url' => 'https://www.franglobal.com/otwc/',
            'image' => 'https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/oldtown_tbo_gold.gif',
            'category' => 'Ice Cream Chain',
            'title' => 'Potato Hut',
            'description' => 'Partner with Malaysia’s Authentic White Coffee Specialty Chain',
            'bgcolor' => '#fdc50c'
        ),
        "3" => array(
            'url' => 'https://www.franglobal.com/engage-and-grow/',
            'image' => 'https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/engage_199x81.png',
            'category' => 'Education',
            'title' => 'Enage &amp; Grow',
            'description' => 'Become A Certified Engage &amp; Grow Franchise in your Region &amp; Grow Your Business',
            'bgcolor' => '#0f75bd'
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
                    <div class="ttl">पासवर्ड भूल गए</div>
                    <div class="desc">
                        अपना ईमेल पता दर्ज करें जो आपके साथ जुड़ा हो
                        फ्रेंचाइजी खाता और हम आपको एक लिंक भेजेंगे
                        अपना पासवर्ड रीसेट करने के लिए।
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
                                 blur" name="email" placeholder="ईमेल-आईडी दर्ज करें"
                                       value="" required="">
                            </div>
                            <button type="submit" class="btn btn-default btn-gry
                              btn-prop">पासवर्ड रीसेट</button> <span
                                    class="pipe">|</span> <a class="frg-link" href="#"
                                                             onclick="lg_panel()">लॉग इन</a>
                        </form>
                    </div>
                </div>
                <div id="lg-pnl" style="display:block">
                    <ul class="nav nav-tabs" role="tablist">
                        <li id="loginactiveopen"><a href="#login"
                                                    aria-controls="login" role="tab" data-toggle="tab"
                                                    id="loginactive">लॉग इन</a></li>
                        <li id="registeractiveopen" class="active"><a
                                    href="#register" aria-controls="register"
                                    role="tab" data-toggle="tab" id="registeractive"
                                    aria-expanded="true">रजिस्टर</a></li>
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
                                               placeholder="अपनी उपयोगकर्ता आईडी दर्ज करें">
                                    </div>
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                       <div
                                               class="pwdsprite"></div>
                                    </span>
                                        <input type="password" required=""
                                               name="password" class="form-control blur"
                                               placeholder="अपना पासवर्ड डालें">
                                    </div>
                                    <button type="submit" class="btn btn-default
                                    btn-gry btn-prop">साइन इन</button>
                                    <span class="pipe">|</span> <a class="frg-link"
                                                                   href="#" onClick="frg_panel()">पासवर्ड भूल गए</a>
                                </div>
                            </form>
                            <div class="popfi">
                                <div class="signpop"></div>
                                <div class="popleft">
                                    <span>या साइन इन</span>
                                    <ul class="socl">
                                       <!-- <li><a
                                                    href="https://www.franchiseindia.com/auth/facebook">
                                                <img src="{{url('newhomepage/assets/img/facebook-login.svg')}}" class=""/></a>
                                        </li>-->
                                        <li><a
                                                    href="https://www.franchiseindia.com/auth/google"><img src="{{url('newhomepage/assets/img/google.svg')}}" class=""/></a></li>
                                    </ul>
                                </div>
                                <div class="popright">नया उपयोगकर्ता <a href="#"
                                                                  id="loginselect1">यहाँ क्लिक करें</a></div>
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
                                       btn-gry btn-prop"> आज एक व्यवसाय शुरू करें<br/><span>(निवेशक पंजीकरण) </span> </a>
                                        </div>
                                        <br>
                                        <div><a
                                                    href="https://www.franchiseindia.com/franchisor/registration/step/1"
                                                    class="btn btn-large btn-default
                                       btn-gry btn-prop">चैनल पार्टनर नियुक्त करें <br/><span> (फ्रैंचाइज़ी पंजीकरण) </span></a>
                                        </div>
                                        <br>
                                        <div><a target="_blank"
                                                href="https://www.franchiseindia.com/property-loan"
                                                class="btn btn- large
                                       btn-default btn-gry btn-prop">संपत्ति के खिलाफ ऋण </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="popfi regspace">
                                <div class="signpop"></div>
                                पंजीकृत उपयोगकर्ता <a href="#"
                                                   id="registerselect1">यहां लॉगिन करें</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="footer-ttl">मुझे पंजीकरण क्यों करना चाहिए?</div>
                <div class="footer-desc">
                    <p> 10000+ से अधिक तक पहुँचने के लिए मताधिकार व्यापार
                        अवसर।
                    </p>
                    <p> प्राप्त करने के लिए बढ़ते व्यावसायिक समुदाय के साथ नेटवर्क
                        विशेषज्ञ हस्तक्षेप आपको विकसित करने के लिए सीखने देने के लिए
                        & फ़्रेंचाइज़िंग के साथ अपने व्यवसाय का विस्तार करें।
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login/ Registration Model End-->

<div class="wrapper">
    <!-- Sidebar  -->
@include('layout.hindinewhomepage.sidemenu')
<!-- Sidebar End -->
@notmobile
<!-- Page Content  -->
    <div id="content">
    @include('layout.hindinewhomepage.header')
    <!-- HERO SECTION STARTS -->
    @include('layout.hindinewhomepage.herosection')
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
                                                        आज एक व्यवसाय शुरू करें  <span class="smallimp">(निवेशक पंजीकरण)</span>
                                                        <i class="fas fa-chevron-right float-right
                                                icon-bar-main-fihl" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                <div class="business-a">
                                                    <a href="{{url('franchisor/registration/step/1')}}">
                                                        चैनल पार्टनर नियुक्त करें <span class="smallimp">(फ्रैंचाइज़ी
                                             पंजीकरण)</span>
                                                        <i class="fas fa-chevron-right float-right
                                                icon-bar-main-fihl" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-30">
                                                <h4> मुझे पंजीकरण क्यों करना चाहिए ?</h4>
                                                10000+ से अधिक फ्रैंचाइज़ी व्यापार करने के लिए पहुँच प्राप्त करने के लिए
                                                अवसर।<br><br>
                                                बढ़ते व्यापार समुदाय के साथ नेटवर्क प्राप्त करने के लिए
                                                विशेषज्ञ
                                                हस्तक्षेप
                                                आपको बढ़ने के लिए सीखने के लिए &
                                                फ़्रेंचाइज़िंग के साथ अपने व्यवसाय का विस्तार करें।
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-ask-experts">
                                            <h4>हमारे विशेषज्ञों से पूछें</h4>
                                            <form id="homepage" name="homepage" method="post">
                                                <div class="raido-main-section">
                                                    <ul class="radio-main">
                                                        <li>
                                                            <div class="radio">
                                                                <label><input type="radio" name="optionsRadios" id="optionsRadios3" checked value="franchisor"> मेरा ब्रांड का विस्तार करें </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="radio">
                                                                <label><input type="radio" name="optionsRadios" id="optionsRadios1"  value="investor"> एक फ्रेंचाइजी खरीदें</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="input-group mb-15">
                                             <span class="input-group-addon">
                                                <div class="icon-section-main"><img src="{{url('newhomepage/assets/img/email.png')}}" alt="email-icon">
                                                </div>
                                             </span>
                                                    <input type="email" class="form-control blur" required="" name="emailfreeadvice" id="emailfreeadvice" class="form-control" placeholder="ईमेल दर्ज करें">
                                                </div>
                                                <div class="input-group mb-15">
                                             <span class="input-group-addon">
                                                <div class="icon-section-main"><img src="{{url('newhomepage/assets/img/phone.png')}}" alt="phone-icon">
                                                </div>
                                             </span>
                                                    <input type="text" class="form-control blur" maxlength="10" name="mobilefreeadvice" id="mobilefreeadvice" placeholder="मोबाइल नंबर दर्ज करें" required="">
                                                </div>
                                                <div id="askMsg" style="display:none;">
                                                    <div class="green">
                                                        {{ (Request::segment(1) == 'hi') ? 'नि: शुल्क सलाह के लिए जानकारी जमा करने के लिए धन्यवाद!' : 'Thank You for Submitting information for Free Advice!' }}
                                                    </div>
                                                </div>
                                                <button type="button" class="btn
                                             btn-main" id="btnhome">प्रस्तुत</button>
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
                                <h2>कोविड सबूत व्यवसाय के अवसर</h2>
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
                                            <a href="{{ $brandUrl }}" target="_blank"><img src="{{ $logoDetail['brand_img'] }}" alt="Top Business Opportunities"></a>
                                        </div>
                                    </div>
                                    <div class="card-body-section">
                                        <p>
                                            {{$logoDetail['brand_category']}}
                                        </p>
                                        <h2><a href="{{ $brandUrl }}" target="_blank">{{$logoDetail['brand_heading']}} </a></h2>
                                        <div class="d-flex">
                                            <div class="card-info">
                                                निवेश सीमा
                                            </div>
                                            <div class="card-info-amt">
                                                ₹{{$logoDetail['investment_range_new']}}
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="card-info">
                                                क्षेत्र की आवश्यकता है
                                            </div>
                                            <div class="card-info-amt">
                                                {{$logoDetail['area_required']}}
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="card-info">
                                                फ्रेंचाइज आउटलेट्स
                                            </div>
                                            <div class="card-info-amt">
                                                {{$logoDetail['franchise_outlets']}}
                                            </div>
                                        </div>
                                        <div class="link-section">
                                            <a href="{{ $brandUrl }}" target="_blank">अधिक जानिए</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- COVID PROOF BUSINESS OPPORTUNITIES ENDS -->
            <!-- Upcoming Events starts -->
            <section class="bg-sectionwize upcomingevents section-30" id="upcomingevents">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="modified-col col-md-12">
                            <div class="section-ptb">
                                <h2>आने वाले कार्यक्रम</h2>
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
                                        29TH OCTOBER 2020 VIRTUAL CONFERENCE | 05:30 PM
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
                                            <img src="https://www.franchiseindia.com/images/events/westfs.png" class="img-fluid" alt="Franchise Show West">
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body-section">
                                    <h2>Franchise Show - West Region</h2>
                                    <p>
                                        01ST NOVEMBER 2020 | 10:00 AM VIRTUAL
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
                                            <img src="https://www.franchiseindia.com/images/events/southfs.png" class="img-fluid" alt="Franchise Show South">
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
            <!-- Best Franchise Opportunity starts -->
            <section class="bg-sectionwize best-franchise-opportunity section-30"
                     id="best-franchise-opportunity">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="modified-col col-md-12">
                            <div class="section-ptb">
                                <h2>सर्वश्रेष्ठ फ्रेंचाइजी अवसर</h2>
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
                            @if($loop->index < 4)
                                <div class="modified-col col-xs-6 col-sm-6 col-md-3 col-lg-3
                           col-xl-3">
                                    <div class="overlay-card"></div>
                                    <div class="card card-m card-p-10">
                                        <div class="brand-image-section">
                                            <div class="brand-main-section">
                                                <a href="{{ $brandUrl }}" target="_blank"><img src="{{$logoDetail['brand_img'] }}" alt="Top Business Opportunities"></a>
                                            </div>
                                        </div>
                                        <div class="card-body-section">
                                            <p>
                                                {{$logoDetail['brand_category']}}
                                            </p>
                                            <h2><a href="{{ $brandUrl }}" target="_blank">{{$logoDetail['brand_heading']}} </a></h2>
                                            <div class="d-flex">
                                                <div class="card-info">
                                                    निवेश सीमा
                                                </div>
                                                <div class="card-info-amt">
                                                    ₹{{$logoDetail['investment_range_new']}}
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="card-info">
                                                    क्षेत्र की आवश्यकता है
                                                </div>
                                                <div class="card-info-amt">
                                                    {{$logoDetail['area_required']}}
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="card-info">
                                                    फ्रेंचाइज आउटलेट्स
                                                </div>
                                                <div class="card-info-amt">
                                                    {{$logoDetail['franchise_outlets']}}
                                                </div>
                                            </div>
                                            <div class="link-section">
                                                <a href="{{ $brandUrl }}" target="_blank">अधिक जानिए</a>
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
            <!-- Top International Opportunities starts -->
            <section class="bg-sectionwize top-international-opportunities
         section-30" id="top-international-opportunities">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="modified-col col-md-12">
                            <div class="section-ptb">
                                <h2>शीर्ष अंतर्राष्ट्रीय अवसर</h2>
                            </div>
                        </div>
                    </div>
                    @foreach($TopInternationalOpportunities as $top)
                        <div class="row justify-content-center">
                            <div class="modified-col col-xs-6 col-sm-6 col-md-3 col-lg-3
                  col-xl-3">
                                <div class="overlay-card"></div>
                                <div class="card card-m card-p-10" style="background-color:
                                {{$top['bgcolor']}}4f;">
                                    <div class="brand-image-section">
                                        <div class="brand-main-section">
                                            <a href="{{$top['url']}}"> <img src="{{$top['image']}}" class="" alt="{{$top['title']}}"></a>
                                        </div>
                                    </div>
                                    <div class="card-body-section">
                                        <p>
                                            {{$top['category']}}
                                        </p>
                                        <h2><a href="{{$top['url']}}">{{$top['title']}}</a></h2>
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
                                 margin-top: 11px;">अधिक जानिए</div>
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
                                <h2>शीर्ष फ्रेंचाइजी के अवसर </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        @foreach ($brands->where('brand_section', 4)->where('page_type', $pageType)->take(24)->shuffle() as $logoDetail)
                            @php
                                $brandUrl = Config('constants.MainDomain').$logoDetail['brand_link'];
                                if(isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans))
                                $brandUrl = Config('constants.MainDomain').'/hi'.$logoDetail['brand_link'];
                            @endphp
                            <div class="modified-col col-xs-6 col-sm-6 col-md-3 col-lg-3
                           col-xl-3">
                                <div class="overlay-card"></div>
                                <div class="card card-m card-p-10">
                                    <div class="brand-md-image-section">
                                        <div class="brand-main-section">
                                            <img src="{{$logoDetail['brand_img']}}" alt="{{$logoDetail['brand_alt']}}" class="img-b
                                       img-border">
                                        </div>
                                    </div>
                                    <div class="card-body-section">
                                        <p>
                                            {{$logoDetail['brand_category']}}
                                        </p>
                                        <h2>{{$logoDetail['brand_heading']}} </h2>
                                        <div class="d-flex">
                                            <div class="card-info">
                                                निवेश सीमा
                                            </div>
                                            <div class="card-info-amt">
                                                ₹{{$logoDetail['investment_range_new']}}
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="card-info">
                                                क्षेत्र की आवश्यकता है
                                            </div>
                                            <div class="card-info-amt">
                                                {{$logoDetail['area_required']}}
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="card-info">
                                                फ्रेंचाइज आउटलेट्स
                                            </div>
                                            <div class="card-info-amt">
                                                {{$logoDetail['franchise_outlets']}}
                                            </div>
                                        </div>
                                        <div class="link-section">
                                            <a href="{{ $brandUrl }}" target="_blank">अधिक जानिए</a>
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
                                <h2>फीचर्ड फ्रेंचाइजी कंपनियां </h2>
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
                                            <a href="{{$brandUrl}}"><img src="{{$logoDetail['brand_img']}}" alt="Featured Franchise Companies" class="img-b
                                       img-border" ></a>
                                        </div>
                                    </div>
                                    <div class="card-body-section">
                                        <p>
                                            निवेश सीमा
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
            <section class="franchise-news section-30"
                     id="franchise-news">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 col-lg-6">
                            <div class="news-section-main-insight">
                                <div class="section-ptb">
                                    <h2>
                                        फ्रेंचाइजी इनसाइट्स
                                    </h2>
                                    <div class="view-all-main-section">
                                        <a href="{{url('content')}}">सभी देखें</a>
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
                                        $kickerUrl         = '/gallery/'.str_slug($article['kicker']).'/'.$article['kicker_id'];
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
                                        <div class="modified-col col-xs-6
                                          col-sm-6 col-md-6 col-xl-6 col-lg-6">
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
                                                    <p>{{mb_strimwidth($articless[0]['content'], 0, 171, "...")}}</p>
                                                    <div class="news-konwmore">
                                                        <a href="{{$articless[0]['url']}}">
                                                            अधिक जानिए
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
                                                                <br>लेख संपादक</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modified-col col-xs-6
                                          col-sm-6 col-md-6 col-xl-6 col-lg-6">
                                            <div class="small-newsx-post">
                                                <ul class="small-newsx-post-main">
                                                    @for($i=1; $i<5;$i++)
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
                                                                                अधिक जानिए
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
                                        समाचार
                                    </h2>
                                    <div class="view-all-main-section">
                                        <a href="https://news.franchiseindia.com/">सभी देखें</a>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="row">
                                        <div class="modified-col col-xs-6
                                                    col-sm-6 col-md-6 col-xl-6 col-lg-6">
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
                                                    <p>{{$news[0]['content']}}</p>
                                                    <div class="news-konwmore">
                                                        <a href="{{$news[0]['url']}}">
                                                            अधिक जानिए
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
                                                            <a href="{{$news[0]['url']}}">-{{$news[0]['auther']}}<br>समाचार</a>
                                                            संपादक
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modified-col col-xs-6
                                                    col-sm-6 col-md-6 col-xl-6 col-lg-6">
                                            <div class="small-newsx-post">
                                                <ul class="small-newsx-post-main">
                                                    @for($i = 1; $i< 5; $i++)
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
                                                                                अधिक जानिए
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
                    <div class="row justify-content-center">
                        <div class="modified-col col-md-8">
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
                                                    <img src="{{url('newhomepahe/assets/img/close-quotes.svg')}}" alt="quotes-close">
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
                        <div class="modified-col col-md-4">
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
                            <p>उद्योग से नवीनतम अपडेट प्राप्त करने के लिए आपका ईमेल पता</p>
                            <h2>न्यूज़लेटर साइन अप</h2>
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
                                                    id="button-addon2">साइन अप</button></li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <div class="modified-col col-md-6 text-right
                                     socail-newsletter-section">
                            <p>देखते रहिए और अपडेट रहिए</p>
                            <h2>फ्रेंचाइजी भारत का पालन करें</h2>
                            <div class="main-newsletter">
                                <form action="">
                                    <ul class="newsletter-social">
                                        <li><a
                                                    href="https://www.facebook.com/FranchiseIndiaMedia"
                                                    target="_blank"><img src="{{url('newhomepage/assets/img/fb-icon.svg')}}"
                                                                         alt="facebook"></a></li>
                                        <li><a href="https://www.instagram.com/franchiseindia_/"
                                               target="_blank"><img
                                                        src="{{url('newhomepage/assets/img/instagram-icon.svg')}}" alt="Instagram"></a></li>
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
                            <p class="section-th">फ्रैंचाइज़ इंडिया के बारे में</p>
                            <div class="about-text-section">
                                Franchiseindia.com दुनिया की # 1 फ्रेंचाइजी वेबसाइट और एक उद्यमी की दैनिक खुराक है। फ्रैंचाइज़ इंडिया होल्डिंग्स लिमिटेड - एशिया की सबसे बड़ी एकीकृत फ़्रैंचाइज़ समाधान कंपनी के तत्वावधान में, वेबसाइट उद्यमियों को फ्रैंचाइज़िंग, मताधिकार के अवसरों, व्यवसाय के अवसरों, भागीदारी, डीलरों, विनिर्माण, वितरण, खुदरा और बहुत कुछ के पहलुओं पर हर मिनट का विवरण प्रदान करती है। फ्रेंचाइज़िंग में दुनिया के नेता होने के नाते, निवेशक और फ्रेंचाइज़र हमेशा समृद्ध, सक्षम और लाखों फलदायी लीड्स और बिक्री के लिए Franchiseindia.com पर भरोसा कर सकते हैं। वेबसाइट फ्रेंचाइज़र, स्टार्ट-अप्स, फ्रेंचाइजी, डीलर्स, डिस्ट्रीब्यूटर्स, रिटेलर्स और फ्रैंचाइज़ी संभावना चाहने वालों का पसंदीदा गंतव्य है। <br/> <br/>

                                Franchiseindia.com के पास प्रीमियम, घरेलू और अंतर्राष्ट्रीय डोमेन में अद्वितीय व्यावसायिक अवसर हैं। अवसरों की तलाश करने वाले हमारे पाठकों के लिए, हमने उद्योग लेखों और कहानियों के लिए व्हाट्स न्यू जैसे विभिन्न वर्गों को अलग कर दिया है, कंपनी / पीपल प्रोफ़ाइल के लिए साक्षात्कार अनुभाग और दुनिया भर में फ्रेंचाइज़िंग में जो हो रहा है उसकी दैनिक खुराक प्रदान करता है।  <br/>

                                हमारे निवेशकों और अवसर चाहने वालों को साप्ताहिक Franchiseindia.com न्यूज़लेटर में छपने का मौका भी मिलता है जो हजारों ब्रांडों और निवेशकों के इनबॉक्स में सीधे जाता है। Franchiseindia.com ट्विटर, फेसबुक, लिंक्ड, और बहुत कुछ जैसे सोशल नेटवर्क वेबसाइटों पर सीधे ब्रांड को बढ़ावा देने का एक मौका प्रदान करता है। <br/> 
								यहां आपका ब्रांड  क्यों होना चाहिए
                                    <b><a href="www.franchiseindia.com">franchiseindia.com</a>
                                </b>
                                <br/> <br/>

                                इसके अलावा, व्यापार और फ्रैंचाइज़ी के अवसरों की प्रचुरता के साथ, फ्रैंचाइज़ींडिया.कॉम के पास फ्रैंचाइज़ी उद्योग में भारत के सबसे बड़े फ्रैंचाइज़ी शो, एफआरओ (नेशनल फ्रेंचाइजी रिटेल और एसएमई शो), बीओएस (बिजनेस अपॉर्च्युनिटी शो) जैसे सभी कार्यक्रमों के नियमित अपडेट भी हैं। फ्रैंचाइज़ इंडिया द्वारा फ्रैंचाइज़ी और रिटेल अवार्ड शो।
                                आगंतुक केवल वेबसाइट पर पंजीकरण करके एक नया व्यवसाय शुरू कर सकते हैं और वह भी मुफ़्त में। Franchiseindia.com उपयोगकर्ता हजारों ब्रांडों के माध्यम से ब्राउज़ कर सकते हैं और आदर्श अवसर चुन सकते हैं। <br/> <br/>
                                Franchiseindia.com भी आपको वेबसाइट पर आवक यातायात और आगंतुकों की एक स्थिर धारा के साथ अपडेट करता है। <br/>
                                विज्ञापनदाता बुकस्टोर सेक्शन पर क्लिक करके फ्रेंचाइज़ इंडिया की पुस्तकों और रिपोर्टों का लाभ भी ले सकते हैं। <br/>
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
@endnotmobile
@mobile
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
                        30 दिनों में एक फ्रेंचाइजी शुरू करें
                    </h1>
                    <h2>तो इंतजार क्यों करें, 1000+ व्यापार विकल्प</h2>
                    <a href="{{url('investor/create')}}">
                        <div class="btn-main btn-franchise" data-toggle="modal" data-target="#start-franchise">एक फ्रैंचाइज़ बिजनेस आज शुरू करें
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
                            <h2>कोविड सबूत व्यवसाय के अवसर</h2>
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
                            @endphp
                            <div class="swiper-slide">
                                <div class="swiper-slide-section-main">
                                    <div class="overlay-card"></div>
                                    <div class="card card-m card-p-10">
                                        <div class="brand-img">
                                            <div class="brand-img-section">
                                                <a href="{{ $brandUrl }}">
                                                    <a href="{{ $brandUrl }}"><img src="{{ $logoDetail['brand_img'] }}" alt="Top Business Opportunities"></a>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body-section">
                                            <p>
                                                {{$logoDetail['brand_category']}}
                                            </p>
                                            <h2><a href="{{ $brandUrl }}">{{$logoDetail['brand_heading']}} </a></h2>
                                            <div class="d-flex">
                                                <div class="card-info">
                                                    निवेश सीमा
                                                </div>
                                                <div class="card-info-amt">
                                                    ₹{{$logoDetail['investment_range_new']}}
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="card-info">
                                                    क्षेत्र की आवश्यकता है
                                                </div>
                                                <div class="card-info-amt">
                                                    {{$logoDetail['area_required']}}
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="card-info">
                                                    फ्रेंचाइज आउटलेट्स
                                                </div>
                                                <div class="card-info-amt">
                                                    {{$logoDetail['franchise_outlets']}}
                                                </div>
                                            </div>
                                            <div class="link-section">
                                                <a href="{{ $brandUrl }}"><div class="">
                                                        अधिक जानिए
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
        <!-- Upcoming Events starts -->
        <section class="upcomingevents section-30" id="upcomingevents">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-ptb">
                            <h2>आने वाले कार्यक्रम</h2>
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
                                            29TH OCTOBER 2020 VIRTUAL CONFERENCE | 05:30 PM
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
                                                <img src="https://www.franchiseindia.com/images/events/southfs.png" class="img-fluid" alt="Franchise Show South">
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
                                                <img src="https://www.franchiseindia.com/images/events/westfs.png" class="img-fluid" alt="Franchise Show West">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body-section">
                                        <h2>Franchise Show - West Region</h2>
                                        <p>
                                            01ST NOVEMBER 2020 | 10:00 AM VIRTUAL
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
                            <h2>सर्वश्रेष्ठ फ्रेंचाइजी अवसर</h2>
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
                            @endphp
                            @if($loop->index < 4)

                                <div class="swiper-slide">
                                    <div class="swiper-slide-franchise-opportunity">
                                        <div class="overlay-card"></div>
                                        <div class="card card-m card-p-10">
                                            <div class="brand-img-dfa">
                                                <div class="brand-img-section">
                                                    <a href="{{ $brandUrl }}">
                                                        <img src="{{$logoDetail['brand_img'] }}" alt="Top Business Opportunities">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body-section">
                                                <p>
                                                    {{$logoDetail['brand_category']}}
                                                </p>
                                                <h2><a href="{{ $brandUrl }}">{{$logoDetail['brand_heading']}}</a></h2>
                                                <div class="d-flex">
                                                    <div class="card-info">
                                                        निवेश सीमा
                                                    </div>
                                                    <div class="card-info-amt">
                                                        ₹{{$logoDetail['investment_range_new']}}
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="card-info">
                                                        क्षेत्र की आवश्यकता है
                                                    </div>
                                                    <div class="card-info-amt">
                                                        {{$logoDetail['area_required']}}
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="card-info">
                                                        फ्रेंचाइज आउटलेट्स
                                                    </div>
                                                    <div class="card-info-amt">
                                                        {{$logoDetail['franchise_outlets']}}
                                                    </div>
                                                </div>
                                                <div class="link-section">
                                                    <a href="{{ $brandUrl }}"><div class="">
                                                            अधिक जानिए
                                                        </div></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endif
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- Best Franchise Opportunity ends -->
        <!-- Top International Opportunities starts -->
        <section class="top-international-opportunities section-30" id="top-international-opportunities">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-ptb">
                            <h2>शीर्ष अंतर्राष्ट्रीय अवसर</h2>
                        </div>
                    </div>
                </div>
                <!-- Swiper -->
                <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
                    <div class="swiper-wrapper" style="transform: translate3d(-2340px, 0px, 0px); transition: all 0ms ease 0s;">
                        <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="3" style="width: 1140px; margin-right: 30px;">
                            <div class="swiper-slide-international-opportunities">
                                <div class="overlay-card"></div>
                                <div class="card card-m card-p-10" style="background-color:
                                green;">
                                    <div class="brand-image-section">
                                        <div class="brand-main-section">
                                            <a href="https://www.franglobal.com/engage-and-grow/"><img src="https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/engage_199x81.png" class="" alt="Remax"></a>
                                        </div>
                                    </div>
                                    <div class="card-body-section">
                                        <p>
                                            Ice Cream Chain
                                        </p>
                                        <h2> Enage &amp; Grow</h2>
                                        <div class="card-info-summry">
                                            Become A Certified Engage &amp; Grow Franchise in your Region &amp; Grow Your Business
                                        </div>

                                        <a href="https://www.franglobal.com/engage-and-grow/">
                                            <div class="link-section-main" style="
                                          color: #0e76bd;
                                          border: 1px solid #0f75bd;
                                          padding: 5px;
                                          border-radius: 4px;
                                          font-weight: 600;
                                          text-align: center;
                                          margin-top: 11px;
                                          ">अधिक जानिए</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="0" style="width: 1140px; margin-right: 30px;">
                            <div class="swiper-slide-international-opportunities">
                                <div class="overlay-card"></div>
                                <div class="card card-m card-p-10" style="background-color:
                                #2cbee614;">
                                    <div class="brand-image-section">
                                        <div class="brand-main-section">
                                            <a href="https://www.franchiseindia.com/brands/REMAX-INDIA.25791"><img src="https://www.franchiseindia.com/images/remax(199x81).gif" class="" alt="Remax"></a>
                                        </div>
                                    </div>
                                    <div class="card-body-section">
                                        <p>
                                            Real Estate Sub
                                        </p>
                                        <h2>REMAX INDIA</h2>
                                        <div class="card-info-summry">
                                            World’s largest network of Real Estate Brokerage
                                        </div>

                                        <a href="https://www.franchiseindia.com/brands/REMAX-INDIA.25791">
                                            <div class="link-section-main" style="    color: #2fc0e4;
                                            border: 1px solid #4ac1e7;
                                            padding: 5px;
                                            border-radius: 4px;
                                            font-weight: 600;
                                            text-align: center;
                                            margin-top: 11px;">अधिक जानिए</div>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="1" style="width: 1140px; margin-right: 30px;">
                            <div class="swiper-slide-international-opportunities">
                                <div class="overlay-card"></div>
                                <div class="card card-m card-p-10" style="
                                background-color: rgb(237 28 36 / 13%);
                                ">
                                    <div class="brand-image-section">
                                        <div class="brand-main-section">
                                            <a href="https://www.franglobal.com/fatburger/"><img src="https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/fatburger_tbo_gold.gif" class="" alt="Remax"></a>
                                        </div>
                                    </div>
                                    <div class="card-body-section">
                                        <p>
                                            Ice Cream Chain
                                        </p>
                                        <h2>Fatburger</h2>
                                        <div class="card-info-summry">
                                            America’s Iconic Burger Chain, Now Franchising in India
                                        </div>

                                        <a href="https://www.franglobal.com/fatburger/">
                                            <div class="link-section-main" style="
                                          color: #e2383f;
                                          border: 1px solid #e2383f;
                                          padding: 5px;
                                          border-radius: 4px;
                                          font-weight: 600;
                                          text-align: center;
                                          margin-top: 11px;
                                          ">अधिक जानिए</div>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev" data-swiper-slide-index="0" style="width: 1140px; margin-right: 30px;">
                            <div class="swiper-slide-international-opportunities">
                                <div class="overlay-card"></div>
                                <div class="card card-m card-p-10" style="background-color:
                                #2cbee614;">
                                    <div class="brand-image-section">
                                        <div class="brand-main-section">
                                            <a href="https://www.franchiseindia.com/brands/REMAX-INDIA.25791"><img src="https://www.franchiseindia.com/images/remax(199x81).gif" class="" alt="Remax"></a>
                                        </div>
                                    </div>
                                    <div class="card-body-section">
                                        <p>
                                            Real Estate Sub
                                        </p>
                                        <h2>REMAX INDIA</h2>
                                        <div class="card-info-summry">
                                            World’s largest network of Real Estate Brokerage
                                        </div>

                                        <a href="https://www.franchiseindia.com/brands/REMAX-INDIA.25791">
                                            <div class="link-section-main" style="    color: #2fc0e4;
                                            border: 1px solid #4ac1e7;
                                            padding: 5px;
                                            border-radius: 4px;
                                            font-weight: 600;
                                            text-align: center;
                                            margin-top: 11px;">अधिक जानिए</div>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span></div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
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
                            <h2>शीर्ष फ्रेंचाइजी के अवसर </h2>
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
                            @endphp
                            <div class="swiper-slide">
                                <div class="swiper-slide-top-franchise-opportunities">
                                    <div class="overlay-card"></div>
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
                                                {{$logoDetail['brand_category']}}
                                            </p>
                                            <h2>{{$logoDetail['brand_heading']}}</h2>
                                            <div class="d-flex">
                                                <div class="card-info">
                                                    निवेश सीमा
                                                </div>
                                                <div class="card-info-amt">
                                                    ₹{{$logoDetail['investment_range_new']}}
                                                </div>
                                            </div>
                                            <div class="link-section">
                                                <a href="{{ $brandUrl }}" class="know-more">अधिक जानिए</a>
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
                            <h2>फीचर्ड फ्रेंचाइजी कंपनियां </h2>
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
                                <div class="swiper-slide-top-franchise-opportunities">
                                    <div class="overlay-card"></div>
                                    <div class="card-fihl card-m card-p-10">
                                        <div class="brand-img-fcc">
                                            <div class="brand-img-section">
                                                <a href="{{$brandUrl}}"><img src="{{$logoDetail['brand_img']}}" alt="Featured Franchise Companies" ></a>
                                            </div>
                                        </div>
                                        <div class="card-body-section">
                                            <p>
                                                निवेश सीमा
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
                                    फ्रेंचाइजी इनसाइट्स
                                </h2>
                                <div class="view-all-main-section">
                                    <a href="{{url('content')}}">सभी देखें</a>
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
                                    $kickerUrl         = '/gallery/'.str_slug($article['kicker']).'/'.$article['kicker_id'];
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
                                                <p>{{mb_strimwidth($articless[0]['content'], 0, 221, "...")}}</p>
                                                <div class="news-konwmore">
                                                    <a href="{{$articless[0]['url']}}">
                                                        अधिक जानिए
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
                                                            <br>लेख संपादक</a>
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
                                                                            अधिक जानिए
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
                                    समाचार
                                </h2>
                                <div class="view-all-main-section">
                                    <a href="https://news.franchiseindia.com/">सभी देखें</a>
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
                                                <p>{{$news[0]['content']}}</p>
                                                <div class="news-konwmore">
                                                    <a href="{{$news[0]['url']}}">
                                                        अधिक जानिए
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
                                                        <a href="#">-{{$news[0]['auther']}}<br>समाचार</a>
                                                        संपादक
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
                                                                            अधिक जानिए
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
                                            <img src="{{url('newhomepage/assets/img/open-qoutes.svg')}}" alt="quotes-open" />
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
                        <p>उद्योग से नवीनतम अपडेट प्राप्त करने के लिए अपना ईमेल पता साझा करें</p>
                        <h2>न्यूज़लेटर साइन अप</h2>
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
                                                id="button-addon2">साइन अप</button></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 text-center socail-newsletter-section">
                        <p>देखते रहिए और अपडेट रहिए</p>
                        <h2>फ्रेंचाइजी भारत का पालन करें</h2>
                        <div class="main-newsletter">
                            <form action="">
                                <ul class="newsletter-social">
                                    <li><a
                                                href="https://www.facebook.com/FranchiseIndiaMedia"
                                                target="_blank"><img src="{{url('newhomepage/assets/img/fb-icon.svg')}}"
                                                                     alt="Facebook"></a></li>
                                    <li><a href="https://www.instagram.com/franchiseindia_/"
                                           target="_blank"><img
                                                    src="{{url('newhomepage/assets/img/instagram-icon.svg')}}" alt="Instagram"></a></li>
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
                        <p class="section-th">फ्रैंचाइज़ इंडिया के बारे में</p>
                        <div class="about-text-section">
                            Franchiseindia.com दुनिया की # 1 फ्रेंचाइजी वेबसाइट और एक उद्यमी की दैनिक खुराक है। फ्रैंचाइज़ इंडिया होल्डिंग्स लिमिटेड - एशिया की सबसे बड़ी एकीकृत फ़्रैंचाइज़ समाधान कंपनी के तत्वावधान में, वेबसाइट उद्यमियों को फ्रैंचाइज़िंग, मताधिकार के अवसरों, व्यवसाय के अवसरों, भागीदारी, डीलरों, विनिर्माण, वितरण, खुदरा और बहुत कुछ के पहलुओं पर हर मिनट का विवरण प्रदान करती है। फ्रेंचाइज़िंग में दुनिया के नेता होने के नाते, निवेशक और फ्रेंचाइज़र हमेशा समृद्ध, सक्षम और लाखों फलदायी लीड्स और बिक्री के लिए Franchiseindia.com पर भरोसा कर सकते हैं। वेबसाइट फ्रेंचाइज़र, स्टार्ट-अप्स, फ्रेंचाइजी, डीलर्स, डिस्ट्रीब्यूटर्स, रिटेलर्स और फ्रैंचाइज़ी संभावना चाहने वालों का पसंदीदा गंतव्य है। <br/> <br/>

                            Franchiseindia.com के पास प्रीमियम, घरेलू और अंतर्राष्ट्रीय डोमेन में अद्वितीय व्यावसायिक अवसर हैं। अवसरों की तलाश करने वाले हमारे पाठकों के लिए, हमने उद्योग लेखों और कहानियों के लिए व्हाट्स न्यू जैसे विभिन्न वर्गों को अलग कर दिया है, कंपनी / पीपल प्रोफ़ाइल के लिए साक्षात्कार अनुभाग और दुनिया भर में फ्रेंचाइज़िंग में जो हो रहा है उसकी दैनिक खुराक प्रदान करता है। <br/>

                            हमारे निवेशकों और अवसर चाहने वालों को साप्ताहिक Franchiseindia.com न्यूज़लेटर में छपने का मौका भी मिलता है जो हजारों ब्रांडों और निवेशकों के इनबॉक्स में सीधे जाता है। Franchiseindia.com ट्विटर, फेसबुक, लिंक्ड, और बहुत कुछ जैसे सोशल नेटवर्क वेबसाइटों पर सीधे ब्रांड को बढ़ावा देने का एक मौका प्रदान करता है। <br/>

                            यहां आपका ब्रांड  क्यों होना चाहिए
                                <b><a href="https://www.franchiseindia.com"> Franchiseindia.com </a></b>
                            <br/> <br/>

                            इसके अलावा, व्यापार और फ्रैंचाइज़ी के अवसरों की प्रचुरता के साथ, फ्रैंचाइज़ींडिया.कॉम के पास फ्रैंचाइज़ी उद्योग में भारत के सबसे बड़े फ्रैंचाइज़ी शो, एफआरओ (नेशनल फ्रेंचाइजी रिटेल और एसएमई शो), बीओएस (बिजनेस अपॉर्च्युनिटी शो) जैसे सभी कार्यक्रमों के नियमित अपडेट भी हैं। फ्रैंचाइज़ इंडिया द्वारा फ्रैंचाइज़ी और रिटेल अवार्ड शो।
                            आगंतुक वेबसाइट पर पंजीकरण करके एक नया व्यवसाय शुरू कर सकते हैं और वह भी मुफ्त में। Franchiseindia.com उपयोगकर्ता हजारों ब्रांडों के माध्यम से ब्राउज़ कर सकते हैं और आदर्श अवसर चुन सकते हैं। <br/> <br/>
                            Franchiseindia.com भी आपको वेबसाइट पर आवक यातायात और आगंतुकों की एक स्थिर धारा के साथ अपडेट करता है। <br/>
                            विज्ञापनदाता बुकस्टोर सेक्शन पर क्लिक करके फ्रेंचाइज़ इंडिया की पुस्तकों और रिपोर्टों का लाभ भी ले सकते हैं। <br/>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about us ends -->
        @include('layout.hindinewhomepage.footersection')

    </main>
    @include('layout.hindinewhomepage.footer')
</div>
@endmobile
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
@notmobile
<script src="{{url('newhomepage/assets/js/app.js')}}"></script>
@endnotmobile
@tablet
<script src="{{url('newhomepage/assets/js/app.mobile.js')}}"></script>
@endtablet
@mobile
<script src="{{url('newhomepage/assets/js/app.mobile.js')}}"></script>
@endmobile
<script type="text/javascript" src="{{url('awesomplete/awesomplete.js') }}"></script>
<script>
    $('#exampleFormControlSelect1').change(function() {
        // set the window's location property to the value of the option the user has selected
        window.location = $(this).val();
    });
</script>
<script>
    $(document).ready(function(){
        $("#btnhome").click(function(){
            var type=$("input[name='optionsRadios']:checked").val();var name='abc';var email=document.getElementById('emailfreeadvice').value;var mobile=document.getElementById('mobilefreeadvice').value;var details='test';var pincode='000000';var is_newsletter=1;$.ajax({type:'post',url:'/freeadvice',data:{optionsRadios:type,name:name,pincode:pincode,email:email,mobile:mobile,details:details,is_newsletter:is_newsletter},success:function(data){alert(data);window.location="/thanks-advice-form";}})
        });
    });
</script>
<script>
    function frg_panel() {
        $("#lg-pnl").hide(), $("#frg-pnl").show()
    }

    function lg_panel() {
        $("#lg-pnl").show(), $("#loginactive").click(), $("#frg-pnl").hide()
    }
</script>
<script>
    $('#registerselect').click(function(){
        $('#registeractive').click();
    });
    $('#loginselect').click(function(){
        $('#loginactive').click();
    });
    $('#mobilereg').click(function(){
        $('#registeractive').click();
    });

    $('#registerselect1').click(function() {
        $('#login').addClass( "active" );
        $('#register').removeClass( "active" );
        $('#loginactiveopen').addClass( "active" );
        $('#registeractiveopen').removeClass( "active" );
    });

    $('#loginselect1').click(function() {
        $('#login').removeClass( "active" );
        $('#register').addClass( "active" );
        $('#loginactiveopen').removeClass( "active" );
        $('#registeractiveopen').addClass( "active" );
    });
</script>

<script>
    //Awesomplete
    const input = document.getElementById('dealer-bar-search');

    // Init awesomplete
    const awesomplete = new Awesomplete(input);
    const navBarSearch = $("#dealer-bar-search");
    //navBarSearch.keypress(function () {
    navBarSearch.on('keypress keyup keypress blur change', function () {
        var search_keyword = $(this).val();
        // Check if atleast 2 chars are typed
        if(search_keyword.length >= 2){
            $.ajax({
                url: '/dealers-search/' + search_keyword,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    prepareList(JSON.parse(JSON.stringify(response)));

                },
                error: function (err) {
                    console.log(err);

                }
            });
        }
    });
    function prepareList(list) {
        var c_list = [];

        list.forEach(item => {
            c_list.push(item.name);
    });

        // Assigned the c_list to the list property of Awesomplete instance
        awesomplete.list = c_list;
    }

    navBarSearch.on('awesomplete-selectcomplete',function(){
        if($("#dealer-bar-search").val() != "") {
            var value = $("#dealer-bar-search").val();
            var items = value.split(' - <strong> in');
            if(items.length > 1)
                value = items[0];
            window.location.href = '/dealers-india/search/'+value;
        }
    });

    $("#textcompany").on('click', function(){
        if($("#dealer-bar-search").val() != "") {
            var value = $("#dealer-bar-search").val();
            var items = value.split(' - <strong> in');
            if(items.length > 1)
                value = items[0];
            window.location.href = '/dealers-india/search/'+value;
        }
    });
</script>
<!-- Cookies -->
<script>
    function setCookie() {
        document.cookie = "accept_cookie=ok";
        $('#cookie').hide();
    }
    function getCookie(){
        return checkCookie('accept_cookie');
    }

    function checkCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

</script>
<script>
    // A $( document ).ready() block.
    $( document ).ready(function() {
        var cookie = getCookie();
        if(cookie == 'ok'){
            $('#cookie').hide();
        } else{
            $('#cookie').show();
        }
    });
</script>
@if( !(!empty(request()->segment(2)) && request()->segment(1) == "brands" && isset(explode('.', request()->segment(2))[1]) && in_array(explode('.', request()->segment(2))[1], Config('constants.popupBrands')) ))

    @notmobile
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
                    @include('includes.banners.popupmag')
                @endif
            @else
                @include('includes.banners.popupmag')
            @endif
        @elseif(in_array($query, $southCodes))
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 0)
                    @include('includes.banners.popupmag')
                @endif
            @else
                @include('includes.banners.popupmag')
            @endif
        @elseif(in_array($query, $westCodes))
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 0)
                    @include('includes.banners.popupmag')
                @endif
            @else
                @include('includes.banners.popupmag')
            @endif
        @elseif(in_array($query, $eastCodes))
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 0)
                    @include('includes.banners.popupmag')
                @endif
            @else
                @include('includes.banners.popupmag')
            @endif
        @else
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 0)
                    @include('includes.banners.popupmag')
                @endif
            @else
                @include('includes.banners.popupmag')
            @endif
        @endif
    @endif
    <!-- popupmag Start of franchiseindia Zendesk Widget script  popupmag -->
    @endnotmobile

@endif
<script>
    function submitCategory() {
        var subSubCat = $('#getSubCatCategoryDataHeader').val();
        var subCat = $('#getSubCategoryDataHeader').val();
        var mainCat = $('#getMainCategoryDataHeader').val();
        var url = '/business-opportunities/';
        if(subSubCat){
            url = url+$('option:selected', $('#getSubCatCategoryDataHeader')).attr('slug')+'.ssc'+subSubCat+"?catTab=1";
        }else if(subCat){
            url = url+$('option:selected', $('#getSubCategoryDataHeader')).attr('slug')+'.sc'+subCat+"?catTab=1";
        }else if(mainCat  && typeof $('option:selected', $('#getMainCategoryDataHeader')).attr('slug') !== "undefined"){
            url = url+$('option:selected', $('#getMainCategoryDataHeader')).attr('slug')+'.m'+mainCat+"?catTab=1";
        }else{
            url  =  url+'all/all';
        }
//        window.location = url;
        window.open(url, '_blank');
        return false;
    }

    function submitLocation() {
        var mainCat  = $('#getMainCategoryDataHeaderLoc').val();
        var headerCity = $('#headercity').val();
        var stateHeader = $('#stateHeader').val();
        var mainCatText = $('option:selected', $('#getMainCategoryDataHeaderLoc')).attr('slug');
        var headerCityText = $('option:selected', $('#headercity')).attr('slug');
        var stateHeaderText = $('option:selected', $('#stateHeader')).attr('slug');
        var url = '/business-opportunities/';
        if(mainCat !='' && stateHeader!='' && headerCity!=''){
            url =  url+mainCatText+"-in-"+stateHeaderText+"/mc-"+mainCat+"/loc-" +stateHeader+"/ct-" +headerCityText;
        }else if(mainCat !='' && stateHeader!=''){
            url =  url+mainCatText+"-in-"+stateHeaderText+"/mc-"+mainCat+"/loc-" +stateHeader;
        }else if(stateHeader !='' && headerCity!=''){
            url =  url+"business-in-"+stateHeaderText+"/loc-"+stateHeader+"/ct-" +headerCityText;
        }else if(stateHeader !=''){
            url =  url+stateHeaderText+".LOC"+stateHeader;
        }else {
            //alert(url);
            url  =  url+'all/all';
            window.open(url, '_blank');
        }
//        window.location = url + "?locTab=1";r
        window.open(url + "?locTab=1", '_blank');
        return false;
    }

    function submitInvestment() {
        var mainCat  = $('#getMainCategoryDataHeaderInv').val();
        var minAmount = $('#minAmount').val();
        var maxAmount = $('#maxAmount').val();
        var mainCatText = $('option:selected', $('#getMainCategoryDataHeaderInv')).attr('slug');
        var minAmountText = $('option:selected', $('#minAmount')).attr('slug');
        var maxAmountText = $('option:selected', $('#maxAmount')).attr('slug');
        var url = '/business-opportunities/';
        if(mainCat !='' && minAmount!='' && maxAmount!=''){
            url =  url+mainCatText+"-in-india/mc-"+mainCat+"/range-" +minAmountText+"-" +maxAmountText;
        }else if(mainCat !='' && minAmount!=''){
            url =  url+mainCatText+"-in-india/mc-"+mainCat+"/range-" +minAmountText;
        }else if(minAmount!='' && maxAmount!=''){
            url =  url+"business/range-" +minAmountText+"-" +maxAmountText;
        } else{
            window.open(url + "all/all?invTab=1", '_blank');
        }
//        window.location = url + "?invTab=1";
        window.open(url + "?invTab=1", '_blank');
        return false;
    }

</script>

<script>
    function submitCategory1() {
        var subSubCat = $('#getSubCatCategoryDataHeader1').val();
        var subCat = $('#getSubCategoryDataHeader1').val();
        var mainCat = $('#getMainCategoryDataHeader1').val();
        var url = '/business-opportunities/';

        if(subSubCat){
            url = url+$('option:selected', $('#getSubCatCategoryDataHeader1')).attr('slug')+'.ssc'+subSubCat+"?catTab=1";
        }else if(subCat){
            url = url+$('option:selected', $('#getSubCategoryDataHeader1')).attr('slug')+'.sc'+subCat+"?catTab=1";
        }else if(mainCat  && typeof $('option:selected', $('#getMainCategoryDataHeader1')).attr('slug') !== "undefined"){
            url = url+$('option:selected', $('#getMainCategoryDataHeader1')).attr('slug')+'.m'+mainCat+"?catTab=1";
        }else{
            url  =  url+'all/all';
        }
//        window.location = url;
        window.open(url, '_blank');
        return false;
    }

    function submitLocation1() {
        var mainCat  = $('#getMainCategoryDataHeaderLoc1').val();
        var headerCity = $('#headercity1').val();
        var stateHeader = $('#stateHeader1').val();
        var mainCatText = $('option:selected', $('#getMainCategoryDataHeaderLoc1')).attr('slug');
        var headerCityText = $('option:selected', $('#headercity1')).attr('slug');
        var stateHeaderText = $('option:selected', $('#stateHeader1')).attr('slug');
        var url = '/business-opportunities/';
        if(mainCat !='' && stateHeader!='' && headerCity!=''){
            url =  url+mainCatText+"-in-"+stateHeaderText+"/mc-"+mainCat+"/loc-" +stateHeader+"/ct-" +headerCityText;
        }else if(mainCat !='' && stateHeader!=''){
            url =  url+mainCatText+"-in-"+stateHeaderText+"/mc-"+mainCat+"/loc-" +stateHeader;
        }else if(stateHeader !='' && headerCity!=''){
            url =  url+"business-in-"+stateHeaderText+"/loc-"+stateHeader+"/ct-" +headerCityText;
        }else if(stateHeader !=''){
            url =  url+stateHeaderText+".LOC"+stateHeader;
        }else {
            //alert(url);
            url  =  url+'all/all';
            window.open(url, '_blank');
        }
//        window.location = url + "?locTab=1";r
        window.open(url + "?locTab=1", '_blank');
        return false;
    }

    function submitInvestment1() {
        var mainCat  = $('#getMainCategoryDataHeaderInv1').val();
        var minAmount = $('#minAmount1').val();
        var maxAmount = $('#maxAmount1').val();
        var mainCatText = $('option:selected', $('#getMainCategoryDataHeaderInv1')).attr('slug');
        var minAmountText = $('option:selected', $('#minAmount1')).attr('slug');
        var maxAmountText = $('option:selected', $('#maxAmount1')).attr('slug');
        var url = '/business-opportunities/';
        if(mainCat !='' && minAmount!='' && maxAmount!=''){
            url =  url+mainCatText+"-in-india/mc-"+mainCat+"/range-" +minAmountText+"-" +maxAmountText;
        }else if(mainCat !='' && minAmount!=''){
            url =  url+mainCatText+"-in-india/mc-"+mainCat+"/range-" +minAmountText;
        }else if(minAmount!='' && maxAmount!=''){
            url =  url+"business/range-" +minAmountText+"-" +maxAmountText;
        } else{
            window.open(url + "all/all?invTab=1", '_blank');
        }
//        window.location = url + "?invTab=1";
        window.open(url + "?invTab=1", '_blank');
        return false;
    }

</script>

<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=a76a1630-c68b-4165-b6f1-ef96b178c0c3"></script>
<!-- End of franchiseindia Zendesk Widget script -->

<script>
    (function () {
  const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

  //I'm adding this section so I don't have to keep updating this pen every year :-)
  //remove this if you don't need it
  let today = new Date(),
      dd = String(today.getDate()).padStart(2, "0"),
      mm = String(today.getMonth() + 1).padStart(2, "0"),
      yyyy = today.getFullYear(),
      nextYear = yyyy + 1,
      dayMonth = "08/21/",
      birthday = dayMonth + yyyy;
  
  today = mm + "/" + dd + "/" + yyyy;
  if (today > birthday) {
    birthday = dayMonth + nextYear;
  }
  //end
  
  const countDown = new Date(birthday).getTime(),
      x = setInterval(function() {    

        const now = new Date().getTime(),
              distance = countDown - now;

        document.getElementById("days").innerText = Math.floor(distance / (day)),
          document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
          document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
          document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

        //do something later when date is reached
        if (distance < 0) {
          document.getElementById("headline").innerText = "It's my birthday!";
          document.getElementById("countdown").style.display = "none";
          document.getElementById("content").style.display = "block";
          clearInterval(x);
        }
        //seconds
      }, 0)
  }());
</script>
<script>
$(document).ready(function () {
    $("#myclose").click(function () {
        $(".topmost").hide();
    });
});
</script> 
          <script>
            $( document ).ready(function() {
if($(window).width() >= 767)
{ 

         $(".bgrunn").css('padding-top','169px');
          $("#myclose").click(function () {
         $(".bgrunn").css('padding-top','121px');
    });

       }
       });
</script>  
          <script>
              $( document ).ready(function() {
if($(window).width() <= 767)
{   $(".bgrunn").css('padding-top','26px');
          $("#myclose").click(function () {
         $(".bgrunn").css('padding-top','0px');
    });

       }
        });
</script>  
</body>
</html>