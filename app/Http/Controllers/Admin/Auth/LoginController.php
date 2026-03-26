<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLoginForm() {
        return view('admin.auth.login');
    }

    public function login(Request $request) {
        $validator = Validator::make(data: $request->all(), rules: [
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors());
        }

        if (Auth::guard('admin')->attempt($request->only('email','password'))) {
            return redirect()->route('admin.dashboard')->with('success', 'Login Successful!');
        }
        else
        {
            return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
