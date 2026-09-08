<?php

namespace Database\Factories;

use App\Models\Blogs;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
 * @extends Factory<Blogs>
 */
class BlogsFactory extends Factory
{
    protected $model = Blogs::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Ensure the public path destination directory exists
        $targetDirectory = public_path('assets/img/blog');
        if (! File::isDirectory($targetDirectory)) {
            File::makeDirectory($targetDirectory, 0755, true, true);
        }

        // 1. Generate a unique filename string
        $imageName = 'blog_'.Str::random(10).'.jpg';
        $fullDestinationPath = $targetDirectory.'/'.$imageName;

        // 2. Generate a valid, lightweight JPEG image file locally (No Internet Needed!)
        // This simulates exactly what faker->image did but stays completely offline.
        if (extension_loaded('gd')) {
            $imageCanvas = imagecreatetruecolor(800, 400);

            // Generate a random dark background color
            $backgroundColor = imagecolorallocate($imageCanvas, rand(20, 100), rand(20, 100), rand(20, 100));
            imagefill($imageCanvas, 0, 0, $backgroundColor);

            // Save the raw file directly into your target directory
            imagejpeg($imageCanvas, $fullDestinationPath, 80);
            imagedestroy($imageCanvas);
        } else {
            // Fallback string if GD extension isn't loaded inside PHP container
            File::put($fullDestinationPath, 'MOCK_IMAGE_DATA');
        }

        $name = $this->faker->realText(20); // Generate a blog name with a maximum of 20 characters

        return [
            'name' => $name,
            'slug' => Str::slug($name), // Automatically creates a valid lowercase slug
            'post_meta' => $this->faker->realText(200),
            'post_desc' => $this->faker->realText(600),
            'img' => $imageName,       // Saves only the filename string to the database
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(), // Assigns a random existing user or creates a new one
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
