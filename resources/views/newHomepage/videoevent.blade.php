<section class="video-event">
    <div class="container">
        <div class="padset">
            <div class="setfl">
                <div class="section-ptb">
                    <h2>{{ Request::segment(1) == 'hi' ? 'ट्रेंडिंग वीडियो' : 'Trending Videos' }}</h2>
                </div>
                <!-- slider start  -->
                <div id="myCarouselvideo" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarouselvideo" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarouselvideo" data-slide-to="1"></li>
                        <li data-target="#myCarouselvideo" data-slide-to="2"></li>
                        {{-- <li data-target="#myCarouselvideo" data-slide-to="3"></li>  --}}
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
                            // @dd($videos1);
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
                                            {{ Request::segment(1) == 'hi' ? 'विचारों' : 'Views' }}
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
                                                {{ Request::segment(1) == 'hi' ? 'विचारों' : 'Views' }}
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
                    <h2>{{ Request::segment(1) == 'hi' ? 'आने वाले कार्यक्रम' : 'Upcoming Events' }}</h2>
                </div>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @forelse ($events as $event)
                            <div class="swiper-slide">
                                <div class="eshowblk">
                                    <div class="eshowimg">
                                        <a href="{{ $event['url'] }}" target="_blank">
                                            <img alt="{{ $event['title'] }}" src="{{ $event['image'] }}">
                                        </a>
                                    </div>
                                    <div class="eshowcontent">
                                        <h2>{{ $event['title'] }}</h2>
                                        <div class="eshowtxt">
                                            {{ $event['date'] }}, {{ $event['venue'] }}
                                        </div>
                                        <div class="link-section  text-capitalize">
                                            <a href="{{ $event['url'] }}" target="_blank">Registration</a>
                                        </div>
                                        <div class="eventhotline  text-capitalize">
                                            Hotline: <span>{{ $event['contact'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                        {{-- <div class="swiper-slide">
                            <div class="eshowblk">
                                <div class="eshowimg">
                                    <a href="https://www.franchiseindia.net/punjab/fro/" target="_blank">
                                        <img alt="FROEXPO Chandigarh"
                                            src="https://www.franchiseindia.com/images/fro-chandigarh.webp">
                                    </a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>FROEXPO Chandigarh</h2>
                                    <div class="eshowtxt">
                                        13-14 December 2025, Hotel TAJ, Chandigarh
                                    </div>
                                    <div class="link-section  text-capitalize">
                                        <a href="https://www.franchiseindia.net/punjab/fro/"
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
                                    <a href="https://www.franchiseindia.net/madhya-pradesh/franchise-expo/"
                                        target="_blank">
                                        <img alt="Franchise Expo Indore"
                                            src="https://www.franchiseindia.com/images/franchise-show-indore.webp">
                                    </a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>Franchise Expo Indore</h2>
                                    <div class="eshowtxt">
                                        21 December 2025, Sheraton Grand Palace, Indore
                                    </div>
                                    <div class="link-section  text-capitalize">
                                        <a href="https://www.franchiseindia.net/madhya-pradesh/franchise-expo/"
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
                                    <a href="https://www.franchiseindia.net/maharashtra/fro/" target="_blank">
                                        <img alt="FROEXPO Pune"
                                            src="https://www.franchiseindia.com/images/franchise-show-pune.webp">
                                    </a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>FROEXPO Pune </h2>
                                    <div class="eshowtxt">
                                        17-18 January 2026, Messe Global Laxmi Lawns, Pune
                                    </div>
                                    <div class="link-section  text-capitalize">
                                        <a href="https://www.franchiseindia.net/maharashtra/fro/"
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
                                    <a href="https://www.restaurantindia.in/awards/hyderabad/" target="_blank">
                                        <img alt="Restaurant Awards Hyderabad"
                                            src="https://www.franchiseindia.com/images/restaurant-south.webp">
                                    </a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>Restaurant Awards Hyderabad</h2>
                                    <div class="eshowtxt">
                                        19 January 2026, Hotel Trident, Hyderabad
                                    </div>
                                    <div class="link-section  text-capitalize">
                                        <a href="https://www.restaurantindia.in/awards/hyderabad/"
                                            target="_blank">Registration</a>
                                    </div>
                                    <div class="eventhotline  text-capitalize">
                                        Hotline: <span>+91 8595350505</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="eshowblk">
                                <div class="eshowimg"><a href="https://www.entrepreneurindia.com/influencer/"
                                        target="_blank">
                                        <img alt="Influencer Awards"
                                            src="https://www.franchiseindia.com/images/influencers-award.webp"></a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>Influencer Awards</h2>
                                    <div class="eshowtxt">22 January 2026, Hotel JW Marriott Mumbai Sahar</div>
                                    <div class="link-section  text-capitalize">
                                        <a href="https://www.entrepreneurindia.com/influencer/"
                                            target="_blank">Registration</a>
                                    </div>
                                    <div class="eventhotline text-capitalize">
                                        Hotline: <span>+91 6354604762</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="eshowblk">
                                <div class="eshowimg">
                                    <a href="https://indiaev.org/delhi/" target="_blank">
                                        <img alt="India EV Show"
                                            src="https://www.franchiseindia.com/images/ev-delhi.webp?ver=2">
                                    </a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>India EV Show</h2>
                                    <div class="eshowtxt">
                                        10-11 February 2026, Yashobhoomi, Delhi
                                    </div>
                                    <div class="link-section  text-capitalize">
                                        <a href="https://indiaev.org/delhi/" target="_blank">Registration</a>
                                    </div>
                                    <div class="eventhotline  text-capitalize">
                                        Hotline: <span>+91 7011417457</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="eshowblk">
                                <div class="eshowimg">
                                    <a href="https://www.franchiseindia.net/rajasthan/fro/" target="_blank">
                                        <img alt="Fro"
                                            src="https://www.franchiseindia.com/images/franchise-show-jaipur.webp">
                                    </a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>FROEXPO Jaipur </h2>
                                    <div class="eshowtxt">
                                        21-22 February 2026, RIC, Jaipur
                                    </div>
                                    <div class="link-section  text-capitalize">
                                        <a href="https://www.franchiseindia.net/rajasthan/fro/"
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
                                    <a href="https://www.franchiseindia.net/telangana/fro/" target="_blank">
                                        <img alt="Fro"
                                            src="https://www.franchiseindia.com/images/franchise-show-hyd.webp">
                                    </a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>FROEXPO Hyderabad </h2>
                                    <div class="eshowtxt">
                                        14-15 March 2026, HITEX Exhibition Centre, Hyderabad
                                    </div>
                                    <div class="link-section  text-capitalize">
                                        <a href="https://www.franchiseindia.net/telangana/fro/"
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
                                    <a href="https://www.franchiseindia.com/expo/" target="_blank">
                                        <img alt="Franchise India 2026 Delhi"
                                            src="https://www.franchiseindia.com/images/franchise-india-show.webp">
                                    </a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>Franchise India 2026 Delhi</h2>
                                    <div class="eshowtxt">
                                        16-17 May 2026, Yashobhoomi, Delhi
                                    </div>
                                    <div class="link-section  text-capitalize">
                                        <a href="https://www.franchiseindia.com/expo/"
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
                                    <a href="https://www.indiaev.org/chennai/" target="_blank">
                                        <img alt="India EV Show Chennai"
                                            src="https://www.franchiseindia.com/images/ev-show.webp">
                                    </a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>India EV Show Chennai</h2>
                                    <div class="eshowtxt">
                                        27-28 June 2026, Chennai Trade Centre, Chennai
                                    </div>
                                    <div class="link-section text-capitalize">
                                        <a href="https://www.indiaev.org/chennai/" target="_blank">Registration</a>
                                    </div>
                                    <div class="eventhotline  text-capitalize">
                                        Hotline: <span>+91 7011417457</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="eshowblk">
                                <div class="eshowimg">
                                    <a href="https://www.franchiseindia.net/karnataka/frex/" target="_blank">
                                        <img alt="frex"
                                            src="https://www.franchiseindia.com/images/frex-2026.webp">
                                    </a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>FREX Bengaluru</h2>
                                    <div class="eshowtxt">
                                        22-23 August 2026, BIEC, Bengaluru
                                    </div>
                                    <div class="link-section text-capitalize">
                                        <a href="https://www.franchiseindia.net/karnataka/frex/"
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
                                    <a href="https://www.restaurantindia.in/coffee-tea-asia/" target="_blank">
                                        <img alt="Coffee & Tea Asia 2026"
                                            src="https://www.franchiseindia.com/images/coffee.webp">
                                    </a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>Coffee & Tea Asia 2026</h2>
                                    <div class="eshowtxt">
                                        22-23 August 2026, BIEC, Bengaluru
                                    </div>
                                    <div class="link-section text-capitalize">
                                        <a href="https://www.restaurantindia.in/coffee-tea-asia/"
                                            target="_blank">Registration</a>
                                    </div>
                                    <div class="eventhotline  text-capitalize">
                                        Hotline: <span>+91 8595350505</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>




            </div>
            <!-- envent end here -->
        </div>
    </div>
</section>
