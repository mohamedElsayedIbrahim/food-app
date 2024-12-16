<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

Route::middleware('auth:api')->group(function(){
    Route::resource('orders',OrderController::class);
    Route::post('logout',[UserController::class,'logout']);
});

Route::resource('products',ProductController::class);
Route::post('login',[UserController::class,'login']);
Route::post('signup',[UserController::class,'signup']);
