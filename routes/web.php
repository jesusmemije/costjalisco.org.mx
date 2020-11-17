<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\OrganizationsController;


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
    
    //Sectores/Subsectores
    Route::get('/admin/project/sectores', [ProjectController::class, 'cat_sectores'])->name('project.cat_sectores');

    Route::post('/admin/project/getdatafromnamesector', [ProjectController::class, 'getdatafromnamesector'])->name('project.getdatafromnamesector');
    Route::post('/admin/project/saveprojecttype', [ProjectController::class, 'saveprojecttype'])->name('project.saveprojecttype');
    Route::post('/admin/project/saveestudioAmbiental', [ProjectController::class, 'saveestudioAmbiental'])->name('project.saveestudioAmbiental');
    Route::post('/admin/project/savesector', [ProjectController::class, 'savesector'])->name('project.savesector');
    Route::post('/admin/project/deletesector', [ProjectController::class, 'deletesector'])->name('project.deletesector');
    Route::post('/admin/project/deletesubsector', [ProjectController::class, 'deletesubsector'])->name('project.deletesubsector');
    Route::post('/admin/project/editsector', [ProjectController::class, 'editsector'])->name('project.editsector');
    Route::post('/admin/project/editsubsector', [ProjectController::class, 'editsubsector'])->name('project.editsubsector');
    Route::post('/admin/project/savesubsector', [ProjectController::class, 'savesubsector'])->name('project.savesubsector');
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
  
    Route::post('/admin/projects/subsectores', [ProjectController::class, 'subsectores'])->name('project.subsec');

    
    //Organizaciones
    Route::get('/admin/organizations/', [OrganizationsController::class, 'index'])->name('organizations.index');
    Route::get('/admin/organizations/create', [OrganizationsController::class, 'create'])->name('organizations.create');
    Route::get('/admin/organizations/edit/{organization}', [OrganizationsController::class, 'edit'])->name('organizations.edit');
   
    Route::post('/admin/organizations/', [OrganizationsController::class, 'store'])->name('organizations.store');
    Route::delete('/admin/organizations/{id}', [OrganizationsController::class, 'destroy'])->name('organizations.destroy');

    //Rol organization

    Route::get('/admin/organizations/createRol', [OrganizationsController::class, 'createRol'])->name('organizations.createRol');
    Route::post('/admin/organizations/storeRol', [OrganizationsController::class, 'storeRol'])->name('organizations.storeRol');


    //Users
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/users/show{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/admin/users/edit/{user}/', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/admin/test', function () {
        return view('admin.projects.proyecto');
    });
=======
>>>>>>> Stashed changes
    require 'admin/users.php';

    //News
    require 'admin/news.php';
<<<<<<< Updated upstream
=======
>>>>>>> fa1e4cd9412c8616cbabe19008abea6c702c37e6
>>>>>>> Stashed changes

});