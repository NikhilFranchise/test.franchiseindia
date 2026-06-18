<script language="javascript">$(document).ready(function(){$(".rht-menu").hover(function(){$(".avb",$(this).parent()).addClass("hvr")},function(){$(".avb").removeClass("hvr")})});</script>
<div class="cat-lst-lftnew">
    <div class="cat-lst-lft singlehindi">
        <div class="cat-sec">
            <ul class="lft-menu">
                @php
                    $categoryArr = Config('constants.CategoryArr');
                    asort($categoryArr);
                @endphp
                @foreach($categoryArr as $key => $value)
                    <li>
                        <a target="_blank" href="/hi/business-opportunities/{{Config('category.SeoCategoryArr.'.$key)}}.m{{$key}}" class="avb"><div class="cat-{{$loop->index > 8 ? $loop->index+2 : $loop->index+1 }}sprite"></div><span>{{Config('hindiConstants.CategoryArr.'.$key)}}</span></a>
                        <div class="rht-menu">
                            <div class="row">
                                @php
                                    $count = 1;
                                @endphp
                                @foreach(Config('constants.subCategoryArr.'.$key) as $key1 => $value1)
                                    @if ($count%4 == 1) <div class="row"> @endif
                                        <div class="col-xs-12 col-sm-3 col-md-3 sec-pad">
                                            <a target="_blank" href="/hi/business-opportunities/{{Config('category.SeoSubCategoryArr.'.$key1)}}.sc{{$key1}}"><div class="cat-ttl">{{Config('hindiConstants.subCategoryArr.'.$key.'.'.$key1)}}</div></a>
                                            <ul>
                                                @foreach(Config('constants.subSubCategoryArr.'.$key1) as $key2 => $value2)
                                                    @if($loop->index < 4 && in_array($key2, json_decode(\Illuminate\Support\Facades\Storage::getFacadeRoot()->get('ssc.json'), true)))
                                                        <li><a target="_blank" href="/hi/business-opportunities/{{Config('category.SeoSubSubCategoryArr.'.$key2)}}.ssc{{$key2}}">{{Config('hindiConstants.subSubCategoryArr.'.$key1.'.'.$key2)}}</a></li>
                                                    @endif
                                                @endforeach
                                                <div class="view-all"><a target="_blank" href="/hi/business-opportunities/{{Config('category.SeoSubCategoryArr.'.$key1)}}.sc{{$key1}}">व्यू ऑल ></a></div>
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
            <ul class="lft-menu singlehindi">
                <li><a href="/">घरेलू ब्रांड</a></li>
                <li><a href="{{Config('constants.MainDomain')}}/premiumbrand/">प्रीमियम ब्रांड</a></li>
                <li><a href="{{Config('constants.MainDomain')}}/international/">अंतर्राष्ट्रीय ब्रांड</a></li>
            </ul>
        </div>
        <div class="cat-sec bdr-tp">
            <ul class="lft-menu singlehindi">
                <li><a href="{{Config('constants.MainDomain')}}/content/">फ्रैंचाइज़ी इनसाइट्स</a></li>
                <li><a href="https://news.franchiseindia.com/">समाचार</a></li>
                <li><a href="https://video.franchiseindia.com/">वीडियो</a></li>
                <li><a href="{{Config('constants.MainDomain')}}/magazine/">पत्रिका</a></li>
            </ul>
        </div>
        <div class="cat-sec bdr-tp">
            <ul class="lft-menu singlehindi">
                <li><a href="https://www.businessex.com/">मौजूदा व्यवसाय खरीदें / बेचें</a></li>
            </ul>
        </div>
        <div class="cat-sec bdr-tp">
            <ul class="lft-menu singlehindi">
                <li><a href="{{Config('constants.MainDomain')}}/advertise-with-us-payment/">हमारे साथ विज्ञापन</a></li>
                <li><a href="https://master.franchiseindia.com/emagazine/" target="_blank">सदस्यता लें</a></li>
                <li><a href="{{Config('constants.MainDomain')}}/event/">इवेंट </a></li>
            </ul>
        </div>
        <div class="cat-sec bdr-tp homevideo">
            <div class="homevideoheading"><a href="https://www.youtube.com/watch?v=CRnnlMbOEKE" target="_blank">टेक ए टूर</a> </div>
            <a href="https://www.youtube.com/watch?v=CRnnlMbOEKE" target="_blank">
                <div class="ytimg">
                    <div class="overlay"> <img alt="video guide" class="videoico lozad" data-src="{{Config('constants.MainDomain')}}/images/guidevideoicon.png" /></div>
                    <img class="lozad" data-src="https://i.ytimg.com/vi/CRnnlMbOEKE/mqdefault.jpg" alt="youtube video" />
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
                <a href="https://master.franchiseindia.com/emagazine/" target="_blank"><img class="imgmag lozad" data- src="{{URL::asset('images/magazine/small-mag.jpg')}}" alt="small-mag" /></a><div class="sublinks"> <a href="{{Config('constants.MainDomain')}}/advertise/">विज्ञापन दें</a>
                    <a href="https://master.franchiseindia.com/emagazine/" target="_blank">सदस्यता लें</a>
                </div>
            </div>
        </div>
    </div>
    @desktop
    <div class="homesiderbanner">
        <div class="ads160or200">
            @include("includes.banners.google_160x600")
        </div>
    </div>
    @enddesktop
    @tablet
    <div class="homesiderbanner">
        <div class="ads160or200">
            <div class="google_160X600">
                <!-- /1057625/FIHL/Desktop_HP_160x600_Left-->
                <div id='adslot160x600_ATF' style='height:600px; width:160px;'>
                    <script>
                        googletag.cmd.push(function() { googletag.display('adslot160x600_ATF'); });
                    </script>
                </div>
            </div>

        </div>
    </div>
    @endtablet
</div>