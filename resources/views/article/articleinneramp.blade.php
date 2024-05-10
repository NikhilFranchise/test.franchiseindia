@extends('layout.masteramp')
@php
$fetchurl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$newfetchurl =str_replace(Request::segment(1).'/','',$fetchurl)
@endphp 
@section('mainUrl', $newfetchurl)
@section('seoTitle', $articles->title)
@section('content')
<div class="marss">  
<div class="fbv">
<div class="as">
  <a href="{{ Config::get('constants.MainDomain') }}/content/{{$articles['urlKicker']}}">
    {{ucwords($articles->kicker)}}</a>
  </div>
<div class="datas">        
	@php
	$a    = date_create($articles['time']);
	$date = date_format($a,"d F Y");
	@endphp
	{{$date}}
</div>
</div>
<h1>{{$articles->title}}</h1>
<div class="autho">By {{$articles->author}}</div>
<p>{{$articles->shortDesc}}</p>
<amp-img src="{{Config('constants.awsS3Url').$articles->image}}" width="1000" height="562"
layout="responsive"></amp-img>
	@php
	echo html_entity_decode($articles['content']);
	@endphp
<center> 
<div>
<amp-social-share type="facebook"  width="40" height="34" data-param-text="{{$articles->title}}"
rel="{{$newfetchurl}}" data-param-app_id="110294989480112"></amp-social-share>
<amp-social-share type="whatsapp"  rel="{{$newfetchurl}}" data-param-text="{{$newfetchurl}}" data-param-url="{{$newfetchurl}}" width="40" height="34"></amp-social-share>
<amp-social-share type="pinterest" data-param-media="{{Config('constants.awsS3Url').$articles->image}}" width="40" height="34"></amp-social-share>
<amp-social-share type="linkedin" rel="{{$newfetchurl}}" data-param-text="{{$articles->title}}"  width="40" height="34"></amp-social-share>
<amp-social-share type="twitter" rel="{{$newfetchurl}}" data-param-text="{{$articles->title}}" width="40" height="34"> </amp-social-share>
<amp-social-share type="gplus" rel="{{$newfetchurl}}" data-param-text="{{$articles->title}}" width="40" height="34"></amp-social-share>
<amp-social-share type="email"  width="40" height="34" data-param-subject="{{$articles->title}}" data-param-recipient=""></amp-social-share>
</div>
</center>
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
