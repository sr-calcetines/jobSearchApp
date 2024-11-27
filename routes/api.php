<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OfferController;

Route::get('/offers',[OfferController::class,'index'])->name('apihome');
Route::delete('/offers/{id}',[OfferController::class,'destroy'])->name('apidestroy');
