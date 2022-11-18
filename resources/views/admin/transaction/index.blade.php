@extends('layouts.main')

@section('container')
    <label>Transaction Info:</label>

    <br><br>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Order_id</th>
                <th scope="col">Method</th>
                <th scope="col">target_account</th>
                <th scope="col">Account's name</th>
                <th scope="col">From_account</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <th scope="row">{{ $transaction->id }}</th>
                    <td>{{ $transaction->order->id }}</td>
                    <td>{{ $transaction->method->method }}</td>
                    <td>{{ $transaction->method->target_account }}</td>
                    <td>{{ $transaction->name_account }}</td>
                    <td>{{ $transaction->from_account }}</td>
                    <td>{{ $transaction->total }}</td>
                    <td>{{ $transaction->status }}</td>
                    <td><a class="text-dark" href="/admin/transactions/{{ $transaction->id }}/edit">Edit Status</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
