<div class="headblk">
<div class="container">
<h1 class="mainhead">{{ (Request::segment(1) == 'hi') ? 'अंतर्दृष्टि. विचार. अवसर. विकास.' : 'Insights. Ideas. Opportunities. Growth.' }}</h1>
<div class="subtxt">{{ (Request::segment(1) == 'hi') ? 'कल के टाइकून के लिए अपार अंतर्दृष्टि, फलते-फूलते विचार और शानदार अवसर' : 'Immense insights, thriving ideas, and splendid opportunities for tomorrow\'s tycoons' }}</div>
</div>
</div>


<div class="topblk">
<div class="container">
	@if((Request::segment(1) != 'hi'))
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-7 topmod1">
		@foreach($homeArticle as $article)
		@php        $art = new \App\Http\Controllers\NewArticleController();


                    $site   = Config('constants.articleArr.'.$article['site_type']);
                    $kicker = Config('constants.MainDomain').'/newcontent/'.$article['urlKicker'];
                    $image  = Config('constants.awsS3Url').$article['image'];
                   $url    = Config('constants.MainDomain').'/newcontent/'.$article['slug'].'.'.$article['content_id'];
                   $authorUrl  = Config('constants.MainDomain').'/newcontent/author/'.$art->slugify($article['author'],'-');
                    if ( $article['site_type'] == 'ga' ) {
                        $kicker = Config('constants.MainDomain').'/gallery/'.str_slug($article['kicker']).'/'.$article['kicker_id'];
                        $image  = $article['image'];
                        $url    = Config('constants.MainDomain').'/newcontent/'.$article['slug'].'.'.$article['content_id'];
                    }
		@endphp
			@if($loop->index < 1)
<div class="topimgbl"> 
	 <a href="{{ $url }}">
			<img src="{{ $image }}" alt="{{$article['kicker']}}">
	 </a>
	<div class="overlay">
		<div class="topcat"><a href="#">{{ (Request::segment(1) == 'hi') ? 'सप्ताह की विशेषता' : 'FEATURE OF THE WEEK' }} Mar 18 2021</a></div>
		<div class="tophead">
			<a href="{{$url}}">
				@if($article['homeTitle']=='')
					{{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,160)), 0, 20))}}
				@endif
				{{$article['homeTitle']}}
			</a></div>
		<div class="toptxt">@if($article['shortDesc']=='')
				{{implode(' ', array_slice(explode(' ', substr(strip_tags($article['shortDesc']),0,160)), 0, 20))}}
			@endif
			{{$article['shortDesc']}}</div>
	</div>
</div>
			@endif
@endforeach
	 </div>
	<div class="col-xs-12 col-sm-12 col-md-5 topmod2">
		<h2 class="subhead">{{ (Request::segment(1) == 'hi') ? 'शीर्ष रुझान वाले लेख' : 'Top Trending Stories' }} </h2>
<ul class="filist">
	@foreach($trendArticles as $article)
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
                }

		@endphp
		@if($loop->index < 4)
<li>
<div class="imgbl">
	<a href="{{ $url }}">
		<img src="{{ $image }}" alt="{{$article['kicker']}}">
	</a>
</div>
<div class="conblk">
<div class="tagl">
	<a href="{{ $kicker }}">
		{{ucwords($article['kicker'])}}
	</a>
</div>
<div class="hname">
	<a href="{{$url}}">
		@if($article['homeTitle']=='')
			{{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,160)), 0, 20))}}
		@endif
		{{ucwords($article['homeTitle'])}}
	</a>
</div>
<div class="aname">
	<a href="{{$authorUrl}}">
		{{$article['author']}}
	</a>
</div>
</div>
</li>
		@endif
	@endforeach








</ul>		
</div>	
</div>
	@endif

		@if((Request::segment(1) == 'hi'))

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-7 topmod1">
		@foreach($homeArticle as $article)
		@php
			 $tagName = \App\SeoTagHindi::all()->where('tag_id',$article->hindi->kicker)->first();
             $site   = Config('constants.articleArr.'.$article['site_type']);
             $kicker = Config('constants.MainDomain').'/hi/newcontent/'.$tagName->name.'/'.$tagName->tag_id;
             $image  = Config('constants.awsS3Url').$article['image'];
            $url    = Config('constants.MainDomain').'/hi/newcontent/'.$article['slug'].'.'.$article['content_id'];

             if ( $article['site_type'] == 'ga' ) {
                 $kicker = Config('constants.MainDomain').'/gallery/'.str_slug($tagName->name).'/'.$article->hindi['kicker'];
                 $image  = $article['image'];
                 $url    = Config('constants.MainDomain').'/newcontent/'.$article['slug'].'.'.$article['content_id'];
             }
		@endphp
			@if($loop->index < 1)
<div class="topimgbl">
	 <a href="{{ $url }}">
			<img src="{{ $image }}" alt="{{$tagName->name}}">
	 </a>
	<div class="overlay">
		<div class="topcat"><a href="{{$url}}">{{ (Request::segment(1) == 'hi') ? 'सप्ताह की विशेषता' : 'FEATURE OF THE WEEK' }}
				<?php
				echo date('F, d Y', strtotime($article->hindi->created_at)); //June 01 2017
				?></a></div>
		<div class="tophead">
			<a href="{{$url}}">
				@if($article->hindi['home_title']=='')
					{{implode(' ', array_slice(explode(' ', substr(strip_tags($article->hindi['title']),0,160)), 0, 20))}}
				@endif
				{{$article->hindi['home_title']}}
			</a></div>
		<div class="toptxt">@if($article->hindi['short_desc']=='')
				{{implode(' ', array_slice(explode(' ', substr(strip_tags($article->hindi['short_desc']),0,160)), 0, 20))}}
			@endif
			{{$article->hindi['short_desc']}}</div>
	</div>
</div>
			@endif
@endforeach
	 </div>
	<div class="col-xs-12 col-sm-12 col-md-5 topmod2">
		<h2 class="subhead">{{ (Request::segment(1) == 'hi') ? 'शीर्ष रुझान वाले लेख' : 'Top Trending Stories' }} </h2>
<ul class="filist">
	@foreach($trendArticles as $article)
		@php
			$art = new \App\Http\Controllers\NewArticleController();

            $site   = Config('constants.articleArr.'.$article['site_type']);
            $kicker = Config('constants.MainDomain').'/hi/newcontent/'.$article['hindi_kicker'].'/'.$article['tag_id'];
            $image  = Config('constants.awsS3Url').$article['image'];
            $url    = Config('constants.MainDomain').'/hi/newcontent/'.$article['slug'].'.'.$article['content_id'];
            $authorUrl = Config('constants.MainDomain').'/hi/newcontent/author/'.$art->slugify($article['hindi_author'],'-');

            if ( $article['site_type'] == 'ga' ) {
                $kicker = Config('constants.MainDomain').'/hi/gallery/'.str_slug($article['hindi_kicker']).'/'.$article['kicker_id'];
                $image  = $article['image'];
                $url    = Config('constants.MainDomain').'/hi/newcontent/'.$article['slug'].'.'.$article['content_id'];
                $authorUrl = Config('constants.MainDomain').'/hi/newcontent/author/'.$article['hindi_author'];
            }

		@endphp
		@if($loop->index < 4)
<li>
<div class="imgbl">
	<a href="{{ $url }}">
		<img src="{{ $image }}" alt="{{$article['hindi_kicker']}}">
	</a>
</div>
<div class="conblk">
<div class="tagl">
	<a href="{{ $kicker }}">
		{{($article['hindi_kicker'])}}
	</a>
</div>
<div class="hname">
	<a href="{{$url}}">
		@if($article['hindi_home_title']=='')
			{{implode(' ', array_slice(explode(' ', substr(strip_tags($article['hindi_title']),0,160)), 0, 20))}}
		@endif
		{{$article['hindi_home_title']}}
	</a>
</div>
<div class="aname">
	<a href="{{$authorUrl}}">
		{{$article['hindi_author']}}
	</a>
</div>
</div>
</li>
		@endif
	@endforeach








</ul>
</div>
</div>
	@endif
</div>
</div>