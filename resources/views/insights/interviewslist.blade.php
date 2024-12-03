@extends('layout.insights.master')
@section('content')
    <div class="maininnver homeh">
        <div class="container">
            <h1 class="cathead">
                {{ App::getLocale() == 'en' ? 'Executive Interviews' : 'कार्यकारी साक्षात्कार' }}
            </h1>
        </div>
        <div class="listblk">
            <div class="container">
                <ul class="artilsit">
                    @foreach ($interviews as $article)
                        @php
                            $locale = App::getLocale();
                            $url = Config('constants.MainDomain') . "/insights/{$locale}/" . strtolower($article->insight_type) . "/{$article->slug}.{$article->news_id}";

                            // Author details preparation
                            $author = $article->author[0] ?? null;
                            $authorname = $author->title ?? 'Franchise India Bureau';
                            $slug = $author && $author->slug ? $author->slug : strtolower(str_replace(' ', '-', $authorname));
                            $authorUrl =  $author
                            ? Config('constants.MainDomain') . "/insights/{$locale}/author/{$slug}-{$author->author_id}"
                            : '#';
                            $author_image = $author && !empty($author->image)
                                ? \App\Http\Controllers\InsightsController::authorImageurl($author->image)
                                : url('images/defaultuser.png');
                        @endphp
                        <li>
                            <div class="artimgblk">
                                <a href="{{ $url }}">
                                    <img src="{{ \App\Http\Controllers\InsightsController::createimgurl($article->image) }}" alt="{{ $article->title }} image" />
                                </a>
                            </div>
                            <div class="artcontent">
                                <div class="haedname">
                                    <a href="{{ $url }}">
                                        {!! html_entity_decode(\Illuminate\Support\Str::words($article->title, 10, ' ...'), ENT_QUOTES, 'UTF-8') !!}
                                    </a>
                                </div>
                                <div class="authblk cot">
                                    <div class="autimg">
                                        <img src="{{ $author_image }}" alt="{{ $authorname }}" />
                                    </div>
                                    <div class="autinfo">
                                        <span><a href="{{ $authorUrl }}">{{ $authorname }}</a></span>
                                        {{ date('M d, Y', strtotime($article->created_at)) }} - {{ \App\Http\Controllers\InsightsController::calculateReadTime($article) }} min read
                                    </div>
                                </div>
                                <div class="stext">
                                    {!! html_entity_decode(\Illuminate\Support\Str::words($article->content, 55, ' ...'), ENT_QUOTES, 'UTF-8') !!}
                                </div>
                                <div class="scbk">
                                    <div class="shrblk">
                                        <span class="inshrblk">
                                            <a href="">
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
                    {{ $interviews->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
        <!-- Include additional blocks -->
        @include('layout.insights.magblock')
        @include('layout.insights.brandlist')
    </div>
@endsection
