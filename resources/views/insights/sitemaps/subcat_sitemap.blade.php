<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($subcategories as $sdata)
        @php
            $ctype = strtolower($sdata['category'][0]['slug']); // Access as an array
            $sctype = strtolower($sdata['scategory']['slug']); // Access as an array
            $locale = App::getLocale();
        @endphp
        <url>
            <loc>{{ url('/insights/' . $locale . '/' . $ctype . '/' . $sctype) }}</loc>
            <lastmod>{{ $sdata['created_at']->format('Y-m-d\TH:i:sP') }}</lastmod>
        </url>
    @endforeach
</urlset>
