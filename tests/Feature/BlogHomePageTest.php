<?php

namespace Tests\Feature;

use App\Models\Blogs;
use Carbon\Carbon;
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
        $response->assertViewHas('featuredBlog', null);
        $response->assertViewHas('totalPages', 0);
        $response->assertSee('No blogs have been added yet.');
    }

    #[Test]
    public function it_shows_featured_and_up_to_four_regular_blogs_on_page_1()
    {
        // Ensure featured has the latest updated_at
        $featured = Blogs::factory()->create([
            'name' => 'Featured Blog Title',
            'updated_at' => Carbon::now(),
        ]);

        // Regular blogs created in the past
        $regularBlogs = Blogs::factory()->count(5)->sequence(fn ($sequence) => [
            'updated_at' => Carbon::now()->subMinutes($sequence->index + 1),
        ])->create();

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewHas('featuredBlog', function ($blog) use ($featured) {
            return $blog && $blog->id === $featured->id;
        });

        // Page 1 should take exactly 4 regular blogs
        $response->assertViewHas('blogs', function ($blogs) {
            return $blogs->count() === 4;
        });

        $response->assertSee($featured->name);
    }

    #[Test]
    public function it_does_not_show_featured_blog_on_page_2()
    {
        // Explicitly set the latest updated_at so this is definitively the featured post
        $featured = Blogs::factory()->create([
            'name' => 'Featured Unique Title',
            'updated_at' => Carbon::now(),
        ]);

        // Create 10 regular blogs dated before the featured one
        Blogs::factory()->count(10)->sequence(fn ($sequence) => [
            'name' => 'Regular Blog '.$sequence->index,
            'updated_at' => Carbon::now()->subHours($sequence->index + 1),
        ])->create();

        $response = $this->get('/?page=2');

        $response->assertStatus(200);
        $response->assertViewHas('featuredBlog', null);
        $response->assertViewHas('currentPage', 2);

        // Page 2 perPage limit is 6
        $response->assertViewHas('blogs', function ($blogs) use ($featured) {
            return $blogs->count() === 6 && ! $blogs->contains('id', $featured->id);
        });

        // $response->assertDontSee($featured->name);
        // $response->assertDontSee('No blogs have been added yet.');
    }

    #[Test]
    public function it_calculates_correct_total_pages()
    {
        // 1 featured + 10 regular = 11 total
        // Page 1 takes 4 regular, remaining = 6 regular -> exactly 1 extra page (totalPages = 2)
        Blogs::factory()->create(['updated_at' => Carbon::now()]);
        Blogs::factory()->count(10)->sequence(fn ($sequence) => [
            'updated_at' => Carbon::now()->subMinutes($sequence->index + 1),
        ])->create();

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewHas('totalPages', 2);
    }
}
