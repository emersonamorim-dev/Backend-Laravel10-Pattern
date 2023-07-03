<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;

    protected $fillable = [
        'moeda_compra',
        'preco_compra',
        'quantidade_compra',
        'moeda_venda',
        'preco_venda',
        'quantidade_venda',
    ];

    protected $casts = [
        'preco_compra' => 'float',
        'quantidade_compra' => 'float',
        'preco_venda' => 'float',
        'quantidade_venda' => 'float',
    ];
}
