<?php

namespace App\Http\Controllers;

use App\Services\ExchangeService;
use App\Models\Exchange;
use Exception;
use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    public function getLimit(ExchangeService $exchangeService, $limit)
    {
        return $exchangeService->getLimit($limit);
    }

    public function makeOrder(ExchangeService $exchangeService, Request $request)
    {
        return $exchangeService->makeOrder($request->all());
    }

    public function stopLimit(ExchangeService $exchangeService, $id)
    {
        return $exchangeService->stopLimit($id);
    }

    public function calculateExchangeAmount(Request $request, ExchangeService $exchangeService)
    {
        $moedaCompra = $request->input('moeda_compra');
        $quantidadeCompra = $request->input('quantidade_compra');
        $precoCompra = $request->input('preco_compra');
        
        if (!$moedaCompra || !$quantidadeCompra || !$precoCompra) {
            throw new Exception("Parâmetros inválidos");
        }

        return $exchangeService->calculateExchangeAmount($moedaCompra, $quantidadeCompra, $precoCompra);
    }

    public function getExchangeById(Exchange $exchange)
    {
        // Aqui usamos a injeção de modelo (Model Binding) para obter uma instância do modelo Exchange.
        // O Laravel automaticamente buscará o Exchange com o ID fornecido na rota.
        return $exchange;
    }
}
