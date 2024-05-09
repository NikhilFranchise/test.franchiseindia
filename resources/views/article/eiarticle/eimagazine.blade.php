@extends('layout.master')
@section('seoTitle', $articles->article_title)
@section('seoDesc', $articles->small_para)
@section('seoKeywords','')
@section('content')
    <div class="container articlesection">
        <div class="row row-no-margin">
            <div class="artimainhead"><a href="{{ Config('constants.MainDomain') }}/content/{{$articles->urlKicker}}">{{$articles->kicker}}</a>
                <span>
                    {{substr($articles->create_date,0,-9)}}
                </span>
            </div>
            <h1 class="pagehead">{{$articles->article_title}}</h1>
            <p class="pagetxt">{{$articles->small_para}}</p>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="artiaut">By <a href="#"> {{$articles->article_writer}}</a> </div>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-7 pull-right">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 pull-left">
                        <ul class="sib">
                            <li class="fac"><a href="https://www.facebook.com/sharer.php?u={{url()->current()}}"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a>
                            </li>
                            <li class="tw"><a href="https://twitter.com/share?url={{url()->current()}}"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a>
                            </li>
                            <li class="in"><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{url()->current()}}"><i class="fa fa-linkedin fa-lg" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="marginbor"></div>
        </div>
        <!--new content start here -->
        <div class="row row-no-margin">
            <div class="col-xs-12 col-sm-9 col-md-9 row-no-padding resmodfidevice">
                <div class="abigima">
                    <img src="https://www.franchiseindia.com/entrepreneur/magazine/images/main/{{$articles->image}}"  alt="{{$articles->article_title}}">
                </div>
                <div class="clr"></div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 artinner articontent">
                        @php
                            echo html_entity_decode($articles['article']);
                        @endphp
                    </div>
                </div>
            @include('includes/mycatbottomarticle')
            </div>
            <!--inner right panel start here -->
            @include('includes/eiarticle/rightinnerarticle')
            <!--inner right panel end here -->
        </div>
        <!--new content end here -->
    </div>
@endsection

