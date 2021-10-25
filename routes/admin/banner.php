<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

//Banner
Route::get('/admin/admincarousel', [DashboardController::class, 'admincarousel'])->name('admincarousel');
Route::post('/admin/savecarousel', [DashboardController::class, 'savecarousel'])->name('savecarousel');
Route::post('/admin/deletecarousel', [DashboardController::class, 'deletecarousel'])->name('deletecarousel');