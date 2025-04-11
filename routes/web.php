<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
// });

// public route per projects guests
Route::resource('projects', ProjectController::class)->middleware(['auth', 'verified']);

//!debug only no auth
// Route::resource('projects', ProjectController::class);


//?? auth rotte per i types
Route::prefix('types')->name('types.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [TypeController::class, 'index'])->name('index');
    Route::post('/', [TypeController::class, 'store'])->name('store');
    Route::get('/create', [TypeController::class, 'create'])->name('create');
    Route::get('/{type}/edit', [TypeController::class, 'edit'])->name('edit');
    Route::get('/{type}', [TypeController::class, 'show'])->name('show');
    Route::put('/{type}', [TypeController::class, 'update'])->name('update');
    Route::delete('/{type}', [TypeController::class, 'destroy'])->name('destroy');
});

// // !debug only no auth
// Route::prefix('types')->name('types.')->group(function () {
//     Route::get('/', [TypeController::class, 'index'])->name('index');
//     Route::post('/', [TypeController::class, 'store'])->name('store');
//     Route::get('/create', [TypeController::class, 'create'])->name('create');
//     Route::get('/{type}/edit', [TypeController::class, 'edit'])->name('edit');
//     Route::get('/{type}', [TypeController::class, 'show'])->name('show');
//     Route::put('/{type}', [TypeController::class, 'update'])->name('update');
//     Route::delete('/{type}', [TypeController::class, 'destroy'])->name('destroy');
// });

// technologies
Route::resource('technologies', TechnologyController::class);

// custom delete image route
Route::delete('projects/{project}/image', [ProjectController::class, 'destroyImage'])->name('projects.destroyImage');

require __DIR__ . '/auth.php';
