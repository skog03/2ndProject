<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Http\Controllers\ArtistController;

class AlbumController extends Controller
{
    public function list()
    {
        $items = Album::orderBy('name', 'asc')->get();
        return view(
            'album.list',
            [
                'title' => 'Albums',
                'items' => $items
                ]
            );
        }
    public function create()
    {
        $artists = Artist::orderBy('name', 'asc')->get();
        return view(
        'album.form',
        [
        'title' => 'Add album',
        'album' => new Album(),
        'artists' => $artists,
        ]
        );

    }

    public function put(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required|min:3|max:256',
        'artist_id' => 'required',
        'description' => 'nullable',
        'price' => 'nullable|numeric',
        'year' => 'numeric',
        'image' => 'nullable|image',
        'display' => 'nullable'
        ]);
        $album = new Album();
        $album->name = $validatedData['name'];
        $album->artist_id = $validatedData['artist_id'];
        $album->description = $validatedData['description'];
        $album->price = $validatedData['price'];
        $album->year = $validatedData['year'];
        $album->display = (bool) ($validatedData['display'] ?? false);
        $album->save();
        return redirect('/albums');
}

        

}
