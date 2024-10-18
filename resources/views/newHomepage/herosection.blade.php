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
    if (request()->segment(1) === 'brands' || (request()->segment(2) === 'hi' && request()->segment(2) === 'brands')) {
        $barndStick = 1;
    }
    $eduUrlSelected = '';
    $wellUrlSelected = '';
    $dotUrlSelected = '';
    $logo = 'logo-black.svg';
    $menuicon = 'menu-icon.png';
    $logoClass = 'logo';
    $mainUrl = '';
    $webtitleUrl = request()->segment(2);
    $mangecls = '';
    if ($webtitleUrl == 'content') {
        $dotUrlSelected = 'class=dropactive';
    }

@endphp
@if (request()->segment(1) == 'hi')
    <section class="hero-section" id="hero-section">
        <img src="{{ url('cvw/assets/img/mobile-banner-expo.webp') }}" class="banner-expo mmdesk" alt="Franchise India">
        <picture class="ppdesk">
            <source media="(min-width: 1024px)" srcset="{{ url('cvw/assets/img/banner-expo.webp') }}"
                alt="Franchsie India">
            <source media="(min-width: 650px)" srcset="{{ url('cvw/assets/img/mobile-banner-expo.webp') }}"
                alt="Franchsie India">
            <source media="(min-width: 320px)" srcset="{{ url('cvw/assets/img/mobile-banner-expo.webp') }}"
                alt="Franchsie India">
            <img src="{{ url('cvw/assets/img/banner-expo.webp') }}" alt="Franchise India" class="banner-expo">
        </picture>
        <div class="container">
            <div class="lnkblk"><a href="https://www.franchiseindia.com/brands/easygym.95394" target="_blank"
                    class="setpat"><img src="https://www.franchiseindia.com/newhomepage/assets/img/easygym.png"
                        width="300" alt="easy gym" height="76"></a></div>
            <div class="row">
                <div class="col-md-12">
                    @notmobile
                        <h1 class="hero-desktop"><span>15 हजार से अधिक </span> कारोबारी विक्लपों में अपने लिए तलाश करें</h1>
                    @endnotmobile

                    <h2>दुनियाभर में सबसे अधिक तलाश किया जाने वाला फ्रैंचाइज वेबसाइट नेटवर्क।</h2>
                </div>
                <div class="col-md-12">
                    <div class="hero-search" id="hero-search">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active nav-item" role="presentation"><a href="#categories1"
                                    aria-controls="categories1" role="tab" data-toggle="tab">कैटेगरी</a></li>
                            <li class="nav-item" role="presentation"><a href="#location1" aria-controls="location1"
                                    role="tab" data-toggle="tab">लोकेशन</a>
                            </li>
                            <li class="nav-item" role="presentation"><a href="#investment1" aria-controls="investment1"
                                    role="tab" data-toggle="tab">निवेश</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="categories1" class="tab-pane fade in active">
                                <form class="form-horizontal" method="get" action="{{ url('category/searchby') }}"
                                    onsubmit="return submitCategory1()"><input type="hidden" name="catTab"
                                        value="1">
                                    <ul class="hero-search-main">
                                        <li class="p-0 m-0"><select name="mc"
                                                class="form-control form-control-custom dropdown-toogle-icon"
                                                id="getMainCategoryDataHeader1"
                                                onchange="getSubCategoryHeader1(this.value)">
                                                <option value="" hidden="">Select Industry</option>
                                                @foreach ($catArr as $index => $value)
                                                    <option value="{{ $index }}"
                                                        slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                                        @if (isset($mc) && $index == $mc) selected @endif>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select></li>
                                        <li class="p-0 m-0"><select name="sc" id="getSubCategoryDataHeader1"
                                                onchange="getSubCatCategoryHeader1(this.value)"
                                                class="form-control form-control-custom dropdown-toogle-icon">
                                                <option value="" hidden="">Select Sector</option>
                                            </select></li>
                                        <li class="p-0 m-0"><select
                                                class="form-control form-control-custom dropdown-toogle-icon"
                                                name="ssc" id="getSubCatCategoryDataHeader1">
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
                                                @foreach ($catArr as $index => $value)
                                                    <option value="{{ $index }}"
                                                        slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                                        @if (isset($mc) && $index == $mc) selected @endif>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select></li>
                                        <li class="p-0 m-0"><select name="loc" id="stateHeader1"
                                                class="form-control form-control-custom dropdown-toogle-icon"
                                                onchange="getcity1(this.value)">
                                                <option value="" hidden="">Select a State</option>
                                                @foreach ($states as $index => $value)
                                                    <option value="{{ $index }}"
                                                        slug="{{ strtolower(Str::slug($value)) }}"
                                                        @if (isset($loc[0]) && $loc[0] == $index) selected @endif>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select></li>
                                        <li class="p-0 m-0"><select name="city"
                                                class="form-control form-control-custom dropdown-toogle-icon"
                                                id="headercity1">
                                                <option value="" hidden="">Select a City</option>
                                            </select></li>
                                        <li class="p-0 m-0"><button type="submit" class="btn btn-main btn-main-hero"
                                                id="seo-hero-loc-btn"><i class="search-icon fa fa-search"
                                                    aria-hidden="true"></i><span
                                                    class="smobile">Search</span></button>
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
                                                @foreach ($catArr as $index => $value)
                                                    <option value="{{ $index }}"
                                                        slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                                        @if (isset($mc) && $index == $mc) selected @endif>
                                                        {{ $value }}</option>
                                                @endforeach
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
                                                    aria-hidden="true"></i><span
                                                    class="smobile">Search</span></button>
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
        <img src="{{ url('cvw/assets/img/mobile-banner-expo.webp') }}" class="banner-expo mmdesk"
            alt="Franchise India">
        <picture class="ppdesk">
            <source media="(min-width: 1024px)" srcset="{{ url('cvw/assets/img/banner-expo.webp') }}"
                alt="Franchsie India">
            <source media="(min-width: 650px)" srcset="{{ url('cvw/assets/img/mobile-banner-expo.webp') }}"
                alt="Franchsie India">
            <source media="(min-width: 320px)" srcset="{{ url('cvw/assets/img/mobile-banner-expo.webp') }}"
                alt="Franchsie India">
            <img src="{{ url('cvw/assets/img/banner-expo.webp') }}" alt="Franchise India" class="banner-expo">
        </picture>
        <div class="container">
            <div class="lnkblk"><a href="https://www.franchiseindia.com/brands/direct-english.78387" target="_blank" aria-label="easy gym" class="setpat"><img src="https://www.franchiseindia.com/newhomepage/assets/img/easygym.png" width="300" alt="easy gym" height="76"></a></div>
            <div class="row">
                <div class="col-md-12">
                    @notmobile
                        <h1 class="hero-desktop">Search from<span> 15000+ Business </span>options</h1>
                    @endnotmobile
                    <h2>World&apos;s highest visited franchise website network</h2>
                </div>
                <div class="col-md-12">
                    <div class="hero-search" id="hero-search">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#categories1"
                                    aria-controls="categories1" role="tab" data-toggle="tab">Categories</a></li>
                            <li role="presentation"><a href="#location1" aria-controls="location1" role="tab"
                                    data-toggle="tab">Location</a>
                            </li>
                            <li role="presentation"><a href="#investment1" aria-controls="investment1"
                                    role="tab" data-toggle="tab">Investment</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="categories1" class="tab-pane fade in active" role="tabpanel"
                                aria-labelledby="categories-tab">
                                <form class="form-horizontal" method="get" action="{{ url('category/searchby') }}"
                                    onsubmit="return submitCategory1()"><input type="hidden" name="catTab"
                                        value="1">
                                    <ul class="hero-search-main">
                                        <li class="p-0 m-0">
                                            <select name="mc" aria-label="Select Industry"
                                                class="form-control form-control-custom dropdown-toogle-icon"
                                                id="getMainCategoryDataHeader1"
                                                onchange="getSubCategoryHeader1(this.value)">
                                                <option value="" hidden="">Select Industry</option>
                                                @foreach ($catArr as $index => $value)
                                                    <option value="{{ $index }}"
                                                        slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                                        @if (isset($mc) && $index == $mc) selected @endif>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </li>
                                        <li class="p-0 m-0">
                                            <select aria-label="Select Sector" name="sc"
                                                id="getSubCategoryDataHeader1"
                                                onchange="getSubCatCategoryHeader1(this.value)"
                                                class="form-control form-control-custom dropdown-toogle-icon">
                                                <option value="" hidden="">Select Sector</option>
                                            </select>
                                        </li>
                                        <li class="p-0 m-0"><select
                                                class="form-control form-control-custom dropdown-toogle-icon"
                                                name="ssc" id="getSubCatCategoryDataHeader1"
                                                aria-label="Select Service">
                                                <option value="" hidden="">Select Service/Product</option>
                                            </select></li>
                                        <li class="p-0 m-0"><button type="submit" class="btn btn-main btn-main-hero"
                                                id="seo-hero-inv-btn" aria-label="Submit Brand Search"><i
                                                    class="search-icon fa fa-search" aria-hidden="true"></i><span
                                                    class="smobile">Search</span></button>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                            <div id="location1" class="tab-pane fade" role="tabpanel"
                                aria-labelledby="location-tab">
                                <form class="form-horizontal" method="get" action="{{ url('category/searchby') }}"
                                    onsubmit="return submitLocation1()"><input type="hidden" name="locTab"
                                        value="1">
                                    <ul class="hero-search-main">
                                        <li class="p-0 m-0">
                                            <select aria-label="Select Industry"
                                                class="form-control form-control-custom dropdown-toogle-icon"
                                                name="mc" id="getMainCategoryDataHeaderLoc1">
                                                <option value="" hidden="">Select Industry</option>
                                                @foreach ($catArr as $index => $value)
                                                    <option value="{{ $index }}"
                                                        slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                                        @if (isset($mc) && $index == $mc) selected @endif>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </li>
                                        <li class="p-0 m-0"><select name="loc" id="stateHeader1"
                                                class="form-control form-control-custom dropdown-toogle-icon"
                                                onchange="getcity1(this.value)" aria-label="Select State">
                                                <option value="" hidden="">Select a State</option>
                                                @foreach ($states as $index => $value)
                                                    <option value="{{ $index }}"
                                                        slug="{{ strtolower(Str::slug($value)) }}"
                                                        @if (isset($loc[0]) && $loc[0] == $index) selected @endif>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select></li>
                                        <li class="p-0 m-0">
                                            <select name="city"
                                                class="form-control form-control-custom dropdown-toogle-icon"
                                                id="headercity1" aria-label="Select City">
                                                <option value="" hidden="">Select a City</option>
                                            </select>
                                        </li>
                                        <li class="p-0 m-0"><button type="submit" class="btn btn-main btn-main-hero"
                                                id="seo-hero-loc-btn"><i class="search-icon fa fa-search"
                                                    aria-hidden="true"></i><span
                                                    class="smobile">Search</span></button>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                            <div id="investment1" class="tab-pane fade" role="tabpanel"
                                aria-labelledby="investment-tab">
                                <form class="form-horizontal" method="get" action="{{ url('category/searchby') }}"
                                    onsubmit="return submitInvestment1()"><input type="hidden" name="invTab"
                                        value="1">
                                    <ul class="hero-search-main">
                                        <li class="p-0 m-0">

                                            <select name="mc" aria-label="Select Industry"
                                                id="getMainCategoryDataHeaderInv1"
                                                class="form-control form-control-custom dropdown-toogle-icon">
                                                <option value="" hidden="">Select Industry</option>
                                                @foreach ($catArr as $index => $value)
                                                    <option value="{{ $index }}"
                                                        slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                                        @if (isset($mc) && $index == $mc) selected @endif>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </li>
                                        <li class="p-0 m-0">
                                            <select name="min_cost" aria-label="Select Min Investment"
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
                                            </select>
                                        </li>
                                        <li class="p-0 m-0">
                                            <select name="max_cost" aria-label="Select Max Investment"
                                                class="form-control form-control-custom dropdown-toogle-icon"
                                                id="maxAmount1">
                                                <option value="" hidden="">Select Max Investment</option>
                                            </select>
                                        </li>
                                        <li class="p-0 m-0"><button type="submit" class="btn btn-main btn-main-hero"
                                                id="seo-hero-inv-btn"><i class="search-icon fa fa-search"
                                                    aria-hidden="true"></i><span
                                                    class="smobile">Search</span></button>
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
