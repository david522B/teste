<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Products;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiProductsController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'showLoginForm']);

Route::get('products', [ApiProductsController::class, 'index']);
Route::get('products/{id}', [ApiProductsController::class, 'show']);
Route::post('products', [ApiProductsController::class, 'store']);
Route::put('products/{id}', [ApiProductsController::class, 'update']);
Route::delete('products/{id}', [ApiProductsController::class, 'delete']);