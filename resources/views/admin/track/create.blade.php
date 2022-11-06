<form action="/admin/track" method="POST">
    @csrf
    @method('POST')

    <label for="from_route">Track From Route:</label>
    <input type="text" id="from_route" name="from_route"><br><br>
    <label for="to_route">Track To Route:</label>
    <input type="text" id="to_route" name="to_route"><br><br>
    <input type="submit" value="Submit">
</form>
