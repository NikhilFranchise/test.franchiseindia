@extends('layout.insights.master')
@section('content')
    <div class="maininnver homeh">
        <div class="inner-top-head">
            <div class="container">
                <h1>RSS Feeds</h1>
            </div>
        </div>
        <style>
            p.r-title {
                font-size: 19px;
                padding-bottom: 15px;
                margin-bottom: 20px;
            }

            ul.rss-list {
                list-style: none;
                padding-left: 0px;
                margin-top: 45px;
            }

            ul.rss-list li {
                margin-bottom: 32px;
                border-bottom: 1px dotted #292929;
                padding-bottom: 29px;
                background: url("{{ config('constants.MainDomain') }}/insight-new/images/rss-feed.png");
                padding-left: 44px;
                background-repeat: no-repeat;
                background-size: 30px 30px;
            }

            ul.rss-list li img {
                width: 20px;
                margin-left: 5px;
                margin-top: -8px;
            }

            .rss-link a {
                font-size: 20px;
                color: #000;
            }

            ul.rss-list li:last-child {
                border-bottom: 0px;
            }

            .rss-link-detail {
                margin-top: 9px;
                color: #545454;
                font-size: 17px;
                line-height: 24px;
            }

            #accordion {
                max-width: 100%;
            }

            h4.panel-title {
                font-weight: 400;
                font-size: 20px;
                color: #000000;
            }

            .panel-heading a {
                display: block;
                position: relative;
                color: #000000;
            }

            .panel-heading a::after {
                content: "";
                border: solid black;
                border-width: 0 1.5px 1.5px 0;
                display: inline-block;
                padding: 5px;
                position: absolute;
                right: 0;
                top: 0;
                transform: rotate(45deg);
            }

            .panel-heading a[aria-expanded="true"]::after {
                transform: rotate(-135deg);
                top: 5px;
            }

            .rss-ins {
                border-top: 1px solid #e3e3e3;
                padding-top: 24px;
            }

            .rss-ins a {
                font-weight: normal !important;
                padding-left: 0px;
                margin-bottom: 10px;
                background: transparent !important;
            }

            #accordion .panel-body {
                padding-top: 12px;
            }

            .rss-ins ul {
                list-style: square;
                padding-left: 0px;
            }

            .rss-ins ul li {
                background: none;
                padding-left: 4px;
                padding-bottom: 0px;
                margin-bottom: 11px;
                border: none;
            }
        </style>
        <div class="rss-feeds">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="author-archive-title">RSS Feeds</h2>
                        {{-- <p class="r-title">Feeds by Cate</p> --}}
                        <ul class="rss-list">
                            @php
                                $locale = App::getLocale(); // Store the locale value once
                                $categoryUrlPrefix = $locale == 'en' ? '/insights/en/' : '/insights/hi/';
                                //labels for english & hindi lang
                                $categoryLabel = $locale == 'en' ? 'Categories' : 'कैटेगरी';
                                $topStoriesLabel = $locale == 'en' ? 'Top Stories' : 'प्रमुख समाचार';
                                $insightsLabel = $locale == 'en' ? 'Insights' : 'इनसाइट्स';
                                $ArticleLabel = $locale == 'en' ? 'Articles' : 'आर्टिकल';
                                $interviewsLabel = $locale == 'en' ? 'Interviews' : 'इंटरव्यू';
                                $eventsReportsLabel = $locale == 'en' ? 'Events & Reports' : 'इवेंट और रिपोर्ट';
                                $videoPodcastLabel = $locale == 'en' ? 'Videos & Podcast' : 'वीडियो और पॉडकास्ट';
                                $authorLabel = $locale == 'en' ? 'Author' : 'लेखक';

                                //urls for hindi & english  lang.
                                $topstoriesUrl = config('constants.MainDomain') . $categoryUrlPrefix . 'topstories';
                                $toparticleUrl = config('constants.MainDomain') . $categoryUrlPrefix . 'industryfocus';
                                $topinterviewsUrl = config('constants.MainDomain') . $categoryUrlPrefix . 'interviews';
                                $topreportUrl = config('constants.MainDomain') . $categoryUrlPrefix . 'events_reports';
                                // $topCategoryUrl = config('constants.MainDomain') . $categoryUrlPrefix;
                                // $topTagUrl = config('constants.MainDomain') . $categoryUrlPrefsix.'topstories';
                                // dd($topstoriesUrl);
                            @endphp
                            <li>
                                <div class="rss-link"><a href="{{ $topstoriesUrl . '/rss' }}">{{ $topStoriesLabel }}</a>
                                    <img src="{{ url('insight-new/images/ar.png') }}" alt="Franchise Insights">
                                </div>
                                <div class="rss-link-detail">{{ $topstoriesUrl }}</div>
                            </li>
                            <li>
                                <div class="rss-link"><a href="{{ $toparticleUrl . '/rss' }}">{{ $ArticleLabel }}</a>
                                    <img src="{{ url('insight-new/images/ar.png') }}" alt="Franchise Insights">
                                </div>
                                <div class="rss-link-detail">{{ $toparticleUrl }}</div>
                            </li>
                            <li>
                                <div class="rss-link"><a href="{{ $topinterviewsUrl . '/rss' }}">{{ $interviewsLabel }}</a>
                                    <img src="{{ url('insight-new/images/ar.png') }}" alt="Franchise Insights">
                                </div>
                                <div class="rss-link-detail">{{ $topinterviewsUrl }}
                                </div>
                            </li>
                            <li>
                                <div class="rss-link"><a href="{{ $topreportUrl . '/rss' }}">{{ $eventsReportsLabel }}</a>
                                    <img src="{{ url('insight-new/images/ar.png') }}" alt="Franchise Insights">
                                </div>
                                <div class="rss-link-detail">{{ $topreportUrl }}
                                </div>
                            </li>
                            <li>
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" class="rss-link"
                                                    href="#collapseOne">{{ $categoryLabel }}</a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="rss-ins">
                                                    <ul>
                                                        @foreach ($categories as $cat)
                                                            <li><a class="dropdown-item" data-id="1{{ $cat->id }}"
                                                                    href="{{ url("/insights/{$locale}/{$cat->slug}/rss") }}">{{ $cat->catname }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="rss-link-detail">{{ url("/insights/$locale") . '/' . $cat->slug }}</div> --}}
                            </li>
                            {{-- <li>
                                <div class="rss-link"><a
                                        href="{{ config('constants.MainDomain') }}/insights/author">{{ $authorLabel }}</a>
                                    <img src="{{ url('insight-new/images/ar.png') }}" alt="Franchise Insights">
                                </div>
                                <div class="rss-link-detail">{{ config('constants.MainDomain') }}/insights/author</div>
                            </li> --}}
                        </ul>
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
                            <h3>Latest Articles</h3>
                            <ul>
                                @forelse ($latestarticles as $latest)
                                    @php
                                        $locale = App::getLocale();
                                        $mainDomain = Config('constants.MainDomain');
                                        $url =
                                            "{$mainDomain}/insights/{$locale}/" .
                                            strtolower($latest->insight_type) .
                                            "/{$latest->slug}.{$latest->news_id}";
                                    @endphp
                                    <li>
                                        <div class="popular-head">
                                            <a href="{{ $url }}">{{ $latest->title }}</a>
                                        </div>
                                    </li>
                                @empty
                                    <li>Records Not Found.</li>
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
    @endsection
