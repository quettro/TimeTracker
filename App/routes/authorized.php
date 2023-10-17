<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::group(
        [
            'as' => 'dashboard',
            'prefix' => 'dashboard',
            'controller' => \App\Http\Controllers\Authorized\DashboardController::class,
        ],
        function () {
            Route::match(['GET', 'HEAD'], '/', 'index');
        }
    );
});
