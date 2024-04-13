<!-- restaurant people block start here -->

<div class="bor-radius backwhite pad20 ovfl mart20">

    <div class="ri-haeding-blk"><span><h3>Restaurant People</h3></span>
        <div class="pull-right"><a href="{{ Config('constants.MainDomain') }}/content/People">
                <img class="fr" alt="more" src="{{ Config('constants.MainDomain') }}/images/buttons/more.gif"></a></div>
    </div>
    <div class="row">



        <div class="col-xs-12 col-sm-4 col-md-4 ri-bigimg-blk">


            @foreach($peopleArticles as $article)
                @php
                    $site   = Config('constants.articleArr.'.$article['site_type']);
                    $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                    $image  = 'https://www.franchiseindia.com'.$article['image'];
                    $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                @endphp
                @if($loop->index == 0)

                    <div><a href="{{ $url }}"><img src="{{ $image }}" alt="$article['slug']"></a></div>
                    <div class="ri-himg-blk">
                        <a href="{{ $kicker }}">{{$article['kicker']}}</a>
                    </div>
                    <div class="ri-inner_bullets">
                        <a href="{{ $url }}">
                            {{$article['homeTitle']}}
                        </a>
                        <p class="content_sort">{{$article['shortDesc']}}...</p>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="col-xs-12 col-sm-8 col-md-8 ri-smallimg-blk">
            <ul class="row ri-smallimg-list">

            @foreach($peopleArticles as $article)
                @php
                    $site   = Config('constants.articleArr.'.$article['site_type']);
                    $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                    $image  = 'https://www.franchiseindia.com'.$article['image'];
                    $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                @endphp
                @if($loop->index > 0)
                    <li class="col-xs-12 col-sm-4 col-md-4">
                        <div><a href="{{ $url }}"><img src="{{ $image }}" alt="$article['slug']"></a></div>
                        <div class="ri-inner_bullets">
                            <a href="{{ $url }}">
                                {{$article['homeTitle']}}
                            </a>
                        </div>
                    </li>
                @endif

        @endforeach

            </ul>
        </div>
    </div>


</div>
<!-- restaurant people block end here -->
