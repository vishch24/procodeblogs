@extends('author.layouts.app')

@section('title', 'Reset Password')

@section('content')
    <div id="page-content">
        <div class="card border-0 rounded-0">
            <div class="card-body py-2">
                <h3>{{ __('Reset Password') }}</h3>
            </div>
        </div>
        <div class="px-2 py-4">
            <div class="container">
                <div class="row gy-5 align-items-center justify-content-center">
                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h4 class="p-2 mb-0 fw-normal">Reset Password</h4>
                            </div>
                            <div class="card-body p-4">
                                <form method="POST" action="{{ route('author.profile.google.update.password') }}">
                                    @csrf

                                    <!-- Password Reset Token -->
                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <!-- Email Address -->
                                    <div class="form-floating mb-4">
                                        <input type="email" class="form-control shadow-sm" id="floatingEmail"
                                            name="email" value="{{ old('email', Auth::user()->email) }}"
                                            placeholder="name@example.com" required readonly>
                                        <label for="floatingEmail">{{ __('Email Address') }} <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                    <!-- Password -->
                                    <div class="form-floating mb-4">
                                        <input type="password" class="form-control shadow-sm" id="floatingPass"
                                            name="password" placeholder="******" required autofocus>
                                        <label for="floatingPass">{{ __('Password') }} <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                    <!-- Confirm Password -->
                                    <div class="form-floating mb-4">
                                        <input type="password" class="form-control shadow-sm" id="floatingInput"
                                            name="password_confirmation" placeholder="******" required>
                                        <label for="floatingInput">{{ __('Confirm Password') }} <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                                    <input type="submit" class="px-4 py-2 btn btn-success border-0 shadow-sm"
                                        value="{{ __('Reset Password') }}">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
