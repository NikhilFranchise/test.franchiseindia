@php

    $TopInternationalOpportunities = [
        '0' => [
            'url' => 'https://www.franchiseindia.com/brands/pitman-training.88775',
            'image' => 'https://www.franchiseindia.com/images/top-international/pitman.webp',
            'category' => 'Other Online Education',
            'title' => 'Pitman Training',
            'description' => "World's oldest professional training academy with a rich legacy of 187 years offering unit & area franchise opportunities.",
            'bgcolor' => '0,78,153',
        ],

        '1' => [
            'url' => 'https://www.franchiseindia.com/brands/figaros-pizza.73238',
            'image' => 'https://www.franchiseindia.com/images/top-international/figaros.webp',
            'category' => 'FINE DINE RESTAURANTS',
            'title' => "Figaro's Italian Pizza",
            'description' => "40+ year old multinational QSR pizza chai with already presence in Delhi, Mumbai, Hyderabad, Jallandhar, Indore & Jaipur.",
            'bgcolor' => '140,140,140',
        ],
        '2' => [
            'url' => 'https://www.franchiseindia.com/brands/bagelstein.99562',
            'image' => 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bagelstein_1.gif',
            'category' => 'Quick Service Restaurants',
            'title' => 'BAGELSTEIN',
            'description' => 'Bagelstein, a French bagel chain, has carved a niche in the European market since its inception in Strasbourg in 2011.',
            'bgcolor' => '140,140,140',
        ],
        '3' => [
            'url' => 'https://www.franchiseindia.com/brands/actioncoach.30037',
            'image' => 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/actioncoach_1.jpg',
            'category' => 'Service For SMEs',
            'title' => 'ActionCOACH India',
            'description' => 'ActionCOACH is a leading business coaching firm focussed on SMEs',
            'bgcolor' => '15,117,189',
        ],
    ];
@endphp
<section class="top-international-opportunities section-30" id="top-international-opportunities">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-ptb">
                    <h2>{{ Request::segment(1) == 'hi' ? 'शीर्ष अंतरराष्ट्रीय अवसर' : 'Top International Opportunities' }}
                    </h2>
                </div>
            </div>
        </div>
        <!-- Swiper -->
        <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
            <div class="swiper-wrapper" style="transform: translate3d(-2340px, 0px, 0px); transition: all 0ms ease 0s;">
                @foreach ($TopInternationalOpportunities as $top)
                    <div class="swiper-slide">
                        <div class="overlaybg"></div>
                        <div class="swiper-slide-international-opportunities">

                            <div class="card card-m card-p-10"
                                style=" background-color: rgba({{ $top['bgcolor'] }},0.1); box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgb({{ $top['bgcolor'] }}, 0.36);">
                                <div class="brand-img">
                                    <div class="brand-img-section">
                                        <a href="{{ $top['url'] }}">
                                            <img src="{{ $top['image'] }}" class="" alt="{{ $top['title'] }}" />
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body-section">
                                    <p>
                                        <a href="#">{{ $top['category'] }}</a>
                                    </p>
                                    <h2> <a href="{{ $top['url'] }}">{{ $top['title'] }}</a> </h2>
                                    <div class="card-info-summry">
                                        {{ $top['description'] }}
                                    </div>
                                    <div class="link-section">
                                        <a href="{{ $top['url'] }}"
                                            style="
                              padding: 5px;
                              border-radius: 4px;
                              font-weight: 600;
                              ">{{ Request::segment(1) == 'hi' ? 'अधिक जानिए' : 'Know More' }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span
                    class="swiper-pagination-bullet" tabindex="0" role="button"
                    aria-label="Go to slide 1"></span><span
                    class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button"
                    aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0"
                    role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet"
                    tabindex="0" role="button" aria-label="Go to slide 4"></span></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </div>
</section>
