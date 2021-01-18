<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrganizationsController;

//Organizaciones
Route::middleware(['knowroute'])->group(function () {
    Route::get('/admin/organizations/', [OrganizationsController::class, 'index'])->name('organizations.index');
    Route::get('/admin/organizations/create', [OrganizationsController::class, 'create'])->name('organizations.create');
    Route::get('/admin/organizations/edit/{organization}', [OrganizationsController::class, 'edit'])->name('organizations.edit');
    Route::post('/admin/organizations/update/', [OrganizationsController::class, 'update'])->name('organizations.update');

    Route::post('/admin/organizations/', [OrganizationsController::class, 'store'])->name('organizations.store');
    Route::delete('/admin/organizations/{id}', [OrganizationsController::class, 'destroy'])->name('organizations.destroy');

    //Rol organization
    Route::get('/admin/organizations/createRol', [OrganizationsController::class, 'createRol'])->name('organizations.createRol');
    Route::post('/admin/organizations/storeRol', [OrganizationsController::class, 'storeRol'])->name('organizations.storeRol');
    Route::post('/admin/organizations/updateRol/', [OrganizationsController::class, 'updateRol'])->name('organizations.updateRol');
    Route::post('/admin/organizations/destroyRol/', [OrganizationsController::class, 'destroyRol'])->name('organizations.destroyRol');
});
