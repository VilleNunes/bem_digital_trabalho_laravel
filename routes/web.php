<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Routes profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Atualiza endereço separado
    Route::patch('/profile/address', [ProfileController::class, 'updateAddress'])->name('profile.update.address');
    Route::patch('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');

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

    // Routes Campaign
    Route::get('/campaign/create', [CampaignController::class, 'create'])->name('campaign.create');
    Route::post('/campaign/create', [CampaignController::class, 'store'])->name('campaign.store');
    Route::get('/campaign', [CampaignController::class, 'index'])->name('campaign.index');
    Route::get('/campaign/{campaign}/edit', [CampaignController::class, 'edit'])->name('campaign.edit');
    Route::put('/campaign/{campaign}/update', [CampaignController::class, 'update'])->name('campaign.update');

    // Routes Donors
    Route::get('/donors/create', [DonorController::class, 'create'])->name('donors.create');
    Route::post('/donors/create', [DonorController::class, 'store'])->name('donors.store');
    Route::get('/donors', [DonorController::class, 'index'])->name('donors.index');
    Route::get('/donors/{donor}', [DonorController::class, 'show'])->name('donors.show');
    Route::delete('/donors/{donor}/delete', [DonorController::class, 'destroy'])->name('donors.destroy');
    Route::get('/donors/{donor}/edit', [DonorController::class, 'edit'])->name('donors.edit');
    Route::put('/donors/{donor}/update', [DonorController::class, 'update'])->name('donors.update');
    
    // Routes Donations
    Route::resource('donations', DonationController::class);
});



require __DIR__ . '/auth.php';
