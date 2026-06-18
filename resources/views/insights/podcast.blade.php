@extends('layout.insights.master')
@section('load-gpt', true)
@section('content')
    @php
        $locale = App::getLocale();
        $pageTitle = $locale === 'en' ? 'Podcast' : 'पॉडकास्ट';
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
                                @foreach ($podcasts as $audio)
                                    <li>
                                        <div class="author-fresh">
                                            <div class="podcast-latest-pic">
                                                <div id="embed-iframe-{{ $loop->iteration }}"></div>
                                                <input type="hidden" id="spotyfyId_{{ $loop->iteration }}"
                                                    value="{{ $audio['podcast_id'] }}" />
                                            </div>
                                            <div class="author-fresh-cont">
                                                <div class="author-latest-title"><a
                                                        href="{{ $audio['podcast_link'] }}">{{ $audio['title'] }}</a></div>
                                                <p>{{ html_entity_decode(strip_tags(Str::words($audio['description'], 32, ' ...')), ENT_QUOTES | ENT_HTML5, 'UTF-8') }}
                                                </p>
                                                <ul class="art-detail-read">
                                                    <time datetime="33Z" class="vidpod_datetime">
                                                        @if (isset($audio['created_at']))
                                                            {{ date('M d, Y', strtotime($audio['created_at'])) }}
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
                                {{ $podcasts->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                    <div class="contentarea">
                        @include('layout.insights.subscribenewsletter')
                    </div>
                </div>
                {{-- Right Sidebar --}}
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

            const podcastCount = @json($podcastcount);

            for (let i = 1; i <= podcastCount; i++) {

                const element = document.getElementById("embed-iframe-" + i);
                const input = document.getElementById("spotyfyId_" + i);

                if (!element || !input) continue; // 🔒 safety

                const id = input.value;

                const options = {
                    width: "100%",
                    height: "160px",
                    uri: "spotify:episode:" + id,
                };

                IFrameAPI.createController(element, options, () => {});
            }
        };
    </script>
@endsection
