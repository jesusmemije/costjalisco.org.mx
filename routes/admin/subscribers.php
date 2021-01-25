<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsletterController as AdminNewsletterController;

//Subscribers
Route::get('/admin/mailsubscriber', [AdminNewsletterController::class, 'mailsubscriber'])->name('mailsubscriber');
Route::post('/admin/savemailsubscriber', [AdminNewsletterController::class, 'savemailsubscriber'])->name('savemailsubscriber');
Route::post('/admin/destroymailsubscriber', [AdminNewsletterController::class, 'destroymailsubscriber'])->name('destroymailsubscriber');