<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admindashboard');
    }

    public function usermenu()
    {
        $users = DB::table('users')->get();
        return view('admin.usermenu', compact('users'));
    }

    public function edituser($id)
    {
        $user = DB::table('users')->find($id);
        return view('admin.edituser', compact('user'));
    }

    public function deleteuser($id)
    {
        DB::table('users')->delete($id);
        return redirect()->route('admin.usermenu')->with('success', 'User deleted successfully');
    }

    public function foodmenu()
    {
        $foods = DB::table('foods')->get();
        return view('admin.foodmenu', compact('foods'));
    }

    public function showbackuppage(): View
    {
        return view('admin.backup');
    }

    public function backupdatabase()
    {
        // Backup logic here
        return back()->with('success', 'Database backup created successfully');
    }

    public function restoredatabase(Request $request)
    {
        // Restore logic here
        return back()->with('success', 'Database restored successfully');
    }

    public function dropdatabase()
    {
        // Drop logic here
        return back()->with('success', 'Database dropped successfully');
    }

    public function createdatabase()
    {
        // Create logic here
        return back()->with('success', 'Database created successfully');
    }
}
