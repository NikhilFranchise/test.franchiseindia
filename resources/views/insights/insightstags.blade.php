@extends('layout.insights.master')
@section('content')
    <div class="maininnver homeh">
        <div class="container">
            @php
                $locale = App::getLocale();
                $hindiCategoryNames = [
                    'Education' => 'शिक्षा व्यापार',
                    'Retail' => 'खुदरा व्यापार',
                    'Food and Beverage' => 'खाद्य और पेय पदार्थ',
                    'expansion' => 'व्यापार विस्तार',
                    'Launch' => 'नया लॉन्च',
                    'Startup' => 'व्यापार स्टार्टअप',
                    'funding' => 'व्यापार में अनुदान',
                    'expansion plans' => 'व्यापार विस्तार योजनाएँ',
                    'Franchise 100' => 'फ्रेंचाइज़ 100',
                    'investment' => 'व्यापार में निवेश',
                ];
                $displayName = $locale == 'en' ? ucwords($data->name) : $hindiCategoryNames[$seoTag->name] ?? $seoTag->name;
            @endphp

            <h1 class="cathead">{{ $displayName }}</h1>
        </div>

        <div class="listblk">
            <div class="container">
                <ul class="artilsit">
                    {{--  @dd($articlesList);  --}}
                    @foreach ($articlesList as $List)
                        @if (!empty($List))
                            @php
                                $image = \App\Http\Controllers\InsightsController::createimgurl($List->image);
                                $url =
                                    Config('constants.MainDomain') .
                                    '/insights/' .
                                    $locale .
                                    '/' .
                                    strtolower($List->insight_type) .
                                    '/' .
                                    $List->slug .
                                    '.' .
                                    $List->news_id;

                                // Default values for author details
                                $authorUrl = '';
                                $authorname = 'Franchise India Bureau';
                                $author_image = url('images/defaultuser.png');

                                // Fetch author details if available
                                if (!empty($List->author) && $List->author->isNotEmpty()) {
                                    $author = $List->author->first();
                                    $authorname = $author->title ?? 'Franchise India Bureau';
                                    $authorUrl =
                                        Config('constants.MainDomain') .
                                        '/insights/' .
                                        $locale .
                                        '/author/' .
                                        $author->slug .
                                        '-' .
                                        $author->author_id;
                                    $author_image = !empty($author->image)
                                        ? \App\Http\Controllers\InsightsController::authorImageurl($author->image)
                                        : $author_image;
                                }
                            @endphp
                            <li>
                                <div class="artimgblk">
                                    <a href="{{ $url }}"><img src="{{ $image }}"
                                            alt="{{ $List->title }} image" /></a>
                                </div>
                                <div class="artcontent">
                                    <div class="haedname"><a href="{{ $url }}">{{ $List->title }}</a></div>
                                    <div class="authblk cot">
                                        <div class="autimg"><img src="{{ $author_image }}" alt="{{ $authorname }}" />
                                        </div>
                                        <div class="autinfo">
                                            @if (!empty($authorUrl))
                                                <span><a href="{{ $authorUrl }}">{{ $authorname }}</a></span>
                                            @else
                                                <span>{{ $authorname }}</span>
                                            @endif
                                            {{ date('M d, Y', strtotime($List->created_at)) }} -
                                            {{ \App\Http\Controllers\InsightsController::calculateReadTime($List) }} min
                                            read
                                        </div>
                                    </div>
                                    <div class="stext">
                                        {{ \Illuminate\Support\Str::words(strip_tags($List->content), 55, ' ...') }}
                                    </div>
                                    <div class="scbk">
                                        <div class="shrblk">
                                            <span class="inshrblk">
                                                <a href="">
                                                    <img src="{{ url('insight-new/images/smallshare.svg') }}"
                                                        class="inimg" /> Share
                                                    <div class="sfv">
                                                        @foreach (['facebook', 'twitter', 'linkedin', 'mail'] as $platform)
                                                            <div class="innersfv" onclick="">
                                                                <img
                                                                    src="{{ url('insight-new/images/' . $platform . 'card.svg') }}" />
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="video-pagination">
                    {{ $articlesList->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
        @include('layout.insights.magblock')
        @include('layout.insights.brandlist')
    </div>
@endsection
