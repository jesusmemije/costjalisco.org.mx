<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;

//News
Route::get('/admin/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/admin/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/admin/news', [NewsController::class, 'store'])->name('news.store');
Route::get('/admin/news/show{news}', [NewsController::class, 'show'])->name('news.show');
Route::get('/admin/news/edit/{news}/', [NewsController::class, 'edit'])->name('news.edit');
Route::put('/admin/news/{news}', [NewsController::class, 'update'])->name('news.update');
Route::delete('/admin/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

Route::post('/admin/periodico', [NewsController::class, 'crear_periodico'])->name('news.periodico');
