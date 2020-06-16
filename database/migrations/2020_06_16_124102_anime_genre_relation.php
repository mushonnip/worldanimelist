<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnimeGenreRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_anime', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anime_id')->references('id')->on('animes');
            $table->foreignId('genre_id')->references('id')->on('genres');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('genre_anime', function (Blueprint $table) {
            //
        });
    }
}
