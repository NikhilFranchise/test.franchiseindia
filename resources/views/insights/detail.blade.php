@extends('layout.insights.master')
@section('seoTitle', $newsDetails->title)
@section('header-schema')
    @include('insights.schema', ['newsDetails' => $newsDetails])
@endsection
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
    $newsUrl =
        $baseUrl . strtolower($newsDetails->insight_type) . '/' . $newsDetails->slug . '.' . $newsDetails->news_id;
    //$author_details
    $authorSlug = $author_details->slug ?? strtolower(str_replace(' ', '-', $author_details->title));
    //dd($authorSlug);
    $authorUrl = Config('constants.MainDomain') . '/insights/author/' . $authorSlug . '-' . $author_details->author_id;
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
    <div class="maininnver homeh">
        <div class="inner-top-head">
            <div class="container">
                <h1>{{ $newsDetails->title }}</h1>
            </div>
        </div>
        <!-- DESKTOP TOP AD PLACEMENT  -->
        <div class="container">
            @desktop
                <div class="inner-article-detail-desktop-top-ad">
                    <div id='adslot728x90_ATF'>
                        <script>
                            googletag.cmd.push(function() {
                                googletag.display('adslot728x90_ATF');
                            });
                        </script>
                    </div>
                </div>
            @enddesktop
        </div>
        <!-- DESKTOP TOP AD PLACEMENT  -->
    </div>
    <div class="contentwrapper">
        <div class="container">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/insights') }}" class="tip-bottom">Home</a>
                        </li>
                        @php
                            $insightTypeMap = [
                                'News' => "{$locale}/topstories",
                                'Article' => "{$locale}/industryfocus",
                                'Event' => "{$locale}/events_reports",
                                'Report' => "{$locale}/events_reports",
                                'Interview' => "{$locale}/interviews",
                            ];
                            $typeURL = $insightTypeMap[$newsDetails->insight_type] ?? null;
                        @endphp
                        <li class="breadcrumb-item">
                            <a href="{{ url("/insights/{$typeURL}") }}"
                                class="tip-bottom">{{ $newsDetails->insight_type }}</a>
                        </li>
                        @foreach ($newsDetails->category as $category)
                            <li class="breadcrumb-item"><a href="{{ $baseUrl . $category->slug }}"
                                    class="tip-bottom">{{ $category->catname }}</a></li>
                        @endforeach
                        @foreach ($newsDetails->Subcategory as $subcat)
                            <li class="breadcrumb-item"><a
                                    href="{{ $baseUrl . $category->slug . '/' . $subcat->slug }}">{{ $subcat->subcat_name }}</a>
                            </li>
                        @endforeach
                        @desktop
                            <li class="breadcrumb-item">{!! html_entity_decode(\Illuminate\Support\Str::words($newsDetails->title, 8, ' ...'), ENT_QUOTES, 'UTF-8') !!}</li>
                        @enddesktop
                    </ul>
                    <h2>{{ $newsDetails->title }}</h2>
                    <div class="cont-top">
                        <div class="article-features">
                            <div class="article-date">
                                <div class="article-logo">
                                    <img src="{{ $authorImage }}" width="51" height="51" alt="Indian Retailer"
                                        loading="lazy" class="">
                                </div>
                                <div class="article-time">
                                    BY -
                                    <a href="{{ $authorUrl }}">{{ $author_details->title }}</a>
                                    <br>
                                    <span>
                                        {{ $author_details->designation }}
                                    </span>
                                    <span>
                                        {{ date('M d, Y', strtotime($newsDetails->created_at)) }} /
                                        <img src="{{ url('/insight-new/images/vicon.webp') }}" height="10"
                                            width="17" alt="Franchise Insights" class="img-fluid">
                                        {{ $newsDetails->views }}
                                        / {{ app\Http\Controllers\InsightsController::calculateReadTime($newsDetails) }}
                                        Min Read
                                    </span>
                                </div>
                            </div>
                            <div class="content-share">
                                <ul>
                                    <li>
                                        <a target="_blank"
                                            href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($newsUrl) }}">
                                            <img src="{{ url('insight-new/images/fshare.webp') }}" height="25"
                                                width="25" loading="lazy" alt="IR">
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank"
                                            href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ $newsUrl }}">
                                            <img src="{{ url('insight-new/images/flink.webp') }}" height="25"
                                                width="25" loading="lazy" alt="Insights">
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="https://x.com/intent/post?url={{ $newsUrl }}">
                                            <img src="{{ url('insight-new/images/ftwit.webp') }}" height="25"
                                                width="25" loading="lazy" alt="Insights">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="follow-us">
                                <a href="" target="_blank">
                                    Follow Us
                                    <img src="{{ url('insight-new/images/follow.webp') }}" loading="lazy"
                                        alt="Franchise India" width="11" height="10">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="content-main">
                        <img src="{{ $ogimage }}" class="img-fluid" alt="{{ $newsDetails->title }}">
                        {{-- ads for mobile & desktop --}}
                        <div class="inner-article-detail-desktop-ad fad">
                            <div id="adslotInline_3_300x250">
                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.display("adslotInline_3_300x250");
                                    });
                                </script>
                            </div>
                        </div>
                        {{-- ads for mobile & desktop --}}
                        <div class="shortdes">{{ $newsDetails->shortDesc }}</div>
                        <div class="articlecontent">
                            @php
                                $custom_data = explode("\r\n", $newsDetails->content); // Split content into paragraphs
                                
                                // Exclude paragraphs with tables from the total paragraph count
                                $filteredParagraphs = array_filter($custom_data, function($cdata) {
                                    return stripos($cdata, '<table') === false;
                                });
                                $totalParagraphs = count($filteredParagraphs);
                        
                                $articleData = []; // Initialize array for final content with ads
                                $adSlots = [
                                    'adslotInline_1_300x250',
                                    'adslotInline_2_300x250',
                                    'adslotInline_3_300x250',
                                    'adslotInline_4_300x250',
                                    'adslotInline_5_300x250',
                                ];
                                $totalAdSlots = count($adSlots); // Total available ad slots
                                $adsInserted = 0; // Counter for ads inserted
                                $adInterval = 5; // Default ad interval
                                $lastAdIndex = -1; // Track last ad index to prevent consecutive ads
                        
                                // Determine the ad interval based on the filtered content length
                                if ($totalParagraphs > 100) {
                                    $adInterval = 10;
                                } elseif ($totalParagraphs >= 50) {
                                    $adInterval = 8;
                                } elseif ($totalParagraphs >= 10) {
                                    $adInterval = 5;
                                }
                        
                                // Calculate the number of ads to be inserted
                                $adInsertCount = floor($totalParagraphs / $adInterval);
                                $nonTableParagraphCount = 0;
                                $adsPlacedIndexes = [];
                        
                                foreach ($custom_data as $index => $cdata) {
                                    $isTable = stripos($cdata, '<table') !== false;
                        
                                    // Add the actual paragraph content
                                    $articleData[] = $cdata;
                        
                                    // Insert an ad before the table if it hasn't been placed consecutively
                                    if ($isTable && $adsInserted < $totalAdSlots && !in_array($index - 1, $adsPlacedIndexes)) {
                                        $adSlotId = $adSlots[$adsInserted % $totalAdSlots];
                                        $articleData[] = '<div class="inner-article-detail-desktop-ad">
                                            <div id="' . $adSlotId . '">
                                                <script>
                                                    googletag.cmd.push(function() {
                                                        googletag.display("' . $adSlotId . '");
                                                    });
                                                </script>
                                            </div>
                                        </div>';
                                        $adsInserted++;
                                        $adsPlacedIndexes[] = $index;
                                    }
                        
                                    // Insert an ad after the table if it hasn't been placed consecutively
                                    if ($isTable && $adsInserted < $totalAdSlots && !in_array($index, $adsPlacedIndexes)) {
                                        $adSlotId = $adSlots[$adsInserted % $totalAdSlots];
                                        $articleData[] = '<div class="inner-article-detail-desktop-ad">
                                            <div id="' . $adSlotId . '">
                                                <script>
                                                    googletag.cmd.push(function() {
                                                        googletag.display("' . $adSlotId . '");
                                                    });
                                                </script>
                                            </div>
                                        </div>';
                                        $adsInserted++;
                                        $adsPlacedIndexes[] = $index;
                                    }
                        
                                    // Count only non-table paragraphs for ad insertion
                                    if (!$isTable) {
                                        $nonTableParagraphCount++;
                                        if ($adsInserted < $adInsertCount && $nonTableParagraphCount % $adInterval == 0 && !in_array($index - 1, $adsPlacedIndexes)) {
                                            $adSlotId = $adSlots[$adsInserted % $totalAdSlots];
                                            $articleData[] = '<div class="inner-article-detail-desktop-ad">
                                                <div id="' . $adSlotId . '">
                                                    <script>
                                                        googletag.cmd.push(function() {
                                                            googletag.display("' . $adSlotId . '");
                                                        });
                                                    </script>
                                                </div>
                                            </div>';
                                            $adsInserted++;
                                            $adsPlacedIndexes[] = $index;
                                        }
                                    }
                                }
                        
                                // Ensure at least one ad is placed near the end of the article
                                if ($adsInserted < $totalAdSlots) {
                                    $adSlotId = $adSlots[$adsInserted % $totalAdSlots];
                                    $articleData[] = '<div class="inner-article-detail-desktop-ad">
                                        <div id="' . $adSlotId . '">
                                            <script>
                                                googletag.cmd.push(function() {
                                                    googletag.display("' . $adSlotId . '");
                                                });
                                            </script>
                                        </div>
                                    </div>';
                                    $adsInserted++;
                                }
                        
                                // Combine the content with ads into a single string
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
                                            target="_blank"
                                            style="text-decoration: none; color: #333; font-weight: bold; font-size: 16px;">
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
                    </div>
                    <div class="contentarea">
                        @include('layout.insights.subscribenewsletter')
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="right-wrap">
                        {{-- ads top right sidebar --}}
                        <div class="ad-right">
                            <div id='adslot300x250_ATF'>
                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.display('adslot300x250_ATF');
                                    });
                                </script>
                            </div>
                        </div>
                        {{-- ads top right sidebar --}}
                        <div class="popular-articles">
                            <h3>Trending Articles</h3>
                            <ul>
                                @forelse ($trendingArticles as $trend)
                                    <li>
                                        @foreach ($trend->category as $cat)
                                            @php
                                                $locale = App::getLocale();
                                                $catURL =
                                                    Config('constants.MainDomain') . "/insights/{$locale}/{$cat->slug}";
                                                $baseUrl1 =
                                                    Config('constants.MainDomain') .
                                                    "/insights/$locale/" .
                                                    strtolower($trend->insight_type) .
                                                    '/';
                                                $trendUrl = $baseUrl1 . $trend->slug . '.' . $trend->news_id;
                                            @endphp
                                            <div class="popular-sub">
                                                <a href="{{ $catURL }}"
                                                    hreflang="{{ $locale }}">{{ $cat->catname }}</a>
                                            </div>
                                        @endforeach
                                        <div class="popular-head">
                                            <a href="{{ $trendUrl }}">{{ $trend->title }}</a>
                                        </div>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                        <div class="ad-right-sticky">
                            <div id="adslot300x250_1">
                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.display('adslot300x250_1');
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('layout.insights.magblock')
@endsection
