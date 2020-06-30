<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index');
Route::get('/login', 'HomeController@login');

Route::get('dashboard/', function () {
    return view('dashboard.home');
});

Route::resource('dashboard/anime', 'AnimeController');
Route::resource('dashboard/genre', 'GenreController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
