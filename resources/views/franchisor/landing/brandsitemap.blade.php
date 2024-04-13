@extends('layout.master')
@section('content')
<!--<link rel="preload" href="https://www.franchiseindia.com/css/fonts/Semibold/OpenSans-Semibold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="https://www.franchiseindia.com/css/fonts/Bold/OpenSans-Bold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="https://www.franchiseindia.com/css/fonts/Light/OpenSans-Light.woff2" as="font" type="font/woff2" crossorigin="anonymous">-->
<div class="container">
<style>
ul.list-abre{display:flex;padding-left:0px;flex-wrap:wrap;}
ul.list-abre li{margin-right:0px;}
ul.browse-data {
  list-style-type:disc!important;
  padding-left: 14px;margin-top: 18px;
  display: flex;
  width: 100%;
  flex-wrap: wrap;
  justify-content: flex-start;
}
ul.browse-data li{list-style-type:disc!important;}
h1.site-head{margin-bottom: 15px;
border-bottom: 1px solid #dfdfdf;
padding-bottom: 15px;font-size: 40px;
line-height: 29px;
margin-top: 27px;
font-family: 'Open Sans Light',serif;
color: #333;}
h2.site-sub-head {
font-family: "Open Sans Semibold","serif";
font-size: 25px;
line-height: 25px;
margin-bottom: 20px;
margin-top: 30px;
clear: both;
color: #666666;
}
ul.browse-data li {
  width: 25%;word-break:break-word;
  padding-right: 21px;
  margin-bottom: 7px;
}
ul.browse-data li a{font-family: "Open Sans Light","serif";
font-size: 14px;padding-right:35px;
line-height: 18px;
color: #333;}
p.browse-para{font-family: "Open Sans Semibold","serif";
  font-size: 25px;
  line-height: 25px;
  color: #666;
  margin-bottom: 15px;
  margin-top: 10px;
  clear: both;
}
.list-abre li a {
  float: left;
margin: 2px;
font-size: 15px;
font-weight: 400;
font-family: Roboto;
color: #464545;
background: #cacaca;
padding: 4px 10px;
}

.list-abre li a:hover{background: #6c6c6c;color: #ffffff;}
.list-abre li a:hover{background: #6c6c6c;color: #ffffff;}
@media screen and (max-width:767px){
	ul.list-abre{margin-bottom:28px;}
	ul.browse-data li{width:48%;padding-right:20px;}
	h1.site-head{margin-top:50px;}
	ul.browse-data {margin-top: 19px;}
	h2.site-sub-head{
  font-size: 25px;
  line-height: 25px;
  margin-bottom: 20px;
  margin-top: 10px;
}
h1.site-head{font-size:27px;}
}
</style>
<h1 class="site-head">Brand Directory</h1>
<p class="browse-para">Browse By Alphabetically or Numerically</p>
<ul class="list-abre">
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/a">A</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/b">B</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/c">C</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/d">D</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/e">E</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/f">F</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/g">G</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/h">H</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/i">I</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/j">J</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/k">K</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/l">L</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/m">M</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/n">N</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/o">O</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/p">P</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/q">Q</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/r">R</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/s">S</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/t">T</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/u">U</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/v">V</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/w">W</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/x">X</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/y">Y</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/z">Z</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/0">0</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/1">1</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/2">2</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/3">3</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/4">4</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/5">5</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/6">6</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/7">7</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/8">8</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/9">9</a></li>
</ul>
<h2 class="site-sub-head">Recently Added Brands</h2>
<ul class="browse-data">
 @foreach($brandsitemap as $brandlista)
 <li><a href="{{ Config('constants.MainDomain') }}/brands/{{$brandlista['profile_name']}}.{{$brandlista['fran_detail_id']}}">{{ucwords(strtolower($brandlista['company_name']))}}</a></li>
 @endforeach
</ul>

</div>
@endsection