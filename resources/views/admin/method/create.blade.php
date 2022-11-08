<form action="/admin/methods" method="POST">
    @csrf
    @method('POST')

    <label for="method">Method:</label>
    <input type="text" id="method" name="method"><br><br>
    <input type="submit" value="Submit">
</form>
