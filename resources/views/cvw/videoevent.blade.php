<section class="video-event video-event-mobile">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="event-mobile">
                    <div class="section-ptb">
                        <h2>Upcoming Events</h2>
                    </div>
                    <ul>
                        <li>
                            <div class="eshowblk">
                                <div class="eshowimg"><a href="https://www.franchiseindia.net/fro/ahmedabad/" target="_blank">
                                <img loading="lazy" alt="FROEXPO Gujarat" src="{{url('cvw/event-videos/fro-gujarat.webp')}}" width="345" height="208"></a></div>
                                <div class="eshowcontent">
                                    <h2>FROEXPO Ahmedabad</h2>
                                    <div class="eshowtxt">21-22 September 2024, Mahatma Mandir Convention...</div>
                                    <div class="link-section text-capitalize"><a href="https://www.franchiseindia.net/fro/ahmedabad/" target="_blank">Registration</a></div>
                                    <div class="eventhotline text-capitalize">Hotline:<span>+91 9311254088</span></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="eshowblk">
                                <div class="eshowimg"><a href="https://www.restaurantindia.in/congress/" target="_blank">
                                    <img loading="lazy" alt="Indian Restaurant Congress & Awards 2024" 
                                    src="{{url('cvw/event-videos/restaurant.webp')}}" width="345" height="208"></a></div>
                                <div class="eshowcontent">
                                    <h2>Indian Restaurant Congress & Awards 2024</h2>
                                    <div class="eshowtxt">8-9 October 2024, YASHOBHOOMI, (IICC), New Delhi</div>
                                    <div class="link-section text-capitalize"><a href="https://www.restaurantindia.in/congress/" target="_blank">Registration</a></div>
                                    <div class="eventhotline text-capitalize">Hotline:<span>+91 966769838</span></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="eshowblk">
                                <div class="eshowimg"><a href="https://www.franglobal.com/oman-franchise-distribution-show/" target="_blank">
                                    <img loading="lazy" alt="Oman Franchise Show" src="{{url('cvw/event-videos/fro-gujarat.webp')}}" width="345" height="208"></a></div>
                                <div class="eshowcontent">
                                    <h2>Oman Franchise Show</h2>
                                    <div class="eshowtxt">13 October 2024, Sheraton Oman Hotel</div>
                                    <div class="link-section text-capitalize"><a href="https://www.franglobal.com/oman-franchise-distribution-show/" target="_blank">Registration</a></div>
                                    <div class="eventhotline text-capitalize">Hotline:<span>+91 9717683838</span></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="eshowblk">
                                <div class="eshowimg"><a href="https://www.franchiseindia.com/expo/mumbai/" target="_blank">
                                    <img loading="lazy" alt="Franchise India 2024 Mumbai" src="{{url('cvw/event-videos/franchise-india.webp')}}" width="345" height="208"></a></div>
                                <div class="eshowcontent">
                                    <h2>Franchise India 2024 Mumbai</h2>
                                    <div class="eshowtxt">29-30 November 2024, Jio World Convention Centre</div>
                                    <div class="link-section text-capitalize"><a href="https://www.franchiseindia.com/expo/mumbai/" target="_blank">Registration</a></div>
                                    <div class="eventhotline text-capitalize">Hotline:<span>+91 9311148342</span></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="eshowblk">
                                <div class="eshowimg"><a href="https://www.irec.asia/mumbai/" target="_blank">
                                    <img loading="lazy" alt="IReC 2024" src="{{url('cvw/event-videos/irec.webp')}}" width="345" height="208"></a></div>
                                <div class="eshowcontent">
                                    <h2>IReC 2024</h2>
                                    <div class="eshowtxt">29-30 November 2024, Jio World Convention Centre</div>
                                    <div class="link-section text-capitalize"><a href="https://www.irec.asia/mumbai/" target="_blank">Registration</a></div>
                                    <div class="eventhotline text-capitalize">Hotline:<span>+91 9310438783</span></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="trend-video-mobile">
                    <div class="section-ptb">
                        <h2>Trending Videos</h2>
                    </div>
                    <ul>
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
                         @foreach ($videos1 as $video)
                        <li>
                            {{-- <div class="vidblk">
                                <div class="vidimg">
                                    <div class="overleybg">
                                        <div class="vi">
                                            <div class="viiner"><a href="https://www.youtube.com/watch?v=vGfVj_kF0oY" target="_blank">
                                            <img loading="lazy" src="https://www.franchiseindia.com/newhomepage/assets/img/youtube.svg" alt="video-icon" width="40" height="40"></a></div>
                                        </div>
                                    </div><img class="lazyloaded" title="" alt="entrepreneur" src="{{url('cvw/images/event-videos/three.webp')}}" loading="lazy" width="355" height="198"></div>
                                <div class="videcontent">
                                    <h2><a href="https://www.youtube.com/watch?v=vGfVj_kF0oY" target="_blank">3 kinds of ROI that any business can get! | Gaurav Marya | Franchise India</a></h2>
                                    <div class="videtxt">Gaurav Marya emphasizes the significance of Return on Investment (ROI), Return on Involvement (ROI)</div>
                                    <div class="showview">26 Views<span>May 3, 2024</span></div>
                                </div>
                            </div> --}}
                            <div class="vidblk">
                                <div class="vidimg">
                                    <div class="overleybg">
                                        <div class="vi">
                                            <div class="viiner">
                                                <a href="{{ $video['url'] }}" target="_blank">
                                                    <img loading="lazy" src="{{ url('newhomepage/assets/img/youtube.svg') }}" alt="video-icon" width="40" height="40">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <img class="lazyloaded" title="" alt="entrepreneur" src="{{ $video['imageurl'] }}" loading="lazy" width="355" height="198">
                                </div>
                                <div class="videcontent">
                                    <h2><a href="{{ $video['url'] }}" target="_blank">{{ $video['title'] }}</a></h2>
                                    <div class="videtxt">
                                        {{ strip_tags(Str::limit($video['description'], 80, '...')) }}
                                    </div>
                                    <div class="showview">
                                        {{ $video['views'] }} {{ Request::segment(1) == 'hi' ? 'विचारों' : 'Views' }}
                                        <span>{{ $video['date'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="video-event video-event-desktop">
    <div class="container">
        <div class="padset">
            <div class="setfl">
                <div class="section-ptb">
                    <h2>Trending Videos</h2>
                </div>
                <div id="myCarouselvideo" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarouselvideo" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarouselvideo" data-slide-to="1"></li>
                        <li data-target="#myCarouselvideo" data-slide-to="2"></li>
                        <li data-target="#myCarouselvideo" data-slide-to="3"></li>
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
                                            src="{{ $videos1[$firstVideoIndex]['imageurl'] }}" loading="lazy" width="355" height="198">
                                    </div>
                                    <div class="videcontent">
                                        <h2><a href="{{ $videos1[$firstVideoIndex]['url'] }}"
                                                target="_blank">{{ $videos1[$firstVideoIndex]['title'] }}</a></h2>
                                        <div class="videtxt">
                                            {{-- {{ $videos1[$firstVideoIndex]['description'] }} --}}
                                            {{-- {{ $videos1[$firstVideoIndex]['description'] }} --}}
                                            {{strip_tags(Str::limit($videos1[$firstVideoIndex]['description'], 200,'...')) }}

                                        </div>
                                        <div class="showview">{{ $videos1[$firstVideoIndex]['views'] }}
                                            {{ Request::segment(1) == 'hi' ? 'विचारों' : 'Views' }}
                                            <span>{{ $videos1[$firstVideoIndex]['date'] }}</span></div>
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
                                                src="{{ $videos1[$secondVideoIndex]['imageurl'] }}" loading="lazy" width="355" height="198">
                                        </div>
                                        <div class="videcontent">
                                            <h2><a href="{{ $videos1[$secondVideoIndex]['url'] }}"
                                                    target="_blank">{{ $videos1[$secondVideoIndex]['title'] }}</a></h2>
                                            <div class="videtxt">
                                                {{-- {{ $videos1[$secondVideoIndex]['description'] }} --}}
                                                {{strip_tags(Str::limit($videos1[$secondVideoIndex]['description'], 200,'...')) }}

                                            </div>
                                            <div class="showview">{{ $videos1[$secondVideoIndex]['views'] }}
                                                {{ Request::segment(1) == 'hi' ? 'विचारों' : 'Views' }}
                                                <span>{{ $videos1[$secondVideoIndex]['date'] }}</span></div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="eventblk">
                <div class="section-ptb">
                    <h2>Upcoming Events</h2>
                </div>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="eshowblk">
                                <div class="eshowimg"><a href="https://www.irec.asia/mumbai/" target="_blank">
                                    <img loading="lazy" class="" alt="IReC 2024" src="https://www.franchiseindia.com/images/irec.webp" width="345" height="208"></a></div>
                                <div class="eshowcontent">
                                    <h2>IReC 2024</h2>
                                    <div class="eshowtxt">29-30 November 2024, Jio World Convention Centre</div>
                                    <div class="link-section text-capitalize"><a href="https://www.irec.asia/mumbai/" target="_blank">Registration</a></div>
                                    <div class="eventhotline text-capitalize">Hotline:<span>+91 9310438783</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-slide-index="0" style="width:367px;margin-right:30px">
                            <div class="eshowblk">
                                <div class="eshowimg"><a href="https://www.franchiseindia.net/fro/bengaluru/" target="_blank">
                                    <img loading="lazy" class="" alt="FROEXPO Bengaluru" src="https://www.franchiseindia.com/images/fro-bengaluru.webp" width="345" height="208"></a></div>
                                <div
                                    class="eshowcontent">
                                    <h2>FROEXPO Bengaluru</h2>
                                    <div class="eshowtxt">31 Aug - 1 Sep 2024, BIEC, Bengaluru, Karnataka</div>
                                    <div class="link-section text-capitalize"><a href="https://www.franchiseindia.net/fro/bengaluru/" target="_blank">Registration</a></div>
                                    <div class="eventhotline text-capitalize">Hotline:<span>+91 9311254088</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" data-swiper-slide-index="1" style="width:367px;margin-right:30px">
                        <div class="eshowblk">
                            <div class="eshowimg"><a href="https://www.entrepreneurindia.com/" target="_blank">
                                <img loading="lazy" class="" alt="Entrepreneur 2024" src="https://www.franchiseindia.com/images/entrepreneur.webp" width="345" height="208"></a></div>
                            <div class="eshowcontent">
                                <h2>Entrepreneur 2024</h2>
                                <div class="eshowtxt">4 September 2024, Bharat Mandapam, Delhi</div>
                                <div class="link-section text-capitalize"><a href="https://www.entrepreneurindia.com/" target="_blank">Registration</a></div>
                                <div class="eventhotline text-capitalize">Hotline:<span>+91 7290037182</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="2" style="width:367px;margin-right:30px">
                        <div class="eshowblk">
                            <div class="eshowimg"><a href="https://www.franchiseindia.net/fro/ahmedabad/" target="_blank">
                                <img loading="lazy" class="" alt="FROEXPO Gujarat" src="https://www.franchiseindia.com/images/fro-gujarat.webp" width="345" height="208"></a></div>
                            <div class="eshowcontent">
                                <h2>FROEXPO Ahmedabad</h2>
                                <div class="eshowtxt">21-22 September 2024, Mahatma Mandir Convention...</div>
                                <div class="link-section text-capitalize"><a href="https://www.franchiseindia.net/fro/ahmedabad/" target="_blank">Registration</a></div>
                                <div class="eventhotline text-capitalize">Hotline:<span>+91 9311254088</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="3" style="width:367px;margin-right:30px">
                        <div class="eshowblk">
                            <div class="eshowimg"><a href="https://www.restaurantindia.in/congress/" target="_blank">
                                <img loading="lazy" class="" alt="Indian Restaurant Congress &amp; Awards 2024" src="https://www.franchiseindia.com/images/restaurant.webp" width="345" height="208"></a></div>
                            <div
                                class="eshowcontent">
                                <h2>Indian Restaurant Congress &amp; Awards 2024</h2>
                                <div class="eshowtxt">8-9 October 2024, YASHOBHOOMI, (IICC), New Delhi</div>
                                <div class="link-section text-capitalize"><a href="https://www.restaurantindia.in/congress/" target="_blank">Registration</a></div>
                                <div class="eventhotline text-capitalize">Hotline:<span>+91 9667698380</span></div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="4" style="width:367px;margin-right:30px">
                    <div class="eshowblk">
                        <div class="eshowimg"><a href="https://www.franchiseindia.com/expo/mumbai/" target="_blank">
                            <img class="" loading="lazy" alt="Franchise India 2024 Mumbai" src="https://www.franchiseindia.com/images/franchise-india.webp" width="345" height="208" defer></a></div>
                        <div
                            class="eshowcontent">
                            <h2>Franchise India 2024 Mumbai</h2>
                            <div class="eshowtxt">29-30 November 2024, Jio World Convention Centre</div>
                            <div class="link-section text-capitalize"><a href="https://www.franchiseindia.com/expo/mumbai/" target="_blank">Registration</a></div>
                            <div class="eventhotline text-capitalize">Hotline:<span>+91 9311148342</span></div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide" data-swiper-slide-index="5" style="width:367px;margin-right:30px">
                <div class="eshowblk">
                    <div class="eshowimg"><a href="https://www.irec.asia/mumbai/" target="_blank">
                        <img class="" alt="IReC 2024" loading="lazy" src="https://www.franchiseindia.com/images/irec.webp" width="345" height="208"></a></div>
                    <div class="eshowcontent">
                        <h2>IReC 2024</h2>
                        <div class="eshowtxt">29-30 November 2024, Jio World Convention Centre</div>
                        <div class="link-section text-capitalize"><a href="https://www.irec.asia/mumbai/" target="_blank">Registration</a></div>
                        <div class="eventhotline text-capitalize">Hotline:<span>+91 9310438783</span></div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="0" style="width:367px;margin-right:30px">
                <div class="eshowblk">
                    <div class="eshowimg"><a href="https://www.franchiseindia.net/fro/bengaluru/" target="_blank">
                        <img class="" loading="lazy" alt="FROEXPO Bengaluru" src="https://www.franchiseindia.com/images/fro-bengaluru.webp" width="345" height="208"></a></div>
                    <div class="eshowcontent">
                        <h2>FROEXPO Bengaluru</h2>
                        <div class="eshowtxt">31 Aug - 1 Sep 2024, BIEC, Bengaluru, Karnataka</div>
                        <div class="link-section text-capitalize"><a href="https://www.franchiseindia.net/fro/bengaluru/" target="_blank">Registration</a></div>
                        <div class="eventhotline text-capitalize">Hotline:<span>+91 9311254088</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet"
                tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 4"></span><span class="swiper-pagination-bullet"
                tabindex="0" role="button" aria-label="Go to slide 5"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 6"></span></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
    </div>
    </div>
    </div>
</section>