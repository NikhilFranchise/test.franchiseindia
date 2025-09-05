<style type="text/css">
    .padpro {
        padding-top: 5px;
        padding-right: 20px;
        padding-left: 20px;
        padding-bottom: 10px;
    }

    .pat {
        margin-top: 8px;
        border-top: 1px solid #ccc;
        padding-top: 5px;
    }

    .catheadnew {
        font-size: 25px;
        line-height: 25px;
    }
</style>
<div class="bor-radius backwhite marleft franchisemyprofilemain">
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3 borleft">
            @php
                $srcLogo = URL::asset('images/no-img.gif');
                if (
                    $franData->membership_type == 1 &&
                    !empty($regionFranData) &&
                    $regionFranData->membership_type == 1
                ) {
                    $srcLogo = Config::get('constants.franAwsImgPath') . $franData->company_logo;
                    if (!$srcLogo) {
                        $srcLogo = URL::asset('images/no-img.gif');
                    }
                }
            @endphp
            <img src={{ $srcLogo }} alt="{{ $franData->company_name }}" />
        </div>
        <div class="col-xs-12 col-sm-3 col-md-6 borleft">
            <div class="cathead">
                <span>{{ Config::get('constants.CategoryArr.' . $franData->ind_main_cat) }}</span>
                {{ $franData->company_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 padpro">
            <div class="catheadnew">{{ $applyCount }}
                <span>Total Applications</span>
            </div>
            <div class="catheadnew pat">{{ $franData->views }}
                <span>Total Profile Views</span>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row row-no-margin martn30 franchisemyprofileview">
    <div class="col-sm-12 col-sm-6 col-md-3 padleft10">
        <div class="backwhite arrowbg pad20">
            <div class="msectio">
                @if ($franData->prop_area_max != '')
                    <span>{{ $franData->prop_area_min . '-' . $franData->prop_area_max }} <small>Sq.ft</small></span>
                @endif
                @if ($franData->prop_area_max == '')
                    <span>Not Applicable</span>
                @endif
                Area Req
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-sm-6 col-md-3">
        <div class="backwhite rupee pad20">
            <div class="msectio">
                @if ($franData->franchisor_partner_type != 2 || $franData->franchisor_partner_type != 0)
                    @php
                        $minValue = $franData->unit_inv_min;

                        if (is_numeric($minValue) < 100000 && is_numeric($minValue) > 10000) {
                            $minValue = substr($minValuis_numeric(e) / 1000, 0, 5) . ' K';
                        }

                        if (is_numeric($minValue) <= 9999999 && is_numeric($minValue) > 100000) {
                            $minValue = substr($minValuis_numeric(e) / 100000, 0, 5) . ' Lac';
                        }

                        if (is_numeric($minValue) > 9999999) {
                            $minValue = substr($minValuis_numeric(e) / 10000000, 0, 5) . ' Cr';
                        }

                        $maxValue = $franData->unit_inv_max;
                        if (is_numeric($maxValue) < 100000 && is_numeric($maxValue) > 10000) {
                            $maxValue = substr($maxValue / 1000, 0, 5) . ' K';
                        }

                        if (is_numeric($maxValue) <= 9999999 && is_numeric($maxValue) > 100000) {
                            $maxValue = substr($maxValue / 100000, 0, 5) . ' Lac';
                        }

                        if (is_numeric($maxValue) > 9999999) {
                            $maxValue = substr($maxValue / 10000000, 0, 5) . ' Cr';
                        }

                    @endphp

                    <span> INR {{ $minValue }} - {{ $maxValue }}</span>
                @endif
                @if ($franData->franchisor_partner_type == 2 && $franData->franchisor_partner_type == 0)
                    <span>No Data</span>
                @endif
                Investment Range
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-sm-6 col-md-3">
        <div class="backwhite outlets pad20">
            <div class="msectio">
                @if ($franData->no_fran_outlets != '')
                    <span>{{ $franData->no_fran_outlets }}</span>
                @endif
                @if ($franData->no_fran_outlets == '')
                    <span>No Outlets</span>
                @endif
                Franchise Outlets
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-sm-6 col-md-3">
        <div class="backwhite usersbg pad20">
            <div class="msectio"><span>{{ $franData->ceo_name }}</span>
                CEO Name</div>
        </div>
    </div>
</div>
