<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 150);
            $table->text('descricao')->nullable()->comment('DESCRIÇÃO DA ESPECIALIDADE');
            $table->timestamp('dt_pagamento')->comment('DATA DO PAGAMENTO');
            $table->string('tp_pagamento', 20)->comment('TIPO DE PAGAMENTO');
            $table->integer('boleto_id')->comment('NÚMERO DO BOLETO');
            $table->timestamp('created_at')->default(DB::raw('NOW()'));
            $table->timestamp('updated_at')->default(DB::raw('NOW()'));
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
