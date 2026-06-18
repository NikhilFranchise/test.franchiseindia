<div class="innerlist">
    <div class="imgbl">
        <a href="{{ $url }}">
            <img src="{{ $image }}" alt="{{ $title . ' image' }}">
        </a>
    </div>

    <div class="conblk">
        @foreach ($categories as $cat)
        <div class="tagl">{{ $cat->catname }}</div>
        @endforeach

        <div class="hname">
            <a href="{{ $url }}">{{ $title }}</a>
        </div>
    </div>
</div>