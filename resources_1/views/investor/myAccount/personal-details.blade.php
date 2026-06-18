@extends('layout.master')
@section('pd')
    class="selected"
@endsection
@section('content')
    <div class="container myaccount">
        <div class="row row-no-margin">
            <!-- MY ACCOUNT  LEFT sTART -->
        @include('includes.myinvestorleft')
        <!-- MY ACCOUNT  LEFT END -->
            <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
                <h1 class="myhead marleft">Personal Details</h1>
                <div class="bor-radius backwhite marleft">
                    <form  class="form-horizontal formInv" name="form_investor" id="investorRegForm" action="updatepersonaldetails" method="POST"  role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-xs-12 pad30 showbg">

                            @if($errors->any())
                                <h4>{{$errors->first()}}</h4>
                            @endif
                            @if (Session::has('Success'))
                                <div class="alert alert-info">{{ Session::get('Success') }}</div>
                            @endif
                            @if (Session::has('errorMessage'))
                                <div class="alert alert-info">{{ Session::get('errorMessage') }}</div>
                            @endif

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Name</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">

                                    <div class="row row-no-margin">
                                        <div class="col-xs-3 col-sm-3 col-md-3 row-no-padding eds">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img src="{{url('images/user.png')}}" alt="user"></span>
                                                <select name="title" class="form-control myselectclass3" id="titlesur">
                                                    <option value="1" {{$personalData->title == 1 ? "selected" : "" }} >Mr.</option>
                                                    <option value="2" {{$personalData->title == 2 ? "selected" : "" }} >Mrs.</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-3 col-sm-9 col-md-9 row-no-padding eds2">
                                            <input type="text" class="form-control" placeholder="Enter Your Name" minlength="3" name="invName" value="{{$personalData->name}}" >
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Secondary Email Id</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/profile.png')}}" alt="profile"></span>
                                        <input class="form-control" minlength="6" type="text" name="secondary_email" placeholder="Enter Your Secondary Email Id"  value="{{$data->secondary_email}}">
                                    </div>
                                </div>
                            </div>
                                   <input type="hidden" name="otpstatus" value="1" id="otpstatus">
                                   <input type="hidden" value="{{$personalData->reg_source}}" name="reg_source">
                                   <input type="hidden" value="{{$personalData->mobile}}" name="chkmobile">
                                   @if($personalData->mobile == '' && ($personalData->reg_source == 'google' || $personalData->reg_source == 'facebook'))

                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Mobile</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img src="{{url('images/mobile.png')}}" alt="mobile"></span>
                                            <input name="mobile" id="mobile" type="text"  class="form-control" maxlength="10" placeholder="Enter Mobile">
                                            <center><span onClick="validatemobile();" id="validatemobile" class="showhidecng" style="display: none">Verify</span></center>
                                            <center><span onClick="editmobile();" id="editmobile" class="showhidecng" style="display: none">Edit</span></center>
                                            <center><span id="successmobile" class="showhideright" style="display: none"><i class="fa fa-check fa-lg" aria-hidden="true"></i></span></center>
                                        </div>
                                        <div id="chaangemobile" style="display: none; color: red;">This mobile number is already in use, Please change to new number</div>
                                    </div>
                                </div>
                                <div class="form-group" style="display: none;" id="otpblock">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">One Time Password</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img src="{{url('images/mobile.png')}}" alt="password"></span>
                                            <input id="otp" type="text" class="form-control" maxlength="4" placeholder="Enter OTP" onkeyup="varifyotp(this.value);">
                                            <center><span id="verify_button" class="showhidecng" style="display: none" onclick="verify()">Verify</span></center>
                                        </div>

                                        <div style="display: none" id="mismatch">OTP Mismatch</div>
                                    </div>
                                </div>
                                @endif

                                <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Secondary Mobile</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/mobile.png')}}" alt="monbile"></span>
                                        <input name="secondary_mobile" type="text" class="form-control" maxlength="10" placeholder="Enter Secondary Mobile"  value="{{$data->secondary_phone_no}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Address Details</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon height100" ><img src="{{URL::asset('images/addreess.png')}}" alt="address"></span>
                                        <textarea class="form-control height100" placeholder="please enter your address" minlength="6" name="address" >{{$data->inv_address}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Address Landmark</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/addreess.png')}}" alt="address landmark"></span>
                                        <input type="text" name="landmark" class="form-control" minlength="3" placeholder="Landmark" value="{{$data->landmark}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Country</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/country.png')}}" alt="country"></span>
                                        <select class="form-control myselectclass" name="country" >
                                            @foreach(Config::get('location.countryName') as $index => $val )
                                                <option value="{{ $index }}" @if($data->inv_country == $val) selected @endif> {{ $val }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Pincode</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/pincode.png')}}" alt="pincode"></span>
                                        <input type="text" name="pincode" pattern="[0-9]{6,6}" maxlength="6" class="form-control" placeholder="Enter Pincode"   value="{{$data->inv_pincode}}">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">State</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/state.png')}}" alt="state"></span>
                                        <select class="form-control myselectclass" name="state" >
                                            @foreach(Config('location.stateArr') as $index => $value)
                                                <option value="{{ $value }}" @if($data->inv_state == $value) selected @endif >{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">City</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/city.png')}}" alt="city"></span>
                                        <input type="text" id="city" name="city" class="form-control" minlength="3" placeholder="City"  value="{{$data->inv_city}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Date of Birth </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/calendar.png')}}" alt="calender"></span>
                                        <input type="text" id="datepicker" name="dob" class="form-control" placeholder="yyyy-mm-dd"   value="{{$data->dob}}">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <div class="row colbg">
                            <center>
                                <input type="submit" class="btn btn-default nextBtn" id="save1" value="Update"/>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script language="javascript">
        $(document).ready(function(){

            $("#mobile").keyup(function(){
                console.log(this.value);
                getMobileStatusInvestor(this.value);
            });
        });
    </script>
    <script>
        function getMobileStatusInvestor(value) {
            console.log('function enter');
            if ($('#successmobile').css('display') != "block") {
                if (value.length > 9) {
                    if ($.isNumeric(value)) {
                        console.log('number verified');
                        $.ajax({
                            type: 'get',
                            url: '/user/investor-mobile-verify',
                            data: {mobile:value},
                            success: function (response) {
                                console.log(response);
                                if (response == 0) {
                                    $('#validatemobile').css('display', 'block');
                                    $('#save1').attr('disabled', true);
                                    $('#chaangemobile').css('display', 'none');
                                    $("#successmobile").hide();
                                }
                                else {
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
//                if ($.isNumeric(value)) {
//                    $.ajax({
//                        type: 'get',
//                        url: '/investor/verify-otp',
//                        data: {mobile: value},
//                        success: function (data) {
//                            if (data == 0) {
//                                $('#validatemobile').css('display', 'block');
//                            }
//                        }
//                    });
//                }
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
                data: {mobile:keyword},
                success: function (data) {
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

        function verify() {
            console.log('verify');
            var otp = document.getElementById('otp').value;
            var mobile = document.getElementById('mobile').value;
            $.ajax({
                type: 'get',
                url: '/investor/verify-otp',
                data: {otpNo: otp, mobileNo: mobile},
                crossDomain: true,
                success: function (data) {

                    console.log(data);
                    if (data == 0) {
                        $('#mismatch').css('display', 'block');
                    }

                    else {
                        $('#successmobile').css('display', 'block');
                        $('#save1').attr('disabled', false);
                        $('#otpblock').css('display', 'none');
                        $('#editmobile').css('display', 'none');
                        $('#validatemobile').css('display', 'none');
                    }
                }

            });
        }
    </script>
    <script language="javascript">
        //datepicker function for form step1
        $( function() {
                $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd', maxDate: '-18Y',changeMonth: true,
                    changeYear: true,yearRange: "-100:+0" });
            }
        );

        $( "#datepicker" ).change(function() {
            $("input").removeClass("error");
            $("select").removeClass("error");
            $("textarea").removeClass("error");
            $("label.error").css("display","none");
        });
    </script>

@endsection
