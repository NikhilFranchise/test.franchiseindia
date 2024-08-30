<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($tagsData as $tag)
        <url>
            <loc>{{ url('/') }}/insights/tag/{{ strtolower(str_replace(' ', '-', $tag['tag'])) }}</loc>
            <lastmod>{{ date('d-m-Y h:m A', strtotime($tag['created_at'])) }}</lastmod>
        </url>
    @endforeach
</urlset>
