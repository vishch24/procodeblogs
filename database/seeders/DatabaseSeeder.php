<?php

namespace Database\Seeders;

use App\Models\Blogs;
use App\Models\User;
use App\Models\Categories;
use App\Models\Tags;
use App\Models\Comments;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // 1. Safeguard the Test User to prevent duplicate entry crashes on subsequent deployments
        $testUser = User::where('email', 'test@example.com')->first();
        
        if (!$testUser)
        {
            $testUser = User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        // 2. Generate controlled pools for Categories and Tags
        $categories = Categories::factory(5)->create(['user_id' => $testUser->id]);
        $tags = Tags::factory(10)->create(['user_id' => $testUser->id]);

        // Blogs::factory(20)->create();

        // 3. Create 20 Blogs
        Blogs::factory(20)->create([
            'user_id' => $testUser->id,
        ])->each(function ($blog) use ($categories, $tags)
        {            
            // Attach random Categories and Tags to populate pivot tables
            $blog->categories()->attach($categories->random(rand(1, 2))->pluck('id')->toArray());
            $blog->tags()->attach($tags->random(rand(2, 4))->pluck('id')->toArray());

            // 4. STEP A: Generate 3 Root-Level Comments (No parent_id)
            $rootComments = Comments::factory(3)->create([
                'blog_id' => $blog->id,
                'parent_id' => null, // Explicitly root
                'approved' => 'yes',
                'user_id' => null,
            ]);

            // 5. STEP B: Generate Nested Level-1 Replies (Children of root comments)
            $rootComments->each(function ($rootComment) use ($blog)
            {
                // Generate 2 replies for EACH root comment
                $replies = Comments::factory(2)->create([
                    'blog_id' => $blog->id,
                    'parent_id' => $rootComment->id, // Hooked up to parent comment ID
                    'approved' => 'yes',
                    'user_id' => null,
                ]);

                // 6. STEP C (Optional): Deep Nesting Level-2 Replies (Replies to the replies)
                $replies->each(function ($reply) use ($blog)
                {
                    Comments::factory(1)->create([
                        'blog_id' => $blog->id,
                        'parent_id' => $reply->id, // Hooked up to Level-1 reply ID
                        'approved' => 'yes',
                        'user_id' => $testUser->id,
                    ]);
                });
            });
        });
    }
}
