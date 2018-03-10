<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfissionalIdToAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('agendamentos', function (Blueprint $table) {
    		$table->integer('profissional_id')
    		->unsigned()
    		->nullable()
    		->after('te_observacoes');
    		 
    		$table->foreign('profissional_id')->references('id')->on('profissionals');
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
    		$table->dropForeign('agendamentos_profissional_id_foreign');
    		$table->dropColumn('profissional_id');
    	});
    }
}
