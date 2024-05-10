
@php
use Illuminate\Support\Str;
@endphp
<div role="tabpanel" class="tab-pane active" id="whatsnew">
    <div class="row">
        <div class="bxsliderarticle">
            <div class="col-xs-12 col-sm-12 col-md-12 list-width-new">
                <div class="row">
                    @foreach($articles as $article)
                        @php
                            $siteType   = Config('constants.articleArr.'.$article['site_type']);
                            $imagePath  = Config('constants.MainDomain').str_replace('uploads/content/', 'uploads/thumbnails/', $article['image']);
                            $kickerUrl  = '/content/'.$article['urlKicker'];
                            $articleUrl = '/'.$siteType.'/'.$article['slug'].'.'.$article['content_id'];
                            if( $siteType == "gallery") {

                                $sourcePhoto       = public_path($article['image']);
                                $imagename         = pathinfo($sourcePhoto)['basename'];
                                $imagePath         = Config('constants.MainDomain')."/uploads/thumbnails/ga/".$imagename;
                                $kickerUrl         = '/gallery/'.Str::slug($article['kicker']).'/'.$article['kicker_id'];
                            }
                        @endphp
                        <div class="col-xs-12 col-sm-6 col-md-4 mdfiywidth">
                            <div class="new-cat-list">
                                <div class="cat-img" onclick="window.location = '{{ $articleUrl }}';">
                                    @if( $siteType == "gallery")
                                        <div class="gallopt"><div class="galleyiconsprite"></div></div>
                                    @endif
                                    <img class="lozad"  data-src="{{$imagePath}}" alt="franchise india"/>
                                    <div class="info">
                                        <div class="search-count">
                                            <div class="vertical-mid">
                                                <div class="bdr">
                                                    <div class="count">
                                                        <a href="{{$kickerUrl}}">
                                                            {{$article['kicker']}}
                                                        </a>
                                                    </div>
                                                    <div class="name">
                                                        <a href="{{$articleUrl}}">
                                                            {{ $article['homeTitle'] ? $article['homeTitle'] : $article['title'] }}
                                                        </a>
                                                    </div>
                                                    <div class="count">
                                                        <a href="#">By {{$article['author']}}</a>
                                                    </div>
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
