<?php

namespace Tests\Feature;

use App\Models\Blogs;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class BlogHomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    #[Test]
    public function it_shows_message_when_no_blogs_exist(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('No blogs have been added yet.');
    }

    #[Test]
    public function it_shows_featured_and_regular_blogs_when_available()
    {
        // Create some fake blogs
        $featured = Blogs::factory()->create();
        $otherBlogs = Blogs::factory()->count(5)->create();

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee($featured->name);
        $response->assertDontSee('No blogs have been added yet.');
    }
}
