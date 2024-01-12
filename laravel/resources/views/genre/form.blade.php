@extends('layout')
@section('content')
 <h1>{{ $title }}</h1>
 @if ($errors->any())
 <div class="alert alert-danger">Please fix the errors! </div>
 @endif
 <form method="post" action="/genres/put">
 @csrf
 <div class="mb-3">
 <label for="genre-name" class="form-label">Genre name</label>
 <input
 type="text"
 class="form-control @error('name') is-invalid @enderror"
 id="genre-name"
 name="name">
 @error('name')
 <p class="invalid-feedback">{{ $errors->first('name') }}</p>
 @enderror
 </div>
 <button type="submit" class="btn btn-primary">Save</button>
 </form>
@endsection
