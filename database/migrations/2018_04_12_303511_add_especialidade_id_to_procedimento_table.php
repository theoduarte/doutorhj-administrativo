<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEspecialidadeIdToProcedimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('procedimentos', function (Blueprint $table) {
    		$table->integer('especialidade_id')
    		->unsigned()
    		->nullable()
    		->after('ds_procedimento');
    		 
    		$table->foreign('especialidade_id')->references('id')->on('especialidades');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('procedimentos', function (Blueprint $table) {
    		$table->dropForeign('procedimentos_especialidade_id_foreign');
    		$table->dropColumn('especialidade_id');
    	});
    }
}
