@props(['author_details', 'newsDetails', 'authorImage', 'authorUrl'])

<div class="article-date">

    {{-- AUTHOR IMAGE --}}
    <div class="article-logo">
        <img src="{{ $authorImage }}" width="51" height="51" alt="{{ $author_details->title }}" loading="lazy">
    </div>

    {{-- AUTHOR INFORMATION --}}
    <div class="article-time">
        BY -
        <a href="{{ $authorUrl }}">{{ $author_details->title }}</a>
        <br>

        @if (!empty($author_details->designation))
            <span>{{ $author_details->designation }}</span>
        @endif

        <span>
            {{ $newsDetails->display_date }}

            <img src="{{ url('/insight-new/images/vicon.webp') }}" height="10" width="17" alt="Franchise Insights"
                class="img-fluid">

            {{ $newsDetails->views }} /
            {{ calculateReadTime($newsDetails) }} Min Read
        </span>
    </div>
</div>
