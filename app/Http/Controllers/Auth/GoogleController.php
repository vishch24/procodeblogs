<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Check if user already exists
        $user = User::where('google_id', $googleUser->getId())->orWhere('email', $googleUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'google_id' => $googleUser->getId(),
                'name'      => $googleUser->getName(),
                'img'    => $googleUser->getAvatar(),
                'email'     => $googleUser->getEmail(),
                'email_verified_at' => now(),
                'password'  => bcrypt(str()->random(16)), // random password
            ]);
        } else {
            // Existing user found → link Google account
            // (only if google_id is null)
            if ($user->google_id === null) {
                $user->google_id = $googleUser->getId();
            }

            // Update avatar only if user has no image
            if ($user->img === null) {
                $user->img = $googleUser->getAvatar();
            }

            // If you want to always update to the latest Google image, uncomment:
            // $user->img = $googleUser->getAvatar();

            $user->save();
        }

        Auth::login($user);

        return redirect()->route('author.dashboard')->with('success', 'Login Successful');
    }
}
