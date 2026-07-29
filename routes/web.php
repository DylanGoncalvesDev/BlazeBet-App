<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompetitionController;


Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('competitions', CompetitionController::class);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
