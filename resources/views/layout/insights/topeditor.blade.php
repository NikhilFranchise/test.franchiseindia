<div class="topeditoblk">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
        <div class="comhead">
            @if (App::getLocale() == 'en')
                Articles
            @else
                आर्टिकल
            @endif
        </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                @foreach ($industry_focus as $focus)
                    @php
                        $locale = App::getLocale();
                        if (!empty($focus['slug'])) {
                            $url =
                                Config('constants.MainDomain') .
                                '/insights/' .
                                $locale .
                                '/' .
                                strtolower($focus['insight_type']) .
                                '/' .
                                $focus['slug'] .
                                '.' .
                                $focus['news_id'];
                        } else {
                            $slug = Str::slug($focus['title']);
                            $url =
                                Config('constants.MainDomain') .
                                '/insights/' .
                                $locale .
                                '/' .
                                strtolower($focus['insight_type']) .
                                '/' .
                                $slug .
                                '.' .
                                $focus['news_id'];
                        }

                    @endphp
                    @foreach ($focus->author as $author)
                        @php
                            $authorname = $author->title;
                            $authorUrl =
                                Config('constants.MainDomain') .
                                '/insights/author/' .
                                $author->slug .
                                '-' .
                                $author->author_id;
                        @endphp
                    @endforeach
                    <div class="editimgblk">
                        <div class="overleyt">
                            <div class="cote">
                                <div class="conlist"><a href="{{ $url }}">{{ trim($focus->title) }}</a></div>
                            </div>
                        </div>
                        <a href="{{ $url }}"><img
                                src="{{ \App\Http\Controllers\InsightsController::createimgurl($focus['image']) }}"
                                alt="{{ $focus->title . ' image' }}" /></a>
                    </div>
                @endforeach
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <ul class="editlist">
                    @foreach ($industry_data as $focusArticle)
                        @php

                            if (!empty($focusArticle['slug'])) {
                                $url1 =
                                    Config('constants.MainDomain') .
                                    '/insights/' .
                                    $locale .
                                    '/' .
                                    strtolower($focusArticle['insight_type']) .
                                    '/' .
                                    $focusArticle['slug'] .
                                    '.' .
                                    $focusArticle['news_id'];
                            } else {
                                $slug = Str::slug($focusArticle['title']);
                                $url1 =
                                    Config('constants.MainDomain') .
                                    '/insights/' .
                                    $locale .
                                    '/' .
                                    strtolower($focusArticle['insight_type']) .
                                    '/' .
                                    $slug .
                                    '.' .
                                    $focusArticle['news_id'];
                            }
                        @endphp

                        @if ($loop->index < 2)
                            <li>
                                <div class="imgbl">
                                    <a href="{{ $url1 }}"><img
                                            src="{{ \App\Http\Controllers\InsightsController::createimgurl($focusArticle['image']) }}"
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

                    if (!empty($focusArticle['slug'])) {
                        $url2 =
                            Config('constants.MainDomain') .
                            '/insights/' .
                            $locale .
                            '/' .
                            strtolower($focusArticle['insight_type']) .
                            '/' .
                            $focusArticle['slug'] .
                            '.' .
                            $focusArticle['news_id'];
                    } else {
                        $slug = Str::slug($focusArticle['title']);
                        $url2 =
                            Config('constants.MainDomain') .
                            '/insights/' .
                            $locale .
                            '/' .
                            strtolower($focusArticle['insight_type']) .
                            '/' .
                            $slug .
                            '.' .
                            $focusArticle['news_id'];
                    }
                @endphp
                @if ($loop->index >= 2)
                    <li>
                        <div class="imgbl">
                            <a href="{{ $url2 }}"><img
                                    src="{{ \App\Http\Controllers\InsightsController::createimgurl($focusArticle['image']) }}"
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
            <div class="comhead"><a href="#">
                    @if (App::getLocale() == 'en')
                        Interviews
                    @else
                        कार्यकारी साक्षात्कार
                    @endif
                </a> </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-12">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($interview as $inter)
                        @php
    
                            $locale = App::getLocale();
                            $url = Config('constants.MainDomain') . '/insights/' . $locale . '/' . strtolower($inter['insight_type']) .
                                '/' . $inter['slug'] . '.' . $inter['news_id'];
                        @endphp
    
                        @if ($loop->index < 8)
                            <!-- below list start here  1-->
                            <div class="swiper-slide">
                                <div class="innerlist">
                                    <div class="imgbl"><a href="{{ $url }}"><img
                                                src="{{ \App\Http\Controllers\InsightsController::createimgurl($inter['image']) }}"
                                                alt="{{ $inter->title . ' image' }}"></a></div>
                                    <div class="conblk">
                                        @foreach ($inter->category as $category)
                                            <div class="tagl">{{ $category->catname }}</div>
                                        @endforeach
                                        <div class="hname"> <a href="{{ $url }}">{!! html_entity_decode(\Illuminate\Support\Str::words($inter->title, 10, ' ...'), ENT_QUOTES, 'UTF-8') !!}</a></div>
    
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
