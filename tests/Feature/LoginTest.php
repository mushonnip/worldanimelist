<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;


class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLoadLoginPage()
    {
        $this->get('/login')->assertStatus(200);
    }

    public function testLoginWithValidData()
    {
        $user = factory(User::class)->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $user->email,
        ]);

        $response->assertRedirect();
        $this->assertGuest();
    }

    public function testLoginWithInvalidData()
    {
        $user = factory(User::class)->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'this is invalid pass'
        ]);
        $response->assertSessionHasErrors();
        $this->assertGuest();
    }
}
