<sightmapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @php
        $lang = request()->segment(2) === 'hi' ? 'hi' : 'en';
    @endphp

    {{--  @dd($lang);  --}}
    <sitemap>
        <loc>{{ url('/insights/' . $lang . '/news.xml') }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/insights/' . $lang . '/article.xml') }}</loc>
    </sitemap>
    @if ($lang != 'hi')
        <sitemap>
            <loc>{{ url('/insights/' . $lang . '/article2.xml') }}</loc>
        </sitemap>
    @endif
    <sitemap>
        <loc>{{ url('/insights/' . $lang . '/interview.xml') }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/insights/' . $lang . '/report.xml') }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/insights/' . $lang . '/event.xml') }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/insights/' . $lang . '/categories.xml') }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/insights/' . $lang . '/subcategories.xml') }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/insights/' . $lang . '/tags.xml') }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/insights/' . $lang . '/googlenews.xml') }}</loc>
    </sitemap>

</sightmapindex>
