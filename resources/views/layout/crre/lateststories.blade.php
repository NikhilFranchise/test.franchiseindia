<div class="headblk">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mainhead">
                    {{ App::getLocale() == 'en' ? 'Built for Commerce. Designed for Growth' : 'व्यापार हेतु निर्मित। विकास हेतु डिज़ाइन।' }}
                </h1>
            </div>
        </div>
    </div>
</div>

<div class="topblk">
    <div class="container">
        <div class="row">

            {{-- LEFT SIDE — Latest Story --}}
            @foreach ($latestStory as $story)
            @php
            $url = crreUrl($story);
            $image = imageUrl($story->image);
            @endphp

            <div class="col-xs-12 col-sm-12 col-md-7 topmod1">
                <div class="topimgbl">
                    <img src="{{ $image }}" alt="{{ $story->title }} image" />

                    <div class="overlay">

                        {{-- Categories --}}
                        @foreach ($story->category as $cat)
                        <div class="topcat">{{ $cat->catname }}</div>
                        @endforeach

                        {{-- Title --}}
                        <div class="tophead">
                            <a href="{{ $url }}">{{ $story->title }}</a>
                        </div>

                        {{-- Short Description --}}
                        <div class="toptxt">
                            {{ $story->shortDesc }}
                        </div>

                    </div>
                </div>
            </div>
            @endforeach

            {{-- RIGHT SIDE — Top Trending Stories --}}
            <div class="col-xs-12 col-sm-12 col-md-5 topmod2">

                <h2 class="subhead">
                    {{ App::getLocale() == 'en' ? 'Top Trending Stories' : 'रुझान वाले प्रमुख समाचार (लेख)' }}
                </h2>

                <ul class="filist">
                    @foreach ($topstories as $item)
                    @php
                    $url = crreUrl($item);
                    $image = imageUrl($item->image);
                    @endphp

                    <x-story-item :url="$url" :image="$image" :title="$item->title" :categories="$item->category" />
                    @endforeach
                </ul>

            </div>

        </div>
    </div>
</div>