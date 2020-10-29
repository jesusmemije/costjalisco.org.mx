<?php

use Illuminate\Support\Facades\Route;

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
<<<<<<< Updated upstream
=======

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('proyecto/', [DashboardController::class, 'viewProyecto'])->name('project.create');
    Route::post('saveP/', [DashboardController::class, 'saveP'])->name('project.save');
    Route::get('formwizard/', [DashboardController::class, 'formwizard'])->name('formwizard');
});

//Route::resource('admin/proyecto','AdmiDashboardController');

//Route::resource('administador/proyectos','administrador\ProyectoController');


>>>>>>> Stashed changes
