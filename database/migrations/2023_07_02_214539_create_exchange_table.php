<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangesTable extends Migration
{
    public function up()
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->id();
            $table->string('moeda_compra');
            $table->decimal('preco_compra', 18, 8);
            $table->decimal('quantidade_compra', 81, 8);
            $table->string('moeda_venda');
            $table->decimal('preco_venda', 17, 8);
            $table->decimal('quantidade_venda', 18, 8);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exchanges');
    }
}
