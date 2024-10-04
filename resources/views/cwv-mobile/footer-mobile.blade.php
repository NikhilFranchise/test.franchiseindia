@php
    $catArr = Config('constants.CategoryArr');
    asort($catArr);
    $states = Config('location.stateArr');
    asort($states);
@endphp
<footer class="footer" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <p class="copy-right">Copyright © 2009 - 2024 Franchise India
                    Holdings Ltd.
                </p>
            </div>
            <div class="col-md-7">
                <ul class="fihl-footer-bottom-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="https://www.franchiseindia.com/about" target="_blank">About Us</a></li>
                    <li><a href="https://www.franchiseindia.com/contact" target="_blank">Contact Us</a></li>
                    <li><a href="https://www.franchiseindia.com/feedback" target="_blank">Feedback</a></li>
                    <li><a href="https://www.franchiseindia.com/sitemap/brands">Brands</a></li>
                    <li><a href="https://www.opportunityindia.com/" target="_blank">News</a></li>
                    <li><a href="https://www.franchiseindia.com/testimonials" target="_blank">Testimonials</a>
                    </li>
                    <li><a href="https://www.franchiseindia.com/terms" target="_blank">Terms</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>



<style>
    .modal-trigger {
        font-variant: small-caps;
        background: #eee;
        font-size: 1.5em;
        color: #333;
        padding: .6em 1em;
        border: 0;
        border-radius: .2em;
        cursor: pointer;
        letter-spacing: .1em;
        outline: 0;
    }


    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.5);
        /* Black w/ opacity */
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    /* Modal Content */
    .modal-content,
    .modal-contents,
    .modal-contentss {
        background-color: #fff;
        color: #fff;
        text-align: left;
        margin: auto;
        padding: 20px;
        width: 80%;
        box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
        border-radius: 5px;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        position: absolute;
        right: .5em;
        top: 0.3em;
    }

    .close:hover,
    .close:focus {
        color: #fff;
        text-decoration: none;
        cursor: pointer;
    }
    .radio{visibility: hidden;} a{color: black}
</style>


{{--  <div id="myModals" class="modal">
    <div class="modal-contents">
        <span id="modalCloses" class="close no-select">&times;</span>
    </div>
</div>  --}}

<div class="modal modal-cust fade in" id="myModals" tabindex="-1" aria-labelledby="search-mainLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-cust">
        <div class="modal-content modal-content-cust"><button type="button" class="close"  data-dismiss="modal"
                aria-label="Close"><span aria-hidden="true" id="modalCloses">×</span></button>
            <div class="modal-body modal-body-search-custom">
                <div class="searchbox">
                    <form method="get" action="{{ url('category/search') }}">
                        <div class="input-group input-group-search-section-main">
                            <div class="awesomplete"><input type="text"
                                    class="form-control form-control-search-custom" name="text"
                                    placeholder="Search for business opportunities" id="dealer-bar-search-top"
                                    aria-describedby="basic-addon2" autocomplete="off" aria-expanded="false"
                                    aria-owns="awesomplete_list_1" role="combobox">
                                <ul hidden="" role="listbox" id="awesomplete_list_1"></ul><span
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
                                            {{-- <a href="javascript:void(0)" onclick="catform.reset();">Clear All</a> --}}
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
                                            {{-- <a href="javascript:void(0)" onclick="locform.reset();">Clear All</a> --}}
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


<div id="myModalss" class="modal">
    <div class="modal-contentss">
        <span id="modalClosess" class="close no-select">&times;</span>

        <div class="new-nav">
            <nav id="sidebar" class="mCustomScrollbar _mCS_1 mCS-autoHide active" style="overflow: visible;">
                <div id="mCSB_1" class="mCustomScrollBox mCS-minimal mCSB_vertical mCSB_outside"
                    style="max-height: none;" tabindex="0">
                    <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;"
                        dir="ltr">
                        <div id="dismiss">
                            <svg class="svg-inline--fa fa-arrow-left fa-w-14" aria-hidden="true" data-prefix="fas"
                                data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z">
                                </path>
                            </svg><!-- <i class="fas fa-arrow-left"></i> -->
                        </div>
                        <ul class="list-unstyled components border-bottom-1 pt-35">
                            <li>
                                <div class="google-search">
                                    <script>
                                        (function() {
                                            var cx = '017593288126496616373:bpgflqv932a';
                                            var gcse = document.createElement('script');
                                            gcse.type = 'text/javascript';
                                            gcse.async = true;
                                            gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                                            let s = document.getElementsByTagName('script')[0];
                                            s.parentNode.insertBefore(gcse, s);
                                        })();
                                    </script>
                                    <div id="___gcse_0">
                                        <div class="gsc-control-searchbox-only gsc-control-searchbox-only-en"
                                            dir="ltr">
                                            <form class="gsc-search-box gsc-search-box-tools" accept-charset="utf-8">
                                                <table cellspacing="0" cellpadding="0" role="presentation"
                                                    class="gsc-search-box">
                                                    <tbody>
                                                        <tr>
                                                            <td class="gsc-input">
                                                                <div class="gsc-input-box" id="gsc-iw-id1">
                                                                    <table cellspacing="0" cellpadding="0"
                                                                        role="presentation" id="gs_id50"
                                                                        class="gstl_50 gsc-input"
                                                                        style="width: 100%; padding: 0px;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td id="gs_tti50" class="gsib_a">
                                                                                    <input autocomplete="off"
                                                                                        type="text" size="10"
                                                                                        class="gsc-input"
                                                                                        name="search" title="search"
                                                                                        aria-label="search"
                                                                                        id="gsc-i-id1" dir="ltr"
                                                                                        spellcheck="false"
                                                                                        style="width: 100%; padding: 0px; border: none; margin: 0px; height: auto; background: url(&quot;https://www.google.com/cse/static/images/1x/en/branding.png&quot;) left center no-repeat rgb(255, 255, 255); outline: none;">
                                                                                </td>
                                                                                <td class="gsib_b">
                                                                                    <div class="gsst_b" id="gs_st50"
                                                                                        dir="ltr"><a
                                                                                            class="gsst_a"
                                                                                            href="javascript:void(0)"
                                                                                            title="Clear search box"
                                                                                            role="button"
                                                                                            style="display: none;"><span
                                                                                                class="gscb_a"
                                                                                                id="gs_cb50"
                                                                                                aria-hidden="true">×</span></a>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                            <td class="gsc-search-button"><button
                                                                    class="gsc-search-button gsc-search-button-v2"><svg
                                                                        width="13" height="13"
                                                                        viewBox="0 0 13 13">
                                                                        <title>search</title>
                                                                        <path
                                                                            d="m4.8495 7.8226c0.82666 0 1.5262-0.29146 2.0985-0.87438 0.57232-0.58292 0.86378-1.2877 0.87438-2.1144 0.010599-0.82666-0.28086-1.5262-0.87438-2.0985-0.59352-0.57232-1.293-0.86378-2.0985-0.87438-0.8055-0.010599-1.5103 0.28086-2.1144 0.87438-0.60414 0.59352-0.8956 1.293-0.87438 2.0985 0.021197 0.8055 0.31266 1.5103 0.87438 2.1144 0.56172 0.60414 1.2665 0.8956 2.1144 0.87438zm4.4695 0.2115 3.681 3.6819-1.259 1.284-3.6817-3.7 0.0019784-0.69479-0.090043-0.098846c-0.87973 0.76087-1.92 1.1413-3.1207 1.1413-1.3553 0-2.5025-0.46363-3.4417-1.3909s-1.4088-2.0686-1.4088-3.4239c0-1.3553 0.4696-2.4966 1.4088-3.4239 0.9392-0.92727 2.0864-1.3969 3.4417-1.4088 1.3553-0.011889 2.4906 0.45771 3.406 1.4088 0.9154 0.95107 1.379 2.0924 1.3909 3.4239 0 1.2126-0.38043 2.2588-1.1413 3.1385l0.098834 0.090049z">
                                                                        </path>
                                                                    </svg></button></td>
                                                            <td class="gsc-clear-button">
                                                                <div class="gsc-clear-button" title="clear results">
                                                                    &nbsp;</div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                    <link rel="stylesheet" href="https://www.google.com/cse/style/look/greensky.css"
                                        type="text/css">
                                </div>
                            </li>

                            <li>
                                <div class="p-2 language-main-bx">
                                    <div class="input-group
            input-group-custom">
                                        <span class="input-group-addon
            input-group-prepend-custom"
                                            id="basic-addon1">
                                            <img src="https://www.franchiseindia.com/newhomepage/assets/img/language-icon.svg"
                                                alt="" class="mCS_img_loaded">
                                        </span>
                                        <div class="form-group form-group-sm">
                                            <select class="form-control
            form-control-custom-main"
                                                id="exampleFormControlSelect1">
                                                <option hidden="">Language</option>
                                                <option value="https://www.franchiseindia.com">EN - English</option>
                                                <option value="https://www.franchiseindia.com/hi">HI - Hindi</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>&nbsp;</li>
                            <li class="top-investors">
                                <div class="dropdown policydropdown">
                                    <button class="btn dropdown-toggle" type="button" id="btnDropdownDemo"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        style="">Investor <svg class="svg-inline--fa fa-caret-down fa-w-10"
                                            aria-hidden="true" data-prefix="fa" data-icon="caret-down"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z">
                                            </path>
                                        </svg><!-- <i class="fa fa-caret-down"></i> --></button>
                                    <div class="dropdown-menu policydropdownmenu" aria-labelledby="btnDropdownDemo">
                                        <a class="dropdown-item" href="https://www.franchiseindia.com/ipo"
                                            target="_blank">IPO</a>
                                        <a class="dropdown-item" href="https://www.franchiseindia.com/policies"
                                            target="_blank">Policies</a>
                                        <a class="dropdown-item"
                                            href="https://www.franchiseindia.com/corporate-governance"
                                            target="_blank">Corporate Governance</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a target="_blank" href="/">Domestic Brands</a>
                            </li>
                            <li>
                                <a target="_blank" href="/premiumbrand">Premium Brands</a>
                            </li>
                            <li>
                                <a target="_blank" href="/international">International</a>
                            </li>
                        </ul>
                        <ul class="list-unstyled components border-bottom-1">
                            <li>
                                <a target="_blank" href="https://www.franchiseindia.com/insights">Franchise
                                    Insights</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://www.opportunityindia.com/">News</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://video.franchiseindia.com/">Video</a>
                            </li>
                            <li>
                                <!-- <a target="_blank" href="/magazine">Magazine</a> -->
                                <a target="_blank"
                                    href="https://master.franchiseindia.com/magazine-subscribe/">Magazine</a>
                            </li>
                            <li><a href="https://www.franchiseindia.com/top-100-franchise" target="_blank">Top 100
                                    Franchise</a></li>
                            <li><a href="https://www.franchiseindia.com/most-visitedbrands" target="_blank">Most
                                    Searched Franchise Brands</a></li>
                        </ul>

                        <div class="categoryall-franchise border-bottom-1">
                            <div class="busheadmebu"><a target="_blank" href="/categoryall">Franchise
                                    Categories</a>
                            </div>

                            <ol class="tree">
                                <li>
                                    <label for="folder1">
                                        <a target="_blank"
                                            href="/business-opportunities/automotive.m8
                               ">Automotive</a>
                                    </label> <input type="checkbox" id="folder1">
                                    <ol>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/automobile-related.sc344">Automobile
                                                    Related</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/automobile-accessories.ssc262 ">Automobile
                                                        Accessories</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/automobile-garage-related.ssc366 ">Automobile
                                                        Garage Related</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/automobile-maintanance-related.ssc367 ">Automobile
                                                        Maintanance Related</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/automobile-spares-related.ssc368 ">Automobile
                                                        Spares / Tyre</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/charging-stations.ssc973 ">Charging
                                                        Stations</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/road-safety-equipments.ssc371 ">Road
                                                        Safety Equipments</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/security-and-helpline-services.ssc370 ">Security
                                                        &amp; Helpline Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/web-based-online-platform.ssc369 ">Web
                                                        Based/Online Platform</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/commercial-vehicles.sc343">Commercial
                                                    Vehicles</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/commercial-vehicles-bus-trucks.ssc361 ">Commercial
                                                        Vehicles Bus/Trucks</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/electric-vehicles.ssc725 ">Electric
                                                        Vehicles (E-Vehicles)</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/off-road-all-terrain-vehicles.ssc365 ">Off
                                                        Road / All Terrain Vehicles</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/three-wheeler-showroom.ssc360 ">Three
                                                        Wheeler (Auto) Showroom</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/tractors.ssc363 ">Tractors</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/four-wheeler.sc342">Four
                                                    Wheeler</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/car-exterior-parts.ssc355 ">Car
                                                        Exterior Parts</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/car-interior-accessories.ssc357 ">Car
                                                        Interior Accessories</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/car-interior-spare-parts.ssc354 ">Car
                                                        Interior Spare Parts</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/car-maintanance-and-repair-services.ssc353 ">Car
                                                        Maintanance &amp; Repair Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/car-rental.ssc546 ">Car
                                                        Rental</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/car-reselling.ssc356 ">Car
                                                        Reselling</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/car-showroom.ssc352 ">Car
                                                        Showroom</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/car-wash-and-detailing.ssc358 ">Car
                                                        Wash / Ceramic Coating / Detailing</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/electric-four-wheelers.ssc359 ">Electric
                                                        Four Wheelers</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/two-wheeler.sc341">Two
                                                    Wheeler</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/bicycle.ssc345 ">Bicycle</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/bike-maintanance-and-repair-services.ssc347 ">Bike
                                                        Maintanance &amp; Repair Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/bike-rental.ssc545 ">Bike
                                                        Rental</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/bike-reselling.ssc348 ">Bike
                                                        Reselling</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/bike-showroom.ssc346 ">Bike
                                                        Showroom</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/bike-wash.ssc349 ">Bike Wash</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/bikers-accessories.ssc351 ">Biker's
                                                        Accessories</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/electric-two-wheelers.ssc350 ">Electric
                                                        Two Wheelers</a>
                                                </li>

                                            </ol>
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <label for="folder1">
                                        <a target="_blank"
                                            href="/business-opportunities/beauty-and-health.m1
                               ">Beauty
                                            &amp; Health</a>
                                    </label> <input type="checkbox" id="folder1">
                                    <ol>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/beauty-aesthetics-and-supplies.sc13">Beauty
                                                    Aesthetics &amp; Supplies</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/bath-products.ssc539 ">Bath
                                                        Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/beauty-equipments.ssc540 ">Beauty
                                                        Equipments</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/beauty-salons.ssc47 ">Beauty
                                                        Salons</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/cosmetic-accessories.ssc541 ">Cosmetic
                                                        Accessories</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/cosmetics-and-beauty-product-stores.ssc49 ">Cosmetics
                                                        &amp; Beauty Product Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/pet-grooming.ssc50 ">Pet
                                                        Grooming</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/tattoo-piercing-and-nail-art.ssc48 ">Tattoo,
                                                        Piercing &amp; Nail Art</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/health-care.sc14">Health
                                                    Care</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/ayurvedic-herbal-and-organic-products.ssc62 ">Ayurvedic,
                                                        Herbal &amp; Organic Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/clinics-and-nursing-homes.ssc56 ">Clinics
                                                        &amp; Nursing Homes</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/healthcare-products.ssc59 ">Healthcare
                                                        Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/hospitals.ssc57 ">Hospitals</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/others-health-care-and-fitness.ssc63 ">Others
                                                        Health Care &amp; Fitness</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/pathological-labs.ssc51 ">Pathological
                                                        Labs</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/pharmacies.ssc58 ">Pharmacies</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/wellness.sc538">Wellness</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/diet-consultancy.ssc61 ">Diet
                                                        Consultancy</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/gyms-and-fitness-centres.ssc52 ">Gyms
                                                        And Fitness Centres</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/massage-centres.ssc55 ">Massage
                                                        Centres</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/medical-spas-med-spas-medi-spas.ssc54 ">Medical
                                                        Spas/Med Spas/Medi Spas</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/meditation-centre.ssc542 ">Meditation
                                                        Centre</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/physiotheraphy-centre.ssc543 ">Physiotherapy
                                                        Centre</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/slimming-center.ssc60 ">Slimming
                                                        Center</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/spas.ssc53 ">Spas</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/yoga-classes.ssc544 ">Yoga
                                                        Classes</a>
                                                </li>

                                            </ol>
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <label for="folder1">
                                        <a target="_blank"
                                            href="/business-opportunities/business-services.m6
                               ">Business
                                            Services</a>
                                    </label> <input type="checkbox" id="folder1">
                                    <ol>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/advertisement-and-media-services.sc23">Advertisement
                                                    &amp; Media Services</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/ad-agencies-and-collection-centres.ssc113 ">Ad
                                                        Agencies &amp; Collection Centres</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/digital-media-and-internet-marketing.ssc110 ">Digital
                                                        Media &amp; Internet Marketing</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/public-relations.ssc112 ">Public
                                                        Relations (PR)</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/publications-and-print-media.ssc111 ">Publications
                                                        &amp; Print Media</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/tv-channel-network.ssc109 ">TV
                                                        Channel/Network</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/consultancy.sc31">Consultancy</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/bpo.ssc157 ">BPO</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/business.ssc153 ">Business</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/career-counseling.ssc158 ">Career
                                                        Counseling</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/financial-consultancy.ssc155 ">Financial</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/hr-and-recruitment.ssc161 ">HR
                                                        &amp; Recruitment</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/immigration.ssc160 ">Immigration</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/legal.ssc401 ">Legal</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/matrimonial.ssc156 ">Matrimonial</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/others-consultancy.ssc162 ">Others
                                                        Consultancy</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/real-estate.ssc399 ">Real
                                                        Estate</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/service-for-smes.ssc159 ">Service
                                                        For SMEs</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/technology.ssc400 ">Technology</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/financial.sc27">Financial</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/accounting-and-auditing-services.ssc552 ">Accounting
                                                        &amp; Auditing Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/equity-and-debt-providers.ssc139 ">Equity
                                                        &amp; Debt Providers</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/finance-advisors-and-brokers.ssc137 ">Finance
                                                        Advisors &amp; Brokers</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/financial-investment-and-trading.ssc555 ">Financial
                                                        Investment &amp; Trading</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/foreign-exchange.ssc140 ">Foreign
                                                        Exchange (FOREX)</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/insurance.ssc135 ">Insurance</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/microfinance.ssc138 ">Microfinance</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/non-banking-financial-company.ssc550 ">Non
                                                        Banking Financial Company (NBFC)</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/others-financial.ssc142 ">Others
                                                        Financial</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/payment-solution-services.ssc554 ">Payment
                                                        Solution Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/post-office-services.ssc136 ">Post
                                                        Office Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/tax-consulting-services.ssc551 ">Tax
                                                        Consulting Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/wealth-management.ssc553 ">Wealth
                                                        Management</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/household-services.sc30">Household
                                                    Services</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/electrical-and-plumbing-services.ssc571 ">Electrical
                                                        &amp; Plumbing Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/facility-management.ssc567 ">Facility
                                                        Management</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/gardening-services.ssc569 ">Gardening
                                                        Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/home-appliances-repair-services.ssc572 ">Home
                                                        Appliances Repair Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/home-renovation-services.ssc570 ">Home
                                                        Renovation Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/home-safety-and-security.ssc568 ">Home
                                                        Safety &amp; Security</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/housekeeping.ssc151 ">Housekeeping</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/institutional-facility-cleaning.ssc149 ">Institutional/Facility
                                                        Cleaning</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/laundry-and-dry-cleaning.ssc150 ">Laundry
                                                        &amp; Dry Cleaning</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/pest-control.ssc152 ">Pest
                                                        Control</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/repair-services.ssc148 ">Repair
                                                        Services</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank" href="/business-opportunities/it-services.sc26">IT
                                                    Services</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/cartridge-refilling.ssc132 ">Cartridge
                                                        Refilling</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/computer-and-ict-services.ssc131 ">Computer
                                                        And ICT Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/management-software.ssc730 ">Management
                                                        Software</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/printing-services.ssc133 ">Printing
                                                        Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/security-services.ssc130 ">Security
                                                        Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/telecom.ssc134 ">Telecom</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/logistics.sc25">Logistics</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/courier-and-delivery.ssc127 ">Courier
                                                        &amp; Delivery</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/logistics-outsourcing.ssc404 ">Logistics
                                                        Outsourcing</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/logistics-technology-provider.ssc405 ">Logistics
                                                        Technology Provider</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/material-handling-and-order-processing.ssc402 ">Material
                                                        Handling &amp; Order Processing</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/supply-chain-management.ssc128 ">Supply
                                                        Chain Management</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/transportation.ssc129 ">Transportation</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/trucking-logistics-services.ssc403 ">Trucking
                                                        Logistics Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/warehousing-services.ssc406 ">Warehousing
                                                        Services</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/real-estate.sc154">Real
                                                    Estate</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/real-estate-sub.ssc267 ">Real
                                                        Estate Sub</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/travel.sc28">Travel</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/car-rental-and-cab-services.ssc145 ">Car
                                                        Rental &amp; Cab Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/online-travel-services.ssc146 ">Online
                                                        Travel Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/others-travel.ssc147 ">Others
                                                        Travel</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/tour-packages.ssc144 ">Tour
                                                        Packages</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/travel-agents.ssc143 ">Travel
                                                        Agents</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/waste-management-and-recycling-services.sc407">Waste
                                                    Management &amp; Recycling Services</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/electronic-waste-management-services.ssc414 ">Electronic
                                                        Waste Management Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/pollution-monitoring.ssc418 ">Pollution
                                                        Monitoring</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/scrap-dealers-and-management-services.ssc417 ">Scrap
                                                        Dealers &amp; Management Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/solid-waste-management.ssc411 ">Solid
                                                        Waste Management</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/waste-disposal-services.ssc416 ">Waste
                                                        Disposal Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/waste-management-services.ssc409 ">Waste
                                                        Management Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/water-treatment-and-purification-services.ssc408 ">Water
                                                        Treatment &amp; Purification Services</a>
                                                </li>

                                            </ol>
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <label for="folder1">
                                        <a target="_blank"
                                            href="https://www.dealerindia.com
                               ">Dealers
                                            &amp; Distributors</a>
                                    </label> <input type="checkbox" id="folder1">
                                    <ol>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="https://www.dealerindia.com/dir/agriculture-farming">Agriculture</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/agro-products-comodities ">Agro
                                                        Products &amp; Commodities</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/rural-products ">Rural
                                                        Products</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="https://www.dealerindia.com/dir/automobile">Automobile</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/automobile-accessories ">Automobile
                                                        Accessories</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/automobile-maintenance ">Automobile
                                                        Maintenance</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/automotive-electrical-parts ">Automotive
                                                        Electrical Parts</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/automotive-parts-components ">Automotive
                                                        Parts And Components</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/commercial-vehicles-parts ">Commercial
                                                        Vehicles &amp; Parts</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/electric-vehicles-parts ">Electric
                                                        Vehicles</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/engine-engine-components-spare-parts ">Engine,
                                                        Engine Components, Spare Parts</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/gps-navigation-tracking-devices ">GPS
                                                        Navigation &amp; Tracking System</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/oil-lubricants ">Oil
                                                        &amp; Lubricants</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/tyre-tubes-accessories ">Tyre,
                                                        Tube, Accessories</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="https://www.dealerindia.com/dir/building-construction-machines">Building
                                                    &amp; Construction</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/bathroom-toilet-accessories-fittings ">Bathroom
                                                        &amp; Toilet Accessories &amp; Fittings</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/bricks-cement-other-building-material ">Bricks
                                                        &amp; Cement &amp; Sand Supplies</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/builder-construction-hardware ">Builder
                                                        &amp; Construction Hardware</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/building-architecture ">Building
                                                        Architecture</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/building-decoration-products ">Building
                                                        Decoration Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/doors-windows ">Doors/Wooden
                                                        Door Panels</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/furnishing-wood-work ">Furnishing
                                                        &amp; Wood Works</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/paints-allied-products ">Paints
                                                        &amp; Allied Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/ceramic-glass-verified-tiles ">Tiles</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="https://www.dealerindia.com/dir/computer-hardware-mobile-accessories">Computer
                                                    Hardware, Mobile &amp; Accessories</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/routers-cables-networking-devices ">Computer
                                                        Cable &amp; Connectors</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/computer-parts-accessories ">Computer
                                                        Parts &amp; Accessories</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/mobile-phone-accessories ">Mobile
                                                        Accessories</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/computer-mobile-softwares-apps ">Software</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="https://www.dealerindia.com/dir/education">Education</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/education-material ">Educational
                                                        Material</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/school-supplies ">School
                                                        Supplies</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/digital-education-smart-class-material ">Smart
                                                        Classes Material</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="https://www.dealerindia.com/dir/electronics-electrical-supplies">Electronics
                                                    &amp; Electricals</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/batteries-chargers-storage-devices ">Chargers</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/consumer-electronics ">Consumer
                                                        Electronics</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/electronic-instruments ">Electronic
                                                        Intruments</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/electronic-products-components ">Electronic
                                                        Products &amp; Components</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/energy-saving-products-devices ">Energy
                                                        Saving Devices</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/inverters-ups-converters ">Inverters,
                                                        UPS &amp; Battery Chargers</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/led-lights ">LED
                                                        Lights</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/lights-lighting-accessories ">Lighting
                                                        Products &amp; Components</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/wires-cables-accessories-conductors ">Wires,
                                                        Cables &amp; Accessories &amp; Conductors</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="https://www.dealerindia.com/dir/environment-pollution">Environment
                                                    &amp; Pollution</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/solar-products-equipments ">Solar
                                                        Products</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="https://www.dealerindia.com/dir/fashion-apparel">Fashion
                                                    &amp; Apparel</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/baby-kids-wear ">Baby
                                                        &amp; Kids Wear</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/denim-products ">Denim-Garments,
                                                        Fabrics &amp; Bags</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/ethnic-wear ">Ethnic
                                                        Wear</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/fabric-accessories ">Fabric
                                                        &amp; Accessories</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/fashion-accessories ">Fashion
                                                        Accessories</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/footwear ">Footwear</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/artificial-fashion-jewellery ">Jewellery</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/mens-wear ">Mens Wear</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/undergarments-lingeries-night-wear ">Undergarments,
                                                        Lingerie, Nightwear</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/women-wear ">Women
                                                        Wear</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="https://www.dealerindia.com/dir/food-beverages">Food &amp;
                                                    Beverage</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/beverages ">Beverages</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/confectionery-bakery-products ">Confectionery
                                                        &amp; Bakery Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/edible-oil-allied-products ">Cooking
                                                        Oil</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/milk-dairy-products ">Dairy
                                                        Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/drinking-water ">Drinking
                                                        Water </a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/energy-drinks ">Energy
                                                        Drinks</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/packaged-food-products-supplies ">Packaged
                                                        Food Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/namkeen-snacks ">Snacks</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/spices-seasoning ">Spices
                                                    </a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/tea-coffee-products ">Tea
                                                        &amp; Coffee Products</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="https://www.dealerindia.com/dir/health-beauty">Health &amp;
                                                    Beauty</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/bath-products ">Bath
                                                        Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/cosmetics ">Cosmetics</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/hair-care-products ">Hair
                                                        Care Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/healthcare-medical-products ">Healthcare
                                                        &amp; Medical Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/herbal-ayurvedic-homeopathic-natural-care-products ">Herbal,
                                                        Ayurvedic, Homeopathic &amp; Natural Care Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/perfumes-fragrances ">Perfumes
                                                        &amp; Fragrances</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/personal-care-products ">Personal
                                                        Care Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/sanitation-products ">Sanitation
                                                        Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/skincare-products ">Skincare
                                                        Products</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="https://www.dealerindia.com/dir/healthcare-medical-products">Health-care,
                                                    Medical, Pharma &amp; Drugs</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/herbal-ayurvedic-homeopathic-natural-care-products ">Herbal,
                                                        Ayurvedic, Homeopathic &amp; Natural Care Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/skincare-products ">Skincare
                                                        Products</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="https://www.dealerindia.com/dir/home-supplies">Home
                                                    Supplies</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/bags-luggage ">Bags &amp;
                                                        Luggage</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/bed-linen-bed-sheet-pillow-cover-quilts ">Bed
                                                        Linen Bed Sheet, Pillow Cover, Quilts</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/cookware-cutlery-crockery-tableware ">Cutlery,
                                                        Crockery &amp; Tableware</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/electric-fittings-accessories ">Electric
                                                        Fittings &amp; Accessories</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/gifts-crafts-handicrafts-artifacts ">Handicraft
                                                        Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/house-keeping-cleaning-products-equipments ">Home
                                                        Cleaning Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/home-furnishing-items ">Home
                                                        Furnishing </a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/home-furniture ">Home
                                                        Furniture</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/household-consumer-products ">Household
                                                        &amp; Consumer Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/home-kitchen-appliances ">Kitchen
                                                        Appliances / Cookware</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/religious-products ">Religious
                                                        Products</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="https://www.dealerindia.com/dir/industrial-supplies">Industrial
                                                    Machinery</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/agriculture-machine-tools-equipments ">Agriculture
                                                        Machine &amp; Tools</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/cranes-forklifts ">Cranes
                                                        &amp; Forklifts</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/food-processing-plants-machinery ">Food
                                                        Processing Plant &amp; Machinery</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/pollution-control-monitoring-machinery-equipments ">Pollution
                                                        Control Machinery</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/printing-machinery-equipments ">Printing
                                                        Machinery &amp; Equipments</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/water-treatment-purifying-plant ">Water
                                                        Treatment &amp; Purifying Plant</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/welding-soldering-machines-equipments ">Welding
                                                        Equipment &amp; Machinery</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="https://www.dealerindia.com/dir/industrial-supplies">Industrial
                                                    Supplies</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/energy-management-systems ">Energy
                                                        Management Systems</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/fibre-glass-products ">Fibre
                                                        Glass Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/hardware-tools ">Hardware
                                                        &amp; Tools</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/packaging-material-supplies ">Packaging
                                                        Material</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/printing-binding-material-services ">Printing
                                                        Material</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/solar-energy-components ">Solar
                                                        Energy &amp; Components</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="https://www.dealerindia.com/dir/medical-hospital-supplies">Medical
                                                    &amp; Hospital Supplies</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/hospital-equipments ">Hospital
                                                        Equipments</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/laboratory-equipments-instruments ">Laboratory
                                                        Equipments &amp; Instruments</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/medical-equipments ">Medical
                                                        Equipments</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="https://www.dealerindia.com/dir/office-school-supplies">Office
                                                    Supplies</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/eletronic-electrical-equipments ">Electrical
                                                        Equipments</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/eletronic-electrical-equipments ">Office
                                                        Equipmet &amp; Supplies</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/office-school-commercial-furniture ">Office
                                                        Furniture</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/office-stationery ">Office
                                                        Stationery</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/computer-parts-accessories ">Printers
                                                        &amp; Scanners</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="https://www.dealerindia.com/dir/security-protection">Security
                                                    &amp; Protection</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/fire-fighting-fire-protection-equipments ">Fire
                                                        Fighting &amp; Fire Protection Equipments</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.dealerindia.com/dir/surveillance-equipments-parts ">Surveillance
                                                        Equipments</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="https://www.dealerindia.com/dir/sports-fitness-entertainment">Sports,
                                                    Fitness &amp; Entertainment</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>

                                            </ol>
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <label for="folder1">
                                        <a target="_blank"
                                            href="/business-opportunities/education.m3
                               ">Education</a>
                                    </label> <input type="checkbox" id="folder1">
                                    <ol>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/coaching-and-tutoring.sc19">Coaching
                                                    &amp; Tutoring</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/cad-cam-cae-multimedia.ssc733 ">CAD/CAM/CAE
                                                        &amp; Multimedia</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/competitive-exam-coaching-institute.ssc89 ">Competitive
                                                        Exam Coaching Institute</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/online-coaching.ssc90 ">Online
                                                        Coaching</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/robotics-technical-training-coding-ai.ssc91 ">Robotics,
                                                        Technical Training, Coding, AI</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/school-tutoring.ssc92 ">School
                                                        Tutoring</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/early-education.sc17">Early
                                                    Education</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/activity-centres-day-care-creches.ssc86 ">Activity
                                                        Centres, Day Care &amp; Creches</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/after-school-activities.ssc87 ">After
                                                        School Activities</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/preschools.ssc85 ">Preschools</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/education-consultants.sc264">Education
                                                    Consultants</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/career-counselling-and-brain-programming.ssc265 ">Career
                                                        Counselling &amp; Brain Programming</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/education-services.sc269">Education
                                                    Services</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/education-supplies.ssc270 ">Education
                                                        Supplies</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/mobile-application-services.ssc734 ">Mobile
                                                        Application Services</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/higher-education.sc20">Higher
                                                    Education</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/degree-diploma-colleges.ssc94 ">Degree/Diploma
                                                        Colleges</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/distance-learning-centres.ssc96 ">Distance
                                                        Learning Centres</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/professional-education-colleges.ssc93 ">Professional
                                                        Education Colleges</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/universities.ssc95 ">Universities
                                                        (including Overseas Franchises)</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/k-12-education.sc18">K-12
                                                    Education</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/extra-curriculum-activities.ssc261 ">Extra
                                                        Curriculum Activities</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/schools.ssc88 ">Schools</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/online-education.sc22">Online
                                                    Education</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/certification-course-coaching.ssc536 ">Certification
                                                        Course Coaching</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/corporate-training.ssc534 ">Corporate
                                                        Training</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/entrance-examination-coaching.ssc532 ">Entrance
                                                        Examination Coaching</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/foreign-language-coaching.ssc533 ">Foreign
                                                        Language Coaching</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/online-learning-e-learning.ssc107 ">Online
                                                        Learning/E-learning</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/others-online-education.ssc108 ">Other
                                                        Online Education</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/professional-education-coaching.ssc537 ">Professional
                                                        Education Coaching</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/vocational-training.sc21">Vocational
                                                    Training</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/aviation-and-hospitality-training-institute.ssc104 ">Aviation
                                                        &amp; Hospitality Training Institute</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/bpo-kpo-training-institutes.ssc98 ">BPO/KPO
                                                        Training Institutes</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/banking-and-insurance-training-institute.ssc103 ">Banking
                                                        &amp; Insurance Training Institute</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/beauty-and-wellness-training-institute.ssc102 ">Beauty
                                                        &amp; Wellness Training Institute</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/financial-advisory.ssc100 ">Financial
                                                        Advisory</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/hr-certification-institute.ssc723 ">HR
                                                        Certification Institute</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/it-education.ssc99 ">IT
                                                        Education</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/language-schools.ssc97 ">Language
                                                        Schools</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/others-vocational-training.ssc106 ">Other
                                                        Vocational Training</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/paramedical-medical-training.ssc968 ">Paramedical/Medical
                                                        Training</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/retail-training-institutes.ssc101 ">Retail
                                                        Training Institutes</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/personality-development.ssc105 ">Skills
                                                        / Personality Development</a>
                                                </li>

                                            </ol>
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <label for="folder1">
                                        <a target="_blank"
                                            href="/business-opportunities/fashion.m10
                               ">Fashion</a>
                                    </label> <input type="checkbox" id="folder1">
                                    <ol>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/accessories.sc44">Accessories</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/fashion-accessories.ssc248 ">Fashion
                                                        Accessories</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/leather-products.ssc339 ">Leather
                                                        Products (bags, Purses &amp; Belts)</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/luggage-and-hand-bags.ssc247 ">Luggage,
                                                        Hand Bags &amp; Backpacks</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/opticians-eye-wear.ssc246 ">Opticians/Eye
                                                        Wear</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/watches.ssc340 ">Watches</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/clothing.sc40">Clothing</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/departmental-unisex.ssc228 ">Departmental/Unisex</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/ethnic-stores.ssc229 ">Ethnic
                                                        Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/kids-wear.ssc225 ">Kids Wear</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/lingerie-and-innerwear.ssc232 ">Lingerie
                                                        &amp; Innerwear</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/mens-wear.ssc226 ">Mens Wear</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/others-clothing.ssc233 ">Others
                                                        Clothing</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/readymade.ssc230 ">Readymade</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/sports-wear.ssc335 ">Sports
                                                        Wear</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/textiles.ssc224 ">Textiles</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/womens-wear.ssc227 ">Womens
                                                        Wear</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/footwear.sc41">Footwear</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/casuals.ssc235 ">Casuals</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/designer.ssc237 ">Designer</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/formals.ssc234 ">Formals</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/kids.ssc238 ">Kids</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/sports.ssc236 ">Sports</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/jewellery.sc42">Jewellery</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/diamond-and-platinum-wears.ssc338 ">Diamond
                                                        &amp; Platinum Wears</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/gems-and-stones.ssc240 ">Gems
                                                        And Stones</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/imitation-art-junk-jewellery.ssc239 ">Imitation/Art/Junk
                                                        Jewellery</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/precious-jewellery.ssc241 ">Precious
                                                        Jewellery</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/luxury-premium.sc43">Luxury/Premium</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/designer-wear.ssc243 ">Designer
                                                        Wear</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/luxury-labels.ssc245 ">Luxury
                                                        Labels</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/vintage-stores.ssc244 ">Vintage
                                                        Stores</a>
                                                </li>

                                            </ol>
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <label for="folder1">
                                        <a target="_blank"
                                            href="/business-opportunities/food-and-beverage.m2
                               ">Food
                                            And Beverage</a>
                                    </label> <input type="checkbox" id="folder1">
                                    <ol>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/bakery-sweets-and-ice-cream.sc424">Bakery,
                                                    Sweets &amp; Ice Cream</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/bakery-and-confectionary.ssc437 ">Bakery
                                                        &amp; Confectionary</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/chocolate-stores.ssc439 ">Chocolate
                                                        Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/ice-creams-and-yogurt-parlors.ssc436 ">Ice
                                                        Creams &amp; Yogurt Parlors</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/snacks-namkeen-shops.ssc438 ">Snacks
                                                        / Namkeen Shops</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/sweetshop.ssc440 ">Sweetshop</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/cafe-and-parlors.sc421">Cafe &amp;
                                                    Parlors</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/juices-smoothies-dairy-parlors.ssc426 ">Juices
                                                        / Smoothies / Dairy Parlors</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/tea-and-coffee-chain.ssc427 ">Tea
                                                        And Coffee Chain</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/catering-and-food-ordering.sc425">Catering
                                                    &amp; Food Ordering</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/catering.ssc441 ">Catering</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/online-food-ordering-services.ssc442 ">Online
                                                        Food Ordering Services</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/food-and-beverage.sc16">Food &amp;
                                                    Beverage</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/hotel-equipment-and-supplier.ssc972 ">Hotel
                                                        Equipment and Supplier</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/others-food-service.ssc84 ">Others
                                                        Food Service</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/quick-bites.sc422">Quick
                                                    Bites</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/express-food-joints-drive-through.ssc429 ">Express
                                                        Food Joints / Drive Through</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/mobile-vans-and-food-trucks.ssc430 ">Mobile
                                                        Vans &amp; Food Trucks</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/pizzeria.ssc724 ">Pizzeria</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/quick-service-restaurants.ssc428 ">Quick
                                                        Service Restaurants</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/restaurant-and-night-clubs.sc423">Restaurant
                                                    &amp; Night Clubs</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/bars-pubs-and-lounge.ssc435 ">Bars,
                                                        Pubs &amp; Lounge</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/casual-dine-restaurants.ssc432 ">Casual
                                                        Dine Restaurants</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/fine-dine-restaurants.ssc431 ">Fine
                                                        Dine Restaurants</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/multi-cuisine-restaurant.ssc433 ">Multi
                                                        Cuisine Restaurant</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/theme-restaurants.ssc434 ">Theme
                                                        Restaurants</a>
                                                </li>

                                            </ol>
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <label for="folder1">
                                        <a target="_blank"
                                            href="/business-opportunities/home-based-business.m7
                               ">Home
                                            Based Business</a>
                                    </label> <input type="checkbox" id="folder1">
                                    <ol>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/beauty-and-fitness.sc276">Beauty
                                                    &amp; Fitness</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/personal-trainer.ssc315 ">Personal
                                                        Trainer (fitness/health Recovery)</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/business-services.sc281">Business
                                                    Services</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/astrology-and-tarot.ssc292 ">Astrology
                                                        &amp; Tarot</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/business-planner.ssc295 ">Business
                                                        Planner</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/consulting-services.ssc300 ">Consulting
                                                        Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/direct-selling.ssc293 ">Direct
                                                        Selling (Door-to-Door Etc.)</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/event-planning.ssc296 ">Event
                                                        Planning</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/financial-planner.ssc302 ">Financial
                                                        Planner (CFA)</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/mlm-businesses.ssc294 ">MLM
                                                        Businesses</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/matrimonial.ssc304 ">Matrimonial</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/part-time-flexi-time-businesses.ssc301 ">Part
                                                        Time / Flexi Time Businesses</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/trading-expert.ssc303 ">Trading
                                                        Expert</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/warehousing-services.ssc299 ">Warehousing
                                                        Services</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/home-based-businesses.sc32">Home
                                                    Based Businesses</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/boutique.ssc166 ">Boutique</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/consulting.ssc164 ">Consulting</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/direct-selling.ssc167 ">Direct
                                                        Selling (Door-to-Door Etc.)</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/mlm-businesses.ssc168 ">MLM
                                                        Businesses</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/others-home-based-businesses.ssc169 ">Others
                                                        Home Based Businesses</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/part-time-flexi-time-businesses.ssc165 ">Part
                                                        Time/Flexi Time Businesses</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/home-based-food-preparation.sc277">Home
                                                    Based Food Preparation</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/bakery-items-preparation.ssc320 ">Bakery
                                                        Items Preparation</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/processed-food-manufacturing.ssc321 ">Processed
                                                        Food Manufacturing</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/home-based-manufacturing.sc278">Home
                                                    Based Manufacturing</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/costume-stitching.ssc324 ">Costume
                                                        Stitching (Boutique)</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/furniture-works.ssc330 ">Furniture
                                                        Works</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/gift-item-making-and-selling.ssc325 ">Gift
                                                        Item Making &amp; Selling</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/handicraft-making-and-selling.ssc331 ">Handicraft
                                                        Making &amp; Selling</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/machinery-spare-parts-making.ssc327 ">Machinery
                                                        Spare Parts Making</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/religious-material-manufacturing.ssc322 ">Religious
                                                        (Pooja) Material Manufacturing</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/home-based-tutoring.sc279">Home
                                                    Based Tutoring</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/dance-coaching-classes.ssc334 ">Dance
                                                        Coaching Classes</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/school-tutoring.ssc333 ">School
                                                        Tutoring</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/home-care-services.sc275">Home Care
                                                    Services</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/cleaning-service.ssc307 ">Cleaning
                                                        Service</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/day-care-services.ssc312 ">Day-care
                                                        Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/home-appliance-repair.ssc310 ">Home
                                                        Appliance Repair</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/interior-decorator.ssc308 ">Interior
                                                        Decorator</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/logistics-packers-and-movers.ssc313 ">Logistics
                                                        Packers &amp; Movers (inter/intra City)</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/property-management.ssc309 ">Property
                                                        Management</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/senior-citizen-home-healthcare-services.ssc311 ">Senior
                                                        Citizen Home Healthcare Services</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/repair-services.sc280">Repair
                                                    Services</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/electronics-repair.ssc397 ">Electronics
                                                        Repair</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/home-appliance-repair.ssc398 ">Home
                                                        Appliance Repair</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/technology-related.sc274">Technology
                                                    Related</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/application-designer.ssc287 ">Application
                                                        Designer</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/data-entry-services.ssc288 ">Data
                                                        Entry Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/internet-blogger.ssc284 ">Internet
                                                        Blogger</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/video-making-services.ssc289 ">Video
                                                        Making Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/web-based-platform.ssc336 ">Web
                                                        Based Platform</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/web-application-services.ssc285 ">Web
                                                        Designer / Website Developer</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/youtube-blogger.ssc283 ">YouTube
                                                        Blogger</a>
                                                </li>

                                            </ol>
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <label for="folder1">
                                        <a target="_blank"
                                            href="/business-opportunities/hotels-and-resorts.m263
                               ">Hotel,
                                            Travel &amp; Tourism</a>
                                    </label> <input type="checkbox" id="folder1">
                                    <ol>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/hotels-and-resorts.sc15">Hotels
                                                    &amp; Resorts</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/booking-and-accomodation.ssc393 ">Booking
                                                        &amp; Accomodation</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/guest-house-service-apartments.ssc65 ">Guest
                                                        House / Service Apartments</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/hotel-chain.ssc67 ">Hotel
                                                        Chain</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/hotel-supplier.ssc260 ">Hotel
                                                        Supplier</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/motels-and-b-and-b.ssc66 ">Motels
                                                        And B&amp;B</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/pg-services.ssc394 ">PG
                                                        Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/resort.ssc64 ">Resort</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/taxi-and-rental.sc379">Taxi &amp;
                                                    Rental</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/cab-services.ssc549 ">Cab
                                                        Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/car-rental-services.ssc548 ">Car
                                                        Rental Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/corporate-charter-services.ssc384 ">Corporate
                                                        Charter Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/ticketing-services.ssc382 ">Ticketing
                                                        Services</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/tourism-services.sc380">Tourism
                                                    Services</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/adventure-tourism.ssc390 ">Adventure
                                                        Tourism</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/business-tourism.ssc391 ">Business
                                                        Tourism</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/holiday-services.ssc389 ">Holiday
                                                        Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/honeymoon-services.ssc388 ">Honeymoon
                                                        Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/online-travel-services.ssc385 ">Online
                                                        Travel Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/passport-and-visa-services.ssc387 ">Passport
                                                        &amp; Visa Services</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/tour-packages.ssc392 ">Tour
                                                        Packages</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/travel-agents.ssc386 ">Travel
                                                        Agents</a>
                                                </li>

                                            </ol>
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <label for="folder1">
                                        <a target="_blank"
                                            href="/business-opportunities/retail.m9
                               ">Retail</a>
                                    </label> <input type="checkbox" id="folder1">
                                    <ol>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/books-toys-and-gifts.sc36">Books,
                                                    Toys &amp; Gifts</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/book-stores.ssc197 ">Book
                                                        Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/candle-stores.ssc204 ">Candle
                                                        Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/corporate-gifting.ssc732 ">Corporate
                                                        Gifting</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/deal-value-stores.ssc206 ">Deal/Value
                                                        Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/florists.ssc207 ">Florists</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/gift-shops-and-card-galleries.ssc199 ">Gift
                                                        Shops &amp; Card Galleries</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/kids-candy-stores.ssc200 ">Kids/Candy
                                                        Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/kiosks.ssc202 ">Kiosks</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/party-supplies.ssc268 ">Party
                                                        Supplies</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/souvenir-shops.ssc203 ">Souvenir
                                                        Shops</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/stationery-stores.ssc198 ">Stationery
                                                        Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/toy-shops.ssc201 ">Toy Shops</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/consumer-durables-and-it.sc34">Consumer
                                                    Durables &amp; It</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/computers-and-peripherals.ssc178 ">Computers
                                                        &amp; Peripherals</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/consumer-electronics.ssc177 ">Consumer
                                                        Electronics</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/dvd-rentals.ssc180 ">DVD
                                                        Rentals</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/mobile-and-communication-internet-connections.ssc179 ">Mobile
                                                        &amp; Communication/Internet Connections</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/music-equipment-and-music-stores.ssc181 ">Music
                                                        Equipment &amp; Music Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/other-electronics-and-electrical-prod.ssc185 ">Other
                                                        Electronics &amp; Electrical Prod</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/photography.ssc184 ">Photography</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/web-design-and-applications.ssc183 ">Web
                                                        Design &amp; Applications</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/e-retail.sc39">E-Retail</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/e-commerce-and-related.ssc223 ">E-Commerce
                                                        &amp; Related</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/mobile-commerce.ssc557 ">Mobile
                                                        Commerce</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/tv-web-shopping.ssc222 ">TV/Web
                                                        Shopping</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/fashion.sc556">Fashion</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/bags-and-luggage.ssc566 ">Bags
                                                        &amp; Luggage</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/designer-jewellery.ssc564 ">Designer
                                                        Jewellery</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/fashion-accessories-men.ssc562 ">Fashion
                                                        Accessories - Men</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/fashion-accessories-women.ssc563 ">Fashion
                                                        Accessories - Women</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/kids-and-children-clothing.ssc565 ">Kids
                                                        &amp; Children Clothing</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/mens-clothing.ssc558 ">Men's
                                                        Clothing</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/mens-footwear.ssc559 ">Men's
                                                        Footwear</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/womens-clothing.ssc560 ">Women's
                                                        Clothing</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/womens-footwear.ssc561 ">Women's
                                                        Footwear</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/home-and-office.sc38">Home &amp;
                                                    Office</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/art-craft-antique-and-framing.ssc215 ">Art,
                                                        Craft, Antique &amp; Framing</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/bathroom-and-ceramics.ssc211 ">Bathroom
                                                        &amp; Ceramics</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/building-material-stores.ssc221 ">Building
                                                        Material Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/furniture-home-decor-and-furnishing.ssc213 ">Furniture/Home
                                                        Decor &amp; Furnishing</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/garden-stores.ssc220 ">Garden
                                                        Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/handicrafts.ssc217 ">Handicrafts</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/hardware-stores.ssc214 ">Hardware
                                                        Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/home-security.ssc216 ">Home
                                                        Security</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/kitchen.ssc212 ">Kitchen</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/lighting-electrical-and-plumbing.ssc218 ">Lighting,
                                                        Electrical &amp; Plumbing</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/painting.ssc219 ">Painting</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/supermarkets-and-marts.sc35">Supermarkets
                                                    &amp; Marts</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/dairy-f-and-v-stores.ssc192 ">Dairy/F&amp;V
                                                        Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/department-and-convenience-stores.ssc187 ">Department
                                                        &amp; Convenience Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/food-marts.ssc190 ">Food
                                                        Marts</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/gourmet-stores.ssc195 ">Gourmet
                                                        Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/grocery-stores.ssc188 ">Grocery
                                                        Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/kiosks.ssc189 ">Kiosks</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/meat-and-chicken-shops.ssc193 ">Meat
                                                        &amp; Chicken Shops</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/organic-products.ssc196 ">Organic
                                                        Products</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/pet-stores.ssc191 ">Pet
                                                        Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/superstores.ssc186 ">Superstores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/wine-shops.ssc194 ">Wine
                                                        Shops</a>
                                                </li>

                                            </ol>
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <label for="folder1">
                                        <a target="_blank"
                                            href="/business-opportunities/sports-fitness-and-entertainment.m11
                               ">Sports,
                                            Fitness &amp; Entertainment</a>
                                    </label> <input type="checkbox" id="folder1">
                                    <ol>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/entertainment-and-leisure.sc45">Entertainment
                                                    &amp; Leisure</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/amusement-centres.ssc253 ">Amusement
                                                        Centres</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/childrens-park-amenities.ssc377 ">Children's
                                                        Park Amenities</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/clubs.ssc254 ">Clubs</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/kids-entertainment-zones.ssc251 ">Kids
                                                        Entertainment Zones</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/movies-multiplex.ssc249 ">Movies
                                                        (Multiplex)</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/others-entertainment-and-leisure.ssc255 ">Others
                                                        Entertainment &amp; Leisure</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/sports-and-gaming.ssc250 ">Sports
                                                        &amp; Gaming</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/video-game-centres.ssc252 ">Video
                                                        Game Centres</a>
                                                </li>

                                            </ol>
                                        </li>
                                        <li>
                                            <label for="subsubfolder1">
                                                <a target="_blank"
                                                    href="/business-opportunities/sports-goods-and-fitness-stores.sc37">Sports
                                                    Goods &amp; Fitness Stores</a></label>
                                            <input type="checkbox" id="subsubfolder1">
                                            <ol>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/adventurous-sporting.ssc372 ">Adventurous
                                                        Sporting</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/diet-supplimentary.ssc373 ">Diet
                                                        Supplimentary</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/fitness-accessories.ssc374 ">Fitness
                                                        Accessories</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/fitness-equipment-stores.ssc209 ">Fitness
                                                        Equipment Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/golf-stores.ssc208 ">Golf
                                                        Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/sports-accessories.ssc376 ">Sports
                                                        Accessories</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/sports-equipment-stores.ssc210 ">Sports
                                                        Equipment Stores</a>
                                                </li>
                                                <li>
                                                    <a target="_blank"
                                                        href="/business-opportunities/sports-garments.ssc375 ">Sports
                                                        Garments</a>
                                                </li>

                                            </ol>
                                        </li>
                                    </ol>
                                </li>
                                <li>

                                    <span class="shaicon">
                                        <div class="rightdimg"></div>
                                    </span>
                                    <a target="_blank"
                                        href="https://www.franchiseindia.com/business-opportunities/lowcost">Low
                                        Cost Business Opportunities</a>
                                </li>
                            </ol>

                        </div>


                        <div class="busheadmebu martop">Our Group website
                        </div>
                        <ul class="list-unstyled components border-bottom-1">

                            <li><a target="_blank" href="https://www.franchiseindia.com/"
                                    rel="nofollow">franchiseindia.com</a></li>
                            <li><a target="_blank" href="https://www.entrepreneur.com/"
                                    rel="nofollow">entrepreneur.com</a></li>
                            <li><a target="_blank" href="https://www.indianretailer.com/"
                                    rel="nofollow">indianretailer.com</a></li>

                            <li><a target="_blank"
                                    href="https://restaurant.indianretailer.com">restaurantindia.in</a></li>
                            <li><a target="_blank"
                                    href="https://www.opportunityindia.com/english/tag/health-and-wellness">wellnessindia.org</a>
                            </li>
                            <li><a target="_blank"
                                    href="https://www.opportunityindia.com/english/tag/education">educationbiz.com</a>
                            </li>
                            <!--<li><a target="_blank" href="https://www.franchise.ae/" rel="nofollow">franchise.ae</a></li>-->
                            <li><a target="_blank" href="https://www.franchisebangladesh.com/"
                                    rel="nofollow">franchisebangladesh.com</a>
                            </li>
                            <li><a target="_blank" href="https://www.businessex.com/"
                                    rel="nofollow">businessex.com</a></li>
                            <li><a target="_blank" href="https://www.licenseindia.com/"
                                    rel="nofollow">licenseindia.com</a></li>
                            <li><a target="_blank" href="https://www.bradfordlicenseindia.com/"
                                    rel="nofollow">bradfordlicenseindia.com</a>
                            </li>
                            <li><a target="_blank" href="https://www.franchiseindia.net/"
                                    rel="nofollow">franchiseindia.net</a></li>
                            <li><a target="_blank" href="https://www.franchiseindia.in/"
                                    rel="nofollow">franchiseindia.in</a></li>
                            <li><a target="_blank" href="https://www.francorp.in/" rel="nofollow">francorp.in</a>
                            </li>
                            <li><a target="_blank" href="https://www.franglobal.com/"
                                    rel="nofollow">franglobal.com</a></li>
                            <li><a target="_blank" href="http://www.franchiseindiaventures.com/"
                                    rel="nofollow">franchiseindiaventures.com</a></li>
                            <li><a target="_blank" href="https://www.gauravmarya.com/"
                                    rel="nofollow">gauravmarya.com</a></li>
                            <li><a target="_blank" href="https://www.franchiseafrica.co/"
                                    rel="nofollow">franchiseafrica.co</a></li>
                        </ul>
                        <ul class="list-unstyled components border-bottom-1">

                            <li>
                                <a href="https://www.businessex.com/" target="_blank">Sell your Business</a>
                            </li>
                            <li>
                                <a href="https://www.licenseindia.com/" target="_blank"> Buy a Brand License</a>
                            </li>
                            <li><a href="#expandFranchise" target="_blank">Expand Your Franchise</a></li>


                            <li><a href="https://www.franchiseindia.com/property-loan" target="_blank">Loan Against
                                    Property</a></li>
                        </ul>
                        <ul class="list-unstyled components border-bottom-1">
                            <li><a href="https://www.franchiseindia.com/advertise-with-us-payment"
                                    target="_blank">Advertise With
                                    us</a></li>
                            <li><a href="https://master.franchiseindia.com/magazine-subscribe/"
                                    target="_blank">Subscribe Magazine</a>
                            </li>
                            <li><a href="https://www.franchiseindia.com/book" target="_blank">Reports
                                    &amp; Books</a>
                            </li>
                            <li><a href="https://www.franchiseindia.com/event/" target="_blank">Event</a></li>

                        </ul>
                        <ul class="list-unstyled components">
                            <li><a href="https://www.franchiseindia.com/investor/create" target="_blank">Investor
                                    Signup</a></li>
                            <li><a href="https://www.franchiseindia.com/franchisor/registration/step/1"
                                    target="_blank">Franchisor
                                    Signup</a></li>
                            <li>
                                <div class="side-bar-social">
                                    <ul class="sidebar-social">
                                        <li>
                                            <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank">
                                                <img src="https://www.franchiseindia.com/newhomepage/assets/img/fb-icon.svg"
                                                    alt="facebook-icon" class="mCS_img_loaded">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/FranchiseIndia" target="_blank">
                                                <img src="https://www.franchiseindia.com/newhomepage/assets/img/twitter-icon.svg"
                                                    alt="twitter-icon" class="mCS_img_loaded">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/franchiseindia_/" target="_blank">
                                                <img src="https://www.franchiseindia.com/newhomepage/assets/img/instagram-icon.svg"
                                                    alt="instagram-icon" class="mCS_img_loaded">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.youtube.com/user/FranchiseIndia" target="_blank">
                                                <img src="https://www.franchiseindia.com/newhomepage/assets/img/you-tube-icon.svg"
                                                    alt="youtube-icon" class="mCS_img_loaded">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.linkedin.com/company/franchiseindia/"
                                                target="_blank">
                                                <img src="https://www.franchiseindia.com/newhomepage/assets/img/linkedin-new.svg"
                                                    alt="linkedin-icon" class="mCS_img_loaded">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="main-link">
                                    <ul class="main-link-section">
                                        <li><a href="https://www.franchiseindia.com/about" target="_blank">About
                                                us</a></li>
                                        <li><a href="https://www.franchiseindia.com/contact" target="_blank">Contact
                                                us</a></li>
                                        <li><a href="https://www.franchiseindia.com/feedback"
                                                target="_blank">Feedback</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="contact-us-section">
                                    Toll Free 1800 102 2007
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="mCSB_1_scrollbar_vertical"
                    class="mCSB_scrollTools mCSB_1_scrollbar mCS-minimal mCSB_scrollTools_vertical"
                    style="display: block;">
                    <div class="mCSB_draggerContainer">
                        <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                            style="position: absolute; min-height: 50px; display: block; height: 235px; max-height: 660px; top: 0px;">
                            <div class="mCSB_dragger_bar" style="line-height: 50px;"></div>
                        </div>
                        <div class="mCSB_draggerRail"></div>
                    </div>
                </div>
            </nav>
        </div>


    </div>
</div>



<div id="myModal" class="modal">
    <div class="modal-contents">
        <span id="modalClose" class="closes no-select">&times;</span>
        <p>Test</p>
    </div>
</div>



<div id="login-pnl" class="modal">
    <div class="modal-content">
        <span id="modalClose" class="close no-select">&times;</span>
        <div class="frgt-pwd" id="frg-pnl" style="display:none">
            <div class="ttl">Forgot Password</div>
            <div class="desc">
                Enter your email address associated with your
                Franchiseindia account and we&apos;ll send you a link
                to reset your password.
            </div>
            <div class="frm-pnl">
                <form class="form-horizontal" method="POST"
                    action="https://www.franchiseindia.com/password/email">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <div class="usersprite"></div>
                        </span>
                        <input type="hidden" name="_token" value="jUxKSCMRRT1DQshsrIhRrfaLvXLzrGG4BlitKAt6"
                            autocomplete="off"> <input id="email" type="email"
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
                <li id="loginactiveopen" class="active"><a href="#login" aria-controls="login" role="tab"
                        data-toggle="tab" id="loginactive" aria-expanded="true">LOGIN</a></li>
                <li id="registeractiveopen" class=""><a href="#register" aria-controls="register"
                        role="tab" data-toggle="tab" id="registeractive" aria-expanded="false">REGISTER</a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="login">
                    <form method="post" action="https://www.franchiseindia.com/loginform">
                        <input type="hidden" name="_token" value="jUxKSCMRRT1DQshsrIhRrfaLvXLzrGG4BlitKAt6"
                            autocomplete="off">
                        <div class="frm-pnl">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <div class="usersprite"></div>
                                </span>

                                <input type="text" class="form-control blur" required=""
                                    name="email_or_mobile" id="email_or_mobile"
                                    placeholder="Enter Your User ID or Mobile Number" onkeyup="checkInputType()">

                                <span class="vrfy" onclick="editMobileWider()" id="edit-mobile-wider"
                                    style="display:none">Edit</span>
                                <span class="vrfy" onclick="validateLoginMobileOTP()" id="get_otp_btn"
                                    style="display:none">Get OTP</span>
                            </div>
                            <div style="display:none; color:red;" id="mismatch-mob" class="login-pnl-error">This
                                mobile number
                                is not registered.</div>
                            <div class="input-group" id="password_group">
                                <span class="input-group-addon">
                                    <div class="pwdsprite"></div>
                                </span>
                                <input type="password" name="password" class="form-control blur"
                                    placeholder="Enter Your Password">
                            </div>

                            <div class="input-group" id="otp-block-wider" style="display: none;width:100%;">
                                <input type="text" name="otp" id="otp-insta-wider" maxlength="4"
                                    class="form-control blur" placeholder="Enter OTP" style="width:100%;">
                                <span class="vrfy" id="resend_otp" onclick="resendOTP()"
                                    style="display:none">Resend
                                    OTP</span>
                                <span class="vrfy" id="otp_timer"></span>
                            </div>

                            <button type="submit" id="sign_in_btn" class="btn btn-default btn-gry btn-prop">SIGN
                                IN</button>
                            <span class="pipe">|</span> <a class="frg-link" href="#"
                                onclick="frg_panel()">Forgot
                                Password</a>
                        </div>
                        <div class="popfi">
                            <div class="signpop"></div>
                            <div class="popleft">
                                <span>or Sign in With</span>
                                <ul class="socl">

                                    <li><a href="https://www.franchiseindia.com/auth/google"><img
                                                src="https://www.franchiseindia.com/newhomepage/assets/img/google.svg"
                                                alt="google" class=""></a></li>
                                </ul>
                            </div>
                            <div class="popright">New User <a href="#" id="loginselect1">Click here</a>
                            </div>
                        </div>
                    </form>

                </div>
                <div role="tabpanel" class="tab-pane" id="register">
                    <form class="form-horizontal" id="registration">
                        <div class="frm-pnl">
                            <div style="text-align:center">
                                <div><a href="https://www.franchiseindia.com/investor/create"
                                        class="btn btn-large btn-default
                                             btn-gry btn-prop">
                                        Start A Business
                                        Today <br><span>(Investor
                                            Registration) </span> </a>
                                </div>
                                <br>
                                <div><a href="https://www.franchiseindia.com/franchisor/registration/step/1"
                                        class="btn btn-large btn-default
                                             btn-gry btn-prop">Appoint
                                        Channel
                                        Partners <br><span> (Franchisor
                                            Registration) </span></a>
                                </div>
                                <br>
                                <div><a href="https://www.franchiseindia.com/franchisor/international-registration"
                                        class="btn btn-large btn-default
                                             btn-gry btn-prop">Appoint
                                        Channel
                                        Partners <br><span> (International Franchisor Registration)
                                        </span></a>
                                </div>
                                <br>
                                <div><a target="_blank" href="https://www.franchiseindia.com/property-loan"
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

<script>
    $(document).ready(function() {
        $("#myBtn").click(function(event) {
            showModal();
            event.stopPropagation();
        });

        $("#modalClose").click(function() {
            hideModal();
        });

        $(".modal-content").click(function(event) {
            event.stopPropagation();
        });

        $(document).click(function() {
            hideModal();
        });
    });

    function showModal() {
        $("#myModal").fadeIn('slow');
        $('.modal-content').css({
            'transform': 'translateY(-50px)',
            'transition': 'transform 0.3s ease'
        });
    }

    function hideModal() {
        $("#myModal").fadeOut('fast'); // Hide the modal quickly
        $('.modal-content').css({
            'transform': 'translateY(0px)', // Reset modal content position
            'transition': 'transform 0.3s ease' // Ensure transition is applied
        });
    }
</script>



<script type="text/javascript" async>
    document.addEventListener('DOMContentLoaded', function() {
        const myBtn = document.getElementById('myBtn');
        const modal = document.getElementById('login-pnl');
        const modalClose = document.getElementById('modalClose');
        const modalContent = document.querySelector('.modal-content');

        myBtn.addEventListener('click', function(event) {
            showModal();
            event.stopPropagation();
        });

        modalClose.addEventListener('click', function() {
            hideModal();
        });

        modalContent.addEventListener('click', function(event) {
            event.stopPropagation();
        });

        document.addEventListener('click', function() {
            hideModal();
        });

        function showModal() {
            modal.style.display = 'block'; // Show the modal
            modalContent.style.transform = 'translateY(-50px)'; // Move content up
            modalContent.style.transition = 'transform 0.3s ease'; // Add transition
        }

        function hideModal() {
            modal.style.display = 'none'; // Hide the modal
            modalContent.style.transform = 'translateY(0px)'; // Reset position
        }
    });
</script>


<script type="text/javascript" async>
    document.addEventListener('DOMContentLoaded', function() {
        const myBtns = document.getElementById('myBtns');
        const modals = document.getElementById('myModals');
        const modalCloses = document.getElementById('modalCloses');
        const modalContents = document.querySelector('.modal-contents');

        myBtns.addEventListener('click', function(event) {
            showModal();
            event.stopPropagation();
        });

        modalCloses.addEventListener('click', function() {
            hideModal();
        });

        modalContents.addEventListener('click', function(event) {
            event.stopPropagation();
        });

        document.addEventListener('click', function() {
            hideModal();
        });

        function showModal() {
            modals.style.display = 'block'; // Show the modal
            modalContents.style.transform = 'translateY(-50px)'; // Move content up
            modalContents.style.transition = 'transform 0.3s ease'; // Add transition
        }

        function hideModal() {
            modals.style.display = 'none'; // Hide the modal
            modalContents.style.transform = 'translateY(0px)'; // Reset position
        }
    });
</script>



<script type="text/javascript" async>
    document.addEventListener('DOMContentLoaded', function() {
        const myBtnss = document.getElementById('myBtnss');
        const modalss = document.getElementById('myModalss');
        const modalClosess = document.getElementById('modalClosess');
        const modalContentss = document.querySelector('.modal-contentss');

        myBtnss.addEventListener('click', function(event) {
            showModal();
            event.stopPropagation();
        });

        modalClosess.addEventListener('click', function() {
            hideModal();
        });

        modalContentss.addEventListener('click', function(event) {
            event.stopPropagation();
        });

        document.addEventListener('click', function() {
            hideModal();
        });

        function showModal() {
            modalss.style.display = 'block'; // Show the modal
            modalContentss.style.transform = 'translateY(-50px)'; // Move content up
            modalContentss.style.transition = 'transform 0.3s ease'; // Add transition
        }

        function hideModal() {
            modalss.style.display = 'none'; // Hide the modal
            modalContentss.style.transform = 'translateY(0px)'; // Reset position
        }
    });

    function getSubCategoryHeader1(value) {
        $.ajax({
            type: 'GET',
            url: '{{ url('getsubcategory') }}',
            data: {
                categoryID: value
            },
            success: function(data) {
                console.log(data);
                $("#getSubCategoryDataHeader1").html(data);
                //$("#getSubCategoryDataHeader2").html(data);
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
        function selectMax(selectmaxheaderval) {
            let amountConfigArr = '{"1":"Rs. 10000","3":"Rs. 50000","5":"Rs. 2lakh","7":"Rs. 5lakh","9":"Rs. 10lakh","11":"Rs. 20lakh","13":"Rs. 30lakh","15":"Rs. 50lakh","17":"Rs. 1 Cr.","19":"Rs. 2 Cr.","21":"Rs. 5 Cr."}';

            let maxAmount = $('#maxAmount');
            let getSlugAmount = '{"1":{"min":"10000","max":"50000"},"3":{"min":"50000","max":"200000"},"5":{"min":"200000","max":"500000"},"7":{"min":"500000","max":"1000000"},"9":{"min":"1000000","max":"2000000"},"11":{"min":"2000000","max":"3000000"},"13":{"min":"3000000","max":"5000000"},"15":{"min":"5000000","max":"10000000"},"17":{"min":"10000000","max":"20000000"},"19":{"min":"20000000","max":"50000000"},"21":{"min":"50000000","max":"100000000"}}';

            maxAmount.html("");
            selectmaxheaderval = parseInt(selectmaxheaderval);
            $.each(amountConfigArr, function (key, value) {
                if (key > selectmaxheaderval)
                    $('#maxAmount').append($("<option></option>").attr({
                        "value": key,
                        "slug": getSlugAmount[key]['min']
                    }).text(value));
            });
            if (selectmaxheaderval === 21)
                maxAmount.append($("<option></option>").attr("value", 21).text("Above"));
        }
    });
</script>
<script>
    function setCookie() {
        document.cookie = "accept_cookie=ok";
        $('#cookie').hide();
        const d = new Date();
        d.setTime(d.getTime() + (7*24*60*60*1000));
        let expires = "expires="+d.toUTCString();console.log(expires);
        document.cookie = "username=cookie_user;"+ expires + ";path=/";
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
<script>
    var otpInterval;

    function checkInputType() {
        var input = $('#email_or_mobile').val();
        var isEmail = validateEmail(input);

        if (isEmail) {
            $('#password_group').show();
            $('#get_otp_btn').hide();
            $('#sign_in_btn').prop('disabled', false);
        } else if (validateMobile(input)) {
            $('#password_group').hide();
            $('#get_otp_btn').show();
            $('#sign_in_btn').prop('disabled', true);
        } else {
            $('#password_group').show();
            $('#get_otp_btn').hide();
            $('#sign_in_btn').prop('disabled', false);
        }
    }

    function validateEmail(email) {
        var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    function validateMobile(mobile) {
        var re = /^\d{10}$/;
        return re.test(mobile);
    }

    function validateLoginMobileOTP() {
        var mobile = $('#email_or_mobile').val();
        $.ajax({
            type: 'get',
            url: '/login_verify_mobile',
            data: {
                mobile: mobile
            },
            success: function(data) {
                if (data.data == 0) {
                    $("#mismatch-mob").show();
                    $("#email_or_mobile").prop("readonly", true);
                    $("#sign_in_btn").prop("disabled", true);
                    $("#edit-mobile-wider").show();
                    $("#otp-block-wider").hide();
                    $("#get_otp_btn").hide();
                } else {
                    $("#email_or_mobile").prop("readonly", true);
                    $("#mismatch-mob").hide();
                    $("#sign_in_btn").prop("disabled", false);
                    $("#edit-mobile-wider").show();
                    $("#otp-block-wider").show();
                    $("#get_otp_btn").hide();
                    startOTPTimer();
                }
            }
        });
    }

    function editMobileWider() {
        $("#email_or_mobile").prop("readonly", false);
        $("#edit-mobile-wider").hide();
        $("#mismatch-mob").hide();
        $("#otp-block-wider").hide();
        $("#sign_in_btn").prop("disabled", true);
        clearInterval(otpInterval);
        $('#otp_timer').hide();
        $('#resend_otp').hide();
    }

    function startOTPTimer() {
        var timer = 60;
        $('#resend_otp').hide();
        $('#otp_timer').show();

        otpInterval = setInterval(function() {
            if (timer > 0) {
                timer--;
                $('#otp_timer').text(timer + 'sec');
            } else {
                clearInterval(otpInterval);
                $('#otp_timer').hide();
                $('#resend_otp').show();
                $("#sign_in_btn").prop("disabled", true);
            }
        }, 1000);
    }

    function resendOTP() {
        clearInterval(otpInterval);
        var mobile = $('#email_or_mobile').val();
        startOTPTimer();
        validateLoginMobileOTP();
    }
</script>


<script type="text/javascript">
    $(document).ready(function () {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});

//loging section sidebar
$(document).ready(function () {
    $("#sidebar-login").mCustomScrollbar({
        theme: "minimal"
    });

    $('#dismiss-login, .overlay').on('click', function () {
        $('#sidebar-login').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse-main-login').on('click', function () {
        $('#sidebar-login').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});

var header = $('.header');

$(window).scroll(function(e){
    if(header.offset().top !== 0){
        if(!header.hasClass('shadow')){
            header.addClass('shadow');
        }
    }else{
        header.removeClass('shadow');
    }
});
//search bar class
// $(document).scroll(function () {
//  myID = document.getElementById("search");
//  var a = function () {
//      var b = window.scrollY;
//      if (b >= 300) {
//          myID.className = "search show slide-right"
//      } else {
//          myID.className = "search hide"
//      }
//  };
//  window.addEventListener("scroll", a)
// });

var swiper = new Swiper('.swiper-container', {
    // mousewheel: true,
    loop: true,
    slidesPerView: 'auto',
    slidesPerView: 1.5,
    spaceBetween: 10,
    // init: false,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    // autoplay: {
    //     delay: 1000,
    //     disableOnInteraction: true,
    //   },
    scrollbar: {
        el: '.swiper-scrollbar',
        hide: true,
    },
    keyboard: {
        enabled: true,
    },
    breakpoints: {
      //samll
        '@0.00': {
        slidesPerView:  1.5,
        spaceBetween: 15,
      },
        //xs
      '@0.25': {
            slidesPerView:  1.5,
            spaceBetween: 15,
        },
        //tab-mini
        '@0.50': {
            slidesPerView:  1.5,
            spaceBetween: 15,
        },
        //ipad

        '@0.75': {
        slidesPerView: 2.5,
        spaceBetween: 15,
      },
        //desktop-mini
      '@1.00': {
        slidesPerView: 3.5,
        spaceBetween: 20,
      },
        //xl-lg desktop
      '@1.50': {
        slidesPerView: 4 ,
        spaceBetween: 25,
      },
    }
  });
  (function($) {
    "use strict";

    /*--/ Testimonials owl /--*/
    $('#testimonial-carousel').owlCarousel({
      margin: 0,
      autoplay: true,
      nav: true,
      animateOut: 'fadeOut',
      animateIn: 'fadeInUp',
      navText: ['<i class="ion-ios-arrow-back" aria-hidden="true"></i>', '<i class="ion-ios-arrow-forward" aria-hidden="true"></i>'],
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1,
        }
      }
    });

  })(jQuery);
</script>


<script type="text/javascript">
    /*<![CDATA[*/
    if (screen.width < 767) {
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

    function selectMax3(selectmaxheaderval) {
        let amountConfigArr = {"1":"Rs. 10000","3":"Rs. 50000","5":"Rs. 2lakh","7":"Rs. 5lakh","9":"Rs. 10lakh","11":"Rs. 20lakh","13":"Rs. 30lakh","15":"Rs. 50lakh","17":"Rs. 1 Cr.","19":"Rs. 2 Cr.","21":"Rs. 5 Cr."};
        let maxAmount = $('#maxAmount');
        let getSlugAmount = {"1":{"min":"10000","max":"50000"},"3":{"min":"50000","max":"200000"},"5":{"min":"200000","max":"500000"},"7":{"min":"500000","max":"1000000"},"9":{"min":"1000000","max":"2000000"},"11":{"min":"2000000","max":"3000000"},"13":{"min":"3000000","max":"5000000"},"15":{"min":"5000000","max":"10000000"},"17":{"min":"10000000","max":"20000000"},"19":{"min":"20000000","max":"50000000"},"21":{"min":"50000000","max":"100000000"}};
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


    function getSubCategoryHeader(value) {
        $.ajax({
            type: 'GET',
            url: 'https://www.franchiseindia.com/getsubcategory',
            data: {
                categoryID: value
            },
            success: function(data) {
               console.log(data);
                $("#getSubCategoryDataHeader2").html(data);
            }
        });
    }

    function getSubCatCategoryHeader(value) {
        $.ajax({
            type: 'GET',
            url: 'https://www.franchiseindia.com/getsubcatcategory',
            data: {
                subcategoryID: value
            },
            success: function(data) {
                $("#getSubCatCategoryDataHeader2").html(data);
            }
        });
    }

    function getcity(value) {
        $.ajax({
            type: 'GET',
            url: 'https://www.franchiseindia.com/getcitylist',
            data: {
                state: value
            },
            success: function(data) {
                $("#headercity2").html(data);
            }
        });
    }

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
    function customResetForm() {
    let form = document.getElementById('invform');

    // Reset the form
    form.reset();

    // Reset maxAmount select element to its default state
    let maxAmount = document.getElementById('maxAmount');
    maxAmount.innerHTML = '<option value="" hidden>Select Max Investment</option>';
}
    /*]]>*/
</script>
