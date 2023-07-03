<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_currency',
        'to_currency',
        'amount',
        'converted_amount',
        'market',
    ];

    protected $casts = [
        'amount' => 'float',
        'converted_amount' => 'float',
    ];
}
