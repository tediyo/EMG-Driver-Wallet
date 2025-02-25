<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalletController;

Route::post('/wallet/topup', [WalletController::class, 'topUp']);
Route::get('/wallet/balance/{driver_id}', [WalletController::class, 'checkBalance']);
