<div class="topeditoblk">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="comhead">{{ App::getLocale() == 'en' ? 'Articles' : 'आर्टिकल' }}</div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                @foreach ($industry_focus as $focus)
                    @php
                        $locale = App::getLocale();
                        $mainDomain = Config('constants.MainDomain');
                        $image = \App\Http\Controllers\InsightsController::createimgurl($focus->image);
                        $url =
                            "{$mainDomain}/insights/{$locale}/" .
                            strtolower($focus->insight_type) .
                            "/{$focus->slug}.{$focus->news_id}";
                    @endphp
                    <div class="editimgblk">
                        <div class="overleyt">
                            <div class="cote">
                                <div class="conlist"><a href="{{ $url }}">{{ trim($focus->title) }}</a></div>
                            </div>
                        </div>
                        <a href="{{ $url }}"><img src="{{ $image }}"
                                alt="{{ $focus->title . ' image' }}" /></a>
                    </div>
                @endforeach
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <ul class="editlist">
                    @foreach ($industry_data as $focusArticle)
                        @php
                            $locale = App::getLocale();
                            $mainDomain = Config('constants.MainDomain');
                            $image1 = \App\Http\Controllers\InsightsController::createimgurl($focusArticle->image);
                            $url1 =
                                "{$mainDomain}/insights/{$locale}/" .
                                strtolower($focusArticle->insight_type) .
                                "/{$focusArticle->slug}.{$focusArticle->news_id}";

                        @endphp

                        @if ($loop->index < 2)
                            <li>
                                <div class="imgbl">
                                    <a href="{{ $url1 }}"><img src="{{ $image1 }}"
                                            alt="{{ $focusArticle->title . ' image' }}" /></a>
                                </div>
                                <div class="conblk">
                                    @foreach ($focusArticle->category as $category)
                                        <div class="tagl">{{ $category->catname }}</div>
                                    @endforeach
                                    <div class="hname"><a
                                            href="{{ $url1 }}">{{ trim($focusArticle->title) }}</a></div>

                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- below list start here  -->
        <ul class="beloweditlist">
            @foreach ($industry_data as $focusArticle)
                @php
                    $locale = App::getLocale();
                    $mainDomain = Config('constants.MainDomain');
                    $image2 = \App\Http\Controllers\InsightsController::createimgurl($focusArticle->image);
                    $url2 =
                        "{$mainDomain}/insights/{$locale}/" .
                        strtolower($focusArticle->insight_type) .
                        "/{$focusArticle->slug}.{$focusArticle->news_id}";

                @endphp
                @if ($loop->index >= 2)
                    <li>
                        <div class="imgbl">
                            <a href="{{ $url2 }}"><img src="{{ $image2 }}"
                                    alt="{{ $focusArticle->title . ' image' }}" /></a>
                        </div>
                        <div class="conblk">
                            @foreach ($focusArticle->category as $category)
                                <div class="tagl">{{ $category->catname }}</div>
                            @endforeach
                            <div class="hname"><a href="{{ $url2 }}">{{ trim($focusArticle->title) }}</a>
                            </div>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
        <!-- below list start here  -->
    </div>
    <div class="slidercomman">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="comhead">{{ App::getLocale() == 'en' ? 'Interviews' : 'कार्यकारी साक्षात्कार' }}</div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($interview as $inter)
                                @php
                                    $locale = App::getLocale();
                                    $mainDomain = Config('constants.MainDomain');
                                    $image = \App\Http\Controllers\InsightsController::createimgurl($inter->image);
                                    $url =
                                        "{$mainDomain}/insights/{$locale}/" .
                                        strtolower($inter->insight_type) .
                                        "/{$inter->slug}.{$inter->news_id}";
                                @endphp
                                @if ($loop->index < 8)
                                    <div class="swiper-slide">
                                        <div class="innerlist">
                                            <div class="imgbl"><a href="{{ $url }}"><img
                                                        src="{{ $image }}"
                                                        alt="{{ $inter->title . ' image' }}"></a></div>
                                            <div class="conblk">
                                                @foreach ($inter->category as $category)
                                                    <div class="tagl">{{ $category->catname }}</div>
                                                @endforeach
                                                <div class="hname"> <a
                                                        href="{{ $url }}">{{ $inter->title }}</a></div>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
