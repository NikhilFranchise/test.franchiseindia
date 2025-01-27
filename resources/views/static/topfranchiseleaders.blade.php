@extends('layout.master')
@section('seodesignation', 'Top 50 Leaders in Franchising - 2024')
@section('content')
    <style>
        .back-btns a,
        .back-btns {
            color: #ec1d23;
        }

        .top-table {
            width: 100%;
            margin-top: 20px;
        }

        .top-table tr:nth-child(n) {
            background-color: #F9FAFB !important;
        }

        .top-table tr {
            border-bottom: 1px solid #e3e3e3;
        }

        .table-striped>tbody>tr:nth-of-type(2n+1) {
            background-color: #f9f9f9;
        }

        .top-table th {
            padding: 15px !important;
            background-color: #F3F4F6 !important;
            border-top: 1px solid #e3e3e3;
            color: #333333;
            font-size: 16px;
        }

        .top-table td:nth-child(1) {
            width: 10%;
            padding-left: 20px !important;
        }

        .top-table th:nth-child(1) {
            padding-left: 20px !important;
        }

        .top-table td {
            padding: 15px 20px 15px 20px !important;
            color: #333333;
            font-size: 16px;
            font-weight: bold;
        }

        .top-table tr:nth-child(n):hover {
            background-color: #E9ECF4 !important;
        }

        .top-table td:nth-child(2) {
            width: 17%;
        }

        .top-table td:nth-child(3) {
            width: 36%;
            font-weight: 400;
            font-size: 16px;
            line-height: 27px;
        }

        .top-table td:nth-child(4) {
            width: 1%;
        }

        .top-table td:nth-child(5) {
            width: 15%;
        }

        .top-table tr:nth-child(2n) {
            background-color: #ffffff !important;
        }

        .back-btns {
            text-align: right;
            text-decoration: underline;
        }

        a.desklink {
            background-color: #000000;
            padding: 14px 20px;
            border-radius: 5px;
            font-weight: normal;
            display: block;
            font-size: 15px;
            color: #ffffff !important;
            text-align: center;
            width: 110px;
            float: none;
        }

        a.desklink:hover {
            color: #ffffff !important;
        }

        .img-top-fifty {
            width: 90px;
            height: auto;
            border-radius: 200px;
        }

        .top-fifty-mag {
            margin-bottom: 15px;
        }

        .back-btns {
            float: right;
        }

        @media screen and (max-width: 768px) {
            .top-fifty-table {
                overflow: auto;
                white-space: nowrap;
            }
        }
    </style>
    <div class="container formsection margintop60 staicp">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h1>Top 50 Leaders in Franchising </h1>
                <img src='/topfranchiseleaders/images/top-fifty.jpg' alt="Top 50 Leaders in Franchising"
                    class="img-fluid top-fifty-mag">
                <p class="static-txt-ter" style="margin-bottom:25px;">Visionary, adaptable, and committed to
                    excellence—this year’s best-performing Top 50 Franchise leaders have redefined what it means to lead
                    in franchising. As they expand their brands, inspire their teams, and embrace cutting-edge
                    strategies, these leaders leave an indelible mark on an industry built on opportunity and growth.
                    Here’s a closer look at why they deserve recognition as the top franchise performers, showcasing the
                    qualities and achievements that make them true champions in their field.</p>



                <div class="top-fifty-listing">
                    <div class="top-fifty-table">
                        <table class="table-striped table-responsive top-table">
                            <thead>
                                <tr>
                                    <th>Leaders </th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Profile</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php
                                    $leaders = [
                                        [
                                            'name' => 'Sanjay Raghuraman',
                                            'designation' => 'CEO, Kalyan Jewellers',
                                            'image' => '/topfranchiseleaders/images/sanjay-raghuraman.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/sanjay-raghuraman',
                                        ],
                                        [
                                            'name' => 'Rajeev Ranjan',
                                            'designation' => 'Managing Director, McDonald\'s India North and East',
                                            'image' => '/topfranchiseleaders/images/rajeev-ranjan.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/rajeev-ranjan',
                                        ],
                                        [
                                            'name' => 'Venkatesalu',
                                            'designation' => 'Managing Director, Trent Ltd',
                                            'image' => '/topfranchiseleaders/images/venkatesalu.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/venkatesalu',
                                        ],
                                        [
                                            'name' => 'Dr. Jayen Mehta',
                                            'designation' =>
                                                'Managing Director, Gujarat Co-operative Milk Marketing Federation Ltd, (Amul)',
                                            'image' => '/topfranchiseleaders/images/jayen-mehta.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/jayen-mehta',
                                        ],
                                        [
                                            'name' => 'Manish Rastogi',
                                            'designation' => 'CEO, Zee Learn Ltd',
                                            'image' => '/topfranchiseleaders/images/manish-rastogi.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/manish-rastogi',
                                        ],
                                        [
                                            'name' => 'KVS Seshasai',
                                            'designation' => 'CEO, PreK Division- Lighthouse Learning Group',
                                            'image' => '/topfranchiseleaders/images/kvs.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/kvs-seshasai',
                                        ],
                                        [
                                            'name' => 'Dipali Goenka',
                                            'designation' => 'MD & CEO, Welspun Living',
                                            'image' => '/topfranchiseleaders/images/dipali-goenka.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/dipali-goenka',
                                        ],
                                        [
                                            'name' => 'Jeevan Shetty',
                                            'designation' =>
                                                'Director - Franchise Management, Aditya Birla Fashion and Retail Ltd',
                                            'image' => '/topfranchiseleaders/images/jeevan-shetty.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/jeevan-shetty',
                                        ],
                                        [
                                            'name' => 'Gaurav Poddar',
                                            'designation' => 'Executive Director, Siyaram Silk Mills Ltd.',
                                            'image' => '/topfranchiseleaders/images/gaurav-poddar.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/gaurav-poddar',
                                        ],
                                        [
                                            'name' => 'Vikas Sharma',
                                            'designation' => 'COO, Zepto',
                                            'image' => '/topfranchiseleaders/images/vikas-sharma.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/vikas-sharma',
                                        ],
                                        [
                                            'name' => 'Anupam Bansal',
                                            'designation' => 'Executive Director, Liberty Group Ltd',
                                            'image' => '/topfranchiseleaders/images/anupam-bansal.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/anupam-bansal',
                                        ],
                                        [
                                            'name' => 'Satish Puranam',
                                            'designation' =>
                                                'Vice President – Franchise Strategy and Operations, Reliance Retail Limited',
                                            'image' => '/topfranchiseleaders/images/satish-puranam.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/satish-puranam',
                                        ],
                                        [
                                            'name' => 'Sanam Kapoor',
                                            'designation' => 'Founder & Director, La Pino\'z Pizza',
                                            'image' => '/topfranchiseleaders/images/sanam-kapoor.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/sanam-kapoor',
                                        ],
                                        [
                                            'name' => 'SD Nandakumar',
                                            'designation' =>
                                                'President and Country Head – Corporate Tours, SOTC Travel',
                                            'image' => '/topfranchiseleaders/images/sd-nandakumar.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/sd-nandakumar',
                                        ],
                                        [
                                            'name' => 'Binaisha Zaveri',
                                            'designation' => 'Whole-time Director, TBZ - The Original',
                                            'image' => '/topfranchiseleaders/images/binaisha-zaveri.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/binaisha-zaveri',
                                        ],
                                        [
                                            'name' => 'Sandip Baksi',
                                            'designation' => 'COO, AstorMueller India',
                                            'image' => '/topfranchiseleaders/images/sandip-baksi.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/sandip-baksi',
                                        ],
                                        [
                                            'name' => 'Davashish Srivastava',
                                            'designation' => 'Senior Director Development, Radisson Hotel Group',
                                            'image' => '/topfranchiseleaders/images/davashish-srivastava.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/davashish-srivastava',
                                        ],
                                        [
                                            'name' => 'Vilas Pawar',
                                            'designation' => 'CEO- Managed and Franchise Business, Lemon Tree Hotels',
                                            'image' => '/topfranchiseleaders/images/vilas-pawar.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/vilas-pawar',
                                        ],
                                        [
                                            'name' => 'Sohrab Sitaram',
                                            'designation' => 'Co-founder and Director, Keventers',
                                            'image' => '/topfranchiseleaders/images/sohrab-sitaram.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/sohrab-sitaram',
                                        ],
                                        [
                                            'name' => 'Vaibhav Kaushish',
                                            'designation' => 'COO, Stellar Concepts Pvt. Ltd.',
                                            'image' => '/topfranchiseleaders/images/vaibhav-kaushish.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/vaibhav-kaushish',
                                        ],
                                        [
                                            'name' => 'Akshay Jatia',
                                            'designation' => 'Executive Director, Westlife Foodworld',
                                            'image' => '/topfranchiseleaders/images/akshay-jatia.jpg',
                                            'profile_link' => '/top-franchise-leaders/2024/akshay-jatia',
                                        ],

                                        [
                                            'name' => 'Jatin Rai',
                                            'designation' =>
                                                'GM & National Head - Franchise Expansion & Operations, Jubilant FoodWorks Ltd.',
                                            'image' => '/topfranchiseleaders/images/jatin-rai.jpg',
                                            'profile_link' => 'jatin-/top-franchise-leaders/2024/rai',
                                        ],
                                        [
                                            'name' => 'Vineet Kochar',
                                            'designation' =>
                                                'Chief Operating Officer, Azure Hospitality Private Limited',
                                            'image' => '/topfranchiseleaders/images/vineet-kochar.jpg',
                                            'profile_link' => 'vineet-/top-franchise-leaders/2024/kochar',
                                        ],
                                        [
                                            'name' => 'Pawan Gadia',
                                            'designation' => 'Director & Global CEO, FNP (formerly Ferns N Petals)',
                                            'image' => '/topfranchiseleaders/images/pawan-gadia.jpg',
                                            'profile_link' => 'pawan-/top-franchise-leaders/2024/gadia',
                                        ],
                                        [
                                            'name' => 'Anand Nichani',
                                            'designation' => 'Managing Director, Magniflex India',
                                            'image' => '/topfranchiseleaders/images/anand-nichani.jpg',
                                            'profile_link' => 'anand-/top-franchise-leaders/2024/nichani',
                                        ],
                                        [
                                            'name' => 'Viren Shah',
                                            'designation' => 'Director, Scoops IceCream & Cream Stone Concepts',
                                            'image' => '/topfranchiseleaders/images/viren-shah.jpg',
                                            'profile_link' => 'viren-/top-franchise-leaders/2024/shah',
                                        ],
                                        [
                                            'name' => 'K.G. George',
                                            'designation' => 'President – Retail, Cello World Limited',
                                            'image' => '/topfranchiseleaders/images/kg-george.jpg',
                                            'profile_link' => 'kg-/top-franchise-leaders/2024/george',
                                        ],
                                        [
                                            'name' => 'Animesh Kumar',
                                            'designation' => 'Director - Franchise Operations Eurasia, Wyndham Hotels',
                                            'image' => '/topfranchiseleaders/images/animesh-kumar.jpg',
                                            'profile_link' => 'animesh-/top-franchise-leaders/2024/kumar',
                                        ],
                                        [
                                            'name' => 'Nikhil Singh',
                                            'designation' => 'Vice President – Head Retail Operations, Bata',
                                            'image' => '/topfranchiseleaders/images/nikhil-singh.jpg',
                                            'profile_link' => 'nikhil-/top-franchise-leaders/2024/singh',
                                        ],
                                        [
                                            'name' => 'Manish Singhai',
                                            'designation' => 'Chief Business Officer, TMRW House of Brands',
                                            'image' => '/topfranchiseleaders/images/manish-singhai.jpg',
                                            'profile_link' => 'manish-/top-franchise-leaders/2024/singhai',
                                        ],
                                        [
                                            'name' => 'Jasmeet Singh',
                                            'designation' => 'Chief Commercial Officer, MakeMyTrip India',
                                            'image' => '/topfranchiseleaders/images/jasmeet-singh.jpg',
                                            'profile_link' => 'jasmeet-/top-franchise-leaders/2024/singh',
                                        ],
                                        [
                                            'name' => 'Akash Srivastava',
                                            'designation' =>
                                                'National Head, Business Development and Real Estate Expansion, Raymond Limited',
                                            'image' => '/topfranchiseleaders/images/akash-srivastava.jpg',
                                            'profile_link' => 'akash-/top-franchise-leaders/2024/srivastava',
                                        ],
                                        [
                                            'name' => 'Sunil Menon',
                                            'designation' => 'Chief Retail Expansion Officer (Global), Lenskart.com',
                                            'image' => '/topfranchiseleaders/images/sunil-menon.jpg',
                                            'profile_link' => 'sunil-/top-franchise-leaders/2024/menon',
                                        ],
                                        [
                                            'name' => 'Abhishek Chakraborty',
                                            'designation' => 'Chief Executive Officer, DTDC EXPRESS LTD',
                                            'image' => '/topfranchiseleaders/images/abhishek-chakraborty.jpg',
                                            'profile_link' => 'abhishek-/top-franchise-leaders/2024/chakraborty',
                                        ],
                                        [
                                            'name' => 'Dr. Kailash Goenka',
                                            'designation' => 'Chairman & Managing Director, Sankalp Group',
                                            'image' => '/topfranchiseleaders/images/dr-kailash-goenka.jpg',
                                            'profile_link' => 'dr-kailash-/top-franchise-leaders/2024/goenka',
                                        ],
                                        [
                                            'name' => 'Rajneet Kohli',
                                            'designation' => 'CEO & Executive Director, Britannia Industries Ltd.',
                                            'image' => '/topfranchiseleaders/images/rajneet-kohli.jpg',
                                            'profile_link' => 'rajneet-/top-franchise-leaders/2024/kohli',
                                        ],
                                        [
                                            'name' => 'Vipul Chaturvedi',
                                            'designation' => 'CEO, Lakme Lever Pvt Ltd.',
                                            'image' => '/topfranchiseleaders/images/vipul-chaturvedy.jpg',
                                            'profile_link' => 'vipul-/top-franchise-leaders/2024/chaturvedy',
                                        ],
                                        [
                                            'name' => 'Bidyut Bhanjdeo',
                                            'designation' =>
                                                'Chief Business Officer- Brands-FMCG-Fashion- Retail, Ethnix by Raymond',
                                            'image' => '/topfranchiseleaders/images/bidyut-bhanjdeo.jpg',
                                            'profile_link' => 'bidyut-/top-franchise-leaders/2024/bhanjdeo',
                                        ],
                                        [
                                            'name' => 'Navnath Dashrath Yewale',
                                            'designation' => 'Founder and CEO, Yewale Group',
                                            'image' => '/topfranchiseleaders/images/navnath-dashrath.jpg',
                                            'profile_link' => 'navnath-/top-franchise-leaders/2024/dashrath',
                                        ],
                                        [
                                            'name' => 'Aakash Gupta',
                                            'designation' => 'CEO, Crossword Bookstores Pvt Ltd',
                                            'image' => '/topfranchiseleaders/images/aakash-gupta.jpg',
                                            'profile_link' => 'aakash-/top-franchise-leaders/2024/gupta',
                                        ],
                                        [
                                            'name' => 'Mohit Khattar',
                                            'designation' => 'Director and CEO, Graviss Foods Pvt Ltd (GFPL)',
                                            'image' => '/topfranchiseleaders/images/mohit-khattar.jpg',
                                            'profile_link' => 'mohit-/top-franchise-leaders/2024/khattar',
                                        ],
                                        [
                                            'name' => 'Ranjit Talwar',
                                            'designation' =>
                                                'Commercial Director India Subcontinent, Coffee Bean & Tea Leaf',
                                            'image' => '/topfranchiseleaders/images/ranjit-talwar.jpg',
                                            'profile_link' => 'ranjit-/top-franchise-leaders/2024/talwar',
                                        ],
                                        [
                                            'name' => 'Rajeev Kale',
                                            'designation' =>
                                                'President and Country Head Holidays, MICE, Visa, Thomas Cook (India) Limited',
                                            'image' => '/topfranchiseleaders/images/rajeev-kale.jpg',
                                            'profile_link' => 'rajeev-/top-franchise-leaders/2024/kale',
                                        ],
                                        [
                                            'name' => 'Ashu Khanna',
                                            'designation' => 'National Head, Dhani Stocks',
                                            'image' => '/topfranchiseleaders/images/ashu-khanna.jpg',
                                            'profile_link' => 'ashu-/top-franchise-leaders/2024/khanna',
                                        ],
                                        [
                                            'name' => 'Sundeep Singh',
                                            'designation' => 'Founder and CEO, Bogmalo Foods & Hospitality LLP',
                                            'image' => '/topfranchiseleaders/images/sundeep-singh.jpg',
                                            'profile_link' => 'sundeep-/top-franchise-leaders/2024/singh',
                                        ],
                                        [
                                            'name' => 'Nitin Bansal',
                                            'designation' => 'Head Business Development, MINISO Life Style Pvt. Ltd.',
                                            'image' => '/topfranchiseleaders/images/nitin-bansal.jpg',
                                            'profile_link' => 'nitin-/top-franchise-leaders/2024/bansal',
                                        ],
                                        [
                                            'name' => 'Ashish Shah',
                                            'designation' => 'Co-founder and CEO, Pepperfry',
                                            'image' => '/topfranchiseleaders/images/ashish-shah.jpg',
                                            'profile_link' => 'ashish-/top-franchise-leaders/2024/shah',
                                        ],
                                        [
                                            'name' => 'Sooraj Bhat',
                                            'designation' =>
                                                'CEO - Ethnic Business, Aditya Birla Fashion and Retail Limited',
                                            'image' => '/topfranchiseleaders/images/sooraj-bhat.jpg',
                                            'profile_link' => 'sooraj-/top-franchise-leaders/2024/bhat',
                                        ],
                                        [
                                            'name' => 'Siddharth Perikala',
                                            'designation' => 'Deputy General Manager & Head of Retail, TTK Prestige',
                                            'image' => '/topfranchiseleaders/images/siddharth-perikala.jpg',
                                            'profile_link' => 'siddharth-/top-franchise-leaders/2024/perikala',
                                        ],
                                        [
                                            'name' => 'Supam Maheshwari',
                                            'designation' => 'Co-founder and CEO, FirstCry',
                                            'image' => '/topfranchiseleaders/images/supam-maheshwari.jpg',
                                            'profile_link' => 'supam-/top-franchise-leaders/2024/maheshwari',
                                        ],
                                    ];

                                @endphp --}}
                                @foreach ($leaders as $leader)
                                    @php
                                        $link =
                                            'top-franchise-leaders/2024/' .
                                            Str::slug($leader->name) .
                                            '/' .
                                            $leader->id;
                                    @endphp
                                    <tr>
                                        <td><a href="{{ $link }}">
                                                <img src="{{ $leader['image_path'] }}" class="img-top-fifty"
                                                    alt="{{ $leader['name'] }}"></a>
                                        </td>
                                        <td>{{ $leader['name'] }}</td>
                                        <td>{{ $leader['designation'] }}</td>
                                        <td>
                                            <a href="{{ $link }}" class="desklink">
                                                Profile
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
