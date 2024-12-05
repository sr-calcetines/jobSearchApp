<?php

use App\Http\Controllers\Api\FollowController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OfferController;

Route::get('/offers',[OfferController::class,'index'])->name('apihome');
Route::delete('/offers/{id}',[OfferController::class,'destroy'])->name('apidestroy');
Route::post('/offers', [OfferController::class, 'store'])->name('apistore');
Route::put('/offers/{id}', [OfferController::class, 'update'])->name('apiupdate');
Route::get('/offers/{id}',[OfferController::class, 'show'])->name('apishow');

Route::post('/offers/{offerId}/follows',[FollowController::class,'store'])->name('apistorefollow');