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
            );
    }

    public function create()
    {
        return view(
            'artist.form',
            [
                'title' => 'Add new artist',
                'artist' => new Artist()
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

        public function update(Artist $artist)
        {
            return view(
                'artist.form',
                [
                    'title' => 'Edit artist',
                    'artist' => $artist
                    ]
                );
            }


        public function patch(Artist $artist, Request $request)
        {
            $validatedData = $request->validate(
                [
                    'name' => 'required',
                ]
            );
            $artist->name = $validatedData['name'];
            $artist->save();

            return redirect('/artists');
        }

        public function delete(Artist $artist)
        {
            $artist->delete();
            return redirect('/artists');
        }
            
        public function __construct()
{
 $this->middleware('auth');
}
}
