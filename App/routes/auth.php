<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\ForgotYourPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [
        RegisterController::class, 'create'
    ])->name('register');

    Route::post('register', [
        RegisterController::class, 'store'
    ]);

    Route::get('login', [
        LoginController::class, 'create'
    ])->name('login');

    Route::post('login', [
        LoginController::class, 'store'
    ]);

    Route::get('forgot-your-password', [
        ForgotYourPasswordController::class, 'create'
    ])->name('password.request');

    Route::post('forgot-your-password', [
        ForgotYourPasswordController::class, 'store'
    ])->name('password.email');

    Route::get('reset-password/{token}', [
        NewPasswordController::class, 'create'
    ])->name('password.reset');

    Route::post('reset-password', [
        NewPasswordController::class, 'store'
    ])->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email/{id}/{hash}', [
        VerifyEmailController::class, '__invoke'
    ])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

    Route::post('email/verification-notification', [
        EmailVerificationNotificationController::class, 'store'
    ])->middleware('throttle:6,1')->name('verification.send');

    Route::post('logout', [
        LoginController::class, 'destroy'
    ])->name('logout');
});
