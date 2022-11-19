<!DOCTYPE html>
<html>

<body>

    <form action="/transactions/{{ $transaction->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        Select image to upload:
        <input type="file" name="image" id="image">

        <br><br>

        <input type="submit" value="Upload Image" name="submit">
    </form>

</body>

</html>
