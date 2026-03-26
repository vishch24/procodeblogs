<!-- Nested row for non-featured blog posts-->
<div class="row gy-4 mb-5">
    @if ($blogs)
        @foreach ($blogs as $blog)
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
            <!-- Blog post-->
            <div class="card border-0 rounded-0 h-100 shadow">
                <a href="{{ route('blog.single', [$blog->id, $blog->slug]) }}"><img class="card-img-top rounded-0" src="{{ asset('assets/img/blog/' . $blog->img) }}" alt="{{ $blog->img }}" /></a>
                <div class="card-body p-4">
                    <div class="small text-muted mb-3">
                        <span class="me-2"><i class="bi bi-person"></i> {{ $blog->user->name }}</span>
                        <span class="me-2"><i class="bi bi-clock"></i> {{ date('M d, Y', strtotime($blog->updated_at)) }}</span>
                        <span><i class="bi bi-chat-dots"></i> {{ $blog->comments->count() }} Comment(s)</span>
                    </div>
                    <h2 class="card-title h4 mb-3">{{ $blog->name }}</h2>
                    <p class="card-text mb-4">{{ $blog->post_meta }}</p>
                    <a class="btn btn-primary rounded-0" href="{{ route('blog.single', [$blog->id, $blog->slug]) }}">Read more →</a>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>
