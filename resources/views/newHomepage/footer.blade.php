

@php
    use Illuminate\Support\Str;
    $catArr = Config('constants.CategoryArr');
    asort($catArr);

    $states = Config('location.stateArr');
    asort($states);

    $loginUrl = 'https://www.franchiseindia.com/loginform';
    $loginName = 'Login';
    $regUrl = '#';
    $modelWindow = 'data-toggle=modal data-target=#login-pnl';
    $barndStick =
        request()->segment(1) === 'brands' || (request()->segment(1) === 'hi' && request()->segment(2) === 'brands')
            ? 1
            : 0;

    $ip = $_SERVER['REMOTE_ADDR'];
    $query = strtolower(App\Http\Controllers\CommonController::getIpLocationState($ip) ?? '');
    $regionCodes = [
        'south' => ['tamil nadu', 'telangana', 'kerala', 'pondicherry'],
        'east' => [
            'bihar',
            'jharkhand',
            'odisha',
            'nepal',
            'arunachal pradesh',
            'assam',
            'meghalaya',
            'orissa',
            'tripura',
        ],
        'west' => ['goa', 'gujarat', 'rajasthan'],
        'north' => [
            'punjab',
            'jammu and kashmir',
            'jammu',
            'kashmir',
            'himachal pradesh',
            'chandigarh',
            'uttarakhand',
            'uttar pradesh',
            'delhi',
            'haryana',
        ],
        'center' => ['madhya pradesh', 'chhattisgarh', 'maharashtra'],
        'india' => [
            'andhra pradesh',
            'kerala',
            'lakshadweep',
            'pondicherry',
            'telangana',
            'tamil nadu',
            'tamilnadu',
            'uttar pradesh',
            'rajasthan',
            'haryana',
        ],
        'green' => ['west bengal', 'karnataka', 'andhra pradesh'],
    ];

    $expoPopup = empty(Cookie::get('expoppoup17')) ? 1 : 0;
    if ($expoPopup) {
        Cookie::queue('expoppoup17', 'RI2017', 120);
    }

    App\Http\Controllers\CommonController::checkCampaignUrl();

@endphp

{{-- @if (
    !(request()->segment(1) == 'brands' &&
        !empty(request()->segment(2)) &&
        in_array(explode('.', request()->segment(2))[1], Config('constants.popupBrands'))
    ))

    @if (
        $expoPopup &&
            !in_array(request()->segment(1), ['property-loan', 'myaccount', 'payment', 'mailer']) &&
            empty(request()->openpopup) &&
            empty(request()->popup_lead))

        @foreach ($regionCodes as $region => $codes)
            @if (in_array($query, $codes))
                @if (request()->segment(1) == 'brands' && $franDetails->membership_type == 1)
                    @continue
                @endif
                @include('includes.banners.popupmag ')
            @break
        @endif
    @endforeach

@endif --}}

{{-- @endif --}}


@if (request()->segment(1) == 'hi')
<footer class="footer" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <p class="copy-right">Copyright © 2009 - {{ date('Y') }} Franchise India Holdings Ltd.</p>
            </div>
            <div class="col-md-7">
                <ul class="fihl-footer-bottom-links">
                    <li><a href="/">होम</a></li>
                    <li><a href="https://www.franchiseindia.com/about">हमारे बारे में</a></li>
                    <li><a href="https://www.franchiseindia.com/contact/">हम से संपर्क करें</a>
                    </li>
                    <li><a href="https://www.franchiseindia.com/feedback/">परतिक्रिया</a></li>
                    <li><a href="https://news.franchiseindia.com/">समाचार्</a></li>
                    <li><a href="https://www.franchiseindia.com/testimonials-reviews">प्रशंसापत्र</a></li>
                    <li><a href="https://www.franchiseindia.com/terms">शर्तें</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="cookies-section" id="cookie">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <p>हमारी वेब साइट यह सुनिश्चित करने के लिए कुकीज़ का उपयोग करती है कि हम आपको हमारी वेबसाइट पर
                        सबसे अच्छा अनुभव दें। यदि आप इस साइट का उपयोग करना जारी रखते हैं तो हम मान लेंगे कि आप इससे
                        खुश हैं। एक सूचित निर्णय लें <a href="https://www.franchiseindia.com/terms"
                            target="_blank">terms and conditions.</a><button class="btn btn-main seta"
                            onclick="return setCookie()">ठीक</button></p>
                </div>
                <div class="col-md-1 text-center"></div>
            </div>
        </div>
    </div>
</footer>
@else
<footer class="footer" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <p class="copy-right">Copyright © 2009 - 2025 Franchiseindia.com Pvt Ltd</p>
            </div>
            <div class="col-md-7">
                <ul class="fihl-footer-bottom-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="https://www.franchiseindia.com/about" target="_blank">About Us</a></li>
                    <li><a href="https://www.franchiseindia.com/contact" target="_blank">Contact Us</a></li>
                    <li><a href="https://www.franchiseindia.com/feedback" target="_blank">Feedback</a></li>
                    <li><a href="https://www.franchiseindia.com/sitemap/brands" target="_blank">Brands</a></li>
                    <li><a href="https://www.franchiseindia.com/insights" target="_blank">News</a></li>
                    <li><a href="https://www.franchiseindia.com/testimonials-reviews" target="_blank">Testimonials</a></li>
                    <li><a href="https://www.franchiseindia.com/terms" target="_blank">Terms</a></li>
                    {{-- <li><a href="https://www.franchiseindia.com/sitemap" target="_blank">Sitemap</a></li> --}}
                </ul>
            </div>
        </div>
    </div>
    <div class="cookies-section" id="cookie">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <p>By using our site, you acknowledge that you have read and understand our<a
                            href="https://www.franchiseindia.com/terms" target="_blank">terms and
                            conditions.</a><button class="btn btn-main seta" onclick="return setCookie()">Accept
                            Cookies</button></p>
                </div>
                <div class="col-md-1 text-center"></div>
            </div>
        </div>
    </div>
</footer>
@endif

<div class="modal modal-cust fade in" id="search-main" tabindex="-1" aria-labelledby="search-mainLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-cust">
    <div class="modal-content modal-content-cust"><button type="button" class="close" data-dismiss="modal"
            aria-label="Close"><span aria-hidden="true">×</span></button>
        <div class="modal-body modal-body-search-custom">
            <div class="searchbox">
                <form method="get" action="{{ url('category/search') }}">
                    <div class="input-group input-group-search-section-main">
                        <div class="awesomplete"><input type="text"
                                class="form-control form-control-search-custom" name="text"
                                placeholder="Search for business opportunities " id="dealer-bar-search-top"
                                aria-describedby="basic-addon2" autocomplete="off" aria-expanded="false"
                                aria-owns="awesomplete_list_1" role="combobox">
                            <ul hidden="" role="listbox" id="awesomplete_list_1"></ul>
                            <span
                                class="visually-hidden" role="status" aria-live="assertive" aria-atomic="true">Type
                                2 or more characters for results.</span>
                        </div><span class="input-group-addon input-group-addon-search-custom"
                            id="basic-addon2"><button class="btn btn-group-sm btn-main bhide-main"
                                id="seo-search-popup-icon"><svg class="svg-inline--fa fa-search fa-w-16"
                                    aria-hidden="true" data-prefix="fa" data-icon="search" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                                    </path>
                                </svg></button></span>
                                {{-- <div id="search-suggestions" style=" margin-top:39px; position: absolute; background: white; border: 1px solid #ccc; display: none; z-index: 999;"></div> --}}

                    </div>
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
                                        <a href="#" role="button"
                                            onclick="event.preventDefault(); catform.reset();">
                                            Clear All
                                        </a>
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
                                        <a href="#" role="button"
                                            onclick="event.preventDefault(); locform.reset();">
                                            Clear All
                                        </a>
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
                                        {{-- <a href="javascript:void(0)" onclick="customResetForm();">Clear All</a> --}}
                                        <a href="#" role="button"
                                            onclick="event.preventDefault(); customResetForm();">
                                            Clear All
                                        </a>
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
<div class="modal fade lg-panel formsection in" id="expandFranchisenew" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">×</span>
            </button>
            <div class="frm-sec">
                <div id="askMsg" style="display:none;">
                    <div class="green">
                        Thank You for Submitting information for Free Advice!
                    </div>
                </div>
                <div class="frm-container" id="askForm">
                    <form id="homepagenew" name="homepage" method="post"
                        action="{{ route('form.submithome') }}">
                        @csrf 
                        <h2 class="ttl">Free Advice - Ask Our Experts</h2>
                        <div id="errMsg1" style="display:none;">
                            <font color="red"> Please Fill The form! </font>
                        </div>
                        <div class="frm-type">
                            <div class="radio">
                                <label><input type="radio" name="optionsRadios1" id="optionsRadios3"
                                        checked="" value="franchisor"> Expand My Brand </label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="optionsRadios1" id="optionsRadios1"
                                        value="investor">Buy a Franchise</label>
                            </div>
                        </div>
                        <div class="frm-input">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <div class="usersprite"></div>
                                </span>
                                <input type="text" class="form-control blur" name="namefreeadvice1"
                                    id="namefreeadvice1" placeholder="Enter Name" required="required">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <img src="https://www.franchiseindia.com/images/email.png" alt="email">
                                </span>
                                <input type="text" name="emailfreeadvice1" id="emailfreeadvice1"
                                    class="form-control blur" placeholder="Enter Email" required="">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">  
                                    <img src="https://www.franchiseindia.com/images/mobile.png" alt="mobile">
                                </span>
                                <input type="text" class="form-control blur" maxlength="10"
                                    name="mobilefreeadvice1" id="mobilefreeadvice1" placeholder="Enter Mobile No"
                                    required="">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <img src="https://www.franchiseindia.com/images/pincode.png"
                                        alt="pincode"></span>
                                <input type="text" name="pincodefreeadvice1" id="pincodefreeadvice1"
                                    class="form-control blur" maxlength="6" placeholder="Enter Pincode">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon height80">
                                    <img src="https://www.franchiseindia.com/images/addreess.png" alt="address">
                                </span>
                                <textarea class="form-control height80 blur" name="detailsfreeadvice1" id="detailsfreeadvice1"
                                    placeholder="Enter Details"></textarea>
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <div class="captcha">
                                    <span>{!! captcha_img() !!}</span>
                                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                                        &#x21bb;
                                    </button>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <input id="captcha" type="text" class="form-control"
                                    placeholder="Enter Captcha" name="captcha">
                              <span class="text-danger" id="captcha-error"></span>
                                {{-- <br> --}}
                                {{-- <span class="text-danger">hello</span> --}}
                            </div>
                            <div class="checkbox rm-prop">
                                <label>
                                    <input type="checkbox" name="is_newsletterfreeadvice1"
                                        id="is_newsletterfreeadvice1" value="1" checked=""> Yes, i
                                    want to subscribe for weekly Newsletter
                                </label>
                            </div>
                            <div class="checkbox rm-prop">
                                <label>
                                    <input type="checkbox" name="is_termsagree1" id="is_termsagree1"
                                        value="1" checked="">
                                    I agree to the <a href="https://www.franchiseindia.com/terms"
                                        target="_blank">Terms &amp; Conditions</a>
                                </label>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 txt-center" id="sub">
                                    <input type="submit" id="btnhome1" class="btn btn-default btn-red"
                                        value="Ask Our Experts">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!--  above jquery version is affecting jquery 3.1 and causing error on price range slider  -->

<script type="text/javascript">
    $('#reload').click(function() {
        // console.log('called');
        var endpoint = '/reload-captcha';
        var baseUrl = '{{ Config('constants.MainDomain') }}';
        // console.log(baseUrl);
        // Construct the full URL
        var fullUrl = baseUrl + endpoint;
        $.ajax({
            type: 'GET',
            url: fullUrl,
            success: function(data) {
                // console.log('yes');
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#homepagepopup').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submit
            $('#sub input[type="submit"]').val('Please wait...');

            var formData = $(this).serialize(); // Collect all form inputs

            $.ajax({
                type: 'POST',
                url: '{{ route('form.submithome2') }}',
                data: formData,
                success: function(response) {
                    // alert("Form submitted successfully!");
                    $('#homepagepopup')[0].reset();
                    $('#reload').click(); // reload captcha
                    $('.error-message').text(''); // clear all errors
                     window.location = "/thanks-advice-form";
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $('.error-message').text(''); // clear old errors

                        $.each(errors, function(key, value) {
                            $('#' + key + '-error').text(value[
                                0]); // show error below each field
                        });
                        $('#sub input[type="submit"]').val('Ask Our Experts');

                    } else {
                        alert("An unexpected error occurred.");
                        $('#sub input[type="submit"]').val('Ask Our Experts');

                    }
                }
            });

        });

        // Reload CAPTCHA image
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: '/reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    });
</script>
<link rel="stylesheet" href="{{ url('cvw/footer.css') }}" rel="preload" as="style">
<link rel="stylesheet" href="{{ url('cvw/search-main.css') }}" rel="preload" as="style">
<link rel="stylesheet" href="{{ url('cvw/login-panel.css') }}" rel="preload" as="style">
<link rel="stylesheet" href="{{ url('cvw/home-newsletter.css') }}" rel="preload" as="style">
<link rel="stylesheet" href="{{ url('cvw/card.css') }}">
<link rel="stylesheet" href="{{ url('cvw/leading-franchise.css') }}">
<link rel="stylesheet" href="{{ url('cvw/top-business.css') }}">
<link rel="stylesheet" href="{{ url('cvw/top-dealership.css') }}" rel="preload" as="style">
<link rel="stylesheet" href="{{ url('cvw/business-for-sale.css') }}" rel="preload" as="style">
<link rel="stylesheet" href="{{ url('cvw/trending-videos.css') }}" rel="preload" as="style">
<link rel="stylesheet" href="{{ url('cvw/event.css') }}" as="style" rel="preload">
<link rel="stylesheet" href="{{ url('cvw/top-international.css') }}" rel="preload" as="style">
<link rel="stylesheet" href="{{ url('cvw/potential-startup.css') }}" rel="preload" as="style">
<link rel="stylesheet" href="{{ url('cvw/top-franchise-opportunities.css') }}" rel="preload" as="style">
<link rel="stylesheet" href="{{ url('cvw/featured-franchise-opportunities.css') }}" rel="preload" as="style">
<link rel="stylesheet" href="{{ url('cvw/news-section.css') }}" rel="preload" as="style">
<link rel="stylesheet" href="{{ url('cvw/testimonial.css') }}" rel="preload" as="style">

<script src="https://www.franchiseindia.com/js/jquery-3.1.1.min.js"></script>
<script src="https://www.franchiseindia.com/newhomepage/assets/vendor/bootstrap/js/bootstrap.min.js" defer></script>
<script
    src="https://www.franchiseindia.com/newhomepage/assets/vendor/mCustomScrollbar/js/jquery.mCustomScrollbar.concat.min.js">
</script>
<script src="https://www.franchiseindia.com/newhomepage/assets/vendor/swiper/js/swiper-bundle.min.js"></script>
<script src="https://www.franchiseindia.com/newhomepage/assets/vendor/fontawesome/js/solid.js"></script>
<script src="https://www.franchiseindia.com/newhomepage/assets/vendor/fontawesome/js/fontawesome.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.5/awesomplete.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lozad@1.14.0/dist/lozad.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script type="text/javascript" src="{{ url('newhomepage/assets/js/custom.js') }}"></script>
<script src="{{ url('cvw/assets/js/homepagescript.js') }}"></script>
<script>
    function selectMax1(selectmaxheaderval) {
        console.log('yes');
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
        console.log(selectmaxheaderval);
        // console.log($('#maxAmount1'));
        if (selectmaxheaderval === 21)
            // maxAmount.append($("<option></option>").attr("value", 21).text("Above"));
            $('#maxAmount1').append($("<option></option>").attr({
                "value": 21,
                "slug": getSlugAmount[21]['max']
            }).text("Above"));
    }

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
            // maxAmount.append($("<option></option>").attr("value", 21).text("Above"));
            $('#maxAmount').append($("<option></option>").attr({
                "value": 21,
                "slug": getSlugAmount[21]['max']
            }).text("Above"));
    }
</script>

{{-- //Pankaj --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.5/awesomplete.min.js"></script>

<script>
    const input = document.getElementById("dealer-bar-search-tops");
    const awesomplete = new Awesomplete(input, {
        minChars: 2,
        autoFirst: true
    });

    const navBarSearch = $("#dealer-bar-search-tops");
    let resultMap = {}; // To map name -> URL

    navBarSearch.on("keyup", function () {
        const keyword = $(this).val().trim();

        if (keyword.length >= 2) {
            $.ajax({
                url: "/dealers-search/" + encodeURIComponent(keyword),
                type: "GET",
                dataType: "json",
                success: function (response) {
                    console.log('RESSS',response);
                    prepareList(response);
                },
                error: function (err) {
                    console.log(err);
                },
            });
        }
    });

    function prepareList(list) {
        const groupedResults = {};
        resultMap = {}; // Clear old data
        const suggestions = [];
        let html = "";

        list.forEach(item => {
            if (!groupedResults[item.type]) {
                groupedResults[item.type] = [];
            }
            groupedResults[item.type].push(item);
        });


        for (const [type, items,news_id,category] of Object.entries(groupedResults)) {
            html += `<div class="suggestion-group">
                        <strong style="display:block; padding:5px 10px; background:#f7f7f7;">${capitalize(type)}</strong>
                        <ul class="list-unstyled" style="margin:0;">`;

            items.forEach(item => {
                const display = `${item.name} - ${capitalize(type)}`;
                suggestions.push(display);
                // resultMap[item.name] = item.url; 
                resultMap[display] = item.url;
                console.log("Pankajs",item);

                // html += `<li class="suggestion-item" data-display="${display}" style="padding: 8px 10px; cursor:pointer;">${item.name}</li>`;
                html += `<li class="suggestion-item" 
                            data-display="${display}" 
                            data-type="${item.type}" 
                            data-name="${item.name}" 
                            data-newsid="${item.news_id}"
                            data-category="${item.category}" 
                            style="padding: 8px 10px; cursor:pointer;">
                            ${item.name}
                        </li>`;
            });
            html += `</ul></div>`;
        }

        // awesomplete.list = suggestions;
        $("#search-suggestions").html(html).show();
        $("#search-suggestions").off("click", ".suggestion-item").on("click", ".suggestion-item", function () {
            const display = $(this).data("display");
            const name = $(this).data("name");
            const type = $(this).data("type");
            const news_id = $(this).data("newsid");
            const category= $(this).data("category");

            $("#dealer-bar-search-tops").val(display);
            $("#search-suggestions").hide();
            if (type === "company") {
                const value = display.split(" - ")[0];
                window.location.href = "/dealers-india/search/" + encodeURIComponent(value);
            } else if (type === "article") {
                window.location.href = "/insights/en/article/" + encodeURIComponent(name) + '.' + news_id;
            }else if(type === "category"){
                const value = display.split(" - ")[0];
                window.location.href = "/dealers-india/search/" + encodeURIComponent(value);
            } 
            else {
                // fallback
                const value = display.split(" - ")[0];
                window.location.href = "/dealers-india/search/" + encodeURIComponent(value);
            }
            // const value = display.split(" - ")[0]; // extract name
            // window.location.href = "/dealers-india/search/" + encodeURIComponent(value);
        });
    }


    // On button click
    $("#textcompany").on("click", function () {
        let value = $("#dealer-bar-search-tops").val();
        const items = value.split(" - ");
        if (items.length > 1) value = items[0];

        if (value !== "") {
            window.location.href = "/dealers-india/search/" + encodeURIComponent(value);
        }
    });


    function capitalize(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }
    // Hide suggestion box when clicking outside
    $(document).on("click", function (e) {
        const $target = $(e.target);

        // If the clicked element is not inside the input or suggestion box
        if (!$target.closest("#dealer-bar-search-tops").length && !$target.closest("#search-suggestions").length) {
            $("#search-suggestions").hide();
        }
    });

</script> --}}
