<div class="card border-0 rounded-0 shadow h-100">
    <div class="card-header p-4">
        <h3 class="fw-medium">
            {{ __('Update Password') }}
        </h3>
    </div>

    <div class="card-body p-4">
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <div class="form-floating mb-3">
                <input type="password" class="form-control shadow-sm" id="floatingCPass" name="current_password" placeholder="Enter Current Password" autocomplete="current-password">
                <label for="floatingCPass">{{ __('Current Password') }}</label>
            </div>
            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('current_password')" />

            <div class="form-floating mb-3">
                <input type="password" class="form-control shadow-sm" id="floatingNPass" name="password" placeholder="Enter New Password" autocomplete="new-password">
                <label for="floatingNPass">{{ __('New Password') }}</label>
            </div>
            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password')" />

            <div class="form-floating mb-3">
                <input type="password" class="form-control shadow-sm" id="floatingCnPass" name="password_confirmation" placeholder="Enter Confirm Password" autocomplete="new-password">
                <label for="floatingCnPass">{{ __('Confirm Password') }}</label>
            </div>
            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password_confirmation')" />

            <div class="d-flex align-items-center">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
        <p class="mt-3 mb-0 text-primary fw-bold">
            {{ __('Note: Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </div>
</div>
