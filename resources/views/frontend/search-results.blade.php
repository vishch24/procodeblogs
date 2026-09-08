@extends('frontend.layouts.master')

@section('title', 'Search results for "'. $query . '" - ProcodeBlogs')

@section('content')
    <!-- Page content-->
    <div class="container my-5">
        <h1 class="display-4 fw-bold mb-lg-4">Search results for "{{ $query }}"</h1>
        <hr class="pb-lg-4">

        @php
            // $name;
        @endphp
        $hasBlogs = $results->contains(fn($r) => $r instanceof App\Models\Blogs);
        $hasCategories = $results->contains(fn($r) => $r instanceof App\Models\Categories);
        $hasTags = $results->contains(fn($r) => $r instanceof App\Models\Tags);

        @if ($results->isEmpty())
            <p>No results found.</p>
        @else
            @if ($hasBlogs)
                <div class="row gy-4 mb-4">
                    <h3 class="fw-bold">Blogs</h3>
                    @foreach ($results as $result)
                        @if ($result instanceof App\Models\Blogs)
                            <div class="col-lg-4 col-md-6">
                                <div class="card border-0 rounded-0 h-100 shadow">
                                    <a href="{{ route('blog.single', [$result->id, $result->slug]) }}">
                                        <img src="{{ asset('assets/img/blog/' . $result->img) }}" alt="{{ $result->img }}" class="card-img rounded-0">
                                    </a>
                                    <div class="card-body p-4">
                                        <div class="small text-muted mb-2">
                                            <span class="me-2"><i class="bi bi-person"></i> {{ $result->user?->name ?? 'Unknown' }}</span>
                                            <span class="me-2"><i class="bi bi-clock"></i> {{ date('M d, Y', strtotime($result->updated_at)) }}</span>
                                            <span><i class="bi bi-chat-dots"></i> {{ $result->comments->count() }} Comment(s)</span>
                                        </div>
                                        <h4 class="card-title">{{ $result->name }}</h4>
                                        <p class="card-text">{{ $result->post_meta }}</p>
                                        <a class="btn btn-primary rounded-0" href="{{ route('blog.single', [$result->id, $result->slug]) }}">Read more →</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif

            @if ($hasCategories)
                <div class="row gy-4 mb-4">
                    <h3 class="fw-bold">Categories</h3>
                    <div class="col-12">
                        @foreach ($results as $result)
                            @if ($result instanceof App\Models\Categories)
                                <a class="btn btn-sm btn-outline-primary px-2 py-1 me-1 mb-3 rounded-pill" href="{{ route('category.single', [$result->id, str_replace(' ', '-', strtolower($result->name))]) }}">
                                    {{ $result->name }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>

            @endif

            @if ($hasTags)
                <div class="row gy-4">
                    <h3 class="fw-bold">Tags</h3>
                    <div class="col-12">
                        @foreach ($results as $result)
                            @if ($result instanceof App\Models\Tags)
                                <a class="btn btn-sm btn-outline-secondary px-2 py-1 me-1 mb-3" href="{{ route('tag.single', [$result->id, str_replace(' ', '-', strtolower($result->name))]) }}">{{ $result->name }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
    </div>
@endsection
