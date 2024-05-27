@php
    use Illuminate\Support\Arr;
@endphp
<div class="row  landing" id="landfix">
    <div class="container">
        <div class="row">
            <div class="normal">
                <div class="col-xs-12 col-sm-3 col-md-2 mdy-width pad-top">
                    @php
                        $eligibility = 0;
                        $checkData = [
                            'message' => '',
                            'abilityToApply' => 1,
                        ];
                        if (Auth::check() && \Illuminate\Support\Facades\Auth::user()->profile_type == 2) {
                            if (\Illuminate\Support\Facades\Auth::user()->membership_type == 1) {
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
                    <div class="brand-logo"><img src="{{ $img }}" alt="{{ $franDetails->company_name }}" /></div>
                </div>
                <div class="col-xs-12 col-sm-10 col-md-10 mdy-width">
                    <div class="row">
                        <!-- Business Title -->
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="sub-ttl">
                                {{ Config('constants.subSubCategoryArr.' . $franDetails->ind_cat . '.' . $franDetails->ind_sub_cat) }}
                            </div>
                            <h1 class="ttl">{{ $franDetails->company_name }} Franchise Cost – How to get, Contact,
                                Apply, Fee</h1>
                        </div>
                        <!-- /Business Title -->
                        <!-- Tab Panel Start Here -->
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="tab-panel">
                                <div class="lft-pnl">
                                    <ul class="tabScroll">
                                        <li><a href="#business_tab">Business</a></li>
                                        <li><a href="#investmentnew_tab">Investment</a></li>
                                        <li><a href="#property_tab">Property</a></li>
                                        <li><a href="#training_tab">Training</a></li>
                                        <li><a href="#others_tab">Agreement <span class="hidemobileTerm">& Term
                                                    Details</span></a></li>
                                    </ul>
                                </div>
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
                                    if (is_numeric($maxValue) > 9999999) {
                                        $maxValue = substr($maxValue / 10000000, 0, 5) . ' Cr';
                                    }
                                @endphp
                                <li>
                                    Area Req
                                    <div>{{ $area }}</div>
                                </li>
                                <li>
                                    Investment Range
                                    <div>
                                        INR {{ $minValue }} - {{ $maxValue }}
                                    </div>
                                </li>
                                <li>
                                    {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? 'No. Of Dealer/Distributor' : 'No. Of Franchise Outlets' }}
                                    <div>{{ $franDetails->no_fran_outlets ?: '- NA -' }}</div>
                                </li>
                            </ul>
                        </div>
                        <!-- Business Section Start here -->
                        @include('includes.brandlanding.business_desc_video')
                        <!-- Business Section End here -->
                        <!-- Investment Detail Section Start here -->
                        @include('includes.brandlanding.investment_tab')
                        <!-- Investment Detail Section End here -->
                        <div class="brandwidth">
                            <div id = "v-franchiseindia"></div>
                            <script>
                                (function(v, d, o, ai) {
                                    ai = d.createElement("script");
                                    ai.defer = true;
                                    ai.async = true;
                                    ai.src = v.location.protocol + o;
                                    d.head.appendChild(ai);
                                })(window, document, "//a.vdo.ai/core/v-franchiseindia/vdo.ai.js");
                            </script>
                        </div>
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
                                                likes</strong></span>
                                    </li>
                                </ul>
                            </div>
                            <!-- Rate Info Panel End here-->
                            <!-- Rate Action Panel Start here-->
                            <div class="rate-action">
                                <ul>
                                    <li>
                                        @if (!empty(Cookie::get('franLike' . $franDetails->franchisor_id)))
                                            <a href="#" class="like" id="likeButton">Liked</a>
                                        @else
                                            <a onclick="likebtn('{{ $franDetails->franchisor_id }}');" class="like"
                                                id="likeButton">
                                                <i class="fa fa-thumbs-up" aria-hidden="true" id="like"></i> Like
                                            </a>
                                        @endif
                                    </li>
                                    <li>
                                        @if (!empty(Cookie::get('franRate' . $franDetails->franchisor_id)))
                                            <a data-toggle="#" data-target="#myRating" id="rateButton">Rated</a>
                                        @else
                                            <a data-toggle="modal" data-target="#myRating" id="rateButton"><i
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
                            @if (count($expIntVal) == 0 || (Auth::user()->membership_type == 1 && $expIntVal->visibility == 0))
                                @if (!empty($checkData['message']))
                                    {{ $checkData['message'] }}
                                @endif
                                @if ($eligibility == 1 || $checkData['abilityToApply'] == 1)
                                    <input type="button" value="Submit Your Interest" id="expbtn"
                                        class="btn btn-default submi" /></br>
                                @endif
                                <div id="expbtnloading" style=" display: none; text-align: center; ">
                                    <label id="creditRemaining">Please Wait...</label><br>
                                    <div id="expintbutton" style=" display: none; ">
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
                                        <p><span class="popinfohead" id="companyContactinsta"
                                                style="color:#fff!important"></span>
                                        </p>
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
                                    <p> Your contact detail has been shared with the company. requested you to create
                                        your investor profile and upgrade to directly contact the brand.</p>
                                </div>
                                <div id="existsMsg" style="display:none;" class="green">
                                    <div class="bigth">Thank You!</div>
                                    <p> Thanks for showing your interest in {{ $franDetails->company_name }}.</p>
                                    <p> But you have already applied for {{ $franDetails->company_name }}.</p>
                                </div>
                                <div class="frm-sec" id="instaForm">
                                    <form id="insta" action="{{ url('brandcontactinfo') }}" method="post"
                                        name="insta">
                                        <input type="hidden" name="frandetailsid" id="franId"
                                            value="{{ $franDetails->franchisor_id }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="infoname"
                                                placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control check-existing-registered-investor" id="newemail"
                                                name="infoemail" placeholder="Enter email">
                                        </div>
                                        <div class="form-group" style="position: relative;">
                                            <input type="text" name="mobile" id='txtPhone' class="form-control"
                                                placeholder="Enter Mobile No" maxlength="10" autocomplete="off"
                                                onkeyup="getMobileStatus(this.value);" />
                                            <input class="verif-submitbtn" id="verifybutton" value="Verify"
                                                type="button" onclick="veryfie()">
                                            <input class="verif-submitbtn" id="editmobile" value="Edit"
                                                type="button" onclick="editmobileinsta();" style="display: none">
                                        </div>
                                        <div class="form-group" id="otpblk" style="display:none;">
                                            <input type="text" id="otp" class="form-control"
                                                placeholder="one time password" />
                                            <input class="verif-submitbtn" id="submit" value="verify"
                                                type="button" onclick="checkinstaotp()">
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
                                                    $stateListArray = Arr::get(
                                                        json_decode($stateList, true),
                                                        'region',
                                                        [],
                                                    );

                                                    $states = array_unique(array_column($stateListArray, 'state'));
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
                                                            echo "
                                  <option value='$key'>$state</option>
                                  ";
                                                        }
                                                    } else {
                                                        $stateArrVal = Config('location.stateArr');
                                                        asort($stateArrVal);
                                                        foreach ($stateArrVal as $key => $value) {
                                                            echo "
                                  <option value='$key'>$value</option>
                                  ";
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
                                                    @if ($franDetails->franchisor_id = 'FIHL456617')
                                                        @if ($index = 5)
                                                            <option value="{{ $index }}">{{ $value }}
                                                            </option>
                                                        @endif
                                                    @else
                                                        <option value="{{ $index }}">{{ $value }}
                                                        </option>
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
                                        <div class="submit-btn" id="sub" style="float: none;">
                                            <input type="submit" id="btninsta" class="btn btn-default btn-red"
                                                value="Apply Now">
                                        </div>
                                    </form>
                                </div>
                                <div class="loantxt"><a target="_blank"
                                        href="{{ Config('constants.MainDomain') }}/property-loan">Loan Against
                                        Property </a></div>
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
                        <div class="catleftbanner300 detailpage">
                            <!-- /1057625/FIHL/Desktop_ROS_300x250_ATF-->
                            @desktop
                                <div id='adslot300x250_ATF' style="text-align:center;">
                                    <script>
                                        googletag.cmd.push(function() {
                                            googletag.display('adslot300x250_ATF');
                                        });
                                    </script>
                                </div>
                            @enddesktop
                            {{-- @include("includes.banners.dfp_300X600") --}}
                        </div>
                        {{--
                   <div class="catleftbanneryahoo300"> --}}
                        {{-- @include("includes.banners.yahoo_300X600") --}}
                        {{--
                   </div>
                   --}}
                        {{-- --}}
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
