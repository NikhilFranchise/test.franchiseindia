<sightmapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    {{-- @dd($lang);  --}}
    <sitemap>
        <loc>{{ url('/crre/' . $locale . '/news.xml') }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/crre/' . $locale . '/article.xml') }}</loc>
    </sitemap>
    @if ($lang != 'hi')
    <sitemap>
        <loc>{{ url('/crre/' . $locale . '/article2.xml') }}</loc>
    </sitemap>
    @endif
    <sitemap>
        <loc>{{ url('/crre/' . $locale . '/interview.xml') }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/crre/' . $locale . '/report.xml') }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/crre/' . $locale . '/event.xml') }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/crre/' . $locale . '/categories.xml') }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/crre/' . $locale . '/subcategories.xml') }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/crre/' . $locale . '/tags.xml') }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/crre/' . $locale . '/googlenews.xml') }}</loc>
    </sitemap>

</sightmapindex>