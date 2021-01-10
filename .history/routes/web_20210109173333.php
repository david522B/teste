<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Web\ProductsController as WebProducts;
use \App\Http\Controllers\AdminProductsController;
use \App\Http\Controllers\AdminCategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'showLoginForm']);

Route::post('login', [AuthController::class, 'login']);

Route::group(['prefix' => 'web', 'namespace' => 'Web', 'as' => 'web.', 'middleware' => ['auth']], function () {
    Route::get('products', [WebProducts::class, 'index'])->name('products');
    
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    
    Route::resource('products', AdminProductsController::class);
    Route::resource('categories', AdminCategoriesController::class)->except([
        ''''
    ]);
});
