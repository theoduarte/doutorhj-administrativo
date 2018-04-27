<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProcedimentoIdToAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('atendimentos', function (Blueprint $table) {
    		$table->integer('procedimento_id')
    		->unsigned()
    		->nullable()
    		->after('ds_preco');
    		 
    		$table->foreign('procedimento_id')->references('id')->on('procedimentos');
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
    	    $table->dropForeign('atendimentos_procedimento_id_foreign');
    		$table->dropColumn('procedimento_id');
    	});
    }
}
