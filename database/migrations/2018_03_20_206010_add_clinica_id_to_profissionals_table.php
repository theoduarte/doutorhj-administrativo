<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClinicaIdToProfissionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('profissionals', function (Blueprint $table) {
    		$table->integer('clinica_id')
    		->unsigned()
    		->nullable()
    		->after('especialidade_id');
    		 
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
    	Schema::table('profissionals', function (Blueprint $table) {
    	    $table->dropForeign('profissionals_clinica_id_foreign');
    		$table->dropColumn('clinica_id');
    	});
    }
}
