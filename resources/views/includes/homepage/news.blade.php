<div role="tabpanel" class="tab-pane" id="news">
    <div class="row">
        <div class="bxslider_news">
            <div class="col-xs-12 col-sm-12 col-md-12 list-width-newbe">
                <div class="row">
                    @foreach($newsArticles as $article)
                        @php
                            $a         = date_create($article['time']);
                            $date      = date_format($a,"d M Y");
                            $site      = Config('constants.articleArr.'.$article['news_type']);
                            $imagePath = str_replace('uploads/', 'uploads/thumbnails/', $article['image']);
                        @endphp
                        <div class="col-xs-12 col-sm-6 col-md-4 mdfiywidth">
                            <div class="new-cat-list">
                                <div class="cat-img" onclick="window.location = '{{Config('constants.NewsDomain')}}/{{$site}}/{{$article['slug']}}.n{{$article['news_id']}}';">
                                    <img class="lozad" data-src="https://www.franchiseindia.com{{$imagePath}}" alt="{{$article['homeTitle']}}" />
                                    <div class="info">
                                        <div class="search-count">
                                            <div class="vertical-mid">
                                                <div class="bdr">
                                                    <div class="count"><a href="{{Config('constants.NewsDomain')}}/{{$article['urlKicker']}}">{{$article['kicker']}}</a></div>
                                                    <div class="name">
                                                        <a href="{{Config('constants.NewsDomain')}}/{{$site}}/{{$article['slug']}}.n{{$article['news_id']}}">
                                                            @if($article['homeTitle']=='')
                                                                {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,100)), 0, 10))}}
                                                            @endif
                                                            {{$article['homeTitle']}}
                                                        </a>
                                                    </div>
                                                    <div class="count">{{$date}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($loop->index == 8)
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