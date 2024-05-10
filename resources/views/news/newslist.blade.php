@extends('layout.master')
@section('seoTitle', ucwords($kicker) . ' Articles and Information - Franchise India')
@section('seoDesc', ucwords($kicker) . ' Articles - ' . $articles[0]['shortDesc'])
@section('seoKeywords', $kicker . ' latest articles, information about ' . $kicker)
@section('content')

    <div class="container mostpopu arttilist">
        <div class="row">
            <div class="col-xs-12">
                <div class="bordertb">{{ $kicker }}</div>
            </div>
        </div>
        <div class="row row-no-margin">
            <div class="col-xs-12 col-sm-12 col-md-9 tablwidt  paddingright50">
                <div class="topcat"></div>
                <div class="row mostwnew">
                    <div class="col-xs-12 col-sm-12 col-md-9 mdfiartimost">
                        @foreach ($articles as $article)
                            @if ($loop->index == 0)
                                @php
                                    $image = Config('constants.awsS3Url') . $article->image;
                                    $url = Config('constants.MainDomain') . '/insights/' . $article->slug . '.' . $article->news_id;
                                @endphp
                                <div class="img-txtlayout572">
                                    <div class="img-valayout572">
                                        <a href="{{ $url }}">
                                            <img src="{{ $image }}" alt="{{ $article->title }}">
                                        </a>
                                    </div>
                                    <span class="text-contentnewlayout">
                                        <div class="text-rep-blk572">
                                            <div class="show-an-txt572">
                                                <a href="{{ $url }}">
                                                    {{ substr($article->title, 0, 50) }}..
                                                </a>
                                            </div>
                                            <div class="authn572">
                                            </div>
                                        </div>
                                    </span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 responwidmost">
                        <div class="headmost">Most Popular</div>
                        @foreach ($popularArticle as $article)
                            @if ($loop->index > 0)
                                @php
                                    $url = Config('constants.MainDomain') . '/insights/' . $article->slug . '.' . $article->news_id;
                                @endphp
                                <div class="smallatcmost">
                                    <div class="artbtmtext">
                                        <a href="{{ $url }}">
                                            {{ substr($article->title, 0, 50) }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="borbtmdot"></div>
                @foreach ($articles as $article)
                    @php
                        $site = Config('constants.articleArr.' . $article->site_type);
                        $kicker = Config('constants.MainDomain') . '/insights/' . $article->urlKicker;
                        $image = Config('constants.awsS3Url') . $article->image;
                        $url = Config('constants.MainDomain') . '/insights/' . $article->slug . '.' . $article->news_id;
                    @endphp
                    <div class="row sec-slide-effect">
                        <div class="col-xs-12 col-sm-4 col-md-4 md1024yw4">
                            <div class="arti271">
                                <a href="{{ $url }}">
                                    <img src="{{ $image }}" alt="{{ $article['kicker'] }}">
                                </a>
                            </div>
                            &nbsp;&nbsp;
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8 md1024yw8">
                            <div class="listkick">
                                <a href="{{ $kicker }}">{{ $article['kicker'] }}</a>
                            </div>
                            <div class="listhead">
                                <a
                                    href="{{ $url }}">{{ empty($article['homeTitle']) ? $article['title'] : $article['homeTitle'] }}</a>
                            </div>
                            <div class="listtext">
                                @if (empty($article['shortDesc']))
                                    {{ strip_tags(substr($article['content'], 0, strpos($article['content'], ' ', 200))) }}..
                                @else
                                    {{ $article['shortDesc'] }}
                                @endif
                            </div>
                            <div class="listauthor">&nbsp;&nbsp;&nbsp;&nbsp;
                               
                            </div>
                        </div>
                    </div>
                   
                @endforeach
                {{ $articles->links() }}
            </div>
            <div class="col-xs-12 col-sm-3 hidden-xs hidden-sm hiddcontain col-md-3 row-no-padding">
                @include('includes.magazinesubscribe')
                {{-- @notmobile --}}
                @if ($agent->isTablet() || $agent->isDesktop())

                    <div class="sidearce">
                        @include('includes.banners.dfp_600X300')
                    </div>
                    @endif
                {{-- @endnotmobile --}}
                @include('includes.article.newsection')
                {{-- @notmobile
         <div class="sidearce">
            <div class="dfp_300X250">
               <div id='div-gpt-ad-1498540898563-5' style='height:250px; width:300px;'></div>
            </div>
         </div>
         @endnotmobile --}}
                {{-- @include('includes.article.videosection') --}}
                {{-- 
         <div class="sidearce">
            @include('includes.banners.dfp_300X250')
         </div>
         --}}
            </div>
        </div>
    </div>
@endsection