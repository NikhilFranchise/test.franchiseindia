	<div class="topeditoblk">
		<div class="container">
			<div class="comhead">{{ (Request::segment(1) == 'hi') ? 'शीर्ष संपादक की पसंद' : 'Top Editor\'s pick' }}</div>
		</div>

	@if((Request::segment(1) != 'hi'))
		<div class="container">
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-6">
		@foreach($mostCommented as $article)
			@php
				$art = new \App\Http\Controllers\NewArticleController();
                $site   = Config('constants.articleArr.'.$article['site_type']);
                $kicker = Config('constants.MainDomain').'/newcontent/'.$article['urlKicker'];
                $image  = Config('constants.awsS3Url').$article['image'];
               $url    = Config('constants.MainDomain').'/newcontent/'.$article['slug'].'.'.$article['content_id'];
                $authorUrl  = Config('constants.MainDomain').'/newcontent/author/'.$art->slugify($article['author'],'-');
                if ( $article['site_type'] == 'ga' ) {
                    $kicker = Config('constants.MainDomain').'/gallery/'.str_slug($article['kicker']).'/'.$article['kicker_id'];
                    $image  = $article['image'];
                    $url    = Config('constants.MainDomain').'/newcontent/'.$article['slug'].'.'.$article['content_id'];
                    $authorUrl  = Config('constants.MainDomain').'/newcontent/author/'.$article['author'];
                }
			@endphp
			@if($loop->index < 1)
		<div class="editimgblk">
					<div class="overleyt">
						<div class="cote">
							<div class="topcont"><a href="{{$authorUrl}}">{{$article['author']}}</a>  <span class="h1w"></span><?php
								echo date('F d Y', strtotime($article['time'])); //June 01 2017
								?></div>
							<div class="conlist"><a href="{{$url}}"> @if($article['homeTitle']=='')
										{{implode(' ', array_slice(explode(' ', substr(strip_tags($article['homeTitle']),0,100)), 0, 20))}}
									@endif
									{{$article['homeTitle']}}</a></div>
						</div>
					</div>
			<a href="{{$url}}"><img src="{{ $image }}"></a>
	
		</div>
			@endif
		@endforeach
	</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<ul class="editlist">
				@php array_shift($mostCommented) @endphp
				@foreach($mostCommented as $article)
					@php
					    $art = new \App\Http\Controllers\NewArticleController();
						$site   = Config('constants.articleArr.'.$article['site_type']);
                        $kicker = Config('constants.MainDomain').'/newcontent/'.$article['urlKicker'];
                        $image  = Config('constants.awsS3Url').$article['image'];
                       $url    = Config('constants.MainDomain').'/newcontent/'.$article['slug'].'.'.$article['content_id'];
 						$authorUrl  = Config('constants.MainDomain').'/newcontent/author/'.$art->slugify($article['author'],'-');
                        if ( $article['site_type'] == 'ga' ) {
                            $kicker = Config('constants.MainDomain').'/gallery/'.str_slug($article['kicker']).'/'.$article['kicker_id'];
                            $image  = $article['image'];
                            $url    = Config('constants.MainDomain').'/newcontent/'.$article['slug'].'.'.$article['content_id'];
                             $authorUrl  = Config('constants.MainDomain').'/newcontent/author/'.$article['author'];
                        }
					@endphp
					@if($loop->index < 2)

				<li>
					<div class="imgbl"><a href="{{$url}}"><img src="{{$image}}"></a></div>
					<div class="conblk">
						<div class="tagl"><a href="{{$kicker}}">{{ucwords($article['kicker'])}}</a></div>
						<div class="hname"> <a href="{{$url}}"> @if($article['homeTitle']=='')
									{{implode(' ', array_slice(explode(' ', substr(strip_tags($article['homeTitle']),0,100)), 0, 20))}}
								@endif
								{{$article['homeTitle']}}</a></div>
						<div class="aname"><a href="{{$authorUrl}}">{{$article['author']}}</a>  <span class="h1w"></span><?php
							echo date('F d Y', strtotime($article['time'])); //June 01 2017
							?></div>
					</div>
				</li>
					@endif
				@endforeach


			</ul>

	</div>
</div>

<!-- below list start here  -->
	<ul class="beloweditlist">
		@php array_shift($mostCommented) @endphp
		@php array_shift($mostCommented) @endphp
		@php array_shift($mostCommented) @endphp
		@foreach($mostCommented as $article)
			@php
				$art = new \App\Http\Controllers\NewArticleController();
                $site   = Config('constants.articleArr.'.$article['site_type']);
                $kicker = Config('constants.MainDomain').'/newcontent/'.$article['urlKicker'];
                $image  = Config('constants.awsS3Url').$article['image'];
               $url    = Config('constants.MainDomain').'/newcontent/'.$article['slug'].'.'.$article['content_id'];
                 $authorUrl  = Config('constants.MainDomain').'/newcontent/author/'.$art->slugify($article['author'],'-');
                if ( $article['site_type'] == 'ga' ) {
                    $kicker = Config('constants.MainDomain').'/gallery/'.str_slug($article['kicker']).'/'.$article['kicker_id'];
                    $image  = $article['image'];
                    $url    = Config('constants.MainDomain').'/newcontent/'.$article['slug'].'.'.$article['content_id'];
                     $authorUrl  = Config('constants.MainDomain').'/newcontent/author/'.$article['author'];
                }
			@endphp
			@if($loop->index < 4)
		<li>
				<div class="imgbl"><a href="{{$url}}"><img src="{{$image}}"></a></div>
				<div class="conblk">
					<div class="tagl"><a href="{{$kicker}}">{{ucwords($article['kicker'])}}</a></div>
					<div class="hname"> <a href="{{$url}}">@if($article['homeTitle']=='')
								{{implode(' ', array_slice(explode(' ', substr(strip_tags($article['homeTitle']),0,100)), 0, 20))}}
							@endif
							{{$article['homeTitle']}}</a></div>
					<div class="aname"><a href="{{$authorUrl}}">{{$article['author']}}</a>  <span class="h1w"></span><?php
						echo date('F d Y', strtotime($article['time'])); //June 01 2017
						?></div>
				</div>
			</li>
			@endif
		@endforeach

	</ul>

<!-- below list start here  -->
</div>
		@endif
		@if((Request::segment(1) == 'hi'))
		<div class="container">
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-6">
		@foreach($mostCommented as $article)
			@php
				$art = new \App\Http\Controllers\NewArticleController();
                 $site   = Config('constants.articleArr.'.$article['site_type']);
                 $kicker = Config('constants.MainDomain').'/hi/newcontent/'.$article['name'].'/'.$article['tag_id'];
                 $image  = Config('constants.awsS3Url').$article['image'];
                $url    = Config('constants.MainDomain').'/newcontent/'.$article['slug'].'.'.$article['content_id'];
                 $authorUrl  = Config('constants.MainDomain').'/hi/newcontent/author/'.$art->slugify($article['author'],'-');
                 if ( $article['site_type'] == 'ga' ) {
                     $kicker = Config('constants.MainDomain').'/hi/gallery/'.str_slug($article['kicker']).'/'.$article['tag_id'];
                     $image  = $article['image'];
                     $url    = Config('constants.MainDomain').'/hi/newcontent/'.$article['slug'].'.'.$article['content_id'];
                     $authorUrl  = Config('constants.MainDomain').'/hi/newcontent/author/'.$article['author'];
                 }
			@endphp
			@if($loop->index < 1)
		<div class="editimgblk">
					<div class="overleyt">
						<div class="cote">
							<div class="topcont"><a href="{{$authorUrl}}">{{$article['author']}}</a>  <span class="h1w"></span><?php
								echo date('F d Y', strtotime($article['time'])); //June 01 2017
								?></div>
							<div class="conlist"><a href="{{$url}}"> @if($article['hindi_home_title']=='')
										{{implode(' ', array_slice(explode(' ', substr(strip_tags($article['hindi_title']),0,100)), 0, 20))}}
									@endif
									{{$article['hindi_home_title']}}</a></div>
						</div>
					</div>
			<a href="{{$url}}"><img src="{{ $image }}"></a>

		</div>
			@endif
		@endforeach
	</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<ul class="editlist">
				@php array_shift($mostCommented) @endphp
				@foreach($mostCommented as $article)
					@php
						$art = new \App\Http\Controllers\NewArticleController();
                         $site   = Config('constants.articleArr.'.$article['site_type']);
                         $kicker = Config('constants.MainDomain').'/hi/newcontent/'.$article['name'].'/'.$article['tag_id'];
                         $image  = Config('constants.awsS3Url').$article['image'];
                        $url    = Config('constants.MainDomain').'/hi/newcontent/'.$article['slug'].'.'.$article['content_id'];
                          $authorUrl  = Config('constants.MainDomain').'/hi/newcontent/author/'.$art->slugify($article['author'],'-');
                         if ( $article['site_type'] == 'ga' ) {
                             $kicker = Config('constants.MainDomain').'/hi/gallery/'.str_slug($article['kicker']).'/'.$article['tag_id'];
                             $image  = $article['image'];
                             $url    = Config('constants.MainDomain').'/hi/newcontent/'.$article['slug'].'.'.$article['content_id'];
                              $authorUrl  = Config('constants.MainDomain').'/hi/newcontent/author/'.$article['author'];
                         }
					@endphp
					@if($loop->index < 2)

				<li>
					<div class="imgbl"><a href="{{$url}}"><img src="{{$image}}"></a></div>
					<div class="conblk">
						<div class="tagl"><a href="{{$kicker}}">{{$article['name']}}</a></div>
						<div class="hname"> <a href="{{$url}}"> @if($article['hindi_home_title']=='')
									{{implode(' ', array_slice(explode(' ', substr(strip_tags($article['hindi_title']),0,100)), 0, 20))}}
								@endif
								{{$article['hindi_home_title']}}</a></div>
						<div class="aname"><a href="{{$authorUrl}}">{{$article['author']}}</a>  <span class="h1w"></span><?php
							echo date('F d Y', strtotime($article['time'])); //June 01 2017
							?></div>
					</div>
				</li>
					@endif
				@endforeach


			</ul>

	</div>
</div>

<!-- below list start here  -->
	<ul class="beloweditlist">
		@php array_shift($mostCommented) @endphp
		@php array_shift($mostCommented) @endphp
		@php array_shift($mostCommented) @endphp
		@foreach($mostCommented as $article)
			@php
				$art = new \App\Http\Controllers\NewArticleController();
                 $site   = Config('constants.articleArr.'.$article['site_type']);
                 $kicker = Config('constants.MainDomain').'/hi/newcontent/'.$article['name'].'/'.$article['tag_id'];
                 $image  = Config('constants.awsS3Url').$article['image'];
                $url    = Config('constants.MainDomain').'/hi/newcontent/'.$article['slug'].'.'.$article['content_id'];
                  $authorUrl  = Config('constants.MainDomain').'/hi/newcontent/author/'.$art->slugify($article['author'],'-');
                 if ( $article['site_type'] == 'ga' ) {
                     $kicker = Config('constants.MainDomain').'/hi/gallery/'.str_slug($article['kicker']).'/'.$article['tag_id'];
                     $image  = $article['image'];
                     $url    = Config('constants.MainDomain').'/hi/newcontent/'.$article['slug'].'.'.$article['content_id'];
                      $authorUrl  = Config('constants.MainDomain').'/hi/newcontent/author/'.$article['author'];
                 }
			@endphp
			@if($loop->index < 4)
		<li>
				<div class="imgbl"><a href="{{$url}}"><img src="{{$image}}"></a></div>
				<div class="conblk">
					<div class="tagl"><a href="{{$kicker}}">{{$article['name']}}</a></div>
					<div class="hname"> <a href="{{$url}}">@if($article['hindi_home_title']=='')
								{{implode(' ', array_slice(explode(' ', substr(strip_tags($article['hindi_title']),0,100)), 0, 20))}}
							@endif
							{{$article['hindi_home_title']}}</a></div>
					<div class="aname"><a href="{{$authorUrl}}">{{$article['author']}}</a>  <span class="h1w"></span><?php
						echo date('F d Y', strtotime($article['time'])); //June 01 2017
						?></div>
				</div>
			</li>
			@endif
		@endforeach

	</ul>

<!-- below list start here  -->
</div>
		@endif
	</div>