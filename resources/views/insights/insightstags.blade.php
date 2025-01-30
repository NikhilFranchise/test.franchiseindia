@extends('layout.insights.master')
@php
    $locale = App::getLocale();
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
@section('seoDesc', 'Stay updated with the latest ' . $displayName . ' news, articles, and market insights. Read expert analysis, industry reports, and business trends on FranchiseIndia.com. Explore top stories and key updates in ' . $displayName . ' industry today.')
@section('content')
    <div class="maininnver homeh">
        <div class="inner-top-head">
            <div class="container">

                <h1>{{ $displayName }}</h1>
            </div>
        </div>
        <div class="authblk">
            <div class="container">
                <ul class="nabva">
                    <li><a href="{{ url('/insights') }}">Home</a></li>
                    <li>/</li>
                    <li>{{ $displayName }}</li>
                </ul>
            </div>
        </div>
        <div class="stories">
            <div class="container">
                <h3>{{ $displayName }}</h3>
                <div class="row">
                    <div class="col-md-8">
                        <div class="tab-content">
                            <div class="tab-pane active stab" id="latest">
                                <ul>
                                    @forelse ($articlesList as $article)
                                        @php
                                            $locale = App::getLocale();
                                            $mainDomain = Config('constants.MainDomain');
                                            $image = \App\Http\Controllers\InsightsController::createimgurl(
                                                $article->image,
                                            );
                                            $url =
                                                "{$mainDomain}/insights/{$locale}/" .
                                                strtolower($article->insight_type) .
                                                "/{$article->slug}.{$article->news_id}";
                                            // Default author values
                                            $authorname = 'Franchise India Bureau';
                                            $authorUrl = '#';
                                            $author_image = url('images/defaultuser.png');
                                            // Check and set author details if available
                                            if ($article->author->isNotEmpty()) {
                                                $author = $article->author->first();
                                                $authorname = $author->title ?: 'Franchise India Bureau';
                                                $slug = $author->slug ?: strtolower(str_replace(' ', '-', $authorname));
                                                $authorUrl = "{$mainDomain}/insights/author/{$slug}-{$author->author_id}";
                                                $author_image = $author->image
                                                    ? \App\Http\Controllers\InsightsController::authorImageurl(
                                                        $author->image,
                                                    )
                                                    : $author_image;
                                            }
                                        @endphp
                                        <li>
                                            <div class="author-fresh">
                                                <div class="author-latest-pic">
                                                    <a href="{{ $url }}"><img src="{{ $image }}"
                                                            alt="{{ $article->title }} image" class="img-fluid"></a>
                                                </div>
                                                <div class="author-fresh-cont">
                                                    <div class="author-latest-title"><a
                                                            href="{{ $url }}">{{ $article->title }}</a></div>
                                                    <p>{!! html_entity_decode(\Illuminate\Support\Str::words($article->shortDesc, 22, ' ...')) !!}</p>
                                                    <ul class="art-detail-read">
                                                        <li>By - <a href="{{ $authorUrl }}"
                                                                hreflang="{{ $locale }}">{{ $authorname }}</a>
                                                        </li>
                                                        <li><time datetime="33Z"
                                                                class="datetime">{{ date('M d, Y', strtotime($article->created_at)) }}</time>/
                                                            {{ app\Http\Controllers\InsightsController::calculateReadTime($article) }}
                                                            MIN READ</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <p>No Records.</p>
                                    @endforelse
                                </ul>
                                <div class="video-pagination">
                                    {{ $articlesList->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                        <div class="contentarea">
                            @include('layout.insights.subscribenewsletter')
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
                                @forelse ($popArticles as $popular)
                                    @php
                                        $image = \App\Http\Controllers\InsightsController::createimgurl(
                                            $popular->image,
                                        );
                                        $popUrl =
                                            "{$mainDomain}/insights/{$locale}/" .
                                            strtolower($popular->insight_type) .
                                            "/{$popular->slug}.{$popular->news_id}";
                                    @endphp
                                    <li>
                                        @foreach ($popular->category as $cat)
                                            @php
                                                $catURL = "{$mainDomain}/insights/{$locale}/{$cat->slug}";
                                                $catName = $cat->catname;
                                            @endphp
                                            <div class="popular-sub"><a href="{{ $catURL }}"
                                                    hreflang="{{ $locale }}">{{ ucwords($catName) }}</a>
                                            </div>
                                        @endforeach
                                        <div class="popular-head"><a href="{{ $popUrl }}">{{ $popular->title }}</a>
                                        </div>
                                    </li>
                                @empty
                                    <p>No Results.</p>
                                @endforelse
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
        @include('layout.insights.brandlist')

        @include('layout.insights.magblock')

        <div class="listblk">
            <div class="container">
                <ul class="artilsit">
                </ul>
            </div>
        </div>

    @endsection
