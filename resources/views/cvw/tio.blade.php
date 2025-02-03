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
            'url' => 'https://www.franchiseindia.com/brands/easygym.95394',
            'image' => 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/easygym_1.jpg',
            'category' => 'Gyms And Fitness Centres',
            'title' => 'Easygym',
            'description' => 'Globally renowned fitness brand which is part of British conglomerate easyGroup from The UK & France',
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


<section class="bg-sectionwize top-international-opportunities section-30" id="top-international-opportunities">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="section-ptb">
                    <h2>{{ Request::segment(1) == 'hi' ? 'शीर्ष अंतरराष्ट्रीय अवसर' : 'Top International Opportunities' }}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul>
                    @foreach ($TopInternationalOpportunities as $top)
                    <li>
                        <div class="overlay-card"></div>
                        <div class="card card-m card-p-10" style="background-color:rgba(0,78,153,.1);box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(0,78,153,.36)">
                            <div class="brand-image-section">
                                <div class="brand-main-section"><a href="{{ $top['url'] }}" target="_blank"><img src="{{ $top['image'] }}" class="" alt="{{ $top['title'] }}" width="199" height="81" loading="lazy"></a></div>
                            </div>
                            <div class="card-body-section">
                                <p>
                                    {{ $top['category'] }}
                                </p>
                                <h2><a href="{{ $top['url'] }}" target="_blank">{{ $top['title'] }}</a></h2>

                                <div class="card-info-summry">   
                                    {{ $top['description'] }}

                                </div>
                                <a href="{{ $top['url'] }}" target="_blank">
                                    <div class="link-section-main">{{ Request::segment(1) == 'hi' ? 'अधिक जानिए' : 'Know More' }}</div>
                                </a>
                            </div>
                        </div>
                    </li>
                  @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>