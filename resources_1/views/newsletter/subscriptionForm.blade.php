@extends('layout.master')
@section('content')
    <div class="container formsection margintop60 staicp">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12"><h1>Please help us know you better</h1>
                <p class="simtxt">
                    <span class="subhead"> It will take you less than a minute.</span>
                    Thank You for signing up for our newsletter. Gear up to get the latest update from the industry and access to great opportunities.<br/><br/>Your privacy is important to us. Franchiseindia.com will never rent or sell your personal information to third parties. Read our privacy policy for more information.<br/><br/>
                </p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
            <form class="form-horizontal" id="subscriptionForm" action="{{ url('subscribenews') }}" method="post">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{ csrf_field() }}
                <input type="hidden" name="site_type" value="{{ $data[0] }}">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Name</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{url('images/user.png')}}" alt="user"></span>
                            <input type="text" class="form-control" id="" placeholder="Enter Your Name" name="name" maxlength="30">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Email
                    </label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{url('images/email.png')}}" alt="email"></span>
                            <input type="text" class="form-control" value="{{ $data[1] }}" name="email" placeholder="Enter Secondary Email">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Mobile</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{url('images/mobile.png')}}" alt="mobile"></span>
                            <input type="text" class="form-control" id="" name="mobile" placeholder="Enter Mobile" maxlength="10">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="wantTo" class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">
                        I want to </label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{url('images/iwanto.png')}}" alt="iwanto"></span>
                            <select name="wantTo" id="wantTo" class="form-control myselectclass">
                                <option value>--Select --</option>
                                <option value="Advertise with www.franchiseindia.com">Advertise with www.franchiseindia.com</option>
                                <option value="Advertise in Magazine">Advertise in Magazine</option>
                                <option value="Exhibit in Shows">Exhibit in Shows</option>
                                <option value="Expand my Company through Franchising">Expand my Company through Franchising</option>
                                <option value="Buy a Franchise (Business)">Buy a Franchise (Business)</option>
                                <option value="Sell my Existing Business">Sell my Existing Business</option>
                                <option value="Subscribe to the Magazine">Subscribe to the Magazine</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">
                        I am
                    </label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                        <div class="row checkmargin">
                            <div class="col-sm-12 row-no-padding">
                                <label class="col-sm-6 col-md-6">
                                    <input id="inlineCheckbox1" name="about[]" value="I want to start a business" type="checkbox">Looking to start a business
                                </label>
                                <label class="col-sm-6 col-md-6">
                                    <input id="inlineCheckbox2" name="about[]" value="I am franchisor" type="checkbox"> A franchisor
                                </label>
                                <label class="col-sm-6 col-md-6">
                                    <input id="inlineCheckbox3" name="about[]" value="I want to grow my business" type="checkbox"> Looking to grow my business
                                </label>
                                <label class="col-sm-6 col-md-6">
                                    <input id="inlineCheckbox2" name="about[]" value="I want to sell my business" type="checkbox"> Looking to sell my business
                                </label>
                                <label class="col-sm-6 col-md-6">
                                    <input id="inlineCheckbox3" name="about[]" value="I am a retailer" type="checkbox"> A retailer
                                </label>
                                <label class="col-sm-6 col-md-6">
                                    <input id="inlineCheckbox3" name="about[]" value="I am an Entrepreneur" type="checkbox"> An Entrepreneur
                                </label>
                                <label class="col-sm-6 col-md-6">
                                    <input id="inlineCheckbox3" name="about[]" value="I am professional" type="checkbox"> A professional
                                </label>
                                <label class="col-sm-6 col-md-6">
                                    <input id="inlineCheckbox3" name="about[]" value="Others" type="checkbox"> Others
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">
                        I want (Select topics for your newsletter)
                    </label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                        <div class="row checkmargin">
                            <div class="col-sm-12 row-no-padding">
                                <label class="col-sm-6 col-md-6">
                                    <input id="inlineCheckbox1" name="info" value='1' type="checkbox" checked> All the information (I am true entrepreneur)
                                </label>
                                <label class="col-sm-6 col-md-6">
                                    <input id="inlineCheckbox2" name="franoppo" value='1' type="checkbox" checked> Business & Franchise opportunities
                                </label>
                                <label class="col-sm-6 col-md-6">
                                    <input id="inlineCheckbox3" name="news" value='1' type="checkbox" checked> Business News & Trends
                                </label>
                                <label class="col-sm-6 col-md-6">
                                    <input id="inlineCheckbox2" name="events" value='1' type="checkbox" checked> Events and Seminars
                                </label>
                                <label class="col-sm-6 col-md-6">
                                    <input id="inlineCheckbox3" name="services" value='1' type="checkbox" checked> Business Services
                                </label>
                                <label class="col-sm-6 col-md-6">
                                    <input id="inlineCheckbox3" name="articles" value='1' type="checkbox" checked> Articles & Research
                                </label>
                                <label class="col-sm-6 col-md-6">
                                    <input id="inlineCheckbox3" name="newsletter" value='1' type="checkbox" checked> Newsletter
                                </label>
                                <label class="col-sm-6 col-md-6">
                                    <input id="inlineCheckbox3" name="other" value='1' type="checkbox" checked> Others
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="industry" class="col-xs-12 col-md-4 col-sm-4 com4mod control-label mandatory">Industry Type</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon height100"><img src="{{url('images/industrytype.png')}}" alt="industry type"></span>
                            <select name="industry[]" class="form-control height100" id="industry" multiple="multiple">
                                <option value="Automotive">Automotive</option>
                                <option value="Beauty &amp; Health">Beauty &amp; Health</option>
                                <option value="Business Services">Business Services</option>
                                <option value="Dealers &amp; Distributors">Dealers &amp; Distributors</option>
                                <option value="Education">Education</option>
                                <option value="Fashion">Fashion</option>
                                <option value="Food and Beverage">Food and Beverage</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Address</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon height100"><img src="{{url('images/addreess.png')}}" alt="address"></span>
                            <textarea class="form-control height100" placeholder="Enter Your Addreess" name="address" maxlength="255"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Pincode</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{url('images/pincode.png')}}" alt="pincode"></span>
                            <input class="form-control" name="pincode" placeholder="Enter Pincode" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">State</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{url('images/state.png')}}" alt="state"></span>
                            <input class="form-control" name="state" placeholder="Enter state" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="country" class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Country</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{url('images/country.png')}}" alt="country"></span>
                            <select name="country" id="country" class="form-control myselectclass">
                                <option value="">Select Country </option>
                                @foreach(Config('location.countryName') as $index => $value)
                                    <option value="{{ $index }}" @if($index==99) selected @endif>{{ $value }}</option>
                                @endforeach
                                @endphp
                            </select>
                        </div>
                    </div>
                </div>
                <div style="text-align:center">
                    <input type="submit" class="btn btn-default frmbtntop" value="Submit"/>
                </div>
            </form>
        </div>
    </div>
    <div class="height40"></div>
    <script type="text/javascript">$(document).ready(function(){$('input[title!=""]').hint();$('textarea[title!=""]').hint();$('select[title!=""]').hint();$("#subscriptionForm").validate({rules:{name:{required:true,accept:"[a-zA-Zs]+",minlength:3,maxlength:35},email:{required:true,email:true},mobile:{required:true,accept:"[0-9]",minlength:10,maxlength:10,number:true},address:"required",country:"required",state:"required",pincode:{required:true,accept:"[0-9]",minlength:6,maxlength:6,number:true},wantTo:"required","industry[]":"required"},messages:{name:{required:"",accept:"",minlength:jQuery.format(""),maxlength:jQuery.format("")},email:{required:"",email:""},mobile:{required:"",accept:"",minlength:jQuery.format(""),maxlength:jQuery.format(""),number:""},address:"",state:"",pincode:{required:"",accept:"",number:""},wantTo:"","industry[]":"",country:""}})});</script>
@endsection