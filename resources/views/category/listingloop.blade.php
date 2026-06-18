@php
$i = 0;
$banner = 1;
$longbanner = 0;
$shortBox = 0;
@endphp
@foreach ($shuffledResults as $item)
@php
$brandUrl = sprintf(
    Config('constants.brandPagePattern'),
    Config('constants.MainDomain'),
    $item['profile_name'],  // Array access
    $item['fran_detail_id'] // Array access
);

$is_premium = 0;
$imgCount = 0;
$SubCatName = '';
$noImage = 'https://www.franchiseindia.com/images/no-img.gif';
$image = $noImage;
$brandImagepath = Config('constants.franAwsImgPath') . $item['company_logo'];  // Array access
$minValue = $item['unit_inv_min'];  // Array access
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

$maxValue = $item['unit_inv_max'];  // Array access
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

if (empty($item['company_logo'])) {  // Array access 
    $brandImagepath = $noImage;
}

foreach (Config('constants.subSubCategoryArr') as $key => $abc) {
    if (array_key_exists($item['ind_sub_cat'], $abc)) {  // Array access
        $SubCatName = $abc[$item['ind_sub_cat']];  // Array access
    }
}

// foreach ($franImageData as $imgData) {
//     if ($imgData->franchisor_id == $item['franchisor_id']) {  // Array access
//         $image = $imgData->image_type_slider2;
//         $is_premium = 1;
//         $imgCount = $imgData->count;
//     }
// }

if (!empty($item['prop_area_max'])) {  // Array access
    $area = $item['prop_area_min'] . ' - ' . $item['prop_area_max'];  // Array access
}

if (empty($item['prop_area_max'])) {  // Array access
    $area = $item['prop_area_min'];  // Array access
}

if (empty($item['prop_area_min'])) {  // Array access
    $area = '-N/A-';
}

$likes = 0;
$rate = 0;

if (!empty($item['franchisorLike'])) {  // Array access
    $likes = $item['franchisorLike']['blike'];  // Array access
    if (
        $item['franchisorLike']['brate'] != 0 &&  // Array access
        $item['franchisorLike']['bclick'] != 0  // Array access
    ) {
        $rate = $item['franchisorLike']['brate'] / $item['franchisorLike']['bclick'];  // Array access
        $rate = round($rate, 1);
    }
}
@endphp

@if ($item['membership_type'] == 1 || $item['free_logo_visibility'] == 1)


<div class="col-xs-12 col-sm-6 col-md-6 catlistinfo row-no-padding sec-slide-effect" >
    <div class="comparechk">
        <input type="checkbox" id="compare{{ $loop->index }}" class="brandCompareCheckbox" name="compareCheckbox"
            onClick="getBrandsForComparison()" value="{{ $item['franchisor_id'] }}">  <!-- Array access -->
        <label for="compare{{ $loop->index }}"><span></span></label>
    </div>

    <div class="padfb15">
        <a href="{{ sprintf(Config('constants.brandPagePattern'), Config('constants.MainDomain'), $item['profile_name'], $item['fran_detail_id']) }}" target="_blank">  <!-- Array access -->
            <div class="catimgmobile">
                <img src="{{ Config('constants.franAwsImgPath') . $item['company_logo'] }}" alt="{{ $item['company_name'] }}">  <!-- Array access -->
            </div>
        </a>

        <div class="catlisthead">
            {{ $SubCatName }}  <!-- Use the correct variable or logic for SubCatName if required -->
            @if ($item['brand_verified'] == 1)  <!-- Array access -->
                <div class="brand-verify">
                    <i class="fa fa-check"></i> Verified
                </div>
            @endif
        </div>
        <style>
            .brand-verify {
                display: inline-block;
                float: right;
                border: 1px solid #209f0c;
                border-radius: 4px;
                padding: 1px 9px;
                font-size: 11px;
                color: #03931b;
                font-weight: bold;
            }

            .brand-verify .fa {
                font-size: 11px;
                margin-right: 3px;
            }

            @media screen and (max-width:768px) {
                .brand-verify {
                    position: absolute;
                    right: 15px;
                    top: 15px;
                }
            }
        </style>

        <div class="catlist">
            <a href="{{ sprintf(Config('constants.brandPagePattern'), Config('constants.MainDomain'), $item['profile_name'], $item['fran_detail_id']) }}" id="brandnamecategory{{ $item['franchisor_id'] }}" target="_blank">
                {{ $item['company_name'] }}  <!-- Array access -->
            </a>
        </div>


        <span style="display: none;" id="brandinvestment{{ $item['franchisor_id'] }}">
            {{ $priceRange }}
        </span>
        
        <div class="catlistdest">
            <div class="catdleft pad20">
                @if ($is_premium == 1)
                    <div class="cattxtimg trst">
                        <div class="phoicon">
                            <a data-toggle="modal" data-target="#catgalleryform">
                                <i class="fa fa-camera fa-2x" aria-hidden="true" onclick="getImages(this.id)"
                                    id="fran_{{ $item['franchisor_id'] }}"></i>
                            </a>
                        </div>
                        <img src="{{ $image }}" alt="{{ $item['company_name'] }}" />
                        <div class="countpho">{{ $imgCount }} Store Photos</div>
                    </div>
                @else
                    <div class="cattxtimg">
                        {{ implode(' ', array_slice(explode(' ', substr(strip_tags(html_entity_decode($item['business_desc'])), 0, 110)), 0, 10)) }}
                    </div>
                @endif
        
                @if (isset($item['franchisorLocState']) && $item['franchisorLocState']->count() > 0)
                    <div class="subcat">
                        <div>Locations looking for expansion</div>
                        @php
                            $uniqueStates = $item['franchisorLocState']->unique('state')->values();
                            $statesToShow = $uniqueStates->take(3);
                        @endphp
                        @foreach ($statesToShow as $state)
                            {{ $state['state'] . ', ' }}
                        @endforeach
        
                        @if ($uniqueStates->count() > 3)
                            .... + {{ $uniqueStates->count() - 3 }} more
                        @endif
                    </div>
                @endif
        
                <div class="commanmbs">
                    <div class="subcat">
                        <span>Establishment year</span>
                        {{ $item['operations_start_year'] }}
                    </div>
                    <div class="subcat">
                        <span>{{ $item['looking_tradepartner'] == 1 ? 'Dealership' : 'Franchising' }} Launch Date</span>
                        {{ $item['franchise_start_year'] }}
                    </div>
                </div>
        
                <!-- Mobile code 2 start here -->
                <div class="commanmbsmobile">
                    <div class="subcat pleft">
                        <span>Establishment year</span>
                        {{ $item['operations_start_year'] }}
                    </div>
        
                    <div class="subcat pright">
                        <span>{{ $item['looking_tradepartner'] == 1 ? 'Dealership' : 'Franchising' }} Launch Date</span>
                        {{ $item['franchise_start_year'] }}
                    </div>
        
                    <div class="subcat pleft">
                        <span>Investment size</span>
                        {{ $priceRange }}
                    </div>
        
                    <div class="subcat pright"><span>Space required</span>
                        {{ $area }}
                    </div>
                    @if ($item['looking_tradepartner'] != 1)
                        <div class="subcat pleft">
                            {{-- <span>{{ $mc != 5 ? 'Franchise Type' : 'Channel Type' }}</span> --}}
                            {{ Config('constants.masterfranchiseType.' . $item['franchise_partner_type']) }}
                        </div>
                    @endif
                    <div class="subcat pright">
                        {{-- <span>{{ $mc != 5 ? 'Franchise Outlets' : 'Dealership Outlets' }}</span> --}}
                        {{ $item['no_fran_outlets'] }}
                    </div>
                </div>
                <!-- Mobile code 2 end here -->
        
                <div class="catbtn">
                    <input type="checkbox" id="{{ $item['franchisor_id'] }}" name="getFreeInfo" onClick="getfree()" />
                    <label for="{{ $item['franchisor_id'] }}"><span></span></label>
                </div>
                <!--btn E-->
            </div>
            <!-- Mobile hide code start 1 -->
            <div class="catdright pad20">
                <a href="{{ sprintf(Config('constants.brandPagePattern'), Config('constants.MainDomain'), $item['profile_name'], $item['fran_detail_id']) }}" target="_blank" id="brandnamecategory{{ $item['franchisor_id'] }}">
                    <div class="catimg"><img src="{{ Config('constants.franAwsImgPath') . $item['company_logo'] }}" alt="{{ $item['company_name'] }}" /></div>
                </a>
        
                <div class="subcat"><span>Investment size</span>
                    {{ $priceRange }}
                </div>
        
                <div class="subcat"><span>Space required</span>
                    {{ $area }}
                </div>
        
                <div class="subcat">
                    {{-- <span>{{ $mc != 5 ? 'Franchise Outlets' : 'Dealership Outlets' }}</span> --}}
                    {{ $item['no_fran_outlets'] }}
                </div>
        
                @if ($item['looking_tradepartner'] != 1)
                    <div class="subcat">
                        {{-- @if ($mc != 5)
                            <span>Franchise Type</span>
                        @endif
                        @if ($mc == 5)
                            <span>Channel Type</span>
                        @endif --}}
                        {{ Config('constants.masterfranchiseType.' . $item['franchise_partner_type']) }}
                    </div>
                @endif
        
                <div class="subcat">
                    <span>Headquarter</span>
                    {{ $item['city'] }}
                </div>
            </div>
            <!-- Mobile hide code end 1 -->
        </div>
    </div>
    
        <div class="catbottp">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="like-action_{{ $loop->index }} col-xs-4 col-sm-4 col-md-4 bd" style="cursor: pointer;">
                    <a onclick="likebtn('{{ $item['franchisor_id'] }}',this.id);" class="like" id="likeButton_{{ $loop->index }}">
                        <i class="fa fa-thumbs-up fa-lg" aria-hidden="true" id="like"></i>
                    </a>
                    <span id="likecount_{{ $loop->index }}">
                        @if ($likes != 0)
                            {{ $likes }}
                        @endif
                    </span>
                </div>
        
                <div class="seo_shareButton_{{ $loop->index }} col-xs-4 col-sm-4 col-md-4 bd" style="cursor: pointer;">
                    <a data-toggle="modal" data-target="#mysocial" id="seo_shareButton_{{ $loop->index }}" data-url="{{ sprintf(Config('constants.brandPagePattern'), Config('constants.MainDomain'), $item['profile_name'], $item['fran_detail_id']) }}">
                        <i class="fa fa-share-alt fa-lg" aria-hidden="true"></i>
                    </a>
                </div>
        
                <div class="rate-action_{{ $loop->index }} col-xs-4 col-sm-4 col-md-4 bd" style="cursor: pointer;">
                    <a data-toggle="modal" onclick="ratebtn('{{ $loop->index }}','{{ $item['franchisor_id'] }}')" id="rateButton_{{ $loop->index }}">
                        @if ($rate == 5)
                            <i class="fa fa-star fa-lg" aria-hidden="true" style="color: gold;"></i>
                        @else
                            <i class="fa fa-star-half-o fa-lg" aria-hidden="true"></i>
                        @endif
                    </a>
                    <span><strong id="rating_{{ $loop->index }}">
                        @if ($rate != 0)
                            {{ $rate }}
                        @endif
                    </strong></span>
                </div>
            </div>
        </div>

        
        <!-- Social media code -->
<div id="mysocial" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Share</h4>
            </div>
            <div class="modal-body">
                <div class="macashare">
                    <ul class="sharecat">
                        <li>
                            <a href="http://www.facebook.com/sharer.php?u={{ $brandUrl }}" target="_blank">
                                <img src="{{ URL::asset('images/facebookcat.gif') }}" alt="Facebook">
                                <span>Facebook</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/share?url={{ $brandUrl }}" target="_blank">
                                <img alt="twitter" src="{{ URL::asset('images/twittercat.gif') }}">
                                <span>Twitter</span>
                            </a>
                        </li>
                        <li class="btline">
                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ $brandUrl }}" target="_blank">
                                <img alt="linkedin" src="{{ URL::asset('images/linkedincat.gif') }}">
                                <span>LinkedIn</span>
                            </a>
                        </li>
                        <li class="webt">
                            <a href="whatsapp://send?text={{ $brandUrl }}" target="_blank">
                                <img alt="whatsapp" src="{{ URL::asset('images/whatsappcat.gif') }}">
                                <span>Whatsapp</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
</div>

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


{{-- @endif --}}

@elseif($item['membership_type'] == 0)
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

@include('category.listing_free-brand')

@php
    $banner++;
    $shortBox++;
@endphp
@endif

@endforeach
