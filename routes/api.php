<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\SecondLargestController;

Route::post('/second-largest', [SecondLargestController::class, 'getSecondLargest']);// For algorithm challenge


Route::post('/wallet/topup', [WalletController::class, 'topUp']);
Route::get('/wallet/balance/{driver_id}', [WalletController::class, 'checkBalance']);
