<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach ($articlesitemap as $news)
        @php
            $locale = App::getLocale();
            $type = strtolower($news->insight_type);
        @endphp
        @if ($news->insight_type = 'Article')
            <url>
                <loc>{{ url('/insights/' . $locale . '/' . $type . '/' . $news->slug . '.' . $news->news_id) }}</loc>
                <lastmod>{{ date('d-m-Y', strtotime($news->created_at)) }}</lastmod>
            </url>
        @endif
    @endforeach
</urlset>
