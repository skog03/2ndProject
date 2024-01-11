@extends('layout')
@section('content')
<h1>{{ $title }}</h1>
@if ($errors->any())
 <div class="alert alert-danger">Please fix the validation errors!</div>
@endif
<form
 method="post"
 action="{{ $album->exists ? '/albums/patch/' . $booalbumk->id : '/albums/put' }}">
 @csrf
 <div class="mb-3">
 <label for="album-name" class="form-label">Name</label>
 <input
 type="text"
 id="album-name"
 name="name"
 value="{{ old('name', $album->name) }}"
 class="form-control @error('name') is-invalid @enderror"
 >
 @error('name')
 <p class="invalid-feedback">{{ $errors->first('name') }}</p>
 @enderror
 </div>
 <div class="mb-3">
 <label for="album-artist" class="form-label">Artist</label>
 <select
 id="album-artist"
 name="artist_id"
 class="form-select @error('artist_id') is-invalid @enderror"
 >
 <option value="">Choose the artist!</option>
 @foreach($artists as $artist)
 <option
 value="{{ $artist->id }}"
 @if ($artist->id == old('artist_id', $album->artist-
>id ?? false)) selected @endif
 >{{ $artist->name }}</option>
 @endforeach
 </select>
 @error('artist_id')
 <p class="invalid-feedback">{{ $errors->first('artist_id') }}</p>
 @enderror
 </div>
 <div class="mb-3">
 <label for="album-description" class="form-label">Description</label>
 <textarea
 id="album-description"
 name="description"
 class="form-control @error('description') is-invalid @enderror"
 >{{ old('description', $album->description) }}</textarea>
 @error('description')
 <p class="invalid-feedback">{{ $errors->first('description') }}</p>
 @enderror
 </div>
 <div class="mb-3">
 <label for="album-year" class="form-label">Release year</label>
 <input
 type="number" max="{{ date('Y') + 1 }}" step="1"
 id="album-year"
 name="year"
 value="{{ old('year', $album->year) }}"
 class="form-control @error('year') is-invalid @enderror"
 >
 @error('year')
 <p class="invalid-feedback">{{ $errors->first('year') }}</p>
 @enderror
 </div>
 <div class="mb-3">
 <label for="album-price" class="form-label">Price</label>
 <input
 type="number" min="0.00" step="0.01" lang="en"
 id="album-price"
 name="price"
 value="{{ old('price', $album->price) }}"
 class="form-control @error('price') is-invalid @enderror"
 >
 @error('price')
 <p class="invalid-feedback">{{ $errors->first('price') }}</p>
 @enderror
 </div>
 // image
 <div class="mb-3">
 <div class="form-check">
 <input
 type="checkbox"
 id="album-display"
 name="display"
 value="1"
 class="form-check-input @error('display') is-invalid @enderror"
 @if (old('display', $album->display)) checked @endif
 >
 <label class="form-check-label" for="album-display">
 Publish
 </label>
 @error('display')
 <p class="invalid-feedback">{{ $errors->first('display') }}</p>
 @enderror
 </div>
 </div>
 <button type="submit" class="btn btn-primary">
 {{ $album->exists ? 'Update' : 'Create' }}
 </button>
</form>
@endsection