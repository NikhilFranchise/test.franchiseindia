<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($newssitemap as $news)
        @php
            $type = strtolower($news->insight_type);
        @endphp
        @if ($news->insight_type === 'News')
            <url>
                <loc>{{ crreUrl($news->news_id) }}</loc>
                <lastmod>{{ \Carbon\Carbon::parse($news->effective_date)->format('Y-m-d\TH:i:sP') }}</lastmod>
            </url>
        @endif
    @endforeach
</urlset>
