<?php

namespace Tests\Feature\Auth\Google;

use App\Models\User;
use App\Notifications\GoogleResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class GoogleSendResetLinkTest extends TestCase
{
    use RefreshDatabase;

    public function test_google_send_reset_link()
    {
        Notification::fake();

        $user = User::factory()->create([
            'email' => 'test@example.com',
            'google_id' => 'g123',
        ]);

        $this->actingAs($user);

        $response = $this->post('/dashboard/google/send-reset-link', [
            'email' => 'test@example.com',
        ]);

        $response->assertSessionHas('success');

        Notification::assertSentTo($user, GoogleResetPassword::class);
    }
}
