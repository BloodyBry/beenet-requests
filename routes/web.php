<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuoteRequestController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\ContactController;


Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/demande-devis', [QuoteRequestController::class, 'create'])->name('quote.create');
Route::post('/demande-devis', [QuoteRequestController::class, 'store'])->name('quote.store');

Route::get('/demande-service', [ServiceRequestController::class, 'create'])->name('service.create');
Route::post('/demande-service', [ServiceRequestController::class, 'store'])->name('service.store');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');