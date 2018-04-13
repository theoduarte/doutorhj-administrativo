<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAgendamentoIdToItempedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('itempedidos', function (Blueprint $table) {
    		$table->integer('agendamento_id')
    		->unsigned()
    		->nullable()
    		->after('valor');
    		 
    		$table->foreign('agendamento_id')->references('id')->on('agendamentos');
    	});
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('itempedidos', function (Blueprint $table) {
    	    $table->dropForeign('itempedidos_agendamento_id_foreign');
    		$table->dropColumn('agendamento_id');
    	});
    }
}
