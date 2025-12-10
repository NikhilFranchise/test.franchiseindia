{{-- @props([
    'items' => [], // array of breadcrumb items
    'class' => 'breadcrumb', // default class but can be overridden
])

<div class="authblk">
    <div class="container">
        <ul class="{{ $class }}">
@foreach ($items as $item)
<li class="{{ $class == 'breadcrumb' ? 'breadcrumb-item' : '' }}">
    @if (isset($item['url']) && $item['url'])
    <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
    @else
    {{ $item['label'] }}
    @endif
</li>
@endforeach
</ul>
</div>
</div> --}}

@props([
    'items' => [], // array of ['label'=>'', 'url'=>'', 'active'=>bool]
    'wrapperClass' => 'authblk',
    'containerClass' => 'container',
    'listClass' => 'breadcrumb',
])

<div class="{{ $wrapperClass }}">
    <div class="{{ $containerClass }}">
        <ul class="{{ $listClass }}">
            @foreach ($items as $item)
                @if (!empty($item['url']) && empty($item['active']))
                    <li class="{{ Str::contains($listClass, 'breadcrumb') ? 'breadcrumb-item' : '' }}">
                        <a href="{{ $item['url'] }}" {!! $item['attrs'] ?? '' !!}>
                            {!! $item['label'] !!}
                        </a>
                    </li>
                @else
                    <li class="{{ Str::contains($listClass, 'breadcrumb') ? 'breadcrumb-item' : '' }}">
                        {!! $item['label'] !!}
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
