@php
    $routeFrom = [];
    $routeTo = [];
    
    foreach ($routes as $route) {
        array_push($routeFrom, $route->from_route);
        array_push($routeTo, $route->to_route);
    }
    
    $routeFrom = array_unique($routeFrom);
    $routeTo = array_unique($routeTo);
    
@endphp

@extends('layouts.main')

@section('container')
    <h3>
        Tickets
    </h3>

    <label for="pickup" class="form-label">Pickup</label>

    <select name="from_route" class="form-select" id="pickup" required>
        <option selected value="">--Choose Pickup--</option>

        @foreach ($routeFrom as $rf)
            <option value="{{ $rf }}">
                {{ ucfirst($rf) }}
            </option>
        @endforeach
    </select>

    <br>

    <label for="destination" class="form-label">Destination</label>

    <select name="to_route" class="form-select" id="destination" required>
        <option selected value="">--Choose Destination--</option>
        @foreach ($routeTo as $rt)
            <option value="{{ $rt }}">
                {{ ucfirst($rt) }}
            </option>
        @endforeach
    </select>

    <br>

    <label for="airline" class="form-label">Airline</label>

    <select name="airline_id" class="form-select" id="airline" required>
        <option selected value="">--Choose Airline--</option>
        @foreach ($airlines as $airline)
            <option value="{{ $airline->id }}">
                {{ ucfirst($airline->name) }}
            </option>
        @endforeach
    </select>

    <br>

    <label for="class">Airline Class</label>

    <select name="type_id" class="form-select" id="airline_class" required>
        <option selected value="">--Choose Airline Class--</option>
        @foreach ($types as $type)
            <option value="{{ $type->id }}">
                {{ ucfirst($type->name) }}
            </option>
        @endforeach
    </select>

    <br>

    <a class="btn btn-primary" id="checkTicketButton">Check available tickets</a>

    <br>

    <h2>Available Tickets</h2>

    <ul id="tickets_shelf">

    </ul>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Airline</th>
                <th scope="col">Type</th>
                <th scope="col">From route</th>
                <th scope="col">To route</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <th scope="row">{{ $ticket->id }}</th>
                    <td>{{ $ticket->airline->name }}</td>
                    <td>{{ $ticket->Type->name }}</td>
                    <td>{{ $ticket->Track->from_route }}</td>
                    <td>{{ $ticket->Track->to_route }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection

<script>
    window.onload = init;

    function init() {
        const checkTicketButton = document.getElementById('checkTicketButton');
        const ticketsShelf = document.getElementById('tickets_shelf');
        const pickup = document.getElementById("pickup");
        const destination = document.getElementById("destination");
        const airline = document.getElementById("airline");
        const airline_class = document.getElementById("airline_class");

        // checkTicketButton.addEventListener('click', function() {
        //     fetch(
        //             `/checktickets`
        //         )
        //         .then(response => {
        //             return response.json();
        //         })
        //         .then(res => {
        //             console.log(res.tickets);
        //             ticketsShelf.innerHTML = res.tickets.map(ticket => {
        //                 return `
        //                   ${ticket->airline_id}
        //                 `

        //             }).join('');
        //             // test.innerHTML = res.price;
        //         })
        //         .catch(res => {
        //             // test.innerHTML = "Price cannot be loaded";
        //         })
        // })
    }
</script>
