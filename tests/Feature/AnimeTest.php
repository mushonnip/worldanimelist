<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Anime;
use App\User;
use App\Genre;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AnimeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLoadAnimeDashboardPageWithAuth()
    {
        $user = factory(User::class)->make();
        $this->actingAs($user);
        $response = $this->get('/dashboard/anime');
        $response->assertStatus(200);
    }

    public function testLoadAnimeDashboardPageWithoutAuth()
    {
        $response  = $this->get('/dashboard/anime');
        $response->assertRedirect('/login');
    }

    public function testAnimeAddValid()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $anime = [
            'title' => 'Kimetsu no Yaiba',
            'image' => 'kny.jpg',
            'episodes' => '26',
            'status' => 'Finished Airing',
            'aired' => '2019-04-06',
            'producers' => 'Aniplex, Shueisha',
            'studios' => 'Aniplex of America',
            'duration' => 24,
        ];
        $this->post(route('p.anime.store', $anime))->assertRedirect('/dashboard/anime');
    }

    public function testAnimeAddInvalid()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $anime = [
            'title' => 'Kimetsu no Yaiba',
            'image' => 'kny.jpg',
            'episodes' => 'bukan episode',
            'status' => 'Finished Airing',
            'aired' => '2019-04-06',
            'producers' => 'Aniplex, Shueisha',
            'studios' => 'Aniplex of America',
            'duration' => 24,
        ];
        $this->post(route('p.anime.store', $anime))->assertSessionHasErrors();
    }
}
