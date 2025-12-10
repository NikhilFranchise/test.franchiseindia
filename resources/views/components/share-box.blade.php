<div class="content-share">
    <ul>
        <li>
            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($newsUrl) }}">
                <img src="{{ url('insight-new/images/fshare.webp') }}" height="25" width="25" loading="lazy"
                    alt="Share on Facebook">
            </a>
        </li>

        <li>
            <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ $newsUrl }}">
                <img src="{{ url('insight-new/images/flink.webp') }}" height="25" width="25" loading="lazy"
                    alt="Share on LinkedIn">
            </a>
        </li>

        <li>
            <a target="_blank" href="https://x.com/intent/post?url={{ $newsUrl }}">
                <img src="{{ url('insight-new/images/ftwit.webp') }}" height="25" width="25" loading="lazy"
                    alt="Share on X">
            </a>
        </li>
    </ul>
</div>

<div class="follow-us">
    <a href="{{ $followUrl ?? '#' }}" target="_blank">
        Follow Us
        <img src="{{ url('insight-new/images/follow.webp') }}" loading="lazy" alt="Franchise India" width="11"
            height="10">
    </a>
</div>
