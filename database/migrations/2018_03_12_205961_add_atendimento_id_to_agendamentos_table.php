<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAtendimentoIdToAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('agendamentos', function (Blueprint $table) {
    		$table->integer('atendimento_id')
    		->unsigned()
    		->nullable()
    		->after('profissional_id');
    		 
    		$table->foreign('atendimento_id')->references('id')->on('atendimentos');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('agendamentos', function (Blueprint $table) {
    		$table->dropForeign('agendamentos_atendimento_id_foreign');
    		$table->dropColumn('atendimento_id');
    	});
    }
}
