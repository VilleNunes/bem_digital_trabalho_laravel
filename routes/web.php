<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InstitutionController;
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
    Route::patch('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.update.photo');


    // Routes users
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::get('/users/{user}/show', [UsersController::class, 'show'])->name('users.show');
    Route::post('/users/create', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}/edit', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}/delete', [UsersController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{user}/active', [UsersController::class, 'active'])->name('users.active');

    //Routes Institution
    Route::get('/institutions', [InstitutionController::class, 'index'])->name('institutions.index');
    Route::get('/institutions/{institution}/edit', [InstitutionController::class, 'edit'])->name('institutions.edit');
    Route::put('/institutions/{institution}', [InstitutionController::class, 'update'])->name('institutions.update');
    Route::delete('/institutions/{institution}', [InstitutionController::class, 'destroy'])->name('institutions.destroy');
    Route::put('/institutions/{institution}/active', [InstitutionController::class, 'active'])
        ->name('institutions.active');
  
    // Rotas de Doadores - Donors
    Route::get('/donors', [DonorsController::class, 'index'])->name('donors.index');
    Route::get('/donors/create', [DonorsController::class, 'create'])->name('donors.create');
    Route::post('/donors/store', [DonorsController::class, 'store'])->name('donors.store');
    Route::get('/donors/{donor}/show', [DonorsController::class, 'show'])->name('donors.show');
    Route::get('/donors/{donor}/edit', [DonorsController::class, 'edit'])->name('donors.edit');
    Route::put('/donors/{donor}/edit', [DonorsController::class, 'update'])->name('donors.update');
    Route::delete('/donors/{donor}/delete', [DonorsController::class, 'destroy'])->name('donors.destroy');
    Route::put('/donors/{donor}/active', [DonorsController::class, 'active'])->name('donors.active');


  });  

  require __DIR__ . '/auth.php';
   
