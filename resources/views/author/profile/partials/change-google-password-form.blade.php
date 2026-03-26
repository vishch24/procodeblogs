<div class="card border-0 rounded-0 shadow h-100">
    <div class="card-header p-4">
        <h3 class="fw-medium">
            {{ __('Change Password') }}
        </h3>
    </div>
    <div class="card-body p-4">
        <div class="mb-4">
            {{ __('We know you logged in through google. right? Here, you can click the below button to set your own password. By clicking on the button, we will send you a password reset link.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('author.profile.google.send.reset.link') }}">
            @csrf

            <input type="hidden" name="email" value="{{ old('name', $user->email) }}" required>
            <!-- Email Address -->
            {{-- <div class="form-floating mb-3">
                <input type="email" class="form-control shadow-sm" id="floatingInput" name="email"
                    value="{{ old('email') }}" placeholder="name@example.com" required autofocus>
                <label for="floatingInput">{{ __('Email Address') }}</label>
            </div> --}}
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <input type="submit" class="px-4 py-2 btn btn-success border-0 shadow-sm"
                value="{{ __('Email Password Reset Link') }}">

        </form>
    </div>
</div>
