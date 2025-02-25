<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    public function topUp(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'driver_id' => 'required|integer',
            'amount' => 'required|numeric|min:1',
        ]);

        DB::beginTransaction();
        try {
            // Check if wallet exists for the driver, else create one
            $wallet = Wallet::firstOrCreate(['driver_id' => $request->driver_id]);
            $wallet->balance += $request->amount;
            $wallet->save();

            DB::commit();
            return response()->json(['message' => 'Top-up successful', 'balance' => $wallet->balance], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Top-up failed', 'message' => $e->getMessage()], 500);
        }
    }

    public function checkBalance($driver_id)
    {
        $wallet = Wallet::where('driver_id', $driver_id)->first();

        if (!$wallet) {
            return response()->json(['message' => 'Driver not found'], 404);
        }

        $status = $wallet->balance >= 50 ? "Can accept rides" : "Insufficient balance, please top up";
        return response()->json(['balance' => $wallet->balance, 'status' => $status], 200);
    }
}
