<div role="tabpanel" class="tab-pane" id="news">
    <div class="row">
        <div class="bxslider_news">
            <div class="col-xs-12 col-sm-12 col-md-12 list-width-newbe">
                <div class="row">
                    @foreach ($newsArticles as $article)
                    @php
                    $locale = App::getLocale();
                    $imagePath = insightsImageUrl($article->image, $locale);
                    $articleUrl = insightsUrl($article, $locale);
                    $category = $article->category;
                    $catName = $category->catname ?? '';
                    $catUrl = insightsCategoryUrl($category, $locale);
                    $author = $article->author;
                    $authorname = $author->title ?? 'Franchise India Bureau';
                    $authorUrl = insightsAuthorUrl($author, $locale);
                    @endphp
                    <div class="col-xs-12 col-sm-6 col-md-4 mdfiywidth">
                        <div class="new-cat-list">
                            <div class="cat-img" onclick="window.location = '{{ $articleUrl }}';">
                                <img class="lozad" data-src="{{ $imagePath }}" alt="{{ $article->title }}" />
                                <div class="info">
                                    <div class="search-count">
                                        <div class="vertical-mid">
                                            <div class="bdr">
                                                <div class="count"><a href="{{ $catUrl }}">{{ $catName }}</a>
                                                </div>
                                                <div class="name"> <a href="{{ $articleUrl }}">{!!
                                                        html_entity_decode(Str::words($article->title, 8, ' ...'))
                                                        !!}</a>
                                                </div>
                                                <div class="count">
                                                    {{ date('d M Y', strtotime($article->created_at)) }}</div>
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