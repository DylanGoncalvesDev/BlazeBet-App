<?php

use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\SportMatchController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SportMatchController::class, 'welcome'])->name('home');
Route::get('/matches-filter', [SportMatchController::class, 'filter'])->name('matches.filter');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/competitions', [CompetitionController::class, 'index'])->name('competitions.index');
    Route::get('/admin/matches', [SportMatchController::class, 'adminIndex'])->name('admin.matches.index');

    Route::get('/matches/create', [SportMatchController::class, 'create'])->name('matches.create');
    Route::post('/matches', [SportMatchController::class, 'store'])->name('matches.store');

    Route::get('/matches/{id}/edit', [SportMatchController::class, 'edit'])->name('matches.edit');
    Route::put('/matches/{id}', [SportMatchController::class, 'update'])->name('matches.update');
    Route::delete('/matches/{id}', [SportMatchController::class, 'destroy'])->name('matches.destroy');

    Route::resource('competitions', CompetitionController::class);
    Route::resource('teams', TeamController::class);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [SportMatchController::class, 'index'])->name('dashboard');
    Route::get('/matches', [SportMatchController::class, 'index'])->name('matches.index');
    Route::get('/matches/{id}', [SportMatchController::class, 'show'])->name('matches.show');

    Route::resource('predictions', PredictionController::class);
    Route::get('/predictions-filter', [PredictionController::class, 'filter'])->name('predictions.filter');
    Route::get('/predictions-ranking', [PredictionController::class, 'ranking'])->name('predictions.ranking');
});

require __DIR__.'/settings.php';
