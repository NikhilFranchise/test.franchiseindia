@extends('layout.master')

@if(url()->current() == url('/'))
    @section('canonicalUrl', Config('constants.MainDomain'))
@endif
@if(url()->current() == url('/premiumbrand'))
    @section('canonicalUrl', Config('constants.MainDomain')."/premiumbrand")
@endif

@if(url()->current() == url('/premiumbrand'))
    @section('hindiUrl', url('/hi/premiumbrand'))
    @section('englishUrl', url('/premiumbrand'))
    @section('hindibrandUrls')
        <link rel="alternate" href="{{ Config('constants.MainDomain') }}/premiumbrand" hreflang="en-IN" />
        <link rel="alternate" href="{{ Config('constants.MainDomain') }}/hi/premiumbrand" hreflang="hi-IN" />
    @endsection
@endif
@php
    $hindiUrl = url('/hi');//str_replace( '/category/', '/hi/category/', str_replace('/business-opportunities/', '/hi/business-opportunities/', url()->current()));
     $engUrl   = url('/');//url()->current();
@endphp
@if(url()->current() == url('/'))
    @section('hindiUrl', url('/hi'))
    @section('englishUrl', url('/'))
    @section('hindibrandUrls')
        <link rel="alternate" href="{{ Config('constants.MainDomain') }}" hreflang="en-IN" />
        <link rel="alternate" href="{{ Config('constants.MainDomain') }}/hi" hreflang="hi-IN" />
    @endsection
@endif

@section('content')

    <!-- Top Business Opportunities scetion start here -->
    <div class="row hm-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    {{-- @notmobile --}}
                    @if ($agent->isDesktop() || $agent->isDesktop())

                    @include('includes.homepage.homepagemenu')
                    @endif
                    {{-- @endnotmobile --}}
                    <div class="brand-lst">
                        @include('includes.homepage.tbo')
                        @include('includes.homepage.homepage-banner2')
                        {{-- @notmobile --}}
                        @if ($agent->isDesktop() || $agent->isDesktop())

                        <div class="brand-lst-sec hidden-xs"> @include('includes.homepage.ffc') </div>
                        @endif
                        {{-- @endnotmobile --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Business Opportunities scetion end here -->

    {{-- @notmobile --}}
        @if ($agent->isDesktop() || $agent->isDesktop())
        @include('includes.homepage.newsletter')
        @include('includes.homepage.homepage-banner3')
        @endif
        {{-- @endnotmobile --}}

    <!-- Whats New -->
    <div class="row mrgn-tp-30">
        <div class="container">
            <div class="row what-new">
                {{-- @notmobile --}}
                @if ($agent->isDesktop() || $agent->isDesktop())
                <div class="col-xs-12 col-sm-9 col-md-9 mdy-width hidden-xs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"> <a href="#" data-target="#whatsnew" onClick="(function(){ $('#homepagecontentnewslink').attr('href', '/content'); return false; })();return false;"  aria-controls="whatsnew"  role="tab" data-toggle="tab"><h3>FRANCHISE INSIGHTS</h3></a> </li>
                        <li role="presentation"> <a href="#" data-target="#news" onClick="(function(){ $('#homepagecontentnewslink').attr('href', 'https://news.franchiseindia.com/'); return false; })();return false;" class="sliderfunction" aria-controls="news" role="tab" data-toggle="tab"><h3>NEWS</h3></a> </li>
                    </ul>
                    <div class="pull-right viewaall"><a href="/content" id="homepagecontentnewslink">View All</a><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        @include('includes.homepage.article')
                        @include('includes.homepage.news')
                    </div>
                </div>
                @endif
                {{-- @endnotmobile --}}
                @include('includes.homepage.free-advice')
            </div>
        </div>
    </div>
    @if ($agent->isMobile())

    {{-- @mobile --}}
        <div class="mobileban">
            @include('includes.banners.dfp_300X250_mobile')
        </div>
        @endif
    {{-- @endmobile --}}

    @include('includes.homepage.testimonials')
    @if ($agent->isDesktop() || $agent->isDesktop())
    {{-- @notmobile --}}
    <div class="mobileban marbtm"> @include('includes.banners.yahoo_300X250') </div>
    @include('includes.homepage.homepage-banner4')
    @include('includes.homepage.website-info')
    @endif
    {{-- @endnotmobile --}}
    @include('includes.homepage.homepage-scripts')

@endsection
