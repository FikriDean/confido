<form action="/admin/airline" method="POST">
    @csrf
    @method('POST')

    <label for="name">Airline Name:</label>
    <input type="text" id="name" name="name"><br><br>
    <label for="slug">Airline Slug:</label>
    <input type="text" id="slug" name="slug"><br><br>
    <input type="submit" value="Submit">
</form>
