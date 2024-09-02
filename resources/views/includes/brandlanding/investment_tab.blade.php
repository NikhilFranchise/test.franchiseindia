<div id="investmentnew_tab" class="tab-section">
    <!--<h2 class="tab-sec-ttl">Investment Details</h2>-->
    <h2 class="tab-sec-ttl">{{ $franDetails->company_name }} Franchise Cost & Investment</h2>
    <div class="tab-sec-topics">
        <div class="tab-sec-topics-ttl">
            Commenced Operations
        </div>
        <div class="keypoints">

            @if (!empty($franDetails->operations_start_year))
                <p>
                    Operations Commenced On
                    <span class='pull-right'>
                        {{ $franDetails->operations_start_year }}
                    </span>
                </p>
            @endif

            @if (!empty($franDetails->franchise_start_year))
                <p>
                    {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? 'Distribution' : 'Franchise' }}
                    Commenced On
                    <span class='pull-right'>
                        {{ $franDetails->franchise_start_year }}
                    </span>
                </p>
            @endif

        </div>



        <div class="tab-sec-topics-ttl mrgn-tp">
            {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? 'Distribution' : 'Franchise' }}
            Details
        </div>
        @if ($franDetails->looking_franchise == 1)
            <div class="section unitblk">
                <div class="ttl">Units</div>
                <div class="keypoints">
                    @if (!empty($franDetails->unit_investment))
                        <p>
                            Investment
                            <span class='pull-right'>
                                {{ str_replace('Rs.', 'INR', Config('constants.investRangeInWords.' . $franDetails->unit_investment)) }}
                            </span>
                        </p>
                    @endif
                    @if (!empty($franDetails->unitinv_brand_fee))
                        <p>
                            Franchise/Brand Fee
                            <span class='pull-right'>
                                INR {{ $franDetails->unitinv_brand_fee }}
                            </span>
                        </p>
                    @endif
                    @if (!empty($franDetails->unitinv_royalty))
                        <p>
                            Royalty/Commission
                            <span class='pull-right'>{{ $franDetails->unitinv_royalty }} %</span>
                        </p>
                    @endif
                </div>
            </div>

        @endif
        @if (count($franTradePartnerData))
            <div class="section">
                <div class="ttl">Trade partners</div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Types of Channels</th>
                            <th scope="col">Investment (If any)</th>
                            <th scope="col">Margin / Commissions</th>
                            <th scope="col">Area Requirement</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($franTradePartnerData as $tradeData)
                            <tr>
                                <td data-label="Types of Channels">
                                    {{ $tradeData->channel_type == 5 ? 'Distributor' : 'Dealer' }}</td>
                                <td data-label="Investment (If any)">
                                    {{ Config('constants.investRangeInWords.' . $tradeData->trade_investment) }}</td>
                                <td data-label="Margin / Commissions">{{ $tradeData->trade_margin }}%</td>
                                <td data-label="Area Requirement">
                                    @if (!empty($tradeData->area_min))
                                        {{ $tradeData->area_min }} - {{ $tradeData->area_max }} Sq.ft
                                    @else
                                        NIL
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        @if (!empty($region))
            @php
                $multiunitCount = 0;
                if ($region->countrywise == 1) {
                    $multiunitCount = ++$multiunitCount;
                }
                if ($region->regionwise == 1) {
                    $multiunitCount = ++$multiunitCount;
                }
                if ($region->statewise == 1) {
                    $multiunitCount = ++$multiunitCount;
                }
                if ($region->citywise == 1) {
                    $multiunitCount = ++$multiunitCount;
                }

            @endphp
            @if ($multiunitCount != 0)
                <div class="section">
                    <div class="ttl">Master / Multi Units</div>
                    @if ($region->countrywise == 1)
                        <div class="keypoints mdy-width mcol{{ $multiunitCount }}">
                            <p><span>Country Wise</span></p>
                            @if (!empty($region->country_investment))
                                <p>
                                    Investment
                                    <span class='pull-right'>
                                        {{ str_replace('Rs.', 'INR', Config('constants.investRangeInWords.' . $region->country_investment)) }}
                                    </span>
                                </p>
                            @endif
                            @if (!empty($region->country_unitfee))
                                <p>
                                    Unit/Brand Fee
                                    <span class='pull-right'>
                                        INR {{ $region->country_unitfee }}
                                    </span>
                                </p>
                            @endif
                            @if (!empty($region->country_masterfee))
                                <p>
                                    Master/Brand Fee
                                    <span class='pull-right'>
                                        INR {{ $region->country_masterfee }}
                                    </span>
                                </p>
                            @endif
                            @if (!empty($region->country_royalty))
                                <p>
                                    Royalty/Commission
                                    <span class='pull-right'>
                                        {{ $region->country_royalty }} %
                                    </span>
                                </p>
                            @endif
                        </div>
                    @endif

                    @if ($region->regionwise == 1)
                        <div class="keypoints mdy-width mcol{{ $multiunitCount }}">
                            <p><span>Region Wise</span></p>

                            @if (!empty($region->region_investment))
                                <p>Investment
                                    <span class='pull-right'>
                                        {{ str_replace('Rs.', 'INR', Config('constants.investRangeInWords.' . $region->region_investment)) }}
                                    </span>
                                </p>
                            @endif
                            @if (!empty($region->region_unitfee))
                                <p>
                                    Unit Fee
                                    <span class='pull-right'>
                                        INR {{ $region->region_unitfee }}
                                    </span>
                                </p>
                            @endif
                            @if (!empty($region->region_masterfee))
                                <p>Master Fee
                                    <span class='pull-right'>
                                        INR {{ $region->region_masterfee }}
                                    </span>
                                </p>
                            @endif
                            @if (!empty($region->region_royalty))
                                <p>
                                    Commission
                                    <span class='pull-right'>{{ $region->region_royalty }} %</span>
                                </p>
                            @endif
                        </div>
                    @endif

                    @if ($region->statewise == 1)
                        <div class="keypoints mdy-width mcol{{ $multiunitCount }}">
                            <p><span>State Wise</span></p>
                            @if (!empty($region->state_investment))
                                <p>
                                    Investment
                                    <span class='pull-right'>
                                        {{ str_replace('Rs.', 'INR', Config('constants.investRangeInWords.' . $region->state_investment)) }}
                                    </span>
                                </p>
                            @endif
                            @if (!empty($region->state_unitfee))
                                <p>
                                    Unit/Brand Fee
                                    <span class='pull-right'>
                                        INR {{ $region->state_unitfee }}
                                    </span>
                                </p>
                            @endif
                            @if (!empty($region->state_masterfee))
                                <p>
                                    Master/Brand Fee
                                    <span class='pull-right'>
                                        INR {{ $region->state_masterfee }}
                                    </span>
                                </p>
                            @endif
                            @if (!empty($region->state_royalty))
                                <p>
                                    Royalty/Commission
                                    <span class='pull-right'>
                                        {{ $region->state_royalty }} %
                                    </span>
                                </p>
                            @endif

                        </div>
                    @endif
                    @if ($region->citywise == 1)
                        <div class="keypoints mdy-width mcol{{ $multiunitCount }}">
                            <p><span>City Wise</span></p>
                            @if (!empty($region->city_investment))
                                <p>Investment
                                    <span class='pull-right'>
                                        {{ str_replace('Rs.', 'INR', Config('constants.investRangeInWords.' . $region->city_investment)) }}
                                    </span>
                                </p>
                            @endif
                            @if (!empty($region->city_unitfee))
                                <p>
                                    Unit/Brand Fee
                                    <span class='pull-right'>
                                        INR {{ $region->city_unitfee }}
                                    </span>
                                </p>
                            @endif
                            @if (!empty($region->city_masterfee))
                                <p>
                                    Master/Brand Fee
                                    <span class='pull-right'>
                                        INR {{ $region->city_masterfee }}
                                    </span>
                                </p>
                            @endif
                            @if (!empty($region->city_royalty))
                                <p>Royalty/Commission<span class='pull-right'>
                                        {{ $region->city_royalty }} %
                                    </span>
                                </p>
                            @endif

                        </div>
                    @endif

                </div>
            @endif
        @endif
        <!--<div class="tab-sec-topics-ttl mrgn-tp"> {{ $franDetails->looking_franchise == 1 ? 'Franchise' : 'Dealership' }} Details </div>-->
        <div class="tab-sec-topics-ttl mrgn-tp">Details </div>
        <div class="keypoints">

            @if ($franDetails->is_territorial_rights == 1)
                <p>
                    Exclusive territorial rights to a
                    {{ $franDetails->looking_franchise == 1 ? 'unit franchisee' : 'channel partner' }}
                    <span class='pull-right fnone'> Yes </span>
                </p>
            @endif

            @if ($franDetails->is_perform_guarranty == 1)
                <p>
                    Performance guarantee to
                    {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? 'Channel Partner' : 'Unit Franchise' }}
                    <span class='pull-right fnone'> Yes </span>
                </p>
            @endif

            @if (!empty($franDetails->anticipated_roi))
                <p>
                    Anticipated percentage return on investment
                    <span class='pull-right fnone'>
                        {{ $franDetails->anticipated_roi }} %
                    </span>
                </p>
            @endif

            @if (!empty($franDetails->payback_period))
                <p>
                    Likely pay back period of capital for a
                    {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? 'Channel Partner' : 'Unit Franchise' }}
                    <span class='pull-right fnone'>
                        {{ str_replace('Year', 'Years', str_replace('Month', 'Months', $franDetails->payback_period)) }}
                    </span>
                </p>
            @endif

            @if (!empty($franDetails->other_investment_req))
                <p>
                    Other investment requirements
                    <span class='pull-right fnone'>
                        {{ $franDetails->other_investment_req }}
                    </span>
                </p>
            @endif

        </div>


        <!--<div class="tab-sec-topics-ttl mrgn-tp"> Expansion Locations </div>
        <div class="row expansion">

            @php
                $keys = array_keys(array_column($stateList, 'region'), 'North');
                $northStates = '';
                foreach ($keys as $val) {
                    $northStates .= $stateList[$val]['state'] . ', ';
                }
                $northStatesStr = rtrim($northStates, ', ');
                $stateArr = array_unique(explode(', ', $northStatesStr));
                $northStates = implode(', ', $stateArr);

                if (empty($stateList)) {
                    foreach (Config('location.northStates') as $val) {
                        $northStates .= $val . ', ';
                    }
                    $northStates = rtrim($northStates, ', ');
                }

            @endphp
            <div class="col-xs-12 col-md-4">
                <div class="section">
                    <div class="ttl">North</div>
                    <div class="keypoints">
                        <p>
                            {{ $northStates ?: '- NA -' }}
                        </p>
                    </div>
                </div>
            </div>

            @php
                $keys = array_keys(array_column($stateList, 'region'), 'South');
                $southStates = '';
                foreach ($keys as $val) {
                    $southStates .= $stateList[$val]['state'] . ', ';
                }
                $southStatesStr = rtrim($southStates, ', ');
                $stateArr = array_unique(explode(', ', $southStatesStr));
                $southStates = implode(', ', $stateArr);

                if (empty($stateList)) {
                    foreach (Config('location.southStates') as $val) {
                        $southStates .= $val . ', ';
                    }
                    $southStates = rtrim($southStates, ', ');
                }

            @endphp
            <div class="col-xs-12 col-md-4">
                <div class="section">
                    <div class="ttl">South</div>
                    <div class="keypoints">
                        <p>
                            {{ $southStates ?: '- NA -' }}
                        </p>
                    </div>
                </div>
            </div>

            @php
                $keys = array_keys(array_column($stateList, 'region'), 'East');
                $eastStates = '';
                foreach ($keys as $val) {
                    $eastStates .= $stateList[$val]['state'] . ', ';
                }
                $eastStatesStr = rtrim($eastStates, ', ');
                $stateArr = array_unique(explode(', ', $eastStatesStr));
                $eastStates = implode(', ', $stateArr);

                if (empty($stateList)) {
                    foreach (Config('location.eastStates') as $val) {
                        $eastStates .= $val . ', ';
                    }
                    $eastStates = rtrim($eastStates, ', ');
                }

            @endphp
            <div class="col-xs-12 col-md-4">
                <div class="section">
                    <div class="ttl">East</div>
                    <div class="keypoints">
                        <p>
                            {{ $eastStates ?: '- NA -' }}
                        </p>
                    </div>
                </div>
            </div>

            @php
                $keys = array_keys(array_column($stateList, 'region'), 'West');
                $westStates = '';
                foreach ($keys as $val) {
                    $westStates .= $stateList[$val]['state'] . ', ';
                }

                $westStatesStr = rtrim($westStates, ', ');
                $stateArr = array_unique(explode(', ', $westStatesStr));
                $westStates = implode(', ', $stateArr);

                if (empty($stateList)) {
                    foreach (Config('location.westStates') as $val) {
                        $westStates .= $val . ', ';
                    }
                    $westStates = rtrim($westStates, ', ');
                }

            @endphp
            <div class="col-xs-12 col-md-4">
                <div class="section">
                    <div class="ttl">West</div>
                    <div class="keypoints">
                        <p>
                            {{ $westStates ?: '- NA -' }}
                        </p>
                    </div>
                </div>
            </div>

            @php
                $keys = array_keys(array_column($stateList, 'region'), 'Center');
                $centerStates = '';
                foreach ($keys as $val) {
                    $centerStates .= $stateList[$val]['state'] . ', ';
                }

                $centerStatesStr = rtrim($centerStates, ', ');
                $stateArr = array_unique(explode(', ', $centerStatesStr));
                $centerStates = implode(', ', $stateArr);

                if (empty($stateList)) {
                    foreach (Config('location.centralStates') as $val) {
                        $centerStates .= $val . ', ';
                    }
                    $centerStates = rtrim($centerStates, ', ');
                }
            @endphp
            <div class="col-xs-12 col-md-4">
                <div class="section">
                    <div class="ttl">Central</div>
                    <div class="keypoints">
                        <p>
                            {{ $centerStates ?: '- NA -' }}
                        </p>
                    </div>
                </div>
            </div>

            @php
                $keys = array_keys(array_column($stateList, 'region'), 'UT');
                $utStates = '';
                foreach ($keys as $val) {
                    $utStates .= $stateList[$val]['state'] . ', ';
                }

                $utStatesStr = rtrim($utStates, ', ');
                $stateArr = array_unique(explode(', ', $utStatesStr));
                $utStates = implode(', ', $stateArr);

                if (empty($stateList)) {
                    foreach (Config('location.unionTerriotoryStates') as $val) {
                        $utStates .= $val . ', ';
                    }
                    $utStates = rtrim($utStates, ', ');
                }

            @endphp
            <div class="col-xs-12 col-md-4">
                <div class="section">
                    <div class="ttl">Union Territories</div>
                    <div class="keypoints">
                        <p>
                            {{ $utStates ?: '- NA -' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>-->
        <!--<div class="tab-sec-topics-ttl mrgn-tp"> {{ $franDetails->looking_franchise == 1 ? 'Franchise' : 'Dealership' }} Details </div>
        <div class="keypoints">

            @if ($franDetails->is_territorial_rights == 1)
<p>
                    Exclusive territorial rights to a {{ $franDetails->looking_franchise == 1 ? 'unit franchisee' : 'channel partner' }}
                    <span class='pull-right fnone'> Yes </span>
                </p>
@endif

            @if ($franDetails->is_perform_guarranty == 1)
<p>
                    Performance guarantee to {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? 'Channel Partner' : 'Unit Franchise' }}
                    <span class='pull-right fnone'> Yes </span>
                </p>
@endif

            @if (!empty($franDetails->anticipated_roi))
<p>
                    Anticipated percentage return on investment
                    <span class='pull-right fnone'>
                        {{ $franDetails->anticipated_roi }} %
                    </span>
                </p>
@endif

            @if (!empty($franDetails->payback_period))
<p>
                    Likely pay back period of capital for a {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? 'Channel Partner' : 'Unit Franchise' }}
                    <span class='pull-right fnone'>
                        {{ str_replace('Year', 'Years', str_replace('Month', 'Months', $franDetails->payback_period)) }}
                    </span>
                </p>
@endif

            @if (!empty($franDetails->other_investment_req))
<p>
                    Other investment requirements
                    <span class='pull-right fnone'>
                        {{ $franDetails->other_investment_req }}
                    </span>
                </p>
@endif

        </div>-->
    </div>
</div>


<div id="investmentnew_tab" class="tab-section">
    <!--<h2 class="tab-sec-ttl">Expansion Locations</h2>-->
    <h2 class="tab-sec-ttl">{{ $franDetails->company_name }} Expansion Plans</h2>

    <!--<div class="tab-sec-topics-ttl mrgn-tp"> Expansion Locations </div>-->
    <div class="row expansion">
        <div class="tab-sec-topics">
            @php
                $keys = array_keys(array_column($stateList, 'region'), 'North');
                $northStates = '';
                foreach ($keys as $val) {
                    $northStates .= $stateList[$val]['state'] . ', ';
                }
                $northStatesStr = rtrim($northStates, ', ');
                $stateArr = array_unique(explode(', ', $northStatesStr));
                $northStates = implode(', ', $stateArr);

                if (empty($stateList)) {
                    foreach (Config('location.northStates') as $val) {
                        $northStates .= $val . ', ';
                    }
                    $northStates = rtrim($northStates, ', ');
                }

            @endphp
            <div class="col-xs-12 col-md-4">
                <div class="section">
                    <div class="ttl">North</div>
                    <div class="keypoints">
                        <p>
                            {{ $northStates ?: '- NA -' }}
                        </p>
                    </div>
                </div>
            </div>

            @php
                $keys = array_keys(array_column($stateList, 'region'), 'South');
                $southStates = '';
                foreach ($keys as $val) {
                    $southStates .= $stateList[$val]['state'] . ', ';
                }
                $southStatesStr = rtrim($southStates, ', ');
                $stateArr = array_unique(explode(', ', $southStatesStr));
                $southStates = implode(', ', $stateArr);

                if (empty($stateList)) {
                    foreach (Config('location.southStates') as $val) {
                        $southStates .= $val . ', ';
                    }
                    $southStates = rtrim($southStates, ', ');
                }

            @endphp
            <div class="col-xs-12 col-md-4">
                <div class="section">
                    <div class="ttl">South</div>
                    <div class="keypoints">
                        <p>
                            {{ $southStates ?: '- NA -' }}
                        </p>
                    </div>
                </div>
            </div>

            @php
                $keys = array_keys(array_column($stateList, 'region'), 'East');
                $eastStates = '';
                foreach ($keys as $val) {
                    $eastStates .= $stateList[$val]['state'] . ', ';
                }
                $eastStatesStr = rtrim($eastStates, ', ');
                $stateArr = array_unique(explode(', ', $eastStatesStr));
                $eastStates = implode(', ', $stateArr);

                if (empty($stateList)) {
                    foreach (Config('location.eastStates') as $val) {
                        $eastStates .= $val . ', ';
                    }
                    $eastStates = rtrim($eastStates, ', ');
                }

            @endphp
            <div class="col-xs-12 col-md-4">
                <div class="section">
                    <div class="ttl">East</div>
                    <div class="keypoints">
                        <p>
                            {{ $eastStates ?: '- NA -' }}
                        </p>
                    </div>
                </div>
            </div>

            @php
                $keys = array_keys(array_column($stateList, 'region'), 'West');
                $westStates = '';
                foreach ($keys as $val) {
                    $westStates .= $stateList[$val]['state'] . ', ';
                }

                $westStatesStr = rtrim($westStates, ', ');
                $stateArr = array_unique(explode(', ', $westStatesStr));
                $westStates = implode(', ', $stateArr);

                if (empty($stateList)) {
                    foreach (Config('location.westStates') as $val) {
                        $westStates .= $val . ', ';
                    }
                    $westStates = rtrim($westStates, ', ');
                }

            @endphp
            <div class="col-xs-12 col-md-4">
                <div class="section">
                    <div class="ttl">West</div>
                    <div class="keypoints">
                        <p>
                            {{ $westStates ?: '- NA -' }}
                        </p>
                    </div>
                </div>
            </div>

            @php
                $keys = array_keys(array_column($stateList, 'region'), 'Center');
                $centerStates = '';
                foreach ($keys as $val) {
                    $centerStates .= $stateList[$val]['state'] . ', ';
                }

                $centerStatesStr = rtrim($centerStates, ', ');
                $stateArr = array_unique(explode(', ', $centerStatesStr));
                $centerStates = implode(', ', $stateArr);

                if (empty($stateList)) {
                    foreach (Config('location.centralStates') as $val) {
                        $centerStates .= $val . ', ';
                    }
                    $centerStates = rtrim($centerStates, ', ');
                }
            @endphp
            <div class="col-xs-12 col-md-4">
                <div class="section">
                    <div class="ttl">Central</div>
                    <div class="keypoints">
                        <p>
                            {{ $centerStates ?: '- NA -' }}
                        </p>
                    </div>
                </div>
            </div>

            @php
                $keys = array_keys(array_column($stateList, 'region'), 'UT');
                $utStates = '';
                foreach ($keys as $val) {
                    $utStates .= $stateList[$val]['state'] . ', ';
                }

                $utStatesStr = rtrim($utStates, ', ');
                $stateArr = array_unique(explode(', ', $utStatesStr));
                $utStates = implode(', ', $stateArr);

                if (empty($stateList)) {
                    foreach (Config('location.unionTerriotoryStates') as $val) {
                        $utStates .= $val . ', ';
                    }
                    $utStates = rtrim($utStates, ', ');
                }

            @endphp
            <div class="col-xs-12 col-md-4">
                <div class="section">
                    <div class="ttl">Union Territories</div>
                    <div class="keypoints">
                        <p>
                            {{ $utStates ?: '- NA -' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p>&nbsp;</p>
</div>
<div id="investmentnew_tab" class="tab-section">
    @php
        $maincat = Config('constants.CategoryArr.' . $franDetails->ind_main_cat);
    @endphp
    <span><strong>Tags:</strong></span>
    @foreach ($stateList as $state)
        @php
            // Find the key of the matching state in stateArr
            $stateKey = array_search($state['state'], Config::get('location.stateArr'));
        @endphp
        @if ($stateKey !== false)
            {{-- https://www.franchiseindia.com/business-opportunities/education-in-andaman-and-nicobar/mc-3/loc-35 --}}
            {{-- Generate the URL for the matching state --}}
            <a
                href="{{ url('business-opportunities/' . strtolower(str_replace(' ', '-', $maincat)) . '-in-' . strtolower(str_replace(' ', '-', Config::get('location.stateArr')[$stateKey])) . '/mc-' . $franDetails->ind_main_cat . '/loc' . $stateKey) }}">
                {{ $maincat . ' Business Franchise in ' . $state['state'] . ' || ' }}
            </a>
        @endif
    @endforeach
</div>
