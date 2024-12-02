<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfferController;


Route::get('/', [OfferController::class, 'index'])->name('home');
Route::get('/show/{id}', [OfferController::class, 'show'])->name('show');

Route::get('/create', [OfferController::class, 'create'])->name('create');
Route::post('/store', [OfferController::class, 'store'])->name('store');

Route::get('/edit/{id}', [OfferController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [OfferController::class, 'update'])->name('update');

Route::delete('/destroy/{id}', [OfferController::class, 'destroy'])->name('destroy');