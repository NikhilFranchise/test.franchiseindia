<div class="lastestvideoblk">
<div class="container">
<div class="comhead"><a href="#">{{ (Request::segment(1) == 'hi') ? 'नवीनतम वीडियो' : 'Latest Video' }}</a> <span class="slidervall"><a href="#">View All</a></span></div>
</div>

<div class="container">
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-6">
		@foreach($videoArticles as $article)
			@if($loop->index == 0)
				@php
					$URL_c = strtolower("Hello WORLD.");
				@endphp
		<div class="editimgblk">
					<div class="overleytnew">
						<div class="playbtnnew"><img src="{{asset('article/images/play-button.svg')}}"></div>
						<div class="showovet">
							<div class="topcatli"><a href="https://video.franchiseindia.com/{{str_slug(strtolower($article['title']), '-')}}/{{$article['videoID']}}/">{{ $article->categoryName->catname }}</div>
							<div class="shownametxt"><a href="https://video.franchiseindia.com/{{str_slug(strtolower($article['title']), '-')}}/{{$article['videoID']}}/">{{$article['title']}}</a></div>
							<div class="timeviw"><?php
								echo date('F d, Y', strtotime($article['create_date'])); //June, 2017
								?>. | <img src="{{asset('article/images/view.svg')}}" class="viewy"> {{$article->views}}</div>
						</div>
					</div>
			<a href="#"><img src="@php printf(Config('constants.youtubeImageUrl'),$article['videoID'])@endphp" alt="{{$article['title']}}"></a>
	
		</div>
			@endif
		@endforeach
	</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<ul class="editlistnew">
{{--				@php array_shift($videoArticles) @endphp--}}
				@foreach($videoArticles as $article)
					 @if($loop->index > 0 && $loop->index < 3)

						@php
							$URL_c = strtolower("Hello WORLD.");
						@endphp
				<li>
					<div class="imgbl"><div class="playbtnnewsmal"><img src="{{asset('article/images/play-button.svg')}}" class="v"></div><a href="https://video.franchiseindia.com/{{str_slug(strtolower($article['title']), '-')}}/{{$article['videoID']}}/"><img src="@php printf(Config('constants.youtubeImageUrl'),$article['videoID'])@endphp"></a></div>
					<div class="conblk">
						<div class="tagl"><a href="https://video.franchiseindia.com/{{str_slug(strtolower($article['title']), '-')}}/{{$article['videoID']}}/">{{ $article->categoryName->catname }}</a></div>
						<div class="hname"> <a href="https://video.franchiseindia.com/{{str_slug(strtolower($article['title']), '-')}}/{{$article['videoID']}}/">{{$article['title']}}</a></div>
						<div class="aname"><a href="#">{{$article['author']}}</a> <span class="h1w"></span><?php
							echo date('F d, Y', strtotime($article['create_date'])); //June, 2017
							?></div>
					</div>
				</li>
					@endif
				@endforeach

			</ul>

	</div>
</div>
	<!-- below list start here  -->
</div>	

</div>