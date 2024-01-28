<?php

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

/*Route::prefix('storefront')->group(function() {
    Route::get('/', 'StorefrontController@index');
});*/


use Modules\Storefront\Http\Controllers\StorefrontController;

Route::get('/', [StorefrontController::class, 'index']);