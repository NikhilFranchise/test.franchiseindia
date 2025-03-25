<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application specific config array values
    |--------------------------------------------------------------------------
    */
    'MainDomain' => env('APP_URL', 'https://fiuat.franchiseindia.com'),
    // 'MainDomain' =>'http://localhost:8000',

    'brandPagePattern' => '%s/brands/%s.%s',
    'catListUrl' => '%s/%s/%s.%s',
    'catPage' => 'business-opportunities',
    'NewsDomain' => 'https://news.franchiseindia.com',
    'franAwsImgPath' => 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/',
    'franAwsS3Url' => 'https://franchiseindia.s3.ap-south-1.amazonaws.com/',
    'awsS3Url' => 'https://franchiseindia.s3.ap-south-1.amazonaws.com', // duplicate for news
    'OIDomain' => 'https://www.dealerindia.com', // duplicate for news
    'ARTICLE_UPLOAD_PATH' => 'opp/article/english/images/',
	'ARTICLE_HINDI_UPLOAD_PATH' => 'opp/article/hindi/images/',

    'leadSource' => [
        'FiInstantApply' => 1,
        'FRO' => 2,
        'BOS' => 3,
        'MAGAZINE' => 4,
        'OfflineFRO' => 5,
        'OfflineBOS' => 6,
        'OfflineMAGAZINE' => 7
    ],

    'errorMessageProfileCompletionInvestor' => [
        1 => "Please update your profile at least 70%",
        2 => "Please update your Industry Details",
        3 => "Please update your Contact Details",
        4 => "Please update your Investment Details",
    ],

    'BookPrice' => [
        'edu2011' => [
            'india' => '1400',
            'usa' => '90'
        ],

        'tfe' => [
            'india' => '2000',
            'usa' => ''
        ],

        'iswyb' => [
            'india' => '2000',
            'usa' => ''
        ],

        'edu2013' => [
            'india' => '4000',
            'usa' => '225'
        ],

        'edu2009' => [
            'india' => '4000',
            'usa' => '225'
        ],

        'edu2012' => [
            'india' => '4000',
            'usa' => '225'
        ],

        'eretail2013' => [
            'india' => '4000',
            'usa' => '225'
        ],

        'fashion' => [
            'india' => '1599',
            'usa' => '225'
        ],
        'fc' => [
            'india' => '395',
            'usa' => '45'
        ],

        'food2009' => [
            'india' => '1192',
            'usa' => '80'
        ],

        'food2011' => [
            'india' => '1495',
            'usa' => '90'
        ],

        'francast' => [
            'india' => '1500',
            'usa' => ''
        ],

        'franchise2012' => [
            'india' => '4000',
            'usa' => '225'
        ],

        'rbc' => [
            'india' => '2000',
            'usa' => ''
        ],

        'realstate2011' => [
            'india' => '999',
            'usa' => '75'
        ],

        'restaurant' => [
            'india' => '4000',
            'usa' => '225'
        ],

        'salon2012' => [
            'india' => '2000',
            'usa' => '125'
        ],

        'salon2013' => [
            'india' => '4000',
            'usa' => '225'
        ],

        'salon2014' => [
            'india' => '4000',
            'usa' => '225'
        ],

        'smallbusiness' => [
            'india' => '',
            'usa' => ''
        ],

        'srs' => [
            'india' => '399',
            'usa' => '20'
        ],

        'syor' => [
            'india' => '495',
            'usa' => '50'
        ],

        'tango' => [
            'india' => '495',
            'usa' => '50'
        ],

        'tc' => [
            'india' => '295',
            'usa' => '35'
        ],

    ],

    'invPlanDetails' => [
        401 => 'Basic Plan',
        402 => 'Copper Plan',
        403 => 'Silver Plan',
        404 => 'Gold Plan',
        405 => 'Platinum Plan'
    ],

    'invPlanAmount' => [
        401 => 0,
        402 => 500,
        403 => 2599,
        404 => 3999,
        405 => 6999
    ],

    'invPlanMembershipDays' => [
        401 => 0,
        402 => 0,
        403 => 91,
        404 => 182,
        405 => 365
    ],

    'invPlanCreditLimit' => [
        401 => 0,
        402 => 5,
        403 => 20,
        404 => 50,
        405 => 1000
    ],

    'InvMembership' => array(
        'memType' => 'Platinum',
        'amount' => '5000'
    ),

    'InvestRange' => [
        1 => [
            'min' => '10000',
            'max' => '50000'
        ],

        3 => [
            'min' => '50000',
            'max' => '200000'
        ],

        5 => [
            'min' => '200000',
            'max' => '500000'
        ],

        7 => [
            'min' => '500000',
            'max' => '1000000'
        ],

        9 => [
            'min' => '1000000',
            'max' => '2000000'
        ],

        11 => [
            'min' => '2000000',
            'max' => '3000000'
        ],

        13 => [
            'min' => '3000000',
            'max' => '5000000'
        ],

        15 => [
            'min' => '5000000',
            'max' => '10000000'
        ],

        17 => [
            'min' => '10000000',
            'max' => '20000000'
        ],

        19 => [
            'min' => '20000000',
            'max' => '50000000'
        ],

        21 => [
            'min' => '50000000',
            'max' => '100000000'
        ]
    ],

    'InvestRangeUpdate' => [
        '10000' => [
            'min' => '10000',
            'max' => '50000'
        ],

        '50000' => [
            'min' => '50000',
            'max' => '200000'
        ],

        '200000' => [
            'min' => '200000',
            'max' => '500000'
        ],

        '500000' => [
            'min' => '500000',
            'max' => '1000000'
        ],

        '1000000' => [
            'min' => '1000000',
            'max' => '2000000'
        ],

        '2000000' => [
            'min' => '2000000',
            'max' => '3000000'
        ],

        '3000000' => [
            'min' => '3000000',
            'max' => '5000000'
        ],

        '5000000' => [
            'min' => '5000000',
            'max' => '10000000'
        ],

        '10000000' => [
            'min' => '10000000',
            'max' => '20000000'
        ],

        '20000000' => [
            'min' => '20000000',
            'max' => '50000000'
        ],

        '50000000' => [
            'min' => '50000000',
            'max' => '100000000'
        ]
    ],

    'occupation' => [
        1 => 'Student',
        2 => 'Service',
        3 => 'Business'
    ],

    'invLookingFor' => [
        1 => 'Unit',
        2 => 'Multicity',
        3 => 'Dealer/Distributor',
        4 => 'Master Franchise'
    ],

    'invPropertyType' => [
        1 => 'Residential',
        2 => 'Commercial',
        3 => 'Retail',
        4 => 'Industrial'
    ],

    'areaType' => [
        1 => 'Sq. ft',
        2 => 'Sq. mt',
        3 => 'Sq. yrd',
        4 => 'Acre'
    ],

    //s3 image uploading path
    'FranchisorCompanyLogo' => 'franchisor/testpics/%s',
    'FranchisorSliderPics' => 'franchisor/testpics/slider/%s',

    //local image uploading for admin panel
    'AdminAuthor' => 'author',
    'AdminArticleInterview' => 'content',
    'AdminNews' => 'news',
    'AdminMagazine' => 'magazine',
    'MagazineArticle' => 'magazine/article',
    //end local image uploading for admin panel

    'NoOfProspects' => [
        1 => '0-5',
        2 => '6-10',
        3 => '11-20',
        4 => 'Above 20'
    ],

    'imageStatus' => [
        0 => 'Not Verified',
        1 => 'Verified',
        2 => 'Rejected',
    ],

    'investmentRangeFetch' => [
        '10000' => 'Rs. 10000 - 50000',
        '50000' => 'Rs. 50000 - 2lakh',
        '200000' => 'Rs. 2lakh - 5lakh',
        '500000' => 'Rs. 5lakh - 10lakh',
        '1000000' => 'Rs. 10lakh - 20lakh',
        '2000000' => 'Rs. 20lakh - 30lakh',
        '3000000' => 'Rs. 30lakh - 50lakh',
        '5000000' => 'Rs. 50lakh - 1 Cr.',
        '10000000' => 'Rs. 1 Cr. - 2 Cr',
        '20000000' => 'Rs. 2 Cr. - 5 Cr',
        '50000000' => 'Rs. 5 Cr. above',
    ],

    'investRangeInWords' => [
        1 => 'Rs. 10000 - 50000',
        3 => 'Rs. 50000 - 2lakh',
        5 => 'Rs. 2lakh - 5lakh',
        7 => 'Rs. 5lakh - 10lakh',
        9 => 'Rs. 10lakh - 20lakh',
        11 => 'Rs. 20lakh - 30lakh',
        13 => 'Rs. 30lakh - 50lakh',
        15 => 'Rs. 50lakh - 1 Cr.',
        17 => 'Rs. 1 Cr. - 2 Cr',
        19 => 'Rs. 2 Cr. - 5 Cr',
        21 => 'Rs. 5 Cr. above',

    ],

    'investRangeInWordsSingle' => [
        1 => 'Rs. 10000',
        3 => 'Rs. 50000',
        5 => 'Rs. 2lakh',
        7 => 'Rs. 5lakh',
        9 => 'Rs. 10lakh',
        11 => 'Rs. 20lakh',
        13 => 'Rs. 30lakh',
        15 => 'Rs. 50lakh',
        17 => 'Rs. 1 Cr.',
        19 => 'Rs. 2 Cr.',
        21 => 'Rs. 5 Cr.'
    ],

    'InvestTimeFrame' => [
        1 => 'Less than 3 months',
        2 => '3 - 6 months',
        3 => '6 - 12 months'
    ],

    'InvestPropType' => [
        1 => 'Domestic',
        2 => 'Commercial'
    ],

    'ProfileType' => [
        'Franchisor' => 1,
        'Investor' => 2
    ],

    'LookingFor' => [
        'Franchisor' => 1,
        'TradePartner' => 0,
        'DealerDistributor' => 2
    ],

    'ExpansionLocationType' => [
        1 => 'stateWise',
        2 => 'cityWise'
    ],

    'FranchiseTermDuration' => [
        1 => 'Life',
        2 => 'No of years'
    ],

    'LookingInternationalFranchise' => [
        0 => 'stateWise',
        1 => 'cityWise'
    ],

    'InternationalFranchise' => [
        'yes' => 1
    ],

    'ProfileStatus' => [
        'Inactive' => 0,
        'Active' => 1,
        'Pending' => 2,           // Email verification pending
        'Awaiting' => 3,           // Awaiting Moderator's approval
        'Rejected' => 4,
        'Incomplete' => 5 ,          // Registration in progress
        'Hidden' => 11
    ],

    // Payment Source
    'paymentSource' => array(
        'PayU' => 1,
        'Cheque' => 2,
        'NEFT' => 3,
        'DD' => 4,
        'Free' => 5
    ),

    'invPlanAmountWithGst' => [
        401 => 0,
        402 => 590,
        403 => 1770,
        404 => 2949,
        405 => 4719
    ],

    'OutletLocations' => [
        1 => 'North',
        2 => 'South',
        3 => 'East',
        4 => 'West',
        5 => 'Central',
        6 => 'International'
    ],

    'MarketingMaterials' => [
        1 => "Franchise Kit",
        2 => "Brochures",
        3 => "Company Profile",
        4 => "Others",
    ],

    'NoOutlets' => [
        //1 => 'No Outlets',
        2 => 'Less than 10',
        3 => '10-20',
        4 => '20-50',
        5 => '50-100',
        6 => '100-200',
        7 => '200-500',
        8 => '500-1000',
        9 => '1000-10000',
        10 => 'More than 10000'
    ],

    'eduQualification' => [
        1 => 'Other',
        2 => 'Post graduate',
        3 => 'Higher Secondary',
        4 => 'Graduate',
        5 => 'Diploma'
    ],

    'channelArr' => [
        1 => "Retailer",
        2 => "DSA",
        3 => "Reseller",
        4 => "MLM",
        5 => "Distributor",
        6 => "C & F",
        7 => "Dealer",
        8 => "Agent"
    ],

    'tradePartnerChannels' => [
        2 => "DSA",
        3 => "Reseller",
        4 => "MLM",
        6 => "C & F",
        8 => "Agent",
        9 => "Channel Partner",
        10 => "Agency Partner",
        11 => "Affiliate Partner",
    ],

    'dealerAndDistributorChannels' => [
        5 => "Distributor",
        7 => "Dealer",
    ],

    'sizeArray' => [
        "Sq.Ft." => "Sq.Ft.",
        "Sq.mt." => "Sq.mt."
    ],

    'propertyFloorAreaMin' => [
        "50" => "50",
        "100" => "100",
        "200" => "200",
        "300" => "300",
        "400" => "400",
        "500" => "500"
    ],

    'propertyFloorAreaMax' => [
        "50" => "50",
        "100" => "100",
        "200" => "200",
        "300" => "300",
        "400" => "400",
        "500" => "500",
        "1000" => "1000",
        "1500" => "1500",
        "2000" => "2000",
        "2500" => "2500",
        "3000" => "3000",
        "5000" => "5000"
    ],

    'membershipPlanMonth' => [
        1 => "1 Month",
        3 => "3 Months",
        6 => "6 Months",
        9 => "9 Months"
    ],

    'propertyType' => [
        "Domestic" => "Domestic",
        "Commercial" => "Commercial"
    ],

    'masterfranchiseType' => [
        1 => 'Unit',
        2 => 'MultiUnit',
        3 => 'Unit, Multiunit'
    ],

    'CategoryImageArr' => [
        1 => "beauty.svg",
        2 => "food.svg",
        3 => "edu.svg",
        5 => "dealer.svg",
        6 => "business.svg",
        7 => "home.svg",
        8 => "auto.svg",
        9 => "retail.svg",
        10 => "fashion.svg",
        11 => "sports.svg",
        263 => "hotel.svg",
        //573 => "industrial.svg"
    ],

    'CategoryArr' => [
        8 => "Automotive",
        1 => "Beauty & Health",
        6 => "Business Services",
        5 => "Dealers & Distributors",   
        3 => "Education",
        10 => "Fashion",
        2 => "Food And Beverage",
        7 => "Home Based Business",
        263 => "Hotel, Travel & Tourism",
        9 => "Retail",
        11 => "Sports, Fitness & Entertainment",
        //573 => "Industrial Machinery & Manufacturing"
    ],

    'subCategoryArr' => [
        "1" => array(
            "13" => "Beauty Aesthetics & Supplies",
            "14" => "Health Care",
            "538" => "Wellness"
        ),

        "2" => array(
            "424" => "Bakery, Sweets & Ice Cream",
            "421" => "Cafe & Parlors",
            "425" => "Catering & Food Ordering",
            "16" => "Food & Beverage",
            "422" => "Quick Bites",
            "423" => "Restaurant & Night Clubs",
        ),

        "3" => array(
            "19" => "Coaching & Tutoring",
            "17" => "Early Education",
            "264" => "Education Consultants",
            "269" => "Education Services",
            "20" => "Higher Education",
            "18" => "K-12 Education",
            "22" => "Online Education",
            "21" => "Vocational Training",
        ),

        "5" => array(
            "24" => "Dealers & Distributors",
            "445" => "Fashion & Apparel",
            //"476" => "FMCG",
            //"954" => "Resellers",
            //"955" => "Others"
            "787" => "Agriculture",
            "443" => "Automobile",
            "477" => "Building & Construction",
            "770" => "Computer Hardware, Mobile & Accessories",
            "950" => "Education",
            "909" => "Electronics & Electricals",
            "896" => "Environment & Pollution",
            "805" => "Fashion & Apparel",
            "868" => "Food & Beverage",
            "846" => "Health & Beauty",
            "444" => "Health-care, Medical, Pharma & Drugs",
            "479" => "Home Supplies",
            "925" => "Industrial Machinery",
            "738" => "Industrial Supplies",
            "780" => "Medical & Hospital Supplies",
            "478" => "Office Supplies",
            "860" => "Security & Protection",
            "761" => "Sports, Fitness & Entertainment",
            //Adding new categories by pankaj
            "1001"=>"Business Services",
            "1002"=>"Chemicals",
            "1003"=>"Furniture",
            "1004"=>"Hotel supplies & Equipments",
            "1005"=>"Jewellery, Gemstones & Astrology",
            "1006"=>"Packaging, Paper & Plastic Products",
            "1007"=>"Pharmaceuticals",
            "1008"=>"Printing & Publishing",
            "1009"=>"Retail & E-Retail",
            "1010"=>"Scientific & Laboratory Instruments",
            "1011"=>"Telecommunications",
            "1012"=>"Textile, Fabrics & accessories",
            "1013"=>"Toys & Games",
            "1014"=>"Machinery, Machine Tools & Equipments",
        ),

        "6" => array(
            "23" => "Advertisement & Media Services",
            "31" => "Consultancy",
            "27" => "Financial",
            "30" => "Household Services",
            "26" => "IT Services",
            "25" => "Logistics",
            "154" => "Real Estate",
            "28" => "Travel",
            "407" => "Waste Management & Recycling Services",
        ),

        "7" => array(
            "276" => "Beauty & Fitness",
            "281" => "Business Services",
            "32" => "Home Based Businesses",
            "277" => "Home Based Food Preparation",
            "278" => "Home Based Manufacturing",
            "279" => "Home Based Tutoring",
            "275" => "Home Care Services",
            "280" => "Repair Services",
            "274" => "Technology Related",
        ),

        "8" => array(
            "344" => "Automobile Related",
            "343" => "Commercial Vehicles",
            "342" => "Four Wheeler",
            "341" => "Two Wheeler",
        ),

        "9" => array(
            "36" => "Books, Toys & Gifts",
            "34" => "Consumer Durables & It",
            "39" => "E-Retail",
            "556" => "Fashion",
            "38" => "Home & Office",
            "35" => "Supermarkets & Marts",

        ),

        "10" => array(
            "44" => "Accessories",
            "40" => "Clothing",
            "41" => "Footwear",
            "42" => "Jewellery",
            "43" => "Luxury/Premium",
        ),

        "11" => array(
            "45" => "Entertainment & Leisure",
            "37" => "Sports Goods & Fitness Stores"
        ),

        "263" => array(
            "15" => "Hotels & Resorts",
            "379" => "Taxi & Rental",
            "380" => "Tourism Services"
        ),

        "573" => array(
            "585" => "CNC Machinery, Lathe & Tools",
            "590" => "Construction Machinery",
            "575" => "Cranes",
            "576" => "Drilling & Boring",
            "586" => "Elevators & Escalators",
            "588" => "Farming Tools & Equipment",
            "582" => "Food Processing Plant & Machinery",
            "592" => "Hospital Equipments",
            "580" => "Hydraulic Machinery",
            "577" => "Industrial Furnaces & Owen",
            "591" => "Jewellery Machinery",
            "46" => "Manufacturing",
            "589" => "Packaging Tools & Machinery",
            "583" => "Pharmaceutical Machinery",
            "584" => "Pollution Control Machinery",
            "574" => "Printing & Equipments",
            "579" => "Textile, Garment Machinery & Equipment",
            "587" => "Vending Ending & Dispensary Machines",
            "578" => "Water Treatment & Purifying Plant",
            "581" => "Welding Equipment & Machinery",
        )
    ],

    'subSubCategoryArr' => [
        "13" => array(
            "539" => "Bath Products",
            "540" => "Beauty Equipments",
            // "47" => "Beauty Salons",
            "47" => "Beauty Salons/ Unisex Salons/ Spa",
            "541" => "Cosmetic Accessories",
            "49" => "Cosmetics & Beauty Product Stores",
            "50" => "Pet Grooming",
            "48" => "Tattoo, Piercing & Nail Art",
        ),
        "14" => array(
            "62" => "Ayurvedic, Herbal & Organic Products",
            "56" => "Clinics & Nursing Homes",
            "59" => "Healthcare Products",
            "57" => "Hospitals",
            "63" => "Others Health Care & Fitness",
            "51" => "Pathological Labs",
            "58" => "Pharmacies",
        ),
        "538" => array(
            "61" => "Diet Consultancy",
            "52" => "Gyms And Fitness Centres",
            "55" => "Massage Centres",
            "54" => "Medical Spas/Med Spas/Medi Spas",
            "542" => "Meditation Centre",
            "543" => "Physiotherapy Centre",
            "60" => "Slimming Center",
            "53" => "Spas",
            "544" => "Yoga Classes",
        ),
        "15" => array(
            "393" => "Booking & Accomodation",
            "65" => "Guest House / Service Apartments",
            "67" => "Hotel Chain",
            "260" => "Hotel Supplier",
            "66" => "Motels And B&B",
            "394" => "PG Services",
            "64" => "Resort",

        ),
        "379" => array(
            "381" => "Bus Rental",
            "549" => "Cab Services",
            "548" => "Car Rental Services",
            "383" => "Chauffer / Driver Services",
            "384" => "Corporate Charter Services",
            "382" => "Ticketing Services",
        ),
        "380" => array(
            "390" => "Adventure Tourism",
            "391" => "Business Tourism",
            "389" => "Holiday Services",
            "388" => "Honeymoon Services",
            "385" => "Online Travel Services",
            "387" => "Passport & Visa Services",
            "392" => "Tour Packages",
            "386" => "Travel Agents",
        ),
        "16" => array("972" => "Hotel Equipment and Supplier", "84" => "Others Food Service"),
        "421" => array("426" => "Juices / Smoothies / Dairy Parlors", "427" => "Tea And Coffee Chain"),
        "422" => array(
            "429" => "Express Food Joints / Drive Through",
            "430" => "Mobile Vans & Food Trucks",
            "724" => "Pizzeria",
            "428" => "Quick Service Restaurants",
        ),
        "423" => array(
            "435" => "Bars, Pubs & Lounge",
            "432" => "Casual Dine Restaurants",
            "431" => "Fine Dine Restaurants",
            "433" => "Multi Cuisine Restaurant",
            "434" => "Theme Restaurants",
        ),
        "424" => array(
            "437" => "Bakery & Confectionary",
            "439" => "Chocolate Stores",
            "436" => "Ice Creams & Yogurt Parlors",
            "438" => "Snacks / Namkeen Shops",
            "440" => "Sweetshop",
        ),
        "425" => array("441" => "Catering", "442" => "Online Food Ordering Services"),
        "17" => array(
            "86" => "Activity Centres, Day Care & Creches",
            "87" => "After School Activities",
            "85" => "Preschools"
        ),
        "18" => array("261" => "Extra Curriculum Activities", "88" => "Schools"),
        "19" => array(
            "733" => "CAD/CAM/CAE & Multimedia",
            "89" => "Competitive Exam Coaching Institute",
            "90" => "Online Coaching",
            // "91" => "Robotics & Technical Training",
            "91" => "Robotics & Technical Training/ AI",
            "92" => "School Tutoring",
        ),
        "20" => array(
            "94" => "Degree/Diploma Colleges",
            "96" => "Distance Learning Centres",
            "93" => "Professional Education Colleges",
            "95" => "Universities (including Overseas Franchises)",
        ),
        "21" => array(
            "104" => "Aviation & Hospitality Training Institute",
            "98" => "BPO/KPO Training Institutes",
            "103" => "Banking & Insurance Training Institute",
            "102" => "Beauty & Wellness Training Institute",
            "100" => "Financial Advisory",
            "723" => "HR Certification Institute",
            "99" => "IT Education",
            "97" => "Language Schools",
            "106" => "Other Vocational Training",
            "968" => "Paramedical/Medical Training",
            "101" => "Retail Training Institutes",
            "105" => "Skills / Personality Development",
        ),
        "22" => array(
            "536" => "Certification Course Coaching",
            "535" => "College/University Distance Education",
            "534" => "Corporate Training",
            "532" => "Entrance Examination Coaching",
            "533" => "Foreign Language Coaching",
            "107" => "Online Learning/E-learning",
            "108" => "Other Online Education",
            "537" => "Professional Education Coaching",
        ),

        "23" => array(
            "113" => "Ad Agencies & Collection Centres",
            "110" => "Digital Media & Internet Marketing",
            "112" => "Public Relations (PR)",
            "111" => "Publications & Print Media",
            "109" => "TV Channel/Network",
        ),

        "24" => array(
            "114" => "Beauty & Health Sub",
            "122" => "Building & Construction Material",
            "117" => "Clothing",
            "119" => "Computer Hardware & IT",
            "115" => "Electronics And Electrical Components",
            "121" => "FMCG",
            "124" => "Home Products",
            "123" => "Kids & Infant Products",
            "118" => "Mobile & Communication",
            "126" => "Others Dealers And Distributors",
            "125" => "Resellers",
            "120" => "Security",
            "272" => "Solar Energy And Components",
            "737" => "Sports, Fitness & Entertainment",
        ),

        "443" => array(
            "450" => "Automobile Accessories",
            "735" => "Automobile Maintenance",
            "451" => "Automotive Electrical Parts",
            "446" => "Automotive Parts And Components",
            "803" => "Commercial Vehicles & Parts",
            "736" => "Electric Vehicles",
            "448" => "Engine, Engine Components, Spare Parts",
            "456" => "GPS Navigation & Tracking System",
            "802" => "Oil & Lubricants",
            "447" => "Tyre, Tube, Accessories",
            //"449" => "Battery And Accessories",
            //"452" => "Two Wheeler Showrooms",
            //"453" => "Four Wheeler Showrooms",
            //"454" => "Heavy Vehicle Showrooms & Dealership",
            "455" => "Automobile Resellers",
            //"801" => "Parking Systems",
            //subcate id created by pankaj
            "1027" => "Four Wheeler & Parts",
            "1028" => "Garage & Service Station Equipment",
            "1029" => "Parking System",
            "1030" => "Three Wheeler & Parts",
            "1031" => "Two Wheeler & Parts",
            "1032" => "Used Auto Parts",
        ),

        "444" => array(
            "461" => "Herbal, Ayurvedic, Homeopathic & Natural Care Products",
            "459" => "Skincare Products",
            //"457" => "Pharmaceutical Shop",
            //"458" => "Hospital Related Medical Products",
            "460" => "Healthcare & Medical Products",
            //"462" => "Surgical Instruments",
            // "463" => "Laboratory Equipment & Instruments",
        ),

        "805" => array(
            "808" => "Baby & Kids Wear",
            "820" => "Denim-Garments, Fabrics & Bags",
            "810" => "Ethnic Wear",
            "814" => "Fabric & Accessories",
            "813" => "Fashion Accessories",
            "818" => "Footwear",
            "821" => "Jewellery",
            "806" => "Mens Wear",
            "473" => "Undergarments, Lingerie, Nightwear",
            "807" => "Women Wear",
            //"811" => "Winter Wear-Woolen Closthing , Winter",
            //"812" => "Traditional Wear",
            "815" => "Socks & Stockings",
            //"816" => "Neck Ties & Bow Ties",
            //"817" => "Gloves & Mittens",
            "819" => "Shoes Material & Accessories",
            //"469" => "Fashion Jewellery",
            "472" => "Denim - Garments, Fabrics, Bags",
            "809" => "Athletic Wear",
            //"958" => "Others"
            //category id created by pankaj
            "1096" => "Animal Clothing & Accessories",
            "1097" => "Dummies & Mannequins",
            "1098" => "Military & Defence Supplies",
            "1099" => "Party, Wedding, Western & Formal Wear",
            "1100" => "Scarves, Shawls, Stoles & Bandanas",
            "1101" => "Towels, Napkins & Handkerchiefs",
            "1102" => "Uniforms & Workwear",
            "1103" => "Wallets, Handbags & Backpacks",
            "1104" => "Winter Wear",
            "1105" => "Yarns & Threads",

        ),

        "476" => array(
            "496" => "Ayurvedic Products",
            "491" => "Bakery Products",
            "486" => "Beauty Cosmetics",
            "492" => "Chocolates",
            "487" => "Consumer Electronics",
            "493" => "Dairy Products",
            "482" => "Drinking Water Supply",
            "489" => "Energy Drinks",
            "481" => "Healthcare Products",
            "488" => "Home Appliances",
            "485" => "Medical Products",
            "959" => "Others",
            "483" => "Packaged Food Products & Supply",
            "490" => "Religious (Pooja) Products",
            "495" => "Rural Products",
            "484" => "Sanitation Products",
            "480" => "Tea Coffee Products",

        ),

        "477" => array(
            "825" => "Bathroom & Toilet Accessories & Fittings",
            "502" => "Bricks & Cement & Sand Supplies",
            "831" => "Builder & Construction Hardware",
            "500" => "Building Architecture",
            "499" => "Building Decoration Products",
            "826" => "Doors/Wooden Door Panels",
            "504" => "Furnishing & Wood Works",
            "824" => "Paints & Allied Products",
            "830" => "Tiles",
            //"497" => "Construction / Earthmoving Machinery",
            //"498" => "Swimming Pool Construction",
            //"503" => "Steel Supplies",
            //"501" => "Piping Electrical & Wiring",
            //"822" => "Electric Fittings & Accessories",
            //"823" => "Contruction/Earth Moving Machinery",
            //"827" => "Timber, Timber Products & Plank",
            //"828" => "Lime & Lime Products",
            //"829" => "Wall Materials",
            "832" => "Building Coating",
            "833" => "Fireproof/Flameproof Materials",
            //"834" => "Soundproof Materials",
            //"835" => "Building Ceramics",
            "836" => "Construction Equipments",
            //"837" => "Fooring/Ceiling",
            //"838" => "Granite"
            //categoryid created by pankaj,
            "1033" => "Building panel & Cladding Materials",
            "1034" => "Ceramic, Glass & Verified Tiles",
            "1035" => "FRP Lining, PU & Powder Coating",
            "1036" => "Gazebos, Awnings, Canopies & Sheds",
            "1037" => "Landscape Structure & Designing",
            "1038" => "Marble, Granite & Stones",
            "1039" => "Metals & Minerals",
            "1040" => "Prefabricated Houses & Structures",
            "1041" => "PVC, CPVC, HDPE Water Pipe Fittings",
            "1042" => "PVC, LDPE, HDPE & Plastic Sheets",
            "1043" => "Scaffolding Pipes & Fittings",
            "1044" => "Surface Coating & Paint Equipment",
            "1045" => "Waterproof Materials",
            "1046" => "Wood, Plywood, Timber & laminates",


        ),
        "1001" => array(
            "1047" => "Architecture & Interiors",
            "1048" => "Banking & ATMs",
            "1049" => "Business & Audit Services",
            "1050" => "Call Center & BPO Services",
            "1051" => "Contractors & Freelancers",
            "1052" => "Digital Marketing Services",
            "1053" => "Event Planner & Organizer",
            "1054" => "Export Import",
            "1055" => "Financial & Legal Services",
            "1056" => "Flooring/Ceiling",
            "1057" => "Foreign Exchange",
            "1058" => "Housekeeping Services",
            "1059" => "IT & Telecom Services",
            "1060" => "Product Rental & Leasing",
            "1061" => "R&D and Testing Labs",
            "1062" => "Real Estate",
            "1063" => "Software development & IT Consultants",
            "1064" => "Transportation & Logistics",
            "1065" => "Travel, Tourism & Hotels",
            "1066" => "Web Designing & Development Services",

        ),
        "1002" => array(
            "1067" => "Adhesives, Glue & Sealants",
            "1068" => "Fertilizers & Soil Additives",
            "1069" => "Industrial Chemicals & Supplies",
            "1070" => "Insecticides & pesticides",
            "1071" => "Natural & Synthetic Resins",
            "1072" => "Natural, Medical & Industrial Gases",
            "1073" => "Organic & Inorganic Solvents",
            "1074" => "Petroleum and Petro Chemical Products",
            "1075" => "Waterproofing Chemicals",

        ),
        "1003" => array(
            "1116" => "Bamboo Furniture",
            "1117" => "Doors & Windows",
            "1118" => "Furniture Fittings & Fixtures",
            "1119" => "Hotel, Restaurant & Cafeteria Furniture",
            "1120" => "Leather Furniture",
            "1121" => "Metal Furniture",
            "1122" => "Office, School & Commercial Furniture",
            "1123" => "Retail Display Stands & Fixtures",
            "1124" => "Wooden Sofa, Wardrobes & Furniture",

        ),
        "1004" => array(
            "1135" => "Bakery Machines & Equipments",
            "1136" => "Barbecue & Outdoor Cooking Equipments",
            "1137" => "Barware & Bar Accessories",
            "1138" => "Commercial Kitchen Equipments",
            "1139" => "Food Processing Machines & cooking equipments",
            "1140" => "Hotel Appliances",
            "1141" => "Ice Buckets & Machines",
            "1142" => "Restaurant Equipments",

        ),
        "1005" => array(
            "1156" => "Artificial & Fashion Jewellery",
            "1157" => "Gold, Silver & Precious Jewellery",

        ),
        "1006" => array(
            "1177"=>"Food Packaging Material & Supplies",
            "1178"=>"Packaging & Labeling Services",
            "1179"=>"Packaging & Lamination Tools & Machinery",
            "1180"=>"Packaging Material & Supplies",
            "1181"=>"Packaging Pouches & Envelops",
            "1182"=>"Plastic Boxes, Bags",
            "1183"=>"Plastic Containers & Pet Bottles",
            "1184"=>"Plastic Raw Material",
            "1185"=>"Woven & Non Woven Bags",
        ),
        "1007" => array(
            "1186"=>"Cancer, TB, Tumor Drugs",
            "1187"=>"Common Medicines & Drugs",
            "1188"=>"Flavours & Frangrances",
            "1189"=>"Generic Drugs & Pharmaceuticals",
            "1190"=>"Neutraceuticals & Dietary Supplements",
            "1191"=>"Pain Relief Drugs & Medicines",
            "1192"=>"PCD Pharma",
            "1193"=>"Pediatric Medicines",
            "1194"=>"Pharmaceutical Ointments & Creams",
            "1195"=>"Respiratory System Drugs",
        ),
        "1008" => array(
            "1196"=>"Banners, Signboards, Nameplates & Flex",
            "1197"=>"Branding & Advertising Agencies",
            "1198"=>"Film & Media Production Services",
            "1199"=>"Metal, Plastic & Industrial Printing",
            "1200"=>"Offset Printing Machines",
        ),
        "1009" => array(
            "1201"=>"Books, Toys & Gifts",
            "1202"=>"Consumer Durables & IT",
            "1203"=>"E-Retail",
            "1204"=>"Fashion",
            "1205"=>"Home & Office",
            "1206"=>"Supermarkets & Marts",
        ),
        "1010" => array(
            "1207"=>"Cleanroom Equipments & Supplies",
            "1208"=>"Compass, Telescopes & Survey Tools",
            "1209"=>"Scientific Instruments & Devices",
        ),
        "1011" => array(
            "1229"=>"Telecom Services, Engg & Maintenance",
            "1230"=>"Telecommunication equipment & parts",
            "1231"=>"Wireless Communication Devices",
        ),
        "1012" => array(
            "1232"=>"Apparel Fabrics & Dress Material",
            "1233"=>"Fabrics & Accessories",
            "1234"=>"Handloom products",
            "1235"=>"Industrial Fabrics & Textile",
            "1236"=>"Sewing Thread, Laces & accessories",
            "1237"=>"Textile and Garments Machinery & equipments",
            "1238"=>"Textile, Dyeing & Finishing Chemical",

        ),
        "1013" => array(
            "1239"=>"Amusement Games & Equipments",
            "1240"=>"Electrical and Battery opertaed Toys",
            "1241"=>"Figure Toys & Vehicle Toys",
            "1242"=>"Plastic & Wooden Toys",
            "1243"=>"Stuffed Toys",
            "1244"=>"Toy Accessories",
            "1245"=>"Toy Cars & Bikes",

        ),
        "1014" => array(
            "1158" => "Cleaning Machines & Equipments",
            "1159" => "Horticulture, Gardening & Irrigation Machinery",
            "1160" => "Ice Cream Plants",
            "1161" => "Marking & Coding",
            "1162" => "Sewing, Knitting & Embroidery Machines",
            "1163" => "Tyres Repair & Retreading Machinery",
            "1164" => "Water & Air Purifiers",

        ),


        "478" => array(
            "508" => "Electrical Equipments",
            "843" => "Office Equipmet & Supplies",
            "507" => "Office Furniture",
            "505" => "Office Stationery",
            "839" => "Paper & Paper Boards",
            "506" => "Printers & Scanners",
            //"509" => "Electronic Equipments",
            //"510" => "Phone & Connectivity",
            //"511" => "Storage & Package Materials",
            //"512" => "Security & Surveillance Products",
            "513" => "Inverter & UPS ower System",
            //"840" => "Fax Machines & Photocopiers",
            //"841" => "Projectors",
            //"842" => "Video Conferencing Equipments",
            "844" => "Finger Scanning Machine",
            //"845" => "Printing Paper",
            //category id created by pankaj,
            "1170" => "Billing Machines",
            "1171" => "Books",
            "1172" => "Educational Aids",
            "1173" => "Newspaper, Books & Magazines",
            "1174" => "Photography & Film Making Equipments",
            "1175" => "School Stationery",
            "1176" => "Study material & Note Books",

        ),

        "479" => array(
            "894" => "Bags & Luggage",
            "526" => "Bed Linen Bed Sheet, Pillow Cover, Quilts",
            "521" => "Cutlery, Crockery & Tableware",
            "520" => "Electric Fittings & Accessories",
            "528" => "Handicraft Products",
            "890" => "Home Cleaning Products",
            "889" => "Home Furnishing ",
            "888" => "Home Furniture",
            "514" => "Household & Consumer Products",
            "518" => "Kitchen Appliances / Cookware",
            "529" => "Religious Products",
            "530" => "LPG Distributors",

            "515" => "Lamps, Bulbs & Lighting",
            //"516" => "Builders Hardware - Knobs, Handles, Fittings",
            //"517" => "Furniture For Household Bed, Modular Kitchen",
            "519" => "Pipes And Pipe Fittings",
            //"522" => "Air Conditioners & Refrigerators",
            //"523" => "Solar Equipments",
            //"524" => "Doors, Windows, Floorings, Panels, Laminates",
            //"525" => "Plumbing, Sanitary Ware And Bathroom Fittings",
            //"527" => "Inverters, UPS & Battery Charger",
            //"531" => "Security & Surveillance Products",
            "887" => "Home Decoration Items",
            "891" => "Laundry Products",
            "892" => "Disposables",
            //"893" => "Pest Control Products",
            //"895" => "Kitchen Utensils"
            //category id created by pankaj,,
            "1129" => "Aqua Culture, Aquarium & Supplies",
            "1130" => "Domestic Water and Air Purifiers & Filters",
            "1131" => "Gifts, Crafts, Handicrafts & Artifacts",
            "1132" => "Mirrors & Glasswares",
            "1133" => "Mosquito & Insect Repellent",
            "1134" => "Musical equipments & Accessories",

        ),

        "738" => array(
            "754" => "Energy Management Systems",
            "753" => "Fibre Glass Products",
            "746" => "Hardware & Tools",
            "964" => "Packaging Material",
            "965" => "Printing Material",
            "760" => "Solar Energy & Components",
            "739" => "Rubber & Rubber Products",
            "740" => "Bearing Parts & Components",
            "741" => "Acoustic Products",
            //"742" => "Abrasives",
            "743" => "Air Compressors",
            "744" => "Conveyor & Conveyor/Industrial Belts",
            "745" => "Material Handling Equipments",

            "747" => "Cooling Tower & Chilling Plants",
            //"748" => "Gear Boxes, Reduction Gears & Gear Cutting",
            //"749" => "Fasteners",
            "750" => "Filters-Air, Gas & Liquid",
            "751" => "Dies & Moulds",
            //"752" => "Pumps & Pumping Equipments",

            //"755" => "Draught Fans",
            "756" => "Boilers, Components & Spares",
            "757" => "Industrial Blowers",
            "758" => "Weighing Scales",
            "759" => "Plastic Pet Products",
            //category id created by pankaj,
            "1143" => "Drills, Grinders, Saws & Power Tools",
            "1144" => "Dryers & Evaporators",
            "1145" => "Freezers, Refrigerators & Chillers",
            "1146" => "Industrial & Engineering Goods",
            "1147" => "Industrial Racks & Storage System",
            "1148" => "Laundry Equipments",
            "1149" => "Lubrication System & Equipments",
            "1150" => "Painting & Coating Equipments & Services",
            "1151" => "Seals, Oil Seals & Industrial Seals",
            "1152" => "Steel & Stainless Steel Products",
            "1153" => "Steel & Steel Products",
            "1154" => "Steel Bars, Rods, Plates & Sheets",
            "1155" => "Storage Tanks, Drums & Containers",
            "1169" => "Pumps, Pumping Machine & Equipments",

        ),

        "761" => array(
            /*"762" => "Fitness Equipment",
            "763" => "Sports Equipment",
            "764" => "Gym Equipment",
            "765" => "Trophies & Souvenir Momentoes",
            "766" => "Amusement Games & Equipments",
            "767" => "Camping Equipments",
            "768" => "Musical Instruments",
            "769" => "Meat & Poultry",
            "961" => "Others"*/
        //category id created by pankaj,
            "1219"=>"Adventure Sporting & Tracking Goods",
            "1220"=>"Awards, Trophies & Memetoes",
            "1221"=>"Fitness and Gym Equipments",
            "1222"=>"Playground Equipments",
            "1223"=>"Sports Bags, Duffel Bags & Kit Bags",
            "1224"=>"Sports Goods & Equipments",
            "1225"=>"Sports Safety Products & Equipments",
            "1226"=>"Sports Wear & Athletic Accessories",
            "1227"=>"Swimming Pool and water Sports Goods & Accessories",
            "1228"=>"Swimming Pool Construction & Material",

        ),

        "770" => array(
            "775" => "Computer Cable & Connectors",
            "773" => "Computer Parts & Accessories",
            "774" => "Mobile Accessories",
            "777" => "Software",
            "771" => "Printer Parts & Accessories",
            "772" => "Server & Work Station",

            //"776" => "UPS & Power Supply",
            "778" => "Drives & Storage Devices",
            //"779" => "Mobile Handset",
            //category id created by pankaj
            "1076" => "CAD CAM Design & Consultancy",
            "1077" => "Computer & Mobile Softwares & Apps",
            "1078" => "Computer IT & Software Training",
            "1079" => "Office Automation Products & Devices",
            "1080" => "Routers, Cables & Networking Devices",
            "1081" => "Web development & Marketing Services",

        ),

        "780" => array(
            "781" => "Hospital Equipments",
            "784" => "Laboratory Equipments & Instruments",
            "782" => "Medical Equipments",
            //"783" => "Surgical Instruments",
            "785" => "Surgical Dressings & Disposables",
            "786" => "Hospital Furniture",
            //category id created by pankaj,
            "1165" => "Face Mask & Medical PPE Kits",
            "1166" => "Medical & Surgical Clothing",
            "1167" => "Orthopaedic & Surgical Instruments",

        ),

        "787" => array(
            //"788" => "Fertilisers",
            "789" => "Poultry Feed Supplements",
            "790" => "Agro Products & Commodities",
            "791" => "Rural Products",
            "792" => "Fodder & Feed Additives",
            "793" => "Frozen & Dried Fruit",
            //"794" => "Nematicides",
            "795" => "Plant Extract",
            "796" => "Plant, Flower & Dried Flowers",
            //"797" => "Grain",
            //"798" => "Eggs",
            //"799" => "Cereals"

            //Sub cat id created by pankaj
            "1021" => "Farming Tools, equipments & Machines",
            "1022" => "Fishery",
            "1023" => "Fishery Products",
            "1024" => "Greenhouse Supplies & Equipments",
            "1025" => "Seeds & Plant Saplings",
            "1026" => "Tractor, Tractor Parts & Assemblies",

        ),


        "846" => array(
            "850" => "Bath Products",
            "848" => "Cosmetics",
            "853" => "Hair Care Products",
            "855" => "Healthcare & Medical Products",
            "854" => "Herbal, Ayurvedic, Homeopathic & Natural Care Products",
            "849" => "Perfumes & Fragrances",
            "852" => "Personal Care Products",
            "859" => "Sanitation Products",
            "847" => "Skincare Products",

            //"851" => "Beauty Equipments",
            "856" => "Anti Infective Drugs & Medicines",
            "857" => "Veterinary Medicines",
            "858" => "Weight Loss/Gain Products",
            //"464" => "Personal Care Products",
            //"468" => "Fragrances & Perfumes"
            //category id created by pankaj,
            "1125" => "Contraceptives & Condoms",
            "1126" => "Essential & Aromatic Oils",
            "1127" => "Salon, Spa Kits & equipments",
            "1128" => "Soap, Detergent Powder & Cakes",

        ),

        "860" => array(
            "861" => "Fire Fighting & Fire Protection Equipments",
            "862" => "Surveillance Equipments",
            //"863" => "Personal Safety Equipments",
            //"864" => "Security Fencing",
            //"865" => "Access Control Cards",
            "866" => "Anti Theft Products",
            "867" => "Roadway Safety",
            //"960" => "Others",
            //"970" => "Life Saving Products & Equipments"
            //category id created by pankaj,
            "1210"=>"Biometrics & Access Control Cards",
            "1211"=>"CCTV Camera, Surveillance Equipments & Parts",
            "1212"=>"Door Lock, Electronic Locks and Latches",
            "1213"=>"Intelligence & Spying Devices",
            "1214"=>"Life Safety Equipments",
            "1215"=>"Residential & Commercial security",
            "1216"=>"Safety Equipment & Systems",
            "1217"=>"Surveillance Equipments & Parts",
            "1218"=>"Vehicle Security System & Protection Device",

        ),

        "868" => array(
            "883" => "Beverages",
            "874" => "Confectionery & Bakery Products",
            "886" => "Cooking Oil",
            "876" => "Dairy Products",
            "870" => "Drinking Water ",
            "873" => "Energy Drinks",
            "872" => "Packaged Food Products",
            "881" => "Snacks",
            "885" => "Spices ",
            "869" => "Tea & Coffee Products",

            "877" => "Meat & Poultry",
            "878" => "Frozen & Dried Fruit",
            "879" => "Pickles & Murabba",
            //"880" => "Honey Products",
            //"875" => "Chocolates",

            //"871" => "Healthcare Products",
            "882" => "Mouth Freshers",
            "884" => "Saffrons",
            "1106" => "Chocolates, Biscuits & Cookies",
            "1107" => "Edible Oil & Allied Products",
            "1108" => "Flour",
            "1109" => "Milk & Dairy Products",
            "1110" => "Namkeen & Snacks",
            "1111" => "Organic Food",
            "1112" => "Ready to Eat & Instant Food Mixes",
            "1113" => "Rice, Cereals, Food Grains & Pulses",
            "1114" => "Sugar & Sweeteners",
            "1115" => "Sweets & Deserts",

        ),

        "896" => array(
            /*"897" => "Solar Panels",
            "898" => "Solar Lights",
            "899" => "Air Curtains",
            "900" => "Pollution Control & Monitoring Equipments",
            "901" => "Air Cleaning Equipments",
            "902" => "Ozone Generators",
            "903" => "Air Blowers",
            "904" => "Waste Management Plants",
            "905" => "Water Treatment Plants",
            "906" => "Air Distribution Products",*/
            "907" => "Solar Products",
            "901" => "Air Cleaning Equipments",
            "899" => "Air Curtains",
            "906" => "Air Distribution Products",
            //"908" => "Solar Energy & Components",
            "966" => "Eco Friendly Products",
            "900" => "Pollution Control & Monitoring Equipments",
            "898" => "Solar Lights",
            "904" => "Waste Management Plants",
        ),

        "909" => array(
            "919" => "Chargers",
            "915" => "Consumer Electronics",
            "921" => "Electronic Instruments",
            "911" => "Electronic Products & Components",
            "912" => "Energy Saving Devices",
            "924" => "Inverters, UPS & Battery Chargers",
            "916" => "LED Lights",
            "913" => "Lighting Products & Components",
            "910" => "Wires, Cables & Accessories & Conductors",

            //"914" => "Decorative Lights",

            //"917" => "Bulbs & Tubelights",
            "918" => "Electronic Signs",

            "920" => "Electric Power Tools",
            //"922" => "Solar Lights",
            //"923" => "Electric Fitting & Accessories",
            "967" => "3D Technology",
            //"971" => "Audio & Video Products/Home Theatre",
            //category id created by pankaj
            "1085" => "Batteries, Chargers & Storage Devices",
            "1086" => "Domestic RO water Purifiers & Filters",
            "1087" => "Electronic Security & Safety Systems",
            "1088" => "Generator Parts & Accessories",
            "1089" => "Heater, Thermostat & Heating Devices",
            "1090" => "Home Automation Systems",
            "1091" => "Lantern, Chandeliers & Hanging Lamps",
            "1092" => "Measurig Equipments & Instruments",
            "1093" => "Solar & Renewable Energy Products & Components",
            "1094" => "Transformer & Transformer Components",
            "1095" => "Vaoltage Stabilizers",

        ),

        "925" => array(
            "944" => "Agriculture Machine & Tools",
            "927" => "Cranes & Forklifts",
            "940" => "Farming Tools & Equipments",
            "934" => "Food Processing Plant & Machinery",
            "936" => "Pollution Control Machinery",
            "926" => "Printing Machinery & Equipments",
            "930" => "Water Treatment & Purifying Plant",
            "933" => "Welding Equipment & Machinery",
            "928" => "Drilling & Boring Machinery",
            "929" => "Industrial Furnaces & Ovens",
            "935" => "Pharmaceutical Machinery",
            //"931" => "Textile, Garment Machinery & Equipments",
            "932" => "Hydraulic & Pneumatic Machinery",
            "937" => "CNC & Special Purpose Machinery",
            "938" => "Elevators & Escalators",
            "939" => "Vending & Dipensary Machines",
            //"941" => "Packaging Tools & Machinery",
            "942" => "Construction Machinery",
            //"943" => "Jewellery Machinery",
            "945" => "Paper Converting Machines",
            "946" => "Earth Moving Equipment & Machinery",
            //"947" => "Chemical Processing Machinery",
            //"948" => "Construction Machinery",
            "949" => "Woodworking Machinery",
            //"963" => "Bakery Machines",
            //"962" => "Others"
        ),

        "950" => array(
            "951" => "Educational Material",
            "953" => "School Supplies",
            "952" => "Smart Classes Material",
            //category id created by pankaj
            "1082" => "Digital Education & Smart Class Material",
            "1083" => "Educational, Religious & Cultural Books",
            "1084" => "Projectors, Presentation Board & Accessories",

        ),

        "954" => array(
            "956" => "Resellers"
        ),

        "955" => array(
            "957" => "Others"
        ),

        "25" => array(
            "127" => "Courier & Delivery",
            "404" => "Logistics Outsourcing",
            "405" => "Logistics Technology Provider",
            "402" => "Material Handling & Order Processing",
            "128" => "Supply Chain Management",
            "129" => "Transportation",
            "403" => "Trucking Logistics Services",
            "406" => "Warehousing Services",

        ),
        "407" => array(
            "413" => "Dismantling Services",
            "414" => "Electronic Waste Management Services",
            "420" => "Industrial Waste Treatment",
            "419" => "Landfill Services",
            "412" => "Oil Filtration Services",
            "418" => "Pollution Monitoring",
            "417" => "Scrap Dealers & Management Services",
            "411" => "Solid Waste Management",
            "416" => "Waste Disposal Services",
            "415" => "Waste Management Consultants",
            "409" => "Waste Management Services",
            "410" => "Water Tank Cleaning Services",
            "408" => "Water Treatment & Purification Services",

        ),
        "26" => array(
            "132" => "Cartridge Refilling",
            "131" => "Computer And ICT Services",
            "730" => "Management Software",
            "133" => "Printing Services",
            "130" => "Security Services",
            "134" => "Telecom",
        ),
        "27" => array(
            "552" => "Accounting & Auditing Services",
            "139" => "Equity & Debt Providers",
            "137" => "Finance Advisors & Brokers",
            "555" => "Financial Investment & Trading",
            "140" => "Foreign Exchange (FOREX)",
            "135" => "Insurance",
            "138" => "Microfinance",
            "550" => "Non Banking Financial Company (NBFC)",
            "142" => "Others Financial",
            "141" => "Pawn Brokers",
            "554" => "Payment Solution Services",
            "136" => "Post Office Services",
            "551" => "Tax Consulting Services",
            "553" => "Wealth Management",
        ),
        "28" => array(
            "145" => "Car Rental & Cab Services",
            "146" => "Online Travel Services",
            "147" => "Others Travel",
            "144" => "Tour Packages",
            "143" => "Travel Agents",
        ),
        "30" => array(
            "731" => "Appliance Rental Services",
            "571" => "Electrical & Plumbing Services",
            "567" => "Facility Management",
            "569" => "Gardening Services",
            "572" => "Home Appliances Repair Services",
            "570" => "Home Renovation Services",
            "568" => "Home Safety & Security",
            "151" => "Housekeeping",
            "149" => "Institutional/Facility Cleaning",
            "150" => "Laundry & Dry Cleaning",
            "152" => "Pest Control",
            "148" => "Repair Services",

        ),
        "31" => array(
            "157" => "BPO",
            "153" => "Business",
            "158" => "Career Counseling",
            "155" => "Financial",
            "161" => "HR & Recruitment",
            "160" => "Immigration",
            "401" => "Legal",
            "156" => "Matrimonial",
            "162" => "Others Consultancy",
            "399" => "Real Estate",
            "159" => "Service For SMEs",
            "400" => "Technology",
        ),
        "32" => array(
            "163" => "Astrology & Tarot",
            "166" => "Boutique",
            "164" => "Consulting",
            "167" => "Direct Selling (Door-to-Door Etc.)",
            "168" => "MLM Businesses",
            "169" => "Others Home Based Businesses",
            "165" => "Part Time/Flexi Time Businesses",
        ),
        "33" => array(
            "175" => "Automobile Resellers",
            "170" => "Automobile Showrooms",
            "266" => "Batteries",
            "171" => "Car Wash And Maintenance",
            "176" => "Others Four & Two Wheelers",
            "174" => "Security & Helpline Services",
            "173" => "Tractors And Farming Equipments",
            "172" => "Tyres, Windshields And Car Beauty",

        ),
        "341" => array(
            "345" => "Bicycle",
            "347" => "Bike Maintanance & Repair Services",
            "545" => "Bike Rental",
            "348" => "Bike Reselling",
            "346" => "Bike Showroom",
            "349" => "Bike Wash",
            "351" => "Biker's Accessories",
            // "350" => "Electric Two Wheelers",
            "350" => "Electric Vehicles Two Wheelers (EV)",


        ),
        "342" => array(
            "355" => "Car Exterior Parts",
            "357" => "Car Interior Accessories",
            "354" => "Car Interior Spare Parts",
            "353" => "Car Maintanance & Repair Services",
            "546" => "Car Rental",
            "356" => "Car Reselling",
            "352" => "Car Showroom",
            "358" => "Car Wash / Ceramic Coating / Detailing",
            // "359" => "Electric Four Wheelers",
            "359" => "Electric Vehicles Four Wheelers (EV)",

        ),
        "343" => array(
            "364" => "Agriculture Utility Vehicles",
            "361" => "Commercial Vehicles Bus/Trucks",
            // "725" => "Electric Vehicles (E-Vehicles)",
            "725" => "Commercial Electric Vehicles (EV)",
            "365" => "Off Road / All Terrain Vehicles",
            "360" => "Three Wheeler (Auto) Showroom",
            "363" => "Tractors",
        ),
        "344" => array(
            "262" => "Automobile Accessories",
            "366" => "Automobile Garage Related",
            "367" => "Automobile Maintanance Related",
            "368" => "Automobile Spares / Tyre",
            "973" => "Charging Stations",
            "371" => "Road Safety Equipments",
            "370" => "Security & Helpline Services",
            "369" => "Web Based/Online Platform",
        ),
        "34" => array(
            "178" => "Computers & Peripherals",
            "177" => "Consumer Electronics",
            "180" => "DVD Rentals",
            "179" => "Mobile & Communication/Internet Connections",
            "181" => "Music Equipment & Music Stores",
            "185" => "Other Electronics & Electrical Prod",
            "184" => "Photography",
            "183" => "Web Design & Applications",
        ),
        "35" => array(
            "192" => "Dairy/F&V Stores",
            "187" => "Department & Convenience Stores",
            "190" => "Food Marts",
            "195" => "Gourmet Stores",
            "188" => "Grocery Stores",
            "189" => "Kiosks",
            "193" => "Meat & Chicken Shops",
            "196" => "Organic Products",
            "191" => "Pet Stores",
            "186" => "Superstores",
            "194" => "Wine Shops",
        ),
        "36" => array(
            "197" => "Book Stores",
            "204" => "Candle Stores",
            "732" => "Corporate Gifting",
            "206" => "Deal/Value Stores",
            "207" => "Florists",
            "199" => "Gift Shops & Card Galleries",
            "200" => "Kids/Candy Stores",
            "202" => "Kiosks",
            "205" => "Office Supply Stores",
            "268" => "Party Supplies",
            "203" => "Souvenir Shops",
            "198" => "Stationery Stores",
            "201" => "Toy Shops",

        ),
        "37" => array(
            "372" => "Adventurous Sporting",
            "373" => "Diet Supplimentary",
            "374" => "Fitness Accessories",
            "209" => "Fitness Equipment Stores",
            "208" => "Golf Stores",
            "376" => "Sports Accessories",
            "210" => "Sports Equipment Stores",
            "375" => "Sports Garments",

        ),
        "38" => array(
            "215" => "Art, Craft, Antique & Framing",
            "211" => "Bathroom & Ceramics",
            "221" => "Building Material Stores",
            "213" => "Furniture/Home Decor & Furnishing",
            "220" => "Garden Stores",
            "217" => "Handicrafts",
            "214" => "Hardware Stores",
            "216" => "Home Security",
            "212" => "Kitchen",
            "218" => "Lighting, Electrical & Plumbing",
            "219" => "Painting",
        ),
        "39" => array(
            "223" => "E-Commerce & Related",
            "557" => "Mobile Commerce",
            "222" => "TV/Web Shopping",
        ),
        "556" => array(
            "566" => "Bags & Luggage",
            "564" => "Designer Jewellery",
            "562" => "Fashion Accessories - Men",
            "563" => "Fashion Accessories - Women",
            "565" => "Kids & Children Clothing",
            "558" => "Men's Clothing",
            "559" => "Men's Footwear",
            "560" => "Women's Clothing",
            "561" => "Women's Footwear",
        ),
        "40" => array(
            "228" => "Departmental/Unisex",
            "229" => "Ethnic Stores",
            "225" => "Kids Wear",
            "232" => "Lingerie & Innerwear",
            "337" => "Men Innerwear",
            "226" => "Mens Wear",
            "233" => "Others Clothing",
            "230" => "Readymade",
            "335" => "Sports Wear",
            "224" => "Textiles",
            "227" => "Womens Wear",
            "231" => "Woollens",
        ),
        "41" => array(
            "235" => "Casuals",
            "237" => "Designer",
            "234" => "Formals",
            "238" => "Kids",
            "236" => "Sports",
        ),
        "42" => array(
            "338" => "Diamond & Platinum Wears",
            "240" => "Gems And Stones",
            "239" => "Imitation/Art/Junk Jewellery",
            "241" => "Precious Jewellery",
            "242" => "Time & Writing Instruments",

        ),
        "43" => array("243" => "Designer Wear", "245" => "Luxury Labels", "244" => "Vintage Stores"),
        "44" => array(
            "248" => "Fashion Accessories",
            "339" => "Leather Products (bags, Purses & Belts)",
            "247" => "Luggage, Hand Bags & Backpacks",
            "246" => "Opticians/Eye Wear",
            "340" => "Watches",
        ),
        "45" => array(
            "253" => "Amusement Centres",
            "377" => "Children's Park Amenities",
            "254" => "Clubs",
            "251" => "Kids Entertainment Zones",
            "378" => "Mini Water Park",
            "249" => "Movies (Multiplex)",
            "255" => "Others Entertainment & Leisure",
            "250" => "Sports & Gaming",
            "252" => "Video Game Centres",
        ),
        "46" => array(
            "257" => "Building Material",
            "256" => "Home Furnishings",
            "259" => "Manufacturing & Ancillary",
            "258" => "Welding, Cutting & Allied Processes",
        ),
        "264" => array("265" => "Career Counselling & Brain Programming"),
        "154" => array("267" => "Real Estate Sub"),
        "269" => array("270" => "Education Supplies", "734" => "Mobile Application Services"),
        "274" => array(
            "287" => "Application Designer",
            "282" => "Computer Training",
            "288" => "Data Entry Services",
            "284" => "Internet Blogger",
            "286" => "Software Trainer",
            "289" => "Video Making Services",
            "336" => "Web Based Platform",
            "285" => "Web Designer / Website Developer",
            "283" => "YouTube Blogger",
        ),
        "275" => array(
            "307" => "Cleaning Service",
            "312" => "Day-care Services",
            "310" => "Home Appliance Repair",
            "308" => "Interior Decorator",
            "313" => "Logistics Packers & Movers (inter/intra City)",
            "314" => "Pet Care Services",
            "309" => "Property Management",
            "311" => "Senior Citizen Home Healthcare Services",
        ),
        "276" => array(
            "316" => "Beauty Stylist",
            "317" => "Massage Therapist",
            "315" => "Personal Trainer (fitness/health Recovery)",
            "318" => "Yoga Centre / Trainer",
        ),
        "277" => array(
            "320" => "Bakery Items Preparation",
            "319" => "Ice Cream Making",
            "321" => "Processed Food Manufacturing"
        ),
        "278" => array(
            "324" => "Costume Stitching (Boutique)",
            "330" => "Furniture Works",
            "325" => "Gift Item Making & Selling",
            "331" => "Handicraft Making & Selling",
            "323" => "Jewellery Making",
            "326" => "Jute Bag Making",
            "327" => "Machinery Spare Parts Making",
            "328" => "Paper Bag Making",
            "322" => "Religious (Pooja) Material Manufacturing",
        ),
        "279" => array(
            "334" => "Dance Coaching Classes",
            "332" => "Music Coaching Classes",
            "333" => "School Tutoring",
        ),
        "280" => array(
            "396" => "Computer / Phone Repair",
            "397" => "Electronics Repair",
            "398" => "Home Appliance Repair",
            "395" => "Mechanic Work",

        ),
        "281" => array(
            "290" => "Accountant",
            "292" => "Astrology & Tarot",
            "295" => "Business Planner",
            "300" => "Consulting Services",
            "293" => "Direct Selling (Door-to-Door Etc.)",
            "296" => "Event Planning",
            "302" => "Financial Planner (CFA)",
            "297" => "Freelance Writing / Copy Writer",
            "291" => "Income Tax Filing Services",
            "298" => "Language Translator",
            "305" => "Lawyer & Legal Services",
            "294" => "MLM Businesses",
            "304" => "Matrimonial",
            "306" => "Notary Public",
            "301" => "Part Time / Flexi Time Businesses",
            "303" => "Trading Expert",
            "299" => "Warehousing Services",
        ),
        "574" => array(
            "595" => "Flex Printing Machines",
            "596" => "Newspaper Printing Machine",
            "598" => "Printer Maintenance",
            "594" => "Printing Accessories",
            "593" => "Printing Equipments",
            "597" => "Screen Printing",
        ),
        "575" => array(
            "602" => "Crane Accessories",
            "601" => "Forklifts",
            "600" => "Material Handling Cranes",
            "599" => "Material Lifting Cranes",
            "603" => "Tow Trucks",
        ),
        "576" => array(
            "606" => "Boring Machinery",
            "607" => "Boring Pipes",
            "605" => "Drilling Equipment",
            "604" => "Drilling Materials",
        ),
        "577" => array(
            "612" => "Gas Burner",
            "611" => "Incubator",
            "610" => "Industrial Chimney",
            "609" => "Industrial Furnaces",
            "608" => "Industrial Owen",
        ),
        "578" => array(
            "615" => "Demineralisation Plant",
            "619" => "Desalination Plant",
            "620" => "Mineral Water Package Machine",
            "618" => "Rain Water Harvesting System",
            "613" => "Reverse Osmosis Plants",
            "614" => "Sewage Treatment Plant",
            "616" => "Water Filtration Plant",
            "621" => "Water Quality Monitors",
            "617" => "Water Treatment Plant",

        ),
        "579" => array(
            "626" => "Bleaching Machines",
            "629" => "Clothing Recycling Machine",
            "625" => "Cone Winding Machines",
            "628" => "Machinery Spare Parts",
            "627" => "Textile Curing Machines",
            "623" => "Textile Machine Components",
            "622" => "Textile Machines",
            "624" => "Used Machines",
        ),
        "580" => array(
            "636" => "Hydraulic Actuators",
            "633" => "Hydraulic Bender",
            "638" => "Hydraulic Cutting Machine",
            "637" => "Hydraulic Dampener",
            "634" => "Hydraulic Platforms",
            "630" => "Hydraulic Press",
            "635" => "Hydraulic Trainer Kit",
            "632" => "Parts & Accessories",
            "631" => "Pneumatic Machines",
        ),
        "581" => array(
            "642" => "Welding Accessories",
            "641" => "Welding Cables",
            "639" => "Welding Equipment",
            "640" => "Welding Machine",

        ),
        "582" => array(
            "646" => "Bakery Machine Equipments",
            "647" => "Biscuit Making Machinery",
            "650" => "Chocolate Machinery",
            "651" => "Coffee Making Machinery",
            "645" => "Dairy Equipment",
            "644" => "Food Processing Equipment",
            "652" => "Food Storage Machinery",
            "649" => "Food Storage Plants",
            "656" => "Fruit Juice Making Machinery",
            "654" => "Fruit Processing Machinery",
            "643" => "Home Appliances Manufacturing",
            "648" => "Ice Cream Making Machine",
            "653" => "Soft Drink Making Machinery",
            "655" => "Vegetables Processing Machinery",
        ),
        "583" => array(
            "657" => "Capsule Filling Machinery",
            "664" => "Pharmaceutical Inspection Machinery",
            "659" => "Pharmaceutical Machinery Parts",
            "663" => "Pharmaceutical Machinery Parts & Accessories",
            "661" => "Strip Packing Machinery",
            "658" => "Tablet Making Machine",
            "662" => "Tablet Testing Machinery",
            "660" => "Vial Filling Machinery",
        ),
        "584" => array(
            "665" => "Air Filters & Purifiers",
            "671" => "Garbage Disposal",
            "670" => "Noise Filter & Barrier Systems",
            "669" => "Pest Control Equipment",
            "667" => "Pollution Control Devices",
            "672" => "Solid Waste Compost Plant",
            "666" => "Ventilation Systems",
            "668" => "Waste Water Recycling & Treatment Plant",

        ),
        "585" => array(
            "676" => "CNC Computer Boards",
            "674" => "CNC Parts & Components",
            "675" => "Grinding, Milling & Cutting Machines",
            "673" => "Lathe Machines",
        ),
        "586" => array(
            "679" => "Car Lift/elevators",
            "682" => "Elevator Security Systems",
            "681" => "Moving Walkways",
            "680" => "Parts & Accessories",
            "677" => "Passenger Lifts",
            "683" => "Rope Ways",
            "678" => "Service Lifts",
        ),
        "587" => array(
            "687" => "Beverage Vending Machines",
            "686" => "Food Vending Machines",
            "688" => "Parts & Accessories",
            "689" => "Storage & Dispensaries",
            "685" => "Tea & Coffee Vending Machines",
            "684" => "Water Dispensers",

        ),
        "588" => array(
            "690" => "Agriculture Pipes & Pumps",
            "691" => "Equipments",
            "693" => "Machinery Accessories",
            "692" => "Power Tiller",
        ),
        "589" => array(
            "694" => "Adhesive Applicators",
            "696" => "Bottling Machinery",
            "695" => "Packaging Machine & Equipment",
            "698" => "Packing Material",
            "697" => "Wrapping Machine",
        ),
        "590" => array(
            "699" => "Brick Crusher Machine",
            "701" => "Building Maintenance Unit",
            "702" => "Cement Mixer",
            "703" => "Concrete Equipment",
            "705" => "Concrete Mixers",
            "704" => "Earth Rammers",
            "706" => "Tamping Machine",
            "707" => "Tile Press Machine",
            "708" => "Tiles Grinding Machine",
            "709" => "Truck Mounted Concrete Pumps",
        ),
        "591" => array(
            "712" => "Gold Processing Machine",
            "713" => "Goldsmith Tool",
            "710" => "Jewellery Making Machine",
            "711" => "Jewellery Polishing Machine",
            "714" => "Karat Meter",

        ),
        "592" => array(
            "720" => "Eye Testing Equipment",
            "715" => "Hospital Bed",
            "721" => "Hospital Storage Equipments",
            "717" => "Medical Chairs & Tables",
            "722" => "Medical Syringes",
            "719" => "Medicine Cabinet",
            "718" => "Operation Theatre Equipments",
            "716" => "Strectcher",
        ),
        "968" => array(),
        "445"=>array()
    ],

    // Mobile OTP, SMS URL, Msg template
    'mobile' => array(
        'OtpLength' => 4,
        'SmsUrl' => 'http://smsc.co.in/api/mt/SendSMS?APIKey=897242d1-3ade-4a6f-8f7a-8935c00ce20f&senderid=FranIn&channel=2&DCS=0&flashsms=0&number=%s&text=%s&route=1',
        'SmsMsg' => 'Dear %s, Your FI.com verification code is %s'
    ),

    'articleArr' => [
        "edu" => "education",
        "fi" => "content",
        "ri" => "restaurant",
        "wi" => "wellness",
        "ga" => "gallery",
    ],

    //for youtube images
    'youtubeImageUrl' => 'https://img.youtube.com/vi/%s/hqdefault.jpg',

    //for youtube videos
    'youtubeVideoUrl' => 'https://www.youtube.com/watch?v=%s',

    'membershipPlanFranchisor' => [
        101 => 19500,
        102 => 50700,
        103 => 85800,
        104 => 124800,
        105 => 32500,
        106 => 78000,
        107 => 117000,
        108 => 195000,
        109 => 39000,
        110 => 87750,
        111 => 140400,
        112 => 234000,
        113 => 9999,
        114 => 29997,
        115 => 119988,
        116 => 19999,
        117 => 59997,
        // 118 => 239988,
        118 => 162500,
        119 => 39999,
        // 120 => 119997,
        120 => 143000,
        // 120 => 1,

        // 121 => 479988,
        121 => 292500,
        122 => 59994,
        // 123 => 119994,
        123 => 143000,
        //124 => 239994
        124 => 227500
    ],

    'membershipPlanFranchisorDays' => [
        101 => 30,
        102 => 90,
        103 => 180,
        104 => 240,
        105 => 30,
        106 => 90,
        107 => 180,
        108 => 240,
        109 => 30,
        110 => 90,
        111 => 180,
        112 => 240,
        113 => 30,
        114 => 90,
        115 => 360,
        116 => 30,
        117 => 90,
        118 => 360,
        119 => 30,
        120 => 90,
        121 => 360,
        122 => 180,
        123 => 180,
        124 => 180
    ],

    'membershipPlanFranchisorDetail' => [
        101 => '(1 Months) Sub Sub Category',
        102 => '(3 Months) Sub Sub Category',
        103 => '(6 Months) Sub Sub Category',
        104 => '(12 Months) Sub Sub Category',
        105 => '(1 Month) Sub Category',
        106 => '(3 Month) Sub Category',
        107 => '(6 Month) Sub Category',
        108 => '(12 Month) Sub Category',
        109 => '(1 Month) Master Category',
        110 => '(3 Month) Master Category',
        111 => '(6 Month) Master Category',
        112 => '(12 Month) Master Category',
        113 => '(1 Months) Sub Sub Category',
        114 => '(3 Months) Sub Sub Category',
        115 => '(12 Months) Sub Sub Category',
        116 => '(1 Months) Sub and Sub -Sub Category',
        117 => '(3 Months) Sub and Sub -Sub Category',
        118 => '(12 Months) Sub and Sub -Sub Category',
        119 => '(1 Months) Master, Sub and Sub -Sub Category',
        120 => '(3 Months) Master, Sub and Sub -Sub Category',
        121 => '(12 Months) Master, Sub and Sub -Sub Category',
        122 => '(6 Months) Sub Sub Category',
        123 => '(6 Months) Sub and Sub -Sub Category',
        124 => '(6 Months) Master, Sub and Sub -Sub Category',
    ],

    'catDesc' => array(
        '1' => array(
            'title' => 'Beautify Your Future with Beauty & Health Franchise!',
            'description' => 'Welcome to beauty & health franchise listings. When the whole world is undergoing an economic crisis, the beauty & health industry was amongst the least hit sectors. Here, the business opportunities are more & the risk is less. In this pool of beauty & health franchise, investors who want to start their own beauty & health centre can opt for beauty salons, cosmetic & beauty product stores, gyms & fitness centres, spas, clinics & nursing home related franchises. Want to become part of this multi-billion dollar industry? Take a look at these beauty & health franchise listings and get started on your business franchise plan today!'
        ),
        '2' => array(
            'title' => 'Make your dream come true in the booming Hospitality Industry',
            'description' => "Entrepreneurs are engaging in the hospitality sector like never before. If you are looking for the safest way to expand or diversify a business, it's franchising. Hospitality industry is always high in demand as more and more consumers are eager to spend money on their comfort, to receive a quality service. If you are a business minded entrepreneur and want to give yourself a personal freedom, then here you can choose from various hospitality franchise including hotels, resorts, quick service restaurants (QSRs), ice cream and yogurt parlours, multi cuisine restaurants, kiosks & carts / mobile vans related franchises. Just click on the hospitality franchise opportunity, if you would like to research and the information related to it will appear. Good luck with your search!"
        ),
        '3' => array(
            'title' => 'Education & Training Franchise - A Rewarding Business Opportunity for Entrepreneurs',
            'description' => 'Educational services can be a rewarding career field for entrepreneurs who want to make a difference and make money. It is a major part of the franchise industry with plenty of business opportunities for prospective investors. In the education franchise segment, one can choose from pre-school, training institute, grooming center, IT Institutes, animation school, retail school, coaching classes, educational institute, aviation academy, language centre franchises and many more. Quality education is always in great demand. Explore the several education franchises to become a successful business owner in education sector.'
        ),
        '4' => array(
            'title' => 'Advertisement & Media Services Franchise in India',
            'description' => 'The advertisement & media franchise industries are highly profitable for business owners. While choosing the right business franchise opportunities to buy, some factors to consider are the initial investment, area requirements, franchise fees and the amount of time it will take to get the business up and running. In advertisement services franchise, entrepreneurs willing to start their own advertisement franchise business can opt for TV channel/Network, digital media & internet marketing, publication & print media, Ad agencies related franchises. If you want to become a part of these fastest-growing industries, then here is the collection of advertisement & media services franchise opportunities that will make your dream come true. Just click on the franchises and request more information on what interests you most.'
        ),
        '5' => array(
            'title' => 'Dealer & Distributors Franchise – A trusted path to start a business',
            'description' => 'The most trusted way to start or get in to a business is by being agents, dealers and distributors. This way of doing business as a franchisee has been going on for decades and is proved to be the turning stone for success. Franchise India brings numerous of business opportunities for you in dealers & distributors with ease and comfort. Opportunities in dealers & distributors include areas like electronics, clothing, security, home products, resellers, FMCG and many more. Browse the various options available with Franchise India that will bring you success as a dealers & distributor.'
        ),
        '6' => array(
            'title' => 'Business Services Franchise – To Do Business in a Big Way',
            'description' => 'These days everyone wants to be an entrepreneur. And with growing number of businesses, the need of business services cannot be neglected as they serve as an immune system for a business. Past has witnessed the growth of this sector at constant increment. With business services franchise, you have several options to start your business offering business services like logistics, IT services, financial, travel and more. Take a look at the opportunities available with Franchise India and grab the one that appeals to your requirement.'
        ),
        '7' => array(
            'title' => 'Home Based Businesses Franchise – An Exceptional Business Opportunity',
            'description' => 'For people looking to earn while staying at home with family, home based business franchise is the best business opportunity. Home based franchise is perfect if you are struggling to balance work and family life. With the growing internet technology, home based business opportunity is also growing at a rapid pace. In this, astrology & tarot, consulting, boutique, MLM businesses are the options to explore for success. Choose the one that suits your future aspirations only with Franchise India and stay ahead in competition with reputed brands.'
        ),
        '8' => array(
            'title' => 'Automotive Franchise - A Rewarding and Profitable Business Option',
            'description' => 'Every day, people with a passion for automobiles wish to succeed in business and are opening their own automotive franchise. The automotive industry is one of the largest sectors in franchising segment and has become a great source of income for many prospective investors. With new vehicles constantly being manufactured and sold, there are plenty of automotive franchise opportunities in the market like automobile showroom, car wash & maintenance, tractors & framing equipments and more. Go for an automotive franchise business and see yourself grow as an entrepreneur.'
        ),
        '9' => array(
            'title' => 'Retail Franchise Business Opportunity Promises Great Rewards',
            'description' => 'Retail industry has been witnessing consistent growth over the last few years and is expected to grow more in the coming years. Grabbing the opportunity of Retail franchise could be the wisest decision that can help you get benefits for a lifetime. There are various opportunities you can grab from retail business franchise. In retail sector you can serve for consumer durables & IT, supermarkets & marts, home & office, sports goods and more. Getting into a retail business was never so easy before; design your success path with retail franchise opportunities available at Franchise India.'
        ),
        '10' => array(
            'title' => 'Fashion Franchise – A way to join a multi-billion dollar industry',
            'description' => 'Do you have passion for fashion? Are you aware that multi-billion dollar enterprises devoted to the business of fashion are not slowing down? Owning a fashion franchise is very exciting, extremely rewarding and is filled with flexibility and desired outcomes that greatly exceed working for a wage inside some corporate building. In this booming fashion industry, there are many franchise business opportunities for you such as clothing, footwear, jewellery, accessories helping you to gain profit with the prevailing trend. Looking to buy a business in this profitable industry? Browse through the premium fashion franchise opportunities that best suits your budget and interests.'
        ),
        '11' => array(
            'title' => 'Entertainment Franchise - An Easy Way To Enter Entertainment Segment',
            'description' => 'Entertainment franchise business is one of the most popular segments of franchise industry and a good way to start your own business. The entertainment industry covers a vast range of activities and in the entertainment franchise segment you can opt for various choices including event organizer, kid’s entertainment zone, amusement centres, clubs, decoration and lots more. An entertainment franchise could be the perfect vehicle for you if you have got event planning skills. With more and more people opting for professionals to arrange for an entertainment event, there will always be a market for more entertainment service providers. If you are interested to start entertainment franchise in your locality, there will be definitely something that will suit your interest. Browse now to enjoy benefits!'
        ),
        '12' => array(
            'title' => 'Be a Part of the Ever Growing Manufacturing Franchise Industry',
            'description' => 'Nowadays to reach out to consumers across the country, companies are taking the option of manufacturing franchise, helping others to grow as successful entrepreneurs. Franchise India brings numerous options for the one having passion for starting a manufacturing unit. Various options available in manufacturing franchise are like home furnishing, building material, bottling and many more. Check the opportunities that match your skill level and start reaping the rewards for your investments.'
        ),
        '13' => array(
            'title' => 'Beauty Salon & Supplies Franchise - A Recession Proof Business',
            'description' => 'The beauty salon & supplies franchise industry is a very lucrative and exciting sector that offers a strong opportunity for a skilled entrepreneur. Hair styling businesses, nail salons, spas or tanning salons or business related to beauty products offer consistent monthly income too. Sales figures show that even in economic down turns, the beauty sector has enjoyed strong growth and stable prospects, with more and more people willing to spend money on looking good and trying new beauty products. Investing in a beauty salon franchise is therefore a good opportunity for aspiring entrepreneurs. If you are interested in this unique business concept, then buying the franchise of a leading beauty salon & supplies brand is just a few clicks away.'
        ),
        '14' => array(
            'title' => 'Health Care & Fitness - One of the most revenue-generating business sectors',
            'description' => 'As people are becoming more health conscious than ever, they are ready to look for options to exercise more, improve their diets, de-stress, lose weight and explore a variety of other methods to improve their health. Well, this is why there are more franchise options for gyms, wellness centers, weight loss concepts, personal care outlets, health management clinics, medicine outlets, skin treatment clinics, women fitness centers, diet clinics, ayurveda clinics, and so on. Thus, health care and fitness franchise has become a lucrative business opportunity for prospective investors and entrepreneurs. With brand value an integral part of franchising, it is a must to look for a reputed name in health care and fitness franchise business opportunity.'
        ),
        '15' => array(
            'title' => 'Hotels Franchise - A business opportunity to build a secure future',
            'description' => 'Hotel industry is always in news due to its vast scope for new opportunities. No matter, in which corner of the world you are, you will always find hotels of different sizes and forms offering services to different types of clients and customers. And if you are interested in hotel industry, buying a hotel franchise is the best way to enter this highly competitive industry and enjoy success in a very less time. This way you get to work on a proven business plan and have established successful marketing techniques that will surely help you to enjoy success and profit in the hotel industry. There is a vast array of hotel franchise business opportunities to choose from, and surely you will find a hotel brand that is well known and that you personally find attractive.'
        ),
        '16' => array(
            'title' => 'Food Service Franchise - A good business concept for entrepreneurs with the love for food',
            'description' => "Food Service Franchise business is among the most popular forms of franchise business opportunities. Some of the most instantly recognizable names in the franchise industry are from this segment only. The good things about food service franchise opportunities are that it has got a universal appeal, widest potential market and doesn't require any particular specialist skills. You will find many food service franchises for sale, as who doesn't like going to a good restaurant? There are many different options for food service franchising, such as fast food, health food, pizza, sandwich shops, ice cream parlour, smoothies/juice bars, cookie shop, and bakery as well as restaurant franchises. So, start your search NOW!"
        ),
        '17' => array(
            'title' => 'Early Education Franchise - The ultimate growth industry',
            'description' => "Early Education believes every child deserves the best possible start in their life and support to fulfil their potential. The parent’s goals towards their children's future is increasing nowadays. In the early education, you can go for preschools, day care, after school activities franchise options. Searching for a socially responsible growth industry offering consistently high returns? Willing to invest for the long term? Browse through the array of various early education listings available at Franchise India."
        ),
        '18' => array(
            'title' => 'Help your children realize their unique potential by owning K-12 Education Franchise',
            'description' => 'The term K-12 stands for kindergarten plus 12 years of schooling. Presently, the K-12 education sector is continuously growing at the rate of 18 percent and is expected to reach 20 percent in the next 5 years. Owning a K-12 education franchise can be the most preferred business option for aspiring entrepreneurs looking for expansion in education sector. If you are one of them, then browse through numerous K-12 education franchise options available at Franchise India.'
        ),
        '19' => array(
            'title' => 'Coaching & Tutoring Franchise - Business Opportunity at a Glance',
            'description' => 'The private coaching & tutoring market continues to boom, even in a soft economy. Worldwide, the coaching & tutoring market is projected to be $100 billion by the next five years. The main reason for growth is colleges and universities becoming increasingly selective in whom they will admit. So therefore, investing in this business option is profitable. Click on the coaching & tutoring franchises opportunities available and request for more information.'
        ),
        '20' => array(
            'title' => 'JOIN THE POTENTIAL MARKET IN EDUCATION SECTOR TO ENJOY ENTREPRENEURSHIP WITH HIGHER EDUCATION FRANCHISE',
            'description' => 'Higher education has shown a great growth in recent time and is a very good business proposal to start a career as an entrepreneur. Higher education is an educational level that follows a completion of a school providing a secondary education, such as high school or secondary school. All the youth now is heading to have a higher education which resulted in its emergence as a great business opportunity. Have a look at the various Higher education franchise options available with Franchise India and be your own boss with lucrative returns in future.'
        ),
        '21' => array(
            'title' => 'PLANNING TO BUILD YOUR OWN BUSINESS IN VOCATIONAL TRAINING – GREAT CHOICE TO MOVE ON!',
            'description' => 'Vocational training is education that prepares people for specific trades, crafts and careers at various levels from a trade. The popularity and need of vocational training cannot be ignored with the growing competition in corporate world. The need of trained professional has grown and compared to earlier time, which now opens a great business opportunity for Vocational training franchise. If you want to start your own profitable business in education sector, then check out the opportunities available with us.'
        ),
        '22' => array(
            'title' => 'Online Education Franchise – Opportunity to convert traditional teaching methods into web-based',
            'description' => 'During last years, it has been observed that most of the students are accepting online education programs alternative to traditional campus based programs. This results in the increase in the demand of online education throughout the country. Taking online education franchise is a lucrative business option. By becoming franchisee, you will overcome the administrative headaches associated with setting up a business from scratch & get support in terms of advertising, marketing, operational and the like. Want to become successful business owner in this growing segment? Franchise India invites you to participate in the growing trend of online education industry with various online education franchise opportunities available.'
        ),
        '23' => array(
            'title' => 'Enjoy high profit margins and great success with Advertisement & Media Services Franchise',
            'description' => 'The advertisement & media franchise industries are highly profitable for business owners. While choosing the right business franchise opportunities to buy, some factors to consider are the initial investment, area requirements, franchise fees and the amount of time it will take to get the business up and running. In advertisement services franchise, entrepreneurs willing to start their own advertisement franchise business can opt for news channel, mobile advertising and online news service related franchises. If you are searching for a premium franchise opportunity to be part of these fastest-growing industries, then here is the collection of advertisement & media services franchise opportunities that makes your dream come true. Just click on the franchises below and request more information that interests you most.'
        ),
        '24' => array(
            'title' => "'Dealers & Distributors' Franchise - A financially rewarding business in the growing industry",
            'description' => 'The most trusted way to start or get in to a business is by being agents, dealers and distributors. This way of doing business as a franchisee has been going on for decades and is proved to be the turning stone for success. Franchise India brings numerous of business opportunities for you in dealers & distributors with ease and comfort. Opportunities in dealers & distributors include areas like electronics, clothing, security, home products, resellers, FMCG and many more. Browse the various options for you available with Franchise India to avail the flourishing success ahead as a dealers & distributor.'
        ),
        '25' => array(
            'title' => 'Fly high in the fastest growing business world with logistic franchise opportunities',
            'description' => 'Logistics - the actual movement, delivery and transportation of goods or services from a seller to a buyer. Presently, every organization use logistics & is in relation to customer satisfaction through cost minimization and quality service delivery. The logistic industry is expected to grow annually at the rate of 15- 20 per cent, reaching revenues of approximately $ 385 billion in the coming years. Enjoy benefits in this ever growing industry by exploring various logistic franchise opportunities available at Franchise India. Browse now!.'
        ),
        '26' => array(
            'title' => 'IT SERVICES – A BUSINESS SECTOR THAT EVERYONE WANTS TO JOIN AS AN ENTREPRENEUR',
            'description' => 'IT Sector being the most booming sector that has shown a steep increase in its profitability. With most of the businesses depending on technology, the role of IT service providers is increased. Securing your future earnings with a business having large need in every business is the best an individual can do. Select from various IT Services franchise options and get yourself in a strong position in IT service business with a leading brand name. Good luck for your search!.'
        ),
        '27' => array(
            'title' => 'Financial Franchise - An opportunity providing a platform for owners to reach for success',
            'description' => 'The financial franchise services market has been expanding and it is a good area for investment by enterprising entrepreneurs. There are many franchise business opportunities to choose from the financial industry apart from the banking system. For financial franchise business, you can opt for business cost management consulting, accountancy, tax preparation service, financial advising service, loan and mortgage firms and so on. To start financial franchise, investors do not need to have a financial background, although an appreciation of money and, of course, good arithmetic and familiarity with numbers, are counted as plus points. With the right financial franchise option, you can surely be a part of this extremely lucrative business segment.'
        ),
        '28' => array(
            'title' => 'TRAVEL FRANCHISE – A SECTOR WITH GREAT BUSINESS PROPOSALS',
            'description' => 'The Indian travel industry has grown by leaps and bounds over the last decade with which the business opportunities are being recognized by investors. People want a travel operator who can offer a range of travel services under one roof with minimum hassle. With this, the business opportunities in travel sector are large. So, if you are planning to start your own business in travel sector, check out the range of Travel Franchise options available to choose the one that suits your requirements.'
        ),
        '29' => array(
            'title' => 'REPAIR FRANCHISE, PATH TO FOLLOW FOR BECOMING A SUCCESSFUL ENTREPRENEUR',
            'description' => 'Repair franchise has a unique business model that focuses on saving clients money by extending the life of the product through repairing it. In this sector supplementing hard work and a drive for success with the resources and support you need to be your own boss you can get merit-based rewards for your investments. Repair business is undoubtedly a great business opportunity to grab and start for a profitable business. From range of options at Franchise India, choose the one that appeals you the most and be your own boss.'
        ),
        '30' => array(
            'title' => 'CLEANING FRANCHISE - CHARGING FOR COMMERCIAL CLEANING OR RESIDENTIAL CLEANING',
            'description' => 'Planning to have your own business? Want to be your own boss with lucrative returns on investments? Start your own business in growing industry by charging for services in the areas of house cleaning, carpet cleaning, office cleaning, and more. You have the option to choose from commercial cleaning franchises or residential cleaning franchises. Past has witnessed a huge growth in this industry, and if you want be a part of this growing industry, just have a look at various franchise options available with Franchise India.'
        ),
        '31' => array(
            'title' => 'Add wings to your dreams of becoming successful entrepreneur with consultancy franchise',
            'description' => 'A consultancy franchise is just the right option for investors who are interested in starting their own business that offers an intellectual challenge and have scope for utilization of management skills and experience. Plus, it is one franchising option where success and growth can be enjoyed quickly. There are dozens of consulting organizations offering the opportunity to franchise and come up with a profitable and highly flexible consulting practice. A consultancy franchise can be of different types like cost management consultancy, business consultancy, sales consultancy, matchmaking consultancy, education consultancy, career consultancy and so on. Hence, consultancy franchise business is a popular way to start your own business and enjoy success.'
        ),
        '32' => array(
            'title' => 'TO BECOME AN ENTREPRENEUR, HOME BASED BUSINESSES IS DEFINITELY AN EXCEPTIONAL BUSINESS OPTION',
            'description' => 'Today, starting and running a business doesn’t always mean long hours away from home. There are many business types that can be operated from home. In this regard, home based businesses franchise options offer an exceptional opportunity to start a home business franchise under the security of an already-established brand. Today, there are many home based franchise opportunities available in the market including computer consulting, tutoring, cleaning, financial consulting, senior care, landscaping, marketing services, home décor, and so on. Working from home has plenty of benefits and a perfect way for entrepreneurs and investors to enter the business world and that too right from the comfort of their home. Explore the opportunities available with us and good luck for your search.'
        ),
        '33' => array(
            'title' => 'START YOUR OWN BUSINESS IN LEADING INDUSTRY - FOUR WHEELERS & TWO WHEELERS FRANCHISE',
            'description' => 'Four wheelers & two wheelers industry is one of the booming industry in our country. The automobile sector has shown a massive growth from past decades and has proved to be a profitable business opportunity for entrepreneurs. Choose your opportunity you want to grab to associate with as a franchise with none other than Franchise India. Good luck for your search and initial step for becoming a successful entrepreneur.'
        ),
        '34' => array(
            'title' => 'FOR A FLOURISHING SUCCESS AHEAD, START WITH CONSUMER DURABLES FRANCHISE',
            'description' => 'Consumer durables franchise are in excess now a days and it is easy for techies, gamers and hobbyists alike to find the right electronics franchise that suit them. If you’re an entrepreneur looking for the technical line business of your own, investing in a franchise in electronics is perfect for you. With consumer electronics franchise, you have several options to start your business dealing with consumer electronics and home appliances. Choose from the electronic franchise opportunities by Franchise India to start your own business and be your own boss for a flourishing success ahead.'
        ),
        '35' => array(
            'title' => 'SUPERMARKETS & MARTS – OPPORTUNITY TO GET BEST INVESTMENT RETURNS',
            'description' => 'Want to start a business with aim of providing customers with the ultimate shopping experience means giving them the freshest products, the greatest selection of products, the most innovative services, and polite, friendly, professional service. When it comes to customers, believe in dropping whatever you are doing to help them in whatever way is the best [practice to become successful. Go through various supermarkets & marts Franchise listings to choose a name to go with as a franchisee and enjoy valuable returns for your investments.'
        ),
        '36' => array(
            'title' => 'Discover a retail experience unlike any other with books, toys & gifts franchise opportunities',
            'description' => 'Presently, franchise ownership represents a great way to get a fast start with a business of your own without the start-up challenges of creating a recognizable trade name and brand identity. Books, toys & gifts franchises are more than just an exceptional retail concept with a world class business system. Looking for a profitable business opportunity?  A business where success is measured in smiles? All you need to do is, just make a click on books, toys & gifts franchise opportunities available at Franchise India.'
        ),
        '37' => array(
            'title' => 'SPORTS GOODS & FITNESS STORES – A FRANCHISE BUSINESS OPPORTUNITY TO KEEP YOUR INCOME HEALTHY',
            'description' => 'Take benefit from the reputation of one of the world’s largest sports goods & fitness stores companies by joining them as a franchisee. This business sector has shown a remarkable growth. SO, if you are looking for an opportunity that is best to become a successful Fitness Center owner, Franchise India has the array to search for your ideal sports goods & fitness stores business opportunity. Have a great search with us.'
        ),
        '38' => array(
            'title' => 'HOME & OFFICE FRANCHISE – AN EVERGREEN BUSINESS OPPORTUNITY',
            'description' => 'Home & office decorating is a business that will never go out of style and investing in a home & office decorating franchise could be a good path to take. Each interior decorator has access to thousands of samples of designer window treatments, wall and floor coverings, furniture and accessories, all brought directly to the each client’s home or office. Franchise India has lots of opportunities in home & offices decorating to choose a franchisor you want to join.'
        ),
        '39' => array(
            'title' => 'E-RETAIL – A CONVENIENCE BUSINESS WITH CONVINCING RETURNS',
            'description' => 'With the changes and up gradation being brought in the internet, more and more people are diverting to the route of e-retail. This sector has shown a vertical growth in past years. This is the best time to be an e-retail franchisee and earn great returns by offering convenience to the people. Browse the listings available with Franchise India today and choose the best franchisor available for you in e-retail sector.'
        ),
        '40' => array(
            'title' => 'Clothing franchise - An opportunity to work with the biggest names in the franchise industry',
            'description' => 'Clothing Franchise can be a rewarding, first step for anyone looking to enter the franchising industry. As there is huge demand for clothing items as people expect their clothing to fit well and look great. So, there is always for scope for more business in this segment. Hence, popular clothing brands offer entrepreneurs and investors an opportunity to operate as their franchisee with a proven business model that offers instant name recognition, marketing, ongoing training and support. So, there is money to be made with a clothing franchise, as long as you have the right brand, product, location and marketing strategy. A clothing franchise will offer you many business opportunities that you might not enjoy by starting your own clothing store.'
        ),
        '41' => array(
            'title' => 'Own footwear franchise & become the world’s most widely recognized franchisor in footwear industry',
            'description' => 'The footwear industry has enjoyed significant growth over the last several years and intends to continue this growth in the years to come. So, doing business in this industry is profitable option. After owning footwear franchise, you can get benefit from excellent returns on investment, marketing support, advertising assistance and many more. Just have a look on the footwear franchise opportunities available at Franchise India and choose the one that interest you most.'
        ),
        '42' => array(
            'title' => 'JOIN THE EVER GROWING INSATIABLE MARKET FOR SUPPLIES AND PRODUCTS BY BECOMING JEWELLERY FRANCHISEE',
            'description' => 'If you have a pleasant personality and wish to start your own business, then jewellery franchise is just the right option for you. There’s a huge, insatiable market for supplies and products related to jewellery items. In fact, jewellery franchises are among the most popular opportunities in franchising industry for women, as jewellery items have a wide appeal. There are all kinds of Jewellery franchises - including fashion jewellery, gold, silver, diamond, artificial, costume jewellery, pearls, art jewellery, international jewellery brands etc. Jewellery franchisors offer prospective investors tried and tested business models. Plus, franchisees do not require any previous experience to start their own business. So, explore the options NOW!.'
        ),
        '43' => array(
            'title' => 'LUXURY/PREMIUM FASHION FRANCHISE – A PROVEN PATH FOR SUCCESS',
            'description' => 'Own a Luxury/Premium Fashion franchise to offer style & sophistication from clothing unlike the usual practices of branding that are normally seen in the consumer goods industry. The branding philosophy in the fashion and luxury goods industry is quite unique and personality based. Luxury/Premium Fashion sector is always rising in profits from business aspect and will be the leading business opportunity in fashion industry. Check out the hottest franchise offers for you in Luxury/Premium Fashion category at Franchise India.'
        ),
        '44' => array(
            'title' => 'ACCESSORIES FRANCHISE – A PERFECT BUSINESS OPPORTUNITY FOR FASHION LOVERS',
            'description' => 'Accessories add the pop that is sometimes missing from everyday outfit. Accessories franchise store is a great draw to the local mall or shopping center.  Shoppers know that they can find quality products at accessories franchise locations. So, if you feel, you are ready to invest in the trend-setting marketplace and become a successful entrepreneur, have a look at Franchise India listings in accessories franchise section.'
        ),
        '45' => array(
            'title' => 'ENTER THE MOST POPULAR SEGMENTS OF FRANCHISE INDUSTRY - ENTERTAINMENT & LEISURE',
            'description' => 'Entertainment & Leisure franchise business is one of the most popular segments of franchise industry and a good option to start your own business. The entertainment industry covers a vast range of activities and in the entertainment franchise segment you can opt for various choices including event organizer, game zone, entertainment center, decoration and lots more. An entertainment franchise could be the perfect vehicle for you if you have got event planning skills. With more and more people opting for professionals to arrange for an entertainment event, there will always be a market for more entertainment service providers. If you are interested to start entertainment franchise in your locality, Franchise India has various options that will suit your interest.'
        ),
        '46' => array(
            'title' => 'EVER GROWING MANUFACTURING INDUSTRY - RANGE OF OPTIONS TO CHOOSE FROM',
            'description' => 'Now a days to reach out to consumers across the country, companies are taking the option of manufacturing franchise, helping others to grow as a successful entrepreneurs. Franchise India brings numerous options for the one having passion for starting a manufacturing unit. Various options available in manufacturing franchise are like home furnishing, building material, bottling and many more. Check the opportunities that match your skill level and start reaping the rewards for your investments.'
        ),
        '47' => array(
            'title' => 'Beauty Salons Franchise - Opportunity to make collaborations with leading names in beauty industry',
            'description' => 'Now days, men & women are becoming more attracted towards grooming & beauty concepts and salon is a place that everyone wants to step in & get an overall well-groomed look.  From special treatments to specialized beauty therapies, a beauty salon franchise is an establishment that offers a host of styling services giving each client the look they desire. So if you want to make excellent returns on investment, then make a few mouse clicks to invest into salon business & become a part of ever-growing beauty industry.'
        ),
        '48' => array(
            'title' => 'Keep your identity as a modified person with Tattoo, Piercing & Nail Art Franchise',
            'description' => 'In today’s world, the trend of servicing body tattoos, piercing & nail art is at high peak in the never ending beauty industry. When you’re in the artistic world, everything becomes more open and accepting, so taking a tattoo, piercing & nail art studio franchise is a profitable option. If you want to join yourself with the leading names & artwork of many talented artists from around the world, then check out the number of tattoo, piercing & nail art studio franchise available at Franchise India.'
        ),
        '49' => array(
            'title' => 'Cosmetics & Beauty Product Stores Franchise - A turnkey opportunity to start your own business',
            'description' => 'In the years to come, everyone has a desire to look good, feel young and vibrant, which too has a huge boom in all areas of beauty industry. Worldwide, the beauty industry represents trillions of dollars in annual revenue and makes up a substantial piece of the overall retail industry. From cosmetic & beauty products to complete aesthetic services, the beauty industry continues to serve the needs of many customers. By purchasing a cosmetics & beauty product stores franchise, you are investing in a proven franchise concept with proven history of success and in an industry that is always on the cutting edge with innovation and a trend setting mandate. Browse through various beauty product stores franchise listings to run your own successful business.'
        ),
        '50' => array(
            'title' => 'Pet Grooming Franchise- A lucrative business opportunity for pet lovers',
            'description' => 'Lots of people share their lives with pets, and where there are pets, there is a need for pet services. All pets need training and the occasional grooming, and some breeds of dogs and cats in particular need frequent weekly trips to the spa. Do you have passion and love for animals? Are you aware that many people buy more than one pet and caring for their beloved pet is not slowing down? There are many pet grooming business opportunities for you to gain profit with this prevailing trend. Browse through the premium franchise opportunities that best suits your budget and interests.'
        ),
        '51' => array(
            'title' => 'Fulfil your dreams of becoming pioneer in pathology arena with Pathological Labs Franchise',
            'description' => 'With the increase in the number of diseases causing threat to humans, the healthcare industry is also experiencing a huge growth. So, therefore everyone wants to be diagnosed first and then the treatment of that particular disease is undertaken. It results in the increase of the demand for pathological labs, where all the tests are conducted under one roof. If you want to make diagnostic facilities available to the people in your area, then go through the numerous pathological labs business opportunities available at Franchise India to follow the rigorous expansion strategy via franchising.'
        ),
        '52' => array(
            'title' => 'Gyms And Fitness Centres Franchise - Business opportunity with promising returns',
            'description' => 'In today’s world, the fitness centre industry has been growing in popularity and attracting young population in large numbers. It comes up with gym concepts and technology every year. Because of the great desire of becoming healthy, men & women hits the gym & fitness centres on regular basis. Fitness centres franchise opportunity helps you gain excellent returns on investment while your members gain fitness benefits. If you are an aspiring entrepreneur and want to mount awareness of fitness & healthy lifestyle coupled with higher disposable incomes, then browse through Gyms And Fitness Centres Franchise opportunities available at Franchise India.'
        ),
        '53' => array(
            'title' => 'The ever growing spa industry is full of opportunities leading towards great future',
            'description' => 'Spa industry - no matter the economy, lots of people are devoting time and money to encompass both inner health and external beauty. Spa franchises are being visited more regularly by many women, and now men have even started to develop stronger interest. Help people to relax and get away from the stresses of life by opening a spa franchise in your area and earn great returns. Check out the spa franchises available with us to be an entrepreneur in this ever growing industry and achieve your desired goals for future.'
        ),
        '54' => array(
            'title' => 'Business options in medical spa - a hybrid between a medical clinic and a day spa',
            'description' => 'A medical spa is a hybrid between a medical clinic and a day spa that operates under the supervision of medical doctor. People are constantly spending greater amounts on their health, so medical spa franchise opportunities are growing all the time. This great business opportunity sector is appealing to everyone who wants to be successful. As technology continues to improve, allowing for better results from less invasive cosmetic procedures, medical spa franchise is emerging as a leading business opportunity. Get the inside scoop on the franchises that most interest you by browsing Franchise India today.'
        ),
        '55' => array(
            'title' => 'Massage Therapy to offer peace of mind to people – A great business platform',
            'description' => 'Massage therapy franchise services a client’s mental and physical wellbeing by offering them a peace of mind and loosen their muscles. Massage centre can easily set them apart, since there are so many different massage techniques and tools available. Massage therapy franchises are usually required to hold a license and may require having a certified employee in some areas. Massage Therapists practice in a variety of settings and locations and in a variety of contractual arrangements. Check out the opportunities available to find out more about the massage spa franchise opportunities.'
        ),
        '56' => array(
            'title' => 'For a promising business opportunity, Clinics & Nursing Homes franchise is the option!',
            'description' => 'Clinics & Nursing Homes franchise business is exactly the need of today to get into a business with promising returns. With the thinking changing to be more hygienic, the importance of the franchise business will continue to grow. The need of urgent care franchises, medical device franchises, and medical billing franchises is also growing day by day, making it a great choice to start a business. The Clinics & Nursing Homes franchise model is great for aspiring business owners looking to start a new business or expand a running one.'
        ),
        '57' => array(
            'title' => 'Hospitals franchise - An opportunity in demand forever!',
            'description' => 'As people are becoming more health conscious than ever, they are readily looking for options to get quality medical services and explore a variety of methods to improve their health. The more established an organization, the harder it is to marshal the different perspectives, priorities, and approaches needed to innovate new ways of doing business. With brand value an integral part of franchising, it is must to look for a reputed name in hospitals franchise business opportunity. Connect with us and browse the options available for business start-up in Hospitals.'
        ),
        '58' => array(
            'title' => 'START A PHARMACY FRANCHISE TODAY FOR EVER GROWING PROFITS!',
            'description' => 'A pharmacy franchise business is one of those that can offer the maximum returns for the investments made. If a person is looking to start a business in pharmacy sector, then starting it with a franchise of a brand that is very much renowned in the market is the best way. This gives an individual the advantage of trust people are having on the brand and also the ability to work with some predefined standards by the franchisors. Pharmacy businesses over the time has proven to be the best resource of income for long time as the need for the same is increasing day by day with the increase in awareness about curing the illness. Location of the pharmacy franchise is also an important aspect to be taken care of while starting with a pharmacy model, as having it near to the hospitals and clinics on in location where presence of competitor is low will serve as an additional perk for you.'
        ),
        '59' => array(
            'title' => 'Healthcare Products – A trusted industry to start your own business!',
            'description' => 'Healthcare Products franchise is one of the largest industries in the world. It offers solutions for the entire health care industry from prevention and early detection through diagnosis and on to treatment and aftercare. The need of these products cannot be ignored in every home. And now, when people are ready spending money to stay fit and prevented from health care issues, this is a great business option to get start with. Explore the various business opportunities in Healthcare Products franchise available with Franchise India.'
        ),
        '61' => array(
            'title' => 'Diet Consultancy Franchise - mission to help people live better lives',
            'description' => 'Diet Consultancy franchise helps in providing an opportunity to common man on a nationwide platform, i.e. to improve their fitness and total wellness through a healthy body and mind by having appropriate diet and fitness routine. This part of health care & fitness industry is in demand as now everyone dreams to have a fit body appearance. Diet Consultancy sector is a golden business opportunity for the one aspiring to offer expert dietary advice tailored to individual needs. Just browse our site and get numerous options available to start your own business in Diet Consultancy today.'
        ),
        '62' => array(
            'title' => 'Ayurvedic, Herbal & Organic Products Franchise - A way to get into Indian ancient times medical practices',
            'description' => 'Do you know, when people lose hope from so-called modern medical science, where can they turn to? Ayurvedic, Herbal & Organic Products truly holds out a ray of hope to suffering millions. In the modern times, the Ayurvedic, Herbal & Organic Products Franchise business truly represents a sunrise opportunity as it is based on high and sustainable return on investment (ROI). If you want to serve society while also building up a satisfying and profitable business with the leading names in healthcare industry, Ayurvedic, Herbal & Organic Products Franchise is certainly the way to go! Start your search here at Franchise India.'
        ),
        '64' => array(
            'title' => 'Resort Franchise - A potential business opportunity to think about and invest',
            'description' => 'In coming years, a growing number of resorts are spreading their wings and reaching the wider customer base throughout country. Making investment into hospitality industry on resorts franchise is beneficial, as the vacation spots are broadening their branding efforts from the sand to the slopes. So if you are dreaming of owning your own business resulting better returns, then check out the various resorts franchises available at Franchise India.'
        ),
        '65' => array(
            'title' => 'Guest House / Service Apartments Franchise - A business opportunity with a lot of scope to grow',
            'description' => 'Today, two out of every three person is spending the huge amount of money on guest house / service apartments franchise business. This particular business opportunity gives you a chance of business success as you are associating with proven products & methods. Having guest house / service apartments franchise allows you to be in business of yourself but not by yourself. Just have a look & earn from the best guest house / service apartments franchise available at Franchise India.'
        ),
        '66' => array(
            'title' => 'Dream big & own a dozen with Motels And B&B Franchise Opportunities',
            'description' => 'From B&B to large motel franchises, the business of lodging comes in all different forms.  The motel and B&B industry is continuously growing from past 5 years and investing into this industry via franchising helps you to get a license, trademark, and service mark, as well as advice, and assistance in organizing, and managing the business as a long-term business relationship. Turn your dreams into reality with various Motels And B&B franchise listing available at Franchise India.'
        ),
        '67' => array(
            'title' => 'Be as successful as you want to be with Hotel Chain Franchise',
            'description' => 'Hotel chain - A series of two or more hotel properties grouped under one brand name. Owning a hotel chain franchise can be a very lucrative business opportunity offering right to use reputed & well established brand name in hotel industry. You can start your own hotel chain by joining yourself with a hotel franchise group. Want to take advantage in the growing popularity of hotel chains, but don’t know how to accomplish that? Browse through the Hotel Chain Franchise listings available at Franchise India now!'
        ),
        '68' => array(
            'title' => 'Juices / Smoothies bar Franchise - A business format that has always worked',
            'description' => 'Juices / Smoothies bar are among the most selling items that are on every street corner in the couple of years. It basically fits the cultural change perfectly. Now days, most of the people are looking for a quick portable meal alternative and is running towards healthier living, and healthier food choices. That’s why it will be a good idea to start a business selling smoothies drink & fruit juice. So what are you waiting for, it’s time to get started in this growing industry with Franchise India. Browse now!'
        ),
        '69' => array(
            'title' => 'Ice Cream and Yogurt Parlours Franchise - Cool & profitable business opportunity',
            'description' => 'Food service industry is always in great demand and becoming Ice Cream and Yogurt Parlours franchisee is definitely a fruitful decision that helps in getting excellent returns on investment and established brand name which do not need any reorganization. With franchise business, you can leverage brand’s unique selling point, by drawing high customer satisfaction in the competitive market. So if you are looking for a cool investment? Check out the array of ice cream and yogurt parlours franchise opportunities that suit your needs.'
        ),
        '70' => array(
            'title' => 'Bakery & Confectionery Franchise - An award winning business opportunity in hospitality sector',
            'description' => 'Owning a Bakery & Confectionary franchise is a serious commitment and works best when you makes a thoughtful decision. After becoming franchisee, you will be working with an experienced group of professionals that understands all phases of the Bakery & Confectionary concept. Are you interested in learning how to make money in the bakery & confectionery industry? Make a click on the Bakery & Confectionary franchise listings available to enjoy success & profit in no time.'
        ),
        '71' => array(
            'title' => 'Add sweetness of chocolates to your work life with chocolate stores franchise',
            'description' => 'Now days, chocolates are widely perfect for every holiday, celebrations & special occasion. Chocolate industry is continuously driving growth with a large number of consumers. Doing a business of chocolates is a profitable option, as it does not have any effect of recession and has strong sales. You can browse through various Chocolate Stores franchise listings available to leverage an established brand, a unique concept and a proven business model in chocolate industry. The sweet life awaits you...'
        ),
        '72' => array(
            'title' => 'Fine Dine Restaurant Franchise - An opportunity to rise by any other name',
            'description' => 'As from the name, it is clear that fine-dining offers patron the finest in food, service and atmosphere. Presently, Fine dine restaurants has taken over the task for social gatherings, and convenience at the same time. The restaurant franchise is growing consistently nearly million eating outlets in our country and is expected to grow very rapidly in the near future.<br><br>From past years, fine dine restaurants has proved to be the finest business for utmost source of income that one can generate by being his own boss, and restaurant franchise has made that growth global. It can be a great business opportunity for the business owners thinking about starting fine dine restaurant franchise of their own.<br><br>With Restaurant Franchise, you benefit from the tremendous goodwill of the Restaurant. Starting a business with a company with its brand name that has earned fame over the years locally with its delicious dishes with mouth-watering taste that please your taste buds with best service is promisingly one of the greatest path for writing a successful entrepreneurial story. <br><br>You can grab the renowned brands and work for your own growth today through franchiseindia.com. We cater most of the big names in fine dine restaurant sector for reaching every corner with franchise model. Just browse the category to choose desired brand & become an owner of a leading restaurant franchise to witness to growth of restaurant sector by earning lucrative returns.'
        ),
        '73' => array(
            'title' => 'Casual Dine Restaurant Franchise - A sizzling hot business opportunity that serves up what consumers are looking for',
            'description' => 'Everyone in this running short of time life is attracting towards casual restaurants to save the hassle of cooking food at home, which is providing great business potential to casual restaurant industry. In this profitable casual restaurant industry the food services are in casual atmospheres to seated patrons who are served by restaurant staff and pay after eating. It can be great business opportunities for the prospective entrepreneurs who want to enjoy success in less time.'
        ),
        '74' => array(
            'title' => 'SWEET SHOPS - A TURNKEY FRANCHISE OPPORTUNITY WITH MAXIMUM RETURNS!',
            'description' => 'All the research in recent time has shown that Indian consumers spend most of their income on food and here it emerges as a great business opportunity. Owning your own sweet shop is the stuff of dreams for countless children as well as for many adults. On an average each man, woman and child consume staggering kilos of sweets and chocolate per year. Sweet Shops is a turnkey franchise opportunity, based on a tried and tested business of years standing. Check out the options available for you...Hurry!'
        ),
        '75' => array(
            'title' => 'QUICK SERVICE RESTAURANTS (QSRS) – A QUICK AND PROVED OPTION TO START A BUSINESS IN HOSPITALITY SECTOR',
            'description' => 'Quick Service Restaurants is identified by the acronym QSR in the industry and is typically characterized by “food served fast” and minimal table service. QSR chains have thrived in the Indian states and around the world because they cater to the busy lifestyles of modern consumers. In this franchise business the things that matters are speed of service, food consistency, clean restaurants and uniform customer service. Browse various options available with Franchise India for QSR.'
        ),
        '76' => array(
            'title' => 'EXPRESS FOOD JOINTS / DRIVE THROUGH IS A GREAT BUSINESS OPPORTUNITY WITH VAST POTENTIAL',
            'description' => 'Express Food Joints / Drive Through franchise opportunity are the leading inquired business with maximum number of people looking to start a new business in it. As this is catering to the busy lifestyles of modern consumers in great numbers in the country, this is a great business opportunity to grab. Check out the comprehensive Express Food Joints / Drive Through franchise options available for you to take a step of becoming an entrepreneur in hospitality. Good luck for your search.'
        ),
        '77' => array(
            'title' => 'TEA AND COFFEE CHAINS FRANCHISE – GOLDEN OPPORTUNITY TO BE YOUR OWN BOSS',
            'description' => 'Even in the face of economic uncertainty, consumers still demand their favourite affordable luxuries like premium coffee and tea. It is a proven business opportunity with lots of entrepreneurs kissing the success in small span of time. So, Tea and Coffee chains franchise is one of the businesses that helps you fulfil your long believed dream to own your own business, and really be the boss to achieve all the desired success. Just have a look at the options available for you to start your own business in Tea and Coffee chains sector with a leading brand name that offers you great returns on your investment in a very shorter period of time.'
        ),
        '78' => array(
            'title' => 'MULTI CUISINE RESTAURANT IS A TRUSTED BUSINESS MARKET WITH HUGE POTENTIAL',
            'description' => 'Planning to own a business of your own multi cuisine restaurant? You are at the right place, where the stuff of dreams for countless adults and business minded people is catered. If you want to give yourself a personal freedom, then this is the right business to go for. You can choose from various opportunities available in multi cuisine restaurant sector. Connect to the brand name that appeals to you according to your requirements and become your own boss. Good luck for your search.'
        ),
        '79' => array(
            'title' => 'KIOSKS & CARTS / MOBILE VANS – A FLEXIBLE BUSINESS OPTION WITH GREAT RETURNS',
            'description' => 'Now a days, new generation of street-food lovers is lining up at kiosks & carts / mobile vans like never before. This is a business opportunity which has shown a great growth in recent time. From an entrepreneurial standpoint, kiosks, carts, trailers, and mobile vans have a lower overhead than restaurants and can be moved if one location does not generate enough business. So, if you are interested in a business opportunity with this flexibility, search from various franchise brands available with us.'
        ),
        '80' => array(
            'title' => 'BARS, PUBS & LOUNGE FRANCHISE – A BUSINESS OPPORTUNITY SECTOR SHOWCASING MAXIMUM GROWTH',
            'description' => 'Interested in having a franchise with huge potential? Bars, Pubs & Lounge franchise is one of the best model for the one looking for franchise business with night life enjoyment. The most successful business sector engaged with the youth of the country. Bars, Pubs & Lounge franchises enjoy a high customer return rate and have no shortage of customers looking to blow off some steam for happy hours, weekends and for sporting events. So, if it feels appealing to you, grab the opportunity now from the options available with us and join a leading brand franchise.'
        ),
        '81' => array(
            'title' => 'ONLINE FOOD ORDERING SERVICES IS THE BUSINESS THAT SHOWS COMMENDING GROWTH',
            'description' => 'Online food ordering services are businesses that feature interactive menus online, allowing customers to place orders with local restaurants and food cooperatives. While e-commerce has been around for over a decade, the food ordering services online has also shown a vertical growth. So, if you want to own a business in hospitality sector, then this could be the best option for you. Connect with us today and check out the franchise options available for you in online food ordering services.'
        ),
        '82' => array(
            'title' => 'THEME RESTAURANTS – THE PERFECT BUSINESS PLAN TO LEAD A SUCCESSFUL ENTREPRENEUR LIFE',
            'description' => 'Now a day, the most popular types of restaurant all across the country is Theme Restaurants. Everyone is paying attention and spend money on their comfort to receive a quality service. In this, concept of the restaurant takes priority over everything else, influencing the architecture, food, music, and overall appearance and atmosphere of the restaurant. As the thinking is changing the fall of people towards themed restaurants is also increasing and choosing this as a business opportunity is a great idea. Check the opportunities available with Franchise India now!'
        ),
        '83' => array(
            'title' => 'CATERING IS AN OPPORTUNITY SECTOR WITH FULL OF HAPPENING, FUN LOVING PEOPLE NEED TO GET IN NOW',
            'description' => 'Catering is the business of providing food service at a remote site or a site such as a hotel, public house (pub), or other location. Our country where celebrating anything involves food in it has a great potential from business point of view. So, if you are planning to have your own business in food sector, then this is the opportunity for you to grab. Connect now to enjoy the success of being an entrepreneur in a booming business sector.'
        ),
        '85' => array(
            'title' => 'Involve yourself in the fast growing concept of preschools franchise - A perfect business option',
            'description' => 'Preschools are spaces where little kids come to play, interact and learn certain age- relevant concepts in a fun and interesting way. As parents view pre schools as ‘necessary’, the demand for quality pre-school education is growing rapidly and has opened new opportunities for investors and entrepreneurs. If you love kids and want to spend quality time in the company of little angels, investing in a pre-school franchise can be the perfect business option for you. For a pre-school franchise you don’t need to have some special experience apart from your love for kids. This is one franchising option that can help prospective entrepreneurs and investors to enjoy success in business in less time.'
        ),
        '86' => array(
            'title' => 'Activity centres franchise - Business opportunity with flexible working hours & extra income',
            'description' => 'Welcome to the Activity Centres Franchise listings. The industry pertaining to children is a dynamic area of business and contains a variety of arenas including day care that enables children to be ready for school. In this pool of Activity Centres Franchises, investors who want to start their own activity centre can opt for professional day care, emergency day care, after school day care, day care nursery, and kindergarten schools related franchises. Enjoy taking care of kids and working with parents? Just have a look at Activity Centres Franchise listings and get started on your activity centres business franchise plan!'
        ),
        '87' => array(
            'title' => 'After School Activities Franchise - Opportunity to expand revenue with the recession proof business model',
            'description' => 'Now days, various youth activities are there for children that takes place outside of the traditional school day. After school activities occurs at most of the times in a day and in variety of places including community centre, parks, libraries and the like. The after school activities franchise industry is always in demand as there are about million children participating in after school activities nationwide for an average of 8 hours per week. Discover how you can run your own after school activities franchise with various listings available at Franchise India.'
        ),
        '88' => array(
            'title' => 'Schools Franchise - Opportunity to be a part of the 1, 00,000 crore education industry in India',
            'description' => 'In the education industry, the school is referred to an institution where students learn things under the direction of teachers. To start a school it requires a lot of effort, but if you have the right business model in place then franchising is the best option helping you to minimize the effort and stress in starting your own school along with the support for constructing it. If you want to bring about improvement in the school education, then go through the various school franchise listings available to enjoy success at no risk.'
        ),
        '89' => array(
            'title' => 'Competitive Exam Coaching Institutes Franchise - Opportunity to get into a sunrise education industry',
            'description' => 'With the increasing gap between what is taught in schools or colleges and what is questioned in entrance examination, the demand of coaching institutes also increases. So therefore, the competitive exam coaching institute holds a bright future for aspiring entrepreneurs as people are becoming career conscious in large numbers. If you want to increase your revenue or start a new business in this lucrative field, just make a click on competitive exam coaching institutes franchise that interests you most.'
        ),
        '90' => array(
            'title' => 'Online Coaching Franchise - Easy to manage business opportunity',
            'description' => 'In today’s world, students want an effective outcome which is extremely cost effective and scalable. Here, the online coaching comes into the play with online tutoring platform that can be integrated into any Learning Management System. The interactive online programs developed over the time meet each & every student need. This is and will continue to be a key market driver for years to come. If you are entrepreneurial and compassionate, the online coaching franchise could be your best opportunity to earn a good living and make a difference in someone’s life. Browse now!'
        ),
        '91' => array(
            'title' => 'Own Robotics & Technical Training Franchise & help promising youngsters to realize their potential and creativity',
            'description' => 'Youngsters in the today’s world are more towards integrating real world ideas with the latest in technology. This increases the demand of robotics & technical training institutes in the education industry. By owning robotics & technical training institute franchise, you can get an established & reputed brand name, detailed operating manuals to start a business, excellent returns on investment and many more. Now days, many people are looking to move out of their corporate life and become their own boss via franchising. If you are one of them, then you can surely be a part of this ever growing business segment. Search now!'
        ),
        '92' => array(
            'title' => 'TAKE SCHOOL TUTORING FRANCHISE AND HELP IN DEVELOPMENT OF FUTURE OF THE COUNTRY',
            'description' => 'School Tutoring business is gaining popularity at a great pace as the number of students going to school has increased. Tutors make it easy to schedule sessions when and where it is convenient for the students and guide them to achieve the desired results in examination. With the competition getting tougher and tougher, this business sector has shown a great potential for anyone planning to have a new business with great returns on investment. Choose the opportunities appealing to you and start your own business today.'
        ),
        '93' => array(
            'title' => 'PROFESSIONAL EDUCATION COLLEGES – AN OPPORTUNITY TO GRAB FOR THE BEST OUTCOME IN TERMS OF RETURNS ON INVESTMENT',
            'description' => 'Professional Education Colleges are gaining popularity as most of the youth is working as an employee for which great professional qualification is required. Starting a business that caters the need of the youth is proved to be the most successful business option to go with. Professional education college franchise is an evergreen business option which is recession free and could be started with a range of investment options. Choose from various appealing opportunities available with us and start your own Professional Education Colleges with a leading name.'
        ),
        '94' => array(
            'title' => 'FOR A BUSINESS SECTOR WITH EVER-GROWING PROFITS - DEGREE/DIPLOMA COLLEGES FRANCHISE IS THE OPTION',
            'description' => 'Lot of people are heading to get a Degree/Diploma in various specializations with which the need of Degree/Diploma colleges is increased. This is also attracting business owners to step into the education market to make good profits by developing future of the country. Education sector has proved to be the best to start a new business and get great rewards for the investment made. You can browse various listings available to start a new business as a Degree/Diploma College Franchisee.'
        ),
        '95' => array(
            'title' => 'UNIVERSITIES FRANCHISE - A BUSINESS ARENA THAT EVERYONE WANTS TO JOIN AS AN ENTREPRENEUR',
            'description' => 'Numerous of big names have stepped into education field to earn great returns on investment. It is one of the favourite businesses which is recession free and provides great opportunity to become a successful entrepreneur. A big part of population is going to universities and getting certified with degrees and certifications in particular field to live an ideal life. With this the potential in the education market can be estimated, which is very vast and compelling. University franchise also provides a satisfaction of playing a contributing role in development of the country. Browse the options today and take your step to become an entrepreneur.'
        ),
        '96' => array(
            'title' => 'DISTANCE LEARNING CENTRES – THE RIGHT OPPORTUNITY TO BE A LEADING ENTREPRENEUR',
            'description' => 'As the technology has moved to the next level, life of an individual has also taken a pace, and to cope up with this lot of people prefer distance learning centres to upgrade their knowledge. Distance Learning Centres are the places where person has to go for classes in weekends and can get all the desired knowledge up gradation to move a step ahead in his career. With this, more and more opportunities are emerging up as distance learning centres franchise. So, if you are planning to have your own distance learning centre, have a look at various trusted names offering franchise opportunity in this sector.'
        ),
        '97' => array(
            'title' => 'LANGUAGE SCHOOLS FRANCHISE – AN OPPORTUNITY CATERING NEEDS OF INDIVIDUALS FOR PROFIT',
            'description' => 'With growing international businesses, language schools have also gained a great notification to deliver the language skills to individuals for international trade. In past, language schools have emerged as a great business opportunity for the one who want to become successful in education sector. The good thing about education sector is that it is not affected by recession like other businesses. Choose from various language schools franchise opportunities with us and become your own boss.'
        ),
        '98' => array(
            'title' => 'WANT TO HAVE A BUSINESS WITH GREAT POTENTIAL – GO FOR BPO/KPO TRAINING INSTITUTES FRANCHISE',
            'description' => 'BPO/KPO Training Institutes basically deals with services in the outsourcing industry in India, catering mainly to western operations of multinational corporations (MNCs). With number of MNCs looking for outsourcing services, the need of people with this knowledge skill set has increased up to a great extent. Thus, lot of people looking to plan their future in this industry are going for BPO/KPO Training Institutes. Get connected with us today and browse various business opportunities for BPO/KPO Training Institutes Franchise.'
        ),
        '99' => array(
            'title' => 'GET GREAT REWARDS ON YOUR INVESTMENT BY OWNING AN IT EDUCATION FRANCHISE',
            'description' => 'IT Education franchise is the most booming sector that has shown a steep increase in its profitability. With most of the businesses depending on technology, the role of IT Education is increased and thus the need of IT Education institutes is also increased. Securing your future earnings with education business it the best thing one can do in today’s time. Select from various IT Education franchise options available at Franchise India to have a strong presence in education sector with a renowned brand name.'
        ),
        '100' => array(
            'title' => 'CHOOSE FINANCIAL ADVISORY FRANCHISE AND IMPROVE YOUR FINANCIAL STATUS BY HELPING OTHERS',
            'description' => 'Today, everyone consider talking to an expert financial advisor who will provide the best possible financial sources that can help to arrange the necessary funds for the investment in right place. With Franchise India, you can browse the directory of finance consultants franchise and get great platform to follow for success. A huge population of our country have financial requirement for which financial advisory is required, so starting your own business as financial advisory training institute is a great option to become a successful entrepreneur in a short period of time.'
        ),
        '101' => array(
            'title' => 'RETAIL TRAINING – THE EMERGING BUSINESS OPPORTUNITY IN EDUCATION SECTOR',
            'description' => 'Retail is a highly complex industry with involvement of specialized processes & skills required. Hence, the need to learn about the global and the evolving Indian industry and the concepts behind the working of the industry is growing day by day. Retail training institutes offers training solutions for retailers and trains individual for dealing in retail sector. Having own retail training institutes is now proved to be a beneficial business for the one having it. If you are planning to be the one having Retail Training franchise, check out the opportunities available with us.'
        ),
        '102' => array(
            'title' => 'BEAUTY & WELLNESS TRAINING INSTITUTES FRANCHISE - A BOOMING OPPORTUNITY IN EDUCATION & TRAINING SECTOR',
            'description' => 'Concern for beauty & wellness for every individual is increasing day by and with this business opportunities are also expanding to grow more & more. Recently, the market for beauty & wellness training institutes has shown a rapid growth. So, if you are planning to get in to an education sector business keeping your passion for beauty and wellness, Beauty & wellness training institutes franchise is what you need. Check out the various options available for you to become an entrepreneur at Franchise India.'
        ),
        '103' => array(
            'title' => 'BANKING & INSURANCE TRAINING INSTITUTES FRANCHISE – OPPORTUNITY TO JOIN EVER GROWING BUSINESS SECTOR',
            'description' => 'With the growing opportunities in Banking & Insurance sector, everyone wants to join an institute that delivers quality solutions in the area of Banking & Insurance. The industry is growing at the rate of 33% per year and there will be a shortfall of 30, 00,000 finance professionals. Thus, Banking & Insurance Training Institutes are having a great opportunity grab huge capital profits. So, for the one planning to become an entrepreneur, Banking & Insurance Training Institutes franchise is one of the best options. Choose one of the leading franchise options available at Franchise India and be your own boss.'
        ),
        '104' => array(
            'title' => 'Give wings to your entrepreneurship via Aviation & Hospitality Training Institute Franchise',
            'description' => 'Now days, aviation & hospitality is one of the high-growth sectors serving people worldwide. With the aviation sector expanding at a fast pace and the number of aircraft being used on the rise, the need for pilots and air cabin crew is growing. This results in the increase in demand of aviation & hospitality training institutes. By owning aviation & hospitality training institutes franchise, you can get benefit from active support & guidance for centre start-up, course design & delivery support, marketing support and the like. If you want to access a proven partnership model with clearly defined roles & support, then choose from aviation & hospitality training institute franchise opportunities available at Franchise India.'
        ),
        '105' => array(
            'title' => 'Make a big difference in your earnings with Skills / Personality Development franchise',
            'description' => 'In today’s world, everyone wants to develop their personality, enhance quality of life, contribute to the realization of their dreams and aspirations. Due to this, there is an increase in the demand of personality development training institutes. Owning a personality development training institute franchise is a profitable option to enter into this growing segment. In franchising, a specialized team will work closely with you and your staff and create a strong foundation for your franchise business and then help you with franchise strategy, sales, training and support. So to overcome the administrative headaches associated with setting up a business from scratch, browse the array of personality development institutes franchise opportunities available at Franchise India.'
        ),
        '107' => array(
            'title' => 'Online Learning/E-learning Franchise – Sunrise business opportunity',
            'description' => 'Now days, there is an increase in the number of educational opportunities within the electronic world, from “live” chat classrooms online to self-paced study through a website or CD Rom, to courses delivered via email. So therefore, owning an online learning/e-learning franchise is a profitable option. Do you truly have the entrepreneurial spirit or are you displeased with your job, career progress, or work environment? Don’t worry! Franchise India brings numerous online learning/e-learning franchise opportunities to choose from.'
        ),
        '109' => array(
            'title' => 'TV CHANNEL/NETWORK FRANCHISE – A TRUSTED BUSINESS PATH TO FOLLOW',
            'description' => 'The TV Channel/Network franchise is highly profitable opportunity for business owners. Before choosing the right business franchise opportunities, considering the growth of that industry in coming time is crucial. TV Channel/Network franchise has shown a remarkable business opportunities and helped many individual fulfil their dreams. If you are planning to become an entrepreneur in TV Channel/Network industry, Franchise India is the option to help in choosing the right franchise option for you. Start your search now!'
        ),
        '110' => array(
            'title' => 'Get a wide exposure in franchise industry with Digital Media & Internet Marketing Franchise',
            'description' => 'The digital media & internet marketing franchise industry is hugely profitable for entrepreneurs. Just check out the numerous digital media & internet marketing franchise opportunities available for you to have great returns on investment and a shining future ahead. With digital media & internet marketing services you can promote others business and likely your business will also be promoted. So, for an opportunity to be part of a rapidly-growing industry, online franchise business leader - Franchise India is the best you have to guide you for a new start.'
        ),
        '111' => array(
            'title' => 'FOR A TRUSTED BUSINESS OPPORTUNITY SECTOR - PUBLICATIONS & PRINT MEDIA OFFERS GREAT PACKAGE',
            'description' => 'Publications & Print Media is now becoming the need of every business person in order to grab attention and spread awareness about the products and features of the company. Publications & Print Media franchise has also shown great boost from business aspects. People are getting interested in starting business in Publications & Print Media sector for lucrative returns as it has become the need of everyone. Get the inside scoop on various Publications & Print Media franchise available with us.'
        ),
        '112' => array(
            'title' => 'PUBLIC RELATIONS (PR) BUSINESS WITH LEADING NAMES IN PUBLIC RELATIONS – A GREAT PATH TO SUCCESS',
            'description' => 'For professionals who want to have their own Public Relations (PR) businesses, but also want to have the benefits of a quick-start, turn-key operation, a support network of other professionals, and national branding, Public Relations (PR) Franchise is the best option. Public Relations services basically include internal and external communication strategies, media relations, professional writing of reports, advertising management, public relations management, product launches, local area marketing and more. To start your own business in Public Relations (PR), check out the options available with us.'
        ),
        '113' => array(
            'title' => 'AD AGENCIES & COLLECTION CENTRES FRANCHISE – A TURNKEY BUSINESS OPTION',
            'description' => 'Start your own advertising agency and be the part of $35 billion advertising and marketing industry. The Ad Agencies & Collection Centres franchise provides the tools needed to launch a career of any scope. Having a business that serves the need of every other business in terms of branding and marketing is a great idea and if you want grab this golden business opportunity then start with a leading name in Ad Agencies & Collection Centres, search from numerous listings available with us and start your own business.'
        ),
        '114' => array(
            'title' => 'BEAUTY & HEALTH – THE EVER GROWING BUSINESS INDUSTRY TO CRAFT A SUCCESSFUL FUTURE',
            'description' => 'Invest in a wholesale/distribution business in Beauty & Health to be a part of a trillion dollar industry. Beauty industry opportunities can be broadly separated between products and services. Within both products and services, a wide range of business models based on target market, production processes and location. You can choose from variety of Beauty & Health franchise options available with Franchise India to start your own business as a dealer and distributor of Beauty & Health products.'
        ),
        '115' => array(
            'title' => 'STARTING YOUR BUSINESS AS DEALER AND DISTRIBUTOR – GO WITH ELECTRONICS AND ELECTRICAL COMPONENTS',
            'description' => 'Today electronics and electrical components business is continually going through changes and new trends are established on a regular basis. Hence, business opportunities in this sector are rising day by day. In fact, by being a franchise of leading electronics and electrical components brands, an individual can secure his future income and enjoy the feel on being a successful dealers and distributor. The best way to start is to search out the electronics and electrical components franchise listings available with Franchise India, start today!'
        ),
        '116' => array(
            'title' => 'AUTOMOBILES & ANCILLARY INDUSTRY – TAKE FRANCHISE TODAY TO BE A SUCCESSFUL OWNER',
            'description' => 'Automobiles & ancillary industry in India has attained a great pace and is expected to go even more, starting a business in this sector could be the best step to take for securing the future. With increase in automobiles industry, the need of automobiles & ancillary has also raised. You can search from various leading business opportunities available in Automobiles & Ancillary sector to start your own business with a good brand name ahead of others. Start your search today and be your own boss.'
        ),
        '117' => array(
            'title' => 'CLOTHING – A BUSINESS OPPORTUNITY IN DEMAND FOREVER',
            'description' => 'Clothing is the one industry that is continuously growing since its evolution. Having a business in such a sector is what everyone looks for. With the increase in population the need for clothes is ever increasing, trends and fashion are always changing which also result in growing demand. So, if you are planning to have your own business in an industry where trend is changing from time to time, Get in to clothing. Browse the range of business opportunity available and take franchise today to be the leader of tomorrow.'
        ),
        '118' => array(
            'title' => 'Generate a potential benefit from the first month by becoming dealer & distributor of Mobile & Communication',
            'description' => 'The mobile & communication business has two main aspects, one is the sales of the phones & accessories themselves and another one is the sale of the cell phone & data service. Generally, the mobile & communication industry is continuously growing by serving the demand of large number of cell phone users. If you want to become part of this profitable industry as a dealer & distributor, go through the mobile & communication listings available at Franchise India.'
        ),
        '119' => array(
            'title' => 'Computer Hardware & IT - High in demand business sector for dealers & distributors',
            'description' => 'It’s always easy to start a business via franchising where you can access a successful business model completely. Recently, all segments of the Computer Hardware & IT industry - computers, peripherals and networking products recorded impressive growth in the coming years. So if you want to try to get an additional profit margin by selling Computer Hardware & IT products as a dealer & distributor, make a click on Computer Hardware & IT listings to enjoy success in less time.'
        ),
        '120' => array(
            'title' => 'Become dealer or distributor of security products to support people for life safety form threats, dangers and emergencies',
            'description' => 'In today’s world, many people are attentive to potential problem when it comes to security. As threats mount up every day, so there is no option but to tighten the security system all long way. By owning security franchise as a dealer & distributor, you can become part of a well established brand name, highly experienced security professionals team and the like. To move further, just browse the list of security listings available at Franchise India & do business in big way.'
        ),
        '121' => array(
            'title' => 'Opportunity to become part of fast-paced FMCG sector as a dealer & distributor',
            'description' => 'FMCG - Fast Moving Consumer Goods or Consumer Packed Goods (CPG) are the products that are consumed by the consumers at a regular interval. Due to the high competition among FMCG manufacturers, the investment into FMCG industry is increasing, specifically in India. This industry is estimated to grow 80% in the coming years & regarded as the fourth largest sector with total market size of US$13.1 billion. Becoming dealer & distributor of FMCG products is a profitable option for starting your own business & be your own boss. Start your search now!.'
        ),
        '122' => array(
            'title' => 'Fulfil your dreams of becoming your own boss as a dealer & distributor of building & construction materials',
            'description' => 'Now days, the use of building & construction materials is at peak in the developing country like India, as the new works, repair and maintenance of bridges, high-rise buildings, dams and civil engineering structures are continuously growing & constantly evolving. By becoming distributor of building & construction materials, you can get a chance to works closely with contractors, builders, architects and construction personnel to supply the materials needed to complete building projects. Browse through the listings of building & construction material now!.'
        ),
        '123' => array(
            'title' => 'Kids and Infant Products Franchise - Business opportunity with a proven track record of franchisee success',
            'description' => 'Kids and infant products franchises sell products to parents. If you’re looking for the safest way to expand or diversify a business, it’s franchising. Kids and infant products are always high in demand as parents are paying attention and spend money on their children receive a quality care. If you are a business minded entrepreneur and want to give yourself a personal freedom, then here you can choose from various kids and infant products franchises available. Just click on the kids and infant products franchise you’d like to research and your franchise opportunities will appear. Good luck with your search!.'
        ),
        '124' => array(
            'title' => 'Exclusive opportunity to become dealer & distributor for home products',
            'description' => 'Home products make people’s lives more comfortable and convenient by maintaining the principle of “people-centred perspective”, so therefore many organizations are engaged manufacturing home products in bulk. This results in increase in the demand of home products. If you are worried about being downsized, or bored with your current job, being a dealer & distributor of home products may be the right business for you. Check out the available home products listings now!.'
        ),
        '125' => array(
            'title' => 'RESELLER – A BUSINESS OPPORTUNITY EVER IN DEMAND FOR LUCRATIVE RETURNS',
            'description' => 'Want to own a business that purchases goods or services with the intention of reselling them rather than consuming or using them, Resellers Business is the best you can go for. A large number of people are getting in this business sector looking at the lucrative returns for investments made. This sector has shown a great growth and is the finest business option for the one wanting to become successful having his own business, Check out the various opportunities available in this only at Franchise India.'
        ),
        '127' => array(
            'title' => 'Courier & delivery business – your chance to become an entrepreneur',
            'description' => 'Having desire to be your own boss? The courier franchise industry is rapidly expanding making it one of the most profitable franchise industries to get involved in. The courier services franchise delivers letters, parcels, and goods or just about anything to the prescribed destination. Check out the range of courier & delivery franchise options available with Franchise India and get in touch to take franchise and start your entrepreneur career now. Good luck for your search!.'
        ),
        '128' => array(
            'title' => 'SUPPLY CHAIN MANAGEMENT FRANCHISE – WORLD OF OPPORTUNITIES FOR MAKING DREAMS ALIVE',
            'description' => 'Supply chain management (SCM) is the management of an interconnected network, channel and node businesses involved in the provision of product and service packages required by the end customers in a supply chain. And this is the much needed for every business dealing in consumer products. So, if you are looking to start a business that offers a promising growth and a great career option, then go for Supply chain management business. Choose from the various Supply chain management franchise options available and become a entrepreneur to fulfil your dreams.'
        ),
        '129' => array(
            'title' => 'TRANSPORT FRANCHISE – A SAFER BUSINESS OPPORTUNITY TO MAKE DREAMS COME TRUE',
            'description' => 'Lot of people now are shifting from one place to another and more and more business are expanding to various different locations which depends on transport for their products to be delivered on time.  Transport is serving as an important part since it enables trade between people, which in turn establishes civilizations. So, having a business in this sector is like having a great opportunity to get success in life as an entrepreneur. Choose from various Transport business opportunities available with us and be your own boss with a leading name.'
        ),
        '130' => array(
            'title' => 'SECURITY SERVICES – OPPORTUNITY FOR GREAT RETURNS AND GET IN TO IT SECTOR',
            'description' => 'Information Technology Security is security applied to technology (most often some form of computer system). Lot of companies deal with sensitive data and want to secure it from any kind of misuse. To offer these security services lot of options are available in market but still the need for more is emerging. Having your own business in Security services is a great option to get into ever growing IT sector as an entrepreneur. Check out the numerous options for information technology security franchise available with us and choose the one appealing to your requirement to start your own business.'
        ),
        '131' => array(
            'title' => 'Computer And ICT Services Franchise - The most successful & trusted business opportunity',
            'description' => 'Computer and ICT services franchise opportunities cater to the savvy entrepreneurs who are interested in a great business opportunity or to investors who have the dream of owning and operating their own business. In fact, Computer and ICT services franchises are highly successful and poised for more growth in future. Computer and ICT services franchise is a fast-growing franchising sector, as more and more entrepreneurs are planning to be a part of this booming industry. Owning Computer and ICT services franchises have many positive advantages, including support from the company in finding a location, management, marketing, hiring and training your employees. As an investor, you have plenty of options in this segment to choose from. So, start your search NOW!.'
        ),
        '132' => array(
            'title' => 'CARTRIDGE REFILLING - A BIG OPPORTUNITY WITH JUST SEEMS SMALL',
            'description' => 'Printing is a critical function for any business, large, medium or small but it doesn’t have to be a costly function. People don’t want to lost time due to ink, toner or paper running out and staff having to leave the office to get more stock of printer cartridges can impact productivity and profit. Starting a business that fulfils the need of every business is a profitable step to take on. Search for a range of franchise options in Cartridge Refilling to be your own boss with a great future ahead securing your future.'
        ),
        '133' => array(
            'title' => 'PRINTING SERVICES – A GREAT REVENUE GENERATION IDEA',
            'description' => 'Printing Services play an important role for every business in branding and promotion of the company. If you are planning to start your own business, then you have the option to start your own profitable business in Printing Services. The printing services businesses have shown a great increase in revenue generation from business point of view. So, to make your dreams alive, just check out the various Printing Services franchise available with us and start your own business for profitable returns.'
        ),
        '134' => array(
            'title' => 'Become a telecom franchisee to be a part of leading industry having huge profit potential',
            'description' => 'Telecom industry has been witnessing consistent growth over the last few years and is expected to lead the era of technology in the coming years. Grabbing the opportunity of telecom franchise could be the wisest decision that can help you get benefited for lifetime. There are various opportunities you can grab from telecom business franchise. In telecom industry you can serve as a mobile handset manufacturer, telecom equipment manufacturer, telecom software developer, network integrator and more. Getting into a telecom business was never so easy before; design your success path with telecom franchise opportunities by Franchise India.'
        ),
        '135' => array(
            'title' => 'INSURANCE FRANCHISE – A BUSINESS OPPORTUNITY TO SECURE YOUR FUTURE WHILE SECURING OTHERS',
            'description' => 'Everyone today wants to secure the savings, business, equity, future and many more for a healthy living. With this, the need of insurance is increased and hence the role of insurance company is also getting more and more critical. The insurance business has shown a noticeable growth with which anyone can be influenced to get into an insurance business for profitable business. But, no doubt the insurance business is definitely a profitable aspect to move with. Select from various Insurance franchise options available with us and start your own business today!.'
        ),
        '136' => array(
            'title' => 'Post Office Services Franchise - Business opportunity with lucrative returns',
            'description' => 'With over 1.8 Lakh post offices, India has the largest postal network in the world, including more than 80% in the rural area, so there continues to be a demand for post offices. Investment made into this segment is profitable, as there is a constant demand from customers to open new post offices in the newly developing urban area. If you are like-minded entrepreneur & would like to invest into this segment, then browse through the various Post Office services franchise listings available at Franchise India.'
        ),
        '137' => array(
            'title' => 'Become finance advisors & brokers to work with the biggest names in the financial industry',
            'description' => 'Most people find it difficult to obtain finance for their new business venture, they have experienced that banks do not grant loans to them easily. This results in the increase in the demand of financial advisors & brokers who advice people and help them to determine their borrowing needs and capacity. If you wish to make a brake form your current job & work in partnership with well reputed names in this lucrative business segment, then make a click on various Finance Advisors & Brokers Franchise listings available at Franchise India.'
        ),
        '138' => array(
            'title' => 'Microfinance - A vibrant segment of financial industry',
            'description' => 'Microfinance - a type of financial services such as loans, insurance, savings for small business owners lacking access to banking & related services. This vibrant segment is always in demand as changing economic conditions are perfectly suited for ongoing success. If you are like minded entrepreneur & looking for a successful business model, then go through the array of Microfinance franchise opportunities to build a world in which the underserved have fair access to economic opportunities and the hope to move beyond poverty.'
        ),
        '139' => array(
            'title' => 'EQUITY & DEBT PROVIDERS FRANCHISE – BUSINESS FOR THE ONE TO GET IN TO BOOMING FINANCIAL-SERVICES INDUSTRY',
            'description' => 'Opportunities never wait and the one who want to become successful grab the chance when it comes. Equity & Debt Providers Franchise business is a leader in the financial-services industry that helps individual achieve financial freedom. For person having desire to become self-employed or independent business owner in the leading finance sector, lot of options are available with Franchise India. Check out the listings now to start your own profitable business.'
        ),
        '140' => array(
            'title' => 'Foreign Exchange Franchise - Opportunity to earn more from money changing business',
            'description' => 'FOREX is trading with foreign currency & similar type of financial products. Now days, it is quite popular & considered to be a most common investment activity. By becoming franchisee in this profitable segment, you can get benefit of all the technical support, training, setup design support and managerial knowledge backup to run business smoothly.  Just click on the Foreign Exchange (FOREX) franchise opportunities available and request more information that interests you most.'
        ),
        '141' => array(
            'title' => 'Move fast & link with a new challenge by owning Pawn Brokers franchise',
            'description' => 'Pawnbroker is a business (pawn shop) or person offering secured loans to individuals from all walks of life, with items of personal property used as collateral. By becoming pawnbroker, you can make money on the interest charged on the loans secured against pledges or pawns. Now days, many people spend their lives hankering for the challenge of owning their own business. If you are one of them and want to make money in this growing segment, start your search with the Pawnbroker franchise listings available at Franchise India. All the best for your search!.'
        ),
        '143' => array(
            'title' => 'TRAVEL AGENT FRANCHISE IS THE OPPORTUNITY FOR THE ONE WHO LOVES ASSISTING IN TRAVEL PLANS',
            'description' => 'Planning to have a business for assisting individuals and businesses in setting up their travel plans? Travel Agents franchise is the business you can go with and start your own business in travel sector. Travel industry has shown a moderate growth and people indulged in travel business are enjoying their returns on investment. So, if you want to be one of the leading entrepreneurs in travel agent business, have a look at various travel agent franchises available with us and get one for you to start.'
        ),
        '144' => array(
            'title' => 'TOUR PACKAGES FRANCHISE TO OFFER HASSLE FREE SERVICES AND GET HASSLE FREE RETURNS',
            'description' => 'In this fast moving life arena, everyone wants to do the things in a hassle free manner and people are ready to spend money for their comfort. With this the need to businesses that offer planned services to people is growing and making good profits. Travel is a similar kind of business sector that offers tour packages which are planned and the consumer is not required to take any kind of hassle for the journey. Choose the tour packages franchise from an array of leading franchise opportunities available at Franchise India.
'
        ),
        '145' => array(
            'title' => 'CAR RENTAL & CAB SERVICES – THE BUSINESS THE CATERS YOUR FUTURE NEEDS',
            'description' => 'Lot of people desire to own a car, but not all are capable of buying owning a car. For those car rental & cab services provider is the option to go. The car rental & cab service business has grown with a recommendable speed with the number of people avoiding the expenditure of maintaining a vehicle. Having your own business in car rental & cab services is a great option to choose for securing the future earnings for a happier life. With Franchise India you can go through a large array of car rental & cab services franchise options to grab a one that fulfils your requirement.'
        ),
        '146' => array(
            'title' => 'ONLINE TRAVEL SERVICES FRANCHISE – AN APPEALING BUSINESS OPPORTUNITY FOR ALL',
            'description' => 'Online travel services provides tourism related services to the public on behalf of suppliers like airlines, car rentals, cruise lines, hotels, railways, and package tours. The online travel services aims to offer instant booking and comprehensive choices for the one looking to get the travel packages and other services. Now, everything being online, the ease for customer is increased. To have your own business for online travel services, check out the range of business opportunities with us. Good luck for your search!'
        ),
        '148' => array(
            'title' => 'EVER IN DEMAND, GROWING BUSINESS OPPORTUNITY – REPAIR SERVICE FRANCHISE',
            'description' => 'Repair Services focuses on saving clients money by extending the life of the product through repairing it with very low cost of the complete new product. In this sector, Growth is undoubtedly noticed that is attracting new investors to get in to repair industry. Check all the listings available with the franchise India to choose a leading name in repair sector and become a part of the leading industry. The opportunity is here for you; grab it to enjoy great returns on your investments.'
        ),
        '149' => array(
            'title' => 'INSTITUTIONAL/FACILITY CLEANING – A GROWING INDUSTRY WITH GREAT POTENTIAL',
            'description' => 'Want to be your own boss and start your business in institutional/facility cleaning industry by charging for cleaning services. Past has witnessed a huge growth in cleaning industry, as the number of institutions has increased at a rapid pace which has resulted in the huge requirement for institutional/facility cleaning service providers. Opportunity is here for you, just check out the options available in institutional/facility cleaning franchise for you and grab a one for your interests.'
        ),
        '150' => array(
            'title' => 'LAUNDRY & DRY CLEANING FRANCHISE - OPPORTUNITY TO HAVE A BUSINESS FOR FUTURE RETURNS',
            'description' => 'Laundry & Dry Cleaning business is a good option for the looking to start a new business with high possibility of interest on returns. With lot of people getting in to corporate world, the need of laundry & dry cleaning services has increased as people don’t have time for laundering & dry cleaning of their own. So, start your search at Franchise India and choose a leading name to become Laundry & Dry Cleaning franchise.'
        ),
        '151' => array(
            'title' => 'HOUSEKEEPING – A BUSINESS TO EXCEL IN FUTURE',
            'description' => 'Now days in every home, there is a need of housekeeping. Lot of people are having Housekeeping persons that nearly takes care of the house as the owners are not available all the time. With this, Housekeeping has emerged as a good business options to offers services to the ones that have money but no time. So, if you are planning to start your own business, then this is the time, join hands with a leading name and become franchisee.'
        ),
        '152' => array(
            'title' => 'PEST CONTROL – THE NEED OF EVERY HOME & OFFICE',
            'description' => 'Pest control has emerged as a life saver for most of the people were facing problem at their homes and offices from insects. Lot of people fear from insects and are very much disturbed some times. These insects make the house and office un-hygienic and cause various diseases. To make the living place more secure and safe, the need of pest control is there. Take a look of the array available with Franchise India to choose the brand name you want to associate with as a pest control franchisee.'
        ),
        '153' => array(
            'title' => 'BUSINESS FRANCHISE – GREAT POTENTIAL INDUSTRY TO GROW WITH',
            'description' => 'Business consultant franchises offer many different services for their clients which help in saving a considerable amount of money for the client. Some of the highest earning franchisees save money with cost-cutting services offered by business consultants only. Others help grow small and medium-sized businesses through corporate training which helps in understanding the path to move on for growth with a good rate and excel in future. Have a look at various Business consultant franchise options to choose from only at Franchise India.'
        ),
        '154' => array(
            'title' => 'REAL ESTATE FRANCHISE – A BUSINESS OPPORTUNITY WITH COMMENDABLE GROWTH',
            'description' => 'Real Estate market is the one that has shown a huge growth and is providing great commendable profits to real estate consultants. Everyone wants to have a business with great returns and real estate is the sector known for best returns. Be a part of such an exciting and rewarding franchise industry by considering various listing with Franchise India. Have a look and choose a leading name to start with.'
        ),
        '155' => array(
            'title' => 'FINANCE – THE BEST BUSINESS TO GET CHERISHING REWARDS',
            'description' => 'Want to earn profit from a multi-billion dollar industry by investing in accounting and financial franchises. Provide a fast cash flow solution for small to medium-sized businesses via unique market working capital offering and get cherishing rewards in return for lifetime. Finance sector has been very rewarding for nearly every business person and starting it with a leading name in finance is the best deal to crack. Browse the leading names in finance offering franchise only at Franchise India.'
        ),
        '156' => array(
            'title' => 'MATRIMONIAL FRANCHISE - BUSINESS OPPORTUNITY THAT BRINGS FAMILIES TOGETHER',
            'description' => 'Want to be the driving force of the meeting place of the life mates. Act as a catalyst in searching for the life partner and creating relationship to marriage. The best ever business, help people in searching the perfect soul mate and live happily ever. Matrimonial franchise is the best way to start your own business and get the best rewards for your investments. Browse the array of leading options in matrimonial franchise and be the leader for tomorrow in matrimonial sector.'
        ),
        '157' => array(
            'title' => 'BPO Franchise - A Unique Business Opportunity',
            'description' => 'BPO - Business Process outsourcing sector is constantly evolving at a steady pace, owning its franchise is a profitable business option for investors and business owners. The outsourcing demonstrates one of the highest potential for India’s economic growth and will continue to grow further to become larger than the IT business itself. No matter what you are looking for, as BPO industry is likely to grow around 40-50% in the near term. Just browse through the BPO franchise listings available at Franchise India.'
        ),
        '158' => array(
            'title' => 'Assist people with career and personal development concerns by becoming career counselor',
            'description' => 'Now days, more & more individuals have higher expectations for career counsellor who guides them about career transition, and career direction. Owning a career counseling franchise is a trusted path to establish yourself in the education industry and thus increase business. By becoming franchisee in this segment you can get rights of association with a reputed brand and expand in the highly reputed educational industry which has ample opportunity to make you a professional in the true sense. Browse the career counseling franchise listings now!.'
        ),
        '159' => array(
            'title' => 'Achieve maximum potential and revenue by consulting services to SMEs',
            'description' => 'In today’s business world, most of small medium entrepreneurs & businesses need resources and techniques that will take them to higher level of business & growth. Consulting Services to small medium entrepreneurs is a profitable business option bringing a pathway to create value and growth. If you are operating a successful small business now and you want to expand while maintaining a lower risk then Franchising might be an option to consider. Just have a look on various franchise listings available & choose a leading name that serves your interest.'
        ),
        '160' => array(
            'title' => 'Create an income that you thought you could only dream about with immigration franchise',
            'description' => 'Given the increasing interest people have in settling down in other countries, immigration franchises are lucrative business options for investors and entrepreneurs. And people look for quality immigration services to help them settle down from one country to another in an easy way. This is why many well known immigration service providing companies are looking for investors and entrepreneurs to increase their brand visibility. If you are interested in this business, look for an immigration franchise business option to enjoy success and profit in less time. No matter what you’re looking for, immigration franchise can be rewarding as more and more people are looking for experts to handle the immigration process.'
        ),
        '161' => array(
            'title' => 'HR & Recruitment Franchise - Opportunity to become part fast-paced recruitment and HR industries',
            'description' => 'HR & Recruitment Consultancies are responsible for attracting candidates and matching them to temporary or permanent positions with client companies. Today, Indian recruitment market is growing at a success rate of 70% every year. If you are looking to start your own business in human resource sector, you have landed at the right place where you can choose from various HR & Recruitment franchise opportunities that suits your interest.'
        ),
        '163' => array(
            'title' => 'Astrology & Tarot Franchise - Opportunity to provide personalized guidance to help people live each day with awareness',
            'description' => 'Now days, everyone wants to know what is going to happen next in their life, here the concept of Astrology & Tarot comes in demand. It’s exciting to consider starting Astrology & Tarot business of your own; as it is very easy to work from home & you can easily earn huge amount of money in no time. However, you need to keep in mind the different franchise requirements when considering starting your future business. Browse the array of Astrology & Tarot franchise opportunities available at Franchise India.'
        ),
        '164' => array(
            'title' => 'Help people to make a move in the right direction with your own consulting business',
            'description' => 'Today, starting a consulting business is one of the best ways to get an excellent income while connecting with new people daily. Owning a franchise is one of the profitable options to leverage a reputed & well established brand name of a consulting company. People with enthusiasm and an entrepreneurial spirit who wish to involve themselves in this fast growing concept can choose from various consulting franchise listings available at Franchise India. Browse now!.'
        ),
        '165' => array(
            'title' => 'Part time/Flexi time Business Franchise - Low cost & Low risk business opportunity',
            'description' => 'Now days, most of the people wants to take franchise of a particular business that allows them to keep their current job & have a steady earnings. In this type of businesses, the franchisee works on an average of 14 to 18 hours a week. Part time/flexi time businesses opportunities simply get you started in a business, and once you get engaged into this growing segment, then you are pretty much on your own. Want to invest in an on-going business while comforting at your home? Welcome to our part time/flexi time businesses franchise opportunities to choose from.'
        ),
        '166' => array(
            'title' => 'Boutique Franchise - A profitable venture to invest in',
            'description' => 'Most of the people generally prefer those businesses in which they are familiar & most comfortable.  With a constant demand for new clothing products in the fashion industry, boutique is one of the great businesses that every wants to invest in. By owning boutique franchise of a reputed brand, you gain the benefits of a franchisor’s experiences and knowledge -much of it learned the hard way. Do you love making clothes & thinking about starting your own boutique? The boutique franchise opportunities at Franchise India help you fulfil your dreams of becoming your own boss.'
        ),
        '167' => array(
            'title' => 'Direct selling franchise - Business opportunity to tap into a proven system for success',
            'description' => 'Now days, the flexibility to work around full-time jobs or to create an income stream that fits into the family schedules is a huge perk. With a direct selling business opportunity, you can join an industry where business is booming and there is always room at the top. By becoming franchisee of any direct selling company, you can get benefit from high-impact marketing tools, including brochures, personal web sites, catalogs, CDs and DVDs and the like. If you want to invest into this profitable segment, then browse the array of direct selling franchise opportunities available at Franchise India.'
        ),
        '168' => array(
            'title' => 'MLM BUSINESS – AN APPEALING OPPORTUNITY TO START A NEW INDEPENDENT BUSINESS',
            'description' => 'The essence of entrepreneurship is the ability to spot an opportunity and the willingness to go after it. There are many MLM franchise business opportunities in the market today and anyone can earn a substantial income through this business. The franchisees of any multi-level marketing business represent the company that produces the products or provides the services they sell. Here, individuals are offered commissions based upon the quantity of product sold via their own sales efforts and their down line organization. There are some huge advantages to being the owner of an MLM franchise business opportunity, as here you can invest time according to your convenience. So, why not to start your own business in this growing business category?'
        ),
        '170' => array(
            'title' => 'AUTOMOBILE SHOWROOMS TO HARNESS THE TREMENDOUS INVESTMENT RETURNS',
            'description' => 'Start your own business with leading automobile showrooms to harness the tremendous opportunity available in the Indian auto market now. If you are an entrepreneur, or interested in being one, posses the ability to take up the challenge of operating a revolutionary business venture, Franchise India has lot of options for you to get into automobile showrooms business through franchise path.'
        ),
        '171' => array(
            'title' => 'CAR WASH AND MAINTENANCE FRANCHISE – SERVICE FOR EVERY CAR OWNER',
            'description' => 'In this fast moving life today we tend to spend more time in travelling as a result spend hours in the car, navigating the traffic jams. As a result, there is a severe need of professional car cleaning organization to take care of all car cleaning jobs and give us the finest and ultimate car cleaning experience and satisfaction. So, having your own business with a brand which is literally going to change the way people think about car cleaning, connect with us to browse various listings and associate with a one that appeals you.'
        ),
        '172' => array(
            'title' => 'TYRES, WINDSHIELDS AND CAR BEAUTY FRANCHISE – A SOLID INVESTMENT FOR GREAT FUTURE EARNINGS',
            'description' => 'Are you excited to be a pioneer in Tyres, Windshields and Accessories for car beautification business concept that will put in a leadership position in automobile industry? The study shows that despite the endemic problems in the car industry, tyres, windshields and car beauty franchises remain a solid investment. Customers are thrilled about the unique service experience of having their vehicles serviced when and where it’s convenient to them. Choose from a variety of opportunities available in tyres, windshields and car beauty sector and be your own boss.'
        ),
        '173' => array(
            'title' => 'TRACTORS AND FARMING EQUIPMENTS – A BUSINESS THAT YIELDS PROFIT',
            'description' => 'Tractors and farming equipments are the main equipments that cater the needs of a farmer and helps in improving the quality of results. These equipments play an important role in improving the quality of the resultant product and with these, the quantity is also raised. Tractors and farming equipments sector has shown the growth in recent times. To be the franchisee for leading supplier of high quality, industry leading agricultural machinery to customers, check out the business opportunities at Franchise India in tractors and farming equipments.'
        ),
        '174' => array(
            'title' => 'SECURITY & HELPLINE SERVICES – BUSINESS SECTOR FOR HIGHLY MOTIVATED INDIVIDUALS',
            'description' => 'Security & helpline services franchises are looking for highly motivated individuals to join their expanding business networks in the profitable security industry. Everyone now days want to start his own business and enjoy the power of an entrepreneur, But for this choosing the right business is the most important thing. Franchise India brings lots of opportunities for you to start your own business, Security & helpline services franchises are a good option to go with. Select a brand name you want to start with and be your own boss.'
        ),
        '175' => array(
            'title' => 'AUTOMOBILE RESELLERS - A GROWING SECTOR WITH HUGE POTENTIAL FOR PROFITS',
            'description' => 'Lot of people now days are shifting towards pre owned vehicles rather than new, to save money. Some people prefer because they want to get used to own a vehicle and then go for a branded new one. With this, business opportunity for automobile resellers has increased and the profit scale has also increased. Browse the listings with us now and go with the leading brand name in automobile resellers you want to associate with.'
        ),
        '177' => array(
            'title' => 'START CONSUMER FRANCHISE TO BECOME A SUCCESSFUL ENTREPRENEUR',
            'description' => 'Consumer Electronics: With limitless opportunities in the consumer services franchise business opportunities, more and more investors and entrepreneurs are finding it the best way to enter the world of business. Today consumer electronics are continually going through changes and new trends are established on a regular basis. Hence, to keep up with all the consumer electronics industry changes, keep yourself updated with all the latest trends and changes and implement them in your business. In fact, by being a franchise of leading consumer service brands, you will get the support of the franchisor as a successful, experienced partner of whom they can ask questions, as well as other franchisees. The best way to start consumer electronics franchise is by investing in a popular brand!.'
        ),
        '178' => array(
            'title' => 'COMPUTERS & PERIPHERALS FRANCHISE - A POTENTIAL BUSINESS SECTOR FOR ENTREPRENEURS',
            'description' => 'Computers & peripherals business helps in simplifying technology for small to medium businesses by providing on-site and remote computer repairs and support. The sector has shown a great earning potential, reach out now to become an entrepreneur. So, if you want to start your own computer business with the support of a leading brand, then just check out various listings and take your first step to become franchisee.'
        ),
        '179' => array(
            'title' => 'MOBILE & COMMUNICATION/INTERNET CONNECTIONS FRANCHISE – GREAT POTENTIAL BUSINESS',
            'description' => 'Secure internet wireless communications for individuals, businesses & entire communities is a must need thing and starting a business in this sector is a profitable step to take on. And starting a business for providing mobile & communication/internet connections could be the opportunity that will take your success to new heights. You can browse a long array of options available for you to choose the name you want to associate with for franchise.'
        ),
        '180' => array(
            'title' => 'DVD RENTALS – A PROFITABLE BUSINESS OPTION',
            'description' => 'Lot of people now days, don’t have time to go to multiplex and watch the latest movies. Instead of going out, people prefer to sit at home and enjoy the weekend with their home theatre systems. DVD rentals service play an important role in this arena and helps people enjoys the lifestyle of being at home and relax. DVD rentals franchise options at Franchise India allows you to join a leading name and secure future earnings for you.'
        ),
        '181' => array(
            'title' => 'MUSIC EQUIPMENT & MUSIC STORES – SPREAD HAPPINESS AND EARN PROFIT',
            'description' => 'Music equipment & music stores - an emerging sector for business minded people. Lot of people are taking this business opportunity as a career option and enjoying the returns on their investments. This business is perfect for the one having great knowledge about music and wanting to secure future earning with owning a music equipment & music store. To have a view of range of options available for music equipment & music stores franchise, just browse the sight and select a leading name to join as franchisee.'
        ),
        '183' => array(
            'title' => 'OPPORTUNITY TO EMERGE AS A LEADING ENTREPRENEUR WITH WEB DESIGN & APPLICATIONS FRANCHISE',
            'description' => 'Web Design & Applications is a business line that has a great potential for a innovative person. Person with business minded thoughts can choose Web Design & Applications as a business to get in and get great lucrative returns for the investments made. Find a variety of franchise opportunities in the Web Design & Applications industries to join hands with a leading name in this sector and become franchisee.'
        ),
        '184' => array(
            'title' => 'PHOTOGRAPHY FRANCHISE - ONE OF THE FASTEST GROWING INDUSTRIES',
            'description' => 'Thinking of starting a photography business? Why not join one of the fastest growing industries in the country and enjoy profitable returns. With little or no experience of photography, a small training will give you the knowledge and skill to set up a successful photography business. Opportunity is here, fulfil your desire by visiting the listings available with Franchise India and be your own boss with a trusted name.'
        ),
        '185' => array(
            'title' => 'START YOUR OWN BUSINESS WITH LEADING ELECTRONICS & ELECTRICAL PRODUCTS FRANCHISE',
            'description' => 'Electronics deals with electrical circuits that involve active electrical components. This industry is serving at a great level and has emerged as a high potential industry for entrepreneurs. For business minded people looking for a profitable business opportunity to get in to, Electronics & Electrical Products sector is the option. Choose from various Electronics & Electrical Products franchise brands listed with Franchise India and be your own boss.'
        ),
        '186' => array(
            'title' => 'SUPERSTORES – JOIN A LEADING NAME TO BE A LEADER',
            'description' => 'Start your own business of superstores that have transformed shopping from a potentially time-consuming process involving trips to various stores into a convenient, one-stop experience. A superstore offers a wider and wider variety of products; it has become possible for customers to buy nearly all of their everyday items at superstores. Plan your own business with a leading name listed with Franchise India in superstores and get great rewards for your investment from initial phase.'
        ),
        '187' => array(
            'title' => 'FOR STARTING A BUSINESS TO CATER EVERYDAY ITEMS, BECOME CONVENIENCE STORE FRANCHISEE',
            'description' => 'A convenience store is a small store that stocks a range of everyday items such as groceries, toiletries, alcoholic and soft drinks and newspapers. They differ from general stores and village shops in that they are not in a rural location and are used as a convenient supplement to larger stores. Starting your own convenience store is a business that can help you achieve desired goals for income in future. Browse range of convenience store franchise options available with us to be your own boss.'
        ),
        '188' => array(
            'title' => 'GROCERY STORE FRANCHISE – GREAT BUSINESS OPTION IN PROFITABLE RETAIL FRANCHISE INDUSTRY',
            'description' => 'Want to join an expanding profitable retail franchise industry by joining a grocery franchise opportunity? Starting a grocery store is a very good idea if you have the mindset to serve your customers for their necessities. These stores are leading to the decline of independent smaller stores and more profits. Franchise India is offering you a proven business model of grocery store that works, expert training and support and the potential to earn a lucrative income.'
        ),
        '189' => array(
            'title' => 'KIOSK FRANCHISE - BEST OPTION FOR PROFITABLE INCOME WITH LOW INVESTMENT',
            'description' => 'Carts and kiosks have become familiar sights in many malls, selling everything from inexpensive gift items to coffee and desserts. Owners place their rental kiosks in prime locations, preferably with a lot of foot traffic, and allow customers to buy products at their convenience. Having your kiosk in any of the locations like malls, theatres and stations would be the best way to earn maximum profits. Grab the opportunities available with Franchise India in kiosks Franchise section.'
        ),
        '190' => array(
            'title' => 'FOOD MARTS FRANCHISE – A TASTY BUSINESS OPPORTUNITY TO TAKE A BITE',
            'description' => 'Have desire to become a leader in the exploding food marts sector? This is the right time to start your own food mart and get lucrative returns. With people living much busier lives over the past years, it has become increasingly difficult to eat healthy while on the run. And more & more people are searching for food mart offering food that is healthy and tasty. With Franchise India you have the option of selecting from a large array of food mart franchises that serves best for your needs.'
        ),
        '191' => array(
            'title' => 'START YOUR OWN PET STORE FRANCHISE AND GET MAXIMIZE YOUR PROFIT',
            'description' => 'Do you love animals and enjoy working with people? Is yes, then pet stores could be the perfect opportunity for you start with & become a successful business owner. Combine your passion with a business that has been growing at a double digit rate over the last decade. Select from various listings in Pet Stores available for franchise with Franchise India and enjoy lucrative rewards for your investment. Good luck for your first step towards a successful entrepreneur.'
        ),
        '192' => array(
            'title' => 'DAIRY/F&V STORE FRANCHISE – A PROVEN BUSINESS MODEL FOR OVER DECADES',
            'description' => 'Start a Dairy/F&V Store that offers a variety of ice cream sundaes, and the world famous yummy ice cream shakes with candy chunks. Search the best options for your business at Franchise India that provides leading franchise support, including supply chain, development, operations, marketing and training. Go through the large number of listings and select a one that appeals to your requirements to become your own boss.'
        ),
        '193' => array(
            'title' => 'Meat & Chicken Shops Franchise - Opportunity to join untapped segment of the $80+ billion retail meat market',
            'description' => 'Now days, people are getting more centric towards healthy diet & looking for meal with rich protein. Due to the rise in population eating Non-Veg, the world market for meat and poultry is growing at almost 20% a year to reach nearly $700 billion in the next five years. If you want to maintain an unparalleled level of hospitality for every customer with your own meat & chicken shop, then check out the various meat & chicken shops franchises available at Franchise India.'
        ),
        '194' => array(
            'title' => 'Fulfil your entrepreneurial dreams through the unique concept of wine shop franchise',
            'description' => 'When it comes to get together with friends or family, wine is a sure way to impress them. Now, here comes an opportunity to turn your drinking expertise into your own business. By owning wine shop franchise, you can leverage a well established brand name, the largest network of wine shop franchises and become most recognized within the wine industry. If you are an entrepreneur with a nose for a profit opportunity and you would like to join this dynamic world of wine shops through the listings available at Franchise India.'
        ),
        '195' => array(
            'title' => 'Be your own boss & place your income prospects in your own hands with gourmet store franchise',
            'description' => 'The Gourmet retail chain boasts of stocking a large variety of pastas, noodles, meals, sauces beverages, exotic and rare ingredients, preserves and packaged food from around the world. After owning gourmet store franchise, you will have complete access to the highest quality foods produced in the India. So, if you are looking for a rewarding retail business that allows you to profit from your passion for food, then opening a gourmet store is perfect for you. Just go through the various gourmet store franchises available at Franchise India.'
        ),
        '196' => array(
            'title' => 'Organic Products Franchise Opportunity - Be in business “for yourself” but not “alone”',
            'description' => 'Today, consumers prefer to buy products that do not involve modern synthetic inputs & will be beneficial to them in the long-term. That’s why organic product stores is continuously growing and become profitable segment to invest in. As an organic products store owner, you will own an exciting business that gives you the freedom to make your own decisions and express your creative spirit throughout your store. It’s always been your dream to become successful entrepreneur, hasn’t it? Owning an organic product store franchise is a perfect option for you. Just browse the pool of organic products franchises listed on Franchise India.'
        ),
        '197' => array(
            'title' => 'Book Store Franchise - Opportunity to enjoy an excellent brand reputation',
            'description' => 'Do you have passion of reading books? If yes, then turn your existing passion into your dream of becoming successful entrepreneur with your own book store. This type of business is a fun way to gain independence in the employment arena. By becoming book store franchisee, you will have the freedom of working for ungodly employers & picky supervisors and can make your own decisions and express your own creative spirit. To own a book store franchise, just go through the book store franchise listings available at Franchise India.'
        ),
        '198' => array(
            'title' => 'Stationery Store Franchise Opportunity - Reap Profits in No Time',
            'description' => 'With the booming education sector & rise in corporate offices, the retail of stationery products is always in demand & continuously growing over last few years. To own a stationery store, you don’t need to be an expert in retail; all you need is enthusiasm and a desire to succeed. If being a stationery store owner sounds like the career of your dreams, then browse through the array of Stationery store franchise listings at Franchise India.'
        ),
        '199' => array(
            'title' => 'Gift Shops & Card Galleries Franchise - Business opportunity to ride an established and proven model',
            'description' => 'Owning Gift Shop & Card Galleries Franchise is a profitable option, as greeting cards & gifts are still in demand especially at events & special occasions. As a franchisee, you will have a defined territory of operation within the Franchise network, which will protect you from direct competition. So if you looking to start your own gift shop or card gallery, then gift shop & card galleries franchise listings at Franchise India could be just what you have been looking for. Good luck with your search!'
        ),
        '200' => array(
            'title' => 'Kids/Candy Stores Franchise - Unique turnkey opportunity to become independent business owner',
            'description' => 'Owning a kids/candy store is a good business sense as it appeals to all age groups. This type of business is profitable & always in demand because the need of candies always exists as customers seek birthday, office party and pick-me-up gifts year round. In addition to this, when you are going to start a kids/candy store business you have the full flexibility & freedom of being your own boss. Please read on & explore the various kids/candy stores franchise opportunities available at Franchise India.'
        ),
        '201' => array(
            'title' => 'Toy Shop Franchise - The most unique and personally rewarding business opportunity available in today’s franchise market',
            'description' => 'Presently, the Indian toy market is evolving and we want to tap this huge potential. If you have an entrepreneurial spirit, a love of toys and kids, and an enthusiasm for learning, then owning a toy shop franchise is perfect for you. By becoming franchisee of a toy shop, you can join the network of successful storeowners who are working every day to make a difference in the lives of the children and families in their community. Thinking of starting your own business in this rapidly growing industry? Browse the array of toy shop franchises at Franchise India now!'
        ),
        '202' => array(
            'title' => 'Kiosks Franchise - Business opportunity doing wonders in franchising',
            'description' => 'Now days, Kiosks provide a convenient way for consumers to fulfil their every day needs. It can be small sized shop, electronic machine having semi-permanent fixture present within a mall, departmental store and the like. By becoming kiosks franchisee, you will have access to services and support of the Franchise staff to assist with creating local marketing programs and address any business issues which may arise. So if you’re going to jump into this rapidly growing retail industry, make a search on numerous kiosks franchise listing available at Franchise India.'
        ),
        '203' => array(
            'title' => 'Souvenir Shops Franchise - Proven business model in the gift shop sector',
            'description' => 'Now days, giving gifts is a tradition that covers all the section of society, no matter what age group, income group or region is. Basically, it helps to celebrate every occasion of the year. Investing into gift industry is a profitable option, as it is large & there is potential for considerable profit. After owning a franchise, you will receive ongoing training and best practice advice from members of the Franchise team who are living the brand every day. What are you waiting for? Start your search by clicking various souvenir shop franchise listings that interests you most. Good luck for your search!'
        ),
        '204' => array(
            'title' => 'Candle Stores Franchise - Perfect business opportunity for candle lovers',
            'description' => 'Today, candles have become center of attraction to many people house hold parties or church parties. With the growing demand of candles, owning a candle store franchise is a lucrative business option where you can earn an income from day to day and person to person. So, just tap into this market and start dreaming about the money you will make by offering the unique proprietary formulated candles. Browse the various candle stores franchise opportunities at Franchise India now!'
        ),
        '205' => array(
            'title' => 'Office Supply Store Franchise - An exciting business opportunity',
            'description' => 'With the increase in businesses & organizations, the demand of office supplies automatically rises. Owning an office supply store franchise delivers a dynamic and unique business model eliminating many of the challenges faced in setting up a new venture. As a franchisee, you will receive marketing and sales support from franchisor that helps in generating revenue in less time. If you are looking to start a business but haven’t found the right business opportunity in this growing segment, just go through the office supply store franchise listings available at Franchise India.'
        ),
        '206' => array(
            'title' => 'Deal/Value Stores - A wonderful business opportunity with high profit margins',
            'description' => 'In today’s market, starting your own business from scratch needs real challenges, a good way is to take franchise of existing business & enjoy high returns on investment. There are many deal/value store franchise business opportunities in the market today and anyone can earn a substantial income through this business. If you have decided that business ownership is right for you, it’s time to gather the facts. Simply browse the array of deal/value store franchise listings available at Franchise India.'
        ),
        '207' => array(
            'title' => 'FLORIST FRANCHISE – A LOW INVESTMENT BUSINESS START UP MODULE WITH GREAT POTENTIAL',
            'description' => 'Whether you adore flowers or love floral arrangements, a florist franchise business is the right segment to enter the business world and especially for those who wish to initially invest small investments. The florist franchising is a progressing market, and there is scope for new floral shops and outlets. Here investors can opt for many types of florist franchises such as online florists, flower retailer, fresh flower, artificial flower, flower decorator and so on. To start florists’ franchise, you need no special education or experience to have successful and flourishing business. Choose a good florist franchise option to have the satisfaction of being your own boss and enjoy profits, with the backing, support and training of the franchisor.'
        ),
        '208' => array(
            'title' => 'EARN GREAT REWARDS WITH PROMISING FUTURE WITH GOLF STORE FRANCHISE',
            'description' => 'A golf store offers goals products consisting of world leading brands in golf as well as sporting and lifestyle brands. Start your own golf store to offer consumers with the widest choice in golf products and an interactive retail experience. Having a business that grows day by day is the desires of every entrepreneur, so, don’t miss the opportunity to be your own boss. Just check out the numerous listings of golf store franchise available with us and chose a reputed brand that suits your criteria.'
        ),
        '209' => array(
            'title' => 'FITNESS EQUIPMENT STORES - AN APPEALING BUSINESS OPPORTUNITY IN FITNESS SECTOR',
            'description' => 'Do you believe in the idea of making money while helping people reach their fitness goals? The boom in fitness equipment retailing is what you need. Start your own business as a fitness equipment stores franchisee and enjoy the benefits of being your own boss with lucrative returns on your investment with a reputed brand. Take a scoop from listing available with Franchise India in Fitness Equipment Stores and get connected with the one that appeals to your business idea.'
        ),
        '210' => array(
            'title' => 'WANT AN EXCITING BUSINESS TO JOIN AS A FRANCHISEE - SPORTS EQUIPMENT STORE IS WHAT YOU NEED',
            'description' => 'A sports equipment store franchise comes with many exciting bonuses, including an established a loyal customer base. Sports Equipments have remarkably low-risk, with only 5% resulting in failure. Get a winning edge at understanding the needs of the market and a unique business opportunity to grow with a leading name in Sports Equipment Store from various listings available at Franchise India. This is the time to start your own business, take the step now!.'
        ),
        '211' => array(
            'title' => 'BATHROOM & CERAMICS – A BOOMING RETAIL FRANCHISE TO OWN',
            'description' => 'Own a premium home bathroom & ceramics retail brand that offers customers a collection of exclusive products at an affordable price. Franchise India brings numerous options for the one having passion for starting a bathroom & ceramics retail franchise. This sector has witnessed a commendable growth and is expected to grow more. Check the franchise opportunities that match your skill level and start reaping the rewards for your investments.'
        ),
        '212' => array(
            'title' => 'Become a successful entrepreneur by investing in one of the fastest growing business industries-modular kitchens',
            'description' => 'With the modular kitchen segment invariably different from any other brand and customer involvement being much deeper, the kind of training & support from franchisees is more consumer centric with hands on experience. It has been observed that the market size of the modular kitchen industry in the country in 2011 was Rs 50 billion and will grow at the rate of 50% in the coming years. This modular kitchen segment is for women, as they understand this product better than anyone else. To become a successful business owner in this growing segment, make clicks on the kitchen franchises and choose the one that interests you most.'
        ),
        '213' => array(
            'title' => 'FURNITURE/HOME DÉCOR & FURNISHING FRANCHISE – THE INDUSTRY IN DEMAND FOREVER',
            'description' => 'The Furniture/Home Décor & Furnishing industry demand is high. Whether you are a veteran in the home interior industry, or wish to make Furniture/Home Décor & Furnishing your career, franchise business opportunities is something that you should think about seriously. A Furniture/Home Décor & Furnishing is a business option that provides home interior furnishings and related accessories to the end users. Most of the franchisors from this franchise industry provide investors with an established business format, including brand name and values, comprehensive support systems, business expertise and training, critical to the company’s success. Check out the range of options available for you.'
        ),
        '214' => array(
            'title' => 'Hardware Stores Franchise - Business Opportunity with the tools for success',
            'description' => 'Today, hardware store is among the top things needed for basic fix in home renovation & makes it a great place to live in. Franchises in this industry retail a range of supplies including hardware, plumbing, electrical, paint-related tools and many more. With the growing number of constructions in the country, the demand of tools and hardware stores is at peak. If you are an entrepreneur looking to enter or expand your business in the field of hardware retail then a hardware store franchise opportunities provides you the perfect way towards your business goals.'
        ),
        '215' => array(
            'title' => 'Art, Craft, Antique & Framing Franchise - Opportunity to put your own mark on the business',
            'description' => 'Nothing beats making a living by doing something that you love. Owning art, craft, antique & framing franchise is a great way to share your passion with people with the support of one of the fastest growing franchises behind you. By becoming franchisee, you can get benefit from exceptional training and support and proven marketing programs. If you have your heart set out on owning an art, craft, antique & framing franchise, then it is up to you to turn your heart’s desire into reality. Just check out the art, craft, antique & framing franchise opportunities available & choose the one that interests you most.'
        ),
        '216' => array(
            'title' => 'HOME SECURITY FRANCHISE – PROVIDE SECURITY OPTIONS WHILE SECURING YOUR FUTURE INCOME',
            'description' => 'Start your own home security franchise - a rewarding opportunity to protect families, and offer burglar and fire alarms, CCTV surveillance systems, access control solutions, home theatre and A/V systems with a purpose to ensure the safety of homes. With owning a franchise marketing and training support give you an edge, and the possibility of success is more as compared to start an independent brand. Check out the options available at Franchise India.'
        ),
        '217' => array(
            'title' => 'TAKE STEP FOR REWARDING FUTURE BY JOINING A LEADING HANDICRAFTS FRANCHISE',
            'description' => 'Handicrafts retail franchising is one of the fastest-growing segments of the franchise industry and it provides excellent business opportunities for investors and entrepreneurs. The Handicrafts store maintains a range of high quality, authentic handicrafts products showcasing the best handicraft and handloom products from all over the country. Check out the range of business opportunities available with us in Handicrafts sector, if it suits your requirements to start your own business.'
        ),
        '218' => array(
            'title' => 'LIGHTING, ELECTRICAL & PLUMBING FRANCHISE – GET IN TO REAP THE REWARDS FOR INVESTMENT AT EARLY STAGE',
            'description' => 'Whether building a new home or upgrading the lighting, electrical & plumbing of an older house’s wiring, homeowners across the country rely on experts to safely manage their lighting, electrical & plumbing needs. With this, the need of lighting, electrical & plumbing franchise is increasing day by day as lot of construction is going on with increase in population. Lighting, electrical & plumbing sector has turned as profitable business option for the planning to set a new business via franchise. Search for your options at Franchise India!'
        ),
        '219' => array(
            'title' => 'PAINTING - REWARDING AND AFFORDABLE BUSINESS OPPORTUNITY',
            'description' => 'For a rewarding and affordable business opportunity for those who like to interact with their customers, Painting franchise is the option. This is the time to grab the franchise opportunity in the $300 Billion home improvement industry. Take a closer look at the business model, earning potential and culture of the market leaders listed with Franchise India and start own journey of becoming an entrepreneur with a leading name.'
        ),
        '220' => array(
            'title' => 'GARDEN STORES FRANCHISE – A BUSINESS SECTOR WITH LESS COMPETITION AND MORE POTENTIAL',
            'description' => 'Want to invest in a successful gardening franchise and you could earn huge profits from this massive market? Garden Stores franchise is what you need to associate with to be your own boss. So, if you enjoy gardening and you want to grab an opportunity of a business franchise that you could enjoy doing, this could be the sector you have been looking for. Check out various listings at Franchise India and be the sole source for homeowners who decorate and beautify their lawns and yards.'
        ),
        '221' => array(
            'title' => 'BECOME BUILDING MATERIAL STORES FRANCHISEE TO CONSTRUCT YOUR FUTURE',
            'description' => 'Want to earn your part of a multi-billion dollar industry by becoming a building material stores franchisee? Building material stores sector is full of profits for those currently working in building and construction or even on the trade counter within a more traditional builder’s merchant outlet. Choose from various listings available with Franchise India and become a part of the team that is dedicated to your success.'
        ),
        '222' => array(
            'title' => 'TV/Web Shopping Franchise - Easy to manage business opportunity',
            'description' => 'In today’s world, more than eighty percent people have expressed a desire to leave their corporate job and start their own business. Buying a franchise is profitable option, however, takes a lot of the guesswork out of being an entrepreneur and can give you a leg up on success. Now days everyone loves to do online shopping through the medium of television while relaxing at home. This is the reason; TV/Web Shopping franchise is in demand. If you have already made the decision that business ownership is the right choice for you, then browse the array of TV/Web Shopping franchise opportunities available at Franchise India.'
        ),
        '223' => array(
            'title' => 'E-Commerce Franchise - A fastest growing segment',
            'description' => 'Today, the World Wide Web is full of internet based businesses for sale and people who want to become successful business owner will start taking franchise for success. Getting involved in an E-Commerce franchise business is safer like the Web with a firewall. By becoming franchisee, you can utilize the brand name, operating system and ongoing support of the existing company. Entrepreneurs interested in signing with an Internet franchise business can check out the E-Commerce & Related franchise listings available at Franchise India.'
        ),
        '224' => array(
            'title' => 'Textiles Franchise - Business opportunity in the industry growing at a rapid pace',
            'description' => 'Today, Indian textile industry is one of the leading textiles industries in the world. Presently, it contributes significantly to the Indian economy and is growing at the rate 75% per year. To make wonders in this growing industry, franchising is the best option you could ask for. Before buying franchise, some important factors are to be kept in mind including investment, financing and the amount of time it will take your business up & running. What are you waiting for? Browse the collection of textiles franchise opportunities & choose the one that interest you most.'
        ),
        '225' => array(
            'title' => 'Kid’s Wear Franchise - Leading business opportunity in the children’s apparel industry',
            'description' => 'Today, the children’s apparel industry is huge and growing; as each year there are about 500,000 more children to clothe than the year before. So therefore, the annual growth rate is growing faster than any other retail segment. Kids wear franchise is a recession proof business opportunity providing tools to succeed even in a tough economy. Owning a kid’s wear franchise not only gives you the opportunity to secure your financial future, it allows you to help families save more and waste less. Just check out the various kids wear franchise listings available at Franchise India now!'
        ),
        '226' => array(
            'title' => 'Take the first step towards business ownership with men’s wear franchise...Hurry!',
            'description' => 'Today, the factors like the changing fashion trends, growing consumer class and rising urbanization together have led to the growth in the men’s apparel industry. Making an investment into this growing segment is a profitable option. After owning men’s wear franchise, there is full franchisor support from site selection, to store set up, to grand opening, to growing your profits from year to year. There has never been a better time to get into men’s apparel industry, so just go through the numerous men’s wear franchise listings available at Franchise India & choose the one that suits your requirements.'
        ),
        '227' => array(
            'title' => 'Women’s Wear Franchise - #1 Business opportunity in apparel industry',
            'description' => 'Now days, the women’s apparel industry is a big part of the fashion industry, with fashion trends dictating the consumer demand of the types of apparel that companies produce. Therefore, it witnessed a huge growth in past couple of years and is expected to grow at the rate of 90% through the method of franchising. Thinking of buying a lucrative business franchise? Here comes an exciting time to become part of the women’s wear franchise concept & reap huge profit margins. Just start your search with the listings available at Franchise India now!'
        ),
        '228' => array(
            'title' => 'Departmental/Unisex - A booming sector in apparel industry',
            'description' => 'Doing business of clothes is good option when it comes to franchising. With the increase in population of men & women, the demand of departmental/unisex stores is at peak. In India, 50 percent of apparel industry is franchised with over 50,000 departmental/unisex stores across the length & breadth of the country. If you have a deep interest in clothes & passion for business, then check out the departmental/unisex franchise listings available at Franchise India.'
        ),
        '229' => array(
            'title' => 'Ethnic Stores Franchise - A unique business opportunity to invest in',
            'description' => 'With the huge demand of ethnic wears across the country, buying an ethnic store franchise is one of the most risk-free & safest ways to start up and run a successful business. The ethnic apparel market is worth $5 billion and growing at 40 to 60 per cent, according to industry experts and business owners. It you want to join the network of leading franchisors in apparel industry, check out the various ethnic stores franchise listings available at Franchise India.'
        ),
        '230' => array(
            'title' => 'Make business relationship more profitable with readymade garments franchise',
            'description' => 'Now days, most of the people are uncomfortable buying a piece of cloth and then place the order for stitching. Here the role of readymade garments comes into the play. With the increasing demand for branded garments, the readymade garments industry is set to double in the next five years. So making investment in this demanding industry is profitable option. If you are an aspiring entrepreneur and looking for a great business opportunity to deal with, just browse the pool of readymade garments franchise opportunities available at Franchise India.'
        ),
        '231' => array(
            'title' => 'Feel the freedom of being self employed with woollen wear franchise',
            'description' => 'Presently, major players in the apparel industry are beginning to diversify towards the woollen wear in order to exploit the business advantages from this highly lucrative industry. The main advantage of owning a woollen wear franchise is the feeling of freedom that being self-employed brings. Investing into this proven system is profitable option and you will get benefit from training, support and encouragement of other franchisees and the franchisor. If you really want to grow in this highly profitable segment, then check out the array of woollen wear franchise listings & choose the one that interest you most.'
        ),
        '232' => array(
            'title' => 'Lingerie & Innerwear Franchise - Profitable and Worthwhile Business Opportunity',
            'description' => 'Today, Lingerie & Innerwear business is emerged as a lucrative specialty in retail sector with nightgowns, pajamas, underwear, bras and even robe. The business of Lingerie & innerwear, a fastest growing category holds the largest market share in India with high margins. Would you like to have every lady in the land wearing a correct fit and style bra to suit their body shape? Owning Lingerie & Innerwear franchise is a perfect option for you. Browse the array of Lingerie & Innerwear business opportunities available at Franchise India now!'
        ),
        '234' => array(
            'title' => 'Formals Footwear Franchise - Business opportunity with immense growth potential',
            'description' => 'Presently, formal footwear franchise is a highly attractive and affordable business opportunity designed to provide the value and service today’s customers are looking for. This is a profitable & growing market with great potential for an individual looking to enter into business world. So if you want to reap profits in this constantly evolving industry, just go through the formals footwear franchise listings available at Franchise India now. Good luck with your search!'
        ),
        '235' => array(
            'title' => 'Own casuals footwear franchise to get high margins and a great lifestyle',
            'description' => 'A casual’s shoe store is a versatile and easy to operate business within your local community, where you can service customers easily. Opening a shoe store by your own requires planning and a good deal of preparation, but buying a franchise is a lucrative way to make money. If you are into fashion and want to start a retail operation, opening a casual’s shoe store may be the ideal business for you. Just browse the array of casual footwear franchise opportunities available at Franchise India.'
        ),
        '236' => array(
            'title' => 'Sports Footwear Franchise - A unique business to business concept with a service that customers demand',
            'description' => 'Recently, it has been observed that sports footwear market is estimated to be worth Rs 10 crore and is expected to grow at the rate of 20% every year. Taking franchise of sports shoe store is a great option with high profit margins. After becoming franchisee, you can get operations manual assisting you in your daily operations and provide you with the forms needed to run your business. Please go through the sports footwear business opportunities available at Franchise India & choose the one that suits your requirements.'
        ),
        '237' => array(
            'title' => 'Designer Footwear Franchise - A potentially rewarding business opportunity in retail sector',
            'description' => 'Designer shoe store franchise is today’s developing story and tomorrow’s success for entrepreneurs in India. By becoming franchisee in this segment, you will receive training on all aspects of operating the shoe store from pre-opening, operating, and employee training. Looking to start your own business in this profitable segment? Want to impact the lives of fashionable people in your community? Check out the numerous designer footwear franchise opportunities available at Franchise India now!.'
        ),
        '238' => array(
            'title' => 'Own kids footwear franchise & make difference to kids fashion in your locality',
            'description' => 'Now days, children may not attend the parties, or go anywhere outside the home unless they are wearing a good pair of shoes. This results in the increase in the demand of kid’s shoe stores in the country. Taking a franchise of an already running shoe store is a profitable business option providing power of their reputed brand. Are you ready to be your own boss in this growing industry? Own kids footwear franchise to join the network of leading franchisors and find out how quickly you can turn a solid investment into a profitable experience.'
        ),
        '239' => array(
            'title' => 'Become Imitation/Art/Junk Jewellery franchisee to follow your artistic heart and think with your business brain',
            'description' => 'Presently, the trend of gifting imitation/art/junk jewellery is at peak and people use them as a medium to express their feelings especially on special occasions like wedding. This results in the increase in the demand of Imitation/Art/Junk Jewellery business. One of the most exciting parts of starting a jewellery business is choosing your jewellery business name. So what are you waiting for, check out the various Imitation/Art/Junk Jewellery franchise opportunities available at Franchise India & choose the name that best suits you. All the best with your search!.'
        ),
        '240' => array(
            'title' => 'Gems And Stones Franchise - Entrepreneurship in the Creative Sector',
            'description' => 'In today’s business world, doing gems & stones business is far profitable than others as you don’t have to worry about trends in technology making them obsolete. But there is a lot of hard work & challenges in starting a business by your own, so the best way is franchising. By becoming franchisee, you can get benefit from national advertising campaigns, full training and on-going support, brand name alongside a comprehensive manual packed with useful tips and information. If this exciting business opportunity appeals to you and you want to grow into this profitable segment, then check out the listings available at Franchise India now!.'
        ),
        '241' => array(
            'title' => 'Precious Jewellery Franchise - Opportunity to grow a solid and enjoyable business in your own local area',
            'description' => 'With the increase in the demand of diamonds, other precious stones, gold, silver and platinum on major occasions like festivals, marriage, birth etc, the precious jewellery sector has become one of the fastest-growing sectors in India in the past few years. By investing into this profitable segment as a franchisee means that many of the uncertainties usually associated with starting up in business have already been ironed out for you. You can get benefit from on-going support and training to help maximize your sales techniques and develop marketing strategies. Browse the various precious jewellery franchise opportunities available at Franchise India.'
        ),
        '242' => array(
            'title' => 'TIME & WRITING INSTRUMENTS - AN APPEALING OPPORTUNITY FOR PEOPLE LOVING CLASSICS',
            'description' => 'Time & writing instruments, the perfect present for those who value the classics can be presented to the close ones. A writing implement or writing instrument is an object used to produce writing. Lot of people are having fond of keeping these times & writing instruments of precious brands. This has also emerged as a great business opportunity for the one planning to become boss. Franchise India has lot of listings of renowned brands in Time & writing instruments, choose the one that appeals to your and start your own business now.'
        ),
        '243' => array(
            'title' => 'DESIGNER WEAR – A BUSINESS OPPORTUNITY IN BOOMING FASHION INDUSTRY',
            'description' => 'Designer Wear sector has been a tremendous option for the one looking to be the boss and get lucrative returns for investments. So, if your are planning to start your own business that gives guarantee for fashionable design, wide product choice, undisputed quality and first class customer service. Browse various listings available with Franchise India to choose a brand that suits your needs to be your own boss. Good luck for your search!.'
        ),
        '244' => array(
            'title' => 'VINTAGE STORES – INCREASE YOUR INCOME POTENTIAL BY OWNING YOUR OWN BRANDED STORE',
            'description' => 'With retail mark ups being the highest in the clothing industry, opening a vintage clothing store is an excellent business venture. If being your own boss and working in this profitable, fun environment appeals to you, check out the various listings with Franchise India to choose your brand to go with for franchise. Also get advantages like detailed operations manual, sales and operations training, proactive idea sharing between franchise stores offered by various leading brands.'
        ),
        '245' => array(
            'title' => 'LUXURY LABELS – OPPORTUNITY IN GROWING RETAIL INDUSTRY',
            'description' => 'The luxury retail industry is growing at a good pace as people have started spending money on luxury items like never before. With better employment opportunities, rising disposable incomes, changing lifestyles and brand consciousness, people are ready to shell out on Brands. Browse the array of listings available at Franchise India and select from numbers of renowned brands available through franchising to raise their share.'
        ),
        '246' => array(
            'title' => 'Opticians/Eye Wear Franchise - Opportunity to get in touch with opticians business owners',
            'description' => 'Now days, many optician start-up entrepreneurs discover that a go-it-alone approach isn’t necessarily the most conducive way to launch the businesses. Here the term franchising comes into the play. Opticians/Eye Wear is the largest and growing sector within the optical services industry. It has been observed that there are approximately 20,000 active optician businesses in India with excellent annual revenues. If you want to start your own business in this growing segment, browse the opticians/eye wear franchise opportunities available at Franchise India now!.'
        ),
        '247' => array(
            'title' => 'Luggage, Hand Bags & Backpacks Franchise - Business opportunity to become leading player in retail sector',
            'description' => 'In today’s world, doing business of luggage & handbags in the retail sector is a profitable option, as recovering disposable incomes will allow consumers to purchase more luxuries like handbags and accessories. In addition to reducing your potential liability, the right partnership can expand your business skill set and multiply your earnings capacity. If you are serious about making money then investing in luggage & handbags retail sector is an option you should give serious consideration. Just checkout the various luggage & handbags franchise listings available at Franchise India now!.'
        ),
        '248' => array(
            'title' => 'Be among “first to know” about latest fashion trends with your own fashion accessories store',
            'description' => 'Now days, everyone is running towards new fashion trends and wants to look & feel good with fabulous fashion accessories. Having fashion accessories franchise business has ensured financial freedom and flexibility in terms of family, personal career commitments and growth & development. People from all walks of life, who share values of commitment, focus and a desire to succeed have been drawn to the fashion accessories franchise opportunity. Just look at the fashion accessories franchise opportunities available at Franchise India & choose the one that best suits your requirements.'
        ),
        '249' => array(
            'title' => 'Movies (Multiplex) Franchise - Tried and Tested business model for person seeking improvement in entertainment sector',
            'description' => 'Doing a business is hard enough, if you are starting it from the scratch. Buying a franchise is one of the profitable options helping you generate more revenue upon your investment. Today, consumer’s willingness to pay for a movie is up in the air and this result into increase in the demand for Movies (Multiplex). If you are serious about making money in this venture of entertainment sector, browse the array of Movies (Multiplex) franchise opportunities available at Franchise India now!.'
        ),
        '250' => array(
            'title' => 'Sports & Gaming Franchise - Solid moneymaking business opportunity with proven profit',
            'description' => 'Sports & Gaming franchise business is one of the most popular segments of entertainment industry and a good option to start your own business. By becoming franchisee, you can get benefit from excellent returns on investment, marketing support, advertising assistance, detailed operating manuals and many more. If you are interested to start sports & gaming franchise in your locality, Franchise India has various options that will suit your requirements.'
        ),
        '251' => array(
            'title' => 'Kids Entertainment Zones Franchise - A Proven Business Opportunity generating revenue on daily basis',
            'description' => 'In today’s world, every parent loves the opportunity to play with their children in a comfortable, climate controlled and safe environment. Owning a kids entertainment zones franchise is a lucrative business option. Going with this franchise opportunity simplifies the start-up and ongoing operations needed in the business generating steady revenue stream. If you have the desire to be your own boss, without frustrations of starting it from the scratch, then go through the list of Kids Entertainment Zones franchise opportunities & select the one that best suits you interest & budget.'
        ),
        '252' => array(
            'title' => 'Own video game centres franchise to bring smiles to children faces in your area',
            'description' => 'Now days, most of the game lovers still go to video game centres to play games and wind out. Investing into this profitable segment helps you generate income on day to day basis. For the sake of minimizing risk, buying a franchise is often the right move for emerging out as a successful business owner. Are you interested in starting your own video game centre? Browse the array of video game centres franchise opportunities available at Franchise India.'
        ),
        '253' => array(
            'title' => 'Help people create the vacation of their dreams with your own amusement centre',
            'description' => 'Today, most of the people get attracted towards amusement centres for their entertainment purpose. Owning an amusement centre franchise is one of the money making option in today’s uncertain economic times. By becoming franchisee, you can get benefit from reputed & well established brand name, detailed operating manual and the like. If you want to start the amusement centre of your own, Franchise India brings numerous amusement centre business opportunities you have been looking for. Start you search now!'
        ),
        '254' => array(
            'title' => 'Clubs Franchise - An emerging business opportunity bringing joy in lives of many people',
            'description' => 'It’s time to focus on having fun and interacting with customers while making money out of it with club franchise opportunities. By choosing a club franchise, your dream of owning your own club can come true without risking all you have. You will get on-going support & tested know-how from franchisors. At Franchise India, there are many affordable club franchises that ensure a better business start and competitive advantages that new businesses cannot afford.'
        ),
        '256' => array(
            'title' => 'HOME FURNISHINGS - GROW YOUR INCOME POTENTIAL WITH LEADERS',
            'description' => 'Home furnishings market encompasses window dressings, bedding, bathroom and kitchen linen, cushions and covers, as well as table linen. Home furnishings franchise combines the best of retail to attract a wider range of customers and give them greater flexibility in products and payment plans. If you are planning to start your own business in home furnishings and want to earn great rewards for your investments, then choose a reputed brand in home furnishings from various listings available at Franchise India.'
        ),
        '257' => array(
            'title' => 'CONSTRUCT YOUR OWN FUTURE WITH GREAT EARNINGS VIA BUILDING MATERIAL FRANCHISE',
            'description' => 'Own a building material franchise to get a chance to works closely with builders, architects and construction personnel to supply the materials needed to complete building projects. In a developing country, the potential of Building Material sector is very high and it offers a great rewarding business to the starters. Consider a successful construction franchise opportunity at Franchise India and you could be earning your part of a multi-billion dollar industry.'
        ),
        '258' => array(
            'title' => 'WELDING, CUTTING & ALLIED PROCESSES – A GREAT BUSINESS OPTION TO CHOOSE',
            'description' => 'Get into welding, cutting & allied processes and offer range of products crafted from advanced technology and sophisticated machinery to provide tools of best quality in stipulated time frame. Manufacturing industry is a wide field with range of opportunities for business owners, but welding, cutting & allied process is that sector that holds the base of manufacturing industry. Looking the growth potential of this sector, if you plan to own a franchise of a reputed brand in welding, cutting & allied processes, then check out the options available with Franchise India.'
        ),
        '259' => array(
            'title' => 'MANUFACTURING & ANCILLARY (BOTTLING ETC.) – A PERFECT BUSINESS OPPORTUNITY',
            'description' => 'Manufacturing & Ancillary basically deals with repair and restoration including remodelling of bathrooms, closets and garages. The manufacturing & ancillary industry covers a wide range of products and services, thus providing a great opportunity for business minded people. Whether you have no previous building or manufacturing experience, or you would like to become a master craftsman, there’s a manufacturing franchise that matches your skill level and goals. Grab this golden business opportunity by choosing a manufacturing & ancillary franchise brand available at Franchise India.'
        ),
        '263' => array(
            'title' => 'Hotels & Resorts Franchise - A business opportunity to build a secure future in growing Industry',
            'description' => 'Hotels & Resorts industry is always in news due to its vast scope for new opportunities. No matter, in which corner of the world you are, you will always find hotels & resorts of different sizes and forms offering services to different types of clients and customers. Buying its franchise is the best way to enter this highly competitive industry and enjoy success in a very less time. This way you get to work on a proven business plan and successful marketing techniques that will surely help you to enjoy success and profit in the hotels & resorts industry. There is a vast array of hotels & resorts franchise business opportunities to choose from, and surely you will find a brand that is well known and that you personally find attractive.'
        ),
        '264' => array(
            'title' => 'Education Consultants - Assist People with education guidance to excel in life by becoming education consultants',
            'description' => 'Now days, with the raise in level of lifestyle, individuals have higher expectations and wants career counsellor to guide them about education transition and direction. With this the need of education consultants is grown in education industry and thus increases business opportunities. By becoming franchisee in this segment you can get rights of association with a reputed brand and expand in the highly reputed educational industry which has ample opportunity to make you a professional in the true sense. Browse the education consultants franchise listings now!.'
        ),
        '265' => array(
            'title' => 'Career Counselling & Brain Programming - Education Career Counseling and Brain programming will add wings to your dreams of becoming successful entrepreneur',
            'description' => 'Education career counseling franchise is just the right option for investors who are interested in starting their own business that offers an intellectual challenge and have scope for utilization of management skills and experience. Plus, it is one franchising option where success and growth can be enjoyed quickly. An education career counseling franchise gives you the satisfaction of helping the students in shaping their future. Hence, education career counseling franchise business is an admired way to start your own business and enjoy success and respect from society.'
        ),
        '266' => array(
            'title' => 'FUEL YOUR GROWTH AS AN ENTREPRENEUR IN AUTOMOTIVE SECTOR WITH BATTERIES FRANCHISE',
            'description' => 'Start your own business with leading Batteries brands to connect to the tremendous growth available in the Indian auto market and get fruitful profits. If you are an entrepreneur, or interested in being one, and possesses the ability to take up the challenge of operating a revolutionary business venture, Franchise India has lot of options for you to get into Battery business through tested franchise path. Have a look at the brands available for you!'
        ),
        '267' => array(
            'title' => 'REAL ESTATE FRANCHISE – A BUSINESS OPPORTUNITY WITH COMMENDABLE GROWTH',
            'description' => 'Real Estate market is the one that has shown a huge growth and is providing great commendable profits to real estate consultants. Everyone wants to have a business with great returns and real estate is the sector known for best returns. Be a part of such an exciting and rewarding franchise industry by considering various listing with Franchise India. Have a look and choose a leading name to start with.'
        ),
        '268' => array(
            'title' => 'PARTY SUPPLIES – A WIDESPREAD OPPORTUNITY TO REAP REWARDING INVESTMENT RETURNS',
            'description' => 'Desire to start a business with aim of offering the most wide-ranging everyday and seasonal products and accessories needed to throw a great party? Party Supplies franchise is one of the best options. When it comes to customers, believe in dipping whatever you are doing to help them in whatsoever way, the finest practice to become unbeaten. Go through various Party Supplies Franchise listings to choose a brand you want to start your entrepreneurship with as a franchisee and enjoy high returns for your investments.'
        ),
        'all' => array(
            'title' => 'Choose amongst the best Business Opportunities available for you!',
            'description' => "Business Opportunities come in many shapes and sizes, from a countrywide recognized name to locally grown start-up businesses. The approach of many individuals becoming an entrepreneur has opened many doors for renowned companies looking for expansion.<br><br>Choosing the perfect business opportunity to start as a franchisee is amongst the most vital decision that can be help an individual settle in life with all the desires of future. Franchise business provides you with an added advantage of a head start from others.<br><br><div id='show-full-txt' style='display: none;'>Franchiseindia.com is here to help you in grabbing the renowned brands franchise and work for your own growth. We cater almost every big name providing business opportunity in form of franchise for reaching every corner of the world. All you need to do is just browse the business opportunities as per your interested sector & choose desired brand to be a franchise owner of a leading brand name to earn lucrative returns.<br><br>We cater all your needs of starting a new business with an already established name in a simplified manner. We have segregated business opportunities in 230 categories with which you can choose business opportunity as per your requirement. You can also browse the opportunities according to your investment capabilities.<br><br>Franchiseindia.com has proved to be the World’s best platform for searching a new business from host of business opportunities one desires. Buying a franchise is undoubtedly, one of the best things you can get to become a successful business owner in much shorter time as compared to a start-up from scratch.</div>"
        ),
        'lowcost' => array(
            'title' => 'Low Cost Opportunity - Business Models that made Profits Affordable!',
            'description' => "Planning to have freedom of work and start your own business? Or looking for Low investment business opportunities? Franchiseindia.com is the perfect platform for you to find such franchise opportunity for your start-up plan.<br><br>Low cost franchise business is among the most searched business model in today's time as no one has that big investment required to start his own business or a franchise of a big player in the market. Also, looking to the ups & downs in the market, these business opportunities serve the purpose of having your own business like a wishing well.<br><br><div id='show-full-txt' style='display: none;'>This approach of many individuals becoming an entrepreneur with a low cost has opened many doors for renowned companies looking for expansion through local market penetration.<br><br>There are lots of low cost business options available for people who don't have that big money to invest into an expensive concept but have desires to emerge as a successful business owner. Looking to the current market scenario, there is no doubt that Low-cost franchise is the only ideal entry point for new entrepreneurs aiming to become their own boss with freedom of working.<br><br>Surpass your barriers in opening your own business is also a great headache for the new comers in business sector but a franchise model can help you deal with those. A Low cost business also has some more advantages beyond the lower cost of entry. Buying a franchise of an already established brand is undoubtedly, one of the best things you can get to become a successful business owner in much shorter time as compared to a start-up from scratch.<br><br>So, start a low-cost franchise for less than you ever imagined with the opportunities available with us and all you need to do is just switch the low cost franchise section at franchiseindia.com and apply to the business model that serves your purpose.We are there to cater all your needs of starting a new business with an already established name with a lower setup cost that fulfils your dream.</div>"
        ),
        'loc1' => array(
            'title' => 'Business & franchise opportinities in Andhra Pradesh',
            'description' => "Andhra Pradesh, with its mix of rich cultural heritage and rapid economic growth, presents an attractive landscape for entrepreneurs and business investors. Known for its agricultural prowess, burgeoning IT sector, and vibrant textile industry, this southeastern state of India is ripe with opportunities for those looking to venture into the world of business.
            For aspiring business owners, Andhra Pradesh offers a treasure trove of franchise opportunities across diverse sectors such as Agriculture, Information Technology, Textiles, Food and Beverage, Education, and Healthcare. This variety ensures that regardless of your interest or investment capacity, you'll find a fitting venture in Andhra Pradesh.<br><br>
            Small to medium scale business ventures and innovative ideas with minimal investment have found a welcoming environment in Andhra Pradesh. The state is a beacon for entrepreneurs looking to carve out their niche in both traditional and emerging industries.<br>
            Explore some of the exciting franchise opportunities in Andhra Pradesh:<br><br>
            ●	Agro-based Business Franchise<br>
            ●	IT and Software Solutions Franchise<br>
            ●	Textile Industry Franchise<br>
            ●	Food & Beverage Franchise<br>
            ●	Educational Institute Franchise<br>
            ●	Healthcare and Wellness Franchise<br><br>
            Investment levels can vary, starting from as low as Rs 2 Lakhs to upwards of Rs 1 Crore, depending on the brand and the specific business model.
            If the journey to discovering the perfect franchise opportunity in Andhra Pradesh seems daunting, FranchiseIndia is your ideal partner. We're here to streamline your search, connecting you with the best franchise opportunities that match your budget and business goals.
            Don’t let the opportunity to become a part of Andhra Pradesh's thriving business community pass you by. Register with FranchiseIndia today, and take the first step towards realizing your entrepreneurial dreams with the top franchise opportunities in Andhra Pradesh.
            "
        ),
        'loc5' => array(
            'title' => 'Business & franchise opportinities in Chandigarh',
            'description' => "Chandigarh, the meticulously planned city that serves as the capital of both Punjab and Haryana, is not just an architectural marvel but also a budding ground for entrepreneurs and investors. Known for its clean streets, green spaces, and vibrant cultural life, Chandigarh offers a unique blend of modernity and tradition, making it an attractive destination for business ventures.<br><br>
            With its high per capita income and quality of life, the city is ripe for investments in various sectors such as retail, food and beverage, education, healthcare, and IT services. Whether you're considering a cozy café in Sector 17, a boutique in Elante Mall, or a tech startup in the Rajiv Gandhi IT Park, Chandigarh presents a wide array of opportunities to thrive in a competitive yet supportive business environment.<br><br>
            Explore Chandigarh’s Diverse Franchise Opportunities:<br><br>
            ●	<b>Food & Beverage Ventures Franchise</b>: Delight the city’s food enthusiasts with unique dining experiences.<br>
            ●	<b>Retail Outlets Franchise</b>: Tap into the fashion-forward and affluent consumer base of Chandigarh.<br>
            ●	<b>Education Services Franchise</b>: Contribute to the city's focus on quality education and training.<br>
            ●	<b>Healthcare Clinics Franchise</b>: Meet the healthcare needs of a health-conscious population.<br>
            ●	<b>IT & Software Solutions Franchise</b>: Leverage Chandigarh’s growing reputation as an IT hub.<br>
            Investment options in Chandigarh cater to a wide range of entrepreneurs, from those looking for low-entry barriers to others aiming for larger, more ambitious projects. The city’s business-friendly climate ensures that both small scale ventures and larger investments can find their footing and flourish.<br><br>
            Finding the right business opportunity in Chandigarh's vibrant market can be a daunting task, but FranchiseIndia simplifies this process. Our platform connects entrepreneurs with the ideal franchise opportunities that align with their investment capabilities, interests, and the unique dynamics of Chandigarh’s economy.<br><br>
            Step into the entrepreneurial landscape of Chandigarh with FranchiseIndia. We offer a portal to a world of opportunities, providing the necessary tools, insights, and support to navigate the business ecosystem of this dynamic city.<br><br>
            Embrace the potential of starting or expanding your business in Chandigarh with FranchiseIndia, and tap into our resources to embark on a successful entrepreneurial journey in the city known for its planning, beauty, and vibrancy.<br><br>
            "
        ),
        'loc14' => array(
            'title' => 'Business & franchise opportinities in Karnataka',
            'description' => "Karnataka, a state that epitomizes the fusion of ancient heritage with the pulse of modern innovation, stands out as a vibrant landscape for entrepreneurs. Home to the silicon city of India, Bangalore, along with a plethora of historical sites, serene coastlines, and lush landscapes, Karnataka offers a broad spectrum of business opportunities that cater to technology enthusiasts, cultural entrepreneurs, and everything in between.<br><br>
            Whether you're inclined towards the bustling IT and startup ecosystem, the burgeoning sectors of biotechnology and engineering, or the traditional realms of tourism, handicrafts, and agriculture, Karnataka's diverse economy provides a fertile ground for a variety of business ventures.<br><br>
            Spotlight on Karnataka’s Business Opportunities:<br><br>
            ●	<b>Tech Startups & IT Franchises</b>: Immerse yourself in the innovation-driven ecosystem of Bangalore and beyond.<br>
            ●	<b>Biotech Ventures Franchise</b>: Explore opportunities in one of India’s leading biotechnology hubs.<br>
            ●	<b>Tourism & Hospitality Franchise</b>: Leverage the state's rich cultural and natural heritage to attract tourists.<br>
            ●	<b>Agriculture & Organic Farming Franchise</b>: Tap into the growing demand for organic produce and sustainable farming practices.<br>
            ●	<b>Handicrafts & Artisan Products Franchise</b>: Promote Karnataka’s rich tradition of craftsmanship in markets both domestic and international.<br>
            ●	<b>Food & Beverage Ventures Franchise</b>: Cater to the cosmopolitan tastes of Karnataka’s urban population and the traditional preferences of its rural communities.<br>
            Investment avenues in Karnataka are as varied as its landscape, with options ranging from modest ventures requiring minimal capital to more substantial investments in high-tech industries. This ensures that entrepreneurs of all investment levels can find their niche in Karnataka’s vibrant economy.<br><br>
            Venturing into the dynamic market of Karnataka might seem challenging, but FranchiseIndia is here to pave the way. Our platform offers a curated selection of franchise and business opportunities tailored to meet your investment profile, business goals, and Karnataka’s unique market needs.<br><br>
            Join the ranks of successful entrepreneurs in Karnataka with FranchiseIndia as your guide. Our platform not only connects you with promising business opportunities but also provides the support and insights necessary for navigating the state’s diverse economic landscape.<br><br>
            Embark on your entrepreneurial journey in Karnataka with FranchiseIndia, and leverage our expertise to find a business venture that aligns with your vision for success in this dynamic state.<br>
            "
        ),
        'loc23' => array(
            'title' => 'Business & franchise opportinities in Delhi',
            'description' => "Delhi, the capital city of India, is not just the political heart of the country but also a thriving center for businesses and startups. This vibrant metropolis is a melting pot of cultures, traditions, and modernity, offering a dynamic environment for entrepreneurs looking to make their mark. With its diverse population, strategic location, and robust infrastructure, Delhi presents a wealth of opportunities across various industries.<br><br>
            Whether you're inclined towards the bustling food scene, interested in the rapidly growing tech and IT sector, or see potential in the educational and healthcare services, Delhi's market is ripe for exploration. The city's economic diversity allows for a broad spectrum of business ventures, from luxury retail outlets to innovative service-based startups.<br><br>
            Dive into Delhi's Business Ecosystem:<br><br>
            ●	<b>Culinary Ventures Franchise</b>: Immerse yourself in Delhi’s love for food with a restaurant, café, or food truck.<br>
            ●	<b>Tech Startups Franchise</b>: Leverage the city’s status as a budding tech hub with an IT or software franchise.<br>
            ●	<b>Fashion and Retail Franchise</b>: Capitalize on Delhi’s reputation as a fashion capital with a boutique or retail franchise.<br>
            ●	<b>Education and Training Centers Franchise</b>: Fill the growing demand for quality education and skill development.<br>
            ●	<b>Healthcare Services Franchise</b>: Provide essential health and wellness services in a city that values quality healthcare.<br>
            ●	<b>Eco-friendly Businesses Franchise</b>: Tap into the growing trend towards sustainability with green businesses.<br><br>
            The investment spectrum in Delhi is as varied as its opportunities, ranging from modest ventures starting at Rs 2 Lakhs to large-scale operations requiring investments of Rs 2 Crores and beyond. This flexibility ensures that Delhi has something for every type of entrepreneur, regardless of their financial capabilities.<br><br>
            In the bustling city of Delhi, finding the right business opportunity can seem like searching for a needle in a haystack. That's where FranchiseIndia comes in. We offer a curated list of franchise opportunities tailored to match your budget, aspirations, and the market demand in Delhi.<br><br>
            Let FranchiseIndia be your guide in navigating the exciting business landscape of Delhi. Our platform not only connects you with a vast array of franchise opportunities but also provides the insights and support needed to embark on a successful entrepreneurial journey.<br><br>
            With FranchiseIndia, stepping into Delhi’s business world is an informed and strategic decision. Explore the multitude of opportunities in this bustling capital with us, and find the perfect match for your business dreams and objectives.<br><br>
            "
        ),
        'loc26' => array(
            'title' => 'Business & franchise opportinities in Punjab',
            'description' => "Punjab, the land of five rivers, is not only celebrated for its agricultural abundance but also stands as a beacon of entrepreneurial opportunity in India. With its robust economy, strategic location, and enterprising spirit, Punjab offers a fertile ground for business investors and entrepreneurs aiming to cultivate success in various sectors.<br><br>
            Whether it's embracing the vibrant food culture, tapping into the textile and apparel industry, exploring the technological advancements, or contributing to the healthcare and education sectors, Punjab presents a wealth of franchise opportunities that cater to a wide array of interests and investment capabilities.<br><br>
            Vibrant Opportunities Await in Punjab:<br><br>
            ●	<b>Food & Beverage Franchise</b>: Dive into Punjab's rich culinary heritage with a food venture.<br>
            ●	<b>Agriculture and Agro-based Franchise</b>: Capitalize on the state's agricultural strengths.<br>
            ●	<b>Textile Franchise</b>: Join the thriving textile and apparel market.<br>
            ●	<b>Tech & IT Franchise</b>: Be part of Punjab's growing tech scene.<br>
            ●	<b>Education Franchise</b>: Contribute to the state's focus on educational excellence.<br>
            ●	<b>Healthcare Franchise</b>: Meet the increasing demand for quality healthcare services.<br>
            The investment needed to start a franchise in Punjab can vary significantly, starting from as low as Rs 3 Lakhs and extending to Rs 2 Crores and beyond, depending on the specific franchise, its location, and the services offered.<br><br>
            If you're navigating the vast landscape of business opportunities in Punjab and seeking the right fit, FranchiseIndia is your ideal partner. We're here to guide you through the selection process, connecting you with opportunities that align with your budget, interests, and the dynamic business environment of Punjab.<br><br>
            Step into the vibrant business community of Punjab with FranchiseIndia. Here, you'll find not just a platform, but a partner committed to helping you find the ideal franchise opportunity that resonates with your entrepreneurial dreams and investment profile.<br><br>
            Discover the full potential of Punjab’s business landscape with FranchiseIndia and embark on a journey to business success in one of India's most spirited and prosperous states.<br>
             "
        ),

        'loc27' => array(
            'title' => 'Business & franchise opportinities in Rajasthan',
            'description' => "Rajasthan, a state that conjures images of majestic forts, vibrant culture, and bustling bazaars, is also a fertile ground for entrepreneurs and business investors. With its unique blend of tradition and modernity, Rajasthan offers a diverse array of business opportunities in sectors that reflect both its rich heritage and its emerging market trends.<br><br>
            For those with a vision to start their own business, Rajasthan extends a warm welcome with its myriad of franchise opportunities. This state, famous for its tourism, handicrafts, and textiles, also hosts a growing demand in sectors like Food and Beverage, Education, Healthcare, and Renewable Energy, making it a vibrant ecosystem for prospective business owners.<br><br>
            Whether you are looking to invest in a traditional business that mirrors the state's rich cultural fabric or a modern enterprise tapping into Rajasthan's growing market, the opportunities are vast and varied.<br><br>
            Spotlight on Rajasthan’s Franchise Opportunities:<br><br>
            ●	<b>Tourism and Hospitality Franchise</b>: Leverage Rajasthan's status as a global tourist hotspot.<br>
            ●	<b>Handicraft and Textile Franchise</b>: Immerse in the tradition of Rajasthani arts and crafts.<br>
            ●	<b>Food & Beverage Franchise</b>: Cater to the diverse culinary tastes of locals and tourists alike.<br>
            ●	<b>Education Franchise</b>: Be part of a growing sector with a focus on quality learning.<br>
            ●	<b>Healthcare Franchise</b>: Address the growing demand for healthcare services.<br>
            ●	<b>Renewable Energy Franchise</b>: Invest in the future with Rajasthan's push towards sustainable energy.<br>
            Investment ranges can differ widely, starting from as low as Rs 3 Lakhs to over Rs 2 Crore, influenced by the brand, scope, and location of the franchise.<br><br>
            Feeling overwhelmed by the wealth of options? FranchiseIndia is here to simplify your journey. We match you with the franchise opportunities that best fit your aspirations, budget, and the unique business landscape of Rajasthan.<br><br>
            Join the vibrant business community of Rajasthan and turn your entrepreneurial dreams into reality. With FranchiseIndia, discovering and investing in the perfect franchise becomes a seamless and rewarding journey.<br><br>
            Dive into Rajasthan's booming business scene with FranchiseIndia, and take the first step towards building a successful venture in one of India's most iconic states.<br><br>
            "
        ),
        'loc32' => array(
            'title' => 'Business & franchise opportinities in Uttar Pradesh',
            'description' => "Uttar Pradesh, a state that blends historical grandeur with modern entrepreneurial spirit, offers a landscape teeming with business possibilities. As one of India's most populous states, it boasts a vast consumer market and a strategic location that serves as a gateway to the northern regions of the country. This unique combination makes Uttar Pradesh a hotbed for entrepreneurs looking to tap into a variety of sectors.<br><br>
            From the bustling streets of Lucknow and Varanasi to the industrial hubs of Noida and Ghaziabad, Uttar Pradesh presents a plethora of franchise opportunities across the Food and Beverage, Retail, Education, Healthcare, and Technology sectors. The state's rich cultural heritage also paves the way for ventures in Tourism and Hospitality, Handicrafts, and Cultural Enterprises, making it a vibrant ecosystem for business growth.<br><br>
            Your Business Journey in Uttar Pradesh Starts Here:<br><br>
            ●	<b>Food & Beverage Franchise</b>: Capitalize on the state's diverse culinary traditions.<br>
            ●	<b>Retail Franchise</b>: Meet the consumer demands in one of India's largest markets.<br>
            ●	<b>Education Franchise</b>: Tap into the growing demand for quality education and training.<br>
            ●	<b>Healthcare Franchise</b>: Contribute to improving the state's healthcare infrastructure.<br>
            ●	<b>Technology Franchise</b>: Be at the forefront of Uttar Pradesh's digital transformation.<br>
            ●	<b>Tourism & Hospitality Franchise</b>: Explore the state's rich history and culture through business.<br>
            Investments in these opportunities can range from as little as Rs 3 Lakhs to Rs 2 Crores or more, depending on the franchise model, location, and the scale of operations envisioned.<br><br>
            Feeling overwhelmed by the possibilities? FranchiseIndia is here to streamline your search for the perfect franchise opportunity in Uttar Pradesh. We provide a platform where you can explore a curated selection of franchises that align with your investment capacity, interests, and the dynamic market needs of Uttar Pradesh.<br><br>
            Embark on a rewarding business venture in Uttar Pradesh with FranchiseIndia by your side. Our platform is designed to connect you with the ideal franchise opportunities that not only match your entrepreneurial vision but also blend seamlessly with the state's diverse economic landscape.<br><br>
            Take the first step towards business success in Uttar Pradesh with FranchiseIndia, and leverage our expertise to navigate the vibrant and diverse market of this dynamic state.<br><br>
            "
        ),
        'loc33' => array(
            'title' => 'Business & franchise opportinities in West Bengal',
            'description' => "West Bengal, a state that marries cultural richness with economic vibrancy, stands as a compelling destination for entrepreneurs and business investors. From the historic streets of Kolkata, a city that echoes the remnants of colonial India, to the lush tea gardens of Darjeeling, West Bengal offers diverse avenues for business ventures. The state's economy, driven by agriculture, manufacturing, and services, alongside a burgeoning IT and education sector, creates a fertile ground for a variety of franchise opportunities.<br><br>
            For those looking to venture into the business world of West Bengal, the state presents an array of possibilities in Food and Beverage, Retail, Education, Healthcare, and Technology sectors. Additionally, West Bengal's reputation as a major cultural and tourist hub opens up unique opportunities in the Tourism and Hospitality industry, as well as in the Arts and Crafts sector, tapping into the rich artisan traditions of the state.<br><br>
            Key Franchise Opportunities in West Bengal:<br><br>
            ●	<b>Food & Beverage Franchise</b>: Engage with West Bengal’s love for cuisine with a culinary venture.<br>
            ●	<b>Retail Franchise</b>: Tap into the consumer market with a retail business in bustling markets or modern malls.<br>
            ●	<b>Education Franchise</b>: Join the state's focus on education with a school or training center.<br>
            ●	<b>Healthcare Franchise</b>: Cater to the healthcare needs of a populous state.<br>
            ●	<b>Technology Franchise</b>: Be part of the growing IT and software services sector.<br>
            ●	<b>Tourism & Hospitality Franchise</b>: Leverage the state’s rich heritage and tourist attractions.<br>
            Investment levels for starting a franchise in West Bengal can vary, beginning from as low as Rs 3 Lakhs to upwards of Rs 2 Crores, dependent on the type of franchise, the brand, and the specific business model.<br><br>
            Navigating through the myriad of business opportunities in West Bengal can be overwhelming, but FranchiseIndia is here to guide you to your ideal match. Our platform connects you with the franchise opportunities that best fit your investment range, interests, and the unique market dynamics of West Bengal.<br><br>
            Embrace the opportunity to be a part of West Bengal's thriving business community with FranchiseIndia. Our expertise and extensive listing of franchise opportunities provide you with the resources to make informed decisions, ensuring your venture in West Bengal starts on solid ground.<br><br>
            Dive into the vibrant economy of West Bengal with FranchiseIndia, and embark on a journey to business success in a state known for its cultural heritage, economic resilience, and entrepreneurial spirit.<br><br>
            "
        ),
        'loc30' => array(
            'title' => 'Business & franchise opportinities in Tripura',
            'description' => "Tripura, a gem nestled in the lush landscapes of Northeast India, may be one of the country's smaller states, but it boasts a vibrant economy with untapped potential. With its rich cultural heritage, strategic geographic location bordering Bangladesh, and growing emphasis on sectors like agriculture, handicrafts, and tourism, Tripura presents unique business opportunities for enterprising individuals.<br><br>
            The state’s economy is diversifying, moving beyond traditional sectors to embrace opportunities in retail, hospitality, healthcare, and education, spurred by its developing infrastructure and government initiatives to promote entrepreneurship and investment.<br><br>
            Unlocking Tripura’s Business Potential:<br><br>
            ●	<b>Agricultural and Agro-based Franchise</b>: Capitalize on Tripura's agricultural richness with ventures that support or enhance its primary sector.<br>
            ●	<b>Handicrafts and Traditional Arts Franchise</b>: Bring Tripura's exquisite handicrafts and artisan products to broader markets.<br>
            ●	<b>Tourism and Hospitality Businesses Franchise</b>: Leverage the state's natural beauty and cultural attractions to cater to a growing number of visitors.<br>
            ●	<b>Retail Opportunities & Franchise</b>: Tap into the expanding urban consumer base with modern retail outlets.<br>
            ●	<b>Education and Training Institutes Franchise</b>: Address the educational needs of a young population eager for quality education.<br>
            ●	<b>Healthcare Services Franchise</b>: Contribute to improving the health infrastructure in both urban and rural areas.<br><br>
            Investment opportunities in Tripura are diverse, catering to a wide range of financial capacities and interests. From low-cost startups in the handicrafts sector to more significant investments in healthcare and education, the state offers a supportive environment for various business ventures.<br><br>
            Navigating the business landscape of Tripura might seem daunting given its unique challenges and opportunities. However, FranchiseIndia is here to guide you through the process, connecting you with franchise opportunities that align with your investment level, business goals, and the market dynamics of Tripura.<br><br>
            With FranchiseIndia, embarking on a business venture in Tripura becomes an informed and strategic decision. Our platform provides access to a wide array of franchise opportunities, along with the insights and support needed to navigate Tripura’s burgeoning market.<br><br>
            Dive into the economic opportunities of Tripura with FranchiseIndia, and explore the potential of starting or expanding your business in this promising state, where tradition and progress go hand in hand.<br><br>
            "
        ),
        'loc17' => array(
            'title' => 'Business & franchise opportinities in Madhya Pradesh',
            'description' => "Madhya Pradesh, the heart of India, offers a unique blend of historical significance and economic growth, making it an attractive destination for entrepreneurs and investors. With its vast agricultural lands, emerging IT sector, and rich mineral resources, Madhya Pradesh provides a diverse canvas for a wide range of business ventures. The state's commitment to sustainable development and investment in infrastructure presents fertile ground for franchises across various sectors.<br><br>
            Whether you're drawn to the burgeoning tourism industry, keen on tapping into the agricultural and food processing sectors, or looking to make an impact in education and healthcare, Madhya Pradesh offers ample opportunities to turn your entrepreneurial dreams into reality.<br><br>
            Explore Diverse Franchise Opportunities in Madhya Pradesh:<br><br>
            ●	Agriculture & Food Processing Franchise: Leverage Madhya Pradesh's agricultural heritage with a venture in food processing or agribusiness.<br>
            ●	Tourism & Hospitality Franchise: Capitalize on the state's rich history and natural beauty with a business in tourism and hospitality.<br>
            ●	Education Franchise: Address the growing demand for quality education in both urban and rural areas.<br>
            ●	Healthcare Franchise: Contribute to improving health services across the state.<br>
            ●	Retail Franchise: Meet the varied needs of a large consumer base with a retail outlet.<br>
            ●	IT & Technology Franchise: Join the digital transformation in Madhya Pradesh’s evolving IT landscape.<br><br>
            The investment required to embark on a franchise journey in Madhya Pradesh can vary widely, starting from as low as Rs 2 Lakhs to over Rs 1 Crore, depending on the brand, location, and scope of the business model. This range ensures that investors with diverse financial capabilities can find suitable opportunities in the state.<br><br>
            With the vast array of options available, finding the right franchise opportunity in Madhya Pradesh might seem overwhelming. However, FranchiseIndia is here to streamline your search. Our platform connects you with franchises that match your investment capacity, business goals, and the market dynamics of Madhya Pradesh.<br><br>
            Dive into the entrepreneurial spirit of Madhya Pradesh with FranchiseIndia. Our platform is your gateway to a curated selection of franchise opportunities, designed to thrive in the state's dynamic economic environment. With FranchiseIndia, you gain access to the tools, insights, and support needed to navigate the business landscape of Madhya Pradesh successfully.<br><br>
            Embark on your business journey in Madhya Pradesh with FranchiseIndia and leverage our expertise to find a franchise that aligns with your vision and investment profile, setting you on the path to success in the heart of India.
            "
        ),
        'loc9' => array(
            'title' => 'Business & franchise opportinities in Gujarat',
            'description' => "Gujarat, renowned for its entrepreneurial ethos and as the birthplace of numerous business legends, stands as a beacon of opportunity in India's commercial landscape. This industrious state, with its strategic geographic location and robust infrastructure, is a powerhouse of economic activity, particularly in sectors like manufacturing, textiles, and diamonds, as well as emerging fields like IT and renewable energy.
                The state's conducive business environment, supported by proactive government policies, has made Gujarat a favored destination for entrepreneurs looking to start or expand their ventures. From the vibrant streets of Ahmedabad and Surat to the serene landscapes of Kutch, Gujarat offers a diverse array of business possibilities.
                Seize Gujarat's Business Opportunities:<br><br>
                ●   <b>Manufacturing Ventures Franchise</b>: Dive into the world of manufacturing in a state known for its industrial prowess.<br>
                ●	<b>Textile Franchises</b>: Join the legacy of Gujarat's centuries-old textile industry.<br>
                ●	<b>Diamond & Jewelry Businesses Franchise</b>: Tap into the global diamond trade centered in Surat.<br>
                ●	<b>Renewable Energy Projects Franchise</b>: Be part of Gujarat's ambitious green energy initiatives.<br>
                ●	<b>IT & Technology Startups Franchise</b>: Explore the growing tech scene in Gujarat’s smart cities.<br>
                ●	<b>Culinary Ventures  Franchise</b>: Cater to the diverse palate of Gujarat with a food and beverage business.<br><br>
                Investment opportunities in Gujarat span a wide range, from small-scale startups requiring minimal investment to large industrial projects demanding significant financial outlay. This variety ensures that Gujarat can accommodate entrepreneurs with varying investment capacities and business visions.
                Navigating the vast and vibrant business landscape of Gujarat can be challenging, but FranchiseIndia is here to light the way. Our platform is dedicated to connecting you with the most suitable franchise opportunities in Gujarat, aligning with your investment level, industry interest, and business goals.
                FranchiseIndia is your compass in the entrepreneurial journey through Gujarat’s dynamic economy. With us, you gain access to a curated selection of business opportunities, comprehensive support, and the insights necessary to make your venture in Gujarat a resounding success.
                Begin your business voyage in Gujarat with FranchiseIndia, and let us help you harness the state’s entrepreneurial spirit to realize your dreams and ambitions.
                "
        ),
        'loc15' => array(
            'title' => 'Business & franchise opportinities in Kerala',
            'description' => "Kerala, often referred to as 'God’s Own Country,' is not just a tourist paradise but a hotbed of entrepreneurial activity and innovation. With its lush landscapes, booming tourism, advanced healthcare system, and rapidly growing IT sector, Kerala offers a fertile ground for diverse business ventures. The state's commitment to sustainable development and its high literacy rate make it an ideal location for knowledge-based and eco-friendly businesses.<br><br>
            Whether you're looking to immerse yourself in the vibrant tourism and hospitality industry, make a mark in the healthcare sector, explore the possibilities in education and technology, or innovate within the green and agricultural sectors, Kerala presents a wide spectrum of opportunities.<br><br>
            Embark on Business Ventures in Kerala:<br><br>
            ●	<b>Tourism & Hospitality Franchise</b>: Leverage Kerala’s status as a global tourism hotspot.<br>
            ●	<b>Healthcare Services Franchise</b>: Contribute to the state’s renowned healthcare sector.<br>
            ●	<b>Educational Institutes Franchise</b>: Tap into a culture that values education highly.<br>
            ●	<b>IT & Tech Startups Franchise</b>: Join the digital wave in one of India’s rising tech hubs.<br>
            ●	<b>Eco-friendly Projects Franchise</b>: Engage with sustainable business practices in agriculture and beyond.<br>
            ●	<b>Food & Beverage Ventures Franchise</b>: Explore Kerala’s rich culinary traditions and organic produce markets.<br>
            The investment needed to start your venture in Kerala can range widely, reflecting the diverse economic landscape of the state. Whether you’re eyeing a small cafe by the backwaters or a tech startup in Technopark, the investment could start from as little as Rs 2 Lakhs to more substantial amounts for larger projects.<br><br>
            Finding the right business opportunity in Kerala’s dynamic market can seem daunting, but FranchiseIndia is here to simplify your journey. Our platform matches you with franchise opportunities that align with your budget, passion, and the unique market dynamics of Kerala.<br><br>
            With FranchiseIndia, navigating Kerala’s business opportunities becomes an exciting adventure. Our platform offers a gateway to a broad selection of franchises and business ventures, equipped with insights and support to guide you every step of the way.<br><br>
            Step into Kerala’s business landscape with FranchiseIndia and unlock the potential of operating in a state known for its innovation, sustainability, and entrepreneurial spirit.
            "
        ),
        'loc18' => array(
            'title' => 'Business & franchise opportinities in Maharashtra',
            'description' => "Maharashtra, India's economic powerhouse, presents a landscape teeming with business opportunities. From the bustling streets of Mumbai, the financial capital, to the sprawling vineyards of Nashik, the state is a beacon for entrepreneurs and investors alike. Maharashtra's diverse economy, encompassing everything from Bollywood to IT and financial services, along with manufacturing and agriculture, offers a fertile ground for a wide array of franchise opportunities.<br><br>
            Whether you're looking to dive into the dynamic retail sector, tap into the booming tech industry, explore the rich culinary heritage with a food and beverage venture, or make an impact in the education and healthcare sectors, Maharashtra provides the perfect backdrop for your entrepreneurial aspirations.<br>
            Spotlight on Franchise Opportunities in Maharashtra:<br><br>
            ●	<b>Food & Beverage Franchise</b>: Capture the gastronomic diversity of Maharashtra with a restaurant or café.<br>
            ●	<b>Retail Franchise</b>: Tap into one of India’s largest consumer markets with a retail outlet.<br>
            ●	<b>Tech & IT Franchise</b>: Join the state's burgeoning tech scene, home to startups and global IT firms.<br>
            ●	<b>Education Franchise</b>: Contribute to the state's legacy of academic excellence with an educational institution.<br>
            ●	<b>Healthcare Franchise</b>: Meet the growing demand for healthcare services in urban and rural areas alike.<br>
            ●	<b>Entertainment & Leisure Franchise</b>: Leverage Maharashtra’s status as the hub of Bollywood and entertainment.<br><br>
            The investment required to start a franchise in Maharashtra can range significantly, from as low as Rs 5 Lakhs to over Rs 2 Crores, depending on the franchise's nature, brand, and location. This variety ensures that investors of different capacities can find suitable business opportunities within the state.<br>
            Navigating the vast and diverse business environment of Maharashtra may seem daunting, but FranchiseIndia is here to ease the process. Our platform is designed to connect you with franchise opportunities that align with your investment capacity, business goals, and the unique market dynamics of Maharashtra.<br>
            With FranchiseIndia, stepping into Maharashtra's vibrant business scene has never been easier. We provide a gateway to a wide range of franchise opportunities, equipped with the tools and insights needed to embark on a successful entrepreneurial journey in Maharashtra.<br>
            Discover the perfect franchise opportunity in Maharashtra with FranchiseIndia and join the ranks of successful entrepreneurs in one of India's most dynamic and prosperous states.
            "
        ),
        'loc10' => array(
            'title' => 'Business & franchise opportinities in Haryana',
            'description' => "Haryana, a state known for its agricultural prosperity, has rapidly transformed into a hub of industrial and economic activity. Strategically located adjacent to the national capital, Haryana has leveraged its geographical advantage to attract a plethora of businesses and industries, ranging from manufacturing and automobile to IT and education. The state's commitment to fostering an investor-friendly environment has made it a fertile ground for entrepreneurs looking to sow the seeds of their business dreams.<br><br>
            With its blend of urban growth centers like Gurugram and Faridabad, alongside its strong rural foundations, Haryana offers diverse opportunities for business ventures. Whether you aim to tap into the bustling corporate life of its cities or cater to the agricultural and rural markets, Haryana's economy provides a vibrant landscape for a wide range of franchises.<br><br>
            Venture into Haryana’s Business Opportunities:<br><br>
            ●	Manufacturing & Automobile Franchises: Capitalize on the state's industrial backbone.<br>
            ●	IT & Technology Startups Franchise: Dive into the digital wave in cities renowned for their tech parks.<br>
            ●	Agricultural Enterprises Franchise: Engage with the agrarian economy through agribusiness and related services.<br>
            ●	Education & Training Centers Franchise: Fulfill the growing demand for quality education and professional training.<br>
            ●	Healthcare Services Franchise: Address the healthcare needs of an expanding urban and rural population.<br>
            ●	Retail & Hospitality Ventures Franchise: Meet the consumer demands in Haryana’s affluent and growing cities.<br><br>
            Investment prospects in Haryana cater to a broad spectrum of entrepreneurs, with opportunities ranging from small-scale startups to significant industrial ventures. The state's dynamic economic policies ensure a supportive environment for businesses at all investment levels.<br><br>
            The journey to finding the right franchise or business opportunity in Haryana's evolving market can seem challenging, but with FranchiseIndia, it becomes an exciting exploration. Our platform is designed to match you with opportunities that align with your investment profile, business aspirations, and the unique economic landscape of Haryana.<br><br>
            Embrace the dynamic business opportunities Haryana offers with FranchiseIndia as your partner. Our platform opens doors to a curated selection of franchises and business ventures, backed by insights and support to ensure your success in this vibrant state.<br><br>
            Step into the promising economic terrain of Haryana with FranchiseIndia, and let us guide you through the process of establishing a thriving business in a state that is as diverse in its opportunities as it is rich in its cultural heritage.<br><br>
            "
        ),
        'loc29' => array(
            'title' => 'Business & franchise opportinities in Tamil Nadu',
            'description' => "Tamil Nadu, a state that epitomizes the perfect blend of tradition and modernity, is a powerhouse of economic activity in India. With its strong manufacturing base, thriving IT industry, and rich cultural tourism, Tamil Nadu presents a plethora of opportunities for entrepreneurs and business investors looking to make their mark.<br><br>
            From the bustling metropolis of Chennai to the textile hub of Coimbatore, the state is ripe with potential for a wide range of franchise businesses. Whether it’s tapping into the vibrant food culture, leveraging the state's industrial and technological prowess, or exploring the realms of education and healthcare, Tamil Nadu offers a conducive environment for all.<br><br>
            Explore Business Avenues in Tamil Nadu:<br><br>
            ●	<b>Food & Beverage Franchise</b>: Delve into Tamil Nadu’s culinary diversity with a restaurant or cafe.<br>
            ●	<b>IT & Tech Franchise</b>: Join the ranks of global IT companies in India’s software and services hub.<br>
            ●	<b>Textile Franchise</b>: Be part of a long-standing textile and garment industry.<br>
            ●	<b>Education Franchise</b>: Invest in the future with a franchise in Tamil Nadu’s booming education sector.<br>
            ●	<b>Healthcare Franchise</b>: Address the growing healthcare needs of a diverse population.<br>
            ●	<b>Renewable Energy Franchise</b>: Capitalize on Tamil Nadu’s leadership in renewable energy.<br>
            The investment required to start a franchise in Tamil Nadu varies widely, ranging from Rs 3 Lakhs to over Rs 2 Crores, depending on the franchise type, brand, and location. This flexibility ensures that entrepreneurs of all investment levels can find a suitable business opportunity in the state.<br><br>
            If the breadth of options seems daunting, FranchiseIndia is here to help. Our platform simplifies the process of finding the right franchise opportunity in Tamil Nadu, matching you with ventures that align with your investment capacity and business goals.<br><br>
            With FranchiseIndia, stepping into Tamil Nadu’s vibrant business scene has never been easier. We offer a gateway to a curated selection of franchise opportunities designed to thrive in Tamil Nadu’s dynamic economic landscape.<br><br>
            Embrace the opportunity to join Tamil Nadu's thriving community of entrepreneurs with FranchiseIndia. Let us guide you through the process of selecting a franchise that not only meets your investment criteria but also has the potential for substantial growth and success in this culturally rich and economically diverse state.<br><br>
            "
        ),
    ),

    'popupBrands'  => ["1771", "8859", "28935", "13117", "16937", "3697", "4682", "11127", "14860", "19677", "12738", "4262", "15468", "18863", "17001", "10061", "27394", "19463", "9438", "12734", "16787", "12200", "23139", "104", "19574", "20908", "21213", "21110", "20904", "18286", "24461", "28343", "20943", "23907", "231", "15046", "17518", "17892", "17643", "4469", "17564", "13373", "18223", "8974", "13080", "45", "23908", "20273", "5938", "1132", "20359", "13302", "19723", "28534", "15829", "19130", "27482"],
    'Charges' => array(
        "OPTCRDC" => "2.06",
        "OPTDBCRD" => "0",
        "OPTNBK" => "2.12",
        "OPTCASHC" => "0",
        "OPTMOBP" => "0",
        "OPTEMI" => "2.12",
        "OPTWLT" => "0",
        "Paytm" => "2.36",
        "OPTUPI" => "0"
    ),





];



