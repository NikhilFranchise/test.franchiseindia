@extends('layout.master')
@section('seoTitle', 'Join - franchiseindia.com')
@section('seoDesc', 'All set to become an entrepreneur? Register with Franchise India and become an A-list Investor to give your business a perfect launch pad.')
@section('content')
    <div class="container formsection margintop60 staicp">
        <h1 class="noneunder"> Investor Registration</h1>
    </div>
    <!--form start here -->
    <div class="container formsection investbyuser">
        <div class="row">
            <!--left form section start here -->
            <div class="col-xs-12 col-sm-9 bor-radius backwhite targleft row-no-padding">
                <form class="form-horizontal" method="post"
                      action="{{ Config('constants.MainDomain') }}/investor/plan-submit">
                    <div class="col-xs-12 pad30 showbg">
                        <div class="sidehead">Payment Plans <span class="showfaqdesk"><a href="#bottom" id="hulk">Frequently Asked Questions</a></span><span class="showfaqmob"><a href="#bottom" id="hulk">FAQ</a></span></div>
                        <!--price box start here -->
                        <div class="pricesection">
                            <!--1 Free plan-->
                        {{--<div class="col-xs-12 col-sm-3 col-md-3  bor-radius row-no-padding boxheightinvestor boxwidth active"id="401">--}}
                        {{--@if ( Auth::check())<div class="layerdisable"></div> @endif--}}
                        {{--<div class="padspc basic">--}}
                        {{--<input type="radio" id="test1" name="invPlan" value="401" @if ( !(Auth::check())) checked @endif @if ( Auth::check()) disabled @endif @if ( Auth::check() && Auth::user()->membership_plan == 401) checked @endif />--}}
                        {{--<label for="test1">Basic</label>--}}
                        {{--</div>--}}
                        {{--<div class="investhead"><span>Free</span> registration</div>--}}
                        {{--<div class="priceshownew">View and enquire about all brands</div>--}}
                        {{--</div>--}}
                        <!--1 Free plan end-->

                            <!--2 Copper Plan start -->
                        {{--<div class="col-xs-12 col-sm-3 col-md-3  bor-radius row-no-padding boxheightinvestor boxwidth orangeb" id="402">--}}
                        {{--@if ( Auth::check() && Auth::user()->membership_plan >= 402) <div class="layerdisable"></div> @endif--}}
                        {{--<div class="padspc orange">--}}
                        {{--<input type="radio" id="test2" name="invPlan" value="402" @if ( Auth::check() && Auth::user()->membership_plan == 402) checked @endif @if (Auth::check() && Auth::user()->membership_plan >= 402) disabled @endif />--}}
                        {{--<label for="test2">Copper</label>--}}
                        {{--</div>--}}
                        {{--<div class="investheadprice">--}}
                        {{--<i class="fa fa-inr" aria-hidden="true"></i> {{ number_format(Config('constants.invPlanAmount.402')) }}--}}
                        {{--<span>12 Months</span>--}}
                        {{--</div>--}}
                        {{--<div class="priceshownew">View and enquire about all brands</div>--}}
                        {{--<div class="priceshownew">View contact details of 5 brands</div>--}}
                        {{--<div class="priceshownew">Newsletter subscription</div>--}}
                        {{--<div class="priceshownew">A monthly recommendation of brands will be visible on your dashboard</div>--}}
                        {{--</div>--}}
                        <!--2 Copper Plan end-->

                            <!--3 Silver Plan-->
                       <div class="col-xs-12 col-sm-3 col-md-3  bor-radius row-no-padding boxheightinvestor boxwidth other silverb" >
                                @if ( Auth::check() && Auth::user()->membership_plan >= 403) <div class="layerdisable"></div> @endif
                                <div class="padspc silver">
                                    <input type="radio" id="test3" name="invPlan" value="403" @if ( !(Auth::check())) checked @endif @if ( Auth::check() && Auth::user()->membership_plan <= 403) checked @endif @if (Auth::check() && Auth::user()->membership_plan >= 403) disabled @endif />
                                    <label for="test3">Silver</label>
                                </div>
                                <div class="investheadprice">
                                    <i class="fa fa-inr" aria-hidden="true"></i>{{ number_format(Config('constants.invPlanAmount.403')) }}
                                <div class="txtgst">+18% GST</div>
                                <span>Validity : 3 Months (You will get the accessibility of 20 brands of your choice)</span>
                            </div>
                            <div class="priceshownew">Monthly recommendations of brands.</div>
                            <div class="priceshownew">Newsletter subscription</div>
                            <div class="priceshownew">A monthly recommendation of brands will be visible on your dashboard.</div>
                           <div class="priceshownew">1 month subscription of The franchising world.</div> 
</div>
                        </div> 
                            <!--3 Silver plan end-->

                            <!--4 Gold plan Start -->
                            <div class="col-xs-12 col-sm-3 col-md-3  bor-radius row-no-padding boxheightinvestor boxwidth other goldb" id="404">
                                @if ( Auth::check() && Auth::user()->membership_plan >= 404)
                                    <div class="layerdisable"></div> @endif
                                <div class="padspc gold">
                                    <input type="radio" id="test4" name="invPlan" value="404" @if ( Auth::check() && Auth::user()->membership_plan == 404) checked @endif @if (Auth::check() && Auth::user()->membership_plan >= 404) disabled @endif />
                                    <label for="test4">Gold</label>
                                </div>
                                <div class="investheadprice">
                                    <i class="fa fa-inr" aria-hidden="true"></i>{{ number_format(Config('constants.invPlanAmount.404')) }}
                                    <div class="txtgst">+18% GST</div>
                                    <span>Validity: 6 Months (you will get the accessibility of 50 brands of your choice)</span>
                                </div>
                                <div class="priceshownew">Monthly recommendations of brands.</div>
                                <div class="priceshownew">Newsletter subscription</div>
                                <div class="priceshownew">A monthly recommendation of brands will be visible on your dashboard</div>
                                <div class="priceshownew">6 months magazine subscription of The franchise world magazine</div>
</div>
                            </div>
                            <!--4  Gold plan end-->

                            <!--5 Platinum plan Start -->
                            <div class="col-xs-12 col-sm-3 col-md-3  bor-radius row-no-padding boxheightinvestor boxwidth other platinumb" id="405">
                                @if ( Auth::check() && Auth::user()->membership_plan == 405) <div class="layerdisable"></div> @endif
                                <div class="padspc platinumb">
                                    <input type="radio" id="test5" name="invPlan" value="405" @if ( Auth::check() && Auth::user()->membership_plan == 405) checked @endif @if (Auth::check() && Auth::user()->membership_plan == 405) disabled @endif />
                                    <label for="test5">Platinum</label>
                                </div>
                                <div class="investheadprice">
                                    <i class="fa fa-inr" aria-hidden="true"></i> {{ number_format(Config('constants.invPlanAmount.405')) }}
                                    <div class="txtgst">+18% GST</div>
                                    <span>12 Months</span>
                                </div>
                                <div class="priceshownew">Monthly recommendations of brands.</div>
                                <div class="priceshownew">View contact details of Unlimited  brands</div>
                                <div class="priceshownew">Newsletter subscription</div>
                                <div class="priceshownew">A monthly recommendation of brands will be visible on your dashboard</div>
                                <div class="priceshownew">12 months magazine subscription of The franchise world magazine</div>
</div>

                            </div>
                            <!--5 Platinum plan end-->


                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="form-group margintop40">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">GST NO.</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img alt="commission" src="{{url('images/commission.png')}}"></span>
                                            <input type="text" name="gst_no" class="form-control"  placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--price box end here -->
                        <div class="clearfix"></div>

                    </div>
                    <div class="clearfix"></div>
                    <div class="row colbg text-center">
                        <input type="submit" class="btn btn-default" id="submitButton" value="Submit" @if (Auth::check()) disabled @endif/>
                    </div>
                </form>
                <!---->
            </div>
            <!--left form section end here -->
        </div>
    </div>
    <!--form end here -->

    <!--faq start here -->
    <div class="container formsection investbyuser margspace" id="bottom">
        <div class="row">
            <!--left form section start here -->
            <div class="col-xs-12 col-sm-9 bor-radius backwhite targleft row-no-padding">
                <div class="row paddsptb30">
                    <div class="col-xs-12">
                        <div class="sidehead">Frequently Asked Questions</div>
                    </div>
                </div>
                <div class="row paddsp30">
                    <div class="col-sm-3">
                        <div class="demo-show">
                            <h5><a href="#faq-1" class="">What is a Franchise?</a></h5>
                            <div id="faq-1" class="" style="display: none;">
                                <p>
                                    An authorization granted by a company to another individual or group allowing them to
                                    carry out specified commercial activities, for example acting as an agent for a
                                    company's products.
                                </p>
                            </div>
                        </div>
                        <div class="demo-show">
                            <h5><a href="#faq-2">Who is an Investor?</a></h5>
                            <div id="faq-2">
                                <p>
                                    An individual or an organization willing to put money in another company or brand in
                                    order to garner profits.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="demo-show">
                            <h5><a href="#faq-3">Who is a Franchisor?</a></h5>
                            <div id="faq-3">
                                <p>
                                    The company that allows an individual (known as the franchisee) to run a location of
                                    their business. The franchisor owns the overarching company, trademarks, and
                                    products, but gives the right to the franchisee to run
                                    the franchise location, in return for an agreed-upon fee.
                                </p>
                            </div>
                        </div>
                        <div class="demo-show">
                            <h5><a href="#faq-4">Who is a Trade Partner?</a></h5>
                            <div id="faq-4">
                                <p>
                                    An agreement drawn up by two parties that have agreed to trade certain products,
                                    services or information to each other.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="demo-show">
                            <h5><a href="#faq-3">Who is a Franchisor?</a></h5>
                            <div id="faq-3">
                                <p>
                                    The company that allows an individual (known as the franchisee) to run a location of
                                    their business. The franchisor owns the overarching company, trademarks, and
                                    products, but gives the right to the franchisee to run
                                    the franchise location, in return for an agreed-upon fee.
                                </p>
                            </div>
                        </div>
                        <div class="demo-show">
                            <h5><a href="#faq-4">Who is a Trade Partner?</a></h5>
                            <div id="faq-4">
                                <p>
                                    An agreement drawn up by two parties that have agreed to trade certain products,
                                    services or information to each other.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="demo-show">
                            <h5><a href="#faq-7">What is a domestic property?</a></h5>
                            <div id="faq-7">
                                <p>A property which is situated in a residential area.</p>
                            </div>
                        </div>
                        <div class="demo-show">
                            <h5><a href="#faq-8">What is a commercial property?</a></h5>
                            <div id="faq-8">
                                <p>A property which is situated inside or within the premises of a commercial area.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#test1').click(function () {
            $('#401').addClass('active');
            $('#402').removeClass('active');
            $('#403').removeClass('active');
            $('#404').removeClass('active');
            $('#405').removeClass('active');
            $('#submitButton').prop('disabled', false);
        });
        $('#test2').click(function () {
            $('#401').removeClass('active');
            $('#402').addClass('active');
            $('#403').removeClass('active');
            $('#404').removeClass('active');
            $('#405').removeClass('active');
            $('#submitButton').prop('disabled', false);
        });
        $('#test3').click(function () {
            $('#401').removeClass('active');
            $('#402').removeClass('active');
            $('#403').addClass('active');
            $('#404').removeClass('active');
            $('#405').removeClass('active');
            $('#submitButton').prop('disabled', false);
        });
        $('#test4').click(function () {
            $('#401').removeClass('active');
            $('#402').removeClass('active');
            $('#403').removeClass('active');
            $('#404').addClass('active');
            $('#405').removeClass('active');
            $('#submitButton').prop('disabled', false);
        });
        $('#test5').click(function () {
            $('#401').removeClass('active');
            $('#402').removeClass('active');
            $('#403').removeClass('active');
            $('#404').removeClass('active');
            $('#405').addClass('active');
            $('#submitButton').prop('disabled', false);
        });

        $('#401').click(function () {
            if ($("input[name='invPlan'][value='401']").prop('disabled') == false) {
                $("input[name='invPlan'][value='401']").prop('checked', true);
                $('#401').addClass('active');
                $('#402').removeClass('active');
                $('#403').removeClass('active');
                $('#404').removeClass('active');
                $('#405').removeClass('active');
                $('#submitButton').prop('disabled', false);
            }
        });
        $('#402').click(function () {
            if ($("input[name='invPlan'][value='402']").prop('disabled') == false) {
                $("input[name='invPlan'][value='402']").prop('checked', true);
                $('#401').removeClass('active');
                $('#402').addClass('active');
                $('#403').removeClass('active');
                $('#404').removeClass('active');
                $('#405').removeClass('active');
                $('#submitButton').prop('disabled', false);
            }
        });
        $('#403').click(function () {
            if ($("input[name='invPlan'][value='403']").prop('disabled') == false) {
                $("input[name='invPlan'][value='403']").prop('checked', true);
                $('#401').removeClass('active');
                $('#402').removeClass('active');
                $('#403').addClass('active');
                $('#404').removeClass('active');
                $('#405').removeClass('active');
                $('#submitButton').prop('disabled', false);
            }
        });
        $('#404').click(function () {
            if ($("input[name='invPlan'][value='404']").prop('disabled') == false) {
                $("input[name='invPlan'][value='404']").prop('checked', true);
                $('#401').removeClass('active');
                $('#402').removeClass('active');
                $('#403').removeClass('active');
                $('#404').addClass('active');
                $('#405').removeClass('active');
                $('#submitButton').prop('disabled', false);
            }
        });
        $('#405').click(function () {
            if ($("input[name='invPlan'][value='405']").prop('disabled') == false) {
                $("input[name='invPlan'][value='405']").prop('checked', true);
                $('#401').removeClass('active');
                $('#402').removeClass('active');
                $('#403').removeClass('active');
                $('#404').removeClass('active');
                $('#405').addClass('active');
                $('#submitButton').prop('disabled', false);
            }
        });

        $('input[name=invPlan]').on('click', function () {
            $('#submitButton').prop('disabled', false);
        });

    </script>
@endsection