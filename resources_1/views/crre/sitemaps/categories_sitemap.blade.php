<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($categorydata as $data)
        @php
            $type = strtolower($data['category']->slug);
        @endphp
        <url>
            <loc>{{ categoryUrl($data) }}</loc>
            <lastmod>{{ \Carbon\Carbon::parse($news->effective_date)->format('Y-m-d\TH:i:sP') }}</lastmod>
        </url>
    @endforeach
</urlset>
