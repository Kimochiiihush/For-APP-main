<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Custom CSS for Background Image -->
        <style>
            body {
                background-image: url('/images/background.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-gray-900 bg-opacity-50">
            <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-lg rounded-lg">
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('images/savory-bliss-logo.png') }}" alt="Logo" class="w-24 h-24">
                </div>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
