<!doctype html>
<html amp>
<head>
<meta charset="utf-8">
<meta content="en-in" name="language"/>
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>@yield('seoTitle')</title>
<link rel="canonical" href="@yield('mainUrl')">
<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
<script async src="https://cdn.ampproject.org/v0.js"></script>
<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
<style amp-custom>
body  { font-family:sans-serif, Arial, Helvetica;}
a{ text-decoration:none;}
img { border: 1px solid #dfdfdf;}
.main{ max-width:700px; margin:0 auto;}
h1 {      color: #333; font-size:1.4em; font-weight:400;     margin: -1px auto 0; padding:10px; text-align: center;}
p{ color: #333; font-size:1em;  line-height:22px; }
.head{  background-color: #fbfbfb; padding: 1rem;margin:0 auto; text-align:center;}
.head .fihl-logo {    width: 225px; margin:0 auto;}
.marss { margin:10px; }
.fbv { clear:both; float:none; overflow:hidden; margin:0 0 0px 0; text-align: center;}
.as { float:none; color:#006699; text-align: center; padding:10px 10px 15px; }
.as a{ color:#006699; font-weight:700;font-size:14px; text-decoration:none;}
.rellink{ color:#333; font-size:15px;}
.rellink strong{ font-weight:700;}
.rellink a{color:#006699;}
.datas { float:none;color: #999; font-size:15px;}
.autho  {color: #333; font-size:14px; text-align: center; }
.fotr{  background-color: #fbfbfb; padding: 1rem;margin:0 auto; text-align:center;}
.txs{ font-size:14px; color:#333; line-height:20px;  }
.txsbt{ font-size:11px; color:#333; line-height:14px; }
.txsbt a{  color:#333;}
#housing-description {clear: both;}
amp-carousel {margin: 0;}
amp-accordion p, amp-accordion h4 {padding: 16px;}
amp-accordion h4 {font-size: 18px;}
.related {background-color: #f5f5f5;display: block;color: #111;height: 100px;padding: 0;line-height: 75px;padding-right: 8px;}
.marss amp-img {border: 1px solid #dfdfdf;}
.related amp-img {line-height: 24px;font-weight: 400;font-size: 24px;vertical-align: middle;float: left;margin-right: 10px;}
.related:active {background-color: #ccc;}
.price-description {color: green; font-weight: 400;}
amp-fit-text { margin-bottom: 24px; margin-top: 24px; padding: 0 16px;    }
.price-other { font-weight: bold;}
.contact-section {margin-top: 24px;display: flex;flex-wrap: wrap;}
.card{box-shadow:0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);float:none;overflow:hidden;padding:8px;margin:16px;border-radius:2px;}
.card h4{margin-top:0;padding:0}
.card p{margin-top:-4px;padding:0}
.card .smtf{margin-top:-4px;padding:0; color:#006699; font-size:12px;}
ul.tag-list { clear:both; margin: 10px 0;   }
ul.tag-list li{ float:left; margin-left: 10px; list-style: none; }
ul.tag-list li a{  font-weight:400;font-size:14px; color: #333; list-style: none; background: #fbfbfb; text-align:center;
padding:7px 5px;display: block; }
.clr { clear: both; float: none; display: block; overflow: hidden; margin: 20px 0;}
</style>

	@php
	$logo           = "logo.png";
	$menuicon       = "menu-icon.png";
	$logoClass      = "logo";
	$searchBarClass = "sear";
	if (strpos($fetchurl,'/wellness') !== false) {
	$logo           = "logowi.png";
	$menuicon       = "menu-iconwi.png";
	$width      = "215";
	$height = "42";
	$mainUrl        = "https://www.franchiseindia.com/wellness/";
	} elseif (strpos($fetchurl,'/education') !== false) {
	$logo = "logoei.png";
	$menuicon  = "menu-iconei.png";
	$width      = "215";
	$height = "42";
	$mainUrl        = "https://www.franchiseindia.com/education/";
	} elseif (strpos($fetchurl,'/restaurant') !== false) {
	$logo = "logori.png";
	$menuicon  = "menu-icon.png";
	$width      = "150";
	$height = "48";
	$mainUrl        = "https://www.franchiseindia.com/restaurant/";
	} else {
	$logo = "logo.png";
	$menuicon  = "menu-icon.png";
	$logoClass = "logo";
	$width      = "224";
	$height = "36";
	$mainUrl        = "https://www.franchiseindia.com/";
	}
	@endphp
</head>
<body>
<div class="main">
<div class="head">
<a  href="{{$mainUrl}}">
<amp-img src="https://www.franchiseindia.com/images/{{$logo}}" width="{{$width}}" height="{{$height}}"></amp-img>
</a>
</div>
<!--content area start here -->   
