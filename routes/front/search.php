<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\SearchController;

//Search
Route::get('/search-engine', [SearchController::class, 'search_engine'])->name('search-engine');
Route::get('/georeferencing', [SearchController::class, 'georeferencing'])->name('georeferencing');

/* Fines de programación */
Route::get('/sectores', [SearchController::class, 'sectores'])->name('home.sectores');
Route::get('/subsectores', [SearchController::class, 'subsectores'])->name('home.subsectores');
Route::get('/codigo_postales', [SearchController::class, 'codigo_postales'])->name('home.codigo_postales');
