<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConsultaIdToAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('atendimentos', function (Blueprint $table) {
    		$table->integer('consulta_id')
    		->unsigned()
    		->nullable()
    		->after('ds_preco');
    		 
    		$table->foreign('consulta_id')->references('id')->on('consultas');
    	});
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('atendimentos', function (Blueprint $table) {
//     	    $table->dropForeign('procedimentos_tipoatendimento_id_foreign');
//     		$table->dropColumn('procedimento_id');
    	});
    }
}
