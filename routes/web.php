<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UsersController;
use App\Models\Campaign;
use Illuminate\Support\Facades\Route;

// ==================== ROTAS PÚBLICAS ====================
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Demo da instituição
Route::get('/institution-demo', function () {
    return view('frontend.institution.demo');
})->name('institution.demo');

// Página pública da instituição
Route::get('/institution/{institution}', [InstitutionController::class, 'show'])
    ->name('frontend.institutions.show');

// ==================== ROTAS PROTEGIDAS ====================
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get("/dashboard", [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/address', [ProfileController::class, 'updateAddress'])->name('profile.update.address');
    Route::patch('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');

    // Users Management
    Route::prefix('users')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('users.index');
        Route::get('/create', [UsersController::class, 'create'])->name('users.create');
        Route::post('/create', [UsersController::class, 'store'])->name('users.store');
        Route::get('/{user}/show', [UsersController::class, 'show'])->name('users.show');
        Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
        Route::put('/{user}/edit', [UsersController::class, 'update'])->name('users.update');
        Route::delete('/{user}/delete', [UsersController::class, 'destroy'])->name('users.destroy');
        Route::put('/{user}/active', [UsersController::class, 'active'])->name('users.active');
    });

    // Institutions Management
    Route::prefix('institutions')->group(function () {
        Route::get('/', [InstitutionController::class, 'index'])->name('institutions.index');
        Route::get('/{institution}/edit', [InstitutionController::class, 'edit'])->name('institutions.edit');
        Route::put('/{institution}', [InstitutionController::class, 'update'])->name('institutions.update');
        Route::delete('/{institution}', [InstitutionController::class, 'destroy'])->name('institutions.destroy');
        Route::put('/{institution}/active', [InstitutionController::class, 'active'])->name('institutions.active');
    });

    // Campaigns
    Route::prefix('campaign')->group(function () {
        Route::get('/', [CampaignController::class, 'index'])->name('campaign.index');
        Route::get('/create', [CampaignController::class, 'create'])->name('campaign.create');
        Route::post('/create', [CampaignController::class, 'store'])->name('campaign.store');
        Route::get('/{campaign}/edit', [CampaignController::class, 'edit'])->name('campaign.edit');
        Route::put('/{campaign}/update', [CampaignController::class, 'update'])->name('campaign.update');
        Route::put('/{campaign}/status', [CampaignController::class, 'active'])->name('campaign.active');
        Route::get('/{campaign}/upload', [CampaignController::class, 'photoUpload'])->name('campaign.photoUpload');
        Route::post('/{campaign}/updateImages', [CampaignController::class, 'updateImages'])->name('campaign.updateImages');
        Route::delete('/{campaign}/photo/{photo}/delete-image', [CampaignController::class, 'deleteImage'])->name('campaign.deleteImage');
    });

    // Donors
    Route::prefix('donors')->group(function () {
        Route::get('/', [DonorController::class, 'index'])->name('donors.index');
        Route::get('/create', [DonorController::class, 'create'])->name('donors.create');
        Route::post('/create', [DonorController::class, 'store'])->name('donors.store');
        Route::get('/{donor}', [DonorController::class, 'show'])->name('donors.show');
        Route::get('/{donor}/edit', [DonorController::class, 'edit'])->name('donors.edit');
        Route::put('/{donor}/update', [DonorController::class, 'update'])->name('donors.update');
        Route::delete('/{donor}/delete', [DonorController::class, 'destroy'])->name('donors.destroy');
    });

    // Donations
    Route::resource('donations', DonationController::class);

    // Reports
    Route::get("/reports", [ReportsController::class, 'index'])->name('reports.index');
});

require __DIR__ . '/auth.php';
