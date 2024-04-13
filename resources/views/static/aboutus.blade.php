@php

    $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

    if (strpos($url, '/wellness') !== false) {
        $seoTitle = 'Wellness India - About Us';
        $seoDesc = 'Know about Wellness India';
        $seoKeywords = 'About Us, Wellness India';
    } elseif (strpos($url, '/education') !== false) {
        $seoTitle = 'Educationbiz  - About Us';
        $seoDesc = 'Know about Educationbiz';
        $seoKeywords = 'About Us, Educationbiz';
    } elseif (strpos($url, '/restaurant') !== false) {
        $seoTitle = 'Restaurant India - About Us';
        $seoDesc = 'Know about Restaurant India';
        $seoKeywords = 'About Us, Restaurant India';
    } else {
        $seoTitle = 'Franchise India - About Us';
        $seoDesc = 'Know about Franchise India';
        $seoKeywords = 'About Us, Franchise India';
    }

@endphp
@section('seoTitle', $seoTitle)
@section('seoDesc', $seoDesc)
@section('seoKeywords', $seoKeywords)

@extends('layout.master')
@section('content')
    <div class="container marginTB45 staicp">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h1> About Us</h1>
                @php

                    $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

                    if (strpos($url, '/wellness') !== false) {
                        $aboutContent = "Wellness India is India's largest platform for news, information, latest happenings and trends in health & beauty sector. It has now become the most preferred choice of information for the rapidly evolving 'Health & Beauty Industry'.
Wellness India strive to make it a 360-degree-solution platform for the people engaged in 'Health and Beauty Industry'. It also attempts to build a strong knowledge and information platform for the industry. <br><br>Under the aegis of Franchise India, Wellness India has firmly positioned itself in the market. We have a large network of journalists, analysts and editors, who provide accurate and comprehensive information on a daily basis.
<br><br>
This website keeps daily track of all the recent happenings, events and major policy decisions and regulations, both at the domestic and international level, which directly or indirectly impacts the industry. 
<br><br>
For any feedback or queries, please write to us at <a href='mailto:advertise@franchiseindia.com'>advertise@franchiseindia.com</a>. 
<br><br>
We look forward to hearing from you!";
                    } elseif (strpos($url, '/education') !== false) {
                        $aboutContent = "India's education sector is an industry growing at a rapid rate. It's now becoming a sector full of opportunities and results, too. At Education Biz, we get you all the news, information, latest happenings and trends from this booming sector. At Education Biz, you can also get insights from industry leaders on the growth prospects and opportunities of the education sector. We strive to make Education Biz a 360-degree-solution platform for the people engaged in education and education technology. We also attempt to build a strong knowledge and information platform for the industry.
<br><br>
Under the aegis of Franchise India, Education Biz aims to firmly position itself in the market. We have a large network of journalists, analysts and editors, who provide accurate and comprehensive information on a daily basis. 
<br><br>
This website keeps daily track of all the recent happenings, events and major policy decisions and regulations, both at the domestic and international level, which directly or indirectly impact the industry.
<br><br>
For any feedback or queries, please write to us at <a href='mailto:advertise@franchiseindia.com'>advertise@franchiseindia.com</a>. 
<br><br>
We look forward to hearing from you!";
                    } elseif (strpos($url, '/restaurant') !== false) {
                        $aboutContent = "Food service business has emerged more appealing now than it used to be a decade back. Driving factors like urbanisation, wide exposure to international cuisines, a rising mentality to experiment with food and all the more young population opting for ‘dine-out’ or prepared food have contributed the growth story of Indian food service business. Reason being, the $ 40 billion (nearly Rs 2.4 lakh crore) domestic food services market is attracting increased attention from leading players in India Inc and global chains.
<br><br>
Recognising such huge potential, Franchise India has initiated to provide a platform to entrepreneurs who want to taste success in the domestic and international food service business where different measures of food business can be discussed.
<br><br>
Restaurant India is one such unique platform where the stakeholders of food business fraternity come together to talk about their success stories. The specially designed case studies of failed ventures aware restaurant owners about a failed strategy offering enormous support. The website boasts of authentic news updates, interviews, web features covering different issues and best practices from the domestic and international food business fraternity as well.";
                    } else {
                        $aboutContent =
                            "Since its establishment in 1999, Franchise India Holdings Limited (FIHL) stands as the preeminent franchise solutions provider in Asia, offering an unparalleled breadth of expertise in franchising and licensing. With a distinguished legacy, FIHL takes pride in its role as an influential guide, facilitating successful partnerships between countless investors and a variety of entities seeking expansion, both domestically and internationally. The foundation of FIHL's esteemed reputation is built upon four pillars: in-depth <strong>Knowledge</strong>, expansive <strong>Opportunity</strong>, an extensive <strong>Network</strong>, and proven <strong>Success</strong>. These core elements continue to underpin the company's outstanding achievements in the realm of franchise development.";
                    }

                @endphp

                <p class="abttxt">{!! $aboutContent !!}</p>
            </div>
        </div>

        <ul class="row abtlist">
            <li class="col-xs-12 col-sm-3 col-md-3">
                <div class="imgbat"><img src="{{ URL::asset('images/about-us1.jpg') }}" alt="about us" /></div>
                <span>Knowledge</span> Anchored by a consortium of global experts and seasoned professionals.
            </li>
            <li class="col-xs-12 col-sm-3 col-md-3">
                <div class="imgbat"><img src="{{ URL::asset('images/about-us2.jpg') }}" alt="about us" /></div>
                <span>Opportunity</span> Constructs a unified platform harnessing focused media to cultivate and present
                opportunities.
            </li>
            <li class="col-xs-12 col-sm-3 col-md-3">
                <div class="imgbat"><img src="{{ URL::asset('images/about-us3.jpg') }}" alt="about us" /></div>
                <span>Network</span>Supports local investors through its expansive presence, featuring 60 offices globally.
            </li>
            <li class="col-xs-12 col-sm-3 col-md-3">
                <div class="imgbat"><img src="{{ URL::asset('images/about-us4.jpg') }}" alt="about us" /></div>
                <span>Success</span> Distinguished by the successful execution of numerous franchising projects.
            </li>
        </ul>
        <div class="row margintop40">
            <div class="col-xs-12 col-sm-12 col-md-12 abthead">Note From President</div>

            <div class="col-xs-12 col-sm-6 col-md-5">
                <div class="abotimg"><img src="{{ URL::asset('images/gaurav-sirnew.jpg') }}" /></div>
                <div class="aboutname"><span>Gaurav Marya</span>
                    Chairman, Franchise India Holdings Ltd.</div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-7 sidetxt">
                <span class="minusmargintop7">3Ps - Principle, People and Partnership </span>
                In the last seven years of successful franchising we have laid these 3Ps as our foundation. First is
                PRINCIPLE, to be 'Investor Centric... Franchise Focussed.' We understand the importance of an investor and
                are centric to work towards his interest. All our businesses are dedicated to inform and assist the
                investor. As pioneers in Indian franchising, all our divisions are either franchise supply or profitable
                franchise opportunities. Along with principle, we believe in our PEOPLE. FIHL is a people's company. HERE I
                would like to thank all our partners, vendors, team members and our clients for their valuable support.
                <span class="margintop20">Happy Franchising !</span>
            </div>
        </div>
    </div>
    <!--form end here -->
    <div class="height40"></div>
@endsection
