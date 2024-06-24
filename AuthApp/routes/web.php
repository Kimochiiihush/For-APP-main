<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'role:admin']);

Route::middleware(['auth', 'check.user.role:admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index']);
});

Route::middleware(['auth', 'check.user.role:user'])->group(function () {
    Route::get('user/profile', [HomeController::class, 'profile']);
    // Add more user routes here
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get('admin/dashboard', [HomeController::class, 'index']);
