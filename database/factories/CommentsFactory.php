<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Blogs;
use App\Models\User;
use App\Models\Comments;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comments>
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
            'if_author' => $this->faker->randomElement(['yes', 'no']),
            'parent_id' => null,
            'user_id' => User::factory(),  // creates a related user automatically
            'name' => $this->faker->sentence(6),
            'email' => $this->faker->email(),
            'description' => $this->faker->sentence(10),
            'approved' => $this->faker->randomElement(['yes', 'no']),
        ];
    }
}
