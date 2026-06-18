@props(['popular'])

<li>
    @foreach ($popular->category as $cat)
    <div class="popular-sub">
        <a href="{{ categoryUrl($cat) }}">
            {{ ucwords($cat->catname) }}
        </a>
    </div>
    @endforeach

    <div class="popular-head">
        <a href="{{ crreUrl($popular) }}">{{ $popular->title }}</a>
    </div>
</li>