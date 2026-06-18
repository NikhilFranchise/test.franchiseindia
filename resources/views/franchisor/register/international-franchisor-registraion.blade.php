@extends('layout.master')
@section('content')
    <style type="text/css">
        label.error {
            color: red;
        }
        
        .posabsoblock .posabso {
            z-index: 2
        }

        .formbannerhead {
            margin-top: 20px;
            margin-bottom: 40px
        }

        .formsection.internat .eds .form-control {
            height: 49px
        }

        .formbg {
            background: #f3f3f3 url('https://www.franchise.ae/images/formheader.jpg') no-repeat;
            -webkit-transition: all .4s ease;
            transition: all .4s ease;
            height: 189px;
            background-position: center center;
            text-align: center
        }

        .tbft {
            text-align: center;
            font-family: "Open Sans Regular";
            font-size: 26px;
            padding-top: 30px;
            color: #000
        }

        .tbft span {
            font-family: 'Open Sans Light';
            font-size: 52px;
            line-height: 50px
        }

        .hth {
            font-size: 36px;
            font-family: "Open Sans Regular";
            text-transform: uppercase
        }

        .hth strong {
            font-family: 'Open Sans ExtraBold';
            color: #89a908;
            text-decoration: underline
        }

        @media only screen and (min-width:1px) and (max-width:767px) {
            .tbft {
                padding-top: 0;
                font-size: 20px
            }

            .tbft span {
                font-size: 40px;
                line-height: 50px
            }

            .hth {
                font-size: 25px
            }

            .formbg {
                background: 0;
                padding-bottom: 0;
                padding-top: 0;
                margin-bottom: 0;
                height: auto
            }

            .formbannerhead {
                margin-bottom: 20px;
                margin-top: 20px
            }

            .formsection.internat .eds .form-control {
                height: 47px
            }

            .formsection.internat .eds2 .form-control {
                padding: 14px 12px 14px
            }
        }

        @media only screen and (min-width:768px) and (max-width:1023px) {
            .formsection.internat .eds {
                width: 113px
            }

            .formsection.internat .eds2 {
                width: 55.8%
            }
        }
    </style>
    <div class="container formbannerhead">
        <div class="formbg">
            <h1 class="tbft"><span>Get Ready</span> <br>
                to Embrace a Franchise Opportunity Worth
                <div class="hth">a <strong>million opportunities</strong></div>
            </h1>
        </div>
    </div>
    <div class="container formsection internat">
        <div class="row margt0">
            <div class="col-xs-12 col-sm-9 bor-radius backwhite targleft row-no-padding">
                <form class="form-horizontal" id="franchisorRegform" name="form_franchisor"
                    action="{{ Config::get('constants.MainDomain') }}/franchisor/franchisor_registration?is_international=1"
                    method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="setup-content">
                        @if (Session::has('errorMessage'))
                            <p class="alert alert-info"> {{ Session::get('errorMessage') }} </p>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-xs-12 col-sm-12 col-md-12 pad30 showbg">
                            <div class="sidehead">List your brand with Us for <span>free!</span></div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Email Id (User
                                    Id)</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/user.png') }}"
                                                alt="User Email"></span>
                                        <input name="email" type="text" maxlength="40" class="form-control"
                                            placeholder="Enter Your User ID" autocomplete="off">
                                    </div>
                                    <span id="result" style="color:red"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-md-4 com4mod control-label mandatory">Password</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/pwd.png') }}"
                                                alt="Password"></span>
                                        <input name="password" id="pwd1" type="password" class="form-control"
                                            placeholder="Enter Your Password" autocomplete="off">
                                        <div style="text-align: center;">
                                            <span onClick="toggle_password('pwd1')" id="showpwd1" maxlength="15"
                                                class="showhidecng">Show</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Mobile</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row row-no-margin">
                                        <div class="col-xs-3 col-sm-3 col-md-3 row-no-padding eds">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img src="{{ url('images/mobile.png') }}"
                                                        alt="Mobile"></span>
                                                <select name="country_code" class="form-control myselectclass3"
                                                    id="country_code">
                                                    @php
                                                        $codes = Config('location.CountryCodes');
                                                        $codes = collect(array_unique($codes))->sort();
                                                    @endphp
                                                    @foreach ($codes as $countryCode)
                                                        <option value="{{ $countryCode }}"
                                                            @if ($countryCode == 91) selected @endif>+
                                                            {{ $countryCode }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-3 col-sm-9 col-md-9 row-no-padding eds2">
                                            <input name="mobile_int" id="mobile" onkeypress="return isNumber(event)"
                                                type="text" pattern="[0-9]{8,15}" class="form-control" maxlength="15"
                                                placeholder="Enter Mobile" minlength="8" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-md-4 com4mod control-label">Brand Name</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/brandnew.png') }}"
                                                alt="Brand Name"></span>
                                        <input name="brand_name" type="text" class="form-control"
                                            placeholder="Enter Your Brand Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Company Name
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/company.png') }}"
                                                alt="Company Name"></span>
                                        <input name="company_name" id="company_name" type="text" maxlength="55"
                                            class="form-control" placeholder="Enter Company Name">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">CEO / MD / Owner
                                    Name </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="https://www.franchiseindia.com/images/companyceo.png"></span>
                                        <input type="text" class="form-control valid" name="ceo_name"
                                            placeholder="Enter CEO / Owner Name" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">CEO / MD / Owner
                                    Email </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="https://www.franchiseindia.com/images/email.png"></span>
                                        <input name="ceo_email" type="text" class="form-control"
                                            placeholder="Enter Email" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">CEO / MD / Owner
                                    Mobile No.</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="https://www.franchiseindia.com/images/mobile.png"></span>
                                        <input name="ceo_mobile" onkeypress="return isNumber(event)" type="text"
                                            class="form-control" maxlength="15" placeholder="Enter Mobile"
                                            value="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Manager
                                    (Franchise) Name</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/user.png') }}"></span>
                                        <input type="text" class="form-control" name="fran_manager" id="fran_manager"
                                            placeholder="Enter Manager Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Address
                                    Details</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/addreess.png') }}"
                                                alt="Address"></span>
                                        <input type="text" class="form-control" name="fran_address" id="fran_address"
                                            placeholder="Enter Your Address">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country"
                                    class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Country</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/country.png') }}"
                                                alt="Country"></span>
                                        <select name="country" id="country" class="form-control myselectclass">
                                            @foreach (Config('location.countryName') as $index => $value)
                                                <option value="{{ $index }}"
                                                    @if ($index == 99) selected @endif>{{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Pincode</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/pincode.png') }}"
                                                alt="pincode" /></span>
                                        <input type="text" class="form-control" name="pincode_int" maxlength="10"
                                            placeholder="Enter Pincode" onkeypress="return isNumber(event)">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="expansion_loc_type" value="stateWise">
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">State</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/state.png') }}"
                                                alt="state"></span>
                                        <input type="text" class="form-control" name="state_int"
                                            placeholder="Enter State">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">City</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/city.png') }}"
                                                alt="city"></span>
                                        <input type="text" class="form-control" name="city" id="city"
                                            placeholder="Enter City">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Website</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/companywebsite.png') }}"
                                                alt="Company Website"></span>
                                        <input type="text" class="form-control" name="website" id="website"
                                            maxlength="35" placeholder="Enter Company Website">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck mandatory">Are you
                                    looking for ?</label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row ProLooking">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-3 mdyreswidth"><input type="radio"
                                                    name="looking_franchise" value="1" checked> Franchisee </label>
                                            <label class="col-xs-6 col-sm-6 col-md-4"><input type="radio"
                                                    name="looking_franchise" value="0">Trade partners</label>
                                            <label class="col-xs-6 col-sm-6 col-md-4"><input type="radio"
                                                    name="looking_franchise" value="2">Dealer/Distributor</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group lookingFranchisePartnerInput" style="">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck mandatory">Looking
                                    for Franchisee Partners?</label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row checkmargin">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding"
                                            id="lookingFranchisePartnerInput">
                                            <label class="col-xs-6 col-sm-6 col-md-6"><input type="checkbox"
                                                    name="franchise_partner_type[]" id="franchise_partner_type"
                                                    value="lookingFrUnit" />Unit</label>
                                            <label class="col-xs-6 col-sm-6 col-md-6"><input type="checkbox"
                                                    name="franchise_partner_type[]" id="franchise_partner_type1"
                                                    value="lookingFrUnitMultiUnits" />Master / Multi Units</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden-area lookingFrUnitInput">
                                <div class="col-sm-12 row-no-padding bdr-tp-bt">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-4 col-md-4 paddright0">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img
                                                        src="{{ url('images/range-rate.png') }}"></span>
                                                <select name="unit_investment" title="unit_investment"
                                                    class="form-control myselectclass">
                                                    @foreach (Config('constants.investRangeInWords') as $index => $value)
                                                        <option value="{{ $index }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 paddright0">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img
                                                        src="{{ url('images/brand.png') }}"></span>
                                                <input name="unitinv_brand_fee" type="text" pattern="[0-9]{1,10}"
                                                    minlength="1" maxlength="8" class="form-control"
                                                    placeholder="Franchise / Brand Fee" />
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img
                                                        src="{{ url('images/commission.png') }}"></span>
                                                <input name="unitinv_royalty" type="text" pattern="[0-9]{1,2}"
                                                    minlength="1" maxlength="2" class="form-control"
                                                    placeholder="Royalty / Commission %" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden-area lookingFrMultiUnitInput">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-group ttl">What type of franchises are you considering?</div>
                                </div>
                                <div class="row marginbottom10">
                                    <div class="bdr-tp-bt-col">
                                        <div style="display:none;color:red" id="error_msg_step3_multiunit">Please select
                                            at least one field</div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group">
                                                <input type="checkbox" name="countrywise" class="multiUnitCheckBoxes"
                                                    id="countrywise" value="CountryWise">Country Wise
                                            </div>
                                            <div class="disabled-area CountryWise">
                                                <fieldset disabled>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/range-rate.png') }}"></span>
                                                            <select name="country_investment"
                                                                class="form-control myselectclass"
                                                                title="country_investment">
                                                                @foreach (Config('constants.investRangeInWords') as $index => $value)
                                                                    <option value="{{ $index }}">
                                                                        {{ $value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/brand.png') }}"></span>
                                                            <input type="text" name="country_unitfee"
                                                                pattern="[0-9]{1,10}" minlength="1" maxlength="8"
                                                                class="form-control" placeholder="Unit / Brand Fee"
                                                                value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/brand.png') }}"></span>
                                                            <input type="text" name="country_masterfee"
                                                                pattern="[0-9]{1,10}" minlength="1" maxlength="8"
                                                                class="form-control" placeholder="Master / Brand Fee"
                                                                value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/commission.png') }}"></span>
                                                            <input type="text" name="country_royalty"
                                                                pattern="[0-9]{1,2}" minlength="1" maxlength="2"
                                                                class="form-control" placeholder="Royalty / Commission %"
                                                                value="" />
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 paddleft-lft30">
                                            <div class="form-group">
                                                <input type="checkbox" name="regionwise" class="multiUnitCheckBoxes"
                                                    id="regionwise" value="RegionWise"> Region wise
                                            </div>
                                            <div class="disabled-area RegionWise">
                                                <fieldset disabled>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/range-rate.png') }}"></span>
                                                            <select name="region_investment"
                                                                class="form-control myselectclass"
                                                                title="region_investment">
                                                                @foreach (Config('constants.investRangeInWords') as $index => $value)
                                                                    <option value="{{ $index }}">
                                                                        {{ $value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/brand.png') }}"></span>
                                                            <input type="text" name="region_unitfee"
                                                                pattern="[0-9]{1,10}" minlength="1" maxlength="8"
                                                                id="region_unitfee" class="form-control"
                                                                placeholder="Unit / Brand Fee" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/brand.png') }}"></span>
                                                            <input type="text" name="region_masterfee"
                                                                pattern="[0-9]{1,10}" minlength="1" maxlength="8"
                                                                id="region_masterfee" class="form-control"
                                                                placeholder="Master / Brand Fee" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/commission.png') }}"></span>
                                                            <input type="text" name="region_royalty"
                                                                pattern="[0-9]{1,2}" minlength="1" maxlength="2"
                                                                id="region_royalty" class="form-control"
                                                                placeholder="Royalty / Commission %" value="" />
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group">
                                                <input type="checkbox" name="statewise" class="multiUnitCheckBoxes"
                                                    id="statewise" value="StateWise"> State wise
                                            </div>
                                            <div class="disabled-area StateWise">
                                                <fieldset disabled>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/range-rate.png') }}"></span>
                                                            <select name="state_investment"
                                                                class="form-control myselectclass"
                                                                title="state_investment">
                                                                @foreach (Config('constants.investRangeInWords') as $index => $value)
                                                                    <option value="{{ $index }}">
                                                                        {{ $value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/brand.png') }}"></span>
                                                            <input type="text" name="state_unitfee"
                                                                pattern="[0-9]{1,10}" minlength="1" maxlength="8"
                                                                id="state_unitfee" class="form-control"
                                                                placeholder="Unit / Brand Fee" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/brand.png') }}"></span>
                                                            <input type="text" name="state_masterfee"
                                                                pattern="[0-9]{1,10}" minlength="1" maxlength="8"
                                                                id="state_masterfee" class="form-control"
                                                                placeholder="Master / Brand Fee" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/commission.png') }}"></span>
                                                            <input type="text" name="state_royalty"
                                                                pattern="[0-9]{1,2}" minlength="1" maxlength="2"
                                                                id="state_royalty" class="form-control"
                                                                placeholder="Royalty / Commission %" value="" />
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 paddleft-lft30">
                                            <div class="form-group">
                                                <input type="checkbox" name="citywise" class="multiUnitCheckBoxes"
                                                    id="citywise" value="CityWise"> City wise
                                            </div>
                                            <div class="disabled-area CityWise">
                                                <fieldset disabled>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/range-rate.png') }}"></span>
                                                            <select name="city_investment"
                                                                class="form-control myselectclass"
                                                                title="city_investment">
                                                                @foreach (Config('constants.investRangeInWords') as $index => $value)
                                                                    <option value="{{ $index }}">
                                                                        {{ $value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/brand.png') }}"></span>
                                                            <input type="text" name="city_unitfee"
                                                                pattern="[0-9]{1,10}" minlength="1" maxlength="8"
                                                                id="city_unitfee" class="form-control"
                                                                placeholder="Unit / Brand Fee" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/brand.png') }}"></span>
                                                            <input type="text" name="city_masterfee"
                                                                pattern="[0-9]{1,10}" minlength="1" maxlength="8"
                                                                id="city_masterfee" class="form-control"
                                                                placeholder="Master / Brand Fee" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/commission.png') }}"></span>
                                                            <input type="text" name="city_royalty"
                                                                pattern="[0-9]{1,2}" minlength="1" maxlength="2"
                                                                id="city_royalty" class="form-control"
                                                                placeholder="Royalty / Commission %" value="" />
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden-area tradePartnersInputs bdr-tp-bt-rmgroup" id="trade-partner-blocks"
                                style="display:none">
                                <div class="row myposrel">
                                    <input type="button" id="more" value="[+]" class="myposabso">
                                    <div class="col-xs-12 col-sm-4 paddleft30">
                                        <div class="form-group margintb15">Types of Channels</div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img
                                                        src="{{ url('images/channels.png') }}"></span>
                                                <select name="channel_type[]" class="form-control myselectclass"
                                                    title="channel_type">
                                                    @foreach (Config('constants.channelArr') as $index => $value)
                                                        <option value="{{ $index }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 padd-lft-rht">
                                        <div class="form-group margintb15">Investment (If any)</div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img
                                                        src="{{ url('images/range-rate.png') }}"></span>
                                                <select name="trade_investment[]" class="form-control myselectclass"
                                                    title="trade_investment">
                                                    @foreach (Config('constants.investRangeInWords') as $index => $value)
                                                        <option value="{{ $index }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 padd-lft-rht mynewlpad">
                                        <div class="form-group smallfont">Margin / Commissions %</div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img
                                                        src="{{ url('images/commission.png') }}"></span>
                                                <input type="text" name="trade_margin[]" pattern="[0-9]{1,2}"
                                                    minlength="1" maxlength="2" class="form-control"
                                                    placeholder="Enter Margin / Commissions %">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ind_main_cat"
                                    class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Industry</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/industry.png') }}"></span>
                                        <select name="ind_main_cat" id="ind_main_cat" class="form-control myselectclass"
                                            onchange="getSubCategory(this.value)">
                                            <option value="">---- Select Industry ----</option>
                                            @foreach (Config('constants.CategoryArr') as $index => $value)
                                                <option value="{{ $index }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="getSubCategoryData"
                                    class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Sector</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/industry.png') }}"></span>
                                        <select name="ind_cat" id="getSubCategoryData" class="form-control myselectclass"
                                            onchange="getSubCatCategory(this.value)">
                                            <option value="">---- Select Sector ----</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="getSubCatCategoryData"
                                    class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Service /
                                    Product</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/industry.png') }}"></span>
                                        <select name="ind_sub_cat" id="getSubCatCategoryData"
                                            class="form-control myselectclass">
                                            <option value="">---- Select Service / Product ----</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Operations
                                    Commenced On
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/year.png') }}"
                                                alt="Operations Year"></span>
                                        <select name="operations_start_year" id="operations_start_year"
                                            class="form-control myselectclass">
                                            <option value="">Select Operations Year</option>
                                            @for ($i = 1950; $i <= date('Y'); $i++)
                                                <option value='{{ $i }}'>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory"
                                    id="commencedFranText">Franchising Commenced On</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/year2.png') }}"
                                                alt="Franchising Year"></span>
                                        <select name="franchise_start_year" id="franchise_start_year"
                                            class="form-control myselectclass">
                                            <option value="">Select Franchising Year</option>
                                            @for ($i = 1950; $i <= date('Y'); $i++)
                                                <option value='{{ $i }}'>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group multipleinputsetheight50">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Space
                                    Requirements</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row row-no-margin">
                                        <div class="col-xs-12 col-sm-6 row-no-padding width184 FlrAreaMin">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img
                                                        src="{{ url('images/calendar.png') }}"
                                                        alt="Space Requirements"></span>
                                                <input type="text" name="prop_area_min"
                                                    onkeypress="return isNumber(event)" pattern="[0-9]{2,5}"
                                                    minlength="2" maxlength="5" class="form-control" placeholder="Min"
                                                    id="prop_area_min">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-3 row-no-padding wwidth148 FlrAreaMax">
                                            <input type="text" name="prop_area_max"
                                                onkeypress="return isNumber(event)" pattern="[0-9]{3,6}" minlength="3"
                                                maxlength="6" class="form-control" placeholder="Max">
                                        </div>
                                        <div class="col-xs-12 col-sm-3 row-no-padding wwidth148 FlrAreaSqFt">
                                            <input class="form-control sqclas" disabled placeholder="Sq. Ft.">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padinputbox Head">
                                    Expected return of investment</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/roi.png') }}"
                                                alt="Return of investment"></span>
                                        <input name="anticipated_roi" onkeypress="return isNumber(event)" type="text"
                                            pattern="[0-9]{1,4}" maxlength="4" class="form-control"
                                            placeholder="enter  %">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group multipleinputsetheight50">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Investment
                                    Range</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row row-no-margin">
                                        <div class="col-xs-12 col-sm-6 row-no-padding width184 FlrAreaMin">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img
                                                        src="{{ url('images/range-rate.png') }}"
                                                        alt="Investment Range"></span>
                                                <input type="text" onkeypress="return isNumber(event)"
                                                    name="unit_investment_min" minlength="2" maxlength="7"
                                                    class="form-control" placeholder="Min" id="unit_investment_min">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-3 row-no-padding wwidth148 FlrAreaMax">
                                            <input type="text" onkeypress="return isNumber(event)"
                                                name="unit_investment_max" minlength="3" maxlength="8"
                                                class="form-control" placeholder="Max">
                                        </div>
                                        <div class="col-xs-12 col-sm-3 row-no-padding wwidth148 FlrAreaSqFt">
                                            <input class="form-control sqclas" disabled placeholder="INR">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label
                                    class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox mandatory">Support
                                    provided to franchise</label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-3"><input type="radio"
                                                    name="Support_provided" value="1" checked="checked"> Yes</label>
                                            <label class="col-xs-6 col-sm-6 col-md-3"><input type="radio"
                                                    name="Support_provided" value="0"> No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Where are you
                                    looking for expansion?</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row checkmargin specify">
                                        <div class="col-sm-12 row-no-padding">
                                        </div>
                                    </div>
                                    <div style="display:none;color:red" id="locaitonError">Please select atleat one
                                        location</div>
                                </div>
                            </div>
                            @php
                                $northStates = Config('location.northStates');
                                $centralstates = Config('location.centralStates');
                                $weststates = Config('location.westStates');
                                $eaststates = Config('location.eastStates');
                                $southstates = Config('location.southStates');
                                $UT = Config('location.unionTerriotoryStates');
                            @endphp
                            <!-- State & city Start here -->
                            <!--State section Start-->
                            <div class="row hidden-area stateWiseInput bdr-tp-bt-rmgroup" id="dead"
                                style="display:block">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <ul id="divNorthState" class="natio">
                                        <li><input type="checkbox" class="checkAll"><span><strong>North
                                                    Region</strong></span></li>
                                        @foreach ($northStates as $index => $value)
                                            <li><input value='{{ $value }}' name="state[]" type="checkbox">
                                                <span>{{ $value }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <ul id="divWestState" class="natio">
                                        <li><input type="checkbox" class="checkAll"><span><strong>West
                                                    Region</strong></span></li>
                                        @foreach ($weststates as $index => $value)
                                            <li><input value='{{ $value }}' name="state[]" type="checkbox">
                                                <span>{{ $value }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <ul id="divEastState" class="natio">
                                        <li><input type="checkbox" class="checkAll"><span><strong>East
                                                    Region</strong></span></li>
                                        @foreach ($eaststates as $index => $value)
                                            <li><input value='{{ $value }}' name="state[]" type="checkbox">
                                                <span>{{ $value }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <ul id="divSouthState" class="natio">
                                        <li><input type="checkbox" class="checkAll"><span><strong>South
                                                    Region</strong></span></li>
                                        @foreach ($southstates as $index => $value)
                                            <li><input value='{{ $value }}' name="state[]" type="checkbox">
                                                <span>{{ $value }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <ul id="divUnionTerritories" class="natio">
                                        <li><input type="checkbox" class="checkAll"><span><strong>Territories
                                                    Region</strong></span></li>
                                        @foreach ($UT as $index => $value)
                                            <li><input value='{{ $value }}' name="state[]" type="checkbox">
                                                <span>{{ $value }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <ul id="divCentralState" class="natio">
                                        <li><input type="checkbox" class="checkAll"><span><strong>Central
                                                    Region</strong></span></li>
                                        @foreach ($centralstates as $index => $value)
                                            <li><input value='{{ $value }}' name="state[]" type="checkbox">
                                                <span>{{ $value }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12  col-sm-4 com4mod control-label">Upload Company Logo (Max
                                    2MB)</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/upload.png') }}"
                                                alt="image upload" /></span>
                                        <input type="file" name="company_logo" class="form-control"
                                            placeholder="Upload your Company Logo">
                                    </div>
                                </div>
                            </div>
                            <!--State section End-->

                            <div class="form-group">
                                <label for="business_desc" class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">
                                    <span class="mandatory">Describe your Business</span><br />
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="business_desc" class="form-control" cols="70" id="business_desc"></textarea>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <div class="row colbg">
                            <div style="text-align: center;">
                                <button class="btn btn-default nextBtn1" id="submitbutton">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @include('includes.faq')
        </div>
    </div>
    <div class="heightspace"></div>
    <script src="{{ url('tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script language="javascript">
        $.validator.addMethod("pwdcheck", function(value) {
                return /^(?=.*\d)(?=.*[a-z])(?=.*[!@#$%^&*(){}[\]<>?/|\-_])(?=.*[A-Z]).{6,20}$/.test(value);
            },
            "Password should contain a small character, a capital character, a numeric value and a special character");

        $.validator.addMethod("at_least_one", function(value, element) {
            return $("input[name='" + element.name + "']:checked").length;
        }, 'Please select at least one');


        //check greater than value
        $.validator.addMethod("greaterThan", function(value, element, param) {
            var $min = param.val();
            return parseInt(value) >= parseInt($min);
        }, "Max must be greater than min");

        //check greater than value
        $.validator.addMethod("greaterThanId", function(value, element, param) {
            var $min = $(param);
            if (this.settings.onfocusout) {
                $min.off(".validate-greaterThan").on("blur.validate-greaterThan", function() {
                    $(element).valid();
                });
            }
            return parseInt(value) >= parseInt($min.val());
        }, "Max must be greater than min");

        //acceptedFileTypes validation
        $.validator.addMethod("acceptedFileTypes", function(value, element, param) {
            var typeParam = typeof param === "string" ? param.replace(/\s/g, "").replace(/,/g, "|") : "image/*";
            var fileType = element.files[0].type;
            return fileType.match(new RegExp(".?(" + typeParam + ")$", "i"))
        }, "file is not with valid extension");

        //fileSize validation
        $.validator.addMethod("fileSize", function(value, element, param) {
            return (element.files[0].size < param)
        }, "file size must be less then the defined size bytes");

        //check letters only validation
        $.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^([\s.]?[a-zA-Z]+)+$/i.test(value);
        }, "Letters only please");

        function fileRuleMessage() {
            return {
                required: "Select Image",
                acceptedFileTypes: "Only image type jpg/png/jpeg/gif is allowed",
                fileSize: "Please select a image of size(Less than 2MB)"
            };
        }

        tinymce.init({
            selector: '#business_desc',
            height: 300,
            setup: function(ed) {
                ed.on('init change', function() {
                    ed.save();
                });
            }
        });

        //Checking user exist
        var oldEmail = '';
        var ajaxResult = null;
        $.validator.addMethod("emailExist", function(value) {
            if (oldEmail !== value) {
                oldEmail = value;
                $.ajax({
                    type: 'get',
                    url: '/validate-email',
                    async: false,
                    data: {
                        'search': value
                    },
                    success: function(data) {
                        ajaxResult = (data.email !== "");
                    }
                });
            }
            return !ajaxResult;
        }, "User already exist with this email");


        $.validator.setDefaults({
            ignore: '.hiddenMarkettingMaterials'
        });

        $("#franchisorRegform").validate({
            ignore: "input[type='checkbox']:hidden, input[type='text']:hidden, select:hidden, :disabled",
            rules: {
                email: {
                    required: true,
                    email: true,
                    emailExist: true
                },
                password: {
                    required: true,
                    minlength: 3,
                    pwdcheck: true
                },
                company_name: {
                    required: true,
                    minlength: 1,
                    maxlength: 55
                },
                mobile_int: {
                    required: true,
                    number: true,
                    minlength: 8,
                    maxlength: 15
                },
                website: {
                    required: true,
                    minlength: 3,
                    maxlength: 255
                },
                ceo_name: {
                    required: true,
                    minlength: 3,
                    maxlength: 35
                },
                fran_manager: {
                    required: true,
                    minlength: 3,
                    maxlength: 35
                },
                fran_address: {
                    required: true,
                    minlength: 6
                },
                country: {
                    required: true
                },
                unitinv_brand_fee: {
                    required: true,
                    minlength: 3,
                    maxlength: 12
                },
                unitinv_royalty: {
                    required: true,
                    minlength: 1,
                    maxlength: 2
                },
                ceo_email: {
                    required: true,
                    email: true
                },
                ceo_mobile: {
                    required: true,
                    number: true,
                    minlength: 8,
                    maxlength: 15
                },
                state_int: {
                    required: true
                },
                city: {
                    required: true,
                    lettersonly: true
                },
                telephone: {
                    number: true
                },
                pincode_int: {
                    required: true,
                    minlength: 4,
                    maxlength: 8,
                    number: true
                },
                secondary_email: {
                    email: true
                },
                ind_main_cat: {
                    required: true
                },
                ind_cat: {
                    required: true
                },
                ind_sub_cat: {
                    required: true
                },
                operations_start_year: {
                    required: true
                },
                franchise_start_year: {
                    required: true
                },
                business_desc: {
                    required: true,
                    minlength: 25
                },
                "franchise_partner_type[]": 'at_least_one',
                "trade_margin[]": {
                    required: true
                },
                "state[]": {
                    required: true
                },
                prop_area_min: {
                    required: true,
                    minlength: 2,
                    maxlength: 6
                },
                city_investment: {
                    required: true
                },
                city_unitfee: {
                    required: true,
                    minlength: 1,
                    maxlength: 8
                },
                city_masterfee: {
                    required: true,
                    minlength: 1,
                    maxlength: 8
                },
                city_royalty: {
                    required: true,
                    minlength: 1,
                    maxlength: 2
                },
                state_investment: {
                    required: true
                },
                state_unitfee: {
                    required: true,
                    minlength: 1,
                    maxlength: 8
                },
                state_masterfee: {
                    required: true,
                    minlength: 1,
                    maxlength: 8
                },
                state_royalty: {
                    required: true,
                    minlength: 1,
                    maxlength: 2
                },
                country_investment: {
                    required: true
                },
                country_unitfee: {
                    required: true,
                    minlength: 1,
                    maxlength: 8
                },
                country_masterfee: {
                    required: true,
                    minlength: 1,
                    maxlength: 8
                },
                country_royalty: {
                    required: true,
                    minlength: 1,
                    maxlength: 2
                },
                region_investment: {
                    required: true
                },
                region_unitfee: {
                    required: true,
                    minlength: 1,
                    maxlength: 8
                },
                region_masterfee: {
                    required: true,
                    minlength: 1,
                    maxlength: 8
                },
                region_royalty: {
                    required: true,
                    minlength: 1,
                    maxlength: 2
                },
                prop_area_max: {
                    required: true,
                    minlength: 3,
                    maxlength: 8,
                    greaterThanId: "#prop_area_min"
                },
                unit_investment_min: {
                    required: true,
                    minlength: 2,
                    maxlength: 8
                },
                unit_investment_max: {
                    required: true,
                    minlength: 3,
                    maxlength: 10,
                    greaterThanId: "#unit_investment_min"
                },
                company_logo: {
                    required: true,
                    acceptedFileTypes: "jpg,png,jpeg,gif",
                    fileSize: 2 * 1024 * 1024
                }
            },
            messages: {
                company_name: {
                    required: "Please enter company name",
                    minlength: jQuery.format("Please enter at least {0} character company name"),
                    maxlength: jQuery.format("Please enter maximum of {0} character company name")
                },
                website: {
                    required: "Please enter Website/Web-Link",
                    minlength: jQuery.format("Please enter at least {0} character Website/Web-Link"),
                    maxlength: jQuery.format("Please enter maximum of {0} character Website/Web-Link")
                },
                ceo_name: {
                    required: "Please enter ceo name",
                    minlength: jQuery.format("Please enter at least {0} character name"),
                    maxlength: jQuery.format("Please enter maximum of {0} character name")
                },
                fran_manager: {
                    required: "Please enter franchise manager",
                    minlength: jQuery.format("Please enter at least {0} character name"),
                    maxlength: jQuery.format("Please enter maximum of {0} character name")
                },
                fran_address: {
                    required: "Please enter franchise address",
                    minlength: jQuery.format("Please enter at least {0} word address")
                },
                mobile_int: {
                    required: "Please enter mobile number",
                    minlength: jQuery.format("Please enter at least {0} digit mobile number"),
                    maxlength: jQuery.format("Please enter max {0} digit mobile number"),
                    number: "Please enter numeric digit only"
                },
                unitinv_royalty: {
                    required: "Please enter royalty commission",
                    minlength: jQuery.format("Please enter at least {0} digit royalty commission"),
                    maxlength: jQuery.format("Please enter max {0} digit royalty commission")
                },
                prop_area_min: {
                    required: "Please enter minimum property area",
                    minlength: jQuery.format("Please enter at least {0} digit property area"),
                    maxlength: jQuery.format("Please enter max {0} digit property area")
                },
                prop_area_max: {
                    required: "Please enter maximum property area",
                    minlength: jQuery.format("Please enter at least {0} digit maximum property area"),
                    maxlength: jQuery.format("Please enter max {0} digit maximum property area")
                },
                unit_investment_min: {
                    required: "Please enter minimum investment",
                    minlength: jQuery.format("Please enter at least {0} digit investment"),
                    maxlength: jQuery.format("Please enter max {0} digit investment")
                },
                unit_investment_max: {
                    required: "Please enter maximum investment",
                    minlength: jQuery.format("Please enter at least {0} digit maximum investment"),
                    maxlength: jQuery.format("Please enter max {0} digit maximum investment")
                },
                country: "Please select country",
                state: {
                    required: "Please select state"
                },
                city: {
                    required: "Please select city"
                },
                ceo_email: {
                    required: "Please enter email",
                    email: "Please enter valid email"
                },
                ceo_mobile: {
                    required: "Please enter mobile no.",
                    number: "Please enter valid number",
                    minlength: jQuery.format("Please enter at least {0} digits number"),
                    maxlength: jQuery.format("Please enter maximum of {0} digits number")
                },
                telephone: {
                    number: "Please enter numeric value!!!"
                },
                pincode_int: {
                    required: "Please enter pincode",
                    minlength: jQuery.format("Please enter at least {0} digits pincode"),
                    maxlength: jQuery.format("Please enter maximum of {0} digits pincode"),
                    number: "Please enter numeric value!!!"
                },
                secondary_email: {
                    email: "Please enter valid secondary email address"
                },
                ind_main_cat: "Please select category",
                ind_cat: "Please select sub category",
                ind_sub_cat: "Please select sub sub category",
                operations_start_year: "Please select operation year",
                franchise_start_year: "Please select franchise year",
                looking_for_expansion: "Please select expansion",
                business_desc: "Please enter business Details (Min 25 chatacters)",
                "trade_margin[]": "Please enter trade margin 1% - 99%",
                "state[]": "Please select atlast one state",
                company_logo: fileRuleMessage()
            },
            errorPlacement: function(error, element) {
                if (element.attr('type') === "checkbox") {
                    if (element.attr("name") === "franchise_partner_type[]") {
                        error.insertAfter("#lookingFranchisePartnerInput");
                    } else if (element.attr("name") === "state[]") {
                        error.insertAfter("#dead");
                    }
                } else {
                    error.appendTo(element.parent().parent());
                }

            }
        });
        $(document).ready(function() {});

        //fetching the subcategories
        function getSubCategory(value) {
            $.ajax({
                type: 'GET',
                url: '/getsubcategory',
                data: {
                    categoryID: value
                },
                success: function(data) {
                    $("#getSubCategoryData").html(data);
                }
            });
        }

        //fetching sub-sub categories
        function getSubCatCategory(value) {
            $.ajax({
                type: 'GET',
                url: '/getsubcatcategory',
                data: {
                    subcategoryID: value
                },
                success: function(data) {
                    $("#getSubCatCategoryData").html(data);
                }
            });
        }

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }

        var selectedBusinessTypeValue = $('input:radio[name="looking_franchise"]:checked').val();

        $('input:radio[name="looking_franchise"]').change(function() {
            selectedBusinessTypeValue = this.value;
            if (this.checked && "1" === this.value) {
                $(".lookingFranchisePartnerInput").show();
                $(".tradePartnersInputs").hide();
                $(".disabled-area fieldset").attr("disabled", true);
                $(".multiUnitCheckBoxes").prop("checked", !1);
                $("#more").css("display", "none");
                $("#ind_main_cat").html("<option value=''>Select Industry</option>" +
                    @foreach (Config('constants.CategoryArr') as $index => $value)
                        "<option value='{{ $index }}'>{{ $value }}</option>" +
                    @endforeach
                    "");
                $('#zoneText').html('Current Outlet Zones');
                $('#commencedFranText').html('Franchising Commenced On');
                $('#outletCountText').html('No. Of Franchise Outlets');
                $(".hideForTradePartner").show();
                $("#getSubCategoryData").html("<option value=''>Select Sector</option>");
                $("#getSubCatCategoryData").html("<option value=''>Select Service / Product</option>");
                $("#checkingTradeMaterial").find('label').first().show();
                $("#businessDescText").html(" franchising ");
            } else {
                $(".lookingFranchisePartnerInput").hide();
                $(".tradePartnersInputs").show();
                $(".lookingFrUnitInput").hide();
                $(".hideForTradePartner").hide();
                $(".lookingFrMultiUnitInput").hide();
                $('#zoneText').html('Existing Network Zones');
                $('#commencedFranText').html('Expansion Commenced On');
                $('#outletCountText').html('No. Of Channel Partners');
                $("input[name='franchise_partner_type[]']").prop("checked", !1);
                $("#more").css("display", "block");
                $("#ind_main_cat").html("<option value='5'>Dealers & Distributors</option>");
                $("#getSubCategoryData").html("<option value=''>Select Sector</option>" +
                    @foreach (Config('constants.subCategoryArr.5') as $index => $value)
                        "<option value='{{ $index }}'>{{ $value }}</option>" +
                    @endforeach
                    "");
                $("#checkingTradeMaterial").find('label').first().hide();
                $("#businessDescText").html(" channel ");
                $("#getSubCatCategoryData").html("<option value=''>Select Service / Product</option>");
            }
            checkForChannelArray();
        });

        function checkForChannelArray() {
            if (selectedBusinessTypeValue == '2') {
                $("#no_fran_outlets").find("option:first").html("Select No Of Dealerships/Distributorships");
                $("#outletCountText").html("No Of Dealerships/Distributorships");
                $('select[name="channel_type[]"]').html(
                    " @foreach (Config('constants.dealerAndDistributorChannels') as $index => $value) <option value='{{ $index }}'>{{ $value }}</option> @endforeach "
                    );
            } else if (selectedBusinessTypeValue == '0') {
                $("#no_fran_outlets").find("option:first").html("Select No Of Channel Partners");
                $("#outletCountText").html("No Of Channel Partners");
                $('select[name="channel_type[]"]').html(
                    " @foreach (Config('constants.tradePartnerChannels') as $index => $value) <option value='{{ $index }}'>{{ $value }}</option>  @endforeach "
                    );
            } else {
                $("#no_fran_outlets").find("option:first").html("Select No Of Outlets");
                $("#outletCountText").html("No Of Current Outlets");
                $('select[name="channel_type[]"]').html(
                    " @foreach (Config('constants.dealerAndDistributorChannels') as $index => $value) <option value='{{ $index }}'>{{ $value }}</option> @endforeach "
                    );
            }
        }
        var tPCount = 2;
        $('#more').on('click', function() {
            var newfield =
                '<div class="row posrel"><hr size="5"><div class="col-xs-12 col-sm-4 paddleft30"><div class="form-group margintb15">Types of Channels</div><div class="form-group"><div class="input-group"><span class="input-group-addon"><img alt="channels" src="https://www.franchiseindia.com/images/channels.png"></span><select name="channel_type[]" class="form-control myselectclass"></select></div></div></div><div class="col-xs-12 col-sm-4 padd-lft-rht"><div class="form-group margintb15">Investment (If any)</div><div class="form-group"><div class="input-group"><span class="input-group-addon"><img alt="rate" src="https://www.franchiseindia.com/images/range-rate.png"></span><select name="trade_investment[]" class="form-control myselectclass">' +
                @foreach (Config('constants.investRangeInWords') as $index => $value)
                    '<option value="{{ $index }}">{{ $value }}</option>' +
                @endforeach
            '</select></div></div></div><div class="col-xs-12 col-sm-4 padd-lft-rht mynewlpad"><div class="form-group margintb15">Margin / Commissions %</div><div class="form-group"><div class="input-group"><span class="input-group-addon"><img alt="commission" src="https://www.franchiseindia.com/images/commission.png"></span><input type="text" name="trade_margin[]"pattern="[0-9]{1,2}" minlength="1" maxlength="2" class="form-control"  placeholder="Enter Margin / Commissions %" ></div></div></div><input type="button" id="close-trade-block" value="[-]" class="posabsoblock"></div>';
            tPCount = ++tPCount;
            $('#trade-partner-blocks').append(newfield);
            checkForChannelArray();
        });

        $(document).on('click', '#close-trade-block', function() {
            $(this).parent('div').remove();
        });

        $(document).ready(function() {

            $(".multiUnitCheckBoxes").click(function() {

                if ($(this).is(":checked")) {
                    $(this).parent().parent().find('fieldset').removeAttr("disabled", true);
                } else {
                    $(this).parent().parent().find('fieldset').attr("disabled", true);
                }
            });
            $('#franchise_partner_type').change(function() {
                if ($(this).is(":checked")) {
                    $(".lookingFrUnitInput").show();
                } else {
                    $(".lookingFrUnitInput").hide();
                }
            });

            $('#franchise_partner_type1').change(function() {
                if ($(this).is(":checked")) {
                    $(".lookingFrMultiUnitInput").show();
                } else {
                    $(".lookingFrMultiUnitInput").hide();
                    $(".disabled-area fieldset").attr("disabled", true);
                    $(".multiUnitCheckBoxes").prop("checked", !1);
                }
            });
        });

        $('.checkAll').click(function() {
            if ($(this).is(':checked')) {
                $(this).parent().siblings().find('input:checkbox').prop('checked', true);
            } else {
                $(this).parent().siblings().find('input:checkbox').prop('checked', false);
            }
        });

        function toggle_password(target) {
            var tag = document.getElementById(target);
            var dv = "show" + target;
            var tag2 = document.getElementById(dv);
            if (tag2.innerHTML === 'Show') {
                tag.setAttribute('type', 'text');
                tag2.innerHTML = 'Hide';
            } else {
                tag.setAttribute('type', 'password');
                tag2.innerHTML = 'Show';
            }
        }
    </script>
@endsection
