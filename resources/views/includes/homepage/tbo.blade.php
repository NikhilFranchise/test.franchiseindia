<div class="brand-lst-sec">
    @php
        $pageType = (request()->segment(1) == 'premiumbrand' || request()->segment(2) == 'premiumbrand') ? 2 : 1;
    @endphp
    <div class="bdy pad0">
        <div class="topbackbg">

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 gallimg">
                    <div class="backheadtbo">@if(request()->segment(1) == 'hi')
                            <h1 class='ttl singlehindi'> आने वाले कार्यक्रम</h1>
                        @else
                            <h1 class='ttl'>Upcoming Live Events</h1>
                        @endif</div>
                    <div id="topslidernew" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">
                    <li data-target="#topslidernew" data-slide-to="0" class="active"></li>
                    <li data-target="#topslidernew" data-slide-to="1"></li> 
                    <li data-target="#topslidernew" data-slide-to="2"></li>	 
                 									
                    </ol>
                    
                        <div class="carousel-inner" role="listbox">

                          
                           <!--  <div class="item active"><a href="https://www.franchiseindia.in/bharat-franchise-show"
                             target="_blank"><img class="lozad" data-src="https://www.franchiseindia.com/images/tbo/bfs-banner.jpg" 
                             alt="#" /></a></div> -->

                             <div class="item active"><a href="https://www.franglobal.com/franglobal-scale-up-dubai/"
                             target="_blank"><img class="lozad" data-src="https://www.franchiseindia.com/images/tbo/scale-up-dubai.jpg" alt="#" /></a></div>

                             <div class="item"><a href="https://www.franchiseindia.in/franchise-business-opportunity/"
                             target="_blank"><img class="lozad" data-src="https://www.franchiseindia.com/images/tbo/start-business.jpg" alt="#" /></a></div>

                             
                             <div class="item"><a href="https://franchiseindiaevents.com/webinars/"
                             target="_blank"><img class="lozad" data-src="https://www.franchiseindia.com/images/tbo/img.jpg" 
                             alt="#" /></a></div>
               							 
 						 

       <!--          <div class="item">
                    <a href="http://www.franchiseindiaevents.com/webinars/?bid=QmFubmVy"
                             target="_blank"><img class="lozad" data-src="https://www.franchiseindia.com/images/tbo/webinars.jpeg" 
                             alt="Top Business Opportunities" /></a></div> -->


                            @foreach($brands->where('brand_section', 1)->where('page_type', $pageType)->sortByDesc("weightage")->take(10) as $logoDetail)
                                @php
                                    $brandUrl = Config('constants.MainDomain').$logoDetail['brand_link'];
                                    if(isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans))
                                    $brandUrl = Config('constants.MainDomain').'/hi'.$logoDetail['brand_link'];
                                    $brandUrl = $brandUrl."?tracking_google_url=1";
                                @endphp
                                {{--<div class="item @if($loop->first) active @endif">--}}
                            <!--     <div class="item">
                                    <a href="{{ $brandUrl }}" target="_blank">
                                        <img class="lozad" data-src="{{ $logoDetail['brand_img'] }}" alt="Top Business Opportunities" />
                                    </a>
                                </div> -->
                            @endforeach
                        </div>
                        <a class="left carousel-control" href="#topslidernew" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        </a>
                        <a class="right carousel-control" href="#topslidernew" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 tobsec">

                    <div class="backheadtbo"><h1 class="ttl">TOP BUSINESS OPPORTUNITIES</h1>
                    </div>
                    <div class="row lth">
                        @foreach ($brands->where('brand_section', 2)->where('page_type', $pageType)->take(4)->shuffle() as $logoDetail)
                            @php
                                $brandUrl = Config('constants.MainDomain').$logoDetail['brand_link'];
                                if(isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans))
                                $brandUrl = Config('constants.MainDomain').'/hi'.$logoDetail['brand_link'];
                            @endphp
                            <div class="col-xs-6 col-sm-6 col-md-6 mobpadd">
                                <div class="logo-list">
                                    <div class="logrel">
                                        <div class="img-ver">
                                            <a href="{{ $brandUrl }}" target="_blank">
                                                <img class="lozad" data-src="{{$logoDetail['brand_img']}}" alt="{{$logoDetail['brand_alt']}}"/>
                                            </a>
                                            <a href="{{ $brandUrl }}" target="_blank">
                                                <div class="tbo-info">
                                                    <span>{{$logoDetail['brand_heading']}}</span>
                                                    {{$logoDetail['brand_desc']}}
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @if(!( request()->segment(1) == 'premiumbrand' || request()->segment(2) == 'premiumbrand'))
            <div class="topbackbg margintop10">
                <div class="backheadtbo">
                    @if(request()->segment(1) == 'hi')
                        <div class="ttl backt singlehindi">सर्वश्रेष्ठ बिज़नेस के अवसर</div>
                    @else
                        <div class="ttl backt">Best Franchise Opportunities</div>
                    @endif
                </div>
                @php
                    $brandLogo3 = $brands->where('brand_section', 3)->where('page_type', $pageType)->take(8)->shuffle();
                @endphp
                <div class="row lth mobft">
                    @foreach($brandLogo3 as $logoDetail)
                        @php
                            $brandUrl = Config('constants.MainDomain').$logoDetail['brand_link'];
                            if(isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans))
                            $brandUrl = Config('constants.MainDomain').'/hi'.$logoDetail['brand_link'];
                        @endphp
                        @if($loop->index < 4)
                            <div class="col-xs-6 col-sm-3 col-md-3 mobpadd">
                                <div class="logo-list">
                                    <div class="logrel">
                                        <div class="img-ver">
                                            <a href="{{ $brandUrl }}" target="_blank"><img class="lozad" data-src="{{$logoDetail['brand_img']}}" alt="{{$logoDetail['brand_desc']}}" /></a>
                                            <a href="{{ $brandUrl }}" target="_blank">
                                                <div class="tbo-info">
                                                    <span>{{$logoDetail['brand_heading']}}</span>
                                                    {{$logoDetail['brand_desc']}}
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="row lth mobft">
                    @foreach($brandLogo3 as $logoDetail)
                        @php
                            $brandUrl = Config('constants.MainDomain').$logoDetail['brand_link'];
                            if(isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans))
                            $brandUrl = Config('constants.MainDomain').'/hi'.$logoDetail['brand_link'];
                        @endphp
                        @if($loop->index > 3)
                            <div class="col-xs-6 col-sm-3 col-md-3 mobpadd">
                                <div class="logo-list">
                                    <div class="logrel">
                                        <div class="img-ver">
                                            <a href="{{ $brandUrl }}" target="_blank"><img alt="{{$logoDetail['brand_desc']}}" class="lozad" data-src="{{$logoDetail['brand_img']}}"></a>
                                            <a href="{{ $brandUrl }}" target="_blank">
                                                <div class="tbo-info">
                                                    <span>{{$logoDetail['brand_heading']}}</span>
                                                    {{$logoDetail['brand_desc']}}
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
        <div class="topbackbg backcolchnage">
            <div class="backheadtbo">
                @if(Request::segment(1) == 'hi')
                    <div class="ttl singlehindi">शीर्ष अंतर्राष्ट्रीय अवसर</div>
                @else
                    <div class="ttl">Top International Opportunities</div>
                @endif
            </div>
            <div class="row lth mobft">
                <div class="col-xs-6 col-sm-3 col-md-3 mobpadd">
                    <div class="logo-list">
                        <div class="logrel">
                            <div class="img-ver">
                                <a href="https://www.franchiseindia.com/brands/red-schoolhouse.78785" target="_blank"><img class="lozad" data-src="{{ url('https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/red-schoolhouse_2.gif') }}" alt="RED SchoolHouse"></a>
                                <a href="https://www.franchiseindia.com/brands/red-schoolhouse.78785" target="_blank">
                                    <div class="tbo-info">
                                        <span>RED SchoolHouse</span>
                                        Red SchoolHouse is a multi-award-winning pre-school
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 mobpadd">
                    <div class="logo-list">
                        <div class="logrel">
                            <div class="img-ver">
                                <a href="https://www.franchiseindia.com/brands/quality-mind.75410" target="_blank"><img class="lozad" data-src="{{ url('https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/quality-mind_3.jpg') }}" alt="Quality Mind Global"></a>
                                <a href="https://www.franchiseindia.com/brands/quality-mind.75410" target="_blank">
                                    <div class="tbo-info">
                                        <span>Quality Mind Global</span>
                                        Quality Mind is a global leader in the mental wellness industry
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 mobpadd">
                    <div class="logo-list">
                        <div class="logrel">
                            <div class="img-ver">
                                <a href="https://www.franchiseindia.com/brands/bricks-4-kidz.79119" target="_blank"><img class="lozad" data-src="{{ url('https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bricks-4-kidz_1.png') }}" alt="Bricks 4 Kidz"></a>
                                <a href="https://www.franchiseindia.com/brands/bricks-4-kidz.79119" target="_blank">
                                    <div class="tbo-info">
                                        <span>Bricks 4 Kidz</span>
                                        Bricks 4 Kidz is the largest provider of STEM-based child
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 mobpadd">
                    <div class="logo-list">
                        <div class="logrel">
                            <div class="img-ver">
                                <a href="https://www.franglobal.com/engage-and-grow/" target="_blank"><img class="lozad" data-src="{{ url('/franchiseinternational/images/banners/homepage/engage_199x81.png') }}" alt="spice box"></a>
                                <a href="https://www.franglobal.com/engage-and-grow/" target="_blank">
                                    <div class="tbo-info">
                                        <span> Enage & Grow</span>
                                        Become A Certified Engage & Grow Franchise in your Region & Grow Your Business
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="topbackbg">
            <div class="backheadtbo"><div class="ttl backt">Top Franchise Opportunities</div></div>
            <div class="row lth">
                @foreach ($brands->where('brand_section', 4)->where('page_type', $pageType)->take(24)->shuffle() as $logoDetail)
                    @php
                        $brandUrl = Config('constants.MainDomain').$logoDetail['brand_link'];
                        if(isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans))
                        $brandUrl = Config('constants.MainDomain').'/hi'.$logoDetail['brand_link'];
                    @endphp
                    <div class="col-xs-6 col-sm-3 col-md-3 mobpadd">
                        <div class="logo-list">
                            <div class="logrel sm">
                                <div class="img-ver">
                                    <a href="{{ $brandUrl }}" target="_blank"><img class="lozad" data-src="{{$logoDetail['brand_img']}}" alt="{{$logoDetail['brand_alt']}}"/></a>
                                    <a href="{{ $brandUrl }}" target="_blank">
                                        <div class="tbo-info">
                                            <span>{{$logoDetail['brand_heading']}}</span>
                                            {{ (request()->segment(1) == 'hi') ? "निवेश" : "Investment" }} : {{$logoDetail['investment_range']}}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>