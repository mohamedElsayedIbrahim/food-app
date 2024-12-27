<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminAuth;
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

    Route::middleware(AdminAuth::class)->group(function() {
        Route::get('users',[UserController::class,'index']);
        Route::post('users/create',[UserController::class,'store']);
        Route::put('users/{user}',[UserController::class,'update']);
        Route::delete('users/{user}',[UserController::class,'destory']);
        
        Route::post('admin/product/{product}/update',[ProductController::class,'update']);
        Route::resource('admin/product',ProductController::class);
        Route::resource('admin/category',CategoryController::class);
    });

    

});


Route::get('category',[CategoryController::class,'index_site']);
Route::get('products/{product}',[ProductController::class,'show']);
Route::post('login',[UserController::class,'login']);
Route::post('signup',[UserController::class,'signup']);
