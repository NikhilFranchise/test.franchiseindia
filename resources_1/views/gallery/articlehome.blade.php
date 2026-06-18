@php
use Illuminate\Support\Str;
@endphp
@extends('layout.master')
@section('seoTitle', 'Gallery Articles and Information - Franchise India')
@section('seoDesc',  'Gallery articles - Franchise India')
@section('seoKeywords', ' latest articles, information about Gallery')
@section('content')

    <!-- more article section start here -->
    <div class="container mostpopu arttilist">
        <div class="row">
            <div class="col-xs-12">
                <div class="bordertb">Gallery Articles</div>
            </div>
        </div>
        <div class="row row-no-margin">
            <div class="col-xs-12 col-sm-12 col-md-9 tablwidt  paddingright50">
                <div class="topcat"></div>
                <div class="row mostwnew">
                    @foreach($articles as $article)
                    @if($loop->index == 0)
                    <div class="col-xs-12 col-sm-12 col-md-9 mdfiartimost">
                        <div class="img-txtlayout572">
                            <div class="img-valayout572">
                                <a href="{{Config::get('constants.MainDomain')}}/gallery/{{Str::slug($article->title)}}.{{$article->content_id}}">
                                    <img src="{{$article->image}}" alt="{{ $article['title'] }}" />
                                </a>
                            </div>
                            <span class="text-contentnewlayout">
                                <div class="text-rep-blk572">
                                    <div class="show-an-txt572">
                                        <a href="{{ Config::get('constants.MainDomain') }}/gallery/{{Str::slug($article->title)}}.{{$article['content_id']}}">
                                            @if($article['homeTitle']=='')
                                                {{substr($article['title'],0,50)}}
                                            @else
                                                {{substr($article['homeTitle'],0,50)}}..
                                            @endif
                                        </a>
                                    </div>
                                    <div class="authn572">
                                        @if($article['author'] != '')
                                            By {{$article['author']}}
                                        @endif
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 responwidmost">
                        <div class="headmost">Most Popular</div>
                        @endif
                         @if($loop->index > 0 && $loop->index < 6)
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
                        @endif
                        @if($loop->index == 6)
                    </div>
                </div>
                <div class="borbtmdot"></div>
                        @endif
                @if($loop->index > 5)
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
                                    <a href="{{ Config('constants.MainDomain') }}/gallery/{{Str::slug($article->title)}}.{{$article['content_id']}}">
                                        {{$article['title']}}
                                    </a>
                                </div>
                            @else                        
                                <div class="listhead">
                                    <a href="{{ Config('constants.MainDomain') }}/gallery/{{Str::slug($article->title)}}.{{$article->content_id}}">
                                        {{$article['homeTitle']}}
                                    </a>
                                </div>
                            @endif
                                <div class="listtext">
                                    {{$article['shortDesc']}}                                    
                                </div>
                            <div class="listauthor">By <a>{{$article->author}}</a>
                                <span>
                                    {{substr($article->time,0,-9)}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="borbtmdotarticle"></div>
                    @endif

                    @if($loop->index == 8)
                        @include('includes/mycatbottomarticlelist')
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
