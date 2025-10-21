<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DonorsController;

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


    //Rotas de Doadores - Donors
    Route::get('/donors',[DonorsController::class,'index'])->name('donors.index');
    Route::get('/donors/create',[DonorsController::class,'create'])->name('donors.create');
    Route::get('/donors/{donors}/show',[DonorsController::class,'show'])->name('donors.show');
    Route::post('/donors/store',[DonorsController::class,'store'])->name('donors.store');
    Route::get('/donors/{donors}/edit',[DonorsController::class,'edit'])->name('donors.edit');
    Route::put('/donors/{donors}/edit',[DonorsController::class,'update'])->name('donors.update');
    Route::delete('/donors/{donors}/delete',[DonorsController::class,'destroy'])->name('donors.destroy');
    ROute::put('/donors/{donors}/active',[DonorsController::class,'active'])->name('donors.active');

   
});

require __DIR__.'/auth.php';
