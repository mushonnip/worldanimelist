<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Anime;
use App\User;

class AnimeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAnimeAddVadid()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user);

        $data = [
            'title' => 'judul'
        ];
        $message_json = [
            'message' => $data['name']." Berhasil Dibuat"
        ];
        $this->post(route('p.anime.store', $data))->assertStatus(201)->assertJson($message_json);

    }
}
