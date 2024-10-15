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




    </div>
</div>


<div id="investmentnew_tab" class="tab-section">
    <h2 class="tab-sec-ttl">{{ $franDetails->company_name }} Expansion Plans</h2>

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
<!-- recent activities -->
<style>
    .recent-activities {
        font-family: 'Open Sans Regular', serif;
        width: 100%;
        margin-bottom: 30px;
        height: auto;
        background: #ECF1F524;
        mix-blend-mode: normal;
        backdrop-filter: blur(15px);
        box-shadow: 0px 20px 53px -30px rgba(95, 102, 173, 0.566816);
        border-radius: 10px;
    }

    .recent-activities h3 {
        font-style: normal;
        font-weight: bold;
        font-size: 22px;
        line-height: 30px;
        color: #FFFFFF;
        margin-left: 66px;
        margin-top: 40px;
    }

    .recent-activities label {
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 22px;
        /* identical to box height */
        margin-left: 66px;
        margin-top: 10px;
        color: #FFFFFF;
    }

    .recent-activities .box {
        width: 100%;
        height: auto;
        background: #fbfcfd;
        margin-top: 35px;
        padding-bottom: 0px;
    }

    .recent-activities .box .container {
        width: 100%;
        height: auto;
        display: flex;
    }

    .recent-activities .box .container .recent-lines {
        margin-left: 0px;
        margin-top: 0px;
    }

    .recent-activities .box .container .recent-lines .dot {
        width: 14px;
        height: 14px;
        background: #D1D6E6;
        border-radius: 7px;
    }

    .recent-activities .box .container .recent-lines .recent-line {
        height: 84px;
        width: 2px;
        background: #D1D6E6;
        margin-left: 5.3px;
    }

    .recent-activities .box .container .cards {
        margin-left: 12px;
        transform: translateY(-28px);
        width: 100%;
    }

    .recent-activities .box .container .cards .card p {
        margin-bottom: 0px;
    }

    .recent-activities .box .container .cards .card {
        border: none;
        width: 100%;
        height: auto;
        padding-top: 25px;
        background: #FFFFFF;
        border-radius: 10px;
        margin-bottom: 0px;
        box-shadow: none;
        padding-left: :0px !important;
    }

    .recent-activities .box .container .cards .card.mid {
        height: auto;
    }

    .recent-activities .box .container .cards .card .recent-date {
        font-style: normal;
        font-weight: bold;
        font-size: 12px;
        line-height: 19px;
        margin-left: 5px;
        margin-bottom: 5px;
        color: #666666;
    }

    .recent-activities .box .container .cards .card p {
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 22px;
        color: #666666;
        margin-left: 2px;
    }

    .recent-activities .box .container .cards .card a {
        color: #666666;
        text-decoration: none;
        font-weight: bold;
        font-size: 16px;
        line-height: 25px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: block;
    }

    .recent-activities .box .bottom {
        width: 100%;
        height: 107px;
        background: #fff;
        box-shadow: 0 0 2px #eeeeee50;
        padding-top: 45px;
    }

    .recent-activities .box .bottom .btn {
        width: 249px;
        height: 62px;
        background: #FFFFFF40;
        mix-blend-mode: normal;
        cursor: pointer;
        border: 1px solid #8260D780;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-style: normal;
        font-weight: bold;
        font-size: 14px;
        line-height: 19px;
        color: #2B2862;
        margin-left: 53px;
        transition: 0.3s;
        background: #2B2862;
        color: #fff;
        border-color: #2B2862;
    }

    .recent-activities .box .bottom .btn:hover {
        transform: scale(1.03);
    }

    .recent-line:last-child {
        display: none;
    }

    .brand-tags {
        padding-bottom: 20px;
    }

    @media screen and (max-width:768px) {
        .recent-lines{height: 100px;}
        .recent-activities .box .container .cards .card a {
            font-size: 15px;
            line-height: 20px;
            white-space: normal;
            height: 44px;
        }
        .recent-activities .box .container .cards .card{padding-top: 20px;}
    }

        .dots {
            height: 2px;
            width: 2px;
            display: inline-block;
            background-color: #555555;
            border-radius: 50%;
            margin-bottom: 0px;
            vertical-align: middle;
            border-radius: 200%;
        }
        .tab-sec-ttl-recent{
            border-bottom: 1px solid #dbdbdb;
            font-family: 'Open Sans Light', serif;
            font-size: 18px;
            line-height: 18px;
            padding-bottom: 7px;
            text-transform: uppercase;
            margin-bottom: 0;
            margin-top: 0;
        }

</style>
<div id="investmentnew_tab" class="tab-section">

    @if ($combinedDataCollection != null && $combinedDataCollection->isNotEmpty())
        <h2 class="tab-sec-ttl-recent">Recent Updates</h2>
        <div class="recent-activities">
            <div class="box">
                <div class="container">
                    <div class="recent-lines">
                        @foreach ($combinedDataCollection as $index => $data)
                            <div class="dot"></div>
                            @if ($index < count($combinedDataCollection) - 1)
                                <div class="recent-line"></div>
                            @endif
                        @endforeach
                    </div>
                    <div class="cards">
                        @foreach ($combinedDataCollection as $index => $data)
                            <div class="card">
                                @if (is_array($data))
                                    <div class="recent-date">{{ date('d-M-Y', strtotime($data['created_at'])) }}</div>
                                    <p><a href="{{ $data['url'] }}" target="_blank">{{ ucwords($data['title']) }}</a></p>
                                @elseif(is_object($data))
                                    <div class="recent-date">{{ date('d-M-Y', strtotime($data->created_at)) }}</div>
                                    <p><a href="{{ $data->url }}" target="_blank">{{ ucwords($data->title) }}</a></p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    @else
        <style>
            .tab-sec-ttl-recent,
            .recent-activities {
                display: none;
            }
        </style>
    @endif
    <div class="brand-tags">
        <span><strong>Tags:</strong></span>
        @php
            $maincat = Config('constants.CategoryArr.' . $franDetails->ind_main_cat);
            $renderedStates = [];
        @endphp
        @foreach ($stateList as $state)
            @php

                $stateKey = array_search($state['state'], Config::get('location.stateArr'));
            @endphp

            @if ($stateKey !== false && !in_array($state['state'], $renderedStates))

                @php
                    $renderedStates[] = $state['state'];
                @endphp


                <a
                    href="{{ url('business-opportunities/' . strtolower(str_replace(' ', '-', $maincat)) . '-in-' . strtolower(str_replace(' ', '-', Config::get('location.stateArr')[$stateKey])) . '/mc-' . $franDetails->ind_main_cat . '/loc-' . $stateKey) }}">
                    {{ $maincat . ' Business Franchise in ' . $state['state'] }}
                </a>&nbsp;<span class="dots"></span>&nbsp;
            @endif
        @endforeach
    </div>
</div>
<!-- recent activities -->
