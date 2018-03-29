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
            $table->string('te_ticket', 10)->comment('TICKET QUE FOI GERADO NO MOMENTO DA VENDA DA CONSULTA');
            $table->timestamp('dt_atendimento')->nullable()->comment('POSSÍVEL DATA HORA PARA CONSULTA');
            $table->timestamp('dt_consulta1')->comment('POSSÍVEL DATA HORA PARA CONSULTA');
            $table->timestamp('dt_consulta2')->comment('POSSÍVEL DATA HORA PARA CONSULTA');
            $table->timestamp('dt_consulta3')->comment('POSSÍVEL DATA HORA PARA CONSULTA');
            $table->string('obs_agendamento', 400)->nullable()->comment('Observações sobre o agendamento.');
            $table->string('obs_cancelamento', 400)->nullable()->comment('Observações sobre o cancelamento.');
            $table->integer('cs_status')->unsigned()->comment('10=>Pré-Agendado 20=>Confirmado 30=>Não Confirmado 40=>Finalizado 50=>Não Compareceu 60=>Cancelado');
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
