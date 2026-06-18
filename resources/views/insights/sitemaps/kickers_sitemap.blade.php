<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($kickersitemap as $news)
    @if($news->urlKicker != '')
    <url>
        <loc>{{url('/')}}/insights/kicker/{{strtolower($news->urlKicker)}}</loc>
        {{-- <lastmod>{{date('d-m-Y h:m:s A',strtotime($news->created_at))}}</lastmod> --}}
        </url>
        @endif
    @endforeach
    </urlset>