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
                                $categoryLabel = $locale == 'en' ? 'Categories' : 'कैटिगरी';
                                $topStoriesLabel = $locale == 'en' ? 'Top Stories' : 'प्रमुख समाचार';
                                $insightsLabel = $locale == 'en' ? 'Insights' : 'इनसाइट्स';
                                $ArticleLabel = $locale == 'en' ? 'Articles' : 'आर्टिकल';
                                $interviewsLabel = $locale == 'en' ? 'Interviews' : 'इंटरव्यू';
                                $eventsReportsLabel = $locale == 'en' ? 'Events & Reports' : 'इवेंट और रिपोर्ट';
                                $videoPodcastLabel = $locale == 'en' ? 'Videos & Podcast' : 'वीडियो और पॉडकास्ट';

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
                                <div class="rss-link"><a href="{{ config('constants.MainDomain').'/insights/rss/topstories' }}">{{ $topStoriesLabel }}</a> <img
                                        src="{{ url('insight-new/images/ar.png') }}" alt="Franchise Insights">
                                </div>
                                <div class="rss-link-detail">{{ $topstoriesUrl }}</div>
                            </li>
                            <li>
                                <div class="rss-link"><a href="{{ config('constants.MainDomain').'/insights/rss/industryfocus' }}">{{ $ArticleLabel }}</a>
                                    <img src="{{ url('insight-new/images/ar.png') }}" alt="Franchise Insights">
                                </div>
                                <div class="rss-link-detail">{{ $toparticleUrl }}</div>
                            </li>
                            <li>
                                <div class="rss-link"><a href="{{ config('constants.MainDomain').'/insights/rss/interviews' }}">{{ $interviewsLabel }}</a> <img
                                        src="{{ url('insight-new/images/ar.png') }}" alt="Franchise Insights">
                                </div>
                                <div class="rss-link-detail">{{ $topinterviewsUrl }}
                                </div>
                            </li>
                            <li>
                                <div class="rss-link"><a href="{{ config('constants.MainDomain').'/insights/rss/events_reports' }}">{{ $eventsReportsLabel }}</a> <img
                                        src="{{ url('insight-new/images/ar.png') }}" alt="Franchise Insights">
                                </div>
                                <div class="rss-link-detail">{{ $topreportUrl }}
                                </div>
                            </li>
                            <li>
                                <div class="rss-link"><a href="">{{ $categoryLabel }}</a>
                                    <img src="{{ url('insight-new/images/ar.png') }}" alt="Franchise Insights">
                                </div>
                                <div class="rss-link-detail"></div>
                            </li>
                            <li>
                                <div class="rss-link"><a href="{{config('constants.MainDomain')}}/insights/author">{{ 'Author' }}</a>
                                    <img src="{{ url('insight-new/images/ar.png') }}" alt="Franchise Insights">
                                </div>
                                <div class="rss-link-detail">{{config('constants.MainDomain')}}/insights/author</div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="popular-articles">
                            <h3>Latest Articles</h3>
                            <ul>
                                <li>
                                    <div class="popular-head">
                                        <a
                                            href="https://www.franchiseindia.com/insights/en/news/up-government-pushes-for-higher-msme-growth-signs-rs19000-crore-mous-in-davo.55909">UP
                                            Government Pushes for Higher MSME Growth, Signs ₹19,000 Crore MoUs in Davo</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="popular-head">
                                        <a
                                            href="https://www.franchiseindia.com/insights/en/news/yokohama-india-expands-local-manufacturing-begins-production-of-20-inch-tires.55899">Yokohama
                                            India Expands Local Manufacturing, Begins Production of 20-Inch Tires</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="popular-head">
                                        <a
                                            href="https://www.franchiseindia.com/insights/en/news/mp-govt-announces-rs2-crore-freight-support-for-export-oriented-msme.55896">MP
                                            Govt Announces ₹2 Crore Freight Support for Export-Oriented MSME</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="popular-head">
                                        <a
                                            href="https://www.franchiseindia.com/insights/en/news/silktech-2025-showcases-innovations-in-silk-technology-and-sustainability.55890">SILKTECH
                                            2025 Showcases Innovations in Silk Technology and Sustainability</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="popular-head">
                                        <a
                                            href="https://www.franchiseindia.com/insights/en/news/india-plans-rs2250-crore-export-boost-eyes-alternative-financing-for-msmes.55889">India
                                            Plans ₹2,250 Crore Export Boost, Eyes Alternative Financing for MSMEs</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
