@extends('layouts.main')

@section('container')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Maskapai</th>
                <th scope="col">Slug Maskapai</th>
                <th scope="col">Gate</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($airlines as $airline)
                <tr>
                    <th scope="row">{{ $airline->id }}</th>
                    <td>{{ $airline->name }}</td>
                    <td>{{ $airline->slug }}</td>
                    <td>{{ $airline->gate }}</td>
                    <td>
                        <a href="/admin/airlines/{{ $airline->id }}/edit" class="text-dark">
                            edit airline
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
