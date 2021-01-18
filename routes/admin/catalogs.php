<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CatalogsController;
use App\Http\Controllers\Admin\Catalogs\AdjudicationController;
use App\Http\Controllers\Admin\Catalogs\ContractingController;
use App\Http\Controllers\Admin\Catalogs\ContractingStatusController;
use App\Http\Controllers\Admin\Catalogs\ContractTypeController;
use App\Http\Controllers\Admin\Catalogs\DocumentTypeController;
use App\Http\Controllers\Admin\Catalogs\ProjectTypeController;
use App\Http\Controllers\Admin\Catalogs\ResourceController;

//Routes studies
Route::get('/admin/catalogs/studies', [CatalogsController::class, 'studies'])->name('catalogs.studies');
Route::post('/admin/catalogs/saveestudioFactibilidad', [CatalogsController::class, 'saveestudioFactibilidad'])->name('catalogs.saveestudioFactibilidad');
Route::post('/admin/catalogs/deleteestudioFactibilidad', [CatalogsController::class, 'deleteestudioFactibilidad'])->name('catalogs.deleteestudioFactibilidad');
Route::post('/admin/catalogs/editestudioFactibilidad', [CatalogsController::class, 'editestudioFactibilidad'])->name('catalogs.editestudioFactibilidad');
Route::post('/admin/catalogs/saveestudioImpacto', [CatalogsController::class, 'saveestudioImpacto'])->name('catalogs.saveestudioImpacto');
Route::post('/admin/catalogs/deleteestudioImpacto', [CatalogsController::class, 'deleteestudioImpacto'])->name('catalogs.deleteestudioImpacto');
Route::post('/admin/catalogs/editestudioImpacto', [CatalogsController::class, 'editestudioImpacto'])->name('catalogs.editestudioImpacto');
Route::post('/admin/catalogs/saveestudioAmbiental', [CatalogsController::class, 'saveestudioAmbiental'])->name('catalogs.saveestudioAmbiental');
Route::post('/admin/catalogs/deleteestudioAmbiental', [CatalogsController::class, 'deleteestudioAmbiental'])->name('catalogs.deleteestudioAmbiental');
Route::post('/admin/catalogs/editestudioAmbiental', [CatalogsController::class, 'editestudioAmbiental'])->name('catalogs.editestudioAmbiental');

//Sectores/Subsectores
Route::get('/admin/catalogs/sectors', [CatalogsController::class, 'cat_sectors'])->name('catalogs.cat_sectors');
Route::post('/admin/catalogs/getdatafromnamesector', [CatalogsController::class, 'getdatafromnamesector'])->name('catalogs.getdatafromnamesector');
Route::post('/admin/catalogs/savesector', [CatalogsController::class, 'savesector'])->name('catalogs.savesector');
Route::post('/admin/catalogs/deletesector', [CatalogsController::class, 'deletesector'])->name('catalogs.deletesector');
Route::post('/admin/catalogs/deletesubsector', [CatalogsController::class, 'deletesubsector'])->name('catalogs.deletesubsector');
Route::post('/admin/catalogs/editsector', [CatalogsController::class, 'editsector'])->name('catalogs.editsector');
Route::post('/admin/catalogs/editsubsector', [CatalogsController::class, 'editsubsector'])->name('catalogs.editsubsector');
Route::post('/admin/catalogs/savesubsector', [CatalogsController::class, 'savesubsector'])->name('catalogs.savesubsector');
Route::post('/admin/catalogs/subsectores', [CatalogsController::class, 'subsectores'])->name('catalogs.subsec');

//Routes projec type
Route::resource('/admin/catalogs/projecttype', ProjectTypeController::class);
//Routes origin resource
Route::resource('/admin/catalogs/resource', ResourceController::class);
//Routes adjudication
Route::resource('/admin/catalogs/adjudication', AdjudicationController::class);
//Routes contract type    
Route::resource('/admin/catalogs/contracttype', ContractTypeController::class);
//Routes mod contract
Route::resource('/admin/catalogs/contracting', ContractingController::class);
//Routes contract status 
Route::resource('/admin/catalogs/contractstatus', ContractingStatusController::class);
//Routes document type
Route::resource('/admin/catalogs/documenttype', DocumentTypeController::class);
