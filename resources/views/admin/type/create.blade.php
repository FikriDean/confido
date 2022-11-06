<form action="/admin/type" method="POST">
    @csrf
    @method('POST')

    <label for="name">Type:</label>
    <input type="text" id="name" name="name"><br><br>
    <input type="submit" value="Submit">
</form>
