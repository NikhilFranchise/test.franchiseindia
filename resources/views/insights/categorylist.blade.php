@extends('layout.insights.master')
@section('content')
    <div class="maininnver homeh">
        <div class="container">
            <h1 class="cathead">{{ $category['catname'] }}</h1>
        </div>
        <div class="listblk">
            <div class="container">
                <ul class="artilsit">
                    @foreach ($insightcategories as $article)
                        @php
                            $locale = App::getLocale();
                            $catgry = Config('constants.MainDomain') . "/insights/{$locale}/{$category['slug']}";
                            $image = \App\Http\Controllers\InsightsController::createimgurl($article->image);
                            $url = Config('constants.MainDomain') . "/insights/{$locale}/" . strtolower($article->insight_type) . "/{$article->slug}.{$article->news_id}";

                            // Default author values
                            $authorname = 'Franchise India Bureau';
                            $authorUrl = '#';
                            $author_image = url('images/defaultuser.png');

                            // Set author details if available
                            if ($article->author->isNotEmpty()) {
                                $author = $article->author->first();
                                $authorname = $author->title ?? 'Franchise India Bureau';
                                $slug = $author->slug ?? strtolower(str_replace(' ', '-', $authorname));
                                $authorUrl = Config('constants.MainDomain') . "/insights/{$locale}/author/{$slug}-{$author->author_id}";
                                $author_image = !empty($author->image)
                                    ? \App\Http\Controllers\InsightsController::authorImageurl($author->image)
                                    : $author_image;
                            }
                        @endphp
                        <li>
                            <div class="artimgblk">
                                <a href="{{ $url }}">
                                    <img src="{{ $image }}" alt="{{ $article->title }} image" />
                                </a>
                            </div>
                            <div class="artcontent">
                                <div class="catgryname">
                                    <a href="{{ $catgry }}">{{ ucwords($category['catname']) }}</a>
                                </div>
                                <div class="haedname">
                                    <a href="{{ $url }}">{{ $article->title }}</a>
                                </div>
                                <div class="authblk cot">
                                    <div class="autimg">
                                        <img src="{{ $author_image }}" alt="{{ $authorname }}" />
                                    </div>
                                    <div class="autinfo">
                                        <span><a href="{{ $authorUrl }}">{{ $authorname }}</a></span>
                                        {{ date('M d, Y', strtotime($article->created_at)) }} -
                                        {{ \App\Http\Controllers\InsightsController::calculateReadTime($article) }} min read
                                    </div>
                                </div>
                                <div class="stext">
                                    {!! html_entity_decode(strip_tags(\Illuminate\Support\Str::words($article->content, 55, ' ...'))) !!}
                                </div>
                                <div class="scbk">
                                    <div class="shrblk">
                                        <span class="inshrblk">
                                            <a href="#">
                                                <img src="{{ url('insight-new/images/smallshare.svg') }}" class="inimg" />Share
                                                <div class="sfv">
                                                    @foreach ([
                                                        'facebook' => 'facebookcard.svg',
                                                        'twitter' => 'twittercard.svg',
                                                        'instagram' => 'https://www.franchiseindia.com/newhomepage/assets/img/instagram-icon.svg',
                                                        'youtube' => 'https://www.franchiseindia.com/newhomepage/assets/img/you-tube-icon.svg'
                                                    ] as $platform => $icon)
                                                        <div class="innersfv" onclick="window.open('https://{{ $platform }}.com/FranchiseIndia', '_blank')">
                                                            <img src="{{ $icon }}" />
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="d-flex justify-content-center">
                    {{ $insightcategories->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
        <!-- Include additional blocks -->
        @include('layout.insights.magblock')
        @include('layout.insights.brandlist')
    </div>
@endsection
