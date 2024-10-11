@extends('layout.insights.master')
@section('seoTitle', $newsDetails[0]['title'])
@section('seoDesc', $newsDetails[0]['shortDesc'])
@section('seoKeywords', $newsDetails[0]['kicker'])
@section('canonicalUrl', url()->current())
@php
    $ogimage = Config('constants.awsS3Url') . $newsDetails[0]['image'];

    // Get the headers to check if the file exists
    $headers = @get_headers($ogimage);

    if ($headers && strpos($headers[0], '200')) {
        // Fetch the image data
        $imageData = file_get_contents($ogimage);

        // Get image size from the image data
        $imageDetails = getimagesizefromstring($imageData);

        if ($imageDetails) {
            $width = $imageDetails[0];
            $height = $imageDetails[1];
            //dd($ogimage, $width, $height);
        }
    }
@endphp

@section('image', $ogimage)
@section('shortDesc', $newsDetails[0]['shortDesc'])
@section('imagesrc', $ogimage)
@section('title', $newsDetails[0]['title'])
@section('url',url()->current())
@section('width',$width)
@section('height',$height)
@section('content')
<div class="maininnver">
    @php
        $image = Config('constants.awsS3Url') . $newsDetails[0]['image'];
        $url = Config('constants.MainDomain') . '/insights/' . $newsDetails[0]['slug'] . '.' . $newsDetails[0]['news_id'];
        if(!empty($author_details[0]['image'])){
            $author_image = 'https://franchiseindia.s3.ap-south-1.amazonaws.com'. $author_details[0]['image'];
        }else{
            $author_image = url('images/defaultuser.png'); }

        if (!empty($author_details[0]['slug'])) {
            $authorurl = Config('constants.MainDomain') . '/insights/author/' . $author_details[0]['slug'] .'-' .$author_details[0]['author_id'];
        }else{
            $slug = strtolower(str_replace(' ','-', $author_details[0]['title']));
            $authorurl = Config('constants.MainDomain') . '/insights/author/' . $slug .'-' .$author_details[0]['author_id'];
        }
    @endphp
    <div class="contentblk">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/insights') }}" class="tip-bottom">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/insights') }}" class="tip-bottom">{{ $newsDetails[0]['insight_type'] }}</a></li>
                @foreach ($newsDetails[0]['category'] as $category)
                    @php
                        $catslug = Config('constants.MainDomain') . '/insights/' . $category->slug;
                        $catname = $category->catname;
                    @endphp
                        <li class="breadcrumb-item"><a href="{{ $catslug }}" class="tip-bottom">{{ $catname }}</a></li>
                @endforeach
                @foreach ($newsDetails[0]['Subcategory'] as $subcat)
                    @php
                        $subcatslug = Config('constants.MainDomain') . '/insights/' . $category->slug . '/' . $subcat->slug;
                        $subcatname = $subcat->subcat_name;
                    @endphp
                        <li class="breadcrumb-item active"><a href="{{ $subcatslug }}">{{ $subcatname }}</a></li>
                @endforeach
                <li class="breadcrumb-item">{{ $newsDetails[0]['title'] }}</li>
            </ul>
        </div>
    </div>

    <div class="container">
        @if (!empty($catname) && !empty($catslug))
        <a href="{{ $catslug }}" role="button" class="detailbtn">{{ $catname }}</a>
        @endif

        @if (!empty($subcatname) && !empty($subcatslug))
        <a href="{{ $subcatslug }}" role="button" class="detailbtn">{{ $subcatname }}</a>
        @endif
        <h1>{{ $newsDetails[0]['title'] }}</h1>
        <div class="authblk">
            <div class="autimg"><img src="{{$author_image}}" alt="{{ $author_details[0]['title']}} " /></div>
            <div class="autinfo">
                <span><a href="{{$authorurl}}">{{ $author_details[0]['title']}}</a></span>
                {{date('M d, Y',strtotime($newsDetails[0]['created_at']))}} - {{app\Http\Controllers\InsightsController::calculateReadTime($newsDetails[0])}} min read
            </div>
        </div>
    </div>
</div>

<div class="contentarea">
    <div class="imgblk">
        <img src="{{!empty($image)? $image : 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/content/fi/int/5ff40e6aaa3da.jpeg'}}" alt="{{$newsDetails[0]['title'].' image'}}" />
    </div>
    @include("layout.insights.socailcomment")
    <div class="shortdes">
        {{$newsDetails[0]['shortDesc']}}
    </div>
    <div class="articlecontent">
        @php $custom_data = explode("\r\n", $newsDetails[0]['content']); if(count($custom_data) == 1){ $articleData[0] = $custom_data[0].'
        <div id="v-franchiseindia"></div>
        <script>
            (function (v, d, o, ai) {
                ai = d.createElement("script");
                ai.defer = true;
                ai.async = true;
                ai.src = v.location.protocol + o;
                d.head.appendChild(ai);
            })(window, document, "//a.vdo.ai/core/v-franchiseindia/vdo.ai.js");
        </script>
        '; } else{ $counter = 0; foreach($custom_data as $cdata){ if($counter == 2){ $articleData[] = $cdata.'
        <div id="v-franchiseindia"></div>
        <script>
            (function (v, d, o, ai) {
                ai = d.createElement("script");
                ai.defer = true;
                ai.async = true;
                ai.src = v.location.protocol + o;
                d.head.appendChild(ai);
            })(window, document, "//a.vdo.ai/core/v-franchiseindia/vdo.ai.js");
        </script>
        '; } else{ $articleData[] = $cdata; } $counter++; } } $resultArticle = implode("\r\n", $articleData); @endphp {!! $resultArticle !!}
    </div>
    <div style="display: flex; flex-wrap: wrap; gap: 15px; justify-content: center; padding: 20px;">
        @foreach ($franchiseData as $franchise)
            <div style="background-color: #f9f9f9; border: 1px solid #ddd; padding: 15px 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: center; min-width: 150px; max-width: 200px;">
                <a href="http://franchiseindia.com/brands/{{ strtolower($franchise['profile_name']) }}.{{ $franchise['fran_detail_id'] }}" target="_blank" style="text-decoration: none; color: #333; font-weight: bold; font-size: 16px;">
                    {{ $franchise['company_name'] }}
                </a>
            </div>
        @endforeach
    </div>
    <div class="tag-block">
        <ul class="tag-list">
            @if(!empty($assocTags) && (isset($assocTags))) @foreach($assocTags as $assocTagsData) @php $tags = str_replace(' ','-',$assocTagsData->name); $tagslug = strtolower($tags); @endphp
            <li><a href="{{ Config('constants.MainDomain') . '/insights/tag/' . $tagslug }}">{{ $assocTagsData->name }}</a></li>
            @endforeach @endif
        </ul>
    </div>
 
    
  


    <div class="contentarea">
        @include("layout.insights.subscribenewsletter")
    </div>
</div>
@include("layout.insights.magblock") @endsection
