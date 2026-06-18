@extends('layout.crre.master')
@section('load-gpt', true)
@section('content')
    <div class="maininnver homeh">
        <div class="inner-top-head">
            <div class="container">
                <h1>Search</h1>
            </div>
        </div>
        <x-breadcrumb :items="[['label' => 'Home', 'url' => url('/crre')], ['label' => 'Search']]" />
        <div class="stories">
            <div class="container">
                <h3>Search results for {{ Illuminate\Support\Str::limit($search, 30, '...') }}</h3>
                <div class="row">
                    <div class="col-md-8">
                        <div class="tab-content">
                            <div class="tab-pane active stab" id="latest">
                                <x-article-list>
                                    @foreach ($articlesList as $article)
                                        <x-article-list-item :article="$article" :locale="$locale" />
                                    @endforeach
                                </x-article-list>
                                <div class="video-pagination">
                                    {{ $articlesList->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                        <div class="contentarea">
                            @include('layout.crre.subscribenewsletter')
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
                            <div class="popular-title">Related Articles</div>
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
        @include('layout.crre.brandlist')
        @include('layout.crre.magblock')
    </div>
@endsection
