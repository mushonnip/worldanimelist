<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Genre;
use App\User;

class GenreTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAddGenreValid()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $genre = [
            'nama' => 'Supranaturall'
        ];
        $this->post(route('genre.store', $genre))->assertRedirect('/dashboard/genre');
    }

    public function testAddGenreInvalid()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $genre = [
            'nama' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'
        ];
        $this->post(route('genre.store', $genre))->assertSessionHasErrors();
    }

    public function testAddGenreDuplicate()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $genre = factory(Genre::class)->create(
            [
                'nama' => 'Supranatural'
            ]
        );
        $genre = [
            'nama' => 'Supranatural'
        ];
        $this->post(route('genre.store', $genre))->assertSessionHasErrors();
    }
}
