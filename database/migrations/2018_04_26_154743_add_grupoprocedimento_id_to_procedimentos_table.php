<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGrupoprocedimentoIdToProcedimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('procedimentos', function (Blueprint $table) {
    		$table->integer('grupoprocedimento_id')
    		->unsigned()
    		->nullable()
    		->after('tipoatendimento_id');
    	
    		$table->foreign('grupoprocedimento_id')->references('id')->on('grupo_procedimentos');
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
    		$table->dropForeign('procedimentos_grupoprocedimento_id_foreign');
    		$table->dropColumn('grupoprocedimento_id');
    	});
    }
}
