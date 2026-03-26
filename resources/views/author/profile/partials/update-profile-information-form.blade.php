<div class="card border-0 rounded-0 shadow h-100">
    <div class="card-header p-4">
        <h3 class="fw-medium">
            {{ __('Profile Information') }}
        </h3>
    </div>

    <div class="card-body p-4">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('author.profile.update') }}">
            @csrf
            @method('patch')

            <div class="form-floating mb-3">
                <input type="text" class="form-control shadow-sm" id="floatingName" name="name" value="{{ old('name', $user->name) }}" placeholder="Enter Name" required autofocus autocomplete="name">
                <label for="floatingName">{{ __('Name') }}</label>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />

            <div class="form-floating mb-3">
                <input type="email" class="form-control shadow-sm" id="floatingEmail" name="email" value="{{ old('name', $user->email) }}" placeholder="Enter Email" required autocomplete="username" {{ Auth::user()->google_id ? 'readonly' : '' }}>
                <label for="floatingEmail">{{ __('Email') }}</label>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="mt-2">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 fw-medium text-success">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif

            <div class="d-flex align-items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                    <p class="text-success mb-0"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>
</div>
