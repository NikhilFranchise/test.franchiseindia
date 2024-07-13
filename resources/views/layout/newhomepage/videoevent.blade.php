@php
    $videos1 = array(
    0 => array(
    'url' => 'https://www.youtube.com/watch?v=vGfVj_kF0oY',
    'imageurl' => 'https://i.ytimg.com/vi/vGfVj_kF0oY/mqdefault.jpg',
    'title' => '3 kinds of ROI that any business can get! | Gaurav Marya | Franchise India',
    'description' => 'Gaurav Marya emphasizes the significance of Return on Investment (ROI), Return on Involvement (ROI)',
    'views' => '26',
    'date' => 'May 3, 2024'
    ),
    1 => array(
    'url' => 'https://www.youtube.com/watch?v=KrfswZwOgPY',
    'imageurl' => 'https://i.ytimg.com/vi/KrfswZwOgPY/mqdefault.jpg',
    'title' => 'Three Life Changing Business Opportunities | Franchise India',
    'description' => 'Hear from a franchise industry expert, Mr. Gaurav Marya, Chairman, Franchise India about 3 life changing business',
    'views' => '152',
    'date' => 'Apr 2, 2024'
    ),
    2 => array(
    'url' => 'https://www.youtube.com/watch?v=kQ7q9S-eK6o',
    'imageurl' => 'https://i.ytimg.com/vi/kQ7q9S-eK6o/mqdefault.jpg',
    'title' => 'Establish Your Career with Exclusive Business Opportunity | Franchise India',
    'description' => 'Hear from franchise industry expert, Mr. Gaurav Marya, Chairman, Franchise India about three exciting business opportunities',
    'views' => '134',
    'date' => 'Apr 1, 2024'
    ),
    3 => array(
    'url' => 'https://www.youtube.com/watch?v=Shmk4GOSa5Q',
    'imageurl' => 'https://i.ytimg.com/vi/Shmk4GOSa5Q/mqdefault.jpg',
    'title' => 'Build Your Own Brand with Franchise India Become an Independent Franchise Consultant!',
    'description' => 'Embark on a rewarding journey as an Independent Franchise Consultant and achieve unparalleled success.',
    'views' => '51',
    'date' => 'Apr 25, 2024'
    ),
    4 => array(
    'url' => 'https://www.youtube.com/watch?v=ombouemcGlM',
    'imageurl' => 'https://i.ytimg.com/vi/ombouemcGlM/mqdefault.jpg',
    'title' => 'Become a Successful Professional in Thriving 4 Trillion Industry',
    'description' => 'Independent Franchise Consultant (IFC) Training Program has been specifically designed to train individuals',
    'views' => '98',
    'date' => 'Apr 1, 2024'
    ),
    5 => array(
    'url' => 'https://www.youtube.com/watch?v=-RhHZ4FlFSo',
    'imageurl' => 'https://i.ytimg.com/vi/-RhHZ4FlFSo/mqdefault.jpg',
    'title' => 'Franchising - A Biggest Marketing Idea | Franchise India',
    'description' => 'Learn from franchise expert, Mr. Gaurav Marya, Chairman, Franchise India',
    'views' => '97',
    'date' => 'Mar 29, 2024'
    ),
    6 => array(
    'url' => 'https://www.youtube.com/watch?v=auKBg2_jKJI',
    'imageurl' => 'https://i.ytimg.com/vi/auKBg2_jKJI/mqdefault.jpg',
    'title' => 'How does Franchise India help you in becoming an IFC! | Gaurav Marya | Franchise India',
    'description' => 'Franchise India offers a robust support system to IFCs, providing comprehensive training',
    'views' => '36',
    'date' => 'May 1, 2024'
    ),
    7 => array(
    'url' => 'https://www.youtube.com/watch?v=B1yRX6lcq0I',
    'imageurl' => 'https://i.ytimg.com/vi/B1yRX6lcq0I/mqdefault.jpg',
    'title' => 'Why people sell the business | Gaurav Marya | Franchise India',
    'description' => 'Uncover the myriad reasons prompting business owners to divest their enterprises.',
    'views' => '47',
    'date' => 'Apr 26, 2024'
    )
    );
@endphp
<section class="video-event">
    <div class="container">
        <div class="padset">
            <div class="setfl">
                <div class="section-ptb">
                    <h2>Trending Videos</h2>
                </div>
                <!-- slider start  -->
                <div id="myCarouselvideo" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarouselvideo" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarouselvideo" data-slide-to="1"></li>
                        <li data-target="#myCarouselvideo" data-slide-to="2"></li>
                        <li data-target="#myCarouselvideo" data-slide-to="3"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    {{-- <div class="carousel-inner">
                        @for($i=0;$i<6;$i++)
                            <div class="item @if($i == 0) active @endif">
                                @for($j=$i;$j<=$i+1;$j++)
                                    <div class="vidblk">
                                        <div class="vidimg">
                                            <div class="overleybg">
                                                <div class="vi">
                                                    <div class="viiner"><a href="{{$videos1[$j]['url']}}" target="_blank"><img src="{{url('newhomepage/assets/img/youtube.svg')}}" alt="video-icon"> </a> </div>
                                                </div>
                                            </div>
                                            <img class=" lazyloaded" title="" alt="entrepreneur" src="{{$videos1[$j]['imageurl']}}">
                                        </div>
                                        <div class="videcontent">
                                            <h2><a href="{{$videos1[$j]['url']}}" target="_blank">{{$videos1[$j]['title']}}</a> </h2>
                                            <div class="videtxt">
                                                {{$videos1[$j]['description']}}
                                            </div>
                                            <div class="showview">{{$videos1[$j]['views']}} {{ (Request::segment(1) == 'hi') ? 'विचारों' : 'Views' }} <span>{{$videos1[$j]['date']}}</span></div>
                                        </div>
                                    </div>
                                @endfor
                                @php
                                    $i++;
                                @endphp
                            </div>
                        @endfor

                    </div> --}}
<div class="carousel-inner">
    @for($i = 0; $i < count($videos1); $i += 2)
        <div class="item @if($i == 0) active @endif">
            @php
                $firstVideoIndex = $i;
                $secondVideoIndex = ($i + 1) % count($videos1);
            @endphp

            <div class="vidblk">
                <div class="vidimg">
                    <div class="overleybg">
                        <div class="vi">
                            <div class="viiner">
                                <a href="{{$videos1[$firstVideoIndex]['url']}}" target="_blank">
                                    <img src="{{url('newhomepage/assets/img/youtube.svg')}}" alt="video-icon">
                                </a>
                            </div>
                        </div>
                    </div>
                    <img class="lazyloaded" title="" alt="entrepreneur" src="{{$videos1[$firstVideoIndex]['imageurl']}}" loading="lazy">
                </div>
                <div class="videcontent">
                    <h2><a href="{{$videos1[$firstVideoIndex]['url']}}" target="_blank">{{$videos1[$firstVideoIndex]['title']}}</a></h2>
                    <div class="videtxt">
                        {{$videos1[$firstVideoIndex]['description']}}
                    </div>
                    <div class="showview">{{$videos1[$firstVideoIndex]['views']}} {{ (Request::segment(1) == 'hi') ? 'विचारों' : 'Views' }} <span>{{$videos1[$firstVideoIndex]['date']}}</span></div>
                </div>
            </div>

            @if($i + 1 < count($videos1))
                <div class="vidblk">
                    <div class="vidimg">
                        <div class="overleybg">
                            <div class="vi">
                                <div class="viiner">
                                    <a href="{{$videos1[$secondVideoIndex]['url']}}" target="_blank">
                                        <img src="{{url('newhomepage/assets/img/youtube.svg')}}" alt="video-icon">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <img class="lazyloaded" title="" alt="entrepreneur" src="{{$videos1[$secondVideoIndex]['imageurl']}}" loading="lazy">
                    </div>
                    <div class="videcontent">
                        <h2><a href="{{$videos1[$secondVideoIndex]['url']}}" target="_blank">{{$videos1[$secondVideoIndex]['title']}}</a></h2>
                        <div class="videtxt">
                            {{$videos1[$secondVideoIndex]['description']}}
                        </div>
                        <div class="showview">{{$videos1[$secondVideoIndex]['views']}} {{ (Request::segment(1) == 'hi') ? 'विचारों' : 'Views' }} <span>{{$videos1[$secondVideoIndex]['date']}}</span></div>
                    </div>
                </div>
            @endif
        </div>
    @endfor
</div>
                </div>
                <!-- slider end  -->
            </div>
            <!-- video slider end here  -->

            <!-- event start here  -->
            <div class="eventblk">
                <div class="section-ptb">
                    <h2>Upcoming Events</h2>
                </div>
                <!--  -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">                       




 <!-- <div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.franglobal.com/nepal-franchise-distribution-show/" target="_blank">
           <img class="" alt="Nepal Franchise & Distribution Show 2024" src="https://www.franchiseindia.com/images/nepal-franchise-distribution.jpg?id=5"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>Nepal Franchise & Distribution Show 2024</h2>
                                            <div class="eshowtxt">
                                                 27 April 2024, Kathmandu Marriott Hotel
                                            </div>
                                            <div class="link-section  text-capitalize">
                                                <a href="https://www.franglobal.com/nepal-franchise-distribution-show/" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline  text-capitalize">
                                                Hotline: <span>+91 9311148342</span>
                                            </div>
                                        </div>
                                    </div>
</div> 


 <div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.irec.asia/" target="_blank">
           <img class="" alt="IReC 2024" src="https://www.franchiseindia.com/images/irc2024.jpg"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>IReC 2024</h2>
                                            <div class="eshowtxt">
                                                 29-30 April 2024, Hotel Sheraton Grand, Bengaluru
                                            </div>
                                            <div class="link-section  text-capitalize">
                                                <a href="https://www.irec.asia/" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline  text-capitalize">
                                                Hotline: <span>+91 9354193529</span>
                                            </div>
                                        </div>
                                    </div>
</div>


 <div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.d2cindia.in/" target="_blank">
           <img class="" alt="D2C INDIA 2024" src="https://www.franchiseindia.com/images/d2c2024.jpg"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>D2C INDIA 2024</h2>
                                            <div class="eshowtxt">
                                                 29-30 April 2024, Hotel Sheraton Grand, Bengaluru
                                            </div>
                                            <div class="link-section  text-capitalize">
                                                <a href="https://www.d2cindia.in/" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline  text-capitalize">
                                                Hotline: <span>+91 9310811605</span>
                                            </div>
                                        </div>
                                    </div>
</div> -->





 <!-- <div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.franchiseindia.com/expo/" target="_blank">
           <img class="" alt="Franchise India 2024 Delhi " src="https://www.franchiseindia.com/images/franchise-india-delhi.jpg?id=2"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>Franchise India 2024 Delhi</h2>
                                            <div class="eshowtxt">
                                                 18-19 May 2024, (IICC) , Delhi, India
                                            </div>
                                            <div class="link-section  text-capitalize">
                                                <a href="https://www.franchiseindia.com/expo/" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline  text-capitalize">
                                                Hotline: <span>+91 9311148342</span>
                                            </div>
                                        </div>
                                    </div>
</div> 


 <div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.bharatstartup.in/delhi/" target="_blank">
           <img class="" alt="Startup Summit 2024" src="https://www.franchiseindia.com/images/startup-summit.jpg?id=2"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>Startup Summit 2024</h2>
                                            <div class="eshowtxt">
                                                 18 May 2024, (IICC) , Delhi, India
                                            </div>
                                            <div class="link-section  text-capitalize">
                                                <a href="https://www.bharatstartup.in/delhi/" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline  text-capitalize">
                                                Hotline: <span>+91 8800638077</span>
                                            </div>
                                        </div>
                                    </div>
</div> 


 <div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.franchiseindia.com/expo/world-franchise-congress.php" target="_blank">
           <img class="" alt="World Franchise Congress 2024" src="https://www.franchiseindia.com/images/world-franchise-congress.jpg?id=2"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>World Franchise Congress 2024</h2>
                                            <div class="eshowtxt">
                                                 19 May 2024, (IICC) , Delhi, India
                                            </div>
                                            <div class="link-section  text-capitalize">
                                                <a href="https://www.franchiseindia.com/expo/world-franchise-congress.php" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline  text-capitalize">
                                                Hotline: <span>+91 9667698380</span>
                                            </div>
                                        </div>
                                    </div>
</div> 

 <div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.franchiseindia.com/franchise-awards/" target="_blank">
           <img class="" alt="Franchise Awards 2024" src="https://www.franchiseindia.com/images/franchise-awards.jpg?id=2"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>Franchise Awards 2024</h2>
                                            <div class="eshowtxt">
                                                 19 May 2024, (IICC) , Delhi, India
                                            </div>
                                            <div class="link-section  text-capitalize">
                                                <a href="https://www.franchiseindia.com/franchise-awards/" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline  text-capitalize">
                                                Hotline: <span>+91 8375981341</span>
                                            </div>
                                        </div>
                                    </div>
</div>  -->




<!--  <div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.restaurantindia.in/awards/chandigarh/" target="_blank">
           <img class="" alt="Restaurant Awards Chandigarh" src="https://www.franchiseindia.com/images/restaurant-awards-chandigarh.jpg?ver=1"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>Restaurant Awards</h2>
                                            <div class="eshowtxt">
                                                 18 June 2024, JW Marriott, Chandigarh
                                            </div>
                                            <div class="link-section  text-capitalize">
                                                <a href="https://www.restaurantindia.in/awards/chandigarh/" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline  text-capitalize">
                                                Hotline: <span>+91 9654964838</span>
                                            </div>
                                        </div>
                                    </div>
</div>  -->

<!--  <div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.educationcongress.org/" target="_blank">
           <img class="" alt="EdTech x Indian Education Summit & Awards" src="https://www.franchiseindia.com/images/ed.jpg?ver=8"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>EdTech x Indian Education Summit & Awards</h2>
                                            <div class="eshowtxt">
                                                 19 June 2024, Jw Marriott Chandigarh
                                            </div>
                                            <div class="link-section  text-capitalize">
                                                <a href="https://www.educationcongress.org/" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline  text-capitalize">
                                                Hotline: <span>+91 7827548909</span>
                                            </div>
                                        </div>
                                    </div>
</div>  -->


<!--  <div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.successpreneur.in" target="_blank">
           <img class="" alt="Successpreneur Awards 2024" src="https://www.franchiseindia.com/images/success.jpg"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>Successpreneur Awards 2024</h2>
                                            <div class="eshowtxt">
                                                 28 June 2024, The Westin, Chennai
                                            </div>
                                            <div class="link-section  text-capitalize">
                                                <a href="https://www.successpreneur.in" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline  text-capitalize">
                                                Hotline: <span>+91 9958620920</span>
                                            </div>
                                        </div>
                                    </div>
</div>  -->


 <!-- <div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.franchiseindia.net/fro/chennai/" target="_blank">
           <img class="" alt="FROEXPO Chennai" src="https://www.franchiseindia.com/images/fro-expo-chennai.jpg?id=2"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>FROEXPO Chennai</h2>
                                            <div class="eshowtxt">
                                                 29-30 June 2024, Hall No. 2, Chennai Trade Centre
                                            </div>
                                            <div class="link-section  text-capitalize">
                                                <a href="https://www.franchiseindia.net/fro/chennai/" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline  text-capitalize">
                                                Hotline: <span>+91 9311254088</span>
                                            </div>
                                        </div>
                                    </div>
</div> 


 <div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.indiaev.org/" target="_blank">
           <img class="" alt="India EV Show" src="https://www.franchiseindia.com/images/indiaevshow.jpg"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>India EV Show</h2>
                                            <div class="eshowtxt">
                                                 29-30 June 2024, Hall No. 3, Chennai Trade Centre
                                            </div>
                                            <div class="link-section  text-capitalize">
                                                <a href="https://www.indiaev.org/" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline  text-capitalize">
                                                Hotline: <span>+91 9312199219</span>
                                            </div>
                                        </div>
                                    </div>
</div> 
 -->


 <div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.franchiseindia.net/fro-bos/lucknow/" target="_blank">
           <img class="" alt="Franchise Expo Lucknow" src="https://www.franchiseindia.com/images/fro-bos-lucknow.jpg?ver=1"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>Franchise Expo Lucknow</h2>
                                            <div class="eshowtxt">
                                                 21 July 2024, Hilton Garden Inn, Lucknow
                                            </div>
                                            <div class="link-section text-capitalize">
                                                <a href="https://www.franchiseindia.net/fro-bos/lucknow/" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline text-capitalize">
                                                Hotline: <span>+91 8800638077</span>
                                            </div>
                                        </div>
                                    </div>
</div> 


 <div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.franchiseindia.net/fro-bos/kolkata/" target="_blank">
           <img class="" alt="Franchise Expo Kolkata" src="https://www.franchiseindia.com/images/fro-bos-kolkata.jpg?ver=1"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>Franchise Expo Kolkata</h2>
                                            <div class="eshowtxt">
                                                 27 July 2024, Raajkutir - IHCL SeleQtions, Kolkata
                                            </div>
                                            <div class="link-section text-capitalize">
                                                <a href="https://www.franchiseindia.net/fro-bos/kolkata/" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline text-capitalize">
                                                Hotline: <span>+91 8800638077</span>
                                            </div>
                                        </div>
                                    </div>
</div> 


 <div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.franchiseindia.net/fro/bengaluru/" target="_blank">
           <img class="" alt="FROEXPO Bengaluru" src="https://www.franchiseindia.com/images/fro-expo-bengaluru.jpg"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>FROEXPO Bengaluru</h2>
                                            <div class="eshowtxt">
                                                 31 Aug - 1 Sep 2024, BIEC, Bengaluru, Karnataka
                                            </div>
                                            <div class="link-section  text-capitalize">
                                                <a href="https://www.franchiseindia.net/fro/bengaluru/" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline  text-capitalize">
                                                Hotline: <span>+91 9311254088</span>
                                            </div>
                                        </div>
                                    </div>
</div> 


 <div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.entrepreneurindia.com/" target="_blank">
           <img class="" alt="Entrepreneur 2024" src="https://www.franchiseindia.com/images/entrepreneur-event.jpg"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>Entrepreneur 2024</h2>
                                            <div class="eshowtxt">
                                                 4 September 2024, Bharat Mandapam, Delhi
                                            </div>
                                            <div class="link-section  text-capitalize">
                                                <a href="https://www.entrepreneurindia.com/" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline text-capitalize">
                                                Hotline: <span>+91 7290037182</span>
                                            </div>
                                        </div>
                                    </div>
</div>


 <div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.franchiseindia.net/fro/ahmedabad/" target="_blank">
           <img class="" alt="FROEXPO Ahmedabad" src="https://www.franchiseindia.com/images/fro-expo-ahmedabad.jpg"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>FROEXPO Ahmedabad</h2>
                                            <div class="eshowtxt">
                                                 21-22 September 2024, Mahatma Mandir Convention...
                                            </div>
                                            <div class="link-section  text-capitalize">
                                                <a href="https://www.franchiseindia.net/fro/ahmedabad/" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline text-capitalize">
                                                Hotline: <span>+91 9311254088</span>
                                            </div>
                                        </div>
                                    </div>
</div> 


<div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.restaurantindia.in/congress/" target="_blank">
           <img class="" alt="Indian Restaurant Congress & Awards 2024" src="https://www.franchiseindia.com/images/restaurant-congress.jpg"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>Indian Restaurant Congress & Awards 2024</h2>
                                            <div class="eshowtxt">
                                                 8-9 October 2024, YASHOBHOOMI, (IICC), New Delhi
                                            </div>
                                            <div class="link-section  text-capitalize">
                                                <a href="https://www.restaurantindia.in/congress/" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline text-capitalize">
                                                Hotline: <span>+91 9667698380</span>
                                            </div>
                                        </div>
                                    </div>
</div> 


 <div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.franchiseindia.com/expo/mumbai/" target="_blank">
           <img class="" alt="Franchise India 2024 Mumbai" src="https://www.franchiseindia.com/images/franchise-india-mumbai.jpg"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>Franchise India 2024 Mumbai</h2>
                                            <div class="eshowtxt">
                                                 29-30 November 2024, Jio World Convention Centre
                                            </div>
                                            <div class="link-section  text-capitalize">
                                                <a href="https://www.franchiseindia.com/expo/mumbai/" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline  text-capitalize">
                                                Hotline: <span>+91 9311148342</span>
                                            </div>
                                        </div>
                                    </div>
</div> 


 <div class="swiper-slide">
                                 <div class="eshowblk">
                                        <div class="eshowimg">
                                            <a href="https://www.irec.asia/mumbai/" target="_blank">
           <img class="" alt="IReC 2024" src="https://www.franchiseindia.com/images/irec.jpg?ver=1"></a>
                                        </div>
                                        <div class="eshowcontent">
                                            <h2>IReC 2024</h2>
                                            <div class="eshowtxt">
                                                 29-30 November 2024, Jio World Convention Centre
                                            </div>
                                            <div class="link-section  text-capitalize">
                                                <a href="https://www.irec.asia/mumbai/" target="_blank">Registration</a>
                                            </div>
                                            <div class="eventhotline  text-capitalize">
                                                Hotline: <span>+91 9310438783</span>
                                            </div>
                                        </div>
                                    </div>
</div> 

                          
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <!-- envent end here -->
        </div>
    </div>
</section>