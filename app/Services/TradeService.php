<?php

namespace App\Services;

use App\Models\Trade;
use Exception;

class TradeService
{
    public function convertCurrency($fromCurrency, $toCurrency, $amount, $market)
    {
        try {
 
            // Aqui você deve levar em consideração o mercado selecionado (Spot ou Fundos)
            $conversionRate = $this->getConversionRate($fromCurrency, $toCurrency, $market);

            // Calculando o montante convertido
            $convertedAmount = $amount * $conversionRate;

            // Salve o trade no banco de dados
            $trade = new Trade();
            $trade->from_currency = $fromCurrency;
            $trade->to_currency = $toCurrency;
            $trade->amount = $amount;
            $trade->converted_amount = $convertedAmount;
            $trade->market = $market;
            $trade->save();

            return $trade;

        } catch (Exception $e) {
            // Trate os erros adequadamente
            return [
                "message" => "Erro ao converter moeda: " . $e->getMessage()
            ];
        }
    }

    private function getConversionRate($fromCurrency, $toCurrency, $market)
    {
        // Dummy: taxa de conversão fictícia
        // Na prática, você deve buscar essa taxa de uma fonte confiável.
        $rate = 1;

        // Aqui para modificar a taxa de conversão com base no mercado selecionado (Spot ou Fundos).
        switch ($market) {
            case 'Spot':

                $rate *= 1.01; // Acréscimo de 1% para o exemplo
                break;
            case 'Fundos':

                $rate *= 1.02; // Acréscimo de 2% para o exemplo
                break;
        }

        return $rate;
    }
}