<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $genres = Genre::all();
        return view('dashboard.genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.genre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $genres = Genre::all();
        $this->validate(
            $request,
            [
                'nama' => 'required|unique:genres|max:20',
            ],
            [
                'nama.unique' => '"Nama Genre" sudah ada'
            ]
        );
        Genre::create($request->all());
        return redirect('/dashboard/genre')->with('success', 'Genre bersahil ditambahkan');
        // return view('dashboard.genre.index', compact('genres'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        return view('dashboard.genre.edit', ['genre' => $genre])->with('success','Genre berhasil dirubah');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        $this->validate(
            $request,
            [
                'nama' => 'required:20',
            ]
        );
        $genre->update($request->all());
        return redirect('/dashboard/genre');
        // return view('dashboard.genre.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect('/dashboard/genre')->with('success','Genre berhasil dihapus');
    }
}
