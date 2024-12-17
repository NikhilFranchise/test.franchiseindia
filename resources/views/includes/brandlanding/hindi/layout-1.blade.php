<style>
    .landing .share-rat-pnl .rate-action { width: 102%; }
</style>
<div class="row  landing" id="landfix">
    <div class="container">
        <div class="row">
            <div class="normal">
                <div class="col-xs-12 col-sm-3 col-md-2 mdy-width pad-top">
                    @php
                        $eligibility = 0;
                        $checkData   = [
                            'message' => "",
                            'abilityToApply' => 1
                        ];
                        if(Auth::check() && \Illuminate\Support\Facades\Auth::user()->profile_type == 2) {
                            if(\Illuminate\Support\Facades\Auth::user()->membership_type == 1)
                                $eligibility = 1;
                            else {
                                $checkData = \App\Http\Controllers\CommonController::checkInvestorApplicationEligibility();
                                $eligibility = $checkData['abilityToApply'];
                            }
                        }

                        $img = 'https://www.franchiseindia.com/images/no-img.gif';
                        if(($franDetails->free_logo_visibility || $franDetails->membership_type != 0) && !empty($franDetails->company_logo))
                            $img = Config('constants.franAwsImgPath').$franDetails->company_logo;

                    @endphp
                    <div class="brand-logo"><img src="{{$img}}" alt="{{$franDetails->company_name}}" /></div>
                    @if($franDetails->brand_verified == 1)
                    <div class="brand-verify-detail-mobile"><i class="fa fa-check"></i> Verified</div>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-10 col-md-10 mdy-width">
                    <div class="row">
                        <!-- Business Title -->
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="sub-ttl">{{Config('constants.subSubCategoryArr.'.$franDetails->ind_cat.'.'.$franDetails->ind_sub_cat)}}</div>
                            <h1 class="ttl">{{$franDetails->company_name}}</h1>
                        </div>
                        <!-- /Business Title -->

                        <!-- Tab Panel Start Here -->
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="tab-panel tabhindi">
                                <div class="lft-pnl">
                                    <ul class="tabScroll">
                                        <li><a href="#business_tab">व्यापार</a></li>
                                        <li><a href="#investmentnew_tab">निवेश</a></li>
                                        <li><a href="#property_tab">संपत्ति</a></li>
                                        <li><a href="#training_tab">प्रशिक्षण</a></li>
                                        <li><a href="#others_tab">समझौता <span class="hidemobileTerm">और अवधि विवरण</span></a></li>
                                    </ul>
                                </div>
                                <div class="rht-pnl">
                                    @if ( !Auth::user() || (Auth::user() && Auth::user()->profile_type == Config('constants.ProfileType.Investor')))
                                        @if(!empty($checkData['message']) && $eligibility != 1)
                                            <ul>
                                                <li>
                                                    {{ $checkData['message'] }}
                                                </li>
                                            </ul>
                                        @endif
                                        @if($eligibility == 1 || $checkData['abilityToApply'] == 1)
                                            @if( Auth::check() && Auth::user()->profile_type == 2 )
                                                <ul>
                                                    <li>
                                                        <a class="active" href="#" data-toggle="modal" data-target="#modalGetFree" id="Investor">संपर्क देखें</a>
                                                    </li>
                                                </ul>
                                            @else
                                                <ul>
                                                    <li>
                                                        <a class="active" href="#" data-toggle="modal" data-target="#modalGetFree">संपर्क देखें</a>
                                                    </li>
                                                </ul>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                                @if($franDetails->brand_verified == 1)
                                <div class="brand-verify-detail"><i class="fa fa-check"></i> Verified</div>
                                 @endif
                            </div>
                        </div>
                        <!-- Tab Panel End Here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Landing page Body Section -->
<div class="row bdy-spc landing">
    <div class="container">
        <div class="row">
            <!-- Tab Content Start Here -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="tab-content" id="bdy-height">
                    <!-- Left panel content Start -->
                    <div class="lft-pnl">
                        <div class="business-infonoimg">
                            <ul>
                                {{-- @php
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
                                @endphp --}}
                                
                                @php
                                $area =
                                    $franDetails->prop_area_min . ' - ' . $franDetails->prop_area_max . ' Sq.ft';
                                if (empty($franDetails->prop_area_max)) {
                                    $area = $franDetails->prop_area_min;
                                }
                                if (is_numeric($franDetails->prop_area_min) && empty($franDetails->prop_area_max)) {
                                    $area = $franDetails->prop_area_min . ' Sq.ft';
                                }
                                if (empty($franDetails->prop_area_min)) {
                                    $area = '-N/A-';
                                }

                                $minValue = $franDetails->unit_inv_min;
                                if (is_numeric($minValue)) {
                                    if ($minValue < 100000 && $minValue > 10000) {
                                        $minValue = substr($minValue / 1000, 0, 5) . ' K';
                                    } elseif ($minValue <= 9999999 && $minValue > 100000) {
                                        $minValue = substr($minValue / 100000, 0, 5) . ' Lakh';
                                    } elseif ($minValue > 9999999) {
                                        $minValue = substr($minValue / 10000000, 0, 5) . ' Cr';
                                    }
                                }

                                $maxValue = $franDetails->unit_inv_max;
                                if (is_numeric($maxValue)) {
                                    if ($maxValue < 100000 && $maxValue > 10000) {
                                        $maxValue = substr($maxValue / 1000, 0, 5) . ' K';
                                    } elseif ($maxValue <= 9999999 && $maxValue > 100000) {
                                        $maxValue = substr($maxValue / 100000, 0, 5) . ' Lakh';
                                    } elseif ($maxValue > 9999999) {
                                        $maxValue = substr($maxValue / 10000000, 0, 5) . ' Cr';
                                    }
                                }
                            @endphp
                                <li>आवश्यक क्षेत्र<div>{{ $area }}</div></li>
                                <li>
                                    निवेश रेंज
                                    <div>INR {{ $minValue  }} - {{ $maxValue }}</div>
                                </li>
                                <li>{{ $franDetails->looking_franchise == 1 ? "फ्रेंचाइजी" : "डीलरशिप" }} आउटलेट्स<div>{{$franDetails->no_fran_outlets ?: '- NA -'}}</div></li>
                            </ul>
                        </div>

                        <!-- Business Section Start here -->
                    @include('includes.brandlanding.hindi.business_desc_video')
                    <!-- Business Section End here -->

                        <!-- Investment Detail Section Start here -->
                    @include('includes.brandlanding.hindi.investment_tab')
                    <!-- Investment Detail Section End here -->

                        <!-- Property Details Section Start here -->
                    @include('includes.brandlanding.hindi.property_tab')
                    <!-- Property Details Section End here -->

                        <!-- Training Details Section Start here -->
                    @include('includes.brandlanding.hindi.training_tab')
                    <!-- Training Details Section End here -->

                        <!-- Training Details Section Start here -->
                    @include('includes.brandlanding.hindi.others_tab')
                    <!-- Training Details Section End here -->

                    </div>
                    <!-- Left panel content End -->
                    <!-- Right panel Start here -->
                    <div class="rht-pnl">
                        <!-- Share panel start here-->
                        <div class="share-rat-pnl">
                            <!-- Rate Info Panel Start here-->
                            <div class="rat-info">
                                <ul>
                                    <li><span><strong id="ratings"></strong></span></li>
                                    <li><span><strong id="likecount">{{ $likesCnt }}</strong><strong> पसंद</strong></span></li>
                                </ul>
                            </div>
                            <!-- Rate Info Panel End here-->
                            <!-- Rate Action Panel Start here-->
                            <div class="rate-action">
                                <ul>
                                    <li>
                                        @if(!empty(Cookie::get('franLike'.$franDetails->franchisor_id)))
                                            <a href="#" class="like" id="likeButton">पसंद किया</a>
                                        @else
                                            <a onclick = "likebtn('{{$franDetails->franchisor_id}}');" class="like" id="likeButton">
                                                <i class="fa fa-thumbs-up" aria-hidden="true" id="like"></i> पसंद
                                            </a>
                                        @endif
                                    </li>
                                    <li>
                                        @if(!empty(Cookie::get('franRate'.$franDetails->franchisor_id)))
                                            <a data-toggle="#" data-target="#myRating" id="rateButton">रेटिंग किया</a>
                                        @else
                                            <a data-toggle="modal" data-target="#myRating"  id="rateButton">
                                                <i class="fa fa-star-half-o" aria-hidden="true"></i> रेटिंग</a>
                                        @endif
                                    </li>
                                    <li><a data-toggle="modal" data-target="#mysocial">
                                            <i class="fa fa-share-alt" aria-hidden="true"></i> शेयर</a></li>

                                </ul>
                            </div>
                            <!-- Rate Action Panel End here-->
                        </div>
                        <!-- Share panel end here-->

                        <!-- Insta Apply section start here -->

                        @if(Auth::check() && Auth::user()->profile_type == Config('constants.ProfileType.Investor'))
                            @if ( count($expIntVal) == 0 || (Auth::user()->membership_type == 1 && $expIntVal->visibility == 0))
                                @if(!empty($checkData['message']))
                                    {{ $checkData['message'] }}
                                @endif

                                @if($eligibility == 1 || $checkData['abilityToApply'] == 1)
                                    <input type="button" value="Submit Your Interest" id="expbtn" class="btn btn-default submi" >
                                @endif
                                </br>
                                <div id="expbtnloading" style=" display: none; text-align: center; " />
                                <label id="creditRemaining">कृपया प्रतीक्षा करें...</label><br>
                                <div id="expintbutton" style = " display: none; ">
                                    <Input type="button" class="btn btn-default btn-red" id="proceedInterest" value="Yes" />
                                    <Input type="button" class="btn btn-default btn-red" id="cancelinterest" value="Cancel" />
                                </div>
                    </div>
                    <style type="text/css"> .green p span a { color:#fff; }</style>
                    <div class="insta-apply thankscs" id="expmsg" style="display:none;" >
                        <div  class="green">
                            <div class="bigth">धन्यवाद!</div>

                            <p><span class="popinfohead" id="companyContactinsta" style="color:#fff!important"></span></p>
                            <p><strong>सीओ नाम:</strong><span id="ceocontactinsta"></span></p>
                            <p><strong>टेलीफोन नंबर: </strong><span id="telephonecontactinsta"></span></p>
                            <p><strong>पता :</strong><span id="addressocontactinsta"></span></p>
                            <p><strong>मोबाइल :</strong><span id="mobilecontactinsta"></span></p>
                            <p><strong>ईमेल : </strong><span id="emailcontactinsta"></span></p>
                            <p><strong>वेबसाइट: </strong> <span id="websitecontactinsta"></span></p>

                        </div>
                    </div>
                    <div class="insta-apply thankscs" id="cancelExpress" style="display: none;">
                        <div class="green"><div class="bigth">धन्यवाद!</div> <p>आपके आवेदन के लिए</p></div>
                    </div>
                    @else
                        <div class="insta-apply thankscs">
                            <div class="green"><div class="bigth">धन्यवाद!</div> <p>पहले से ही लागू</p></div>
                        </div>
                    @endif
                    @endif

                    @if(!Auth::check() || Auth::user()->profile_type == Config('constants.ProfileType.Franchisor'))
                        <div class="insta-apply" id="show-m">
                            <div class="ttl" id="instahead">इंस्टा आवेदन</div>
                            <div id="instaMsg" style="display:none;" class="green">
                                <div class="bigth">धन्यवाद!</div>
                                <p>आपकी रुचि दिखाने के लिए धन्यवाद {{$franDetails->company_name}}.</p>
                                <p>आपका संपर्क विवरण कंपनी के साथ साझा किया गया है। आपको अपने निवेशक प्रोफाइल बनाने और ब्रांड से सीधे संपर्क करने के लिए अपग्रेड करने का अनुरोध किया है</p>
                            </div>
                            <div id="existsMsg" style="display:none;" class="green">
                                <div class="bigth">धन्यवाद!</div>
                                <p> आपकी रुचि दिखाने के लिए धन्यवाद {{$franDetails->company_name}}.</p>
                                <p> लेकिन आप पहले ही आवेदन कर चुके हैं {{$franDetails->company_name}}.</p>
                            </div>
                            <div class="frm-sec" id="instaForm">
                                <form id="insta" action="{{ url('brandcontactinfo') }}" method="post" name="insta">
                                    <input type="hidden" name="frandetailsid" id="franId" value="{{$franDetails->franchisor_id}}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="infoname" placeholder="नाम दर्ज">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control check-existing-registered-investor" name="infoemail" placeholder="ईमेल दर्ज करें">
                                    </div>
                                    <div class="form-group" style="position: relative;">
                                        {{-- <input type="text" class="form-control" name="mobile" id='txtPhone' placeholder="मोबाइल नंबर दर्ज करें" maxlength="10" class="trrr" autocomplete="off" onkeyup="getMobileStatus(this.value);"/>
                                        <input class="verif-submitbtn" id="verifybutton" value="Verify" type="button" onclick="veryfie()">
                                        <input class="verif-submitbtn" id="editmobile" value="Edit"  type="button" onclick="editmobileinsta();" style="display: none"> --}}
                                        <input type="text" name="mobile" id='txtPhone' class="form-control"
                                            placeholder="मोबाइल नंबर दर्ज करें" maxlength="10" autocomplete="off"
                                            />
                                    </div>
                                    <div class="form-group" id="otpblk" style="display:none;">
                                        <input type="text" id="otp" class="form-control" placeholder="एक बार इस्तेमाल किये जाने वाला पासवर्ड"/>
                                        <input class="verif-submitbtn" id="submit" value="सत्यापित करें" type="button" onclick="checkinstaotp()">
                                        <span id="mobcat"></span>
                                    </div>
                                    <div class="form-group" id="otpblk1" style="display:none; color:red;">
                                        ओटीपी मेलसमूह ..!
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="state" name="infostate" onchange="getcityinfoinsta(this.value)">
                                            <option value>राज्य चुनें</option>
                                            @php
                                                $states = array_unique(array_column($stateList, 'state'));
                                                if (count($states) > 0) {
                                                    foreach ($states as $state) {
                                                        $key = 0;
                                                        $array = Config('location.stateArr');
                                                        while ($arrayState = current($array)) {
                                                            if ($arrayState == $state) {
                                                                 $key = key($array);
                                                            }
                                                            next($array);
                                                        }
                                                      echo "<option value='$key'>$state</option>";
                                                    }
                                                } else {
                                                    $stateArrVal = Config('location.stateArr');
                                                    asort($stateArrVal);
                                                    foreach ($stateArrVal as $key => $value) {
                                                        echo "<option value='$key'>$value</option>";
                                                    }
                                                }
                                            @endphp
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="infocity" id="city">
                                            <option value="">शहर चुनें</option>
                                        </select>
                                    </div
                                    >
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="pincode" placeholder="पिनकोड दर्ज करें" id="pincode" maxlength="6"/>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="address" placeholder="पता लिखिए" rows="3" id="address"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="investment_range_gallery" name="investment_range">
                                            <option value="">निवेश सीमा का चयन करें</option>
                                            @foreach(Config('constants.investRangeInWords') as $index => $value)
                                                <option value="{{ $index }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="newsletter_sub" id="expressnewslettern" checked> हां, मैं साप्ताहिक के लिए सदस्यता लेना चाहता हूं समाचार पत्रिका
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="need_loan">संपत्ति के खिलाफ ऋण?
                                        </label>
                                    </div>

                                    <div class="submit-btn" id="sub">
                                        <input type="submit" class="btn btn-default btn-red" value="अभी अप्लाई करें" />
                                    </div>

                                </form>
                            </div>
                        </div>
                    @endif
                <!-- Insta Apply section end here -->
                    <div class="clr"></div>
                    @notmobile
                    <div class="catleftbanner300 detailpage">
                        @include("includes.banners.google_300X600")
                    </div>
                    <div class="catleftbanneryahoo300">
                        @include("includes.banners.yahoo_300X600")
                    </div>
                    @endnotmobile

                </div>
                <!-- Right panel End here -->
            </div>
        </div>
        <!-- Tab Content End Here -->
    </div>
    <!-- /row-->
</div>
</div>

<script>
    if("{{ $checkData['message'] }}" != "") {
        alert("{{ $checkData['message'] }}");
    }
</script>
