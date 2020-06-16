<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    protected $fillable = ['title', 'image', 'episodes', 'status', 'aired', 'producers', 'studios', 'duration'];
    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'genre_anime');
    }
}
