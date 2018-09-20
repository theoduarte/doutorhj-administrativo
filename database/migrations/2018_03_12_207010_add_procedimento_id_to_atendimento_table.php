<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClinicaIdToAtendimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('atendimentos', function (Blueprint $table) {
    		$table->integer('clinica_id')
    		->unsigned()
    		->nullable()
    		->after('ds_preco');
    		
    		$table->foreign('clinica_id')->references('id')->on('clinicas');
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
    	    $table->dropForeign('atendimentos_clinica_id_foreign');
    		$table->dropColumn('clinica_id');
    	});
    }
}
