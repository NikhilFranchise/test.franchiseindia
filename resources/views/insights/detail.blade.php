@extends('layout.insights.master')

{{-- SEO and Schema Sections --}}
@section('seoTitle', $newsDetails->title)
@section('seoDesc', $newsDetails->shortDesc)
@section('seoKeywords', $newsDetails->kicker)
@section('canonicalUrl', url()->current())
@include('insights.schema', ['newsDetails' => $newsDetails])

@php
    // Calculate the Open Graph image URL (ideally, move this logic to the controller)
    $ogimage = !empty($newsDetails->image)
        ? \App\Http\Controllers\InsightsController::createimgurl($newsDetails->image)
        : 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/content/fi/int/5ff40e6aaa3da.jpeg';

    // Use null coalescing operator to set default dimensions if getimagesize fails
    $imageDetails = @getimagesize($ogimage);
    $width = $imageDetails[0] ?? 0;
    $height = $imageDetails[1] ?? 0;

    // Prepare URL components and locale-based paths
    $locale = App::getLocale();
    $baseUrl = Config('constants.MainDomain') . "/insights/{$locale}/";
    $newsUrl = $baseUrl . strtolower($newsDetails->insight_type) . '/' . $newsDetails->slug . '.' . $newsDetails->news_id;

    // Author details with fallback logic
    $authorSlug = $author_details->slug ?? strtolower(str_replace(' ', '-', $author_details->title));
    $authorUrl = Config('constants.MainDomain') . '/insights/author/' . $authorSlug . '-' . $author_details->author_id;
    $authorImage = !empty($author_details->image)
        ? \App\Http\Controllers\InsightsController::authorImageurl($author_details->image)
        : asset('images/defaultuser.png');
@endphp

{{-- Push external CSS (move inline CSS to a dedicated file, e.g. public/css/insights.css) --}}
{{-- @push('styles')
    <link rel="stylesheet" href="{{ asset('css/insights.css') }}">
@endpush --}}

{{-- Pass image details and article title to the parent layout --}}
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
    <!-- Desktop Top Ad Placement -->
    <div class="container">
        @desktop
            <div class="inner-article-detail-desktop-top-ad">
                <div id="adslot728x90_ATF">
                    <script>
                        googletag.cmd.push(function() {
                            googletag.display('adslot728x90_ATF');
                        });
                    </script>
                </div>
            </div>
        @enddesktop
    </div>
</div>

<div class="contentwrapper">
    <div class="container"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {{-- Breadcrumb Navigation --}}
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/insights') }}" class="tip-bottom">Home</a>
                    </li>
                    @php
                        $insightTypeMap = [
                            'News'      => "{$locale}/topstories",
                            'Article'   => "{$locale}/industryfocus",
                            'Event'     => "{$locale}/events_reports",
                            'Report'    => "{$locale}/events_reports",
                            'Interview' => "{$locale}/interviews",
                        ];
                        $typeURL = $insightTypeMap[$newsDetails->insight_type] ?? '';
                    @endphp
                    <li class="breadcrumb-item">
                        <a href="{{ url("/insights/{$typeURL}") }}" class="tip-bottom">{{ $newsDetails->insight_type }}</a>
                    </li>
                    @foreach ($newsDetails->category as $category)
                        <li class="breadcrumb-item">
                            <a href="{{ $baseUrl . $category->slug }}" class="tip-bottom">{{ $category->catname }}</a>
                        </li>
                    @endforeach
                    @foreach ($newsDetails->Subcategory as $subcat)
                        <li class="breadcrumb-item">
                            <a href="{{ $baseUrl . $category->slug . '/' . $subcat->slug }}">{{ $subcat->subcat_name }}</a>
                        </li>
                    @endforeach
                    @desktop
                        <li class="breadcrumb-item">{!! html_entity_decode(\Illuminate\Support\Str::words($newsDetails->title, 8, ' ...'), ENT_QUOTES, 'UTF-8') !!}</li>
                    @enddesktop
                </ul>

                {{-- Article Header and Author Info --}}
                <h2>{{ $newsDetails->title }}</h2>
                <div class="cont-top">
                    <div class="article-features">
                        <div class="article-date">
                            <div class="article-logo">
                                <img src="{{ $authorImage }}" width="51" height="51" alt="{{ $author_details->title }}" loading="lazy">
                            </div>
                            <div class="article-time">
                                BY - <a href="{{ $authorUrl }}">{{ $author_details->title }}</a><br>
                                <span>{{ $author_details->designation }}</span>
                                <span>
                                    {{ date('M d, Y', strtotime($newsDetails->created_at)) }} /
                                    <img src="{{ url('/insight-new/images/vicon.webp') }}" height="10" width="17" alt="Franchise Insights" class="img-fluid">
                                    {{ $newsDetails->views }} /
                                    {{ \App\Http\Controllers\InsightsController::calculateReadTime($newsDetails) }} Min Read
                                </span>
                            </div>
                        </div>
                        {{-- Social Share Buttons --}}
                        <div class="content-share">
                            <ul>
                                <li>
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($newsUrl) }}">
                                        <img src="{{ url('insight-new/images/fshare.webp') }}" height="25" width="25" loading="lazy" alt="Share on Facebook">
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ $newsUrl }}">
                                        <img src="{{ url('insight-new/images/flink.webp') }}" height="25" width="25" loading="lazy" alt="Share on LinkedIn">
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://x.com/intent/post?url={{ $newsUrl }}">
                                        <img src="{{ url('insight-new/images/ftwit.webp') }}" height="25" width="25" loading="lazy" alt="Share on Twitter">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        {{-- Follow Us Link --}}
                        <div class="follow-us">
                            <a href="#" target="_blank">
                                Follow Us <img src="{{ url('insight-new/images/follow.webp') }}" loading="lazy" alt="Follow" width="11" height="10">
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Main Article Content --}}
                <div class="content-main">
                    <img src="{{ $ogimage }}" class="img-fluid" alt="{{ $newsDetails->title }}">
                    <div class="inner-article-detail-desktop-ad fad">
                        <div id="adslotInline_3_300x250">
                            <script>
                                googletag.cmd.push(function() {
                                    googletag.display("adslotInline_3_300x250");
                                });
                            </script>
                        </div>
                    </div>
                    <div class="shortdes">{{ $newsDetails->shortDesc }}</div>
                    <div class="articlecontent">
                        @php
                            // Split the article content into paragraphs
                            $paragraphs = preg_split('/\r\n|\r|\n/', $newsDetails->content);
                            $totalParagraphs = count($paragraphs);
                            $adSlots = [
                                'adslotInline_1_300x250',
                                'adslotInline_2_300x250',
                                'adslotInline_3_300x250',
                                'adslotInline_4_300x250',
                                'adslotInline_5_300x250',
                            ];
                            $adsInserted = 0;
                            // Determine ad insertion interval based on total paragraphs
                            $adInterval = ($totalParagraphs >= 80) ? 8 : (($totalParagraphs >= 50) ? 5 : 3);
                            $contentBlocks = [];
                            foreach ($paragraphs as $index => $para) {
                                $contentBlocks[] = $para;
                                if ($adInterval > 0 && (($index + 1) % $adInterval === 0) && $adsInserted < count($adSlots)) {
                                    $slotId = $adSlots[$adsInserted];
                                    $contentBlocks[] = '<div class="inner-article-detail-desktop-ad">
                                        <div id="' . $slotId . '">
                                            <script>
                                                googletag.cmd.push(function() {
                                                    googletag.display("' . $slotId . '");
                                                });
                                            </script>
                                        </div>
                                    </div>';
                                    $adsInserted++;
                                }
                            }
                            $renderedContent = implode("\r\n", $contentBlocks);
                        @endphp
                        {!! $renderedContent !!}
                    </div>
                    {{-- Franchise Data Section --}}
                    @if (!empty($franchiseData))
                        <div class="franchise-section">
                            <h4 style="margin-top:15px">Interested in Franchise:</h4>
                            @foreach ($franchiseData as $franchise)
                                <div class="franchise-card">
                                    <a href="http://franchiseindia.com/brands/{{ strtolower($franchise['profile_name']) }}.{{ $franchise['fran_detail_id'] }}" target="_blank" style="text-decoration: none; color: #333; font-weight: bold; font-size: 16px;">
                                        {{ $franchise['company_name'] }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- Tags Section --}}
                    <div class="tag-block">
                        <ul class="tag-list">
                            @if (!empty($assocTags))
                                @foreach ($assocTags as $assocTag)
                                    @php
                                        $tagslug = strtolower(str_replace(' ', '-', $assocTag->name));
                                    @endphp
                                    <li><a href="{{ Config('constants.MainDomain') . '/insights/' . $locale . '/tag/' . $tagslug }}">{{ $assocTag->name }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                {{-- Newsletter Subscription --}}
                <div class="contentarea">
                    @include('layout.insights.subscribenewsletter')
                </div>
            </div>
            {{-- Sidebar with Trending Articles and Ads --}}
            <div class="col-md-4">
                <div class="right-wrap">
                    <div class="ad-right">
                        <div id="adslot300x250_ATF">
                            <script>
                                googletag.cmd.push(function() {
                                    googletag.display('adslot300x250_ATF');
                                });
                            </script>
                        </div>
                    </div>
                    <div class="popular-articles">
                        <h3>Trending Articles</h3>
                        <ul>
                            @forelse ($trendingArticles as $trend)
                                <li>
                                    @foreach ($trend->category as $cat)
                                        @php
                                            $catURL = Config('constants.MainDomain') . "/insights/{$locale}/{$cat->slug}";
                                            $baseUrl1 = Config('constants.MainDomain') . "/insights/{$locale}/" . strtolower($trend->insight_type) . '/';
                                            $trendUrl = $baseUrl1 . $trend->slug . '.' . $trend->news_id;
                                        @endphp
                                        <div class="popular-sub">
                                            <a href="{{ $catURL }}" hreflang="{{ $locale }}">{{ $cat->catname }}</a>
                                        </div>
                                    @endforeach
                                    <div class="popular-head">
                                        <a href="{{ $trendUrl }}">{{ $trend->title }}</a>
                                    </div>
                                </li>
                            @empty
                                <li>No trending articles available.</li>
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
    @include('layout.insights.magblock')
</div>
@endsection
