<!-- Sidebar-->
<div class="border-end bg-body py-1 py-lg-0" id="sidebar-wrapper">
    <div class="sidebar-heading fw-medium text-nowrap border-bottom bg-body px-3 py-4">
        <a href="{{ route('author.dashboard') }}">
            <img src="{{ asset('assets/img/logo.png') }}" alt="logo.png" width="240" height="80" class="img-fluid">
        </a>
    </div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light {{ $pageName === 'dashboard' ? 'active' : '' }}"
            href="{{ route('author.dashboard') }}">Dashboard</a>
        <a class="list-group-item list-group-item-action list-group-item-light {{ $pageName === 'blogs' ? 'active' : '' }}"
            href="{{ route('author.dashboard.blogs') }}">Blogs</a>
        <a class="list-group-item list-group-item-action list-group-item-light {{ $pageName === 'categories' ? 'active' : '' }}"
            href="{{ route('author.dashboard.categories') }}">Categories</a>
        <a class="list-group-item list-group-item-action list-group-item-light {{ $pageName === 'tags' ? 'active' : '' }}"
            href="{{ route('author.dashboard.tags') }}">Tags</a>
        <a class="list-group-item list-group-item-action list-group-item-light {{ $pageName === 'comments' ? 'active' : '' }}"
            href="{{ route('author.dashboard.comments') }}">Comments</a>
    </div>
</div>
