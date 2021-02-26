<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

//Material de apoyo
Route::get('/admin/support-material', [DashboardController::class, 'support_material'])->name('support-material-admin');
Route::post('/admin/materialstore', [DashboardController::class, 'materialstore'])->name('materialstore');
Route::post('/admin/materialedit', [DashboardController::class, 'materialedit'])->name('materialedit');
Route::post('/admin/materialdestroy', [DashboardController::class, 'materialdestroy'])->name('materialdestroy');
