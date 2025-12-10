<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($subcategories as $sdata)
        <url>
            <loc>{{ subCategoryUrl($sdata) }}</loc>
            <lastmod>{{ \Carbon\Carbon::parse($sdata['created_at'])->format('Y-m-d\TH:i:sP') }}</lastmod>
        </url>
    @endforeach
</urlset>
