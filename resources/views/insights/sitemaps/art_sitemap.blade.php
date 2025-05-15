<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach ($articlesitemap as $news)
        @php
            $locale = App::getLocale();
            $type = strtolower($news->insight_type);
        @endphp
        @if ($news->insight_type = 'Article')
            <url>
                <loc>{{ url('/insights/' . $locale . '/' . $type . '/' . $news->slug . '.' . $news->news_id) }}</loc>
                <lastmod>{{ \Carbon\Carbon::parse($news->effective_date)->format('Y-m-d\TH:i:sP') }}</lastmod>
            </url>
        @endif
    @endforeach
</urlset>
