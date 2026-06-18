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
    <!--                 <li data-target="#topslidernew" data-slide-to="2"></li>	 
                    <li data-target="#topslidernew" data-slide-to="3"></li> 
                 									 -->
                    </ol>
                    
                        <div class="carousel-inner" role="listbox">

                          
                         <!--   <div class="item active"><a href="https://www.globalfranchiseforum.com/franchise-investment-conclave/"
                             target="_blank"><img class="lozad" data-src="https://www.franchiseindia.com/images/tbo/fic.jpg" alt="#" /></a></div>

                             <div class="item"><a href="https://www.franglobal.com/scale-up/"
                             target="_blank"><img class="lozad" data-src="https://www.franchiseindia.com/images/tbo/scale-up.jpeg" alt="#" /></a></div> -->

                             <div class="item active"><a href="https://www.franchiseindia.in/franchise-business-opportunity/"
                             target="_blank"><img class="lozad" data-src="https://www.franchiseindia.com/images/tbo/start-business.jpg" alt="#" /></a></div>

                             
                             <div class="item"><a href="https://franchiseindiaevents.com/webinars/"
                             target="_blank"><img class="lozad" data-src="https://www.franchiseindia.com/images/tbo/img.jpg" 
                             alt="#" /></a></div>
               							 
 						 

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
                                <a href="https://www.franchiseindia.com/brands/direct-english.78387" target="_blank"><img class="lozad" data-src="{{ url('https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/direct-english_1.png') }}" alt="Direct English"></a>
                                <a href="https://www.franchiseindia.com/brands/direct-english.78387" target="_blank">
                                    <div class="tbo-info">
                                        <span>Direct English</span>
                                        Direct English is a world's leading UK-based English training provider
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
                                <a href="https://www.franchiseindia.com/brands/cravy-for-crispy-chicken.101557" target="_blank"><img class="lozad" data-src="{{ url('https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/cravy-for-crispy-chicken_1.png') }}" alt="Cravy for Crispy Chicken"></a>
                                <a href="https://www.franchiseindia.com/brands/cravy-for-crispy-chicken.101557" target="_blank">
                                    <div class="tbo-info">
                                        <span>Cravy for Crispy Chicken</span>
                                        Cravy for Crispy Chicken a Korean-inspired crispy chicken brand.
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
                                <a href="https://www.franchiseindia.com/brands/bagelstein.99562" target="_blank"><img class="lozad" data-src="{{ url('https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bagelstein_1.gif') }}" alt="BAGELSTEIN"></a>
                                <a href="https://www.franchiseindia.com/brands/bagelstein.99562" target="_blank">
                                    <div class="tbo-info">
                                        <span>BAGELSTEIN</span>
                                        Bagelstein, a French bagel chain, has carved a niche in the European market
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
                                <a href="https://www.franchiseindia.com/brands/smoothie-factory.40897" target="_blank"><img class="lozad" data-src="{{ url('https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/smoothie-factory_1.jpg') }}" alt="Smoothie Factory"></a>
                                <a href="https://www.franchiseindia.com/brands/smoothie-factory.40897" target="_blank">
                                    <div class="tbo-info">
                                        <span>Smoothie Factory</span>
                                        Smoothie Factory is an established, popular, and fast growing retailer of real fruit smoothies
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