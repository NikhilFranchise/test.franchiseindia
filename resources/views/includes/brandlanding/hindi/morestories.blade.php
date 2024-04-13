<div class="row marginborbtm articlebottom bornonecat">
    <div class="container">
        <div class="mrehead">More Stories</div>
        <div class="row marginbtm20 rigmarginmin">
            @foreach($likeArticles as $article)
                @php
                    $site       = Config('constants.articleArr.'.$article['site_type']);
                    $kickerName = \App\SeoTagHindi::query()->where('tag_id', $article->hindi->kicker)->first()->name;
                    //$kicker     = Config('constants.MainDomain').'/content/'.$kickerName.'/'.$article->hindi->kicker;
                    $kicker = Config('constants.MainDomain').'/hi/content/'.$kickerName.'/'.$article->hindi->kicker;
                    $image      = Config('constants.awsS3Url').$article['image'];
					$hititslug  = str_replace(' ', '-', $article->hindi->home_title);
                   // $url      = Config('constants.MainDomain').'/hi/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
					$url        = 'https://opportunityindia.franchiseindia.com/hindi/article/'.$hititslug.'-'.$article['content_id'];
                @endphp
                @if($loop->index < 2)
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="img-txtlayout">
                            <div class="img-valayout">
                                <a target="_blank" href="{{ $url }}">
                                    <img class="lozad" data-src="{{ $image }}" alt="{{ $article->hindi->title }}">
                                </a>
                            </div>
                            <span class="text-contentnewlayout">
                            <div class="text-rep-blk">
                                <div class="a-name-red">
                                    <span>
                                        <a href="{{ $kicker }}">{{ $kickerName }}</a>
                                    </span>
                                </div>
                                <div class="show-an-txt">
                                    <a target="_blank" href="{{ $url }}">
                                        {{ $article->hindi->home_title }}
                                    </a>
                                </div>
                            </div>
                        </span>
                        </div>
                    </div>
                @endif
                @if($loop->index == 1)
        </div>

        <div class="row articlfotsction rigmarginmin">
            @endif
            @if($loop->index > 1)
                <div class="col-xs-12 col-sm-3 col-md-3 mdywinew">
                    <div class="artifotbtmimg">
                        <a target="_blank" href="{{ $url }}">
                            <img class="lozad" data-src="{{ $image }}" alt="{{ $article->hindi->title }}">
                        </a>
                    </div>
                    <div class="artbtmsubhead">
                        <a href="{{ $kicker }}">{{ $kickerName }}</a>
                    </div>
                    <div class="artbtmtext">
                        <a target="_blank" href="{{ $url }}">
                            {{ $article->hindi->home_title }}
                        </a>
                    </div>
                </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
