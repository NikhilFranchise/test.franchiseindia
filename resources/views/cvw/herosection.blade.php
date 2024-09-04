@php
    use Illuminate\support\Str;
    $catArr = Config('constants.CategoryArr');
    asort($catArr);
    $states = Config('location.stateArr');
    asort($states);
    $loginUrl = Config('constants.MainDomain') . '/loginform';
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
@if (request()->segment(1) == 'hi')
<section class="hero-section" id="hero-section">
    <img src="{{ url('cvw/assets/img/mobile-banner-expo.webp') }}" class="banner-expo mmdesk" alt="Franchise India">
    <picture class="ppdesk">
        <source media="(min-width: 1024px)" srcset="{{ url('cvw/assets/img/banner-expo.webp') }}" alt="Franchsie India">
        <source media="(min-width: 650px)" srcset="{{ url('cvw/assets/img/mobile-banner-expo.webp') }}"
            alt="Franchsie India">
        <source media="(min-width: 320px)" srcset="{{ url('cvw/assets/img/mobile-banner-expo.webp') }}"
            alt="Franchsie India">
        <img src="{{ url('cvw/assets/img/banner-expo.webp') }}" alt="Franchise India" class="banner-expo">
    </picture>
    <div class="container">
        <div class="lnkblk"><a href="https://www.franchiseindia.com/brands/direct-english.78387" target="_blank"
                class="setpat"><img src="https://www.franchiseindia.com/newhomepage/assets/img/direct-english.png"
                    width="300" alt="Direct English" height="76"></a></div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="hero-desktop"><span>20 हजार से अधिक  </span> कारोबारी विक्लपों में अपने लिए तलाश करें</h1>
                
                <h2>दुनियाभर में सबसे अधिक तलाश किया जाने वाला फ्रैंचाइज वेबसाइट नेटवर्क।</h2>
            </div> 
            <div class="col-md-12">
                <div class="hero-search" id="hero-search">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#categories1" aria-controls="categories1" role="tab"
                                data-toggle="tab">Categories</a></li>
                        <li><a href="#location1" aria-controls="location1" role="tab" data-toggle="tab">Location</a>
                        </li>
                        <li><a href="#investment1" aria-controls="investment1" role="tab"
                                data-toggle="tab">Investment</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="categories1" class="tab-pane fade in active">
                            <form class="form-horizontal" method="get" action="{{ url('category/searchby') }}"
                                onsubmit="return submitCategory1()"><input type="hidden" name="catTab" value="1">
                                <ul class="hero-search-main">
                                    <li class="p-0 m-0"><select name="mc"
                                            class="form-control form-control-custom dropdown-toogle-icon"
                                            id="getMainCategoryDataHeader1"
                                            onchange="getSubCategoryHeader1(this.value)">
                                            <option value="" hidden="">Select Industry</option>
                                            <option value="8" slug="automotive">Automotive</option>
                                            <option value="1" slug="beauty-and-health">Beauty &amp; Health</option>
                                            <option value="6" slug="business-services">Business Services</option>
                                            <option value="5" slug="dealers-and-distributors">Dealers &amp;
                                                Distributors</option>
                                            <option value="3" slug="education">Education</option>
                                            <option value="10" slug="fashion">Fashion</option>
                                            <option value="2" slug="food-and-beverage">Food And Beverage</option>
                                            <option value="7" slug="home-based-business">Home Based Business
                                            </option>
                                            <option value="263" slug="hotels-and-resorts">Hotel, Travel &amp; Tourism
                                            </option>
                                            <option value="9" slug="retail">Retail</option>
                                            <option value="11" slug="sports-fitness-and-entertainment">Sports,
                                                Fitness &amp; Entertainment</option>
                                        </select></li>
                                    <li class="p-0 m-0"><select name="sc" id="getSubCategoryDataHeader1"
                                            onchange="getSubCatCategoryHeader1(this.value)"
                                            class="form-control form-control-custom dropdown-toogle-icon">
                                            <option value="" hidden="">Select Sector</option>
                                        </select></li>
                                    <li class="p-0 m-0"><select
                                            class="form-control form-control-custom dropdown-toogle-icon" name="ssc"
                                            id="getSubCatCategoryDataHeader1">
                                            <option value="" hidden="">Select Service/Product</option>
                                        </select></li>
                                    <li class="p-0 m-0"><button type="submit" class="btn btn-main btn-main-hero"
                                            id="seo-hero-inv-btn"><i class="search-icon fa fa-search"
                                                aria-hidden="true"></i><span class="smobile">Search</span></button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <div id="location1" class="tab-pane fade">
                            <form class="form-horizontal" method="get" action="{{ url('category/searchby') }}"
                                onsubmit="return submitLocation1()"><input type="hidden" name="locTab"
                                    value="1">
                                <ul class="hero-search-main">
                                    <li class="p-0 m-0"><select
                                            class="form-control form-control-custom dropdown-toogle-icon"
                                            name="mc" id="getMainCategoryDataHeaderLoc1">
                                            <option value="" hidden="">Select Industry</option>
                                            <option value="8" slug="automotive">Automotive</option>
                                            <option value="1" slug="beauty-and-health">Beauty &amp; Health
                                            </option>
                                            <option value="6" slug="business-services">Business Services</option>
                                            <option value="5" slug="dealers-and-distributors">Dealers &amp;
                                                Distributors</option>
                                            <option value="3" slug="education">Education</option>
                                            <option value="10" slug="fashion">Fashion</option>
                                            <option value="2" slug="food-and-beverage">Food And Beverage</option>
                                            <option value="7" slug="home-based-business">Home Based Business
                                            </option>
                                            <option value="263" slug="hotels-and-resorts">Hotel, Travel &amp;
                                                Tourism</option>
                                            <option value="9" slug="retail">Retail</option>
                                            <option value="11" slug="sports-fitness-and-entertainment">Sports,
                                                Fitness &amp; Entertainment</option>
                                        </select></li>
                                    <li class="p-0 m-0"><select name="loc" id="stateHeader1"
                                            class="form-control form-control-custom dropdown-toogle-icon"
                                            onchange="getcity1(this.value)">
                                            <option value="" hidden="">Select a State</option>
                                            <option value="35" slug="andaman-and-nicobar">Andaman and Nicobar
                                            </option>
                                            <option value="1" slug="andhra-pradesh">Andhra Pradesh</option>
                                            <option value="2" slug="arunachal-pradesh">Arunachal Pradesh</option>
                                            <option value="3" slug="assam">Assam</option>
                                            <option value="4" slug="bihar">Bihar</option>
                                            <option value="5" slug="chandigarh">Chandigarh</option>
                                            <option value="6" slug="chhattisgarh">Chhattisgarh</option>
                                            <option value="7" slug="daman-and-diu">Daman and Diu</option>
                                            <option value="23" slug="delhi">Delhi</option>
                                            <option value="8" slug="goa">Goa</option>
                                            <option value="9" slug="gujarat">Gujarat</option>
                                            <option value="10" slug="haryana">Haryana</option>
                                            <option value="11" slug="himachal-pradesh">Himachal Pradesh</option>
                                            <option value="12" slug="jammu-and-kashmir">Jammu and Kashmir</option>
                                            <option value="13" slug="jharkhand">Jharkhand</option>
                                            <option value="14" slug="karnataka">Karnataka</option>
                                            <option value="15" slug="kerala">Kerala</option>
                                            <option value="16" slug="lakshadweep">Lakshadweep</option>
                                            <option value="17" slug="madhya-pradesh">Madhya Pradesh</option>
                                            <option value="18" slug="maharashtra">Maharashtra</option>
                                            <option value="19" slug="manipur">Manipur</option>
                                            <option value="20" slug="meghalaya">Meghalaya</option>
                                            <option value="21" slug="mizoram">Mizoram</option>
                                            <option value="22" slug="nagaland">Nagaland</option>
                                            <option value="24" slug="odisha">Odisha</option>
                                            <option value="25" slug="pondicherry">Pondicherry</option>
                                            <option value="26" slug="punjab">Punjab</option>
                                            <option value="27" slug="rajasthan">Rajasthan</option>
                                            <option value="28" slug="sikkim">Sikkim</option>
                                            <option value="29" slug="tamil-nadu">Tamil Nadu</option>
                                            <option value="34" slug="telangana">Telangana</option>
                                            <option value="30" slug="tripura">Tripura</option>
                                            <option value="32" slug="uttar-pradesh">Uttar Pradesh</option>
                                            <option value="31" slug="uttarakhand">Uttarakhand</option>
                                            <option value="33" slug="west-bengal">West Bengal</option>
                                        </select></li>
                                    <li class="p-0 m-0"><select name="city"
                                            class="form-control form-control-custom dropdown-toogle-icon"
                                            id="headercity1">
                                            <option value="" hidden="">Select a City</option>
                                        </select></li>
                                    <li class="p-0 m-0"><button type="submit" class="btn btn-main btn-main-hero"
                                            id="seo-hero-loc-btn"><i class="search-icon fa fa-search"
                                                aria-hidden="true"></i><span class="smobile">Search</span></button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <div id="investment1" class="tab-pane fade">
                            <form class="form-horizontal" method="get" action="{{ url('category/searchby') }}"
                                onsubmit="return submitInvestment1()"><input type="hidden" name="invTab"
                                    value="1">
                                <ul class="hero-search-main">
                                    <li class="p-0 m-0"><select name="mc" id="getMainCategoryDataHeaderInv1"
                                            class="form-control form-control-custom dropdown-toogle-icon">
                                            <option value="" hidden="">Select Industry</option>
                                            <option value="8" slug="automotive">Automotive</option>
                                            <option value="1" slug="beauty-and-health">Beauty &amp; Health
                                            </option>
                                            <option value="6" slug="business-services">Business Services</option>
                                            <option value="5" slug="dealers-and-distributors">Dealers &amp;
                                                Distributors</option>
                                            <option value="3" slug="education">Education</option>
                                            <option value="10" slug="fashion">Fashion</option>
                                            <option value="2" slug="food-and-beverage">Food And Beverage</option>
                                            <option value="7" slug="home-based-business">Home Based Business
                                            </option>
                                            <option value="263" slug="hotels-and-resorts">Hotel, Travel &amp;
                                                Tourism</option>
                                            <option value="9" slug="retail">Retail</option>
                                            <option value="11" slug="sports-fitness-and-entertainment">Sports,
                                                Fitness &amp; Entertainment</option>
                                        </select></li>
                                    <li class="p-0 m-0"><select name="min_cost"
                                            class="form-control form-control-custom dropdown-toogle-icon"
                                            id="minAmount1" onchange="selectMax1(this.value)">
                                            <option value="" hidden="">Select Min Investment</option>
                                            <option slug="10000" value="1">Rs. 10000</option>
                                            <option slug="50000" value="3">Rs. 50000</option>
                                            <option slug="200000" value="5">Rs. 2lakh</option>
                                            <option slug="500000" value="7">Rs. 5lakh</option>
                                            <option slug="1000000" value="9">Rs. 10lakh</option>
                                            <option slug="2000000" value="11">Rs. 20lakh</option>
                                            <option slug="3000000" value="13">Rs. 30lakh</option>
                                            <option slug="5000000" value="15">Rs. 50lakh</option>
                                            <option slug="10000000" value="17">Rs. 1 Cr.</option>
                                            <option slug="20000000" value="19">Rs. 2 Cr.</option>
                                            <option slug="50000000" value="21">Rs. 5 Cr.</option>
                                        </select></li>
                                    <li class="p-0 m-0"><select name="max_cost"
                                            class="form-control form-control-custom dropdown-toogle-icon"
                                            id="maxAmount1">
                                            <option value="" hidden="">Select Max Investment</option>
                                        </select></li>
                                    <li class="p-0 m-0"><button type="submit" class="btn btn-main btn-main-hero"
                                            id="seo-hero-inv-btn"><i class="search-icon fa fa-search"
                                                aria-hidden="true"></i><span class="smobile">Search</span></button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@else
<section class="hero-section" id="hero-section">
    <img src="{{ url('cvw/assets/img/mobile-banner-expo.webp') }}" class="banner-expo mmdesk" alt="Franchise India"> 
    <picture class="ppdesk">
        <source media="(min-width: 1024px)" srcset="{{ url('cvw/assets/img/banner-expo.webp') }}" alt="Franchsie India">
        <source media="(min-width: 650px)" srcset="{{ url('cvw/assets/img/mobile-banner-expo.webp') }}"
            alt="Franchsie India">
        <source media="(min-width: 320px)" srcset="{{ url('cvw/assets/img/mobile-banner-expo.webp') }}"
            alt="Franchsie India">
        <img src="{{ url('cvw/assets/img/banner-expo.webp') }}" alt="Franchise India" class="banner-expo">
    </picture>
    <div class="container">
        <div class="lnkblk"><a href="https://www.franchiseindia.com/brands/direct-english.78387" target="_blank"
                class="setpat"><img src="https://www.franchiseindia.com/newhomepage/assets/img/direct-english.png"
                    width="300" alt="Direct English" height="76"></a></div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="hero-desktop">Search from<span> 20000+ Business </span>options</h1>
                <h1 class="hero-mobile">20000+ Business Options</h1>
                <h2>World's highest visited franchise website network</h2>
            </div> 
            <div class="col-md-12">
                <div class="hero-search" id="hero-search">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#categories1" aria-controls="categories1" role="tab"
                                data-toggle="tab">Categories</a></li>
                        <li><a href="#location1" aria-controls="location1" role="tab" data-toggle="tab">Location</a>
                        </li>
                        <li><a href="#investment1" aria-controls="investment1" role="tab"
                                data-toggle="tab">Investment</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="categories1" class="tab-pane fade in active">
                            <form class="form-horizontal" method="get" action="{{ url('category/searchby') }}"
                                onsubmit="return submitCategory1()"><input type="hidden" name="catTab" value="1">
                                <ul class="hero-search-main">
                                    <li class="p-0 m-0">
            <select name="mc" aria-label="Select Industry" class="form-control form-control-custom dropdown-toogle-icon"
                                            id="getMainCategoryDataHeader1"
                                            onchange="getSubCategoryHeader1(this.value)">
                                            <option value="" hidden="">Select Industry</option>
                                            <option value="8" slug="automotive">Automotive</option>
                                            <option value="1" slug="beauty-and-health">Beauty &amp; Health</option>
                                            <option value="6" slug="business-services">Business Services</option>
                                            <option value="5" slug="dealers-and-distributors">Dealers &amp;
                                                Distributors</option>
                                            <option value="3" slug="education">Education</option>
                                            <option value="10" slug="fashion">Fashion</option>
                                            <option value="2" slug="food-and-beverage">Food And Beverage</option>
                                            <option value="7" slug="home-based-business">Home Based Business
                                            </option>
                                            <option value="263" slug="hotels-and-resorts">Hotel, Travel &amp; Tourism
                                            </option>
                                            <option value="9" slug="retail">Retail</option>
                                            <option value="11" slug="sports-fitness-and-entertainment">Sports,
                                                Fitness &amp; Entertainment</option>
                                        </select></li>
                                    <li class="p-0 m-0">
                        <select aria-label="Select Sector" name="sc" id="getSubCategoryDataHeader1"
                                            onchange="getSubCatCategoryHeader1(this.value)"
                                            class="form-control form-control-custom dropdown-toogle-icon">
                                            <option value="" hidden="">Select Sector</option>
                                        </select></li>
                                    <li class="p-0 m-0"><select
                                            class="form-control form-control-custom dropdown-toogle-icon" name="ssc"
                                            id="getSubCatCategoryDataHeader1" aria-label="Select Service">
                                            <option value="" hidden="">Select Service/Product</option>
                                        </select></li>
                                    <li class="p-0 m-0"><button type="submit" class="btn btn-main btn-main-hero"
                                            id="seo-hero-inv-btn" aria-label="Submit Brand Search"><i class="search-icon fa fa-search"
                                                aria-hidden="true"></i><span class="smobile">Search</span></button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <div id="location1" class="tab-pane fade">
                            <form class="form-horizontal" method="get" action="{{ url('category/searchby') }}"
                                onsubmit="return submitLocation1()"><input type="hidden" name="locTab"
                                    value="1">
                                <ul class="hero-search-main">
                                    <li class="p-0 m-0">
                    <select aria-label="Select Industry" class="form-control form-control-custom dropdown-toogle-icon"
                                            name="mc" id="getMainCategoryDataHeaderLoc1">
                                            <option value="" hidden="">Select Industry</option>
                                            <option value="8" slug="automotive">Automotive</option>
                                            <option value="1" slug="beauty-and-health">Beauty &amp; Health
                                            </option>
                                            <option value="6" slug="business-services">Business Services</option>
                                            <option value="5" slug="dealers-and-distributors">Dealers &amp;
                                                Distributors</option>
                                            <option value="3" slug="education">Education</option>
                                            <option value="10" slug="fashion">Fashion</option>
                                            <option value="2" slug="food-and-beverage">Food And Beverage</option>
                                            <option value="7" slug="home-based-business">Home Based Business
                                            </option>
                                            <option value="263" slug="hotels-and-resorts">Hotel, Travel &amp;
                                                Tourism</option>
                                            <option value="9" slug="retail">Retail</option>
                                            <option value="11" slug="sports-fitness-and-entertainment">Sports,
                                                Fitness &amp; Entertainment</option>
                                        </select></li>
                                    <li class="p-0 m-0"><select name="loc" id="stateHeader1"
                                            class="form-control form-control-custom dropdown-toogle-icon"
                                            onchange="getcity1(this.value)" aria-label="Select State">
                                            <option value="" hidden="">Select a State</option>
                                            <option value="35" slug="andaman-and-nicobar">Andaman and Nicobar
                                            </option>
                                            <option value="1" slug="andhra-pradesh">Andhra Pradesh</option>
                                            <option value="2" slug="arunachal-pradesh">Arunachal Pradesh</option>
                                            <option value="3" slug="assam">Assam</option>
                                            <option value="4" slug="bihar">Bihar</option>
                                            <option value="5" slug="chandigarh">Chandigarh</option>
                                            <option value="6" slug="chhattisgarh">Chhattisgarh</option>
                                            <option value="7" slug="daman-and-diu">Daman and Diu</option>
                                            <option value="23" slug="delhi">Delhi</option>
                                            <option value="8" slug="goa">Goa</option>
                                            <option value="9" slug="gujarat">Gujarat</option>
                                            <option value="10" slug="haryana">Haryana</option>
                                            <option value="11" slug="himachal-pradesh">Himachal Pradesh</option>
                                            <option value="12" slug="jammu-and-kashmir">Jammu and Kashmir</option>
                                            <option value="13" slug="jharkhand">Jharkhand</option>
                                            <option value="14" slug="karnataka">Karnataka</option>
                                            <option value="15" slug="kerala">Kerala</option>
                                            <option value="16" slug="lakshadweep">Lakshadweep</option>
                                            <option value="17" slug="madhya-pradesh">Madhya Pradesh</option>
                                            <option value="18" slug="maharashtra">Maharashtra</option>
                                            <option value="19" slug="manipur">Manipur</option>
                                            <option value="20" slug="meghalaya">Meghalaya</option>
                                            <option value="21" slug="mizoram">Mizoram</option>
                                            <option value="22" slug="nagaland">Nagaland</option>
                                            <option value="24" slug="odisha">Odisha</option>
                                            <option value="25" slug="pondicherry">Pondicherry</option>
                                            <option value="26" slug="punjab">Punjab</option>
                                            <option value="27" slug="rajasthan">Rajasthan</option>
                                            <option value="28" slug="sikkim">Sikkim</option>
                                            <option value="29" slug="tamil-nadu">Tamil Nadu</option>
                                            <option value="34" slug="telangana">Telangana</option>
                                            <option value="30" slug="tripura">Tripura</option>
                                            <option value="32" slug="uttar-pradesh">Uttar Pradesh</option>
                                            <option value="31" slug="uttarakhand">Uttarakhand</option>
                                            <option value="33" slug="west-bengal">West Bengal</option>
                                        </select></li>
                                    <li class="p-0 m-0">
                        <select name="city" class="form-control form-control-custom dropdown-toogle-icon"
                                            id="headercity1" aria-label="Select Service">
                                            <option value="" hidden="">Select a City</option>
                                        </select></li>
                                    <li class="p-0 m-0"><button type="submit" class="btn btn-main btn-main-hero"
                                            id="seo-hero-loc-btn"><i class="search-icon fa fa-search"
                                                aria-hidden="true"></i><span class="smobile">Search</span></button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <div id="investment1" class="tab-pane fade">
                            <form class="form-horizontal" method="get" action="{{ url('category/searchby') }}"
                                onsubmit="return submitInvestment1()"><input type="hidden" name="invTab"
                                    value="1">
                                <ul class="hero-search-main">
                                    <li class="p-0 m-0">
                                        
                                        <select name="mc" aria-label="Select Industry" id="getMainCategoryDataHeaderInv1"
                                            class="form-control form-control-custom dropdown-toogle-icon">
                                            <option value="" hidden="">Select Industry</option>
                                            <option value="8" slug="automotive">Automotive</option>
                                            <option value="1" slug="beauty-and-health">Beauty &amp; Health
                                            </option>
                                            <option value="6" slug="business-services">Business Services</option>
                                            <option value="5" slug="dealers-and-distributors">Dealers &amp;
                                                Distributors</option>
                                            <option value="3" slug="education">Education</option>
                                            <option value="10" slug="fashion">Fashion</option>
                                            <option value="2" slug="food-and-beverage">Food And Beverage</option>
                                            <option value="7" slug="home-based-business">Home Based Business
                                            </option>
                                            <option value="263" slug="hotels-and-resorts">Hotel, Travel &amp;
                                                Tourism</option>
                                            <option value="9" slug="retail">Retail</option>
                                            <option value="11" slug="sports-fitness-and-entertainment">Sports,
                                                Fitness &amp; Entertainment</option>
                                        </select></li>
                                    <li class="p-0 m-0">
                <select name="min_cost" aria-label="Select Min Investment" class="form-control form-control-custom dropdown-toogle-icon"
                                            id="minAmount1" onchange="selectMax1(this.value)">
                                            <option value="" hidden="">Select Min Investment</option>
                                            <option slug="10000" value="1">Rs. 10000</option>
                                            <option slug="50000" value="3">Rs. 50000</option>
                                            <option slug="200000" value="5">Rs. 2lakh</option>
                                            <option slug="500000" value="7">Rs. 5lakh</option>
                                            <option slug="1000000" value="9">Rs. 10lakh</option>
                                            <option slug="2000000" value="11">Rs. 20lakh</option>
                                            <option slug="3000000" value="13">Rs. 30lakh</option>
                                            <option slug="5000000" value="15">Rs. 50lakh</option>
                                            <option slug="10000000" value="17">Rs. 1 Cr.</option>
                                            <option slug="20000000" value="19">Rs. 2 Cr.</option>
                                            <option slug="50000000" value="21">Rs. 5 Cr.</option>
                                        </select></li>
                                    <li class="p-0 m-0">
                <select name="max_cost" aria-label="Select Max Investment" class="form-control form-control-custom dropdown-toogle-icon"
                                            id="maxAmount1">
                                            <option value="" hidden="">Select Max Investment</option>
                                        </select></li>
                                    <li class="p-0 m-0"><button type="submit" class="btn btn-main btn-main-hero"
                                            id="seo-hero-inv-btn"><i class="search-icon fa fa-search"
                                                aria-hidden="true"></i><span class="smobile">Search</span></button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

