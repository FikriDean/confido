@extends('layouts.main')

@section('container')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">user</th>
                <th scope="col">order code</th>
                <th scope="col">ticket_id</th>
                <th scope="col">round_trip</th>
                <th scope="col">go_date</th>
                <th scope="col">return_date</th>
                <th scope="col">amount</th>
                <th scope="col">order date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->order_code }}</td>
                    <td>{{ $order->ticket_id }}</td>
                    <td>{{ $order->round_trip }}</td>
                    <td>{{ $order->go_date }}</td>
                    <td>{{ $order->return_date }}</td>
                    <td>{{ $order->amount }}</td>
                    <td>{{ $order->created_at }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
