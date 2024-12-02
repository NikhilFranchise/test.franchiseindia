@extends('layout.insights.master')

@section('content')
    <div class="maininnver homeh">
        <div class="container">
            <h1 class="cathead">
                @if (App::getLocale() == 'en')
                   Top Trending Stories
                @else
                    शीर्ष रुझान वाले प्रमुख समाचार (लेख)
                @endif
            </h1>
        </div>

        <div class="listblk">
            <div class="container">
                <ul class="artilsit">
                    @foreach ($insightstories as $article)
                        @php
                            //$image = Config('constants.awsS3Url') . $article->image;
                            if (App::getLocale() == 'en') {
                                $url =
                                    Config('constants.MainDomain') .
                                    '/insights/en/' .
                                    strtolower($article->insight_type) .
                                    '/' .
                                    $article->slug .
                                    '.' .
                                    $article->news_id;
                            } else {
                                $url =
                                    Config('constants.MainDomain') .
                                    '/insights/hi/' .
                                    strtolower($article->insight_type) .
                                    '/' .
                                    $article->slug .
                                    '.' .
                                    $article->news_id;
                            }
                            // Initialize default values
                            $authorname = '';
                            $authorUrl = '';
                            $author_image = url('images/defaultuser.png');

                            // Check if there are authors
                            if ($article->author->isNotEmpty()) {
                                $author = $article->author->first();
                                $authorname = $author->title;
                                if (!empty($author->image)) {
                                    $author_image =
                                        'https://franchiseindia.s3.ap-south-1.amazonaws.com' . $author->image;
                                }
                                if (!empty($author->slug)) {
                                    $authorUrl =
                                        Config('constants.MainDomain') .
                                        '/insights/author/' .
                                        $author->slug .
                                        '-' .
                                        $author->author_id;
                                } else {
                                    $slug = strtolower(str_replace(' ', '-', $authorname));
                                    $authorUrl =
                                        Config('constants.MainDomain') .
                                        '/insights/author/' .
                                        $slug .
                                        '-' .
                                        $author->author_id;
                                }
                            }
                        @endphp
                        <li>
                            <div class="artimgblk">
                                <a href="{{ $url }}"><img
                                        src="{{ \App\Http\Controllers\InsightsController::createimgurl($article->image) }}"
                                        alt="{{ $article->title . ' image' }}" /></a>
                            </div>
                            <div class="artcontent">
                                <div class="haedname"><a href="{{ $url }}">{{ $article->title }}</a></div>
                                <div class="authblk cot">
                                    <div class="autimg"><img src="{{ $author_image }}" alt="{{ $authorname }}" /></div>
                                    <div class="autinfo">
                                        <span><a href="{{ $authorUrl }}">{{ $authorname }}</a></span>
                                        {{ date('M d, Y', strtotime($article->created_at)) }} -
                                        {{ \App\Http\Controllers\InsightsController::calculateReadTime($article) }} min
                                        read
                                    </div>
                                </div>
                                <div class="stext">
                                    {{ html_entity_decode(strip_tags(\Illuminate\Support\Str::words($article->content, 55, ' ...')), ENT_QUOTES | ENT_HTML5, 'UTF-8') }}
                                </div>
                                <div class="scbk">
                                    <div class="shrblk">
                                        <span class="inshrblk">
                                            <a href="">
                                                <img src="{{ url('insight-new/images/smallshare.svg') }}"
                                                    class="inimg" />Share
                                                <div class="sfv">
                                                    <div class="innersfv"
                                                        onclick="window.open('https://www.facebook.com/FranchiseIndiaMedia','_blank')">
                                                        <img src="{{ url('insight-new/images/facebookcard.svg') }}" />
                                                    </div>
                                                    <div class="innersfv"
                                                        onclick="window.open('https://twitter.com/FranchiseIndia','_blank')">
                                                        <img src="{{ url('insight-new/images/twittercard.svg') }}" />
                                                    </div>
                                                    <div class="innersfv"
                                                        onclick="window.open('https://www.instagram.com/franchiseindia_/','_blank')">
                                                        <img
                                                            src="https://www.franchiseindia.com/newhomepage/assets/img/instagram-icon.svg" />
                                                    </div>
                                                    <div class="innersfv"
                                                        onclick="window.open('https://www.youtube.com/user/FranchiseIndia','_blank')">
                                                        <img
                                                            src="https://www.franchiseindia.com/newhomepage/assets/img/you-tube-icon.svg" />
                                                    </div>
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
                    {{ $insightstories->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

        <!-- mag block start -->
        @include('layout.insights.magblock')
        <!-- mag block end -->

        <!-- another list start here -->
        <div class="listblk">
        </div>
        @include('layout.insights.brandlist')
    </div>
@endsection
