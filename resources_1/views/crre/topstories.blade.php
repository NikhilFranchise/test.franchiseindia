@extends('layout.crre.master')
@section('load-gpt', true)
@section('content')
    <div class="maininnver homeh">
        <div class="inner-top-head">
            <div class="container">
                <h1>{{ $locale == 'en' ? 'Top Stories' : 'शीर्ष कहानियां' }}</h1>
            </div>
        </div>

        {{-- <div class="authblk">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/crre') }}">Home</a></li>
    <li class="breadcrumb-item">{{ $locale == 'en' ? 'Top Stories' : 'शीर्ष कहानियां' }}</li>
    </ul>
</div>
</div> --}}
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => url('/crre')],
            ['label' => $locale == 'en' ? 'Top Stories' : 'शीर्ष कहानियां'],
        ]" />
        <div class="stories">
            <div class="container">
                <h3>{{ $locale == 'en' ? 'Top Stories' : 'शीर्ष कहानियां' }}</h3>

                <div class="row">

                    {{-- Left Section --}}
                    <div class="col-md-8">

                        <div class="tab-content">
                            <div class="tab-pane active stab">

                                <x-article-list>
                                    @foreach ($insightstories as $article)
                                        <x-article-list-item :article="$article" :locale="$locale" />
                                    @endforeach
                                </x-article-list>

                                <div class="video-pagination">
                                    {{ $insightstories->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>

                        <div class="contentarea">
                            @include('layout.crre.subscribenewsletter')
                        </div>

                    </div>

                    {{-- Right Sidebar --}}
                    <div class="col-md-4">

                        {{-- Ad --}}
                        <div class="ad-right-author">
                            <div id="adslot300x250_ATF"></div>
                        </div>

                        {{-- Popular Articles --}}
                        <div class="popular-articles">
                            <div class="popular-title">Popular Articles</div>

                            <ul class="popular-list">
                                @foreach ($popArticles as $popular)
                                    <x-popular-item :popular="$popular" :locale="$locale" />
                                @endforeach
                            </ul>
                        </div>
                        {{-- Ad --}}
                        <div class="ad-right-sticky">
                            <div id="adslot300x250_1">
                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.display('adslot300x250_1');
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layout.crre.brandlist')
        @include('layout.crre.magblock')
    </div>
@endsection
