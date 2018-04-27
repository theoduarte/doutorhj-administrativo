<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipoAtendimentoIdToConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('consultas', function (Blueprint $table) {
    		$table->integer('tipoatendimento_id')
    		->unsigned()
    		->nullable()
    		->after('ds_consulta');
    		 
    		$table->foreign('tipoatendimento_id')->references('id')->on('atendimentos');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('consultas', function (Blueprint $table) {
    		$table->dropForeign('consultas_tipoatendimento_id_foreign');
    		$table->dropColumn('tipoatendimento_id');
    	});
    }
}
