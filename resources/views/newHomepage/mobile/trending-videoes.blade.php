<section class="trending-videos">
    <h2 class="brands-head">{{ Request::segment(2) == 'hi' ? 'ट्रेंडिंग वीडियो' : 'Trending Videos' }}</h2>
    <div class="card-wrap">
        @php
            $videos1 = $videos;
            $videos1 = array_filter($videos, function ($video) {
                return is_array($video) && isset($video['priority']);
            });

            usort($videos1, function ($a, $b) {
                return $a['priority'] <=> $b['priority'];
            });
        @endphp
        @foreach ($videos1 as $video)
            <div class="leading-card">
                <div class="video-thumb">
                    <div class="video-overlay"></div>
                    <a href="{{ $video['url'] }}" target="_blank"><img loading="lazy"
                            src="{{ url('newhomepage/assets/img/youtube.svg') }}" alt="video-icon" class="you"
                            height="35" width="35" loading="lazy"></a>
                    <img class="lazyloaded" title="Franchising - A Biggest Marketing Idea | Franchise India"
                        alt="entrepreneur" src="{{ $video['imageurl'] }}" alt="Franchising" width="310"
                        height="174" loading="lazy">
                </div>
                <a href="{{ $video['url'] }}" target="_blank">
                    <h2>{{ $video['title'] }}</h2>
                </a>
                <div class="video-txt">{{ strip_tags(Str::limit($video['description'], 80, '...')) }}</div>
                <div class="showview">{{ $video['views'] }} {{ Request::segment(2) == 'hi' ? 'विचारों' : 'Views' }}
                    <span>{{ date('d-M-Y', strtotime($video['date'])) }}</span>
                </div>
            </div>
        @endforeach
    </div>
</section>
