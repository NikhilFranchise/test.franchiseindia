@extends('layout.crre.master')
@section('seoTitle',
    "Latest {$subcatData->subcat_name} News & Articles | Trends, Insights & Expert Analysis |
    Franchise India")
@section('seoDesc',
    "Stay updated with the latest {$subcatData->subcat_name} news and articles. Explore industry
    trends, expert insights, and business reports. Get market analysis, growth strategies, and top stories on
    FranchiseIndia.com.")
@section('load-gpt', true)
@section('content')
    <div class="maininnver homeh">
        <div class="inner-top-head">
            <div class="container">
                <h1>{{ $subcatData->subcat_name }}</h1>
            </div>
        </div>

        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => url('/crre')],
            [
                'label' => $subcatData->category[0]->catname,
                'url' => url('/crre/' . $locale . '/' . $subcatData->category[0]->slug),
            ],
            ['label' => $subcatData->subcat_name],
        ]" />

        <div class="stories">
            <div class="container">
                <h3>{{ $subcatData->subcat_name }}</h3>
                <div class="row">
                    <div class="col-md-8">
                        <div class="tab-content">
                            <div class="tab-pane active stab" id="latest">
                                <x-article-list>
                                    @foreach ($subcategoryData as $article)
                                        <x-article-list-item :article="$article" :locale="$locale" />
                                    @endforeach
                                </x-article-list>
                                <div class="video-pagination">
                                    {{ $subcategoryData->links('pagination::bootstrap-5') }}
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
        @include('layout.crre.brandlist')
        @include('layout.crre.magblock')
    </div>
@endsection
