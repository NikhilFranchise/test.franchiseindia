<link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700&amp;subset=devanagari,latin-ext" rel="stylesheet">
<style type="text/css">.landing .tab-panel.tabhindi ul li a{font-family:'Hind',sans-serif;font-size:19px;padding:8px 15px 5px;font-weight:400;line-height:17px}.landing .tab-content .lft-pnl .tab-section .tab-sec-topics .tab-sec-topics-desc.brandcontenthindi{font-family:'Hind',sans-serif;font-size:16px;line-height:29px}.landing .tab-content .lft-pnl .tab-section.brandcontenthindi{font-family:'Hind',sans-serif;font-size:16px;line-height:20px}.brandopt2 .landing .tab-panel.tabhindi ul li a,.brandopt3 .landing .tab-panel.tabhindi ul li a{font-family:'Hind',sans-serif;font-size:19px;padding:8px 15px 5px;font-weight:400;line-height:17px}.landing .tab-content .lft-pnl .tab-section.brandcontenthindi .tab-sec-topics .keypoints p{font-family:'Hind',sans-serif;font-size:16px;line-height:20px}.breadcrumb{float:left}.bgrunn .col-md-9.widthf{width:82.5%}.bgrunn .col-md-9.widthf .conh-hind{font-family:'Hind',sans-serif;font-size:16px;line-height:20px;margin-bottom:5px;color:#069;font-weight:200}.bgrunn .col-md-9.widthf .conh-hind a{color:#333;padding-right:2px;text-decoration:underline}.bgrunn .col-md-9.widthf .rigarthindi{padding:2px 8px;background:#333;font-size:12px;color:#fff;float:left;width:65px;height:24px;border-radius:4px;margin-top:3px;text-align:center}.bgrunn .col-md-9.widthf .mainrighthindi{float:right;position:relative}.bgrunn .col-md-9.widthf .contwid{width:200px;z-index:3;position:absolute;display:none;float:left;min-width:160px;padding:0;margin:0;font-size:14px;text-align:left;list-style:none;background-color:#fff;-webkit-background-clip:padding-box;background-clip:padding-box;border:1px solid #dbdbdb;border-radius:4px;-webkit-box-shadow:0 6px 12px rgba(0,0,0,.175);box-shadow:0 6px 12px rgba(0,0,0,.175);left:-122px;top:34px}.bgrunn .col-md-9.widthf .contwid::after{border-left:solid transparent 7px;border-right:solid transparent 6px;border-bottom:solid #fff 6px;top:-6px;content:" ";height:0;right:15%;margin-left:-13px;position:absolute;width:0}.contwid::before{border-left:solid transparent 7px;border-right:solid transparent 6px;top:-7px;content:" ";height:0;right:15%;margin-left:-13px;position:absolute;width:0}.bgrunn .col-md-9.widthf .contwid .linkdrop a{font-size:15px;font-family:"Open Sans Regular","serif";text-transform:uppercase;padding:10px;display:block;color:#333;margin:0}.bgrunn .col-md-9.widthf .contwid .linkdrop a:hover{background:#f3f3f3;color:#333}#changeLang{cursor:pointer}@media only screen and (min-width:320px) and (max-width:767px){.landing .tab-panel.tabhindi ul li a,.brandopt2 .landing .tab-panel.tabhindi ul li a,.brandopt3 .landing .tab-panel.tabhindi ul li a{font-size:13px}.bgrunn .col-md-9.widthf{width:96%;height:35px}.bgrunn{display:block}.business-cat-menu{display:none}.breadcrumb{display:none}.bgrunn .col-md-9.widthf .rigarthindi{margin-top:5px}}@media only screen and (min-width:320px) and (max-width:359px){.landing .tab-panel.tabhindi ul li a,.brandopt2 .landing .tab-panel.tabhindi ul li a,.brandopt3 .landing .tab-panel.tabhindi ul li a{font-size:12px;padding:8px 13px 5px}}@media only screen and (min-width:768px) and (max-width:1023px){.bgrunn .col-md-9.widthf{77%}.landing .tab-panel.tabhindi ul li a,.brandopt2 .landing .tab-panel.tabhindi ul li a,.brandopt3 .landing .tab-panel.tabhindi ul li a{font-size:12px}}@media only screen and (min-width:1024px) and (max-width:1199px){.bgrunn .col-md-9.widthf{77%}}</style>

<div class="row bgrunn">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="row pos-rm">
                    <div class="business-cat-menu">
                        <a class="businessCat" href="../business-opportunities/all/all">
                            Business Categories <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="cat-list">
                            <ul class="lft-menu">
                                @php
                                    $categoryArr = Config('constants.CategoryArr');
                                    asort($categoryArr);
                                @endphp
                                @foreach($categoryArr as $key => $value)
                                    <li>
                                        <a href="/business-opportunities/{{Config('category.SeoCategoryArr.'.$key)}}.m{{$key}}" class="avb"><div class="cat-{{ $loop->index+1 }}sprite"></div><span>{{$value}}</span></a>
                                        <div class="rht-menu">
                                            <div class="row">
                                              
                                                @php
                                                    $count = 1;
                                                @endphp
                                    
                                                @foreach(\Illuminate\Support\Facades\Config::get('constants.subCategoryArr.'.$key) as $key1 => $value1)
                                                 @if ($count % 4 == 1) <div class="row"> @endif
                                                        <div class="col-xs-12 col-sm-3 col-md-3 sec-pad">
                                                            <a href="/business-opportunities/{{\Illuminate\Support\Facades\Config::get('category.SeoSubCategoryArr.'.$key1)}}.sc{{$key1}}">
                                                                <div class="cat-ttl">{{$value1}}</div>
                                                            </a>
                                                            <ul>
                                                                @foreach(\Illuminate\Support\Facades\Config::get('constants.subSubCategoryArr.'.$key1) as $key2 => $value2)
                                                                    @php
                                                                        $sscJson = \Illuminate\Support\Facades\Storage::get('ssc.json');
                                                                        $sscArray = json_decode($sscJson, true) ?? [];
                                                                    @endphp
                                                                    @if($loop->index < 4 && in_array($key2, $sscArray))
                                                                        <li><a href="/business-opportunities/{{\Illuminate\Support\Facades\Config::get('category.SeoSubSubCategoryArr.'.$key2)}}.ssc{{$key2}}">{{$value2}}</a></li>
                                                                    @endif
                                                                @endforeach
                                                                <div class="view-all"><a href="/business-opportunities/{{\Illuminate\Support\Facades\Config::get('category.SeoSubCategoryArr.'.$key1)}}.sc{{$key1}}">View All ></a></div>
                                                            </ul>
                                                        </div>
                                                        @if ($count % 4 == 0) </div> @endif
                                                        @php $count++; @endphp
                                                @endforeach
                                                @if ($count%4 != 1) </div> @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-9 widthf">
                        <ol class="breadcrumb">
                            <li><a href="{{ Config('constants.MainDomain') }}">Home</a></li>
                            <li><a href="https://www.franchiseindia.com/business-opportunities/all/all">Business Opportunities</a></li>
                            <li class="active"><h2>{{$franDetails->company_name}}</h2></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>