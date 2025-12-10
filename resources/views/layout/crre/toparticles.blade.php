<div class="topeditoblk">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="comhead">{{ App::getLocale() == 'en' ? 'Articles' : 'आर्टिकल' }}</div>
            </div>
        </div>
    </div>

    <div class="container">

        {{-- LEFT SIDE - Latest Articles --}}
        <div class="row">
            <div class="col-md-6">
                @foreach ($latestArticle as $article)
                    @php
                        $url = crreUrl($article);
                        $image = imageUrl($article->image);
                    @endphp

                    <div class="editimgblk">
                        <div class="overleyt">
                            <div class="cote">
                                <div class="conlist">
                                    <a href="{{ $url }}">{{ trim($article->title) }}</a>
                                </div>
                            </div>
                        </div>

                        <a href="{{ $url }}">
                            <img src="{{ $image }}" alt="{{ $article->title }} image">
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- RIGHT SIDE – Top 2 Articles --}}
            <div class="col-md-6">
                <ul class="editlist">
                    @foreach ($topArticles->take(2) as $item)
                        @php
                            $url = crreUrl($item);
                            $image = imageUrl($item->image);
                        @endphp

                        <li>
                            <x-article-card :url="$url" :image="$image" :title="trim($item->title)" :categories="$item->category" />
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- Below Articles --}}
        <ul class="beloweditlist">
            @foreach ($topArticles->skip(2) as $item)
                @php
                    $url = crreUrl($item);
                    $image = imageUrl($item->image);
                @endphp

                <li>
                    <x-article-card :url="$url" :image="$image" :title="trim($item->title)" :categories="$item->category" />
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Reports Section --}}
    <div class="slidereport">
        <div class="container">
            <div class="comhead">{{ App::getLocale() == 'en' ? 'Reports' : 'रिपोर्ट' }}</div>

            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($topreports->take(8) as $report)
                        @php
                            $url = crreUrl($report);
                            $image = imageUrl($report->image);
                        @endphp

                        <div class="swiper-slide">
                            <x-article-card :url="$url" :image="$image" :title="$report->title" :categories="$report->category" />
                        </div>
                    @endforeach
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

        </div>
    </div>

    {{-- Interviews Section --}}
    <div class="slidercomman">
        <div class="container">
            <div class="comhead">{{ App::getLocale() == 'en' ? 'Interviews' : 'कार्यकारी साक्षात्कार' }}</div>

            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($topinterviews->take(8) as $inter)
                        @php
                            $url = crreUrl($inter);
                            $image = imageUrl($inter->image);
                        @endphp

                        <div class="swiper-slide">
                            <x-article-card :url="$url" :image="$image" :title="$inter->title"
                                :categories="$inter->category" />
                        </div>
                    @endforeach
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

        </div>
    </div>

</div>
