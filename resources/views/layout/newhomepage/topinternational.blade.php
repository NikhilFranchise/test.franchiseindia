@php

    $TopInternationalOpportunities = [
        '0' => [
            'url' => 'https://www.franchiseindia.com/brands/pitman-training.88775',
            'image' => 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pitman-training_1.gif',
            'category' => 'Other Online Education',
            'title' => 'Pitman Training',
            'description' => 'Pitman Training is an extensive network of career training & professional development',
            'bgcolor' => '0,78,153',
        ],

        '1' => [
            'url' => 'https://www.franchiseindia.com/brands/figaros-pizza.73238',
            'image' => 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/figaros-pizza_1.jpg',
            'category' => 'FINE DINE RESTAURANTS',
            'title' => "Figaro's Italian Pizza",
            'description' => "Figaro's Pizza is an American multinational quick service restaurant",
            'bgcolor' => '140,140,140',
        ],
        '2' => [
            'url' => 'https://www.franchiseindia.com/brands/business-kids.77135',
            'image' => 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/business-kids_3.png',
            'category' => 'CAREER COUNSELING',
            'title' => 'Business Kids/ Business Teens',
            'description' =>
                'BusinessKids is a program aimed at enterprising children, where they learn about entrepreneurship by playing, through private afternoon classes, summer courses and seminars',
            'bgcolor' => '140,140,140',
        ],
        '3' => [
            'url' => 'https://www.franglobal.com/engage-and-grow/',
            'image' =>
                'https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/engage_199x81.png',
            'category' => 'Education',
            'title' => 'Engage &amp; Grow',
            'description' => 'Become A Certified Engage &amp; Grow Franchise in your Region &amp; Grow Your Business',
            'bgcolor' => '15,117,189',
        ],
    ];
@endphp

<section class="bg-sectionwize top-international-opportunities
         section-30" id="top-international-opportunities">
    <div class="container">
        <div class="row justify-content-center">
            <div class="modified-col col-md-12">
                <div class="section-ptb">
                    <h2>{{ Request::segment(1) == 'hi' ? 'शीर्ष अंतरराष्ट्रीय अवसर' : 'Top International Opportunities' }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($TopInternationalOpportunities as $top)
                <div class="modified-col col-xs-6 col-sm-6 col-md-3 col-lg-3
                  col-xl-3">
                    <div class="overlay-card"></div>
                    <div class="card card-m card-p-10"
                        style=" background-color: rgba({{ $top['bgcolor'] }},0.1); box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgb({{ $top['bgcolor'] }}, 0.36);">
                        <div class="brand-image-section">
                            <div class="brand-main-section">
                                <a href="{{ $top['url'] }}" target="_blank"> <img src="{{ $top['image'] }}"
                                        class="" alt="{{ $top['title'] }}"></a>
                            </div>
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
                                <div class="link-section-main"
                                    style="    color: #000;
                                 border: 1px solid #000;
                                 padding: 5px;
                                 border-radius: 4px;
                                 font-weight: 600;
                                 text-align: center;
                                 margin-top: 11px;">
                                    {{ Request::segment(1) == 'hi' ? 'अधिक जानिए' : 'Know More' }}</div>
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
