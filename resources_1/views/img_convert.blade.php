<form action="/convert-image" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" required>
    <button type="submit">Convert to WebP</button>
</form>
