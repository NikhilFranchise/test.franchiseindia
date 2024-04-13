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
<!-- Trending Events starts -->
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
