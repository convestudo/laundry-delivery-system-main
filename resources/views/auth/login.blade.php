<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Welcome Title -->
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Please log in to your account to continue</h2>
        <!-- <p class="text-sm text-gray-600">Please log in to your account to continue.</p> -->
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                placeholder="Enter your email address"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Enter your password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    name="remember"
                >
                <span class="ms-2 text-sm text-gray-600">Remember me next time</span>
            </label>
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-6 gap-3">
            @if (Route::has('password.request'))
                <a
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}"
                >
                    Forgot your password?
                </a>
            @endif

            <!-- Login Button -->
            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>

            <!-- Register Button -->
            <x-primary-button>
                <a href="{{ route('register') }}" class="text-white no-underline">
                    {{ __('Register') }}
                </a>
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
