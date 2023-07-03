<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Trade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class TradeRepository extends AbstractRepository
{
    // Definindo o modelo para o repositório
    protected static $model = Trade::class;

    // Função para salvar um novo trade no banco de dados
    public static function saveTrade(array $attributes): Model
    {
        return self::create($attributes);
    }

    // Função para obter um trade por seu ID
    public static function getTradeById(int $id): ?Model
    {
        return self::find($id);
    }

    // Função para obter todos os trades ordenados pelo valor convertido
    public static function getTradesOrderedByConvertedAmount($limit): Collection
    {
        return self::getOrderedByColumn('converted_amount', $limit, ['from_currency', 'to_currency', 'amount', 'converted_amount', 'market']);
    }
}