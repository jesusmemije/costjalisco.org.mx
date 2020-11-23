<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventController;

//Events
Route::get('/admin/events', [EventController::class, 'index'])->name('events.index');
Route::get('/admin/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/admin/events', [EventController::class, 'store'])->name('events.store');
Route::get('/admin/events/show{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/admin/events/edit/{event}/', [EventController::class, 'edit'])->name('events.edit');
Route::put('/admin/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/admin/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');