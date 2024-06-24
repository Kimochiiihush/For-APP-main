<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function credentials(Request $request)
    {
        // Sanitize email using filter_var
        $email = filter_var($request->email, FILTER_SANITIZE_EMAIL);

        // Return email and password
        return ['email' => $email, 'password' => $request->password];
    }

    protected function validateLogin(Request $request)
    {
        // Validate email and password
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
    }

    public function login(Request $request)
    {
        // Validate input
        $this->validateLogin($request);

        // Sanitize and retrieve credentials
        $credentials = $this->credentials($request);

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect authenticated user
            return redirect()->intended(route('dashboard'));
        }

        // If login fails, throw validation exception with custom message
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }
}
