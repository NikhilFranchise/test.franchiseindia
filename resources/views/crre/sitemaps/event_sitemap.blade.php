<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($eventsitemap as $news)
        @php
            $type = strtolower($news->insight_type);
            $locale = App::getLocale();
        @endphp
        @if ($news->insight_type = 'Event')
            <url>
                <loc>{{ url('/insights/' . $locale . '/' . $type . '/' . $news->slug . '.' . $news->news_id) }}</loc>
                <lastmod>{{ \Carbon\Carbon::parse($news->effective_date)->format('Y-m-d\TH:i:sP') }}</lastmod>
            </url>
        @endif
    @endforeach
</urlset>
