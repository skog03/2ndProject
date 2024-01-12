<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;

class DataController extends Controller
{
    // Returns 3 published Album objects in random order
public function getTopAlbums()
{
 $albums = Album::where('display', true)
 ->inRandomOrder()
 ->take(3)
 ->get();
 return $albums;
}
// Returns the selected Album object, if it’s published
public function getAlbum(Album $album)
{
 $selectedAlbum = Album::where([
 'id' => $album->id,
 'display' => true,
 ])
 ->firstOrFail();
 return $selectedAlbum;
}
// Returns 3 published Album objects in random order- except the selected one
public function getRelatedAlbums(Album $album)
{
 $albums = Album::where('display', true)
 ->where('id', '<>', $album->id)
 ->inRandomOrder()
 ->take(3)
 ->get();
 return $albums;
}

}
