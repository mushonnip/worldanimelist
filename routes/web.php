<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

Route::get('/', 'HomeController@index');
Route::get('/login', 'HomeController@login');
Route::get('/logout', function () {
    Session::flush();
    Auth::logout();
    return Redirect::to("/login");
});

Route::get('/add-loves/{anime}', 'AnimeController@addLoves')->name('add-loves');
Route::get('/remove-loves/{anime}', 'AnimeController@removeLoves')->name('remove-loves');
Route::get('/check-loves/{anime}', 'AnimeController@checkLoves')->name('check-loves');

Route::resource('dashboard/anime', 'AnimeController', [
    'as' => 'p'
]);
Route::resource('dashboard/genre', 'GenreController');

Route::get('dashboard/', function () {
    return view('dashboard.home');
})->name('dashboard')->middleware('auth');

Auth::routes();
