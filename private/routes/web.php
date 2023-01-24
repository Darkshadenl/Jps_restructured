<?php

use App\Http\Controllers\OfferController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NieuwsController;
use App\Http\Controllers\OverOnsController;
use App\Http\Controllers\TransactieController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/aanbod', [OfferController::class, 'index'])->name('offer');
Route::get('/aanbod/{id}', [OfferController::class, 'getBrochure'])->name('getBrochure');

Route::get('/transacties', [TransactieController::class, 'index'])->name('transactions');
Route::get('/over-ons', [OverOnsController::class, 'index'])->name('about_us');
Route::get('/privacy', [OverOnsController::class, 'privacy'])->name('privacy');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/nieuws', [NieuwsController::class, 'index'])->name('news');

Route::post('/', [HomeController::class, 'contact'])->name('home.contact');
