<?php

namespace Tests\Feature\Auth\Google;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Socialite\Facades\Socialite;
use Mockery;

class GoogleLinkExistingUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_existing_user_links_google_account()
    {
        $user = User::factory()->create([
            'email'     => 'test@example.com',
            'google_id' => null,
            'img'       => null,
        ]);

        $googleUser = Mockery::mock(\Laravel\Socialite\Two\User::class);
        $googleUser->shouldReceive('getId')->andReturn('google999');
        $googleUser->shouldReceive('getName')->andReturn('Vishakha');
        $googleUser->shouldReceive('getEmail')->andReturn('test@example.com');
        $googleUser->shouldReceive('getAvatar')->andReturn('profile.jpg');

        Socialite::shouldReceive('driver->user')->andReturn($googleUser);

        $response = $this->get('/auth/google/callback');

        $this->assertDatabaseHas('users', [
            'id'        => $user->id,
            'google_id' => 'google999',
            'img'       => 'profile.jpg',
        ]);

        $response->assertRedirect(route('author.dashboard'));
    }
}
