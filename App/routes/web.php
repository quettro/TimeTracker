<?php

use Illuminate\Support\Facades\Route;

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/authorized.php';

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/agreement', [\App\Http\Controllers\AgreementController::class, 'index'])->name('agreement');
