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
