<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\CorreoController;

//Events
Route::get('/admin/newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
Route::get('/admin/newsletter/create', [NewsletterController::class, 'create'])->name('newsletter.create');
Route::post('/admin/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');
Route::get('/admin/newsletter/show{event}', [NewsletterController::class, 'show'])->name('newsletter.show');
Route::get('/admin/newsletter/edit/{event}/', [NewsletterController::class, 'edit'])->name('newsletter.edit');
Route::put('/admin/newsletter/{event}', [NewsletterController::class, 'update'])->name('newsletter.update');
Route::delete('/admin/newsletter/{event}', [NewsletterController::class, 'destroy'])->name('newsletter.destroy');

Route::post('/admin/newsletter-correo', [CorreoController::class, 'store'])->name('newsletter.correo');
