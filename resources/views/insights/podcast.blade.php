@extends('layout.insights.master')
@section('content')
    <div class="maininnver">
        <div class="container">
            <h1 class="cathead pd47">{{ App::getLocale() == 'en' ? 'Podcast' : 'पॉडकास्ट' }}</h1>
        </div>

        <div class="listblk">
            <div class="container">
                <ul class="artilsit"id="podcastsList">
                    {{-- @dd($podcasts); --}}
                    @foreach ($podcasts as $lv)
                        <li>
                            <div class="row">
                                <div class="col-lg-5 col-md-5">
                                    <div id="embed-iframe-{{ $loop->iteration }}"></div>
                                    <input type="hidden" id="spotyfyId_{{ $loop->iteration }}"
                                        value="{{ $lv['podcast_id'] }}" />
                                </div>


                                <div class="col-lg-7 col-md-7">
                                    <div class="artcontent myartlist">
                                        <div class="haedname"><a target="_blank"
                                                href="{{ $lv['podcast_link'] }}">{{ $lv['title'] }}</a></div>

                                        <div class="myblk">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 myblk-lt col-sm-6 col-xs-6">
                                                    {{ date('M d, Y', strtotime($lv['created_at'])) }}</div>
                                            </div>
                                        </div>
                                        <div class="stext">{{ strip_tags($lv['description']) }}</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
                <div class="video-pagination">

                    {{ $podcasts->links('pagination::bootstrap-4') }}

                </div>
            </div>
        </div>

    </div>


    </div>
    <script src="https://open.spotify.com/embed/iframe-api/v1" async></script>

    <script>
        window.onSpotifyIframeApiReady = (IFrameAPI) => {
            var i = 1;
            for (i = 1; i <= {{ $podcastcount }}; i++) {
                const element = document.getElementById("embed-iframe-" + i);
                const id = document.getElementById("spotyfyId_" + i).value;
                 //alert(id);
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
