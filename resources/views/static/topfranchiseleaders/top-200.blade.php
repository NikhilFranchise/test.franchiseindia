@extends('layout.master')
@section('content')
    <!--TOP 200 FRANCHISE -->
    <style>
        button.btn.btn-primary {
            width: 100%;
            font-size: 16px;
        }

        .dset:hover {
            color: #ffffff;
        }

        .top-modal-head {
            color: #333333;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        #topFranchise .modal-dialog {
            width: 539px;
            margin: 152px auto;
        }

        #topFranchise .modal-content {
            border-radius: 0px;
            box-shadow: none;
            padding: 10px;
        }

        ul.topp {
            list-style: none;
            padding-left: 0px;
        }

        ul.topp li {
            color: #333333;
            font-size: 15px;
            margin-bottom: 5px;
            position: relative;
            padding-left: 24px;
            background-image: url(https://www.franchiseindia.com/images/top100/bullets.png);
            background-repeat: no-repeat;
            background-position: left;
        }

        .top-hundred {
            margin-top: 80px;
            margin-bottom: 30px;
        }

        .staicp h1,
        .staicp h1.bookhead {
            margin-bottom: 15px;
            border-bottom:
                1px solid #dfdfdf;
            padding-bottom: 15px;
            font-family: 'Open Sans Light', serif;
            color: #333;
        }

        .top-hundred .crit {
            color: #ED1C25;
            font-size: 16px;
            text-decoration:
                underline;
            cursor: pointer;
        }

        .top-hundred p {
            color: #333333;
            font-size: 16px;
            line-height: 24px;
        }

        .scriteria {
            border: 1px solid #E9ECF4;
            padding: 10px 25px 25px 25px;
            border-radius: 4px;
            background: #ffffff;
            margin-bottom: 25px;
            margin-top: 20px;
        }

        .scriteria ul li {
            margin-bottom: 10px;
        }

        .dset {
            background: #000000;
            color: #ffffff;
            font-size: 14px;
            padding: 6px 15px;
            border-radius: 3px;
        }

        a.mapply {
            background: #d50000;
            /* display: none; */
            cursor: pointer;
            text-align: center;
            color: #ffffff;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;

        }

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

        .mstick span {
            position: absolute;
            top: 10px;
            right: 13px;
        }

        /* .mobile-reset {
                    display: none;
                } */

        .mcloser {
            display: none;
        }

        .fmob {
            display: none;
        }

        .fshow {
            display: block !important;
            position: fixed;
            top: 0px;
            height: 100vh;
            width: 100%;
            background: #fff;
            left: 0px;
            z-index: 9999;
            padding: 28px !important;
        }

        .banner-line,
        .ttl-brnd-list {
            color: #fff;
            text-align: center
        }

        #recordCount {
            font-size: 20px;
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

        /* .filter-head span {
                                font-size: 15px;
                                font-weight: normal;
                                float: right;
                                margin-top: 5px;
                                background: #000000;
                                padding: 4px 18px;
                                border-radius: 5px;
                                color: #ffffff;
                            }*/

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
            /*            box-shadow: 0 0 20px 0 #f5f5f5;*/
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
            .list .col {
                width: 100%
            }
        }

        @media screen and (min-width:768px) and (max-width:993px) {
            .mcloser img {
                width: 21px;
                cursor: pointer;
            }

            .mstick span {
                display: none;
            }

            .mstick span.fmob {
                display: block;
            }

            span.mcloser {
                display: block;
            }

            .fmob img {
                position: absolute;
                right: 2px;
                top: -12px;
                width: 20px;
                cursor: pointer;
            }

            .fmob {
                display: block;
            }

            .mobile-reset {
                display: block;
                margin-bottom: 35px;
            }

            .mstick {
                position: relative;
                top: 0px;
            }

            .wrapper .col {
                width: 31.4%
            }

            .list .col {
                width: 100%
            }

            .filter-brand-apply {
                display: none;
            }

            .more-franchise-rankings ul li {
                width: 32%
            }

            #recordCount {
                font-size: 19px;
            }

            .filter-head {
                margin-bottom: 30px;
            }
        }


        @media screen and (max-width:768px) {
            .top-hundred {
                margin-top: 50px;
            }

            #topFranchise .modal-dialog {
                width: 100%;
            }

            .mobile-reset a {
                position: absolute;
                right: 30px;
                top: 41px;
                color: #4986f1;
                text-decoration: none;
                font-weight: 500;
                font-size: 14px;
            }

            .more-franchise-rankings ul li {
                width: 45% !important;
            }

            a.mapply {
                display: block;
            }

            .top-two-hundred-wrap .fa {
                font-size: 14px;
            }

            .filter-brand-apply {
                overflow: scroll;
            }

            .filter-list-brand {
                padding: 20px 0px 0px 0px;
            }

            #recordCount {
                font-size: 16px;
            }

            .mobile-reset {
                display: block;
            }

            .mcloser {
                display: block;
                position: absolute;
                right: 17px;
                top: 10px;
            }

            .mcloser img {
                width: 21px;
                cursor: pointer;
            }

            .filter-wrapper {
                position: relative;
            }

            .fmob img {
                position: absolute;
                right: -5px;
                top: -4px;
                width: 18px;
                cursor: pointer;
            }

            .fmob {
                display: block;
            }

            .filter-brand-apply {
                display: none;
            }

            .top-two-banner {
                margin-top: 66px;
            }

            .mstick {
                position: unset;
            }

            .finner .catbtn input[type=checkbox]+label span {
                width: 140px;
                background-size: cover;
                height: 34px
            }

            .finner .catbtn input[type=checkbox]:checked+label span {
                background-position: 0 -36px
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
                width: 100%;
                min-height: 221px;
                background: #fff;
                margin: 2px 0 10px 0px;
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
    <!--TOP 200 FRANCHISE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <div class="loadman" id="loading" style="display:none">
        <div class="thanku">
            <div class="tbl-cell">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <div class="container formsection margintop60 staicp">

        <div class="top-hundred">
            <br>
            <h1 id="ftype_with_year">{{ $franchiseType == 'top-100' ? 'Top 100' : 'Top 200' }} Franchise 2025</h1>
            <p>Revealing brand impact, consumer value, and dynamic opportunities. Explore trends in Indian franchises,
                including global giants and emerging innovators. Rankings consider financial strength, expansion, growth
                rate, and success, reflecting a distinct identity, robust planning, support, innovation, and cultural
                sensitivity. This analysis assists franchisees and franchisors alike, offering insights into the franchise
                sector that underpin thriving business ventures.</p>

            <div data-target="#topFranchise" data-toggle="modal" class="crit">Understand Selection Criteria</div>
        </div>
        <div class="top-two-hundred-wrap">
            <div class="row">
                <div class="col-md-3 mstick">
                    <div class="filter-wrapper">
                        <div class="filter-head">Filter & Sort <span class="fmob"><img
                                    src="{{ url('/topfranchiseleaders/mtoggle.png') }}" alt=""></span></div>
                        <div class="filter-brand-apply">
                            <span class="mcloser"><img src="{{ url('/topfranchiseleaders/mcloser.png') }}"
                                    alt=""></span>
                            <div class="flabel lfirst"><img src="{{ url('/topfranchiseleaders/dates.png') }}"
                                    class="date"> Sort By
                                Year</div>
                            <select id="yearSelect" class="form-controls">
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
                            <div class="flabel"><img src="{{ url('/topfranchiseleaders/filter.png') }}" class="filter">
                                Sort
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
                            <button class="btn btn-primary" onclick="window.location.href='{{ url()->current() }}'">Reset
                                Filters</button>

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
                    <a href="https://www.franchiseindia.com/business-opportunities/karnataka.LOC14" aria-label=""
                        target="_blank">
                        <div class="city-icon"><img src="{{ url('topfranchiseleaders/images/city/karnataka.png') }}"
                                alt="Karnataka"></div>
                        <div class="city-nam">Karnataka</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.franchiseindia.com/business-opportunities/madhya-pradesh.LOC17" aria-label=""
                        target="_blank">
                        <div class="city-icon"><img src="{{ url('topfranchiseleaders/images/city/madhya-pradesh.png') }}"
                                alt="Madhya Pradesh"></div>
                        <div class="city-nam">Madhya Pradesh</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.franchiseindia.com/business-opportunities/maharashtra.LOC18" aria-label=""
                        target="_blank">
                        <div class="city-icon"><img src="{{ url('topfranchiseleaders/images/city/maharashtra.png') }}"
                                alt="Maharashtra"></div>
                        <div class="city-nam">Maharashtra</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.franchiseindia.com/business-opportunities/delhi.LOC23" aria-label=""
                        target="_blank">
                        <div class="city-icon"><img src="{{ url('topfranchiseleaders/images/city/delhi.png') }}"
                                alt="Delhi"></div>
                        <div class="city-nam">Delhi</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.franchiseindia.com/business-opportunities/punjab.LOC26" aria-label=""
                        target="_blank">
                        <div class="city-icon"><img src="{{ url('topfranchiseleaders/images/city/punjab.png') }}"
                                alt="Punjab"></div>
                        <div class="city-nam">Punjab</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.franchiseindia.com/business-opportunities/tamilnadu.LOC29" aria-label=""
                        target="_blank">
                        <div class="city-icon"><img src="{{ url('topfranchiseleaders/images/city/tamil-nadu.png') }}"
                                alt="Tamil Nadu"></div>
                        <div class="city-nam">Tamil Nadu</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.franchiseindia.com/business-opportunities/uttar-pradesh.LOC32" aria-label=""
                        target="_blank">
                        <div class="city-icon"><img src="{{ url('topfranchiseleaders/images/city/uttar-pradesh.png') }}"
                                alt="Uttar Pradesh"></div>
                        <div class="city-nam">Uttar Pradesh</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.franchiseindia.com/business-opportunities/telangana.LOC34" aria-label=""
                        target="_blank">
                        <div class="city-icon"><img src="{{ url('topfranchiseleaders/images/city/telangana.png') }}"
                                alt="Telangana"></div>
                        <div class="city-nam">Telangana</div>
                    </a>
                </li>
            </ul>
        </div>


        <div class="company-profile scriteria">
            <h2 class="catbheading">
                Understanding the Top 200 Franchise Selection Criteria:
            </h2>
            <ul>
                <li> <strong> 1. Annual Turnover of the Company:</strong>

                    This metric assesses the total revenue generated by the franchise in a year. It is crucial for
                    understanding the financial scale and market influence of the franchise, offering insights into its
                    viability and stability.
                </li>
                <li>
                    <strong> 2. Years of Operation:</strong> Reflects how long the company has been in business. This
                    indicates the market experience and longevity of the franchise, crucial for assessing its ability to
                    withstand economic fluctuations and maintain operational continuity.
                </li>

                <li>
                    <strong> 3. Year of Starting Franchising:</strong>
                    This reveals how long the franchise model has been in place. A longer history often suggests a tested
                    and refined business model, important for potential franchisees seeking proven systems.

                </li>
                <li>
                    <strong> 4. Presence Across Cities:</strong>
                    The number of cities where the franchise is present indicates its geographical spread and market
                    penetration. This metric is important for evaluating the brand’s <br> appeal across diverse markets and
                    its scalability.
                </li>
                <li>

                    <strong> 5. Number of Franchise Units:</strong>
                    Shows how many franchise units operate under the brand. A higher number suggests a successful franchise
                    model and widespread acceptance, which is vital for assessing the network's strength and growth
                    potential.
                </li>
                <li>
                    <strong> 6. Percentage of Business from Franchise Operations: </strong>

                    Indicates what portion of the business's total revenue comes from franchising. High percentages
                    demonstrate a strong reliance on franchises, underscoring the importance of franchise operations to the
                    overall business model.

                </li>

                <li>
                    <strong>7. Total Investment and Area Required:</strong>
                    This encompasses the capital and space needed to start a franchise, impacting the accessibility and
                    initial costs for franchisees. It is essential for <br> gauging the entry barriers and potential
                    financial commitment involved.

                </li>

                <li>
                    <strong> 8. Franchisee Fees:</strong>
                    The initial fees paid by franchisees to join the franchise. These fees are critical for understanding
                    the upfront costs involved and the franchisor’s valuation of their brand and support services.
                </li>

                <li>
                    <strong> 9. Royalty Fees:</strong>
                    Ongoing fees paid by franchisees, typically a percentage of their revenue, to the franchisor. This is
                    key for understanding the continuing financial obligations and the cost structure of operating the
                    franchise.
                </li>
                <li>
                    <strong> 10. Marketing Cost as Percentage of Sales:</strong>
                    Measures the proportion of revenue dedicated to marketing. This is important for assessing how much
                    support the franchisor provides in terms of advertising and promotional activities, which can
                    significantly impact the franchise's visibility and growth.

                </li>
                <li>
                    <strong>
                        11. Monthly Working Capital:
                    </strong>
                    The amount of capital required to manage daily operations. It is crucial for potential franchisees to
                    understand the liquidity needed to sustain the business until it becomes profitable.

                </li>
                <li>
                    <strong>
                        12. Return on Investment (ROI):
                    </strong>
                    Calculates the efficiency and profitability of the franchise investment. High ROI indicates a lucrative
                    business model, crucial for attracting and retaining investors and franchisees.
                </li>
                <li>
                    <strong>
                        13. Number of Employees Required to Run a Franchise Unit:
                    </strong>
                    Indicates staffing needs, which affect operational complexity and costs. Important for potential
                    franchisees to consider when assessing the human resources needed and the operational demands of the
                    franchise.

                </li>
                <li>
                    <strong>
                        14. Expected Break-Even Time:
                    </strong>
                    The time it takes for a franchise unit to become profitable. Shorter break-even times are preferable as
                    they reduce financial risk and reflect efficient business operations, crucial for evaluating the
                    financial attractiveness of the franchise.
                </li>
                <li>
                    <strong>
                        15. Average Business from a Franchise Unit:
                    </strong>
                    Shows the typical revenue generated per unit. This metric is crucial for prospective franchisees to
                    assess potential earnings and compare &nbsp; performance across different franchises.
                </li>
                <li>
                    <strong>
                        16. Franchisees Owning More Than One Unit:
                    </strong>
                    Reflects franchisee satisfaction and success within the franchise system. Multiple units under single
                    franchisee ownership suggest a strong <br>
                    business model and franchisee confidence, important for assessing the franchise's appeal and operational
                    success.

                </li>
                <li>
                    <strong>
                        17. Number of Stores in Small, Mid, and Large Format:
                    </strong>
                    This diversity in store sizes can cater to different market needs and locations. It is important for
                    evaluating the franchise's adaptability to various environments and its potential to expand into new
                    areas.

                </li>
                <li>
                    <strong>
                        18. Year-on-Year Growth for the Last Three Years:
                    </strong>
                    Tracks the franchise's growth trends over time. Consistent growth is indicative of a thriving business,
                    important for assessing the momentum and future prospects of the franchise.
                </li>
                <li>
                    <strong>
                        19. Franchise Success Milestones:
                    </strong>
                    Key achievements and benchmarks reached by the franchise that signal its progress and success. These
                    milestones are important for gauging the franchise's development, market impact, and operational
                    excellence, providing potential franchisees with indicators of success and stability.

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
                            // Get selected year from the select box
                            const franchiseYear = $('#yearSelect').val();
                            const franchiseLabel = response.franchisor_type === "top-100" ? "Top 100" :
                                "Top 200";

                            // Update the heading
                            $('#ftype_with_year').html(`${franchiseLabel} Franchise ${franchiseYear}`);

                        }



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

        $(".fmob").click(function() {
            $(".filter-brand-apply").toggleClass('fshow');
        });
        $(".mcloser").click(function() {
            $(".filter-brand-apply").toggleClass('fshow');
        });
    </script>


    <div class="modal fade" id="topFranchise" tabindex="-1" role="dialog" aria-labelledby="topFranchise">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="https://www.franchiseindia.com/images/top100/close.png" alt="">
                    </button>
                    <div class="top-modal-head">Understand Selection Criteria</div>
                    <ul class="topp">
                        <li>Annual Turnover of the Company Company</li>
                        <li>Operational Since</li>
                        <li>Year of starting Franchising</li>
                        <li>Number of Cities present in</li>
                        <li>Number of Franchise Units</li>
                        <li>Percentage of total business from franchise</li>
                        <li>Total Investment and area required</li>
                        <li>Franchisee fees</li>
                        <li>Royalty Fees</li>
                        <li>Marketing cost as percentage of sales</li>
                        <li>Working Capital per month</li>
                        <li>Return on investment</li>
                        <li>Number of employees required to run a franchise unit</li>
                        <li>Expected break-even time</li>
                        <li>Average business from a franchise unit</li>
                        <li>Number of franchisees owning more than one unit</li>
                        <li>Number of stores in small, mid and large format</li>
                        <li>Year-on-year growth for the last three years</li>
                        <li>Franchise success milestone</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
