<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('dashboard/', function () {
    return view('dashboard.home');
});

Route::resource('dashboard/anime', 'AnimeController');
Route::resource('dashboard/genre', 'GenreController');
