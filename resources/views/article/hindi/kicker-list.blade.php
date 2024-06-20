@extends('layout-hindi.master')
@section('seoTitle', ucwords($kicker->name).' Articles and Information - Franchise India')
@section('seoDesc',  ucwords($kicker->name).' Articles -  ')
@section('seoKeywords', $kicker->name.' latest articles, information about '.$kicker->name)
@section('canonicalUrl', Config('constants.MainDomain').'/hi/content/'.$kicker->name.'/'.$kicker->tag_id)
@section('hindibrandUrls')
    <link href="{{ str_replace('/hi/', '/amp/hi/', Config('constants.MainDomain').'/hi/content/'.$kicker->name.'/'.$kicker->tag_id) }}" rel="amphtml">
@endsection
@section('content')

    <style>
        .contentlistbanner .fullcontainer .dfp_728X90 {display: block;}
        .contentlistbanner .fullcontainer .dfp_cat_320X100 { display: none;}

        @media only screen and (min-width:1px) and (max-width:479px){
            .contentlistbanner .fullcontainer .dfp_728X90 { display: none;}
            .contentlistbanner .fullcontainer .dfp_cat_320X100 { display: block;}

        }

        @media only screen and (min-width:1024px) and (max-width:1199px){
            .contentlistbanner .fullcontainer .dfp_728X90 { display: none;}
            .contentlistbanner .fullcontainer .dfp_cat_320X100 { display: block;}

        }
    </style>


    <!-- more article section start here -->
    <div class="container mostpopu arttilist">
        <div class="row">
            <div class="col-xs-12">
                <div class="bordertb">{{ $kicker->name }}</div>
            </div>
        </div>
        <div class="row row-no-margin">
            <div class="col-xs-12 col-sm-12 col-md-9 tablwidt  paddingright50">
                <div class="topcat"></div>

                <div class="row mostwnew">
                    <div class="col-xs-12 col-sm-12 col-md-9 mdfiartimost">
                        @foreach($articles as $article)
                            @php
                                $site   = Config('constants.articleArr.'.$article->site_type);
                                $image  = Config('constants.awsS3Url').$article->image;
                                $url    = Config('constants.MainDomain').'/hi/'.$site.'/'.$article->slug.'.'.$article->content_id;
                            @endphp
                        @if($loop->index == 0)
                            <div class="img-txtlayout572">
                                <div class="img-valayout572">
                                    <a href="{{ $url }}">
                                        <img src="{{ $image }}" alt="{{ $article->hindi->home_title }}">
                                    </a>
                                </div>
                                <span class="text-contentnewlayout">
                                <div class="text-rep-blk572">
                                    <div class="show-an-txt572">
                                        <a href="{{ $url }}">
                                            {{ $article->hindi->title }}
                                        </a>
                                    </div>
                                    <div class="authn572">
                                        @if(!empty($article->hindi->author))
                                            By {{$article->hindi->author}}
                                        @endif
                                    </div>
                                </div>
                            </span>
                            </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 responwidmost">
                        <div class="headmost">Most Popular</div>
                        @foreach($articles as $article)
                            @php
                                $site   = Config('constants.articleArr.'.$article->site_type);
                                $image  = Config('constants.awsS3Url').$article->image;
                                $url    = Config('constants.MainDomain').'/hi/'.$site.'/'.$article->slug.'.'.$article->content_id;
                            @endphp
                            @if($loop->index < 6 && $loop->index > 0)
                                <div class="smallatcmost">
                                    <div class="artbtmtext">
                                        <a href="{{ $url }}">
                                            {{ $article->hindi->title }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="borbtmdot"></div>

                @foreach($articles as $article)
                    @if($loop->index > 5)
                        @php
                            $site   = Config('constants.articleArr.'.$article->site_type);
                            $image  = Config('constants.awsS3Url').$article->image;
                            $url    = Config('constants.MainDomain').'/hi/'.$site.'/'.$article->slug.'.'.$article->content_id;
                        @endphp
                        <div class="row sec-slide-effect">
                            <div class="col-xs-12 col-sm-4 col-md-4 md1024yw4">
                                <div class="arti271">
                                    <a href="{{ $url }}">
                                        <img src="{{ $image }}" alt="{{ $article->hindi->home_title }}">
                                    </a>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-8 col-md-8 md1024yw8">
                                <div class="listkick">
                                    <a href="{{ Config('constants.MainDomain').'/hi/content/'.$kicker->where('tag_id', $article->hindi->kicker)->first()->name.'/'.$kicker->where('tag_id', $article->hindi->kicker)->first()->tag_id }}">
                                        {{ $kicker->where('tag_id', $article->hindi->kicker)->first()->name }}
                                    </a>
                                </div>

                                <div class="listhead">
                                    <a href="{{ $url }}">
                                        {{ $article->hindi->title }}
                                    </a>
                                </div>
                                <div class="listtext">
                                    {{$article->hindi->short_desc}}
                                </div>
                                <div class="listauthor">By <a>{{$article->hindi->author}}</a>
                                    <span>
                                        {{substr($article['time'],0,-9)}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="borbtmdotarticle"></div>
                        @if($loop->index == 9)
                            @include('includes/mycatbottomarticlelist')
                            <div class="borbtmdotarticle"></div>
                        @endif
                        @if($loop->index == 7)
                            <div class="contentlistbanner">
                                <div class="fullcontainer">
                                    @include("includes.banners.dfp_728X90")
                                    @include("includes.banners.dfp_cat_320X100")
                                </div>
                            </div>
                            <div class="borbtmdotarticle"></div>
                        @endif
                    @endif
                @endforeach
                {{ $contentIds->links() }}
            </div>
            <div class="col-xs-12 col-sm-3 hidden-xs hidden-sm hiddcontain col-md-3 row-no-padding">
                @notmobile

                    <div class="sidearce"> @include("includes.banners.google_300X600") </div>
                @endnotmobile
                <div class="sidearce"> @include('includes.magazinesubscribe') </div>

                @notmobile
                    <div class="sidearce"> @include("includes.banners.yahoo_300X600") </div>
                @endnotmobile
                
                <div class="sidearce"> @include('includes.banners.dfp_300X250') </div>
                <div class="sidearce"> @include('includes.banners.yahoo_300X250') </div>
            </div>
        </div>
    </div>
@endsection
