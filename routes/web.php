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
    Route::get('/admin/project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/admin/project/', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/admin/project/test', [ProjectController::class, 'test'])->name('project.test');
    Route::delete('/admin/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
  //  Route::get('/admin/project/{id}', [ProjectController::class, 'testDestroy'])->name('project.testDestroy');
  

    //Organizaciones
    Route::get('/admin/organizations/', [OrganizationsController::class, 'index'])->name('organizations.index');
    Route::get('/admin/organizations/create', [OrganizationsController::class, 'create'])->name('organizations.create');
    Route::get('/admin/organizations/createRol', [OrganizationsController::class, 'createRol'])->name('organizations.createRol');
    Route::post('/admin/organizations/', [OrganizationsController::class, 'store'])->name('organizations.store');
    Route::delete('/admin/organizations/{id}', [OrganizationsController::class, 'destroy'])->name('organizations.destroy');

    //Users
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/users/show{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/admin/users/edit/{user}/', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});