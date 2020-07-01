<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Anime extends Model
{
    protected $fillable = ['title', 'image', 'episodes', 'status', 'aired', 'producers', 'studios', 'duration'];
    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'genre_anime');
    }
    public function loves()
    {
        return $this->belongsToMany('App\User', 'anime_user_favorite');
    }

    public function getIsFavAttribute(){
        return Auth::user()->loves->contains($this);
    }

    public function getTotFavAttribute()
    {
        return $this->loves->count();
    }
}
