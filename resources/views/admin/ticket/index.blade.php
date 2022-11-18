@extends('layouts.main')

@section('container')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Airline</th>
                <th scope="col">Class Airline</th>
                <th scope="col">From Route</th>
                <th scope="col">To Route</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <th scope="row">{{ $ticket->id }}</th>
                    <td>{{ $ticket->airline->name }}</td>
                    <td>{{ $ticket->type->name }}</td>
                    <td>{{ $ticket->track->from_route }}</td>
                    <td>{{ $ticket->track->to_route }}</td>
                    @if ($ticket->price)
                        <td>{{ $ticket->price->price }}</td>

                        <td>
                            <a href="/admin/prices/{{ $ticket->price->id }}/edit" class="text-dark">
                                Edit Price
                            </a>
                        </td>
                    @else
                        <td></td>
                    @endif
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
