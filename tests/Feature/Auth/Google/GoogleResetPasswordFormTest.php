<?php

namespace Tests\Feature\Auth\Google;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GoogleResetPasswordFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_google_reset_password_form_displays_for_google_user()
    {
        $user = User::factory()->create([
            'google_id' => 'google1',
        ]);

        $this->actingAs($user);

        $response = $this->get('/dashboard/google/reset-password/fakeToken');

        $response->assertStatus(200);
        $response->assertViewIs('author.profile.google-reset-password');
    }
}
