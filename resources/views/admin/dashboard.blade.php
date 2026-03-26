@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <!-- Page content-->
    <div class="px-2 py-3">
        <div class="container">
            <div class="row g-3">
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
                    <div class="card bg-primary text-white h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <p class="text-white-75 mb-1">Users</p>
                                    <h4 class="text-lg fw-bold">{{ $UsersCount }}</h4>
                                </div>
                                <i class="bi bi-people fs-2 opacity-75"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="text-white text-decoration-none" href="{{ route('admin.authors') }}">View Report</a>
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
                            <a class="text-white text-decoration-none" href="{{ route('admin.comments') }}">View Report</a>
                            <div class="text-white"><i class="bi bi-chevron-right small"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
