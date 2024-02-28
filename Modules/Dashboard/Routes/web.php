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
use Modules\Dashboard\Http\Controllers\DashboardController;


Route::get('auth/{office?}/{ver_code?}/{nc?}', [DashboardController::class, 'auth']);

//Route::prefix('panel')->group(function () {

//    Route::get('auth/{office?}/{ver_code?}/{nc?}', [DashboardController::class, 'auth'])->name('auth');


    //show first form to choose fo to inquiry
    Route::get('/', [DashboardController::class, 'index'])->name('panel');

//});

