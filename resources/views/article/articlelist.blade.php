@php
    use Illuminate\Support\Str;
@endphp
@extends('layout.master')
@section('seoTitle', ucwords($kicker) . ' Articles and Information - Franchise India')
@section('seoDesc', ucwords($kicker) . ' Articles - ' . $articles[0]['shortDesc'])
@section('seoKeywords', $kicker . ' latest articles, information about ' . $kicker)
@section('content')

    <div class="innerloginblk">
        @include('includes.login-events')
    </div>

    <!-- more article section start here -->
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
                                    $site = Config('constants.articleArr.' . $article->site_type);
                                    $image = Config('constants.awsS3Url') . $article->image;
                                    $url =
                                        Config('constants.MainDomain') .
                                        '/' .
                                        $site .
                                        '/' .
                                        $article->slug .
                                        '.' .
                                        $article->content_id;
                                    if ($article->site_type == 'ga') {
                                        $image = $article->image;
                                    }
                                @endphp
                                <div class="img-txtlayout572">
                                    @if ($site == 'gallery')
                                        <div class="gallopt"><img src="{{ url('images/galleyicon.png') }}"
                                                alt="Franchise India Gallery icon"></div>
                                    @endif
                                    <div class="img-valayout572">
                                        <a href="{{ $url }}">
                                            <img src="{{ $image }}" alt="{{ $article->title }}">
                                        </a>
                                    </div>
                                    <span class="text-contentnewlayout">
                                        <div class="text-rep-blk572">
                                            <div class="show-an-txt572">
                                                <a href="{{ $url }}">
                                                    @if (empty($article->homeTitle))
                                                        {{ substr($article->title, 0, 50) }}
                                                    @else
                                                        {{ substr($article->homeTitle, 0, 50) }}..
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="authn572">
                                                @if (!empty($article->author))
                                                    By {{ $article->author }}
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
                        @foreach ($popularArticle as $article)
                            {{-- @if ($loop->index > 0 && $loop->index < 6) --}}
                            @if ($loop->index > 0)
                                @php
                                    $site = Config('constants.articleArr.' . $article['site_type']);
                                    $url =
                                        Config('constants.MainDomain') .
                                        '/' .
                                        $site .
                                        '/' .
                                        $article['slug'] .
                                        '.' .
                                        $article['content_id'];
                                    if ($article['site_type'] == 'ga') {
                                        $url =
                                            Config('constants.MainDomain') .
                                            '/' .
                                            $site .
                                            '/' .
                                            $article['slug'] .
                                            '.' .
                                            $article['content_id'];
                                    }
                                @endphp
                                <div class="smallatcmost">
                                    <div class="artbtmtext">
                                        <a href="{{ $url }}">
                                            @if (empty($article['homeTitle']))
                                                {{ substr($article['title'], 0, 50) }}
                                            @else
                                                {{ substr($article['homeTitle'], 0, 50) }}..
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="borbtmdot"></div>

                @foreach ($articles as $article)
                    {{-- @php echo '<pre/>'; print_r($loop);exit; @endphp --}}
                    {{-- @if ($loop->index) --}}
                    @php

                        $site = Config('constants.articleArr.' . $article['site_type']);
                        $kicker = Config('constants.MainDomain') . '/content/' . $article['urlKicker'];
                        $image = Config('constants.awsS3Url') . $article['image'];
                        $url =
                            Config('constants.MainDomain') .
                            '/' .
                            $site .
                            '/' .
                            $article['slug'] .
                            '.' .
                            $article['content_id'];

                        if ($article['site_type'] == 'ga') {
                            $kicker =
                                Config('constants.MainDomain') .
                                '/gallery/' .
                                Str::slug($article['kicker']) .
                                '/' .
                                $article['kicker_id'];
                            $image = $article['image'];
                        }
                    @endphp
                    <div class="row sec-slide-effect">
                        <div class="col-xs-12 col-sm-4 col-md-4 md1024yw4">
                            <div class="arti271">
                                @if ($site == 'gallery')
                                    <div class="gallopt"><img src="{{ url('images/galleyicon.png') }}" alt="gallicon">
                                    </div>
                                @endif
                                <a href="{{ $url }}">
                                    <img src="{{ $image }}" alt="{{ $article['kicker'] }}">
                                </a>
                            </div>
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
                            <div class="listauthor">By <a>{{ $article['author'] }}</a>
                                <span>
                                    {{ substr($article['time'], 0, -9) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="borbtmdotarticle"></div>
                    @if ($loop->index == 13)
                        @include('includes/mycatbottomarticlelist')
                        <div class="borbtmdotarticle"></div>
                    @endif
                    {{-- @endif --}}
                @endforeach
                {{ $articles->links() }}
            </div>

            <div class="col-xs-12 col-sm-3 hidden-xs hidden-sm hiddcontain col-md-3 row-no-padding">
                @include('includes.magazinesubscribe')
                @notmobile
                    <div class="sidearce">
                        @include('includes.banners.dfp_600X300')
                    </div>
                @endnotmobile
                @include('includes.article.newsection')
                {{-- @notmobile
                    <div class="sidearce">
                        <div class="dfp_300X250">
                            <div id='div-gpt-ad-1498540898563-5' style='height:250px; width:300px;'></div>
                        </div>
                    </div>
                @endnotmobile --}}
                {{-- @include('includes.article.videosection') --}}
                {{-- <div class="sidearce">
                    @include('includes.banners.dfp_300X250')
                </div> --}}
            </div>
        </div>
    </div>

    @mobile
        <div class="mobileban">
            @include('includes.banners.yahoo_300X250')
        </div>
    @endmobile

@endsection
