<?php

namespace Tests\Feature\Admin\Auth;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
        $response->assertSee('Sign in');   // optional UI check
    }

    public function test_admin_can_authenticate_using_the_login_screen(): void
    {
        $admin = Admin::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('password')
        ]);

        $response = $this->post('/admin/login', [
            'email' => 'admin@example.com',
            'password' => 'password',
        ]);

        $this->assertAuthenticatedAs($admin, 'admin');
        $response->assertRedirect(route('admin.dashboard', absolute: false));
    }

    public function test_admin_can_not_authenticate_with_invalid_password(): void
    {
        $admin = Admin::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('password')
        ]);

        $response = $this->post('/admin/login', [
            'email' => 'admin@example.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest('admin');
    }

    public function test_unauthenticated_admin_cannot_access_dashboard()
    {
        $response = $this->get('/admin/dashboard');

        $response->assertRedirect('/admin/login');
    }

    public function test_authenticated_admin_can_access_dashboard()
    {
        $admin = Admin::factory()->create();

        $response = $this->actingAs($admin, 'admin')
                         ->get('/admin/dashboard');

        $response->assertStatus(200);
    }

    public function test_admin_can_logout(): void
    {
        $admin = Admin::factory()->create();

        $response = $this->actingAs($admin, 'admin')
                         ->post('/admin/logout');

        $this->assertGuest('admin');
        $response->assertRedirect(route('admin.login'));
    }
}
