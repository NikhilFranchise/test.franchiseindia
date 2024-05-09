@php
    $monthNum = sprintf("%02d", $articles[0]['iss_month']);
    $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
@endphp
@extends('layout.master')
@section('seoTitle', 'The Franchising World -'. $monthName.' '. $articles[0]['iss_year'].' '. 'Issues')
@section('seoDesc', 'The Franchising World magazine provides investors and franchisors with reliable news, information and resources for leading franchise business opportunities in its'.' '.$monthName.' '. $articles[0]['iss_year'].' '.'issue. Get your copy Now!')
@section('seoKeywords', 'franchise magazine, franchising magazine, business franchise magazine, franchise entrepreneur magazine')
@section('content')
@include('includes/magazinebreadcrumb')
{{--<div class="innerloginblk">
        @include('includes.login-events')
</div>--}}
    <style type="text/css">img.article-thumb{width:100%;display:block;margin-bottom:10px;}
	.listhead{font-family: 'Open Sans Semibold',serif;font-size: 21px;line-height: 29px;margin-top: -6px;margin-bottom: 10px;}
	.articlesection ol.breadcrumb{margin-left:-5px}
	@media only screen and (max-width:767px) and (min-width:320px){
	.articlesection .breadcrumb>li{line-height:18px;word-break:break-word}
	.listhead{line-height: 26px;font-size: 18px;margin-top: 9px;}
	.arttilist{padding-top:90px;}
	.listauthor{margin-bottom: 0px;}
	}</style>
    <div class="container mostpopu arttilist">
	<div class="row">
            <div class="col-sm-12 col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url(request()->segment(1)) }}">{{ request()->segment(1) }}</a></li>/
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h1 class="bordertb">
                    The Franchising World <span>{{$monthName}} {{$year}} Issue</span>
                </h1>
            </div>

			
			
            <div class="row row-no-margin">
                <div class="col-xs-12 col-sm-12 col-md-9 tablwidt">
                    <div class="topcat"></div>
                    @foreach($mgznArticles as $article)
                        @php
                            $a = date_create($article['time']);
                            $date = date_format($a,"M, d Y");
                            $month = date_format($a,"F");
                            $year = date_format($a,"Y");
                        @endphp
						
						<div class="row" style="margin-bottom:20px;">
						    <div class="col-xs-12 col-sm-12 col-md-3">
							<img alt="{{ $article['title'] }}" src="{{Config('constants.awsS3Url').$article['image']}}" class="article-thumb">
							</div>
                            <div class="col-xs-12 col-sm-12 col-md-9">
							  <div class="listhead"><a href="{{Config('constants.MainDomain')}}/magazine/{{$year}}/{{$month}}/{{$article['urlTitle']}}.{{$article['item_id']}}">{{$article['title']}}</a></div>
                                <div class="listtext">{{$article['subtitle']}}</div>
                                <div class="listauthor">By <a>{{$article['author']}}</a> <span>{{$date}}</span></div>
                            </div>
                        </div>
                        <div class="borbtmdotarticle"></div>
                        @if($loop->index == 5)
                            @include("includes/mycatbottomarticle")
                            <div class="borbtmdotarticle"></div>
                        @endif
                    @endforeach
                </div>
                @include("includes/magazine/rightpanelcomman")
            </div>
        </div>
    </div>
@endsection