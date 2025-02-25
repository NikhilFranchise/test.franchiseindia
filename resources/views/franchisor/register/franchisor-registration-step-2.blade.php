@extends('layout.master')
@section('seoTitle', 'Franchisor Registration - franchiseindia.com')
@section('seoDesc',
    'Are you a franchisor with a unique business idea? Register with Franchise India and get noticed by
    multiple investors and expand your client base.')
@section('content')
    <style type="text/css">
        .innerloginblk {
            padding: 0px;
        }

        #adslot728x90_BTF {
            display: none
        }

        #Business-Opportunitiessection {
            display: none
        }

        #Our-Group-Sitessection {
            display: none
        }

        .regblkleft {
            display: none;
        }

        .regblkright {
            display: none;
        }
    </style>
   

    <!--step process start  here -->
    <div class="container formsection margintop60 staicp">
        <h1 class="noneunder"> Free listing - join franchiseindia.com today!</h1>
    </div>
    <div class="StepSec">
        <div class="row stepmargtform">
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="col-xs-2 stepwizard-step">
                        <p class="activeve hidden-xs">Personal</p>
                        <span class="disnone"> <i class="fa fa-user fa-lg" aria-hidden="true"></i></span>
                        <a href="#" type="button" class="btn btn-primary btn-circle overfla activeve"></a>
                    </div>
                    <div class="col-xs-2 stepwizard-step">
                        <a href="{{ url('franchisor/registration/step/2?franchisorId=' . $franchisorId) }}">
                            <p class="activeve hidden-xs" id="head1"><i
                                    class="fa fa-angle-double-left fa-lg {{ request()->segment(4) == 2 || request()->segment(4) < 2 ? 'hidden' : '' }}"></i>
                                Business</p>
                        </a>
                        <a href="{{ url('franchisor/registration/step/2?franchisorId=' . $franchisorId) }}"><span
                                class="disnone"><i
                                    class="fa fa-angle-double-left fa-lg {{ request()->segment(4) == 2 || request()->segment(4) < 2 ? 'hidden' : '' }}"></i>
                                <i class="fa fa-address-book fa-lg" aria-hidden="true"></i></span></a>
                        <a href="{{ url('franchisor/registration/step/2?franchisorId=' . $franchisorId) }}" type="button"
                            class="btn btn-default btn-circle overfla activeve2" id="ab1"></a>
                    </div>
                    <div class="col-xs-2 stepwizard-step">
                        <a
                            href="{{ $franData->step_completed > 1 ? url('franchisor/registration/step/3?franchisorId=' . $franchisorId) : '#' }}">
                            <p class="{{ $franData->step_completed > 1 ? 'activeve' : '' }} hidden-xs" id="head2"><i
                                    class="fa fa-angle-double-left fa-lg {{ request()->segment(4) == 3 || request()->segment(4) < 3 ? 'hidden' : '' }}"></i>
                                Professional <i
                                    class="fa fa-angle-double-right fa-lg {{ request()->segment(4) == 3 || request()->segment(4) > 3 ? 'hidden' : '' }}"></i>
                            </p>
                        </a>
                        <a
                            href="{{ $franData->step_completed > 1 ? url('franchisor/registration/step/3?franchisorId=' . $franchisorId) : '#' }}"><span
                                class="disnone"><i
                                    class="fa fa-angle-double-left fa-lg {{ request()->segment(4) == 3 || request()->segment(4) < 3 ? 'hidden' : '' }}"></i>
                                <i class="fa fa-address-card fa-lg" aria-hidden="true"></i> <i
                                    class="fa fa-angle-double-right fa-lg {{ request()->segment(4) == 3 || request()->segment(4) > 3 ? 'hidden' : '' }}"></i></span></a>
                        <a href="{{ $franData->step_completed > 1 ? url('franchisor/registration/step/3?franchisorId=' . $franchisorId) : '#' }}"
                            type="button"
                            class="btn btn-default btn-circle overfla {{ $franData->step_completed > 1 ? 'activeve2' : '' }}"
                            {{ $franData->step_completed < 2 ? 'disabled' : '' }} id="ab2"></a>
                    </div>
                    <div class="col-xs-2 stepwizard-step">
                        <a
                            href="{{ $franData->step_completed > 2 ? url('franchisor/registration/step/4?franchisorId=' . $franchisorId) : '#' }}">
                            <p class="{{ $franData->step_completed > 2 ? 'activeve' : '' }} hidden-xs" id="head3"><i
                                    class="fa fa-angle-double-left fa-lg {{ request()->segment(4) == 4 || request()->segment(4) < 4 ? 'hidden' : '' }}"></i>
                                Property <i
                                    class="fa fa-angle-double-right fa-lg {{ request()->segment(4) == 4 || request()->segment(4) > 4 ? 'hidden' : '' }}"></i>
                            </p>
                        </a>
                        <a
                            href="{{ $franData->step_completed > 2 ? url('franchisor/registration/step/4?franchisorId=' . $franchisorId) : '#' }}"><span
                                class="disnone"><i
                                    class="fa fa-angle-double-left fa-lg {{ request()->segment(4) == 4 || request()->segment(4) < 4 ? 'hidden' : '' }}"></i>
                                <i class="fa fa-building fa-lg" aria-hidden="true"></i> <i
                                    class="fa fa-angle-double-right fa-lg {{ request()->segment(4) == 4 || request()->segment(4) > 4 ? 'hidden' : '' }}"></i></span></a>
                        <a href="{{ $franData->step_completed > 2 ? url('franchisor/registration/step/4?franchisorId=' . $franchisorId) : '#' }}"
                            type="button"
                            class="btn btn-default btn-circle overfla {{ $franData->step_completed > 2 ? 'activeve2' : '' }}"
                            {{ $franData->step_completed < 3 ? 'disabled' : '' }} id="ab3"></a>
                    </div>
                    <div class="col-xs-2 stepwizard-step">
                        <a
                            href="{{ $franData->step_completed > 3 ? url('franchisor/registration/step/5?franchisorId=' . $franchisorId) : '#' }}">
                            <p class="{{ $franData->step_completed > 3 ? 'activeve' : '' }} hidden-xs" id="head4"><i
                                    class="fa fa-angle-double-left fa-lg {{ request()->segment(4) == 5 || request()->segment(4) < 5 ? 'hidden' : '' }}"></i>
                                Agreements <i
                                    class="fa fa-angle-double-right fa-lg {{ request()->segment(4) == 5 || request()->segment(4) > 5 ? 'hidden' : '' }}"></i>
                            </p>
                        </a>
                        <a
                            href="{{ $franData->step_completed > 3 ? url('franchisor/registration/step/5?franchisorId=' . $franchisorId) : '#' }}"><span
                                class="disnone"><i
                                    class="fa fa-angle-double-left fa-lg {{ request()->segment(4) == 5 || request()->segment(4) < 5 ? 'hidden' : '' }}"></i>
                                <i class="fa fa-pencil-square fa-lg" aria-hidden="true" title="Training/Agreements"></i> <i
                                    class="fa fa-angle-double-right fa-lg {{ request()->segment(4) == 5 || request()->segment(4) > 5 ? 'hidden' : '' }}"></i></span></a>
                        <a href="{{ $franData->step_completed > 3 ? url('franchisor/registration/step/5?franchisorId=' . $franchisorId) : '#' }}"
                            type="button"
                            class="btn btn-default btn-circle overfla {{ $franData->step_completed > 3 ? 'activeve2' : '' }}"
                            {{ $franData->step_completed < 4 ? 'disabled' : '' }} id="ab4"></a>
                    </div>
                    <div class="col-xs-2 stepwizard-step">
                        <a
                            href="{{ $franData->step_completed > 4 ? url('franchisor/registration/step/6?franchisorId=' . $franchisorId) : '#' }}">
                            <p class="{{ $franData->step_completed > 4 ? 'activeve' : '' }} hidden-xs" id="head5"><i
                                    class="fa fa-angle-double-left fa-lg {{ request()->segment(4) == 6 || request()->segment(4) < 6 ? 'hidden' : '' }}"></i>
                                Payment <i
                                    class="fa fa-angle-double-right fa-lg {{ request()->segment(4) == 6 || request()->segment(4) > 6 ? 'hidden' : '' }}"></i>
                            </p>
                        </a>
                        <a
                            href="{{ $franData->step_completed > 4 ? url('franchisor/registration/step/6?franchisorId=' . $franchisorId) : '#' }}"><span
                                class="disnone"><i
                                    class="fa fa-angle-double-left fa-lg {{ request()->segment(4) == 6 || request()->segment(4) < 6 ? 'hidden' : '' }}"></i>
                                <i class="fa fa-credit-card fa-lg" aria-hidden="true" title="Payment"></i> <i
                                    class="fa fa-angle-double-right fa-lg {{ request()->segment(4) == 6 || request()->segment(4) > 6 ? 'hidden' : '' }}"></i></span></a>
                        <a href="{{ $franData->step_completed > 4 ? url('franchisor/registration/step/6?franchisorId=' . $franchisorId) : '#' }}"
                            type="button"
                            class="btn btn-default btn-circle overfla {{ $franData->step_completed > 4 ? 'activeve3' : '' }}"
                            {{ $franData->step_completed < 5 ? 'disabled' : '' }} id="ab5"></a>
                    </div>
                </div>
            </div>
            <div class="" style="text-align:center;margin-top: 45px;color: #000;font-size: 17px;font-weight: 400;">
                Chat on <a
                    href="https://api.whatsapp.com/send?phone=919312650021&amp;text=Hello,%20I%20am%20interested%20in%20knowing%20more%20about ?%20https://www.franchiseindia.com/"
                    target="_blank"><img src="https://www.franchiseindia.com/newhomepage/assets/img/whatappsicon.svg"
                        class="sts"></a></div>
            <!--  -->
        </div>
    </div>
    @php
        $displayFranchiseopt = '';
        $lookingFranchise = '';
        $lookingTradePartner = '';
        $lookingDealerDistributor = '';
        $unit = '';
        $multiUnit = '';
        $displayTypeOfFranchise = '';
        $unitBrandFee = '';
        $unitRoyalty = '';
        $multiunitDisplay = '';
        $investmentRangeArr = Config('constants.investRangeInWords');
        if ($franData->looking_tradepartner == 1 || $franData->looking_franchise == 1) {
            $channel = Config('constants.tradePartnerChannels');
        } else {
            $channel = Config('constants.dealerAndDistributorChannels');
        }
        if ($franData->looking_tradepartner == 1) {
            $lookingTradePartner = 'checked';
            $displayFranchiseopt = 'display:none';
        } elseif ($franData->is_dealer_distributor == 1) {
            $lookingDealerDistributor = 'checked';
            $displayFranchiseopt = 'display:none';
        } else {
            $lookingFranchise = 'checked';
            if ($franData->franchise_partner_type == 1 || $franData->franchise_partner_type == 3) {
                $unit = 'checked';
                $displayTypeOfFranchise = 'display:block';
                $unitBrandFee = $franData->unitinv_brand_fee;
                $unitRoyalty = $franData->unitinv_royalty;
            }
            if ($franData->franchise_partner_type == 2 || $franData->franchise_partner_type == 3) {
                $multiUnit = 'checked';
                $multiunitDisplay = 'display:block';
            }
        }
        $styleBlock =
            $franData->looking_tradepartner == 1 || $franData->is_dealer_distributor == 1
                ? 'display:block'
                : 'display:none';

        $countryWise = '';
        $countryDisabled = 'disabled';
        $countryUnitFee = '';
        $countryMasterFee = '';
        $countryRoyalty = '';
        $regionwise = '';
        $regionDisabled = 'disabled';
        $regionUnitFee = '';
        $regionMasterFee = '';
        $regionRoyalty = '';
        $stateWise = '';
        $stateisabled = 'disabled';
        $stateUnitFee = '';
        $stateMasterFee = '';
        $stateRoyalty = '';
        $cityWise = '';
        $cityDisabled = 'disabled';
        $cityUnitFee = '';
        $cityMasterFee = '';
        $cityRoyalty = '';
        if (!empty($multiUnitData)) {
            if ($franData->franchise_partner_type == 2 || $franData->franchise_partner_type == 3) {
                if ($multiUnitData->countrywise == 1) {
                    $countryWise = 'checked';
                    $countryDisabled = '';
                    if (!empty($multiUnitData->country_unitfee)) {
                        $countryUnitFee = intval($multiUnitData->country_unitfee);
                    }
                    if (!empty($multiUnitData->country_masterfee)) {
                        $countryMasterFee = intval($multiUnitData->country_unitfee);
                    }
                    if (!empty($multiUnitData->country_masterfee)) {
                        $countryRoyalty = intval($multiUnitData->country_royalty);
                    }
                }
                if ($multiUnitData->regionwise == 1) {
                    $regionwise = 'checked';
                    $regionDisabled = '';
                    if ($multiUnitData->region_unitfee != '') {
                        $regionUnitFee = intval($multiUnitData->region_unitfee);
                    }
                    if ($multiUnitData->region_masterfee != '') {
                        $regionMasterFee = intval($multiUnitData->region_masterfee);
                    }
                    if ($multiUnitData->region_royalty != '') {
                        $regionRoyalty = intval($multiUnitData->region_royalty);
                    }
                }
                if ($multiUnitData->statewise == 1) {
                    $stateWise = 'checked';
                    $stateisabled = '';
                    if ($multiUnitData->state_unitfee != '') {
                        $stateUnitFee = intval($multiUnitData->state_unitfee);
                    }
                    if ($multiUnitData->state_masterfee != '') {
                        $stateMasterFee = intval($multiUnitData->state_masterfee);
                    }
                    if ($multiUnitData->state_royalty != '') {
                        $stateRoyalty = intval($multiUnitData->state_royalty);
                    }
                }
                if ($multiUnitData->citywise == 1) {
                    $cityWise = 'checked';
                    $cityDisabled = '';
                    if ($multiUnitData->city_unitfee != '') {
                        $cityUnitFee = intval($multiUnitData->city_unitfee);
                    }
                    if ($multiUnitData->city_masterfee != '') {
                        $cityMasterFee = intval($multiUnitData->city_masterfee);
                    }
                    if ($multiUnitData->city_royalty != '') {
                        $cityRoyalty = intval($multiUnitData->city_royalty);
                    }
                }
            }
        }
    @endphp
    <div class="container formsection">
        <div class="row margt0">
            <div class="col-xs-12 col-sm-9 bor-radius backwhite targleft row-no-padding">
                <form class="form-horizontal" id="fran-form" name="form_franchisor"
                    action="{{ url('franchisor/registration/step/3') }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="franchisorId" value="{{ $franchisorId }}">
                    <div class="setup-content BusDtl" id="step-2">
                        <div class="col-xs-12 col-sm-12 col-md-12 pad30 showbg">
                            <div class="sidehead">Business Details</div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Brand Name
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/company.png') }}"></span>
                                        <input name="brand_name" id="brand_name" type="text" maxlength="55"
                                            class="form-control" placeholder="Enter Brand Name"
                                            value="{{ $franData->brand_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Company Name
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/company.png') }}"></span>
                                        <input name="company_name" id="company_name" type="text" maxlength="55"
                                            class="form-control" placeholder="Enter Company Name"
                                            value="{{ $franData->company_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">CEO / MD / Owner
                                    Name </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/companyceo.png') }}"></span>
                                        <input type="text" class="form-control" name="ceo_name" id="ceo_name"
                                            placeholder="Enter CEO / Owner Name" value="{{ $franData->ceo_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">CEO / MD / Owner
                                    Email </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/email.png') }}"></span>
                                        <input name="ceo_email" type="text" class="form-control"
                                            placeholder="Enter Email" value="{{ $franData->ceo_email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">CEO / MD / Owner
                                    Mobile No.</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/mobile.png') }}"></span>
                                        <input name="ceo_mobile" onkeypress="return isNumber(event)" type="text"
                                            class="form-control" maxlength="10" placeholder="Enter Mobile"
                                            value="{{ $franData->ceo_mobile }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Manager
                                    Name</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/user.png') }}"></span>
                                        <input type="text" class="form-control" name="fran_manager" id="fran_manager"
                                            placeholder="Enter Manager Name" value="{{ $franData->fran_manager }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Address
                                    Details</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/addreess.png') }}"></span>
                                        <input type="text" class="form-control" name="fran_address" id="fran_address"
                                            placeholder="Enter Your Addrees" value="{{ $franData->fran_address }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country"
                                    class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Country</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/country.png') }}"></span>
                                        <select name="country" id="country" class="form-control myselectclass">
                                            <option value="">Select Country</option>
                                            @foreach (Config('location.countryName') as $index => $value)
                                                {
                                                <option value="{{ $index }}"
                                                    @if ($index == array_search($franData->country, Config('location.countryName'))) selected @endif>{{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Pincode</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/pincode.png') }}"></span>
                                        <input type="text" class="form-control" name="pincode" id="pincode"
                                            maxlength="6" onkeyup="getPinCodeDetails(this.value)"
                                            placeholder="Enter Pincode" value="{{ $franData->pincode }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">State</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/state.png') }}"></span>
                                        <input type="text" class="form-control" name="state" id="state"
                                            placeholder="Enter State" value="{{ $franData->state }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">City</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/city.png') }}"></span>
                                        <input type="text" class="form-control" name="city" id="city"
                                            placeholder="Enter City" value="{{ $franData->city }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Landline</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/telephone.png') }}"></span>
                                        <input type="text" class="form-control" name="telephone" id="telephone"
                                            placeholder="Enter Landline" value="{{ $franData->telephone }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Website/Web-Link</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/companywebsite.png') }}"></span>
                                        <input type="text" class="form-control" name="website" id="website"
                                            maxlength="35" placeholder="Enter Company Website/Web-Link"
                                            value="{{ $franData->website }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Secondary Email</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/email.png') }}"></span>
                                        <input type="text" class="form-control" name="secondary_email"
                                            id="secondary_email" maxlength="40" placeholder="Enter Secondary Email"
                                            value="{{ $franData->secondary_email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck mandatory">Are you
                                    looking for ?</label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row ProLooking">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-3 mdyreswidth"><input type="radio"
                                                    name="looking_franchise" value="1" {{ $lookingFranchise }}>
                                                Franchisee </label>
                                            <label class="col-xs-6 col-sm-6 col-md-4"><input type="radio"
                                                    name="looking_franchise" value="0"
                                                    {{ $lookingTradePartner }}>Trade partners</label>
                                            <label class="col-xs-6 col-sm-6 col-md-4"><input type="radio"
                                                    name="looking_franchise" value="2"
                                                    {{ $lookingDealerDistributor }}>Dealer/Distributor</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group lookingFranchisePartnerInput" style="{{ $displayFranchiseopt }}">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck mandatory">Looking
                                    for Franchisee Partners?</label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row checkmargin">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-6"><input type="checkbox"
                                                    id="franchise_partner_type" value="lookingFrUnit"
                                                    name="franchise_partner_type[]" {{ $unit }} />Unit</label>
                                            <label class="col-xs-6 col-sm-6 col-md-6"><input type="checkbox"
                                                    id="franchise_partner_type1" value="lookingFrUnitMultiUnits"
                                                    name="franchise_partner_type[]" {{ $multiUnit }} />Master / Multi
                                                Units</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden-area lookingFrUnitInput" style="{{ $displayTypeOfFranchise }}">
                                <div class="form-group">
                                    <label
                                        class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck mandatory">Type
                                        of franchises</label>
                                    <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="row checkmargin">
                                            <div class="col-sm-12 row-no-padding">
                                                <label class="col-sm-6 mdyreswidth">
                                                    <input type="radio" id="storewise" checked value="Store Wise">
                                                    Store Wise
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 row-no-padding bdr-tp-bt">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-4 col-md-4 paddright0">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <img src="{{ url('images/range-rate.png') }}">
                                                </span>
                                                <select name="unit_investment" title="unit_investment"
                                                    class="form-control myselectclass">
                                                    @foreach ($investmentRangeArr as $index => $value)
                                                        <option value="{{ $index }}"
                                                            {{ $index == $franData->unit_investment ? 'selected' : '' }}>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 paddright0">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img
                                                        src="{{ url('images/brand.png') }}"></span>
                                                <input name="unitinv_brand_fee" type="text" pattern="[0-9]{1,10}"
                                                    minlength="1" maxlength="8" class="form-control"
                                                    placeholder="Franchise / Brand Fee" value="{{ $unitBrandFee }}" />
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img
                                                        src="{{ url('images/commission.png') }}"></span>
                                                <input name="unitinv_royalty" type="text" pattern="[0-9]{1,2}"
                                                    minlength="1" maxlength="2" class="form-control"
                                                    placeholder="Royalty / Commission %" value="{{ $unitRoyalty }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden-area lookingFrMultiUnitInput" style="{{ $multiunitDisplay }}">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-group ttl">What type of franchises are you considering?</div>
                                </div>
                                <div class="row marginbottom10">
                                    <div class="bdr-tp-bt-col">
                                        <div style="display:none;color:red" id="error_msg_step3_multiunit">Please select
                                            at least one field</div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group">
                                                <input type="checkbox" name="countrywise" class="multiUnitCheckBoxes"
                                                    id="countrywise" title="CountryWise" value="CountryWise"
                                                    {{ $countryWise }}>Country Wise
                                            </div>
                                            <div class="disabled-area CountryWise">
                                                <fieldset {{ $countryDisabled }}>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/range-rate.png') }}"></span>
                                                            <select name="country_investment"
                                                                class="form-control myselectclass"
                                                                title="country_investment">
                                                                @foreach ($investmentRangeArr as $index => $value)
                                                                    <option value="{{ $index }}"
                                                                        @if (!empty($multiUnitData) && $multiUnitData->country_investment == $index) selected @endif>
                                                                        {{ $value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/brand.png') }}"></span>
                                                            <input type="text" name="country_unitfee"
                                                                pattern="[0-9]{1,10}" minlength="1" maxlength="8"
                                                                class="form-control" placeholder="Unit / Brand Fee"
                                                                value="{{ $countryUnitFee }}" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/brand.png') }}"></span>
                                                            <input type="text" name="country_masterfee"
                                                                pattern="[0-9]{1,10}" minlength="1" maxlength="8"
                                                                class="form-control" placeholder="Master / Brand Fee"
                                                                value="{{ $countryMasterFee }}" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/commission.png') }}"></span>
                                                            <input type="text" name="country_royalty"
                                                                pattern="[0-9]{1,2}" minlength="1" maxlength="2"
                                                                class="form-control" placeholder="Royalty / Commission %"
                                                                value="{{ $countryRoyalty }}" />
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 paddleft-lft30">
                                            <div class="form-group">
                                                <input type="checkbox" name="regionwise" class="multiUnitCheckBoxes"
                                                    id="regionwise" title="regionwise" value="RegionWise"
                                                    {{ $regionwise }}> Region wise
                                            </div>
                                            <div class="disabled-area RegionWise">
                                                <fieldset {{ $regionDisabled }}>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/range-rate.png') }}"></span>
                                                            <select name="region_investment"
                                                                class="form-control myselectclass"
                                                                title="region_investment">
                                                                @foreach ($investmentRangeArr as $index => $value)
                                                                    <option value="{{ $index }}"
                                                                        @if (!empty($multiUnitData) && $multiUnitData->region_investment == $index) selected @endif>
                                                                        {{ $value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/brand.png') }}"></span>
                                                            <input type="text" name="region_unitfee"
                                                                pattern="[0-9]{1,10}" minlength="1" maxlength="8"
                                                                id="region_unitfee" class="form-control"
                                                                placeholder="Unit / Brand Fee"
                                                                value="{{ $regionUnitFee }}" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/brand.png') }}"></span>
                                                            <input type="text" name="region_masterfee"
                                                                pattern="[0-9]{1,10}" minlength="1" maxlength="8"
                                                                id="region_masterfee" class="form-control"
                                                                placeholder="Master / Brand Fee"
                                                                value="{{ $regionMasterFee }}" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-grohup">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/commission.png') }}"></span>
                                                            <input type="text" name="region_royalty"
                                                                pattern="[0-9]{1,2}" minlength="1" maxlength="2"
                                                                id="region_royalty" class="form-control"
                                                                placeholder="Royalty / Commission %"
                                                                value="{{ $regionRoyalty }}" />
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group">
                                                <input type="checkbox" name="statewise" class="multiUnitCheckBoxes"
                                                    id="statewise" title="statewise" value="StateWise"
                                                    {{ $stateWise }}> State wise
                                            </div>
                                            <div class="disabled-area StateWise">
                                                <fieldset {{ $stateisabled }}>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/range-rate.png') }}"></span>
                                                            <select name="state_investment"
                                                                class="form-control myselectclass"
                                                                title="state_investment">
                                                                @foreach ($investmentRangeArr as $index => $value)
                                                                    <option value="{{ $index }}"
                                                                        @if (!empty($multiUnitData) && $multiUnitData->state_investment == $index) selected @endif>
                                                                        {{ $value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/brand.png') }}"></span>
                                                            <input type="text" name="state_unitfee"
                                                                pattern="[0-9]{1,10}" minlength="1" maxlength="8"
                                                                id="state_unitfee" class="form-control"
                                                                placeholder="Unit / Brand Fee"
                                                                value="{{ $stateUnitFee }}" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/brand.png') }}"></span>
                                                            <input type="text" name="state_masterfee"
                                                                pattern="[0-9]{1,10}" minlength="1" maxlength="8"
                                                                id="state_masterfee" class="form-control"
                                                                placeholder="Master / Brand Fee"
                                                                value="{{ $stateMasterFee }}" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/commission.png') }}"></span>
                                                            <input type="text" name="state_royalty"
                                                                pattern="[0-9]{1,2}" minlength="1" maxlength="2"
                                                                id="state_royalty" class="form-control"
                                                                placeholder="Royalty / Commission %"
                                                                value="{{ $stateRoyalty }}" />
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 paddleft-lft30">
                                            <div class="form-group">
                                                <input type="checkbox" name="citywise" class="multiUnitCheckBoxes"
                                                    id="citywise" title="citywise" value="CityWise"
                                                    {{ $cityWise }}> City wise
                                            </div>
                                            <div class="disabled-area CityWise">
                                                <fieldset {{ $cityDisabled }}>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/range-rate.png') }}"></span>
                                                            <select name="city_investment"
                                                                class="form-control myselectclass"
                                                                title="city_investment">
                                                                @foreach ($investmentRangeArr as $index => $value)
                                                                    <option value="{{ $index }}"
                                                                        @if (!empty($multiUnitData) && $multiUnitData->city_investment == $index) selected @endif>
                                                                        {{ $value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/brand.png') }}"></span>
                                                            <input type="text" name="city_unitfee"
                                                                pattern="[0-9]{1,10}" minlength="1" maxlength="8"
                                                                id="city_unitfee" class="form-control"
                                                                placeholder="Unit / Brand Fee"
                                                                value="{{ $cityUnitFee }}" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/brand.png') }}"></span>
                                                            <input type="text" name="city_masterfee"
                                                                pattern="[0-9]{1,10}" minlength="1" maxlength="8"
                                                                id="city_masterfee" class="form-control"
                                                                placeholder="Master / Brand Fee"
                                                                value="{{ $cityMasterFee }}" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img
                                                                    src="{{ url('images/commission.png') }}"></span>
                                                            <input type="text" name="city_royalty"
                                                                pattern="[0-9]{1,2}" minlength="1" maxlength="2"
                                                                id="city_royalty" class="form-control"
                                                                placeholder="Royalty / Commission %"
                                                                value="{{ $cityRoyalty }}" />
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden-area tradePartnersInputs bdr-tp-bt-rmgroup" id="trade-partner-blocks"
                                style={{ $styleBlock }}>
                                @if (count($tradeData) == 0 && $franData->looking_tradepartner == 0 && $franData->is_dealer_distributor == 0)
                                    <div class="row myposrel">
                                        <input type="button" id="more" value="[+]" class="myposabso"
                                            style="{{ $styleBlock }}">
                                        <div class="col-xs-12 col-sm-4 paddleft30">
                                            <div class="form-group margintb15">Types of Channels</div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img
                                                            src="{{ url('images/channels.png') }}"></span>
                                                    <select name="channel_type[]" class="form-control myselectclass"
                                                        title="channel_type">
                                                        @foreach ($channel as $index => $value)
                                                            <option value="{{ $index }}">{{ $value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 padd-lft-rht">
                                            <div class="form-group margintb15">Investment (If any)</div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img
                                                            src="{{ url('images/range-rate.png') }}"></span>
                                                    <select name="trade_investment[]" class="form-control myselectclass"
                                                        title="trade_investment">
                                                        @foreach ($investmentRangeArr as $index => $value)
                                                            <option value="{{ $index }}">{{ $value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 padd-lft-rht mynewlpad">
                                            <div class="form-group smallfont">Margin / Commissions %</div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img
                                                            src="{{ url('images/commission.png') }}"></span>
                                                    <input type="text" name="trade_margin[]" pattern="[0-9]{1,2}"
                                                        minlength="1" maxlength="2" class="form-control"
                                                        placeholder="Enter Margin / Commissions %">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (count($tradeData) > 0 && $franData->looking_franchise != 1)
                                    @for ($i = 0; $i < count($tradeData); $i++)
                                        <div class="row myposrel">
                                            @if ($i == 0)
                                                <input type="button" id="more" value="[+]" class="myposabso"
                                                    style="{{ $styleBlock }}">
                                            @else
                                                <input type="button" id="close-trade-block" value="[-]"
                                                    class="myposabso" style="display:block">
                                            @endif
                                            <div class="col-xs-12 col-sm-4 paddleft30">
                                                <div class="form-group margintb15">Types of Channels</div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><img
                                                                src="{{ url('images/channels.png') }}"></span>
                                                        <select name="channel_type[]" class="form-control myselectclass"
                                                            title="channel_type">
                                                            @foreach ($channel as $index => $value)
                                                                <option value="{{ $index }}"
                                                                    @if ($tradeData[$i]->channel_type == $index) selected @endif>
                                                                    {{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 padd-lft-rht">
                                                <div class="form-group margintb15">Investment (If any)</div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><img
                                                                src="{{ url('images/range-rate.png') }}"></span>
                                                        <select name="trade_investment[]"
                                                            class="form-control myselectclass" title="trade_investment">
                                                            @foreach ($investmentRangeArr as $index => $value)
                                                                <option value="{{ $index }}"
                                                                    @if ($tradeData[$i]->trade_investment == $index) selected @endif>
                                                                    {{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 padd-lft-rht mynewlpad">
                                                <div class="form-group smallfont">Margin / Commissions %</div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><img
                                                                src="{{ url('images/commission.png') }}"></span>
                                                        <input type="text" name="trade_margin[]" pattern="[0-9]{1,2}"
                                                            minlength="1" maxlength="2" class="form-control"
                                                            placeholder="Enter Margin / Commissions %"
                                                            value="{{ $tradeData[$i]->trade_margin }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="ind_main_cat"
                                    class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Industry</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/industry.png') }}"></span>
                                        <select name="ind_main_cat" id="ind_main_cat" class="form-control myselectclass"
                                            onchange="getSubCategory(this.value)">
                                            <option value="">---- Select Industry ----</option>
                                            @foreach (Config('constants.CategoryArr') as $index => $value)
                                                <option value="{{ $index }}"
                                                    @if ($index == $franData->ind_main_cat) selected @endif>{{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="getSubCategoryData"
                                    class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Sector</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/industry.png') }}"></span>
                                        <select name="ind_cat" id="getSubCategoryData" class="form-control myselectclass"
                                            onchange="getSubCatCategory(this.value)">
                                            <option value="">---- Select Sector ----</option>
                                            @if (!empty($franData->ind_main_cat) && is_numeric($franData->ind_main_cat))
                                                @foreach (Config('constants.subCategoryArr.' . $franData->ind_main_cat) as $index => $value)
                                                    <option value="{{ $index }}"
                                                        @if ($index == $franData->ind_cat) selected @endif>
                                                        {{ $value }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="getSubCatCategoryData"
                                    class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Service /
                                    Product</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/industry.png') }}"></span>
                                        <select name="ind_sub_cat" id="getSubCatCategoryData"
                                            class="form-control myselectclass">
                                            <option value="">---- Select Service / Product ----</option>
                                            @if (!empty($franData->ind_sub_cat) && is_numeric($franData->ind_sub_cat))
                                                @foreach (Config('constants.subSubCategoryArr.' . $franData->ind_cat) as $index => $value)
                                                    <option value="{{ $index }}"
                                                        @if ($index == $franData->ind_sub_cat) selected @endif>
                                                        {{ $value }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="operations_start_year"
                                    class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Year Commenced
                                    Operations </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/year.png') }}"></span>
                                        <select name="operations_start_year" id="operations_start_year"
                                            class="form-control myselectclass">
                                            <option value="">Select Year</option>
                                            @for ($i = 1901; $i <= date('Y'); $i++)
                                                <option value='{{ $i }}'
                                                    @if ($i == $franData->operations_start_year) selected @endif>
                                                    {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="franchise_start_year"
                                    class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory"
                                    id="commencedFranText">Year Commenced Franchising </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/year2.png') }}"></span>
                                        <select name="franchise_start_year" id="franchise_start_year"
                                            class="form-control myselectclass">
                                            <option value="">Select Year</option>
                                            @for ($i = 1900; $i <= date('Y'); $i++)
                                                <option value='{{ $i }}'
                                                    @if ($i == $franData->franchise_start_year) selected @endif>
                                                    {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="no_fran_outlets"
                                    class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory"
                                    id="outletCountText">No of @if ($lookingTradePartner == 'checked' || $lookingDealerDistributor == 'checked')
                                        Dealerships
                                    @else
                                        Franchise Outlets
                                    @endif </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/franchisor-chain.png') }}"></span>
                                        <select name="no_fran_outlets" id="no_fran_outlets"
                                            class="form-control myselectclass">
                                            <option value="">Select No of Outlets</option>
                                            @foreach (Config('constants.NoOutlets') as $index => $value)
                                                {
                                                <option value='{{ $value }}'
                                                    @if ($value == $franData->no_fran_outlets) selected @endif>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group hideForTradePartner">
                                <label for="no_retail_outlets"
                                    class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">No of Retail
                                    Outlets</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/franchisor-chain.png') }}"></span>
                                        <select name="no_retail_outlets" id="no_retail_outlets"
                                            class="form-control myselectclass">
                                            <option value="">Select No of Retail Outlets</option>
                                            @foreach (Config('constants.NoOutlets') as $index => $value)
                                                {
                                                <option value='{{ $value }}'
                                                    @if ($value == $franData->no_retail_outlets) selected @endif>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group hideForTradePartner">
                                <label for="no_company_outlets"
                                    class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">No. Of Company
                                    Owned Outlets </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="form-field"
                                                src="{{ url('images/franchisor-chain.png') }}"></span>
                                        <select name="no_company_outlets" id="no_company_outlets"
                                            class="form-control myselectclass">
                                            <option value="">Select No. Of Company Owned Outlets</option>
                                            @foreach (Config('constants.NoOutlets') as $index => $value)
                                                {
                                                <option value='{{ $value }}'
                                                    @if ($value == $franData->no_company_outlets) selected @endif>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Current Outlets
                                    are located at
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row checkmargin specify">
                                        <div class="col-sm-12 row-no-padding">
                                            @foreach (Config('constants.OutletLocations') as $key => $OutletLocation)
                                                <label class="col-xs-6 col-sm-6 col-md-4">
                                                    <input type="checkbox" name="outlet_locations[]"
                                                        id="inlineCheckbox{{ $loop->index + 1 }}"
                                                        value="{{ $OutletLocation }}"
                                                        {{ in_array($OutletLocation, explode(',', $franData->outlet_locations)) ? 'checked' : '' }}>
                                                    {{ $OutletLocation }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group MarketMtrlSec">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck">Marketing
                                    Materials Available</label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row MarketMtrl">
                                        <div class="col-sm-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-4"><input type="radio"
                                                    name="marketting_material" value="Yes"
                                                    {{ $franData->marketting_materials != 'No' && $franData->marketting_materials != '' ? 'checked' : '' }}>Yes
                                            </label>
                                            <label class="col-xs-6 col-sm-6 col-md-4"><input type="radio"
                                                    name="marketting_material" value="No"
                                                    {{ $franData->marketting_materials == 'No' || $franData->marketting_materials == '' ? 'checked' : '' }}>No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group hidden-area marketingMaterialsAvailableInput"
                                style="{{ $franData->marketting_materials != 'No' && $franData->marketting_materials != '' ? 'display:block' : '' }}">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">If yes, Please
                                    Specify</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row checkmargin">
                                        <div class="col-sm-12 row-no-padding">
                                            @foreach (Config('constants.MarketingMaterials') as $key => $material)
                                                <label class="col-xs-6 col-sm-6"><input type="checkbox"
                                                        name="marketting_materials[]" value="{{ $material }}"
                                                        {{ in_array($material, explode(',', $franData->marketting_materials)) ? 'checked' : '' }}>{{ $material }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="business_desc"
                                    class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Describe your
                                    Business</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                            </div>
                            <div class="form-group">
                                <textarea name="business_desc" minlength="20" class="form-control height100" cols="70" id="business_desc">{{ $franData->business_desc }}</textarea>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row colbg text-center">
                            <input type="submit" id="step1button" class="btn btn-default" value="next" />
                        </div>
                    </div>
                </form>
            </div>
            @include('includes.franchisor-faq')
        </div>
    </div>
    <div class="heightspace"></div>
    <script src="{{ url('tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 300
        });
    </script>
    <script>
        function getSubCategory(value) {
            $.ajax({
                type: 'GET',
                url: '/getsubcategory',
                data: {
                    categoryID: value
                },
                success: function(data) {
                    $("#getSubCategoryData").html(data);
                }
            });
        }

        function getSubCatCategory(value) {
            $.ajax({
                type: 'GET',
                url: '/getsubcatcategory',
                data: {
                    subcategoryID: value
                },
                success: function(data) {
                    $("#getSubCatCategoryData").html(data);
                }
            });
        }

        function getPinCodeDetails(value) {
            if (value.length >= 6) {
                $.ajax({
                    type: 'GET',
                    url: '/getpincode',
                    data: {
                        pincode: value
                    },
                    success: function(data) {
                        $("#city").val(data.city);
                        $("#state").val(data.state);
                    }
                });
            }
        }

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }
        $(document).on('click', '#close-trade-block', function() {
            $(this).parent('div').remove();
        });

        var selectedBusinessTypeValue = $('input:radio[name="looking_franchise"]:checked').val();

        $('input:radio[name="looking_franchise"]').change(function() {
            selectedBusinessTypeValue = this.value;
            if (this.checked && "1" === this.value) {

                $(".lookingFranchisePartnerInput").show();
                $(".tradePartnersInputs").hide();
                $(".disabled-area fieldset").attr("disabled", true);
                $(".multiUnitCheckBoxes").prop("checked", !1);
                $("#more").css("display", "none");
                $("#ind_main_cat").html("<option value=''>Select Industry</option>" +
                    @foreach (Config('constants.CategoryArr') as $index => $value)
                        "<option value='{{ $index }}'>{{ $value }}</option>" +
                    @endforeach
                    "");
                $('#zoneText').html('Current Outlet Zones');
                $('#commencedFranText').html('Franchising Commenced On');
                $('#outletCountText').html('No. Of Franchise Outlets');
                $(".hideForTradePartner").show();
                $("#getSubCategoryData").html("<option value=''>Select Sector</option>");
                $("#getSubCatCategoryData").html("<option value=''>Select Service / Product</option>");
                $("#checkingTradeMaterial").find('label').first().show();
                $("#businessDescText").html(" franchising ");
            } else {
                $(".lookingFranchisePartnerInput").hide();
                $(".tradePartnersInputs").show();
                $(".lookingFrUnitInput").hide();
                $(".hideForTradePartner").hide();
                $(".lookingFrMultiUnitInput").hide();
                $('#zoneText').html('Existing Network Zones');
                $('#commencedFranText').html('Expansion Commenced On');
                $('#outletCountText').html('No. Of Channel Partners');
                $("input[name='franchise_partner_type[]']").prop("checked", !1);
                $("#more").css("display", "block");
                $("#ind_main_cat").html("<option value='5'>Dealers & Distributors</option>");
                $("#getSubCategoryData").html("<option value=''>Select Sector</option>" +
                    @foreach (Config('constants.subCategoryArr.5') as $index => $value)
                        "<option value='{{ $index }}'>{{ $value }}</option>" +
                    @endforeach
                    "");
                $("#checkingTradeMaterial").find('label').first().hide();
                $("#businessDescText").html(" channel ");
                $("#getSubCatCategoryData").html("<option value=''>Select Service / Product</option>");
            }
            checkForChannelArray();
        });

        function checkForChannelArray() {
            if (selectedBusinessTypeValue == '2') {
                $("#no_fran_outlets").find("option:first").html("Select No Of Dealerships/Distributorships");
                $("#outletCountText").html("No Of Dealerships/Distributorships");
                $('select[name="channel_type[]"]').html(
                    " @foreach (Config('constants.dealerAndDistributorChannels') as $index => $value) <option value='{{ $index }}'>{{ $value }}</option> @endforeach "
                );
            } else if (selectedBusinessTypeValue == '0') {
                $("#no_fran_outlets").find("option:first").html("Select No Of Channel Partners");
                $("#outletCountText").html("No Of Channel Partners");
                $('select[name="channel_type[]"]').html(
                    " @foreach (Config('constants.tradePartnerChannels') as $index => $value) <option value='{{ $index }}'>{{ $value }}</option>  @endforeach "
                );
            } else {
                $("#no_fran_outlets").find("option:first").html("Select No Of Outlets");
                $("#outletCountText").html("No Of Current Outlets");
                $('select[name="channel_type[]"]').html(
                    " @foreach (Config('constants.dealerAndDistributorChannels') as $index => $value) <option value='{{ $index }}'>{{ $value }}</option> @endforeach "
                );
            }
        }

        var tPCount = 2;
        $('#more').on('click', function() {
            var newfield =
                '<div class="row posrel"><hr size="5"><div class="col-xs-12 col-sm-4 paddleft30"><div class="form-group margintb15">Types of Channels</div><div class="form-group"><div class="input-group"><span class="input-group-addon"><img alt="channels" src="https://www.franchiseindia.com/images/channels.png"></span><select name="channel_type[]" class="form-control myselectclass"></select></div></div></div><div class="col-xs-12 col-sm-4 padd-lft-rht"><div class="form-group margintb15">Investment (If any)</div><div class="form-group"><div class="input-group"><span class="input-group-addon"><img alt="rate" src="https://www.franchiseindia.com/images/range-rate.png"></span><select name="trade_investment[]" class="form-control myselectclass">' +
                @foreach (Config('constants.investRangeInWords') as $index => $value)
                    '<option value="{{ $index }}">{{ $value }}</option>' +
                @endforeach
            '</select></div></div></div><div class="col-xs-12 col-sm-4 padd-lft-rht mynewlpad"><div class="form-group margintb15">Margin / Commissions %</div><div class="form-group"><div class="input-group"><span class="input-group-addon"><img alt="commission" src="https://www.franchiseindia.com/images/commission.png"></span><input type="text" name="trade_margin[]"pattern="[0-9]{1,2}" minlength="1" maxlength="2" class="form-control"  placeholder="Enter Margin / Commissions %" ></div></div></div><input type="button" id="close-trade-block" value="[-]" class="posabsoblock"></div>';
            tPCount = ++tPCount;
            $('#trade-partner-blocks').append(newfield);
            checkForChannelArray();
        });
        $(document).ready(function() {
            @if ($lookingTradePartner == 'checked')
                $(".hideForTradePartner").hide();
            @endif
            //Checking user exist
            let oldBrand = '';
            let ajaxResult = null;
            $.validator.addMethod("brandExist", function(value) {
                if (oldBrand !== value) {
                    oldBrand = value;
                    $.ajax({
                        type: 'get',
                        url: '/validate-brandname',
                        async: false,
                        data: {
                            'search': value
                        },
                        success: function(data) {
                            console.log(data);
                            ajaxResult = (data.brandname !== "");
                        }
                    });
                }
                return !ajaxResult;
            }, "Brand already exist with this brand Name");

            $("#fran-form").validate({
                ignore: "input[type='checkbox']:hidden, input[type='text']:hidden, select:hidden",
                rules: {
                    brand_name: {
                        required: true,
                        minlength: 5,
                        maxlength: 55,
                        brandExist: true
                    },
                    company_name: {
                        required: true,
                        minlength: 5,
                        maxlength: 55
                    },
                    website: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    },
                    ceo_name: {
                        required: true,
                        minlength: 3,
                        maxlength: 35
                    },
                    fran_manager: {
                        required: true,
                        minlength: 5,
                        maxlength: 35
                    },
                    fran_address: {
                        required: true,
                        minlength: 6
                    },
                    country: {
                        required: true
                    },
                    unitinv_brand_fee: {
                        required: true,
                        minlength: 3,
                        maxlength: 12
                    },
                    unitinv_royalty: {
                        required: true,
                        minlength: 1,
                        maxlength: 2
                    },
                    ceo_email: {
                        required: true,
                        email: true
                    },
                    ceo_mobile: {
                        required: true,
                        number: true
                    },
                    state: {
                        required: true,
                        lettersonly: true
                    },
                    city: {
                        required: true,
                        lettersonly: true
                    },
                    telephone: {
                        number: true
                    },
                    pincode: {
                        required: true,
                        minlength: 6,
                        maxlength: 6,
                        number: true
                    },
                    secondary_email: {
                        email: true
                    },
                    ind_main_cat: {
                        required: true
                    },
                    ind_cat: {
                        required: true
                    },
                    ind_sub_cat: {
                        required: true
                    },
                    operations_start_year: {
                        required: true
                    },
                    franchise_start_year: {
                        required: true
                    },
                    no_fran_outlets: {
                        required: true
                    },
                    no_retail_outlets: {
                        required: true
                    },
                    no_company_outlets: {
                        required: true
                    },
                    business_desc: {
                        required: true,
                        minlength: 25
                    },
                    "outlet_locations[]": {
                        required: true
                    },
                    "franchise_partner_type[]": {
                        required: true
                    },
                    "marketting_materials[]": {
                        required: true
                    },
                    "trade_margin[]": {
                        required: true
                    }
                },
                messages: {
                    brand_name: {
                        required: "Please enter brand name",
                        minlength: jQuery.format("Please enter at least {0} character brand name"),
                        maxlength: jQuery.format("Please enter maximum of {0} character brand name")
                    },
                    company_name: {
                        required: "Please enter company name",
                        minlength: jQuery.format("Please enter at least {0} character company name"),
                        maxlength: jQuery.format("Please enter maximum of {0} character company name")
                    },
                    website: {
                        required: "Please enter Website/Web-Link",
                        minlength: jQuery.format("Please enter at least {0} character Website/Web-Link"),
                        maxlength: jQuery.format("Please enter maximum of {0} character Website/Web-Link")
                    },
                    ceo_name: {
                        required: "Please enter ceo name",
                        minlength: jQuery.format("Please enter at least {0} character name"),
                        maxlength: jQuery.format("Please enter maximum of {0} character name")
                    },
                    fran_manager: {
                        required: "Please enter franchise manager",
                        minlength: jQuery.format("Please enter at least {0} character name"),
                        maxlength: jQuery.format("Please enter maximum of {0} character name")
                    },
                    fran_address: {
                        required: "Please enter franchise address",
                        minlength: jQuery.format("Please enter at least {0} word address")
                    },
                    unitinv_royalty: {
                        required: "Please enter royalty commission",
                        minlength: jQuery.format("Please enter at least {0} digit royalty commission"),
                        maxlength: jQuery.format("Please enter max {0} digit royalty commission")
                    },
                    country: "Please select country",
                    state: {
                        required: "Please select state"
                    },
                    city: {
                        required: "Please select city"
                    },
                    ceo_email: {
                        required: "Please enter email",
                        email: "Please enter valid email"
                    },
                    ceo_mobile: {
                        required: "Please enter mobile no.",
                        number: "Please enter valid number",
                        minlength: jQuery.format("Please enter at least {0} digits number"),
                        maxlength: jQuery.format("Please enter maximum of {0} digits number")
                    },
                    telephone: {
                        number: "Please enter numeric value!!!"
                    },
                    pincode: {
                        required: "Please enter pincode",
                        minlength: jQuery.format("Please enter at least {0} digits pincode"),
                        maxlength: jQuery.format("Please enter maximum of {0} digits pincode"),
                        number: "Please enter numeric value!!!"
                    },
                    secondary_email: {
                        email: "Please enter valid secondary email address"
                    },
                    ind_main_cat: "Please select category",
                    ind_cat: "Please select sub category",
                    ind_sub_cat: "Please select sub sub category",
                    operations_start_year: "Please select operation year",
                    franchise_start_year: "Please select franchise year",
                    no_fran_outlets: "Please select no of franchise outlets",
                    no_retail_outlets: "Please select no of retail outlets",
                    no_company_outlets: "Please select no of company owned outlets",
                    looking_for_expansion: "Please select expansion",
                    business_desc: "Please enter business Details (Min 25 chatacters)",
                    "outlet_locations[]": "Please select outlet locations",
                    "franchise_partner_type[]": "Please select franchise partners",
                    "marketting_materials[]": "Please select Marketing Materials",
                    "trade_margin[]": "Please enter trade margin 1% - 99%"
                },
                errorPlacement: function(error, element) {
                    error.appendTo(element.parent().parent())
                }
            });
            $(".multiUnitCheckBoxes").click(function() {
                if ($(this).is(":checked")) {
                    $(this).parent().parent().find('fieldset').removeAttr("disabled", true);
                } else {
                    $(this).parent().parent().find('fieldset').attr("disabled", true);
                }
            });

            $('#franchise_partner_type').change(function() {
                if ($(this).is(":checked")) {
                    $(".lookingFrUnitInput").show();
                } else {
                    $(".lookingFrUnitInput").hide();
                }
            });
            $('#franchise_partner_type1').change(function() {
                if ($(this).is(":checked")) {
                    $(".lookingFrMultiUnitInput").show();
                } else {
                    $(".lookingFrMultiUnitInput").hide();
                    $(".disabled-area fieldset").attr("disabled", true);
                    $(".multiUnitCheckBoxes").prop("checked", !1);
                }
            });
        });
    </script>
    <script>
        function checkbrandname() {

        }
    </script>
@endsection
