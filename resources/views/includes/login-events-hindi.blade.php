<div class="container">
    <div class="row">
        <!-- register  ads start here -->
        <div class="col-xs-12 col-sm-12 col-md-12 innspc">
            <div class="regblkleft">
                <div class="regsection">
                    <ul class="regty">
                        <li>
                            <a href="{{ url('franchisor/registration/step/1') }}">
                                <div class="regtxt">
                                    <span>नियुक्त करें</span><br /> चैनल<br /> पार्टनर्स
                                </div>
                                <div class="regtxtbtm">
                                    फ्री में करें <span>रजिस्ट्रेशन <img alt="drop right home" src="{{ url('images/droprighthome.png')}}"/></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('investor/create') }}">
                                <div class="regtxt">
                                    <span>आज ही</span> <br /> शुरू करें <br /> <span>बिजनेस!</span>
                                </div>
                                <div class="regtxtbtm">
                                    फ्री में करें <span>रजिस्ट्रेशन <img alt="drop right home" src="{{ url('images/droprighthome.png')}}"/> </span>
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
                            @if(isset($mc) && $mc == 2)
                                <div id='div-gpt-ad-1542018830077-0' style='height:90px; width:728px;margin: 0 auto;'></div>
                            @elseif(isset($mc) && !empty($mc) && empty($sc) && empty($ssc[0]) && $mc == 3)
                                <div id='div-gpt-ad-1568723407638-0' style='height:90px; width:728px;margin: 0 auto;'></div>
                            @elseif(isset($mc) && !empty($mc) && !empty($sc) && empty($ssc[0]) && $mc == 3)
                                <div id='div-gpt-ad-1573815617456-0' style='height:90px; width:728px;margin: 0 auto;'></div>
                            @elseif(isset($mc) && !empty($mc) && !empty($sc) && empty($ssc[0]) && $sc == 21)
                                <div id='div-gpt-ad-1555584209385-0' style='height:90px; width:728px;margin: 0 auto;'></div>
                            @elseif(isset($mc) && !empty($mc) && !empty($sc) && empty($ssc[0]) && $sc == 423)
                                <div id='div-gpt-ad-1555484449148-0' style='height:90px; width:728px;margin: 0 auto;'></div>
                            @elseif(isset($mc) && !empty($mc) && empty($sc) && empty($ssc[0]) && $mc == 1)
                                <div id='div-gpt-ad-1548423273179-0' style='height:90px; width:728px;margin: 0 auto;'></div>
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
                    <div class="upcomhead"> <a href="https://www.franchiseindia.com/event" target="_blank" style="color:#333">आने वाले कार्यक्रम</a></div>
                    <div id="slideshow">
                        @php
                            $events = App\Http\Controllers\CommonController::getEvents();
                        @endphp
                        @foreach($events['event'] as $event)
                            <div class="eventc">
                                <a href="{{ $event['url'] }}" target="_blank"><div class="eventvenuedate">{{ $event['name'] }}  <span>{{ $event['date'] }}, {{ $event['place'] }}</span></div></a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        <!-- register  ads end here -->
    </div>
</div>

<script>
    $("#slideshow > div.eventc:gt(0)").hide(100);

    setInterval(function() {
        $('#slideshow > div.eventc:first')
            .fadeOut(2000)
            .next()
            .fadeIn(2000)
            .end()
            .appendTo('#slideshow');
    }, 5000);
</script>
