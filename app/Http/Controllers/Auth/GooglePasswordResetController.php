<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class GooglePasswordResetController extends Controller
{
    // Send reset link email
    public function googleSendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                ? back()->with('success', 'Password reset link sent to your email!')
                : back()->withErrors(['email' => __($status)]);
    }

    // Show form where user sets new password
    public function showGoogleResetForm($token)
    {
        if(Auth::user()->google_id)
            return view('author.profile.google-reset-password', ['token' => $token, 'pageName' => '']);
        else
            return redirect()->route('author.profile.edit');
    }

    // Handle password update
    public function googleResetPassword(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email','password','password_confirmation','token'),
            function($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
                ? redirect()->route('author.profile.edit')->with('success', 'Password reset successful!')
                : back()->withErrors(['email' => __($status)]);
    }
}
