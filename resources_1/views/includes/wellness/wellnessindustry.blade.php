<!-- Vm design block Start here-->
<div class="bor-radius backwhite pad20 ovfl mart20 othersliderblk">
    <div class="ri-headingRt2"><h2><span><div>Wellness Industry Insights</div></span></h2> <div class="ri-c-more">&nbsp;</div> </div>
    <ul class="row slidecom bxslidervm">
        @foreach($indusArticles as $article)
            <li>
                <div class="slidimg"><img alt="{{ $article['title']  }}" src="{{Config('constants.awsS3Url').$article['image']}}" /></div>
                <h2 class="ri-inner_bullets"><a href="{{ Config('constants.MainDomain') }}/wellness/{{$article['slug']}}.{{$article['content_id']}}">
                        {{$article['homeTitle']}}
                        @if($article['homeTitle']=='')
                            {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,100)), 0, 10))}}
                        @endif
                    </a>
                </h2>
                <p class="content_sort">
                    {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['shortDesc']),0,150)), 0, 15))}}...
                </p>
            </li>
        @endforeach
    </ul>
</div>