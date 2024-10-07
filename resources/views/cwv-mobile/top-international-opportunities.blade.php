@php

    $TopInternationalOpportunities = [
        '0' => [
            'url' => 'https://www.franchiseindia.com/brands/pitman-training.88775',
            'image' => 'https://www.franchiseindia.com/images/top-international/pitman.webp',
            'category' => 'Other Online Education',
            'title' => 'Pitman Training',
            'description' =>
                "World's oldest professional training academy with a rich legacy of 187 years offering unit & area franchise opportunities.",
            'bgcolor' => '0,78,153',
        ],

        '1' => [
            'url' => 'https://www.franchiseindia.com/brands/figaros-pizza.73238',
            'image' => 'https://www.franchiseindia.com/images/top-international/figaros.webp',
            'category' => 'FINE DINE RESTAURANTS',
            'title' => "Figaro's Italian Pizza",
            'description' =>
                '40+ year old multinational QSR pizza chai with already presence in Delhi, Mumbai, Hyderabad, Jallandhar, Indore & Jaipur.',
            'bgcolor' => '140,140,140',
        ],
        '2' => [
            'url' => 'https://www.franchiseindia.com/brands/easygym.95394',
            'image' => 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/easygym_1.jpg',
            'category' => 'Gyms And Fitness Centres',
            'title' => 'Easygym',
            'description' =>
                'Globally renowned fitness brand which is part of British conglomerate easyGroup from The UK & France',
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
<section class="top-international-opportunities">
    <h2 class="brands-head">
        <h2>{{ Request::segment(2) == 'hi' ? 'शीर्ष अंतरराष्ट्रीय अवसर' : 'Top International Opportunities' }}</h2>
        <div class="card-wrap">
            @foreach ($TopInternationalOpportunities as $top)
                <div class="leading-card">
                    <div class="brand-ins">
                        <a href="{{ $top['url'] }}" target="_blank"><img src="{{ $top['image'] }}"
                                alt="{{ $top['title'] }}" width="192" height="94" loading="lazy"></a>
                    </div>
                    <div class="leading-card-brand-category">
                        <p>
                            {{ $top['category'] }}
                        </p>
                    </div>
                    <div class="leading-card-brand-title">
                        <h2><a href="{{ $top['url'] }}" target="_blank">{{ $top['title'] }}</a></h2>
                    </div>
                    <div class="card-info-summary">{{ $top['description'] }}</div>
                    <a href="{{ $top['url'] }}" target="_blank" class="know-more">
                        <div class="link-section-main">{{ Request::segment(2) == 'hi' ? 'अधिक जानिए' : 'Know More' }}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
</section>
