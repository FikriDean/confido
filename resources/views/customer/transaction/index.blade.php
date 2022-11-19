@extends('layouts.main')


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
            <th scope="col">bukti pembayaran</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $transaction)
            @if ($transaction->order->user_id == Auth::id())
                <tr>
                    <th scope="row">{{ $transaction->id }}</th>
                    <td>{{ $transaction->order->id }}</td>
                    <td>{{ $transaction->method->method }}</td>
                    <td>{{ $transaction->method->target_account }}</td>
                    <td>{{ $transaction->name_account }}</td>
                    <td>{{ $transaction->from_account }}</td>
                    <td>{{ $transaction->total }}</td>
                    <td>
                        @if ($transaction->image)
                            <img width="100px" src="{{ asset($transaction->image) }}" alt="">
                        @endif
                    </td>
                    <td>
                        @if ($transaction->status == true)
                            Confirmed
                        @else
                            Not Confirmed Yet
                        @endif

                    </td>
                    <td>
                        <a href="/transactions/{{ $transaction->id }}/edit" class="text-dark">upload bukti
                            pembayaran</a>
                    </td>
                </tr>
            @endif
        @endforeach

    </tbody>
</table>
