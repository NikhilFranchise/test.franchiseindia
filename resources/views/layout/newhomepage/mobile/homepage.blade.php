<!DOCTYPE html>
<html>
@include('layout.newhomepage.head')

<body>
    @include('layout.newhomepage.mobile.topsearch')
    <!-- Modal -->
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
                            Franchiseindia account and we'll send you a link
                            to reset your password.
                        </div>
                        <div class="frm-pnl">
                            <form class="form-horizontal" method="POST"
                                action="https://www.franchiseindia.com/password/email">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <div class="usersprite"></div>
                                    </span>
                                    <input type="hidden" name="_token"
                                        value="RnGCk3ic8eNkg7IcHOyt0vibE3K7AoKNHs8bpxQC">
                                    <input id="email" type="email"
                                        class="form-control
                                 blur" name="email"
                                        placeholder="Enter Email-Id" value="" required="">
                                </div>
                                <button type="submit"
                                    class="btn btn-default btn-gry
                              btn-prop">Reset
                                    Password</button> <span class="pipe">|</span> <a class="frg-link" href="#"
                                    onclick="lg_panel()">Login</a>
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
                                <form method="post" action="https://www.franchiseindia.com/loginform">
                                    <input type="hidden" name="_token"
                                        value="RnGCk3ic8eNkg7IcHOyt0vibE3K7AoKNHs8bpxQC">
                                    <div class="frm-pnl">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <div class="usersprite"></div>
                                            </span>
                                            <input type="email"
                                                class="form-control
                                       blur"
                                                required="" name="email" placeholder="Enter Your User ID">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <div class="pwdsprite"></div>
                                            </span>
                                            <input type="password" required="" name="password"
                                                class="form-control blur" placeholder="Enter Your Password">
                                        </div>
                                        <button type="submit"
                                            class="btn btn-default
                                    btn-gry btn-prop">SIGN
                                            IN</button>
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
                                            <li><a href="https://www.franchiseindia.com/auth/facebook">
                                                    <img src="{{ url('newhomepage/assets/img/facebook-login.svg') }}"
                                                        class="" /></a>
                                            </li>
                                            <li><a href="https://www.franchiseindia.com/auth/google"><img
                                                        src="{{ url('newhomepage/assets/img/google.svg') }}"
                                                        class="" /></a></li>
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
                                            <div><a href="https://www.franchiseindia.com/investor/create"
                                                    class="btn btn-large btn-default
                                       btn-gry btn-prop">
                                                    Start A Business
                                                    Today <br /><span>(Investor
                                                        Registration) </span> </a>
                                            </div>
                                            <br>
                                            <div><a href="https://www.franchiseindia.com/franchisor/registration/step/1"
                                                    class="btn btn-large btn-default
                                       btn-gry btn-prop">Appoint
                                                    Channel
                                                    Partners <br /><span> (Franchisor
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
    <!-- #start-franchise -->
    <div class="wrapper">
        <!-- Sidebar  -->
        @include('layout.newhomepage.sidemenu')
        <!-- Sidebar End -->
        <!-- Page Content  -->
        <div id="content">
            <header class="header" id="header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex">
                                <div class="p-2">
                                    <div id="sidebarCollapse" class="menu-bar">
                                        <img src="{{ url('newhomepage/assets/img/menu-icon.svg') }}"
                                            alt="menu-icon" />
                                        <!-- <span>Menu</span> -->
                                    </div>
                                </div>
                                <div class="p-2 logo"> <a href="#"><img
                                            src="{{ url('newhomepage/assets/img/Logo.svg') }}"
                                            alt="Franchise Logo"></a></div>
                                <div class="ml-auto d-flex">
                                    <span class="login-text-right text-right" data-toggle="modal"
                                        data-target="#search">
                                        <img src="{{ url('newhomepage/assets/img/Search.svg') }}" alt="Search">
                                    </span>
                                    <span class="login-text-right text-right" data-toggle="modal"
                                        data-target="#login-pnl">
                                        <img src="{{ url('newhomepage/assets/img/Login.svg') }}"
                                            alt="Franchise Login">
                                    </span>
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
                            <a href="">
                                <div class="btn-main btn-franchise" data-toggle="modal"
                                    data-target="#start-franchise">Start a Franchise Business
                                    Today
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- HERO SECTION EMDS -->
            <main class="main" id="main">
                <section class="top-franchise-opportunities section-30" id="top-franchise-opportunities">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="brand-img-google">
                                    <div class="brand-img-section">
                                        <a href="">
                                            <img src="./assets/img/Google-Ads-testmonial.jpg" class=""
                                                alt="Testimonial">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- COVID PROOF BUSINESS OPPORTUNITIES START  -->
                <section class="card-section section-30" id="card-section">
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
                                <div class="swiper-slide">
                                    <div class="swiper-slide-section-main">
                                        <div class="overlay-card"></div>
                                        <div class="card card-m card-p-10">
                                            <div class="brand-img">
                                                <div class="brand-img-section">
                                                    <a href="">
                                                        <img src="https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/engage_199x81.png"
                                                            class="" alt="engage">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body-section">
                                                <p>
                                                    Ice Cream Chain
                                                </p>
                                                <h2>Remassis </h2>
                                                <div class="d-flex">
                                                    <div class="card-info">
                                                        Investment range
                                                    </div>
                                                    <div class="card-info-amt">
                                                        ₹50L-1Cr
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="card-info">
                                                        Area Required
                                                    </div>
                                                    <div class="card-info-amt">
                                                        500-600 Sq.ft
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="card-info">
                                                        Franchise Outlets
                                                    </div>
                                                    <div class="card-info-amt">
                                                        Less than 10
                                                    </div>
                                                </div>
                                                <div class="link-section">
                                                    <a href="#">Know More</a>
                                                </div>
                                                <div class="custom-tags-main">
                                                    <ul class="custom-tags">
                                                        <li>
                                                            clinics
                                                        </li>
                                                        <li>
                                                            nursing homes
                                                        </li>
                                                    </ul>
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
                <!-- COVID PROOF BUSINESS OPPORTUNITIES ENDS -->
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
                                                        <img src="https://www.franchiseindia.com/images/events/gflfbg.jpg"
                                                            class="img-fluid" alt="gflfbg">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body-section">
                                                <h2>Global Franchise Leaders Forum</h2>
                                                <p>
                                                    29TH OCTOBER 2020 VIRTUAL CONFERENCE | 05:30 PM
                                                </p>
                                                <div class="link-section text-capitalize">
                                                    <a href="http://www.globalfranchiseleaders.com/"
                                                        target="_blank">Registration</a>
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
                                                    <a href="https://www.franchiseindia.com/franchise-show-south/"
                                                        target="_blank">
                                                        <img src="https://www.franchiseindia.com/images/events/southfs.png"
                                                            class="img-fluid" alt="img-fluid">
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
                                                    <a href="https://www.franchiseindia.com/franchise-show-south/"
                                                        target="_blank">Registration</a>
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
                                                    <a href="https://www.franchiseindia.com/franchise-show-west/"
                                                        target="_blank">
                                                        <img src="https://www.franchiseindia.com/images/events/westfs.png"
                                                            class="img-fluid" alt="img-fluid">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body-section">
                                                <h2>Franchise Show - West Region</h2>
                                                <p>
                                                    01ST NOVEMBER 2020 | 10:00 AM VIRTUAL
                                                </p>
                                                <div class="link-section  text-capitalize">
                                                    <a href="https://www.franchiseindia.com/franchise-show-west/"
                                                        target="_blank">Registration</a>
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
                <section class="top-franchise-opportunities section-30" id="top-franchise-opportunities">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="brand-img-google">
                                    <div class="brand-img-section">
                                        <a href="">
                                            <img src="./assets/img/Google-Ads-testmonial.jpg" class=""
                                                alt="Testimonials">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Best Franchise Opportunity starts -->
                <section class="best-franchise-opportunity section-30" id="best-franchise-opportunity">
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
                                <div class="swiper-slide">
                                    <div class="swiper-slide-franchise-opportunity">
                                        <div class="overlay-card"></div>
                                        <div class="card card-m card-p-10">
                                            <div class="brand-img">
                                                <div class="brand-img-section">
                                                    <a href="">
                                                        <img src="https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/engage_199x81.png"
                                                            class="" alt="Engage">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body-section">
                                                <p>
                                                    School
                                                </p>
                                                <h2>Seth Anandram Jaipuria</h2>
                                                <div class="d-flex">
                                                    <div class="card-info">
                                                        Investment range
                                                    </div>
                                                    <div class="card-info-amt">
                                                        ₹50L-1Cr
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="card-info">
                                                        Area Required
                                                    </div>
                                                    <div class="card-info-amt">
                                                        500-600 Sq.ft
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="card-info">
                                                        Franchise Outlets
                                                    </div>
                                                    <div class="card-info-amt">
                                                        Less than 10
                                                    </div>
                                                </div>
                                                <div class="link-section">
                                                    <a href="#">View All</a>
                                                </div>
                                                <div class="custom-tags-main">
                                                    <ul class="custom-tags">
                                                        <li>
                                                            clinics
                                                        </li>
                                                        <li>
                                                            nursing homes
                                                        </li>
                                                    </ul>
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
                <!-- Best Franchise Opportunity ends -->
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
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="swiper-slide-international-opportunities">
                                        <div class="overlay-card"></div>
                                        <div class="card card-m card-p-10"
                                            style="background-color:
                                    #2cbee614;">
                                            <div class="brand-img">
                                                <div class="brand-img-section">
                                                    <a href="">
                                                        <img src="https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/engage_199x81.png"
                                                            class="" alt="Engage">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body-section">
                                                <p>
                                                    Ice Cream Chain
                                                </p>
                                                <h2>Ice-Cream Lab</h2>
                                                <div class="card-info-summry">
                                                    Lorem Ipsum has been the industry's standard dummy
                                                    text ever since the
                                                    1500s.
                                                </div>
                                                <div class="link-section">
                                                    <a href="#"
                                                        style="color: #2fc0e4;
                                             border: 1px solid #4ac1e7;
                                             padding: 5px;
                                             border-radius: 4px;
                                             font-weight: 600;">Know
                                                        More</a>
                                                </div>
                                                <div class="custom-tags-main">
                                                    <ul class="custom-tags">
                                                        <li>
                                                            clinics
                                                        </li>
                                                        <li>
                                                            nursing homes
                                                        </li>
                                                    </ul>
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
                <!-- Top International Opportunities ends -->
                <section class="top-franchise-opportunities section-30" id="top-franchise-opportunities">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="brand-img-google">
                                    <div class="brand-img-section">
                                        <a href="">
                                            <img src="./assets/img/Google-Ads-testmonial.jpg" class=""
                                                alt="Testimonials">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Featured Franchise Companies starts -->
                <section class="top-franchise-opportunities section-30 w-bg-main" id="top-franchise-opportunities">
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
                                <div class="swiper-slide">
                                    <div class="swiper-slide-top-franchise-opportunities">
                                        <div class="overlay-card"></div>
                                        <div class="card card-m card-p-10">
                                            <div class="brand-img">
                                                <div class="brand-img-section">
                                                    <a href="">
                                                        <img src="https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/engage_199x81.png"
                                                            class="" alt="Engage">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body-section">
                                                <p>
                                                    Investment range
                                                </p>
                                                <div class="card-info-amount">
                                                    ₹50L-1Cr
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
                <!-- Featured Franchise Companies ends -->
                <!-- Top Franchise Opportunities starts -->
                <section class="top-franchise-opportunities section-30" id="top-franchise-opportunities">
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
                                <div class="swiper-slide">
                                    <div class="swiper-slide-top-franchise-opportunities">
                                        <div class="overlay-card"></div>
                                        <div class="card card-m card-p-10">
                                            <div class="brand-img">
                                                <div class="brand-img-section">
                                                    <a href="">
                                                        <img src="https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/engage_199x81.png"
                                                            class="" alt="engage">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body-section">
                                                <p>
                                                    School
                                                </p>
                                                <h2>Launmark india P Ltd</h2>
                                                <div class="d-flex">
                                                    <div class="card-info">
                                                        Investment range
                                                    </div>
                                                    <div class="card-info-amt">
                                                        ₹50L-1Cr
                                                    </div>
                                                </div>
                                                <div class="link-section">
                                                    <a href="#" class="know-more">Know More</a>
                                                </div>
                                                <div class="custom-tags-main">
                                                    <ul class="custom-tags">
                                                        <li>
                                                            clinics
                                                        </li>
                                                        <li>
                                                            nursing homes
                                                        </li>
                                                    </ul>
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
                <!-- Top Franchise Opportunities ends -->
                <section class="top-franchise-opportunities section-30" id="top-franchise-opportunities">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="brand-img-google">
                                    <div class="brand-img-section">
                                        <a href="">
                                            <img src="./assets/img/Google-Ads-testmonial.jpg" class=""
                                                alt="Testimonials">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- News section starts -->
                <section class="top-franchise-opportunities section-30" id="top-franchise-opportunities">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                <div class="section-ptb">
                                    <h2>Frachise Insight </h2>
                                    <div class="view-all-main-section">
                                        <a href="#">View All</a>
                                    </div>
                                    <div class="card card-m card-ptb-20">
                                        <div class="row">
                                            <div
                                                class="col-xs-12 col-sm-12 col-md-6 col-lg-6
                                       col-xl-6">
                                                <div class="card-news-info">
                                                    <div class="news-overlay">
                                                        <div class="brand-img-news">
                                                            <div class="brand-img-section">
                                                                <a href="">
                                                                    <img src="https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/engage_199x81.png"
                                                                        class="" alt="engage">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-news-summry">
                                                        <h3>Lorem Ipsum is simply dummy text
                                                        </h3>
                                                        <p>of the printing and typesetting industry. Lorem
                                                            Ipsum has been the industry's
                                                        </p>
                                                        <div class="d-flex author-section">
                                                            <div class="author-info-lf">
                                                                <a href="#">Know More</a>
                                                            </div>
                                                            <div class="author-info">
                                                                <ul class="author-share">
                                                                    <li>
                                                                        <img src="./assets/img/facebookx2.png"
                                                                            alt="Facebook">
                                                                    </li>
                                                                    <li>
                                                                        <img src="./assets/img/twitterx2.png"
                                                                            alt="Twitter">
                                                                    </li>
                                                                    <li>
                                                                        <img src="./assets/img/linkedinx2.png"
                                                                            alt="Linkend">
                                                                    </li>
                                                                </ul>
                                                                -Vaishnavi Gupta<br>News Editor
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-xs-12 col-sm-12 col-md-6 col-lg-6
                                       col-xl-6">
                                                <div class="news-min-section">
                                                    <ul class="news-min-section-info">
                                                        <li>
                                                            <div class="row">
                                                                <div
                                                                    class="col-xs-4 col-sm-4 col-md-4
                                                      col-lg-4 col-xl-4">
                                                                    <img src="./assets/img/min-post.jpg"
                                                                        class="img-z-fluid" alt="Min Post">
                                                                </div>
                                                                <div
                                                                    class="col-xs-8 col-sm-8 col-md-8
                                                      col-lg-8 col-xl-8">
                                                                    <div class="post-news-text">
                                                                        <p>of the printing and typesetting
                                                                            industry.
                                                                        </p>
                                                                        <a href="#" class="read-more">Know
                                                                            More</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="row">
                                                                <div
                                                                    class="col-xs-4 col-sm-4 col-md-4
                                                      col-lg-4 col-xl-4">
                                                                    <img src="./assets/img/min-post.jpg"
                                                                        class="img-z-fluid" alt="img fluid">
                                                                </div>
                                                                <div
                                                                    class="col-xs-8 col-sm-8 col-md-8
                                                      col-lg-8 col-xl-8">
                                                                    <div class="post-news-text">
                                                                        <p>of the printing and typesetting
                                                                            industry.
                                                                        </p>
                                                                        <a href="#" class="read-more">Know
                                                                            More</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="row">
                                                                <div
                                                                    class="col-xs-4 col-sm-4 col-md-4
                                                      col-lg-4 col-xl-4">
                                                                    <img src="./assets/img/min-post.jpg"
                                                                        class="img-z-fluid" alt="Img fluid">
                                                                </div>
                                                                <div
                                                                    class="col-xs-8 col-sm-8 col-md-8
                                                      col-lg-8 col-xl-8">
                                                                    <div class="post-news-text">
                                                                        <p>of the printing and typesetting
                                                                            industry.
                                                                        </p>
                                                                        <a href="#" class="read-more">Know
                                                                            More</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                <div class="section-ptb">
                                    <h2>News</h2>
                                    <div class="view-all-main-section">
                                        <a href="#">View All</a>
                                    </div>
                                    <div class="card card-m card-ptb-20">
                                        <div class="row">
                                            <div
                                                class="col-xs-12 col-sm-12 col-md-6 col-lg-6
                                       col-xl-6">
                                                <div class="card-news-info">
                                                    <div class="news-overlay">
                                                        <div class="brand-img-news">
                                                            <div class="brand-img-section">
                                                                <a href="">
                                                                    <img src="https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/engage_199x81.png"
                                                                        class="" alt="Engage">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-news-summry">
                                                        <h3>Lorem Ipsum is simply dummy text
                                                        </h3>
                                                        <p>of the printing and typesetting industry. Lorem
                                                            Ipsum has been the industry's
                                                        </p>
                                                        <div class="d-flex author-section">
                                                            <div class="author-info-lf">
                                                                <a href="#">Know More</a>
                                                            </div>
                                                            <div class="author-info">
                                                                <ul class="author-share">
                                                                    <li>
                                                                        <img src="./assets/img/facebookx2.png"
                                                                            alt="Facebook">
                                                                    </li>
                                                                    <li>
                                                                        <img src="./assets/img/twitterx2.png"
                                                                            alt="twitter">
                                                                    </li>
                                                                    <li>
                                                                        <img src="./assets/img/linkedinx2.png"
                                                                            alt="Linkend">
                                                                    </li>
                                                                </ul>
                                                                -Vaishnavi Gupta<br>News Editor
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-xs-12 col-sm-12 col-md-6 col-lg-6
                                       col-xl-6">
                                                <div class="news-min-section">
                                                    <ul class="news-min-section-info">
                                                        <li>
                                                            <div class="row">
                                                                <div
                                                                    class="col-xs-4 col-sm-4 col-md-4
                                                      col-lg-4 col-xl-4">
                                                                    <img src="./assets/img/min-post.jpg"
                                                                        class="img-z-fluid" alt="min Post">
                                                                </div>
                                                                <div
                                                                    class="col-xs-8 col-sm-8 col-md-8
                                                      col-lg-8 col-xl-8">
                                                                    <div class="post-news-text">
                                                                        <p>of the printing and typesetting
                                                                            industry.
                                                                        </p>
                                                                        <a href="#" class="read-more">Know
                                                                            More</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="row">
                                                                <div
                                                                    class="col-xs-4 col-sm-4 col-md-4
                                                      col-lg-4 col-xl-4">
                                                                    <img src="./assets/img/min-post.jpg"
                                                                        class="img-z-fluid" alt="img fliuid">
                                                                </div>
                                                                <div
                                                                    class="col-xs-8 col-sm-8 col-md-8
                                                      col-lg-8 col-xl-8">
                                                                    <div class="post-news-text">
                                                                        <p>of the printing and typesetting
                                                                            industry.
                                                                        </p>
                                                                        <a href="#" class="read-more">Know
                                                                            More</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="row">
                                                                <div
                                                                    class="col-xs-4 col-sm-4 col-md-4
                                                      col-lg-4 col-xl-4">
                                                                    <img src="./assets/img/min-post.jpg"
                                                                        class="img-z-fluid" alt="Img fluid">
                                                                </div>
                                                                <div
                                                                    class="col-xs-8 col-sm-8 col-md-8
                                                      col-lg-8 col-xl-8">
                                                                    <div class="post-news-text">
                                                                        <p>of the printing and typesetting
                                                                            industry.
                                                                        </p>
                                                                        <a href="#" class="read-more">Know
                                                                            More</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
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
                <section class="testimonia-section section-30" id="testimonia-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div id="testimonial-carousel" class="owl-carousel owl-arrow">
                                    <div class="carousel-item-a">
                                        <div class="testimonial-main">
                                            <div class="testimonial-brand-section">
                                                <img src="./assets/img/brandlogo.jpg" class="img-b-fluid"
                                                    alt="img fluid">
                                            </div>
                                            <div class="testimonial-brand-summury">
                                                <div class="open-quotes">
                                                    <img src="./assets/img/open-qoutes.svg" alt="open-qoutes" />
                                                </div>
                                                <p>Franchising is a proven, low-risk business model.
                                                    Here franchisor
                                                    not
                                                    just gives his brand to the franchisees but all his
                                                    expertise to
                                                    make it
                                                    a success. Franchising is a proven, low-risk
                                                    business model.
                                                    Here franchisor not
                                                    just gives his brand to the franchisees but all his
                                                    expertise to
                                                    make it
                                                    a success.
                                                </p>
                                                <div class="textimonial-brand-section">
                                                    REMAX INDIA
                                                </div>
                                                <div class="close-quotes">
                                                    <img src="./assets/img/close-quotes.svg" alt="close-qoutes" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item-a">
                                        <div class="testimonial-main">
                                            <div class="testimonial-brand-section">
                                                <img src="./assets/img/brandlogo.jpg" class="img-b-fluid"
                                                    alt="Brand Logo">
                                            </div>
                                            <div class="testimonial-brand-summury">
                                                <div class="open-quotes">
                                                    <img src="./assets/img/open-qoutes.svg" alt="open-qoutes" />
                                                </div>
                                                <p>Franchising is a proven, low-risk business model.
                                                    Here franchisor
                                                    not
                                                    just gives his brand to the franchisees but all his
                                                    expertise to
                                                    make it
                                                    a success. Franchising is a proven, low-risk
                                                    business model.
                                                    Here franchisor not
                                                    just gives his brand to the franchisees but all his
                                                    expertise to
                                                    make it
                                                    a success.
                                                </p>
                                                <div class="textimonial-brand-section">
                                                    REMAX INDIA
                                                </div>
                                                <div class="close-quotes">
                                                    <img src="./assets/img/close-quotes.svg" alt="close-qoutes" />
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
                                            <a href="">
                                                <img src="./assets/img/Google-Ads-testmonial.jpg" class=""
                                                    alt="Testimonials">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Testimonial section ends -->
                <!-- newsletter section starts -->
                <section class="newslettersection text-center section-30 bg-b-main" id="newslettersection">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Share your email address to get latest updates from the industry</p>
                                <h2>Newsletter Signup</h2>
                                <div class="main-newsletter">
                                    <form action="">
                                        <ul class="newsletter">
                                            <li><input type="email"
                                                    class="form-control
                                       emailer-main"
                                                    placeholder="Enter Mail" aria-label="Enter Mail"
                                                    aria-describedby="button-addon2"></li>
                                            <li><button class="btn btn-main" type="button"
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
                                            <li><a href="#"><img src="./assets/img/fb-icon.svg"
                                                        alt="facebook"></a></li>
                                            <li><a href="#"><img src="./assets/img/instagram-icon.svg"
                                                        alt="Instagram"></a></li>
                                            <li><a href="#"><img src="./assets/img/twitter-icon.svg"
                                                        alt="twitter"></a></li>
                                            <li><a href="#"><img src="./assets/img/youtube-icon.svg"
                                                        alt="youtube"></a></li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- newsletter section ends -->
                <!-- Business Opportunities section starts -->
                <section class="Business-Opportunitiessection section-30" id="Business-Opportunitiessection">
                    <div class="container">
                        <div class="row">
                            <div
                                class="modified-col col-xs-6 col-sm-6
                           col-md-4
                           col-xl-2
                           col-lg-2">
                                <div class="footer-widget-link">
                                    <p><a
                                            href="https://www.franchiseindia.com/business-opportunities/automotive.m8">Automotive</a>
                                    </p>
                                    <ul class="footer-links">
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/automobile-related.sc344">Automobile
                                                related</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/four-wheeler.sc342">Four
                                                Wheeler</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/heavy-moving-vehicles.sc343">Heavy
                                                moving vehicles</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/automotive.m8">View
                                                All &gt;</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="modified-col col-xs-6 col-sm-6
                           col-md-4
                           col-xl-2
                           col-lg-2">
                                <div class="footer-widget-link">
                                    <p><a
                                            href="https://www.franchiseindia.com/business-opportunities/beauty-and-health.m1">Beauty
                                            &amp; Health</a>
                                    </p>
                                    <ul class="footer-links">
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/beauty-salons-and-supplies.sc13">Beauty
                                                Asthetics &amp; Supplies</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/foreign-exchange.sc14">Health
                                                Care</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/wellness.sc538">Wellness</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/beauty-and-health.m1">View
                                                All &gt;</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="modified-col col-xs-6 col-sm-6
                           col-md-4
                           col-xl-2
                           col-lg-2">
                                <div class="footer-widget-link">
                                    <p><a
                                            href="https://www.franchiseindia.com/business-opportunities/business-services.m6">Business
                                            Services</a>
                                    </p>
                                    <ul class="footer-links">
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/advertisement-and-media-services.sc23">Advertisement
                                                &amp; Media Services</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/consultancy.sc31">Consultancy</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/it-services.sc26">IT
                                                Services</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/business-services.m6">View
                                                All &gt;</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="modified-col col-xs-6 col-sm-6
                           col-md-4
                           col-xl-2
                           col-lg-2">
                                <div class="footer-widget-link">
                                    <p><a
                                            href="https://www.franchiseindia.com/business-opportunities/dealers-and-distributors.m5">
                                            Dealers &amp; Distributors</a>
                                    </p>
                                    <ul class="footer-links">
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/automobile.sc443">Automobile</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/fmcg.sc476">FMCG</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/office-supplies.sc478">Office
                                                supplies</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/dealers-and-distributors.m5">View
                                                All &gt;</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="modified-col col-xs-6 col-sm-6
                           col-md-4
                           col-xl-2
                           col-lg-2">
                                <div class="footer-widget-link">
                                    <p><a
                                            href="https://www.franchiseindia.com/business-opportunities/education.m3">Education</a>
                                    </p>
                                    <ul class="footer-links">
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/coaching-and-tutoring.sc19">Coaching
                                                &amp; Tutoring</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/higher-education.sc20">Higher
                                                Education</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/online-education.sc22">Online
                                                Education</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/education.m3">View
                                                All &gt;</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="modified-col col-xs-6 col-sm-6
                           col-md-4
                           col-xl-2
                           col-lg-2">
                                <div class="footer-widget-link">
                                    <p><a
                                            href="https://www.franchiseindia.com/business-opportunities/fashion.m10">Fashion</a>
                                    </p>
                                    <ul class="footer-links">
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/accessories.sc44">Accessories</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/clothing.sc40">Clothing</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/footwear.sc41">Footwear</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/fashion.m10">View
                                                All&gt;</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="modified-col col-xs-6 col-sm-6
                           col-md-4
                           col-xl-2
                           col-lg-2">
                                <div class="footer-widget-link">
                                    <p><a
                                            href="https://www.franchiseindia.com/business-opportunities/education.m3">Education</a>
                                    </p>
                                    <ul class="footer-links">
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/accessories.sc44">Accessories</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/clothing.sc40">Clothing</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/footwear.sc41">Footwear</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/fashion.m10">View
                                                All&gt;</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="modified-col col-xs-6 col-sm-6
                           col-md-4
                           col-xl-2
                           col-lg-2">
                                <div class="footer-widget-link">
                                    <p><a
                                            href="https://www.franchiseindia.com/business-opportunities/home-based-businesses.m7">Home
                                            Based Business</a>
                                    </p>
                                    <ul class="footer-links">
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/beauty-and-fitness.sc276">Beauty
                                                &amp; Fitness</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/home-care-services.sc275">Home
                                                Care Services</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/home-based-tutoring.sc279">Home
                                                based Tutoring</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/home-based-businesses.m7">View
                                                All &gt;</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="modified-col col-xs-6 col-sm-6
                           col-md-4
                           col-xl-2
                           col-lg-2">
                                <div class="footer-widget-link">
                                    <p><a
                                            href="https://www.franchiseindia.com/business-opportunities/hotels-travel-and-tourism.m263">Hotels,Travel
                                            &amp; Tourism</a>
                                    </p>
                                    <ul class="footer-links">
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/hotels-and-resorts.sc15">Hotels
                                                and Resorts</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/taxi-and-rental.sc379">Taxi
                                                &amp; Rental</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/tourism-services.sc380">Tourism
                                                Services</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/hotels-travel-and-tourism.m263">View
                                                All &gt;</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="modified-col col-xs-6 col-sm-6
                           col-md-4
                           col-xl-2
                           col-lg-2">
                                <div class="footer-widget-link">
                                    <p><a
                                            href="https://www.franchiseindia.com/business-opportunities/retail.m9">Retail</a>
                                    </p>
                                    <ul class="footer-links">
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/books-toys-and-gifts.sc36">Books
                                                &amp; Toys &amp; Gifts</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/fashion.sc556">Fashion</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/e-retail.sc39">E-Retail</a>
                                        </li>
                                        <li><a href="https://www.franchiseindia.com/business-opportunities/retail.m9">View
                                                All &gt;</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="modified-col col-xs-6 col-sm-6
                           col-md-4
                           col-xl-2
                           col-lg-2">
                                <div class="footer-widget-link">
                                    <p><a
                                            href="https://www.franchiseindia.com/business-opportunities/sports-fitness-and-entertainment.m11">
                                            Sports, Fitness &amp; Entertainment
                                        </a>
                                    </p>
                                    <ul class="footer-links">
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/entertainment-and-leisure.sc45">Entertainment
                                                &amp; Leisure</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/sports-goods-and-fitness-stores.sc37">Sports
                                                Goods &amp; Fitness Stores</a>
                                        </li>
                                        <li><a
                                                href="https://www.franchiseindia.com/business-opportunities/sports-fitness-and-entertainment.m11">View
                                                All &gt;</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Business Opportunities section ends -->
                <!-- Our Group Sites section starts -->
                <section class="Our-Group-Sitessection section-30" id="Our-Group-Sitessection">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="modified-col col-md-12">
                                <p class="section-th">Our Group Sites</p>
                                <div class="row justify-content-center">
                                    <div
                                        class="modified-col col-xs-4 col-sm-4
                                 col-md-4 col-xl-2
                                 col-lg-2">
                                        <div class="our-group-site-main">
                                            <a href="https://www.entrepreneur.com/">
                                                <img src="./assets/img/entrepreneure-india.jpg" class="img-b"
                                                    alt="entrepreneure-india">
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="modified-col col-xs-4 col-sm-4
                                 col-md-4 col-xl-2
                                 col-lg-2">
                                        <div class="our-group-site-main">
                                            <a href="https://www.indianretailer.com/">
                                                <img src="./assets/img/indianretailer.jpg" class="img-b"
                                                    alt="indianretailer">
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="modified-col col-xs-4 col-sm-4
                                 col-md-4 col-xl-2
                                 col-lg-2">
                                        <div class="our-group-site-main">
                                            <a href="https://www.restaurantindia.in/">
                                                <img src="./assets/img/restaurantindia.jpg" class="img-b"
                                                    alt="restaurantindia">
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="modified-col col-xs-4 col-sm-4
                                 col-md-4 col-xl-2
                                 col-lg-2">
                                        <div class="our-group-site-main">
                                            <a href="https://www.franchiseindia.com/wellness/">
                                                <img src="./assets/img/frachiseindia-wellness.jpg" class="img-b"
                                                    alt="frachiseindia-wellness">
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="modified-col col-xs-4 col-sm-4
                                 col-md-4 col-xl-2
                                 col-lg-2">
                                        <div class="our-group-site-main">
                                            <a href="https://www.franchiseindia.com/education/">
                                                <img src="./assets/img/frachiseindia-education.jpg" class="img-b"
                                                    alt="frachiseindia-education">
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="modified-col col-xs-4 col-sm-4
                                 col-md-4 col-xl-2
                                 col-lg-2">
                                        <div class="our-group-site-main">
                                            <a href="https://www.franchisenepal.com/">
                                                <img src="./assets/img/franchiseindia-nepal.jpg" class="img-b"
                                                    alt="franchiseindia-nepal">
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="modified-col col-xs-4 col-sm-4
                                 col-md-4 col-xl-2
                                 col-lg-2">
                                        <div class="our-group-site-main">
                                            <a href="http://www.franchisebangladesh.com/">
                                                <img src="./assets/img/frachiseindia-bangladesh.jpg" class="img-b"
                                                    alt="frachiseindia-bangladesh">
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="modified-col col-xs-4 col-sm-4
                                 col-md-4 col-xl-2
                                 col-lg-2">
                                        <div class="our-group-site-main">
                                            <a href="https://www.businessex.com/">
                                                <img src="./assets/img/businessex.jpg" class="img-b"
                                                    alt="businessex">
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="modified-col col-xs-4 col-sm-4
                                 col-md-4 col-xl-2
                                 col-lg-2">
                                        <div class="our-group-site-main">
                                            <a href="https://www.licenseindia.com/">
                                                <img src="{{ url('newhomepage/assets/img/license-india.jpg') }}"
                                                    class="img-b" alt="licenseindia">
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="modified-col col-xs-4 col-sm-4
                                 col-md-4 col-xl-2
                                 col-lg-2">
                                        <div class="our-group-site-main">
                                            <a href="https://www.bradfordlicenseindia.com/">
                                                <img src="./assets/img/brandford.jpg" class="img-b" alt="brandford">
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="modified-col col-xs-4 col-sm-4
                                 col-md-4 col-xl-2
                                 col-lg-2">
                                        <div class="our-group-site-main">
                                            <a href="https://www.franchiseindia.net/">
                                                <img src="./assets/img/franchiseindia-exbition.jpg" class="img-b"
                                                    alt="franchiseindia-exbition">
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="modified-col col-xs-4 col-sm-4
                                 col-md-4 col-xl-2
                                 col-lg-2">
                                        <div class="our-group-site-main">
                                            <a href="https://www.franchiseindia.in/">
                                                <img src="./assets/img/franchiseindia.jpg" class="img-b"
                                                    alt="franchiseindia">
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="modified-col col-xs-4 col-sm-4
                                 col-md-4 col-xl-2
                                 col-lg-2">
                                        <div class="our-group-site-main">
                                            <a href="https://www.francorp.in/">
                                                <img src="./assets/img/fancorp.jpg" class="img-b" alt="fancorp">
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="modified-col col-xs-4 col-sm-4
                                 col-md-4 col-xl-2
                                 col-lg-2">
                                        <div class="our-group-site-main">
                                            <a href="https://www.franglobal.com/">
                                                <img src="./assets/img/fanglobal.jpg" class="img-b" alt="fanglobal">
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="modified-col col-xs-4 col-sm-4
                                 col-md-4 col-xl-2
                                 col-lg-2">
                                        <div class="our-group-site-main">
                                            <a href="http://www.franchiseindiaventures.com/">
                                                <img src="./assets/img/franchiseindia-aventure.jpg" class="img-b"
                                                    alt="franchiseindia-aventure">
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="modified-col col-xs-4 col-sm-4
                                 col-md-4 col-xl-2
                                 col-lg-2">
                                        <div class="our-group-site-main">
                                            <a href="https://www.gauravmarya.com/">
                                                <img src="./assets/img/gauravmarya.jpg" class="img-b"
                                                    alt="gauravmarya">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Our Group Sites section ends -->
                <!-- Browse By Location starts -->
                <section class="Our-Group-Sitessection section-30" id="Our-Group-Sitessection">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="modified-col col-md-12">
                                <p class="section-th">Browse By Location</p>
                                <div class="modified-col col-md-12">
                                    <div class="brows-by-location">
                                        <ul class="fihl-loaction-browse">
                                            <li> <a
                                                    href="https://www.franchiseindia.com/business-opportunities/maharashtra.LOC18">Maharashtra</a>
                                            </li>
                                            <li> <a
                                                    href="https://www.franchiseindia.com/business-opportunities/delhi.LOC23">Delhi</a>
                                            </li>
                                            <li><a
                                                    href="https://www.franchiseindia.com/business-opportunities/karnataka.LOC14">Karnataka</a>
                                            </li>
                                            <li><a
                                                    href="https://www.franchiseindia.com/business-opportunities/tamilnadu.LOC29">Tamil
                                                    Nadu</a>
                                            </li>
                                            <li><a
                                                    href="https://www.franchiseindia.com/business-opportunities/west-bengal.LOC33">West
                                                    Bengal</a>
                                            </li>
                                            <li><a
                                                    href="https://www.franchiseindia.com/business-opportunities/gujarat.LOC9">Gujarat</a>
                                            </li>
                                            <li><a
                                                    href="https://www.franchiseindia.com/business-opportunities/uttar-pradesh.LOC32">Uttar
                                                    Pradesh</a>
                                            </li>
                                            <li><a
                                                    href="https://www.franchiseindia.com/business-opportunities/madhya-pradesh.LOC17">Madhya
                                                    Pradesh</a>
                                            </li>
                                            <li><a
                                                    href="https://www.franchiseindia.com/business-opportunities/haryana.LOC10">Haryana</a>
                                            </li>
                                            <li><a
                                                    href="https://www.franchiseindia.com/business-opportunities/rajasthan.LOC27">Rajasthan</a>
                                            </li>
                                            <li> <a
                                                    href="https://www.franchiseindia.com/business-opportunities/andhra-pradesh.LOC1">Andhra
                                                    Pradesh</a>
                                            </li>
                                            <li> <a
                                                    href="https://www.franchiseindia.com/business-opportunities/kerala.LOC15">Kerala</a>
                                            </li>
                                            <li><a
                                                    href="https://www.franchiseindia.com/business-opportunities/punjab.LOC26">Punjab</a>
                                            </li>
                                            <li><a
                                                    href="https://www.franchiseindia.com/business-opportunities/chandigarh.LOC5">Chandigarh</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            @include('layout.newhomepage.footer')
        </div>
    </div>
    <div class="overlay"></div>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="{{ url('newhomepage/assets/vendor/jquery/js/jquery-3.3.1.slim.min.js') }}"></script>
    <!-- Popper.JS -->
    <!-- <script src="./assets/vendor/popper/js/popper.min.js"></script> -->
    <!-- Bootstrap JS -->
    <script src="{{ url('newhomepage/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="{{ url('newhomepage/assets/vendor/mCustomScrollbar/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Font Awesome JS -->
    <script defer src="{{ url('newhomepage/assets/vendor/fontawesome/js/solid.js') }}"></script>
    <script defer src="{{ url('newhomepage/assets/vendor/fontawesome/js/fontawesome.js') }}"></script>
    <!-- swiper@6.2.0 JS -->
    <script src="{{ url('newhomepage/assets/vendor/swiper/js/swiper-bundle.min.js') }}"></script>
    <!-- Owl carousel -->
    <script src="{{ url('newhomepage/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ url('newhomepage/assets/js/app.mobile.js') }}" defer></script>
</body>

</html>
