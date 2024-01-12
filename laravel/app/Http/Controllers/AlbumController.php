<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Artist;
use App\Http\Requests\AlbumRequests;

class AlbumController extends Controller
{
    private function saveAlbumData(Album $album, AlbumRequests $request)
{
 $validatedData = $request->validated();

 $album->fill($validatedData);
 $album->display = (bool) ($validatedData['display'] ?? false);
 
 
 if ($request->hasFile('image')) {
 $uploadedFile = $request->file('image');
 $extension = $uploadedFile->clientExtension();
 $name = uniqid();
 $album->image = $uploadedFile->storePubliclyAs(
 '/',
 $name . '.' . $extension,
 'uploads'
 );
 }
 $album->save();
}

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

    public function put(AlbumRequests $request)
    {
        $album = new Album();
        $this->saveAlbumData($album, $request);
        return redirect('/albums');
    }



    public function update(Album $album)
{
 $artists = Artist::orderBy('name', 'asc')->get();
 return view(
 'album.form',
 [
 'title' => 'Edit album',
 'album' => $album,
 'artists' => $artists,
 ]
 );
}

public function patch(Album $album, AlbumRequests $request)
{
    $this->saveAlbumData($album, $request);
    return redirect('/albums/update/' . $album->id);
}


public function delete(Album $album)
{
 $album->delete();
 return redirect('/albums');
}
    
public function __construct()
{
 $this->middleware('auth');
}
}
