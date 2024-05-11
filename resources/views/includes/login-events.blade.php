@if(Request::segment(1)!='investor' && Request::segment(2)!='create' && Request::segment(1)!='event')
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
                                    Register<span>Free <img alt="drop right home" src="{{ url('images/droprighthome.png')}}"/></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('investor/create') }}">
                                <div class="regtxt">
                                    <span>Start</span> A<br /> Business<br /> <span>Today!</span>
                                </div>
                                <div class="regtxtbtm">
                                    Register<span>Free <img alt="drop right home" src="{{ url('images/droprighthome.png')}}"/> </span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="regblkright">
                <div class="hometopadsleft">
                    <div class="adshom newbandfp">
                        {{-- @desktop --}}
                        @if ($agent->isDesktop())
                        <div class="homeadd728">
                           
							@if(isset($mc) && $mc == 2)
							
							@else	
                            @include('includes.banners-new.HP_DSK_ATF_728x90')
							@endif
                        </div>
                        {{-- @enddesktop --}}
                        {{-- @tablet --}}
                        @elseif ($agent->isTablet())

                        <div class="homeadd468">
                            @include('includes.banners-new.HP_TB_ATF_468x60')
                        </div>
                        @endif
                        {{-- @endtablet --}}
                    </div>
                </div>
                <div class="hometopadsright">
                    <div class="upcomhead"> <a href="https://www.franchiseindia.com/event" target="_blank" style="color:#333">Upcoming Events</a></div>
                    <div id="slideshow">
                        @php
                            $events = App\Http\Controllers\CommonController::getEvents();
                        @endphp
                        @foreach($events['event'] as $event)
                            <div class="eventc">
                                <a href="{{ $event['url'] }}" target="_blank"><div class="eventvenuedate">{{ $event['name'] }} <span>{{ $event['date'] }}, {{ $event['place'] }}</span></div></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>$("#slideshow > div.eventc:gt(0)").hide(100);setInterval(function(){$("#slideshow > div.eventc:first").fadeOut(2000).next().fadeIn(2000).end().appendTo("#slideshow")},5000);</script>
@endif