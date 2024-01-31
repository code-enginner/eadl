<?php

use Illuminate\Support\Facades\Route;
use Modules\Service\Http\Controllers\ServiceController;

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

Route::resource('services', ServiceController::class);

Route::post('services/register', [ServiceController::class, 'registerInquiry'])->name('services.register');

Route::post('services/payment', [ServiceController::class, 'payment'])->name('services.payment');
