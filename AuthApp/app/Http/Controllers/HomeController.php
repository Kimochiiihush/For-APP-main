<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $globalUserRole = auth()->check() ? auth()->user()->role : 'guest';
        return view('home', compact('globalUserRole'));
    }
}
