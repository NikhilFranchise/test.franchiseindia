@extends('layout.insights.master')
@section('content')

    <div class="maininnver homeh">
        <div class="inner-top-head">
            <div class="container">
                <h1>{{ 'Author' }}</h1>
            </div>
        </div>

        <div class="container">
            <div class="authblk">
                <ul class="nabva">
                    <li><a href="{{ url('/insights') }}">Home</a></li>
                    <li>/</li>
                    <li><a href="{{ url('/insights/author') }}">Author</a></li>
                    <li>/</li>
                    <li>{{ $author->title }}</li>
                </ul>
            </div>
        </div>
        {{-- author section start here --}}
        <div class="author-top-new">
            <div class="container">
                @php
                    if (!empty($author->image)) {
                        $author_image = \App\Http\Controllers\InsightsController::authorImageurl($author->image);
                    } else {
                        $author_image = url('images/defaultuser.png');
                    }
                @endphp
                <div class="row">
                    <div class="col-md-12">
                        <div class="author-new-wrap">
                            <div class="author-new-wrap-left">
                                <div class="author-left-thumb">
                                    <img src="{{ $author_image }}" alt="{{ $author->title }}" class="img-fluid" />
                                </div>
                                <div class="author-left-nam">{{ $author->title }}</div>

                                <div class="author-left-des">{{ $author->designation }}</div>
                                <div class="author-left-count">
                                    <span id="acount">{{ $articleCount }}</span> Stories
                                </div>

                                <div class="follows">Follow:</div>
                                <div class="author-left-soc">
                                    <ul>
                                        @if (!empty($author->facebook_profile))
                                            <li>
                                                <a href="{{ $author->facebook_profile }}" target="_blank"><img
                                                        src="{{ url('/insight-new/images/social/facebook.jpg') }}" /></a>
                                            </li>
                                        @elseif(!empty($author->linkedin_profile))
                                            <li>
                                                <a href="{{ $author->linkedin_profile }}" target="_blank"><img
                                                        src="{{ url('/insight-new/images/social/linkedin.jpg') }}" /></a>
                                            </li>
                                        @elseif(!empty($author->twitter_profile))
                                            <li>
                                                <a href="{{ $author->twitter_profile }}" target="_blank"><img
                                                        src="{{ url('/insight-new/images/social/twitter.jpg') }}" /></a>
                                            </li>
                                        @elseif(!empty($author->emailid))
                                        <li>
                                            <a href="mailto:{{ $author->emailid }}" target="_blank">
                                                <img src="{{ url('/insight-new/images/social/mail.jpg') }}" />
                                            </a>
                                        </li>
                                        @elseif(!@empty($author->insta_profile))
                                            <li>
                                                <a href="{{ $author->insta_profile }}" target="_blank"><img
                                                        src="{{ url('/insight-new/images/social/instagram.jpg') }}" /></a>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="" target="_blank"><img
                                                    src="{{ url('/insight-new/images/social/rss.jpg') }}" /></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                            <div class="author-new-wrap-right">
                                <div class="author-left-nam-desc">{{ $author->title }}</div>
                                {{-- <div class="author-overview">Professional Overview</div> --}}
                                <div class="articlecontent">
                                    @php
                                        $custom_data = explode("\r\n", $author->text);
                                        if (count($custom_data) == 1) {
                                            $articleData[0] =
                                                $custom_data[0] . '<div id="v-franchiseindia"></div>';
                                        } else {
                                            $counter = 0;
                                            foreach ($custom_data as $cdata) {
                                                if ($counter == 2) {
                                                    $articleData[] =
                                                        $cdata . '<div id="v-franchiseindia"></div>';
                                                } else {
                                                    $articleData[] = $cdata;
                                                }
                                                $counter++;
                                            }
                                        }
                                        $resultArticle = implode("\r\n", $articleData);
                                    @endphp
                                    {!! $resultArticle !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- author section end here --}}
        {{-- stories section start here --}}
        <div class="stories">
            <div class="container">
                <h3>Stories From The Author</h3>

                <div class="row">
                    <div class="col-md-8">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#latest" data-toggle="tab" class="active">LATEST</a>
                            </li>
                            <li><a href="#viewed" data-toggle="tab">MOST VIEWED</a></li>
                        </ul>
                        <div class="tab-content">
                            {{-- latest stories section start here --}}
                            <div class="tab-pane active stab" id="latest">
                                <ul>
                                    {{-- @dd($latestArticles); --}}
                                    @forelse ($latestArticles as $latest)
                                        @php
                                            $image = \App\Http\Controllers\InsightsController::createimgurl1(
                                                $latest->image, $latest->lang);
                                            $latestArticleURL =
                                                Config('constants.MainDomain') .
                                                "/insights/{$latest->lang}/" .
                                                strtolower($latest->insight_type) .
                                                "/{$latest->slug}.{$latest->news_id}";

                                        @endphp
                                        <li>
                                            <div class="author-fresh">
                                                <div class="author-latest-pic">
                                                    <a href="{{ $latestArticleURL }}"><img src="{{ $image }}"
                                                            alt="{{ $latest->title }}" class="img-fluid" /></a>
                                                </div>
                                                <div class="author-fresh-cont">
                                                    <div class="author-latest-title">
                                                        <a href="{{ $latestArticleURL }}">{{ $latest->title }}</a>
                                                    </div>
                                                    <p>
                                                        {{ $latest->shortDesc }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <p>No Records</p>
                                    @endforelse

                                </ul>
                                <div class="video-pagination">
                                    {{ $latestArticles->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                            {{-- latest stories section end here --}}
                            {{-- most viewd stories section start here --}}
                            <div class="tab-pane stab" id="viewed">
                                <ul>
                                    @forelse ($mostViewedArticles as $viewed)
                                        @php
                                            $image = \App\Http\Controllers\InsightsController::createimgurl1(
                                                $viewed->image, $viewed->lang);
                                            $mostArticleURL = Config('constants.MainDomain') .
                                                "/insights/{$viewed->lang}/" .
                                                strtolower($viewed->insight_type) .
                                                "/{$viewed->slug}.{$viewed->news_id}";

                                        @endphp
                                        <li>
                                            <div class="author-fresh">
                                                <div class="author-latest-pic">
                                                    <a href="{{ $mostArticleURL }}"><img src="{{ $image }}"
                                                            alt="{{ $viewed->title }}" class="img-fluid" /></a>
                                                </div>
                                                <div class="author-fresh-cont">
                                                    <div class="author-latest-title">
                                                        <a href="{{ $mostArticleURL }}">{{ $viewed->title }}</a>
                                                    </div>
                                                    <p>
                                                        {{ $viewed->shortDesc }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <p>No Records</p>
                                    @endforelse

                                </ul>

                                <div class="video-pagination">

                                    {{ $mostViewedArticles->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                            {{-- most viewed section end here --}}
                        </div>
                        @include('layout.insights.subscribenewsletter')
                    </div>
                    {{-- stories section end here --}}
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
                        {{-- popular articles section start here --}}

                        <div class="popular-articles">
                            <div class="popular-title">Trending Articles</div>
                            <div class="region region-home-top-right">
                                <div class="views-element-container block block-views block-views-blockhome-popular-article-block-1"
                                    id="block-views-block-home-popular-article-block-1">
                                    <div>
                                        <div
                                            class="view view-home-popular-article view-id-home_popular_article view-display-id-block_1 js-view-dom-id-6a2452a8ce2f8feb7da0fe5ec0f3923833a854ba903445838953e863b8550fbd">
                                            <div class="view-content">
                                                <div>
                                                    <ul class="popular-list">

                                                        @forelse($popularArticles as $popular)
                                                            @php
                                                                $popArticleURL = Config('constants.MainDomain') .
                                                                    "/insights/{$popular->lang}/" .
                                                                    strtolower($popular->insight_type) .
                                                                    "/{$popular->slug}.{$popular->news_id}";
                                                            @endphp
                                                            <li>
                                                                @foreach ($popular->category as $cat)
                                                                    @php
                                                                        $catURL =
                                                                            Config('constants.MainDomain') .
                                                                            "/insights/{$popular->lang}/{$cat->slug}";
                                                                    @endphp
                                                                    <div class="popular-sub">
                                                                        <a href="{{ $catURL }}"
                                                                            hreflang="{{ $popular->lang }}">{{ $cat->catname }}</a>
                                                                    </div>
                                                                @endforeach

                                                                <div class="popular-head">
                                                                    <a
                                                                        href="{{ $popArticleURL }}">{{ $popular->title }}</a>
                                                                </div>
                                                            </li>
                                                        @empty
                                                            <p>No Recods</p>
                                                        @endforelse

                                                    </ul>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                        {{-- popular articles section end here --}}
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
        @include('layout.insights.magblock')

        <div class="listblk">
            <div class="container">
                <ul class="artilsit"></ul>
            </div>
        </div>
    </div>

@endsection
