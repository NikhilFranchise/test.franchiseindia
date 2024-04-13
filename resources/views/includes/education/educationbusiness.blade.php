<!-- Vm design block Start here-->
<div class="bor-radius backwhite pad20 ovfl mart20 othersliderblk">
    <div class="ri-headingRt2"><h2><span><div>Education Business & Industry</div></span></h2> <div class="ri-c-more">&nbsp;</div> </div>

    <ul class="row slidecom bxslidervm">
        @foreach($eduBusinessArticles as $article)
            @php
                $site   = Config('constants.articleArr.'.$article['site_type']);
                $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                $image  = Config('constants.awsS3Url').$article['image'];
                $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
            @endphp
            <li>
                <div class="slidimg"><img src="{{ $image }}" alt="{{$article['homeTitle']}}" /></div>
                <h2 class="ri-inner_bullets">
                    <a href="{{ $url }}">
                        {{$article['homeTitle']}}
                        @if($article['homeTitle']=='')
                            {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,100)), 0, 10))}}
                        @endif
                    </a>
                </h2>
                <p class="content_sort">
                    {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['shortDesc']),0,120)), 0, 10))}}...
                </p>
            </li>

        @endforeach
    </ul>
</div>