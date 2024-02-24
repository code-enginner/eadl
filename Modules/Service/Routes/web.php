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
Route::prefix('services')->group(function () {
    Route::post('get/inquiry', [ServiceController::class, 'getOTPCode'])->name('services.get.otp.code');

    //show html form with single input to payment
    Route::get('payment/register/create', [ServiceController::class, 'paymentRegisterCreate'])->name('services.payment.register.create');

    Route::post('payment/register/store', [ServiceController::class, 'paymentRegisterStore'])->name('services.payment.register.store');



    Route::prefix('confirmation')->group(function () {
        Route::post('store', [ServiceController::class, 'confirmationStore'])->name('confirmation.store');
    });
});

