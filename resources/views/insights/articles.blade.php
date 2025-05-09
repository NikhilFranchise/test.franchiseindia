@extends('layout.insights.master')
@section('content')
    <div class="maininnver homeh">
        <div class="inner-top-head">
            <div class="container">
                <h1>{{ App::getLocale() == 'en' ? 'Articles' : 'आर्टिकल' }}</h1>
            </div>
        </div>
        <div class="authblk">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/insights') }}">Home</a></li>
                    <li class="breadcrumb-item">{{ App::getLocale() == 'en' ? 'Articles' : 'आर्टिकल' }}</li>
                </ul>
            </div>
        </div>
        <div class="stories">
            <div class="container">
                <h3>{{ App::getLocale() == 'en' ? 'Articles' : 'आर्टिकल' }}</h3>
                <div class="row">
                    <div class="col-md-8">
                        <div class="tab-content">
                            <div class="tab-pane active stab" id="latest">
                                <ul>
                                    @forelse ($insArticles as $article)
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
                                                        <li><time datetime="33Z" class="datetime">
                                                                @if ($article->created_at >= $article->published_date)
                                                                    {{ date('M d, Y', strtotime($article->created_at)) }}
                                                                @else
                                                                    {{ 'Last Updated ' . date('M d, Y', strtotime($article->published_date)) }}
                                                                @endif
                                                            </time>/
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
                                    {{ $insArticles->links('pagination::bootstrap-5') }}
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
