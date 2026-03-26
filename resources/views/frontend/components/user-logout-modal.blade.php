<div class="modal fade" id="LogoutModal" tabindex="-1" aria-labelledby="LogoutModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="LogoutModalLabel">Delete Modal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> --}}
            <div class="modal-body">
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="mt-3 p-4">
                    <h2 class="fw-bold mb-5">
                        {{ __('Are you sure you want to logout your account?') }}
                    </h2>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="px-4 py-2 btn btn-secondary text-uppercase rounded-0 border-0 shadow-sm" data-bs-dismiss="modal">
                            {{ __('Cancel') }}
                        </button>

                        @if (Auth::user())
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="px-4 py-2 btn btn-danger text-uppercase rounded-0 border-0 shadow-sm ms-3" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </form>
                        @elseif (Auth::guard('admin')->user())
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <a href="{{ route('admin.logout') }}" class="px-4 py-2 btn btn-danger text-uppercase rounded-0 border-0 shadow-sm ms-3" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
