<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('hasRole')) {
    function hasRole($role)
    {
        return Auth::check() && Auth::user()->role === $role;
    }
}