@foreach($items as $item)
    <div class="item">
        {{-- <h3>{{ $item->name }}</h3> --}}
        <p>{{ $item->company_name }}</p>
    </div>
@endforeach

<div class="pagination">
    <!-- Custom pagination links with AJAX -->
    {{ $items->links('vendor.pagination.ajax') }}
</div>
