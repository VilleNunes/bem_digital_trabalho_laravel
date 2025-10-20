<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DonorController;
use Illuminate\Support\Facades\Route;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (com middleware auth e verified)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas que exigem autenticação
Route::middleware('auth')->group(function () {

    // Rotas do perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas de usuários
    Route::resource('users', UsersController::class)->except(['show']);
    Route::put('/users/{user}/active', [UsersController::class, 'active'])->name('users.active');

    

   
});

require __DIR__.'/auth.php';
