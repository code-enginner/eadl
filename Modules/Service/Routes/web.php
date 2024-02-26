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


/*** اعتبار معاملاتی ***/
Route::prefix('certificate')->group(function () {
    Route::post('get/inquiry', [ServiceController::class, 'getOTPCode'])->name('certificate.get.otp.code');

    Route::post('payment/register/store', [ServiceController::class, 'paymentRegisterStore'])->name('certificate.register.store');

    Route::prefix('confirmation')->group(function () {
        Route::post('store', [ServiceController::class, 'confirmationStore'])->name('confirmation.store');
    });
});


/*** تصدیق گواهی سوء پیشینه ***/
Route::prefix('background')->group(function () {
    Route::post('store', [ServiceController::class, 'backgroundStore'])->name('background.store');
});

