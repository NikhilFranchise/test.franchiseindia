@php
    $videos1 = [
        0 => [
            'url' => 'https://www.youtube.com/watch?v=NjtzKJquQhI',
            'imageurl' => 'https://i.ytimg.com/vi/NjtzKJquQhI/mqdefault.jpg',
            'title' =>
                'Three Things to Look before Investing in an Early Stage Startup | Gaurav Marya | Franchise India',
            'description' =>
                'Franchise Guru Mr. Gaurav Marya speaks on What Points you should look before investing in an Early Stage Startup.',
            'views' => '79',
            'date' => 'Sep 25, 2023',
        ],
        1 => [
            'url' => 'https://www.youtube.com/watch?v=_vmOB4KkfpE',
            'imageurl' => url('https://i.ytimg.com/vi/_vmOB4KkfpE/mqdefault.jpg'),
            'title' => 'Explore Scalable & Most Promising Business Opportunities at Nepal Franchise Show',
            'description' => 'Are you a budding entrepreneur, business maverick',
            'views' => '18',
            'date' => 'Mar 7, 2024',
        ],
        2 => [
            'url' => 'https://www.youtube.com/watch?v=EM-EyIobJ4I',
            'imageurl' => 'https://i.ytimg.com/vi/EM-EyIobJ4I/mqdefault.jpg',
            'title' => 'Triple M Strategy of Franchising | Measurable, Marketable & Manageable | Gaurav Marya',
            'description' => 'Franchise Guru Mr. Gaurav Marya speaks on Triple M Strategy of Franchising.',
            'views' => '14920',
            'date' => 'April 17, 2023',
        ],
        3 => [
            'url' => 'https://www.youtube.com/watch?v=1L-kk5WfeF8',
            'imageurl' => 'https://i.ytimg.com/vi/1L-kk5WfeF8/mqdefault.jpg',
            'title' => 'PICASSO Theory of Franchising | Gaurav Marya | Franchise India',
            'description' => 'Franchise Guru Mr. Gaurav Marya reveals Picasso Theory of Franchising.',
            'views' => '433',
            'date' => 'Apr 20, 2023',
        ],
        4 => [
            'url' => 'https://www.youtube.com/watch?v=AKpczDcXnfg',
            'imageurl' => 'https://i.ytimg.com/vi/AKpczDcXnfg/mqdefault.jpg',
            'title' => 'Five Most Common Mistakes Brands Do in Franchising ? Gaurav Marya | Franchise India',
            'description' =>
                'Franchise Guru Mr. Gaurav Marya speaks on Five Most Common Mistakes Brands Do in Franchising.',
            'views' => '373',
            'date' => 'Apr 15, 2023',
        ],
        5 => [
            'url' => 'https://www.youtube.com/watch?v=I_hUIabtp7o',
            'imageurl' => 'https://i.ytimg.com/vi/I_hUIabtp7o/mqdefault.jpg',
            'title' => 'Make your Brand Ready for Franchising | Gaurav Marya | Franchise India',
            'description' => 'Franchise Guru Mr. Gaurav Marya speaks on How to make your Brand Ready for Franchising.',
            'views' => '341',
            'date' => 'Apr 11, 2023',
        ],
        6 => [
            'url' => 'https://www.youtube.com/watch?v=3iDvaGjpHq0',
            'imageurl' => 'https://i.ytimg.com/vi/3iDvaGjpHq0/mqdefault.jpg',
            'title' => '10 Points to Research on Brand Before Buying Franchise | Gaurav Marya | Franchise India',
            'description' =>
                'Franchise Guru Mr. Gaurav Marya speaks on 10 Points to Research on Brand before Buying Franchise.',
            'views' => '715',
            'date' => 'Apr 25, 2023',
        ],
    ];
@endphp
<section class="video-event">
    <div class="container">
        <div class="padset">
            <div class="setfl">
                <div class="section-ptb">
                    <h2>Trending Videos</h2>
                </div>
                <!-- slider start  -->
                <div id="myCarouselvideo" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarouselvideo" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarouselvideo" data-slide-to="1"></li>
                        <li data-target="#myCarouselvideo" data-slide-to="2"></li>
                        <li data-target="#myCarouselvideo" data-slide-to="3"></li>
                    </ol>

                    <div class="carousel-inner">
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
                                            {{ $videos1[$firstVideoIndex]['description'] }}
                                        </div>
                                        <div class="showview">{{ $videos1[$firstVideoIndex]['views'] }}
                                            {{ Request::segment(1) == 'hi' ? 'विचारों' : 'Views' }}
                                            <span>{{ $videos1[$firstVideoIndex]['date'] }}</span>
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
                                                {{ $videos1[$secondVideoIndex]['description'] }}
                                            </div>
                                            <div class="showview">{{ $videos1[$secondVideoIndex]['views'] }}
                                                {{ Request::segment(1) == 'hi' ? 'विचारों' : 'Views' }}
                                                <span>{{ $videos1[$secondVideoIndex]['date'] }}</span>
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
                    <h2>Upcoming Events</h2>
                </div>
                <!--  -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="eshowblk">
                                <div class="eshowimg">
                                    <a href="https://www.franchiseindia.com/fro/hyderabad/" target="_blank">
                                        <img class="" alt="FROEXPO Hyderabad"
                                            src="https://www.franchiseindia.com/images/fro-expo-hyderabad.jpg?id=6"></a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>FROEXPO Hyderabad</h2>
                                    <div class="eshowtxt">
                                        16-17 March 2024, Hitex Exhibition Centre, Hyderabad
                                    </div>
                                    <div class="link-section  text-capitalize">
                                        <a href="https://www.franchiseindia.com/fro/hyderabad/"
                                            target="_blank">Registration</a>
                                    </div>
                                    <div class="eventhotline  text-capitalize">
                                        Hotline: <span>+91 9311254088</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="swiper-slide">
                            <div class="eshowblk">
                                <div class="eshowimg">
                                    <a href="https://restaurantindia.in/awards/mumbai/" target="_blank">
                                        <img class="" alt="Restaurant Awards 2024 Mumbai"
                                            src="https://www.franchiseindia.com/images/restaurant-mumbai-awards.jpg"></a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>Restaurant Awards 2024 Mumbai</h2>
                                    <div class="eshowtxt">
                                        19 March 2024, Hotel Trident, Mumbai
                                    </div>
                                    <div class="link-section  text-capitalize">
                                        <a href="https://restaurantindia.in/awards/mumbai/"
                                            target="_blank">Registration</a>
                                    </div>
                                    <div class="eventhotline  text-capitalize">
                                        Hotline: <span>+91 9654964838</span>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="swiper-slide">
                            <div class="eshowblk">
                                <div class="eshowimg">
                                    <a href="https://www.franglobal.com/nepal-franchise-distribution-show/"
                                        target="_blank">
                                        <img class="" alt="Nepal Franchise & Distribution Show 2024"
                                            src="https://www.franchiseindia.com/images/nepal-franchise-distribution.jpg?id=5"></a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>Nepal Franchise & Distribution Show 2024</h2>
                                    <div class="eshowtxt">
                                        27 April 2024, Kathmandu Marriott Hotel
                                    </div>
                                    <div class="link-section  text-capitalize">
                                        <a href="https://www.franglobal.com/nepal-franchise-distribution-show/"
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
                                        <img class="" alt="Franchise India 2024 Delhi "
                                            src="https://www.franchiseindia.com/images/franchise-india-delhi.jpg?id=2"></a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>Franchise India 2024 Delhi</h2>
                                    <div class="eshowtxt">
                                        18-19 May 2024, (IICC) , Delhi, India
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
                                    <a href="https://www.franchiseindia.com/fro/chennai/" target="_blank">
                                        <img class="" alt="FROEXPO Chennai"
                                            src="https://www.franchiseindia.com/images/fro-expo-chennai.jpg?id=2"></a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>FROEXPO Chennai</h2>
                                    <div class="eshowtxt">
                                        29-30 June 2024, Hall No. 2, Chennai Trade Centre
                                    </div>
                                    <div class="link-section  text-capitalize">
                                        <a href="https://www.franchiseindia.com/fro/chennai/"
                                            target="_blank">Registration</a>
                                    </div>
                                    <div class="eventhotline  text-capitalize">
                                        Hotline: <span>+91 9667696302</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="eshowblk">
                                <div class="eshowimg">
                                    <a href="https://www.indiaev.org/" target="_blank">
                                        <img class="" alt="India EV Show"
                                            src="https://www.franchiseindia.com/images/indiaevshow.jpg"></a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>India EV Show</h2>
                                    <div class="eshowtxt">
                                        29-30 June 2024, Hall No. 3, Chennai Trade Centre
                                    </div>
                                    <div class="link-section  text-capitalize">
                                        <a href="https://www.indiaev.org/" target="_blank">Registration</a>
                                    </div>
                                    <div class="eventhotline  text-capitalize">
                                        Hotline: <span>+91 9312199219</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="swiper-slide">
                            <div class="eshowblk">
                                <div class="eshowimg">
                                    <a href="https://www.franchiseindia.com/expo/mumbai/" target="_blank">
                                        <img class="" alt="Franchise India 2024 Mumbai"
                                            src="https://www.franchiseindia.com/images/franchise-india-mumbai.jpg"></a>
                                </div>
                                <div class="eshowcontent">
                                    <h2>Franchise India 2024 Mumbai</h2>
                                    <div class="eshowtxt">
                                        30 Nov - 1 Dec 2024, Jio World Convention Centre
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






                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <!-- envent end here -->
        </div>
    </div>
</section>
