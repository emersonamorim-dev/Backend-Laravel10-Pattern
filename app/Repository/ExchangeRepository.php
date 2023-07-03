<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Exchange;
use Illuminate\Database\Eloquent\Model;

class ExchangeRepository extends AbstractRepository
{
    protected static $model = Exchange::class;

    public static function getExchangesOrderedByPrice($limit)
    {
        return self::getOrderedByColumn('preco_compra', $limit, ['moeda_compra', 'preco_compra', 'quantidade_compra', 'moeda_venda', 'preco_venda', 'quantidade_venda']);
    }

    public static function stopExchangeOrder(Model $exchange): Model
    {
        $exchange->status = 'stopped';
        $exchange->stopped_at = now();
        self::save($exchange);
        return $exchange;
    }
}
