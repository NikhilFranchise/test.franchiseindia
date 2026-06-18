@extends('layout.amp.hindi.amp-master')
@section('canonicalUrl'){{ Config('constants.MainDomain').'/hi/content/'.$kicker->name.'/'.$kicker->tag_id }}@endsection
@section('content')
    <div class="marss">
        <h1>{{ $kicker->name }}</h1>
        @foreach($articles as $article)
            @php
                $articleTime = date_create($article->created_at);
                $articleDate  = date_format($articleTime,"d");
                $articleDate  .= " ".Config('hindiConstants.hindiMonths.'.date_format($articleTime,"M"));
                $articleDate  .= date_format($articleTime," y");
            @endphp
            <a href="{{ Config('constants.MainDomain') }}/amp/hi/content/{{$article->slug }}.{{ $article->content_id }}"><amp-img src="{{ Config('constants.awsS3Url').$article->image }}" width="1000" height="562" layout="responsive"></amp-img></a>
            <div class="articlelistsubhead"><a href="{{ Config('constants.MainDomain') }}/amp/hi/content/{{ $seoTags->where('tag_id', $article->hindi->kicker)->first()->name }}/{{ $article->hindi->kicker }}">{{ $seoTags->where('tag_id', $article->hindi->kicker)->first()->name }}</a></div>
            <div class="articlelisthead"><a href="{{ Config('constants.MainDomain') }}/amp/hi/content/{{$article->slug }}.{{ $article->content_id }}">{{$article->hindi->home_title}}</a></div>
            <div class="articlelistdate">{{ $articleDate }}</div>
        @endforeach
        {!! $articles->render() !!}
    </div>
@endsection
