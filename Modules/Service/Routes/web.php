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

//todo add auth middleware to all routes

Route::resource('services', ServiceController::class);

//show html form to get inquiry
Route::post('services/get/inquiry', [ServiceController::class, 'getInquiry'])->name('services.get.inquiry');

//Route::post('services/register', [ServiceController::class, 'registerInquiry'])->name('services.register');

//show html form with single input to payment
Route::get('services/payment/register/create', [ServiceController::class, 'paymentRegisterCreate'])->name('services.payment.register.create');

Route::post('services/payment/register/store', [ServiceController::class, 'paymentRegisterStore'])->name('services.payment.register.store');
