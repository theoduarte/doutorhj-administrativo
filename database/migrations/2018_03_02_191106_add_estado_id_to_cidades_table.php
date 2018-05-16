<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadoIdToCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('cidades', function (Blueprint $table) {
    		$table->integer('estado_id')
    		->unsigned()
    		->nullable()
    		->after('sg_cidade');
    		 
    		$table->foreign('estado_id')->references('id')->on('estados');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('cidades', function (Blueprint $table) {
    		$table->dropForeign('cidades_estado_id_foreign');
    		$table->dropColumn('estado_id');
    	});
    }
}
