@php
use Illuminate\Support\Str;
@endphp
@extends('layout.master')
@section('seoTitle', ucwords($kicker).' Articles and Information - Franchise India')
@section('seoDesc',  ucwords($kicker).' Articles -  '. $most['shortDesc'])
@section('seoKeywords', $kicker.' latest articles, information about '.$kicker)
@section('content')

    <!-- more article section start here -->
    <div class="container mostpopu arttilist">
        <div class="row">
            <div class="col-xs-12">
                <div class="bordertb">{{$kicker}}</div>
            </div>
        </div>
        <div class="row row-no-margin">
            <div class="col-xs-12 col-sm-12 col-md-9 tablwidt  paddingright50">
                <div class="topcat"></div>
                <div class="row mostwnew">
                    <div class="col-xs-12 col-sm-12 col-md-9 mdfiartimost">
                        <div class="img-txtlayout572">
                            <div class="img-valayout572">
                                <a href="{{Config::get('constants.MainDomain')}}/gallery/{{Str::slug($most->title)}}.{{$most->content_id}}">
                                    <img src="{{$most->image}}" alt="{{ $most['title'] }}" />
                                </a>
                            </div>
                            <span class="text-contentnewlayout">
                                <div class="text-rep-blk572">
                                    <div class="show-an-txt572">
                                        <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($most->title)}}.{{$most['content_id']}}">
                                            @if($most['homeTitle']=='')
                                                {{substr($most['title'],0,50)}}
                                            @else
                                                {{substr($most['homeTitle'],0,50)}}..
                                            @endif
                                        </a>
                                    </div>
                                    <div class="authn572">
                                        @if($most['author'] != '')
                                            By {{$most['author']}}
                                        @endif
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 responwidmost">
                        <div class="headmost">Most Popular</div>
                         @foreach($popularArticles as $article)
                            <div class="smallatcmost">
                                <div class="artbtmtext">
                                    <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($article->title)}}.{{$article['content_id']}}">
                                        @if(empty($article->homeTitle))
                                            {{substr($article['title'],0,50)}}
                                        @else
                                            {{substr($article['homeTitle'],0,50)}}..
                                        @endif
                                    </a>                                    
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="borbtmdot"></div>
                @foreach($articles as $article)
                    <div class="row sec-slide-effect">
                        <div class="col-xs-12 col-sm-4 col-md-4 md1024yw4">
                            <div class="arti271">
                                <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($article->title)}}.{{$article->content_id}}">
                                    <img src="{{$article['image']}}" alt="{{$article['title']}}" />
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8 md1024yw8">
                            <div class="listkick">
                                <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($article->kicker)}}/{{$article['kicker_id']}}">
                                    {{$article->kicker}}
                                </a>
                            </div>
                            @if(empty($article['homeTitle']))
                                <div class="listhead">
                                    <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($article->title)}}.{{$article['content_id']}}">
                                        {{$article['title']}}
                                    </a>
                                </div>
                            @else                        
                                <div class="listhead">
                                    <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($article->title)}}.{{$article->content_id}}">
                                        {{$article['homeTitle']}}
                                    </a>
                                </div>
                            @endif
                                <div class="listtext">
                                    {{$article['shortDesc']}}                                    
                                    @if($article['shortDesc'] == '')
                                        {{strip_tags(substr($article['content'], 0, strpos($article['content'], ' ', 200)))}}..
                                    @endif
                                </div>
                            <div class="listauthor">By <a>{{$article['author']}}</a>
                                <span>
                                    {{substr($article->time,0,-9)}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="borbtmdotarticle"></div>
                    @if($loop->index == 5)
                        <!---->
                        @include('includes/mycatbottomarticlelist')
                        <!---->
                        <div class="borbtmdotarticle"></div>
                    @endif

                    @if($loop->index == 10)                                
                          <div class="contentlistbanner">
                            <div class="fullcontainer">
                              @include("includes.banners.contentgoogle_468X60")
                              @include("includes.banners.contentgoogle_320X100") 
                            </div>
                        </div>
                    <div class="borbtmdotarticle"></div>
                @endif

            @endforeach

            {{ $articles->links() }}
            <!---->
            </div>
            <!--right section start here -->
            <div class="col-xs-12 col-sm-3 hidden-xs hidden-sm hiddcontain col-md-3 row-no-padding">
                <!-- magazine Subscribe code start here -->
                @include('includes.magazinesubscribe')
                <!-- magazine Subscribe code start here -->
                @notmobile
                
                <div class="sidearce"> @include('includes.banners.dfp_600X300') </div>
                {{-- @endif --}}
                @endnotmobile
                <div class="sidearce"> @include('includes.banners.google_300X250') </div>
                <div class="sidearce"> @include('includes.banners.yahoo_300X250') </div>
                <div class="sidearce"> @include('includes.banners.dfp_300X250') </div>
            </div>
            <!--right section end here -->
        </div>
    </div>
@endsection
