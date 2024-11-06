<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('users', [UserController::class, 'index'])->name('users.index'); // List users
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); // Edit user
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update'); // Update user
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); // Delete user

});

require __DIR__.'/auth.php';
