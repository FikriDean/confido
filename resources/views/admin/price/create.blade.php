<form action="/admin/prices" method="POST">
    @csrf
    @method('POST')

    <label for="ticket_id">Choose a ticket:</label>
    <select id="ticket_id" name="ticket_id">
        <option selected>Choose Ticket</option>
        @foreach ($tickets as $ticket)
            <option value="{{ $ticket->id }}">
                Airline: {{ $ticket->airline->name }}
                Class: {{ $ticket->type->name }}
                Route: {{ $ticket->type->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <label for="price">Price:</label>
    <input type="text" id="price" name="price">

    @if (session('samePrice'))
        <div class="alert alert-success">
            {{ session('samePrice') }}
        </div>
    @endif

    <br><br>

    <button type="submit">Update Price</button>

</form>
