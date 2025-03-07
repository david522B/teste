<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebProductsController;
use \App\Http\Controllers\Admin\AdminProductsController;
use \App\Http\Controllers\Admin\AdminCategoriesController;

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

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/logout', [AuthController::class, 'logout']);

Route::post('login', [AuthController::class, 'login']);

Route::group(['prefix' => 'web',  'as' => 'web.', 'middleware' => ['auth']], function () {
    Route::resource('products', WebProductsController::class)->only(['index', 'show']);
    
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::delete('products/excludeimage', [AdminProductsController::class, 'destroyImage']);
    Route::resource('products', AdminProductsController::class);
    Route::resource('categories', AdminCategoriesController::class)->except(['show']);
});
