<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Savory Bliss</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="/css/welcome.css">
    <link rel="shortcut icon" type="x-icon" href="images/ice-cream-logo.png">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-white text-gray-900">
    <div class="container mx-auto p-4">
        <header class="flex items-center justify-between py-6">
            <div class="text-3xl font-bold text-black">Savory Bliss</div>
            <nav class="flex space-x-4">
                <a href="{{ route('register') }}" class="px-3 py-2 bg-pink-300 text-black rounded-md hover:bg-pink-400 transition">Register</a>
                <a href="{{ route('login') }}" class="px-3 py-2 bg-pink-300 text-black rounded-md hover:bg-pink-400 transition">Login</a>
            </nav>
        </header>
        <hr class="border-t-2 border-gray-300 my-4">
    </div>

    <main class="hero">
    <div class="hero-content">
        <img src="{{ asset('images/savory-bliss-add.png') }}" alt="Advertisement" class="hero-image">
    </div>
</main>

    <footer class="text-center py-4">
        <hr class="footer-line">
        <p class="text-black font-semibold">CONTACT US!</p>
        <p class="text-black">Phone no.: XXX-XXXX</p>
        <p class="text-black">Email: xxx@gmail.com</p>
    </footer>
</body>
</html>