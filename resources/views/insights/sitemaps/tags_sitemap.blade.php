<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($tagsData as $tag)
        @php
            $locale = App::getLocale();
            $tagtype = strtolower(str_replace(' ', '-', $tag['tag']));
        @endphp
        <url>
            <loc>{{ url('/insights/' . $locale . '/tag/' . $tagtype) }}</loc>
            <lastmod>{{ date('d-m-Y', strtotime($tag['created_at'])) }}</lastmod>
        </url>
    @endforeach
</urlset>
