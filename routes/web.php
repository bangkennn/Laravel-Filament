<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;

Route::get('/', function () {
    return view('welcome');
});

// Routes untuk Banner
Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');
Route::get('/banners/position/{position}', [BannerController::class, 'showByPosition'])->name('banners.position');
Route::get('/api/banners/{position}', [BannerController::class, 'getByPosition'])->name('banners.api');
