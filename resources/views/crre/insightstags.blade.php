@extends('layout.crre.master')
@php
    $hindiCategoryNames = [
        'Education' => 'शिक्षा व्यापार',
        'Retail' => 'खुदरा व्यापार',
        'Food and Beverage' => 'खाद्य और पेय पदार्थ',
        'expansion' => 'व्यापार विस्तार',
        'Launch' => 'नया लॉन्च',
        'Startup' => 'व्यापार स्टार्टअप',
        'funding' => 'व्यापार में अनुदान',
        'expansion plans' => 'व्यापार विस्तार योजनाएँ',
        'Franchise 100' => 'फ्रेंचाइज़ 100',
        'investment' => 'व्यापार में निवेश',
    ];
    $displayName = $locale == 'en' ? ucwords($seoTag->name) : $hindiCategoryNames[$seoTag->name] ?? $seoTag->name;
@endphp
@section('seoTitle', $displayName . ' latest News, Articles, Market Insights & Expert Analysis | Franchise India')
@section('seoDesc',
    'Stay updated with the latest ' .
    $displayName .
    ' news, articles, and market insights. Read expert
    analysis, industry reports, and business trends on FranchiseIndia.com. Explore top stories and key updates in ' .
    $displayName .
    ' industry today.')
@section('load-gpt', true)
@section('content')
    <div class="maininnver homeh">
        <div class="inner-top-head">
            <div class="container">

                <h1>{{ $displayName }}</h1>
            </div>
        </div>
        <x-breadcrumb :items="[['label' => 'Home', 'url' => url('/crre')], ['label' => $displayName]]" />
        <div class="stories">
            <div class="container">
                <h3>{{ $displayName }}</h3>
                <div class="row">
                    <div class="col-md-8">
                        <div class="tab-content">
                            <div class="tab-pane active stab" id="latest">
                                <x-article-list>
                                    @foreach ($articlesList as $article)
                                        <x-article-list-item :article="$article" :locale="$locale" />
                                    @endforeach
                                </x-article-list>
                                <div class="video-pagination">
                                    {{ $articlesList->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                        <div class="contentarea">
                            @include('layout.crre.subscribenewsletter')
                        </div>
                    </div>
                    <div class="col-md-4">
                        {{-- ads section start here --}}
                        <div class="ad-right-author">
                            <div id='adslot300x250_ATF'>
                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.display('adslot300x250_ATF');
                                    });
                                </script>
                            </div>
                        </div>
                        {{-- ads section end here --}}
                        <div class="popular-articles">
                            <div class="popular-title">Popular Articles</div>
                            <ul class="popular-list">
                                @foreach ($popArticles as $popular)
                                    <x-popular-item :popular="$popular" :locale="$locale" />
                                @endforeach
                            </ul>
                        </div>
                        {{-- ads section start here --}}
                        <div class="ad-right-sticky">
                            <div id="adslot300x250_1">
                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.display('adslot300x250_1');
                                    });
                                </script>
                            </div>
                        </div>
                        {{-- ads section end here --}}
                    </div>
                </div>
            </div>
        </div>
        @include('layout.crre.brandlist')
        @include('layout.crre.magblock')
    </div>
@endsection
