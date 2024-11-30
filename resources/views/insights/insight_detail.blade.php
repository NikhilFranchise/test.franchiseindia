@extends('layout.insights.master')
@section('seoTitle', $newsDetails->title)
@section('seoDesc', $newsDetails->shortDesc)
@section('seoKeywords', $newsDetails->kicker)
@section('canonicalUrl', url()->current())
@php
    //$ogimage = Config('constants.awsS3Url') . $newsDetails->image;
    $ogimage = \App\Http\Controllers\InsightsController::createimgurl($newsDetails->image);

    $imageData = file_get_contents($ogimage);

    // Get image size from the image data
    $imageDetails = getimagesizefromstring($imageData);
    if ($imageDetails) {
        $width = $imageDetails[0];
        $height = $imageDetails[1];
        //dd($ogimage, $width, $height);
    }
    //dd($imageDetails);
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
        @php
            //$image = Config('constants.awsS3Url') . $newsDetails[0]['image'];
            $image = \App\Http\Controllers\InsightsController::createimgurl($newsDetails->image);
            $locale = App::getLocale(); // Get current locale
            $baseUrl = Config('constants.MainDomain') . '/insights/' . $locale . '/';

            // Generate the news URL
            $url = $baseUrl . $newsDetails->slug . '.' . $newsDetails->news_id;

            // Generate the author URL
            if (!empty($author_details) && $author_details->slug) {
                $authorSlug = $author_details->slug;
            } else {
                $authorSlug = strtolower(str_replace(' ', '-', $author_details->title));
            }

            $authorurl = $baseUrl . 'author/' . $authorSlug . '-' . $author_details->author_id;

            if (!empty($author_details->image)) {
                /* $author_image = 'https://franchiseindia.s3.ap-south-1.amazonaws.com' . $author_details->image; */
                $author_image = \App\Http\Controllers\InsightsController::authorImageurl($author_details->image);
            } else {
                $author_image = url('images/defaultuser.png');
            }

        @endphp
        <div class="contentblk">
            <div class="container">
                <ul class="breadcrumb">
                    @if (App::getLocale() == 'en')
                        <li class="breadcrumb-item"><a href="{{ url('/insights') }}" class="tip-bottom">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/insights') }}"
                                class="tip-bottom">{{ $newsDetails->insight_type }}</a></li>
                        @foreach ($newsDetails->category as $category)
                            @php
                                $catslug = Config('constants.MainDomain') . '/insights/en/' . $category->slug;
                                $catname = $category->catname;
                            @endphp
                            <li class="breadcrumb-item"><a href="{{ $catslug }}"
                                    class="tip-bottom">{{ $catname }}</a>
                            </li>
                        @endforeach
                        @foreach ($newsDetails->Subcategory as $subcat)
                            @php
                                $subcatslug =
                                    Config('constants.MainDomain') .
                                    '/insights/en/' .
                                    $category->slug .
                                    '/' .
                                    $subcat->slug;
                                $subcatname = $subcat->subcat_name;
                            @endphp
                            <li class="breadcrumb-item active"><a href="{{ $subcatslug }}">{{ $subcatname }}</a></li>
                        @endforeach
                        <li class="breadcrumb-item">{{ $newsDetails->title }}</li>
                    @else
                        <li class="breadcrumb-item"><a href="{{ url('/insights/hindi') }}" class="tip-bottom">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/insights/hindi') }}"
                                class="tip-bottom">{{ $newsDetails->insight_type }}</a></li>
                        @foreach ($newsDetails->category as $category)
                            @php
                                $catslug = Config('constants.MainDomain') . '/insights/hi/' . $category->slug;
                                $catname = $category->catname;
                            @endphp
                            <li class="breadcrumb-item"><a href="{{ $catslug }}"
                                    class="tip-bottom">{{ $catname }}</a>
                            </li>
                        @endforeach
                        @foreach ($newsDetails->Subcategory as $subcat)
                            @php
                                $subcatslug =
                                    Config('constants.MainDomain') .
                                    '/insights/hi/' .
                                    $category->slug .
                                    '/' .
                                    $subcat->slug;
                                $subcatname = $subcat->subcat_name;
                            @endphp
                            <li class="breadcrumb-item active"><a href="{{ $subcatslug }}">{{ $subcatname }}</a></li>
                        @endforeach
                        <li class="breadcrumb-item">{{ $newsDetails->title }}</li>
                    @endif
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
            <h1>{{ $newsDetails->title }}</h1>
            <div class="authblk">
                <div class="autimg"><img src="{{ $author_image }}" alt="{{ $author_details->title }} " /></div>
                <div class="autinfo">
                    <span><a href="{{ $authorurl }}">{{ $author_details->title }}</a></span>
                    {{ date('M d, Y', strtotime($newsDetails->created_at)) }} -
                    {{ app\Http\Controllers\InsightsController::calculateReadTime($newsDetails) }} min read
                </div>
            </div>
        </div>
    </div>

    <div class="contentarea">
        <div class="imgblk">
            <img src="{{ !empty($image) ? $image : 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/content/fi/int/5ff40e6aaa3da.jpeg' }}"
                alt="{{ $newsDetails->title . ' image' }}" />
        </div>
        @include('layout.insights.socailcomment')
        <div class="shortdes">
            {{ $newsDetails->shortDesc }}
        </div>
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
        <div class="tag-block">
            <ul class="tag-list">
                @if (!empty($assocTags) && isset($assocTags))
                    @foreach ($assocTags as $assocTagsData)
                        @php
                            $tags = str_replace(' ', '-', $assocTagsData->name);
                            $tagslug = strtolower($tags);
                        @endphp
                        <li><a
                                href="{{ Config('constants.MainDomain') . '/insights/tag/' . $tagslug }}">{{ $assocTagsData->name }}</a>
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
