<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create([
            'nama' => 'Slice of Life'
        ]);
        Genre::create([
            'nama' => 'Drama'
        ]);
        Genre::create([
            'nama' => 'Romance'
        ]);
        Genre::create([
            'nama' => 'Seinen'
        ]);
    }
}
