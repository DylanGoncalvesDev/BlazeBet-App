<?php

use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\SportMatchController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/competitions', [CompetitionController::class, 'index'])->name('competitions.index');

    Route::get('/matches/create', [SportMatchController::class, 'create'])->name('matches.create');
    Route::post('/matches', [SportMatchController::class, 'store'])->name('matches.store');

    Route::resource('competitions', CompetitionController::class);
    Route::resource('teams', TeamController::class);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('/matches', [SportMatchController::class, 'index'])->name('matches.index');
});

require __DIR__.'/settings.php';
