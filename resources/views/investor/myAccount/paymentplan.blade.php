@extends('layout.master')
@section('pp')
    class="selected"
@endsection
@section('content')
    <div class="container myaccount">
        <div class="row row-no-margin">
            <!-- MY ACCOUNT  LEFT sTART -->
            @include('includes.myinvestorleft')
            <!-- MY ACCOUNT  LEFT END -->


            <div class="col-xs-12 col-sm-10 col-md-10 formsection investbyuser myaccright ">
                <h1 class="myhead marleft">Payment Plan</h1>
                <div class="bor-radius backwhite marleft">
                    <form action="{{ Config::get('constants.MainDomain') }}/investor/makepayment" method="post">
                        @csrf
                        <div class="col-xs-12 pad30 showbg">
                            @if ($errors->any())
                                <h4>{{ $errors->first() }}</h4>
                            @endif
                            @if (Session::has('Success'))
                                <div class="alert alert-info">{{ Session::get('Success') }}</div>
                            @endif
                            @if (Session::has('failed'))
                                <div class="alert alert-info">{{ Session::get('failed') }}</div>
                            @endif

                            <div class="pricesection">
                                <!--3 Silver Plan-->
                                <div class="col-xs-12 col-sm-3 col-md-3  bor-radius row-no-padding boxheightinvestor boxwidth silverb"
                                    id="403">
                                    @if (Auth::user()->membership_plan >= 403)
                                        <div class="layerdisable"></div>
                                    @endif
                                    <div class="padspc silver">
                                        <input type="radio" id="test3" name="payment_plan" value="403"
                                            @if (Auth::user()->membership_plan > 402) disabled @endif
                                            @if (Auth::user()->membership_plan < 404) checked @endif />
                                        <label for="test3">Silver</label>
                                    </div>
                                    <div class="investheadprice">
                                        <i class="fa fa-inr" aria-hidden="true"></i>
                                        {{ number_format(Config('constants.invPlanAmount.403')) }}
                                        <div class="txtgst">+18% GST</div>
                                        <span>3 Months</span>

                                    </div>
                                    <div class="priceshownew">View and enquire about all brands</div>
                                    <div class="priceshownew">View contact details of 20 brands</div>
                                    <div class="priceshownew">Newsletter subscription</div>
                                    <div class="priceshownew">A monthly recommendation of brands will be visible on your
                                        dashboard</div>
                                    <div class="priceshownew">1 month subscription of The franchising world.</div>
                                </div>
                                <!--3-->

                                <!--4 Gold plan Start -->
                                <div class="col-xs-12 col-sm-3 col-md-3  bor-radius row-no-padding boxheightinvestor boxwidth goldb"
                                    id="404">
                                    @if (Auth::user()->membership_plan >= 404)
                                        <div class="layerdisable"></div>
                                    @endif
                                    <div class="padspc gold">
                                        <input type="radio" id="test4" name="payment_plan" value="404"
                                            @if (Auth::user()->membership_plan > 403) disabled @endif
                                            @if (Auth::user()->membership_plan == 404) checked @endif />
                                        <label for="test4">Gold</label>
                                    </div>
                                    <div class="investheadprice">
                                        <i class="fa fa-inr" aria-hidden="true"></i>
                                        {{ number_format(Config('constants.invPlanAmount.404')) }}
                                        <div class="txtgst">+18% GST</div>
                                        <span>6 Months</span>
                                    </div>
                                    <div class="priceshownew">View and enquire about all brands</div>
                                    <div class="priceshownew">View contact details of 50 brands</div>
                                    <div class="priceshownew">Newsletter subscription</div>
                                    <div class="priceshownew"> A monthly recommendation of brands will be visible on your
                                        dashboard </div>
                                    <div class="priceshownew">6 months subscription of The franchising world.</div>
                                </div>
                                <!--4-->

                                <!--4 Platinum plan Start -->
                                <div class="col-xs-12 col-sm-3 col-md-3  bor-radius row-no-padding boxheightinvestor boxwidth platinumb"
                                    id="405">
                                    @if (Auth::user()->membership_plan >= 405)
                                        <div class="layerdisable"></div>
                                    @endif
                                    <div class="padspc platinumb">
                                        <input type="radio" id="test5" name="payment_plan" value="405"
                                            @if (Auth::user()->membership_plan > 404) disabled @endif
                                            @if (Auth::user()->membership_plan == 405) checked @endif />
                                        <label for="test5">Platinum</label>
                                    </div>
                                    <div class="investheadprice">
                                        <i class="fa fa-inr" aria-hidden="true"></i>
                                        {{ number_format(Config('constants.invPlanAmount.405')) }}
                                        <div class="txtgst">+18% GST</div>
                                        <span>12 Months</span>
                                    </div>

                                    <div class="priceshownew">View and enquire about all brands</div>
                                    <div class="priceshownew">View contact details of unlimited brands</div>
                                    <div class="priceshownew">Newsletter subscription</div>
                                    <div class="priceshownew">A monthly recommendation of brands will be visible on your
                                        dashboard</div>
                                    <!--<div class="priceshownew">1 book Title: Take Charge (Bestselling book on franchising)</div>-->
                                    <div class="priceshownew">12 months subscription of The franchising world.</div>
                                </div>
                                <!--4-->

                            </div>
                        </div>
                        <div class="col-xs-12 pad30 showbg">
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">GST NO.</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{ url('images/commission.png') }}"
                                                alt="commission"></span>
                                        <input type="text" name="gst_no" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>

                        </div>


                        

                        <div class="col-xs-12 pad30 showbg"> 
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group margintop40">
                                        <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Coupon Code</label>
                                        <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                        <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img alt="promocode" src="{{url('images/promo.jpg')}}" style="height:20px"></span>
                                                <input type="text" name="coupon" id="couponCode" class="form-control"  placeholder="Enter Coupon code">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 pad30 showbg"> 
                                <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group margintop40">
                                        <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Amount To Be Paid</label>
                                        <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                        <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img alt="indianrupee" src="{{url('images/inr.jpg')}}" style="height: 20px"></span>
                                                <input type="text" name="amt" id="amt" class="form-control" placeholder="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 pad30 showbg"> 
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Mode Of Payment.</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
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
                        <div class="clearfix"></div>
                        <div class="row colbg text-center">
                            <input type="submit" id="submitButton" class="btn btn-default" value="Upgrade" disabled />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        $('#test2').click(function() {
            $('#401').removeClass('active');
            $('#402').addClass('active');
            $('#403').removeClass('active');
            $('#404').removeClass('active');
            $('#405').removeClass('active');
            $('#submitButton').prop('disabled', false);
        });
        $('#test3').click(function() {
            $('#401').removeClass('active');
            $('#402').removeClass('active');
            $('#403').addClass('active');
            $('#404').removeClass('active');
            $('#405').removeClass('active');
            $('#submitButton').prop('disabled', false);
        });
        $('#test4').click(function() {
            $('#401').removeClass('active');
            $('#402').removeClass('active');
            $('#403').removeClass('active');
            $('#404').addClass('active');
            $('#405').removeClass('active');
            $('#submitButton').prop('disabled', false);
        });
        $('#test5').click(function() {
            $('#401').removeClass('active');
            $('#402').removeClass('active');
            $('#403').removeClass('active');
            $('#404').removeClass('active');
            $('#405').addClass('active');
            $('#submitButton').prop('disabled', false);
        });

        $('#402').click(function() {
            if ($("input[name='payment_plan'][value='402']").prop('disabled') == false) {
                $("input[name='payment_plan'][value='402']").prop('checked', true);
                $('#401').removeClass('active');
                $('#402').addClass('active');
                $('#403').removeClass('active');
                $('#404').removeClass('active');
                $('#405').removeClass('active');
            }
        });
        $('#403').click(function() {
            if ($("input[name='payment_plan'][value='403']").prop('disabled') == false) {
                $("input[name='payment_plan'][value='403']").prop('checked', true);
                $('#401').removeClass('active');
                $('#402').removeClass('active');
                $('#403').addClass('active');
                $('#404').removeClass('active');
                $('#405').removeClass('active');
                $('#submitButton').prop('disabled', false);
            }
        });
        $('#404').click(function() {
            if ($("input[name='payment_plan'][value='404']").prop('disabled') == false) {
                $("input[name='payment_plan'][value='404']").prop('checked', true);
                $('#401').removeClass('active');
                $('#402').removeClass('active');
                $('#403').removeClass('active');
                $('#404').addClass('active');
                $('#405').removeClass('active');
                $('#submitButton').prop('disabled', false);
            }
        });
        $('#405').click(function() {
            if ($("input[name='payment_plan'][value='405']").prop('disabled') == false) {
                $("input[name='payment_plan'][value='405']").prop('checked', true);
                $('#401').removeClass('active');
                $('#402').removeClass('active');
                $('#403').removeClass('active');
                $('#404').removeClass('active');
                $('#405').addClass('active');
                $('#submitButton').prop('disabled', false);
            }
        });

        $('input[name=payment_plan]').on('click', function() {
            $('#submitButton').prop('disabled', false);
        });
    </script>

    <script>
$(document).ready(function() {
    const gstRate = 0.18;
    const discountCode = "FRAN25";
    const discountPercent = 25;

    const planPrices = {
        403: 2599,   // Silver
        404: 3999,   // Gold
        405: 6999    // Platinum
    };

    // ✅ calculate final amount
    function updateAmount(planId) {
        $('#amt').val('Calculating...');

        setTimeout(() => {
            // remove highlight
            $('#403, #404, #405').removeClass('active');
            $('#' + planId).addClass('active');

            let baseAmount = planPrices[planId] || 0;
            const coupon = $('#couponCode').val()?.trim().toUpperCase();

            // ✅ apply discount only for Gold & Platinum
            if ((planId === '404' || planId === '405') && coupon === discountCode) {
                baseAmount -= baseAmount * (discountPercent / 100);
            }

            // ✅ add GST
            const totalAmount = baseAmount + (baseAmount * gstRate);

            // ✅ update amount field
            $('#amt').val(`₹ ${totalAmount.toLocaleString('en-IN', { minimumFractionDigits: 0 })}`);

            // enable submit if > 0
            if (totalAmount > 0) {
                $('#submitButton').prop('disabled', false);
            } else {
                $('#submitButton').prop('disabled', true);
            }
        }, 30);
    }

    // ✅ radio change
    $(document).on('change click', 'input[name="payment_plan"]', function() {
        const selectedPlanId = $(this).val();
        updateAmount(selectedPlanId);
    });

    // ✅ card click
    $(document).on('click', '.boxwidth', function() {
        const planId = $(this).attr('id');
        const radio = $(this).find('input[type="radio"]');
        if (!radio.is(':disabled')) {
            radio.prop('checked', true).trigger('change');
            updateAmount(planId);
        }
    });

    // ✅ coupon change
    $('#couponCode').on('input blur', function() {
        const selectedPlan = $('input[name="payment_plan"]:checked').val();
        if (selectedPlan) updateAmount(selectedPlan);
    });

    // ✅ initial setup (if already selected)
    const selectedPlan = $('input[name="payment_plan"]:checked').val();
    if (selectedPlan) updateAmount(selectedPlan);
});
</script>


@endsection
