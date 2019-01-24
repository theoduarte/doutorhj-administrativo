<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCorretorIdToAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('agendamentos', function (Blueprint $table) {
    		$table->integer('corretor_id')
    		->unsigned()
    		->nullable()
    		->after('convenio_id');
    		 
    		$table->foreign('corretor_id')->references('id')->on('corretors');
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
    		$table->dropForeign('agendamentos_corretor_id_foreign');
    		$table->dropColumn('corretor_id');
    	});
    }
}
