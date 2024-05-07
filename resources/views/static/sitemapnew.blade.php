@extends('layout.master')
@section('content')
    <style type="text/css">.margintop60.modtop{margin-top:40px;margin-bottom:0}.yearhead{font-family:"Open Sans Semibold","serif";font-size:20px;line-height:20px;margin-bottom:10px}ul.yearartielist{margin-left:20px;margin-bottom:30px}ul.yearartielist a{font-family:"Open Sans Light","serif";font-size:14px;line-height:18px;color:#333}ul.yearartielist a span{font-family:"Open Sans Semibold","serif"}ul.yearartielist a:hover{color:#069}.sitesubhead{font-family:"Open Sans Semibold","serif";font-size:25px;line-height:25px;margin-bottom:20px;margin-top:10px;clear:both}.sitemapblksect{clear:both}.sitemapblksect ul.nav-tabs{border-bottom:0;text-align:left;margin-top:30px;margin-bottom:30px;margin-left:0}.sitemapblksect .nav-tabs>li{margin-right:5px;display:inline-block;float:none}.sitemapblksect .nav-tabs>li>a{background:#fff;border:1px solid #d4d4d4;font-family:"Open Sans Regular","serif";font-size:14px;color:#333;line-height:20px;border-radius:4px;padding:10px 31px}.sitemapblksect .tagarticle.nav-tabs>li.active>a,.sitemapblksect .tagarticle.nav-tabs>li.active>a:focus,.sitemapblksect .tagarticle.nav-tabs>li.active>a:hover{background:#333;border:1px solid #333;color:#fff}.sitemapcatsection ul.cat-home-list{border-bottom:0}.sitemapcatsection ul.cat-home-list li.fulldisplay,.sitemapsection ul.cat-home-list li.fulldisplay:hover{float:none;display:block;width:auto;background:#f3f3f3;clear:both;overflow:hidden;height:auto;padding-bottom:40px;padding-left:20px;padding-right:20px}.sitemapcatsection ul.cat-home-list li{height:180px}.sitemapcatsection .nav>li>a{margin:0;border-radius:0;height:178px;border:0 solid #ddd;display:block;padding:25px 0 0}.sitemapcatsection .nav-tabs>li.active>a,.sitemapsection .nav-tabs>li.active>a:focus,.sitemapsection .nav-tabs>li.active>a:hover{background:#f3f3f3;border:0}.sitemapcatsection ul.cat-home-list li{padding:0}.sitemapcatsection .nav>li>a:focus,.sitemapcatsection .nav>li>a:hover{background:#f3f3f3!important}.sitemapcatsection ul.cat-home-list li.fulldisplay ul{display:block;text-align:left}.sitemapcatsection ul.cat-home-list li.fulldisplay .cat-ttl{font-family:'Open Sans Semibold','serif';color:#333;padding-bottom:10px;text-transform:capitalize;font-size:20px;line-height:22px}.sitemapcatsection ul.cat-home-list li.fulldisplay .sec-pad{padding:30px 0 0 20px;text-align:left}.sitemapcatsection ul.cat-home-list li.fulldisplay ul li{display:block;border:0;float:none;height:auto;width:100%;text-align:left}.sitemapcatsection ul.cat-home-list li.fulldisplay ul li a{font-size:14px;font-family:'Open Sans Light','serif';line-height:20px;color:#666}.sitemobhide{clear:both}@media only screen and (min-width:1px) and (max-width:767px){.sitemobhide{display:none}.sitemapblksect .nav-tabs>li>a{width:97px;padding:10px 0;text-align:center}.sitemapblksect .nav-tabs>li{margin-bottom:10px}.sitemapblksect{border:1px solid #dfdfdf}.sitemapblksect ul.nav-tabs{background:#f3f3f3;margin-bottom:0;border:0 solid #dfdfdf;padding-top:10px;padding-left:8px;margin-top:0;text-align:center}ul.yearartielist{margin-left:10px}.sitemapblksect .tab-content{margin-top:20px;margin-bottom:20px;margin-left:5px}.sitemapcatsection ul.cat-home-list li{margin-bottom:4px}.sitemapcatsection ul.cat-home-list li{height:140px}.sitemapcatsection .nav>li>a{padding-top:10px;height:138px}}@media only screen and (min-width:320px) and (max-width:359px){.sitemapblksect .nav-tabs>li>a{width:83px}}@media only screen and (min-width:768px) and (max-width:1023px){.sitemapcatsection ul.cat-home-list li{height:150px;width:16.37%}.sitemapcatsection .nav>li>a{height:148px;padding-top:15px}.sitemapblksect .nav-tabs>li>a{padding:10px 17px;font-size:12px}}@media only screen and (min-width:1024px) and (max-width:1199px){.sitemapcatsection ul.cat-home-list li.fulldisplay,.sitemapsection ul.cat-home-list li.fulldisplay:hover{width:98.7%}.sitemapblksect .nav-tabs>li>a{padding:10px 27px}}</style>
    <div class="container margintop60 modtop staicp"><h1>Sitemap</h1></div>
    @php
        $categArr = Config('constants.CategoryArr');
        asort($categArr);
        $catImages = [
        '8' => ['https://www.franchiseindia.com/images/automotivenew.png', 'Automotive'],
        '1' => ['https://www.franchiseindia.com/images/beautynew.png', 'Beauty'],
        '6' => ['https://www.franchiseindia.com/images/businessnew.png', 'Business'],
        '5' => ['https://www.franchiseindia.com/images/dealersnew.png', 'Dealers'],
        '3' => ['https://www.franchiseindia.com/images/educationnew.png', 'Education'],
        '10' => ['https://www.franchiseindia.com/images/fashionnew.png', 'Fashion'],
        '2' => ['https://www.franchiseindia.com/images/foodnew.png', 'Food'],
        '7' => ['https://www.franchiseindia.com/images/homebasednew.png', 'Homebased'],
        '263' => ['https://www.franchiseindia.com/images/hotelsnew.png', 'Hotels'],
        '573' => ['https://www.franchiseindia.com/images/manufacturingnew.png', 'Industrial'],
        '9' => ['https://www.franchiseindia.com/images/retailnew.png', 'Retail'],
        '11' => ['https://www.franchiseindia.com/images/entertainmentnew.png', 'Sports']
        ];
    @endphp
    <div class="container sitemapsection">
        <div class="sitesubhead">Business Categories</div>
        <div class="sitemapcatsection">
            <ul class="row nav nav-tabs cat-home-list" id="searchbycharacter">
                @foreach($catImages as $key => $value)
                    @if($loop->index <=5)
                        <li class="col-xs-12 col-sm-2 col-md-2 @if($loop->index == 0) active @endif" id="main{{$loop->index +1}}" onclick="appendOne(this.id)">
                            <a data-toggle="tab" href="#{{ $value[1] }}">
                                <img src="{{ $value[0] }}" alt="{{ $categArr[$key] }}"><span>{{ $categArr[$key] }}</span>

                            </a>
                        </li>
                    @endif
                @endforeach
                <li class="col-xs-12 col-sm-12 col-md-12 fulldisplay" id="changeAcMobile">
                    <div class="tab-content">
                        @foreach($categArr as $indexMainCat => $mainCat)
                            <div id="{{ $catImages[$indexMainCat][1] }}" class="tab-pane fade in @if($loop->index == 0) active @endif">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row">
                                            @foreach (Config('constants.subCategoryArr.'.$indexMainCat) as $subCatIndex => $subCat)
                                                <div class="col-xs-12 col-sm-3 col-md-3 sec-pad">
                                                    <a href="{{Config('constants.MainDomain').'/business-opportunities/'.Config('category.SeoSubCategoryArr.'.$subCatIndex).'.sc'.$subCatIndex}}"><div class="cat-ttl">{{ $subCat }}</div></a>
                                                    <ul>
                                                        @foreach (Config('constants.subSubCategoryArr.'.$subCatIndex) as $subSubCatIndex => $subSubCat)
                                                            <li><a href="{{Config('constants.MainDomain').'/business-opportunities/'.Config('category.SeoSubSubCategoryArr.'.$subSubCatIndex).'.ssc'.$subSubCatIndex}}">{{ $subSubCat }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @if(($loop->index+1)%4 == 0) <br class="sitemobhide"/> @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </li>
                @foreach($catImages as $key => $value)
                    @if($loop->index > 5)
                        <li class="col-xs-12 col-sm-2 col-md-2" id="main{{$loop->index +1}}" onclick="appendOne(this.id)">
                            <a data-toggle="tab" href="#{{ $value[1] }}">
                                <img src="{{ $value[0] }}" alt="{{ $value[0] }}"><span>{{ $value[1] }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="clearfix"></div>
        <div class="sitesubhead">By Years</div>
        <div class="row">
            @foreach($years as $year)
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="yearhead">{{ $year }}</div>
                    <ul class="yearartielist">
                        @for($i = 1; $i <=12; $i++) <li>
                            @if(isset($allData[$year."-0".$i]) || isset($allData[$year."-".$i]))
                                <a href="{{ Config('constants.MainDomain') }}/sitemap/content/{{ $year }}/{{date('F', mktime(0,0,0,$i, 1, date('Y')))}}">
                                    {{date('F', mktime(0,0,0,$i, 1, date('Y')))}}
                                    <span>
                                        @if(isset($allData[$year."-0".$i]))
                                            ( {{ count($allData[$year."-0".$i]) }} )
                                        @elseif(isset($allData[$year."-".$i]))
                                            ( {{ count($allData[$year."-".$i]) }} )
                                        @else
                                            {{ "( 0 )"}}
                                        @endif
                                    </span>
                                </a>
                            @endif
                        </li>
                        @endfor
                    </ul>
                </div>
            @endforeach
        </div>
        <div class="sitesubhead">By Tags</div>
        <div class="sitemapblksect">
            <ul class="nav nav-tabs tagarticle" role="tablist">
                @foreach($alphabeticalKickers as $key => $value)
                    <li role="presentation" @if($loop->index == 0) class="active" @endif><a role="tab" data-toggle="tab" href="#{{ $key }}">{{ strtoupper(substr($key,0,1))." to ".strtoupper(substr($key,3)) }}</a></li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach($alphabeticalKickers as $key => $value)
                    <div id="{{ $key }}" role="tabpanel" class="tab-pane fade in @if($loop->index == 0) active @endif">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <ul class="yearartielist">
                                    @foreach($alphabeticalKickers[$key][0] as $kicker)
                                        @if($loop->index == (round(count($alphabeticalKickers[$key][0])/4) + 1) || $loop->index == (round(count($alphabeticalKickers[$key][0])/2) + 1 ) || $loop->index == (round((count($alphabeticalKickers[$key][0])*3)/4) + 1 ) )
                                            <div class="col-xs-12 col-sm-4 col-md-3">
                                                <ul class="yearartielist">
                                                    @endif
                                                    <li><a href="{{ Config('constants.MainDomain') }}/content/{{ str_slug($kicker['kicker'])}}">{{$kicker['kicker']}} <span>({{$kicker['count']}})</span></a></li>
                                                    @if( $loop->index == (round(count($alphabeticalKickers[$key][0])/4)) || $loop->index == (round(count($alphabeticalKickers[$key][0])/2) ) || $loop->index == round((count($alphabeticalKickers[$key][0]) *3) / 4) )
                                                </ul>
                                            </div>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="height40"></div>
    <script type="text/javascript">/*<![CDATA[*/$(document).ready(function(){if(screen.width<=767){$("#main1").after($("#changeAcMobile"))}});if(screen.width<=767){function appendOne(a){$("#"+a).after($("#changeAcMobile"))}}/*]]>*/</script>
@endsection