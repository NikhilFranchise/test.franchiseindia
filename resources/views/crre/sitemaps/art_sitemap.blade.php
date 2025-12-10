<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach ($articlesitemap as $news)
        @php
            $type = strtolower($news->insight_type);
        @endphp
        @if ($news->insight_type = 'Article')
            <url>
                <loc>{{ crreUrl($news) }}</loc>
                <lastmod>{{ \Carbon\Carbon::parse($news->effective_date)->format('Y-m-d\TH:i:sP') }}</lastmod>
            </url>
        @endif
    @endforeach
</urlset>
