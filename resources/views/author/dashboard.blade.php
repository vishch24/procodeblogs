@extends('author.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Page content-->
    <div class="px-2 py-3">
        <div class="container">

            {{-- @if (Auth::user()->email_verified_at === null)
                <div class="alert alert-warning" role="alert">
                    Your email is not verified. <a href="{{ route('verification.notice') }}" class="alert-link">Click here</a> to verify.
                </div>
            @endif --}}

            <div class="row g-3">
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
                    <div class="card bg-primary text-white h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <p class="text-white-75 mb-1">Blogs</p>
                                    <h4 class="text-lg fw-bold">{{ $BlogsCount }}</h4>
                                </div>
                                <i class="bi bi-file-richtext fs-2 opacity-75"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="text-white text-decoration-none" href="{{ route('author.dashboard.blogs') }}">View Report</a>
                            <div class="text-white"><i class="bi bi-chevron-right small"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
                    <div class="card bg-warning text-white h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <p class="text-white-75 mb-1">Categories</p>
                                    <h4 class="text-lg fw-bold">{{ $CategoriesCount }}</h4>
                                </div>
                                <i class="bi bi-list-ul fs-2 opacity-75"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="text-white text-decoration-none" href="{{ route('author.dashboard.categories') }}">View Report</a>
                            <div class="text-white"><i class="bi bi-chevron-right small"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <p class="text-white-75 mb-1">Tags</p>
                                    <h4 class="text-lg fw-bold">{{ $TagsCount }}</h4>
                                </div>
                                <i class="bi bi-bookmark fs-2 opacity-75"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="text-white text-decoration-none" href="{{ route('author.dashboard.tags') }}">View Report</a>
                            <div class="text-white"><i class="bi bi-chevron-right small"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
                    <div class="card bg-danger text-white h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <p class="text-white-75 mb-1">Comments</p>
                                    <h4 class="text-lg fw-bold">{{ $CommentsCount }}</h4>
                                </div>
                                <i class="bi bi-chat-dots fs-2 opacity-75"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="text-white text-decoration-none" href="{{ route('author.dashboard.comments') }}">View Report</a>
                            <div class="text-white"><i class="bi bi-chevron-right small"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
