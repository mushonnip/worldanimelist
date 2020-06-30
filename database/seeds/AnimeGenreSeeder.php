<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimeGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<= 4; $i++) {
            DB::table('genre_anime')->insert([
                'anime_id' => 1,
                'genre_id' => $i,
            ]);
        }
    }
}
