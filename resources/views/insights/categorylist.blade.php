@extends('layout.insights.master')
@section('load-gpt', true)
@section('seoTitle',
    'Latest ' .
    $category['catname'] .
    ' News & Articles | Trends, Insights & Expert Analysis |
    Franchise India')
@section('seoDesc',
    'Stay updated with the latest ' .
    $category['catname'] .
    ' news and articles. Explore industry
    trends, expert insights, and business reports. Get market analysis, growth strategies, and top stories on
    FranchiseIndia.com.')
@section('content')
    <style>
        .list-ad .article-ad {
            margin: -40px 0px 20px 0px !important;
        }

        @media (max-width: 767px) {
            .list-ad .article-ad {
                margin: 0px 0px 40px 0px !important;
            }
        }
    </style>
    @php
        $locale = App::getLocale();
    @endphp
    <div class="maininnver homeh">
        <div class="inner-top-head">
            <div class="container">
                <h1>{{ $category['catname'] }}</h1>
            </div>
        </div>
        <div class="container">
            <div class="inner-article-detail-desktop-top-ad">
                @desktop
                    <div id='FI_Desktop_ROS_728x90_ATF'>
                        <script>
                            googletag.cmd.push(function() {
                                googletag.display('FI_Desktop_ROS_728x90_ATF');
                            });
                        </script>
                    </div>
                @enddesktop
                @mobile
                    <div id='FI_Desktop_ROS_300x250_ATF'>
                        <script>
                            googletag.cmd.push(function() {
                                googletag.display('FI_Desktop_ROS_300x250_ATF');
                            });
                        </script>
                    </div>
                @endmobile
            </div>
        </div>
        <div class="container">
            <div class="authblk">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/insights') }}">Home</a></li>
                    <li class="breadcrumb-item">{{ $category['catname'] }}</li>
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
                                    @foreach ($insightcategories as $article)
                                        @php
                                            $catgry = insightsCategoryUrl($category);
                                            $image = insightsImageUrl($article->image, $locale);
                                            $url = insightsUrl($article, $locale);
                                            $author = $article->author;
                                            $authorname = $author->title ?? 'Franchise India Bureau';
                                            $authorUrl = insightsAuthorUrl($author);
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
                                                    <p>{!! html_entity_decode(Str::words($article->shortDesc, 32, ' ...')) !!}</p>
                                                    <ul class="art-detail-read">
                                                        <li>By - <a href="{{ $authorUrl }}"
                                                                hreflang="{{ $locale }}">{{ $authorname }}</a>
                                                        </li>
                                                        <li><time datetime="33Z" class="datetime">
                                                                {{ $article->display_date }}
                                                            </time>/
                                                            {{ calculateReadTime($article) }}
                                                            MIN READ</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>

                                        @if ($loop->iteration % 3 == 0)
                                            @php
                                                $adIndex = $loop->iteration / 3;
                                            @endphp
                                            <li class="list-ad">
                                                <div class="article-ad text-center">
                                                    <div id="FI_Desktop_ROS_Inline_{{ $adIndex }}_300x250">
                                                        <script>
                                                            googletag.cmd.push(function() {
                                                                googletag.display('FI_Desktop_ROS_Inline_{{ $adIndex }}_300x250');
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach

                                </ul>
                                <div class="video-pagination">
                                    {{ $insightcategories->links('pagination::bootstrap-5') }}
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
                            <div id='FI_Desktop_ROS_RHS_300x250_ATF'>
                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.display('FI_Desktop_ROS_RHS_300x250_ATF');
                                    });
                                </script>
                            </div>
                        </div>
                        {{-- ads section end here --}}

                        <div class="popular-articles">
                            <div class="popular-title">Popular Articles</div>
                            <ul class="popular-list">
                                @foreach ($popArticles as $popular)
                                    @php
                                        $popUrl = insightsUrl($popular, $locale);
                                        $cat = $popular->category ?? null;
                                        $catURL = insightsCategoryUrl($cat);
                                        $catName = $cat->catname;
                                    @endphp
                                    <li>
                                        @if ($cat)
                                            <div class="popular-sub"><a href="{{ $catURL }}"
                                                    hreflang="{{ $locale }}">{{ ucwords($catName) }}</a>
                                            </div>
                                        @endif
                                        <div class="popular-head"><a href="{{ $popUrl }}">{{ $popular->title }}</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        {{-- ads section start here --}}
                        <div class="ad-right-sticky">
                            <div id="FI_Desktop_ROS_RHS_300x250_1">
                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.display('FI_Desktop_ROS_RHS_300x250_1');
                                    });
                                </script>
                            </div>
                        </div>
                        {{-- ads section end here --}}
                    </div>
                </div>
                <div class="inner-article-detail-desktop-top-ad">
                    @desktop
                        <div id='FI_Desktop_ROS_728x90_BTF'>
                            <script>
                                googletag.cmd.push(function() {
                                    googletag.display('FI_Desktop_ROS_728x90_BTF');
                                });
                            </script>
                        </div>
                    @enddesktop
                </div>
            </div>
        </div>
        @include('layout.insights.brandlist')
        @include('layout.insights.magblock')
    </div>
@endsection
