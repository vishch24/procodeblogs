<!-- Featured blog post-->
@if ($featuredBlog && request()->query('page', 1) == 1 OR !empty($featuredBlog))
<div class="card border-0 rounded-0 mb-4 shadow">
    <a href="{{ route('blog.single', [$featuredBlog->id, $featuredBlog->slug]) }}"><img class="card-img-top rounded-0" src="{{ asset('assets/img/blog/' . $featuredBlog->img) }}" alt="{{ $featuredBlog->img }}" /></a>
    <div class="card-body p-4">
        <div class="small text-muted mb-2">
            <span class="me-3"><i class="bi bi-person"></i> {{ $featuredBlog->user->name }}</span>
            <span class="me-3"><i class="bi bi-clock"></i> {{ date('F d, Y', strtotime($featuredBlog->updated_at)) }}</span>
            <span><i class="bi bi-chat-dots"></i> {{ $featuredBlog->comments->count() }} Comment(s)</span>
        </div>
        <h2 class="card-title">{{ $featuredBlog->name }}</h2>
        <p class="card-text">{{ $featuredBlog->post_meta }}</p>
        <a class="btn btn-primary rounded-0" href="{{ route('blog.single', [$featuredBlog->id, $featuredBlog->slug]) }}">Read more →</a>
    </div>
</div>
@else
    <p class="text-muted">No blogs have been added yet.</p>
@endif
