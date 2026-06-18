<div class="cbv">
    <div class="pull-left righead">Videos</div>
    <div class="pull-right viewmo"><a href="https://video.franchiseindia.com">View All</a><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i>
    </div>
</div>
<div class="sidearce bor-radius backwhite marfix">
    <div class="ovfl">
        <div class="videoslider">
            <div class="sidedbl">
                @foreach($videoArticles as $article)
                    @if($loop->index < 3)
                        <div class="sidebtmlineblk">
                            <div class="righeading">
                                <a href="https://video.franchiseindia.com/{{$article['urlTitle']}}/{{$article['videoID']}}/">
                                    {{$article['title']}}
                                </a>
                            </div>
                            <div class="viewrect">{{$article['views']}} views |
                                @php
                                    $now = time();
                                    $your_date = strtotime($article['create_date']);
                                    $datediff = round(($now - $your_date)/86400);
                                    echo $datediff;
                                @endphp
                                days ago</div>
                            <div class="rigtimg">
                                <a href="https://video.franchiseindia.com/{{$article['urlTitle']}}/{{$article['videoID']}}/">
                                    <img src="@php printf(Config('constants.youtubeImageUrl'),$article['videoID'])@endphp" alt="{{$article['title']}}">
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="sidedbl">
                @foreach($videoArticles as $article)
                    @if($loop->index > 2 && $loop->index < 6)
                        <div class="sidebtmlineblk">
                            <div class="righeading">
                                <a href="https://video.franchiseindia.com/{{$article['urlTitle']}}/{{$article['videoID']}}/">
                                    {{$article['title']}}
                                </a>
                            </div>
                            <div class="viewrect">{{$article['views']}} views |
                                @php
                                    $now = time();
                                    $your_date = strtotime($article['create_date']);
                                    $datediff = round(($now - $your_date)/86400);
                                    echo $datediff;
                                @endphp
                                days ago</div>
                            <div class="rigtimg">
                                <a href="https://video.franchiseindia.com/{{$article['urlTitle']}}/{{$article['videoID']}}/">
                                    <img src="@php printf(Config('constants.youtubeImageUrl'),$article['videoID'])@endphp" alt="{{$article['title']}}">
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="sidedbl">
                @foreach($videoArticles as $article)
                    @if($loop->index > 5)
                        <div class="sidebtmlineblk">
                            <div class="righeading">
                                <a href="https://video.franchiseindia.com/{{$article['urlTitle']}}/{{$article['videoID']}}/">
                                    {{$article['title']}}
                                </a>
                            </div>
                            <div class="viewrect">{{$article['views']}} views |
                                @php
                                    $now = time();
                                    $your_date = strtotime($article['create_date']);
                                    $datediff = round(($now - $your_date)/86400);
                                    echo $datediff;
                                @endphp
                                days ago</div>
                            <div class="rigtimg">
                                <a href="https://video.franchiseindia.com/{{$article['urlTitle']}}/{{$article['videoID']}}/">
                                    <img src="@php printf(Config('constants.youtubeImageUrl'),$article['videoID'])@endphp" alt="{{$article['title']}}">
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>