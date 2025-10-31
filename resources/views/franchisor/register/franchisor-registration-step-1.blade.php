@extends('layout.master')
@section('seoTitle', 'Franchisor Registration - franchiseindia.com')
@section('seoDesc',
'Are you a franchisor with a unique business idea? Register with Franchise India and get noticed by
multiple investors and expand your client base.')
@section('content')
<!--step process start  here -->
<style type="text/css">
    .innerloginblk {
        padding: 0px;
    }

    #adslot728x90_BTF {
        display: none
    }

    #Business-Opportunitiessection {
        display: none
    }

    #Our-Group-Sitessection {
        display: none
    }

    .regblkleft {
        display: none;
    }

    .regblkright {
        display: none;
    }

    .footrtwhatsapp-icon {
        display: none;
    }

    .margintop60.staicp.topsetv {
        margin-top: 150px;
    }

    @media only screen and (min-width: 1px) and (max-width: 767px) {
        .margintop60.staicp.topsetv {
            margin-top: 110px;
        }
    }
</style>

<div class="container formsection margintop60 staicp topsetv">
    <!--   <h1 class="noneunder"> Free listing - join franchiseindia.com today!</h1> -->
    <h1 class="noneunder"> It's Free & Easy To Register Your Company Now With Us!</h1>

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
                <div class="col-xs-2 stepwizard-step">
                    <p class="hidden-xs" id="head1">Business</p>
                    <span class="disnone"><i class="fa fa-address-book fa-lg" aria-hidden="true"></i></span>
                    <a href="#" class="btn btn-default btn-circle overfla"></a>
                </div>
                <div class="col-xs-2 stepwizard-step">
                    <p class="hidden-xs" id="head2">Professional</p>
                    <span class="disnone"> <i class="fa fa-address-card fa-lg" aria-hidden="true"></i></span>
                    <a href="#" class="btn btn-default btn-circle overfla"></a>
                </div>
                <div class="col-xs-2 stepwizard-step">
                    <p class="hidden-xs" id="head3">Property</p>
                    <span class="disnone"><i class="fa fa-building fa-lg" aria-hidden="true"></i></span>
                    <a href="#" class="btn btn-default btn-circle overfla"></a>
                </div>
                <div class="col-xs-2 stepwizard-step">
                    <p class="hidden-xs" id="head4">Agreements</p>
                    <span class="disnone"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"
                            title="Training/Agreements"></i></span>
                    <a href="#" class="btn btn-default btn-circle overfla"></a>
                </div>
                <div class="col-xs-2 stepwizard-step">
                    <p class="hidden-xs" id="head5">Payment</p>
                    <span class="disnone"><i class="fa fa-credit-card fa-lg" aria-hidden="true"
                            title="Payment"></i></span>
                    <a href="#" class="btn btn-default btn-circle overfla"></a>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="" style="text-align:center;margin-top: 45px;color: #000;font-size: 17px;font-weight: 400;">
            Chat on <a
                href="https://api.whatsapp.com/send?phone=919312650021&amp;text=Hello,%20I%20am%20interested%20in%20knowing%20more%20about ?%20https://www.franchiseindia.com/"
                target="_blank"><img src="https://www.franchiseindia.com/newhomepage/assets/img/whatappsicon.svg"
                    class="sts"></a></div>
        <!--  -->
    </div>
</div>
<!--step process end  here -->
<!--form start here -->
<div class="container formsection">
    <div class="row margt0">
        <!--left form section start here -->
        <div class="col-xs-12 col-sm-9 bor-radius backwhite targleft row-no-padding">
            <!---->
            <form class="form-horizontal" id="fran-form" name="form_franchisor"
                action="{{ url('franchisor/registration/step/2') }}" method="POST" role="form"
                enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="profile_id" value="{{ session()->get('profileId') }}">
                <input type="hidden" name="reg_source" value="{{ request()->reg_source }}">
                <input type="hidden" name="franchisorId" value="{{ request()->franchisorId }}">

                <!-- step 1 start here -->
                <div class="setup-content" id="step-1" style="display:block;">
                    <!-- displaying session errors -->
                    @if (session()->has('errorMessage'))
                    <p class="alert alert-info">{{ session()->get('status') }}</p>
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
                            <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory ">Email Id (User
                                Id)</label>
                            <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                            <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                <div class="input-group">
                                    <span class="input-group-addon"><img src="{{ url('images/user.png') }}"
                                            alt="user email"></span>
                                    <input name="email" id="emailfran" type="text" class="form-control"
                                        placeholder="Enter Your User ID">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-12  col-md-4  com4mod control-label mandatory">Password</label>
                            <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                            <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                <div class="input-group">
                                    <span class="input-group-addon"><img src="{{ url('images/pwd.png') }}" alt="user password"></span>
                                    <input name="password" id="pwd1" type="password" class="form-control" placeholder="Enter Your Password">
                                    <div style="text-align: center;"><span onClick="toggle_password('pwd1');" id="showpwd1" class="showhidecng">Show</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Mobile</label>
                            <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                            <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                <div class="input-group">
                                    <span class="input-group-addon"><img src="{{ url('images/mobile.png') }}" alt="user mobile"></span>
                                    <input name="mobile" id="mobile" type="text" pattern="[0-9]{10,10}" class="form-control" maxlength="10" placeholder="Enter Mobile"
                                        minlength="10">
                                    <div style="text-align: center;"><span onClick="validatemobile();"
                                            id="validatemobile" class="showhidecng"
                                            style="display: none">Verify</span></div>
                                    <div style="text-align: center;"><span onClick="editmobile();" id="editmobile"
                                            class="showhidecng" style="display: none">Edit</span></div>
                                    <div style="text-align: center;"><span id="successmobile" class="showhideright"
                                            style="display: none"><i class="fa fa-check fa-lg"
                                                aria-hidden="true"></i></span></div>
                                </div>
                                <div id="chaangemobile" style="display: none; color: red;">This mobile number is
                                    already in use, Please change to new number</div>
                            </div>
                        </div>

                        <div class="form-group" style="display: none;" id="otpblock">
                            <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">One Time
                                Password</label>
                            <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                            <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                <div class="input-group">
                                    <span class="input-group-addon"><img src="{{ url('images/mobile.png') }}"
                                            alt="user otp"></span>
                                    <input id="otp" type="text" class="form-control" maxlength="4"
                                        placeholder="Enter OTP" onkeyup="varifyOtp(this.value);">
                                    <div style="text-align: center;"><span id="verify_button" class="showhidecng"
                                            style="display: none" onclick="franchisorVerify()">Verify</span></div>
                                </div>
                                <div style="display: none; color: red;" id="mismatch">OTP Mismatch</div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row colbg text-center">
                        <input type="submit" id="step1button" class="btn btn-default" value="next" />
                    </div>
                </div>
                <!-- step 1 end here -->
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
    $(document).ready(function() {

        $.validator.addMethod("pwdcheck", function(value) {
                return /^(?=.*\d)(?=.*[a-z])(?=.*[!@#$%^&*(){}[\]<>?/|\-_])(?=.*[A-Z]).{6,20}$/.test(value);
            },
            "Password should contain a small character, a capital character, a numeric value and a special character"
        );

        //Checking user exist
        let oldEmail = '';
        let ajaxResult = null;
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


        $("#fran-form").validate({

            rules: {
                /*Step1 validation rule start here*/
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
                mobile: {
                    required: true,
                    accept: "[0-9]",
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
            },
            messages: {
                email: {
                    required: "Please enter email address",
                    email: "Please enter valid email address"
                },
                mobile: {
                    required: "Please enter mobile number",
                    accept: "Please enter 10 digit mobile no",
                    minlength: $.format("Please enter {0} digit mobile number"),
                    maxlength: $.format("Please enter maximum of {0} digit"),
                    number: "Please enter numeric value!!!"
                },
                password: {
                    required: "Please enter password",
                    minlength: $.format("Please enter {0} length password"),
                }
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.parent().parent())
            }
        });

        $("#mobile").on('change keyup', function() {
            let email = $("#emailfran");
            let value = $("#mobile").val();

            if (email.val() !== 'fiblbrands@franchiseindia.in' && email.val() !==
                'info@franglobal.com' && email.val() !== 'info@opportunityindia.com' && value !=
                9818029389 && value != 8588819019) {

                if ($('#successmobile').css('display') !== "block") {
                    if (value.length === 10) {
                        if ($.isNumeric(value)) {
                            $.ajax({
                                type: 'GET',
                                url: '/user/check-mobile-status',
                                data: {
                                    mobile: value,
                                    email: email.val()
                                },
                                success: function(data) {
                                    if (data.check === 0) {
                                        $('#validatemobile').css('display', 'block');
                                        $('#step1button').attr('disabled', true);
                                        $('#chaangemobile').css('display', 'none');
                                        $("#successmobile").hide();
                                    } else if (data.check === 99999999) {
                                        $("#successmobile").show();
                                    } else {
                                        $("#successmobile").hide();
                                        $('#chaangemobile').css('display', 'block');
                                        $('#step1button').attr('disabled', true);
                                    }


                                }
                            });
                        }
                    }
                    if (value.length !== 10) {
                        if ($.isNumeric(value)) {
                            $('#chaangemobile').css('display', 'none');
                            $('#step1button').attr('disabled', false);
                            $('#validatemobile').css('display', 'none');
                        }
                    }
                }
            }
        });
    });

    function varifyOtp(value) {
        if (value.length === 4) {
            $('#verify_button').css('display', 'block');
            if ($.isNumeric(value)) {
                $.ajax({
                    type: 'GET',
                    url: '/franchisor/checkmobilestatus',
                    data: {
                        mobile: value
                    },
                    success: function(data) {
                        if (data.check === 0) {
                            $('#validatemobile').css('display', 'block');
                        }
                    }
                });
            }
        }
        if (value.length !== 4) {
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

        let keyword = document.getElementById('mobile').value;
        $.ajax({
            type: 'get',
            url: '/verifyformmobilenumber',
            data: {
                mobile: keyword
            },
            success: function(data) {
                if (data === "numexists") {
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

    function franchisorVerify() {
        let otp = document.getElementById('otp').value;
        let mobile = document.getElementById('mobile').value;
        $.ajax({
            type: 'get',
            url: '/franchisor/verifyotp',
            data: {
                otpNo: otp,
                mobileNo: mobile
            },
            success: function(data) {
                if (data.check === 0) {
                    $('#mismatch').css('display', 'block');
                } else {
                    $('#successmobile').css('display', 'block');
                    $('#step1button').attr('disabled', false);
                    $('#otpblock').css('display', 'none');
                    $('#editmobile').css('display', 'none');
                    $('#validatemobile').css('display', 'none');
                }
            }
        });
    }

    //password show/hide function
    function toggle_password(target) {
        let tag = document.getElementById(target);
        let dv = "show" + target;
        let tag2 = document.getElementById(dv);
        if (tag2.innerHTML !== 'Show') {
            tag.setAttribute('type', 'password');
            tag2.innerHTML = 'Show';
        } else {
            tag.setAttribute('type', 'text');
            tag2.innerHTML = 'Hide';
        }
    }
</script>
<!-- end phone number validation -->


@endsection