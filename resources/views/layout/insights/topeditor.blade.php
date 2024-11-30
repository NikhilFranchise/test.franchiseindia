<div class="topeditoblk">
    <div class="container">
        <div class="comhead">
            @if (App::getLocale() == 'en')
                Insights
            @else
                इनसाइट्स
            @endif
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                @foreach ($industry_focus as $focus)
                    @php
                        //$site = Config('constants.newsArr.' . $focus['news_type']);
                        $locale = App::getLocale();
                        $url =
                            Config('constants.MainDomain') . '/insights/' . $locale . '/' . strtolower($focus['insight_type']) .
                            '/' . $focus['slug'] . '.' . $focus['news_id'];
                    @endphp
                    @foreach ($focus->author as $author)
                        @php
                            $authorname = $author->title;
                            $authorUrl =
                                Config('constants.MainDomain') . '/insights/' . $locale . '/author/' . $author->slug . '-' . $author->author_id;
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
                            $url1 = Config('constants.MainDomain') . '/insights/' . $locale . '/' .
                                strtolower($focusArticle['insight_type']) . '/' . $focusArticle['slug'] .
                                '.' . $focusArticle['news_id'];
                        @endphp

                        @if ($loop->index < 2)
                            <li>
                                <div class="imgbl">
                                    <a href="{{ $url1 }}"><img src="{{ \App\Http\Controllers\InsightsController::createimgurl($focusArticle['image']) }}"
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
                    $url2 = Config('constants.MainDomain') . '/insights/' . $locale . '/' . strtolower($focusArticle['insight_type']) .
                        '/' . $focusArticle['slug'] . '.' . $focusArticle['news_id'];
                @endphp
                @if ($loop->index >= 2)
                    <li>
                        <div class="imgbl">
                            <a href="{{ $url2 }}"><img src="{{ \App\Http\Controllers\InsightsController::createimgurl($focusArticle['image']) }}"
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
</div>
