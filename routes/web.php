<?php

use App\Http\Controllers\CompetitionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/competitions', [CompetitionController::class, 'index'])->name('competitions.index');
    Route::resource('competitions', CompetitionController::class);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
