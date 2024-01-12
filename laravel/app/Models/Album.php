<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'artist_id', 'description', 'price', 'year'];


    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

}
