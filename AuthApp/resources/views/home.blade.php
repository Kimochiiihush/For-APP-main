<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Head content... -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- Navbar content... -->
                @if (isset($globalUserRole) && $globalUserRole === 'admin')
                    <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                @else
                    <a href="{{ route('user.dashboard') }}">User Profile</a>
                @endif
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>