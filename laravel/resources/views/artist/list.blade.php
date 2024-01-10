@extends('layout')
@section('content')
<h1>{{ $title }}</h1>
@if (count($items) > 0)
<table class="table table-striped table-hover table-sm">
    <thead class="thead-light">
        <tr>
            <th>ID</td>
            <th>Name</td>
            <th>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $artist)
        <tr>
            <td>{{ $artist->id }}</td>
            <td>{{ $artist->name }}</td>
            <td><a href="/artists/update/{{ $artist->id }}" class="btn btn-outline-primary btnsm">Edit</a>
 / <form action="/artists/delete/{{ $artist->id }}" method="post" class="deletionform d-inline">
 @csrf
 <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
</form></td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <a href="/artists/create" class="btn btn-primary">Make new</a>

 @else
    <p>No entries found in database</p>
    @endif
@endsection