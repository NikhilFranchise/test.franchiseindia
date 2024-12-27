<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($interviewsitemap as $news)
        @php
            $type = strtolower($news->insight_type);
            $locale = App::getLocale();
        @endphp
        @if ($news->insight_type = 'Interview')
            <url>
                <loc>{{ url('/insights/' . $locale . '/' . $type . '/' . $news->slug . '.' . $news->news_id) }}</loc>
                <lastmod>{{ date('d-m-Y', strtotime($news->created_at)) }}</lastmod>
            </url>
        @endif
    @endforeach
</urlset>
