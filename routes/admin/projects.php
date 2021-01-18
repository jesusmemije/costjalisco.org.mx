<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;

//Projects
Route::get('/admin/projects/', [AdminProjectController::class, 'index'])->name('project.index');
Route::get('/admin/projects/create', [AdminProjectController::class, 'create'])->name('project.create');
Route::post('/admin/projects/', [AdminProjectController::class, 'store'])->name('project.store');
Route::get('/admin/projects/test', [AdminProjectController::class, 'test'])->name('project.test');

//nav views project phases
Route::get('/admin/projects/generaldata/{project?}', [AdminProjectController::class, 'generaldata'])->name('project.generaldata2');
Route::get('/admin/projects/generaldata/', [AdminProjectController::class, 'generaldata'])->name('project.generaldata');

Route::get('/admin/projects/identificacion/{project?}', [AdminProjectController::class, 'identificacion'])->name('project.identificacion');
Route::get('/admin/projects/preparacion/{project?}', [AdminProjectController::class, 'preparacion'])->name('project.preparacion');
Route::get('/admin/projects/contratacion/{project?}', [AdminProjectController::class, 'contratacion'])->name('project.contratacion');
Route::get('/admin/projects/ejecucion/{project?}', [AdminProjectController::class, 'ejecucion'])->name('project.ejecucion');
Route::get('/admin/projects/finalizacion/{project?}', [AdminProjectController::class, 'finalizacion'])->name('project.finalizacion');

//edit phases project
Route::get('/admin/projects/identificacion/{project}/', [AdminProjectController::class, 'editidentificacion'])->name('project.editidentificacion');

//save phases project
Route::post('/admin/projects/savegeneraldata/', [AdminProjectController::class, 'savegeneraldata'])->name('project.savegeneraldata');
Route::post('/admin/projects/saveidentificacion', [AdminProjectController::class, 'saveidentificacion'])->name('project.saveidentificacion');
Route::post('/admin/projects/savepreparacion', [AdminProjectController::class, 'savepreparacion'])->name('project.savepreparacion');
Route::post('/admin/projects/savecontratacion', [AdminProjectController::class, 'savecontratacion'])->name('project.savecontratacion');
Route::post('/admin/projects/saveejecucion', [AdminProjectController::class, 'saveejecucion'])->name('project.saveejecucion');
Route::post('/admin/projects/savefinalizacion', [AdminProjectController::class, 'savefinalizacion'])->name('project.savefinalizacion');

//update phases project
Route::post('/admin/projects/updategeneraldata/', [AdminProjectController::class, 'updategeneraldata'])->name('project.updategeneraldata');
Route::post('/admin/projects/updateidentificacion/', [AdminProjectController::class, 'updateidentificacion'])->name('project.updateidentificacion');
Route::post('/admin/projects/updatepreparacion/', [AdminProjectController::class, 'updatepreparacion'])->name('project.updatepreparacion');
Route::post('/admin/projects/updatecontratacion/', [AdminProjectController::class, 'updatecontratacion'])->name('project.updatecontratacion');
Route::post('/admin/projects/updateejecucion/', [AdminProjectController::class, 'updateejecucion'])->name('project.updateejecucion');
Route::post('/admin/projects/updatefinalizacion/', [AdminProjectController::class, 'updatefinalizacion'])->name('project.updatefinalizacion');
Route::delete('/admin/projects/{id}', [AdminProjectController::class, 'destroy'])->name('project.destroy');

//delete project documents
Route::post('/admin/projects/deletedocument/', [AdminProjectController::class, 'deletedocument'])->name('project.deletedocument');