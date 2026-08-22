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

        // 1. This is the parent comment (parent_id is null, approved must be 'yes')
        $parent = Comments::factory()->create([
            'blog_id' => $blog->id,
            'approved' => 'yes',
            'parent_id' => null,
        ]);
        // $comments = Comments::factory()->count(3)->for($blog)->create();

        // 2. This is the child comment (parent_id is NOT null)
        Comments::factory()->create([
            'blog_id' => $blog->id,
            'parent_id' => $parent->id,
            'approved' => 'yes'
        ]);

        // 3. Clear Laravel's in-memory relation cache
        $blog->refresh();

        // 4. Assert matches 1 because the child comment is filtered out by ->whereNull()
        $this->assertCount(1, $blog->comments);
        $this->assertInstanceOf(Comments::class, $blog->comments->first());

        // 5. Test your nested/recursive comments setup
        $this->assertCount(1, $blog->comments->first()->replies);
    }
}
