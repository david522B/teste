<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    Route::get('home', [AuthController::class, 'home']);
    
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('home', [AuthController::class, 'home']);
    
});
