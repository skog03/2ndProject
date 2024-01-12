<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'artist_id', 'genre_id', 'description', 'price', 'year'];


    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function jsonSerialize(): mixed
    {
        return [
        'id' => intval($this->id),
        'name' => $this->name,
        'description' => $this->description,
        'artist' => $this->artist->name,
        'genre' => ($this->genre ? $this->genre->name : ''),
        'price' => number_format($this->price, 2),
        'year' => intval($this->year),
        'image' => asset('images/' . $this->image),
    ];
    }

}
