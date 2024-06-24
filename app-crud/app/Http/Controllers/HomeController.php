<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data = Food::all();
        $usertype = Auth::user()->usertype;

        if ($usertype === 'admin') {
            return view('admin.admindashboard', compact('data'));
        } else {
            return view('user.userdashboard', compact('data'));
        }
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype === 'admin') {
            return redirect()->route('admin.admindashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }
}
