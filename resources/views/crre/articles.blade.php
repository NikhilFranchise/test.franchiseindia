@extends('layout.crre.master')
@section('load-gpt', true)
@section('content')
<div class="maininnver homeh">
    <div class="inner-top-head">
        <div class="container">
            <h1>{{ $locale == 'en' ? 'Articles' : 'आर्टिकल' }}</h1>
        </div>
    </div>
    {{-- <div class="authblk">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/insights') }}">Home</a></li>
    <li class="breadcrumb-item">{{ $locale == 'en' ? 'Articles' : 'आर्टिकल' }}</li>
    </ul>
</div>
</div> --}}
<x-breadcrumb :items="[['label' => 'Home', 'url' => url('/crre')], ['label' => $locale == 'en' ? 'Articles' : 'आर्टिकल']]" />
<div class="stories">
    <div class="container">
        <h3>{{ $locale == 'en' ? 'Articles' : 'आर्टिकल' }}</h3>
        <div class="row">
            <div class="col-md-8">
                <div class="tab-content">
                    <div class="tab-pane active stab" id="latest">
                        <x-article-list>
                            @foreach ($insArticles as $article)
                            <x-article-list-item :article="$article" :locale="$locale" />
                            @endforeach
                        </x-article-list>
                        <div class="video-pagination">
                            {{ $insArticles->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
                <div class="contentarea">
                    @include('layout.insights.subscribenewsletter')
                </div>
            </div>
            <div class="col-md-4">
                {{-- ads section start here --}}
                <div class="ad-right-author">
                    <div id='adslot300x250_ATF'>
                        <script>
                            googletag.cmd.push(function() {
                                googletag.display('adslot300x250_ATF');
                            });
                        </script>
                    </div>
                </div>
                {{-- ads section end here --}}
                <div class="popular-articles">
                    <div class="popular-title">Popular Articles</div>
                    <ul class="popular-list">
                        @foreach ($popArticles as $popular)
                        <x-popular-item :popular="$popular" :locale="$locale" />
                        @endforeach
                    </ul>
                </div>
                {{-- ads section start here --}}
                <div class="ad-right-sticky">
                    <div id="adslot300x250_1">
                        <script>
                            googletag.cmd.push(function() {
                                googletag.display('adslot300x250_1');
                            });
                        </script>
                    </div>
                </div>
                {{-- ads section end here --}}
            </div>
        </div>
    </div>
</div>
@include('layout.insights.brandlist')
@include('layout.insights.magblock')
</div>
@endsection