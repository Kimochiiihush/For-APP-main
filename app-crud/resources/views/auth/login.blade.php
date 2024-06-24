<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-[#e79334] py-6">
        <!-- Logo -->
        <div class="mb-8">
            <img src="{{ asset('images/savory-bliss-logo.png') }}" alt="Logo" class="w-40 h-32">
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="w-full max-w-md bg-[#e0c3a3] p-8 shadow-md rounded-lg">
            <h2 class="text-center text-2xl font-bold text-[#4d2b1f] mb-6">Log In</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me and Forgot Password -->
                <div class="flex items-center justify-between mb-4">
                    <label for="remember_me" class="inline-flex items-center text-[#4d2b1f]">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#8b5e3c] shadow-sm focus:ring-[#8b5e3c]" name="remember">
                        <span class="ml-2">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-[#8b5e3c] hover:text-[#4d2b1f]" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Not yet Registered and Log In Buttons -->
                <div class="flex items-center justify-between">
                    <a class="text-sm text-[#8b5e3c] hover:text-[#4d2b1f]" href="{{ route('register') }}">
                        {{ __('Not yet Registered?') }}
                    </a>

                    <x-primary-button class="ml-3 bg-[#8b5e3c] hover:bg-[#4d2b1f]">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
