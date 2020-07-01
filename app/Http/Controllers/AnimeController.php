<?php

namespace App\Http\Controllers;

use App\Anime;
use App\Genre;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animes = Anime::all();
        return view('dashboard.anime.index', compact('animes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        return view('dashboard.anime.create')->withGenres($genres);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required',
                'episodes' => 'required',
            ]
        );
        // $data = $request->all();
        $anime = Anime::create($request->except('image'));

        $anime->genres()->attach($request->genres);
        if ($request->hasFile('image')) {
            $url = $request->image->store('public');
            $anime->image = $url;
            $anime->save();
        }
        return redirect('/dashboard/anime');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anime = Anime::find($id);
        return response()->json($anime);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function edit(Anime $anime)
    {
        $genres = Genre::all();
        return view('dashboard.anime.edit', ['anime' => $anime, 'genres' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anime $anime)
    {
        $anime->update($request->all());
        $anime->genres()->sync($request->genres);
        return redirect('/dashboard/anime');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anime $anime)
    {
        $anime->delete();
        return redirect('/dashboard/anime');
    }

    public function addLoves(Request $request, Anime $anime)
    {
        $user = $request->user();
        $user->loves()->attach($anime);
        return redirect('/');
    }
    public function removeLoves(Request $request, Anime $anime)
    {
        $user = $request->user();
        $user->loves()->detach($anime);
        return redirect('/');
    }
    public function checkLoves(Request $request, Anime $anime)
    {
        $user = $request->user();
        return $user->loves->contains($anime);
    }
}
