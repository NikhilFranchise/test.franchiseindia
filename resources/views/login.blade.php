@extends('layout.master')
@section('seoTitle', 'Franchise Login – Investor | Franchisor – FranchiseIndia')
@section('seoDesc',
    'Franchise login for investors and Franchisors. Login now or Create New Account as investor or
    Franchisor and expand your business with FranchiseIndia today!')
@section('content')

    <!--form start here -->
    <div class="container formsection  mabs">
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
                                    name="email_or_mobile" id="email_or_mobile"
                                    placeholder="Enter Your User ID or Mobile Number" required onkeyup="checkInputType()">
                                <div style="display:none; color:red;" id="mismatch-mob">Mobile no has not registered</div>
                                <span class="vrfy" onclick="editMobileWider()" id="edit-mobile-wider"
                                    style="display:none">Edit</span>
                                <span class="vrfy" onclick="validateLoginMobileOTP()" id="get_otp_btn"
                                    style="display:none">Get OTP</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="password_group">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{ URL::asset('images/pwd.png') }}"></span>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter Your Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="otp-block-wider"style="display: none;">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{ URL::asset('images/pwd.png') }}"></span>
                                <input type="text" name="otp" id="otp-insta-wider" maxlength="4"
                                    class="form-control blur" placeholder="Enter OTP">
                                <div style="display:none; color:red;" id="mismatch-otp">Mismatch OTP</div>
                                <span class="resend" id="resend_otp" onclick="resendOTP()" style="display:none">Resend
                                    OTP</span>
                                <span class="timer" id="otp_timer"></span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="">
                        <input type="submit" id="sign_in_btn" class="btn btn-default loginsign" value="Sign in" /> <span
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
                    $('#otp_timer').text(timer + 's');
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
    @endsection
