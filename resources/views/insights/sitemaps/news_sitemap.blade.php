<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($newssitemap as $news)
    @if($news->insight_type = 'News')
    <url>
        {{-- <loc>{{$loop->index}}</loc> --}}
        <loc>{{url('/')}}/insights/{{strtolower($news->insight_type)}}/{{$news->slug}}.{{$news->news_id}}</loc>
        <lastmod>{{date('d-m-Y h:m A',strtotime($news->created_at))}}</lastmod>
        </url>
        @endif
    @endforeach
    </urlset>