@extends('layout.master')
@section('seoTitle', $articles->title)
@section('seoDesc', $articles->shortDesc)
@section('seoKeywords','')
@section('content')

    <div class="container articlesection">
        <div class="row row-no-margin">
            <div class="artimainhead"><a href="{{ Config::get('constants.MainDomain') }}/content/{{$articles->urlKicker}}">{{$articles->kicker}}</a>
                <span>
                    @php
                        $date = $articles->article_date;
                    if(isset($articles->news_date))
                       $date = $articles->news_date;
                    else if(isset($articles->interview_date))
                       $date = $articles->interview_date;
                    @endphp
                    {{substr($date,0,-9)}}
                </span>
            </div>
            <h1 class="pagehead">{{$articles->title}}</h1>
            <p class="pagetxt">{{$articles->shortDesc}}</p>
        </div>
        <!--new content start here -->
        <div class="row row-no-margin">
            <div class="col-xs-12 col-sm-9 col-md-9 row-no-padding resmodfidevice">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 artinner articontent">
                        @php
                            $image = 'https://www.franchiseindia.com/entrepreneur/news/images';
                            if (isset($articles->article_date))
                                $image = 'https://www.franchiseindia.com/entrepreneur/article/images';
                            elseif (isset($articles->interview_date))
                                $image = 'https://www.franchiseindia.com/entrepreneur/entrepreneur/images';
                        @endphp
                        <img src="{{$image}}/{{$articles->image}}"  alt="{{$articles->title}}" class="eiimages">
                        @php
                            echo html_entity_decode($articles['content']);
                        @endphp
                    </div>
                </div>

                <!---->
            @include('includes/mycatbottomarticle')
            <!---->
                <div class="height20"></div>
            </div>

            <!--inner right panel start here -->
        @include('includes/eiarticle/rightinnerarticle')
        <!--inner right panel end here -->

        </div>
        <!--new content end here -->
    </div>

@endsection

