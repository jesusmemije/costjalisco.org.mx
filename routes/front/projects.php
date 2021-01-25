<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ProjectController as FrontProjectController;

//Project
Route::get('/list-projects', [FrontProjectController::class, 'list_projects'])->name('list-projects');
Route::get('/card-projects', [FrontProjectController::class, 'card_projects'])->name('card-projects');
Route::get('/project-single/{id}', [FrontProjectController::class, 'project_single'])->name('project-single');

/* Fines de programación */
Route::get('export/{id}',  [FrontProjectController::class, 'export'])->name('projectexport');
Route::post('getdocumentsproject', [FrontProjectController::class, 'getdocumentsproject'])->name('getdocumentsproject');