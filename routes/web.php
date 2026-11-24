<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard/{category}/show', [DashboardController::class, 'show'])
        ->name('dashboard.show');
    Route::patch('request/{request}/upvote', [RequestController::class, 'upvote'])
        ->name('request.upvote');

});

require __DIR__ . '/settings.php';
