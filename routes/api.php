<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [\App\Http\Controllers\Api\V1\Auth\LoginController::class, 'login']);
Route::post('register', [\App\Http\Controllers\Api\V1\Auth\RegisterController::class, 'register']);

Route::prefix('v1')->middleware(['auth:sanctum'])->group(function () {
    Route::prefix('admin')->middleware(['role:admin'])->group(function () {
        Route::apiResource('category', \App\Http\Controllers\Api\V1\Admin\CategoryController::class);
        Route::apiResource('product', \App\Http\Controllers\Api\V1\Admin\ProductController::class);
        Route::apiResource('area', \App\Http\Controllers\Api\V1\Admin\AreaController::class);
        Route::apiResource('driver', \App\Http\Controllers\Api\V1\Admin\DriverController::class);

   });

});
