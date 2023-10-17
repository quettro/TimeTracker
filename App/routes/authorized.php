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

    Route::group(
        [
            'as' => 'project.',
            'prefix' => 'project',
            'controller' => \App\Http\Controllers\Authorized\ProjectController::class,
        ],
        function () {
            Route::match(['GET', 'HEAD'], '/', 'index')->name('index');
            Route::match(['GET', 'HEAD'], '/create', 'create')->name('create');
            Route::match(['POST'], '/', 'store')->name('store');

            Route::group(
                [
                    'prefix' => '{project:r}',
                ],
                function () {
                    Route::match(['GET', 'HEAD'], '/', 'show')->name('show');
                    Route::match(['GET', 'HEAD'], '/edit', 'edit')->name('edit');
                    Route::match(['PUT', 'PATCH'], '/', 'update')->name('update');
                    Route::match(['DELETE'], '/', 'destroy')->name('destroy');
                }
            );
        }
    );
});