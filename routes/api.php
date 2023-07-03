<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

//Rotas Exchange    
Route::get('/exchange/limit/{limit}', [ExchangeController::class, 'getLimit']);

Route::post('/exchange/make-order', [ExchangeController::class, 'makeOrder']);

Route::put('/exchange/stop-limit/{id}', [ExchangeController::class, 'stopLimit']);

Route::post('/exchange/calculate', [ExchangeController::class, 'calculateExchangeAmount']);

Route::get('/exchange/{exchange}', [ExchangeController::class, 'getExchangeById']);

//Rotas Trade
// Route for converting currency
Route::post('/trade/convert', [TradeController::class, 'convertCurrency']);

// Route for getting a trade by ID
Route::get('/trade/{id}', [TradeController::class, 'getTradeById']);

});
