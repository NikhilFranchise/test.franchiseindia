@php
    $locale = App::getLocale();
@endphp

<div class="topeditoblk">

    {{-- ================= HEADER ================= --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="comhead">{{ $locale == 'en' ? 'Articles' : 'आर्टिकल' }}</div>
            </div>
        </div>
    </div>

    {{-- ================= ARTICLES SECTION ================= --}}
    <div class="container">
        <div class="row">

            {{-- LEFT — INDUSTRY FOCUS IMAGES --}}
            <div class="col-md-6">
                @foreach ($industry_focus as $focus)
                    @php
                        $image = insightsImageUrl($focus->image, $locale);
                        $url = insightsUrl($focus, $locale);
                    @endphp

                    <div class="editimgblk">
                        <div class="overleyt">
                            <div class="cote">
                                <div class="conlist">
                                    <a href="{{ $url }}">{{ trim($focus->title) }}</a>
                                </div>
                            </div>
                        </div>

                        <a href="{{ $url }}">
                            <img src="{{ $image }}" alt="{{ $focus->title }} image">
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- RIGHT — TOP 2 ARTICLES --}}
            <div class="col-md-6">
                <ul class="editlist">
                    @foreach ($industry_data->take(2) as $item)
                        @php
                            $image = insightsImageUrl($item->image, $locale);
                            $url = insightsUrl($item, $locale);
                        @endphp

                        <li>
                            <div class="imgbl">
                                <a href="{{ $url }}">
                                    <img src="{{ $image }}" alt="{{ $item->title }} image">
                                </a>
                            </div>

                            <div class="conblk">
                                @foreach ($item->category as $category)
                                    <div class="tagl">
                                        <a href="{{ insightsCategoryUrl($category) }}">
                                            {{ $category->catname }}
                                        </a>
                                    </div>
                                @endforeach

                                <div class="hname">
                                    <a href="{{ $url }}">{{ trim($item->title) }}</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>

        {{-- ================= REMAINING ARTICLE LIST ================= --}}
        <ul class="beloweditlist">
            @foreach ($industry_data->skip(2) as $item)
                @php
                    $image = insightsImageUrl($item->image, $locale);
                    $url = insightsUrl($item, $locale);
                @endphp

                <li>
                    <div class="imgbl">
                        <a href="{{ $url }}">
                            <img src="{{ $image }}" alt="{{ $item->title }} image">
                        </a>
                    </div>

                    <div class="conblk">
                        @foreach ($item->category as $category)
                            <div class="tagl">
                                <a href="{{ insightsCategoryUrl($category) }}">
                                    {{ $category->catname }}
                                </a>
                            </div>
                        @endforeach

                        <div class="hname">
                            <a href="{{ $url }}">{{ trim($item->title) }}</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>

    {{-- ================= REPORTS ================= --}}
    @if ($reports->count())
        <div class="slidereport">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="comhead">{{ $locale == 'en' ? 'Reports' : 'रिपोर्ट' }}</div>
                    </div>
                </div>

                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        @foreach ($reports->take(8) as $report)
                            @php
                                $image = insightsImageUrl($report->image, $locale);
                                $url = insightsUrl($report, $locale);
                            @endphp

                            <div class="swiper-slide">
                                <div class="innerlist">

                                    <div class="imgbl">
                                        <a href="{{ $url }}">
                                            <img src="{{ $image }}" alt="{{ $report->title }} image">
                                        </a>
                                    </div>

                                    <div class="conblk">

                                        @foreach ($report->category as $category)
                                            <div class="tagl">
                                                <a href="{{ insightsCategoryUrl($category) }}">
                                                    {{ $category->catname }}
                                                </a>
                                            </div>
                                        @endforeach

                                        <div class="hname">
                                            <a href="{{ $url }}">{{ $report->title }}</a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                </div>

            </div>
        </div>
    @endif

    {{-- ================= INTERVIEWS ================= --}}
    @if ($interview->count())
        <div class="slidercomman">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="comhead">{{ $locale == 'en' ? 'Interviews' : 'कार्यकारी साक्षात्कार' }}</div>
                    </div>
                </div>

                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        @foreach ($interview->take(8) as $item)
                            @php
                                $image = insightsImageUrl($item->image, $locale);
                                $url = insightsUrl($item, $locale);
                            @endphp

                            <div class="swiper-slide">
                                <div class="innerlist">

                                    <div class="imgbl">
                                        <a href="{{ $url }}">
                                            <img src="{{ $image }}" alt="{{ $item->title }} image">
                                        </a>
                                    </div>

                                    <div class="conblk">

                                        @foreach ($item->category as $category)
                                            <div class="tagl">
                                                <a href="{{ insightsCategoryUrl($category) }}">
                                                    {{ $category->catname }}
                                                </a>
                                            </div>
                                        @endforeach

                                        <div class="hname">
                                            <a href="{{ $url }}">{{ $item->title }}</a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                </div>

            </div>
        </div>
    @endif

</div>
