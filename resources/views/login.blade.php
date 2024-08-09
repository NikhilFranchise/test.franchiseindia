@extends('layout.master')
@section('seoTitle', 'Franchise Login – Investor | Franchisor – FranchiseIndia')
@section('seoDesc',
    'Franchise login for investors and Franchisors. Login now or Create New Account as investor or
    Franchisor and expand your business with FranchiseIndia today!')

@section('content')



    <!--form start here -->
    <div class="container formsection  mabs">
        <style>
            .vrfy {
                border-radius: 3px;
                font-size: 14px;
                color: #fff;
                padding: 7px 15px;
                width: 113px;
                right: 7px;
                top: 7px;
                margin: 0 auto;
                background: #333;
                position: absolute;
                z-index: 99999;
                text-align: center;
                cursor: pointer;
            }
            .login-pnl-error1 {
                color: red;
                font-size: 13px;
                display: block;
                margin: 4px 0px 5px 0px;
            }
            .formsection .form-control {
                padding: 14px 12px;}
        </style>
        <div class="row loginpanel">
            <div class="leftpanel">
                <div class="loghead">Login</div>
                <form class="form-horizontal" method="post" action="{{ route('franchise.login.submit') }}">
                    @csrf
                    @if ($errors->has('loginFailed'))
                        <div class="alert alert-danger">{{ $errors->first('loginFailed') }}</div>
                    @endif
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{ URL::asset('images/user.png') }}"></span>
                                <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email_or_mobile1" id="email_or_mobile1"
                                    placeholder="Enter Your User ID or Mobile Number" required onkeyup="checkInputType1()">
                                <span class="vrfy" onclick="editMobileWider1()" id="edit-mobile-wider1"
                                    style="display:none">Edit</span>
                                <span class="vrfy" onclick="validateLoginMobileOTP1()" id="get_otp_btn1"
                                    style="display:none">Get OTP</span>
                            </div>
                            <div style="display:none; color:red;" class="login-pnl-error1" id="mismatch-mob1">Mobile no
                                has not registered</div>
                        </div>
                    </div>
                    <div class="form-group" id="password_group1">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{ URL::asset('images/pwd.png') }}"></span>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter Your Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="otp-block-wider1"style="display: none;">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{ URL::asset('images/pwd.png') }}"></span>
                                <input type="text" name="otp" id="otp-insta-wider" maxlength="4"
                                    class="form-control blur" placeholder="Enter OTP">
                                <div style="display:none; color:red;" id="mismatch-otp1">Mismatch OTP</div>
                                <span class="vrfy" id="resend_otp1" onclick="resendOTP1()" style="display:none">Resend
                                    OTP</span>
                                <span class="vrfy" id="otp_timer1"></span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="">
                        <input type="submit" id="sign_in_btn1" class="btn btn-default loginsign" value="Sign in" /> <span
                            class="pipe">|</span> <a class="frg-link" data-toggle="modal" data-target="#login-pnl"
                            href="#" onclick="frg_panel()">Forgot
                            Password</a>
                    </div>
                </form>
                <div class="dissol">
                    <div class="signpop"><span>or Sign in With</span></div>
                    <ul class="socl">
                        <li><a href="{{ Config::get('constants.MainDomain') }}/auth/google"><i class="fa fa-google fa-lg"
                                    aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="rightpanel">
                <div class="memtxt">
                    Not a<br />
                    Member?
                </div>
                <div class="loginblklink">
                    <span class="baprt">Start A Business Today</span>
                    <a href="{{ Config::get('constants.MainDomain') }}/investor/create"
                        class="btn btn-default loginlink">Investor
                        Registration</a>
                </div>
                <div class="loginblklink">
                    <span class="baprt">Appoint a channel partner</span>
                    <a href="{{ Config::get('constants.MainDomain') }}/franchisor/registration/step/1"
                        class="btn btn-default loginlink">Franchisor Registration</a>
                </div>

            </div>
        </div>

    </div>
    <script>
        var otpInterval;

        function checkInputType1() {
            var input = $('#email_or_mobile1').val();
            var isEmail = validateEmail(input);

            if (isEmail) {
                $('#password_group1').show();
                $('#get_otp_btn1').hide();
                $('#sign_in_btn1').prop('disabled', false);
            } else if (validateMobile(input)) {
                $('#password_group1').hide();
                $('#get_otp_btn1').show();
                $('#sign_in_btn1').prop('disabled', true);
            } else {
                $('#password_group1').show();
                $('#get_otp_btn1').hide();
                $('#sign_in_btn1').prop('disabled', false);
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

        function validateLoginMobileOTP1() {
            var mobile = $('#email_or_mobile1').val();
            $.ajax({
                type: 'get',
                url: '/login_verify_mobile',
                data: {
                    mobile: mobile
                },
                success: function(data) {
                    if (data.data == 0) {
                        $("#mismatch-mob1").show();
                        $("#email_or_mobile1").prop("readonly", true);
                        $("#sign_in_btn1").prop("disabled", true);
                        $("#edit-mobile-wider1").show();
                        $("#otp-block-wider1").hide();
                        $("#get_otp_btn1").hide();
                    } else {
                        $("#mismatch-mob1").hide();
                        $("#email_or_mobile1").prop("readonly", true);
                        $("#sign_in_btn1").prop("disabled", false);
                        $("#edit-mobile-wider1").show();
                        $("#otp-block-wider1").show();
                        $("#get_otp_btn1").hide();
                        startOTPTimer1();
                    }
                }
            });
        }

        function editMobileWider1() {
            $("#email_or_mobile1").prop("readonly", false);
            $("#mismatch-mob1").hide();
            $("#edit-mobile-wider1").hide();
            $("#otp-block-wider1").hide();
            $("#sign_in_btn1").prop("disabled", true);
            clearInterval(otpInterval);
            $('#otp_timer1').hide();
            $('#resend_otp1').hide();
        }

        function startOTPTimer1() {
            var timer = 60;
            $('#resend_otp1').hide();
            $('#otp_timer1').show();

            otpInterval = setInterval(function() {
                if (timer > 0) {
                    timer--;
                    $('#otp_timer1').text(timer + 's');
                } else {
                    clearInterval(otpInterval);
                    $('#otp_timer1').hide();
                    $('#resend_otp1').show();
                    $("#sign_in_btn1").prop("disabled", true);
                }
            }, 1000);
        }

        function resendOTP1() {
            clearInterval(otpInterval);
            var mobile = $('#email_or_mobile1').val();
            startOTPTimer1();
            validateLoginMobileOTP1();
        }
    </script>
@endsection
