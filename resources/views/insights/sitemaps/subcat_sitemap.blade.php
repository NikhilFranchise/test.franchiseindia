<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($subcategories as $sdata)
        @php
            $ctype = strtolower($sdata['category']->slug);
            $sctype = strtolower($sdata['scategory']->slug);
            $locale = App::getLocale();
        @endphp
        <url>
            <loc>{{ url('/insights/' . $locale . '/' . $ctype . '/' . $sctype) }}</loc>
            <lastmod>{{ date('d-m-Y', strtotime($sdata['created_at'])) }}</lastmod>
        </url>
    @endforeach
</urlset>
