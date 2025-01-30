<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($categorydata as $data)
        @php
            $type = strtolower($data['category']->slug);
            $locale = App::getLocale();
        @endphp
        <url>
            <loc>{{ url('/insights/' . $locale . '/' . $type) }}</loc>
            <lastmod>{{ date('d-m-Y', strtotime($data['created_at'])) }}</lastmod>
        </url>
    @endforeach
</urlset>
