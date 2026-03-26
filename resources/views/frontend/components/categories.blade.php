<div class="card border-0 rounded-0 shadow mb-4">
    <div class="card-header border-0 py-3"><h4 class="mb-0">Categories</h4></div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                @if ($sideCat)
                    @foreach ($sideCat as $cat)
                    <a class="btn btn-sm btn-outline-primary px-2 py-1 me-1 mb-3 rounded-pill" href="{{ route('category.single', [$cat->id, str_replace(' ', '-', strtolower($cat->name))]) }}">{{ $cat->name }}</a>
                    @endforeach
                @else
                    <div class="col-12"><p class="text-muted">No categories have been added yet.</p></div>
                @endif
            </div>
        </div>
    </div>
</div>
