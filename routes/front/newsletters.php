<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\NewsletterController;

//savemailsubscriber
Route::post('/savemailsubscriber-user', [NewsletterController::class, 'savemailsubscriberf'])->name('savemailsubscriberf');
    
//Newsletter
Route::get('/events', [NewsletterController::class, 'eventos'])->name('eventos');
Route::get('/mostrar_dias', [NewsletterController::class, 'mostrar_dias'])->name('mostrar_dias');
Route::post('/mostrar_contenido', [NewsletterController::class, 'mostrar_contenido'])->name('mostrar_contenido');

Route::get('/newsletters', [NewsletterController::class, 'newsletters'])->name('newsletters');
Route::get('/newsletter-single/{id}', [NewsletterController::class, 'newsletter_single'])->name('newsletter-single');
Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');