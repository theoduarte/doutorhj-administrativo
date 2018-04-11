<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfissionalIdToAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('atendimentos', function (Blueprint $table) {
    		$table->integer('profissional_id')
    		->unsigned()
    		->nullable()
    		->after('clinica_id');
    		 
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
    	Schema::table('atendimentos', function (Blueprint $table) {
    	    $table->dropForeign('atendimentos_profissional_id_foreign');
    		$table->dropColumn('profissional_id');
    	});
    }
}
