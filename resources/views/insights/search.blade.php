@extends('layout.insights.master')
@section('content')
    <div class="maininnver homeh">
        <div class="container">

            <h1 class="cathead">Search for {{ Illuminate\Support\Str::limit($search, 30, '...') }}</h1>

        </div>

        <div class="listblk">
            <div class="container">
                <ul class="artilsit">
                    @foreach ($articlesList as $article)
                        @php

                            //$image = Config('constants.awsS3Url') . $article->image;
                            $locale = App::getLocale();
                            $url = Config('constants.MainDomain') . '/insights/' . $locale . '/' . strtolower($article->insight_type) .
                                '/' . $article->slug . '.' . $article->news_id;
                        @endphp
                        <li>
                            <div class="artimgblk">
                                <a href="{{ $url }}"><img
                                        src="{{ \App\Http\Controllers\InsightsController::createimgurl($article->image) }}"
                                        alt="{{ $article->title . ' image' }}" /></a>
                            </div>
                            <div class="artcontent">
                                <div class="haedname"><a href="{{ $url }}">{{ $article->title }}</a></div>
                                @if (!empty($article->author))
                                    @foreach ($article->author as $author)
                                        @php
                                            $authorname = $author->title;
                                            $author_image = !empty($author->image)
                                                ? \App\Http\Controllers\InsightsController::authorImageurl(
                                                    $author->image) : url('images/defaultuser.png');

                                            $authorUrl = !empty($author->slug)
                                                ? Config('constants.MainDomain') .
                                                    '/insights/' . $locale . '/author/' .
                                                    $author->slug .
                                                    '-' .
                                                    $author->author_id
                                                : Config('constants.MainDomain') .
                                                    '/insights/' . $locale . '/author/' .
                                                    strtolower(str_replace(' ', '-', $author->title)) .
                                                    '-' .
                                                    $author->author_id;
                                        @endphp
                                        <div class="authblk cot">
                                            <div class="autimg"><img src="{{ $author_image }}" alt="{{ $authorname }}" />
                                            </div>
                                            <div class="autinfo">
                                                <span><a href="{{ $authorUrl }}">{{ $authorname }}</a></span>
                                                {{ date('M d, Y', strtotime($article->created_at)) }} -
                                                {{ \App\Http\Controllers\InsightsController::calculateReadTime($article) }}
                                                min
                                                read
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="stext">

                                    {{ html_entity_decode(strip_tags(\Illuminate\Support\Str::words($article->content, 55, ' ...')), ENT_QUOTES | ENT_HTML5, 'UTF-8') }}
                                </div>
                                <div class="scbk">

                                    <div class="shrblk">
                                        <span class="inshrblk">
                                            <a href="#">
                                                <img src="{{ url('insight-new/images/smallshare.svg') }}"
                                                    class="inimg" />Share
                                                <div class="sfv">
                                                    <div class="innersfv"
                                                        onclick="window.open('https://www.facebook.com/FranchiseIndiaMedia','_blank')">
                                                        <img src="{{ url('insight-new/images/facebookcard.svg') }}" />
                                                    </div>
                                                    <div class="innersfv"
                                                        onclick="window.open('https://twitter.com/FranchiseIndia','_blank')">
                                                        <img src="{{ url('insight-new/images/twittercard.svg') }}" />
                                                    </div>
                                                    <div class="innersfv"
                                                        onclick="window.open('https://www.instagram.com/franchiseindia_/','_blank')">
                                                        <img
                                                            src="https://www.franchiseindia.com/newhomepage/assets/img/instagram-icon.svg" />
                                                    </div>
                                                    <div class="innersfv"
                                                        onclick="window.open('https://www.youtube.com/user/FranchiseIndia','_blank')">
                                                        <img
                                                            src="https://www.franchiseindia.com/newhomepage/assets/img/you-tube-icon.svg" />
                                                    </div>
                                                </div>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
                <div class="video-pagination">
                {{ $articlesList->links('pagination::bootstrap-5') }}
            </div>
            </div>
        </div>

        <!-- mag block strat  -->
        @include('layout.insights.magblock')
        <!-- mag block end   -->

        <!-- another list start here   -->
        <div class="listblk">

        </div>

        <!-- another list end here  -->



        @include('layout.insights.brandlist')
    </div>
@endsection
