@extends('layout-hindi.master')

@if(!empty($seoTitle))
    @section('seoTitle', $seoTitle)
@endif
@if(!empty($seoDesc))
    @section('seoDesc', $seoDesc)
@endif
@if(!empty($seoKeywords))
    @section('seoKeywords', $seoKeywords)
@endif

@php
    $hindiUrl = url()->current();
    $engUrl   = str_replace('/hi/', '/', url()->current());
@endphp

@section('hindiUrl', $hindiUrl)
@section('englishUrl', $engUrl)

{{-- @section('hindibrandUrls')
    <link href="{{ str_replace('/hi/', '/amp/hi/', $hindiUrl) }}" rel="amphtml">
    <link rel="alternate" href="{{ $engUrl }}" hreflang="en-IN" />
    <link rel="alternate" href="{{ $hindiUrl }}" hreflang="hi-IN" />
@endsection --}}
@section('hindibrandUrls')
    <link href="{{ str_replace('/hi/', ' ', $hindiUrl) }}" >
    <link rel="alternate" href="{{ $engUrl }}" hreflang="en-IN" />
    <link rel="alternate" href="{{ $hindiUrl }}" hreflang="hi-IN" />
@endsection
@section('content')

    @php
        $eligibility = 0;
        $checkData   = [];
        if(Auth::check() && \Illuminate\Support\Facades\Auth::user()->profile_type == 2) {
            if(\Illuminate\Support\Facades\Auth::user()->membership_type == 1)
                $eligibility = 1;
            else {
                $checkData = \App\Http\Controllers\CommonController::checkInvestorApplicationEligibility();
                $eligibility = $checkData['abilityToApply'];
            }
        }
    @endphp

    <link href="{{url('css/vit-gallery.css')}}" rel="stylesheet" type="text/css">

    <!---->
    <div class="sortbtn"> <span  id="sortlbtn"> <i class="fa fa-filter" aria-hidden="true"></i> फ़िल्टर</span> </div>
    <!--runner start here 1 -->
    <div class="cateblock margintop20 categories-list">
        <div class="container">
            <div class="row row-no-margin">
                <!-- category left panel start here  -->
                @include('location.hindi-category.hindi-category-left-section')
                <!-- category left panel end here  -->
                <div class="col-xs-12 col-sm-8 col-md-9 bor-radius backwhite catright row-no-padding">

                    @include('location.hindi-category.navigation-search-by-hindi')
                    @include('location.top-paid-cat-banner')

                    <!-- category list section start here-->
                    <div class="row row-no-margin catpadtop20">
                        @if(session()->has('freeinfomsg'))
                            <div class="alert alert-info">{!! session()->get('freeinfomsg') !!}</div>
                        @endif
                        @php
                            $i          = 0;
                            $banner     = 1;
                            $longbanner = 0;
                            $shortBox   = 0;
                        @endphp
                        @foreach($shuffledResults as $brandResult)

                            @php
                                $brandUrl       = sprintf(Config('constants.brandPagePattern'), Config('constants.MainDomain'), $brandResult->profile_name, $brandResult->fran_detail_id);
                                if($brandResult->is_hindi == 1 )
                                    $brandUrl       = url('hi/brands/'.$brandResult->profile_name.'.'.$brandResult->fran_detail_id);
                                $is_premium     = 0;
                                $imgCount       = 0;
                                $SubCatName     = "";
                                $noImage        = "https://www.franchiseindia.com/images/no-img.gif";
                                $image          = $noImage;
                                $brandImagepath = Config('constants.franAwsImgPath').$brandResult->company_logo;
                                $minValue       = $brandResult->unit_inv_min;
                                $area           = "-N/A-";

                                if($minValue < 100000 && $minValue > 10000)
                                    $minValue = substr(($minValue/1000),0,5).' K';

                                if($minValue <= 9999999 && $minValue > 100000)
                                    $minValue = substr(($minValue/100000),0,5).' Lac';

                                if($minValue > 9999999)
                                    $minValue = substr(($minValue/10000000),0,5).' Cr';

                                $maxValue = $brandResult->unit_inv_max;
                                if($maxValue < 100000 && $maxValue > 10000)
                                    $maxValue = substr(($maxValue/1000),0,5).' K';

                                if($maxValue <= 9999999 && $maxValue > 100000)
                                    $maxValue = substr(($maxValue/100000),0,5).' Lac';

                                if($maxValue > 9999999)
                                    $maxValue = substr(($maxValue/10000000),0,5).' Cr';

                                $priceRange = "INR  $minValue  - $maxValue ";

                                if(empty($brandResult->company_logo))
                                    $brandImagepath = $noImage;

                                foreach  ( Config('hindiConstants.subSubCategoryArr') as $key => $abc) {
                                    if(array_key_exists($brandResult->ind_sub_cat, $abc)){
                                        $SubCatName = $abc[$brandResult->ind_sub_cat];
                                    }
                                }

                                foreach($franImageData as $imgData) {
                                    if( $imgData->franchisor_id == $brandResult->franchisor_id ) {
                                        $image      = $imgData->image_type_slider2;
                                        $is_premium = 1;
                                        $imgCount   = $imgData->count;
                                    }
                                }

                                if(!empty($brandResult->prop_area_max))
                                    $area = $brandResult->prop_area_min." - ".$brandResult->prop_area_max;

                                if(empty($brandResult->prop_area_max))
                                    $area = $brandResult->prop_area_min;

                                if(empty($brandResult->prop_area_min))
                                    $area = "-N/A-";

                                $likes = 0;
                                $rate  = 0;
                                if(!empty($brandResult->franchisorLike)){
                                    $likes = $brandResult->franchisorLike->blike;
                                    if($brandResult->franchisorLike->brate != 0 && $brandResult->franchisorLike->bclick != 0){
                                        $rate = $brandResult->franchisorLike->brate/$brandResult->franchisorLike->bclick;
                                        $rate = round( $rate, 1);
                                    }
                                }
                            @endphp

                            @if($brandResult->membership_type == 1)

                                @include('location.hindi-category.paid-brand-hindi')

                                @if($banner == 7)
                                    <div class="col-xs-12 col-sm-6 col-md-6 catlistinfo row-no-padding" >
                                        <div>
                                            <div class="catbannerblk">
                                                <div class="dfp_300X250">
                                                {{--<div id='div-gpt-ad-1563348795825-0' style='width: 300px; height: 250px;'></div>--}}
                                                <!-- /1057625/FIHL/Desktop_Category_300x250_Mid_1-->
                                                    <div id='adslot300x250_Mid_1' style='width: 300px; height: 250px;'>
                                                        <script>
                                                            googletag.cmd.push(function() { googletag.display('adslot300x250_Mid_1'); });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $banner++;
                                        $i++;
                                    @endphp
                                @endif

                                @if($banner == 14)
                                    <div class="col-xs-12 col-sm-6 col-md-6 catlistinfo row-no-padding" >
                                        <div class="catbannerblk">
                                        <!-- /1057625/FIHL/Desktop_Category_300x250_Mid_2-->
                                            <div id='adslot300x250_Mid_2' style='width: 300px; height: 250px;'>
                                                <script>
                                                    googletag.cmd.push(function() { googletag.display('adslot300x250_Mid_2'); });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $banner++;
                                        $i++;
                                    @endphp
                                @endif

                                @if($banner == 21)
                                    <div class="col-xs-12 col-sm-6 col-md-6 catlistinfo row-no-padding" >
                                        <div class="catbannerblk">
                                            <div class="dfp_300X250">
                                            {{--<div id='div-gpt-ad-1563348795825-2' style='width: 300px; height: 250px;'></div>--}}
                                            <!-- /1057625/FIHL/Desktop_Category_300x250_Mid_3-->
                                                <div id='adslot300x250_Mid_3' style='width: 300px; height: 250px;'>
                                                    <script>
                                                        googletag.cmd.push(function() { googletag.display('adslot300x250_Mid_3'); });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $banner++;
                                        $i++;
                                    @endphp
                                @endif

                                @php
                                    $banner++;
                                    $i++;
                                @endphp


                            @elseif($brandResult->membership_type == 0)

                                    @php
                                        $flag = 1;
                                    @endphp
                                    @if ($i % 2 != 0)

                                        <div class="col-xs-12 col-sm-6 col-md-6 catlistinfo row-no-padding" >
                                            @desktop
                                            <div class="dfp_240X400">
                                            {{--<div id='div-gpt-ad-1504794961823-0' style='height:400px; width:240px; margin:0 auto;'></div>--}}
                                            <!-- /1057625/FIHL/Desktop_Category_240x400_Mid_1-->
                                                <div id='adslot240x400_Mid_{{$flag}}' style='height:400px; width:240px; margin:0 auto;'>
                                                    <script>
                                                        googletag.cmd.push(function() { googletag.display('adslot240x400_Mid_{{$flag}}'); });
                                                    </script>
                                                </div>
                                            </div>
                                            @enddesktop
                                            @tablet
                                            <div class="dfp_240X400">
                                            {{--<div id='div-gpt-ad-1504794961823-0' style='height:400px; width:240px; margin:0 auto;'></div>--}}
                                            <!-- /1057625/FIHL/Desktop_Category_240x400_Mid_1-->
                                                <div id='adslot240x400_Mid_{{$flag}}' style='height:400px; width:240px; margin:0 auto;'>
                                                    <script>
                                                        googletag.cmd.push(function() { googletag.display('adslot240x400_Mid_{{$flag}}'); });
                                                    </script>
                                                </div>
                                            </div>
                                            @endtablet
                                            @mobile
                                            <div class="dfp_300X250">
                                            {{--<div id='div-gpt-ad-1504794961823-0' style='height:400px; width:240px; margin:0 auto;'></div>--}}
                                            <!-- /1057625/FIHL/Desktop_Category_240x400_Mid_1-->
                                                <div id='adslot300X250_Mid_{{$flag}}' style='height:300px; width:250px; margin:0 auto;'>
                                                    <script>
                                                        googletag.cmd.push(function() { googletag.display('adslot300X250_Mid_{{$flag}}'); });
                                                    </script>
                                                </div>
                                            </div>
                                            @endmobile

                                        </div>
                                        @php
                                            $flag++;
                                            $i = $i + 1;
                                        @endphp
                                    @endif

                                @if($longbanner == 0)
                                    @if($i > 1)
                                        <div class="row row-no-margin borderbd padtb20 catbannertop">
                                            @desktop
                                            <div class="yahoo_728X90">

                                                <!-- /1057625/FIHL/Desktop_Category_728x90_Mid_1-->
                                                <div id='adslot728x90_Mid_1' style='height:90px; width:728px;'>
                                                    <script>
                                                        googletag.cmd.push(function() { googletag.display('adslot728x90_Mid_1'); });
                                                    </script>
                                                </div>
                                            </div>
                                            @enddesktop
                                            @mobile
                                            <div class="yahoo_cat_468X60">
                                            {{--<div id='div-gpt-ad-1563348795825-2' style='width: 300px; height: 250px;'></div>--}}
                                            <!-- /1057625/FIHL/Desktop_Category_300x250_Mid_3-->
                                                <div id='adslot300x250_Mid_1' style='width: 300px; height: 250px;'>
                                                    <script>
                                                        googletag.cmd.push(function() { googletag.display('adslot300x250_Mid_3'); });
                                                    </script>
                                                </div>
                                            </div>
                                            @endmobile
                                        </div>
                                        @endif
                                    @php
                                        $longbanner++;
                                    @endphp
                                @endif

                                @if($banner == 7 )
                                    <div class="col-xs-12 col-sm-6 col-md-4 catlistmar sec-slide-effect">
                                        <div class="business-list hvr-effect">
                                            <div class="smallcatblk">
                                                <div class="dfp_200X200">
                                                <!-- /1057625/FIHL/Desktop_Category_200x200_Mid_1-->
                                                    <div id='adslot200x200_Mid_1' style='height:200px; width:200px;'>
                                                        <script>
                                                            googletag.cmd.push(function() { googletag.display('adslot200x200_Mid_1'); });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $banner++;
                                        $shortBox++;
                                    @endphp
                                @endif

                                @if($banner == 14 )
                                    <div class="col-xs-12 col-sm-6 col-md-4 catlistmar sec-slide-effect">
                                        <div class="business-list hvr-effect">
                                            <div class="smallcatblk">
                                                <div class="dfp_200X200">
                                                <!-- /1057625/FIHL/Desktop_Category_200x200_Mid_2-->
                                                    <div id='adslot200x200_Mid_2' style='height:200px; width:200px;'>
                                                        <script>
                                                            googletag.cmd.push(function() { googletag.display('adslot200x200_Mid_2'); });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $banner++;
                                        $shortBox++;
                                    @endphp
                                @endif

                                @if($banner == 21 )
                                    <div class="col-xs-12 col-sm-6 col-md-4 catlistmar sec-slide-effect">
                                        <div class="business-list hvr-effect">
                                            <div class="smallcatblk">
                                                <div class="dfp_200X200">
                                                <!-- /1057625/FIHL/Desktop_Category_200x200_Mid_3-->
                                                    <div id='adslot200x200_Mid_3' style='height:200px; width:200px;'>
                                                        <script>
                                                            googletag.cmd.push(function() { googletag.display('adslot200x200_Mid_3'); });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $banner++;
                                        $shortBox++;
                                    @endphp
                                @endif

                                @include('location.hindi-category.free-brand-hindi')

                                @php
                                    $banner++;
                                    $shortBox++;
                                @endphp
                            @endif
                        @endforeach

                        @include('location.final-conditions')
                        @php
                            $params = ['sortby'=>$orderby];
                            if(!empty($text))
                                $params['text'] = $text;
                            if(!empty($searchq))
                                $params['searchq'] = $searchq;
                        @endphp
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                @if(count($brandResults) == 0)
                                    <div class="noresults">कोई परिणाम नहीं मिला</div>
                                @endif
                                {!! $brandResults->appends($params)->render() !!}
                            </div>
                        </div>
                    </div>
                    <!-- category list section end here-->
                </div>
            </div>
        </div>
    </div>
    <!--runner end here 1 -->

    <!--Landing page start here -->
    @include('category.hindi-category.seo-desc-hindi')
    <!--Landing page end here -->
    <div id="comparebottom" class="ttl-brnd-list">
    <div class="popblkbtm">
        <form method="post" action="{{URL('compare-brands')}}">
            You selected <span class="count">0</span>Brands for Comparison (Max @mobile 2 @endmobile @notmobile 3 @endnotmobile)
            <input type="hidden" name="franchisors" id="franchisorsForComparison">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" class="brandRequest" value="Compare" />
        </form>
    </div>
    </div>
    <!--- Get Free Info stickely start here  -->
    @if(!Auth::check() || Auth::user()->profile_type == 1)
        <div id="getFreeInfo" class="ttl-brnd-list">
            <span class="count">0</span>मेरी सूची में ब्रांड
            <a href="#" data-toggle="modal" data-target="#modalGetFree"  id="getfreewindowstate" >अभी अनुरोध करें</a>
        </div>
    @else
        <div id="getFreeInfo" class="ttl-brnd-list">
            <div class="popblkbtm">
                <div class="blkpop"> <span class="count">0</span>मेरी सूची में ब्रांड </div>
                @if(!empty($checkData['message']))
                    {{ $checkData['message'] }}
                @endif

                @if($eligibility == 1 || $checkData['abilityToApply'] == 1)
                    <form method="post" action="{{URL('multipleInvFreeinfo')}}">
                        <input type="hidden" name="franchisors" id="franchisorsForInv">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit" class="brandRequest" value="अभी अनुरोध करें" />
                    </form>
                @endif
            </div>
        </div>
    @endif
    <!--- Get Free Info stickely end here  -->

    <!-- Get Free Info Modal Window -->
    @include('category.hindi-category.free-info-hindi')
    <!--End Get Free Info Modal Window -->

    <!-- Popup Gallery Code Starts Here -->
    @include('category.hindi-category.popup-gallery-hindi')
    <!-- Popup Gallery Code End Here -->
    <script type="text/javascript" src="{{url('awesomplete/awesomplete.js') }}"></script>

    <script language="javascript">

        //action on submit your interest
        $('#expbtn').on('click', function() {
            let franId = document.getElementById('expIntFranId').value;
            document.getElementById("expbtn").style.display = "none";
            document.getElementById("expbtnloading").style.display = "block";
            $.ajax({
                type: 'post',
                url: '{{URL('/inv-lead?flag=expint')}}',
                data: {
                    franId: franId,
                },
                success: function (data) {

                    if ( $.isNumeric(data) ) {

                        $('#expintbutton').css('display', 'block');
                        $('#creditRemaining').html('आपके पास' + data + 'क्रेडिट शेष है। क्या आप क्रेडिट का उपयोग करना चाहते हैं');

                    } else if ( data == "showMsg" ) {

                        window.location.assign('{{Config('constants.MainDomain')}}/investor/myaccount/payment');

                    } else {

                        document.getElementById("expbtnloading").style.display = "none";
                        document.getElementById("expmsg").style.display = "block";
                        $('#companyContactinsta').html(data.user.company_name);
                        $('#ceocontactinsta').html(data.user.ceo_name);
                        $('#telephonecontactinsta').html(data.user.telephone);
                        $('#addressocontactinsta').html(data.user.fran_address+""+data.user.city+""+data.user.state+""+data.user.pincode);
                        $('#emailcontactinsta').html("<a href='mailto:"+data.user.email+"' target='_blank'>"+data.user.email+"</a>");
                        $('#mobilecontactinsta').html(data.user.mobile);
                        $('#websitecontactinsta').html("<a href='http://"+data.user.website+"' target='_blank'>"+data.user.website+"</a>");

                    }
                }
            });
        });


        $('#proceedInterest').on('click', function () {

            $('#expintbutton').css('display', 'none');
            $('#creditRemaining').html('कृपया प्रतीक्षा करें....');
            let franId = document.getElementById('expIntFranId').value;
            $.ajax({
                type: 'post',
                url: '{{URL('/inv-lead')}}',
                data: {
                    franId: franId,
                },
                success: function (data) {

                    document.getElementById("expbtnloading").style.display = "none";
                    document.getElementById("expmsg").style.display = "block";
                    $('#companyContactinsta').html(data.user.company_name);
                    $('#ceocontactinsta').html(data.user.ceo_name);
                    $('#telephonecontactinsta').html(data.user.telephone);
                    $('#addressocontactinsta').html(data.user.fran_address+""+data.user.city+""+data.user.state+""+data.user.pincode);
                    $('#emailcontactinsta').html("<a href='mailto:"+data.user.email+"' target='_blank'>"+data.user.email+"</a>");
                    $('#mobilecontactinsta').html(data.user.mobile);
                    $('#websitecontactinsta').html("<a href='http://"+data.user.website+"' target='_blank'>"+data.user.website+"</a>");

                }
            });

        });

        $('#cancelinterest').on('click', function () {
            $('#creditRemaining').html('Please wait...');
            $('#expintbutton').css('display', 'none');
            let franId = document.getElementById('expIntFranId').value;
            $.ajax({
                type: 'post',
                url: '{{URL('/inv-lead-normal')}}',
                data: {
                    franId: franId,
                },
                success: function () {
                    $('#expbtnloading').css('display', 'none');
                    $('#cancelExpress').css('display', 'block');
                }
            });
        });

        //get the selected states for the selected brands
        $('#getfreewindowstate').on('click', function(){
            var keyword = document.getElementById('freeinfovalue').value;
            $.ajax({
                type: 'get',
                url: '/getfreestates',
                data: {fid: keyword},
                success:function(data){
                    if(data != "<option>राज्य चुनें</option>")
                        $("#statesforinfo").html(data);
                }
            });
        });

        //windows scrolling button
        $(window).scroll(function() {
            if ( $(this).scrollTop() > 1 )
                $('.sortbtn').addClass("aedtt");
            else
                $ ('.sortbtn').removeClass("aedtt");
        });

        // JavaScript Document
        $(document).ready(function() {
            $('#sortlbtn').click(function () {
                $('.backdrop').show(200);
                $('#sideslide').animate({'left':'0px'});
            });
            $('#closecat').click(function () {
                $('#sideslide').animate({'left':'-300px'});
                $('.backdrop').hide(200);
            });
            $('#closecatnew').click(function () {
                $('#sideslide').animate({'left':'-300px'});
                $('.backdrop').hide(200);
            });
        });

        //get city list according to the selected state
        function getcityinfo(value){
            $.ajax({
                type:'GET',
                url:'/getcitylist',
                data:{state : value},
                success:function(data){
                    $("#getinfocity").html(data);
                }
            });
        }

        //mobile status if it is exists or not using jquery
        function getMobileStatuscontact(value){
            let successMobile = $('#successmobile');
            if(successMobile.css('display') != "block"){
                if(value.length == 10){
                    if ($.isNumeric( value )){
                        $.ajax({
                            type:'GET',
                            url:'/mobcheck',
                            data:{mobile : value},
                            success:function(data){
                                if(data == 1)
                                    successMobile.css('display','block');
                                if(data == 0){
                                    $('#contactsubmit').prop('disabled',true);
                                    $('#validatemobile').css('display','block');
                                    successMobile.css('display','none');
                                }
                            }
                        });
                    }
                }
            }
            if(value.length != 10){
                if ($.isNumeric( value )){
                    successMobile.css('display','none');
                    $('#contactsubmit').prop('disabled',false);
                    $('#editmobile').css('display','none');
                    $('#validatemobile').css('display','none');
                }
            }
        }

        //edit the entered mobile field
        function editmobile(){
            $('#mobile').attr('readonly',false);
            $('#editmobile').css('display','none');
            $('#validatemobile').css('display','block');
            $('#otpblock').css('display','none');
        }

        //validate mobile from table
        function validatemobile() {
            let keyword = document.getElementById('mobile').value;
            $.ajax({
                type: 'get',
                url: '/verify',
                data: {mobile: keyword},
            });
            $('#mobile').attr('readonly',true);
            $('#editmobilecontact').css('display','block');
            $('#validatemobile').css('display','none');
            document.getElementById("otpblock").style.display = "block";
            $('#contactsubmit').prop('disabled',true);
        }

        //verify the otp
        function verify() {
            let otp = document.getElementById('otpcontact').value;
            let mobile  = document.getElementById('mobile').value;
            $.ajax({
                type    : 'get',
                url     : '/investor/verifyotp',
                data    : {otpNo: otp, mobileNo: mobile},
                success : function (data) {
                    if (data.check == 0) {
                        $('#mismatch').css('display','block');
                    } else {
                        $('#successmobile').css('display','block');
                        $('#contactsubmit').prop('disabled',false);
                        $('#otpblock').css('display','none');
                        $('#editmobilecontact').css('display','none');
                        $('#validatemobile').css('display','none');
                    }
                }

            });
        }

        //Seo related state wise desc hide and show
        $(document).ready(function () {
            $("#buttonAreaHide").click(function () {
                $("#show-full-txt").slideUp("slow");
                $('#buttonAreaHide').hide();
                $('#buttonAreaShow').show();
            });
            $("#buttonAreaShow").click(function () {
                $("#show-full-txt").slideDown("slow");
                $('#buttonAreaHide').show();
                $('#buttonAreaShow').hide();
            });

            //Awesomplete
            const input = document.getElementById('dealer-bar-search');
            // Init awesomplete
            const awesomplete = new Awesomplete(input);
            const navBarSearch = $("#dealer-bar-search");
            //navBarSearch.keypress(function () {
            navBarSearch.on('keypress keyup keypress blur change', function () {
                var search_keyword = $(this).val();
                // Check if atleast 2 chars are typed
                if(search_keyword.length >= 2){
                    $.ajax({
                        url: '/dealers-search/' + search_keyword,
                        type: 'GET',
                        dataType: 'json',
                        success: function (response) {
                            prepareList(JSON.parse(JSON.stringify(response)));

                        },
                        error: function (err) {
                            console.log(err);

                        }
                    });
                }
            });
            function prepareList(list) {
                var c_list = [];

                list.forEach(item => {
                    c_list.push(item.name);
            });

                // Assigned the c_list to the list property of Awesomplete instance
                awesomplete.list = c_list;
            }

            navBarSearch.on('awesomplete-selectcomplete',function(){
                if($("#dealer-bar-search").val() != "") {
                    var value = $("#dealer-bar-search").val();
                    var items = value.split(' - <strong> in');
                    if(items.length > 1)
                        value = items[0];
                    window.location.href = '/dealers-india/search/'+value;
                }
            });

            $("#textcompany").on('click', function(){
                if($("#dealer-bar-search").val() != "") {
                    var value = $("#dealer-bar-search").val();
                    var items = value.split(' - <strong> in');
                    if(items.length > 1)
                        value = items[0];
                    window.location.href = '/dealers-india/search/'+value;
                }
            });


        });

        //Popup Gallery        
        $(document).ready(function() {
            let gallery = $('.gallery');
            gallery.vitGallery({
                debag: true,
                thumbnailMargin: 13,

                fullscreen: true
            })

        });

        function getImages(id) {
            id = id.replace("fran_", "");
            $.ajax({
                type:"GET",
                url : "{{ url('cat-brand-images')}}",
                data:{franId : id},
                success:function(data){

                    $('#push-gallery').html(data[0]);
                    if(data[1] == 0)
                        $('#notApplied').css('display', 'block');
                    if(data[1] == 1)
                        $('#alreadyApplied').css('display', 'block');

                    $('#expIntFranId').val(id);

                    $('#franId').val(id);
                    let gallery = $('.gallery');
                    gallery.vitGallery({
                        debag: true,
                        thumbnailMargin: 13,

                        fullscreen: true
                    })
                }
            });
        }

        function getcityinfoinsta(value){
            $.ajax({
                type:'GET',
                url:'/getcitylist',
                data:{state : value},
                success:function(data){
                    $("#city").html(data);
                }
            });
        }
    </script>

@endsection
