<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="topmenu">
        <div class="container-fluid">
            <div class="row">
                @notmobile
                    <div class="col-lg-3 col-md-3 col-xl-2 offset-xl-1">
                        <span class="top1">#ApneBrandsKiNayiMarket</span>
                    </div>
                @endnotmobile
                <div class="col-lg-5 col-xl-5 col-md-5 text-right">
                    <ul class="top-ul">
                        <li>EXPAND YOUR BUSINESS <span>|</span> </li>
                        <li><a href="https://www.franchiseindia.com/" target="_blank">GET FRANCHISE</a> <span>|</span>
                        </li>
                        <li><a href="https://www.franchiseindia.com/business-opportunities/dealers-and-distributors.m5" target="_blank">GET DISTRIBUTORSHIP</a></li>
                    </ul>
                </div>
                @mobile
                    <div class="col-lg-3 col-md-3 col-xl-2 offset-xl-1">
                        <span class="top1">#ApneBrandsKiNayiMarket</span>
                    </div>
                @endmobile
                <div class="col-lg-2 col-xl-2 col-md-2">
                </div>
                <div class="col-lg-2 col-md-2">
                    <div class="topright">
                        <ul class="togl">
                            @yield('alturls')
                            <li @if (App::getLocale() == 'en') class="active" @endif><a
                                    href="{{ url('/insights') }}">English</a></li>
                            <li @if (App::getLocale() == 'hi') class="active" @endif><a
                                    href="{{ url('/insights/hindi') }}">Hindi</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="logobar">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 d-flex align-items-center">
                    <!-- =======Uncomment below if you prefer to use an image logo========= -->
                    @php
                        if (App::getLocale() == 'en') {
                            $murl = '/insights';
                        } else {
                            $murl = '/insights/hindi';
                        }
                    @endphp
                    <a href="{{ $murl }}" class="logo mr-auto"><img
                            src="{{ url('detailpage/images/logo.png') }}" alt="Franchise india Insights" width="243" height="35" /></a>

                    <nav class="nav-menu d-none d-lg-block">
                        <ul>
                            @php
                                $locale = App::getLocale(); // Store the locale value once
                                $categoryUrlPrefix = $locale == 'en' ? '/insights/en/' : '/insights/hi/';
                                $categoryLabel = $locale == 'en' ? 'Categories' : 'कैटिगरी';
                                $topStoriesLabel = $locale == 'en' ? 'Top Stories' : 'प्रमुख समाचार';
                                $insightsLabel = $locale == 'en' ? 'Insights' : 'इनसाइट्स';
                                $ArticleLabel = $locale == 'en' ? 'Articles' : 'आर्टिकल';
                                $interviewsLabel = $locale == 'en' ? 'Interviews' : 'इंटरव्यू';
                                $eventsReportsLabel = $locale == 'en' ? 'Events & Reports' : 'इवेंट और रिपोर्ट';
                                $videoPodcastLabel = $locale == 'en' ? 'Videos & Podcast' : 'वीडियो और पॉडकास्ट';
                            @endphp
                            <li>
                                <div class="dropdown">
                                    <button class="dbtn dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $categoryLabel }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="categoryList">
                                        @php
                                            $categories = \App\Http\Controllers\InsightsController::insightcategory(
                                                $locale,
                                            );
                                            $specificCategories = \App\Http\Controllers\InsightsController::specificCategories(
                                                $locale,
                                            );
                                        @endphp
                                        
                                        @foreach ($categories as $cat)
                                            <a class="dropdown-item" data-id="{{ $cat['id'] }}"
                                                href="{{ $categoryUrlPrefix . $cat['slug'] }}">{{ $cat['catname'] }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            @foreach ($specificCategories as $threecat)
                                <li><a data-id="{{ $threecat['id'] }}"
                                        href="{{ $categoryUrlPrefix . $threecat['slug'] }}">{{ $threecat['catname'] }}</a>
                                </li>
                            @endforeach
                            <li><a href="{{ $categoryUrlPrefix }}topstories">{{ $topStoriesLabel }}</a></li>
                            <li>
                                <div class="dropdown">
                                    <button class="dbtn dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $insightsLabel }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="">
                                        <a class="dropdown-item" href="{{ $categoryUrlPrefix }}industryfocus">{{ $ArticleLabel }}</a>
                                        <a class="dropdown-item" href="{{ $categoryUrlPrefix }}interviews">{{ $interviewsLabel }}</a>
                                        <a class="dropdown-item" href="{{ $categoryUrlPrefix }}events_reports">{{ $eventsReportsLabel }}</a>
                                        <a class="dropdown-item" href="{{ $categoryUrlPrefix }}video_podcast">{{ $videoPodcastLabel }}</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <div class="search-main mx-auto">
                        <div class="ev-spk-icon">
                            <span id="tog1">
                                <img src="{{ url('insight-new/images/search.svg') }}" alt="Search" width="18" height="18" />
                                <img src="{{ url('insight-new/images/cross.png') }}" alt="Close"
                                    style="display: none;" />
                            </span>
                        </div>
                        <div id="searchbar" style="display: none;">
                            <form action="{{ url('/insights/' . $locale . '/search') }}" method="get">
                                <div class="input-group">
                                    <div class="form-outline">
                                        <input type="search" name="search" id="form1" class="form-control1"
                                            placeholder="Search here" />
                                    </div>
                                    <button type="submit" class="btn1 btn-primary" value="Search">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
