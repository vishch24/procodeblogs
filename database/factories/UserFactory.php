<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Ensure the public path destination directory exists
        $targetDirectory = public_path('dashboard/assets/img/avatar');
        if (! File::isDirectory($targetDirectory)) {
            File::makeDirectory($targetDirectory, 0755, true, true);
        }

        // 1. Generate a unique filename string
        $imageName = 'avatar_'.Str::random(10).'.jpg';
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

        return [
            'google_id' => null,
            'name' => $this->faker->name(),
            'img' => $imageName,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'description' => $this->faker->realText(200),
            'x_twitter' => 'https://x.com',
            'facebook' => 'https://facebook.com',
            'instagram' => 'https://instagram.com',
            'linkedin' => 'https://linkedin.com',
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
