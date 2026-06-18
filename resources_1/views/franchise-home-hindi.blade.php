@extends('layout-hindi.master')
@if (url()->current() == url('/hi'))
    @section('canonicalUrl', Config('constants.MainDomain') . '/hi')
@endif
@if (url()->current() == url('/hi/premiumbrand'))
    @section('canonicalUrl', Config('constants.MainDomain') . '/hi/premiumbrand')
@endif
@if (url()->current() == url('/hi/premiumbrand'))
    @section('hindiUrl', url('/hi/premiumbrand'))
    @section('englishUrl', url('/premiumbrand'))
    @section('hindibrandUrls')
        <link rel="alternate" href="{{ Config('constants.MainDomain') }}/premiumbrand" hreflang="en-IN" />
        <link rel="alternate" href="{{ Config('constants.MainDomain') }}/hi/premiumbrand" hreflang="hi-IN" />
    @endsection
@endif
@php
    $hindiUrl = url('/hi'); 
    $engUrl = url('/');
@endphp
@section('seoTitle', 'व्यवसाय के अवसर, फ्रेंचाइज के अवसर, व्यापार मॉडल | Business Opportunities - Franchise India')
@section('seoDesc',
    'फ़्रैंचाइज इंडिया भारत में फ्रेंचाइजी के अवसर, व्यापार के अवसर, व्यावसायिक विचार, सर्वोत्तम व्यवसाय
    प्रदान करता है और भारत में फ्रैंचाइजी को सस्ती सीमा के साथ खरीदता है।')

    @if (url()->current() == url('/hi'))
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
                    @notmobile
                        @include('includes.homepage.hindi-homepagemenu')
                    @endnotmobile
                    <div class="brand-lst">
                        @include('includes.homepage.tbo')
                        @include('includes.homepage.homepage-banner2')
                        @notmobile
                            <div class="brand-lst-sec hidden-xs"> @include('includes.homepage.ffc') </div>
                        @endnotmobile
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Business Opportunities scetion end here -->
    @notmobile
        @include('includes.homepage.newsletter')
        @include('includes.homepage.homepage-banner3')
    @endnotmobile

    <!-- Whats New -->
    <div class="row mrgn-tp-30">
        <div class="container">
            <div class="row what-new singlehindi">
                @notmobile
                    <div class="col-xs-12 col-sm-9 col-md-9 mdy-width hidden-xs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#" data-target="#whatsnew"
                                    onClick="(function(){ $('#homepagecontentnewslink').attr('href', '/insights/hindi'); return false; })();return false;"
                                    aria-controls="whatsnew" role="tab" data-toggle="tab">
                                    <h3>फ्रैंचिस इनसाइट्स</h3>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" data-target="#news"
                                    onClick="(function(){ $('#homepagecontentnewslink').attr('href', 'https://news.franchiseindia.com/'); return false; })();return false;"
                                    class="sliderfunction" aria-controls="news" role="tab" data-toggle="tab">
                                    <h3>समाचार</h3>
                                </a>
                            </li>
                        </ul>
                        <div class="pull-right viewaall"><a href="/insights/hindi" id="homepagecontentnewslink">सभी को
                                देखें</a><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></div>
                        <!-- Tab panes -->

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="whatsnew">
                                <div class="row">
                                    <div class="bxsliderarticle">
                                        <div class="col-xs-12 col-sm-12 col-md-12 list-width-new">
                                            <div class="row">

                                                @foreach ($articles as $article)
                                                    @php
                                                        // $siteType = Config(
                                                        //     'constants.articleArr.' . $article['site_type'],
                                                        // );
                                                        // $imagePath =
                                                        //     Config('constants.MainDomain') .
                                                        //     str_replace(
                                                        //         'uploads/content/',
                                                        //         'uploads/thumbnails/',
                                                        //         $article['image'],
                                                        //     );
                                                        // //dd($article->hindi);
                                                        // $kickerName = $tag
                                                        //     ->where('tag_id', $article->hindi->kicker)
                                                        //     ->first()->name;

                                                        // $kickerUrl =
                                                        //     Config('constants.MainDomain') .
                                                        //     '/hi/content/' .
                                                        //     $kickerName .
                                                        //     '/' .
                                                        //     $article->hindi->kicker;
                                                        // $articleUrl =
                                                        //     '/hi/' .
                                                        //     $siteType .
                                                        //     '/' .
                                                        //     $article['slug'] .
                                                        //     '.' .
                                                        //     $article['content_id'];
                                                        $locale = App::getLocale();
                                                        $imagePath = \App\Http\Controllers\InsightsController::createimgurl(
                                                            $article->image,
                                                        );
                                                        $baseUrl =
                                                            Config('constants.MainDomain') . "/insights/$locale/";
                                                        $articleUrl =
                                                            $baseUrl .
                                                            strtolower($article->insight_type) .
                                                            '/' .
                                                            $article->slug .
                                                            '.' .
                                                            $article->news_id;
                                                        if ($article->category->isNotEmpty()) {
                                                            $category = $article->category->first();
                                                            $catName = $category->catname;
                                                            $catUrl = $baseUrl . $category->slug;
                                                        }
                                                        if ($article->author->isNotEmpty()) {
                                                            $author = $article->author->first();
                                                            $authorname = $author->title ?: 'Franchise India Bureau';
                                                            $slug =
                                                                $author->slug ?:
                                                                strtolower(str_replace(' ', '-', $authorname));
                                                            $authorUrl =
                                                                config('constants.MainDomain') .
                                                                '/' .
                                                                "insights/author/{$slug}-{$author->author_id}";
                                                            $author_image = $author->image
                                                                ? \App\Http\Controllers\InsightsController::authorImageurl(
                                                                    $author->image,
                                                                )
                                                                : $author_image;
                                                        }
                                                    @endphp

                                                    <div class="col-xs-12 col-sm-6 col-md-4 mdfiywidth">
                                                        <div class="new-cat-list">
                                                            <div class="cat-img"
                                                                onclick="window.location = '{{ $articleUrl }}';">
                                                                <img class="lozad" data-src="{{ $imagePath }}"
                                                                    alt="image" />
                                                                <div class="info">
                                                                    <div class="search-count">
                                                                        <div class="vertical-mid">
                                                                            <div class="bdr">
                                                                                <div class="count">
                                                                                    <a href="{{ $catUrl }}">
                                                                                        {{ $catName }}
                                                                                    </a>
                                                                                </div>
                                                                                <div class="name">
                                                                                    <a href="{{ $articleUrl }}">
                                                                                        {{ $article->title }}
                                                                                    </a>
                                                                                </div>
                                                                                <div class="count">
                                                                                    <a href="#">By
                                                                                        {{ $authorname }}</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if ($loop->index == 8)
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 list-width-new">
                                            <div class="row">
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="news">
                                <div class="row">
                                    <div class="bxslider_news">
                                        <div class="col-xs-12 col-sm-12 col-md-12 list-width-newbe">
                                            <div class="row">
                                                @foreach ($newsArticles as $article)
                                                    @php
                                                        //  $a = date_create($article['time']);
                                                        //         $date = date_format($a, 'd M Y');
                                                        //         $site = Config('constants.articleArr.' . $article['news_type']);
                                                        //         $kickerName = $tag
                                                        //             ->where('tag_id', $article->hindi->kicker)
                                                        //             ->first()->name;
                                                        //         $kickerUrl =
                                                        //             Config('constants.NewsDomain') .
                                                        //             '/hi/' .
                                                        //             $kickerName .
                                                        //             '/' .
                                                        //             $article->hindi->kicker;
                                                        //         $imagePath = str_replace(
                                                        //             'uploads/',
                                                        //             'uploads/thumbnails/',
                                                        //             $article['image'],
                                                        //         );

                                                        // $locale = App::getLocale('hi');
                                                        $locale = request()->segment(1) == 'hi' ? 'hi' : 'en';
                                                        app()->setLocale($locale);
                                                        // dd($locale);
                                                        $imagePath = \App\Http\Controllers\InsightsController::createimgurl(
                                                            $article->image,
                                                        );
                                                        $baseUrl =
                                                            Config('constants.MainDomain') . "/insights/$locale/";
                                                        $articleUrl =
                                                            $baseUrl .
                                                            strtolower($article->insight_type) .
                                                            '/' .
                                                            $article->slug .
                                                            '.' .
                                                            $article->news_id;
                                                        if ($article->category->isNotEmpty()) {
                                                            $category = $article->category->first();
                                                            $catName = $category->catname;
                                                            $catUrl = $baseUrl . $category->slug;
                                                        }
                                                        if ($article->author->isNotEmpty()) {
                                                            $author = $article->author->first();
                                                            $authorname = $author->title ?: 'Franchise India Bureau';
                                                            $slug =
                                                                $author->slug ?:
                                                                strtolower(str_replace(' ', '-', $authorname));
                                                            $authorUrl =
                                                                config('constants.MainDomain') .
                                                                '/' .
                                                                "insights/author/{$slug}-{$author->author_id}";
                                                            $author_image = $author->image
                                                                ? \App\Http\Controllers\InsightsController::authorImageurl(
                                                                    $author->image,
                                                                )
                                                                : $author_image;
                                                        }
                                                    @endphp

                                                    <div class="col-xs-12 col-sm-6 col-md-4 mdfiywidth">
                                                        <div class="new-cat-list">
                                                            <div class="cat-img"
                                                                onclick="window.location = '{{ $articleUrl }}';">
                                                                <img class="lozad" data-src="{{ $imagePath }}"
                                                                    alt="{{ $article->title }}" />
                                                                <div class="info">
                                                                    <div class="search-count">
                                                                        <div class="vertical-mid">
                                                                            <div class="bdr">
                                                                                <div class="count"><a
                                                                                        href="{{ $catUrl }}">{{ $catName }}</a>
                                                                                </div>
                                                                                <div class="name">
                                                                                    <a href="{{ $articleUrl }}">
                                                                                        {{ $article->title }}
                                                                                    </a>
                                                                                </div>
                                                                                <div class="count">
                                                                                    {{ date('d M Y', strtotime($article->created_at)) }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if ($loop->index == 8)
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 list-width-new">
                                            <div class="row">
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endnotmobile
                @include('includes.homepage.free-advice')
            </div>
        </div>
    </div>

    @mobile
        <div class="mobileban">
            <div class="dfp_300X250">
                @include('includes.banners-new.HP_MW_BTF_300x250')
            </div>
        </div>
    @endmobile

    @include('includes.homepage.homepage-hindi-testimonials')
    @notmobile
        @include('includes.homepage.homepage-banner4')
        @include('includes.homepage.hindi-website-info')
    @endnotmobile
    @include('includes.homepage.homepage-scripts')
@endsection
