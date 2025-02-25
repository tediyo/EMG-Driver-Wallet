<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'wallets';

    // Define the columns that are mass assignable
    protected $fillable = ['driver_id', 'balance'];

    // If you're using timestamps (created_at, updated_at)
    public $timestamps = true;
}
