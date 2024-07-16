@extends('layout.master')
@section('pp')
    class="selected"
@endsection
@section('content')
    <div class="container row-no-padding">
        <div class="container myaccount">
            <div class="row row-no-margin">
                <!-- MY ACCOUNT  LEFT sTART -->
                @include('includes.myfranchiseleft')
                <!-- MY ACCOUNT  LEFT END -->
                <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
                    <h1 class="myhead marleft">Payment Plans</h1>
                    <div class="bor-radius backwhite marleft">
                        <form class="form-horizontal"
                            action="{{ Config('constants.MainDomain') }}/franchisor/myaccount/upgrade-account" method="post"
                            enctype="multipart/form-data">
                            <div class="col-xs-12 col-sm-12 col-md-12 pad30 showbg">
                                @if ($errors->any())
                                    <h4>{{ $errors->first() }}</h4>
                                @endif
                                @if (Session::has('failed'))
                                    <div class="alert alert-info">{{ Session::get('failed') }}</div>
                                @endif
                                <div class="pricesection fraprice">
                                    <!--2 Silver Plan start -->
                                    <div class="col-xs-12 col-sm-3 col-md-3 bor-radius row-no-padding boxheight boxwidth"
                                        style="display:none;">
                                        <label class="pad15b5"><input type="radio"
                                                @if (Auth::user()->membership_type != 1) checked @endif name="membership_plan"
                                                id="silverplanmain" value="2"
                                                @if (Auth::user()->membership_type == 1) @if (isset($franData)) @if ($franData->membership_plan == 2) checked @endif
                                                @endif @endif> Sub-Sub
                                            Category</label>
                                        <div class="priceshow"><span>Rs. <strong id="silverPlan">9999</strong></span>
                                            <div class="txtgst">+18% GST</div>
                                            <div class="">
                                                <select name="membership_plan_month" id="membership_plan_month_sub_sub"
                                                    onclick="getPlanTotal(this.id);" onchange="getPlanTotal(this.id);"
                                                    class="form-control width110">
                                                    <option value=113>1 Month</option>
                                                    <option value=114>3 Month</option>
                                                    <option value=122>6 Month</option>
                                                    <option value=115>12 Month</option>
                                                </select>
                                            </div>
                                        </div>
                                        <ul class="pad15">
                                            <li>Listing in the service/product category of the website</li>
                                            <li>Get notifications from investors</li>
                                            <li>Receive contact details of investors</li>
                                            <li>Logo Presence in the Service/Product category</li>
                                            <li>Third-highest Visibility</li>
                                            <li>Third-priority Response rate</li>
                                            <li>Basic display in the service/product category of the website</li>
                                        </ul>
                                    </div>
                                    <!--2 Silver Plan end-->
                                    <!--3 Gold plan Start -->
                                    <div class="col-xs-12 col-sm-3 col-md-3 bor-radius row-no-padding boxheight boxwidth">
                                        <label class="pad15b5"><input type="radio" name="membership_plan"
                                                id="goldplanmain" value="3"
                                                @if (Auth::user()->membership_type == 1) @if (isset($franData)) @if ($franData->membership_plan == 3) checked @endif
                                                @endif @endif> Sub
                                            Category</label>
                                        <!--<div class="priceshow"><span>Rs. <strong id="goldPlan">19999</strong></span>-->
                                        <div class="priceshow"><span>Rs. <strong id="goldPlan">143000</strong></span>
                                            <div class="txtgst">+18% GST</div>
                                            <div class="">
                                                <select name="membership_plan_month" id="membership_plan_month_sub"
                                                    onclick="getPlanTotal(this.id);" onchange="getPlanTotal(this.id);"
                                                    class="form-control width110">
                                                    <!--<option value=116>1 Month</option>
                                                        <option value=117>3 Month</option>-->
                                                    <option value=123>6 Month</option>
                                                    <option value=118>12 Month</option>
                                                </select>
                                            </div>
                                        </div>
                                        <ul class="pad15">
                                            <li>Listing in the sector category of the website</li>
                                            <li>Get notifications from investors</li>
                                            <li>Receive contact details of investors</li>
                                            <li>Logo Presence in the Sector and Service/Product categories</li>
                                            <li>Second-highest Visibility</li>
                                            <li>Second-priority Response rate</li>
                                            <li>Advanced display in the sector category of the website</li>
                                        </ul>
                                    </div>
                                    <!--3 Gold Plan end here -->
                                    <!--4 Platinum Plan start here-->
                                    <div class="col-xs-12 col-sm-3 col-md-3 bor-radius row-no-padding boxheight boxwidth">
                                        <label class="pad15b5"><input type="radio" name="membership_plan"
                                                id="platinumplanmain" value="4"
                                                @if (Auth::user()->membership_type == 1) @if (isset($franData)) @if ($franData->membership_plan == 4) checked @endif
                                                @endif @endif> Master
                                            Category</label>
                                        <!--<div class="priceshow"><span>Rs. <strong id="platinumPlan">39999</strong></span>-->
                                        <div class="priceshow"><span>Rs. <strong id="platinumPlan">143000</strong></span>
                                            <div class="txtgst">+18% GST</div>
                                            <div class="">
                                                <select name="membership_plan_month" id="membership_plan_month_master"
                                                    onclick="getPlanTotal(this.id);" onchange="getPlanTotal(this.id);"
                                                    class="form-control width110">
                                                    <!--<option value=119>1 Month</option>-->
                                                    <option value=120>3 Month</option>
                                                    <option value=124>6 Month</option>
                                                    <option value=121>12 Month</option>
                                                </select>
                                            </div>
                                        </div>
                                        <ul class="pad15">
                                            <li>Listing in the industry category of the website</li>
                                            <li>Get notifications from investors</li>
                                            <li>Receive contact details of investors</li>
                                            <li>Logo Presence in all categories</li>
                                            <li>Highest Visibility</li>
                                            <li>Top Priority Response rate</li>
                                            <li>Premium display in the industry category of the website</li>
                                        </ul>
                                    </div>
                                    <!--4 Platinum Plan end here-->
                                    <!--<input type="hidden" name="amount_to_pay" class="form-control" id="amount" value="113">-->
                                    <input type="hidden" name="amount_to_pay" class="form-control" id="amount"
                                        value="123">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 pad30 showbg">
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">GST NO.</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img alt="GST"
                                                    src="{{ url('images/commission.png') }}"></span>
                                            <input type="text" name="gst_no" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 pad30 showbg">
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Mode of Payment</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <select id="mopt" name="mopt" class="form-control myselectclass3">
                                            <option value="OPTCRDC">Mode Of Payment</option>
                                            <option value="OPTCRDC">Credit Card</option>
                                            <option value="OPTDBCRD">Debit Card</option>
                                            <option value="OPTEMI">EMI</option>
                                            <option value="OPTNBK">Net Banking</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="row colbg">
                                <div style="text-align: center;">
                                    <input type="submit" id="franchisorsubmit" class="btn btn-default"
                                        value="Update" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        let membershipPlanFranchisor = <?php echo json_encode(Config('constants.membershipPlanFranchisor')); ?>;

        $('#silverplanmain').click(function() {
            $("#amount").prop("value", $('#membership_plan_month_sub_sub').val());
            //$('#membership_plan_month_master').val(119);
            $('#membership_plan_month_master').val(120);
            $('#membership_plan_month_sub').val(116);
            document.getElementById("silverPlan").innerHTML = membershipPlanFranchisor[$(
                '#membership_plan_month_sub_sub').val()];
            document.getElementById("goldPlan").innerHTML = "19999";
            document.getElementById("platinumPlan").innerHTML = "39999";

        });

        $('#goldplanmain').click(function() {
            $("#amount").prop("value", $('#membership_plan_month_sub').val());
            //$('#membership_plan_month_master').val(119);
            $('#membership_plan_month_master').val(120);
            $('#membership_plan_month_sub_sub').val(113);
            document.getElementById("silverPlan").innerHTML = "9999";
            document.getElementById("goldPlan").innerHTML = membershipPlanFranchisor[$('#membership_plan_month_sub')
                .val()];
            //document.getElementById("platinumPlan").innerHTML = "39999";
            document.getElementById("platinumPlan").innerHTML = "143000";
        });

        $('#platinumplanmain').click(function() {
            $("#amount").prop("value", $('#membership_plan_month_master').val());
            //$('#membership_plan_month_sub').val(116);
            $('#membership_plan_month_sub').val(123);
            $('#membership_plan_month_sub_sub').val(113);
            document.getElementById("silverPlan").innerHTML = "9999";
            // document.getElementById("goldPlan").innerHTML = "19999";
            document.getElementById("goldPlan").innerHTML = "143000";
            document.getElementById("platinumPlan").innerHTML = membershipPlanFranchisor[$(
                '#membership_plan_month_master').val()];
        });

        function getPlanTotal(id) {

            $("#amount").prop("value", $('#' + id).val());
            if (id == "membership_plan_month_sub_sub") {
                $("#silverplanmain").prop("checked", true);
                document.getElementById("silverPlan").innerHTML = membershipPlanFranchisor[$('#' + id).val()];
                //document.getElementById("goldPlan").innerHTML = "19999";
                document.getElementById("goldPlan").innerHTML = "143000";
                //document.getElementById("platinumPlan").innerHTML = "39999";
                document.getElementById("platinumPlan").innerHTML = "143000";
                //$('#membership_plan_month_sub').val(116);
                $('#membership_plan_month_sub').val(123);
                //$('#membership_plan_month_master').val(119);
                $('#membership_plan_month_master').val(120);
            }

            if (id == "membership_plan_month_sub") {
                $("#goldplanmain").prop("checked", true);
                document.getElementById("silverPlan").innerHTML = "9999";
                document.getElementById("goldPlan").innerHTML = membershipPlanFranchisor[$('#' + id).val()];
                // document.getElementById("platinumPlan").innerHTML = "39999";
                document.getElementById("platinumPlan").innerHTML = "143000";
                //$('#membership_plan_month_master').val(119);
                $('#membership_plan_month_master').val(120);
                //$('#membership_plan_month_sub_sub').val(113);
                $('#membership_plan_month_sub_sub').val(113);
            }
            if (id == "membership_plan_month_master") {
                $("#platinumplanmain").prop("checked", true);
                document.getElementById("silverPlan").innerHTML = "9999";
                //document.getElementById("goldPlan").innerHTML = "19999";
                document.getElementById("goldPlan").innerHTML = "143000";
                document.getElementById("platinumPlan").innerHTML = membershipPlanFranchisor[$('#' + id).val()];
                //$('#membership_plan_month_sub').val(116);
                $('#membership_plan_month_sub').val(123);
                $('#membership_plan_month_sub_sub').val(113);
            }
        }

        $(document).ready(function() {
            $(function() {
                $("#datepicker").datepicker({
                    minDate: 0,
                    dateFormat: 'yy-mm-dd',
                    maxDate: '1Y',
                    changeMonth: true,
                    changeYear: true,
                });

            });
        });
    </script>
@endsection
