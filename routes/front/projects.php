<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ProjectController as FrontProjectController;

//Project
Route::get('/list-projects', [FrontProjectController::class, 'list_projects'])->name('list-projects');
Route::get('/card-projects', [FrontProjectController::class, 'card_projects'])->name('card-projects');
Route::get('/project-single/{id}', [FrontProjectController::class, 'project_single'])->name('project-single');


Route::get('/jsonproject/{id}', [FrontProjectController::class, 'jsonproject'])->name('jsonproject');

/* Fines de programación */
Route::get('export/{id?}/{type?}',  [FrontProjectController::class, 'export'])->name('projectexport');
Route::get('exportall',  [FrontProjectController::class, 'exportall'])->name('projectexportall');
Route::get('exportallcsv',  [FrontProjectController::class, 'exportallcsv'])->name('projectexportallcsv');
Route::get('jsonprojects',  [FrontProjectController::class, 'jsonprojects'])->name('jsonprojects');
Route::post('getdocumentsproject', [FrontProjectController::class, 'getdocumentsproject'])->name('getdocumentsproject');