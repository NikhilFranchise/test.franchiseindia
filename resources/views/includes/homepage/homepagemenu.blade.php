<script language="javascript">$(document).ready(function(){$(".rht-menu").hover(function(){$(".avb",$(this).parent()).addClass("hvr")},function(){$(".avb").removeClass("hvr")})});</script>
<div class="cat-lst-lftnew">
    <div class="cat-lst-lft">
        <div class="cat-sec">
            <ul class="lft-menu">
                @php
                    $categoryArr = Config('constants.CategoryArr');
                    asort($categoryArr);
                @endphp
                @foreach($categoryArr as $key => $value)
                    <li>
                        <a target="_blank" href="/business-opportunities/{{Config('category.SeoCategoryArr.'.$key)}}.m{{$key}}" class="avb"><div class="cat-{{$loop->index > 8 ? $loop->index+2 : $loop->index+1 }}sprite"></div><span>{{$value}}</span></a>
                        <div class="rht-menu">
                            <div class="row">
                                @php
                                    $count = 1;
                                @endphp
                                @foreach(Config('constants.subCategoryArr.'.$key) as $key1 => $value1)
                                    @if ($count%4 == 1) <div class="row"> @endif
                                    <div class="col-xs-12 col-sm-3 col-md-3 sec-pad">
                                        <a target="_blank" href="/business-opportunities/{{Config('category.SeoSubCategoryArr.'.$key1)}}.sc{{$key1}}"><div class="cat-ttl">{{$value1}}</div></a>
                                        <ul>
                                            @foreach(Config('constants.subSubCategoryArr.'.$key1) as $key2 => $value2)
                                                @if($loop->index < 4 && in_array($key2, json_decode(\Illuminate\Support\Facades\Storage::getFacadeRoot()->get('ssc.json'), true)))
                                                    <li><a target="_blank" href="/business-opportunities/{{Config('category.SeoSubSubCategoryArr.'.$key2)}}.ssc{{$key2}}">{{$value2}}</a></li>
                                                @endif
                                            @endforeach
                                            <div class="view-all"><a target="_blank" href="/business-opportunities/{{Config('category.SeoSubCategoryArr.'.$key1)}}.sc{{$key1}}">View All ></a></div>
                                        </ul>
                                    </div>
                                    @if ($count%4 == 0) </div> @endif
                                    @php $count++; @endphp
                                @endforeach
                            @if ($count%4 != 1) </div> @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="cat-sec bdr-tp">
            <ul class="lft-menu">
                <li><a target="_blank" href="/">Domestic Brands</a></li>
                <li><a target="_blank" href="{{ url('premiumbrand') }}">Premium Brands</a></li>
                <li><a target="_blank" href="{{ url('international') }}">International Brands</a></li>
            </ul>
        </div>
        <div class="cat-sec bdr-tp">
            <ul class="lft-menu">
                <li><a target="_blank" href="{{ url('content') }}">Franchise Insights</a></li>
                <li><a target="_blank" href="https://news.franchiseindia.com/">News</a></li>
                <li><a target="_blank" href="https://video.franchiseindia.com/">Video</a></li>
                <li><a target="_blank" href="{{ url('magazine') }}">Magazine</a></li>
            </ul>
        </div>
        <div class="cat-sec bdr-tp">
            <ul class="lft-menu">
                <li><a target="_blank" href="https://www.businessex.com/">Buy/Sell Existing Business</a></li>
            </ul>
        </div>
        <div class="cat-sec bdr-tp">
            <ul class="lft-menu">
                <li><a target="_blank" href="{{ url('advertise-with-us-payment') }}">Advertise With us</a></li>
                <li><a href="https://master.franchiseindia.com/emagazine/" target="_blank">Subscribe</a></li>
                <li><a target="_blank" href="{{ url('event') }}">Event</a></li>
            </ul>
        </div>
        <div class="cat-sec bdr-tp homevideo">
            <div class="homevideoheading"><a href="https://www.youtube.com/watch?v=CRnnlMbOEKE" target="_blank">Take a tour</a> </div>
            <a href="https://www.youtube.com/watch?v=CRnnlMbOEKE" target="_blank">
                <div class="ytimg">
                    <div class="overlay"> <img class="videoico lozad" data-src="/images/guidevideoicon.png" alt="guide video icon" /></div>
                    <img alt="youtube icon" class="lozad" data-src="https://i.ytimg.com/vi/CRnnlMbOEKE/mqdefault.jpg">
                </div>
            </a>
        </div>
        <div class="cat-sec bdr-tp">
            <ul class="social">
                <li><a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="http://www.youtube.com/user/FranchiseIndia" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                <li><a href="https://www.instagram.com/franchiseindia_/" target="_blank"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
        <div class="cat-sec bdr-tp">
            <div class="magsec">
                <a href="https://master.franchiseindia.com/emagazine/" target="_blank"><img alt="small magazine" class="imgmag lozad" data-src="{{url('images/magazine/small-mag.jpg')}}"></a>
                <div class="sublinks">
                    <a href="{{ url('advertise') }}">Advertise</a>
                    <a href="https://master.franchiseindia.com/emagazine/" target="_blank">Subscribe</a>
                </div>
            </div>
        </div>
    </div>
    @desktop
    <div class="homesiderbanner">
        <div class="ads160or200">
            @include("includes.banners-new.HP_DSK_ATF_160x600")
        </div>
    </div>
    @enddesktop
    @tablet
    <div class="homesiderbanner">
        <div class="ads160or200">
            @include("includes.banners-new.HP_TB_ATF_160x600")
        </div>
    </div>
    @endtablet
</div>
