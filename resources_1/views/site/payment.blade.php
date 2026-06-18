@extends('layout.master')
@section('content')
    <div class="container formsection margintop60 staicp">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h1>Online Payment </h1>
                <p><br /><br /></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 row-no-padding">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form-horizontal" id="paymentForm" method="post" action="{{ url('paymentsubmit') }}">
                @csrf
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Name</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ url('images/user.png') }}" alt="user"></span>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Your Name" maxlength="30">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Mobile</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ url('images/mobile.png') }}" alt="mobile"></span>
                            <input type="text" class="form-control" id="mobile" name="mobile"
                                placeholder="Enter Mobile" maxlength="10">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Email</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ url('images/email.png') }}" alt="email"></span>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter  Email">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="country" class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Country</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ url('images/country.png') }}"
                                    alt="country"></span>
                            <select name="country" id="country" class="form-control myselectclass">
                                <option value="99" selected>India </option>
                                <option value="">Other</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Address</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon height100"><img src="{{ url('images/addreess.png') }}"
                                    alt="address"></span>
                            <textarea class="form-control height100" id="address" name="address" placeholder="Enter Your Addreess"
                                maxlength="150"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Pincode</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ url('images/pincode.png') }}"
                                    alt="pincode"></span>
                            <input type="text" class="form-control" id="pincode" name="pincode"
                                placeholder="Enter Pincode" maxlength="6">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Detail</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon height100"><img src="{{ url('images/addreess.png') }}"
                                    alt="address"></span>
                            <textarea class="form-control height100" id="details" name="details" placeholder="Enter Your Detail"
                                maxlength="60"></textarea>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Total Amount
                    </label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">

                        <div class="row">
                            <div class="col-lg-3">
                                <select name="currency" class="form-control">
                                    <option value="INR" selected>INR</option>
                                    <option value="AED">AED</option>
                                    <option value="AUD">AUD</option>
                                    <option value="CAD">CAD</option>
                                    <option value="EUR">EUR</option>
                                    <option value="USD">USD</option>

                                </select>
                            </div>

                            <div class="col-lg-9">
                                <input type="text" class="form-control blur" id="camount" name="camount"
                                    placeholder="Enter  Amount" maxlength="8">
                            </div>
                        </div>

                    </div>
                </div>



                <div class="form-group">
                    <label for="country" class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Mode of
                        Payment</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ url('images/country.png') }}"
                                    alt="country"></span>
                            <select name="mop" id="mop" class="form-control myselectclass">
                                <option value="OPTCRDC">Mode Of Payment</option>
                                <option value="OPTCRDC">Credit Card</option>
                                <option value="OPTDBCRD">Debit Card</option>
                                <option value="OPTNBK">Net Banking</option>
                                <option value="OPTEMI">EMI</option>
                                <option value="OPTUPI">UPI</option>


                            </select>
                        </div>
                    </div>
                </div>
                <div style="text-align: center;">
                    <input type="submit" class="btn btn-default" id="paymentbtn" onclick="validpayment()"
                        value="Pay Now" />
                </div>
            </form>
        </div>
    </div>
    <div class="height40"></div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('input[title!=""]').hint();
            $('textarea[title!=""]').hint();
            $('select[title!=""]').hint();
            var a = $("#paymentForm").validate({
                rules: {
                    name: {
                        required: true,
                        accept: "[a-zA-Zs]+",
                        minlength: 3,
                        maxlength: 35
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    mobile: {
                        required: true,
                        accept: "[0-9]",
                        minlength: 10,
                        maxlength: 10,
                        number: true
                    },
                    pincode: {
                        required: true,
                        accept: "[0-9]",
                        minlength: 6,
                        maxlength: 6,
                        number: true
                    },
                    details: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    },
                    camount: {
                        required: true,
                        accept: "[0-9]",
                        minlength: 1,
                        maxlength: 8,
                        number: true
                    },
                    address: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    }
                },
                messages: {
                    name: {
                        required: "",
                        accept: "",
                        minlength: jQuery.format(""),
                        maxlength: jQuery.format("")
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
                    details: {
                        required: "",
                        minlength: jQuery.format(""),
                        maxlength: jQuery.format("")
                    },
                    country: "",
                    camount: {
                        required: "",
                        accept: "",
                        minlength: jQuery.format(""),
                        maxlength: jQuery.format(""),
                        number: ""
                    },
                    address: {
                        required: "",
                        minlength: jQuery.format(""),
                        maxlength: jQuery.format("")
                    }
                }
            })
        });

        function validpayment() {
            if ($("#paymentForm").validate({
                    rules: {
                        name: {
                            required: true,
                            accept: "[a-zA-Zs]+",
                            minlength: 3,
                            maxlength: 35
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        mobile: {
                            required: true,
                            accept: "[0-9]",
                            minlength: 10,
                            maxlength: 10,
                            number: true
                        },
                        details: {
                            required: true,
                            minlength: 3,
                            maxlength: 255
                        },
                        camount: {
                            required: true,
                            accept: "[0-9]",
                            maxlength: 8,
                            number: true
                        },
                        address: {
                            required: true,
                            minlength: 3,
                            maxlength: 255
                        }
                    },
                    messages: {
                        name: {
                            required: "",
                            accept: "",
                            minlength: jQuery.format(""),
                            maxlength: jQuery.format("")
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
                        details: {
                            required: "",
                            minlength: jQuery.format(""),
                            maxlength: jQuery.format("")
                        },
                        pincode: {
                            required: "",
                            accept: "",
                            minlength: jQuery.format(""),
                            maxlength: jQuery.format(""),
                            number: ""
                        },
                        camount: {
                            required: "",
                            accept: "",
                            minlength: jQuery.format(""),
                            maxlength: jQuery.format(""),
                            number: ""
                        },
                        address: {
                            required: "",
                            minlength: jQuery.format(""),
                            maxlength: jQuery.format("")
                        }
                    },
                    errorPlacement: function(a, b) {
                        a.appendTo(b.parent().parent())
                    }
                }).form()) {
                return true
            }
        }
    </script>
@endsection
