@extends('frontend.layouts.master')

@section('title', $singleBlog ? $singleBlog->name . ' - ProcodeBlogs' : 'No Blog - ProcodeBlogs')

@section('content')
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <div class="card border-0 rounded-0 shadow mb-5">
                    <!-- Preview image figure-->
                    <img class="card-img rounded-0" src="{{ asset('assets/img/blog/' . $singleBlog->img) }}" alt="{{ $singleBlog->img }}" />
                    <!-- Post content-->
                    <div class="card-body px-4 py-4 px-lg-5 post-content">
                        <!-- Post meta content-->
                        <div class="text-secondary mb-4">
                            <span class="me-3"><i class="bi bi-person"></i> {{ $singleBlog->user->name }}</span>
                            <span class="me-3"><i class="bi bi-clock"></i>
                                {{ date('F d, Y', strtotime($singleBlog->updated_at)) }}</span>
                            <span><i class="bi bi-chat-dots"></i> {{ $singleBlog->comments->count() }} Comment(s)</span>
                        </div>

                        <!-- Post title-->
                        <h1 class="fw-bold mb-5">{{ $singleBlog->name }}</h1>

                        <!-- Post Content-->
                        <div class="mb-5"><?= $singleBlog->post_desc ?></div>

                        <!-- Post categories-->
                        <div class="my-4">
                            @foreach ($singleBlog->categories as $cat)
                                <a class="btn btn-sm btn-outline-primary px-2 py-1 me-1 mb-3 rounded-pill"
                                    href="{{ route('category.single', [$cat->id, str_replace(' ', '-', strtolower($cat->name))]) }}">{{ $cat->name }}</a>
                            @endforeach
                        </div>
                        <hr>
                        <!-- Post tags-->
                        <div class="pt-2 my-4">
                            @foreach ($singleBlog->tags as $tag)
                                <a class="btn btn-sm btn-outline-secondary px-2 py-1 me-1 mb-3"
                                    href="{{ route('tag.single', [$tag->id, str_replace(' ', '-', strtolower($tag->name))]) }}">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Comments section-->
                @if($singleBlog->comments->count())
                    <section class="mb-5">
                        <div class="card border-0 rounded-0 shadow">
                            <div class="card-body p-4">
                                <div class="fs-4 fw-medium mb-4"><i class="bi bi-chat-dots"></i> Comments</div>
                                <!-- Comment with nested comments-->
                                <div class="comments-section">
                                    <!-- Display Comments -->
                                    @foreach($singleBlog->comments as $comment)
                                        @include('frontend.components.comments', ['comment' => $comment])
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                @endif

                <section class="mb-5">
                    <!-- Comment form-->
                    @if (Route::has('login'))
                        @auth
                            @include('frontend.components.author-comment-form')
                        @else
                            @include('frontend.components.user-comment-form')
                        @endauth
                    @endif
                </section>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                @include('frontend.components.sidebar')
            </div>
        </div>
    </div>
@endsection
