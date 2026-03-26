<?php

namespace Tests\Feature\Auth\Google;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class GoogleResetPasswordTest extends TestCase
{
    use RefreshDatabase;

    public function test_google_password_resets_successfully()
    {
        $user = User::factory()->create([
            'email'      => 'test@example.com',
            'google_id'  => 'google123'
        ]);

        $this->actingAs($user);

        $token = Password::createToken($user);

        $response = $this->post('/dashboard/google/reset-password', [
            'token'                 => $token,
            'email'                 => $user->email,
            'password'              => 'newpassword123',
            'password_confirmation' => 'newpassword123'
        ]);

        $response->assertRedirect(route('author.profile.edit'));

        $this->assertTrue(
            \Hash::check('newpassword123', $user->fresh()->password)
        );
    }
}
