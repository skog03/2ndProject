<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
// display all genres
 public function list()
 {
 $items = Genre::orderBy('name', 'asc')->get();
 return view(
 'genre.list',
 [
 'title' => 'Genres',
 'items' => $items
 ]
 );
}
//create new genre
 public function create()
 {
  return view(
  'genre.form',
  [
  'title' => 'Add new genre',
  'genre' => new Genre()
  ]
  );
 }


 public function put(Request $request)
{
 $validatedData = $request->validate([
 'name' => 'required',
 ]);
 $genre = new Genre();
 $genre->name = $validatedData['name'];
 $genre->save();
 return redirect('/genres');
}

public function update(Genre $genre)
{
 return view(
 'genre.form',
 [
 'title' => 'Edit genre',
 'genre' => $genre
 ]
 );
}

public function patch(Genre $genre, Request $request)
{
 $validatedData = $request->validate([
 'name' => 'required',
 ]);
 $genre->name = $validatedData['name'];
 $genre->save();
 return redirect('/genres');
}

public function delete(Genre $genre)
{
 $genre->delete();
 return redirect('/genres');
}

 
public function __construct()
{
 $this->middleware('auth');
}
}
