<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($articlesitemap as $news)
    @if($news->insight_type = 'Article')
    <url>
        <loc>{{url('/')}}/insights/en/{{strtolower($news->insight_type)}}/{{$news->slug}}.{{$news->news_id}}</loc>
        <lastmod>{{date('d-m-Y h:m:s A',strtotime($news->created_at))}}</lastmod>
        </url>
        @endif
    @endforeach
    </urlset>
