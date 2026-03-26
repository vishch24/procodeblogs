<div class="card border-0 rounded-0 shadow mb-4">
    <div class="card-header border-0 py-3"><h4 class="mb-0">Recent Posts</h4></div>
    <div class="card-body">
        <div class="row gy-4">
            @if ($sideRecentPosts)
                @foreach ($sideRecentPosts as $rp)
                <div class="col-12">
                    <a href="{{ route('blog.single', [$rp->id, $rp->slug]) }}" class="text-decoration-none">
                        <div class="post-item row">
                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-3 pe-0">
                                <img src="{{ asset('assets/img/blog/' . $rp->img) }}" class="img-fluid me-2" width="100" alt="{{ $rp->img }}">
                            </div>
                            <div class="col-xxl-9 col-xl-9 col-lg-8 col-md-8 col-9">
                                <p class="fw-semibold mb-0">{{ $rp->name }}</p>
                                <small class="text-muted fst-italic">{{ date('F d, Y', strtotime($rp->updated_at)) }}</small>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            @else
                <div class="col-12"><p class="text-muted">No blogs have been added yet.</p></div>
            @endif
        </div>
    </div>
</div>
