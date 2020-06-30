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

// Route::group(['middleware' => ['auth']], function () {
//     Route::prefix('dashboard')->group(function () {
//         Route::get('', 'HomeController@dashboard')->name('dashboard');
//         Route::prefix('anime')->group(function () {
//             Route::get('', ['as' => 'anime', 'uses' => 'AnimeController@index']);
//             Route::get('create', ['as' => 'anime.create', 'uses' => 'AnimeController@create']);
//             Route::get('/{id}/edit', ['as' => 'anime.edit', 'uses' => 'AnimeController@edit']);
//             Route::post('', ['as' => 'anime.store', 'uses' => 'AnimeController@store']);
//             Route::patch('{id}', ['as' => 'anime.update', 'uses' => 'AnimeController@update']);
//             Route::delete('{id}', ['as' => 'anime.destroy', 'uses' => 'AnimeController@destroy']);
//         });

//     });
// });

Route::resource('dashboard/anime', 'AnimeController', [
    'as' => 'p'
]);
Route::resource('dashboard/genre', 'GenreController');
Route::get('dashboard/', function () {
    return view('dashboard.home');
})->name('dashboard');
// Route::get('dashboard/anime/{id}', ['uses' => 'AnimeController@show']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
