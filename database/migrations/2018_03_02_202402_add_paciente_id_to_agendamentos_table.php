<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPacienteIdToAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('agendamentos', function (Blueprint $table) {
    		$table->integer('paciente_id')
    		->unsigned()
    		->nullable()
    		->after('obs_cancelamento');
    		 
    		$table->foreign('paciente_id')->references('id')->on('pacientes');
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
    		$table->dropForeign('agendamentos_paciente_id_foreign');
    		$table->dropColumn('paciente_id');
    	});
    }
}
