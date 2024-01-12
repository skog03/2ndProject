@extends('layout')
@section('content')
<h1>{{ $title }}</h1>
@if ($errors->any())
 <div class="alert alert-danger">Please fix the validation errors!</div>
@endif
<form
 method="post"
 action="{{ $album->exists ? '/albums/patch/' . $album->id : '/albums/put' }}"
 enctype="multipart/form-data"
 >
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
 @if ($artist->id == old('artist_id', $album->artist->id ?? false)) selected @endif
 >{{ $artist->name }}</option>
 @endforeach
 </select>
 @error('artist_id')
 <p class="invalid-feedback">{{ $errors->first('artist_id') }}</p>
 @enderror
 </div>

 <div class="mb-3">
 <label for="album-genre" class="form-label">Genre</label>
 <select
 id="album-genre"
 name="genre_id"
 class="form-select @error('genre_id') is-invalid @enderror"
 >
 <option value="">Choose the genre!</option>
 @foreach($genres as $genre)
 <option
 value="{{ $genre->id }}"
 @if ($genre->id == old('genre_id', $album->genre->id ?? false)) selected @endif
 >{{ $genre->name }}</option>
 @endforeach
 </select>
 @error('genre_id')
 <p class="invalid-feedback">{{ $errors->first('genre_id') }}</p>
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
 


 <div class="mb-3">
 <label for="album-image" class="form-label">Image</label>
 @if ($album->image)
 <img
 src="{{ asset('images/' . $album->image) }}"
 class="img-fluid img-thumbnail d-block mb-2"
 alt="{{ $album->name }}"
 >
 @endif
 <input
 type="file" accept="image/png, image/webp, image/jpeg"
 id="album-image"
 name="image"
 class="form-control @error('image') is-invalid @enderror"
 >
 @error('image')
 <p class="invalid-feedback">{{ $errors->first('image') }}</p>
 @enderror
</div>


 </div>
 </div>
 <button type="submit" class="btn btn-primary">
 {{ $album->exists ? 'Update' : 'Create' }}
 </button>
</form>
@endsection