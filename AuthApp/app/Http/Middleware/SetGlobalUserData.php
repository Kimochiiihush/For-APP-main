<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class SetGlobalUserData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role; // Assuming you have a 'role' field in your users table
            $permissions = $user->permissions; // Assuming you have a 'permissions' field or method in your User model
            $globalUserRole = auth()->user()->role; // Assuming 'role' is a field in your users table
    return view('your_view', compact('globalUserRole'));
    
            // Share the data globally with all views
            View::share('globalUserRole', $role);
            View::share('globalUserPermissions', $permissions);

            // Alternatively, you can use view composers to share data with specific views
            // View::composer('admin.*', function ($view) use ($role, $permissions) {
            //     $view->with('globalUserRole', $role);
            //     $view->with('globalUserPermissions', $permissions);
            // });
        }

        return $next($request);
    }
}