@extends('layout.master')
@section('content')
    <!--form start here -->
    <div class="container formsection margintop60 staicp">
        <div class="row">

            @if(!empty($Franresult))
                <div class="bgccc">

                    <div class="col-xs-12 col-sm-3 col-md-3 mdfy">
                        <div class="add1">
                            @if(!empty($Franresult->company_logo))
                                <img src="{{Config::get('constants.franAwsImgPath')}}{{$Franresult->company_logo}}?d=2" alt="company logo">
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
                <p><strong> Please provide your details to help us serve you better</strong></p>
                <br/><br/>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12  row-no-padding">
            <!---->
            <form class="form-horizontal" name="eventregfrm" id="eventregfrm" action="https://www.franchiseindia.com/advertisement/feedback_news.php" method="post">
                <input name="apply" type="hidden" value="SmartSchool-Junior">
                <input name="_csrf" type="hidden" value="{{csrf_token()}}">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory ">Name</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{URL::asset('images/user.png')}}" alt="user"></span>
                            <input type="text" class="form-control" id="franSendName" name="franSendName" value="" maxlength="25" placeholder="enter name">
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
                            <input type="text" class="form-control" name="franSendEmail" id="franSendEmail" value="" placeholder="enter email">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Phone</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{URL::asset('images/mobile.png')}}" alt="mobile"></span>
                            <input name="franSendPhone" type="text" id="franSendPhone" value="" class="form-control" maxlength="10" placeholder="enter phone">
                        </div>
                    </div>
                </div>

                <div style="text-align: center;">
                    <input name="regsubmit" type="submit" class="btn btn-default" id="contactbtn" value="Submit"/>
                </div>

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
                },
                // the errorPlacement has to take the table layout into account
                errorPlacement: function(error, element) {
                    error.appendTo( element.parent().parent() )
                }

            });
        });
    </script>
@endsection
