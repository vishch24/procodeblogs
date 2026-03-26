<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('author.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make(data: $request->all(), rules: [
            'name' => ['required', 'string', 'max:255'],
            'image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'description' => ['required', 'string', 'max:5000'],
            'x_twitter' => ['url','nullable'],
            'facebook' => ['url','nullable'],
            'instagram' => ['url','nullable'],
            'linkedin' => ['url','nullable']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors());
        }

        if ($request->hasFile('img')) {
            $imageName = time().'.'.$request->img->extension();
            $request->img->move(public_path('dashboard/assets/img/avatar'), $imageName);

            $data = [
                'img' => $imageName,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'description' => $request->description,
                'x_twitter' => $request->x_twitter,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'linkedin' => $request->linkedin
            ];
        }
        else
        {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'description' => $request->description,
                'x_twitter' => $request->x_twitter,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'linkedin' => $request->linkedin
            ];
        }

        $user = User::create($data);

        event(new Registered($user));

        Auth::login($user);

        $user->sendEmailVerificationNotification();

        return redirect()->route('verification.notice'); // Redirect to email verification page
    }
}
