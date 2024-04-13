<!--tag start here -->
<div class="sidearce bor-radius backwhite pad20 ovfl">
    <div class="ri-headingRt">
        <h2><span><div>TAGS</div></span></h2>
    </div>
    <ul class="tag-cloud">
        @foreach($tags as $tag)
            <li><a title="" href="{{ Config::get('constants.MainDomain') }}/content/{{$tag['urlKicker']}}">{{$tag['kicker']}}</a></li>
        @endforeach
    </ul>
</div>
<!--tag end here -->