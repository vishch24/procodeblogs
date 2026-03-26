@extends('author.layouts.guest')

@section('title', 'Log in')

@section('content')
    <div class="container pt-5 mt-3 mt-lg-2">
        <div class="row gy-5 align-items-center justify-content-center">
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7">
                <h1 class="fs-2 fw-medium text-center mt-0 mb-4">
                    <a href="{{ route('home') }}" class="text-decoration-none">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="logo.png" width="300" class="img-fluid">
                    </a>
                </h1>
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4 class="p-2 mb-0 fw-normal">Please sign in</h4>
                    </div>
                    <div class="card-body p-4">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <p>Required fields are marked <span class="text-danger">*</span></p>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control shadow-sm" id="floatingInput" name="email"
                                    placeholder="name@example.com" required autofocus autocomplete="username">
                                <label for="floatingInput">{{ __('Email Address') }} <span
                                        class="text-danger">*</span></label>
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control shadow-sm" id="floatingPassword" name="password"
                                    placeholder="Password" required autocomplete="current-password">
                                <label for="floatingPassword">{{ __('Password') }} <span
                                        class="text-danger">*</span></label>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            <div class="form-check text-start py-2 mb-3">
                                <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                            </div>

                            <div class="d-flex align-items-center justify-content-end">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                        class="text-decoration-none me-2">{{ __('Forgot your password?') }}</a>
                                @endif
                                <button type="submit"
                                    class="btn btn-primary shadow-sm px-4 py-2">{{ __('Log in') }}</button>
                            </div>

                            <a href="{{ route('google.redirect') }}" class="btn btn-danger w-100 mt-3 shadow-sm">
                                <i class="bi bi-google me-2"></i> Continue with Google
                            </a>

                            <p class="mt-5 mb-3 text-body-secondary text-center">Copyright &copy; {{ date('Y') }} |
                                ProcodeBlogs</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
