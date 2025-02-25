@extends('layout.master')

@php
    $brandCount = count($brandResults);
@endphp

{{-- @if ($brandCount < 2)
    @section('robot', 'noindex, nofollow')
@endif --}}

{{-- //Pankaj start --}}
@if(URL::Current() == Config('constants.MainDomain') .'/business-opportunities/dealers-and-distributors.m5')
@section('seoTitle', $brandResults->total() . '+ ' .' Dealership and Distributorship Opportunities in India – Dealer India')
@section('seoDesc','Access to ' . $brandResults->total() . '+ ' .'best dealership/distributorship business opportunities in India. Dealer and distributors a financially rewarding business in the growing industry.' )
@section('seoKeywords','distributorship opportunities, looking for distributorship opportunities, dealership opportunities, looking for dealership opportunities, distributorship business ideas, distributorship business in india, distributorship business plan')
@endif

@if(!empty($loc) && $mc == 5)
@php
            $stateId = $loc[0]; 
            $stateName = Config::get("location.stateArr.$stateId");
        @endphp
  @section('seoTitle', $brandResults->total() . '+ ' . $catArr->catname . ' Dealers & Distributors in ' .  $stateName)
  @section('seoDesc', 'Find ' . $catArr->catname . ' Dealership & Distributors in ' . $stateName . ' to run a successful ' . $catArr->catname . ' business in ' . $stateName . '. You can explore some of the established and well-known ' .  $catArr->catname . ' Dealers in ' . $stateName .' here.')
  @section('seoKeywords', $catArr->catname . ' dealership in ' . $stateName . ', ' . $catArr->catname . ' distributorship in ' . $stateName . ', ' . $catArr->catname . ' dealer in ' . $stateName . ', ' . $catArr->catname . ' dealership opportunities in ' . $stateName . ', Dealer India, ' . $catArr->catname . ' distributors in ' . $stateName)

@elseif(empty($loc) && $mc == 5)
@section('seoTitle', $brandResults->total() . '+ ' . $catName . ' Dealers & Distributors in India')
@section('seoDesc', 'Dealer India offers a wide variety of ' . $catName . ' Dealership & Distributorship opportunities to run a successful ' . $catName . ' business. You can explore some of the established and well-known ' . $catName . ' Dealers here.')
@section('seoKeywords', $catName . ' dealership in India, ' . $catName . ' distributorship in India, ' . $catName . ' dealers in India, ' . $catName . ' dealership opportunities in India, Dealer India, ' . $catName . ' distributors in India')
@else

@endif

{{-- //////////// --}}

{{-- //Pankaj end --}}
@if ($mc == 2)
    @section('seoTitle', $brandResults->total() . '+ ' . 'Food and Beverage - Business Ideas and Franchise Opportunities')
@elseif (URL::Current()  ==  Config('constants.MainDomain') .'/category/search' )

    @php
        $url = URL::full();
        $parsedUrl = parse_url($url);
        $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
        $segments = explode('/', trim($path, '/'));
        $searchText = request()->query('text');
    @endphp
    @section('seoTitle','Business/Franchise Opportunities Results For '. $searchText . ' - Franchise India')
    
@elseif(!empty($seoTitle))
    @section('seoTitle', $brandResults->total() . '+ ' . $seoTitle)
@endif
 
@if (!empty($seoDesc))
    @section('seoDesc', $seoDesc)
@endif
@if (!empty($seoKeywords))
    @section('seoKeywords', $seoKeywords)
@endif

@php

$c_Url = url()->current();
    $queryParams = request()->query();
    $queryString = '';
    // dd($queryParams);

    if (!empty($queryParams)) {
        $queryString = '?';
        foreach ($queryParams as $key => $value) {
           
            if (is_null($value)) {
                $queryString .= $key . '&';
            } else {
                $queryString .= $key . '=' . urlencode($value) . '&';
            }
        
        }
        $queryString = rtrim($queryString, '&');
        if ($queryString === '?') {
            $queryString = '';
        }
        
        $queryString = rtrim($queryString, '&');
    }

    $hindiUrl = str_replace(
        '/category/',
        '/hi/category/',
        str_replace('/business-opportunities/', '/hi/business-opportunities/', $c_Url . $queryString),
    );
    $engUrl = $c_Url . $queryString ;
@endphp

@section('hindiUrl', $hindiUrl)
@section('englishUrl', $engUrl)

{{-- @section('hindibrandUrls')
    <link href="{{ str_replace( '/category/', '/amp/category/', str_replace('/business-opportunities/', '/amp/business-opportunities/', url()->current())) }}" rel="amphtml">
    <link rel="alternate" href="{{ $engUrl }}" hreflang="en-IN" />
    <link rel="alternate" href="{{ $hindiUrl }}" hreflang="hi-IN" />
@endsection --}}
@section('hindibrandUrls')
    <?php
    // $currentUrl = url()->current();
    // $hindiUrl = str_replace('/business-opportunities/', '/hi/business-opportunities/', $currentUrl);
    ?>
    {{-- <link href="{{ $hindiUrl }}"> --}}
    {{-- <link href="{{ str_replace( '/category/',  str_replace('/business-opportunities/',  url()->current())) }}"> --}}
    <link rel="alternate" href="{{ $engUrl }}" hreflang="en-IN" />
    <link rel="alternate" href="{{ $hindiUrl }}" hreflang="hi-IN" />
@endsection
{{-- @include('layout.newhomepage.expeFndfrm') --}}

@section('content')

    <link href="{{ url('css/vit-gallery.css') }}" rel="stylesheet" type="text/css">

    <div class="sortbtn"> <span id="sortlbtn"> <i class="fa fa-filter" aria-hidden="true"></i> Filter</span> </div>
    <!--runner start here 1 -->
    <div class="cateblock catmargintop5 categories-list">
        <div class="container">
            <div class="row row-no-margin">
                <!-- category left panel start here  -->
                @include('category.category-left-section')
                <!-- category left panel end here  -->
                <div class="col-xs-12 col-sm-8 col-md-9 bor-radius backwhite catright row-no-padding">

                    @include('category.navigation-search-by')

                    @include('category.top-paid-cat-banner')

                    <!-- category list section start here-pawan-->
                    <div class="row row-no-margin catpadtop20">
                        @if (session()->has('freeinfomsg'))
                            <div class="alert alert-info">{!! session()->get('freeinfomsg') !!}</div>
                        @endif
                        @php
                            $i = 0;
                            $banner = 1;
                            $longbanner = 0;
                            $shortBox = 0;
                        @endphp
                        <div  id="renderedData">

                        @foreach ($shuffledResults as $brandResult)
                            <!-- category list section start here-->

                            @php
                                $brandUrl = sprintf(
                                    Config('constants.brandPagePattern'),
                                    Config('constants.MainDomain'),
                                    $brandResult->profile_name,
                                    $brandResult->fran_detail_id,
                                );
                                
                                $is_premium = 0;
                                $imgCount = 0;
                                $SubCatName = '';
                                $noImage = 'https://www.franchiseindia.com/images/no-img.gif';
                                $image = $noImage;
                                $brandImagepath = Config('constants.franAwsImgPath') . $brandResult->company_logo;
                                $minValue = $brandResult->unit_inv_min;
                                $area = '-N/A-';
                                if (is_numeric($minValue)) {
                                    if ($minValue < 100000 && $minValue > 10000) {
                                        $minValue = substr($minValue / 1000, 0, 5) . ' K';
                                    } elseif ($minValue <= 9999999 && $minValue > 100000) {
                                        $minValue = substr($minValue / 100000, 0, 5) . ' Lakh';
                                    } elseif ($minValue > 9999999) {
                                        $minValue = substr($minValue / 10000000, 0, 5) . ' Cr';
                                    }
                                }
                                $maxValue = $brandResult->unit_inv_max;
                                if (is_numeric($maxValue)) {
                                    if ($maxValue < 100000 && $maxValue > 10000) {
                                        $maxValue = substr($maxValue / 1000, 0, 5) . ' K';
                                    } elseif ($maxValue <= 9999999 && $maxValue > 100000) {
                                        $maxValue = substr($maxValue / 100000, 0, 5) . ' Lakh';
                                    } elseif ($maxValue > 9999999) {
                                        $maxValue = substr($maxValue / 10000000, 0, 5) . ' Cr';
                                    }
                                }
                                $priceRange = "INR $minValue - $maxValue ";
                                if (empty($brandResult->company_logo)) {
                                    $brandImagepath = $noImage;
                                }
                                foreach (Config('constants.subSubCategoryArr') as $key => $abc) {
                                    if (array_key_exists($brandResult->ind_sub_cat, $abc)) {
                                        $SubCatName = $abc[$brandResult->ind_sub_cat];
                                    }
                                }
                                foreach ($franImageData as $imgData) {
                                    if ($imgData->franchisor_id == $brandResult->franchisor_id) {
                                        $image = $imgData->image_type_slider2;
                                        $is_premium = 1;
                                        $imgCount = $imgData->count;
                                    }
                                }
                                if (!empty($brandResult->prop_area_max)) {
                                    $area = $brandResult->prop_area_min . ' - ' . $brandResult->prop_area_max;
                                }
                                if (empty($brandResult->prop_area_max)) {
                                    $area = $brandResult->prop_area_min;
                                }
                                if (empty($brandResult->prop_area_min)) {
                                    $area = '-N/A-';
                                }
                                $likes = 0;
                                $rate = 0;

                                if (!empty($brandResult->franchisorLike)) {
                                    $likes = $brandResult->franchisorLike->blike;
                                    if (
                                        $brandResult->franchisorLike->brate != 0 &&
                                        $brandResult->franchisorLike->bclick != 0
                                    ) {
                                        $rate =
                                            $brandResult->franchisorLike->brate / $brandResult->franchisorLike->bclick;
                                        $rate = round($rate, 1);
                                    }
                                    // dd($rate);
                                }
                            @endphp
                            

                            @if ($brandResult->membership_type == 1 || $brandResult->free_logo_visibility == 1)

                                @include('category.paid-brand')

                                @if ($banner == 7)
                                    <div class="col-xs-12 col-sm-6 col-md-6 catlistinfo row-no-padding">
                                        <div>
                                            <div class="catbannerblk">
                                                <div class="dfp_300X250">
                                                    {{-- <div id='div-gpt-ad-1563348795825-0' style='width: 300px; height: 250px;'></div> --}}
                                                    <!-- /1057625/FIHL/Desktop_Category_300x250_Mid_1-->
                                                    <div id='adslot300x250_Mid_1' style='width: 300px; height: 250px;'>
                                                        <script>
                                                            googletag.cmd.push(function() {
                                                                googletag.display('adslot300x250_Mid_1');
                                                            });
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

                                @if ($banner == 14)
                                    <div class="col-xs-12 col-sm-6 col-md-6 catlistinfo row-no-padding">
                                        <div class="catbannerblk">
                                            {{-- <div id='div-gpt-ad-1563348795825-1' style='width: 300px; height: 250px;'></div> --}}
                                            <!-- /1057625/FIHL/Desktop_Category_300x250_Mid_2-->
                                            <div id='adslot300x250_Mid_2' style='width: 300px; height: 250px;'>
                                                <script>
                                                    googletag.cmd.push(function() {
                                                        googletag.display('adslot300x250_Mid_2');
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $banner++;
                                        $i++;
                                    @endphp
                                @endif

                                @if ($banner == 21)
                                    <div class="col-xs-12 col-sm-6 col-md-6 catlistinfo row-no-padding">
                                        <div class="catbannerblk">
                                            <div class="dfp_300X250">
                                                {{-- <div id='div-gpt-ad-1563348795825-2' style='width: 300px; height: 250px;'></div> --}}
                                                <!-- /1057625/FIHL/Desktop_Category_300x250_Mid_3-->
                                                <div id='adslot300x250_Mid_3' style='width: 300px; height: 250px;'>
                                                    <script>
                                                        googletag.cmd.push(function() {
                                                            googletag.display('adslot300x250_Mid_3');
                                                        });
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
                                    <div class="col-xs-12 col-sm-6 col-md-6 catlistinfo row-no-padding">
                                        @desktop
                                            <div class="dfp_240X400">
                                                {{-- <div id='div-gpt-ad-1504794961823-0' style='height:400px; width:240px; margin:0 auto;'></div> --}}
                                                <!-- /1057625/FIHL/Desktop_Category_240x400_Mid_1-->
                                                <div id='adslot240x400_Mid_{{ $flag }}'
                                                    style='height:400px; width:240px; margin:0 auto;'>
                                                    <script>
                                                        googletag.cmd.push(function() {
                                                            googletag.display('adslot240x400_Mid_{{ $flag }}');
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        @enddesktop
                                        @tablet
                                            <div class="dfp_240X400">
                                                {{-- <div id='div-gpt-ad-1504794961823-0' style='height:400px; width:240px; margin:0 auto;'></div> --}}
                                                <!-- /1057625/FIHL/Desktop_Category_240x400_Mid_1-->
                                                <div id='adslot240x400_Mid_{{ $flag }}'
                                                    style='height:400px; width:240px; margin:0 auto;'>
                                                    <script>
                                                        googletag.cmd.push(function() {
                                                            googletag.display('adslot240x400_Mid_{{ $flag }}');
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        @endtablet
                                        @mobile
                                            <div class="dfp_300X250">
                                                {{-- <div id='div-gpt-ad-1504794961823-0' style='height:400px; width:240px; margin:0 auto;'></div> --}}
                                                <!-- /1057625/FIHL/Desktop_Category_240x400_Mid_1-->
                                                <div id='adslot300X250_Mid_{{ $flag }}'
                                                    style='height:300px; width:250px; margin:0 auto;'>
                                                    <script>
                                                        googletag.cmd.push(function() {
                                                            googletag.display('adslot300X250_Mid_{{ $flag }}');
                                                        });
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

                                @if ($longbanner == 0)
                                    @if ($i > 1)
                                        <div class="row row-no-margin borderbd padtb20 catbannertop">
                                            @desktop
                                                <div class="yahoo_728X90">

                                                    <!-- /1057625/FIHL/Desktop_Category_728x90_Mid_1-->
                                                    <div id='adslot728x90_Mid_1' style='height:90px; width:728px;'>
                                                        <script>
                                                            googletag.cmd.push(function() {
                                                                googletag.display('adslot728x90_Mid_1');
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                            @enddesktop
                                            @mobile
                                                <div class="yahoo_cat_468X60">
                                                    {{-- <div id='div-gpt-ad-1563348795825-2' style='width: 300px; height: 250px;'></div> --}}
                                                    <!-- /1057625/FIHL/Desktop_Category_300x250_Mid_3-->
                                                    <div id='adslot300x250_Mid_1' style='width: 300px; height: 250px;'>
                                                        <script>
                                                            googletag.cmd.push(function() {
                                                                googletag.display('adslot300x250_Mid_3');
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                {{-- <div class="yahoo_cat_468X60"> --}}
                                                {{-- <div id="div-gpt-ad-1536149771913-0" style='height:60px; width:468px;'></div> --}}
                                                {{-- </div> --}}
                                                {{-- <div class="yahoo_300X250cat"> --}}
                                                {{-- <div id="div-gpt-ad-1531467713014-0" style='height:250px; width:300px;'></div> --}}
                                                {{-- </div> --}}
                                            @endmobile
                                        </div>
                                    @endif
                                    @php
                                        $longbanner++;
                                    @endphp
                                @endif

                                @if ($banner == 7)
                                    <div class="col-xs-12 col-sm-6 col-md-4 catlistmar sec-slide-effect">
                                        <div class="business-list hvr-effect">
                                            <div class="smallcatblk">
                                                <div class="dfp_200X200">
                                                    {{-- <div id='div-gpt-ad-1506599299695-0' style='height:200px; width:200px;'></div> --}}
                                                    <!-- /1057625/FIHL/Desktop_Category_200x200_Mid_1-->
                                                    <div id='adslot200x200_Mid_1' style='height:200px; width:200px;'>
                                                        <script>
                                                            googletag.cmd.push(function() {
                                                                googletag.display('adslot200x200_Mid_1');
                                                            });
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

                                @if ($banner == 14)
                                    <div class="col-xs-12 col-sm-6 col-md-4 catlistmar sec-slide-effect">
                                        <div class="business-list hvr-effect">
                                            <div class="smallcatblk">
                                                <div class="dfp_200X200">
                                                    {{-- <div id='div-gpt-ad-1506599299695-1' style='height:200px; width:200px;'></div> --}}
                                                    <!-- /1057625/FIHL/Desktop_Category_200x200_Mid_2-->
                                                    <div id='adslot200x200_Mid_2' style='height:200px; width:200px;'>
                                                        <script>
                                                            googletag.cmd.push(function() {
                                                                googletag.display('adslot200x200_Mid_2');
                                                            });
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

                                @if ($banner == 21)
                                    <div class="col-xs-12 col-sm-6 col-md-4 catlistmar sec-slide-effect">
                                        <div class="business-list hvr-effect">
                                            <div class="smallcatblk">
                                                <div class="dfp_200X200">
                                                    {{-- <div id='div-gpt-ad-1506599299695-2' style='height:200px; width:200px;'></div> --}}
                                                    <!-- /1057625/FIHL/Desktop_Category_200x200_Mid_3-->
                                                    <div id='adslot200x200_Mid_3' style='height:200px; width:200px;'>
                                                        <script>
                                                            googletag.cmd.push(function() {
                                                                googletag.display('adslot200x200_Mid_3');
                                                            });
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

                                @include('category.free-brand')

                                @php
                                    $banner++;
                                    $shortBox++;
                                @endphp
                            @endif
                        @endforeach

                        </div>

                        @include('category.final-conditions')
                        @php
                            $params = ['sortby' => $orderby];
                            if (!empty($text)) {
                                $params['text'] = $text;
                            }
                            if (!empty($searchq)) {
                                $params['searchq'] = $searchq;
                            }
                        @endphp
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                @if (count($brandResults) == 0)
                                    <div class="noresults">No result found</div>
                                @endif
                                {{-- {!! $brandResults
                                ->appends($params)
                                ->render() !!} --}}
                                {!! $brandResults->appends($params)->links('vendor.pagination.custom') !!}

                            </div>
                        </div>
                    </div>
                    <!-- category list section end here-->
                </div>
            </div>
        </div>
    </div>
    <!--runner end here 1 -->

    <!--Landing page seo heading start here -->
    @include('category.seo-desc')
    <!--Landing page seo heading end here -->

    <div id="comparebottom" class="ttl-brnd-list">
        <div class="popblkbtm">
            <form method="post" action="{{ URL('compare-brands') }}">
                You selected <span class="count">0</span>Brands for Comparison (Max @mobile
                    2
                    @endmobile @notmobile
                    3
                @endnotmobile)
                <input type="hidden" name="franchisors" id="franchisorsForComparison">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="brandRequest" value="Compare" />
            </form>
        </div>
    </div>
    <!--- Get Free Info stickely start here  -->
    @if (!Auth::check() || Auth::user()->profile_type == 1 || Auth::user()->mobile == '')
        <div id="getFreeInfo" class="ttl-brnd-list">
            <span class="count">0</span>Brands in my List
            <a href="#" data-toggle="modal" data-target="#modalGetFree" id="getfreewindowstate">Request Now</a>
        </div>
    @else
        <div id="getFreeInfo" class="ttl-brnd-list">
            <div class="popblkbtm">
                <div class="blkpop"> <span class="count">0</span>Brands in my List </div>
                <form method="post" action="{{ URL('multipleInvFreeinfo') }}">
                    <input type="hidden" name="franchisors" id="franchisorsForInv">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="brandRequest" value="Apply Now" />
                </form>
            </div>
        </div>
    @endif
    <!--- Get Free Info stickely end here  -->

    <!-- Get Free Info Modal Window -->
    @include('category.free-info')
    <!--End Get Free Info Modal Window -->

    <!-- Popup Gallery Code Starts Here -->
    @include('category.popup-gallery')
    <!-- Popup Gallery Code End Here -->

    </div>

    <div class="modal fade lg-panel formsection in" id="expandFranchisenew" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                    <div class="frm-sec">
                        <div id="askMsg" style="display:none;">
                            <div class="green">
                                Thank You for Submitting information for Free Advice!
                            </div>
                        </div>
                        <div class="frm-container" id="askForm">
                            <form id="homepage1" name="homepage1" method="post">
                                @csrf
                                <h2 class="ttl">Free Advice - Ask Our Experts</h2>
                                <div id="errMsg1" style="display:none;">
                                    <font color="red"> Please select one option..! </font>
                                </div>
                                <div class="frm-type">
                                    <div class="radio">
                                        <label><input type="radio" name="optionsRadios1" id="optionsRadios3"
                                                checked="" value="franchisor"> Expand My Brand </label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="optionsRadios1" id="optionsRadios1"
                                                value="investor"> Buy a Franchise</label>
                                    </div>
                                </div>
                                <div class="frm-input">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="usersprite"></div>
                                        </span>
                                        <input type="text" class="form-control blur" name="namefreeadvice1"
                                            id="namefreeadvice1" placeholder="Enter Name" required>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="emailsprite"></div>
                                        </span>
                                        <input type="text" name="emailfreeadvice" id="emailfreeadvice1"
                                            class="form-control blur" placeholder="Enter Email" required>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="usersprite"></div>
                                        </span>
                                        <input type="text" class="form-control blur" maxlength="10"
                                            name="mobilefreeadvice1" id="mobilefreeadvice1" placeholder="Enter Mobile No"
                                            required>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                src="https://www.franchiseindia.com/images/pincode.png"
                                                alt="pincode"></span>
                                        <input type="text" name="pincodefreeadvice1" id="pincodefreeadvice1"
                                            class="form-control blur" maxlength="6" placeholder="Enter Pincode">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon height80">
                                            <div class="addreesssprite"></div>
                                        </span>
                                        <textarea class="form-control height80 blur" name="detailsfreeadvice1" id="detailsfreeadvice1"
                                            placeholder="Enter Details"></textarea>
                                    </div>
                                    <div class="checkbox rm-prop">
                                        <label>
                                            <input type="checkbox" name="is_newsletterfreeadvice1"
                                                id="is_newsletterfreeadvice1" value="1" checked=""> Yes, i want
                                            to
                                            subscribe for weekly Newsletter
                                        </label>
                                    </div>
                                    <div class="checkbox rm-prop">
                                        <label>
                                            <input type="checkbox" name="is_termsagree1" id="is_termsagree1"
                                                value="1" checked="">
                                            I agree to the <a href="https://www.franchiseindia.com/terms"
                                                target="_blank">Terms &amp; Conditions</a>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 txt-center" id="sub">
                                            <input type="submit" id="btnhome1" class="btn btn-default btn-red"
                                                value="Ask Our Experts">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Start Rating modal code  -->
    <div id="myRating" class="modal fade" role="dialog" style = "">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="closeButton">&times;</button>
                    <h4 class="modal-title">Rating</h4>
                </div>
                <div class="modal-body">
                    <div class="catnew-form-star">
                        <div class="rattxt">Your Rating</div>
                        <div id="ratemsg" style="display: none">Thanks for rating..</div>
                        <div id="ratingmsg">
                            <input type="hidden" id="rateModalInput">
                            <input type="hidden" id="fi_id">
                            <fieldset class="rating" id="ratingnew">
                                <input type="radio" id="star5" name="rating" value="5"><label
                                    class="full" for="star5" title="Awesome - 5 stars"></label>

                                <input type="radio" id="star4" name="rating" value="4"><label
                                    class="full" for="star4" title="Pretty good - 4 stars"></label>

                                <input type="radio" id="star3" name="rating" value="3"><label
                                    class="full" for="star3" title="Meh - 3 stars"></label>

                                <input type="radio" id="star2" name="rating" value="2"><label
                                    class="full" for="star2" title="Kinda bad - 2 stars"></label>

                                <input type="radio" id="star1" name="rating" value="1"><label
                                    class="full" for="star1" title="Sucks big time - 1 star"></label>
                            </fieldset>
                            <div class="sasnsta">
                                <div style="text-align: center;">
                                    <input type="reset" class="btn btn-default" value="Cancel" data-dismiss="modal">
                                    <input type="button" class="btn btn-default btntb" value="Submit"
                                        onclick="ratings();">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- end of rating modal here -->

    <script type="text/javascript" src="{{ url('awesomplete/awesomplete.js') }}"></script>

    <script language="javascript">
        // like function create by GP //
        $(document).ready(function() {
            $('#mysocial').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var postUrl = button.data('url'); // Extract the post URL from data-* attribute

                // Update the share links
                $('#facebook-share').attr('href', 'http://www.facebook.com/sharer.php?u=' +
                    postUrl);
                $('#twitter-share').attr('href', 'https://twitter.com/share?url=' +
                    postUrl);
                $('#linkedin-share').attr('href', 'http://www.linkedin.com/shareArticle?mini=true&url=' +
                    postUrl);
                $('#whatsapp-share').attr('href', 'whatsapp://send?text=' + postUrl);
            });
        });
        @php
            $a = Auth::check() ? 1 : 0;
        @endphp

        function likebtn(franId, id) {
            var btnid = id.split('_');
            var i = btnid[1];
            var like_id = franId;

            var auth = @json($a);
            if (like_id != '' && auth == 1) {
                $.ajax({
                    type: 'POST',
                    url: '/brandlikes',
                    data: {
                        "fid": like_id,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        $("#likecount_" + i).html(data.newCount);
                        $("#likeButton_" + i).attr('onclick', "#");
                        $(".like-action_" + i).css('cursor', 'default');
                    }
                });
            } else {
                $('#login-pnl').modal('show');
                $('#loginactive').tab('show');
            }
        }

        function ratebtn(i, fid) {
            //console.log('yes');
            var phpVar = @json($a);
            $('#rateModalInput').val(i);
            $('#fi_id').val(fid);
            // Reset the modal to its initial state
            $('#ratemsg').hide();
            $('#ratingmsg').show();
            $('#ratingnew input[type="radio"]').prop('checked', false);
            if (phpVar == 0) {
                $('#login-pnl').modal('show');
                $('#loginactive').tab('show');

            } else if (phpVar == 1) {
                $('#myRating').modal('show');
            }

        }

        //updating and showing star rating function
        function ratings() {
            var rate_id = $('#fi_id').val();
            var rate_value = 0;
            var i = $('#rateModalInput').val(); // Get the specific div index
            //  console.log(rate_id + '--' + i);
            // Determine which star is selected
            if (document.getElementById('star5').checked) {
                rate_value = document.getElementById('star5').value;
            } else if (document.getElementById('star4').checked) {
                rate_value = document.getElementById('star4').value;
            } else if (document.getElementById('star3').checked) {
                rate_value = document.getElementById('star3').value;
            } else if (document.getElementById('star2').checked) {
                rate_value = document.getElementById('star2').value;
            } else if (document.getElementById('star1').checked) {
                rate_value = document.getElementById('star1').value;
            }

            // Perform the AJAX request to save the rating
            $.ajax({
                type: 'POST',
                url: '/brandratings',
                data: {
                    "fid": rate_id,
                    "_token": "{{ csrf_token() }}",
                    "rateValue": rate_value
                },
                success: function(data) {
                    var a = data.ratings;
                    $("#rating_" + i).html(a); // Update the specific rating div
                    if (a == 5) {
                        $("#rateButton_" + i).html(
                            '<i class="fa fa-star fa-lg" aria-hidden="true" style="color: gold;"></i>');
                    } else {
                        $("#rateButton_" + i).html(
                        '<i class="fa fa-star-half-o fa-lg" aria-hidden="true"></i>');
                    }

                    $("#rateButton_" + i).attr('onclick', "#");
                    $(".rate-action_" + i).css('cursor', 'default');
                    $('#ratemsg').show();
                    $('#ratingmsg').hide();

                    setTimeout(function() {
                        $("#myRating").modal('hide');
                    }, 1000);
                }
            });
        }




        //like share and rating function created by GP -30-Aug-2024

        //action on submit your interest
        $('#expbtn').on('click', function() {
            var franId = document.getElementById('expIntFranId').value;
            document.getElementById("expbtn").style.display = "none";
            document.getElementById("expbtnloading").style.display = "block";
            $.ajax({
                type: 'post',
                url: '{{ URL('/inv-lead?flag=expint') }}',
                data: {
                    franId: franId,
                },
                success: function(data) {

                    if ($.isNumeric(data)) {

                        $('#expintbutton').css('display', 'block');
                        $('#creditRemaining').html('You have ' + data +
                            ' credits remaining. Do you want to use the credit');

                    } else if (data == "showMsg") {

                        window.location.assign(
                            '{{ Config('constants.MainDomain') }}/investor/myaccount/payment');

                    } else {

                        document.getElementById("expbtnloading").style.display = "none";
                        document.getElementById("expmsg").style.display = "block";
                        $('#companyContactinsta').html(data.user.company_name);
                        $('#ceocontactinsta').html(data.user.ceo_name);
                        $('#telephonecontactinsta').html(data.user.telephone);
                        $('#addressocontactinsta').html(data.user.fran_address + "" + data.user.city +
                            "" + data.user.state + "" + data.user.pincode);
                        $('#emailcontactinsta').html("<a href='mailto:" + data.user.email +
                            "' target='_blank'>" + data.user.email + "</a>");
                        $('#mobilecontactinsta').html(data.user.mobile);
                        $('#websitecontactinsta').html("<a href='http://" + data.user.website +
                            "' target='_blank'>" + data.user.website + "</a>");

                    }
                }
            });
        });


        $('#proceedInterest').on('click', function() {

            $('#expintbutton').css('display', 'none');
            $('#creditRemaining').html('Please wait....');
            var franId = document.getElementById('expIntFranId').value;
            $.ajax({
                type: 'post',
                url: '{{ URL('/inv-lead') }}',
                data: {
                    franId: franId,
                },
                success: function(data) {

                    document.getElementById("expbtnloading").style.display = "none";
                    document.getElementById("expmsg").style.display = "block";
                    $('#companyContactinsta').html(data.user.company_name);
                    $('#ceocontactinsta').html(data.user.ceo_name);
                    $('#telephonecontactinsta').html(data.user.telephone);
                    $('#addressocontactinsta').html(data.user.fran_address + "" + data.user.city + "" +
                        data.user.state + "" + data.user.pincode);
                    $('#emailcontactinsta').html("<a href='mailto:" + data.user.email +
                        "' target='_blank'>" + data.user.email + "</a>");
                    $('#mobilecontactinsta').html(data.user.mobile);
                    $('#websitecontactinsta').html("<a href='http://" + data.user.website +
                        "' target='_blank'>" + data.user.website + "</a>");

                }
            });

        });

        $('#cancelinterest').on('click', function() {
            $('#creditRemaining').html('Please wait...');
            $('#expintbutton').css('display', 'none');
            var franId = document.getElementById('expIntFranId').value;
            $.ajax({
                type: 'post',
                url: '{{ URL('/inv-lead-normal') }}',
                data: {
                    franId: franId,
                },
                success: function(data) {
                    $('#expbtnloading').css('display', 'none');
                    $('#cancelExpress').css('display', 'block');
                }
            });
        });

        //get the selected states for the selected brands
        $('#getfreewindowstate').on('click', function() {
            var keyword = document.getElementById('freeinfovalue').value;
            $.ajax({
                type: 'get',
                url: '/getfreestates',
                data: {
                    fid: keyword
                },
                success: function(data) {
                    if (data != "<option>Select State</option>") {
                        $("#statesforinfo").html(data);
                    }
                }
            });
        });

        //windows scrolling button
        $(window).scroll(function() {
            if ($(this).scrollTop() > 1)
                $('.sortbtn').addClass("aedtt");
            else
                $('.sortbtn').removeClass("aedtt");
        });

        // JavaScript Document
        $(document).ready(function() {
            $('#sortlbtn').click(function() {
                $('.backdrop').show(200);
                $('#sideslide').animate({
                    'left': '0px'
                });
            });
            $('#closecat').click(function() {
                $('#sideslide').animate({
                    'left': '-300px'
                });
                $('.backdrop').hide(200);
            });
            $('#closecatnew').click(function() {
                $('#sideslide').animate({
                    'left': '-300px'
                });
                $('.backdrop').hide(200);
            });
        });

        //get city list according to the selected state
        function getcityinfo(value) {
            $.ajax({
                type: 'GET',
                url: '/getcitylist',
                data: {
                    state: value
                },
                success: function(data) {
                    $("#getinfocity").html(data);
                }
            });
        }

        //mobile status if it is exists or not using jquery
        function getMobileStatuscontact(value) {
            if ($('#successmobile').css('display') != "block") {
                if (value.length == 10) {
                    if ($.isNumeric(value)) {
                        $.ajax({
                            type: 'GET',
                            url: '/mobcheck',
                            data: {
                                mobile: value
                            },
                            success: function(data) {
                                if (data == 1) {
                                    $('#successmobile').css('display', 'block');
                                }
                                if (data == 0) {
                                    $('#contactsubmit').prop('disabled', true);
                                    $('#validatemobile').css('display', 'block');
                                    $('#successmobile').css('display', 'none');
                                }
                            }
                        });
                    }
                }
            }
            if (value.length != 10) {
                if ($.isNumeric(value)) {
                    $('#successmobile').css('display', 'none');
                    $('#contactsubmit').prop('disabled', false);
                    $('#editmobile').css('display', 'none');
                    $('#validatemobile').css('display', 'none');
                }
            }
        }

        //edit the entered mobile field
        function editmobile() {
            $('#mobile').attr('readonly', false);
            $('#editmobile').css('display', 'none');
            $('#validatemobile').css('display', 'block');
            $('#otpblock').css('display', 'none');
        }

        //validate mobile from table
        function validatemobile() {
            var keyword = document.getElementById('mobile').value;
            $.ajax({
                type: 'get',
                url: '/verify',
                data: {
                    mobile: keyword
                }
            });
            $('#mobile').attr('readonly', true);
            $('#editmobilecontact').css('display', 'block');
            $('#validatemobile').css('display', 'none');
            document.getElementById("otpblock").style.display = "block";
            $('#contactsubmit').prop('disabled', true);
        }

        //verify the otp
        function verify() {
            var otp = document.getElementById('otpcontact').value;
            var mobile = document.getElementById('mobile').value;
            $.ajax({
                type: 'get',
                url: '/investor/verify-otp',
                data: {
                    otpNo: otp,
                    mobileNo: mobile
                },
                success: function(data) {
                    if (data == 0) {
                        $('#mismatch').css('display', 'block');
                    } else {
                        $('#successmobile').css('display', 'block');
                        $('#contactsubmit').prop('disabled', false);
                        $('#otpblock').css('display', 'none');
                        $('#editmobilecontact').css('display', 'none');
                        $('#validatemobile').css('display', 'none');
                    }
                }

            });
        }

        //Seo related state wise desc hide and show
        $(document).ready(function() {
            $("#buttonAreaHide").click(function() {
                $("#show-full-txt").slideUp("slow");
                $('#buttonAreaHide').hide();
                $('#buttonAreaShow').show();
            });
            $("#buttonAreaShow").click(function() {
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
            navBarSearch.on('keypress keyup keypress blur change', function() {
                var search_keyword = $(this).val();
                // Check if atleast 2 chars are typed
                if (search_keyword.length >= 2) {
                    $.ajax({
                        url: '/dealers-search/' + search_keyword,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            prepareList(JSON.parse(JSON.stringify(response)));

                        },
                        error: function(err) {

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

            navBarSearch.on('awesomplete-selectcomplete', function() {
                if ($("#dealer-bar-search").val() != "") {
                    var value = $("#dealer-bar-search").val();
                    var items = value.split(' - <strong> in');
                    if (items.length > 1)
                        value = items[0];
                    window.location.href = '/dealers-india/search/' + value;
                }
            });

            $("#textcompany").on('click', function() {
                if ($("#dealer-bar-search").val() != "") {
                    var value = $("#dealer-bar-search").val();
                    var items = value.split(' - <strong> in');
                    if (items.length > 1)
                        value = items[0];
                    window.location.href = '/dealers-india/search/' + value;
                }
            });



        });

        //Popup Gallery
        $(document).ready(function() {
            var gallery = $('.gallery');
            gallery.vitGallery({
                debag: true,
                thumbnailMargin: 13,

                fullscreen: true
            })

        });

        function getImages(id) {
            id = id.replace("fran_", "");
            var i = 0;
            $.ajax({
                type: "GET",
                url: "{{ url('/') }}/cat-brand-images",
                data: {
                    franId: id
                },
                success: function(data) {

                    $('#push-gallery').html(data[0]);
                    if (data[1] == 0)
                        $('#notApplied').css('display', 'block');

                    if (data[1] == 1)
                        $('#alreadyApplied').css('display', 'block');

                    $('#expIntFranId').val(id);

                    $('#franId').val(id);
                    var gallery = $('.gallery');
                    gallery.vitGallery({
                        debag: true,
                        thumbnailMargin: 13,
                        fullscreen: true
                    })
                }
            });
        }

        function getcityinfoinsta(value) {
            $.ajax({
                type: 'GET',
                url: '/getcitylist',
                data: {
                    state: value
                },
                success: function(data) {
                    $("#city").html(data);
                }
            });
        }
    </script>
<script>
   $(document).ready(function() {
      // Ensure the DOM is ready
      console.log("Document is ready"); // Debugging statement to check if it's executing

      // Trigger the AJAX request when the dropdown value changes
      $('#sortby').change(function() {
          alert('Dropdown value changed');  // This will show when the dropdown changes

          // Get the selected value
          var sortby = $(this).val();

          // Check if 'Sort By' option is selected (value = 'x')
          if (sortby === 'x') {
              console.log("Sort By selected, no action taken.");
              return; // Do nothing if "Sort By" is selected
          }

          // Send AJAX request
          $.ajax({
              url: '/fetch-data-ajax',  // The route URL where the request will be sent
              type: 'GET',
              data: { sortby: sortby }, // Send the selected sortby value
              success: function(response) {
                  // Handle the response (this can be any content, e.g. update the page with the sorted data)
                  console.log("Response received:", response); // For debugging, you can check the response in the console

                  // Example: you could populate the response data into an HTML element
                  // $('#someElement').html(response);
              },
              error: function(xhr, status, error) {
                  // Handle any errors here
                  console.error("Error:", error);
              }
          });
      });
   });
</script>
@endsection
