<?php

use App\Http\Controllers\Admin\CatalogosController;
use App\Http\Controllers\Admin\CatalogsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\OrganizationsController;
use League\CommonMark\Inline\Element\Code;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('proyecto/', [DashboardController::class, 'viewProyecto'])->name('project.create');
    Route::post('saveP/', [DashboardController::class, 'saveP'])->name('project.save');
    Route::get('formwizard/', [DashboardController::class, 'formwizard'])->name('formwizard');
});
*/

//Route::resource('admin/proyecto','AdmiDashboardController');

//Route::resource('administador/proyectos','administrador\ProyectoController');



/*Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::resource('users', [DashboardController::class]);
});*/

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    //Dashboard
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

    //Projects
    Route::get('/admin/projects/', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/admin/projects/', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/admin/projects/test', [ProjectController::class, 'test'])->name('project.test');
    
    
   //Routes projecttype.
   Route::get('/admin/catalogs/projecttype', [CatalogsController::class, 'projecttype'])->name('catalogs.projecttype');
   Route::post('/admin/catalogs/deleteprojecttype', [CatalogsController::class, 'deleteprojecttype'])->name('catalogs.deleteprojecttype');
   Route::post('/admin/catalogs/editprojecttype', [CatalogsController::class, 'editprojecttype'])->name('catalogs.editprojecttype');

    Route::post('/admin/catalogs/saveprojecttype', [CatalogsController::class, 'saveprojecttype'])->name('catalogs.saveprojecttype');
    
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
    
    //Routes origin resoruce

    Route::get('/admin/catalogs/resource', [CatalogsController::class, 'resource'])->name('catalogs.resource');
    Route::post('/admin/catalogs/saveresource', [CatalogsController::class, 'saveresource'])->name('catalogs.saveresource');
    Route::post('/admin/catalogs/deleteresource', [CatalogsController::class, 'deleteresource'])->name('catalogs.deleteresource');
    Route::post('/admin/catalogs/editresource', [CatalogsController::class, 'editresource'])->name('catalogs.editresource');
    
    //Routes adjudication

    Route::get('/admin/catalogs/adjudication', [CatalogsController::class, 'adjudication'])->name('catalogs.adjudication');
    Route::post('/admin/catalogs/saveadjudication', [CatalogsController::class, 'saveadjudication'])->name('catalogs.saveadjudication');
    Route::post('/admin/catalogs/deleteadjudication', [CatalogsController::class, 'deleteadjudication'])->name('catalogs.deleteadjudication');
    Route::post('/admin/catalogs/editadjudication', [CatalogsController::class, 'editadjudication'])->name('catalogs.editadjudication');
    

    //Routes contract type
    Route::get('/admin/catalogs/contracttype', [CatalogsController::class, 'contracttype'])->name('catalogs.contracttype');
    Route::post('/admin/catalogs/savecontracttype', [CatalogsController::class, 'savecontracttype'])->name('catalogs.savecontracttype');
    Route::post('/admin/catalogs/deletecontracttype', [CatalogsController::class, 'deletecontracttype'])->name('catalogs.deletecontracttype');
    Route::post('/admin/catalogs/editcontracttype', [CatalogsController::class, 'editcontracttype'])->name('catalogs.editcontracttype');
    
    //Routes mod contract

    Route::get('/admin/catalogs/contracting', [CatalogsController::class, 'contracting'])->name('catalogs.contracting');
    Route::post('/admin/catalogs/savecontracting', [CatalogsController::class, 'savecontracting'])->name('catalogs.savecontracting');
    Route::post('/admin/catalogs/deleteccontracting', [CatalogsController::class, 'deletecontracting'])->name('catalogs.deletecontracting');
    Route::post('/admin/catalogs/editcontracting', [CatalogsController::class, 'editcontracting'])->name('catalogs.editcontracting');
    
    //Routes contract status
    Route::get('/admin/catalogs/contractstatus', [CatalogsController::class, 'contractstatus'])->name('catalogs.contractstatus');
    Route::post('/admin/catalogs/savecontractstatus', [CatalogsController::class, 'savecontractstatus'])->name('catalogs.savecontractstatus');
    Route::post('/admin/catalogs/deletecontractstatus', [CatalogsController::class, 'deletecontractstatus'])->name('catalogs.deletecontractstatus');
    Route::post('/admin/catalogs/editcontractstatus', [CatalogsController::class, 'editcontractstatus'])->name('catalogs.editcontractstatus');
    

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

    
    //nav views project phases
    Route::get('/admin/projects/identificacion/', [ProjectController::class, 'identificacion'])->name('project.identificacion');
    Route::get('/admin/projects/preparacion/{project?}', [ProjectController::class, 'preparacion'])->name('project.preparacion');
    Route::get('/admin/projects/contratacion/{project?}', [ProjectController::class, 'contratacion'])->name('project.contratacion');
    Route::get('/admin/projects/ejecucion/{project?}', [ProjectController::class, 'ejecucion'])->name('project.ejecucion');
    Route::get('/admin/projects/finalizacion/{project?}', [ProjectController::class, 'finalizacion'])->name('project.finalizacion');

    //edit phases project

    Route::get('/admin/projects/identificacion/{project}/', [ProjectController::class, 'editidentificacion'])->name('project.editidentificacion');
    

    //save phases project
    Route::post('/admin/projects/saveidentificacion', [ProjectController::class, 'saveidentificacion'])->name('project.saveidentificacion');
    Route::post('/admin/projects/savepreparacion', [ProjectController::class, 'savepreparacion'])->name('project.savepreparacion');
    Route::post('/admin/projects/savecontratacion', [ProjectController::class, 'savecontratacion'])->name('project.savecontratacion');
    Route::post('/admin/projects/saveejecucion', [ProjectController::class, 'saveejecucion'])->name('project.saveejecucion');
    Route::post('/admin/projects/savefinalizacion', [ProjectController::class, 'savefinalizacion'])->name('project.savefinalizacion');

    //update phases project

    Route::post('/admin/projects/updateidentificacion/', [ProjectController::class, 'updateidentificacion'])->name('project.updateidentificacion');
    Route::post('/admin/projects/updatepreparacion/', [ProjectController::class, 'updatepreparacion'])->name('project.updatepreparacion');
    Route::post('/admin/projects/updatecontratacion/', [ProjectController::class, 'updatecontratacion'])->name('project.updatecontratacion');
    Route::post('/admin/projects/updateejecucion/', [ProjectController::class, 'updateejecucion'])->name('project.updateejecucion');
    Route::post('/admin/projects/updatefinalizacion/', [ProjectController::class, 'updatefinalizacion'])->name('project.updatefinalizacion');

    Route::delete('/admin/projects/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
  


   
    
    //Organizaciones
    Route::get('/admin/organizations/', [OrganizationsController::class, 'index'])->name('organizations.index');
    Route::get('/admin/organizations/create', [OrganizationsController::class, 'create'])->name('organizations.create');
    Route::get('/admin/organizations/edit/{organization}', [OrganizationsController::class, 'edit'])->name('organizations.edit');
   
    Route::post('/admin/organizations/', [OrganizationsController::class, 'store'])->name('organizations.store');
    Route::delete('/admin/organizations/{id}', [OrganizationsController::class, 'destroy'])->name('organizations.destroy');

    //Rol organization

    Route::get('/admin/organizations/createRol', [OrganizationsController::class, 'createRol'])->name('organizations.createRol');
    Route::post('/admin/organizations/storeRol', [OrganizationsController::class, 'storeRol'])->name('organizations.storeRol');

    require 'admin/users.php';

    //News
    require 'admin/news.php';



});