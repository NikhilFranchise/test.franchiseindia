@extends('layout.insights.master')

@section('content')
<div class="maininnver homeh">
    <div class="container">
        <h1 class="cathead">
            {{ App::getLocale() == 'en' ? 'Top Stories' : 'शीर्ष कहानियां' }}
        </h1>
    </div>

    <div class="listblk">
        <div class="container">
            <ul class="artilsit">
                @foreach ($insightstories as $article)
                    @php
                        $locale = App::getLocale();
                        $baseUrl = Config('constants.MainDomain') . '/insights/' . $locale;
                        $url = "{$baseUrl}/" . strtolower($article->insight_type) . "/{$article->slug}.{$article->news_id}";

                        $author = $article->author->first();
                        $authorname = $author->title ?? 'Franchise India Bureau';

                        $authorImage = $author && $author->image
                            ? 'https://franchiseindia.s3.ap-south-1.amazonaws.com' . $author->image
                            : url('images/defaultuser.png');

                        $authorSlug = $author->slug ? $author->slug : strtolower(Str::slug($authorname));
                        $authorUrl = "{$baseUrl}/author/{$authorSlug}-{$author->author_id}";
                    @endphp

                    {{--  @dd($authorname,$baseUrl, $authorUrl, $authorSlug);  --}}
                    <li>
                        <div class="artimgblk">
                            <a href="{{ $url }}">
                                <img src="{{ \App\Http\Controllers\InsightsController::createimgurl($article->image) }}"
                                     alt="{{ $article->title }} image" />
                            </a>
                        </div>
                        <div class="artcontent">
                            <div class="haedname">
                                <a href="{{ $url }}">{{ $article->title }}</a>
                            </div>
                            <div class="authblk cot">
                                <div class="autimg">
                                    <img src="{{ $authorImage }}" alt="{{ $authorname }}" />
                                </div>
                                <div class="autinfo">
                                    <span>
                                        <a href="{{ $authorUrl }}">{{ $authorname }}</a>
                                    </span>
                                    {{ date('M d, Y', strtotime($article->created_at)) }} -
                                    {{ \App\Http\Controllers\InsightsController::calculateReadTime($article) }} min read
                                </div>
                            </div>
                            <div class="stext">
                                {{ html_entity_decode(strip_tags(\Illuminate\Support\Str::words($article->content, 55, '...')), ENT_QUOTES | ENT_HTML5, 'UTF-8') }}
                            </div>
                            <div class="scbk">
                                <div class="shrblk">
                                    <span class="inshrblk">
                                        <a href="#">
                                            <img src="{{ url('insight-new/images/smallshare.svg') }}" class="inimg" />Share
                                            <div class="sfv">
                                                @foreach (['facebook' => 'FranchiseIndiaMedia', 'twitter' => 'FranchiseIndia', 'instagram' => 'franchiseindia_', 'youtube' => 'FranchiseIndia'] as $platform => $handle)
                                                    <div class="innersfv" onclick="window.open('https://www.{{ $platform }}.com/{{ $handle }}','_blank')">
                                                        <img src="{{ url("insight-new/images/{$platform}card.svg") }}" />
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
                {{ $insightstories->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

    @include('layout.insights.magblock')
    <div class="listblk"></div>
    @include('layout.insights.brandlist')
</div>
@endsection
