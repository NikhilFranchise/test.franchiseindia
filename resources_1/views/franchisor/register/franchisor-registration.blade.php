@extends('layout.master')
@section('seoTitle', 'Franchisor Registration - franchiseindia.com')
@section('seoDesc', 'Are you a franchisor with a unique business idea? Register with Franchise India and get noticed by multiple investors and expand your client base.')
@section('content')
    <script src="{{URL::asset('tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector: '#business_desc',
            height: 300,
            setup: function (ed) {
                ed.on('keyup', function (e) {
                    var count = CountCharacters();
                });
            }
        });

        function CountCharacters() {
            var body = tinymce.get("business_desc").getBody();
            var content = tinymce.trim(body.innerText || body.textContent);
            if (content.length >= 25) {
                $('#registerstep2').attr('disabled', false);
                $('#descError').css('display', 'none');
            } else {
                $('#registerstep2').attr('disabled', true);
                $('#descError').css('display', 'block');
            }
        };
    </script>
    <!--step process start  here -->

    <div class="container formsection margintop60 staicp">
        <h1 class="noneunder"> Free franchise listing - join franchiseindia.com today!</h1>
    </div>


    <div class="StepSec">
        <div class="row stepmargtform">
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="col-xs-2 stepwizard-step">
                        <p class="activeve hidden-xs">Personal</p>
                        <span class="disnone"> <i class="fa fa-user fa-lg" aria-hidden="true"></i></span>
                        <a href="#step-1" type="button" class="btn btn-primary btn-circle overfla activeve"></a>
                    </div>
                    <div class="col-xs-2 stepwizard-step"><p class="hidden-xs" id="head1">Business</p>
                        <span class="disnone"><i class="fa fa-address-book fa-lg" aria-hidden="true"></i></span>
                        <a href="#step-2" type="button" class="btn btn-default btn-circle overfla" disabled="disabled"
                           id="ab1"></a>
                    </div>
                    <div class="col-xs-2 stepwizard-step">
                        <p class="hidden-xs" id="head2">Professional</p>
                        <span class="disnone"> <i class="fa fa-address-card fa-lg" aria-hidden="true"></i></span>
                        <a href="#step-3" type="button" class="btn btn-default btn-circle overfla" disabled="disabled"
                           id="ab2"></a>
                    </div>
                    <div class="col-xs-2 stepwizard-step">
                        <p class="hidden-xs" id="head3">Franchise/Property</p>
                        <span class="disnone"><i class="fa fa-building fa-lg" aria-hidden="true"></i></span>
                        <a href="#step-4" type="button" class="btn btn-default btn-circle overfla" disabled="disabled"
                           id="ab3"></a>
                    </div>
                    <div class="col-xs-2 stepwizard-step">
                        <p class="hidden-xs" id="head4">Training/Agreements</p>
                        <span class="disnone"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"
                                                 title="Training/Agreements"></i></span>
                        <a href="#step-5" type="button" class="btn btn-default btn-circle overfla" disabled="disabled"
                           id="ab4"></a>
                    </div>
                    <div class="col-xs-2 stepwizard-step">
                        <p class="hidden-xs" id="head5">Payment</p>
                        <span class="disnone"><i class="fa fa-credit-card fa-lg" aria-hidden="true" title="Payment"></i></span>
                        <a href="#step-6" type="button" class="btn btn-default btn-circle overfla" disabled="disabled"
                           id="ab5"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--step process end  here -->
    <!--form start here -->
    <div class="container formsection">
        <div class="row margt0">
            <!--left form section start here -->
            <div class="col-xs-12 col-sm-9 bor-radius backwhite targleft row-no-padding">
                <!---->
                <form class="form-horizontal" id="franchisorRegform" name="form_franchisor"
                      action="{{Config::get('constants.MainDomain')}}/franchisor/franchisor_registration" method="POST"
                      role="form" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="profile_id" value="{{session()->get('profileId')}}">
                    <input type="hidden" name="reg_source" value="{{request()->reg_source}}">

                    <!-- step 1 start here -->
                    <div class="setup-content" id="step-1" style="display:block;">
                        <!-- displaying session errors -->
                        @if(Session::has('errorMessage'))
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
                        <div class="col-xs-12 col-sm-12 col-md-12 pad30 showbg">
                            <div class="sidehead">Personal Details</div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory ">Email Id
                                    (User Id)</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/user.png')}}"></span>
                                        <input name="email" id="emailfran" type="text" onkeyup="myFunction(this.value)"
                                               onchange="myFunction(this.value)" maxlength="40" class="form-control"
                                               required="required" placeholder="Enter Your User ID">
                                    </div>
                                    <span id="result" style="color:red"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12  col-md-4  com4mod control-label mandatory">Password</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/pwd.png')}}"></span>
                                        <input name="password" id="pwd1" type="password" class="form-control"
                                               required="required" placeholder="Enter Your Password"
                                               onkeyup="CheckPassword(document.form_franchisor.password)">
                                        <center><span onClick="toggle_password('pwd1');" id="showpwd1" maxlength="15"
                                                      class="showhidecng">Show</span></center>
                                    </div>
                                    <div style="display: none; color: red;"
                                         id="passwordError">Password contain atleast 1 lower character, 1 upper character, 1 digit & 1 special character</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Mobile</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/mobile.png')}}"></span>
                                        <input name="mobile" id="mobile" required type="text"
                                               onkeyup="getMobileStatus(this.value);" pattern="[0-9]{10,10}"
                                               class="form-control" maxlength="10" placeholder="Enter Mobile"
                                               minlength="10">
                                        <center><span onClick="validatemobile();" id="validatemobile"
                                                      class="showhidecng" style="display: none">Verify</span></center>
                                        <center><span onClick="editmobile();" id="editmobile" class="showhidecng"
                                                      style="display: none">Edit</span></center>
                                        <center><span id="successmobile" class="showhideright" style="display: none"><i
                                                        class="fa fa-check fa-lg" aria-hidden="true"></i></span>
                                        </center>
                                    </div>
                                    <div id="chaangemobile"
                                         style="display: none; color: red;">This mobile number is already in use, Please change to new number</div>
                                </div>
                            </div>

                            <div class="form-group" style="display: none;" id="otpblock">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">One Time
                                    Password</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/mobile.png')}}"></span>
                                        <input id="otp" type="text" class="form-control" maxlength="4"
                                               placeholder="Enter OTP" onkeyup="varifyotp(this.value);">
                                        <center><span id="verify_button" class="showhidecng" style="display: none"
                                                      onclick="verify()">Verify</span></center>
                                    </div>
                                    <div style="display: none; color: red;" id="mismatch">OTP Mismatch</div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row colbg">
                            <center>
                                <input type="button" class="btn btn-default nextBtn1" id="step1button" value="Next"/>
                            </center>
                            <center>
                                <br>
                                <div style="display: none; color: red"
                                     id="error_msg_step1">Kindly recheck the information provided.</div>
                                <!-- <div style="display: none; color: red" id="error_msg_step1email" >Kindly recheck the email provided.</div> -->
                            </center>
                        </div>
                    </div>
                    <!-- step 1 end here -->

                    <!-- step 2 start here -->
                    <div class="setup-content BusDtl" id="step-2">
                        <div class="col-xs-12 col-sm-12 col-md-12 pad30 showbg">
                            <div class="sidehead">Business Details</div>
                            <div class="form-group">
                                <label class="col-xs-12  col-md-4  com4mod control-label">Brand Name</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/profile.png')}}"></span>
                                        <input name="brand_name" type="text" class="form-control"
                                               placeholder="Enter Your Brand Name">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory ">Company
                                    Name </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/company.png')}}"></span>
                                        <input name="company_name" id="company_name" type="text" maxlength="55"
                                               class="form-control" placeholder="Enter Company Name "
                                               required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">CEO / Owner
                                    Name </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/companyceo.png')}}"></span>
                                        <input type="text" class="form-control" name="ceo_name" id="ceo_name"
                                               placeholder="Enter CEO / Owner Name " required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Manager
                                    (Franchise) Name</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/user.png')}}"></span>
                                        <input type="text" class="form-control" name="fran_manager" id="fran_manager"
                                               placeholder="Enter Manager Name" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Address
                                    Details</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/addreess.png')}}"></span>
                                        <input type="text" class="form-control" name="fran_address" id="fran_address"
                                               placeholder="Enter Your Address" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Country</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/country.png')}}"></span>
                                        <select name="country" id="country" required="required"
                                                class="form-control myselectclass">
                                            <option value="99" selected>India</option>
                                            @php
                                                $values=Config::get('location.countryName');
                                                foreach($values as $index => $value) {
                                                    echo "<option value=".$index.">$value</option>";
                                                }
                                            @endphp
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Pincode</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/pincode.png')}}"></span>
                                        <input type="text" class="form-control" name="pincode" required="required"
                                               id="pincode" maxlength="6" onkeyup="getPincodeDetails(this.value);"
                                               placeholder="Enter Pincode">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">State</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/state.png')}}"></span>
                                        <input type="text" class="form-control" name="state" id="state"
                                               placeholder="Enter State" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">City</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/city.png')}}"></span>
                                        <input type="text" class="form-control" name="city" id="city"
                                               placeholder="Enter City" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Landline</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/telephone.png')}}"></span>
                                        <input type="text" class="form-control" name="telephone" id="telephone"
                                               placeholder="Enter Landline">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Website</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/companywebsite.png')}}"></span>
                                        <input type="text" class="form-control" name="website" id="website"
                                               maxlength="35" placeholder="Enter Company Website">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Alternate Email</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/email.png')}}"></span>
                                        <input type="text" class="form-control" name="secondary_email"
                                               id="secondary_email" maxlength="40" placeholder="Enter Secondary Email">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Industry</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/industry.png')}}"></span>
                                        <select name="ind_main_cat" id="ind_main_cat" class="form-control myselectclass"
                                                required="required" onchange="getSubCategory(this.value);">
                                            <option value="">Select Industry</option>
                                            @php
                                                $values=Config::get('constants.CategoryArr');
                                                foreach($values as $index => $value) {
                                                    echo "<option value=".$index.">$value</option>";
                                                }
                                            @endphp
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Sector</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/industry.png')}}"></span>
                                        <select name="ind_cat" id="getSubCategoryData"
                                                class="form-control myselectclass" required="required"
                                                onchange="getSubCatCategory(this.value);">
                                            <option value="">Select sector</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Service /
                                    Product</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/industry.png')}}"></span>
                                        <select name="ind_sub_cat" id="getSubCatCategoryData"
                                                class="form-control myselectclass" required="required">
                                            <option value="">Select Service / Product</option>
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
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/year.png')}}"></span>
                                        <select name="operations_start_year" id="operations_start_year"
                                                class="form-control myselectclass" required="required">
                                            <option value="">Select Operations Year</option>
                                            @php
                                                for($i=1950; $i<=date("Y"); $i++){
                                                 echo "<option value=".$i.">$i</option>";
                                                }
                                            @endphp
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Franchising
                                    Commenced On
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/year2.png')}}"></span>
                                        <select name="franchise_start_year" id="franchise_start_year"
                                                class="form-control myselectclass" required="required">
                                            <option value="">Select Franchising Year</option>
                                            @php
                                                for($i=1950; $i<=date("Y"); $i++){
                                                 echo "<option value=".$i.">$i</option>";
                                                }
                                            @endphp
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">No. of
                                    Franchise Outlets
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/franchisor-chain.png')}}"></span>
                                        <select name="no_fran_outlets" id="no_fran_outlets"
                                                class="form-control myselectclass" required="required">
                                            <option value="">Select No of Franchise Outlets</option>
                                            @php
                                                $values=Config::get('constants.NoOutlets');
                                                foreach($values as $index => $value) {
                                                    echo "<option value='$value'>$value</option>";
                                                }
                                            @endphp
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">No. of Retail
                                    Outlets
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/franchisor-chain.png')}}"></span>
                                        <select name="no_retail_outlets" id="no_retail_outlets"
                                                class="form-control myselectclass" required="required">
                                            <option value="">Select No of Retail Outlets</option>
                                            @php
                                                $values=Config::get('constants.NoOutlets');
                                                foreach($values as $index => $value) {
                                                    echo "<option value='$value'>$value</option>";
                                                }
                                            @endphp
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">No. Of
                                    Company Owned Outlets
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/franchisor-chain.png')}}"></span>
                                        <select name="no_company_outlets" id="no_company_outlets"
                                                class="form-control myselectclass" required="required">
                                            <option value="">Select No. Of Company Owned Outlets</option>
                                            @php
                                                $values=Config::get('constants.NoOutlets');
                                                foreach($values as $index => $value) {
                                                    echo "<option value='$value'>$value</option>";
                                                }
                                            @endphp
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Current
                                    Outlet Zones
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row checkmargin specify">
                                        <div class="col-sm-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-4 ">
                                                <input type="checkbox" name="outlet_locations[]" required value="North">
                                                North
                                            </label>
                                            <label class="col-xs-6 col-sm-6 col-md-4 ">
                                                <input type="checkbox" name="outlet_locations[]" required value="South">
                                                South
                                            </label>
                                            <label class="col-xs-6 col-sm-6 col-md-4 ">
                                                <input type="checkbox" name="outlet_locations[]" required value="East">
                                                East
                                            </label>
                                            <label class="col-xs-6 col-sm-6 col-md-4 ">
                                                <input type="checkbox" name="outlet_locations[]" required value="West">
                                                West
                                            </label>
                                            <label class="col-xs-6 col-sm-6 col-md-4 ">
                                                <input type="checkbox" name="outlet_locations[]" required
                                                       value="Central"> Central
                                            </label>
                                            <label class="col-xs-6 col-sm-6 col-md-4 ">
                                                <input type="checkbox" name="outlet_locations[]" required
                                                       value="International"> International
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group MarketMtrlSec">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck">Marketing
                                    Materials Available</label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row MarketMtrl">
                                        <div class="col-sm-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-4"><input type="radio"
                                                                                             name="marketting_material"
                                                                                             value="Yes"> Yes </label>
                                            <label class="col-xs-6 col-sm-6 col-md-4"><input type="radio"
                                                                                             name="marketting_material"
                                                                                             value="No"
                                                                                             checked="checked">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group hidden-area marketingMaterialsAvailableInput">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">If yes, Please
                                    Specify</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row checkmargin">
                                        <div class="col-sm-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6"><input type="checkbox"
                                                                                    name="marketting_materials[]"
                                                                                    value="Franchise Kit">Franchise Kit
                                            </label>
                                            <label class="col-xs-6 col-sm-6"><input type="checkbox"
                                                                                    name="marketting_materials[]"
                                                                                    value="Brochures">Brochures</label>
                                            <label class="col-xs-6 col-sm-6"><input type="checkbox"
                                                                                    name="marketting_materials[]"
                                                                                    value="Company Profile">Company
                                                Profile</label>
                                            <label class="col-xs-6 col-sm-6"><input type="checkbox"
                                                                                    name="marketting_materials[]"
                                                                                    value="Others">Others</label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label"><span
                                            class="mandatory">Describe your Business</span><br><span class="note">(Please share company background and <br>franchising details (Having atleast 25 characters))</span></label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">

                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="business_desc" class="form-control height100" cols="70"
                                          id="business_desc"></textarea>
                                <div style="display: none; color: red"
                                     id="descError">Please enter business Details (Min 25 chatacters)</div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <div class="row colbg">
                            <center>
                                <button class="btn btn-default nextBtn1" id="registerstep2" type="button">Next</button>
                            </center>
                            <center>
                                <br>
                                <div style="display: none; color: red"
                                     id="error_msg_step2">Kindly recheck the information provided.</div>
                            </center>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $('#registerstep2').on('mousedown', function (event) {
                            $("#error_msg_step2").show().delay(3000).fadeOut();
                            if (tinyMCE.activeEditor.getContent() == "") {
                                $('#descError').css('display', 'block');
                                $('#registerstep2').attr('disabled', true);
                            } else {
                                CountCharacters();
                            }
                            $("#step3reg").click();
                            $("#step3reg").prop('disabled', false);
                            $('#error_msg_step3').css('display', 'none');
                        });
                    </script>
                    <!-- step 2 end here -->

                    <!-- step 3 start here -->
                    <style type="text/css">
                        .bdr-tp-bt-col label.error {
                            display: none !important;
                        }
                    </style>

                    <div class="setup-content ProDtl" id="step-3">
                        <div class="col-xs-12 col-sm-12 col-md-12 pad30 showbg">
                            <div class="sidehead">Professional Details</div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4  com4mod control-label padcheck mandatory">Are
                                    you looking for ?</label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row ProLooking">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-3"><input type="radio"
                                                                                             name="looking_franchise"
                                                                                             value="1"
                                                                                             checked="checked">
                                                Franchisee </label>
                                            <label class="col-xs-6 col-sm-6 col-md-5"><input type="radio"
                                                                                             name="looking_franchise"
                                                                                             value="0">Trade
                                                partners</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group lookingFranchisePartnerInput">
                                <label class="col-xs-12 col-sm-4 col-md-4  com4mod control-label padcheck mandatory">Looking
                                    for Franchisee Partners?</label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod hello">
                                    <div class="row checkmargin">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-6">
                                                <input type="checkbox" name="franchise_partner_type[]"
                                                       id="franchise_partner_type" required="required"
                                                       value="lookingFrUnit"> Unit </label>
                                            <label class="col-xs-6 col-sm-6 col-md-6"><input type="checkbox"
                                                                                             name="franchise_partner_type[]"
                                                                                             id="franchise_partner_type1"
                                                                                             required="required"
                                                                                             value="lookingFrUnitMultiUnits">Master
                                                / Multi Units</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Looking for Franchisee Partners Unit  -->
                            <div class="hidden-area lookingFrUnitInput">
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4  com4mod control-label padcheck  mandatory">Type
                                        of franchises</label>
                                    <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="row checkmargin">
                                            <div class="col-sm-12 row-no-padding">
                                                <label class="col-sm-3"><input type="radio" id="storewise" checked
                                                                               value="Store Wise"> Store Wise </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 row-no-padding bdr-tp-bt">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-4 col-md-4  paddright0">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img
                                                            src="{{URL::asset('images/range-rate.png')}}"></span>
                                                <select name="unit_investment" id="unit_investment"
                                                        class="form-control myselectclass">
                                                    @php
                                                        $values=Config::get('constants.investRangeInWords');
                                                        foreach($values as $index=>$value) {
                                                            echo "<option value=".$index.">$value</option>";
                                                        }
                                                    @endphp
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4  paddright0">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img
                                                            src="{{URL::asset('images/brand.png')}}"></span>
                                                <input id="unitinv_brand_fee" type="text" pattern="[0-9]{5,10}"
                                                       minlength="5" maxlength="8" class="form-control"
                                                       placeholder="Franchise / Brand Fee">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 ">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img
                                                            src="{{URL::asset('images/commission.png')}}"></span>
                                                <input id="unitinv_royalty" type="text" pattern="[0-9]{1,2}"
                                                       minlength="1" maxlength="2" class="form-control"
                                                       placeholder="Royalty / Commission %">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Looking for Franchisee Partners Unit  -->
                            <!-- Start Looking for Franchisee Partners Multi Unit  -->
                            <div class="hidden-area lookingFrMultiUnitInput" id="multiunitarea">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-group ttl">Where are you considering to open franchise?</div>
                                </div>
                                <div class="row marginbottom10">
                                    <div class="bdr-tp-bt-col">
                                        <div style="display: none; color: red"
                                             id="error_msg_step3_multiunit">Please select at least one field</div>
                                        <!--Country Wise -->
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group">
                                                <input type="checkbox" name="countrywise" id="countrywise"
                                                       value="CountryWise">Country Wise
                                            </div>
                                            <div class="disabled-area CountryWise">
                                                <fieldset disabled>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                        src="{{URL::asset('images/range-rate.png')}}"></span>
                                                            <select name="country_investment"
                                                                    class="form-control myselectclass">
                                                                @php
                                                                    $values=Config::get('constants.investRangeInWords');
                                                                    foreach($values as $index => $value) {
                                                                        echo "<option value=".$index.">$value</option>";
                                                                    }
                                                                @endphp
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                        src="{{URL::asset('images/brand.png')}}"></span>
                                                            <input type="text" pattern="[0-9]{1,10}" minlength="1"
                                                                   maxlength="8" id="country_unitfee"
                                                                   class="form-control" placeholder="Unit / Brand Fee">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                        src="{{URL::asset('images/brand.png')}}"></span>
                                                            <input type="text" pattern="[0-9]{1,10}" minlength="1"
                                                                   maxlength="8" id="country_masterfee"
                                                                   class="form-control"
                                                                   placeholder="Master / Brand Fee">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                        src="{{URL::asset('images/commission.png')}}"></span>
                                                            <input type="text" pattern="[0-9]{1,2}" minlength="1"
                                                                   maxlength="2" id="country_royalty"
                                                                   class="form-control"
                                                                   placeholder="Royalty / Commission %">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <!--Region  wise-->
                                        <div class="col-xs-12 col-sm-6 paddleft-lft30">
                                            <div class="form-group">
                                                <input type="checkbox" name="regionwise" id="regionwise"
                                                       value="RegionWise"> Region wise
                                            </div>
                                            <div class="disabled-area RegionWise">
                                                <fieldset disabled>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                        src="{{URL::asset('images/range-rate.png')}}"></span>
                                                            <select name="region_investment"
                                                                    class="form-control myselectclass">
                                                                @php
                                                                    $values=Config::get('constants.investRangeInWords');
                                                                    foreach($values as $index => $value) {
                                                                        echo "<option value=".$index.">$value</option>";
                                                                    }
                                                                @endphp
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                        src="{{URL::asset('images/brand.png')}}"></span>
                                                            <input type="text" pattern="[0-9]{1,10}" minlength="1"
                                                                   maxlength="8" id="region_unitfee"
                                                                   class="form-control" placeholder="Unit / Brand Fee">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                        src="{{URL::asset('images/brand.png')}}"></span>
                                                            <input type="text" pattern="[0-9]{1,10}" minlength="1"
                                                                   maxlength="8" id="region_masterfee"
                                                                   class="form-control"
                                                                   placeholder="Master / Brand Fee">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                        src="{{URL::asset('images/commission.png')}}"></span>
                                                            <input type="text" pattern="[0-9]{1,2}" minlength="1"
                                                                   maxlength="2" id="region_royalty"
                                                                   class="form-control"
                                                                   placeholder="Royalty / Commission %">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <!--State wise -->
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group">
                                                <input type="checkbox" name="statewise" id="statewise"
                                                       value="StateWise"> State wise
                                            </div>
                                            <div class="disabled-area StateWise">
                                                <fieldset disabled>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                        src="{{URL::asset('images/range-rate.png')}}"></span>
                                                            <select name="state_investment"
                                                                    class="form-control myselectclass">
                                                                @php
                                                                    $values=Config::get('constants.investRangeInWords');
                                                                    foreach($values as $index => $value) {
                                                                        echo "<option value=".$index.">$value</option>";
                                                                    }
                                                                @endphp
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                        src="{{URL::asset('images/brand.png')}}"></span>
                                                            <input type="text" pattern="[0-9]{1,10}" minlength="1"
                                                                   maxlength="8" id="state_unitfee" class="form-control"
                                                                   placeholder="Unit / Brand Fee">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                        src="{{URL::asset('images/brand.png')}}"></span>
                                                            <input type="text" pattern="[0-9]{1,10}" minlength="1"
                                                                   maxlength="8" id="state_masterfee"
                                                                   class="form-control"
                                                                   placeholder="Master / Brand Fee">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                        src="{{URL::asset('images/commission.png')}}"></span>
                                                            <input type="text" pattern="[0-9]{1,2}" minlength="1"
                                                                   maxlength="2" id="state_royalty" class="form-control"
                                                                   placeholder="Royalty / Commission %">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <!--City wise -->
                                        <div class="col-xs-12 col-sm-6 paddleft-lft30">
                                            <div class="form-group">
                                                <input type="checkbox" name="citywise" id="citywise" value="CityWise">
                                                City wise
                                            </div>
                                            <div class="disabled-area CityWise">
                                                <fieldset disabled>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                        src="{{URL::asset('images/range-rate.png')}}"></span>
                                                            <select name="city_investment"
                                                                    class="form-control myselectclass">
                                                                @php
                                                                    $values=Config::get('constants.investRangeInWords');
                                                                    foreach($values as $index => $value) {
                                                                        echo "<option value=".$index.">$value</option>";
                                                                    }
                                                                @endphp
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                        src="{{URL::asset('images/brand.png')}}"></span>
                                                            <input type="text" pattern="[0-9]{1,10}" minlength="1"
                                                                   maxlength="8" id="city_unitfee" class="form-control"
                                                                   placeholder="Unit / Brand Fee">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                        src="{{URL::asset('images/brand.png')}}"></span>
                                                            <input type="text" pattern="[0-9]{1,10}" minlength="1"
                                                                   maxlength="8" id="city_masterfee"
                                                                   class="form-control"
                                                                   placeholder="Master / Brand Fee">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                        src="{{URL::asset('images/commission.png')}}"></span>
                                                            <input type="text" pattern="[0-9]{1,2}" minlength="1"
                                                                   maxlength="2" id="city_royalty" class="form-control"
                                                                   placeholder="Royalty / Commission %">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Looking for Franchisee Partners Multi Unit  -->
                            <!--Start Are you looking for Trade Partners yes  -->
                            <div class="hidden-area tradePartnersInputs bdr-tp-bt-rmgroup " id="hello">
                                <div class="row posrel">
                                    <input type="button" id="more" value="[+]" class="posabso">
                                    <div class="col-xs-12 col-sm-6 paddleft30">
                                        <div class="form-group margintb15">Types of Channels</div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img
                                                            src="{{URL::asset('images/channels.png')}}"></span>
                                                <select name="channel_type[]" class="form-control myselectclass">
                                                    @php
                                                        $values=Config::get('constants.channelArr');
                                                        foreach($values as $index => $value) {
                                                            echo "<option value=".$index.">$value</option>";
                                                        }
                                                    @endphp
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group margint30b10"><label class=" mandatory">Margin /
                                                Commissions %</label></div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img
                                                            src="{{URL::asset('images/commission.png')}}"></span>
                                                <input type="text" id="trade_margin" pattern="[0-9]{1,2}" minlength="1"
                                                       maxlength="2" class="form-control"
                                                       placeholder="Enter Margin / Commissions %">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 padd-lft-rht">
                                        <div class="form-group margintb15">Investment (If any)</div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img
                                                            src="{{URL::asset('images/range-rate.png')}}"></span>
                                                <select name="trade_investment[]" class="form-control myselectclass">
                                                    @php
                                                        $values=Config::get('constants.investRangeInWords');
                                                        foreach($values as $index => $value) {
                                                            echo "<option value=".$index.">$value</option>";
                                                        }
                                                    @endphp
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group margint30b10"><label class=" mandatory">Area Requirement
                                                (If any)</label></div>
                                        <div class="form-group">
                                            <div class="col-xs-4 col-sm-6 col-md-6 row-no-padding width165">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img
                                                                src="{{URL::asset('images/minimum-maximum.png')}}"></span>
                                                    <input type="text" pattern="[0-9]{1,3}" maxlength="3"
                                                           class="form-control" placeholder="Enter Min" id="min-1"
                                                           onkeyup="checkLessThan(this.id)">
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-3 col-md-6 row-no-padding wwidth115">
                                                <input type="text" pattern="[0-9]{3,6}" maxlength="6"
                                                       class="form-control" placeholder="Enter max" id="max-1"
                                                       onkeyup="checkGreaterThan(this.id)">
                                            </div>
                                            <div class="col-xs-4 col-sm-3 col-md-6 row-no-padding width115">
                                                <input type="text" name="area_type[]" class="form-control"
                                                       value="Sq.Ft." readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">

                                function checkLessThan(id) {
                                    var checkstr = id;
                                    var result = checkstr.replace("min", "max");

                                    if (parseInt($("#" + result).val()) < parseInt($("#" + id).val())) {
                                        $('#step3reg').prop('disabled', true);
                                        $("#error_msg_step3_tradePartner").css("display", "block");
                                    } else {
                                        $('#step3reg').prop('disabled', false);
                                        $("#error_msg_step3_tradePartner").css("display", "none");
                                    }
                                }

                                function checkGreaterThan(id) {
                                    var checkstr = id;
                                    var result = checkstr.replace("max", "min");

                                    if (parseInt($("#" + result).val()) > parseInt($("#" + id).val())) {
                                        $('#step3reg').prop('disabled', true);
                                        $("#error_msg_step3_tradePartner").css("display", "block");
                                    } else {
                                        $('#step3reg').prop('disabled', false);
                                        $("#error_msg_step3_tradePartner").css("display", "none");
                                    }
                                }

                            </script>

                            <!--Start Are you looking for Trade Partners No  -->

                            <!-- International Start here -->
                            <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4  com4mod control-label padcheck">Are you
                                        looking for International Expension?</label>
                                    <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="row checkmargin">
                                            <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                                <label class="col-xs-6 col-sm-6 col-md-3">
                                                    <input type="radio" name="is_looking_intl_franchise" value="1"> Yes
                                                </label>
                                                <label class="col-xs-6 col-sm-6 col-md-3">
                                                    <input type="radio" name="is_looking_intl_franchise" value="0"
                                                           checked="checked">No
                                                </label>
                                                <label class="col-xs-12 col-sm-6 col-md-5"
                                                       style="color:red; display:none;" id="franchiseError">
                                                    Please select atleast one country
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Start International Franchisee -->
                            <div class="row hidden-area internationalFranchiseeInputs bdr-tp-bt-rmgroup countries"
                                 id="international">
                                <ul class="col-xs-12 col-sm-12 row-no-padding inter minheigh">
                                    @php
                                        $values=Config::get('location.countryName');
                                        foreach($values as $index => $value) {
                                            echo '<li class="col-xs-6 col-sm-4 col-md-4">';
                                            echo '<input  value='.$value.' name="international_franchise[]" class="international_countries" type="checkbox">';
                                            echo '<span>'.$value.'</span>';
                                            echo '</li>';
                                        }
                                    @endphp
                                </ul>
                            </div>
                            <!-- End International Franchisee -->

                            <!-- State & city Start here -->
                            <div class="form-group hidden-area AcrossIndiaInput" style="display:block;">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck mandatory">Required
                                    geography for your franchise</label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row checkmargin hello1">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-6"><input type="radio"
                                                                                             name="expansion_loc_type"
                                                                                             required="required"
                                                                                             id="statewise1"
                                                                                             value="stateWise"> State
                                                Wise </label>
                                            <label class="col-xs-6 col-sm-6 col-md-6"><input type="radio"
                                                                                             name="expansion_loc_type"
                                                                                             required="required"
                                                                                             id="citywise1"
                                                                                             value="cityWise">City Wise</label>
                                            <label class="col-xs-12 col-sm-6 col-md-5" style="color:red; display:none;"
                                                   id="franchiseErrorstatecity">
                                                Please select atleast one State or city
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--State section Start-->
                            <div class="row hidden-area stateWiseInput bdr-tp-bt-rmgroup" id="dead">
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <ul id="divNorthState" class="natio">
                                        <li><input class="checkbox1" type="checkbox"
                                                   onclick="toggle1(this);"><span><strong>North Region</strong></span>
                                        </li>
                                        @php
                                            $values=Config::get('location.northStates');
                                            foreach($values as $index => $value) {
                                                echo '<li>';
                                                echo '<input name="northState[]" value="'.$value.'" class="checkbox1" type="checkbox">';
                                                echo '<span>'.$value.'</span>';
                                                echo '</li>';
                                            }
                                        @endphp
                                    </ul>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <ul id="divWestState" class="natio">
                                        <li><input class="checkbox1" type="checkbox"
                                                   onclick="toggle2(this);"><span><strong>West Region</strong></span>
                                        </li>
                                        @php
                                            $values=Config::get('location.westStates');
                                            foreach($values as $index => $value) {
                                                echo '<li>';
                                                echo '<input name="westState[]" value="'.$value.'" class="checkbox1" type="checkbox">';
                                                echo '<span>'.$value.'</span>';
                                                echo '</li>';
                                            }
                                        @endphp
                                    </ul>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <ul id="divEastState" class="natio">
                                        <li><input class="checkbox1" type="checkbox"
                                                   onclick="toggle3(this);"><span><strong>East Region</strong></span>
                                        </li>
                                        @php
                                            $values=Config::get('location.eastStates');
                                            foreach($values as $index => $value) {
                                                echo '<li>';
                                                echo '<input name="eastState[]" value="'.$value.'" class="checkbox1" type="checkbox">';
                                                echo '<span>'.$value.'</span>';
                                                echo '</li>';
                                            }
                                        @endphp
                                    </ul>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <ul id="divSouthState" class="natio">
                                        <li><input class="checkbox1" type="checkbox"
                                                   onclick="toggle4(this);"><span><strong>South Region</strong></span>
                                        </li>
                                        @php
                                            $values=Config::get('location.southStates');
                                            foreach($values as $index => $value) {
                                                echo '<li>';
                                                echo '<input name="southState[]" value="'.$value.'" class="checkbox1" type="checkbox">';
                                                echo '<span>'.$value.'</span>';
                                                echo '</li>';
                                            }
                                        @endphp
                                    </ul>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <ul id="divUnionTerritories" class="natio">
                                        <li><input class="checkbox1" type="checkbox"
                                                   onclick="toggle5(this);"><span><strong>Territories Region</strong></span>
                                        </li>
                                        @php
                                            $values=Config::get('location.unionTerriotoryStates');
                                            foreach($values as $index => $value) {
                                                echo '<li>';
                                                echo '<input name="unionTerritoriesState[]" value="'.$value.'" class="checkbox1" type="checkbox">';
                                                echo '<span>'.$value.'</span>';
                                                echo '</li>';
                                            }
                                        @endphp
                                    </ul>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <ul id="divCentralState" class="natio">
                                        <li><input class="checkbox1" type="checkbox"
                                                   onclick="toggle6(this);"><span><strong>Central Region</strong></span>
                                        </li>
                                        @php
                                            $values=Config::get('location.centralStates');
                                            foreach($values as $index => $value) {
                                                echo '<li>';
                                                echo '<input name="centralState[]" value="'.$value.'" class="checkbox1" type="checkbox">';
                                                if($value=="Central"){
                                                echo '<span><strong>'.$value.'</strong></span>'; }else{ echo '<span>'.$value.'</span>'; }
                                                echo '</li>';
                                            }
                                        @endphp
                                    </ul>
                                </div>
                            </div>
                            <!--State section End-->
                            <!--City section Start-->
                            <div class="row hidden-area cityWiseInput">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        @php
                                            $count = 0;
                                            $state=Config :: get('location.stateArr');
                                            foreach($state as $stateId => $stateValue) {
                                            $count++;
                                        @endphp

                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne{{$count}}">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                       href="#collapseOne{{$count}}" aria-expanded="true"
                                                       aria-controls="collapseOne{{$count}}">
                                                        <input name="looking_expansion_city" value="{{$stateValue}}"
                                                               type="checkbox">
                                                        <i class="more-less fa fa-plus"></i>
                                                        {{$stateValue}}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne{{$count}}" class="panel-collapse collapse"
                                                 role="tabpanel" aria-labelledby="headingOne{{$count}}">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <ul class="col-xs-12 col-sm-12">
                                                            @php
                                                                $city=Config :: get('location.cityArr.'.$stateId.'');
                                                                foreach($city as $cityId => $cityVal) {
                                                            @endphp
                                                            <li class="col-xs-6 col-sm-4 col-md-4">
                                                                <input name="looking_expansion_city[]"
                                                                       value="{{$cityVal}}" class="checkboxbycity"
                                                                       type="checkbox">
                                                                <span>{{$cityVal}}</span>
                                                            </li>
                                                            @php
                                                                }
                                                            @endphp
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            }
                                        @endphp
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row colbg">
                            <center>
                                <button class="btn btn-default nextBtn1" type="button" id="step3reg">Next</button>
                            </center>
                            <center>
                                <br>
                                <div style="display: none; color: red"
                                     id="error_msg_step3">Kindly recheck the information provided. (*) Fields are mandatory</div>
                                <div style="display: none; color: red"
                                     id="error_msg_step3_tradePartner">Trade partner area requirements fields are mandatory (Max area should greater than min).</div>
                            </center>
                        </div>
                    </div>

                    <script type="text/javascript">
                        $('#step3reg').click(function () {
                            var inputElems = document.getElementsByClassName("checkbox1");
                            count = 0;
                            for (var i = 0; i < inputElems.length; i++) {
                                if (inputElems[i].type === "checkbox" && inputElems[i].checked === true) {
                                    count++;
                                }
                            }
                            var inputElemscity = document.getElementsByClassName("checkboxbycity");
                            for (var j = 0; j < inputElemscity.length; j++) {
                                if (inputElemscity[j].type === "checkbox" && inputElemscity[j].checked === true) {
                                    count++;
                                }
                            }

                            if (count == 0) {
                                $('#step3reg').prop('disabled', true);
                                $("#franchiseErrorstatecity").show().delay(3000).fadeOut();
                            }

                            $("#error_msg_step3").show().delay(3000).fadeOut();

                        });

                        $('.checkbox1').click(function () {
                            $('#step3reg').prop('disabled', false);
                        });
                        $('.checkboxbycity').click(function () {
                            $('#step3reg').prop('disabled', false);
                        });

                        $('#step3reg').on('mousedown', function (event) {

                            if (parseInt($("#min-1").val()) > parseInt($("#max-1").val())) {
                                $('#step3reg').prop('disabled', true);
                                $("#error_msg_step3_tradePartner").css("display", "block");
                            }

                            if (parseInt($("#min-2").val()) > parseInt($("#max-2").val())) {
                                $('#step3reg').prop('disabled', true);
                                $("#error_msg_step3_tradePartner").css("display", "block");
                            }

                            if (parseInt($("#min-3").val()) > parseInt($("#max-3").val())) {
                                $('#step3reg').prop('disabled', true);
                                $("#error_msg_step3_tradePartner").css("display", "block");
                            }

                            if (parseInt($("#min-4").val()) > parseInt($("#max-4").val())) {
                                $('#step3reg').prop('disabled', true);
                                $("#error_msg_step3_tradePartner").css("display", "block");
                            }

                        });
                    </script>
                    <!-- step 3 end here -->

                    <!-- step 4 start here -->
                    <div class="setup-content" id="step-4">
                        <div class="col-xs-12 col-sm-12 col-md-12 pad30 showbg FranDtl">
                            <div class="sidehead">Franchise Details</div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox Head">
                                    Are there exclusive territorial rights given to a unit franchise?
                                </label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12  col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="is_territorial_rights" value="1"> Yes
                                            </label>

                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="is_territorial_rights" checked="checked"
                                                       value="0"> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4  com4mod control-label line2padcheckbox Head">
                                    Are any performance guarantees given to unit franchisee?
                                </label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12  col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="is_perform_guarranty" value="1"> Yes
                                            </label>
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="is_perform_guarranty" checked="checked"
                                                       value="0"> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4  com4mod control-label line2padcheckbox Head">
                                    Are any advertising / marketing levies payable to the franchisor?
                                </label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12  col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="is_marketting_levies" value="1"> Yes
                                            </label>
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="is_marketting_levies" checked="checked"
                                                       value="0"> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12  col-sm-4 col-md-4  com4mod control-label line2padinputbox Head">
                                    What is the anticipated percentage return on investment?</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/commission.png')}}"></span>
                                        <input name="anticipated_roi" type="text" pattern="[0-9]{1,4}" maxlength="4"
                                               class="form-control" placeholder="enter  %">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12  col-sm-4 col-md-4  com4mod control-label line2padinputbox Head">
                                    What is the likely payback period of capital for a unit franchise?</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row row-no-margin">
                                        <div class="col-xs-6 col-sm-6 col-md-6 row-no-padding width184">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img
                                                            src="{{URL::asset('images/calendar.png')}}"></span>
                                                <select name="payback_period_min" class="form-control myselectclass4"
                                                        id="range_rate_min">
                                                    <option value="0">Min</option>
                                                    @php
                                                        for($i=0; $i<=11; $i++){
                                                            echo "<option value=".$i.">$i</option>";
                                                        }
                                                    @endphp
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-3 col-md-3 row-no-padding wwidth148">
                                            <select name="payback_period_max" disabled
                                                    class="form-control myselectclass4" id="range_rate_max">
                                                <option value="0">Max</option>
                                                @php
                                                    for($i=0; $i<=11; $i++){
                                                        echo "<option value=".$i.">$i</option>";
                                                    }
                                                @endphp
                                            </select>
                                        </div>

                                        <div class="col-xs-3 col-sm-3 col-md-3 row-no-padding width148">
                                            <select name="payback_period_type" class="form-control myselectclass4">
                                                <option value="Month" selected>Month</option>
                                                <option value="Year">Year</option>
                                            </select>
                                        </div>
                                        <script type="text/javascript">
                                            //
                                            $('#range_rate_min').change(checkmax);

                                            function checkmax() {
                                                var x = parseInt($('#range_rate_min').find(":selected").val());
                                                var y = parseInt($('#range_rate_max').find(":selected").val());
                                                if (x > y && y == 0) {
                                                    $('#range_rate_max').removeAttr('disabled');
                                                    $('#step4btn').attr('disabled', true);
                                                }

                                                if (x > y && y != 0) {
                                                    $('#range_rate_min').val("0");
                                                    $('#range_rate_max').removeAttr('disabled');
                                                }

                                                if (x > 0 && y == 0) {
                                                    $('#range_rate_max').removeAttr('disabled');
                                                    $('#step4btn').attr('disabled', true);
                                                }

                                                if (x < y && y == 0) {
                                                    $('#range_rate_max').val("0");
                                                    $('#step4btn').attr('disabled', true);
                                                }

                                                if (x < y && y != 0) {
                                                    $('#step4btn').attr('disabled', true);
                                                }

                                                if (x == 0 && y == 0) {
                                                    $('#step4btn').attr('disabled', false);
                                                }
                                            }

                                            $('#range_rate_max').change(checkmin);

                                            function checkmin() {
                                                var x = parseInt($('#range_rate_min').find(":selected").val());
                                                var y = parseInt($('#range_rate_max').find(":selected").val());
                                                if (y < x) {
                                                    $('#range_rate_min').val("0");
                                                    $('#step4btn').removeAttr('disabled');
                                                } else {
                                                    $('#step4btn').removeAttr('disabled');
                                                }
                                            }
                                        </script>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4  com4mod control-label line2padinputbox Head">
                                    Are there any other investment requirements?
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/rupee.png')}}"></span>
                                        <input type="text" name="other_investment_req" class="form-control"
                                               placeholder="Enter other investment requirements">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck Head">
                                    Do you provide aid in financing?
                                </label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12  col-md-12 row-no-padding">
                                            <label class="col-xs-6  col-sm-6 col-md-3">
                                                <input name="is_finance_aid" type="radio" value="1"> Yes
                                            </label>

                                            <label class="col-xs-6  col-sm-6 col-md-3">
                                                <input name="is_finance_aid" type="radio" checked="checked" value="0">
                                                No
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <!--property detail start here -->
                        <div class="col-xs-12 col-sm-12  col-md-12 pad30 bgbase bordertop marginminust20 showbg PropDtl">
                            <div class="sidehead">Property Details</div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4  com4mod control-label line2padinputbox">
                                    What type of property is required for this franchise opportunity ?</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/company.png')}}"></span>
                                        <select name="property_type" class="form-control myselectclass">
                                            <option value="">Select Property Type</option>
                                            @php
                                                $values=Config::get('constants.propertyType');
                                                foreach($values as $index => $value) {
                                                    echo "<option value=".$index.">$value</option>";
                                                }
                                            @endphp
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
                                                            src="{{URL::asset('images/calendar.png')}}"></span>
                                                <input type="text" name="prop_area_min" pattern="[0-9]{2,5}"
                                                       minlength="2" maxlength="5" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-3 row-no-padding wwidth148 FlrAreaMax">
                                            <input type="text" name="prop_area_max" pattern="[0-9]{3,6}" minlength="3"
                                                   maxlength="6" class="form-control">
                                        </div>
                                        <div class="col-xs-12 col-sm-3 row-no-padding wwidth148 FlrAreaSqFt">
                                            <input class="form-control sqclas" disabled placeholder="Sq. Ft.">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12  col-sm-4 col-md-4  com4mod control-label">Preferred
                                    location</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/city.png')}}"></span>
                                        <input type="text" name="pref_prop_location" class="form-control"
                                               placeholder="Enter Preferred location">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4  com4mod control-label line2padinputbox">
                                    Franchisor or Franchisee will arrange outfit of premises
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/rupee.png')}}"></span>
                                        <input type="text" name="premise_outfit_arrangement" class="form-control"
                                               placeholder="Please Specify">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck">
                                    Do you provide site selection assistance?
                                </label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12  col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="site_selection_assistance" value="1"> Yes
                                            </label>
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="site_selection_assistance" checked="checked"
                                                       value="0"> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row colbg">
                            <center>
                                <button class="btn btn-default nextBtn1" id="step4btn" type="button">Next</button>
                            </center>
                        </div>
                    </div>
                    <!-- step 4 end here -->


                    <!-- step 5 start here -->
                    <div class="setup-content" id="step-5">
                        <div class="col-xs-12 col-sm-12 col-md-12 pad30 showbg TraDtl">
                            <div class="sidehead">Training Details</div>
                            <div class="blinkline10"></div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox">
                                    Do you currently have detailed operating manuals for franchisee?
                                </label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="is_detailed_manuals" value="1"> Yes
                                            </label>
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="is_detailed_manuals" checked="checked"
                                                       value="0"> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Where is the
                                    franchisees training done?</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                    src="{{URL::asset('images/train-session.png')}}"></span>
                                        <input type="text" name="franchise_training_loc" class="form-control"
                                               placeholder="Enter your Req">
                                    </div>
                                </div>
                            </div>
                            <div class="blinkline10"></div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox">
                                    Is field assistance available for franchisee?
                                </label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="is_field_assistance" value="1"
                                                       checked="checked"> Yes
                                            </label>
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="is_field_assistance" value="0"> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox">
                                    Will the head office be providing assistance to the franchisee?
                                </label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-3 ">
                                                <input type="radio" name="ho_assistance" value="1" checked="checked">
                                                Yes
                                            </label>
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="ho_assistance" value="0"> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox">
                                    What IT systems do you presently have that will be included in the franchise?
                                </label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="is_it_support" value="1" checked="checked">
                                                Yes
                                            </label>
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="is_it_support" value="0"> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!--Agreements Details Start -->
                        <div class="col-sm-12 pad30 bgbase bordertop marginminust40 showbg AgrDtl">
                            <div class="sidehead">Agreements Details</div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck">
                                    Do you have a standard Franchise Agreement?
                                </label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6  col-md-3">
                                                <input type="radio" name="std_fran_aggreement" value="1"
                                                       checked="checked"> Yes
                                            </label>
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="std_fran_aggreement" value="0"> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12  col-sm-4 col-md-4 com4mod control-label">Duration of the
                                    contract</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <label class="col-xs-3 col-sm-3 col-md-3 spcasepad">
                                            <input type="radio" name="franchise_term_duration" value="Life"
                                                   checked="checked"> Lifetime
                                        </label>
                                        <label class="col-xs-1 col-sm-1 col-md-1 spcasepad">
                                            <input type="radio" name="franchise_term_duration" value="No of years">
                                        </label>
                                        <div class="col-xs-4 col-sm-3 col-md-4 row-no-padding yearwidth">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img
                                                            src="{{URL::asset('images/calendar.png')}}"></span>
                                                <select name="franchise_term_year" class="form-control myselectclass2"
                                                        id="term_year_franchise">
                                                    @php
                                                        for($i=1; $i<=15; $i++){
                                                            echo "<option value=".$i.">$i</option>";
                                                        }
                                                    @endphp
                                                </select>
                                            </div>
                                        </div>
                                        <label class="col-xs-3 col-sm-2 col-md-2 spcasepad"> Years</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group paddingt20">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck">
                                    Is the term renewable?
                                </label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="term_renewable" value="1" checked="checked">
                                                Yes </label>

                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="term_renewable" value="0"> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row colbg">
                            <center>
                                <button class="btn btn-default nextBtn1" type="button">Next</button>
                            </center>
                        </div>
                    </div>
                    <!-- step 5 end here -->

                    <!-- step 6 start here -->
                    <div class="setup-content" id="step-6">
                        <div class="col-xs-12 col-sm-12 col-md-12 pad30 showbg">
                            <div class="sidehead">Payment Plans</div>
                            <!--price box start here -->
                            <div class="pricesection">
                                <!--1-->
                                <div class="col-xs-12 col-sm-3 col-md-3 bor-radius row-no-padding boxheight boxwidth">
                                    <label class="pad15b5"><input type="radio" name="membership_plan" checked="checked"
                                                                  value="1"> Basic Plan</label>
                                    <div class="priceshow"><span>Free of Cost</span>No Time Limit</div>
                                    <ul class="pad15">
                                        <li>Listing on the website</li>
                                        <li>Get notifications from investors</li>
                                    </ul>
                                </div>
                                <!--1-->

                                <!--2 Silver Plan start -->
                                <div class="col-xs-12 col-sm-3 col-md-3 bor-radius row-no-padding boxheight boxwidth">
                                    <label class="pad15b5"><input type="radio" name="membership_plan"
                                                                  id="silverplanmain" value="2"> Sub-Sub
                                        Category</label>
                                    <div class="priceshow"><span>Rs. <strong id="silverPlan">19500</strong></span>
                                        <div class="">
                                            <select name="membership_plan_month" id="membership_plan_month_sub_sub"
                                                    onclick="getPlanTotal(this.id);"
                                                    onchange="getPlanTotal(this.id);"
                                                    class="form-control width110">
                                                {{--<option value=101>1 Month</option>--}}
                                                <option value=102>3 Month</option>
                                                <option value=103>6 Month</option>
                                                <option value=104>12 Month</option>
                                            </select>
                                        </div>                                        
                                    </div>
                                    <ul class="pad15">
                                        <li>Listing in the service/product category of the website</li>
                                        <li>Get notifications from investors</li>
                                        <li>Receive contact details of investors</li>
                                        <li>Logo Presence in the Service/Product category</li>
                                        <li>Third-highest Visibility</li>
                                        <li>Third-priority Response rate</li>
                                        <li>Basic display in the service/product category of the website</li>
                                    </ul>
                                </div>
                                <!--2 Silver Plan end-->

                                <!--3 Gold plan Start -->
                                <div class="col-xs-12 col-sm-3 col-md-3 bor-radius row-no-padding boxheight boxwidth">
                                    <label class="pad15b5"><input type="radio" name="membership_plan" id="goldplanmain"
                                                                  value="3"> Sub Category</label>
                                    <div class="priceshow"><span>Rs. <strong id="goldPlan">32500</strong></span>
                                        <div class="">
                                            <select name="membership_plan_month" id="membership_plan_month_sub"
                                                    onclick="getPlanTotal(this.id);"
                                                    onchange="getPlanTotal(this.id);"
                                                    class="form-control width110">
                                                {{--<option value=105>1 Month</option>--}}
                                                <option value=106>3 Month</option>
                                                <option value=107>6 Month</option>
                                                <option value=108>12 Month</option>
                                            </select>
                                        </div>
                                    </div>
                                    <ul class="pad15">
                                        <li>Listing in the sector category of the website</li>
                                        <li>Get notifications from investors</li>
                                        <li>Receive contact details of investors</li>
                                        <li>Logo Presence in the Sector and Service/Product categories</li>
                                        <li>Second-highest Visibility</li>
                                        <li>Second-priority Response rate</li>
                                        <li>Advanced display in the sector category of the website</li>
                                    </ul>
                                </div>
                                <!--3 Gold Plan end here -->

                                <!--4-->
                                <div class="col-xs-12 col-sm-3 col-md-3 bor-radius row-no-padding boxheight boxwidth">
                                    <label class="pad15b5"><input type="radio" name="membership_plan"
                                                                  id="platinumplanmain" value="4"> Master
                                        Category</label>
                                    <div class="priceshow"><span>Rs. <strong id="platinumPlan">39000</strong></span>
                                        <div class="">
                                            <select name="membership_plan_month" id="membership_plan_month_master"
                                                    onclick="getPlanTotal(this.id);"
                                                    onchange="getPlanTotal(this.id);"
                                                    class="form-control width110">
                                                {{--<option value=109>1 Month</option>--}}
                                                <option value=110>3 Month</option>
                                                <option value=111>6 Month</option>
                                                <option value=112>12 Month</option>
                                            </select>
                                        </div>
                                    </div>
                                    <ul class="pad15">
                                        <li>Listing in the industry category of the website</li>
                                        <li>Get notifications from investors</li>
                                        <li>Receive contact details of investors</li>
                                        <li>Logo Presence in all categories</li>
                                        <li>Highest Visibility</li>
                                        <li>Top Priority Response rate</li>
                                        <li>Premium display in the industry category of the website</li>
                                    </ul>
                                </div>
                                <!--4-->

                            </div>
                            <!--price box end here -->

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label"><span
                                            class="mandatory">Layout Option</span><br><span class="note">(Kindly upload images for the selected layout  <br>from your dashboard (Appearance section))</span></label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row checkmarginnew">
                                        <div class="col-sm-12 row-no-padding optlink">
                                            <label class="col-sm-12 col-md-12">
                                                <input type="radio" name="layout_type" value="1" checked
                                                       data-toggle="modal" data-target="#layoutoption1"/>Basic Layout
                                                &nbsp
                                                <a href="#" data-toggle="modal" data-target="#layoutoption1"> ( View
                                                    Example )</a>
                                            </label>
                                            <label class="col-sm-12 col-md-12">
                                                <input type="radio" name="layout_type" value="2" data-toggle="modal"
                                                       data-target="#layoutoption2"/>Sliding Layout &nbsp
                                                <a href="#" data-toggle="modal" data-target="#layoutoption2"> ( View
                                                    Example )</a>
                                            </label>
                                            <label class="col-sm-12 col-md-12">
                                                <input type="radio" name="layout_type" value="3" data-toggle="modal"
                                                       data-target="#layoutoption3"/>Gallery Layout &nbsp
                                                <a href="#" data-toggle="modal" data-target="#layoutoption3"> ( View
                                                    Example )</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!---->
                            <div class="modal fade lg-panel formsection" id="layoutoption1" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body option">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <img src="{{URL::asset('images/layoutoption1.jpg')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---->

                            <!---->
                            <div class="modal fade lg-panel formsection" id="layoutoption2" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body option">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <img src="{{URL::asset('images/layoutoption2.jpg')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---->

                            <!---->
                            <div class="modal fade lg-panel formsection" id="layoutoption3" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body option">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <img src="{{URL::asset('images/layoutoption3.jpg')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="target" class="membershipWiseInput" style="display:none;">
                                <div class="clearfix"></div>
                                <div class="border-topborder"></div>                               

                                <div class="form-group">
                                    <label class="col-xs-12  col-sm-4 com4mod control-label mandatory">Upload Company
                                        Logo</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img
                                                        src="{{URL::asset('images/upload.png')}}"></span>
                                            <input type="file" name="company_logo" class="form-control"
                                                   id="company_logo" placeholder="Upload your Company Logo">
                                        </div>
                                        <div style="display: none; color: red;"
                                             id="company_logo_msg">Please select a valid image (jpg / gif / png)</div>
                                        <div style="display: none; color: red;"
                                             id="company_logo_msg_size">Please select a image of size(Less than 2MB)</div>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $("#company_logo").change(function () {
                                        var val = $(this).val();
                                        switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
                                            case 'gif':
                                            case 'jpg':
                                            case 'png':
                                                $('#company_logo_msg').css('display', 'none');
                                                $('#franchisorsubmit').prop('disabled', false);
                                                break;
                                            default:
                                                $(this).val('');
                                                $('#company_logo_msg').css('display', 'block');
                                                $('#franchisorsubmit').prop('disabled', true);
                                                break;
                                        }
                                    });
                                    $('#company_logo').bind('change', function () {
                                        if (this.files[0].size > 2097152) {
                                            $('#company_logo_msg_size').css('display', 'block');
                                            $('#franchisorsubmit').prop('disabled', true);
                                        } else {
                                            $('#company_logo_msg_size').css('display', 'none');
                                            $('#franchisorsubmit').prop('disabled', false);
                                        }
                                    });
                                </script>
                                <div class="form-group">
                                    <label class="col-xs-12  col-sm-4 com4mod control-label">Video Link </label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img
                                                        src="{{URL::asset('images/video-link.png')}}"></span>
                                            <input type="text" class="form-control" name="video_link" id="video_link"
                                                   placeholder="Enter Your Video link">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">GST NO.</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img src="{{url('images/commission.png')}}"></span>
                                            <input type="text" name="gst_no" class="form-control"  placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="amount_to_pay" class="form-control" id="amount" value="">
                            <div class="form-group marTopnew">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label"></label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs"></div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row checkmargin">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-12 col-sm-12 col-md-12"><input type="checkbox" checked
                                                                                                name="newsletter_sub"
                                                                                                value="1"> Yes, i want
                                                to subscribe for weekly Newsletter </label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row colbg">
                            <center>
                                <input type="submit" id="franchisorsubmit" class="btn btn-default" value="Submit"/>
                            </center>
                        </div>
                    </div>
                    <!-- step 6 end here -->
                </form>
                <!---->
            </div>
            <!--left form section end here -->
            <!--right form section start here -->
        @include('includes.franchisor-faq')
        <!--right form section end hefre -->
        </div>
    </div>
    <!--form end here -->
    <div class="heightspace"></div>
    <script language="javascript">


        function toggle1(source) {
            var checkboxes = document.querySelectorAll('input[name="northState[]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }

        function toggle2(source) {
            var checkboxes = document.querySelectorAll('input[name="westState[]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }

        function toggle3(source) {
            var checkboxes = document.querySelectorAll('input[name="eastState[]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }

        function toggle4(source) {
            var checkboxes = document.querySelectorAll('input[name="southState[]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }

        function toggle5(source) {
            var checkboxes = document.querySelectorAll('input[name="unionTerritoriesState[]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }

        function toggle6(source) {
            var checkboxes = document.querySelectorAll('input[name="centralState[]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }

        let membershipPlanFranchisor = <?php echo json_encode(Config('constants.membershipPlanFranchisor'));?>;


        $('#silverplanmain').click(function () {
            $("#amount").prop("value", $('#membership_plan_month_sub_sub').val());
            $('#membership_plan_month_master').val(109);
            $('#membership_plan_month_sub').val(105);
            document.getElementById("silverPlan").innerHTML = membershipPlanFranchisor[$('#membership_plan_month_sub_sub').val()];
            document.getElementById("goldPlan").innerHTML = "32500";
            document.getElementById("platinumPlan").innerHTML = "39000";
            $(".membershipWiseInput").show();
            $("#company_logo").prop('required', true);
            $("#company_logo").prop('name', 'company_logo');
            $("#video_link").prop('name', 'video_link');
        });

        $('#goldplanmain').click(function () {
            $("#amount").prop("value", $('#membership_plan_month_sub').val());
            $('#membership_plan_month_master').val(109);
            $('#membership_plan_month_sub_sub').val(101);
            document.getElementById("silverPlan").innerHTML = "19500";
            document.getElementById("goldPlan").innerHTML = membershipPlanFranchisor[$('#membership_plan_month_sub').val()];
            document.getElementById("platinumPlan").innerHTML = "39000";
            $(".membershipWiseInput").show();
            $("#company_logo").prop('required', true);
            $("#company_logo").prop('name', 'company_logo');
            $("#video_link").prop('name', 'video_link');
        });

        $('#platinumplanmain').click(function () {
            $("#amount").prop("value", $('#membership_plan_month_master').val());
            $('#membership_plan_month_sub').val(105);
            $('#membership_plan_month_sub_sub').val(101);
            document.getElementById("silverPlan").innerHTML = "19500";
            document.getElementById("goldPlan").innerHTML = "32500";
            document.getElementById("platinumPlan").innerHTML = membershipPlanFranchisor[$('#membership_plan_month_master').val()];
            $(".membershipWiseInput").show();
            $("#company_logo").prop('required', true);
            $("#company_logo").prop('name', 'company_logo');
            $("#video_link").prop('name', 'video_link');
        });

        function getPlanTotal(id) {
            $("#amount").prop("value", $('#'+id).val());
            if(id == "membership_plan_month_sub_sub") {
                $("#silverplanmain").prop("checked", true);
                document.getElementById("silverPlan").innerHTML = membershipPlanFranchisor[$('#'+id).val()];
                document.getElementById("goldPlan").innerHTML = "32500";
                document.getElementById("platinumPlan").innerHTML = "39000";
                $('#membership_plan_month_sub').val(105);
                $('#membership_plan_month_master').val(109);
                $(".membershipWiseInput").show();
                $("#company_logo").prop('required', true);
                $("#company_logo").prop('name', 'company_logo');
                $("#video_link").prop('name', 'video_link');
            }

            if(id == "membership_plan_month_sub") {
                $("#goldplanmain").prop("checked", true);
                document.getElementById("silverPlan").innerHTML = "19500";
                document.getElementById("goldPlan").innerHTML = membershipPlanFranchisor[$('#'+id).val()];
                document.getElementById("platinumPlan").innerHTML = "39000";
                $('#membership_plan_month_master').val(109);
                $('#membership_plan_month_sub_sub').val(101);
                $(".membershipWiseInput").show();
                $("#company_logo").prop('required', true);
                $("#company_logo").prop('name', 'company_logo');
                $("#video_link").prop('name', 'video_link');
            }
            if(id == "membership_plan_month_master") {
                $("#platinumplanmain").prop("checked", true);
                document.getElementById("silverPlan").innerHTML = "19500";
                document.getElementById("goldPlan").innerHTML = "32500";
                document.getElementById("platinumPlan").innerHTML = membershipPlanFranchisor[$('#'+id).val()];
                $('#membership_plan_month_sub').val(105);
                $('#membership_plan_month_sub_sub').val(101);
                $(".membershipWiseInput").show();
                $("#company_logo").prop('required', true);
                $("#company_logo").prop('name', 'company_logo');
                $("#video_link").prop('name', 'video_link');
            }
        }

        $(document).ready(function () {
            $(function () {
                $("#datepicker").datepicker({
                    minDate: 0,
                    dateFormat: 'yy-mm-dd',
                    maxDate: '1Y',
                    changeMonth: true,
                    changeYear: true,
                });
            });
        });

        $('input:radio[name="membership_plan"]').change(function(){
            if (this.checked && this.value == 1) 
                $('#franchisorsubmit').prop('disabled', false);
        });

        //email validation script
        function myFunction(value) {
            if (value) {
                $.ajax({
                    type: 'get',
                    url: '{{URL::to('validate-email')}}',
                    data: {'search': value},
                    success: function (data) {
                        $('#result').html(data.email);
                        if (data.email != "")
                            $("#step1button").prop('disabled', true);
                        if (data.email == "")
                            $("#step1button").prop('disabled', false);
                    }
                })
            }
        }

        //checkbox required validation
        $(function () {
            var requiredCheckboxes = $('.specify :checkbox[required]');
            requiredCheckboxes.change(function () {
                if (requiredCheckboxes.is(':checked')) {
                    requiredCheckboxes.removeAttr('required');
                } else {
                    requiredCheckboxes.attr('required', 'required');
                }
            });
        });

        //password show/hide function
        function toggle_password(target) {
            var tag = document.getElementById(target);
            var dv = "show" + target;
            var tag2 = document.getElementById(dv);
            if (tag2.innerHTML == 'Show') {
                tag.setAttribute('type', 'text');
                tag2.innerHTML = 'Hide';
            }
            else {
                tag.setAttribute('type', 'password');
                tag2.innerHTML = 'Show';
            }
        }


        //step validation function
        $(document).ready(function () {
            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn1');

            allWells.hide();

            navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {

                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });


            allNextBtn.click(function () {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='email'],input[type='radio'],input[type='checkbox'],input[type='url'],textarea,input[type='password'],select"),
                    isValid = true;

                for (var i = 0; i < curInputs.length; i++) {
                    if (!curInputs[i].validity.valid) {
                        isValid = false;
                    }
                }

                if (isValid) {
                    $('a.overfla ').click(function () {
                        $('a.overfla').removeClass('atct');
                        $(this).addClass('atct');
                    });
                    if (curStepBtn == "step-1") {
                        $("input").removeClass("error");
                        $("select").removeClass("error");
                        $("textarea").removeClass("error");
                        $("label.error").css("display", "none");
                        $('#ab1').addClass('activeve2');
                        $('#head1').addClass('activeve');
                    }
                    else if (curStepBtn == "step-2") {
                        $("input").removeClass("error");
                        $("select").removeClass("error");
                        $("textarea").removeClass("error");
                        $("label.error").css("display", "none");
                        $('#ab2').addClass('activeve2');
                        $('#head2').addClass('activeve');
                    }
                    else if (curStepBtn == "step-3") {
                        $("input").removeClass("error");
                        $("select").removeClass("error");
                        $("textarea").removeClass("error");
                        $("label.error").css("display", "none");
                        $('#ab3').addClass('activeve2');
                        $('#head3').addClass('activeve');
                    }
                    else if (curStepBtn == "step-4") {
                        $("input").removeClass("error");
                        $("select").removeClass("error");
                        $("textarea").removeClass("error");
                        $("label.error").css("display", "none");
                        $('#ab4').addClass('activeve2');
                        $('#head4').addClass('activeve');
                    }
                    else if (curStepBtn == "step-5") {
                        $("input").removeClass("error");
                        $("select").removeClass("error");
                        $("textarea").removeClass("error");
                        $("label.error").css("display", "none");
                        $('#ab5').addClass('activeve3');
                        $('#head5').addClass('activeve');
                    }
                    nextStepWizard.removeAttr('disabled').trigger('click');
                }
            });

            $('div.setup-panel div a.btn-primary').trigger('click');
        });

        //fetching the subcategories
        function getSubCategory(value) {
            $.ajax({
                type: 'GET',
                url: '/getsubcategory',
                data: {categoryID: value},
                success: function (data) {
                    $("#getSubCategoryData").html(data);
                }
            });
        }

        //fetching sub-sub categories
        function getSubCatCategory(value) {
            $.ajax({
                type: 'GET',
                url: '/getsubcatcategory',
                data: {subcategoryID: value},
                success: function (data) {
                    $("#getSubCatCategoryData").html(data);
                }
            });
        }

        function getPincodeDetails(value) {
            if (value.length >= 6) {
                $.ajax({
                    type: 'GET',
                    url: '/getpincode',
                    data: {pincode: value},
                    success: function (data) {
                        $("#city").val(data.city);
                        $("#state").val(data.state);
                    }
                });
            }
        }

        //function to check profile status
        function getProfileStatus(value) {
            if (value.length > 5) {
                $.ajax({
                    type: 'GET',
                    url: '/getprofile',
                    data: {profile: value},
                    success: function (data) {
                        $("#msg1").html(data.msg1);

                        if (data.msg1 == "") {
                            $('#registerstep2').removeAttr('disabled');
                        } else {
                            $('#registerstep2').attr('disabled', 'disabled');
                        }

                    }
                });
            }
        }

        var tPCount = 2;

        //add new fields javascript method
        $('#more').on('click', function () {
            var newfield = '<div class="row posrel"><hr size="5"><div class="col-xs-12 col-sm-6 paddleft30"><div class="form-group margintb15">Types of Channels</div><div class="form-group"><div class="input-group"><span class="input-group-addon"><img src="{{URL::asset("images/channels.png")}}"></span><select name="channel_type[]" class="form-control myselectclass">  @php $values=Config::get("constants.channelArr"); foreach($values as $index => $value) {  echo "<option value=".$index.">$value</option>";   } @endphp </select></div></div><div class="form-group margint30b10"> <label class=" mandatory">Margin / Commissions %</label></div><div class="form-group"> <div class="input-group"><span class="input-group-addon"><img src="{{URL::asset("images/commission.png")}}"></span> <input type="text" name="trade_margin[]"pattern="[0-9]{1,2}" minlength="1" maxlength="2" class="form-control"  placeholder="Enter Margin / Commissions %" required></div> </div></div><div class="col-xs-12 col-sm-6 padd-lft-rht"><div class="form-group margintb15">Investment (If any)</div><div class="form-group"><div class="input-group"><span class="input-group-addon"><img src="{{URL::asset("images/range-rate.png")}}"></span><select name="trade_investment[]" class="form-control myselectclass">@php  $values=Config::get("constants.investRangeInWords");      foreach($values as $index => $value) { echo "<option value=".$index.">$value</option>";  } @endphp </select></div> </div> <div class="form-group margint30b10"><label class=" mandatory">Area Requirement (If any)</label></div><div class="form-group"> <div class="col-xs-4 col-sm-6 col-md-6 row-no-padding width165"> <div class="input-group"> <span class="input-group-addon"><img src="{{URL::asset("images/minimum-maximum.png")}}"></span> <input type="text" name="area_min[]" pattern="[0-9]{1,3}" maxlength="3" class="form-control"  placeholder="Enter Min"  id="min-' + tPCount + '" onkeyup="checkLessThan(this.id)" required > </div></div> <div class="col-xs-4 col-sm-3 col-md-6 row-no-padding wwidth115">  <input type="text" name="area_max[]" pattern="[0-9]{3,6}" maxlength="6"class="form-control"  placeholder="Enter Max"  id="max-' + tPCount + '" onkeyup="checkGreaterThan(this.id)" required></div><div class="col-xs-4 col-sm-3 col-md-6 row-no-padding width115"><input type="text" name="area_type[]"  class="form-control" value="Sq.Ft." readonly>  </div> </div> </div> <input type="button" id="more2" value="[-]" class="posabsoblock"></div>';
            tPCount = ++tPCount;
            $('#hello').append(newfield);
        });

        $(document).on('click', '#more2', function () {
            $(this).parent('div').remove();
        })


        //step 3 checkbox validation multi/master
        $(function () {
            var requiredCheckboxes1 = $('.hello :checkbox[required]');
            requiredCheckboxes1.change(function () {
                if (requiredCheckboxes1.is(':checked')) {
                    requiredCheckboxes1.removeAttr('required');
                } else {
                    requiredCheckboxes1.attr('required', 'required');
                }
            });
        });

        //step 3 radio button validation state/city
        $(function () {
            var requiredCheckboxes2 = $('.hello1 :radio[required]');
            requiredCheckboxes2.change(function () {
                if (requiredCheckboxes2.is(':checked')) {
                    requiredCheckboxes2.removeAttr('required');
                } else {
                    requiredCheckboxes2.attr('required', 'required');
                }
            });
        });

        //javascript password validation
        function CheckPassword(inputtxt) {
            var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[!@#$%\^&*(){}[\]<>?/|\-_])(?=.*[A-Z]).{6,20}$/;
            if (inputtxt.value.match(passw)) {
                $("#step1button").prop('disabled', false);
                $("#passwordError").css('display', 'none');
                return true;
            } else {
                $("#step1button").prop('disabled', true);
                $("#passwordError").css('display', 'block');
                return false;
            }
        }

        $("#step1button").on("mousedown", function (event) {
            var re = /\S+@\S+\.\S+/;
            var abc = $('#pwd1').val();
            var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[!@#$%\^&*(){}[\]<>?/|\-_])(?=.*[A-Z]).{6,20}$/;
            $("#registerstep2").click();
            if (re.test($('#emailfran').val()) && abc.match(passw)) {
                $("#step1button").prop('disabled', false);
                $("#passwordError").css('display', 'none');
                return true;
            } else {
                $("#step1button").prop('disabled', true);
                $("#passwordError").css('display', 'block');
                $("#error_msg_step1").show().delay(3000).fadeOut();
                return false;
            }
        });


        //multinational countries check
        $(function () {
            $(".international_countries").click(function () {
                $('.international_countries').removeAttr('required');
                $("#step3reg").prop('disabled', false);
                $('#franchiseError').css('display', 'none');
            });
            $(".checkbox1").click(function () {
                $('.checkbox1').removeAttr('required');
            });
            $(".cityexpension").click(function () {
                $('.cityexpension').removeAttr('required');
            });
        });


        //phone number validation
        function getMobileStatus(value) {
            if ($("#emailfran").val() != 'fiblbrands@franchiseindia.in' && $("#emailfran").val() != 'info@franglobal.com') {
                if ($('#successmobile').css('display') != "block") {
                    if (value.length == 10) {
                        if ($.isNumeric(value)) {
                            $.ajax({
                                type: 'GET',
                                url: '/franchisor/checkmobilestatus',
                                data: {mobile: value},
                                success: function (data) {
                                    if (data.check == 0) {
                                        $('#validatemobile').css('display', 'block');
                                        $('#step1button').attr('disabled', true);
                                        $('#chaangemobile').css('display', 'none');
                                    }
                                    if (data.check != 0) {
                                        $('#chaangemobile').css('display', 'block');
                                        $('#step1button').attr('disabled', true);
                                    }
                                }
                            });
                        }
                    }
                    if (value.length != 10) {
                        if ($.isNumeric(value)) {
                            $('#chaangemobile').css('display', 'none');
                            $('#step1button').attr('disabled', false);
                            $('#validatemobile').css('display', 'none');
                        }
                    }
                }
            }
        }

        function varifyotp(value) {
            if (value.length == 4) {
                $('#verify_button').css('display', 'block');
                if ($.isNumeric(value)) {
                    $.ajax({
                        type: 'GET',
                        url: '/franchisor/checkmobilestatus',
                        data: {mobile: value},
                        success: function (data) {
                            if (data.check == 0) {
                                $('#validatemobile').css('display', 'block');
                            }
                        }
                    });
                }
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
            $('#mobile').attr('readonly', true);
            $('#editmobile').css('display', 'block');
            $('#validatemobile').css('display', 'none');
            $('#otpblock').css('display', 'block');
            $('#step1button').attr('disabled', true);

            var keyword = document.getElementById('mobile').value;
            $.ajax({
                type: 'get',
                url: '/verifyformmobilenumber',
                data: {mobile: keyword},
                success: function (data) {
                    if (data == "numexists") {
                        $('#successmobile').css('display', 'block');
                        $('#step1button').attr('disabled', false);
                        $('#otpblock').css('display', 'none');
                        $('#mobile').attr('readonly', true);
                        $('#editmobile').css('display', 'none');
                        $('#validatemobile').css('display', 'none');
                    }
                }
            });
        }

        function verify() {
            var otp = document.getElementById('otp').value;
            var mobile = document.getElementById('mobile').value;
            $.ajax({
                type: 'get',
                url: '/franchisor/verifyotp',
                data: {otpNo: otp, mobileNo: mobile},
                success: function (data) {
                    if (data.check == 0) {
                        $('#mismatch').css('display', 'block');
                    }

                    else {
                        $('#successmobile').css('display', 'block');
                        $('#step1button').attr('disabled', false);
                        $('#otpblock').css('display', 'none');
                        $('#editmobile').css('display', 'none');
                        $('#validatemobile').css('display', 'none');
                    }
                }
            });
        }
    </script>
    <!-- end phone number validation -->
@endsection
