<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Exchange;
use Exception;
use Carbon\Carbon;

class ExchangeService
{
    public int $limitPerQuery = 5;

    public function __construct(){
        $this->limitPerQuery = 10;
    }

    public function getLimit($limit)
    {
        $exchanges = Exchange::query()
            ->orderBy('preco_compra')
            ->limit($limit)
            ->get(['moeda_compra', 'preco_compra', 'quantidade_compra', 'moeda_venda', 'preco_venda', 'quantidade_venda']);

        return $exchanges;
    }

    public function makeOrder($data)
    {
        return Exchange::create($data);
    }

    public function stopLimit($id)
    {
        $exchange = Exchange::find($id);
        if (!$exchange) {
            throw new Exception("Exchange order not found");
        }

        // Implementar a lógica para parar a ordem
        $exchange->status = 'stopped';
        $exchange->stopped_at = Carbon::now(); // usando Carbon
        $exchange->save();

        return $exchange;
    }

    public function calculateExchangeAmount($moedaCompra, $quantidadeCompra, $precoCompra)
    {
        try {
            // Lógica para calcular o montante da troca
            $montante = $quantidadeCompra * $precoCompra;

            // Registrar esta troca no banco de dados usando o Model Exchange
            $exchange = new Exchange();
            $exchange->moeda_compra = $moedaCompra;
            $exchange->quantidade_compra = $quantidadeCompra;
            $exchange->preco_compra = $precoCompra;
            $exchange->save();

            // Retorna o montante calculado
            return [
                "moeda_compra" => $moedaCompra,
                "quantidade_compra" => $quantidadeCompra,
                "preco_compra" => $precoCompra,
                "montante" => $montante
            ];

        } catch (Exception $e) {
            // Log the error message
            return [
                "message" => "Error calculating exchange amount"
            ];
        }
    }
}