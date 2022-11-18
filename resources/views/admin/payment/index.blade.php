@extends('layouts.main')

@section('container')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">order_id</th>
                <th scope="col">status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>
                    <th scope="row">{{ $payment->id }}</th>
                    <td>{{ $payment->order_id }}</td>
                    <td>{{ $payment->status }}</td>
                    <td>
                        <a href="/admin/payments/{{ $payment->id }}/edit" class="text-dark">
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
