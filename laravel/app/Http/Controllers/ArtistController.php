<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;


class ArtistController extends Controller
{
    public function list(){
        $items = Artist::orderBy('name', 'asc')->get();

        return view(
            'artist.list',
            [
                'title' => 'Artists',
                'items' => $items
            ]
        )
    }

    public function create()
    {
        return view(
            'artist.form',
            [
                'title' => 'Add new artist'
                ]
            );
        }

        public function put(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required',
            ]);
            $artist = new Artist();
            $artist->name = $validatedData['name'];
            $artist->save();
            return redirect('/artist');
        }

}
