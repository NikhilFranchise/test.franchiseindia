<!-- Brands & Product Launch start here -->

<div class="bor-radius backwhite pad20 ovfl mart20">


    <div class="ri-haeding-blk"><span><h3>F & B</h3></span>
        <div class="pull-right"><a href="{{ Config('constants.MainDomain') }}/content/Food-and-Beverage"><img class="fr" alt=""
                                                 src="{{ Config('constants.MainDomain') }}/images/buttons/more.gif"></a></div>
    </div>


    <ul class="row ri-img-txt-list">
        @foreach( $fbArticles as $article )
            @php
                $site   = Config('constants.articleArr.'.$article['site_type']);
                $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                $image  = 'https://www.franchiseindia.com'.$article['image'];
                $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
            @endphp
            @if($loop->index < 2)
            <li class="col-xs-12 col-sm-4 col-md-4">
                <div><a href="{{ $url }}"><img src="{{ $image }}" alt=""></a></div>
                <div class="ri-himg-blk"><a href="{{ $kicker }}">{{$article['kicker']}}</a></div>
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
        @if( $loop->index == 1 )
        <li class="col-xs-12 col-sm-4 col-md-4">
            <ul class="ri-list-txt">
                @endif
                @if( $loop->index > 1 )
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
