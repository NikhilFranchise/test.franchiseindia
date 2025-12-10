@props(['article', 'locale'])

@php
$image = imageUrl($article->image);
$url = crreUrl($article);
$mainDomain = Config('constants.mainDomain');

// author defaults
$authorname = 'Franchise India Bureau';
$authorUrl = '#';
$author_image = url('images/defaultuser.png');

// If author exists
if (!empty($article->author) && $article->author->isNotEmpty()) {
$author = $article->author->first();

$authorname = $author->title ?: $authorname;
$authorUrl = authorUrl($author);
$authorImage = authorImageUrl($author->image);
}
@endphp

<li>
    <div class="author-fresh">
        <div class="author-latest-pic">
            <a href="{{ $url }}">
                <img src="{{ $image }}" alt="{{ $article->title }}" class="img-fluid">
            </a>
        </div>

        <div class="author-fresh-cont">
            <div class="author-latest-title">
                <a href="{{ $url }}">{{ $article->title }}</a>
            </div>

            <p>{!! html_entity_decode(Str::words($article->shortDesc, 32, ' ...')) !!}</p>

            <ul class="art-detail-read">
                <li>
                    By - <a href="{{ $authorUrl }}" hreflang="{{ $locale }}">{{ $authorname }}</a>
                </li>

                <li>
                    <time>{{ $article->display_date }}</time> /
                    {{ calculateReadTime($article) }} MIN READ
                </li>
            </ul>
        </div>
    </div>
</li>