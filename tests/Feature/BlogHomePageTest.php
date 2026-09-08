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
    public function it_shows_featured_and_regular_blogs_on_page_1()
    {
        $featured = Blogs::factory()->create();
        $otherBlogs = Blogs::factory()->count(5)->create();

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee($featured->name);
    }

    #[Test]
    public function it_does_not_show_featured_blog_on_page_2()
    {
        $featured = Blogs::factory()->create();
        Blogs::factory()->count(10)->create();

        $response = $this->get('/?page=2');

        $response->assertStatus(200);
        $response->assertDontSee($featured->name);
        // $response->assertDontSee('No blogs have been added yet.');
    }

    #[Test]
    public function it_shows_regular_blogs_on_page_2()
    {
        Blogs::factory()->count(10)->create();

        $response = $this->get('/?page=2');

        $response->assertStatus(200);
        // Should have blogs, but not the featured one
        $response->assertViewHas('blogs');
    }

    // #[Test]
    // public function it_shows_featured_and_regular_blogs_when_available()
    // {
    //     // Create some fake blogs
    //     $featured = Blogs::factory()->create();
    //     $otherBlogs = Blogs::factory()->count(5)->create();

    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    //     $response->assertSee($featured->name);
    //     $response->assertDontSee('No Featured blogs have been added yet.');
    // }
}
