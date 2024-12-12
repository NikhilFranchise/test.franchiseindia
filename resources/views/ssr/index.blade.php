<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item List</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ6Fu/Q8ZgADh7U0I4CenX8AihS2zkD8OumIZjsY/MrFJbSTGL9Z/hdrz4e2" crossorigin="anonymous">

</head>
<body>
    <h1>Items List</h1>

    <div id="items-list">
        <!-- The item data will be loaded here -->
        @include('ssr.pagination', ['items' => $items])
    </div>

    <div class="pagination">
        <!-- Pagination links will be rendered here -->
        {{ $items->links() }}
    </div>

    <script>
        $(document).ready(function() {
            // Intercept pagination clicks
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var url = $(this).attr('href'); // Get the URL of the next page
                getItems(url);
            });

            // Function to fetch items using AJAX
            function getItems(url) {
                $.ajax({
                    url: url,
                    type: 'get',
                    success: function(response) {
                        $('#items-list').html(response.html); // Update the items list with new data
                    },
                    error: function(xhr, status, error) {
                        console.log('Error loading items:', error);
                    }
                });
            }
        });
    </script>
</body>
</html>
