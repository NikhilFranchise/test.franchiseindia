<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($tagsData as $tag)
        @php
            $locale = App::getLocale();
            $tagtype = strtolower(str_replace(' ', '-', $tag['tag']));
        @endphp
        <url>
            <loc>{{ url('/insights/' . $locale . '/tag/' . $tagtype) }}</loc>
            {{-- <lastmod>{{ $tag['created_at']->format('Y-m-d\TH:i:sP') }}</lastmod> --}}
            <lastmod>{{ \Carbon\Carbon::parse($tag['created_at'])->format('Y-m-d\TH:i:sP') }}</lastmod>

        </url>
    @endforeach
</urlset>
