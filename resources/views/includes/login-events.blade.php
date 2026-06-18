<style>
    .hometopadsright {
        height: auto !important;
    }

    #slideshow {
        position: relative;
        min-height: 60px;
        /* safe minimum */
    }

    #slideshow .eventc {
        display: none;
    }

    #slideshow .eventc:first-child {
        display: block;
    }

    .eventvenuedate {
        padding: 8px 10px;
        font-size: 13px;
        line-height: 1.4;
        word-break: break-word;
    }

    .eventvenuedate span {
        display: block;
        font-size: 12px;
        color: #666;
    }
</style>
@if (Request::segment(1) != 'investor' && Request::segment(2) != 'create' && Request::segment(1) != 'event')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 innspc">
                <div class="regblkleft">
                    <div class="regsection">
                        <ul class="regty">
                            <li>
                                <a href="{{ url('franchisor/registration/step/1') }}">
                                    <div class="regtxt">
                                        <span>Appoint</span><br /> Channel<br /> Partners
                                    </div>
                                    <div class="regtxtbtm">
                                        Register<span>Free <img alt="drop right home"
                                                src="{{ url('images/droprighthome.png') }}" /></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('investor/create') }}">
                                    <div class="regtxt">
                                        <span>Start</span> A<br /> Business<br /> <span>Today!</span>
                                    </div>
                                    <div class="regtxtbtm">
                                        Register<span>Free <img alt="drop right home"
                                                src="{{ url('images/droprighthome.png') }}" /> </span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="regblkright">
                    <div class="hometopadsleft">
                        <div class="adshom newbandfp">
                            @desktop
                                <div class="homeadd728">

                                    @if (isset($mc) && $mc == 2)
                                        <div style='width: 100%;'><a
                                                href="https://www.franchiseindia.com/brands/what-a-sandwich.51513"><img
                                                    src="https://www.franchiseindia.com/images/go69pizza.jpg"
                                                    style="width:100%;" alt="What a Sandwich" /></a></div>
                                    @else
                                        @include('includes.banners-new.HP_DSK_ATF_728x90')
                                    @endif
                                </div>
                            @enddesktop
                            @tablet
                                <div class="homeadd468">
                                    @include('includes.banners-new.HP_TB_ATF_468x60')
                                </div>
                            @endtablet
                        </div>
                    </div>
                    <div class="hometopadsright">
                        <div class="upcomhead"> <a href="https://www.franchiseindia.com/event" target="_blank"
                                style="color:#333">Upcoming Events</a></div>
                        <div id="slideshow">
                            @php
                                $events = App\Http\Controllers\EventController::getEvents();
                            @endphp
                            @foreach ($events as $event)
                                @php
                                    $place = trim($event['place'], ', ');
                                    // Split into main part + last part after the final comma
                                    $parts = explode(',', $place);
                                    $lastPart = trim(end($parts));
                                    // Split last part into words
                                    $words = preg_split('/\s+/', $lastPart);
                                    // If last part contains 2+ words → take last 2
                                    // If it contains only 1 word → take that 1
                                    if (count($words) >= 2) {
                                        $last = implode(' ', array_slice($words, -2));
                                    } else {
                                        $last = $words[0];
                                    }
                                @endphp
                                <div class="eventc">
                                    <a href="{{ $event['url'] }}" target="_blank">
                                        <div class="eventvenuedate">{{ $event['title'] }} <span>{{ $event['date'] }},
                                                {{ $last }}</span></div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        $("#slideshow > div.eventc:gt(0)").hide(100);
        setInterval(function() {
            $("#slideshow > div.eventc:first").fadeOut(2000).next().fadeIn(2000).end().appendTo("#slideshow")
        }, 5000);
    </script> --}}
    <script>
        let $slides = $("#slideshow .eventc");
        let index = 0;

        function showNext() {
            let $current = $slides.eq(index);
            index = (index + 1) % $slides.length;
            let $next = $slides.eq(index);

            // Animate height smoothly
            $("#slideshow").height($current.outerHeight());

            $current.fadeOut(800, function() {
                $("#slideshow").height($next.outerHeight());
                $next.fadeIn(800);
            });
        }

        // Initial height
        $("#slideshow").height($slides.first().outerHeight());

        setInterval(showNext, 5000);
    </script>
@endif
