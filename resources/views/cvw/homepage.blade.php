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

    

  
    
<div class="modal fade lg-panel formsection in" id="expandFranchisenew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <div class="frm-sec">
                    <div id="askMsg" style="display:none;">
                        <div class="green">
                            Thank You for Submitting information for Free Advice!
                        </div>
                    </div>
                    <div class="frm-container" id="askForm">
                        <form id="homepagenew" name="homepage" method="post" action="{{ route('form.submithome') }}">
                            @csrf
                                       <h2 class="ttl">Free Advice - Ask Our Experts</h2>
                            <div id="errMsg1" style="display:none;">
                                <font color="red"> Please Fill The form! </font>
                            </div>
                            <div class="frm-type">
                                <div class="radio">
                                    <label><input type="radio" name="optionsRadios1" id="optionsRadios3" checked="" value="franchisor"> Expand My Brand </label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="optionsRadios1" id="optionsRadios1" value="investor">Buy a Franchise</label>
                                </div>

                            </div>
                            <div class="frm-input">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <div class="usersprite"></div>
                                    </span>
                                    <input type="text" class="form-control blur" name="namefreeadvice1" id="namefreeadvice1" placeholder="Enter Name" required="required">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                       <img src="https://www.franchiseindia.com/images/email.png" alt="email">
                                    </span>
                                    <input type="text" name="emailfreeadvice1" id="emailfreeadvice1" class="form-control blur" placeholder="Enter Email" required="">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <img src="https://www.franchiseindia.com/images/mobile.png" alt="mobile">
                                    </span>
                                    <input type="text" class="form-control blur" maxlength="10" name="mobilefreeadvice1" id="mobilefreeadvice1" placeholder="Enter Mobile No" required="">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <img src="https://www.franchiseindia.com/images/pincode.png" alt="pincode"></span>
                                    <input type="text" name="pincodefreeadvice1" id="pincodefreeadvice1" class="form-control blur" maxlength="6" placeholder="Enter Pincode">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon height80">
                                        <img src="https://www.franchiseindia.com/images/addreess.png" alt="address">
                                    </span>
                                    <textarea class="form-control height80 blur" name="detailsfreeadvice1" id="detailsfreeadvice1" placeholder="Enter Details"></textarea>
                                </div>
                                <div class="checkbox rm-prop">
                                    <label>
                                        <input type="checkbox" name="is_newsletterfreeadvice1" id="is_newsletterfreeadvice1" value="1" checked=""> Yes, i
                                        want to subscribe for weekly Newsletter
                                    </label>
                                </div>
                                <div class="checkbox rm-prop">
                                    <label>
                                        <input type="checkbox" name="is_termsagree1" id="is_termsagree1" value="1" checked="">
                                        I agree to the <a href="https://www.franchiseindia.com/terms" target="_blank">Terms &amp; Conditions</a>
                                    </label>
                                </div>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12 txt-center" id="sub">
                                        <input type="submit" id="btnhome1" class="btn btn-default btn-red" value="Ask Our Experts">
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


    <script src="https://www.franchiseindia.com/js/jquery-3.1.1.min.js"></script>
<script src="https://www.franchiseindia.com/newhomepage/assets/vendor/bootstrap/js/bootstrap.min.js" defer></script>



<script src="https://www.franchiseindia.com/newhomepage/assets/vendor/mCustomScrollbar/js/jquery.mCustomScrollbar.concat.min.js" defer></script>
<script src="https://www.franchiseindia.com/newhomepage/assets/vendor/swiper/js/swiper-bundle.min.js"></script>
@include('cvw.loginmodal')
<script>
    if (window.screen.width < 600) {
            document.addEventListener("DOMContentLoaded",function(){
                var n=!1;window.addEventListener("scroll",function()
                {100<window.scrollY&&function(){
                    if(!n){var e=document.createElement("link");e.rel="stylesheet",e.href="cvw/stylemix.css",document.head.appendChild(e),n=!0,console.log("CSS file loaded.")}}()})});
        }
    
        if (window.screen.width > 600) {
            document.addEventListener("DOMContentLoaded",function(){
                var n=!1;window.addEventListener("scroll",function()
                {100<window.scrollY&&function(){
                    if(!n){var e=document.createElement("link");e.rel="stylesheet",e.href="cvw/stylemix.css",document.head.appendChild(e),n=!0,console.log("CSS file loaded.")}}()})});
        }
        </script>
    
<script>
    function frg_panel() {
    $("#lg-pnl").hide(), $("#frg-pnl").show();
}

function lg_panel() {
    $("#lg-pnl").show(), $("#loginactive").click(), $("#frg-pnl").hide();
}
    $(document).ready(function() {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        }), $("#dismiss, .overlay").on("click", function() {
            $("#sidebar").removeClass("active"), $(".overlay").removeClass("active")
        }), $("#sidebarCollapse").on("click", function() {
            $("#sidebar").addClass("active"), $(".overlay").addClass("active"), $(".collapse.in").toggleClass("in"), $("a[aria-expanded=true]").attr("aria-expanded", "false")
        })
    });
    </script>
    <script>
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
        // console.log(mainCategorySelect);
        if (mainCategorySelect?.value ) {
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

    function changelanguage(url) {
    console.log('Language change triggered');
    if (url) { // require a URL
        console.log('Redirecting to:', url);
        window.location.href = url; // redirect
    }
    return false;
}

$(document).ready(function() {
    $('#homepagenew').on('submit', function(e) {
        // console.log('tres');
        e.preventDefault(); // Prevent the default form submission

        // Get form data
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function(response) {
                $('#response').html('<p>Form submitted successfully!</p>');
                window.location = "/thanks-advice-form";

                // Clear previous error messages and placeholders
                $('.error-message').text('');
                // $('input').attr('placeholder', '');
            },
            error: function(xhr) {
                // Clear previous error messages and placeholders
                $('.error-message').text('');
                // $('input').attr('placeholder', '');

                var errors = xhr.responseJSON.errors;

                $.each(errors, function(key, errorMessages) {
                    // Check if the error message is for captcha and replace it with a custom message
                    if (key === 'captcha' && errorMessages[0] === 'validation.captcha') {
                        var customMessage = 'Invalid captcha value.';
                        $('#' + key + '-error').text(customMessage);
                        // $('#' + key).attr('placeholder', customMessage);
                    } else {
                        // Use the error messages provided by the server response
                        var errorMessage = errorMessages[0];
                        $('#' + key + '-error').text(errorMessage);
                        // $('#' + key).attr('placeholder', errorMessage);
                    }
                });

                // Optionally, handle global errors
                if (xhr.responseJSON.message) {
                    $('#response').html('<p>' + xhr.responseJSON.message + '</p>');
                }
            }
        });
    });
});


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
<script language="javascript">

    function isNumber(evt){evt=(evt)?evt:window.event;var charCode=(evt.which)?evt.which:evt.keyCode;return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }
    function getcitypopup(value){value=$(value).find(':selected').attr('data-id');$.ajax({type:'GET',url:'/getcitylist',data:{state:value},success:function(data){$("#popupcity").html(data);}});}/*]]>*/
</script>
<script src="https://cdn.jsdelivr.net/npm/lozad@1.14.0/dist/lozad.min.js"></script>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.5/awesomplete.min.js"></script>


<script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
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

<script>
if (window.screen.width < 600) {
    	document.addEventListener("DOMContentLoaded",function(){
            var n=!1;window.addEventListener("scroll",function()
            {100<window.scrollY&&function(){
                if(!n){var e=document.createElement("link");e.rel="stylesheet",e.href="cvw/stylemix.css",document.head.appendChild(e),n=!0,console.log("CSS file loaded.")}}()})});
    }

    if (window.screen.width > 600) {
    	document.addEventListener("DOMContentLoaded",function(){
            var n=!1;window.addEventListener("scroll",function()
            {100<window.scrollY&&function(){
                if(!n){var e=document.createElement("link");e.rel="stylesheet",e.href="cvw/stylemix.css",document.head.appendChild(e),n=!0,console.log("CSS file loaded.")}}()})});
    }
    </script>

<script>
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
<script type="text/javascript">
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
<script>
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


<script>
    $(document).ready(function() {
        // Function to handle the visibility of .hero-section based on scroll position
        function handleScroll() {
            if ($(window).scrollTop() > 40) {
                $(".main").show();
                $(".mycss").css("display", "block");
            } else {
                $(".main").hide();
                $(".mycss").css("display", "none");
            }
        }

        // Check screen width and set up event handlers accordingly
        if (screen.width < 767) {
            // Initial visibility check
            handleScroll();

            // Attach the scroll event handler
            $(window).scroll(handleScroll);
        }
    });
</script>

 {{-- Homepoage events banner banner  --}}
<!-- Custom JS -->
{{-- <script type="text/javascript" src="{{url('newhomepage/assets/js/custom.js')}}"></script>
@if( !(!empty(request()->segment(2)) && request()->segment(1) == "brands" && isset(explode('.', request()->segment(2))[1]) && in_array(explode('.', request()->segment(2))[1], Config('constants.popupBrands')) ))
  
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
		$southCodes = ['tamil nadu', 'telangana', 'kerala', 'pondicherry'];
        $eastCodes = ['bihar', 'jharkhand', 'odisha', 'nepal', 'arunachal pradesh', 'assam', 'meghalaya', 'orissa', 'tripura'];
        $westCodes  = ['goa', 'gujarat',  'rajasthan'];
        $northCodes  = ['punjab', 'jammu and kashmir', 'jammu', 'kashmir', 'himachal pradesh', 'chandigarh', 'uttarakhand', 'uttar pradesh', 'delhi', 'haryana'];
		$centerCodes = ['madhya pradesh', 'chhattisgarh', 'maharashtra'];
        $indiaCodes  = ['andhra pradesh', 'kerala', 'lakshadweep', 'pondicherry', 'telangana', 'tamil nadu', 'tamilnadu', 'uttar pradesh', 'rajasthan', 'haryana'];
        $GreenTrends  =  ['west bengal', 'karnataka', 'andhra pradesh'];

        App\Http\Controllers\CommonController::checkCampaignUrl();
    @endphp

    @if($expoPopup == 1 && request()->segment(1) != 'property-loan' && request()->segment(1) != 'myaccount' && request()->segment(1) != 'payment' && request()->segment(1) != 'mailer' && empty(request()->openpopup) && empty(request()->popup_lead))
		@if(in_array($query, $southCodes))
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 1)
                    @include('includes.banners.popupfrobengaluru')
                @endif
            @else
                @include('includes.banners.popupfrobengaluru')
            @endif
		@elseif(in_array($query, $eastCodes))
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 1)
                    @include('includes.banners.popupfranchiseexpokolkata')
                @endif
            @else
                @include('includes.banners.popupfranchiseexpokolkata')
            @endif

		@elseif(in_array($query, $westCodes))
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 1)
                    @include('includes.banners.popupfroahmedabad')
                @endif
            @else
                @include('includes.banners.popupfroahmedabad')
            @endif

		@elseif(in_array($query, $northCodes))
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 1)
                    @include('includes.banners.popupfrobengaluru')
                @endif
            @else
                @include('includes.banners.popupfrobengaluru')
            @endif

		@elseif(in_array($query, $centerCodes))
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 1)
                    @include('includes.banners.popupfranchiseexpolucknow')
                @endif
            @else
                @include('includes.banners.popupfranchiseexpolucknow')
            @endif

		@else
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 1)
                    @include('includes.banners.popupfrobengaluru')
				@endif
			@else
		        @include('includes.banners.popupfrobengaluru')
			@endif
		@endif
    @endif
    <!-- popupmag Start of franchiseindia Zendesk Widget script  popupmag -->
  
@endif --}}



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




</body>
</html>