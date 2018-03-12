<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipoAtendimentoIdToProcedimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('procedimentos', function (Blueprint $table) {
    		$table->integer('tipoatendimento_id')
    		->unsigned()
    		->nullable()
    		->after('ds_procedimento');
    		 
    		$table->foreign('tipoatendimento_id')->references('id')->on('tipoatendimento');
    	});
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('users', function (Blueprint $table) {
    		$table->dropForeign('procedimentos_tipoatendimento_id_foreign');
    		$table->dropColumn('tipoatendimento_id');
    	});
    }
}
