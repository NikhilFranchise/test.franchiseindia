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
.activeindex{background: #6c6c6c!important;color: #ffffff!important;}
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
<p class="browse-para">Browse By</p>
<ul class="list-abre">
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/a" {{ strtolower($brandUrlParam) == "a" ? "class=activeindex" : "" }}>A</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/b" {{ strtolower($brandUrlParam) == "b" ? "class=activeindex" : "" }}>B</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/c" {{ strtolower($brandUrlParam) == "c" ? "class=activeindex" : "" }}>C</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/d" {{ strtolower($brandUrlParam) == "d" ? "class=activeindex" : "" }}>D</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/e" {{ strtolower($brandUrlParam) == "e" ? "class=activeindex" : "" }}>E</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/f" {{ strtolower($brandUrlParam) == "f" ? "class=activeindex" : "" }}>F</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/g" {{ strtolower($brandUrlParam) == "g" ? "class=activeindex" : "" }}>G</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/h" {{ strtolower($brandUrlParam) == "h" ? "class=activeindex" : "" }}>H</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/i" {{ strtolower($brandUrlParam) == "i" ? "class=activeindex" : "" }}>I</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/j" {{ strtolower($brandUrlParam) == "j" ? "class=activeindex" : "" }}>J</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/k" {{ strtolower($brandUrlParam) == "k" ? "class=activeindex" : "" }}>K</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/l" {{ strtolower($brandUrlParam) == "l" ? "class=activeindex" : "" }}>L</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/m" {{ strtolower($brandUrlParam) == "m" ? "class=activeindex" : "" }}>M</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/n" {{ strtolower($brandUrlParam) == "n" ? "class=activeindex" : "" }}>N</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/o" {{ strtolower($brandUrlParam) == "o" ? "class=activeindex" : "" }}>O</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/p" {{ strtolower($brandUrlParam) == "p" ? "class=activeindex" : "" }}>P</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/q" {{ strtolower($brandUrlParam) == "q" ? "class=activeindex" : "" }}>Q</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/r" {{ strtolower($brandUrlParam) == "r" ? "class=activeindex" : "" }}>R</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/s" {{ strtolower($brandUrlParam) == "s" ? "class=activeindex" : "" }}>S</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/t" {{ strtolower($brandUrlParam) == "t" ? "class=activeindex" : "" }}>T</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/u" {{ strtolower($brandUrlParam) == "u" ? "class=activeindex" : "" }}>U</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/v" {{ strtolower($brandUrlParam) == "v" ? "class=activeindex" : "" }}>V</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/w" {{ strtolower($brandUrlParam) == "w" ? "class=activeindex" : "" }}>W</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/x" {{ strtolower($brandUrlParam) == "x" ? "class=activeindex" : "" }}>X</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/y" {{ strtolower($brandUrlParam) == "y" ? "class=activeindex" : "" }}>Y</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/z" {{ strtolower($brandUrlParam) == "z" ? "class=activeindex" : "" }}>Z</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/0" {{ strtolower($brandUrlParam) == "0" ? "class=activeindex" : "" }}>0</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/1" {{ strtolower($brandUrlParam) == "1" ? "class=activeindex" : "" }}>1</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/2" {{ strtolower($brandUrlParam) == "2" ? "class=activeindex" : "" }}>2</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/3" {{ strtolower($brandUrlParam) == "3" ? "class=activeindex" : "" }}>3</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/4" {{ strtolower($brandUrlParam) == "4" ? "class=activeindex" : "" }}>4</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/5" {{ strtolower($brandUrlParam) == "5" ? "class=activeindex" : "" }}>5</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/6" {{ strtolower($brandUrlParam) == "6" ? "class=activeindex" : "" }}>6</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/7" {{ strtolower($brandUrlParam) == "7" ? "class=activeindex" : "" }}>7</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/8" {{ strtolower($brandUrlParam) == "8" ? "class=activeindex" : "" }}>8</a></li>
	<li><a href="{{ Config('constants.MainDomain') }}/sitemap/brands/9" {{ strtolower($brandUrlParam) == "9" ? "class=activeindex" : "" }}>9</a></li>
</ul>
<h2 class="site-sub-head">Brands Starting with '{{ ucfirst($brandUrlParam) }}'</h2>

<ul class="browse-data">
 @foreach($brandlist as $brandlista)
 <li><a href="{{ Config('constants.MainDomain') }}/brands/{{$brandlista['profile_name']}}.{{$brandlista['fran_detail_id']}}">{{ucwords(strtolower($brandlista['company_name']))}}</a></li>
 @endforeach
</ul>
{!! $brandlist->links() !!}
</div>
@endsection