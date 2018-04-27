<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConvenioIdToAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('agendamentos', function (Blueprint $table) {
    		$table->integer('convenio_id')
            	  ->unsigned()
            	  ->nullable()
            	  ->after('profissional_id');
    		
    		$table->foreign('convenio_id')->references('id')->on('convenios');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('agendamentos', function (Blueprint $table) {
    		$table->dropForeign('agendamentos_convenio_id_foreign');
    		$table->dropColumn('convenio_id');
    	});
    }
}
