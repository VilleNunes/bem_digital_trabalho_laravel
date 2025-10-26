<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InstitutionController;
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
    Route::patch('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.update.photo');


    // Routes users
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::get('/users/{user}/show', [UsersController::class, 'show'])->name('users.show');
    Route::post('/users/create', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}/edit', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}/delete', [UsersController::class, 'destroy'])->name('users.destroy');
    ROute::put('/users/{user}/active', [UsersController::class, 'active'])->name('users.active');

    //Routes Institution
    Route::get('/institutions', [InstitutionController::class, 'index'])->name('institutions.index');
    Route::get('/institutions/{institution}/edit', [InstitutionController::class, 'edit'])->name('institutions.edit');
    Route::put('/institutions/{institution}', [InstitutionController::class, 'update'])->name('institutions.update');
    Route::delete('/institutions/{institution}', [InstitutionController::class, 'destroy'])->name('institutions.destroy');
    Route::put('/institutions/{institution}/active', [InstitutionController::class, 'active'])
        ->name('institutions.active');

// Página inicial - Home
Route::get('/', function () {
    return view('site.home');
})->name('site.home');

// Página sobre - About
Route::get('/sobre', function () {
    return view('site.about');
})->name('site.about');

// Página de contato - Contact
Route::get('/contato', function () {
    return view('site.contact');
})->name('site.contact');

});



require __DIR__ . '/auth.php';