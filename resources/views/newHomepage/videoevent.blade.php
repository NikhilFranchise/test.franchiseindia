<section class="video-event">
    <div class="container">
        <div class="padset">
            <div class="setfl">
                <div class="section-ptb">
                    <h2>{{ Request::segment(2) == 'hi' ? 'ट्रेंडिंग वीडियो' : 'Trending Videos' }}</h2>
                </div>
                <!-- slider start  -->
                <div id="myCarouselvideo" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarouselvideo" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarouselvideo" data-slide-to="1"></li>
                        <li data-target="#myCarouselvideo" data-slide-to="2"></li>
                        {{--  <li data-target="#myCarouselvideo" data-slide-to="3"></li>  --}}
                    </ol>

                    <div class="carousel-inner">
                        @php
                            $videos1 = $videos;
                            $videos1 = array_filter($videos, function ($video) {
                                return is_array($video) && isset($video['priority']);
                            });

                            usort($videos1, function ($a, $b) {
                                return $a['priority'] <=> $b['priority'];
                            });
                            //   @dd($videos1);
                        @endphp
                        @for ($i = 0; $i < count($videos1); $i += 2)
                            <div class="item @if ($i == 0) active @endif">
                                @php
                                    $firstVideoIndex = $i;
                                    $secondVideoIndex = ($i + 1) % count($videos1);
                                @endphp

                                <div class="vidblk">
                                    <div class="vidimg">
                                        <div class="overleybg">
                                            <div class="vi">
                                                <div class="viiner">
                                                    <a href="{{ $videos1[$firstVideoIndex]['url'] }}" target="_blank">
                                                        <img src="{{ url('newhomepage/assets/img/youtube.svg') }}"
                                                            alt="video-icon">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <img class="lazyloaded" title="" alt="entrepreneur"
                                            src="{{ $videos1[$firstVideoIndex]['imageurl'] }}" loading="lazy">
                                    </div>
                                    <div class="videcontent">
                                        <h2><a href="{{ $videos1[$firstVideoIndex]['url'] }}"
                                                target="_blank">{{ $videos1[$firstVideoIndex]['title'] }}</a></h2>
                                        <div class="videtxt">
                                            {{-- {{ $videos1[$firstVideoIndex]['description'] }} --}}
                                            {{ strip_tags(Str::limit($videos1[$firstVideoIndex]['description'], 200, '...')) }}

                                        </div>
                                        <div class="showview">{{ $videos1[$firstVideoIndex]['views'] }}
                                            {{ Request::segment(2) == 'hi' ? 'विचारों' : 'Views' }}
                                            <span>{{ date('d-M-Y', strtotime($videos1[$firstVideoIndex]['date'])) }}</span>
                                        </div>
                                    </div>
                                </div>

                                @if ($i + 1 < count($videos1))
                                    <div class="vidblk">
                                        <div class="vidimg">
                                            <div class="overleybg">
                                                <div class="vi">
                                                    <div class="viiner">
                                                        <a href="{{ $videos1[$secondVideoIndex]['url'] }}"
                                                            target="_blank">
                                                            <img src="{{ url('newhomepage/assets/img/youtube.svg') }}"
                                                                alt="video-icon">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="lazyloaded" title="" alt="entrepreneur"
                                                src="{{ $videos1[$secondVideoIndex]['imageurl'] }}" loading="lazy">
                                        </div>
                                        <div class="videcontent">
                                            <h2><a href="{{ $videos1[$secondVideoIndex]['url'] }}"
                                                    target="_blank">{{ $videos1[$secondVideoIndex]['title'] }}</a></h2>
                                            <div class="videtxt">
                                                {{-- {{ $videos1[$secondVideoIndex]['description'] }} --}}
                                                {{ strip_tags(Str::limit($videos1[$secondVideoIndex]['description'], 200, '...')) }}

                                            </div>
                                            <div class="showview">{{ $videos1[$secondVideoIndex]['views'] }}
                                                {{ Request::segment(2) == 'hi' ? 'विचारों' : 'Views' }}
                                                <span>{{ date('d-M-Y', strtotime($videos1[$secondVideoIndex]['date'])) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>
                <!-- slider end  -->
            </div>
            <!-- video slider end here  -->

            <!-- event start here  -->
            <div class="eventblk">
                <div class="section-ptb">
                    <h2>{{ Request::segment(2) == 'hi' ? 'आने वाले कार्यक्रम' : 'Upcoming Events' }}</h2>
                </div>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="eshowblk">
                                <div class="eshowimg">
                                    <a href="https://www.franchiseindia.net/fro-bos/visakhapatnam/" target="_blank">
                                        <img class="" alt="Franchise Expo Vishakhapatnam"
                                            src="https://www.franchiseindia.com/images/franchise-expo-vishakhapatnam.webp"></a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>Franchise Expo Vishakhapatnam</h2>
                                    <div class="eshowtxt">
                                        19 October 2024, Hotel Green Park, Visakhapatnam
                                    </div>
                                    <div class="link-section  text-capitalize">
                                        <a href="https://www.franchiseindia.net/fro-bos/visakhapatnam/"
                                            target="_blank">Registration</a>
                                    </div>
                                    <div class="eventhotline text-capitalize">
                                        Hotline: <span>+91 8800638077</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="eshowblk">
                                <div class="eshowimg">
                                    <a href="https://www.franchiseindia.com/expo/mumbai/" target="_blank">
                                        <img class="" alt="Franchise India 2024 Mumbai"
                                            src="https://www.franchiseindia.com/images/franchise-india.webp"></a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>Franchise India 2024 Mumbai</h2>
                                    <div class="eshowtxt">
                                        29-30 November 2024, Jio World Convention Centre
                                    </div>
                                    <div class="link-section  text-capitalize">
                                        <a href="https://www.franchiseindia.com/expo/mumbai/"
                                            target="_blank">Registration</a>
                                    </div>
                                    <div class="eventhotline  text-capitalize">
                                        Hotline: <span>+91 9311148342</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="eshowblk">
                                <div class="eshowimg">
                                    <a href="https://www.irec.asia/mumbai/" target="_blank">
                                        <img class="" alt="IReC 2024"
                                            src="https://www.franchiseindia.com/images/irec.webp"></a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>IReC 2024</h2>
                                    <div class="eshowtxt">
                                        29-30 November 2024, Jio World Convention Centre
                                    </div>
                                    <div class="link-section  text-capitalize">
                                        <a href="https://www.irec.asia/mumbai/" target="_blank">Registration</a>
                                    </div>
                                    <div class="eventhotline  text-capitalize">
                                        Hotline: <span>+91 9310438783</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="eshowblk">
                                <div class="eshowimg">
                                    <a href="#" onclick="return false;">
                                        <img class="" alt="Saudi Franchise Expo"
                                            src="https://www.franchiseindia.com/images/sfe.webp">
                                    </a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>Saudi Franchise Expo</h2>
                                    <div class="eshowtxt">
                                        27-29 January 2025, RIEC, Saudi Arabia
                                    </div>
                                    <div class="link-section  text-capitalize">
                                        <a href="#" onclick="return false;">Registration</a>
                                    </div>
                                    <div class="eventhotline  text-capitalize">
                                        Hotline: <span>+91 9717683838</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <!-- envent end here -->
        </div>
    </div>
</section>
