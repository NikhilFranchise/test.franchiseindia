@extends('layout.master')
@section('content')
    <!--form start here -->
    <div class="container formsection margintop60 staicp">
        <div class="row">

            <!-- Brand detail section start here -->
            @if(!empty($Franresult))
                <div class="bgccc">

                    <div class="col-xs-12 col-sm-3 col-md-3 mdfy">
                        <div class="add1">
                            @if(!empty($Franresult->company_logo))
                                <img src="{{Config('constants.franAwsImgPath')}}{{$Franresult->company_logo}}?d=2" alt="company logo">
                            @endif
                            @if(empty($Franresult->company_logo))
                                <img src="https://www.franchiseindia.com/images/not-verified.jpg?d=2" alt="not verified">
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 mdfynew">
                        <div class="landpg">{{$Franresult->company_name}}</div>
                        <div class="business-infonoimg">
                            <ul>
                                <li>Area Req <div>@if(!empty($Franresult->prop_area_max)) {{$Franresult->prop_area_min}}-{{$Franresult->prop_area_max}} Sq. ft @endif
                                        @if(empty($Franresult->prop_area_max)) {{$Franresult->prop_area_min}}@endif</div></li>
                                <li>Investment Size <div>{{$Franresult->unit_investment}}</div></li>
                                <li>Franchise Outlets <div>{{$Franresult->no_fran_outlets}}</div></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 detailpag">
                    <div class="innhaed">Business Details</div>
                    {!! substr($Franresult->business_desc,0,200)  !!} <a href="https://www.franchiseindia.com/brands/{{$Franresult->profile_name}}.{{$Franresult->fran_detail_id}}" target="_blank" class="brdlink">Read More</a> </p>
                    <br><br>
                    </p>
                </div>
            @endif
            <div class="col-xs-12 col-sm-12 col-md-12"><h1> Contact Us</h1>
                <div style="display: none" id="contmsg"><center><font color="green"><b><h2>Thank you for contacting us. We will respond to you as soon as possible.</h2></b></font> </center></div>
                <p><strong> Please provide your details to help us serve you better</strong>
                    <br/><br/></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12  row-no-padding">
            <!---->
            <form class="form-horizontal" name="eventregfrm" id="eventregfrm" action="https://www.franchiseindia.com/advertisement/feedback_news.php" method="post">
                <input name="apply" type="hidden" value="{{$apply}}">
                <input name="source" type="hidden" value="{{request()->source}}">				
                <input name="_csrf" type="hidden" value="{{csrf_token()}}">
                @if($apply == "FIHL-Web-Launch")
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory ">Interested In</label>
                        <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                        <div class="col-xs-12 col-sm-7 col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{url('images/country.png')}}" alt="country"></span>
                                <select name="industry" id="industry">
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="UAE">UAE</option>
                                    <option value="All">All</option>
                                </select>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory ">Name</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{url('images/user.png')}}" alt="name"></span>
                            <input type="text" class="form-control" id="franSendName" name="franSendName" value="{{$Iname}}" maxlength="25">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Email ID
                    </label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{url('images/email.png')}}" alt="email"></span>
                            <input type="text" class="form-control" name="franSendEmail" id="franSendEmail" value="{{$Iemail}}">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Mobile Number</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{url('images/mobile.png')}}" alt="mobile"></span>
                            <input name="franSendPhone" type="text" id="franSendPhone" value="{{$Iphone}}" class="form-control" maxlength="10">
                        </div>
                    </div>
                </div>


                @if($apply == "TFW-Advertise")
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory ">Company Name</label>
                        <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                        <div class="col-xs-12 col-sm-7 col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{url('images/city.png')}}" alt="city"></span>
                                <input type="text" class="form-control" id="company_name" name="company_name" value="" maxlength="25">
                            </div>
                        </div>
                    </div>


                @endif



                @if($apply != "VermillionLoan" && $apply != "VermillionFranchise")
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory ">City</label>
                        <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                        <div class="col-xs-12 col-sm-7 col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{url('images/city.png')}}" alt="city"></span>
                                <input type="text" class="form-control" id="city" name="city" value="{{$Icity}}" maxlength="25">
                            </div>
                        </div>
                    </div>
                @endif
                @if($apply != "Neopolitan-Pizza" && $apply != "FIHL-Web-Launch" && $apply != "TFW-Advertise-Banner" && $apply != "TFW-Subscribe-Banner" && $apply != "TFW-FBCampaign")
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">

                            @if($apply == "TFW-Advertise")
                                Location of Head Office
                            @else
                                Address
                            @endif



                        </label>
                        <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                        <div class="col-xs-12 col-sm-7 col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon height100"><img src="{{url('images/pincode.png')}}" alt="pincode"></span>
                                <textarea class="form-control height100" name="franSendAdd" id="franSendAdd">{{$Iaddress}}</textarea>
                            </div>
                        </div>
                    </div>
                @endif
                @if($apply != "Neopolitan-Pizza" && $apply != "FI-DOTCOM-Advertise" && $apply != "FI-Verified" && $apply != "FIHL-Web-Launch" && $apply != "VermillionLoan"  && $apply != "VermillionFranchise" && $apply != "TFW-Advertise-Banner" && $apply != "TFW-Subscribe-Banner" && $apply != "TFW-FBCampaign")

                    @if($apply != "FIBL-Franchise-Guru" && $apply != "Congress-2017" && $apply != "Award-2017")
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Investment Range</label>
                            <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                            <div class="col-xs-12 col-sm-7 col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><img src="{{url('images/range-rate.png')}}" alt="range rate"></span>
                                    <input name="investment" type="text" id="investment" class="form-control" >
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">
                            @if($apply == "TFW-Advertise")
                                Designation
                            @else
                                Current Profession/Business
                            @endif
                        </label>
                        <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                        <div class="col-xs-12 col-sm-7 col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{url('images/user.png')}}" alt="user"></span>
                                <input name="business" type="text" id="business" class="form-control" >
                            </div>
                        </div>
                    </div>

                    @if($apply=="Luxury-Swim-Spa")

                        <div class="form-group">
                            <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Time frame to Start </label>
                            <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                            <div class="col-xs-12 col-sm-7 col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><img src="{{url('images/calendar.png')}}" alt="calender"></span>
                                    <input name="timeframe" type="text" id="timeframe" class="form-control" >
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Business Background </label>
                            <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                            <div class="col-xs-12 col-sm-7 col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><img src="{{url('images/pincode.png')}}" alt="pincode"></span>
                                    <input name="bbackground" type="text" id="bbackground" class="form-control" >
                                </div>
                            </div>
                        </div>
                    @elseif ($apply=="Endeavour-Careers")
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Property - Owned/Leased/rented</label>
                            <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                            <div class="col-xs-12 col-sm-7 col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><img src="{{url('images/propertyuse.png')}}" alt="property"></span>
                                    <input name="propertype" type="text" id="propertype" class="form-control">
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($apply != "Neopolitan-Pizza" && $apply != "Congress-2017" && $apply != "Award-2017")
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Details</label>
                            <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                            <div class="col-xs-12 col-sm-7 col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><img src="{{url('images/comment.png')}}" alt="comment"></span>
                                    <textarea name="franSendDet" cols="" rows="" id="franSendDet" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($apply == "Congress-2017" || $apply == "Award-2017")

                        <div class="form-group">
                            <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory ">Register for</label>
                            <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                            <div class="col-xs-12 col-sm-7 col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><img src="{{url('images/topic.png')}}" alt="topic"></span>
                                    <select name="franSendDet"  id="franSendDet">
                                        <option value="Estate Awards 2017">Estate Awards 2017</option>
                                        <option value="Indian Education Congress & Awards 2017">Indian Education Congress & Awards 2017</option>
                                        <option value="Small Business Awards 2017">Small Business Awards 2017</option>
                                        <option value="Indian Salon & Wellness Congress & Awards">Indian Salon & Wellness Congress & Awards</option>
                                        <option value="Indian Retail & eRetail Congress & Awards">Indian Retail & eRetail Congress & Awards</option>
                                        <option value="Last Mile Fulfilment 2017">Last Mile Fulfilment 2017</option>
                                        <option value="Entrepreneur India ">Entrepreneur India </option>
                                        <option value="Indian Restaurant Congress & Awards 2017">Indian Restaurant Congress & Awards 2017</option>
                                        <option value="Franchise India 2017">Franchise India 2017</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    @endif

                @endif
                <center>
                    <input name="regsubmit" type="submit" class="btn btn-default" id="contactbtn" value="Submit"/>
                </center>

            </form>
            <!---->
        </div>
    </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {

            var validator = $("#eventregfrm").validate({
                rules: {

                    franSendName: "required",
                    franSendEmail: {
                        required: true,
                        email: true
                    },
                    franSendPhone: {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 13
                    },
                    franSendAdd: "required",
                    City: "required",
                    franSendDet: "required"
                },

                messages: {
                    franSendName: "Please Enter Your Name",
                    franSendEmail: {
                        required: "Please Enter Valid Email Address",
                        remote: jQuery.format("{0} is already in use")
                    },
                    franSendPhone: {
                        required: "Please Enter Phone No",
                        number: "Please Enter Only Number",
                        minlength: jQuery.format("Please Enter at least {0} digit"),
                        maxlength: jQuery.format("Please Enter maximum of {0} digit")
                    },
                    franSendAdd: "Please Enter Your Address",
                    City: "Please Enter Your City Name",
                    franSendDet: "Please Enter Details"
                },
                // the errorPlacement has to take the table layout into account
                errorPlacement: function(error, element) {
                    error.appendTo( element.parent().parent() )
                }

            });
        });
    </script>
@endsection
