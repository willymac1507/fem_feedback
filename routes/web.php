<?php

use App\Http\Controllers\DashboardController;
use App\Services\DataService;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('populate', [DataService::class, 'populate'])->name('populate');
});

require __DIR__.'/settings.php';
