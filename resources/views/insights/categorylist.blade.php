@extends('layout.insights.master')
@section('content')
    <div class="maininnver homeh">
        <div class="inner-top-head">
            <div class="container">
                <h1>{{ $category['catname'] }}</h1>
            </div>
        </div>
        <div class="authblk">
            <div class="container">
                <ul class="nabva">
                    <li><a href="{{ url('/insights') }}">Home</a></li>
                    <li>/</li>
                    <li>{{ $category['catname'] }}</li>
                </ul>
            </div>
        </div>
        <div class="stories">
            <div class="container">
                <h3>{{ $category['catname'] }}</h3>
                <div class="row">
                    <div class="col-md-8">
                        <div class="tab-content">
                            <div class="tab-pane active stab" id="latest">
                                <ul>
                                    @forelse ($insightcategories as $article)
                                        @php
                                            $locale = App::getLocale();
                                            $mainDomain = Config('constants.MainDomain');

                                            // Generate category and article URLs
                                            $catgry = "{$mainDomain}/insights/{$locale}/{$category['slug']}";
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
                                                $authorUrl = "{$mainDomain}/insights/{$locale}/author/{$slug}-{$author->author_id}";
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
                                                    <p>{{ $article->shortDesc }} </p>
                                                    <div class="scbk">
                                                        <div class="shrblk">
                                                            <span class="inshrblk">
                                                                <a href="#">
                                                                    <img src="{{ url('insight-new/images/smallshare.svg') }}"
                                                                        class="inimg">Share
                                                                    <div class="sfv">
                                                                        @foreach ([
            'facebook' => '/insight-new/images/facebookcard.svg',
            'twitter' => '/insight-new/images/twittercard.svg',
            'instagram' => 'https://www.franchiseindia.com/newhomepage/assets/img/instagram-icon.svg',
            'youtube' => 'https://www.franchiseindia.com/newhomepage/assets/img/you-tube-icon.svg',
        ] as $platform => $icon)
                                                                            <div class="innersfv"
                                                                                onclick="window.open('https://www.{{ $platform }}.com/FranchiseIndia', '_blank')">
                                                                                <img src="{{ $icon }}" />
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <p>No Records.</p>
                                    @endforelse

                                </ul>
                                <div class="video-pagination">
                                    {{ $insightcategories->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ad-right-author">
                            <img src="images/ad5.png" class="img-fluid">
                        </div>
                        <div class="popular-articles">
                            <div class="popular-title">Popular Articles</div>
                            <ul class="popular-list">
                                @forelse ($popularArticles as $popular)
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
                                        <div class="popular-head"><a href="{{ $popUrl }}">{{ $popular->title }}</a></div>
                                    </li>

                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="listblk">
            <div class="container">
                <ul class="artilsit">
                </ul>
            </div>
        </div>
    @endsection
