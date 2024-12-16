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
    {{--  <div class="podcastblk">
        <div class="container">

            <div class="comhead"><a href="#">Podcast - Grow With Gaurav</a> <span class="slidervall"><a
                        href="https://www.gauravmarya.com/podcast/" target="_blank">View All</a></span></div>
        </div>

        <div class="container">


            <!-- below list start here  -->
            <ul class="podcastlist">
                <li>
                    <div class="imgbl">
                        <div class="playbtn"><img src="{{ url('images/play-buttongrey.svg') }}"></div>
                        <a href="https://www.gauravmarya.com/podcast/" target="_blank">
                            <img src="{{ url('images/gwg/gwg12.jpg') }}" class="pdimg"></a>
                    </div>
                    <div class="conblk">
                        <div class="hname"> <a href="https://www.gauravmarya.com/podcast/" target="_blank">Steps To Achieve
                                Operational Excellence | BEx Academy</a></div>
                    </div>
                </li>
                <li>
                    <div class="imgbl">
                        <div class="playbtn"><img src="{{ url('images/play-buttongrey.svg') }}">
                        </div><a href="https://www.gauravmarya.com/podcast/" target="_blank">
                            <img src="{{ url('images/gwg/gwg11.jpg') }}" class="pdimg"></a>
                    </div>
                    <div class="conblk">
                        <div class="hname"> <a href="https://www.gauravmarya.com/podcast/" target="_blank">Data
                                Intelligence For Business Excellence | BEx Academy</a></div>
                    </div>
                </li>
                <li>
                    <div class="imgbl">
                        <div class="playbtn"><img src="{{ url('images/play-buttongrey.svg') }}">
                        </div>
                        <a href="https://www.gauravmarya.com/podcast/" target="_blank"><img
                                src="{{ url('images/gwg/gwg10.jpg') }}" class="pdimg"></a>
                    </div>
                    <div class="conblk">
                        <div class="hname"> <a href="https://www.gauravmarya.com/podcast/" target="_blank">Business
                                Transformation through Workforce Alignment | BEx Academy</a></div>
                    </div>
                </li>
                <li>
                    <div class="imgbl">
                        <div class="playbtn"><img src="{{ url('images/play-buttongrey.svg') }}"></div>
                        <a href="https://www.gauravmarya.com/podcast/" target="_blank"><img
                                src="{{ url('images/gwg/gwg9.jpg') }}" class="pdimg"></a>
                    </div>
                    <div class="conblk">
                        <div class="hname"> <a href="https://www.gauravmarya.com/podcast/" target="_blank">Developing a
                                Customer Centric Strategy For Your Business | BEx Academy</a></div>
                    </div>
                </li>

                <li>
                    <div class="imgbl">
                        <div class="playbtn"><img src="{{ url('images/play-buttongrey.svg') }}">
                        </div><a href="https://www.gauravmarya.com/podcast/" target="_blank">
                            <img src="{{ url('images/gwg/gwg8.jpg') }}" class="pdimg"></a>
                    </div>
                    <div class="conblk">
                        <div class="hname"> <a href="https://www.gauravmarya.com/podcast/" target="_blank">Achieving
                                Business Excellence through Effective Leadership | BEx Academy</a></div>
                    </div>
                </li>


                <li>
                    <div class="imgbl">
                        <div class="playbtn"><img src="{{ url('images/play-buttongrey.svg') }}"></div>
                        <a href="https://www.gauravmarya.com/podcast/" target="_blank"><img
                                src="{{ url('images/gwg/gwg7.jpg') }}" class="pdimg"></a>
                    </div>
                    <div class="conblk">
                        <div class="hname"> <a href="https://www.gauravmarya.com/podcast/" target="_blank">Fundamentals of
                                Business Excellence | BEx Academy</a></div>

                    </div>
                </li>

            </ul>

            <!-- below list start here  -->
        </div>
    </div>  --}}


    </div>
    <script src="https://open.spotify.com/embed/iframe-api/v1" async></script>
<script>
    function initializeSpotifyPlayers() {
        window.onSpotifyIframeApiReady = (IFrameAPI) => {
            var i = 1;
            for (i = 1; i <= {{$podcastcount}}; i++) {
                const element = document.getElementById("embed-iframe-" + i);
                const id = document.getElementById("spotyfyId_" + i).value;
                const options = {
                    width: "100%",
                    height: "400px",
                    uri: "spotify:episode:" + id,
                };

                const callback = (EmbedController) => {};
                IFrameAPI.createController(element, options, callback);
            }
        };
    }

    {{--  function loadMorePodcasts(page) {
        $.ajax({
            url: "podcast/"+{{$podcasts[0]['sno']}}+"/"+page,
            method: "GET",
        }).done(function(data) {
            if (data) {
                page++;
                $('#podcastsList').append(data);

                // Initialize Spotify players for the new content
                initializeSpotifyPlayers();

                if ($('.readmore').attr('data-page') == page) {
                    $('.readmore').hide();
                }
                if (typeof addthis !== 'undefined') {
                    addthis.layers.refresh();
                }
            }
        });
    }  --}}

    {{--  $(function() {
        // Call the function when the page loads
        initializeSpotifyPlayers();

        var page = 2;
        $('.readmore').click(function() {
            loadMorePodcasts(page);
        });
    });  --}}
</script>

<script>
    window.onSpotifyIframeApiReady = (IFrameAPI) => {
        var i = 1;
        for (i = 1; i <= {{$podcastcount}}; i++) {
        const element = document.getElementById("embed-iframe-" + i);
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
