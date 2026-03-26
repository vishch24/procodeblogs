@extends('author.layouts.guest')

@section('title', 'Forgot Password')

@section('content')
    <div class="container pt-5 mt-5 mt-lg-3">
        <div class="row gy-5 align-items-center justify-content-center">
            <div class="col-xxl-4 col-xl-5 col-lg-7 col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4 class="p-2 mb-0 fw-normal">Forgot Password</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-4">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control shadow-sm" id="floatingInput" name="email" value="{{ old('email') }}" placeholder="name@example.com" required autofocus>
                                <label for="floatingInput">{{ __('Email Address') }}</label>
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                            <input type="submit" class="px-4 py-2 btn btn-success border-0 shadow-sm" value="{{ __('Email Password Reset Link') }}">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
