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
                <form class="form-horizontal" method="post" action="{{URL('investor/inv-plan')}}">
                    <input type="hidden" name="investorId" value="{{$investorId}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="col-xs-12 pad30 showbg">
                        <div class="sidehead">Payment Plans <span class="showfaqdesk"><a href="#bottom" id="hulk">Frequently Asked Questions</a></span><span class="showfaqmob"><a href="#bottom" id="hulk">FAQ</a></span></div>
                        <!--price box start here -->
                        <div class="pricesection">
                            <!--1-->
                            <div class="col-xs-12 col-sm-3 col-md-3  bor-radius row-no-padding boxheightinvestor boxwidth active" id="401">
                                <div class="padspc basic">
                                    <input type="radio" id="test1" name="invPlan" value="401" checked="checked"/>
                                    <label for="test1">Basic</label>
                                </div>
                                <div class="investhead"><span>Free</span> registration </div>
                                <div class="priceshownew">View and enquire about all brands</div>
                            </div>
                            <!-- silver plan -->
                            <div class="col-xs-12 col-sm-3 col-md-3 bor-radius row-no-padding boxheightinvestor boxwidth silver" id="403">
                                <div class="padspc silver">
                                    <input type="radio" id="test3" name="invPlan" value="403"/>
                                    <label for="test3">Silver</label>
                                </div>
                                <div class="investheadprice">
                                    <i class="fa fa-inr" aria-hidden="true"></i>{{ number_format(Config('constants.invPlanAmount.403')) }}
                                    <div class="txtgst">+18% GST</div>
                                    <span>3 Months</span>
                                </div>
                                <div class="priceshownew">View and enquire about all brands</div>
                                <div class="priceshownew">View contact details of 20 brands</div>
                                <div class="priceshownew">Newsletter subscription</div>
                                <div class="priceshownew"> A monthly recommendation of brands will be visible on your dashboard </div>
                                <div class="priceshownew">1 month subscription of The franchising world.</div>
                            </div>
                            <!--4-->

                            <!--4 Gold plan Start -->
                            <div class="col-xs-12 col-sm-3 col-md-3 bor-radius row-no-padding boxheightinvestor boxwidth goldb" id="404">
                                <div class="padspc gold">
                                    <input type="radio" id="test4" name="invPlan" value="404"/>
                                    <label for="test4">Gold</label>
                                </div>
                                <div class="investheadprice">
                                    <i class="fa fa-inr" aria-hidden="true"></i>{{ number_format(Config('constants.invPlanAmount.404')) }}
                                    <div class="txtgst">+18% GST</div>
                                    <span>6 Months</span>
                                </div>
                                <div class="priceshownew">View and enquire about all brands</div>
                                <div class="priceshownew">View contact details of 50 brands</div>
                                <div class="priceshownew">Newsletter subscription</div>
                                <div class="priceshownew"> A monthly recommendation of brands will be visible on your dashboard </div>
                                <div class="priceshownew">6 months subscription of Entrepreneur Magazine</div>
                            </div>
                            <!--4-->

                            <!--4 Platinum plan Start -->
                            <div class="col-xs-12 col-sm-3 col-md-3  bor-radius row-no-padding boxheightinvestor boxwidth platinumb" id="405">
                                <div class="padspc platinumb">
                                    <input type="radio" id="test5" name="invPlan" value="405"/>
                                    <label for="test5">Platinum</label>
                                </div>
                                <div class="investheadprice">
                                    <i class="fa fa-inr" aria-hidden="true"></i> {{ number_format(Config('constants.invPlanAmount.405')) }}
                                    <div class="txtgst">+18% GST</div>
                                    <span>12 Months</span>
                                </div>
                                <div class="priceshownew">View and enquire about all brands</div>
                                <div class="priceshownew">View contact details of unlimited  brands</div>
                                <div class="priceshownew">Newsletter subscription</div>
                                <div class="priceshownew">A monthly recommendation of brands will be visible on your dashboard</div>
                                <div class="priceshownew">12 months subscription of Entrepreneur magazine</div>
                                <div class="priceshownew">1 book Title: Take Charge (Bestselling book on franchising)</div>
                            </div>
                            <!--4-->

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

                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="form-group margintop40">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Payment Mode.</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <select name="mop" id="mop" class="form-control">
                                                <option value="OPTCRDC">Mode Of Payment</option>
                                                <option value="OPTCRDC">Credit Card</option>
                                                <option value="OPTDBCRD">Debit Card</option>
                                                <option value="OPTEMI">EMI</option>
                                                <option value="OPTNBK">Net Banking</option>
                                            </select>
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
                        <input type="submit" class="btn btn-default" value="Submit"/>
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
                            <div id="faq-1" style="display: none;">
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
        $("#test1").click(function () {
            $("#401").addClass('active');
            $("#402").removeClass('active');
            $("#403").removeClass('active');
            $("#404").removeClass('active');
            $("#405").removeClass('active');
        });
        $("#test2").click(function () {
            $("#401").removeClass('active');
            $("#402").addClass('active');
            $("#403").removeClass('active');
            $("#404").removeClass('active');
            $("#405").removeClass('active');
        });
        $("#test3").click(function () {
            $("#401").removeClass('active');
            $("#402").removeClass('active');
            $("#403").addClass('active');
            $("#404").removeClass('active');
            $("#405").removeClass('active');
        });
        $("#test4").click(function () {
            $("#401").removeClass('active');
            $("#402").removeClass('active');
            $("#403").removeClass('active');
            $("#404").addClass('active');
            $("#405").removeClass('active');
        });
        $("#test5").click(function () {
            $("#401").removeClass('active');
            $("#402").removeClass('active');
            $("#403").removeClass('active');
            $("#404").removeClass('active');
            $("#405").addClass('active');
        });

        $("#401").click(function () {
            $("input[name='invPlan'][value='401']").prop('checked', true);
            $("#401").addClass('active');
            $("#402").removeClass('active');
            $("#403").removeClass('active');
            $("#404").removeClass('active');
            $("#405").removeClass('active');
        });
        $("#402").click(function () {
            $("input[name='invPlan'][value='402']").prop('checked', true);
            $("#401").removeClass('active');
            $("#402").addClass('active');
            $("#403").removeClass('active');
            $("#404").removeClass('active');
            $("#405").removeClass('active');
        });
        $("#403").click(function () {
            $("input[name='invPlan'][value='403']").prop('checked', true);
            $("#401").removeClass('active');
            $("#402").removeClass('active');
            $("#403").addClass('active');
            $("#404").removeClass('active');
            $("#405").removeClass('active');
        });
        $("#404").click(function () {
            $("input[name='invPlan'][value='404']").prop('checked', true);
            $("#401").removeClass('active');
            $("#402").removeClass('active');
            $("#403").removeClass('active');
            $("#404").addClass('active');
            $("#405").removeClass('active')
        });
        $("#405").click(function () {
            $("input[name='invPlan'][value='405']").prop('checked', true);
            $("#401").removeClass('active');
            $("#402").removeClass('active');
            $("#403").removeClass('active');
            $("#404").removeClass('active');
            $("#405").addClass('active');
        });
    </script>
    @include('includes.banners-new.facebook-pixel')
@endsection
