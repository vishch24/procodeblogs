<div class="card border-0 rounded-0 shadow h-100">
    <div class="card-header p-4">
        <h3 class="fw-medium">
            {{ __('Delete Account') }}
        </h3>
    </div>
    <div class="card-body p-4">
        <p class="mb-4">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
        <x-danger-button type="button" data-bs-toggle="modal" data-bs-target="#confirm-user-deletion">
            {{ __('Delete Account') }}
        </x-danger-button>
    </div>

    <div class="modal fade" id="confirm-user-deletion" tabindex="-1" aria-labelledby="confirm-user-deletion-Label">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="confirm-user-deletion-Label">Delete Modal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> --}}
                <div class="modal-body">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    <form method="post" action="{{ route('author.profile.destroy') }}" class="mt-3 p-4">
                        @csrf
                        @method('delete')

                        <h2 class="fw-bold mb-3">
                            {{ __('Are you sure you want to delete your account?') }}
                        </h2>

                        <p class="mb-4">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>

                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mb-2" />

                        <div class="form-floating mb-5">
                            <input type="password" class="form-control shadow-sm" id="floatingPassword" name="password" placeholder="{{ __('Password') }}">
                            <label for="floatingPassword">{{ __('Password') }}</label>
                        </div>

                        <div class="d-flex justify-content-end">
                            <x-secondary-button data-bs-dismiss="modal">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-danger-button class="ms-3">
                                {{ __('Delete') }}
                            </x-danger-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
