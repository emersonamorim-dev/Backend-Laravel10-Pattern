<?php

namespace App\Http\Controllers;

use App\Services\TradeService;
use App\Models\Trade;
use Exception;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    public function convertCurrency(TradeService $tradeService, Request $request)
    {
        $fromCurrency = $request->input('from_currency');
        $toCurrency = $request->input('to_currency');
        $amount = $request->input('amount');
        $market = $request->input('market'); // pode ser 'Spot' ou 'Fundos'
        
        if (!$fromCurrency || !$toCurrency || !$amount || !$market) {
            throw new Exception("Parâmetros inválidos");
        }

        return $tradeService->convertCurrency($fromCurrency, $toCurrency, $amount, $market);
    }

    public function getTradeById($id)
    {
        // Utilizei o Model buscar um trade por ID
        $trade = Trade::find($id);

        if (!$trade) {
            return response()->json(['message' => 'Trade not found'], 404);
        }

        return response()->json($trade);
    }
}