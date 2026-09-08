<?php

namespace Database\Factories;

use App\Models\Blogs;
use App\Models\Comments;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Comments>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'blog_id' => Blogs::factory(), // creates a related blog automatically
            // 'if_author' => $this->faker->randomElement(['yes', 'no']),
            'if_author' => 'yes',
            'parent_id' => null,
            'user_id' => User::factory(),  // creates a related user automatically
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'description' => $this->faker->realText(200),
            // 'approved' => $this->faker->randomElement(['yes', 'no']),
            'approved' => 'yes',
        ];
    }
}
