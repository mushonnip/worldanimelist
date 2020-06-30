<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anime;

class HomeController extends Controller
{
    public function index()
    {
        $animes = Anime::all();
        return view('home', compact('animes'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
}
