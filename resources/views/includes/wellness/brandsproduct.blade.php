<!-- Brands & Product Launch start here -->

<div class="bor-radius backwhite pad20 ovfl mart20">
    <div class="ri-headingRt2">
        <h2><span><div>Brands & Product Launch</div></span></h2>
        <div class="ri-c-more"><a href="{{ Config('constants.MainDomain') }}/content/Product-Launch">More >></a></div>
    </div>
    <ul class="row ri-img-txt-list">
        @foreach( $brandArticles as $article)
            @php
                $site   = Config('constants.articleArr.'.$article['site_type']);
                $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                $image  = Config('constants.awsS3Url').$article['image'];
                $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
            @endphp
        @if($loop->index < 2)
        <li class="col-xs-12 col-sm-4 col-md-4">
            <div> <a href="{{ $url }}"><img src="{{ $image }}" alt="{{$article['homeTitle']}}"></a> </div>
            <div class="ri-himg-blk">
                <a href="{{ $kicker }}">{{ $article['kicker'] }}</a></div>
            <div class="ri-inner_bullets"><a href="{{ $url }}">
                    {{$article['homeTitle']}}
                    @if($article['homeTitle']=='')
                        {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,100)), 0, 10))}}
                    @endif
                </a>
                <p class="content_sort">
                    {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['shortDesc']),0,120)), 0, 10))}}...
                </p>
            </div>
        </li>
        @endif
        @if($loop->index == 1)
        <li class="col-xs-12 col-sm-4 col-md-4">
            <ul class="ri-list-txt">
                @endif
                @if($loop->index > 1)
                    <li>
                        <a href="{{ $url }}">
                            {{$article['homeTitle']}}
                            @if($article['homeTitle']=='')
                                {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,100)), 0, 10))}}
                            @endif
                        </a>
                    </li>
                @endif
                @endforeach
            </ul>
        </li>
    </ul>
</div>

<!-- Brands & Product Launch End here-->