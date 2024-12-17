@extends('layout.insights.master')
@section('content')
    <div class="maininnver homeh">
        <div class="container">
            <h1 class="cathead">{{ App::getLocale() == 'en' ? 'Video & Podcast' : 'वीडियो और पॉडकास्ट' }}</h1>
        </div>
        <div class="listblk">
            <div class="container">
                <ul class="artilsit">
                    @foreach ($listVideo as $fivideo)
                            <li>
                                <div class="row">
                                    <div class="col-lg-5 col-md-5">
                                        <a class="popup-youtube" href="{{ $fivideo['url'] }}">
                                            <div class="artimgblk">
                                                <span class="overnew"></span>
                                                <span class="artimgblk-yt"><img
                                                        src="{{ url('insight-new/images/play-button.svg') }}" /></span>
                                                <img src="{{ $fivideo['image'] }}" alt="{{ $fivideo['title'] }}" />
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-7 col-md-7">
                                        <div class="artcontent myartlist">
                                            <div class="haedname"><a target="_blank"
                                                    href="{{ $fivideo['url'] }}">{{ $fivideo['title'] }}</a></div>

                                            <div class="myblk">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 myblk-lt col-sm-6 col-xs-6">
                                                        {{ date('M d, Y', strtotime($fivideo['createDate'])) }}</div>
                                                </div>
                                            </div>
                                            <div class="stext">
                                                {{ html_entity_decode(strip_tags(\Illuminate\Support\Str::words($fivideo['description'], 55, ' ...')), ENT_QUOTES | ENT_HTML5, 'UTF-8') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                    @endforeach
                </ul>
                <div class="video-pagination">
                    {{ $videos->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
        <div class="podcastblk">
            <div class="container">
                <div class="comhead">
                    @php
                        $locale = App::getLocale();

                    @endphp
                    <a href="#">{{ App::getLocale() == 'en' ? 'Latest Podcast' : 'नवीनतम पॉडकास्ट' }}</a>
                    <span class="slidervall">
                        <a href="{{ url('insights/' . $locale . '/podcast') }}" target="_blank">{{ App::getLocale() == 'en' ? 'View All' : 'सभी को देखें' }}</a>
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
        <!-- Include additional blocks -->
        @include('layout.insights.magblock')
        @include('layout.insights.brandlist')
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
