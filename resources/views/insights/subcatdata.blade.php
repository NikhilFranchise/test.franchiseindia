@extends('layout.insights.master')

@section('content')
    <div class="maininnver homeh">
        <div class="container">
            {{--  @dd($subcatData)  --}}
            <h1 class="cathead">{{ $subcatData->subcat_name }}</h1>

        </div>
        <div class="listblk">
            <div class="container">
                <ul class="artilsit">

                    @foreach ($contentData as $article)
                        @php
                            // Generate article details
                            $image = \App\Http\Controllers\InsightsController::createimgurl($article->image);
                            $locale = App::getLocale();
                            $url =
                                Config('constants.MainDomain') .
                                '/insights/' .
                                $locale .
                                '/' .
                                strtolower($article->insight_type) .
                                '/' .
                                $article->slug .
                                '.' .
                                $article->news_id;

                            // Default author details
                            $authorname = 'Franchise India bureau';
                            $author_image = url('images/defaultuser.png');
                            $authorUrl = '#';

                            // Fetch author details (if available)
                            if (!empty($article->author) && $article->author->isNotEmpty()) {
                                $author = $article->author->first();
                                $authorname = $author->title ?? 'Franchise India bureau';
                                $author_image = !empty($author->image)
                                    ? \App\Http\Controllers\InsightsController::authorImageurl($author->image)
                                    : $author_image;
                                if (!empty($article->author->slug)) {
                                    $slug = strtolower(str_replace(' ', '-', $authorname));
                                } else {
                                    $slug = $author->slug;
                                }
                                // $path = $locale === 'en' ? '/insights/en/author/' : '/insights/hi/author/';
                                $authorUrl = Config('constants.MainDomain') .'/insights/author/' . $slug . '-' . $author->author_id;
                            }
                        @endphp

                        <li>
                            <div class="artimgblk">
                                <a href="{{ $url }}"><img src="{{ $image }}"
                                        alt="{{ $article->title }} image" /></a>
                            </div>
                            <div class="artcontent">
                                <div class="haedname"><a href="{{ $url }}">{{ $article->title }}</a></div>
                                <div class="authblk cot">
                                    <div class="autimg"><img src="{{ $author_image }}" alt="{{ $authorname }}" /></div>
                                    <div class="autinfo">
                                        @if ($authorUrl)
                                            <span><a href="{{ $authorUrl }}">{{ $authorname }}</a></span>
                                        @else
                                            <span>{{ $authorname }}</span>
                                        @endif
                                        {{ date('M d, Y', strtotime($article->created_at)) }} -
                                        {{ \App\Http\Controllers\InsightsController::calculateReadTime($article) }} min
                                        read
                                    </div>
                                </div>
                                <div class="stext">
                                    {{ \Illuminate\Support\Str::words(strip_tags($article->content), 55, ' ...') }}
                                </div>
                                <div class="scbk">
                                    <div class="shrblk">
                                        <span class="inshrblk">
                                            <a href="">
                                                <img src="{{ url('insight-new/images/smallshare.svg') }}" class="inimg" />
                                                Share
                                                <div class="sfv">
                                                    @foreach ([
                                                        'facebook' => '/insight-new/images/facebookcard.svg',
                                                        'twitter' => '/insight-new/images/twittercard.svg',
                                                        'instagram' => 'https://www.franchiseindia.com/newhomepage/assets/img/instagram-icon.svg',
                                                        'youtube' => 'https://www.franchiseindia.com/newhomepage/assets/img/you-tube-icon.svg'
                                                    ] as $platform => $icon)
                                                        <div class="innersfv" onclick="window.open('https://www.{{ $platform }}.com/FranchiseIndia', '_blank')">
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
                <div class="video-pagination">

                    {{ $contentData->links('pagination::bootstrap-4') }}

                </div>
            </div>

        </div>


        <!-- mag block strat  -->
        @include('layout.insights.magblock')
        <!-- mag block end   -->

        <!-- another list start here   -->
        <div class="listblk">

        </div>

        <!-- another list end here  -->



        @include('layout.insights.brandlist')
    </div>
@endsection
