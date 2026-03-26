@extends('admin.layouts.guest')

@section('title', 'Admin Log in')

@section('content')
    <div class="container pt-5 mt-5 mt-lg-3">
        <div class="row gy-5 align-items-center justify-content-center">
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7">
                <h1 class="fs-2 fw-medium text-center mt-0 mb-4">
                    <a href="{{ route('home') }}" class="text-decoration-none">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="logo.png" width="300" class="img-fluid">
                        <sup class="h6"><span class="badge text-bg-danger">For Admins</span></sup>
                    </a>
                </h1>
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4 class="p-2 mb-0 fw-normal">Sign in</h4>
                    </div>
                    <div class="card-body p-4">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('admin.login.submit') }}">
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

                            <button type="submit" class="btn btn-primary shadow-sm px-4 py-2">{{ __('Log in') }}</button>

                            <p class="mt-5 mb-3 text-body-secondary text-center">Copyright &copy; {{ date('Y') }} |
                                ProcodeBlogs</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
