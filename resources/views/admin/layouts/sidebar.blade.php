<!-- Sidebar-->
<div class="border-end bg-body py-1 py-lg-0" id="sidebar-wrapper">
    <div class="position-absolute start-0 end-0 top-0 pt-1">
        <span class="badge text-bg-danger small">For Admins</span>
    </div>
    <div class="sidebar-heading fs-6 fw-medium text-nowrap border-bottom bg-body px-3 py-4">
        <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('assets/img/logo.png') }}" alt="logo.png" width="300" class="img-fluid"></a>
    </div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light {{ $pageName === 'dashboard' ? 'active' : '' }}"
            href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a class="list-group-item list-group-item-action list-group-item-light {{ $pageName === 'authors' ? 'active' : '' }}"
            href="{{ route('admin.authors') }}">Users</a>
        <a class="list-group-item list-group-item-action list-group-item-light {{ $pageName === 'comments' ? 'active' : '' }}"
            href="{{ route('admin.comments') }}">Comments</a>
    </div>
    {{-- <div class="position-absolute start-0 end-0 bottom-0 ps-3 pb-2">
        <sup class="small"><span class="badge text-bg-danger">For Admins</span></sup>
    </div> --}}
</div>
