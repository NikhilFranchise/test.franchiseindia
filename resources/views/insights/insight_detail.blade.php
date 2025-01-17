@extends('layout.insights.master')

@section('seoTitle', $newsDetails->title)
@section('seoDesc', $newsDetails->shortDesc)
@section('seoKeywords', $newsDetails->kicker)
@section('canonicalUrl', url()->current())
{{-- @dd($newsDetails->image); --}}
@php

    $ogimage = !empty($newsDetails->image)
        ? \App\Http\Controllers\InsightsController::createimgurl($newsDetails->image)
        : 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/content/fi/int/5ff40e6aaa3da.jpeg';
    $imageDetails = @getimagesize($ogimage);

    $width = $imageDetails[0] ? $imageDetails[0] : 0;
    $height = $imageDetails[1] ? $imageDetails[1] : 0;

    $locale = App::getLocale();
    $baseUrl = Config('constants.MainDomain') . "/insights/$locale/";
    $newsUrl = $baseUrl . $newsDetails->slug . '.' . $newsDetails->news_id;
    //$author_details
    $authorSlug = $author_details->slug ?? strtolower(str_replace(' ', '-', $author_details->title));
    //dd($authorSlug);
    $authorUrl = $baseUrl . 'author/' . $authorSlug . '-' . $author_details->author_id;

    $authorImage = !empty($author_details->image)
        ? \App\Http\Controllers\InsightsController::authorImageurl($author_details->image)
        : url('images/defaultuser.png');
@endphp

@section('image', $ogimage)
@section('shortDesc', $newsDetails->shortDesc)
@section('imagesrc', $ogimage)
@section('title', $newsDetails->title)
@section('url', url()->current())
@section('width', $width)
@section('height', $height)

@section('content')
    <div class="maininnver">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/insights') }}" class="tip-bottom">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/insights') }}"
                        class="tip-bottom">{{ $newsDetails->insight_type }}</a></li>

                @foreach ($newsDetails->category as $category)
                    <li class="breadcrumb-item"><a href="{{ $baseUrl . $category->slug }}"
                            class="tip-bottom">{{ $category->catname }}</a></li>
                @endforeach

                @foreach ($newsDetails->Subcategory as $subcat)
                    <li class="breadcrumb-item"><a
                            href="{{ $baseUrl . $category->slug . '/' . $subcat->slug }}">{{ $subcat->subcat_name }}</a>
                    </li>
                @endforeach

                <li class="breadcrumb-item">{{ $newsDetails->title }}</li>
            </ul>
        </div>
    </div>

    <div class="container">
        @if (!empty($category->catname))
            <a href="{{ $baseUrl . $category->slug }}" role="button" class="detailbtn">{{ $category->catname }}</a>
        @endif

        @if (!empty($subcat->subcat_name))
            <a href="{{ $baseUrl . $category->slug . '/' . $subcat->slug }}" role="button"
                class="detailbtn">{{ $subcat->subcat_name }}</a>
        @endif

        <h1>{{ $newsDetails->title }}</h1>
        <div class="authblk">
            <div class="autimg"><img src="{{ $authorImage }}" alt="{{ $author_details->title }}" /></div>
            <div class="autinfo">
                <span><a href="{{ $authorUrl }}">{{ $author_details->title }}</a></span>
                {{ date('M d, Y', strtotime($newsDetails->created_at)) }} -
                {{ app\Http\Controllers\InsightsController::calculateReadTime($newsDetails) }} min read
            </div>
        </div>
    </div>

    <div class="contentarea">
        <div class="imgblk">
            <img src="{{ $ogimage }}" alt="{{ $newsDetails->title }} image" />
        </div>

        @include('layout.insights.socailcomment')

        <div class="shortdes">{{ $newsDetails->shortDesc }}</div>

        {{-- <div class="articlecontent">
        {!! nl2br(e($newsDetails->content)) !!}
    </div> --}}
        <div class="articlecontent">
            @php
                $custom_data = explode("\r\n", $newsDetails->content);
                if (count($custom_data) == 1) {
                    $articleData[0] =
                        $custom_data[0] .
                        '
        <div id="v-franchiseindia"></div>
        <script>
            (function(v, d, o, ai) {
                ai = d.createElement("script");
                ai.defer = true;
                ai.async = true;
                ai.src = v.location.protocol + o;
                d.head.appendChild(ai);
            })
            (window, document, "//a.vdo.ai/core/v-franchiseindia/vdo.ai.js");
        </script>
        ';
                } else {
                    $counter = 0;
                    foreach ($custom_data as $cdata) {
                        if ($counter == 2) {
                            $articleData[] =
                                $cdata .
                                '
        <div id="v-franchiseindia"></div>
        <script>
            (function(v, d, o, ai) {
                ai = d.createElement("script");
                ai.defer = true;
                ai.async = true;
                ai.src = v.location.protocol + o;
                d.head.appendChild(ai);
            })(window, document, "//a.vdo.ai/core/v-franchiseindia/vdo.ai.js");
        </script>
        ';
                        } else {
                            $articleData[] = $cdata;
                        }
                        $counter++;
                    }
                }
                $resultArticle = implode("\r\n", $articleData);
            @endphp
            {!! $resultArticle !!}
        </div>
        @if (!empty($franchiseData))
            <div style="display: flex; flex-wrap: wrap; gap: 15px; justify-content: center; padding: 20px;">
                <h4 style="margin-top:15px">Interested in Franchise:</h4>

                @foreach ($franchiseData as $franchise)
                    <div
                        style="background-color: #f9f9f9; border: 1px solid #ddd; padding: 15px 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: center; min-width: 95px; max-width: 200px;">
                        <a href="http://franchiseindia.com/brands/{{ strtolower($franchise['profile_name']) }}.{{ $franchise['fran_detail_id'] }}"
                            target="_blank" style="text-decoration: none; color: #333; font-weight: bold; font-size: 16px;">
                            {{ $franchise['company_name'] }}
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="tag-block">
            <ul class="tag-list">
                @if (!empty($assocTags) && isset($assocTags))
                    @foreach ($assocTags as $assocTagsData)
                        @php
                            $tags = str_replace(' ', '-', $assocTagsData->name);
                            $tagslug = strtolower($tags);
                        @endphp
                        <li><a
                                href="{{ Config('constants.MainDomain') . '/insights/' . $locale . '/tag/' . $tagslug }}">{{ $assocTagsData->name }}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="contentarea">
            @include('layout.insights.subscribenewsletter')
        </div>
    </div>
@include('layout.insights.magblock') @endsection
