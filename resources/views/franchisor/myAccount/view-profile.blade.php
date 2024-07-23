@extends('layout.master')
@section('vp')
    class="selected"
@endsection
@section('content')
    <div class="container myaccount">
        <div class="row row-no-margin">
            <!-- MY ACCOUNT  LEFT sTART -->
            @include('includes.myfranchiseleft')
            <!-- MY ACCOUNT  LEFT END -->
            <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
                <!-- MY ACCOUNT  info Start -->
                @include('includes.myaccountfranchiseview')
                <!-- MY ACCOUNT  info END -->
                <!-- Business Details  Start here -->
                <h2 class="mysubhead marleft fleft">Business Details</h2>
                <div class="editlink"><a href="businessdetails"> Edit <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span></span></a></div>
                <div class="clearfix"></div>
                <div class="bor-radius backwhite marleft">
                    <div class="col-xs-12 pad15 showbg">
                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Company Name
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->company_name }}
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">CEO / Owner Name
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->ceo_name }}
                            </div>
                        </div>


                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Manager (Franchise) Name
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->fran_manager }}
                            </div>
                        </div>


                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Address Details
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->fran_address }}
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Country
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->country }}
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">State
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->state }}
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">City
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->city }}
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Pincode
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->pincode ?: '-N/A-' }}
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Mobile
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $userAccount->mobile ?: '-N/A-' }}
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Landline
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->telephone ?: '-N/A-' }}
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Website
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->website ?: '-N/A-' }}
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Alternate Email
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->secondary_email ?: '-N/A-' }}
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Industry Category
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                {{ Config::get('constants.CategoryArr.' . $franData->ind_main_cat) ?: '-N/A-' }}
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Sector
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                {{ Config::get('constants.subCategoryArr.' . $franData->ind_main_cat . '.' . $franData->ind_cat) ?: '-N/A-' }}
                            </div>
                        </div>


                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Service/Product
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                {{ Config::get('constants.subSubCategoryArr.' . $franData->ind_cat . '.' . $franData->ind_sub_cat) ?: '-N/A-' }}
                            </div>
                        </div>



                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Operations Commenced On
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->operations_start_year ?: '-N/A-' }}
                            </div>
                        </div>


                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Franchising Commenced On
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->franchise_start_year ?: '-N/A-' }}
                            </div>
                        </div>


                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">No of Franchise Outlets
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->no_fran_outlets ?: '-N/A-' }}
                            </div>
                        </div>


                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">No of Retail Outlets
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->no_retail_outlets ?: '-N/A-' }}
                            </div>
                        </div>



                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">No. Of Company Owned Outlets
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->no_company_outlets ?: '-N/A-' }}
                            </div>
                        </div>



                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Current Outlet Zones
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->outlet_locations ?: '-N/A-' }}
                            </div>
                        </div>


                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Marketing Materials Available
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                @php
                                    if ($franData->marketting_materials != '') {
                                        echo $franData->marketting_materials;
                                    } else {
                                        echo 'No';
                                    }
                                @endphp
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Business Description
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6 mycon">
                                {!! html_entity_decode($franData->business_desc) !!}
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- Business Details end here -->

                <!-- Personal  Start here -->
                <h2 class="mysubhead marleft fleft">Professional Details</h2>
                <div class="editlink"><a href="professionaldetails"> Edit <i class="fa fa-angle-right"
                            aria-hidden="true"></i> <span></span></a></div>
                <div class="clearfix"></div>
                <div class="bor-radius backwhite marleft">
                    <div class="col-xs-12 pad15 showbg">
                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">looking for
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                @php
                                    if ($franData->looking_franchise == 1) {
                                        echo 'Franchise';
                                    } else {
                                        echo 'Trade Partner';
                                    }
                                @endphp
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Looking for Franchisee Partners?
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                @php
                                    if ($franData->franchise_partner_type == 0) {
                                        echo 'No';
                                    }
                                    if ($franData->franchise_partner_type == 1) {
                                        echo 'Unit';
                                    }
                                    if ($franData->franchise_partner_type == 2) {
                                        echo 'Master / Multi Units';
                                    }
                                    if ($franData->franchise_partner_type == 3) {
                                        echo 'Unit , Master / Multi Units';
                                    }
                                @endphp
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Type of franchises
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6 catmodf">Storewise
                                <div class="bor-radius backwhite ovfl blmcats">
                                    <div class="exphead">Units</div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="pull-left">Cost</div>
                                        <div class="pull-right">
                                            <strong>
                                                @php
                                                    $unitinv = Config::get(
                                                        'constants.investRangeInWords.' . $franData->unit_investment,
                                                    );
                                                    if (empty($unitinv)) {
                                                        $unitinv = '-N/A-';
                                                    }
                                                @endphp
                                                {{ $unitinv }}
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="pull-left">Franchise / Brand Fee</div>
                                        <div class="pull-right">
                                            <strong>
                                                @php
                                                    $unitBrandFee = $franData->unitinv_brand_fee;
                                                    if (empty($unitBrandFee)) {
                                                        $unitBrandFee = '-N/A-';
                                                    }
                                                @endphp
                                                {{ $unitBrandFee }}
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="pull-left">Royalty / Commission %</div>
                                        <div class="pull-right">
                                            <strong>
                                                {{ $franData->unitinv_royalty ?: '- NA -' }}
                                            </strong>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        @if ($franMultiUnitData != null && $franMultiUnitData->count() > 0)
                            <div class="row row-no-margin labeshow">
                                <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">What type of franchises are you
                                    considering?
                                </div>
                                <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-6 catmodf margint5">
                                    <div class="bor-radius backwhite ovfl blmcats">
                                        <div class="exphead">Master / Multi Units</div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <!--Region wise start here -->
                                            <div class="col-xs-6 col-sm-6 col-md-6 row-no-padding bright">
                                                <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding"><strong>Country
                                                        Wise</strong></div>
                                                <span class="myclr">
                                                    <div class="pull-left">Investment</div>
                                                    <div class="pull-right">
                                                        <strong>
                                                            @php
                                                                $countryInvest = Config::get(
                                                                    'constants.investRangeInWords.' .
                                                                        $franMultiUnitData->country_investment,
                                                                );
                                                                if (empty($countryInvest)) {
                                                                    $countryInvest = '-N/A-';
                                                                }
                                                            @endphp
                                                            {{ $countryInvest }}
                                                        </strong>
                                                    </div>
                                                    </p>
                                                    <span class="myclr">
                                                        <div class="pull-left">Unit/Brand Fee</div>
                                                        @php
                                                            $countryUnitFee = $franMultiUnitData->country_unitfee;
                                                            if (empty($countryUnitFee)) {
                                                                $countryUnitFee = '-N/A-';
                                                            }
                                                        @endphp

                                                        <div class="pull-right"><strong>{{ $countryUnitFee }}</strong>
                                                        </div>
                                                    </span>
                                                    <span class="myclr">
                                                        <div class="pull-left">Master/Brand Fee</div>
                                                        @php
                                                            $countryMasterFee = $franMultiUnitData->country_masterfee;
                                                            if (empty($countryMasterFee)) {
                                                                $countryMasterFee = '-N/A-';
                                                            }
                                                        @endphp
                                                        <div class="pull-right"><strong>{{ $countryMasterFee }}</strong>
                                                        </div>
                                                        </p>
                                                        <span class="myclr">
                                                            <div class="pull-left">Royalty/Commission</div>
                                                            <div class="pull-right"><strong>
                                                                    @php
                                                                        $countryRoyalityData =
                                                                            $franMultiUnitData->country_royalty;
                                                                        if (empty($countryRoyalityData)) {
                                                                            $countryRoyalityData = '-N/A-';
                                                                        }
                                                                    @endphp
                                                                    {{ $countryRoyalityData }}</strong></div>
                                                        </span>
                                            </div>
                                            <!--Region wise end here -->
                                            <div class="col-xs-6 col-sm-6 col-md-6 row-no-padding padingleft20">
                                                <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding"><strong>Region
                                                        Wise</strong></div>
                                                <span class="myclr">
                                                    <div class="pull-left">Investment</div>
                                                    <div class="pull-right">
                                                        <strong>{{ Config::get('constants.investRangeInWords.' . $franMultiUnitData->region_investment) ?: '-N/A-' }}</strong>
                                                    </div>
                                                </span>
                                                <span class="myclr">
                                                    <div class="pull-left">Unit/Brand Fee</div>
                                                    <div class="pull-right">
                                                        <strong>{{ $franMultiUnitData->region_unitfee ?: '-N/A-' }}</strong>
                                                    </div>
                                                </span>
                                                <span class="myclr">
                                                    <div class="pull-left">Master/Brand Fee</div>
                                                    <div class="pull-right">
                                                        <strong>{{ $franMultiUnitData->region_unitfee ?: '-N/A-' }}</strong>
                                                    </div>
                                                </span>
                                                <span class="myclr">
                                                    <div class="pull-left">Royalty/Commission</div>
                                                    <div class="pull-right">
                                                        <strong>{{ $franMultiUnitData->region_unitfee ?: '-N/A-' }}</strong>
                                                    </div>
                                                </span>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12 linedot"></div>
                                            <div class="col-xs-6 col-sm-6 col-md-6 row-no-padding bright">
                                                <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding"><strong>CIty
                                                        Wise</strong></div>
                                                <span class="myclr">
                                                    <div class="pull-left">Investment</div>
                                                    <div class="pull-right">
                                                        <strong>{{ Config::get('constants.investRangeInWords.' . $franMultiUnitData->city_investment) ?: '-N/A-' }}</strong>
                                                    </div>
                                                </span>
                                                <span class="myclr">
                                                    <div class="pull-left">Unit/Brand Fee</div>
                                                    <div class="pull-right">
                                                        <strong>{{ $franMultiUnitData->city_unitfee ?: '-N/A-' }}</strong>
                                                    </div>
                                                </span>
                                                <span class="myclr">
                                                    <div class="pull-left">Master/Brand Fee</div>
                                                    <div class="pull-right">
                                                        <strong>{{ $franMultiUnitData->city_unitfee ?: '-N/A-' }}</strong>
                                                    </div>
                                                    </p>
                                                    <span class="myclr">
                                                        <div class="pull-left">Royalty/Commission</div>
                                                        <div class="pull-right">
                                                            <strong>{{ $franMultiUnitData->city_unitfee ?: '-N/A-' }}</strong>
                                                        </div>
                                                    </span>
                                            </div>

                                            <div class="col-xs-6 col-sm-6 col-md-6 row-no-padding padingleft20">
                                                <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding"><strong>State
                                                        Wise</strong></div>
                                                <span class="myclr">
                                                    <div class="pull-left">Investment</div>
                                                    <div class="pull-right">
                                                        <strong>{{ Config::get('constants.investRangeInWords.' . $franMultiUnitData->state_investment) ?: '-N/A-' }}</strong>
                                                    </div>
                                                </span>
                                                <span class="myclr">
                                                    <div class="pull-left">Unit/Brand Fee</div>
                                                    <div class="pull-right">
                                                        <strong>{{ $franMultiUnitData->state_unitfee ?: '-N/A-' }}</strong>
                                                    </div>
                                                </span>
                                                <span class="myclr">
                                                    <div class="pull-left">Master/Brand Fee</div>
                                                    <div class="pull-right">
                                                        <strong>{{ $franMultiUnitData->state_unitfee ?: '-N/A-' }}</strong>
                                                    </div>
                                                </span>
                                                <span class="myclr">
                                                    <div class="pull-left">Royalty/Commission</div>
                                                    <div class="pull-right">
                                                        <strong>{{ $franMultiUnitData->state_unitfee ?: '-N/A-' }}</strong>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($tradeCount != null)
                            <div class="row row-no-margin labeshow">
                                <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Are you looking for Trade Partners
                                    (Dealers,
                                    Distributors, MBOs, Retailers)?
                                </div>
                                <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-6 catmodf margint5">
                                    @for ($i = 0; $i < $tradeCount; $i++)
                                        <div class="bor-radius backwhite ovfl blmcats paddingt20">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="pull-left">Types of Channels</div>
                                                <div class="pull-right">
                                                    <strong>{{ Config::get('constants.channelArr.' . $tradePartner[$i]->channel_type) }}</strong>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="pull-left">Investment If any</div>
                                                <div class="pull-right">
                                                    <strong>{{ Config::get('constants.investRangeInWords.' . $tradePartner[$i]->trade_investment) }}</strong>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="pull-left">Margin / Commissions %</div>
                                                <div class="pull-right">
                                                    <strong>{{ $tradePartner[$i]->trade_margin }}%</strong>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="pull-left">Area Requirement (If Any)</div>
                                                <div class="pull-right">
                                                    <strong>{{ $tradePartner[$i]->area_min }}-{{ $tradePartner[$i]->area_max }}&nbsp{{ $tradePartner[$i]->area_type }}</strong>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        @endif
                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Are you looking for International
                                Franchisee?
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                @php
                                    if (count($franCountries) != 0) {
                                        echo 'Yes >>    &nbsp &nbsp &nbsp';
                                        foreach ($franCountries as $a) {
                                            echo $a . ',';
                                        }
                                    } else {
                                        echo 'No';
                                    }
                                @endphp
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Looking for Franchisee Partners?
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6 catmodf">Expansion Locations

                                <div class="row">
                                    @if (count($StatesNorth) > 0)
                                        <div class="col-xs-12 col-sm-6 col-md-6 parright15">
                                            <div class="bor-radius backwhite ovfl blmcats cihiegh">
                                                <div class="exphead">North</div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    @php $uniqueStates = $StatesNorth->unique()->values()->all(); @endphp
                                                    @foreach ($uniqueStates as $a)
                                                        {{ $a }},
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if (count($StatesSouth) > 0)
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="bor-radius backwhite ovfl blmcats cihiegh">
                                                <div class="exphead">South</div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    @php $uniqueStates = $StatesSouth->unique()->values()->all(); @endphp
                                                    @foreach ($uniqueStates as $b)
                                                        {{ $b }},
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if (count($StatesEast) > 0)
                                        <div class="col-xs-12 col-sm-6 col-md-6 parright15">
                                            <div class="bor-radius backwhite ovfl blmcats cihiegh">
                                                <div class="exphead">East</div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    @php $uniqueStates = $StatesEast->unique()->values()->all(); @endphp
                                                    @foreach ($uniqueStates as $c)
                                                        {{ $c }},
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if (count($StatesWest) > 0)
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="bor-radius backwhite ovfl blmcats cihiegh">
                                                <div class="exphead">West</div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    @php $uniqueStates = $StatesWest->unique()->values()->all(); @endphp
                                                    @foreach ($uniqueStates as $d)
                                                        {{ $d }},
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif


                                    @if (count($StatesCenter) > 0)
                                        <div class="col-xs-12 col-sm-6 col-md-6 parright15">
                                            <div class="bor-radius backwhite ovfl blmcats cihiegh">
                                                <div class="exphead">Center</div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    @php $uniqueStates = $StatesCenter->unique()->values()->all(); @endphp
                                                    @foreach ($uniqueStates as $e)
                                                        {{ $e }},
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if (count($StatesUT) > 0)
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="bor-radius backwhite ovfl blmcats cihiegh">
                                                <div class="exphead">Union Territories</div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    @php $uniqueStates = $StatesUT->unique()->values()->all(); @endphp
                                                    @foreach ($uniqueStates as $f)
                                                        {{ $f }},
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- Personal  end here -->
                <!-- property/franchise Details  Start here -->
                <h2 class="mysubhead marleft fleft">Franchise Details</h2>
                <div class="editlink"><a href="propertydetails"> Edit <i class="fa fa-angle-right"
                            aria-hidden="true"></i> <span></span></a></div>
                <div class="clearfix"></div>
                <div class="bor-radius backwhite marleft">
                    <div class="col-xs-12 pad15 showbg">
                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Are there exclusive territorial rights
                                given
                                to a unit franchise?
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                @php
                                    if ($franData->is_territorial_rights == 1) {
                                        echo 'Yes';
                                    } else {
                                        echo 'No';
                                    }
                                @endphp
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Are any performance guarantees given
                                to unit franchisee?
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                @php
                                    if ($franData->is_perform_guarranty == 1) {
                                        echo 'Yes';
                                    } else {
                                        echo 'No';
                                    }
                                @endphp
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Are any advertising / marketing levies
                                payable to the franchisor?
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                @php
                                    if ($franData->is_marketting_levies == 1) {
                                        echo 'Yes';
                                    } else {
                                        echo 'No';
                                    }
                                @endphp
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">What is the anticipated percentage
                                return on investment?
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->anticipated_roi ?: '-N/A-' }}
                                @if (!empty($franData->anticipated_roi))
                                    %
                                @endif
                            </div>
                        </div>


                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">What is the likely payback period of
                                capital for a unit franchise?
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->payback_period ?: '-N/A-' }}
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Are there any other investment
                                requirements?
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->other_investment_req ?: '-N/A-' }}
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Do you provide aid in financing?
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                @php
                                    if ($franData->is_finance_aid == 1) {
                                        echo 'Yes';
                                    } else {
                                        echo 'No';
                                    }
                                @endphp
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
                <!-- Investment end here -->


                <!-- Property Details  Start here -->
                <h2 class="mysubhead marleft fleft">Property Details</h2>
                <div class="editlink"><a href="propertydetails"> Edit <i class="fa fa-angle-right"
                            aria-hidden="true"></i> <span></span></a></div>
                <div class="clearfix"></div>
                <div class="bor-radius backwhite marleft">
                    <div class="col-xs-12 pad15 showbg">

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">
                                What type of property is required for this franchise opportunity?
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->property_type ?: '-N/A-' }}
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Floor Area Requirements
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                @if (!empty($franData->prop_area_max))
                                    {{ $franData->prop_area_min }} - {{ $franData->prop_area_max }} Sq. Ft.
                                @endif
                                @if (empty($franData->prop_area_max))
                                    {{ $franData->prop_area_min ?: '-N/A-' }}
                                @endif
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Preferred location
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->pref_prop_location ?: '-N/A-' }}
                            </div>
                        </div>


                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">
                                Franchisor or Franchisee will arrange outfit of premises
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                {{ $franData->premise_outfit_arrangement ?: '-N/A-' }}
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Do you provide site selection
                                assistance?
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                @php
                                    if ($franData->site_selection_assistance == 1) {
                                        echo 'Yes';
                                    } else {
                                        echo 'No';
                                    }
                                @endphp
                            </div>
                        </div>

                    </div>

                    <div class="clearfix"></div>
                </div>
                <!-- Property Details end here -->

                <!-- Training Start here -->
                <h2 class="mysubhead marleft fleft">Training Details</h2>
                <div class="editlink"><a href="training-aggrement-details"> Edit <i class="fa fa-angle-right"
                            aria-hidden="true"></i> <span></span></a></div>
                <div class="clearfix"></div>
                <div class="bor-radius backwhite marleft">
                    <div class="col-xs-12 pad15 showbg">
                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Do you currently have detailed
                                operating manuals for franchises?
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                @php
                                    if ($franData->is_detailed_manuals == 1) {
                                        echo 'Yes';
                                    } else {
                                        echo 'No';
                                    }
                                @endphp
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Where is the franchisee training done?
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">{{ $franData->franchise_training_loc ?: '-N/A-' }}
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Is field assistance available for
                                franchises?
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                @php
                                    if ($franData->is_field_assistance == 1) {
                                        echo 'Yes';
                                    } else {
                                        echo 'No';
                                    }
                                @endphp
                            </div>
                        </div>


                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Will the head office be providing
                                assistance to the franchisees?
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                @php
                                    if ($franData->ho_assistance == 1) {
                                        echo 'Yes';
                                    } else {
                                        echo 'No';
                                    }
                                @endphp
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">What IT systems do you presently have
                                that will be
                                included in the franchise?
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                @php
                                    if ($franData->is_it_support == 1) {
                                        echo 'Yes';
                                    } else {
                                        echo 'No';
                                    }
                                @endphp
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
                <!-- Training end here -->

                <!-- Agreements  Start here -->
                <h2 class="mysubhead marleft fleft">Agreements Details</h2>
                <div class="editlink"><a href="training-aggrement-details"> Edit <i class="fa fa-angle-right"
                            aria-hidden="true"></i> <span></span></a></div>
                <div class="clearfix"></div>
                <div class="bor-radius backwhite marleft">
                    <div class="col-xs-12 pad15 showbg">
                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Do you have a standard Franchise
                                Agreement?

                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                @php
                                    if ($franData->std_fran_aggreement == 1) {
                                        echo 'Yes';
                                    } else {
                                        echo 'No';
                                    }
                                @endphp
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">How long is the franchise term for?

                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                {{ $franData->franchise_term_duration ?: '-N/A-' }}
                                @php
                                    if (!empty($franData->franchise_term_duration)) {
                                        if ($franData->franchise_term_duration != 'Life') {
                                            echo 'Years';
                                        }
                                    }

                                @endphp
                            </div>
                        </div>

                        <div class="row row-no-margin labeshow">
                            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Is the term renewable?
                                I open my franchise?
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                @php
                                    if ($franData->term_renewable == 1) {
                                        echo 'Yes';
                                    } else {
                                        echo 'No';
                                    }
                                @endphp
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
                <!-- Agreements  end here -->
            </div>
        </div>
    </div>
    </div>
@endsection
