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

/*Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::resource('users', [DashboardController::class]);
});*/

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    //Dashboard
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

    //Projects
    Route::get('admin/proyecto', [DashboardController::class, 'viewProyecto'])->name('project.create');
    Route::post('admin/saveP', [DashboardController::class, 'saveP'])->name('project.save');
    Route::get('admin/projectStatus', [DashboardController::class, 'projectStatus'])->name('projectStatus');

    //Users
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/users/show{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/admin/users/edit/{user}/', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});
