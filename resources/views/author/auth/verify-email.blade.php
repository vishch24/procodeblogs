@extends('author.layouts.guest')

@section('title', 'Verify Your Email')

@section('content')
    <div class="container pt-5 mt-5 mt-lg-3">
        <div class="row gy-5 align-items-center justify-content-center">
            <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-7">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4 class="p-2 mb-0 fw-normal">Verify Your Email</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-4">
                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </div>

                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 fw-medium text-success">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif

                        <div class="d-flex justify-content-between mt-4">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf

                                <div>
                                    <button type="submit" class="btn btn-success border-0 rounded-0 shadow-sm me-2">
                                        {{ __('Resend Verification Email') }}
                                    </button>
                                </div>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="btn btn-danger border-0 rounded-0 shadow-sm">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
