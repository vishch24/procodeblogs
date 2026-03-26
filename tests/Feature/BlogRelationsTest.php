<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Blogs;
use App\Models\Categories;
use App\Models\Tags;
use App\Models\Comments;

class BlogRelationsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    #[\PHPUnit\Framework\Attributes\Test]
    public function a_blog_belongs_to_multiple_categories()
    {
        $category = Categories::factory()->count(3)->create();
        $blog = Blogs::factory()->create();

        $blog->categories()->attach($category->pluck('id'));

        $this->assertInstanceOf(Categories::class, $blog->categories->first());
        $this->assertCount(3, $blog->categories);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function a_blog_can_have_multiple_tags()
    {
        $blog = Blogs::factory()->create();
        $tags = Tags::factory()->count(3)->create();

        $blog->tags()->attach($tags->pluck('id'));

        $this->assertCount(3, $blog->tags);
        $this->assertInstanceOf(Tags::class, $blog->tags->first());
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function a_blog_can_have_many_comments()
    {
        $blog = Blogs::factory()->create();
        $parent = Comments::factory()->create(['blog_id' => $blog->id]);
        // $comments = Comments::factory()->count(3)->for($blog)->create();

        Comments::factory()->count(1)->create([
            'blog_id' => $blog->id,
            'parent_id' => $parent->id,
        ]);

        $this->assertCount(1, $blog->comments);
        $this->assertInstanceOf(Comments::class, $blog->comments->first());
    }
}
