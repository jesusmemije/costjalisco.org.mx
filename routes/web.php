<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

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

<<<<<<< HEAD
/*Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::resource('users', [DashboardController::class]);
});*/
=======
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('proyecto/', [DashboardController::class, 'viewProyecto'])->name('project.create');
    Route::post('saveP/', [DashboardController::class, 'saveP'])->name('project.save');
    Route::get('projectStatus/', [DashboardController::class, 'projectStatus'])->name('projectStatus');
});

//Route::resource('admin/proyecto','AdmiDashboardController');

//Route::resource('administador/proyectos','administrador\ProyectoController');

>>>>>>> b44e1230d3444a348d09a44e4d7815c7c6641057

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    //Dashboard
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');
    //Users
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/users/show{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/admin/users/edit/{user}/', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});
