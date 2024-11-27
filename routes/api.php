<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OfferController;

Route::get('/offers',[OfferController::class,'index'])->name('apihome');
Route::delete('/offers/{id}',[OfferController::class,'destroy'])->name('apidestroy');
Route::post('/offers', [OfferController::class, 'store'])->name('apistore');
Route::put('/offers/{id}', [OfferController::class, 'update'])->name('apiupdate');
Route::get('/offers/{id}',[OfferController::class, 'show'])->name('apishow');
