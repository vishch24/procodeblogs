<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'img' => null,
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'description' => 'This is a test description',
            'x_twitter' => null,
            'facebook' => null,
            'instagram' => null,
            'linkedin' => null
        ]);

        $this->assertAuthenticated();
        // $response->assertRedirect(route('dashboard', absolute: false));
        $response->assertRedirect(route('verification.notice')); // Redirect to email verification page
    }
}
