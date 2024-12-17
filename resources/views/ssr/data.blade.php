<table class="table table-bordered">
    <thead>
        <tr>
            <th>name</th>
          
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->company_name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination Links -->
<div class="d-flex justify-content-center">
    {{ $items->links() }}
</div>
