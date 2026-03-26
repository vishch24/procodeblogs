@extends('author.layouts.guest')

@section('title', 'Create an account')

@section('content')
    <div class="container">
        <div class="row gy-4 align-items-center justify-content-center">
            <div class="col-xxl-7 col-xl-5 col-lg-6 col-md-7">
                <h1 class="fs-2 fw-medium text-center mt-5 mb-4">
                    <a href="{{ route('home') }}" class="text-decoration-none">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="logo.png" width="300" class="img-fluid">
                    </a>
                </h1>
                <div class="card mb-5 shadow-sm">
                    <div class="card-body text-center">
                        {{-- <h4 class="p-2 mb-0 fw-normal">Please sign up</h4> --}}
                        <a href="{{ route('google.redirect') }}" class="btn btn-danger w-100 mt-3 rounded-0">
                            <i class="bi bi-google me-2"></i> Sign Up with Google
                        </a>
                        <div class="or-section d-block mt-4 pt-2 position-relative z-1"><span
                                class="or-text rounded-circle">or</span></div>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <p>Required fields are marked <span class="text-danger">*</span></p>
                            <div class="row gy-3">
                                <div class="col-xxl-12">
                                    <label for="img">{{ __('User Image') }}</label>
                                    <input type="file" class="form-control shadow-sm" name="img"
                                        accept=".jpeg,.png,.jpg">
                                </div>

                                <div class="col-xxl-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control shadow-sm" id="floatingName"
                                            name="name" required autofocus autocomplete="name" placeholder="Enter Name">
                                        <label for="floatingName">{{ __('Name') }} <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="col-xxl-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control shadow-sm" id="floatingEmail"
                                            name="email" required autocomplete="username"
                                            placeholder="Enter Email Address">
                                        <label for="floatingEmail">{{ __('Email Address') }} <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="col-xxl-6">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control shadow-sm" id="floatingPassword"
                                            name="password" required autocomplete="new-password"
                                            placeholder="Enter Password">
                                        <label for="floatingPassword">{{ __('Password') }} <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div class="col-xxl-6">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control shadow-sm" id="floatingPasswordConfirm"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Enter Confirm Password">
                                        <label for="floatingPasswordConfirm">{{ __('Confirm Password') }} <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <div class="col-xxl-12">
                                    <div class="form-floating mb-3">
                                        <textarea type="text" class="form-control h-auto shadow-sm" id="floatingDescription" name="description" required
                                            autocomplete="description" placeholder="Enter Description" rows="5"></textarea>
                                        <label for="floatingDescription">{{ __('Description') }} <span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <div class="col-xxl-6">
                                    <div class="form-floating mb-3">
                                        <input type="url" class="form-control h-auto shadow-sm" id="floatingTwitter"
                                            name="x_twitter" autocomplete="x_twitter" placeholder="Enter Twitter"
                                            rows="5">
                                        <label for="floatingTwitter">{{ __('Twitter URL') }}</label>
                                    </div>
                                </div>

                                <div class="col-xxl-6">
                                    <div class="form-floating mb-3">
                                        <input type="url" class="form-control h-auto shadow-sm" id="floatingFacebook"
                                            name="facebook" autocomplete="facebook" placeholder="Enter Facebook"
                                            rows="5">
                                        <label for="floatingFacebook">{{ __('Facebook URL') }}</label>
                                    </div>
                                </div>

                                <div class="col-xxl-6">
                                    <div class="form-floating mb-3">
                                        <input type="url" class="form-control h-auto shadow-sm"
                                            id="floatingInstagram" name="instagram" autocomplete="instagram"
                                            placeholder="Enter Instagram" rows="5">
                                        <label for="floatingInstagram">{{ __('Instagram URL') }}</label>
                                    </div>
                                </div>

                                <div class="col-xxl-6">
                                    <div class="form-floating mb-3">
                                        <input type="url" class="form-control h-auto shadow-sm" id="floatingLinkedin"
                                            name="linkedin" autocomplete="linkedin" placeholder="Enter Linkedin"
                                            rows="5">
                                        <label for="floatingLinkedin">{{ __('Linkedin URL') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end">
                                <a href="{{ route('login') }}"
                                    class="text-decoration-none me-2">{{ __('Already registered?') }}</a>
                                <button type="submit"
                                    class="btn btn-primary shadow-sm px-4 py-2">{{ __('Register') }}</button>
                            </div>

                            <p class="mt-4 mb-3 text-body-secondary text-center">Copyright &copy; {{ date('Y') }} |
                                ProcodeBlogs</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
