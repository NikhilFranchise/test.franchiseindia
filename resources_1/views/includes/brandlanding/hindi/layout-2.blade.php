<link href="{{URL::asset('css/layout_2.css')}}" rel="stylesheet" type="text/css">
<style>
    .centblkgdgdbg .rht-pnl .share-rat-pnl .rate-action { width: 102%; }
</style>

<!--Business Categories and breadcrumb End here -->
<div class="brandopt2">
    <div class="bannerimg"> <!--id="landfixoption2"-->
        <div class="centblk"  id="landfixoption2">
            <div class="row  bg-white landing bop2">
                <div class="row">
                    <div class="normal">
                        @if($franDetails->brand_verified == 1)
                        <div class="brand-verify-two"><i class="fa fa-check"></i> Verified</div>
                        @endif
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
                            <div class="brand-logo"><img src="{{$img}}" alt="{{$franDetails->company_name}}"/></div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-10 mdy-width">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h1 class="ttl">{{$franDetails->company_name}}</h1>
                                    <div class="sub-ttl">{{Config('constants.subSubCategoryArr.'.$franDetails->ind_cat.'.'.$franDetails->ind_sub_cat)}}</div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
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
        </div>

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach ($images as $image)
                    <li data-target="#myCarousel" data-slide-to="{{ $loop->index }}" @if ($loop->first) class="active" @endif></li>
                @endforeach
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="bglayerabove"></div>
                @foreach($images as $imageSlider)
                    <div class="item @if ($loop->first) active @endif sliderWidth" style="background: url({{ $imageSlider->image_type_slider1 }}) no-repeat center center;">
                        <img src="{{ $imageSlider->image_type_slider1 }}" alt="{{$franDetails->company_name}}"/>
                    </div>
                @endforeach
                <div class="bglayerbottom"></div>
            </div>
        </div>
    </div>
</div>
<div class="centblkgdgdbg">
    <div class="lft-pnl">
        <div class="business-infonoimg">
            <ul>
                @php
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
                <li>क्षेत्र की आवश्यकता <div>{{$area}}</div></li>
                <li>निवेश का आकार
                    <div>
                        INR {{ $minValue  }} - {{ $maxValue }}
                    </div>
                </li>
                <li>{{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ?  "डीलर / वितरक की संख्या" : "फ्रेंचाइजी आउटलेट्स की संख्या" }} <div>{{$franDetails->no_fran_outlets ?: '- NA -'}}</div></li>
            </ul>
        </div>
    </div>
    <div class="rht-pnl">
        <div class="share-rat-pnl">
            <!-- Rate Info Panel Start here-->
            <div class="rat-info">
                <ul>
                    <li><span><strong id="ratings"></strong></span></li>
                    <li><span><strong id="likecount">{{ $likesCnt }}</strong><strong>पसंद</strong></span></li>
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
                            <a data-toggle="#" data-target="#myRating" id="rateButton">रेटेड</a>
                        @else
                            <a data-toggle="modal" data-target="#myRating"  id="rateButton">
                                <i class="fa fa-star-half-o" aria-hidden="true"></i> रेटिंग </a>
                        @endif
                    </li>
                    <li><a data-toggle="modal" data-target="#mysocial">
                            <i class="fa fa-share-alt" aria-hidden="true"></i> शेयर</a></li>
                </ul>
            </div>
            <!-- Rate Action Panel End here-->
        </div>
    </div>
</div>

<div class="row  bdy-spc landing">
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

                        <!-- Share panel end here-->

                        <!-- Insta Apply section start here -->
                        <div class="instback">

                            @if(Auth::check() && Auth::user()->profile_type == Config('constants.ProfileType.Investor'))
                                @if ( count($expIntVal) == 0 || (Auth::user()->membership_type == 1 && $expIntVal->visibility == 0))
                                    @if(!empty($checkData['message']))
                                        {{ $checkData['message'] }}
                                    @endif

                                    @if($eligibility == 1 || $checkData['abilityToApply'] == 1)
                                        <input type="button" value="Submit Your Interest" id="expbtn" class="btn btn-default submi" />
                                    @endif

                                    </br>
                                    <div id="expbtnloading" style=" display: none; text-align: center; " />
                                    <label id="creditRemaining">कृपया प्रतीक्षा करें...</label><br>
                                    <div id="expintbutton" style = " display: none; ">
                                        <Input type="button" class="btn btn-default btn-red" id="proceedInterest" value="हाँ" />
                                        <Input type="button" class="btn btn-default btn-red" id="cancelinterest" value="रद्द करना" />
                                    </div>
                        </div>
                        <style type="text/css"> .green p span a { color:#fff; }</style>
                        <div class="insta-apply thankscs" id="expmsg" style="display:none;" >
                            <div  class="green">
                                <div class="bigth">धन्यवाद!</div>
                                <p><span class="popinfohead" id="companyContactinsta" style="color:#fff!important"></span></p>
                                <p><strong>सीओ नाम: </strong><span id="ceocontactinsta"></span></p>
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
                                <div class="ttl" id="instahead">इंस्टा आवेदन करें</div>
                                <div id="instaMsg" style="display:none;" class="green">
                                    <div class="bigth">धन्यवाद!</div>
                                    <p>आपकी रुचि दिखाने के लिए धन्यवाद {{$franDetails->company_name}}.</p>
                                    <p>आपका संपर्क विवरण कंपनी के साथ साझा किया गया है। आपको अपने निवेशक प्रोफाइल बनाने और ब्रांड से सीधे संपर्क करने के लिए अपग्रेड करने का अनुरोध किया है.</p>
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
                    <!-- Insta Apply section end here -->
                </div>
                <!-- Right panel End here -->
            </div>
        </div>
        <!-- Tab Content End Here -->
    </div>
    <!-- /row-->
</div>
</div>


<!--<script src="js/jquery.pagenav.js"></script>-->
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
        console.log("scrollTop" + scrollTop + "::" + "others-" + others);

    });

    function setPos(getid, id){
        $(".tabScroll li a").removeClass("active");
        $("#" + id).addClass("active");
        var pageScroll = $("#" + getid).offset().top -150;
        var body = $("html, body");
        body.stop().animate({scrollTop:pageScroll}, 500, 'swing', function() {
        });
    }

    if(screen.width>767) {

        $(window).scroll(function() {
            if ($(this).scrollTop() > 1){
                $('#searchopt2').click();
                $('#landfixoption2').addClass("stickylandpopt2");
            } else
                $('#landfixoption2').removeClass("stickylandpopt2");
        });
    }

    $(document).ready(function () {
        $('#applbtn').click(function () {
            $('.aplbtn').hide();
            $("html, body").animate({ scrollTop: $('#show-m').offset().top-150 }, 1000);
            $("html, body").animate({ scrollTop: $('#expbtn').offset().top-150 }, 1000);
            return false;
        });
    });

    if("{{ $checkData['message'] }}" != "") {
        alert("{{ $checkData['message'] }}");
    }
</script>
