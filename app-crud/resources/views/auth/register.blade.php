<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-[#e79334] py-6">
        <!-- Logo -->
        <div class="mb-8">
            <img src="{{ asset('images/savory-bliss-logo.png') }}" alt="Logo" class="w-40 h-32">
        </div>

        <div class="w-full max-w-md bg-[#e0c3a3] p-8 shadow-md rounded-lg">
            <h2 class="text-center text-2xl font-bold text-[#4d2b1f] mb-6">Register</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a class="text-sm text-[#8b5e3c] hover:text-[#4d2b1f]" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <x-primary-button class="ml-3 bg-[#8b5e3c] hover:bg-[#4d2b1f]">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
