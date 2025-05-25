<?php

use App\Http\Controllers\PublicDashboardController;
use App\Http\Controllers\WorkshopController;
use Illuminate\Support\Facades\Route;

// Route Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Route Churches
Route::get('/churches', [PublicDashboardController::class, 'index'])->name('public.church.index');
Route::get('/churches/{id}', [PublicDashboardController::class, 'showChurch'])->name('public.church.show');

// Route Workshops
Route::get('/workshops', [WorkshopController::class, 'index'])->name('workshops.index');
Route::get('/workshops/{id}', [WorkshopController::class, 'show'])->name('workshops.show');
Route::get('/daftar/{id}', [WorkshopController::class, 'showRegistrationForm'])->name('public.daftar');
Route::post('/daftar/{id}', [WorkshopController::class, 'register'])->name('public.daftar.store');
// Route untuk unduh materi
Route::get('/workshops/{id}/download', [WorkshopController::class, 'downloadMaterial'])->name('public.workshop.download');

// Route About
Route::get('/about', function () {
    return view('about');
})->name('public.about');