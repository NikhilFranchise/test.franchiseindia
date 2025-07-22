<script type="text/javascript" src="{{ URL::asset('js/vit-gallery.js') }}"></script>
<link href="{{ URL::asset('css/vit-gallery.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('css/layout_3.css') }}" rel="stylesheet" type="text/css">

<div class="galleybg">
    <div class="centblknew" id="landfixoptiongalley">
        <div class="row  bg-white landing glysec">
            <div class="normal">
                
                <div class="col-xs-12 col-sm-3 col-md-2 mdy-width pad-top">
                    <div class="brand-logo">
                        @php
                            $eligibility = 0;

                            $checkData = [
                                'message' => '',
                                'abilityToApply' => 1,
                            ];

                            if (Auth::check() && Auth::user()->profile_type == 2) {
                                if (
                                    Auth::user()->membership_type == 1 ||
                                    request()->user()->reg_source == 'DelhiExpoPaid' && $inv_credits->credit_limit > 0
                                ) {
                                    $eligibility = 1;
                                } else {
                                    $checkData = \App\Http\Controllers\CommonController::checkInvestorApplicationEligibility();
                                    $eligibility = $checkData['abilityToApply'];
                                }
                            }

                            $img = 'https://www.franchiseindia.com/images/no-img.gif';

                            if (
                                ($franDetails->free_logo_visibility || $franDetails->membership_type != 0) &&
                                !empty($franDetails->company_logo)
                            ) {
                                $img = Config('constants.franAwsImgPath') . $franDetails->company_logo;
                            }
                        @endphp
                        <img src="{{ $img }}" alt="{{ $franDetails->company_name }}" />
                    </div>
                </div>
                @if($franDetails->brand_verified == 1)
                <div class="brand-verify-two"><i class="fa fa-check"></i> Verified</div>
                @endif
                {{-- <div class="brand-verify-two"><i class="fa fa-check"></i> Verified</div> --}}

                <div class="col-xs-12 col-sm-10 col-md-10 mdy-width">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 galleymar">
                            <div class="tab-panel">
                                <div class="lft-pnl">
                                    <ul class="tabScroll">
                                        <li class="Brandpadleft10"><a href="#" id="businessnew_tab"
                                                onclick="setPos('business_tab', this.id)" class="active">Business</a>
                                        </li>
                                        <li><a href="#" id="investmenttab_tab"
                                                onclick="setPos('investmentnew_tab', this.id)">Investment</a></li>
                                        <li><a href="#" id="propertynew_tab"
                                                onclick="setPos('property_tab', this.id)">Property</a></li>
                                        <li><a href="#" id="trainingnew_tab"
                                                onclick="setPos('training_tab', this.id)">Training</a></li>
                                        <li><a href="#" id="othersnew_tab"
                                                onclick="setPos('others_tab', this.id)">Agreement <span
                                                    class="hidemobileTerm">&amp; Term Details</span></a></li>
                                    </ul>
                                </div>
                                
                {{-- @if($franDetails->brand_verified == 1)
                <div style="text-align: right;">
                <img src="https://thumbs.dreamstime.com/b/verified-vector-stamp-isolated-white-background-41827520.jpg" style="height: 50px;">
                </div>
            @endif --}}
                                <div class="rht-pnl">
                                    @if (!Auth::user() || (Auth::user() && Auth::user()->profile_type == Config('constants.ProfileType.Investor')))
                                        @if (!empty($checkData['message']) && $eligibility != 1)
                                            <ul>
                                                <li>
                                                    {{ $checkData['message'] }}
                                                </li>
                                            </ul>
                                        @endif

                                        @if ($eligibility == 1 || $checkData['abilityToApply'] == 1)
                                            @if (Auth::check() && Auth::user()->profile_type == 2)
                                                <ul>
                                                    <li>
                                                        <a class="active" href="#" data-toggle="modal"
                                                            data-target="#modalGetFree" id="Investor">View Contact</a>
                                                    </li>
                                                </ul>
                                            @else
                                                <ul>
                                                    <li>
                                                        <a class="active" href="#" data-toggle="modal"
                                                            data-target="#modalGetFree" id="seo_contacts_btn">View
                                                            Contact</a>
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
                #myCarouselmobile {
                    display: none;
                }

                @media only screen and (min-width:1px) and (max-width:767px) {
                    #myCarouselmobile {
                        display: block;
                    }

                    #desktopvisible {
                        display: none;
                    }

                    #myCarouselmobile .carousel-inner>.item {
                        text-align: center;
                    }

                    #myCarouselmobile .carousel-inner>.item>a>img,
                    #myCarouselmobile .carousel-inner>.item>img {
                        margin: 0 auto;
                    }

                    #myCarouselmobile .carousel-control.left {
                        background-image: none;
                    }

                    #myCarouselmobile .carousel-control.right {
                        background-image: none;
                    }

                    #myCarouselmobile .glyphicon-chevron-left:before,
                    #myCarouselmobile .glyphicon-chevron-right:before {
                        color: #dc3322;
                    }

                    #myCarouselmobile .carousel-control {
                        text-shadow: none;
                        opacity: 0.8;
                    }

                    #myCarouselmobile .carousel-indicators li {
                        border: 1px solid #dc3322;
                    }

                    #myCarouselmobile .carousel-indicators .active {
                        background-color: #dc3322;
                    }

                    #myCarouselmobile .carousel-control .glyphicon-chevron-left,
                    #myCarouselmobile .carousel-control .glyphicon-chevron-right,
                    #myCarouselmobile .carousel-control .icon-next,
                    #myCarouselmobile .carousel-control .icon-prev {
                        top: 56%;
                    }
                }
            </style>
            <!--- start here -->
            <div id="myCarouselmobile" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach ($images as $image)
                        <li data-target="#myCarouselmobile" data-slide-to="{{ $loop->index }}"
                            @if ($loop->index == 0) class="active" @endif></li>
                    @endforeach
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    @foreach ($images as $image)
                        <div class="item @if ($loop->index == 0) active @endif">
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
                        @if ($loop->index == 0)
                            <a href="#" data-toggle="modal" data-target="#myGallery">
                                <img src="{{ $image->image_type_slider2 }}" alt="{{ $franDetails->company_name }}" />
                            </a>
                        @endif
                    @endforeach
                    <div class="mortxt">
                        @if($franDetails->ind_main_cat == 5)
                        <h1 class="txtshow"><span>
                            {{ Config('constants.subSubCategoryArr.' . $franDetails->ind_cat . '.' . $franDetails->ind_sub_cat) }}</span>
                        {{ $franDetails->company_name }} Dealership & Distributorship Cost – How to get, Contact, Apply, Fee</h1>
                        @else
                        <h1 class="txtshow"><span>
                                {{ Config('constants.subSubCategoryArr.' . $franDetails->ind_cat . '.' . $franDetails->ind_sub_cat) }}</span>
                            {{ $franDetails->company_name }} Franchise Cost – How to get, Contact, Apply, Fee</h1>
                        @endif    
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 mdf">
                    <ul>

                        @foreach ($images as $image)
                            @if ($loop->index > 0 && $loop->index < 3)
                                <li><a href="#" data-toggle="modal" data-target="#myGallery"><img
                                            src="{{ $image->image_type_slider2 }}"
                                            alt="{{ $franDetails->company_name }}"></a></li>
                            @endif
                        @endforeach

                        <li class="ts">
                            @if (count($images) > 4)
                                <div class="mortxt">
                                    <div class="txtshow">
                                        <a href="#" data-toggle="modal" data-target="#myGallery"><span>+</span> <br />
                                            {{ count($images) - 4 }} More</a>
                                    </div>
                                </div>
                            @endif

                            @foreach ($images as $image)
                                @if ($loop->index == 3)
                                    <img src="{{ $image->image_type_slider2 }}" alt="{{ $franDetails->company_name }}">
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
                        if ($minValue < 100000 && $minValue > 10000) {
                            $minValue = substr($minValue / 1000, 0, 5) . ' K';
                        }

                        if ($minValue <= 9999999 && $minValue > 100000) {
                            $minValue = substr($minValue / 100000, 0, 5) . ' Lakh';
                        }

                        if ($minValue > 9999999) {
                            $minValue = substr($minValue / 10000000, 0, 5) . ' Cr';
                        }

                        $maxValue = $franDetails->unit_inv_max;
                        if ($maxValue < 100000 && $maxValue > 10000) {
                            $maxValue = substr($maxValue / 1000, 0, 5) . ' K';
                        }

                        if ($maxValue <= 9999999 && $maxValue > 100000) {
                            $maxValue = substr($maxValue / 100000, 0, 5) . ' Lakh';
                        }

                        if ($maxValue > 9999999) {
                            $maxValue = substr($maxValue / 10000000, 0, 5) . ' Cr';
                        }
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

                    <li>
                        <div>{{ $area }}</div>Area Req
                    </li>
                    <li>
                        <div>
                            INR {{ $minValue }} - {{ $maxValue }}
                        </div>Investment Size
                    </li>
                    <li>
                        <div>{{ $franDetails->no_fran_outlets ?: '- NA -' }}</div>
                        {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? 'No. Of Dealer/Distributor' : 'No. Of Franchise Outlets' }}
                    </li>
                    <li>
                        <div>{{ $franDetails->operations_start_year }}</div> Establishment Year
                    </li>
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
                        @include('includes.brandlanding.business_desc_video')
                        <!-- Business Section End here -->

                        <!-- Investment Detail Section Start here -->
                        @include('includes.brandlanding.investment_tab')
                        <!-- Investment Detail Section End here -->

                        <!-- Property Details Section Start here -->
                        @include('includes.brandlanding.property_tab')
                        <!-- Property Details Section End here -->

                        <!-- Training Details Section Start here -->
                        @include('includes.brandlanding.training_tab')
                        <!-- Training Details Section End here -->

                        <!-- Training Details Section Start here -->
                        @include('includes.brandlanding.others_tab')
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
                                    <li><span><strong id="likecount">{{ $likesCnt }}</strong><strong>
                                                likes</strong></span></li>
                                </ul>
                            </div>
                            <!-- Rate Info Panel End here-->
                            <!-- Rate Action Panel Start here-->
                            <div class="rate-action">
                                <ul>
                                    <li>
                                        @if (!empty(Cookie::get('franLike' . $franDetails->franchisor_id)))
                                            <a onclick="#" class="like" id="likeButton">Liked</a>
                                        @else
                                            <a onclick = "likebtn('{{ $franDetails->franchisor_id }}');"
                                                class="like" id="likeButton">
                                                <i class="fa fa-thumbs-up" aria-hidden="true" id="like"></i>
                                                Like
                                            </a>
                                        @endif
                                    </li>
                                    <li>
                                        @if (!empty(Cookie::get('franRate' . $franDetails->franchisor_id)))
                                            <a data-toggle="#" data-target="#myRating" id="rateButton">Rated</a>
                                        @else
                                            <a data-toggle="modal" onclick="ratebtn()"  id="rateButton"><i
                                                    class="fa fa-star-half-o" aria-hidden="true"></i> Rate</a>
                                        @endif
                                    </li>
                                    <li><a data-toggle="modal" data-target="#mysocial" id="seo_shareButton"><i
                                                class="fa fa-share-alt" aria-hidden="true"></i> Share</a></li>
                                </ul>
                            </div>
                            <!-- Rate Action Panel End here-->
                        </div>
                        <!-- Share panel end here-->

                        <!-- Insta Apply section start here -->

                        @if (Auth::check() && Auth::user()->profile_type == Config('constants.ProfileType.Investor'))
                            {{-- @if (count($expIntVal) == 0 || (Auth::user()->membership_type == 1 && $expIntVal->visibility == 0)) --}}
                            @if (is_null($expIntVal) || (Auth::user()->membership_type == 1 && $expIntVal->visibility == 0))
                                @if (!empty($checkData['message']))
                                    {{ $checkData['message'] }}
                                @endif

                                @if ($eligibility == 1 || $checkData['abilityToApply'] == 1)
                                    <input type="button" value="Submit Your Interest" id="expbtn"
                                        class="btn btn-default submi">
                                @endif

                                </br>
                                <div id="expbtnloading" style=" display: none; text-align: center; " />
                                <label id="creditRemaining">Please Wait...</label><br>
                                <div id="expintbutton" style = " display: none; ">
                                    <Input type="button" class="btn btn-default btn-red" id="proceedInterest"
                                        value="Yes" />
                                    <Input type="button" class="btn btn-default btn-red" id="cancelinterest"
                                        value="Cancel" />
                                </div>
                    </div>
                    <style type="text/css">
                        .green p span a {
                            color: #fff;
                        }
                    </style>
                    <div class="insta-apply thankscs" id="expmsg" style="display:none;">
                        <div class="green">
                            <div class="bigth">Thank You!</div>
                            <p><span class="popinfohead" id="companyContactinsta" style="color:#fff!important;"></p>
                            <p><strong>Ceo Name: </strong><span id="ceocontactinsta"></span></p>
                            <p><strong>Tel No: </strong><span id="telephonecontactinsta"></span></p>
                            <p><strong>Address :</strong><span id="addressocontactinsta"></span></p>
                            <p><strong>Mobile :</strong><span id="mobilecontactinsta"></span></p>
                            <p><strong>Email : </strong><span id="emailcontactinsta"></span></p>
                            <p><strong>Website: </strong> <span id="websitecontactinsta"></span></p>
                        </div>
                    </div>
                    <div class="insta-apply thankscs" id="cancelExpress" style="display: none;">
                        <div class="green">
                            <div class="bigth">Thank You!</div>
                            <p>For your application</p>
                        </div>
                    </div>
                @else
                    <div class="insta-apply thankscs">
                        <div class="green">
                            <div class="bigth">Thank You!</div>
                            <p>Already Applied</p>
                        </div>
                    </div>
                    @endif
                    @endif

                    @if (!Auth::check() || Auth::user()->profile_type == Config('constants.ProfileType.Franchisor'))
                        <div class="insta-apply" id="show-m">
                            <div class="ttl" id="instahead">Insta Apply</div>
                            <div id="instaMsg" style="display:none;" class="green">
                                <div class="bigth">Thank You!</div>
                                <p>Thanks for showing your interest in {{ $franDetails->company_name }}.</p>
                                <p> Your contact detail has been shared with the company. requested you to create your
                                    investor profile and upgrade to directly contact the brand.</p>
                            </div>
                            <div id="existsMsg" style="display:none;" class="green">
                                <div class="bigth">Thank You!</div>
                                <p> Thanks for showing your interest in {{ $franDetails->company_name }}.</p>
                                <p> But you have already applied for {{ $franDetails->company_name }}.</p>
                            </div>
                            <div class="frm-sec" id="instaForm">
                                <form id="insta" action="{{ url('brandcontactinfo') }}" method="post"
                                    name="insta">

                                    @csrf
                                    <input type="hidden" name="frandetailsid" id="franId"
                                        value="{{ $franDetails->franchisor_id }}">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="infoname"
                                            placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control check-existing-registered-investor"
                                            id="newemail" name="infoemail" placeholder="Enter email">
                                    </div>
                                    <div class="form-group" style="position: relative;">
                                        <input type="text" name="mobile" id='txtPhone' class="form-control"
                                            placeholder="Enter Mobile No" maxlength="10" autocomplete="off"
                                            onkeyup="getMobileStatus(this.value);" />
                                        <input class="verif-submitbtn" id="verifybutton" value="Verify"
                                            type="button" onclick="veryfie()">
                                        <input class="verif-submitbtn" id="editmobile" value="Edit" type="button"
                                            onclick="editmobileinsta();" style="display: none">

                                            {{-- <input type="text" name="mobile" id='txtPhone' class="form-control"
                                            placeholder="Enter Mobile No" maxlength="10" autocomplete="off"
                                            /> --}}
                                       
                                       

                                    </div>
                                    <div class="form-group" id="otpblk" style="display:none;">
                                        <input type="text" id="otp" class="form-control"
                                            placeholder="one time password" />
                                        <input class="verif-submitbtn" id="submit" value="verify" type="button"
                                            onclick="checkinstaotp()">
                                        <span id="mobcat"></span>
                                    </div>
                                    <div class="form-group" id="otpblk1" style="display:none; color:red;">
                                        OTP mismatch..!
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="state" name="infostate"
                                            onchange="getcityinfoinsta(this.value)">
                                            <option value>Select State for Franchise</option>
                                            @php
                                                $stateArrVal = Config('location.stateArr');

                                                if (is_array($stateList) && count($stateList) > 0) {
                                                    $states = array_unique(array_column($stateList, 'state'));
                                                    foreach ($states as $state) {
                                                        $key = array_search($state, $stateArrVal);
                                                        if ($key !== false) {
                                                            echo "<option value='$key'>$state</option>";
                                                        }
                                                    }
                                                } else {
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
                                            <option value="">Select City for Franchise</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="pincode"
                                            placeholder="Enter Pincode" maxlength="6" />
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="address" placeholder="Enter Address" rows="3"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" id="investment_range_gallery"
                                            name="investment_range">
                                            <option value="">Select Investment Range</option>
                                            @foreach (Config('constants.investRangeInWords') as $index => $value)
                                                l
                                                @if ($franDetails->franchisor_id == 'FIHL456617')
                                                    @if ($index == 5)
                                                        <option value="{{ $index }}">{{ $value }}
                                                        </option>
                                                    @endif
                                                @else
                                                    <option value="{{ $index }}">{{ $value }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="newsletter_sub" checked> Yes, I want to
                                            subscribe for weekly Newsletter
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="is_termsagree3" id="is_termsagree3"
                                                value="1" checked> I agree to the <a
                                                href="{{ Config('constants.MainDomain') }}/terms"
                                                target="_blank">Terms & Conditions</a></label>
                                    </div>
                                    <div class="submit-btn" id="sub1" style="float: none;">
                                        <input type="submit" id="btninsta" class="btn btn-default btn-red"
                                            value="Apply Now">
                                    </div>

                                </form>

                            </div>

                            <div class="loantxt"><a target="_blank"
                                    href="{{ Config('constants.MainDomain') }}/property-loan">Loan Against Property
                                </a></div>
                            <style type="text/css">
                                .loantxt {
                                    border-top: 1px solid #dfdfdf;
                                    margin-top: 20px;
                                    text-align: center;
                                    padding-top: 10px;
                                    clear: both;
                                }

                                .loantxt a {
                                    color: #e62005;
                                }

                                .loantxt a:hover {
                                    text-decoration: underline;
                                }
                            </style>
                        </div>
                    @endif
                    <!-- Insta Apply section end here -->
                    <div class="clr"></div>
                    @desktop
                        <div class="catleftbanner300 detailpage">
                            {{-- @include("includes.banners.dfp_300X600") --}}
                            <!-- /1057625/FIHL/Desktop_ROS_300x250_ATF-->
                            <div id='adslot300x250_ATF' style="text-align:center;">

                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.display('adslot300x250_ATF');
                                    });
                                </script>
                            </div>
                        </div>
                        {{-- @endif --}}
                    @enddesktop

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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="wrapper">
                        <div class="gallery">
                            @foreach ($images as $image)
                                <div class="gallery__img-block @if ($loop->index == 0) current @endif">
                                    <img src="{{ $image->image_type_slider2 }}"
                                        thumb-url="{{ $image->image_type_slider2 }}"
                                        alt="{{ $franDetails->company_name }}" />
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
    $(document).on('scroll', function() {


        scrollTop = $(this).scrollTop();
        business = $("#business_tab").offset().top - 150;
        investmentnew = $("#investmentnew_tab").offset().top - 150;
        property = $("#property_tab").offset().top - 150;
        training = $("#training_tab").offset().top - 150;
        others = $("#others_tab").offset().top - 150;

        if (scrollTop >= 118 && scrollTop < investmentnew) {
            $(".tabScroll li a").removeClass("active");
            $("#businessnew_tab").addClass("active");
        }
        if (scrollTop >= investmentnew && scrollTop < property) {
            $(".tabScroll li a").removeClass("active");
            $("#investmenttab_tab").addClass("active");
        }
        if (scrollTop >= property && scrollTop < training) {
            $(".tabScroll li a").removeClass("active");
            $("#propertynew_tab").addClass("active");
        }
        if (scrollTop >= training && scrollTop < others) {
            $(".tabScroll li a").removeClass("active");
            $("#trainingnew_tab").addClass("active");
        }
        if (scrollTop >= others) {
            $(".tabScroll li a").removeClass("active");
            $("#othersnew_tab").addClass("active");
        }
        // console.log("scrollTop" + scrollTop + "::" + "others-" + others);

    });

    function setPos(getid, id) {
        $(".tabScroll li a").removeClass("active");
        $("#" + id).addClass("active");
        var pageScroll = $("#" + getid).offset().top - 150;
        var body = $("html, body");
        body.stop().animate({
            scrollTop: pageScroll
        }, 500, 'swing', function() {});
    }

    /**************** /vikas***********************/

    if (screen.width > 767) {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 1) {
                $('#searchopt2').click();
                $('#landfixoptiongalley').addClass("stickylandgallry");
            } else {
                $('#landfixoptiongalley').removeClass("stickylandgallry");
            }
        });
    }

    $(document).ready(function() {
        var $gallery = $('.gallery');
        $gallery.vitGallery({
            debag: true,
            thumbnailMargin: 13,

            fullscreen: true
        })
    })

    $(document).ready(function() {
        $('#applbtn').click(function() {
            $('.aplbtn').hide();
            $("html, body").animate({
                scrollTop: $('#show-m').offset().top - 150
            }, 1000);
            $("html, body").animate({
                scrollTop: $('#expbtn').offset().top - 150
            }, 1000);
            return false;
        });
        if (screen.width < 768) {
            $("#myGallery").removeAttr("id");
        }
    });


    if ("{{ $checkData['message'] }}" != "") {
        alert("{{ $checkData['message'] }}");
    }
</script>
<script>
    $(function() {
        //$('#contactsubmit').prop('disabled', true);
        $('#is_termsagree3').click(function() {
            if ($('#is_termsagree3').is(':checked')) {
                $('#btninsta').prop('disabled', false);
            } else {
                $('#btninsta').prop('disabled', true);
            }
        })
    })
</script>


<!-- INACTIVE BRANDS POPUP -->
@if($franDetails->profile_status == 11)
<div id="inactive-brands" >
    <style>
    :not(#inactive-brands){overflow-y: hidden;}
    .inb{overflow-y: scroll!important;}
    .inb-inner{background: url({{asset('images/inactivebgnew.jpg')}});background-repeat: repeat;position: 
    relative;width: 600px;height: 550px;margin: 0px auto;background-repeat: no-repeat;}
    .inb-top{text-align: center;}
    .inb{position: fixed;width: 100%;height: 100%;background: rgba(0,0,0,0.5);top: 0px;left: 0px;overflow: hidden;z-index: 9999;}
    .inb-headline{display: inline-block;margin-top: 10px;background: #fff;padding: 4px 41px;border-radius: 0px 0px 15px 15px;color: #e83a21;font-weight: 800;font-size: 17px;}
    .inb-cont{color: #fff;padding: 0px 0px;text-align: center;margin: 10px auto auto auto;font-weight: 300;font-size: 15px;width: 460px;max-width: 100%;line-height: 20px;}
    .inb-view{position: absolute;bottom:12px;text-align: center;width: 100%;}
    .inb-view a{background: #f00;padding: 6px 20px;color: #fff;font-weight: bold;display: inline-block;font-size: 13px;}
    .inb-brands ul li{background: #e9e9e9;border-radius: 0px 0px 30px 30px;width: 32%;height: 98px;margin-bottom: 9px;}
    .inb-brands ul li img{max-width: 100%;}
    .inb-brands{padding: 0px 30px;margin-top: 0px;}
    .inb-brands ul{display: flex;justify-content: space-between;margin-top: 40px;flex-wrap: wrap;padding: 0px 8px;}
    .inb-brand-title{text-align: center;
      font-weight: bold;color: #222222;font-size: 14px;line-height: 15px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;display: block;width: 125px;margin: auto;}
    .inb-brand-inv{text-align: center;font-size: 11px;}
    .inb-brand-pic{width: 95px;display: block;margin: 10px auto 4px auto;border: 1px solid #e3e3e3;border-radius: 5px;padding: 5px;background: #fff;}
    
    @media screen and (max-width:599px){
    .inb-inner{background: url({{asset('images/inbback.jpg')}});background-repeat: no-repeat;background-repeat: no-repeat;border: 1px solid #f00;max-width: 95%;height: auto;background-size: cover;background-position: center;}
    .inb-brands ul{background: url({{asset('images/inbmobilebg.png')}});background-size:100% 100%;display: block;background-position: center;background-repeat: no-repeat;text-align: center;padding: 20px 5px;margin-bottom: 60px;margin-top: 15px;}
    .inb-brands ul li{display: inline-block;background: #E9E9E9;border-radius: 0px 0px 30px 30px;width: 44%;margin: 2px 0px;}
    .inb-brand-title{font-size: 13px;width: 78px;}
    .inb-brand-inv{font-size: 11px;width: 80px;margin: auto;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;}
    .inb-cont {font-size: 14px;width: 100%;padding:3px 10px;line-height: 19px;margin: 6px auto auto auto;}
    .inb-headline{font-size: 15px;}
    .inb-view a{font-size: 11px;}
    .inb-inner{margin-top:10px;}
    }
    </style>
    
    <div class="inb" id="inactive-brands">
          <div class="inb-inner">
            <div class="inb-top">
            <div class="inb-headline">Top <span>{{$index_value}}</span> Brands</div>
            </div>
            <div class="inb-cont">This brand is currently not accepting franchise applications. However, you can explore the brands with similar category that offer franchising opportunities.</div>
          <div class="inb-brands">
            <ul>
                @php
                $cat_url = Config('constants.MainDomain').'/business-opportunities/' .$url_slug .'.m' .$franDetails->ind_main_cat;;
                @endphp
                
                @foreach($fran_new_data as $brands)
                @php
                 $brandImagepath = Config('constants.franAwsImgPath').$brands->company_logo;
                 $brandUrl       = sprintf(Config('constants.brandPagePattern'), Config('constants.MainDomain'), $brands->profile_name, $brands->fran_detail_id);
                 $minValue = $brands->unit_inv_min;
                        if (is_numeric($minValue)) {
                            if ($minValue < 100000 && $minValue > 10000) {
                                $minValue = substr($minValue / 1000, 0, 5) . ' K';
                            } elseif ($minValue <= 9999999 && $minValue > 100000) {
                                $minValue = substr($minValue / 100000, 0, 5) . ' Lakh';
                            } elseif ($minValue > 9999999) {
                                $minValue = substr($minValue / 10000000, 0, 5) . ' Cr';
                            }
                        }

                        $maxValue = $brands->unit_inv_max;
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
                <li>
                    <div class="inb-brand-pic">
                        <a href="{{$brandUrl}}" target="_blank"><img src="{{$brandImagepath}}" alt="Grow Inn Steps"></a>
                    </div>
                    <div class="inb-brand-title">
                        <a href="{{$brandUrl}}" target="_blank">{{$brands->company_name}} </a>
                    </div>
                    <div class="inb-brand-inv">
                        INR {{ $minValue }} - {{ $maxValue }}
                    </div>
                </li>
                @endforeach
               
            </ul>
          </div>
          <div class="inb-view">
            <a href="{{$cat_url}}" target="_blank">VIEW MORE</a>
            {{-- <a href="" target="_blank">VIEW MORE</a> --}}

          </div>
        </div>
    
    <script>
      setTimeout(function() {
        $('#inactive-brands').inb();
    }, 100);
    </script>
    </div>
    @endif
    <!-- INACTIVE BRANDS POPUP -->
    