<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpendingController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/analyze', [SpendingController::class, 'analyze'])->name('analyze.spending');

use App\Http\Controllers\SaltEdgeController;

Route::get('/saltedge/customer', [SaltEdgeController::class, 'createCustomer']);
