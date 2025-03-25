@extends('layout.master')
@section('content')
    <!--TOP 200 FRANCHISE -->
    <style>
        .banner-line,
        .ttl-brnd-list {
            color: #fff;
            text-align: center
        }

        .ttl-brnd-list {
            display: none;
            transition: .5s;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 999;
            background-color: rgba(0, 0, 0, .8);
            padding: 30px 0;
            font-size: 25px;
            font-family: 'Open Sans Semibold', serif;
            left: 0
        }

        .mstick {
            position: sticky;
            top: 110px;
        }

        .list .finner .catbtn {
            margin: 0;
            float: right;
            transform: none;
            position: unset
        }

        .finner .catbtn {
            margin: 0;
            position: absolute;
            cursor: pointer;
            bottom: 2px;
            left: 50%;
            transform: translate(-50%, -1px)
        }

        .finner .catlistinfo.rm-elmnt .catlistdest .catbtn {
            margin-left: 0
        }

        .finner .catlistinfo.rm-elmnt {
            border: 0;
            margin-left: 0;
            padding-right: 15px;
            padding-left: 15px
        }

        .finner .catbtn input[type=checkbox],
        .innerloginblk {
            display: none
        }

        .finner .catbtn input[type=checkbox]+label {
            color: #000;
            font-family: Arial, sans-serif;
            font-size: 14px
        }

        .filter-head span {
            font-size: 15px;
            font-weight: normal;
            float: right;
            margin-top: 5px;
            background: #000000;
            padding: 4px 18px;
            border-radius: 5px;
            color: #ffffff;
        }

        .finner .catbtn input[type=checkbox]+label span {
            display: block;
            width: 140px;
            height: 34px;
            margin: auto;
            vertical-align: middle;
            background: url(https://www.franchiseindia.com/images/brand-btn.png) left top no-repeat;
            cursor: pointer
        }

        .finner .catbtn input[type=checkbox]:checked+label span {
            background-position: 0 -36px
        }

        .finner .catlistinfo:hover {
            -webkit-box-shadow: 0 0 15px 0 rgba(0, 0, 0, .2);
            -moz-box-shadow: 0 0 15px 0 rgba(0, 0, 0, .2);
            box-shadow: 0 0 15px 0 rgba(0, 0, 0, .2)
        }

        .more-franchise-rankings {
            background: #fff;
            padding: 20px;
            margin-top: 30px
        }

        .featured {
            width: 23px
        }

        .investment {
            width: 24px
        }

        .industry {
            width: 20px
        }

        .filter {
            width: 19px
        }

        .date {
            width: 27px;
        }

        .more-franchise-rankings h3 {
            color: #353535;
            margin-bottom: 25px
        }

        .more-franchise-rankings ul li a .bg-white {
            min-height: 98px
        }

        a.vall {
            background: #f5f5f5;
            display: block;
            font-size: 13px !important;
            padding: 11px 0 !important;
            min-height: auto;
            color: #292929 !important
        }

        .more-franchise-rankings ul {
            display: flex;
            margin-top: 20px;
            list-style: none;
            padding-left: 0;
            justify-content: space-between;
            flex-wrap: wrap
        }

        .buttons,
        .sort-row {
            justify-content: space-between;
            display: flex
        }

        .more-franchise-rankings ul li {
            /* width: 19%; */
            background: #fff;
            box-shadow: 0 0 20px 0 #f5f5f5;
            margin-bottom: 20px;
            border-radius: 5px
        }

        .more-franchise-rankings ul li a {
            padding: 7px;
            text-align: center;
            font-weight: 500;
            font-size: 13px;
            color: #626262
        }

        .top-two-hundred-wrap {
            background: #fff;
            padding: 30px
        }

        .top-two-banner {
            background: bottom/cover #16254c;
            padding: 50px;
            margin-top: 106px
        }

        .top-two-banner img {
            width: 300px;
            margin: auto;
            display: block
        }

        .banner-line {
            margin-top: 20px;
            font-size: 16px;
            font-weight: 300
        }

        .banner-line span {
            font-weight: 500;
            text-decoration: underline
        }

        .buttons {
            border-bottom: 1px solid #e7e7e7;
            padding-bottom: 5px
        }

        .buttons div {
            margin: 0 10px;
            color: #373737;
            cursor: pointer
        }

        .buttons span,
        .filter-head {
            font-size: 25px;
            color: #353535;
            font-weight: 600
        }

        .buttons div>* {
            pointer-events: none
        }

        .wrapper {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 15px;
            flex-wrap: nowrap
        }

        .wrapper.list {
            grid-template-columns: 1fr
        }

        .buttons span {
            width: 92%;
            padding-left: 10px
        }

        .wrapper .col {
            width: 22.8%;
            border-radius: 5px;
            background: #fff;
            vertical-align: top;
            position: relative;
            display: inline-block;
            border: 1px solid #ddd;
            justify-content: center;
            align-items: center;
            color: #fffffa;
            margin: 5px;
            min-height: 259px
        }

        .finner,
        .list .col {
            display: block;
            width: 100%
        }

        .wrapper .col img {
            max-width: 100%
        }

        .filter-list-brand {
            background: #fff;
            border-radius: 5px;
            color: #545454;
            text-align: center;
            padding: 20px
        }

        .filter-list-brand .catlist {
            line-height: 20px;
            margin: 8px 0 12px
        }

        .filter-list-brand .catlist a {
            font-weight: 600;
            color: #313131;
            font-size: 16px
        }

        .filter-list-brand .catlisthead {
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 19px
        }

        a.bview {
            color: #777;
            background: 0 0;
            padding: 5px 20px;
            border-radius: 5px;
            display: inline-block;
            border: 1px solid #999;
            font-weight: 400
        }

        .list .col {
            text-align: left;
            background: #fff;
            min-height: auto;
            margin-bottom: 30px
        }

        .top-two-hundred-wrap .fa {
            font-size: 16px
        }

        .list .filter-list-brand {
            text-align: left;
            display: flex;
            align-items: center
        }

        .list .finfo {
            width: 60%
        }

        .main-filter-apply {
            padding: 10px;
            border: 1px solid #e3e3e3;
            border-radius: 3px;
            margin-bottom: 15px;
            margin-top: 10px
        }

        .wrapper a.bview {
            position: absolute;
            left: 50%;
            bottom: 10px;
            transform: translate(-50%, -10px);
            width: 120px;
            font-size: 13px
        }

        .list a.bview {
            height: 30px;
            width: 120px;
            text-align: center;
            position: unset;
            transform: none
        }

        .bottom-btns button {
            display: block;
            width: 170px;
            text-align: center;
            padding: 10px;
            font-size: 14px;
            align-content: center;

        }

        .list .catimg {
            margin-right: 25px;
            width: 215px
        }

        .reset-filters {
            font-weight: 500;
            font-size: 21px;
            color: #3a3a3a;
            margin-bottom: 25px;
            margin-top: 2px
        }

        .flabel {
            font-weight: 500;
            font-size: 16px;
            margin-bottom: 7px;
            color: #646464
        }

        .flabel img {
            display: none;
        }

        .form-controls {
            width: 100%;
            border: 1px solid #e3e3e3;
            border-radius: 3px;
            padding: 10px;
            margin-bottom: 16px;
            background: #fff;
            font-weight: 400
        }

        .lfirst {
            margin-top: 12px;
        }

        .filter-brand-apply {
            border-radius: 7px;
            padding: 0px
        }

        .no-pad-rgt {
            padding-right: 3px
        }

        .no-pad-lft {
            padding-left: 3px
        }

        .bottom-btns a:first-child {
            margin: 20px auto 10px;
            background: #151515;
            border-radius: 5px;
            color: #fff;
            font-weight: 400
        }

        .bottom-btns a:last-child {
            margin: 0 auto;
            border: 1px solid #505050;
            border-radius: 5px;
            color: #505050;
            font-weight: 400
        }

        @media screen and (min-width:1000px) and (max-width:1199px) {
            .wrapper .col {
                width: 100%
            }
        }

        @media screen and (min-width:768px) and (max-width:993px) {
            
            .mstick{position: unset;}
            .wrapper .col {
                width: 31.4%
            }

            .list .col {
                width: 100%
            }

            .more-franchise-rankings ul li {
                width: 32%
            }
        }

        @media screen and (max-width:768px) {
            .top-two-banner{margin-top: 66px;}
            .mstick{position: unset;}
            .finner .catbtn input[type=checkbox]+label span {
                width: 120px;
                background-size: cover;
                height: 30px
            }

            .finner .catbtn input[type=checkbox]:checked+label span {
                background-position: 0 -30px
            }

            .modal .close {
                right: -5px
            }

            .list .finner .catbtn {
                float: none
            }

            .list .finfo,
            .more-franchise-rankings ul li {
                width: 100%
            }

            .wrapper {
                margin-top: 15px
            }

            .finner {
                text-align: center
            }

            .list .filter-list-brand {
                display: block !important;
                text-align: center
            }

            .list .catimg {
                display: block;
                margin: auto
            }

            .buttons span,
            .filter-head {
                font-size: 20px;
                padding-left: 0
            }

            .banner-line {
                font-size: 17px
            }

            .buttons {
                margin-top: 20px
            }

            .list a.bview {
                position: unset !important;
                transform: none !important
            }

            .wrapper a.bview {
                position: absolute;
                left: 50%;
                bottom: 10px;
                transform: translate(-50%, -10px);
                width: 120px;
                font-size: 13px
            }

         
            .top-two-banner img {
                width: 209px
            }

            .wrapper .col {
                width: 48.49%;
                min-height: 276px;
                background: #fff;
                margin: 2px 0
            }

            .no-pad-rgt {
                padding-right: 0
            }

            .no-pad-lft {
                padding-left: 0
            }

            .reset-filters {
                font-size: 18px
            }

            .list .col {
                width: 100%;
                margin-bottom: 20px;
                min-height: auto;
                padding-bottom: 10px
            }

            .top-two-hundred-wrap .col-md-4,
            .top-two-hundred-wrap .col-md-8 {
                padding: 0 !important
            }

            .top-two-hundred-wrap {
                padding: 15px 30px
            }
        }

        .bg {
            margin-top: 120px;
            width: 100%
        }
    </style>
    <style>
        .city-icon {
            width: 80px;
            height: 80px;
            margin: auto;
            background: #f4f4f4;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .city-nam {
            margin-top: 10px;
        }

        ul li:nth-child(1) img {
            width: 38px;
        }

        ul li:nth-child(2) img {
            width: 46px;
        }

        ul li:nth-child(3) img {
            width: 45px;
        }

        ul li:nth-child(4) img {
            width: 38px;
        }

        ul li:nth-child(5) img {
            width: 46px;
        }

        ul li:nth-child(6) img {
            width: 45px;
        }

        ul li:nth-child(7) img {
            width: 46px;
        }

        ul li:nth-child(8) img {
            width: 34px;
        }

        ul li:nth-child(9) img {
            width: 45px;
        }

        ul li:nth-child(10) img {
            width: 34px;
        }
    </style>
    <!--TOP 200 FRANCHISE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <div class="loadman" id="loading" style="display:none">
        <div class="thanku">
            <div class="tbl-cell">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <div class="top-two-banner">
        <img src="{{ url('/topfranchiseleaders/logo.png') }}" alt="">
        {{-- <div class="banner-line">Learn how the <span>rankings are determined </span></div> --}}
    </div>
    <div class="container formsection margintop60 staicp">
        <div class="top-two-hundred-wrap">
            <div class="row">
                <div class="col-md-3 mstick">
                    <div class="filter-wrapper">
                        <div class="filter-brand-apply">
                            <div class="filter-head">Filter & Sort <span><a href="{{ url('topleaders') }}">Reset</a></span>
                            </div>
                            {{-- <div class="reset-filters">Reset Filters</div> --}}
                            <div class="flabel lfirst"><img src="{{ url('/topfranchiseleaders/dates.png') }}"
                                    class="date"> Sort By
                                Year</div>
                            <select id="yearSelect" class="form-controls">
                                {{-- <option value="">Select Year</option> --}}
                                @foreach ($years as $item)
                                    <option value="{{ $item->franchisor_year }}"
                                        {{ $item->franchisor_year == $year ? 'selected' : '' }}>
                                        {{ $item->franchisor_year }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="flabel">Franchise Type</div>
                            <select id="ftypeSelect" class="form-controls">
                                <option value="{{ $franchiseType }}">
                                    {{ $franchiseType == 'top-100' ? 'Top 100' : 'Top 200' }}
                                </option>
                            </select>
                            <div class="flabel"><img src="{{ url('/topfranchiseleaders/filter.png') }}" class="filter"> Sort
                                By
                            </div>
                            <div class="main-filter-apply">

                                <div class="sort-row">
                                    <label for="alphabetical">A-Z</label>
                                    <input type="radio" name="sortBy" id="alphabetical" value="alphabetical">
                                </div>
                                <div class="sort-row">
                                    <label for="investMin">Low to High $</label>
                                    <input type="radio" name="sortBy" id="investMin" value="investMin">
                                </div>
                                <div class="sort-row">
                                    <label for="investMax">High to Low $</label>
                                    <input type="radio" name="sortBy" id="investMax" value="investMax">
                                </div>
                            </div>
                            <div class="flabel"><img src="{{ url('/topfranchiseleaders/industry.png') }}" class="industry">
                                Industry</div>
                            @php
                                $categoryArr = Config('constants.CategoryArr');
                                asort($categoryArr);

                            @endphp
                            <select class="form-controls" name="industry_type" id="industry_type">
                                <option value="" selected>Select Industry</option>
                                @foreach ($categoryArr as $key => $catArr)
                                    <option value="{{ $key }}" slug="{{ Str::slug($catArr) }}">
                                        {{ $catArr }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="flabel"><img src="{{ url('/topfranchiseleaders/investment.png') }}"
                                    class="investment">
                                Investment Range</div>
                            <select class="form-controls pricings" id="investment_range" name="investment_range">
                                <option value="">Select Investment Range</option>
                                l
                                <option value="1">Rs. 10000 - 50000</option>
                                l
                                <option value="3">Rs. 50000 - 2 Lakh</option>
                                l
                                <option value="5">Rs. 2 Lakh - 5 Lakh</option>
                                l
                                <option value="7">Rs. 5 Lakh - 10 Lakh</option>
                                l
                                <option value="9">Rs. 10 Lakh - 20 Lakh</option>
                                l
                                <option value="11">Rs. 20 Lakh - 30 Lakh</option>
                                l
                                <option value="13">Rs. 30 Lakh - 50 Lakh</option>
                                l
                                <option value="15">Rs. 50 Lakh - 1 Cr</option>
                                l
                                <option value="17">Rs. 1 Cr - 2 Cr</option>
                                l
                                <option value="19">Rs. 2 Cr - 5 Cr</option>
                                l
                                <option value="21">Rs. 5 Cr above</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!--- Get Free Info stickely start here  -->
                @if (!Auth::check() || Auth::user()->profile_type == 1 || Auth::user()->mobile == '')
                    <div id="getFreeInfo" class="ttl-brnd-list">
                        <span class="count">0</span>Brands in my List
                        <a href="#" data-toggle="modal" data-target="#modalGetFree" id="getfreewindowstate">Request
                            Now</a>
                    </div>
                @else
                    <div id="getFreeInfo" class="ttl-brnd-list">
                        <div class="popblkbtm">
                            <div class="blkpop"> <span class="count">0</span>Brands in my List </div>
                            <form method="post" action="{{ URL('multipleInvFreeinfo') }}">
                                <input type="hidden" name="franchisors" id="franchisorsForInv">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="brandRequest" value="Apply Now" />
                            </form>
                        </div>
                    </div>
                @endif
                <!--- Get Free Info stickely end here  -->

                <div class="col-md-9">
                    @include('category.free-info')

                    <div class="buttons">
                        <span id="recordCount">{{ $count }} RESULTS</span>
                        <div class="list"><i class="fa fa-list"></i></div>
                        <div class="grid"><i class="fa fa-th-large"></i></div>
                    </div>
                    <div class="wrapper" id="wrapper">
                        @include('static.topfranchiseleaders.dynamicData')
                    </div>
                    {{-- @if ($count > 25)
                        <div class="bottom-btns"><button id="loadmore">More Results</button></div>
                    @endif --}}
                </div>
            </div>
        </div>
        <div class="more-franchise-rankings">
            <h3>Business Hotspots</h3>
            <ul>
                <li>
                    <a href="https://www.franchiseindia.com/business-opportunities/chandigarh.LOC5" aria-label=""
                        target="_blank">
                        <div class="city-icon"><img src="{{ url('topfranchiseleaders/images/city/chandigarh.png') }}"
                                alt="Chandigarh"></div>
                        <div class="city-nam">Chandigarh</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.franchiseindia.com/business-opportunities/gujarat.LOC9" aria-label=""
                        target="_blank">
                        <div class="city-icon"><img src="{{ url('topfranchiseleaders/images/city/gujarat.png') }}"
                                alt="Gujarat"></div>
                        <div class="city-nam">Gujarat</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.franchiseindia.com/business-opportunities/karnataka.LOC14" aria-label="" target="_blank">
                        <div class="city-icon"><img src="{{ url('topfranchiseleaders/images/city/karnataka.png') }}"
                                alt="Karnataka"></div>
                        <div class="city-nam">Karnataka</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.franchiseindia.com/business-opportunities/madhya-pradesh.LOC17" aria-label="" target="_blank">
                        <div class="city-icon"><img src="{{ url('topfranchiseleaders/images/city/madhya-pradesh.png') }}"
                                alt="Madhya Pradesh"></div>
                        <div class="city-nam">Madhya Pradesh</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.franchiseindia.com/business-opportunities/maharashtra.LOC18" aria-label="" target="_blank">
                        <div class="city-icon"><img src="{{ url('topfranchiseleaders/images/city/maharashtra.png') }}"
                                alt="Maharashtra"></div>
                        <div class="city-nam">Maharashtra</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.franchiseindia.com/business-opportunities/delhi.LOC23" aria-label="" target="_blank">
                        <div class="city-icon"><img src="{{ url('topfranchiseleaders/images/city/delhi.png') }}"
                                alt="Delhi"></div>
                        <div class="city-nam">Delhi</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.franchiseindia.com/business-opportunities/punjab.LOC26" aria-label="" target="_blank">
                        <div class="city-icon"><img src="{{ url('topfranchiseleaders/images/city/punjab.png') }}"
                                alt="Punjab"></div>
                        <div class="city-nam">Punjab</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.franchiseindia.com/business-opportunities/tamilnadu.LOC29" aria-label="" target="_blank">
                        <div class="city-icon"><img src="{{ url('topfranchiseleaders/images/city/tamil-nadu.png') }}"
                                alt="Tamil Nadu"></div>
                        <div class="city-nam">Tamil Nadu</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.franchiseindia.com/business-opportunities/uttar-pradesh.LOC32" aria-label="" target="_blank">
                        <div class="city-icon"><img src="{{ url('topfranchiseleaders/images/city/uttar-pradesh.png') }}"
                                alt="Uttar Pradesh"></div>
                        <div class="city-nam">Uttar Pradesh</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.franchiseindia.com/business-opportunities/telangana.LOC34" aria-label="" target="_blank">
                        <div class="city-icon"><img src="{{ url('topfranchiseleaders/images/city/telangana.png') }}"
                                alt="Telangana"></div>
                        <div class="city-nam">Telangana</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        var wrapper = document.getElementById("wrapper");

        // Set default view to list
        wrapper.classList.add("list");

        document.addEventListener("click", function(event) {
            if (event.target.matches(".list")) {
                event.preventDefault();
                wrapper.classList.add("list");
            }

            if (event.target.matches(".grid")) {
                event.preventDefault();
                wrapper.classList.remove("list");
            }
        });
    </script>
    <!--TOP 200 FRANCHISE -->
    <script>
        $(document).ready(function() {
            let isLoading = false;
            // let currentPage = 1; // Track the current page
            let getfreecount = 0; // Initialize the counter

            function fetchData() {
                if (isLoading) return;
                isLoading = true;

                let selectedYear = $("#yearSelect").val();
                let selectedSort = $('input[name="sortBy"]:checked').val();
                let selectedIndustry = $("#industry_type").val();
                let selectedInvestment = $("#investment_range").val();

                $("#loading").show(); // Show loader

                $.ajax({
                    url: "{{ route('filterFranchisorsByYear') }}",
                    type: "GET",
                    data: {
                        year: selectedYear,
                        filterType: selectedSort,
                        industry: selectedIndustry,
                        investmentRange: selectedInvestment,
                        // page: currentPage, // Pass current page for pagination

                    },
                    success: function(response) {
                        // if (isLoadMore) {
                        //     $("#").append(response.html); // Append new results
                        // } else {
                        $("#wrapper").html(response.html); // Replace with filtered content
                        // }
                        $("#recordCount").text(response.count + " RESULTS"); // Update count
                        // Update Franchise Type if available in response
                        if (response.franchisor_type) {
                            $("#ftypeSelect").html(
                                `<option value="${response.franchisor_type}">
                    ${response.franchisor_type === "top-100" ? "Top 100" : "Top 200"}
                </option>`
                            );
                        }
                        // Hide "Load More" button if no more records
                        // if (response.hasMore === false) {
                        //     $("#loadmore").hide();
                        // } else {
                        //     $("#loadmore").show();
                        // }
                        $("#loading").hide();
                        isLoading = false;

                        reinitializeCheckboxEvents(); // Rebind events after filter update
                        updateGetFreeCount(); // Recalculate checkbox count
                    },
                    error: function(xhr) {
                        console.log("Error:", xhr.responseText);
                        $("#wrapper").html(
                            '<div class="text-danger text-center">Failed to load data. Please try again.</div>'
                        );
                        $("#loading").hide();
                        isLoading = false;
                    }
                });
            }

            function updateGetFreeCount() {
                getfreecount = $("input[name='getFreeInfo']:checked").length;

                if (getfreecount >= 4) {
                    $(".filter-list-brand input[type='checkbox']:not(:checked)").prop("disabled", true);
                } else {
                    $(".filter-list-brand input[type='checkbox']:not(:checked)").prop("disabled", false);
                }

                $("#getFreeInfo .count").html(getfreecount);
            }

            function reinitializeCheckboxEvents() {
                $(document).off("click", ".filter-list-brand input[type='checkbox']").on("click",
                    ".filter-list-brand input[type='checkbox']",
                    function() {
                        let selectedIds = [];
                        let selectedHtml = "";

                        if ($(this).is(":checked")) {
                            getfreecount++;
                        } else {
                            getfreecount--;
                        }

                        updateGetFreeCount();

                        $("input[name='getFreeInfo']:checked").each(function() {
                            let brandId = $(this).attr("id");
                            let brandName = $("#brandnamecategory" + brandId).html();
                            let brandInvestment = $("#brandinvestment" + brandId).html();

                            selectedHtml += `
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="business-detail">
                        <div class="business-name">${brandName}</div>
                        <div class="business-val">${brandInvestment}</div>
                    </div>
                </div>
            `;

                            selectedIds.push(brandId);
                        });

                        $("#companyblockrequest").html(selectedHtml);
                        $("#freeinfovalue").val(selectedIds.join(","));
                        $(".brandCompareCheckbox").prop("disabled", getfreecount !== 0);
                    });
            }

            // Event listeners for filter changes
            $("#yearSelect, input[name='sortBy'], #industry_type, #investment_range").on("change", function() {
                // currentPage = 1; // Reset page on new filter selection
                fetchData();
            });

            // Load more event
            // $("#loadmore").on("click", function() {
            //     // currentPage++; // Increment page
            //     fetchData(true);
            // });
            // Initialize checkbox events on page load
            reinitializeCheckboxEvents();
        });

        function getcityinfo(value) {
            $.ajax({
                type: 'GET',
                url: '/getcitylist',
                data: {
                    state: value
                },
                success: function(data) {
                    $("#getinfocity").html(data);
                }
            });
        }
    </script>
@endsection
