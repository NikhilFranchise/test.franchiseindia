@php
use Illuminate\Support\Str;
@endphp
<div class="row marginborbtm articlebottom bornonecat">
    <div class="container">
        <div class="mrehead">More Stories</div>
        <div class="row marginbtm20 rigmarginmin">
            @foreach($likeArticles as $article)
                @php
                    $site   = Config('constants.articleArr.'.$article['site_type']);
                    //$kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                    $kicker = 'https://opportunityindia.franchiseindia.com/english/tag/'.$article['urlKicker'];
                    $image  = Config('constants.awsS3Url').$article['image'];
                    //$url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                    $url    = 'https://opportunityindia.franchiseindia.com/article/'.$article['slug'].'-'.$article['content_id'];
					
                    if ( $article['site_type'] == 'ga' ) {
                        $kicker = Config('constants.MainDomain').'/gallery/'.Str::slug($article['kicker']).'/'.$article['kicker_id'];
                        $kicker = Config('constants.MainDomain').'/gallery/'.Str::slug($article['kicker']).'/'.$article['kicker_id'];
                        $image  = $article['image'];
                        $url    = Config('constants.MainDomain').'/'.$site.'/'.Str::slug($article['title']).'.'.$article['content_id'];
                    }
                @endphp
                @if($loop->index < 2)
				<div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="img-txtlayout">
                        <div class="img-valayout">
                            @if( $site == "gallery") 
                               <div class="gallopt"><img class="lozad" data-src="{{url('images/galleyicon.png')}}" alt="galleryicon"></div>
                           @endif
                            <a target="_blank" href="{{ $url }}">
                                <img class="lozad" data-src="{{ $image }}" alt="franchiseindia">
                            </a>
                        </div>
                        <span class="text-contentnewlayout">
                            <div class="text-rep-blk">
                                <div class="a-name-red">
                                    <span>
                                        <a target="_blank" href="{{ $kicker }}">{{$article['kicker']}}</a>
                                    </span>
                                </div>
                                <div class="show-an-txt">
                                    <a target="_blank" href="{{ $url }}">
                                        @if(empty($article['homeTitle']))
                                            {{$article['title']}}
                                        @else
                                            {{$article['homeTitle']}}
                                        @endif
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
                            @if( $site == "gallery") 
                               <div class="gallopt"><img class="lozad" data-src="{{url('images/galleyicon.png')}}" alt="franchiseindia"></div>
                            @endif
                            <a target="_blank" href="{{ $url }}">
                                <img class="lozad" data-src="{{ $image }}" alt="{{$article['kicker']}}">
                            </a>
                        </div>
                        <div class="artbtmsubhead">
                            <a target="_blank" href="{{ $kicker }}">{{$article['kicker']}}</a>
                        </div>
                        <div class="artbtmtext">
                            <a target="_blank" href="{{ $url }}">
                                @if(empty($article['homeTitle']))
                                    {{substr($article['title'],0,50)}}
                                @else
                                    {{substr($article['homeTitle'],0,50)}}..
                                @endif
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>


    </div>
    <!-- 4 slot newsection end here -->


</div>
