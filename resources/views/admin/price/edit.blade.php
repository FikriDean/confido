@extends('layouts.main')

@section('container')
    <label>Ticket Info:</label>

    <br><br>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Airline</th>
                <th scope="col">Class Airline</th>
                <th scope="col">From Route</th>
                <th scope="col">To Route</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $price->id }}</th>
                <td>{{ $price->ticket->airline->name }}</td>
                <td>{{ $price->ticket->type->name }}</td>
                <td>{{ $price->ticket->track->from_route }}</td>
                <td>{{ $price->ticket->track->to_route }}</td>
                @if ($price->price)
                    <td>{{ $price->price }}</td>
                @else
                    <td>not yet set</td>
                @endif
            </tr>

        </tbody>
    </table>

    <form action="/admin/prices/{{ $price->id }}" method="POST">
        @csrf
        @method('PUT')

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="{{ $price->price }}">

        @if (session('samePrice'))
            <div class="alert alert-success">
                {{ session('samePrice') }}
            </div>
        @endif

        <br><br>

        <button type="submit">Update Price</button>

    </form>
@endsection
