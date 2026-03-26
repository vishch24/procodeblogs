<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogs>
 */
class BlogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(6),
            'slug' => $this->faker->slug(),
            'post_meta' => $this->faker->sentence(6),
            'post_desc' => $this->faker->paragraphs(3, true),
            'img' => $this->faker->imageUrl(800, 400, 'blogs'),
            'user_id' => User::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
