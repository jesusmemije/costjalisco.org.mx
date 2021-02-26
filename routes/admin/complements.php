<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ComplementsController;

//Events
// Route::get('/admin/events', [ComplementsController::class, 'index'])->name('events.index');
// Route::get('/admin/events/create', [ComplementsController::class, 'create'])->name('events.create');
// Route::post('/admin/events', [ComplementsController::class, 'store'])->name('events.store');
// Route::get('/admin/events/show{event}', [ComplementsController::class, 'show'])->name('events.show');
Route::get('/admin/complements/edit/', [ComplementsController::class, 'edit'])->name('complements.edit');
Route::put('/admin/complements/{id}', [ComplementsController::class, 'update'])->name('complements.update');
// Route::delete('/admin/events/{event}', [ComplementsController::class, 'destroy'])->name('events.destroy');