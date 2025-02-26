<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WalletControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testTopUpSuccess()
    {
        $response = $this->postJson('/api/wallet/topup', [
            'driver_id' => 1,
            'amount' => 100
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Top-up successful',
                     'balance' => 100
                 ]);

        $this->assertDatabaseHas('wallets', [
            'driver_id' => 1,
            'balance' => 100
        ]);
    }

    public function testTopUpValidationFailure()
    {
        $response = $this->postJson('/api/wallet/topup', [
            'driver_id' => 'invalid', // Invalid driver_id
            'amount' => -10           // Invalid amount
        ]);

        $response->assertStatus(422); // Validation error
    }

    public function testCheckBalanceSuccess()
    {
        Wallet::create(['driver_id' => 1, 'balance' => 100]);

        $response = $this->getJson('/api/wallet/balance/1');

        $response->assertStatus(200)
                 ->assertJson([
                     'balance' => 100,
                     'status' => 'Can accept rides'
                 ]);
    }

    public function testCheckBalanceNotFound()
    {
        $response = $this->getJson('/api/wallet/balance/999');

        $response->assertStatus(404)
                 ->assertJson(['message' => 'Driver not found']);
    }
}
