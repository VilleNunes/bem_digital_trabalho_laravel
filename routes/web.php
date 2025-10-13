<?php

use App\Http\Controllers\Auth\LoginController;
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

    // Routes profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes users
    Route::get('/users',[UsersController::class,'index'])->name('users.index');
    Route::get('/users/create',[UsersController::class,'create'])->name('users.create');
    Route::get('/users/{id}/show',[UsersController::class,'show'])->name('users.show');
    Route::post('/users/create',[UsersController::class,'store'])->name('users.store');
    Route::get('/users/{user}/edit',[UsersController::class,'edit'])->name('users.edit');
    Route::put('/users/{user}/edit',[UsersController::class,'update'])->name('users.update');
    Route::delete('/users/{user}/delete',[UsersController::class,'destroy'])->name('users.destroy');
    ROute::put('/users/{user}/active',[UsersController::class,'active'])->name('users.active');
});



require __DIR__.'/auth.php';
