<sightmapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @php
        $lang = request()->segment(2) === 'hi' ? 'hi': null;
    @endphp

    {{--  @dd($lang);  --}}
    <sitemap>
        <loc>{{ url('/'.$lang) }}/insights/news.xml</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/'.$lang) }}/insights/article.xml</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/'.$lang) }}/insights/article2.xml</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/'.$lang) }}/insights/interview.xml</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/'.$lang) }}/insights/report.xml</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/'.$lang) }}/insights/event.xml</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/'.$lang) }}/insights/categories.xml</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/'.$lang) }}/insights/subcategories.xml</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/'.$lang) }}/insights/tags.xml</loc>
    </sitemap>

</sightmapindex>
