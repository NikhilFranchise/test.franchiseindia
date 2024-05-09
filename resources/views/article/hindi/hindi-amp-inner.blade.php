@extends('layout.amp.hindi.amp-master')
@php
	$fetchurl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $newfetchurl = str_replace(Request::segment(1).'/','',$fetchurl)
@endphp
@section('content')
	<div class="marss">
		<div class="fbv">
			<div class="as">
				<a href="{{ Config('constants.MainDomain') }}/hi/content/{{ $seoTag->where('tag_id', $articles->hindi->kicker)->first()->name }}/{{$articles->hindi->kicker}}">
					{{ $seoTag->where('tag_id', $articles->hindi->kicker)->first()->name}}</a>
			</div>
			<div class="datas">
				@php
					$articleTime = date_create($articles['time']);
                    $articleDate  = date_format($articleTime,"d");
                    $articleDate  .= " ".Config('hindiConstants.hindiMonths.'.date_format($articleTime,"M"));
                    $articleDate  .= date_format($articleTime," y");
				@endphp
				/ {{ $articleDate }}
			</div>
		</div>
		<h1>{{$articles->hindi->title}}</h1>
		<div class="autho">By {{$articles->hindi->author}}</div>
		<p>{{$articles->hindi->short_desc}}</p>
		<amp-img src="{{Config('constants.awsS3Url').$articles->image}}" width="1000" height="562" layout="responsive"></amp-img>
		{!! $articles->hindi->content !!}
		<div style="text-align: center;">
            <amp-social-share type="facebook"  width="40" height="34" data-param-text="{{$articles->hindi->title}}" rel="{{$newfetchurl}}" data-param-app_id="110294989480112"></amp-social-share>
            <amp-social-share type="whatsapp"  rel="{{$newfetchurl}}" data-param-text="{{$newfetchurl}}" data-param-url="{{$newfetchurl}}" width="40" height="34"></amp-social-share>
            <amp-social-share type="pinterest" data-param-media="{{Config('constants.awsS3Url').$articles->image}}" width="40" height="34"></amp-social-share>
            <amp-social-share type="linkedin" rel="{{$newfetchurl}}" data-param-text="{{$articles->hindi->title}}"  width="40" height="34"></amp-social-share>
            <amp-social-share type="twitter" rel="{{$newfetchurl}}" data-param-text="{{$articles->hindi->title}}" width="40" height="34"> </amp-social-share>
            <amp-social-share type="gplus" rel="{{$newfetchurl}}" data-param-text="{{$articles->hindi->title}}" width="40" height="34"></amp-social-share>
            <amp-social-share type="email"  width="40" height="34" data-param-subject="{{$articles->hindi->title}}" data-param-recipient=""></amp-social-share>
		</div>
	</div>
	<amp-analytics type="googleanalytics">
		<script type="application/json">
			{
			  "vars": {
				"account": "UA-8863112-1"
			  },
			  "triggers": {
				"trackPageviewWithCustomUrl": {
				  "on": "visible",
				  "request": "pageview",
				  "vars": {
					"title": "{{$articles->title}}",
					"documentLocation": "{{$newfetchurl}}"
				  }
				}
			  }
			}
		</script>
	</amp-analytics>
@endsection
