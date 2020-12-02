<?php
use Illuminate\Support\Facades\Route;

//Class Front
use App\Http\Controllers\Front\HomeController;

//Class Admin
use App\Http\Controllers\Admin\Catalogs\AdjudicationController;
use App\Http\Controllers\Admin\Catalogs\ContractingController;
use App\Http\Controllers\Admin\Catalogs\ContractingStatusController;
use App\Http\Controllers\Admin\Catalogs\ContractTypeController;
use App\Http\Controllers\Admin\Catalogs\DocumentTypeController;
use App\Http\Controllers\Admin\Catalogs\ProjectTypeController;
use App\Http\Controllers\Admin\Catalogs\ResourceController;
use App\Http\Controllers\Admin\CatalogsController;
use App\Http\Controllers\Admin\DashboardController;
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

Route::namespace('Front')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/know-more', [HomeController::class, 'know_more'])->name('home.know-more');
    Route::get('/about-us', [HomeController::class, 'about_us'])->name('home.about-us');
    Route::get('/resources', [HomeController::class, 'resources'])->name('home.resources');

    Route::get('project', [HomeController::class, 'specific_project'])->name('home.specific_project');
    
     Route::get('account', [HomeController::class, 'account'])->name('home.account');    
     Route::get('organizations', [HomeController::class, 'organizations'])->name('home.organizations');
     Route::get('contact-us', [HomeController::class, 'contactus'])->name('home.contactus');
     Route::get('newsletters', [HomeController::class, 'newsletters'])->name('home.newsletters');
     


});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //Dashboard
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

    //Projects
    Route::get('/admin/projects/', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/admin/projects/', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/admin/projects/test', [ProjectController::class, 'test'])->name('project.test');
    
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
    
    //Routes projec type
    Route::resource('/admin/catalogs/projecttype',ProjectTypeController::class);
    //Routes origin resource
    Route::resource('/admin/catalogs/resource',ResourceController::class);
    //Routes adjudication
    Route::resource('/admin/catalogs/adjudication',AdjudicationController::class);
    //Routes contract type    
    Route::resource('/admin/catalogs/contracttype',ContractTypeController::class);
    //Routes mod contract
    Route::resource('/admin/catalogs/contracting',ContractingController::class);
    //Routes contract status 
    Route::resource('/admin/catalogs/contractstatus',ContractingStatusController::class);
    //Routes document type
    Route::resource('/admin/catalogs/documenttype',DocumentTypeController::class);

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
    Route::post('/admin/projects/savegeneraldata/', [ProjectController::class, 'savegeneraldata'])->name('project.savegeneraldata');
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
  


   //delete project documents
   Route::post('/admin/projects/deletedocument/', [ProjectController::class, 'deletedocument'])->name('project.deletedocument');

    
    //Organizaciones
    Route::get('/admin/organizations/', [OrganizationsController::class, 'index'])->name('organizations.index');
    Route::get('/admin/organizations/create', [OrganizationsController::class, 'create'])->name('organizations.create');
    Route::get('/admin/organizations/edit/{organization}', [OrganizationsController::class, 'edit'])->name('organizations.edit');
    Route::post('/admin/organizations/update/', [OrganizationsController::class, 'update'])->name('organizations.update');
   
    Route::post('/admin/organizations/', [OrganizationsController::class, 'store'])->name('organizations.store');
    Route::delete('/admin/organizations/{id}', [OrganizationsController::class, 'destroy'])->name('organizations.destroy');

    //Rol organization
    Route::get('/admin/organizations/createRol', [OrganizationsController::class, 'createRol'])->name('organizations.createRol');
    Route::post('/admin/organizations/storeRol', [OrganizationsController::class, 'storeRol'])->name('organizations.storeRol');

    //Routes Users
    require 'admin/users.php';

    //Routes News
    require 'admin/news.php';

    //Routes Events
    require 'admin/events.php';

    //Uploads images the CKEditor
    Route::post('/ckeditor/image_upload', [CKEditorController::class, 'upload'])->name('upload');

});