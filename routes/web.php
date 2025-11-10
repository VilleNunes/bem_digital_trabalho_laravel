<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UsersController;
use App\Models\Campaign;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// ==================== ROTAS PÚBLICAS ====================
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Página pública de uma campanha
Route::get('/campanhas/{id}', [CampaignController::class, 'showPublic'])->name('campaign.show.public');

//cadastro instituicoes
Route::get('/cadastro-instituicoes', function () {
    return view('frontend.register-institution');
})->name('cadastro.instituicoes');

//contato
Route::get('/contato', function () {
    return view('frontend.contact');
})->name('contato');

// Demo da instituição
Route::get('/institution-demo', function () {
    return view('frontend.institution.demo');
})->name('institution.demo');

// Página pública da instituição
Route::get('/institution/{institution}', [InstitutionController::class, 'show'])
    ->name('frontend.institutions.show');

// ==================== ROTAS PROTEGIDAS ====================
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/address', [ProfileController::class, 'updateAddress'])->name('profile.update.address');
    Route::patch('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');
    
    Route::get("/dashboard",[DashboardController::class,'index'])->name('dashboard');



    // ROTAS DE USUÁRIOS
    Route::middleware('module:Usuários')->group(function () {
        Route::get('/users', [UsersController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
        Route::get('/users/{user}/show', [UsersController::class, 'show'])->name('users.show');
        Route::post('/users/create', [UsersController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}/edit', [UsersController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}/delete', [UsersController::class, 'destroy'])->name('users.destroy');
        Route::put('/users/{user}/active', [UsersController::class, 'active'])->name('users.active');
    });


    // ROTAS DE INSTITUIÇÕES
    Route::middleware('module:Instituições')->group(function () {
        Route::get('/institutions', [InstitutionController::class, 'index'])->name('institutions.index');
        Route::get('/institutions/{institution}/edit', [InstitutionController::class, 'edit'])->name('institutions.edit');
        Route::put('/institutions/{institution}', [InstitutionController::class, 'update'])->name('institutions.update');
        Route::delete('/institutions/{institution}', [InstitutionController::class, 'destroy'])->name('institutions.destroy');
        Route::put('/institutions/{institution}/active', [InstitutionController::class, 'active'])
            ->name('institutions.active');
    });


    // ROTAS DE CAMPANHAS
    Route::middleware('module:Campanhas')->group(function () {
        Route::get('/campaign/create', [CampaignController::class, 'create'])->name('campaign.create');
        Route::put('/campaign/{campaign}/status', [CampaignController::class, 'active'])->name('campaign.active');
        Route::post('/campaign/create', [CampaignController::class, 'store'])->name('campaign.store');
        Route::get('/campaign', [CampaignController::class, 'index'])->name('campaign.index');
        Route::get('/campaign/{campaign}/edit', [CampaignController::class, 'edit'])->name('campaign.edit');
        Route::put('/campaign/{campaign}/update', [CampaignController::class, 'update'])->name('campaign.update');
        Route::get('/campaign/{campaign}/upload', [CampaignController::class,'photoUpload'])->name('campaign.photoUpload');
        Route::post('/campaign/{campaign}/updateImages', [CampaignController::class,'updateImages'])->name('campaign.updateImages');
        Route::delete('/campaigns/{campaign}/photo/{photo}/delete-image', [CampaignController::class, 'deleteImage'])->name('campaign.deleteImage');
    });


    // ROTAS DE DOADORES
    Route::middleware('module:Doadores')->group(function () {
        Route::get('/donors/create', [DonorController::class, 'create'])->name('donors.create');
        Route::post('/donors/create', [DonorController::class, 'store'])->name('donors.store');
        Route::get('/donors', [DonorController::class, 'index'])->name('donors.index');
        Route::get('/donors/{donor}', [DonorController::class, 'show'])->name('donors.show');
        Route::delete('/donors/{donor}/delete', [DonorController::class, 'destroy'])->name('donors.destroy');
        Route::get('/donors/{donor}/edit', [DonorController::class, 'edit'])->name('donors.edit');
        Route::put('/donors/{donor}/update', [DonorController::class, 'update'])->name('donors.update');
    });

    Route::patch('/change/institution',[UsersController::class,'changeInstitution'])->name('changeInstitution');


    // ROTAS DE DOAÇÕES (Resource)
    Route::middleware('module:Doações')->group(function () {
        Route::resource('donations', DonationController::class);
    });

    // ROTAS DE RELATÓRIOS
    Route::middleware('module:Relatórios')->group(function () {
        Route::get("/reports",[ReportsController::class, 'index'])->name('reports.index');
    });

});

require __DIR__ . '/auth.php';
