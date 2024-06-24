<?php

// app/Http/Middleware/CheckUserRole.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role = null)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($role === 'admin' && $user->role !== 'admin') {
                return redirect('/'); // Redirect non-admin users to the home page
            } elseif ($role === 'user' && $user->role !== 'user') {
                return redirect('/admin/dashboard'); // Redirect non-regular users to the admin dashboard
            }
        } else {
            return redirect('/login'); // Redirect unauthenticated users to the login page
        }

        return $next($request);
    }
}