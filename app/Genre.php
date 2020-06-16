<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['nama'];
    public function animes()
    {
        return $this->belongsToMany('App\Anime', 'genre_anime');
    }
}
