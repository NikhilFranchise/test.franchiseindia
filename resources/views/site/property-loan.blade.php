@extends('layout.master')
@section('content')

    @php
        $cities = [
            'Siliguri',
            'Patna',
            'Belagavi',
            'Tiruvallur',
            'Mehsana',
            'Sonepat',
            'Jalandhar',
            'Ajmer',
            'Bhilwara',
            'Meerut',
            'Varanasi',
            'Kanpur',
            'East Godavari',
            'Guntur',
            'Nellore',
            'Warangal',
            'Pondicherry',
            'Ernakulam',
            'Devas',
            'Ujjain',
            'Ratlam',
            'Satara',
            'Kolhapur',
            'AhmedNagar',
            'kolkata',
            'Raipur',
            'Bhuvaneswar',
            'Delhi',
            'Bengaluru',
            'Mysore',
            'Chennai',
            'Mumbai',
            'Pune',
            'Ahmedabad',
            'Baroda',
            'Anand',
            'Gandhidham',
            'Rajkot',
            'Jamnagar',
            'Surat',
            'Vapi',
            'Ambala',
            'Karnal',
            'Panipat',
            'Chandigarh',
            'Ludhiana',
            'jaipur',
            'Udaipur',
            'Jodhpur',
            'Kota',
            'Lucknow',
            'Dehradun',
            'Hyderabad',
            'Vijayawada',
            'Vishakapatnam',
            'Coimbatore',
            'Erode',
            'salem',
            'Madurai',
            'Indore',
            'Bhopal',
            'Nasik',
            'Aurangabad',
            'GOA',
            'Nagpur',
        ];
    @endphp
    <div class="container formsection margintop60 staicp">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h1>Loan Against Property</h1>
                <p class="simtxt">
                    Loans against property offer a viable financial solution where property owners can leverage their real
                    estate assets to secure funds for various needs. At Franchise India Property Loan, we understand the
                    significance of unlocking the value of your property. Whether it's expanding your business, funding
                    education, managing unforeseen expenses, or consolidating debts, our property loan services provide a
                    flexible and efficient borrowing option. With competitive interest rates, tailored repayment plans, and
                    hassle-free processing, we empower individuals to access substantial funds while retaining ownership of
                    their valuable property. Our expert team assists in navigating the loan process, ensuring transparency,
                    and offering guidance at every step. Unlock the potential of your property with Franchise India's
                    property loan solutions and accomplish your financial goals with confidence.</p>
                <p class="simtxt"><strong> Please provide your details to help us serve you better</strong><br><br></p>
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
            <form class="form-horizontal" id="loanForm" method="post" action="{{ url('property-loan-submit') }}">
                @csrf
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory ">Loan Range</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ url('images/range-rate.png') }}"></span>
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
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Mobile</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ url('images/mobile.png') }}" alt="mobile"></span>
                            <input type="text" class="form-control" pattern="[6789][0-9]{9}" id="mobile"
                                name="mobile" placeholder="Enter Mobile" maxlength="10">
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
                            <textarea class="form-control height100" id="address" name="address" placeholder="Enter Your Address" maxlength="150"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">City</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ url('images/addreess.png') }}"
                                    alt="city"></span>
                            <select name="city" id="city" class="form-control myselectclass">
                                <option value="">Select City</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city }}">{{ $city }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Pin code</label>
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
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Current Income
                        (Monthly)</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img
                                    src="https://www.franchiseindia.com/images/range-rate.png"></span>
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
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Type Of Property To
                        Mortgage</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img
                                    src="https://www.franchiseindia.com/images/range-rate.png"></span>
                            <select name="property_type" class="form-control myselectclass">
                                <option value="">--Type Of Property --</option>
                                <option value="Residential">Residential</option>
                                <option value="Commercial">Commercial</option>
                                {{-- <option value="plot">plot</option> --}}
                                <option value="Godown">Godown</option>
                                <option value="Garage">Garage</option>
                                <option value="Warehouse">Warehouse</option>
                                <option value="Land">Land</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Mortgage Property
                        Size</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
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
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Mortgage Property
                        Value</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img
                                    src="https://www.franchiseindia.com/images/range-rate.png"></span>
                            <input type="text" class="form-control" name="property_value"
                                placeholder="Enter Property Value (INR)">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Purpose Of Loan</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon height100"><img src="{{ url('images/addreess.png') }}"
                                    alt="address"></span>
                            <textarea class="form-control height100" id="details" name="details" placeholder="Enter Purpose Of Loan Detail"
                                maxlength="60"></textarea>
                        </div>
                    </div>
                </div>
                <div style="text-align: center;">
                    <input type="submit" class="btn btn-default" value="Submit" />
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
            $("#loanForm").validate({
                rules: {
                    income_range: {
                        required: true
                    },
                    loan_range: {
                        required: true
                    },
                    property_size: {
                        required: true
                    },
                    industry_type: {
                        required: true
                    },
                    property_type: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    end_usage: {
                        required: true,
                        minlength: 3,
                        maxlength: 500
                    },
                    property_value: {
                        required: true,
                        minlength: 3,
                        maxlength: 50,
                        number: true
                    },
                    pincode: {
                        required: true,
                        minlength: 1,
                        maxlength: 20,
                        number: true
                    },
                    loan_amount: {
                        required: true
                    },
                    company_name: {
                        minlength: 1,
                        maxlength: 255
                    },
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
                    amount: {
                        required: true,
                        accept: "[0-9]",
                        maxlength: 15,
                        number: true
                    },
                    address: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    }
                },
                messages: {
                    loan_range: {
                        required: ""
                    },
                    income_range: {
                        required: ""
                    },
                    property_size: {
                        required: ""
                    },
                    industry_type: {
                        required: ""
                    },
                    property_type: {
                        required: ""
                    },
                    city: {
                        required: ""
                    },
                    end_usage: {
                        required: "",
                        minlength: jQuery.format(""),
                        maxlength: jQuery.format("")
                    },
                    property_value: {
                        required: "",
                        minlength: jQuery.format(""),
                        maxlength: jQuery.format(""),
                        number: "Enter Numeric Value"
                    },
                    pincode: {
                        required: "",
                        minlength: jQuery.format(""),
                        maxlength: jQuery.format(""),
                        number: "Enter Numeric Value"
                    },
                    loan_amount: {
                        required: ""
                    },
                    company_name: {
                        minlength: jQuery.format(""),
                        maxlength: jQuery.format("")
                    },
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
                    amount: {
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
            });
        });
    </script>
@endsection
