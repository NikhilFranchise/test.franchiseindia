@include('cvw.header')
{{-- @include('layout.newhomepage.expendfrm') --}}
@include('cvw.herosection') 
<main id="main" class="main">
@include('cvw.cardsection')
@include('cvw.covidproof')
@include('cvw.tbo')
@include('cvw.tdo')
@include('cvw.businessforsale')
@include('cvw.videoevent')
@include('cvw.tio')
@include('cvw.hgps')
@include('cvw.tfo')
@include('cvw.ffc')
@include('cvw.f_insights_news')
@include('cvw.testimonials')
@include('cvw.popupfroahmedabad')
</main>
@include('cvw.sidemenu')
<div class="overlay"></div>
@include('cvw.newsletter')
@include('cvw.aboutus')
@include('cvw.footersection')
@include('cvw.footer')
@php
         use Illuminate\Support\Str;
         $catArr = Config('constants.CategoryArr');
         asort($catArr);
         $states = Config('location.stateArr');
         asort($states);
         $loginUrl = 'https://www.franchiseindia.com/loginform';
         $loginName = 'Login';
         $class = '';
         $regName = 'Register';
         $regUrl = '#';
         $modelWindow = 'data-toggle=modal data-target=#login-pnl';
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
         $menuicon = 'menu-icon.png';
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
     @endphp
     <div id="myModal" class="modal fade in" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <div id="my_modal" class="model_top" style="width:600px">
                    <div class="headtag">
                    </div>
                    <div class="fi-bg-expo">
                        <div class="boxblk">
        <form class="form registration-form align-center" action="https://www.franchiseindia.net/fro/ahmedabad/register_update.php" method="post">
         <input id="ref" name="ref" type="hidden" value="FRO-Insta-Paid">
         <input type="hidden" value="Ahmedabad September 2024" name="event_year" id="event_year">  
         <input type="hidden" value="FRO 2024 Ahmedabad" name="event_title" id="event_title">  
         <input type="hidden" value="Ahmedabad" name="event_city" id="event_city">       
         <input id="src" name="source" type="hidden" value="Popup">
         <input id="tfw_interest" name="tfw_interest" type="hidden" value="Visit the Expo - LP Paid">    

                       <div class="sec">
                                    <div class="f1">
<input name="txtName" type="text" class="form-control myselect" placeholder="Name" required="" style="color:#ffffff;">
                                    </div>
                                    <div class="f3">
                                        <input name="txtEmail" type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" class="form-control myselect" placeholder="Email" required="">
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                        <input name="txtPhone" type="tel" placeholder="Contact No." class="form-control myselect" pattern="[789][0-9]{9}" minlength="10" maxlength="10" onkeypress="return isNumber(event)" required="">
                                    </div>
                                    <div class="f3">
                                   
                                        <select name="txtState" onchange="getcitypopup(this)" class="form-control myselect" id="txtState" required="">
                                              <!-- <option value="new delhi">new delhi</option> -->
                                            <option value="" data-id="">Select State</option>
                                                                                            <option value="Andaman and Nicobar" data-id="35">Andaman and Nicobar</option>
                                                                                            <option value="Andhra Pradesh" data-id="1">Andhra Pradesh</option>
                                                                                            <option value="Arunachal Pradesh" data-id="2">Arunachal Pradesh</option>
                                                                                            <option value="Assam" data-id="3">Assam</option>
                                                                                            <option value="Bihar" data-id="4">Bihar</option>
                                                                                            <option value="Chandigarh" data-id="5">Chandigarh</option>
                                                                                            <option value="Chhattisgarh" data-id="6">Chhattisgarh</option>
                                                                                            <option value="Daman and Diu" data-id="7">Daman and Diu</option>
                                                                                            <option value="Delhi" data-id="23">Delhi</option>
                                                                                            <option value="Goa" data-id="8">Goa</option>
                                                                                            <option value="Gujarat" data-id="9">Gujarat</option>
                                                                                            <option value="Haryana" data-id="10">Haryana</option>
                                                                                            <option value="Himachal Pradesh" data-id="11">Himachal Pradesh</option>
                                                                                            <option value="Jammu and Kashmir" data-id="12">Jammu and Kashmir</option>
                                                                                            <option value="Jharkhand" data-id="13">Jharkhand</option>
                                                                                            <option value="Karnataka" data-id="14">Karnataka</option>
                                                                                            <option value="Kerala" data-id="15">Kerala</option>
                                                                                            <option value="Lakshadweep" data-id="16">Lakshadweep</option>
                                                                                            <option value="Madhya Pradesh" data-id="17">Madhya Pradesh</option>
                                                                                            <option value="Maharashtra" data-id="18">Maharashtra</option>
                                                                                            <option value="Manipur" data-id="19">Manipur</option>
                                                                                            <option value="Meghalaya" data-id="20">Meghalaya</option>
                                                                                            <option value="Mizoram" data-id="21">Mizoram</option>
                                                                                            <option value="Nagaland" data-id="22">Nagaland</option>
                                                                                            <option value="Odisha" data-id="24">Odisha</option>
                                                                                            <option value="Pondicherry" data-id="25">Pondicherry</option>
                                                                                            <option value="Punjab" data-id="26">Punjab</option>
                                                                                            <option value="Rajasthan" data-id="27">Rajasthan</option>
                                                                                            <option value="Sikkim" data-id="28">Sikkim</option>
                                                                                            <option value="Tamil Nadu" data-id="29">Tamil Nadu</option>
                                                                                            <option value="Telangana" data-id="34">Telangana</option>
                                                                                            <option value="Tripura" data-id="30">Tripura</option>
                                                                                            <option value="Uttar Pradesh" data-id="32">Uttar Pradesh</option>
                                                                                            <option value="Uttarakhand" data-id="31">Uttarakhand</option>
                                                                                            <option value="West Bengal" data-id="33">West Bengal</option>
                                             
                                        </select>
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                         <select name="txtCity" class="form-control myselect" id="popupcity" required="">
                                            <option value="">Select City</option>
                                            <!-- <option value="delhi">delhi</option> -->
                                        </select>
                                    </div>
                                    <div class="f3">
                  <select type="text" placeholder="Select event date" id="eventdays" name="eventdays" class="form-control myselectclass3" accesskey="" onchange="checkNumbers();">
                     <option value="Saturday21stSeptember" selected="selected">Saturday, 21st September</option>
                            <option value="Sunday22ndSeptember">Sunday, 22nd September</option>
                            <option value="Bothdays2122September">Bothdays, 21st-22nd September</option>
                  </select>
                                    </div>
                                </div>

                            <div class="sec" style="text-align:center">
                                    <input type="submit" value="Register To Attend" name="btnSubmitReg" class="expo-submitnew">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>

<div class="modal modal-cust fade in" id="search-main" tabindex="-1" aria-labelledby="search-mainLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-cust">
            <div class="modal-content modal-content-cust"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <div class="modal-body modal-body-search-custom">
                    <div class="searchbox">
                        <form method="get" action="{{ url('category/search') }}"> 
                            <div class="input-group input-group-search-section-main">
                                <div class="awesomplete"><input type="text" class="form-control form-control-search-custom" name="text" placeholder="Search for business opportunities" id="dealer-bar-search-top" aria-describedby="basic-addon2" autocomplete="off" aria-expanded="false"
                                        aria-owns="awesomplete_list_1" role="combobox">
                                    <ul hidden="" role="listbox" id="awesomplete_list_1"></ul><span class="visually-hidden" role="status" aria-live="assertive" aria-atomic="true">Type 2 or more characters for results.</span></div><span class="input-group-addon input-group-addon-search-custom" id="basic-addon2"><button class="btn btn-group-sm btn-main bhide-main" id="seo-search-popup-icon"><svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg></button></span></div>
                        </form>
                    </div>
                    <div class="or-cat">
                        <h2>Or Explore By</h2>
                    </div>
                    <ul class="nav nav-tabs custom-nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#categories">Categories</a></li>
                        <li><a data-toggle="tab" href="#location">Location</a></li>
                        <li><a data-toggle="tab" href="#investment">Investment</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="categories" class="tab-pane tab-pane-main fade in active">
                            <form name="catform"class="form-horizontal" method="get"
                            action="{{ url('category/searchby') }}" onsubmit="return submitCategory()">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div class="form-group form-group-search-section-li">
                                                <input type="hidden" name="catTab" value="1">
                                                <select name="mc" id="getMainCategoryDataHeader1"
                                                    onchange="getSubCategoryHeader12(this.value)"
                                                    class="form-control form-control-search-main-custom">
                                                    <option value="" hidden>Select Industry</option>
                                                    @foreach ($catArr as $index => $value)
                                                        <option value="{{ $index }}"
                                                            slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                                            @if (isset($mc) && $index == $mc) selected @endif>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select name="sc" id="getSubCategoryDataHeader"
                                                    onchange="getSubCatCategoryHeader12(this.value)"
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    id="exampleFormControlSelect1">
                                                    <option value="" hidden>Select Sector</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    name="ssc" id="getSubCatCategoryDataHeader">
                                                    <option value="" hidden>Select Service / Product</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button
                                            class="btn btn-group-sm btn-main
                                 bhide-main bhide"
                                            id="top-cat-seo-btn-main-hero">
                                            Explore
                                        </button>
                                        <span class="clear">
                                            <a href="javascript:void(0)" onclick="catform.reset();">Clear All</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                        <div id="location" class="tab-pane tab-pane-main fade">
                            <form name="locform" class="form-horizontal" method="get"
                            action="{{ url('category/searchby') }}" onsubmit="return submitLocation()">
                            <input type="hidden" name="locTab" value="1">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    name="mc" id="getMainCategoryDataHeaderLoc"
                                                    required="required">
                                                    <option value="" hidden>Select Industry</option>
                                                    @foreach ($catArr as $index => $value)
                                                        <option value="{{ $index }}"
                                                            slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                                            @if (isset($mc) && $index == $mc) selected @endif>
                                                            {{ $value }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    name="loc" id="stateHeader" required
                                                    onchange="getcity(this.value)">
                                                    <option value="" hidden>Select State</option>
                                                    @foreach ($states as $index => $value)
                                                        <option value="{{ $index }}"
                                                            slug="{{ strtolower(Str::slug($value)) }}"
                                                            @if (isset($loc[0]) && $loc[0] == $index) selected @endif>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    id="headercity" name="city">
                                                    <option value="" hidden>Select a City</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button
                                            class="btn btn-group-sm btn-main
                                 bhide-main bhide"
                                            id="top-loc-seo-btn-main-hero">
                                            Explore
                                        </button>
                                        <span class="clear">
                                            <a href="javascript:void(0)" onclick="locform.reset();">Clear All</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                        <div id="investment" class="tab-pane tab-pane-main fade">
                            <form name="invform" id="invform_desktop" class="form-horizontal" method="get"
                            action="{{ url('category/searchby') }}" onsubmit="return submitInvestment()">
                            <input type="hidden" name="invTab" value="1">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select name="mc" id="getMainCategoryDataHeaderInv"
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    required="required">
                                                    <option value="" hidden>Select Industry</option>
                                                    @foreach ($catArr as $index => $value)
                                                        <option value="{{ $index }}"
                                                            slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                                            @if (isset($mc) && $index == $mc) selected @endif>
                                                            {!! $value !!}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select name="min_cost"
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    id="minAmount" required="required"
                                                    onchange="selectMax(this.value)">
                                                    <option hidden>Select Min Investment</option>
                                                    @foreach (Config('constants.investRangeInWordsSingle') as $index => $value)
                                                        <option
                                                            slug="{{ Config('constants.InvestRange')[$index]['min'] }}"
                                                            @if (isset($minCost)) @if ($minCost == $index) selected @endif
                                                            @endif
                                                            value="{{ $index }}">{{ $value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select name="max_cost"
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    id="maxAmount" required="required">
                                                    <option value="0"> Select Max Investment </option>

                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button
                                            class="btn btn-group-sm btn-main
                                 bhide-main bhide"
                                            id="top-inv-seo-btn-main-hero">
                                            Explore
                                        </button>
                                        <span class="clear">
                                            <a href="javascript:void(0)" onclick="customResetForm();">Clear All</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade lg-panel formsection in" id="login-pnl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <div class="frgt-pwd" id="frg-pnl" style="display:none">
                        <div class="ttl">Forgot Password</div>
                        <div class="desc">Enter your email address associated with your Franchiseindia account and we'll send you a link to reset your password.</div>
                        <div class="frm-pnl">
                            <form class="form-horizontal" method="POST" action="https://www.franchiseindia.com/password/email">
                                <div class="input-group"><span class="input-group-addon"><div class="usersprite"></div></span><input type="hidden" name="_token" value="99h71cGQGBzeEVUK02rQy5q5Yxm0vpYPxEcKy5VK" autocomplete="off"> <input id="email" type="email" class="form-control blur"
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
                                <form method="post" action="https://www.franchiseindia.com/loginform"><input type="hidden" name="_token" value="99h71cGQGBzeEVUK02rQy5q5Yxm0vpYPxEcKy5VK" autocomplete="off">
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
    </div>
    <script src="https://www.franchiseindia.com/js/jquery-3.1.1.min.js" defer></script>
<script src="https://www.franchiseindia.com/newhomepage/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="https://www.franchiseindia.com/newhomepage/assets/vendor/mCustomScrollbar/js/jquery.mCustomScrollbar.concat.min.js" defer></script>
<script src="https://www.franchiseindia.com/newhomepage/assets/vendor/swiper/js/swiper-bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        }), $("#dismiss, .overlay").on("click", function() {
            $("#sidebar").removeClass("active"), $(".overlay").removeClass("active")
        }), $("#sidebarCollapse").on("click", function() {
            $("#sidebar").addClass("active"), $(".overlay").addClass("active"), $(".collapse.in").toggleClass("in"), $("a[aria-expanded=true]").attr("aria-expanded", "false")
        })
    });
function getSubCategoryHeader12(value) {
        // console.log('i am called');
        $.ajax({
            type: 'GET',
            url: '{{ url('getsubcategory') }}',
            data: {
                categoryID: value
            },
            success: function(data) {
                $("#getSubCategoryDataHeader").html(data);
            }
        });
    };
function getSubCatCategoryHeader12(value) {
        // console.log('called');
        $.ajax({
            type: 'GET',
            url: '{{ url('getsubcatcategory') }}',
            data: {
                subcategoryID: value
            },
            success: function(data) {
                $("#getSubCatCategoryDataHeader").html(data);
            }
        });
    };
function getcity(value) {
        // console.log('yes');
        $.ajax({
            type: 'GET',
            url: '{{ url('getcitylist') }}',
            data: {
                state: value
            },
            success: function(data) {
                $("#headercity").html(data);
            }
        });
    };
function selectMax(selectmaxheaderval) {
        // console.log('yes');
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
document.addEventListener('DOMContentLoaded', function() {
        var mainCategorySelect = document.getElementById('getMainCategoryDataHeader');
        //console.log(mainCategorySelect);
        if (mainCategorySelect.value) {
            getSubCategoryHeader(mainCategorySelect.value);
        }
    });
function customResetForm() {
    let form = document.getElementById('invform_desktop');

    // Reset the form
    form.reset();

    // Reset maxAmount1 select element to its default state
    let maxAmount1 = document.getElementById('maxAmount');
    maxAmount1.innerHTML = '<option value="" hidden>Select Max Investment</option>';
};
function getSubCategoryHeader1(value) {
    // console.log('yes');
        $.ajax({
            type: 'GET',
            url: '{{ url('getsubcategory') }}',
            data: {
                categoryID: value
            },
            success: function(data) {
                $("#getSubCategoryDataHeader1").html(data);
            }
        });
    };
function getSubCatCategoryHeader1(value) {
        // console.log('yes');
        $.ajax({
            type: 'GET',
            url: '{{ url('getsubcatcategory') }}',
            data: {
                subcategoryID: value
            },
            success: function(data) {
                $("#getSubCatCategoryDataHeader1").html(data);
            }
        });
    };
function getcity1(value) {
        // console.log('yes');
        $.ajax({
            type: 'GET',
            url: '{{ url('getcitylist') }}',
            data: {
                state: value
            },
            success: function(data) {
                $("#headercity1").html(data);
            }
        });
    };
function selectMax1(selectmaxheaderval) {
        // console.log('yes');
        let amountConfigArr = {!! json_encode(Config('constants.investRangeInWordsSingle')) !!};
        let maxAmount = $('#maxAmount1');
        let getSlugAmount = {!! json_encode(Config('constants.InvestRange')) !!};
        maxAmount.html("");
        selectmaxheaderval = parseInt(selectmaxheaderval);
        $.each(amountConfigArr, function(key, value) {
            if (key > selectmaxheaderval)
                $('#maxAmount1').append($("<option></option>").attr({
                    "value": key,
                    "slug": getSlugAmount[key]['min']
                }).text(value));
        });
        if (selectmaxheaderval === 21)
            maxAmount.append($("<option></option>").attr("value", 21).text("Above"));
    }
</script>
<script type="text/javascript">
    if (screen.width > 1) {
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
    }
    $('#registerselect').click(function() {
        $('#registeractive').click();
    });
    $('#loginselect').click(function() {
        $('#loginactive').click();
    });
    $('#mobilereg').click(function() {
        $('#registeractive').click();
    });
    $("#changeLang").on('click', function() {
        $('#langType').slideToggle();
    })
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
</script>
<script type="text/javascript">
    var linkElement = document.createElement("link");
    linkElement.rel = "stylesheet";
    linkElement.href = "{{ url('css/font-awesome.minfresh.css') }}"; //Replace here
    document.head.appendChild(linkElement);
    const observer = lozad(); // lazy loads elements with default selector as '.lozad'
    observer.observe();
$(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100)
                $('#scroll').fadeIn();
            else
                $('#scroll').fadeOut();
        });
        $('#scroll').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
 $("#changeLang").on('click', function() {
            $('#langType').slideToggle();
        });
        $("#changeLang1").on('click', function() {
            $('#langType1').slideToggle();
        });
 let langType = Cookies.get('langType');
setTimeout(function() {
            Cookies.set('langType', 'english', {
                expires: 7
            });
        }, 20000);

        @include('includes.banners-new.footer-google-tags')
    });
function submitCategory() {
        var subSubCat = $('#getSubCatCategoryDataHeader').val();
        var subCat = $('#getSubCategoryDataHeader').val();
        var mainCat = $('#getMainCategoryDataHeader1').val();
        var url = '/business-opportunities/';
        if (subSubCat) {
            url = url + $('option:selected', $('#getSubCatCategoryDataHeader')).attr('slug') + '.ssc' + subSubCat +
                "?catTab=1";
        } else if (subCat) {
            url = url + $('option:selected', $('#getSubCategoryDataHeader')).attr('slug') + '.sc' + subCat +
                "?catTab=1";
        } else if (mainCat && typeof $('option:selected', $('#getMainCategoryDataHeader1')).attr('slug') !==
            "undefined") {
            url = url + $('option:selected', $('#getMainCategoryDataHeader1')).attr('slug') + '.m' + mainCat +
                "?catTab=1";
        } else {
            url = url + 'all/all';
        }
        //        window.location = url;
        window.open(url, '_blank');
        return false;
    }
function submitLocation() {
        var mainCat = $('#getMainCategoryDataHeaderLoc').val();
        var headerCity = $('#headercity').val();
        var stateHeader = $('#stateHeader').val();
        var mainCatText = $('option:selected', $('#getMainCategoryDataHeaderLoc')).attr('slug');
        var headerCityText = $('option:selected', $('#headercity')).attr('slug');
        var stateHeaderText = $('option:selected', $('#stateHeader')).attr('slug');
        var url = '/business-opportunities/';
        if (mainCat != '' && stateHeader != '' && headerCity != '') {
            url = url + mainCatText + "-in-" + stateHeaderText + "/mc-" + mainCat + "/loc-" + stateHeader + "/ct-" +
                headerCityText;
        } else if (mainCat != '' && stateHeader != '') {
            url = url + mainCatText + "-in-" + stateHeaderText + "/mc-" + mainCat + "/loc-" + stateHeader;
        } else if (stateHeader != '' && headerCity != '') {
            url = url + "business-in-" + stateHeaderText + "/loc-" + stateHeader + "/ct-" + headerCityText;
        } else if (stateHeader != '') {
            url = url + stateHeaderText + ".LOC" + stateHeader;
        } else {
            url = url + mainCat + ".m" + mainCatText;
        }
        //        window.location = url + "?locTab=1";
        window.open(url + "?locTab=1", '_blank');
        return false;
    }
function submitInvestment() {
        var mainCat = $('#getMainCategoryDataHeaderInv').val();
        var minAmount = $('#minAmount').val();
        var maxAmount = $('#maxAmount').val();
        var mainCatText = $('option:selected', $('#getMainCategoryDataHeaderInv')).attr('slug');
        var minAmountText = $('option:selected', $('#minAmount')).attr('slug');
        var maxAmountText = $('option:selected', $('#maxAmount')).attr('slug');
        var url = '/business-opportunities/';
        if (mainCat != '' && minAmount != '' && maxAmount != '') {
            url = url + mainCatText + "-in-india/mc-" + mainCat + "/range-" + minAmountText + "-" + maxAmountText;
        } else if (mainCat != '' && minAmount != '') {
            url = url + mainCatText + "-in-india/mc-" + mainCat + "/range-" + minAmountText;
        } else if (minAmount != '' && maxAmount != '') {
            url = url + "business/range-" + minAmountText + "-" + maxAmountText;
        }
        //        window.location = url + "?invTab=1";
        window.open(url + "?invTab=1", '_blank');
        return false;
    }
</script>
<script defer>
    //Awesomplete
    const input = document.getElementById("dealer-bar-search-top");
// Init awesomplete
    const awesomplete = new Awesomplete(input);
    const navBarSearch = $("#dealer-bar-search-top");
    //navBarSearch.keypress(function () {
    navBarSearch.on("keypress keyup keypress blur change", function() {
        var search_keyword = $(this).val();
        // Check if atleast 2 chars are typed
        if (search_keyword.length >= 2) {
            $.ajax({
                url: "/dealers-search/" + search_keyword,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    prepareList(JSON.parse(JSON.stringify(response)));
                },
                error: function(err) {
                    console.log(err);
                },
            });
        }
    });
function prepareList(list) {
        var c_list = [];

        list.forEach((item) => {
            c_list.push(item.name);
        });
 // Assigned the c_list to the list property of Awesomplete instance
        awesomplete.list = c_list;
    }
 navBarSearch.on("awesomplete-selectcomplete", function() {
        if ($("#dealer-bar-search-top").val() != "") {
            var value = $("#dealer-bar-search-top").val();
            var items = value.split(" - <strong> in");
            if (items.length > 1) value = items[0];
            window.location.href = "/dealers-india/search/" + value;
        }
    });
 $("#textcompany").on("click", function() {
        if ($("#dealer-bar-search").val() != "") {
            var value = $("#dealer-bar-search-top").val();
            var items = value.split(" - <strong> in");
            if (items.length > 1) value = items[0];
            window.location.href = "/dealers-india/search/" + value;
        }
    });
</script>
<script defer>
    $(document).ready(function() {
        var l = $(".js-select2");
        l.select2({
            closeOnSelect: !1,
            placeholder: "Select 5 Preferred Cities",
            maximumSelectionLength: 5,
            allowClear: !0,
            tags: !0
        }), l.on("select2:select", function(e) {
            var t = l.val();
            t && 5 < t.length && (alert("You can select only 5 preferred cities."), $(e.params.data.element).prop("selected", !1), l.trigger("change"))
        }), l.on("select2:unselect", function(e) {})
    })
</script>
<script defer>
    $(document).ready(function(e) {
        e("#myCarouselvideo").carousel({
            pause: !0,
            interval: !1
        })
    })
</script>
<script defer>
    var swiper = new Swiper(".trendvideo .swiper-container", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: !0,
        autoplay: !1,
        pagination: {
            el: ".trendvideo .swiper-pagination",
            clickable: !0
        },
        navigation: {
            nextEl: ".trendvideo .swiper-button-next",
            prevEl: ".trendvideo .swiper-button-prev"
        },
        keyboard: {
            enabled: !0,
            onlyInViewport: !0
        },
        breakpoints: {
            350: {
                slidesPerView: 1.5,
                spaceBetween: 0
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            1024: {
                slidesPerView: 1,
                spaceBetween: 0
            }
        }
    })
</script>
<script type="text/javascript" defer>
    var swiper = new Swiper(".testimonial .swiper-container", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: !0,
        autoplay: !1,
        pagination: {
            el: ".testimonial .swiper-pagination",
            clickable: !0
        },
        navigation: {
            nextEl: ".testimonial .swiper-button-next",
            prevEl: ".testimonial .swiper-button-prev"
        },
        keyboard: {
            enabled: !0,
            onlyInViewport: !0
        },
        breakpoints: {
            350: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            1024: {
                slidesPerView: 1,
                spaceBetween: 0
            }
        }
    })
</script>
<script defer>
    var swiper = new Swiper(".eventblk .swiper-container", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: !0,
        autoplay: !1,
        pagination: {
            el: ".eventblk .swiper-pagination",
            clickable: !0
        },
        navigation: {
            nextEl: ".eventblk .swiper-button-next",
            prevEl: ".eventblk .swiper-button-prev"
        },
        keyboard: {
            enabled: !0,
            onlyInViewport: !0
        },
        breakpoints: {
            350: {
                slidesPerView: 1.5,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 0
            },
            993: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            1024: {
                slidesPerView: 1,
                spaceBetween: 0
            }
        }
    })
</script>
<script>
    function setCookie() {
        document.cookie = "accept_cookie=ok";
        $('#cookie').hide();
        const d = new Date();
        d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        console.log(expires);
        document.cookie = "username=cookie_user;" + expires + ";path=/";
    }
function getCookie() {
        return checkCookie('accept_cookie');
    }
 function checkCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
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
    $(document).ready(function() {
        var cookie = getCookie();
        if (cookie == 'ok') {
            $('#cookie').hide();
        } else {
            $('#cookie').show();
        }
    });
</script>
    <script src="https://www.franchiseindia.com/newhomepage/assets/vendor/fontawesome/js/solid.js"></script>
    <script src="https://www.franchiseindia.com/newhomepage/assets/vendor/fontawesome/js/fontawesome.js"></script>
<div class="mycss">
    <link rel="stylesheet" href="{{ url('cvw/footer.css')}}" rel="preload" as="style">
    <link rel="stylesheet" href="{{ url('cvw/search-main.css')}}" rel="preload" as="style">
    <link rel="stylesheet" href="{{ url('cvw/login-panel.css')}}" rel="preload" as="style">
    <link rel="stylesheet" href="{{ url('cvw/home-newsletter.css')}}" rel="preload" as="style">
    <link rel="stylesheet" href="{{ url('cvw/card.css')}}">
    <link rel="stylesheet" href="{{ url('cvw/leading-franchise.css')}}">
    <link rel="stylesheet" href="{{ url('cvw/top-business.css')}}">
    <link rel="stylesheet" href="{{ url('cvw/top-dealership.css')}}" rel="preload" as="style">
    <link rel="stylesheet" href="{{ url('cvw/business-for-sale.css')}}" rel="preload" as="style">
    <link rel="stylesheet" href="{{ url('cvw/trending-videos.css')}}" rel="preload" as="style">
    <link rel="stylesheet" href="{{ url('cvw/event.css')}}" as="style" rel="preload">
    <link rel="stylesheet" href="{{ url('cvw/top-international.css')}}" rel="preload" as="style">
    <link rel="stylesheet" href="{{ url('cvw/potential-startup.css')}}" rel="preload" as="style">
    <link rel="stylesheet" href="{{ url('cvw/top-franchise-opportunities.css')}}" rel="preload" as="style">
    <link rel="stylesheet" href="{{ url('cvw/featured-franchise-opportunities.css')}}" rel="preload" as="style">
    <link rel="stylesheet" href="{{ url('cvw/news-section.css')}}" rel="preload" as="style">
    <link rel="stylesheet" href="{{ url('cvw/testimonial.css')}}" rel="preload" as="style">
</div>



</body>
</html>