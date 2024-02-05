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

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Dashboard\Http\Controllers\DashboardController;

Route::prefix('panel')->group(function () {

    //show first form to choose fo to inquiry
    Route::get('/', [DashboardController::class, 'index'])->name('panel');

});
