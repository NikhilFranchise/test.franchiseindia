@extends('layout.master')
@section('seoTitle', 'Join - franchiseindia.com')
@section('seoDesc',
    'All set to become an entrepreneur? Register with Franchise India and become an A-list Investor to
    give your business a perfect launch pad.')
@section('content')
    <!--step process start  here -->
    <div class="container formsection margintop60 staicp">
        <h1 class="noneunder"> Investor Registration</h1>
    </div>
    <!--step process end  here -->
    <!--form start here -->
    <div class="container formsection">
        <div class=""
            style="text-align:center;margin-top: 45px; margin-bottom:30px; color: #000;font-size: 17px;font-weight: 400;">
            Chat on <a
                href="https://api.whatsapp.com/send?phone=919312650021&amp;text=Hello,%20I%20am%20interested%20in%20knowing%20more%20about ?%20https://www.franchiseindia.com/"
                target="_blank"><img src="https://www.franchiseindia.com/newhomepage/assets/img/whatappsicon.svg"
                    class="sts"></a>
        </div>
        <div class="row margt0">
            <!--left form section start here -->
            <div class="col-xs-12 col-sm-9 bor-radius backwhite targleft row-no-padding">
                <form class="form-horizontal formInv" name="form_investor" id="investorRegForm"
                    action="{{ url('investor/register') }}" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="profile_id" value="{{ session()->get('profileId') }}">
                    <input type="hidden" name="gst_no" value="{{ request()->gst_no }}">
                    <!-- step 1 start here -->
                    <div class="setup-content" id="step-1" style="display:block;">
                        <!-- displaying session errors -->
                        <input type="hidden" name="flag"
                            @if (isset($flag)) value="{{ $flag }}" @endif>
                        @if (isset($flag) && $flag == 2)
                            <input type="hidden" name="inv_plan" value="{{ $plan }}" />
                        @endif
                        @if (Session::has('errorMessage'))
                            <p class="alert alert-info">{{ Session::get('status') }}</p>
                        @endif
                        <!-- displaying exception errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-xs-12 pad30 showbg">
                            @if (isset($flag) && $flag == 2)
                                @if ($plan == 405)
                                    <div class="formsection investbyuser selectspace">
                                        <div class="bor-radius padspc platinum platinumb">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-4 col-md-4 selplan">
                                                    Payment Plan : <span>Platinum</span>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4 selplan">
                                                    Payment : <span><i class="fa fa-inr" aria-hidden="true"></i>
                                                        {{ number_format(Config('constants.invPlanAmount.405')) }}</span>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4 selplan">
                                                    Months : <span> 12</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($plan == 402)
                                    <div class="formsection investbyuser selectspace">
                                        <div class="bor-radius padspc orange orangeb">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-4 col-md-4 selplan">
                                                    Payment Plan : <span>Copper</span>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4 selplan">
                                                    Payment : <span><i class="fa fa-inr" aria-hidden="true"></i>
                                                        {{ number_format(Config('constants.invPlanAmount.402')) }}</span>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4 selplan">
                                                    Months : <span> 12</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($plan == 403)
                                    <div class="formsection investbyuser selectspace">
                                        <div class="bor-radius padspc silver silverb">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-4 col-md-4 selplan">
                                                    Payment Plan : <span>Silver</span>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4 selplan">
                                                    Payment : <span><i class="fa fa-inr" aria-hidden="true"></i>
                                                        {{ number_format(Config('constants.invPlanAmount.403')) }}</span>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4 selplan">
                                                    Months : <span> 12</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($plan == 404)
                                    <div class="formsection investbyuser selectspace">
                                        <div class="bor-radius padspc gold goldb">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-4 col-md-4 selplan">
                                                    Payment Plan : <span>Gold</span>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4 selplan">
                                                    Payment : <span><i class="fa fa-inr" aria-hidden="true"></i>
                                                        {{ number_format(Config('constants.invPlanAmount.404')) }}</span>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4 selplan">
                                                    Months : <span> 12</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="formsection investbyuser selectspace">
                                        <div class="bor-radius padspc basic basicb">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-4 col-md-4 selplan">
                                                    Payment Plan : <span>Basic</span>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4 selplan">
                                                    Free
                                                    Registration
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4 selplan">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                            <div class="sidehead">Personal Details</div>
                            @php
                                if (!empty(session()->get('social_inv'))) {
                                    $Res = json_encode(session()->get('social_inv'));
                                } else {
                                    $Res = '';
                                }
                                $email = '';
                                $name = '';
                            @endphp
                            {{ $Res }}
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Name</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row row-no-margin">
                                        <div class="col-xs-3 col-sm-3 col-md-3 row-no-padding eds">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img src="{{ url('images/user.png') }}"
                                                        alt="user"></span>
                                                <select name="title" class="form-control myselectclass3" id="titlesur">
                                                    <option value="1">Mr.</option>
                                                    <option value="2">Mrs.</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-3 col-sm-9 col-md-9 row-no-padding eds2">
                                            <input type="text" class="form-control" placeholder="Enter Your Name"
                                                minlength="3" name="invName" value="{{ $name }}"
                                                required="required">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Email Id (User
                                    Id)</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/profile.png') }}"
                                                alt="email id"></span>
                                        <input class="form-control" id="emailinvestor" minlength="6" type="text"
                                            onchange="myFunction()" onKeyUp="myFunction()" name="email"
                                            value="{{ $email }}" placeholder="Enter Your Email Id"
                                            required="required">
                                    </div>
                                    <span id="result" style="color:red"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Password</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/pwd.png') }}"
                                                alt="password"></span>
                                        <input type="password" name="password" class="form-control" pattern=".{6,15}"
                                            minlength="6" maxlength="15" placeholder="Enter Your Password"
                                            id="pwd1" required="required"
                                            onkeyup="CheckPassword(document.form_investor.password)">
                                        <div style="text-align: center;"><span onClick="toggle_password('pwd1');"
                                                id="showpwd1" class="showhidecng">Show</span></div>
                                    </div>
                                    <div style="display: none; color: red;" id="passwordError">Password contain atleast 1
                                        lower character, 1 upper character, 1 digit & 1 special character
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Mobile</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/mobile.png') }}"
                                                alt="mobile"></span>
                                        <input name="mobile" id="mobile" type="text" class="form-control"
                                            maxlength="10" placeholder="Enter Mobile" required>
                                        <center><span onClick="validatemobile();" id="validatemobile" class="showhidecng"
                                                style="display: none">Verify</span></center>
                                        <center><span onClick="editmobile();" id="editmobile" class="showhidecng"
                                                style="display: none">Edit</span></center>
                                        <center><span id="successmobile" class="showhideright" style="display: none"><i
                                                    class="fa fa-check fa-lg" aria-hidden="true"></i></span></center>
                                    </div>
                                    <div id="chaangemobile" style="display: none; color: red;">This mobile number is
                                        already in use, Please change to new number
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="display: none;" id="otpblock">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">One Time
                                    Password</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/mobile.png') }}"
                                                alt="password"></span>
                                        <input id="otp" type="text" class="form-control" maxlength="4"
                                            placeholder="Enter OTP" onkeyup="varifyotp(this.value);">
                                        <center><span id="verify_button" class="showhidecng" style="display: none"
                                                onclick="verify2()">Verify</span></center>
                                    </div>
                                    <div style="display: none" id="mismatch">OTP Mismatch</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Address
                                    Details</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon height100"><img
                                                src="{{ url('images/addreess.png') }}" alt="address"></span>
                                        <textarea class="form-control height100" placeholder="please enter your address" minlength="6" name="address"
                                            required="required"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">State</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/state.png') }}"
                                                alt="state"></span>
                                        <select class="form-control myselectclass" name="state" id="state"
                                            required="required">
                                            <option value="">select State</option>
                                            @foreach (Config('location.stateArr') as $index => $value)
                                                <option value="{{ $value }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
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
                                        <select class="form-control myselectclass" id="city_" name="city"
                                            required="required">
                                            <option value="">select City</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Country</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/country.png') }}"
                                                alt="country"></span>
                                        <select class="form-control myselectclass" name="country" required="required">
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
                                                alt="pincode"></span>
                                        <input type="text" name="pincode" pattern="[0-9]{6,6}" maxlength="6"
                                            class="form-control" placeholder="Enter Pincode" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-md-4 col-sm-4 com4mod control-label"><span
                                        class="mandatory">Industry Type ( Interested In ) </span><br><span
                                        class="note">Multiple Options Available - MAX 3<br>(Press Control key and
                                        select)</span></label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon height100"><img
                                                src="{{ url('images/industrytype.png') }}" alt="industry type"></span>
                                        <select name="industry_type[]" id="industry_type" required="required"
                                            class="form-control height100" multiple="multiple">
                                            @foreach (Config('constants.CategoryArr') as $index => $value)
                                                <option value="{{ $index }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Investment
                                    Range</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/range-rate.png') }}"
                                                alt="investment range"></span>
                                        <select class="form-control myselectclass" id="investment_range"
                                            required="required" name="investment_range">
                                            <option value="">select investment range</option>
                                            @foreach (Config('constants.investRangeInWords') as $index => $value)
                                                <option value="{{ $index }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Available
                                    Capital</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/range-rate.png') }}"
                                                alt="Available capital"></span>
                                        <select class="form-control myselectclass" id="available_capital"
                                            required="required" name="available_capital">
                                            <option value="">select Available capital</option>
                                            @foreach (Config('constants.investRangeInWords') as $index => $value)
                                                <option value="{{ $index }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label
                                    class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox mandatory">Need
                                    for loan?</label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-3 ">
                                                <input type="radio" name="loan_interest" value="1"> Yes
                                            </label>
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="loan_interest" value="0"
                                                    checked="checked"> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="isneedloan" style="display: none;">
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Loan
                                        Range</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img src="{{ url('images/range-rate.png') }}"
                                                    alt="Loan Range"></span>
                                            <select name="loan_range" class="form-control myselectclass">
                                                <option value=""> -- Select Loan Range -- </option>
                                                <option value="0 - 15 Lac">0 - 15 Lac</option>
                                                <option value="15 - 30 Lac">15 - 30 Lac</option>
                                                <option value="30 - 50 Lac">30 - 50 Lac</option>
                                                <option value="50 Lac - 1 Cr">50 Lac - 1 Cr</option>
                                                <option value="1 - 5 Cr">1 - 5 Cr</option>
                                                <option value="Above 5 Cr">Above 5 Cr</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Current
                                        Income (Monthly)</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img src="{{ url('images/range-rate.png') }}"
                                                    alt="Loan Range"></span>
                                            <select name="income_range" class="form-control myselectclass">
                                                <option value="">--Select Income Range --</option>
                                                <option value="1 - 5 Lacs ">1 - 5 Lacs </option>
                                                <option value="5 - 10 Lacs ">5 - 10 Lacs </option>
                                                <option value="Above 10 lacs">Above 10 lacs</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Type Of
                                        Property To Mortgage</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img
                                                    src="https://www.franchiseindia.com/images/range-rate.png"></span>
                                            <select name="property_type" class="form-control myselectclass">
                                                <option value="">--Type Of Property --</option>
                                                <option value="Residential">Residential</option>
                                                <option value="Commercial">Commercial</option>
                                                {{--
                                 <option value="plot">plot</option>
                                 --}}
                                                <option value="Godown">Godown</option>
                                                <option value="Garage">Garage</option>
                                                <option value="Warehouse">Warehouse</option>
                                                <option value="Land">Land</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Mortgage
                                        Property Size</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img
                                                    src="https://www.franchiseindia.com/images/propertyuse.png"></span>
                                            <select name="property_size" class="form-control myselectclass">
                                                <option value="">--Select Property Size --</option>
                                                <option value="Under 500 Sq ft">Under 500 Sq ft</option>
                                                <option value="500 - 1000 Sq ft">500 - 1000 Sq ft</option>
                                                <option value="1000 Sq ft and above">1000 Sq ft and above </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Mortgage
                                        Property Value</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img
                                                    src="https://www.franchiseindia.com/images/range-rate.png"></span>
                                            <input type="text" class="form-control" name="property_value"
                                                placeholder="Enter Property Value (INR)">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Purpose Of
                                        Loan</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon height100"><img
                                                    src="{{ url('images/addreess.png') }}" alt="address"></span>
                                            <textarea class="form-control height100" id="details" name="details" placeholder="Enter Purpose Of Loan Detail"
                                                maxlength="60"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">
                                    How soon would you like to invest?
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ URL::asset('images/date.png') }}"
                                                alt="date"></span>
                                        <select class="form-control" required="required" name="investment_date">
                                            <option value="">select time frame</option>
                                            @foreach (Config::get('constants.InvestTimeFrame') as $index => $value)
                                                <option value="{{ $index }}"> {{ $value }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Education
                                    Qualification</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/education.png') }}"
                                                alt="education"></span>
                                        <select id="investor-edu_qual" class="form-control" name="qualification"
                                            required>
                                            <option value="">select Education Qualification</option>
                                            @foreach (Config('constants.eduQualification') as $index => $value)
                                                <option value="{{ $index }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Occupation</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/occupation.png') }}"
                                                alt="occupation"></span>
                                        <select id="investor-occupation" class="form-control" name="occupation"
                                            required="required">
                                            <option value="">select Occupation</option>
                                            @foreach (Config('constants.occupation') as $index => $value)
                                                <option value="{{ $index }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="occupationService" style="display: none;">
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Service</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img src="{{ url('images/occupation.png') }}"
                                                    alt="service"></span>
                                            <select id="investorService" class="form-control">
                                                <option value="">select Service</option>
                                                <option value="1">MNC</option>
                                                <option value="2">Pvt.</option>
                                                <option value="3">Govt.</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Company name</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img src="{{ url('images/occupation.png') }}"
                                                    alt="company name"></span>
                                            <input type="text" id="investorServiceCompany" minlength="3"
                                                class="form-control" placeholder="Enter Company Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="businessOccupation" style="display: none;">
                                <div class="form-group">
                                    <label class="col-xs-12 col-md-4 col-sm-4 com4mod control-label"><span
                                            class="mandatory">Industry Type (Business In)</span><br><span
                                            class="note">Multiple Options Available - MAX 3<br>(Press Control key and
                                            select)</span></label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon height100"><img
                                                    src="{{ url('images/industrytype.png') }}"
                                                    alt="industry type"></span>
                                            <select id="industry_type_business" class="form-control height100"
                                                multiple="multiple">
                                                @foreach (Config('constants.CategoryArr') as $index => $value)
                                                    <option value="{{ $index }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Company name</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img src="{{ url('images/occupation.png') }}"
                                                    alt="company name"></span>
                                            <input type="text" id="investorBusinessCompany" minlength="3"
                                                class="form-control" placeholder="Enter Company Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="isFranchiseExp" style="display: none;">
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Brand Name (
                                        Franchising )</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img src="{{ url('images/company.png') }}"
                                                    alt="company name"></span>
                                            <input type="text" id="franchiseExperienceBrand" minlength="3"
                                                class="form-control" placeholder="Enter Brand Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Looking
                                    For</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row checkmargin specify">
                                        <div class="col-sm-12 row-no-padding redspace">
                                            @foreach (Config('constants.invLookingFor') as $index => $value)
                                                <label class="col-xs-12 col-sm-6 col-md-4 mofy">
                                                    <input type="checkbox" name="looking_for[]"
                                                        value="{{ $index }}"> {{ $value }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Looking for
                                    Business In ( State )</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/state.png') }}"
                                                alt="state"></span>
                                        <select class="form-control myselectclass" name="business_state_looking"
                                            id="business_state_looking" required="required">
                                            <option value="">select State</option>
                                            @foreach (Config('location.stateArr') as $index => $value)
                                                <option value="{{ $index }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Looking for Business In (
                                    City )</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/city.png') }}"
                                                alt="city"></span>
                                        <select class="form-control myselectclass" id="business_city_looking"
                                            name="business_city_looking" required="required">
                                            <option value="">select City</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox">Do you
                                    own a property?</label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-3 ">
                                                <input type="radio" name="is_property_own" value="1"> Yes
                                            </label>
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="is_property_own" value="0"
                                                    checked="checked"> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="propertyRequired" style="display: none;">
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Property
                                        Type</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img
                                                    src="{{ url('images/propertyuse.png') }}" alt="property use"></span>
                                            <select id="property_use" class="form-control myselectclass">
                                                <option value="">Select Property Type</option>
                                                @foreach (Config('constants.invPropertyType') as $index => $value)
                                                    <option value="{{ $index }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group multipleinputsetheight50">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Floor Area
                                        Requirements</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="row row-no-margin">
                                            <div class="col-xs-12 col-sm-6 row-no-padding width184 FlrAreaMin">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img
                                                            src="https://www.franchiseindia.com/images/calendar.png"
                                                            alt="calender"></span>
                                                    <input type="text" id="prop_area_min" pattern="[0-9]{2,5}"
                                                        minlength="2" maxlength="5" class="form-control"
                                                        placeholder="Min area">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 row-no-padding wwidth148 FlrAreaMax">
                                                <input type="text" id="prop_area_max" pattern="[0-9]{3,6}"
                                                    minlength="3" maxlength="6" class="form-control"
                                                    placeholder="Max area">
                                            </div>
                                            <div class="col-xs-12 col-sm-3 row-no-padding wwidth148 FlrAreaSqFt">
                                                <select id="area_type" class="form-control myselectclass"
                                                    name="area_type">
                                                    @foreach (Config('constants.areaType') as $index => $value)
                                                        <option value="{{ $index }}">{{ "$value" }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox"></label>
                            <div class="col-sm-1 com1mod padcheck hidden-xs"></div>
                            <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                <div class="row">
                                    <input type="checkbox" name="is_termsagree4" id="is_termsagree4" value="1"
                                        checked> I agree to the <a href="{{ Config('constants.MainDomain') }}/terms" style="color: blue"
                                        target="_blank"><u><i>Terms & Conditions</i></u></a>
                                </div>
                            </div>
                        </div>
                        <div class="row colbg">
                            <center>
                                <button class="btn btn-default nextBtn submitinvestor" id="save1"
                                    type="submit">Register</button>
                            </center>
                        </div>
                    </div>
                    <!-- step 1 end here -->
                </form>
                <!---->
            </div>
            <!--left form section end here -->
            <!--right form section start here -->
            @include('includes.faq')
            <!--right form section end here -->
        </div>
    </div>
    <script language="javascript">
        $(document).ready(function() {
            $('#is_termsagree4').click(function() {
                if ($('#is_termsagree4').is(':checked')) {
                    //alert('checked');
                    $('#save1').prop('disabled', false);
                } else {
                    $('#save1').prop('disabled', true);
                    //alert('un-checked');
                }
            });

            $("#mobile").keyup(function() {
                console.log(this.value);
                getMobileStatusInvestor(this.value);
            });
        });
    </script>
    <script language="javascript">
        $('input[type=radio][name=experience_in_franchise]').change(function() {
            if (this.value == '1') {
                $("#isFranchiseExp").show();
                $("#franchiseExperienceBrand").attr('name', 'franchise_brand_name');
                $("#franchiseExperienceBrand").attr('required', true);
            } else {
                $("#isFranchiseExp").hide();
                $("#franchiseExperienceBrand").removeAttr('name');
                $("#franchiseExperienceBrand").removeAttr('required');
            }
        });

        $('input[type=radio][name=loan_interest]').change(function() {
            if (this.value == '1') {
                $("#isneedloan").show();

            } else {
                $("#isneedloan").hide();
                $("#franchiseExperienceBrand").removeAttr('required');
            }
        });

        $('input[type=radio][name=is_property_own]').change(function() {
            if (this.value == '1') {
                $("#propertyRequired").show();
                $("#property_use").attr('name', 'property_use');
                $("#property_use").attr('required', true);

                $("#prop_area_min").attr('name', 'min_area');
                $("#prop_area_min").attr('required', true);

                $("#prop_area_max").attr('name', 'max_area');
                $("#prop_area_max").attr('required', true);
            } else {
                $("#propertyRequired").hide();
                $("#property_use").removeAttr('name');
                $("#property_use").removeAttr('required');

                $("#prop_area_min").removeAttr('name');
                $("#prop_area_min").removeAttr('required');

                $("#prop_area_max").removeAttr('name');
                $("#prop_area_max").removeAttr('required');
            }
        });



        $("#investor-occupation").change(function() {
            var id = $(this).val();
            var dataString = 'id=' + id;

            if (id == 2) {
                $("#occupationService").show();
                $("#investorService").attr('name', 'company_service');
                $("#investorService").attr('required', true);
                $("#investorServiceCompany").attr('name', 'company_service_name');
                $("#investorServiceCompany").attr('required', true);
            } else {
                $("#occupationService").hide();
                $("#investorService").removeAttr('name');
                $("#investorService").removeAttr('required');
                $("#investorServiceCompany").removeAttr('name');
                $("#investorServiceCompany").removeAttr('required');
            }

            if (id == 3) {
                $("#businessOccupation").show();
                $("#industry_type_business").attr('name', 'industry_type_business[]');
                $("#industry_type_business").attr('required', true);
                $("#investorBusinessCompany").attr('name', 'company_business_name');
                $("#investorBusinessCompany").attr('required', true);
            } else {
                $("#businessOccupation").hide();
                $("#industry_type_business").removeAttr('name');
                $("#industry_type_business").removeAttr('required');
                $("#investorBusinessCompany").removeAttr('name');
                $("#investorBusinessCompany").removeAttr('required');
            }

            return false;
        });

        var verified = [];
        document.querySelector('#industry_type').onchange = function(e) {
            if (this.querySelectorAll('option:checked').length <= 3) {
                verified = Array.apply(null, this.querySelectorAll('option:checked'));
            } else {
                Array.apply(null, this.querySelectorAll('option')).forEach(function(e) {
                    e.selected = verified.indexOf(e) > -1;
                });
            }
        };

        document.querySelector('#industry_type_business').onchange = function(e) {
            if (this.querySelectorAll('option:checked').length <= 3) {
                verified = Array.apply(null, this.querySelectorAll('option:checked'));
            } else {
                Array.apply(null, this.querySelectorAll('option')).forEach(function(e) {
                    e.selected = verified.indexOf(e) > -1;
                });
            }
        };

        // check email verification
        function myFunction() {
            $value = document.getElementById('emailinvestor').value;
            if ($value) {
                $.ajax({
                    type: 'get',
                    async: true,
                    url: '{{ URL::to('validate-email') }}',
                    data: {
                        'search': $value
                    },
                    success: function(data) {
                        $('#result').html(data.email);
                        if (data.email != "")
                            $("#save1").attr('disabled', true);
                        if (data.email == "")
                            $("#save1").attr('disabled', false);
                    }
                })
            }
        }


        function toggle_password(target) {
            var tag = document.getElementById(target);
            var dv = "show" + target;
            var tag2 = document.getElementById(dv);
            if (tag2.innerHTML == 'Show') {
                tag.setAttribute('type', 'text');
                tag2.innerHTML = 'Hide';
            } else {
                tag.setAttribute('type', 'password');
                tag2.innerHTML = 'Show';
            }
        }

        //javascript password validation
        function CheckPassword(inputtxt) {
            var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
            if (inputtxt.value.match(passw)) {
                $("#save1").prop('disabled', false);
                $("#passwordError").css('display', 'none');
                return true;
            } else {
                $("#save1").prop('disabled', true);
                $("#passwordError").css('display', 'block');
                return false;
            }
        }


        function getMobileStatusInvestor(value) {
            console.log('function enter');
            if ($('#successmobile').css('display') != "block") {
                if (value.length > 9) {
                    if ($.isNumeric(value)) {
                        console.log('number verified');
                        $.ajax({
                            type: 'get',
                            url: '/user/investor-mobile-verify',
                            data: {
                                mobile: value
                            },
                            success: function(response) {
                                console.log(response);
                                if (response == 0) {
                                    $('#validatemobile').css('display', 'block');
                                    $('#save1').attr('disabled', true);
                                    $('#chaangemobile').css('display', 'none');
                                    $("#successmobile").hide();
                                } else {
                                    $("#successmobile").hide();
                                    $('#chaangemobile').css('display', 'block');
                                    $('#save1').attr('disabled', true);
                                }

                            }
                        });
                    }
                }
            }
            if (value.length != 10) {
                $("#successmobile").hide();
                $('#chaangemobile').css('display', 'none');
                $('#validatemobile').css('display', 'none');
                $('#save1').attr('disabled', false);
            }
        }

        function varifyotp(value) {
            if (value.length == 4) {
                $('#verify_button').css('display', 'block');

            }
            if (value.length != 4) {
                if ($.isNumeric(value)) {
                    $('#validatemobile').css('display', 'none');
                }
            }
        }

        function editmobile() {
            $('#mobile').attr('readonly', false);
            $('#editmobile').css('display', 'none');
            $('#validatemobile').css('display', 'block');
            $('#otpblock').css('display', 'none');
        }

        function validatemobile() {
            console.log('validatemobile');
            $('#mobile').attr('readonly', true);
            $('#editmobile').css('display', 'block');
            $('#validatemobile').css('display', 'none');
            $('#otpblock').css('display', 'block');
            $('#save1').attr('disabled', true);

            var keyword = document.getElementById('mobile').value;
            console.log(keyword);
            $.ajax({
                type: 'get',
                url: '/invester-verifyformmobilenumber',
                data: {
                    mobile: keyword
                },
                success: function(data) {
                    console.log(data);
                    if (data == 'numexists') {
                        $('#successmobile').css('display', 'block');
                        $('#save1').attr('disabled', false);
                        $('#otpblock').css('display', 'none');
                        $('#mobile').attr('readonly', true);
                        $('#editmobile').css('display', 'none');
                        $('#validatemobile').css('display', 'none');
                    }
                }
            });
        }

        function verify2() {
            console.log('verify');
            var otp = document.getElementById('otp').value;
            var mobile = document.getElementById('mobile').value;
            $.ajax({
                type: 'get',
                url: '/investor/verify-otp',
                data: {
                    otpNo: otp,
                    mobileNo: mobile
                },
                crossDomain: true,
                success: function(data) {

                    console.log(data);
                    if (data == 0) {
                        $('#mismatch').css('display', 'block');
                    } else {
                        $('#successmobile').css('display', 'block');
                        $('#save1').attr('disabled', false);
                        $('#otpblock').css('display', 'none');
                        $('#editmobile').css('display', 'none');
                        $('#validatemobile').css('display', 'none');
                    }
                }

            });
        }

        //datepicker function for form step1
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                maxDate: '-18Y',
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+0"
            });
        });

        $("#datepicker").change(function() {
            $("input").removeClass("error");
            $("select").removeClass("error");
            $("textarea").removeClass("error");
            $("label.error").css("display", "none");
        });
    </script>
    <script>
        $('#state').on('change', function() {

            var value = this.value;
            //alert(value);
            $.ajax({
                type: 'GET',
                url: '/getcitylistBystatename',
                data: {
                    state: value
                },
                success: function(data) {
                    $("#city_").html(data);
                }
            });
        });
    </script>
    <script>
        $('#business_state_looking').on('change', function() {
            var value = this.value;
            $.ajax({
                type: 'GET',
                url: '/getcitylist',
                data: {
                    state: value
                },
                success: function(data) {
                    $("#business_city_looking").html(data);
                }
            });
        });
    </script>
@endsection
