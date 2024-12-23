<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ApiAuthindiction;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(ApiAuthindiction::class)->group(function(){
    Route::resource('orders',OrderController::class);
    Route::post('logout',[UserController::class,'logout']);
});

Route::resource('products',ProductController::class);
Route::resource('category',CategoryController::class);
Route::post('login',[UserController::class,'login']);
Route::post('signup',[UserController::class,'signup']);
