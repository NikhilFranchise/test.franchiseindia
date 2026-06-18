@extends('layout.amp.amp-master')
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
            क्षेत्र की आवश्यकता <span>{{ $area }}</span><br>
            निवेश का आकार <span> INR {{ $minValue  }} - {{ $maxValue }}</span><br>
            फ़्रैंचाइज आउटलेट्स <span> {{$franDetails->no_fran_outlets ?: '- NA -'}}</span><br>
        </div>
        <div class="ttrt"><a href="{{ Config('constants.MainDomain') }}/hi/brands/{{ $franDetails->profile_name }}.{{ $franDetails->fran_detail_id }}#show-m">अप्लाई करें</a></div>
        <div class="brandcontainer">
            <div class="brandtitle">व्यापार विवरण</div>
            <div class="innercontain">{!! empty($franDetails['business_desc_hindi']) ? $franDetails['business_desc'] : $franDetails['business_desc_hindi'] !!}</div>
        </div>

        <div class="brandcontainer">
            <div class="brandtitle">निवेश विवरण</div>
            <div class="brandsubtitle">शुरूआती संचालन</div>
            <div class="keypoints">
                @if(!empty( $franDetails->operations_start_year ))
                    <div class="keyinner"> संचालन शुरू हुआ <span>{{ $franDetails->operations_start_year }}</span> </div>
                @endif

                @if(!empty( $franDetails->franchise_start_year ))
                    <div class="keyinner"> फ़्रैंचाइिजंग  / वितरण शुरू हुआ <span class="pull-right">{{ $franDetails->franchise_start_year }}</span> </div>
                @endif
            </div>
            <div class="brandsubtitle">शुरूआती संचालन</div>

            <!--unit start here -->
            <div class="innercontainer">
                <div class="backheading">इकाइयों</div>
                <div class="keypoints padding15">
                    <div class="keyinner">
                        शेत्र <span class="pull-right">स्टोर वाइस</span>
                    </div>

                    @if(!empty( $franDetails->unit_investment ))
                        <div class="keyinner">
                            निवेश
                            <span>
                           {{ str_replace( 'Rs.' , 'INR', Config('constants.investRangeInWords.'.$franDetails->unit_investment)) }}
                        </span>
                        </div>
                    @endif
                    @if(!empty( $franDetails->unitinv_brand_fee ))
                        <div class="keyinner">
                            फ्रैंचाइज़ी / ब्रांड शुल्क
                            <span>
                            INR {{ $franDetails->unitinv_brand_fee }}
                        </span>
                        </div>
                    @endif
                    @if(!empty( $franDetails->unitinv_royalty ))
                        <div class="keyinner">
                            रॉयल्टी / आयोग
                            <span>{{ $franDetails->unitinv_royalty }} %</span>
                        </div>
                    @endif
                </div>
            </div>
            <!--unit end here -->

            <!--trade start here -->
            @if(count($franTradePartnerData))
                <div class="brandsubtitle">व्यापार भागीदार</div>
                <div class="innercontainer">
                    @foreach($franTradePartnerData as $tradeData)
                        <div class="keypoints padding15">
                            <div class="keyinner"><strong>व्यापार भागीदार - {{ $loop->index + 1 }} </strong> </div>
                            <div class="keyinner">चैनल के प्रकार <span class="pull-right">{{$tradeData->channel_type}}</span></div>
                            <div class="keyinner">निवेश (यदि कोई है)<span class="pull-right">{{Config('constants.investRangeInWords.'.$tradeData->trade_investment)}}</span></div>
                            <div class="keyinner"> मार्जिन / कमीशन<span class="pull-right">{{$tradeData->trade_margin}}%</span></div>
                            <div class="keyinner">क्षेत्र की आवश्यकता<span class="pull-right">@if(!empty($tradeData->area_min)){{$tradeData->area_min}} - {{$tradeData->area_max}} Sq.ft @else NIL @endif</span></div>
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
                        <div class="backheading">मास्टर / मल्टी यूिनट्स</div>
                        @if($region->regionwise == 1)
                            <div class="keypoints padding15">
                                <div class="keyinner"><strong>रीजन  अनुसार</strong> </div>
                                @if(!empty($region->region_investment))
                                    <div class="keyinner">
                                        निवेश
                                        <span>
                                        {{ str_replace( 'Rs.' , 'INR', Config('constants.investRangeInWords.'.$region->region_investment))}}
                                    </span>
                                    </div>
                                @endif
                                @if(!empty($region->region_unitfee))
                                    <div class="keyinner">
                                        यूनिट / ब्रांड शुल्क
                                        <span>INR {{ $region->region_unitfee }}</span>
                                    </div>
                                @endif
                                @if(!empty($region->region_masterfee))
                                    <div class="keyinner">
                                        मास्टर / ब्रांड शुल्क
                                        <span>INR {{ $region->region_masterfee }}</span>
                                    </div>
                                @endif
                                @if(!empty($region->region_royalty))
                                    <div class="keyinner">
                                        रॉयल्टी / आयोग
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
                                        निवेश
                                        <span>{{ str_replace( 'Rs.' , 'INR', Config('constants.investRangeInWords.'.$region->state_investment)) }}</span>
                                    </div>
                                @endif
                                @if(!empty($region->state_unitfee))
                                    <div class="keyinner">
                                        यूनिट / ब्रांड शुल्क
                                        <span>INR {{ $region->state_unitfee }}</span>
                                    </div>
                                @endif
                                @if(!empty($region->state_masterfee))
                                    <div class="keyinner">
                                        मास्टर / ब्रांड शुल्क
                                        <span>INR {{ $region->state_masterfee }}</span>
                                    </div>
                                @endif
                                @if(!empty($region->state_royalty))
                                    <div class="keyinner">
                                        रॉयल्टी / आयोग
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
                                        निवेश
                                        <span>{{ str_replace( 'Rs.' , 'INR', Config('constants.investRangeInWords.'.$region->city_investment)) }}</span>
                                    </div>
                                @endif
                                @if(!empty($region->city_unitfee))
                                    <div class="keyinner">
                                        यूनिट / ब्रांड शुल्क
                                        <span>INR {{ $region->city_unitfee }}</span>
                                    </div>
                                @endif
                                @if(!empty($region->city_masterfee))
                                    <div class="keyinner">
                                        मास्टर / ब्रांड शुल्क
                                        <span>INR {{ $region->city_masterfee }}</span>
                                    </div>
                                @endif
                                @if(!empty($region->city_royalty))
                                    <div class="keyinner">
                                        रॉयल्टी / आयोग
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
                                        निवेश
                                        <span>{{ str_replace( 'Rs.' , 'INR', Config('constants.investRangeInWords.'.$region->country_investment)) }}</span>
                                    </p>
                                @endif
                                @if( !empty($region->country_unitfee ))
                                    <div class="keyinner">
                                        यूनिट / ब्रांड शुल्क
                                        <span>
                                    INR {{ $region->country_unitfee }}
                                </span>
                                    </div>
                                @endif
                                @if( !empty($region->country_masterfee ))
                                    <div class="keyinner">
                                        मास्टर / ब्रांड शुल्क
                                        <span>
                                    INR {{ $region->country_masterfee }}
                                </span>
                                    </div>
                                @endif
                                @if( !empty($region->country_royalty ))
                                    <div class="keyinner">
                                        रॉयल्टी / आयोग
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
            <div class="brandsubtitle">विस्तार स्थान</div>
            <div class="innercontainer upmargin">
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
                <div class="backheading">उत्तर</div>
                <div class="keypoints padding10">
                    {{ $northStates }}
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
            <div class="innercontainer upmargin">
                <div class="backheading">दक्षिण</div>
                <div class="keypoints padding10">
                    {{ $southStates }}
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
            <div class="innercontainer upmargin">
                <div class="backheading">पूर्व</div>
                <div class="keypoints padding10">
                    {{ $eastStates }}
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

            <div class="innercontainer upmargin">
                <div class="backheading">पश्चिम</div>
                <div class="keypoints padding10">
                    {{ $westStates }}
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

            <div class="innercontainer upmargin">
                <div class="backheading">केंद्रीय</div>
                <div class="keypoints padding10">
                    {{ $centerStates }}
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

            <div class="innercontainer upmargin">
                <div class="backheading">केंद्र शासित प्रदेश</div>
                <div class="keypoints padding10">
                    {{ $utStates }}
                </div>
            </div>
            <!-- end here -->

            <div class="brandsubtitle">फ्रेंचाइजी विवरण</div>
            <div class="keypoints">

                @if( $franDetails->is_territorial_rights == 1 )
                    <div class="keyinnerother"> एक इकाई फ़्रैंचाइज़ी के लिए विशेष क्षेत्रीय अधिकार <span> हाँ </span> </div>
                @endif

                @if( $franDetails->is_perform_guarranty == 1 )
                    <div class="keyinnerother"> इकाई फ़्रैंचाइजी के लिए प्रदर्शन गारंटी <span> हाँ </span> </div>
                @endif

                @if(!empty( $franDetails->anticipated_roi ))
                    <div class="keyinnerother"> निवेश पर अनुमानित प्रतिशत वापसी <span> {{ $franDetails->anticipated_roi }}% </span> </div>
                @endif

                @if(!empty( $franDetails->payback_period ))
                    <div class="keyinnerother"> यूनिट फ़्रैंचाइज़ी के लिए पूंजी की पिछली अवधि का भुगतान करें <span> {{ str_replace( 'Year', 'Years', str_replace( 'Month' , 'Months', $franDetails->payback_period)) }} </span> </div>
                @endif

                @if(!empty( $franDetails->other_investment_req ))
                    <div class="keyinnerother"> अन्य निवेश आवश्यकताओं <span> {{ $franDetails->other_investment_req }} </span> </div>
                @endif
            </div>
        </div>

        @if(!empty( $franDetails->property_type ) ||  $area != '-N/A-' ||  !empty( $franDetails->pref_prop_location ) )
            <!-- investment start here -->
            <div class="brandcontainer">
                <div class="brandtitle">संपत्ति ब्यौरा</div>
                <div class="keypoints">
                    @if(!empty( $franDetails->property_type ))
                        <div class="keyinnerother"> इस फ्रेंचाइजी के अवसर के लिए आवश्यक संपत्ति का प्रकार <span> {{ $franDetails->property_type }} </span> </div>
                    @endif

                    @if($area != '-N/A-')
                        <div class="keyinnerother"> तल क्षेत्र की आवश्यकता <span> {{ $area }} </span> </div>
                    @endif

                    @if(!empty( $franDetails->pref_prop_location ))
                        <div class="keyinnerother"> इकाई फ़्रैंचाइज़ी आउटलेट का पसंदीदा स्थान <span> {{ $franDetails->pref_prop_location }} </span> </div>
                    @endif
                </div>
            </div>
            <!-- investment end here -->
        @endif

        @if( $franDetails->is_detailed_manuals == 1 || !empty($franDetails->franchise_training_loc) || $franDetails->is_field_assistance == 1 || $franDetails->ho_assistance == 1 || $franDetails->is_it_support == 1  )
            <!-- TRAINING DETAILS start here -->
            <div class="brandcontainer">
                <div class="brandtitle">प्रशिक्षण विवरण</div>
                <div class="keypoints">

                    @if($franDetails->is_detailed_manuals == 1)
                        <div class="keyinnerother"> फ्रैंचाइजी के लिए विस्तृत ऑपरेटिंग मैनुअल <span> हाँ </span> </div>
                    @endif

                    @if(!empty($franDetails->franchise_training_loc))
                        <div class="keyinnerother"> फ़्रैंचाइजी प्रशिक्षण स्थान <span> {{$franDetails->franchise_training_loc}} </span> </div>
                    @endif

                    @if($franDetails->is_field_assistance == 1)
                        <div class="keyinnerother"> क्या फ़्रैंचाइजी के लिए फील्ड सहायता उपलब्ध है? <span> हाँ </span> </div>
                    @endif

                    @if($franDetails->ho_assistance == 1)
                        <div class="keyinnerother"> फ्रेंचाइजी खोलने में हेड ऑफिस से फ़्रैंचाइजी के विशेषज्ञ मार्गदर्शन <span> हाँ </span> </div>
                    @endif

                    @if($franDetails->is_it_support == 1)
                        <div class="keyinnerother"> फ्रैंचाइजी में मौजूदा आईटी सिस्टम शामिल किए जाएंगे <span> हाँ </span> </div>
                    @endif
                </div>
            </div>
            <!-- TRAINING DETAILS end here -->
        @endif

        <!-- AGREEMENT & TERM DETAILS start here -->
        <div class="brandcontainer">
            <div class="brandtitle">समझौता और अवधि विवरण</div>
            <div class="keypoints">
                @if($franDetails->std_fran_aggreement == 1)
                    <div class="keyinnerother"> क्या आपके पास एक मानक फ्रेंचाइज समझौता है? <span> हाँ </span> </div>
                @endif
                <div class="keyinnerother">
                    फ्रेंचाइजी अवधि कितनी देर के लिए और है?
                    <span>
                    @php
                        $aggrementTime = $franDetails->franchise_term_duration;

                        if($aggrementTime == "Life")
                            $aggrementTime = "जीवन काल";
                        else if($aggrementTime == 1)
                            $aggrementTime = "1 साल";
                        else
                            $aggrementTime = $franDetails->franchise_term_duration. " वर्षों";
                    @endphp
                    {{ $aggrementTime }}
                </span>
                </div>
                @if($franDetails->term_renewable == 1)
                    <div class="keyinnerother"> क्या शब्द नवीकरणीय है? <span> हाँ </span></div>
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
