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
                                @if (Auth::user() && Auth::user()->img)
                                    @php
                                        if (Auth::user()->google_id) {
                                            $user_img = Auth::user()->img;
                                        } else {
                                            $user_img = asset('dashboard/assets/img/avatar/' . Auth::user()->img);
                                        }
                                    @endphp
                                    <img src="{{ $user_img }}" width="40" alt="{{ Auth::user()->img }}"
                                        class="img-fluid rounded-circle me-1 shadow-sm" />
                                @else
                                    <img src="{{ asset('dashboard/assets/img/avatar/avatar-1.png') }}" width="40"
                                        alt="avatar-1.png" class="img-fluid rounded-circle me-1 shadow-sm" />
                                @endif
                            </div>
                            <div class="">
                                @if (Auth::user())
                                    <span class="d-block fw-bold">{{ Auth::user()->name }}</span>
                                    <small class="text-body-secondary">{{ Auth::user()->email }}</small>
                                @endif
                            </div>
                        </div>
                        <i class="bi bi-chevron-down toggle-dropdown"></i>
                    </a>
                    <ul>
                        <li><a href="{{ route('author.profile.edit') }}">{{ __('Profile') }}</a></li>
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
