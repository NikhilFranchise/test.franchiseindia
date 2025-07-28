@extends('layout.master')

@php
    $brandCount = count($brandResults);

@endphp
{{-- @if ($brandCount < 2)
    @section('robot', 'noindex, nofollow')
@endif --}}
@php
    function formatCurrencyForlisting($number)
    {
        if ($number >= 10000000) {
            // Format to Crores (1 Cr = 10,000,000)
            return number_format($number / 10000000, 3) . ' Cr';
        } elseif ($number >= 100000) {
            // Format to Lakhs (1 Lakh = 100,000)
            return number_format($number / 100000, 3) . ' Lakh';
        } elseif ($number >= 1000) {
            // Format to Thousands (1 K = 1,000)
            return number_format($number / 1000, 3) . ' K';
        } else {
            return $number;
        }
    }
@endphp

@php
    // $formattedValue = formatCurrencyForlisting($maxRangevalue); // Example value: 33769507
    $formattedValue = formatCurrencyForlisting($maxRangevalue); // Example value: 33769507

@endphp

{{-- @dd($formattedValue) --}}


{{-- Pankaj start for cat+investment --}}
@php
    $catArr = $catArr ?? collect(); // Set $popup to an empty collection if it's not set
    // dd($catArr);
@endphp
@if ($catArr !== '')
    @if ($mc !== 5)
        @if (!empty($maxRangevalue) && empty($loc) && $minRangeValue !== 0 && $maxRangevalue !== 100000000)
            @section('seoTitle', $brandResults->total() . '+ Business opportunities in ' . $catArr->catname . ' under '
                . $formattedValue . ' - Franchise India')
            @section('seoDesc',
                'Find ' .
                $brandResults->total() .
                ' Business Opportunities in ' .
                $catArr->catname .
                '
                under ' .
                $formattedValue .
                ' as on ' .
                date('F j, Y') .
                ' Connect with Franchise India and start your ' .
                $catArr->catname .
                ' business today! Sign up Today.')
            @elseif(!empty($maxRangevalue) && !empty($loc) && $minRangeValue !== 0 && $maxRangevalue !== 100000000)
                @php
                    $stateId = $loc[0];
                    $stateName = Config::get("location.stateArr.$stateId");
                @endphp
                {{-- @dd($catArr->catname); --}}
            @section('seoTitle', $brandResults->total() . '+ Business opportunities in ' . $catArr->catname . ' under '
                . $formattedValue . ' in ' . $stateName . ' , India - Franchise India')
            @section('seoDesc',
                'Find ' .
                $brandResults->total() .
                ' Business Opportunities in ' .
                $catArr->catname .
                '
                under ' .
                $formattedValue .
                ' in ' .
                $stateName .
                ', India.' .
                ' Updated on ' .
                date('F j, Y') .
                '. Connect
                with Franchise India and start your ' .
                $catArr->catname .
                ' business in ' .
                $stateName .
                ', India today!
                Register Now.')
            @endif
        @endif
        @if ($mc == 5)
            @if (!empty($maxRangevalue) && empty($loc) && $minRangeValue !== 0 && $maxRangevalue !== 100000000)
                @section('seoTitle', $brandResults->total() . '+ Dealership & Distributorship opportunities in ' .
                    $catArr->catname . ' under ' . $formattedValue . ' - Dealer India')
                @section('seoDesc',
                    'Find ' .
                    $brandResults->total() .
                    ' Dealership & Distributorship opportunities in ' .
                    $catArr->catname .
                    ' under ' .
                    $formattedValue .
                    ' as on ' .
                    date('F j, Y') .
                    ' Connect with Dealer India
                    and start your ' .
                    $catArr->catname .
                    ' business today! Sign up Today.')
                @elseif(!empty($maxRangevalue) && !empty($loc) && $minRangeValue !== 0 && $maxRangevalue !== 100000000)
                    @php
                        $stateId = $loc[0];
                        $stateName = Config::get("location.stateArr.$stateId");
                    @endphp
                    {{-- @dd($maxRangevalue) --}}
                @section('seoTitle', $brandResults->total() . '+ Dealership & Distributorship opportunities in ' .
                    $catArr->catname . ' under ' . $formattedValue . ' in ' . $stateName . ', India - Dealer India')
                @section('seoDesc',
                    'Find ' .
                    $brandResults->total() .
                    ' Dealership & Distributorship Opportunities in ' .
                    $catArr->catname .
                    ' under ' .
                    $formattedValue .
                    ' in ' .
                    $stateName .
                    ', India.' .
                    ' Updated on ' .
                    date('F
                    j, Y') .
                    '. Connect with Dealer India and start your ' .
                    $catArr->catname .
                    ' Dealership & Distributorship
                    business in ' .
                    $stateName .
                    ', India today! Register Now.')
                @endif
            @endif

        @endif
        {{-- Pankaj end for cat+investment --}}


        {{-- //Pankaj start --}}
        @if (URL::Current() == Config('constants.MainDomain') . '/business-opportunities/dealers-and-distributors.m5')
            @section('seoTitle',
                $brandResults->total() .
                '+ ' .
                ' Dealership and Distributorship Opportunities in India –
                Dealer India')
            @section('seoDesc',
                'Access to ' .
                $brandResults->total() .
                '+ ' .
                'best dealership/distributorship business
                opportunities in India. Dealer and distributors a financially rewarding business in the growing industry.')
            @section('seoKeywords',
                'distributorship opportunities, looking for distributorship opportunities, dealership
                opportunities, looking for dealership opportunities, distributorship business ideas, distributorship business in
                india, distributorship business plan')
            @endif
            {{-- @dd($mc==5); --}}
            @if (!empty($loc) && $mc == 5)
                @php
                    $stateId = $loc[0];
                    $stateName = Config::get("location.stateArr.$stateId");
                @endphp
                @section('seoTitle', $brandResults->total() . '+ ' . $catArr->catname . ' Dealers & Distributors in ' . $stateName)
            @section('seoDesc',
                'Find ' .
                $catArr->catname .
                ' Dealership & Distributors in ' .
                $stateName .
                ' to run a
                successful ' .
                $catArr->catname .
                ' business in ' .
                $stateName .
                '. You can explore some of the established and
                well-known ' .
                $catArr->catname .
                ' Dealers in ' .
                $stateName .
                ' here.')
            @section('seoKeywords',
                $catArr->catname .
                ' dealership in ' .
                $stateName .
                ', ' .
                $catArr->catname .
                '
                distributorship in ' .
                $stateName .
                ', ' .
                $catArr->catname .
                ' dealer in ' .
                $stateName .
                ', ' .
                $catArr->catname .
                ' dealership opportunities in ' .
                $stateName .
                ', Dealer India, ' .
                $catArr->catname .
                ' distributors in ' .
                $stateName)
            @elseif(empty($loc) && $mc == 5)
            @section('seoTitle', $brandResults->total() . '+ ' . $catName . ' Dealers & Distributors in India')
        @section('seoDesc',
            'Dealer India offers a wide variety of ' .
            $catName .
            ' Dealership & Distributorship
            opportunities to run a successful ' .
            $catName .
            ' business. You can explore some of the established and well-known
            ' .
            $catName .
            ' Dealers here.')
        @section('seoKeywords',
            $catName .
            ' dealership in India, ' .
            $catName .
            ' distributorship in India, ' .
            $catName .
            ' dealers in India, ' .
            $catName .
            ' dealership opportunities in India, Dealer India, ' .
            $catName .
            ' distributors
            in India')
        @else
        @endif

        {{-- //////////// --}}

        {{-- //Pankaj end --}}
        @if ($mc == 2)
            @section('seoTitle',
                $brandResults->total() .
                '+ ' .
                'Food and Beverage - Business Ideas and Franchise
                Opportunities')
            @elseif (URL::Current() == Config('constants.MainDomain') . '/category/search')
                @php
                    $url = URL::full();
                    $parsedUrl = parse_url($url);
                    $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
                    $segments = explode('/', trim($path, '/'));
                    $searchText = request()->query('text');
                @endphp
            @section('seoTitle', 'Business/Franchise Opportunities Results For ' . $searchText . ' - Franchise India')
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
        $engUrl = $c_Url . $queryString;
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
                        <div id="renderedData">

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
                                                $brandResult->franchisorLike->brate /
                                                $brandResult->franchisorLike->bclick;
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
                                        <span class="error-message text-danger" id="namefreeadvice1-error"></span>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="emailsprite"></div>
                                        </span>
                                        <input type="text" name="emailfreeadvice1" id="emailfreeadvice1"
                                            class="form-control blur" placeholder="Enter Email" required>
                                        <span class="error-message text-danger" id="emailfreeadvice1-error"></span>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="usersprite"></div>
                                        </span>
                                        <input type="text" class="form-control blur" maxlength="10"
                                            name="mobilefreeadvice1" id="mobilefreeadvice1" placeholder="Enter Mobile No"
                                            required>
                                        <span class="error-message text-danger" id="emailfreeadvice1-error"></span>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><img
                                                src="https://www.franchiseindia.com/images/pincode.png"
                                                alt="pincode"></span>
                                        <input type="text" name="pincodefreeadvice1" id="pincodefreeadvice1"
                                            class="form-control blur" maxlength="6" placeholder="Enter Pincode">
                                        <span class="error-message text-danger" id="emailfreeadvice1-error"></span>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon height80">
                                            <div class="addreesssprite"></div>
                                        </span>
                                        <textarea class="form-control height80 blur" name="detailsfreeadvice1" id="detailsfreeadvice1"
                                            placeholder="Enter Details"></textarea>
                                        <span class="error-message text-danger" id="emailfreeadvice1-error"></span>
                                    </div>
                                    <div class="form-group mt-4 mb-4">
                                        <div class="captcha">
                                            <span>{!! captcha_img() !!}</span>
                                            <button type="button" class="btn btn-danger" class="reload" id="reload">
                                                &#x21bb;
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <input id="captcha" type="text" class="form-control"
                                            placeholder="Enter Captcha" name="captcha">
                                        <span class="error-message text-danger" id="captcha-error"></span>
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
    <style>
        .cityEvent {
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100vh;
            z-index: 1000;
            overflow: auto;

            background: url('{{ asset('images/bg.webp') }}');
            background-size: auto;
            padding-top: 10px;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /*.city-close{position: absolute;right: 10px;top: 10px;color: #000;font-size: 38px;font-weight: 600;background: #ffcc01;padding: 12px 20px 0px 23px;border-radius: 50px;line-height: 35px;width: 65px;height: 65px;cursor: pointer;}*/



        .city-close {
            width: 40px;
            height: 40px;
            cursor: pointer;
            padding: 12px 20px 0px 16px;
            border-radius: 50px;
            position: absolute;
            right: 10px;
            top: 10px;
            color: #fff;
            font-size: 19px;
            font-weight: normal;
        }


        @media screen and (min-width:993px) {
            .city-desk {
                display:
                    block;
                width: 75%;
                height: auto;
                margin: auto;
            }

            .city-mobile {
                display: none;
            }
        }

        @media screen and (max-width:992px) {
            .city-desk {
                display: none;
            }

            .city-mobile {
                display: block;
                width: 100%;
                height: auto;
            }

            .city-close {
                width: 40px;
                height: 40px;
                cursor: pointer;
                padding: 12px 20px 0px 16px;
                border-radius: 50px;
                position: absolute;
                right: 0px;
                top: 0px;
                color: #fff;
                font-size: 19px;
                font-weight: normal;
            }

            .cityEvent {
                align-items: top;
            }
        }
    </style>
    @php
        $popup = $popup ?? collect(); // Set $popup to an empty collection if it's not set
    @endphp
    @if ($popup->isNotEmpty())
        @foreach ($popup as $event)
            <div class="cityEvent">
                <div class="city-close">x</div>

                <!-- Desktop Banner -->
                @if ($event->desktop_banner)
                    <a href="{{ $event->event_url }}" target="_blank">
                        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/{{ $event->desktop_banner }}"
                            alt="Franchise India" class="city-desk">
                    </a>
                @endif

                <!-- Mobile Banner -->
                @if ($event->mobile_banner)
                    <a href="{{ $event->event_url }}" target="_blank">
                        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/{{ $event->mobile_banner }}"
                            alt="Franchise India" class="city-mobile">
                    </a>
                @endif
            </div>
        @endforeach
    @endif
    <script type="text/javascript" src="{{ url('awesomplete/awesomplete.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Use a stable, modern version -->
    <script src="{{ url('awesomplete/awesomplete.js') }}"></script>
    <script>
        $(document).ready(function() {
            const baseUrl = '{{ Config('constants.MainDomain') }}';
            const auth = {{ Auth::check() ? 1 : 0 }};
            const csrf = '{{ csrf_token() }}';

            /** ------------------ Common Functions ------------------ **/
            const ajaxGet = (url, data = {}, success) => $.get(url, data, success);
            const ajaxPost = (url, data, success, error) => $.post(url, data).done(success).fail(error);
            const updateShareLinks = (url) => {
                $('#facebook-share').attr('href', `http://www.facebook.com/sharer.php?u=${url}`);
                $('#twitter-share').attr('href', `https://twitter.com/share?url=${url}`);
                $('#linkedin-share').attr('href', `http://www.linkedin.com/shareArticle?mini=true&url=${url}`);
                $('#whatsapp-share').attr('href', `whatsapp://send?text=${url}`);
            };


            const handleFormSubmit = (selector, submitText) => {
                $(selector).on('submit', function(e) {
                    e.preventDefault();
                    $('#sub input[type="submit"]').val('Please wait...');
                    const formData = $(this).serialize();
                    ajaxPost('{{ route('form.submithome2') }}', formData, function() {
                        $(selector)[0].reset();
                        $('.error-message').text('');
                        window.location = "/thanks-advice-form";
                    }, function(xhr) {
                        $('#sub input[type="submit"]').val(submitText);
                        if (xhr.status === 422) {
                            $.each(xhr.responseJSON.errors, (key, val) => $('#' + key +
                                '-error').text(val[0]));
                        } else {
                            alert("An unexpected error occurred.");
                        }
                    });
                });
            };

            /** ------------------ Events ------------------ **/
            handleFormSubmit('#catpagepopup', 'Ask Expert');
            handleFormSubmit('#homepagepopup', 'Ask Our Experts');

            // Hide city event after 10s or on close
            setTimeout(() => $('.cityEvent').hide(), 10000);
            $('.city-close').click(() => $('.cityEvent').hide());

            // Modal Share Links
            $('#mysocial').on('show.bs.modal', function(event) {
                const url = $(event.relatedTarget).data('url');
                updateShareLinks(url);
            });

            // Like and Rate
            window.likebtn = (franId, id) => {
                const i = id.split('_')[1];
                if (auth === 1) {
                    ajaxPost('/brandlikes', {
                        fid: franId,
                        _token: csrf
                    }, data => {
                        $(`#likecount_${i}`).text(data.newCount);
                        $(`#likeButton_${i}`).off('click').css('cursor', 'default');
                        $(`.like-action_${i}`).css('cursor', 'default');
                    });
                } else {
                    $('#login-pnl').modal('show');
                    $('#loginactive').tab('show');
                }
            };

            window.ratebtn = (i, fid) => {
                $('#rateModalInput').val(i);
                $('#fi_id').val(fid);
                $('#ratemsg').hide();
                $('#ratingmsg').show();
                $('#ratingnew input[type="radio"]').prop('checked', false);

                auth === 0 ? $('#login-pnl').modal('show') : $('#myRating').modal('show');
            };

            window.ratings = () => {
                const i = $('#rateModalInput').val();
                const rate_id = $('#fi_id').val();
                const rate_value = $('input[name="rating"]:checked').val();

                ajaxPost('/brandratings', {
                    fid: rate_id,
                    rateValue: rate_value,
                    _token: csrf
                }, data => {
                    const a = data.ratings;
                    $(`#rating_${i}`).html(a);
                    $(`#rateButton_${i}`).html(a == 5 ?
                        '<i class="fa fa-star fa-lg" style="color: gold;"></i>' :
                        '<i class="fa fa-star-half-o fa-lg"></i>').off('click');
                    $(`.rate-action_${i}`).css('cursor', 'default');
                    $('#ratemsg').show();
                    $('#ratingmsg').hide();
                    setTimeout(() => $('#myRating').modal('hide'), 1000);
                });
            };

            // Investor Interest
            $('#expbtn').click(() => {
                const franId = $('#expIntFranId').val();
                $('#expbtn').hide();
                $('#expbtnloading').show();

                ajaxPost('{{ URL('/inv-lead?flag=expint') }}', {
                    franId,
                    _token: csrf
                }, data => {
                    if ($.isNumeric(data)) {
                        $('#expintbutton').show();
                        $('#creditRemaining').html(`You have ${data} credits remaining.`);
                    } else if (data === "showMsg") {
                        window.location.assign(`${baseUrl}/investor/myaccount/payment`);
                    } else {
                        $('#expbtnloading').hide();
                        $('#expmsg').show();
                        const u = data.user;
                        $('#companyContactinsta').text(u.company_name);
                        $('#ceocontactinsta').text(u.ceo_name);
                        $('#telephonecontactinsta').text(u.telephone);
                        $('#addressocontactinsta').text(
                            `${u.fran_address} ${u.city} ${u.state} ${u.pincode}`);
                        $('#emailcontactinsta').html(
                            `<a href="mailto:${u.email}" target="_blank">${u.email}</a>`);
                        $('#mobilecontactinsta').text(u.mobile);
                        $('#websitecontactinsta').html(
                            `<a href="http://${u.website}" target="_blank">${u.website}</a>`);
                    }
                });
            });

            $('#proceedInterest').click(() => {
                $('#expintbutton').hide();
                $('#creditRemaining').text('Please wait...');
                const franId = $('#expIntFranId').val();

                ajaxPost('{{ URL('/inv-lead') }}', {
                    franId,
                    _token: csrf
                }, data => {
                    $('#expbtnloading').hide();
                    $('#expmsg').show();

                    if (data.success) {
                        const u = data.user;
                        $('#companyContactinsta').text(u.company_name || 'N/A');
                        $('#ceocontactinsta').text(u.ceo_name || 'N/A');
                        $('#telephonecontactinsta').text(u.telephone || 'N/A');
                        $('#addressocontactinsta').text(
                            `${u.fran_address} ${u.city} ${u.state} ${u.pincode}`);
                        $('#emailcontactinsta').html(
                            `<a href="mailto:${u.email}" target="_blank">${u.email}</a>`);
                        $('#mobilecontactinsta').text(u.mobile || 'N/A');
                        $('#websitecontactinsta').html(
                            `<a href="http://${u.website}" target="_blank">${u.website}</a>`);
                    } else {
                        $('#creditRemaining').text('Unexpected response received.');
                    }
                }).fail(() => {
                    $('#expbtnloading').hide();
                    $('#expintbutton').show();
                    $('#creditRemaining').text('Something went wrong.');
                });
            });

            $('#cancelinterest').click(() => {
                $('#creditRemaining').text('Please wait...');
                $('#expintbutton').hide();
                ajaxPost('{{ URL('/inv-lead-normal') }}', {
                    franId: $('#expIntFranId').val()
                }, () => {
                    $('#expbtnloading').hide();
                    $('#cancelExpress').show();
                });
            });

            // Sort dropdown
            $('#sortby').change(function() {
                const sortby = $(this).val();
                if (sortby !== 'x') {
                    ajaxGet('/fetch-data-ajax', {
                        sortby
                    }, res => console.log("Sorted Data", res));
                }
            });

            /** ------------------ UI and Utility Actions ------------------ **/
            // Mobile/OTP
            window.getMobileStatuscontact = (val) => {
                if (val.length === 10 && $.isNumeric(val)) {
                    ajaxGet('/mobcheck', {
                        mobile: val
                    }, data => {
                        if (data == 1) {
                            $('#successmobile').show();
                        } else {
                            $('#contactsubmit').prop('disabled', true);
                            $('#validatemobile').show();
                            $('#successmobile').hide();
                        }
                    });
                } else {
                    $('#successmobile').hide();
                    $('#contactsubmit').prop('disabled', false);
                }
            };

            window.verify = () => {
                const otp = $('#otpcontact').val();
                const mobile = $('#mobile').val();
                ajaxGet('/investor/verify-otp', {
                    otpNo: otp,
                    mobileNo: mobile
                }, data => {
                    if (data == 0) {
                        $('#mismatch').show();
                    } else {
                        $('#successmobile').show();
                        $('#contactsubmit').prop('disabled', false);
                        $('#otpblock, #editmobilecontact, #validatemobile').hide();
                    }
                });
            };

            // Awesomplete
            const awesomplete = new Awesomplete('#dealer-bar-search');
            $('#dealer-bar-search').on('input', function() {
                const keyword = this.value;
                if (keyword.length >= 2) {
                    ajaxGet(`/dealers-search/${keyword}`, {}, res => {
                        const names = res.map(r => r.name);
                        awesomplete.list = names;
                    });
                }
            });

            $('#dealer-bar-search, #textcompany').on('awesomplete-selectcomplete click', function() {
                const val = $('#dealer-bar-search').val().split(' - ')[0];
                window.location.href = `/dealers-india/search/${val}`;
            });

            // City from state
            window.getcityinfo = (state) => ajaxGet('/getcitylist', {
                state
            }, data => $("#getinfocity").html(data));
            window.getcityinfoinsta = (state) => ajaxGet('/getcitylist', {
                state
            }, data => $("#city").html(data));

            // Gallery
            window.getImages = (id) => {
                const franId = id.replace("fran_", "");
                ajaxGet("{{ url('/') }}/cat-brand-images", {
                    franId
                }, data => {
                    $('#push-gallery').html(data[0]);
                    $('#notApplied').toggle(data[1] == 0);
                    $('#alreadyApplied').toggle(data[1] == 1);
                    $('#expIntFranId, #franId').val(franId);
                    $('.gallery').vitGallery({
                        thumbnailMargin: 13,
                        fullscreen: true
                    });
                });
            };

            // Side panel
            $('#sortlbtn').click(() => {
                $('.backdrop').show(200);
                $('#sideslide').animate({
                    'left': '0px'
                });
            });

            $('#closecat, #closecatnew').click(() => {
                $('#sideslide').animate({
                    'left': '-300px'
                });
                $('.backdrop').hide(200);
            });

            // SEO Description toggle
            $('#buttonAreaHide').click(() => {
                $("#show-full-txt").slideUp("slow");
                $('#buttonAreaHide').hide();
                $('#buttonAreaShow').show();
            });

            $('#buttonAreaShow').click(() => {
                $("#show-full-txt").slideDown("slow");
                $('#buttonAreaHide').show();
                $('#buttonAreaShow').hide();
            });

            // Scroll-based button behavior
            $(window).scroll(() => {
                $('.sortbtn').toggleClass("aedtt", $(this).scrollTop() > 1);
            });

            // Free window state
            $('#getfreewindowstate').click(() => {
                const keyword = $('#freeinfovalue').val();
                ajaxGet('/getfreestates', {
                    fid: keyword
                }, data => {
                    if (data !== "<option>Select State</option>") {
                        $("#statesforinfo").html(data);
                    }
                });
            });
        });
    </script>

@endsection
