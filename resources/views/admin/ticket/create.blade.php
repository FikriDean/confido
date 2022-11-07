<form action="/admin/ticket" method="POST">
    @csrf
    @method('POST')

    <label for="airline_id">Airline:</label>

    <select name="airline_id" id="airline_id">
        <option selected>Choose Airline: </option>

        @foreach ($airlines as $airline)
            @if (old('airline_id') == $airline->id)
                <option value="{{ $airline->id }}" selected>{{ $airline->name }}</option>
            @else
                <option value="{{ $airline->id }}">{{ $airline->name }}</option>
            @endif
        @endforeach
    </select>

    <br><br>

    <label for="type_id">Class:</label>

    <select name="type_id" id="type_id">
        <option selected>Choose Airline Class: </option>

        @foreach ($types as $type)
            @if (old('type_id') == $type->id)
                <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
            @else
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endif
        @endforeach
    </select>

    <br><br>

    <label for="track_id">Route:</label>

    <select name="track_id" id="track_id">
        <option selected>Choose Route: </option>

        @foreach ($tracks as $track)
            @if (old('track_id') == $track->id)
                <option value="{{ $track->id }}" selected>{{ $track->from_route }} - {{ $track->to_route }}</option>
            @else
                <option value="{{ $track->id }}">{{ $track->from_route }} - {{ $track->to_route }}</option>
            @endif
        @endforeach
    </select>

    <br><br>

    @if (session('sameTicket'))
        <div class="alert alert-success">
            {{ session('sameTicket') }}
        </div>
    @endif

    <input type="submit" value="Submit">
</form>
