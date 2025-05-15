<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($categorydata as $data)
        @php
            $type = strtolower($data['category']->slug);
            $locale = App::getLocale();
        @endphp
        <url>
            <loc>{{ url('/insights/' . $locale . '/' . $type) }}</loc>
            <lastmod>{{ \Carbon\Carbon::parse($data['created_at'])->format('Y-m-d\TH:i:sP') }}</lastmod>
        </url>
    @endforeach
</urlset>
