<div role="tabpanel" class="tab-pane" id="news">
    <div class="row">
        <div class="bxslider_news">
            <div class="col-xs-12 col-sm-12 col-md-12 list-width-newbe">
                <div class="row">
                    @foreach ($newsArticles as $article)
                        @php
                            // $a         = date_create($article['time']);
                            // $date      = date_format($a,"d M Y");
                            // $site      = Config('constants.articleArr.'.$article['news_type']);
                            // $imagePath = str_replace('uploads/', 'uploads/thumbnails/', $article['image']);
                            $locale = App::getLocale();
                            $imagePath = \App\Http\Controllers\InsightsController::createimgurl($article->image);
                            $baseUrl = Config('constants.MainDomain') . "/insights/$locale/";
                            $articleUrl =
                                $baseUrl .
                                strtolower($article->insight_type) .
                                '/' .
                                $article->slug .
                                '.' .
                                $article->news_id;
                            if ($article->category->isNotEmpty()) {
                                $category = $article->category->first();
                                $catName = $category->catname;
                                $catUrl = $baseUrl . $category->slug;
                            }
                            if ($article->author->isNotEmpty()) {
                                $author = $article->author->first();
                                $authorname = $author->title ?: 'Franchise India Bureau';
                                $slug = $author->slug ?: strtolower(str_replace(' ', '-', $authorname));
                                $authorUrl =
                                    config('constants.MainDomain') .
                                    '/' .
                                    "insights/author/{$slug}-{$author->author_id}";
                                $author_image = $author->image
                                    ? \App\Http\Controllers\InsightsController::authorImageurl($author->image)
                                    : $author_image;
                            }
                        @endphp
                        <div class="col-xs-12 col-sm-6 col-md-4 mdfiywidth">
                            <div class="new-cat-list">
                                <div class="cat-img" onclick="window.location = '{{ $articleUrl }}';">
                                    <img class="lozad" data-src="{{ $imagePath }}" alt="{{ $article['title'] }}" />
                                    <div class="info">
                                        <div class="search-count">
                                            <div class="vertical-mid">
                                                <div class="bdr">
                                                    <div class="count"><a href="{{ $catUrl }}">{{ $category->catname }}</a>
                                                    </div>
                                                    <div class="name"> <a href="{{ $articleUrl }}">{{ $article->title }}</a>
                                                    </div>
                                                    <div class="count">{{ date('d M Y', strtotime($article->created_at)) }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($loop->index == 8)
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 list-width-new">
                <div class="row">
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
