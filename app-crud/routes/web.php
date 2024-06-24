<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'redirect'])->name('dashboard');

    // Admin Dashboard
    Route::get('/admin/admindashboard', [HomeController::class, 'index'])->name('admin.admindashboard');

    // User Dashboard
    Route::get('/user/userdashboard', [HomeController::class, 'index'])->name('user.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/foodmenu', [ProductController::class, 'foodmenu'])->name('admin.foodmenu');
    Route::post('/uploadfood', [ProductController::class, 'upload']);
    Route::get('/deletemenu/{id}', [ProductController::class, 'deletemenu'])->name('delete.food');
    Route::get('/updateview/{id}', [ProductController::class, 'updateview'])->name('update.food');
    Route::post('/update/{id}', [ProductController::class, 'update']);
    Route::post('/addcart/{id}', [ProductController::class, 'addcart'])->name('addcart');
    Route::get('/showcart/{id}', [ProductController::class, 'showcart']);
    Route::get('/remove/{id}', [ProductController::class, 'remove']);
    Route::get('/users}', [Controller::class, 'user']);

});

require __DIR__.'/auth.php';



route::get('admin/dashboard', [HomeController::class, 'index'])-> middleware(['auth', 'admin']);
