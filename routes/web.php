<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [OfferController::class, 'index'])->name('home');
