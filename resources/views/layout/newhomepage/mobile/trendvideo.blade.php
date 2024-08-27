
<section class="upcomingevents section-30" id="upcomingevents">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-ptb">
                    <h2>{{ Request::segment(1) == 'hi' ? 'ट्रेंडिंग वीडियो' : 'Trending Videos' }}</h2>
                </div>
            </div>
        </div>
        <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
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
                @foreach ($videos1 as $video)
                    <div class="swiper-slide">
                        <div class="swiper-slide-events-main">
                            <div class="vidblk">
                                <div class="vidimg">
                                    <div class="overleybg">
                                        <div class="vi">
                                            <div class="viiner"><a href="{{ $video['url'] }}" target="_blank"><img
                                                        src="{{ url('newhomepage/assets/img/youtube.svg') }}"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <img class="lazyloaded" title="{{ $video['title'] }}" alt="entrepreneur"
                                        src="{{ $video['imageurl'] }}">
                                </div>

                                <div class="videcontent">
                                    <h2><a href="{{ $video['url'] }}" target="_blank">{{ $video['title'] }}</a> </h2>
                                    <div class="videtxt">
                                        {{ $video['description'] }}</div>
                                    <div class="showview">{{ $video['views'] }} Views <span>{{ $video['date'] }}</span>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>
<!-- Trending Events ends -->
