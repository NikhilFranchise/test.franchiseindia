@extends('layout.master')
@section('seoTitle', 'Wellness India: Article Of Wellnessindia Sector, Wellnessindia India Article')
@section('seoDesc', 'Read latest updated article of Wellnessindia sector. Wellnessindiaindia.in publishes daily articles of different kinds of news.')
@section('seoKeywords', 'articles of Wellnessindia industry, Wellnessindia india articles, Wellnessindia india')
@section('content')

    <div class="innerloginblk">
        @include('includes.login-events')
    </div>

    <!-- more article section start here -->
    <div class="container mostpopu arttilist">
        <div class="row row-no-margin">
            <div class="col-xs-12 col-sm-12 col-md-9 tablwidt paddingright50 wellness">
                <div class="topcat"></div>
                <!-- Wellness Franchise Opportunities start here  -->
                <div class="bor-radius backwhite pad20 ovfl">
                    <div class="ri-headingRt">
                        <h2><span><div>Wellness Franchise Opportunities</div></span></h2>
                    </div>
                    <ul class="ri-brnds-logo">
                        @foreach($bannerData as $banner)
                            <li>
                                <a target="_blank" href="{{Config('constants.MainDomain')}}/brands/{{$banner->profile_name}}.{{$banner->fran_detail_id}}"> <img src="{{Config('constants.franAwsImgPath')}}{{$banner->company_logo}}" alt="{{$banner->profile_name}}"></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @mobile
                <div id='adslot300x250_ATF' style='text-align: center;'>
                    <script>
                        googletag.cmd.push(function() { googletag.display('adslot300x250_ATF'); });
                    </script>
                </div>

                @endmobile
                <!-- Wellness Franchise Opportunities end here  -->

                @include('includes/wellness/firstmost')
                @include('includes/wellness/vmdesign')
                @notmobile

                <div id='adslot728x90_Mid_1' style='text-align: center;'>
                    <script>
                        googletag.cmd.push(function() { googletag.display('adslot728x90_Mid_1'); });
                    </script>
                </div>

                @endnotmobile
                @include("includes/wellness/wellnessindustry")
                @include("includes/wellness/brandsproduct")
                @include("includes/wellness/beautywellness")
                @include("includes/wellness/businessinvestments")
                @include("includes/wellness/techdigital")
                @include("includes/wellness/wellnessblog")
                @include("includes/wellness/healthcarefitness")
            </div>
            <!--right section start here -->
        @include('includes/wellness/wellnessrightpanelcomman')
        <!--right section end here -->
        </div>
    </div>
    <!-- more article section end here -->
    @notmobile

    <div class="sidearce">
        <div class="dfp_cat_728X90">
            <div id='adslot728x90_BTF'>
                <script>
                    googletag.cmd.push(function() { googletag.display('adslot728x90_BTF'); });
                </script>
            </div>
        </div>
    </div>
    @endnotmobile
@endsection
