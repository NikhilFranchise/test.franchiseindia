@extends('layout.insights.master')
@section('load-gpt', true)
@section('content')
    @php
        $locale = App::getLocale();
        $pageTitle = $locale === 'en' ? 'Video & Podcast' : 'वीडियो और पॉडकास्ट';
    @endphp
    <div class="maininnver homeh">
        <div class="inner-top-head">
            <div class="container">
                <h1>{{ $pageTitle }}</h1>
            </div>
        </div>
        <div class="container">
            <div class="inner-article-detail-desktop-top-ad">
                @desktop
                    <div id='FI_Desktop_ROS_728x90_ATF'></div>
                    <script>
                        googletag.cmd.push(function() {
                            googletag.display('FI_Desktop_ROS_728x90_ATF');
                        });
                    </script>
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
        <div class="authblk">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/insights') }}">Home</a></li>
                    <li class="breadcrumb-item">{{ $pageTitle }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="stories">
        <div class="container">
            <h3>{{ $pageTitle }}</h3>
            <div class="row">
                <div class="col-md-8">
                    <div class="tab-content">
                        <div class="tab-pane active stab" id="latest">
                            <ul>
                                @foreach ($listVideo as $fivideo)
                                    <li>
                                        <div class="author-fresh">
                                            <div class="author-latest-pic">
                                                <a class="popup-youtube" href="{{ $fivideo['url'] }}">
                                                    <div class="artimgblk">
                                                        <span class="overnew"></span>
                                                        <span class="artimgblk-yt"><img
                                                                src="{{ url('insight-new/images/play-button.svg') }}" /></span>
                                                        <img src="{{ $fivideo['image'] }}"
                                                            alt="{{ $fivideo['title'] }} image" class="img-fluid">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="author-fresh-cont">
                                                <div class="author-latest-title"><a
                                                        href="{{ $fivideo['url'] }}">{{ $fivideo['title'] }}</a></div>
                                                <p>{{ html_entity_decode(strip_tags(\Illuminate\Support\Str::words($fivideo['description'], 33, ' ...')), ENT_QUOTES | ENT_HTML5, 'UTF-8') }}
                                                </p>
                                                <ul class="art-detail-read">
                                                    <time datetime="33Z" class="vidpod_datetime">
                                                        @if (isset($fivideo['createDate']))
                                                            {{ date('M d, Y', strtotime($fivideo['createDate'])) }}
                                                        @endif
                                                    </time>
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
                                {{ $videos->links('pagination::bootstrap-5') }}
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
                                    $catURL = $cat ? insightsCategoryUrl($cat) : null;
                                    $catName = $cat ? $cat->catname : null;
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
        </div>
    </div>
    <hr>
    <div class="podcastblk">
        <div class="container">
            <div class="comhead">

                <a href="#">{{ $locale == 'en' ? 'Latest Podcast' : 'नवीनतम पॉडकास्ट' }}</a>
                <span class="slidervall">
                    <a href="{{ url('insights/' . $locale . '/podcast') }}"
                        target="_blank">{{ $locale == 'en' ? 'View All' : 'सभी को देखें' }}</a>
                </span>
            </div>
        </div>

        <div class="container">
            <!-- below list start here  -->
            <ul class="podcastlist latest">
                @foreach ($podcast as $key => $pocast)
                    <li>
                        <div class="imgbl">
                            <div id="embed-iframe" style="width: 100%;"></div>
                            <input type="hidden" id="spotyfyId_{{ $loop->iteration }}"
                                value="{{ $pocast['podcast_id'] }}" />
                            <div class="conblk">
                                <div class="hname"><a href="{{ $pocast['podcast_link'] }}"
                                        target="_blank">{{ $pocast['title'] }}</a></div>
                            </div>
                    </li>
                @endforeach
            </ul>
            <!-- below list start here  -->
            <div class="inner-article-detail-desktop-top-ad">
                @desktop
                    <div id='FI_Desktop_ROS_728x90_BTF'></div>
                    <script>
                        googletag.cmd.push(function() {
                            googletag.display('FI_Desktop_ROS_728x90_BTF');
                        });
                    </script>
                @enddesktop
            </div>
        </div>

    </div>
    @include('layout.insights.magblock')
    @include('layout.insights.brandlist')
    <script src="https://open.spotify.com/embed/iframe-api/v1" async></script>
    <script>
        window.onSpotifyIframeApiReady = (IFrameAPI) => {
            var i = 1;
            for (i = 1; i <= 5; i++) {
                const element = document.getElementById("embed-iframe");
                const id = document.getElementById("spotyfyId_" + i).value;
                // alert(id);
                const options = {
                    width: "100%",
                    height: "400px",
                    uri: "spotify:episode:" + id,
                };

                const callback = (EmbedController) => {};
                IFrameAPI.createController(element, options, callback);
            }
        };
    </script>
@endsection
