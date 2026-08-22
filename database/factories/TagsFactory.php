<?php

namespace Database\Factories;

use App\Models\Tags;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tags>
 */
class TagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->word();

        return [
            'user_id' => User::factory(),
            'name' => ucfirst($name),
        ];
    }
}
