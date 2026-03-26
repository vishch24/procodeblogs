<nav class="navbar navbar-expand-lg navbar-light bg-body py-3 shadow-sm">
    <div class="container">
        <a class="navbar-brand fs-3 fw-medium px-2" href="{{ route('home') }}">
            <img src="{{ asset('assets/img/logo.png') }}" alt="logo.png" width="250" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse pt-4 pt-lg-0" id="navbarSupportedContent">
            {{-- <ul class="navbar-nav m-lg-auto mb-3 mb-lg-0">
                <li class="nav-item mx-2 mx-lg-1 mb-2 mb-lg-0"><a class="nav-link {{ $pageName === 'home' ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a></li>
                <li class="nav-item mx-2 mx-lg-1 mb-2 mb-lg-0"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item mx-2 mx-lg-1 mb-2 mb-lg-0"><a class="nav-link" href="#!">Contact</a></li>
                <li class="nav-item mx-2 mx-lg-1 mb-2 mb-lg-0"><a class="nav-link" href="#">Blog</a></li>
            </ul> --}}

            @if (Route::has('login'))
                @auth
                    <div class="px-2 ms-auto">
                        <nav class="navmenu">
                            <ul class="d-flex align-items-center list-style-none">
                                <li class="dropdown">
                                    <a class="text-body text-decoration-none" href="#">
                                        <div class="d-flex align-items-center">
                                            @if (Auth::user()->img)
                                                @php
                                                    if (Auth::user()->google_id) {
                                                        $user_img = Auth::user()->img;
                                                    } else {
                                                        $user_img = asset(
                                                            'dashboard/assets/img/avatar/' . Auth::user()->img,
                                                        );
                                                    }
                                                @endphp
                                                <img src="{{ $user_img }}" class="img-fluid rounded-circle me-1"
                                                    width="45" alt="{{ $user_img }}">
                                            @else
                                                <img src="{{ asset('dashboard/assets/img/avatar/avatar-1.png') }}"
                                                    class="img-fluid rounded-circle me-1" width="45" alt="avatar-1.png">
                                            @endif
                                            <span>{{ Auth::user()->name }}</span>
                                        </div>
                                        <i class="bi bi-chevron-down toggle-dropdown"></i>
                                    </a>

                                    <ul>
                                        <li><a href="{{ route('author.profile.edit') }}">{{ __('Profile') }}</a></li>
                                        <!-- Authentication -->
                                        <li>
                                            <a href="#LogoutModal" data-bs-toggle="modal"
                                                data-bs-target="#LogoutModal">Logout</a>
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
                @else
                    <div class="d-flex align-items-center px-2 ms-auto">
                        <a class="btn btn-body" href="{{ route('login') }}"><i class="bi bi-person-lock"></i> Login</a>

                        @if (Route::has('register'))
                            <a class="btn btn-body" href="{{ route('register') }}"><i class="bi bi-person-plus-fill"></i>
                                Register</a>
                        @endif
                    </div>
                @endauth
            @endif
        </div>
    </div>
</nav>

@include('frontend.components.user-logout-modal')
