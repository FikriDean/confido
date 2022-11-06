@extends('layouts.main')

@section('container')

<table class="table my-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Airline</th>
      <th scope="col">Pickup</th>
      <th scope="col">Destination</th>
      <th scope="col">Class</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($prices as $price)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $price->airline }}</td>
        <td>{{ $price->pickup }}</td>
        <td>{{ $price->destination }}</td>
        <td>{{ $price->class }}</td>
        <td>{{ $price->price }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection