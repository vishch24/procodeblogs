<div class="card border-0 rounded-0 shadow mb-4">
    <div class="card-header border-0 py-3"><h4 class="mb-0">Search</h4></div>
    <div class="card-body">
        <form action="{{ route('search') }}" method="GET">
            <div class="input-group shadow-sm">
                <input class="form-control rounded-0" type="search" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" name="query" required />
                <button class="btn btn-primary rounded-0" id="button-search" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>
