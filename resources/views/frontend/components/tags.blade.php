<div class="card border-0 rounded-0 shadow mb-4">
    <div class="card-header border-0 py-3"><h4 class="mb-0">Tags</h4></div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                @if ($sideTag)
                    @foreach ($sideTag as $tag)
                    <a class="btn btn-sm btn-outline-secondary px-2 py-1 me-1 mb-3" href="{{ route('tag.single', [$tag->id, str_replace(' ', '-', strtolower($tag->name))]) }}">{{ $tag->name }}</a>
                    @endforeach
                @else
                    <div class="col-12"><p class="text-muted">No tags have been added yet.</p></div>
                @endif
            </div>
        </div>
    </div>
</div>
