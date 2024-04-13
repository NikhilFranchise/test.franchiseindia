@extends('layout.amp.amp-master-eng')
@section('content')
    @php
        $img = 'https://www.franchiseindia.com/images/no-img.gif';
        if(!empty($franDetails->company_logo) && $franDetails->membership_type != 0)
            $img = Config('constants.franAwsImgPath').$franDetails->company_logo;

        $area = $franDetails->prop_area_min.' - '.$franDetails->prop_area_max.' Sq.ft';
        
        if(empty($franDetails->prop_area_max))
            $area = $franDetails->prop_area_min;
        if (is_numeric($franDetails->prop_area_min) && empty($franDetails->prop_area_max))
              $area = $franDetails->prop_area_min . ' Sq.ft';
        if (empty($franDetails->prop_area_min))
              $area = '-N/A-';

        $minValue = $franDetails->unit_inv_min;

          if($minValue < 100000 && $minValue > 10000)
              $minValue = substr(($minValue/1000),0,5).' K';

          if($minValue <= 9999999 && $minValue > 100000)
              $minValue = substr(($minValue/100000),0,5).' Lac';

          if($minValue > 9999999)
              $minValue = substr(($minValue/10000000),0,5).' Cr';

          $maxValue = $franDetails->unit_inv_max;
          if($maxValue < 100000 && $maxValue > 10000)
              $maxValue = substr(($maxValue/1000),0,5).' K';

          if($maxValue <= 9999999 && $maxValue > 100000)
              $maxValue = substr(($maxValue/100000),0,5).' Lac';

          if($maxValue > 9999999)
              $maxValue = substr(($maxValue/10000000),0,5).' Cr';
    @endphp

    <!--content area start here -->
    <div class="marss">
        <div  class="brandlogo"><amp-img src="{{ $img }}" width="199" height="81" layout="responsive"></amp-img> </div>
        <div class="brandsub">{{Config('constants.subSubCategoryArr.'.$franDetails->ind_cat.'.'.$franDetails->ind_sub_cat)}}</div>
        <h1 class="brandname">{{ $franDetails->company_name }}</h1>
        <div class="brandmainval">
            Area Requirement <span>{{ $area }}</span><br>
            Investment Size <span> INR {{ $minValue  }} - {{ $maxValue }}</span><br>
            Franchise Outlets <span> {{$franDetails->no_fran_outlets ?: '- NA -'}}</span><br>
        </div>
        <div class="ttrt"><a href="{{ Config('constants.MainDomain') }}/brands/{{ $franDetails->profile_name }}.{{ $franDetails->fran_detail_id }}#show-m">Apply</a></div>
        <div class="brandcontainer">
            <div class="brandtitle">Business Detail</div>
            <div class="innercontain">{!! $franDetails['business_desc'] !!}</div>
        </div>

        <div class="brandcontainer">
            <div class="brandtitle">Investment Detail</div>
            <div class="brandsubtitle">Commenced Operations</div>
            <div class="keypoints">
                @if(!empty( $franDetails->operations_start_year ))
                    <div class="keyinner"> Operations Commenced On <span>{{ $franDetails->operations_start_year }}</span> </div>
                @endif

                @if(!empty( $franDetails->franchise_start_year ))
                    <div class="keyinner"> Franchising / Distribution Commenced On <span class="pull-right">{{ $franDetails->franchise_start_year }}</span> </div>
                @endif
            </div>
            <div class="brandsubtitle">Franchise Details</div>

            <!--unit start here -->
            <div class="innercontainer">
                <div class="backheading">UNITS</div>
                <div class="keypoints padding15">
                    <div class="keyinner">
                        Location <span class="pull-right">Store wise</span>
                    </div>

                    @if(!empty( $franDetails->unit_investment ))
                        <div class="keyinner">
                            Investment
                            <span>
                           {{ str_replace( 'Rs.' , 'INR', Config('constants.investRangeInWords.'.$franDetails->unit_investment)) }}
                        </span>
                        </div>
                    @endif
                    @if(!empty( $franDetails->unitinv_brand_fee ))
                        <div class="keyinner">
                            Franchise/Brand Fee
                            <span>
                            INR {{ $franDetails->unitinv_brand_fee }}
                        </span>
                        </div>
                    @endif
                    @if(!empty( $franDetails->unitinv_royalty ))
                        <div class="keyinner">
                            Royalty/Commission
                            <span>{{ $franDetails->unitinv_royalty }} %</span>
                        </div>
                    @endif
                </div>
            </div>
            <!--unit end here -->

            <!--trade start here -->
            @if(count($franTradePartnerData))
                <div class="brandsubtitle">TRADE PARTNERS</div>
                <div class="innercontainer">
                    @foreach($franTradePartnerData as $tradeData)
                        <div class="keypoints padding15">
                            <div class="keyinner"><strong>TRADE PARTNER - {{ $loop->index + 1 }} </strong> </div>
                            <div class="keyinner">TYPES OF CHANNELS	<span class="pull-right">{{$tradeData->channel_type}}</span></div>
                            <div class="keyinner">INVESTMENT (IF ANY)<span class="pull-right">{{Config('constants.investRangeInWords.'.$tradeData->trade_investment)}}</span></div>
                            <div class="keyinner"> MARGIN / COMMISSIONS	<span class="pull-right">{{$tradeData->trade_margin}}%</span></div>
                            <div class="keyinner">AREA REQUIREMENT<span class="pull-right">@if(!empty($tradeData->area_min)){{$tradeData->area_min}} - {{$tradeData->area_max}} Sq.ft @else NIL @endif</span></div>
                        </div>
                        <div class="heightone"></div>
                    @endforeach
                </div>
            @endif
        <!-- trade end here -->

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
                <!--Master / Multi start here -->
                    <div class="innercontainer">
                        <div class="backheading">Master / Multi Unit</div>
                        @if($region->regionwise == 1)
                            <div class="keypoints padding15">
                                <div class="keyinner"><strong>Region Wise</strong> </div>
                                @if(!empty($region->region_investment))
                                    <div class="keyinner">
                                        Investment
                                        <span>
                                        {{ str_replace( 'Rs.' , 'INR', Config('constants.investRangeInWords.'.$region->region_investment))}}
                                    </span>
                                    </div>
                                @endif
                                @if(!empty($region->region_unitfee))
                                    <div class="keyinner">
                                        Unit / Brand fee
                                        <span>INR {{ $region->region_unitfee }}</span>
                                    </div>
                                @endif
                                @if(!empty($region->region_masterfee))
                                    <div class="keyinner">
                                        Master / Brand fee
                                        <span>INR {{ $region->region_masterfee }}</span>
                                    </div>
                                @endif
                                @if(!empty($region->region_royalty))
                                    <div class="keyinner">
                                        Royalty/Commission
                                        <span>{{ $region->region_royalty }} %</span>
                                    </div>
                                @endif

                            </div>
                            <div class="heightone"></div>
                        @endif
                        @if($region->statewise == 1)
                            <div class="keypoints padding15">
                                <div class="keyinner"><strong>राज्य अनुसार</strong> </div>
                                @if(!empty($region->state_investment))
                                    <div class="keyinner">
                                        Investment
                                        <span>{{ str_replace( 'Rs.' , 'INR', Config('constants.investRangeInWords.'.$region->state_investment)) }}</span>
                                    </div>
                                @endif
                                @if(!empty($region->state_unitfee))
                                    <div class="keyinner">
                                        Unit / Brand fee
                                        <span>INR {{ $region->state_unitfee }}</span>
                                    </div>
                                @endif
                                @if(!empty($region->state_masterfee))
                                    <div class="keyinner">
                                        Master / Brand fee
                                        <span>INR {{ $region->state_masterfee }}</span>
                                    </div>
                                @endif
                                @if(!empty($region->state_royalty))
                                    <div class="keyinner">
                                        Royalty/Commission
                                        <span>{{ $region->state_royalty }} %</span>
                                    </div>
                                @endif
                            </div>
                            <div class="heightone"></div>
                        @endif
                        @if($region->citywise == 1)
                            <div class="keypoints padding15">
                                <div class="keyinner"><strong>शहर अनुसार</strong> </div>
                                @if(!empty($region->city_investment))
                                    <div class="keyinner">
                                        Investment
                                        <span>{{ str_replace( 'Rs.' , 'INR', Config('constants.investRangeInWords.'.$region->city_investment)) }}</span>
                                    </div>
                                @endif
                                @if(!empty($region->city_unitfee))
                                    <div class="keyinner">
                                        Unit / Brand fee
                                        <span>INR {{ $region->city_unitfee }}</span>
                                    </div>
                                @endif
                                @if(!empty($region->city_masterfee))
                                    <div class="keyinner">
                                        Master / Brand fee
                                        <span>INR {{ $region->city_masterfee }}</span>
                                    </div>
                                @endif
                                @if(!empty($region->city_royalty))
                                    <div class="keyinner">
                                        Royalty/Commission
                                        <span>{{ $region->city_royalty }} %</span>
                                    </div>
                                @endif
                            </div>
                            <div class="heightone"></div>
                        @endif
                        @if($region->countrywise == 1)
                            <div class="keypoints padding15">
                                <div class="keyinner"><strong>देश अनुसार</strong> </div>
                                @if( !empty($region->country_investment ))
                                    <p>
                                        Investment
                                        <span>{{ str_replace( 'Rs.' , 'INR', Config('constants.investRangeInWords.'.$region->country_investment)) }}</span>
                                    </p>
                                @endif
                                @if( !empty($region->country_unitfee ))
                                    <div class="keyinner">
                                        Unit / Brand fee
                                        <span>
                                    INR {{ $region->country_unitfee }}
                                </span>
                                    </div>
                                @endif
                                @if( !empty($region->country_masterfee ))
                                    <div class="keyinner">
                                        Master / Brand fee
                                        <span>
                                    INR {{ $region->country_masterfee }}
                                </span>
                                    </div>
                                @endif
                                @if( !empty($region->country_royalty ))
                                    <div class="keyinner">
                                        Royalty/Commission
                                        <span>
                                    {{ $region->country_royalty }} %
                                </span>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                    <!--Master / Multi end here -->
                @endif
            @endif
        <!-- start here -->
            <div class="brandsubtitle">Expansion Locations</div>
            <div class="innercontainer upmargin">
                @php
                    $keys = array_keys(array_column($stateList, 'region'), 'North');
                     $northStates = '';
                     foreach ($keys as $val) {
                         $northStates .= $stateList[$val]['state']. ", ";
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
                <div class="backheading">North</div>
                <div class="keypoints padding10">
                    {{ $northStates }}
                </div>
            </div>
            @php
                $keys = array_keys(array_column($stateList, 'region'), 'South');
                $southStates = '';
                foreach ($keys as $val) {
                  $southStates .= $stateList[$val]['state']. ", ";
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
            <div class="innercontainer upmargin">
                <div class="backheading">South</div>
                <div class="keypoints padding10">
                    {{ $southStates }}
                </div>
            </div>

            @php
                $keys = array_keys(array_column($stateList, 'region'), 'East');
                $eastStates = '';
                foreach ($keys as $val) {
                  $eastStates .= $stateList[$val]['state']. ", ";
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
            <div class="innercontainer upmargin">
                <div class="backheading">East</div>
                <div class="keypoints padding10">
                    {{ $eastStates }}
                </div>
            </div>

            @php
                $keys = array_keys(array_column($stateList, 'region'), 'West');
                $westStates = '';
                foreach ($keys as $val) {
                    $westStates .= $stateList[$val]['state']. ", ";
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

            <div class="innercontainer upmargin">
                <div class="backheading">West</div>
                <div class="keypoints padding10">
                    {{ $westStates }}
                </div>
            </div>

            @php
                $keys = array_keys(array_column($stateList, 'region'), 'Center');
                $centerStates = '';
                foreach ($keys as $val) {
                 $centerStates .= $stateList[$val]['state']. ", ";
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

            <div class="innercontainer upmargin">
                <div class="backheading">Central</div>
                <div class="keypoints padding10">
                    {{ $centerStates }}
                </div>
            </div>

            @php
                $keys     = array_keys(array_column($stateList, 'region'), 'UT');
                $utStates = '';
                foreach ($keys as $val) {
                 $utStates .= $stateList[$val]['state']. ", ";
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

            <div class="innercontainer upmargin">
                <div class="backheading">UNION TERRITORIES</div>
                <div class="keypoints padding10">
                    {{ $utStates }}
                </div>
            </div>
            <!-- end here -->

            <div class="brandsubtitle">Franchise Details</div>
            <div class="keypoints">

                @if( $franDetails->is_territorial_rights == 1 )
                    <div class="keyinnerother"> Territorial rights for unit franchise <span> Yes </span> </div>
                @endif

                @if( $franDetails->is_perform_guarranty == 1 )
                    <div class="keyinnerother"> Performance guarantee to unit franchisee <span> Yes </span> </div>
                @endif

                @if(!empty( $franDetails->anticipated_roi ))
                    <div class="keyinnerother"> Anticipated percentage return on investment <span> {{ $franDetails->anticipated_roi }}% </span> </div>
                @endif

                @if(!empty( $franDetails->payback_period ))
                    <div class="keyinnerother"> Payback Period <span> {{ str_replace( 'Year', 'Years', str_replace( 'Month' , 'Months', $franDetails->payback_period)) }} </span> </div>
                @endif

                @if(!empty( $franDetails->other_investment_req ))
                    <div class="keyinnerother"> Any Other Requirements <span> {{ $franDetails->other_investment_req }} </span> </div>
                @endif
            </div>
        </div>

        @if(!empty( $franDetails->property_type ) ||  $area != '-N/A-' ||  !empty( $franDetails->pref_prop_location ) )
            <!-- investment start here -->
            <div class="brandcontainer">
                <div class="brandtitle">Property Details</div>
                <div class="keypoints">
                    @if(!empty( $franDetails->property_type ))
                        <div class="keyinnerother"> Type of property required for this franchise opportunity <span> {{ $franDetails->property_type }} </span> </div>
                    @endif

                    @if($area != '-N/A-')
                        <div class="keyinnerother"> Area Requirement <span> {{ $area }} </span> </div>
                    @endif

                    @if(!empty( $franDetails->pref_prop_location ))
                        <div class="keyinnerother">Preferred location of unit franchise outlet <span> {{ $franDetails->pref_prop_location }} </span> </div>
                    @endif
                </div>
            </div>
            <!-- investment end here -->
        @endif

        @if( $franDetails->is_detailed_manuals == 1 || !empty($franDetails->franchise_training_loc) || $franDetails->is_field_assistance == 1 || $franDetails->ho_assistance == 1 || $franDetails->is_it_support == 1  )
            <!-- TRAINING DETAILS start here -->
            <div class="brandcontainer">
                <div class="brandtitle">TRAINING DETAILS</div>
                <div class="keypoints">

                    @if($franDetails->is_detailed_manuals == 1)
                        <div class="keyinnerother"> Detailed operating manuals for franchisees <span> Yes </span> </div>
                    @endif

                    @if(!empty($franDetails->franchise_training_loc))
                        <div class="keyinnerother"> Franchisee training location <span> {{$franDetails->franchise_training_loc}} </span> </div>
                    @endif

                    @if($franDetails->is_field_assistance == 1)
                        <div class="keyinnerother"> Is field assistance available for franchisee ? <span> Yes </span> </div>
                    @endif

                    @if($franDetails->ho_assistance == 1)
                        <div class="keyinnerother"> Expert guidance from Head Office to franchisee in opening the franchise <span> Yes </span> </div>
                    @endif

                    @if($franDetails->is_it_support == 1)
                        <div class="keyinnerother"> Current IT systems will be included in the franchise <span> Yes </span> </div>
                    @endif
                </div>
            </div>
            <!-- TRAINING DETAILS end here -->
        @endif

        <!-- AGREEMENT & TERM DETAILS start here -->
        <div class="brandcontainer">
            <div class="brandtitle">AGREEMENT & TERM DETAILS</div>
            <div class="keypoints">
                @if($franDetails->std_fran_aggreement == 1)
                    <div class="keyinnerother"> Do you have a standard franchise agreement? <span> Yes </span> </div>
                @endif
                <div class="keyinnerother">
                    How long is the franchise term for?                    <span>
                    @php
                        $aggrementTime = $franDetails->franchise_term_duration;

                        if($aggrementTime == "Life")
                            $aggrementTime = "Lifetime";
                        else if($aggrementTime == 1)
                            $aggrementTime = "1 Year";
                        else
                            $aggrementTime = $franDetails->franchise_term_duration. " Years";
                    @endphp
                    {{ $aggrementTime }}
                </span>
                </div>
                @if($franDetails->term_renewable == 1)
                    <div class="keyinnerother"> Is term renewable? <span> Yes </span></div>
                @endif
            </div>
        </div>
        <!--AGREEMENT & TERM DETAILS  end here -->
    </div>

    <center>
        <div>
            <amp-social-share type="facebook"  width="40" height="34" data-param-text="{{ $seoTitle }}" rel="{{ str_replace('amp/', '', url()->current()) }}" data-param-app_id="110294989480112"></amp-social-share>
            <amp-social-share type="whatsapp"  rel="{{ str_replace('amp/', '', url()->current()) }}" data-param-text="{{ str_replace('amp/', '', url()->current()) }}" data-param-url="{{ str_replace('amp/', '', url()->current()) }}" width="40" height="34"></amp-social-share>
            <amp-social-share type="pinterest" data-param-media="https://www.franchiseindia.com{{ $img }}" width="40" height="34"></amp-social-share>
            <amp-social-share type="linkedin" rel="{{ str_replace('amp/', '', url()->current()) }}" data-param-text="{{ $seoTitle }}"  width="40" height="34"></amp-social-share>
            <amp-social-share type="twitter" rel="{{ str_replace('amp/', '', url()->current()) }}" data-param-text="{{ $seoTitle }}" width="40" height="34"> </amp-social-share>
            <amp-social-share type="gplus" rel="{{ str_replace('amp/', '', url()->current()) }}" data-param-text="{{ $seoTitle }}" width="40" height="34"></amp-social-share>
            <amp-social-share type="email"  width="40" height="34" data-param-subject="{{ $seoTitle }}" data-param-recipient=""></amp-social-share>
        </div>
    </center>

<amp-analytics type="googleanalytics">
<script type="application/json"> {
  "vars": {
    "account": "UA-8863112-1"
  },
  "triggers": {
    "trackPageviewWithCustomUrl": {
      "on": "visible",
      "request": "pageview",
      "vars": {
        "title": "{{$seoTitle}}",
        "documentLocation": "{{str_replace('amp/', '', url()->current())}}"
      }
    }
  }
}
</script>
</amp-analytics>

@endsection
