<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bo_contato_inicial', 1)->default('N')->nullable()->comment('TRUE INDICA QUE O CONTATO REALIZADO PARA DEFINIR DATA E HORA DA CONSULTA JÁ FOI REALIZADO');
            $table->string('bo_contato_final', 1)->default('N')->nullable()->comment('TRUE INDICA QUE O CONTATO TELEFÔNICO REALIZADO APÓS CONSULTA FOI REALIZADO');
            $table->string('te_ticket', 10)->nullable()->comment('TICKET QUE FOI GERADO NO MOMENTO DA VENDA DA CONSULTA');
            $table->timestamp('dt_consulta_primaria')->nullable()->comment('INDICA A DATA E A HORA QUE O PACIENTE DESEJA A CONSULTA');
            $table->timestamp('dt_consulta_secundaria')->nullable()->comment('SE A DATA E HORA DA PRIMEIRA CONSULTA NÃO ESTIVEREM DISPONÍVEIS SERÁ ADOTADA ESTA DATA E HORA');
            $table->string('bo_consulta_consumada', 1)->default('N')->nullable()->comment('TRUE SE A CONSULTA FOI REALIZADA');
            $table->string('te_observacoes', 100)->nullable();
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
        Schema::dropIfExists('agendamentos');
    }
}
