<div id="investmentnew_tab" class="tab-section brandcontenthindi">
    <h2 class="tab-sec-ttl">निवेश विवरण</h2>
    <div class="tab-sec-topics">
        <div class="tab-sec-topics-ttl">
            प्रारंभिक तिथियां
        </div>
        <div class="keypoints">

            @if(!empty( $franDetails->operations_start_year ))
                <p>
                    तिथि शुरू की गई संचालन
                    <span class='pull-right'>{{ $franDetails->operations_start_year }}</span>
                </p>
            @endif

            @if(!empty( $franDetails->franchise_start_year ))
                <p>
                    तिथि शुरू {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? "वितरण" : "फ्रेंचाइजी" }}
                    <span class='pull-right'>{{ $franDetails->franchise_start_year }}</span>
                </p>
            @endif

        </div>
        <div class="tab-sec-topics-ttl mrgn-tp">
            {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? "वितरण" : "फ्रेंचाइजी" }} विवरण
        </div>
        @if( $franDetails->looking_franchise == 1)
            <div class="section unitblk">
            <div class="ttl">इकाइयों</div>
            <div class="keypoints">
                @if(!empty( $franDetails->unit_investment ))
                    <p>
                        निवेश
                        <span class='pull-right'>
                           {{ str_replace( 'Rs.' , 'INR', Config('constants.investRangeInWords.'.$franDetails->unit_investment)) }}
                        </span>
                    </p>
                @endif
                @if(!empty( $franDetails->unitinv_brand_fee ))
                    <p>
                        फ्रैंचाइज़ी / ब्रांड शुल्क
                        <span class='pull-right'>
                            INR {{ $franDetails->unitinv_brand_fee }}
                        </span>
                    </p>
                @endif
                @if(!empty( $franDetails->unitinv_royalty ))
                    <p>
                        रॉयल्टी / आयोग
                        <span class='pull-right'>{{ $franDetails->unitinv_royalty }} %</span>
                    </p>
                @endif
            </div>
        </div>
        @endif

        @if(count($franTradePartnerData))
            <div class="section">
                <div class="ttl">व्यापार भागीदार</div>
                <table>
                    <thead>
                    <tr>
                        <th scope="col">चैनल के प्रकार</th>
                        <th scope="col">निवेश (यदि कोई है)</th>
                        <th scope="col">मार्जिन / कमीशन</th>
                        <th scope="col">क्षेत्र की आवश्यकता</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($franTradePartnerData as $tradeData)
                        <tr>
                            {{-- <td data-label="Types of Channels">{{$tradeData->channel_type}}</td> --}}
                            <td data-label="Types of Channels">
                                @if($tradeData->channel_type == 2)
                                डीएसए
                                @elseif($tradeData->channel_type == 3)
                                पुनर्विक्रेता
                                @elseif($tradeData->channel_type == 4)
                                एमएलएम
                                @elseif($tradeData->channel_type == 6)
                                सी एवं एफ
                                @elseif($tradeData->channel_type == 8)
                                प्रतिनिधि
                                @elseif($tradeData->channel_type == 9)
                                चैनल पार्टनर
                                @elseif($tradeData->channel_type == 10)
                                एजेंसी पार्टनर
                                @elseif($tradeData->channel_type == 11)
                                सहयोगी भागीदार
                                @else
                                    {{ $tradeData->channel_type == 5 ? 'वितरक' : 'विक्रेता' }}
                                @endif
                            </td>
                            <td data-label="Investment (If any)">{{Config('constants.investRangeInWords.'.$tradeData->trade_investment)}}</td>
                            <td data-label="Margin / Commissions">{{$tradeData->trade_margin}}%</td>
                            <td data-label="Area Requirement">@if(!empty($tradeData->area_min)){{$tradeData->area_min}} - {{$tradeData->area_max}} Sq.ft @else NIL @endif</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        @if(!empty($region))
            @php
                $multiunitCount = 0;
                if($region->countrywise == 1)
                    $multiunitCount = ++$multiunitCount;
                if($region->regionwise == 1)
                    $multiunitCount = ++$multiunitCount;
                if($region->statewise == 1)
                    $multiunitCount = ++$multiunitCount;
                if($region->citywise == 1)
                    $multiunitCount = ++$multiunitCount;

            @endphp
            @if($multiunitCount != 0)
                <div class="section">
                    <div class="ttl">मास्टर / मल्टी यूनिट्स</div>
                    @if($region->countrywise == 1)
                        <div class="keypoints mdy-width mcol{{$multiunitCount}}">
                            <p><span>देश अनुसार</span></p>
                            @if( !empty($region->country_investment ))
                                <p>
                                    निवेश
                                    <span class='pull-right'>{{ str_replace( 'Rs.' , 'INR', Config('constants.investRangeInWords.'.$region->country_investment)) }}</span>
                                </p>
                            @endif
                            @if( !empty($region->country_unitfee ))
                                <p>
                                    यूनिट / ब्रांड शुल्क
                                    <span class='pull-right'>
                                INR {{ $region->country_unitfee }}
                            </span>
                                </p>
                            @endif
                            @if( !empty($region->country_masterfee ))
                                <p>
                                    मास्टर / ब्रांड शुल्क
                                    <span class='pull-right'>
                                INR {{ $region->country_masterfee }}
                            </span>
                                </p>
                            @endif
                            @if( !empty($region->country_royalty ))
                                <p>
                                    रॉयल्टी / आयोग
                                    <span class='pull-right'>
                                {{ $region->country_royalty }} %
                            </span>
                                </p>
                            @endif
                        </div>
                    @endif

                    @if($region->regionwise == 1)
                        <div class="keypoints mdy-width mcol{{$multiunitCount}}">
                            <p><span>क्षेत्र अनुसार</span></p>

                            @if(!empty($region->region_investment))
                                <p>
                                    निवेश
                                    <span class='pull-right'>
                                        {{ str_replace( 'Rs.' , 'INR', Config('constants.investRangeInWords.'.$region->region_investment))}}
                                    </span>
                                </p>
                            @endif
                            @if(!empty($region->region_unitfee))
                                <p>
                                    यूनिट / ब्रांड शुल्क
                                    <span class='pull-right'>
                                        INR {{ $region->region_unitfee }}
                                    </span>
                                </p>
                            @endif
                            @if(!empty($region->region_masterfee))
                                <p>
                                    मास्टर / ब्रांड शुल्क
                                    <span class='pull-right'>
                                        INR {{ $region->region_masterfee }}
                                    </span>
                                </p>
                            @endif
                            @if(!empty($region->region_royalty))
                                <p>
                                    रॉयल्टी / आयोग
                                    <span class='pull-right'>{{ $region->region_royalty }} %</span>
                                </p>
                            @endif
                        </div>
                    @endif

                    @if($region->statewise == 1)
                        <div class="keypoints mdy-width mcol{{$multiunitCount}}">
                            <p><span>राज्य अनुसार</span></p>
                            @if(!empty($region->state_investment))
                                <p>
                                    निवेश
                                    <span class='pull-right'>{{ str_replace( 'Rs.' , 'INR', Config('constants.investRangeInWords.'.$region->state_investment)) }}</span>
                                </p>
                            @endif
                            @if(!empty($region->state_unitfee))
                                <p>
                                    यूनिट / ब्रांड शुल्क
                                    <span class='pull-right'>INR {{ $region->state_unitfee }}</span>
                                </p>
                            @endif
                            @if(!empty($region->state_masterfee))
                                <p>
                                    मास्टर / ब्रांड शुल्क
                                    <span class='pull-right'>INR {{ $region->state_masterfee }}</span>
                                </p>
                            @endif
                            @if(!empty($region->state_royalty))
                                <p>
                                    रॉयल्टी / आयोग
                                    <span class='pull-right'>{{ $region->state_royalty }} %</span>
                                </p>
                            @endif

                        </div>
                    @endif
                    @if($region->citywise == 1)
                        <div class="keypoints mdy-width mcol{{$multiunitCount}}">
                            <p><span>शहर अनुसार</span></p>
                            @if(!empty($region->city_investment))
                                <p>
                                    निवेश
                                    <span class='pull-right'>{{ str_replace( 'Rs.' , 'INR', Config('constants.investRangeInWords.'.$region->city_investment)) }}</span>
                                </p>
                            @endif
                            @if(!empty($region->city_unitfee))
                                <p>
                                    यूनिट / ब्रांड शुल्क
                                    <span class='pull-right'>INR {{ $region->city_unitfee }}</span>
                                </p>
                            @endif
                            @if(!empty($region->city_masterfee))
                                <p>
                                    मास्टर / ब्रांड शुल्क
                                    <span class='pull-right'>INR {{ $region->city_masterfee }}</span>
                                </p>
                            @endif
                            @if(!empty($region->city_royalty))
                                <p>
                                    रॉयल्टी / आयोग
                                    <span class='pull-right'>{{ $region->city_royalty }} %</span>
                                </p>
                            @endif

                        </div>
                    @endif

                </div>
            @endif
        @endif

        <div class="tab-sec-topics-ttl mrgn-tp">विस्तार स्थान</div>
        <div class="row expansion">

            @php
                $keys = array_keys(array_column($stateList, 'region'), 'North');
                 $northStates = '';
                 foreach ($keys as $val) {
                     $northStates .= Config('location.hindiStatesArr.'.$stateList[$val]['state']) . ', ';
                 }
                 $northStatesStr = rtrim($northStates, ', ');
                 $stateArr       = array_unique(explode(', ', $northStatesStr));
                 $northStates    = implode(', ', $stateArr);

                 if(empty($stateList)) {
                     foreach (Config('location.northStates') as $val)
                         $northStates .= $val.", ";
                     $northStates = rtrim($northStates, ', ');
                 }

            @endphp
            <div class="col-xs-12 col-md-4">
                <div class="section">
                    <div class="ttl">उत्तर</div>
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
                  $southStates .= Config('location.hindiStatesArr.'.$stateList[$val]['state']) . ', ';
                }
                $southStatesStr = rtrim($southStates, ', ');
                $stateArr       = array_unique(explode(', ', $southStatesStr));
                $southStates    = implode(', ', $stateArr);

                if(empty($stateList)) {
                     foreach (Config('location.southStates') as $val)
                         $southStates .= $val.", ";
                     $southStates = rtrim($southStates, ', ');
                 }

            @endphp
            <div class="col-xs-12 col-md-4">
                <div class="section">
                    <div class="ttl">दक्षिण</div>
                    <div class="keypoints">
                        <p>
                            {{ $southStates ?: '- NA -'}}
                        </p>
                    </div>
                </div>
            </div>

            @php
                $keys = array_keys(array_column($stateList, 'region'), 'East');
                $eastStates = '';
                foreach ($keys as $val) {
                  $eastStates .= Config('location.hindiStatesArr.'.$stateList[$val]['state']) . ', ';
                }
                $eastStatesStr = rtrim($eastStates, ', ');
                $stateArr       = array_unique(explode(', ', $eastStatesStr));
                $eastStates    = implode(', ', $stateArr);

                 if(empty($stateList)) {
                     foreach (Config('location.eastStates') as $val)
                         $eastStates .= $val.", ";
                     $eastStates = rtrim($eastStates, ', ');
                 }

            @endphp
            <div class="col-xs-12 col-md-4">
                <div class="section">
                    <div class="ttl">पूर्व</div>
                    <div class="keypoints">
                        <p>
                            {{ $eastStates ?: '- NA -'}}
                        </p>
                    </div>
                </div>
            </div>

            @php
                $keys = array_keys(array_column($stateList, 'region'), 'West');
                $westStates = '';
                foreach ($keys as $val) {
                    $westStates .= Config('location.hindiStatesArr.'.$stateList[$val]['state']) . ', ';
                }

                $westStatesStr = rtrim($westStates, ', ');
                $stateArr      = array_unique(explode(', ', $westStatesStr));
                $westStates    = implode(', ', $stateArr);

                if(empty($stateList)) {
                    foreach (Config('location.westStates') as $val)
                        $westStates .= $val.", ";
                    $westStates = rtrim($westStates, ', ');
                }

            @endphp
            <div class="col-xs-12 col-md-4">
                <div class="section">
                    <div class="ttl">पश्चिम</div>
                    <div class="keypoints">
                        <p>
                            {{ $westStates ?: '- NA -'}}
                        </p>
                    </div>
                </div>
            </div>

            @php
                $keys = array_keys(array_column($stateList, 'region'), 'Center');
                $centerStates = '';
                foreach ($keys as $val) {
                 $centerStates .= Config('location.hindiStatesArr.'.$stateList[$val]['state']) . ', ';
                }

                $centerStatesStr = rtrim($centerStates, ', ');
                $stateArr        = array_unique(explode(', ', $centerStatesStr));
                $centerStates    = implode(', ', $stateArr);

                if(empty($stateList)) {
                     foreach (Config('location.centralStates') as $val)
                         $centerStates .= $val.", ";
                     $centerStates = rtrim($centerStates, ', ');
                 }
            @endphp
            <div class="col-xs-12 col-md-4">
                <div class="section">
                    <div class="ttl">केंद्रीय</div>
                    <div class="keypoints">
                        <p>
                            {{ $centerStates ?: '- NA -'}}
                        </p>
                    </div>
                </div>
            </div>

            @php
                $keys     = array_keys(array_column($stateList, 'region'), 'UT');
                $utStates = '';
                foreach ($keys as $val) {
                 $utStates .= Config('location.hindiStatesArr.'.$stateList[$val]['state']) . ', ';
                }

                $utStatesStr = rtrim($utStates, ', ');
                $stateArr    = array_unique(explode(', ', $utStatesStr));
                $utStates    = implode(', ', $stateArr);

                if(empty($stateList)) {
                     foreach (Config('location.unionTerriotoryStates') as $val)
                         $utStates .= $val.", ";
                     $utStates = rtrim($utStates, ', ');
                 }
            @endphp
            <div class="col-xs-12 col-md-4">
                <div class="section">
                    <div class="ttl">केंद्र शासित प्रदेश</div>
                    <div class="keypoints">
                        <p>
                            {{ $utStates ?: '- NA -'}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-sec-topics-ttl mrgn-tp"> {{ $franDetails->looking_franchise == 1 ? "फ्रेंचाइजी" : "वितरण" }} विवरण </div>
        <div class="keypoints">

            @if( $franDetails->is_territorial_rights == 1 )
                <p>
                    एक इकाई {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? "वितरण" : "फ्रेंचाइजी" }} के लिए विशेष क्षेत्रीय अधिकार
                    <span class='pull-right fnone'> हाँ </span>
                </p>
            @endif

            @if( $franDetails->is_perform_guarranty == 1 )
                <p>
                    इकाई {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? "वितरण" : "फ्रेंचाइजी" }} के लिए प्रदर्शन गारंटी
                    <span class='pull-right fnone'> हाँ </span>
                </p>
            @endif

            @if(!empty( $franDetails->anticipated_roi ))
                <p>
                    निवेश पर अनुमानित प्रतिशत वापसी
                    <span class='pull-right fnone'>
                        {{ $franDetails->anticipated_roi }} %
                    </span>
                </p>
            @endif

            @if(!empty( $franDetails->payback_period ))
                <p>
                    यूनिट {{ $franDetails->looking_franchise == 1 ? "फ्रेंचाइजी" : "वितरण" }} के लिए पूंजी की पिछली अवधि का भुगतान करें
                    <span class='pull-right fnone'>
                        {{ str_replace( 'Year', 'Years', str_replace( 'Month' , 'Months', $franDetails->payback_period)) }}
                    </span>
                </p>
            @endif

            @if(!empty( $franDetails->other_investment_req ))
                <p>
                    अन्य निवेश आवश्यकताओं
                    <span class='pull-right fnone'>
                        {{ $franDetails->other_investment_req }}
                    </span>
                </p>
            @endif

        </div>
    </div>
</div>
