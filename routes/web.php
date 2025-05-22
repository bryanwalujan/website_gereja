<?php

use App\Http\Controllers\PublicDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [PublicDashboardController::class, 'index'])->name('public.dashboard');
Route::get('/churches/{id}', [PublicDashboardController::class, 'showChurch'])->name('public.church.show');