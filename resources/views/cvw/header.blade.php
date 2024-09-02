<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="en-in" name="language">
<title>Franchise India - Business Opportunities, Franchise Opportunities</title>
<meta name="description" content="Franchise India provides franchise opportunities, business opportunities, business ideas,best business in India and buy Franchise in India with affordable range.">
<meta name="keywords" itemprop="keywords" content="franchise in india, franchise opportunities,business opportunities, business ideas, buy franchise in india, small business ideas, franchise india">
<link href="https://www.franchiseindia.com/" rel="canonical">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
<link rel="stylesheet" href="https://www.franchiseindia.com/newhomepage/assets/vendor/bootstrap/css/bootstrap.min.css?ver=2.2" rel="preload" as="style">
<link rel="stylesheet" href="https://www.franchiseindia.com/newhomepage/assets/vendor/mCustomScrollbar/css/jquery.mCustomScrollbar.min.css?ver=2.2" rel="preload" as="style" rel="preload" as="style">
<link rel="stylesheet" href="https://www.franchiseindia.com/newhomepage/assets/vendor/swiper/css/swiper-bundle.min.css?ver=2.2" rel="preload" as="style">
<style>

</style>
</head>
<body id="dotcom">
 @if (request()->segment(1) == 'hi')
    <header class="header" id="header">
        <div class="topbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-30 d-flex">
                            <div class="p-2">
                                <ul class="top-navigation">
                                    <li><a href="https://www.licenseindia.com" target="_blank">ब्रांड लाइसेंस खरीदें</a></li>
                                    <li><a href="https://www.businessex.com" target="_blank">अपना बिजनेस बेचें</a></li>
                                    <li><a href="#" target="_blank" data-toggle="modal" data-target="#expandFranchisenew">फ्रैंचाइज़ का विस्तार करें </a></li>
                                    <li><a href="https://www.franchiseindia.com/advertise-with-us-payment" target="_blank">विज्ञापन दें</a></li>
                                    <li><a href="https://www.restaurantindia.in" target="_blank">रेस्टोरेंट इंडिया</a></li>
                                    <li><a href="https://www.franchiseindia.com/property-loan" target="_blank">संपत्ती के बदले कर्ज</a></li>
                                    <li class="top-investors">
                                        <div class="dropdown policydropdown">
                                            <button class="btn dropdown-toggle" type="button" id="btnDropdownDemo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="">Investor <i class="fa fa-caret-down"></i></button>
                                            <div class="dropdown-menu policydropdownmenu" aria-labelledby="btnDropdownDemo">
                                               <a class="dropdown-item" href="{{ Config('constants.MainDomain') }}/ipo" target="_blank">IPO</a>
                                               <a class="dropdown-item" href="{{ Config('constants.MainDomain') }}/policies" target="_blank">Policies</a>
                                               <a class="dropdown-item" href="{{ Config('constants.MainDomain') }}/corporate-governance" target="_blank">Corporate Governance</a>
                                            </div>
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                            <div class="p-2 ml-auto">
                                <div class="input-group input-group-custom"><span class="input-group-addon input-group-prepend-custom" id="basic-addon1"><img src="https://www.franchiseindia.com/newhomepage/assets/img/language-icon.svg" alt="language-icon" height="15" width="15"></span>
                                    <div class="form-group form-group-sm">
                                        <select class="form-control form-control-custom-main" id="language-changer">
                                            <option hidden="">Language</option>
                                            <option value="@yield('englishUrl')" >EN - English</option>
                                            <option value="@yield('hindiUrl')" selected >HI - Hindi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-btm">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex p-30 m-align">
                            <div class="p-2">
                                <div id="sidebarCollapse" class="menu-bar"><img src="https://www.franchiseindia.com/newhomepage/assets/img/menu-icon.svg" width="25" height="14" alt="menu-icon"><span>Menu</span></div>
                            </div>
                            <div class="logo"><a href="https://www.franchiseindia.com"><img src="https://www.franchiseindia.com/newhomepage/assets/img/Logo.svg" alt="446+ Automotive Franchise, Automotive Business Franchise, Automotive Franchise Opportunities - Franchise India" title="446+ Automotive Franchise, Automotive Business Franchise, Automotive Franchise Opportunities - Franchise India" height="32" width="200"></a></div>
                            <div
                                class="d-flex m-search"><span class="search" id="search"><div class="p-2" data-toggle="modal" data-target="#search-main"><img src="https://www.franchiseindia.com/newhomepage/assets/img/Search.svg" alt="Search"><span>Search</span></div>
                        </span><span class="login-text-right text-right d-main"><span><a data-target="#login-pnl" data-toggle="modal" href="#"><img src="https://www.franchiseindia.com/newhomepage/assets/img/Login.svg" alt="Login"></a></span>
                        <ul class="login-main-section">
                            <li><a href="#" data-toggle="modal" data-target="#login-pnl" id="mobilereg">Register</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#login-pnl" id="loginselect">Login</a></li>
                        </ul>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </header>
    @else

    <header class="header" id="header">
        <div class="topbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-30 d-flex">
                            <div class="p-2">
                                <ul class="top-navigation">
                                    <li><a href="https://www.licenseindia.com" target="_blank">Buy a Brand License</a></li>
                                    <li><a href="https://www.businessex.com" target="_blank">Sell your Business</a></li>
                                    <li><a href="#" target="_blank" data-toggle="modal" data-target="#expandFranchisenew">Expand Your Franchise</a></li>
                                    <li><a href="https://www.franchiseindia.com/advertise-with-us-payment" target="_blank">Advertise</a></li>
                                    <li><a href="https://www.restaurantindia.in" target="_blank">Restaurant India</a></li>
                                    <li><a href="https://www.franchiseindia.com/property-loan" target="_blank">Loan Against Property</a></li>
                                    <li class="top-investors">
                                        <div class="dropdown policydropdown">
                                            <button class="btn dropdown-toggle" type="button" id="btnDropdownDemo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="">Investor <i class="fa fa-caret-down"></i></button>
                                            <div class="dropdown-menu policydropdownmenu" aria-labelledby="btnDropdownDemo">
                                               <a class="dropdown-item" href="{{ Config('constants.MainDomain') }}/ipo" target="_blank">IPO</a>
                                               <a class="dropdown-item" href="{{ Config('constants.MainDomain') }}/policies" target="_blank">Policies</a>
                                               <a class="dropdown-item" href="{{ Config('constants.MainDomain') }}/corporate-governance" target="_blank">Corporate Governance</a>
                                            </div>
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                            <div class="p-2 ml-auto">
                                <div class="input-group input-group-custom"><span class="input-group-addon input-group-prepend-custom" id="basic-addon1"><img src="https://www.franchiseindia.com/newhomepage/assets/img/language-icon.svg" alt="language-icon" height="15" width="15"></span>
                                    <div class="form-group form-group-sm">
                                        <select class="form-control form-control-custom-main" id="language-changer">
                                            <option hidden="">Language</option>
                                            <option value="@yield('englishUrl')" >EN - English</option>
                                            <option value="@yield('hindiUrl')" >HI - Hindi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-btm">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex p-30 m-align">
                            <div class="p-2">
                                <div id="sidebarCollapse" class="menu-bar"><img src="https://www.franchiseindia.com/newhomepage/assets/img/menu-icon.svg" width="25" height="14" alt="menu-icon"><span>Menu</span></div>
                            </div>
                            <div class="logo"><a href="https://www.franchiseindia.com"><img src="https://www.franchiseindia.com/newhomepage/assets/img/Logo.svg" alt="446+ Automotive Franchise, Automotive Business Franchise, Automotive Franchise Opportunities - Franchise India" title="446+ Automotive Franchise, Automotive Business Franchise, Automotive Franchise Opportunities - Franchise India" height="32" width="200"></a></div>
                            <div
                                class="d-flex m-search"><span class="search" id="search"><div class="p-2" data-toggle="modal" data-target="#search-main"><img src="https://www.franchiseindia.com/newhomepage/assets/img/Search.svg" alt="Search"><span>Search</span></div>
                        </span><span class="login-text-right text-right d-main"><span><a data-target="#login-pnl" data-toggle="modal" href="#"><img src="https://www.franchiseindia.com/newhomepage/assets/img/Login.svg" alt="Login"></a></span>
                        <ul class="login-main-section">
                            <li><a href="#" data-toggle="modal" data-target="#login-pnl" id="mobilereg">Register</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#login-pnl" id="loginselect">Login</a></li>
                        </ul>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </header>
    @endif
<style>
    ol.tree li{position: relative}.busheadmebu{float:none;font-size:16px;color:#333;margin:10px 0 8px 15px;font-weight:400;padding:0;line-height:22px}.eshowtxt,.videtxt{color:#828282;font-size:13px}.eshowtxt,.videtxt,ol.tree li a{font-weight:300}.busheadmebu.marmodfy{margin-left:-8px;width:275px}.busheadmebu.marmodfy .gsc-input-box{border:0!important}.busheadmebu a:hover{color:#e62005;text-decoration:underline}ol.tree{padding:0 0 0 15px;width:auto;margin:10px 0}.eshowcontent h2,.videcontent h2{color:#333;font-size:19px;margin-top:9px;overflow:hidden}ol.tree li{list-style:none;font-size:15px;margin:12px 0;font-weight:400;line-height:18px}ol.tree li a:hover{color:#000;text-decoration:underline}#myclose,.icon-whatsapp a,.myaccount ul.nvss a:hover,.sidemy ul.nvss a:hover,a,a:focus,a:hover,ol.tree li.file a,ul.sublink li a:hover{text-decoration:none}ol.tree li.file{margin-left:-1px!important}ol.tree li.file a{background:url(https://www.franchiseindia.com/images/document.png) no-repeat;color:#fff;padding-left:14px;display:block;font-size:12px}ol.tree li input{position:absolute;left:0;margin-left:0;opacity:0;z-index:2;cursor:pointer;height:1em;width:1em;top:0}ol.tree li input+ol{background:url({{url('cvw/images/fright.png?d=2')}}) 40px 0 no-repeat;margin:-19px 0 0 -44px;height:1em}ol.tree li input+ol>li{display:none;padding-left:1px;margin:8px 0 8px -18px!important}ol.tree li label{cursor:pointer;display:block;padding-left:14px;line-height:20px;font-weight:300;margin-bottom:1px}ol.tree li input+ol a:hover{font-weight:400;color:#000}ol.tree li input:checked+ol{background:url(https://www.franchiseindia.com/images/reddown.png?d=2) 40px 1px no-repeat;margin:-19px 0 0 -44px;padding:1.563em 0 0 74px;height:auto}ol.tree li input:checked+ol>li{display:block;margin:0 0 .125em;font-size:13px;line-height:16px}ol.tree li input:checked+ol>li:last-child{margin:0 0 .063em}

    </style>
