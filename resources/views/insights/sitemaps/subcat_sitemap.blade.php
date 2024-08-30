<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($subcategories as $sdata)
        <url>
            <loc>{{ url('/') }}/insights/{{ strtolower($sdata['category']->slug) }}/{{ strtolower($sdata['scategory']->slug) }}</loc>
            <lastmod>{{ date('d-m-Y h:m A', strtotime($sdata['created_at'])) }}</lastmod>
        </url>
    @endforeach
</urlset>
