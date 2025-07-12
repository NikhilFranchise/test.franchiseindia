@extends('layout.insights.master')
@section('content')
    <div class="maininnver homeh">
        <div class="inner-top-head">
            <div class="container">
                <h1>{{ App::getLocale() == 'en' ? 'Video & Podcast' : 'वीडियो और पॉडकास्ट' }}</h1>
            </div>
        </div>
        <div class="authblk">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/insights') }}">Home</a></li>
                    <li class="breadcrumb-item">{{ App::getLocale() == 'en' ? 'Video & Podcast' : 'वीडियो और पॉडकास्ट' }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="stories">
        <div class="container">
            <h3>{{ App::getLocale() == 'en' ? 'Video & Podcast' : 'वीडियो और पॉडकास्ट' }}</h3>
            <div class="row">
                <div class="col-md-8">
                    <div class="tab-content">
                        <div class="tab-pane active stab" id="latest">
                            <ul>
                                @forelse ($listVideo as $fivideo)
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
                                @empty
                                    <p>No Records.</p>
                                @endforelse
                            </ul>
                            <div class="video-pagination">
                                {{ $videos->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
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
                                    $locale = App::getLocale();
                                    $mainDomain = Config('constants.MainDomain');
                                    $image = \App\Http\Controllers\InsightsController::createimgurl($popular->image);
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
    <hr>
    <div class="podcastblk">
        <div class="container">
            <div class="comhead">
                @php
                    $locale = App::getLocale();

                @endphp
                <a href="#">{{ App::getLocale() == 'en' ? 'Latest Podcast' : 'नवीनतम पॉडकास्ट' }}</a>
                <span class="slidervall">
                    <a href="{{ url('insights/' . $locale . '/podcast') }}"
                        target="_blank">{{ App::getLocale() == 'en' ? 'View All' : 'सभी को देखें' }}</a>
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
        </div>
    </div>
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
