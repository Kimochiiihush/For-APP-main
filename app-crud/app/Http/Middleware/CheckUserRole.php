<?php



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
        $user = Auth::user();

        if ($user && $role) {
            // Check if the user has the required role
            if ($user->usertype !== $role) {
                return redirect('user.userdashboard')->with('error', 'You do not have permission to access this page.');
            }
        }

        return $next($request);
    }
}

