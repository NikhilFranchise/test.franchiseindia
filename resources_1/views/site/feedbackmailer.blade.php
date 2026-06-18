@extends('layout.master')
@section('content')
<!--form start here -->
<div class="container formsection margintop60 staicp">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12"><h1> Contact Details</h1>


            <p class="simtxt">
                <br/><br/></p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
        <!---->
        <form class="form-horizontal" method="post" action="" id="feedbackMailer">


            <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory ">Name</label>
                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                <div class="col-xs-12 col-sm-7 col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><img src="{{URL::asset('images/user.png')}}" alt="user"></span>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" maxlength="25">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Email
                </label>
                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                <div class="col-xs-12 col-sm-7 col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><img src="{{URL::asset('images/email.png')}}" alt="email"></span>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter  Email">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Mobile</label>
                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                <div class="col-xs-12 col-sm-7 col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><img src="{{URL::asset('images/mobile.png')}}" alt="mobile"></span>
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile" maxlength="10">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Address</label>
                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                <div class="col-xs-12 col-sm-7 col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon height100"><img src="{{URL::asset('images/addreess.png')}}" alt="address"></span>
                        <textarea class="form-control height100" placeholder="Enter Your Addreess" name="address" id="address"></textarea>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Pincode</label>
                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                <div class="col-xs-12 col-sm-7 col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><img src="{{URL::asset('images/pincode.png')}}" alt="pincode"></span>
                        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode" maxlength="6">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Details</label>
                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                <div class="col-xs-12 col-sm-7 col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon height100"><img src="{{URL::asset('images/file.png')}}" alt="file"></span>
                        <textarea class="form-control height100" placeholder="Enter Your details" name="details" id="details"></textarea>
                    </div>
                </div>
            </div>


            <center>
                <input type="button" class="btn btn-default" id="mailerbtn" onclick="validFeedbackMailer()" value="Submit"/>
            </center>

        </form>
        <!---->
    </div>
</div>

    <script>
        $(document).ready(function(){
            $('#mailerbtn').click(function() {
                if(validFeedbackMailer()){
                    var contreason  = document.getElementById('contreason').value;
                    var country     = document.getElementById('country').value;
                    var state       = document.getElementById('state').value;
                    var city        = document.getElementById('city').value;
                    var name        = document.getElementById('name').value;
                    var email       = document.getElementById('email').value;
                    var mobile      = document.getElementById('mobile').value;
                    var address     = document.getElementById('address').value;
                    var pincode     = document.getElementById('pincode').value;

                    alert(country);
                    $.ajax({
                        type  : 'post',
                        url   : '/contact',
                        data  : {
                            name: name, mobile: mobile, email: email, contreason: contreason, country: country,
                            state:state, city:city, address:address, pincode:pincode},
                        success: function (data) {
                            $("#contactForm")[0].reset();

                            if (data == 'true')
                                document.getElementById("contmsg").style.display  = "block";
                            document.getElementById("contactForm").style.display = "block";
                        }
                    });
                }
            });

        });

        function validFeedbackMailer()
        {
            if(
                $("#feedbackMailer").validate({
                    rules: {

                        name: {
                            required  : true,
                            accept    : "[a-zA-Z\s]+",
                            minlength : 3,
                            maxlength : 35
                        },

                        email:{
                            required : true,
                            email    : true
                        },

                        mobile: {
                            required  : true,
                            accept    : "[0-9]",
                            minlength : 10,
                            maxlength : 10,
                            number    : true
                        },

                        pincode: {
                            required  : true,
                            accept    : "[0-9]",
                            minlength : 6,
                            maxlength : 6,
                            number    : true
                        },

                        address: "required",
                        details: "required"
                    },


                    messages: {

                        name: {
                            required : "",
                            accept   : "",
                            minlength: jQuery.format(""),
                            maxlength: jQuery.format(""),
                        },

                        email: {
                            required: "",
                            email: ""
                        },

                        mobile: {
                            required: "",
                            accept: "",
                            minlength: jQuery.format(""),
                            maxlength: jQuery.format(""),
                            number: ""
                        },

                        pincode: {
                            required: "",
                            accept: "",
                            minlength: jQuery.format(""),
                            maxlength: jQuery.format(""),
                            number: ""
                        },

                        address: "",
                        details: "",

                    },

                    errorPlacement: function(error, element) {
                        error.appendTo( element.parent().parent())
                    },
                }).form())
                return true;
        }
    </script>
@endsection