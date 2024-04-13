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
  display: block;
  width: 100%;
  flex-wrap: wrap;
  justify-content: flex-start;
}
ul.browse-data li{list-style-type:none!important;}
ul.browse-data li {list-style-position: inside; text-indent: -25px;}
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
  width: 100%;word-break:break-word;
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
<h1 class="site-head">Most Searched Franchise Brands {{ date('M-Y')}}</h1>



<div class="row">
    @for ($i = 0; $i < 4; $i++)
        <div class="col-md-3">
            <ul class="browse-data">
                @foreach($brand as $brandlista)
                    @if ($loop->iteration > $i * 25 && $loop->iteration <= ($i + 1) * 25)
                        <li>
                            <span class="line-number">{{ $loop->index + 1 }}.&nbsp;</span>
                            <a href="{{ Config('constants.MainDomain') }}/brands/{{$brandlista['profile_name']}}.{{$brandlista['fran_detail_id']}}" target="_blank"> {{ ucwords(strtolower($brandlista['company_name'])) }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endfor
</div>

@endsection