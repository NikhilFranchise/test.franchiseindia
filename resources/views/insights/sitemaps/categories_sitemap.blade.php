<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($categorydata as $data)
        <url>
            <loc>{{ url('/') }}/insights/{{ strtolower($data['category']->slug) }}</loc>
            <lastmod>{{ date('d-m-Y h:m:s A', strtotime($data['created_at'])) }}</lastmod>
        </url>
    @endforeach
</urlset>
