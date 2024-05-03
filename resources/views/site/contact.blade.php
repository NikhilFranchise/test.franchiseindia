@extends('layout.master')
@section('seoTitle', 'Franchise India - Contact Us')
@section('seoDesc', 'Franchise India - Contact Us. This section helps to users for contacting us through query.')
@section('seoKeywords', 'contact us, franchise, franchise india')
@section('content')
    @php
        $states = Config('location.stateArr');
        asort($states);
        $countries = Config('location.countryName');
    @endphp
    <div class="container formsection margintop60 staicp">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h1> Contact Us</h1>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 row-no-padding">
            <form class="form-horizontal" id="contactForm" action="{{ url('contact-submit') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Name</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ url('images/user.png') }}" alt="user"></span>
                            <input type="text" class="form-control" name="name" placeholder="Enter Your Name"
                                maxlength="25">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Email
                    </label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ url('images/email.png') }}" alt="email"></span>
                            <input type="text" class="form-control" name="email" placeholder="Enter  Email">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Mobile</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ url('images/mobile.png') }}" alt="mobile"></span>
                            <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile"
                                maxlength="10">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="country" class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">I am based in
                    </label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ url('images/country.png') }}"
                                    alt="country"></span>
                            <select name="country" id="country" class="form-control myselectclass">
                                <option value="">Select Country</option>
                                @foreach ($countries as $index => $value)
                                    <option value="{{ $index }}" @if ($index == 99) selected @endif>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="countrystate">
                    <label for="state" class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">State</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ url('images/state.png') }}" alt="state"></span>
                            <select name="state" id="state" class="form-control myselectclass">
                                <option value="">Select State</option>
                                @foreach ($states as $index => $value)
                                    <option value="{{ $index }}" @if ($index == 99) selected @endif>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">City</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ url('images/city.png') }}" alt="city"></span>
                            <input type="text" class="form-control" name="city" placeholder="Enter Your city"
                                maxlength="25">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Address</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon height100"><img src="{{ url('images/state.png') }}"
                                    alt="state"></span>
                            <textarea class="form-control height100" placeholder="Enter Your Addreess" name="address"></textarea>
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
                            <input type="text" class="form-control" name="pincode" placeholder="Enter Pincode"
                                maxlength="6">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contreason" class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">I want to
                    </label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ url('images/iwanto.png') }}"
                                    alt="iwantto"></span>
                            <select name="contreason" id="contreason" class="form-control myselectclass">
                                <option value>--Select contact reason--</option>
                                <option value="Advertise with www.franchiseindia.com">Advertise with www.franchiseindia.com
                                </option>
                                <option value="Advertise in Magazine">Advertise in Magazine</option>
                                <option value="Exhibit in Shows">Exhibit in Shows</option>
                                <option value="Expand my Company through Franchising">Expand my Company through Franchising
                                </option>
                                <option value="Buy a Franchise (Business)">Buy a Franchise (Business)</option>
                                <option value="Sell my Existing Business">Sell my Existing Business</option>
                                <option value="Subscribe to the Magazine">Subscribe to the Magazine</option>
                                <option value="Feedback">Feedback</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contreason" class="col-xs-12 col-sm-4 col-md-4 com4mod control-label"></label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs"></div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <input type="checkbox" name="is_termsagree" id="is_termsagree" value="1">
                        @if (Request::segment(1) == 'hi')
                            I have one record!
                        @else
                            i agree to the <a href="{{ Config('constants.MainDomain') }}/terms" target="_blank">Term of
                                services</a>
                        @endif
                    </div>
                </div>
                {{-- <div class="checkbox rm-prop"> --}}
                {{-- <label> --}}
                {{-- <input type="checkbox" name="is_termsagree" id="is_termsagree" value="1"> --}}
                {{-- @if (Request::segment(1) == 'hi') --}}
                {{-- I have one record! --}}

                {{-- @else --}}
                {{-- i agree to the <a href="{{Config('constants.MainDomain')}}/terms" target="_blank">Term of services</a> --}}
                {{-- @endif --}}
                {{-- </label> --}}
                {{-- </div> --}}
                <div style="text-align:center">
                    <input type="submit" id="btnhome" class="btn btn-default" value="Submit" />
                </div>
            </form>
        </div>
    </div>
    <div class="height40"></div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#contactForm").validate({
                ignore: "select:hidden",
                rules: {
                    contreason: "required",
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
                    country: "required",
                    state: "required",
                    city: {
                        required: true,
                        accept: "[a-zA-Zs]+",
                        minlength: 3,
                        maxlength: 20
                    },
                    pincode: {
                        required: true,
                        accept: "[0-9]",
                        minlength: 6,
                        maxlength: 6,
                        number: true
                    },
                    address: "required"
                },
                messages: {
                    contreason: "",
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
                    country: "",
                    state: "",
                    city: {
                        required: "",
                        accept: "",
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
                    address: ""
                }
            });
            $("#country").on("change", function() {
                var b = document.getElementById("country").value;
                if (parseInt(b) === 99) {
                    document.getElementById("countrystate").style.display = "block"
                } else {
                    document.getElementById("countrystate").style.display = "none"
                }
            })
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#btnhome').prop('disabled', true);
            $('#is_termsagree').click(function() {
                if ($('#is_termsagree').is(':checked')) {
                    $('#btnhome').prop('disabled', false);
                } else {
                    $('#btnhome').prop('disabled', true);
                }
            })
        })
    </script>
@endsection
