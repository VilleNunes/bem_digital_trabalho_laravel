<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

    // Routes users
    Route::get('/users',[UsersController::class,'index'])->name('users.index');
    Route::get('/users/create',[UsersController::class,'create'])->name('users.create');
    Route::post('/users/create',[UsersController::class,'store'])->name('users.store');
});

require __DIR__.'/auth.php';
