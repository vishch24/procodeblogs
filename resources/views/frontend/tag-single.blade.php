@extends('frontend.layouts.master')

@section('title', $tag->name . ' - ProcodeBlogs')

@section('content')
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <!-- Post content-->
                <h1 class="display-4 fw-bold mb-lg-4">{{ $tag->name }}</h1>
                <hr class="pb-lg-4">

                <div class="row gy-4 mb-4">
                    @if (sizeof($blogs))
                        @foreach ($blogs as $blog)
                            <div class="col-xl-6">
                                <div class="card border-0 rounded-0 h-100 shadow">
                                    <a href="{{ route('blog.single', [$blog->id, $blog->slug]) }}">
                                        <img src="{{ asset('assets/img/blog/' . $blog->img) }}" alt="{{ $blog->img }}" class="card-img rounded-0">
                                    </a>
                                    <div class="card-body p-4">
                                        <div class="small text-muted mb-2">
                                            <span class="me-2"><i class="bi bi-person"></i> {{ $blog->user->name }}</span>
                                            <span class="me-2"><i class="bi bi-clock"></i> {{ date('M d, Y', strtotime($blog->updated_at)) }}</span>
                                            <span><i class="bi bi-chat-dots"></i> {{ $blog->comments->count() }} Comment(s)</span>
                                        </div>
                                        <h2 class="card-title">{{ $blog->name }}</h2>
                                        <p class="card-text">{{ $blog->post_meta }}</p>
                                        <a class="btn btn-primary rounded-0" href="{{ route('blog.single', [$blog->id, $blog->slug]) }}">Read more →</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted">No blogs</p>
                    @endif
                </div>

                <!-- Pagination Links -->
                <div class="pagination justify-content-center">
                    @if (sizeof($blogs))
                        {{ $blogs->links() }}
                    @endif
                </div>
            </div>

            <!-- Side widgets-->
            <div class="col-lg-4 col-md-5">
                @include('frontend.components.sidebar')
            </div>
        </div>
    </div>
@endsection
