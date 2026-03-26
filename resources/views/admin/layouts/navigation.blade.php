<!-- Top navigation-->
<div class="container-fluid bg-body border-bottom py-2">
    <div class="d-flex align-items-center justify-content-between">
        <button class="btn btn-primary" id="sidebarToggle"><i class="bi bi-list"></i></button>

        <nav class="navmenu">
            <ul class="d-flex align-items-center list-style-none">
                <li class="dropdown">
                    <a href="#">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="">
                                <img src="{{ asset('dashboard/assets/img/avatar/avatar-1.png') }}" width="40"
                                    alt="avatar-1.png" class="img-fluid rounded-circle me-1 shadow-sm" />
                            </div>
                            <div class="">
                                @if (Auth::guard('admin')->user())
                                    <span class="d-block fw-bold">{{ Auth::guard('admin')->user()->name }}</span>
                                    <small class="text-body-secondary">{{ Auth::guard('admin')->user()->email }}</small>
                                @endif
                            </div>
                        </div>
                        <i class="bi bi-chevron-down toggle-dropdown"></i>
                    </a>
                    <ul>
                        <!-- Authentication -->
                        <li>
                            <a href="#LogoutModal" data-bs-toggle="modal" data-bs-target="#LogoutModal">Logout</a>
                            {{-- <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                            </form> --}}
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>

@include('frontend.components.user-logout-modal')
