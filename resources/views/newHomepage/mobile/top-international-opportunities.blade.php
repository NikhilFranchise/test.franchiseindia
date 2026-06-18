@php

    $TopInternationalOpportunities = [
        '0' => [
            'url' => 'https://www.franchiseindia.com/brands/easygym.95394',
            'image' => 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/easygym_1.jpg',
            'category' => 'Gyms And Fitness Centres',
            'title' => "easyGym",
            'description' => "We think fitness should be fun, convenient, and affordable for everyone",
            'bgcolor' => '255,255,255',
        ],

        '1' => [
            'url' => 'https://www.franchiseindia.com/brands/spartan.113365',
            'image' => 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/692fdebc17e69.webp',
            'category' => 'Quick Service Restaurants',
            'title' => "Spartan",
            'description' => "Prezentare Spartan is a rapidly growing QSR franchise with 70+ outlets and strong national presence.",
            'bgcolor' => '255,255,255',
        ],
        '2' => [
            'url' => 'https://www.franchiseindia.com/brands/the-coffeeshop-company.108676',
            'image' => 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/681efccc5cb84.webp',
            'category' => 'Tea And Coffee Chain',
            'title' => 'The Coffeeshop Company',
            'description' => 'Coffeeshop Company is a globally recognized Austrian coffeehouse brand, established in 1999',
            'bgcolor' => '255,255,255',
        ],
        '3' => [
            'url' => 'https://www.franchiseindia.com/brands/three-oclock.106339',
            'image' => 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/three-oclock_1.png',
            'category' => 'Others Food Service',
            'title' => "Three O'Clock",
            'description' => "THREE O’CLOCK, founded in 2016 in Ho Chi Minh City, Vietnam, has rapidly grown",
            'bgcolor' => '255,255,255',
        ],
    ];
@endphp
<section class="top-international-opportunities">
    <h2 class="brands-head">
        <h2>{{ Request::segment(1) == 'hi' ? 'शीर्ष अंतरराष्ट्रीय अवसर' : 'Top International Opportunities' }}</h2>
        <div class="card-wrap">
            @foreach ($TopInternationalOpportunities as $top)
                <div class="leading-card">
                    <div class="brand-ins">
   <a href="{{ $top['url'] }}" target="_blank"><img src="{{ $top['image'] }}" alt="{{ $top['title'] }}" width="199" height="81" loading="lazy" aria-label="{{ $top['title'] }}"></a>
                    </div>
                    <div class="leading-card-brand-category">
                        <p>
                            {{ $top['category'] }}
                        </p>
                    </div>
                    <div class="leading-card-brand-title">
                        <h2><a href="{{ $top['url'] }}" target="_blank" aria-label="{{ $top['title'] }}">{{ $top['title'] }}</a></h2>
                    </div>
                    <div class="card-info-summary">{{ $top['description'] }}</div>
                    <a href="{{ $top['url'] }}" target="_blank" class="know-more" aria-label="{{ $top['title'] }}">
                        <div class="link-section-main">{{ Request::segment(1) == 'hi' ? 'अधिक जानिए' : 'Know More' }}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
</section>
