<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'redirect'])->name('dashboard');

    // Admin Dashboard
    Route::get('/admin/admindashboard', [HomeController::class, 'index'])->name('admin.admindashboard');
    Route::get('/admin/foodmenu', [AdminController::class, 'foodmenu'])->name('admin.foodmenu');
    Route::get('/admin/usermenu', [AdminController::class, 'usermenu'])->name('admin.usermenu');
    Route::get('/admin/backup', [AdminController::class, 'backup'])->name('admin.backup');

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

    // Backup and Recovery Routes
    Route::get('/admin/backup', [BackupController::class, 'showBackupForm'])->name('admin.backup');
    Route::post('/admin/backup', [BackupController::class, 'backupDatabase'])->name('admin.backup.database');
    Route::post('/admin/restore', [BackupController::class, 'restoreDatabase'])->name('admin.restore.database');
    Route::post('/admin/drop', [BackupController::class, 'dropDatabase'])->name('admin.drop.database');
    Route::post('/admin/create', [BackupController::class, 'createDatabase'])->name('admin.create.database');

    // Admin User Management Routes
    Route::get('/admin/usermenu', [AdminController::class, 'userMenu'])->name('admin.usermenu');
    Route::get('/admin/edituser/{id}', [AdminController::class, 'editUser'])->name('admin.edituser');
    Route::delete('/admin/deleteuser/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteuser');
    Route::patch('/admin/updateuser/{id}', [AdminController::class, 'updateUser'])->name('admin.updateuser');

});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);
