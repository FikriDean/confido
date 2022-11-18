<form action="/admin/methods" method="POST">
    @csrf
    @method('POST')

    <label for="method">Method:</label>
    <input type="text" id="method" name="method"><br><br>

    <label for="target_account">Target Account:</label>
    <input type="text" id="target_account" name="target_account"><br><br>

    <input type="submit" value="Submit">
</form>
