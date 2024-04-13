<!-- Restaurant slider block Start here-->
<div class="bor-radius backwhite pad20 ovfl mart20 othersliderblk">
    <div id="tab-carousel" class="">
        <div class="col-xs-12 col-sm-8 col-md-8">
            <div class="tab-content">
                @foreach($restaurantArticles as $article)
                    @if($loop->index == 0)
                        <div class="tab-pane active" id="{{ $loop->index + 1 }}">
                            <div class="imgbigs"><img alt="" src="https://www.franchiseindia.com/{{$article['image']}}"></div>
                            <div class="info">
                                <h2><a href="{{ Config('constants.MainDomain') }}/restaurant/{{$article['slug']}}.{{$article['content_id']}}">{{$article['homeTitle']}}</a></h2>
                                <span class="dispB sp5"></span>
                                <p>
                                    {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['shortDesc']),0,160)), 0, 20))}}...
                                    <a href="{{ Config('constants.MainDomain') }}/restaurant/{{$article['slug']}}.{{$article['content_id']}}">
                                        &nbsp;&nbsp;Read more
                                    </a>
                                </p>
                            </div>
                        </div>
                    @endif            
                    @if($loop->index > 0)
                        <div class="tab-pane" id="{{$loop->index + 1}}">
                            <div class="imgbigs"><img alt="" src="https://www.franchiseindia.com/{{$article['image']}}"></div>
                            <div class="info">
                                <h2><a href="{{ Config('constants.MainDomain') }}/restaurant/{{$article['slug']}}.{{$article['content_id']}}">{{$article['homeTitle']}}</a></h2>
                                <span class="dispB sp5"></span>

                                <p>
                                    {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['shortDesc']),0,160)), 0, 20))}}...
                                    <a href="{{ Config('constants.MainDomain') }}/restaurant/{{$article['slug']}}.{{$article['content_id']}}">
                                        &nbsp;&nbsp;Read more
                                    </a>
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach
              <!---->
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-4 col-md-4">
            <ul class="nav nav-tabs">
                @php
                    $i =1;
                @endphp
                @foreach($restaurantArticles as $article)
                    @if($loop->index == 0)
                        <li class="active">
                            <a href="#{{ $loop->index + 1 }}">
                                <div class="tmb"><img alt="" src="https://www.franchiseindia.com/{{$article['image']}}"></div>
                                <span>{{$article['homeTitle']}}</span>
                            </a>
                        </li>
                    @endif

                    @if($loop->index > 0)
                        <li>
                            <a href="#{{$loop->index + 1}}">
                                <div class="tmb"><img alt="" src="https://www.franchiseindia.com/{{$article['image']}}"></div>
                                <span>{{$article['homeTitle']}}</span>
                            </a>
                        </li>
                    @endif        
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!-- Restaurant slider block end here-->

<script language="javascript">

// Tab-Pane change function
    var tabChange = function(){
        var tabs = $('#tab-carousel .nav-tabs > li');
        var active = tabs.filter('.active');
        var next = active.next('li').length? active.next('li').find('a') : tabs.filter(':first-child').find('a');
        // Bootsrap tab show, para ativar a tab
        next.tab('show')
    }
    // Tab Cycle function
    var tabCycle = setInterval(tabChange, 3500)
    // Tab click event handler
    $(function(){
        $('#tab-carousel .nav-tabs a').click(function(e) {
            e.preventDefault();
            // Parar o loop
            clearInterval(tabCycle);
            // mosta o tab clicado, default bootstrap
            $(this).tab('show')
            // Inicia o ciclo outra vez
            setTimeout(function(){
                tabCycle = setInterval(tabChange, 5000)//quando recome�a assume este timing
            }, 5000);
        });
    });
	
</script>
