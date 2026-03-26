<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Blogs;

class BlogHomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_shows_message_when_no_blogs_exist(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('No blogs have been added yet.');
    }

    #[\PHPUnit\Framework\Attributes\Test]
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
