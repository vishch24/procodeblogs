<?php

namespace Tests\Feature\Auth\Google;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Socialite\Facades\Socialite;
use Mockery;

class GoogleCallbackTest extends TestCase
{
    use RefreshDatabase;

    public function test_google_callback_creates_new_user()
    {
        $this->withoutExceptionHandling();

        // Fake Google User object
        $googleUser = \Mockery::mock();
        $googleUser->shouldReceive('getId')->andReturn('google123');
        $googleUser->shouldReceive('getName')->andReturn('Test User');
        $googleUser->shouldReceive('getEmail')->andReturn('test@example.com');
        $googleUser->shouldReceive('getAvatar')->andReturn('avatar.png');

        // FULL CORRECT MOCK
        Socialite::shouldReceive('driver')
            ->with('google')
            ->andReturnSelf();

        Socialite::shouldReceive('user')
            ->andReturn($googleUser);

        // Hit callback route
        $response = $this->get('/auth/google/callback');

        $this->assertDatabaseHas('users', [
            'google_id' => 'google123',
            'email'     => 'test@example.com'
        ]);

        $response->assertRedirect(route('author.dashboard'));
    }
}
