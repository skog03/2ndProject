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
  'title' => 'Add new genre'
  ]
  );
 }

 public function put(Request $request)
{
 $validatedData = $request->validate([
 'name' => 'required',
 ]);
 $genre = new Genres();
 $genre->name = $validatedData['name'];
 $genre->save();
 return redirect('/genres');
}



 
}
