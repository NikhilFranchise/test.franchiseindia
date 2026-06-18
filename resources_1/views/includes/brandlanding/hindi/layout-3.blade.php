<script type="text/javascript" src="{{ URL::asset('js/vit-gallery.js') }}"></script>
<link href="{{URL::asset('css/vit-gallery.css')}}" rel="stylesheet" type="text/css">
<link href="{{URL::asset('css/layout_3.css')}}" rel="stylesheet" type="text/css">

<div class="galleybg">
    <div class="centblknew"  id="landfixoptiongalley">
        <div class="row  bg-white landing glysec">
            <div class="normal">
                <div class="col-xs-12 col-sm-3 col-md-2 mdy-width pad-top">
                    <div class="brand-logo">
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
                        <img src="{{ $img }}" alt="{{$franDetails->company_name}}"/>
                    </div>
                </div>
                @if($franDetails->brand_verified == 1)
                <div class="brand-verify-two"><i class="fa fa-check"></i> Verified</div>
                @endif
                <div class="col-xs-12 col-sm-10 col-md-10 mdy-width">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 galleymar">
                            <div class="tab-panel tabhindi">
                                <div class="lft-pnl">
                                    <ul class="tabScroll">
                                        <li class="Brandpadleft10"><a href="#" id="businessnew_tab" onclick="setPos('business_tab', this.id)" class="active">व्यापार</a></li>
                                        <li><a href="#" id="investmenttab_tab" onclick="setPos('investmentnew_tab', this.id)">निवेश</a></li>
                                        <li><a href="#" id="propertynew_tab" onclick="setPos('property_tab', this.id)">संपत्ति</a></li>
                                        <li><a href="#" id="trainingnew_tab" onclick="setPos('training_tab', this.id)">प्रशिक्षण</a></li>
                                        <li><a href="#" id="othersnew_tab" onclick="setPos('others_tab', this.id)">समझौता <span class="hidemobileTerm">&amp; अवधि विवरण</span></a></li>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        @mobile
        <style type="text/css">
            #myCarouselmobile { display:none;}
            @media only screen and (min-width:1px) and (max-width:767px) {
                #myCarouselmobile { display:block;}
                #desktopvisible { display:none;}
                #myCarouselmobile .carousel-inner>.item { text-align:center;}
                #myCarouselmobile .carousel-inner>.item>a>img, #myCarouselmobile .carousel-inner>.item>img {     margin: 0 auto;}
                #myCarouselmobile .carousel-control.left { background-image: none;     }
                #myCarouselmobile .carousel-control.right { background-image: none;     }
                #myCarouselmobile .glyphicon-chevron-left:before, #myCarouselmobile .glyphicon-chevron-right:before {    color: #dc3322;}
                #myCarouselmobile .carousel-control { text-shadow: none;   opacity: 0.8;}
                #myCarouselmobile .carousel-indicators li {    border: 1px solid #dc3322;}
                #myCarouselmobile .carousel-indicators .active { background-color: #dc3322;}
                #myCarouselmobile .carousel-control .glyphicon-chevron-left, #myCarouselmobile .carousel-control .glyphicon-chevron-right, #myCarouselmobile .carousel-control .icon-next, #myCarouselmobile .carousel-control .icon-prev {top: 56%;}
            }
        </style>
        <!--- start here -->
        <div id="myCarouselmobile" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach ($images as $image)
                    <li data-target="#myCarouselmobile" data-slide-to="{{ $loop->index }}" @if($loop->index == 0)  class="active" @endif></li>
                @endforeach
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                @foreach ($images as $image)
                    <div class="item @if($loop->index == 0)  active @endif">
                        <img src="{{ $image->image_type_slider2 }}" alt="Yummerica Fries - 1">
                    </div>
                @endforeach
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarouselmobile" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarouselmobile" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!--- end here -->
        @elsemobile
        <div class="row" id="desktopvisible">
            <div class="col-xs-12 col-sm-9 col-md-9 mdf">
                @foreach ($images as $image)
                    @if($loop->index == 0)
                        <a href="#" data-toggle="modal" data-target="#myGallery">
                            <img src="{{ $image->image_type_slider2 }}" alt="{{$franDetails->company_name}}" />
                        </a>
                    @endif
                @endforeach
                <div class="mortxt"><h1 class="txtshow"><span> {{Config('constants.subSubCategoryArr.'.$franDetails->ind_cat.'.'.$franDetails->ind_sub_cat)}}</span>
                        {{$franDetails->company_name}}</h1></div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 mdf">
                <ul>

                    @foreach ($images as $image)
                        @if($loop->index > 0 && $loop->index < 3)
                            <li><a href="#" data-toggle="modal" data-target="#myGallery"><img src="{{ $image->image_type_slider2 }}" alt="{{$franDetails->company_name}}" ></a></li>
                        @endif
                    @endforeach

                    <li class="ts">
                        @if(count($images) > 4)
                            <div class="mortxt">
                                <div class="txtshow">
                                    <a href="#" data-toggle="modal" data-target="#myGallery"><span>+</span> <br /> {{count($images) - 4}} अधिक</a>
                                </div>
                            </div>
                        @endif

                        @foreach ($images as $image)
                            @if( $loop->index == 3 )
                                <img src="{{ $image->image_type_slider2 }}" alt="{{$franDetails->company_name}}">
                            @endif
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>
        @endmobile

        <div class="row">
            <div class="infobrand col-xs-12 col-sm-12 col-md-12">
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
                    $area = $franDetails->prop_area_min . ' - ' . $franDetails->prop_area_max . ' Sq.ft';
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

                    <li><div>{{ $area }}</div>क्षेत्र की आवश्यकता </li>
                    <li>
                        <div>
                            INR {{ $minValue  }} - {{ $maxValue }}
                        </div>
                        निवेश का आकार
                    </li>
                    <li><div>{{ $franDetails->no_fran_outlets ?: '- NA -' }}</div>{{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ?  "डीलर / वितरक की संख्या" : "फ्रेंचाइजी आउटलेट्स की संख्या" }} </li>
                    <li><div>{{ $franDetails->operations_start_year }}</div> स्थापना वर्ष </li>
                </ul>
            </div>
        </div>
    </div>
</div>





<!--Landing page Body Section -->
<div class="row bdy-spc landing brdtop">
    <div class="container">
        <div class="row">
            <!-- Tab Content Start Here -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="tab-content" id="bdy-height">
                    <!-- Left panel content Start -->
                    <div class="lft-pnl">

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
                                    <li><span><strong id="likecount">{{ $likesCnt }}</strong><strong> likes</strong></span></li>
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
                                            <a onclick = "likebtn('{{$franDetails->franchisor_id}}');"
                                               class="like" id="likeButton">
                                                <i class="fa fa-thumbs-up" aria-hidden="true" id="like"></i> पसंद
                                            </a>
                                        @endif
                                    </li>
                                    <li>
                                        @if(!empty(Cookie::get('franRate'.$franDetails->franchisor_id)))
                                            <a data-toggle="#" data-target="#myRating" id="rateButton">रेटेड</a>
                                        @else
                                            <a data-toggle="modal" data-target="#myRating"  id="rateButton">
                                                <i class="fa fa-star-half-o" aria-hidden="true"></i> रेटिंग</a>
                                        @endif
                                    </li>
                                    <li><a data-toggle="modal" data-target="#mysocial"><i class="fa fa-share-alt" aria-hidden="true"></i>शेयर</a></li>
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
                                    <Input type="button" class="btn btn-default btn-red" id="proceedInterest" value="हाँ" />
                                    <Input type="button" class="btn btn-default btn-red" id="cancelinterest" value="रद्द करना" />
                                </div>
                    </div>
                    <style type="text/css"> .green p span a { color:#fff; } </style>
                    <div class="insta-apply thankscs" id="expmsg" style="display:none;" >
                        <div  class="green">
                            <div class="bigth">धन्यवाद!</div>
                            <p><span class="popinfohead" id="companyContactinsta" style="color:#fff!important;"></span></p>
                            <p><strong>सीओ नाम: </strong><span id="ceocontactinsta"></span></p>
                            <p><strong>टेलीफोन नंबर: </strong><span id="telephonecontactinsta"></span></p>
                            <p><strong>पता:</strong><span id="addressocontactinsta"></span></p>
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
                            <div class="ttl" id="instahead">Insta Apply</div>
                            <div id="instaMsg" style="display:none;" class="green">
                                <div class="bigth">धन्यवाद!</div>
                                <p>आपकी रुचि दिखाने के लिए धन्यवाद {{$franDetails->company_name}}.</p>
                                <p>आपका संपर्क विवरण कंपनी के साथ साझा किया गया है। आपको अपने निवेशक प्रोफाइल बनाने और ब्रांड से सीधे संपर्क करने के लिए अपग्रेड करने का अनुरोध किया है।</p>
                            </div>
                            <div id="existsMsg" style="display:none;" class="green">
                                <div class="bigth">धन्यवाद!</div>
                                <p> आपकी रुचि दिखाने के लिए धन्यवाद {{$franDetails->company_name}}.</p>
                                <p>लेकिन आप पहले ही आवेदन कर चुके हैं {{$franDetails->company_name}}.</p>
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
                                        <input type="text" class="form-control" name="mobile" id='txtPhone' placeholder="मोबाइल नंबर दर्ज करें" maxlength="10" class="trrr" autocomplete="off" onkeyup="getMobileStatus(this.value);"/>
                                        <input class="verif-submitbtn" id="verifybutton" value="Verify" type="button" onclick="veryfie()">
                                        <input class="verif-submitbtn" id="editmobile" value="Edit"  type="button" onclick="editmobileinsta();" style="display: none">
                                        {{-- <input type="text" name="mobile" id='txtPhone' class="form-control"
                                        placeholder="मोबाइल नंबर दर्ज करें" maxlength="10" autocomplete="off"
                                        /> --}}
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
                                    </div>

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
                                        <input type="submit" id="btninsta" class="btn btn-default btn-red" value="अभी अप्लाई करें" />
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

<!--galley section start here -->
<div class="modal fade lg-panel" id="myGallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="wrapper">
                        <div class="gallery">
                            @foreach ($images as $image)
                                <div class="gallery__img-block @if($loop->index == 0) current @endif" >
                                    <img src="{{ $image->image_type_slider2 }}" thumb-url="{{ $image->image_type_slider2 }}" alt="{{$franDetails->company_name}}" />
                                </div>
                            @endforeach
                            <div class="gallery__controls">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--galley section end  here -->


<script type="text/javascript">
    $(document).on('scroll', function () {


        scrollTop     = $(this).scrollTop();
        business      = $("#business_tab").offset().top -150;
        investmentnew = $("#investmentnew_tab").offset().top -150;
        property      = $("#property_tab").offset().top -150;
        training      = $("#training_tab").offset().top -150;
        others        = $("#others_tab").offset().top -150;

        if(scrollTop >= 118 && scrollTop < investmentnew) {
            $(".tabScroll li a").removeClass("active");
            $("#businessnew_tab").addClass("active");
        }
        if(scrollTop >= investmentnew && scrollTop < property) {
            $(".tabScroll li a").removeClass("active");
            $("#investmenttab_tab").addClass("active");
        }
        if(scrollTop >= property && scrollTop < training) {
            $(".tabScroll li a").removeClass("active");
            $("#propertynew_tab").addClass("active");
        }
        if(scrollTop >= training && scrollTop < others) {
            $(".tabScroll li a").removeClass("active");
            $("#trainingnew_tab").addClass("active");
        }
        if(scrollTop >= others) {
            $(".tabScroll li a").removeClass("active");
            $("#othersnew_tab").addClass("active");
        }
        // console.log("scrollTop" + scrollTop + "::" + "others-" + others);

    });

    function setPos(getid, id){
        $(".tabScroll li a").removeClass("active");
        $("#" + id).addClass("active");
        var pageScroll = $("#" + getid).offset().top -150;
        var body = $("html, body");
        body.stop().animate({scrollTop:pageScroll}, 500, 'swing', function() {
        });
    }

    /**************** /vikas***********************/

    if(screen.width>767) {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 1){
                $('#searchopt2').click();
                $('#landfixoptiongalley').addClass("stickylandgallry");
            }
            else{
                $('#landfixoptiongalley').removeClass("stickylandgallry");
            }
        });
    }

    $(document).ready(function(){
        var $gallery = $('.gallery');
        $gallery.vitGallery({
            debag: true,
            thumbnailMargin: 13,

            fullscreen: true
        })
    })

    $(document).ready(function () {
        $('#applbtn').click(function () {
            $('.aplbtn').hide();
            $("html, body").animate({ scrollTop: $('#show-m').offset().top-150 }, 1000);
            $("html, body").animate({ scrollTop: $('#expbtn').offset().top-150 }, 1000);
            return false;
        });
        if(screen.width < 768) {
            $("#myGallery").removeAttr( "id" );
        }
    });


    if("{{ $checkData['message'] }}" != "") {
        alert("{{ $checkData['message'] }}");
    }
</script>
<script>

    $(function() {
        //$('#contactsubmit').prop('disabled', true);
        $('#is_termsagree3').click(function() {
            if ($('#is_termsagree3').is(':checked')) {
                $('#btninsta').prop('disabled', false);
            }
            else {
                $('#btninsta').prop('disabled', true);
            }
        })
    })
</script>
