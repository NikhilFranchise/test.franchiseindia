@extends('layout.master')
@section('seoTitle', 'Education Biz: Article Of Education Biz Sector,Education Biz Article')
@section('seoDesc', 'Read latest updated article of Education Biz sector. franchiseindia.com publishes daily articles of different kinds of news.')
@section('seoKeywords', 'articles of Education Biz industry, Education Biz articles, Educationbiz')
@section('content')
    <div class="innerloginblk">
        @include('includes.login-events')
    </div>
    <!-- more article section start here -->
    <div class="container mostpopu arttilist">
        <!--upcomimg event start here -->
        <div class="row row-no-margin">
            <div class="col-xs-12 col-sm-12 col-md-9 tablwidt paddingright50 eduction">
                <div class="topcat"></div>
                <!-- Education Franchise Opportunities start here  -->
                <div class="bor-radius backwhite pad20 ovfl">
                    <div class="ri-headingRt">
                        <h1><span><div>Education Franchise Opportunities</div></span></h1>
                    </div>
                    <ul class="ri-brnds-logo">
                        @foreach($bannerData as $banner)
                            <li>
                                <a target="_blank" href="{{Config('constants.MainDomain')}}/brands/{{$banner->profile_name}}.{{$banner->fran_detail_id}}"> <img src="{{Config('constants.franAwsImgPath')}}{{$banner->company_logo}}" alt="Banner Company Franchise India"></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @if ($agent->isMobile())

                {{-- @mobile --}}
                <div id='adslot300x250_ATF' style='text-align: center;'>
                    <script>
                        googletag.cmd.push(function() { googletag.display('adslot300x250_ATF'); });
                    </script>
                </div>
                @endif

                {{-- @endmobile --}}
                <!-- Education Franchise Opportunities end here  -->
                @include("includes/education/eifirstmost")
                @include("includes/education/educationbusiness")
                @if ($agent->isDesktop() || $agent->isTablet())

                {{-- @notmobile --}}

                            <div id='adslot728x90_Mid_1' style='text-align: center;'>
                                <script>
                                    googletag.cmd.push(function() { googletag.display('adslot728x90_Mid_1'); });
                                </script>
                            </div>
                @endif
                {{-- @endnotmobile --}}
                @include("includes/education/educationblog")
                @include("includes/education/educationstartups")
                @include("includes/education/pre-schools-k12")
                @include("includes/education/educationinterview")
                @include("includes/education/highereducation")
                @include("includes/education/skilldevelopment")

            </div>
            <!--right section start here -->
        @include("includes/education/educationrightpanelcomman")
        <!--right section end here -->
        </div>
    </div>
    @if ($agent->isDesktop() || $agent->isTablet())
    {{-- @notmobile --}}
        <div class="sidearce">
            <div class="dfp_cat_728X90">
                <div id='adslot728x90_BTF'>
                    <script>
                        googletag.cmd.push(function() { googletag.display('adslot728x90_BTF'); });
                    </script>
                </div>
            </div>
        </div>
        @endif
    {{-- @endnotmobile --}}


@endsection
