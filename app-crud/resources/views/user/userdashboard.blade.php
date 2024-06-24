<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('The Savory Bliss') }}
            </h2>
            <a href="{{ url('/showcart', Auth::user()->id)}}" class="px-3 py-2 bg-pink-300 text-black rounded-md hover:bg-pink-400 transition">Check out cart</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Your user-specific content -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Welcome to the to your heavenly Savory Bliss!</p>
                </div>
            </div>

            <!-- User-specific navigation or additional content -->
            <!-- Add your own content here as needed -->
        </div>
    </div>
    @include("food")
</x-app-layout>

